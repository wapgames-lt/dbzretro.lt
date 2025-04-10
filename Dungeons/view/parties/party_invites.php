<?php

use LegacyDbz\Parties\DTO\Party;
use LegacyDbz\Parties\DTO\PartyInvite;
use LegacyDbz\Parties\Repositories\PartyInvitesRepository;
use LegacyDbz\Parties\Repositories\PartyMembersRepository;
use LegacyDbz\Parties\Repositories\PartiesRepository;
use LegacyDbz\Players\Repositories\InventoryRepository;
use LegacyDbz\Players\Repositories\PlayersRepository;
use LegacyDbz\Players\Services\CurrentPlayer;

include_once '../head.php';

$partiesRepository = new PartiesRepository();
$playersRepository = new PlayersRepository();
$partyMembersRepository = new PartyMembersRepository();
$partyInvitesRepository = new PartyInvitesRepository();
$partyInvitesRepository->deleteExpired();
$currentPlayer = CurrentPlayer::get();


render($id);

function render($id)
{
    switch ($id) {
        case 'create':
            createPartyInvite();
            break;

        case 'createPartyInvite':
            validateAndSavePartyInvite();
            break;

        case 'inviteeInvites':
            inviteeInvites();
            break;

        case 'acceptInvite':
            acceptInvite();
            break;

        case 'declineInvite':
            declineInvite();
            break;

        default:
            renderIndex();
            break;
    }
}

function renderIndex()
{
    global $playersRepository, $partyInvitesRepository, $currentPlayer, $arrow;
    online('Party Management > Party Invites');
    top('Party Invites');
    echo '<div class="meniuc">';
    echo ' <a href="party_invites.php?id=create" class="button">Sukurti Pakvietimą</a><br>';
    echo '</div>';

    /** @var PartyInvite[] $partyInvites */
    $partyInvites = $partyInvitesRepository->findByInviterId($currentPlayer->id())->all();
    foreach ($partyInvites as $partyInvite) {
        echo '<div class="meniu">';
        echo $arrow;
        $invitee = $playersRepository->findById($partyInvite->inviteeId());
        if (!$invitee) {
            echo 'Įvyko klaida, kreipkitės į administraciją';
            return;
        }
        echo $invitee->nick();
        echo '<br>';
        echo 'Statusas: ';
        echo getStatusBadge($partyInvite->status());
        echo '<br>';
        echo formatDateTimeString($partyInvite->createdAt());
        echo '</div>';
    }

    $g_n[] = array("index.php", "Party Management", "Party Pakvietimai");
    navigacija($g_n);
}

function inviteeInvites()
{
    global $partiesRepository, $partyInvitesRepository, $currentPlayer, $arrow;
    online('Party Management > Party Invites');
    top('Party Invites');

    /** @var PartyInvite[] $partyInvites */
    $partyInvites = $partyInvitesRepository->findByInviteeId($currentPlayer->id())->all();
    foreach ($partyInvites as $partyInvite) {
        echo '<div class="meniu">';
        echo $arrow;
        $party = $partiesRepository->findById($partyInvite->partyId());
        if (!$party) {
            die('Įvyko klaida kreipkitės į administraciją');
        }
        echo $party->name();
        echo '<br>';
        echo 'Statusas: ';
        echo getStatusBadge($partyInvite->status());
        echo '<br>';
        echo formatDateTimeString($partyInvite->createdAt());
        if ($partyInvite->isPending()) {
            echo '<br>';
            echo '<a href="party_invites.php?id=acceptInvite&inviteId=' . $partyInvite->id() . '">Priimti</a> | ';
            echo '<a href="party_invites.php?id=declineInvite&inviteId=' . $partyInvite->id() . '">Atmesti</a>';
        }
        echo '</div>';
    }

    $g_n[] = array("index.php", "Party Management", "Party Pakvietimai");
    navigacija($g_n);
}

function acceptInvite()
{
    global $partyInvitesRepository, $partyMembersRepository, $currentPlayer;
    online('Party Management > Accept Invite');
    top('Party Invites');


    $error = false;
    $inviteId = isset($_GET['inviteId']) ? preg_replace('/\D/', "", $_GET['inviteId']) : null;
    if (!$inviteId) {
        echo ' <div class="meniu">';
        echo 'Įvyko klaida';
        echo '</div>';
        $error = true;
    }
    $partyInvite = $partyInvitesRepository->findById($inviteId);
    if (!$partyInvite || !$partyInvite->isPending() || $partyInvite->inviteeId() !== $currentPlayer->id()) {
        echo ' <div class="meniu">';
        echo 'Įvyko klaida, pakvietimas nerastas';
        echo '</div>';
        $error = true;
    }
    $partyMembers = $partyMembersRepository->findByPlayerId($currentPlayer->id());
    if (!$partyMembers->isEmpty()) {
        echo ' <div class="meniu">';
        echo 'Jau esate Party';
        echo '</div>';
        $error = true;
    }
    $partyMembersCount = $partyMembersRepository->countByPartyId($partyInvite->partyId());
    if ($partyMembersCount === Party::ALLOWED_MEMBERS_AMOUNT) {
        echo ' <div class="meniu">';
        echo 'Daugiau narių priimti į Party negalima, nes ji pilna';
        echo '</div>';
        $error = true;
    }

    if (!$error) {
        $partyMembersRepository->addPlayerToParty($currentPlayer->id(), $partyInvite->partyId());
        $partyInvitesRepository->changeStatus($partyInvite->id(), PartyInvite::STATUS_ACCEPTED);
        echo ' <div class="meniu">';
        echo 'Pakvietimas priimtas sėkmingai!';
        echo '</div>';
    }

    $g_n[] = array("index.php", "Party Management", "Party Pakvietimai");
    navigacija($g_n);
}

function declineInvite()
{
    global $partyInvitesRepository, $currentPlayer;
    online('Party Management > Party Invites');
    top('Party Invites');


    $error = false;
    $inviteId = isset($_GET['inviteId']) ? preg_replace('/\D/', "", $_GET['inviteId']) : null;
    if (!$inviteId) {
        echo ' <div class="meniu">';
        echo 'Įvyko klaida';
        echo '</div>';
        $error = true;
    }
    $partyInvite = $partyInvitesRepository->findById($inviteId);
    if (!$partyInvite || !$partyInvite->isPending() || $partyInvite->inviteeId() !== $currentPlayer->id()) {
        echo ' <div class="meniu">';
        echo 'Įvyko klaida, pakvietimas nerastas';
        echo '</div>';
        $error = true;
    }

    if (!$error) {
        $partyInvitesRepository->changeStatus($partyInvite->id(), PartyInvite::STATUS_DECLINED);
        echo ' <div class="meniu">';
        echo 'Pakvietimas atmestas sėkmingai!';
        echo '</div>';
    }

    $g_n[] = array("index.php", "Party Management", "Party Pakvietimai");
    navigacija($g_n);
}

function createPartyInvite()
{
    online('Party Management -> Create Party Invite');
    top('Kviesti į Party');
    echo ' <div class="meniu">
        <form method="post" action="?id=createPartyInvite">
          Nick:<br /><input type="text" name="nick"/><br />
     
         <input type="submit" name="submit" value="Kviesti"/></form>
        </div>';

    $g_n[] = array("index.php", "Party Management", "Party Kūrimas");
    navigacija($g_n);
}

function validateAndSavePartyInvite()
{
    global $playersRepository, $partyInvitesRepository, $partiesRepository, $partyMembersRepository, $currentPlayer, $inv;
    online('Party Management -> Create Party Invite');
    top('Kviesti į Party');
    $nick = null;
    if (isset($_POST['submit'])) {
        $nick = isset($_POST['nick']) ? preg_replace("/[^A-Za-z0-9_]/", "", $_POST['nick']) : null;
        $nick = strtolower($nick);
    }
    $error = false;

    if (!$nick) {
        echo ' <div class="meniu">';
        echo 'Įvyko klaida';
        echo '</div>';
        $error = true;
    }

    $player = $playersRepository->findByNick($nick);
    if (!$player) {
        echo ' <div class="meniu">';
        echo 'Žaidėjas nerastas';
        echo '</div>';
        return;
    }
    $party = $partiesRepository->findByLeaderId($currentPlayer->id());
    if (!$party) {
        echo ' <div class="meniu">';
        echo 'Neturite Party';
        echo '</div>';
        return;
    }
    $partyMembers = $partyMembersRepository->findByPlayerId($player->id());
    if (!$partyMembers->isEmpty()) {
        echo ' <div class="meniu">';
        echo 'Žaidėjas ' . $player->nick() . ' jau yra party';
        echo '</div>';
        $error = true;
    }
    $pendingInvites = $partyInvitesRepository->findByIniteeIdAndStatus($player->id(), PartyInvite::STATUS_PENDING);
    if (!$pendingInvites->isEmpty()) {
        echo ' <div class="meniu">';
        echo 'Žaidėjas ' . $player->nick() . ' jau turi pending pakvietimų';
        echo '</div>';
        $error = true;
    }
    if ($player->ip() === $currentPlayer->ip()) {
        echo ' <div class="meniu">';
        echo 'Savęs pakviesti į Party negalima';
        echo '</div>';
        $error = true;
    }
    $partyMembersCount = $partyMembersRepository->countByPartyId($party->id());
    if ($partyMembersCount === Party::ALLOWED_MEMBERS_AMOUNT) {
        echo ' <div class="meniu">';
        echo 'Daugiau narių pakviesti į Party negalima';
        echo '</div>';
        $error = true;
    }
    $cadmiumAmount = 500;
    if (!$currentPlayer->inventory()->hasMoreCadmiumThan($cadmiumAmount)) {
        echo ' <div class="meniu">';
        echo 'Kad pakviestumėte į party turite turėti ' . $cadmiumAmount . ' kadmio';
        echo '</div>';
        $error = true;
    }

    if (!$error) {
        $partyInvite = new PartyInvite(null, $party->id(), $currentPlayer->id(), $player->id());
        $partyInvitesRepository->save($partyInvite);
        $currentPlayerInventory = $currentPlayer->inventory();
        $currentPlayerInventory->removeCadmiumOre($cadmiumAmount);
        $currentPlayerInventory->update();
        echo ' <div class="meniu">';
        echo 'Žaidėjas ' . $player->nick() . ' sėkmingai pakviestas!';
        echo '</div>';
    }

    $g_n[] = array("party_invites.php", "Party Pakvietimai", "Party Pakvietimai");
    navigacija($g_n);
}

function getStatusBadge($status)
{
    $colors = [
        PartyInvite::STATUS_PENDING => 'badge-warning',
        PartyInvite::STATUS_ACCEPTED => 'badge-success',
        PartyInvite::STATUS_DECLINED => 'badge-danger',
    ];

    $class = isset($colors[$status]) ? $colors[$status] : 'badge-default';

    return '<span class="badge ' . $class . '">' . ucfirst($status) . '</span>';
}


include_once '../footer.php';