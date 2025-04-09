<?php

use LegacyDbz\Parties\DTO\Party;
use LegacyDbz\Parties\Repositories\PartyMembersRepository;
use LegacyDbz\Parties\Repositories\PartyRepository;
use LegacyDbz\Players\Repositories\InventoryRepository;
use LegacyDbz\Players\Repositories\PlayersRepository;
use LegacyDbz\Players\Services\CurrentPlayer;

include_once '../head.php';

$partiesRepository = new PartyRepository();
$playersRepository = new PlayersRepository();
$partyMembersRepository = new PartyMembersRepository();

if (!isset($id)) {
    online('Parties');
    top('Parties');
    echo '<div class="meniuc">';
    echo ' <a href="index.php?id=create" class="button">Sukurti Party</a><br>';
    echo '</div>';

    /** @var Party[] $parties */
    $parties = $partiesRepository->findAllOrderedByPlayersCount()->all();
    foreach ($parties as $party) {
        echo '<div class="meniu">';
        echo $arrow;
        echo $party->name();
        echo '<br>';
        echo '<small>';
        $partyLeader = $playersRepository->findById($party->leaderId());
        echo 'Leader: ';
        echo '<a href="/pagrindinis.php?id=apie&ka=' . $partyLeader->nick() . '"><b>' . $partyLeader->nick() . '</b> </a>';
        echo '<br>';
        $partyMembersCount = $partyMembersRepository->countByPartyId($party->id());
        echo 'Narių: ' . $partyMembersCount . '/' . Party::ALLOWED_MEMBERS_AMOUNT . '<br>';
        echo formatDateTimeString($party->createdAt());
        echo '</small>';
        if ($partyMembersRepository->isPlayerInParty($party->id(), CurrentPlayer::get()->id())) {
            echo '<div class="meniu">';
            echo '<a class="button" href="index.php?id=view">Peržiūrėti</a>';
            echo '</div>';
        }
        echo '</div>';
    }

    $g_n[] = array("/index.php", "Dungeons", "Party Valdymas");
    navigacija($g_n);

}

if ($id === 'view') {
    online('Parties -> My Party');
    top('My Party');

    $party = $partiesRepository->findByPlayerId(CurrentPlayer::get()->id());
    $error = false;
    if (!$party) {
        echo ' <div class="meniu">';
        echo 'Party nėra';
        echo '</div>';
        $error = true;
    }

    if (!$error) {
        echo '<div class="meniu">';
        echo $arrow;
        echo $party->name();
        echo '<br>';
        echo '<small>';
        $partyLeader = $playersRepository->findById($party->leaderId());
        echo 'Leader: ';
        echo '<a href="/pagrindinis.php?id=apie&ka=' . $partyLeader->nick() . '"><b>' . $partyLeader->nick() . '</b> </a>';
        echo '<br>';
        $partyMembersCount = $partyMembersRepository->countByPartyId($party->id());
        echo 'Narių: ' . $partyMembersCount . '/' . Party::ALLOWED_MEMBERS_AMOUNT . '<br>';
        echo formatDateTimeString($party->createdAt());
        echo '</small>';
        if (CurrentPlayer::get()->id() === $partyLeader->id()) {
            echo '<div class="meniu">';
            echo '<a class="button" href="party_members.php">Narių valdymas</a>';
            echo '</div>';
            echo '<div class="meniu">';
            echo '<a class="button" href="party_invites.php">Pakvietimų valdymas</a><br>';
            echo '</div>';
            echo '<div class="meniu">';
            echo '<a class="button" href="party_invites.php">Pakvietimų valdymas</a><br>';
            echo '</div>';
            echo '<div class="meniu">';
            echo '<a class="button" href="index.php?id=delete">Ištrinti</a><br>';
            echo '</div>';
        }
        if (CurrentPlayer::get()->id() !== $partyLeader->id() && $partyMembersRepository->isPlayerInParty($party->id(), CurrentPlayer::get()->id())) {
            echo '<div class="meniu">';
            echo '<a class="button" href="index.php?id=leaveParty">Išeiti iš Party</a>';
            echo '</div>';
        }
        echo '</div>';
    }

    $g_n[] = array("/index.php", "Parties", "Party Informacija");
    navigacija($g_n);

}

if ($id === 'create') {
    online('Party Management -> Create Party');
    top('Party Kūrimas');
    echo ' <div class="meniu">
 Sukūrimas kainuoja: ' . sk(15000) . ' kadmio rūdos<br /><br/>
        <form method="post" action="?id=createParty">
          Pavadinimas:<br /><input type="text" name="name"/><br />
     
         <input type="submit" name="submit" value="Sukurti"/></form>
        </div>';

    $g_n[] = array("index.php", "Party Management", "Party Kūrimas");
    navigacija($g_n);
}

if ($id === 'delete') {
    online('Party Management -> Delete Party');
    top('Party Trinimas');
    $error = false;
    $party = $partiesRepository->findByLeaderId(CurrentPlayer::get()->id());
    if (!$party) {
        echo ' <div class="meniu">';
        echo 'Įvyko klaida';
        echo '</div>';
        $error = true;
    }

    if (! $error) {
        $partiesRepository->delete($party->id());
        echo ' <div class="meniu">';
        echo 'Party ištrinta sėkmingai';
        echo '</div>';
    }

    $g_n[] = array("index.php", "Party Management", "Party Trinimas");
    navigacija($g_n);
}

if ($id === 'leaveParty') {
    online('Party Management -> Leave Party');
    top('Išeiti iš Party');

    $partyMembersRepository->remove(CurrentPlayer::get()->id());
    echo ' <div class="meniu">';
    echo 'Išėjote iš Party';
    echo '</div>';

    $g_n[] = array("index.php", "Party Management", "Išeiti iš Party");
    navigacija($g_n);
}

if ($id === 'createParty') {
    online('Party Management -> Create Party');
    top('Party Kūrimas');
    $name = null;
    if (isset($_POST['submit'])) {
        $name = isset($_POST['name']) ? preg_replace("/[^A-Za-z0-9_]/", "", $_POST['name']) : null;
    }
    $error = false;

    if (!$name) {
        echo ' <div class="meniu">';
        echo 'Įvyko klaida';
        echo '</div>';
        $error = true;
    }
    if (strlen($name) < 3) {
        echo ' <div class="meniu">';
        echo 'Pavadinimas turi būti sudarytas iš daugiau nei 3 simbolių';
        echo '</div>';
        $error = true;
    }
    if (strlen($name) > 20) {
        echo ' <div class="meniu">';
        echo 'Pavadinimas turi būti sudarytas iš mažiau nei 20 simbolių';
        echo '</div>';
        $error = true;
    }
    $partyByName = $partiesRepository->findByName($name);
    if ($partyByName) {
        echo ' <div class="meniu">';
        echo 'Party su tokiu pavadinimu jau egzistuoja';
        echo '</div>';
        $error = true;
    }
    $partyMembers = $partyMembersRepository->findByPlayerId(CurrentPlayer::get()->id());
    if (! $partyMembers->isEmpty()) {
        echo ' <div class="meniu">';
        echo 'Kad sukurtumėte party turite išeiti iš dabartinio party';
        echo '</div>';
        $error = true;
    }
    $cadmiumAmount = 15000;
    if (! CurrentPlayer::get()->hasMoreCadmiumThan($cadmiumAmount)) {
        echo ' <div class="meniu">';
        echo "Kad sukurtumėte party, turite turėti {$cadmiumAmount} kadmio.";
        echo '</div>';
        $error = true;
    }

    if (! $error) {
        $party = new Party(null, CurrentPlayer::get()->id(), $name, null);
        $partiesRepository->save($party);
        $inventoryRepository = new InventoryRepository();
        $inventoryRepository->subtractCadmium(CurrentPlayer::get()->nick(), $cadmiumAmount);
        echo ' <div class="meniu">';
        echo 'Party sukurta sėkmingai!';
        echo '</div>';
    }

    $g_n[] = array("index.php", "Party Management", "Party Kūrimas");
    navigacija($g_n);
}

include_once '../footer.php';