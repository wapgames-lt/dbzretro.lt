<?php

use LegacyDbz\Parties\DTO\PartyMember;
use LegacyDbz\Parties\Repositories\PartyMembersRepository;
use LegacyDbz\Parties\Repositories\PartiesRepository;
use LegacyDbz\Players\Repositories\PlayersRepository;
use LegacyDbz\Players\Services\CurrentPlayer;

include_once '../head.php';

$partiesRepository = new PartiesRepository();
$playersRepository = new PlayersRepository();
$partyMembersRepository = new PartyMembersRepository();

match ($id) {
    'removeFromParty' => removeFromParty(),
    default => renderIndex(),
};

function renderIndex()
{
    global $playersRepository, $partyMembersRepository, $arrow;

    online('Party Management > Party Members');
    top('Party Members');

    /** @var PartyMember[] $partyMembers */
    $partyMembers = $partyMembersRepository->findByPartyLeaderId(CurrentPlayer::get()->id())->all();
    foreach ($partyMembers as $partyMember) {
        echo '<div class="meniu">';
        echo $arrow;
        $player = $playersRepository->findById($partyMember->playerId());
        if (!$player) {
            echo 'Įvyko klaida, kreipkitės į administraciją';
            return;
        }
        echo $player->nick();
        echo '<br>';
        echo '<small>Prisijungė: </small>';
        echo formatDateTimeString($partyMember->joinedAt());
        echo '<br>';
        echo '<a href="party_members.php?id=removeFromParty&playerId=' . $player->id() . '">Išmesti</a>';
        echo '</div>';
    }

    $g_n[] = ["index.php", "Party Management", "Narių Valdymas"];
    navigacija($g_n);
}

function removeFromParty() {
    global $partiesRepository, $partyMembersRepository;
    online('Party Management -> Remove Player From Party');
    top('Išeiti iš Party');

    $error = false;
    $playerId = isset($_GET['playerId']) ? preg_replace('/\D/', "", (string) $_GET['playerId']) : null;
    if (!$playerId) {
        echo '<div class="meniu">';
        echo 'Įvyko klaida';
        echo '</div>';
        $error = true;
    }
    $party = $partiesRepository->findByLeaderId(CurrentPlayer::get()->id());
    if (!$party) {
        echo '<div class="meniu">';
        echo 'Party nerasta';
        echo '</div>';
        $error = true;
    }
    if (!$partyMembersRepository->isPlayerInParty($party->id(), $playerId)) {
        echo '<div class="meniu">';
        echo 'Tokio žaidėjo Party nėra';
        echo '</div>';
        $error = true;
    }

    if (!$error) {
        $partyMembersRepository->remove($playerId);
        echo ' <div class="meniu">';
        echo 'Žaidėjas sėkmingai pašalintas iš Party';
        echo '</div>';
    }

    $g_n[] = ["party_members.php", "Narių Valdymas", "Pašalinti Žaidėją"];
    navigacija($g_n);
}



include_once '../footer.php';