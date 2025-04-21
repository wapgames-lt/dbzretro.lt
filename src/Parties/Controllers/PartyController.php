<?php

declare(strict_types=1);

namespace LegacyDbz\Parties\Controllers;

use Exception;
use LegacyDbz\Parties\Models\Party;
use LegacyDbz\Parties\PartyService;
use LegacyDbz\Parties\Repositories\PartyMembersRepository;
use LegacyDbz\Players\Repositories\PlayersRepository;

final readonly class PartyController
{
    private const int CADMIUM_COST = 15000;
    private const int MIN_PARTY_NAME_LENGTH = 3;
    private const int MAX_PARTY_NAME_LENGTH = 20;

    private PlayersRepository $playersRepository;
    private PartyMembersRepository $partyMembersRepository;
    private PartyService $partyService;

    public function __construct()
    {
        $this->playersRepository = new PlayersRepository();
        $this->partyMembersRepository = new PartyMembersRepository();
        $this->partyService = new PartyService();
    }

    public function render(?string $id = null): void
    {
        match ($id ?? null) {
            null => $this->index(),
            'view' => $this->view(),
            'create' => $this->create(),
            'createParty' => $this->store(),
            'delete' => $this->delete(),
            'leaveParty' => $this->leaveParty(),
            default => null,
        };
    }

    private function index(): void
    {
        online('Parties');
        top('Parties');

        $this->renderCreateButton();
        $this->renderPartyList();

        $navigation = [["/Dungeons/view/index.php", "Dungeons", "Party Valdymas"]];
        navigacija($navigation);
    }

    private function view(): void
    {
        online('Parties -> My Party');
        top('My Party');

        $party = Party::findByPlayerId(currentPlayer()->id());

        if (!$party instanceof Party) {
            $this->renderError('Party nėra');
            return;
        }

        $this->renderPartyDetails($party);
        $this->renderPartyActions($party);

        $navigation = [["/index.php", "Parties", "Party Informacija"]];
        navigacija($navigation);
    }

    private function create(): void
    {
        online('Party Management -> Create Party');
        top('Party Kūrimas');

        $this->renderCreateForm();

        $navigation = [["index.php", "Party Management", "Party Kūrimas"]];
        navigacija($navigation);
    }

    private function store(): void
    {
        online('Party Management -> Create Party');
        top('Party Kūrimas');

        $name = $this->sanitizePartyName($_POST['name'] ?? '');

        if ($error = $this->validatePartyCreation($name)) {
            $this->renderError($error);
            return;
        }

        try {
            $this->partyService->create(
                $name,
                self::CADMIUM_COST,
                currentPlayer(),
            );
            $this->renderSuccess('Party sukurta sėkmingai!');
        } catch (Exception $e) {
            $this->renderError('Įvyko kūrimo klaida! ' . $e->getMessage());
        }

        $navigation = [["index.php", "Party Management", "Party Kūrimas"]];
        navigacija($navigation);
    }

    private function renderPartyDetails(Party $party): void
    {
        $partyLeader = $this->playersRepository->findById($party->leader_id);
        $memberCount = $this->partyMembersRepository->countByPartyId($party->id);

        echo "<div class='meniu'>";
        echo "{$party->name}<br>";
        echo "<small>";
        echo "Leader: <a href='/pagrindinis.php?id=apie&ka={$partyLeader->nick()}'><b>{$partyLeader->nick()}</b></a><br>";
        echo "Narių: {$memberCount}/" . Party::ALLOWED_MEMBERS_AMOUNT . "<br>";
        echo formatDateTimeString($party->created_at);
        echo "</small>";
        echo "</div>";
    }

    private function validatePartyCreation(string $name): ?string
    {
        if ($name === '' || $name === '0') {
            return 'Įvyko klaida';
        }

        if (strlen($name) < self::MIN_PARTY_NAME_LENGTH) {
            return 'Pavadinimas turi būti sudarytas iš daugiau nei 3 simbolių';
        }

        if (strlen($name) > self::MAX_PARTY_NAME_LENGTH) {
            return 'Pavadinimas turi būti sudarytas iš mažiau nei 20 simbolių';
        }

        if (Party::query()->where('name', '=', $name)->first() instanceof \LegacyDbz\Core\Model) {
            return 'Party su tokiu pavadinimu jau egzistuoja';
        }

        if (!$this->partyMembersRepository->findByPlayerId(currentPlayer()->id())->isEmpty()) {
            return 'Kad sukurtumėte party turite išeiti iš dabartinio party';
        }

        if (!currentPlayer()->inventory()->hasMoreCadmiumThan(self::CADMIUM_COST)) {
            return "Kad sukurtumėte party, turite turėti " . self::CADMIUM_COST . " kadmio.";
        }

        return null;
    }

    private function sanitizePartyName(string $name): string
    {
        return preg_replace("/\W/", "", $name);
    }

    private function renderError(string $message): void
    {
        echo "<div class='meniu'>{$message}</div>";
    }

    private function renderSuccess(string $message): void
    {
        echo "<div class='meniu'>{$message}</div>";
    }

    public function delete(): void
    {
        online('Party Management -> Delete Party');
        top('Party Trinimas');

        $party = Party::query()->where('leader_id', '=', currentPlayer()->id())->first();

        if (!$party instanceof Party) {
            $this->renderError('Įvyko klaida');
            return;
        }

        Party::query()->delete();
        $this->renderSuccess('Party ištrinta sėkmingai');

        $navigation = [["index.php", "Party Management", "Party Trinimas"]];
        navigacija($navigation);
    }

    private function leaveParty(): void
    {
        online('Party Management -> Leave Party');
        top('Išeiti iš Party');

        $this->partyMembersRepository->remove(currentPlayer()->id());
        $this->renderSuccess('Išėjote iš Party');

        $navigation = [["index.php", "Party Management", "Išeiti iš Party"]];
        navigacija($navigation);
    }

    private function renderCreateButton(): void
    {
        echo '<div class="meniuc">';
        echo ' <a href="index.php?id=create" class="button">Sukurti Party</a><br>';
        echo '</div>';
    }

    private function renderCreateForm(): void
    {
        echo '<div class="meniu">';
        echo 'Sukūrimas kainuoja: ' . sk(self::CADMIUM_COST) . ' kadmio rūdos<br /><br/>';
        echo '<form method="post" action="?id=createParty">';
        echo '  Pavadinimas:<br /><input type="text" name="name"/><br />';
        echo '  <input type="submit" name="submit" value="Sukurti"/>';
        echo '</form>';
        echo '</div>';
    }

    private function renderPartyList(): void
    {
        $parties = Party::findOrderedByPlayersCount();
        foreach ($parties as $party) {
            $this->renderPartyDetails($party);

            if ($this->partyMembersRepository->isPlayerInParty($party->id, currentPlayer()->id())) {
                echo '<div class="meniu">';
                echo '<a class="button" href="index.php?id=view">Peržiūrėti</a>';
                echo '</div>';
            }
        }
    }
    private function renderPartyActions(Party $party): void
    {
        $partyLeader = $this->playersRepository->findById($party->leader_id);
        $currentPlayerId = currentPlayer()->id();

        if ($currentPlayerId === $partyLeader?->id()) {
            echo '<div class="meniu">';
            echo '<a class="button" href="party_members.php">Narių valdymas</a>';
            echo '</div>';
            echo '<div class="meniu">';
            echo '<a class="button" href="party_invites.php">Pakvietimų valdymas</a><br>';
            echo '</div>';
            echo '<div class="meniu">';
            echo '<a class="button" href="index.php?id=delete">Ištrinti</a><br>';
            echo '</div>';
        }

        if ($currentPlayerId !== $partyLeader?->id() &&
            $this->partyMembersRepository->isPlayerInParty($party->id, $currentPlayerId)) {
            echo '<div class="meniu">';
            echo '<a class="button" href="index.php?id=leaveParty">Išeiti iš Party</a>';
            echo '</div>';
        }
    }

}
