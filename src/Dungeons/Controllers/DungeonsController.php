<?php

declare(strict_types=1);

namespace LegacyDbz\Dungeons\Controllers;

use LegacyDbz\Core\Collection;
use LegacyDbz\Dungeons\Models\Dungeon;
use LegacyDbz\Dungeons\Models\DungeonSection;

final class DungeonsController
{
    private const string PAGE_TITLE = 'Dungeons';
    private const string NAVIGATION_PATH = '/pagrindinis.php';
    private const string EMPTY_DUNGEONS_MESSAGE = 'Dungeonu nėra :(';

    public function render(?string $id = null): void
    {
        match ($id ?? null) {
            default => $this->index(),
        };
    }

    private function index(): void
    {
        online(self::PAGE_TITLE);

        $this->renderHeader();


        $dungeons = $this->getDungeons();
        if ($dungeons->isEmpty()) {
            $this->renderEmptyState();
            return;
        }

        $this->renderDungeonsList($dungeons);
        $this->setupNavigation();
    }

    private function getDungeons(): Collection
    {
        return Dungeon::query()->get();
    }

    private function getDungeonSections(int $dungeonId): int
    {
        return DungeonSection::query()
            ->where('dungeon_id', '=', $dungeonId)
            ->count();
    }

    private function renderHeader(): void
    {
        echo '<div class="meniuc">';
        echo ' <a href="parties/index.php" class="button">Parties</a><br>';
        echo '</div>';
        echo '<div class="meniuc">Dungeonu sąrašas:</div>';
    }

    private function renderEmptyState(): void
    {
        echo sprintf('<div class="meniuc">%s</div>', self::EMPTY_DUNGEONS_MESSAGE);
    }

    private function renderDungeonsList(Collection $dungeons): void
    {
        $dungeons->each(function (Dungeon $dungeon): void {
            $sectionsCount = $this->getDungeonSections($dungeon->id);

            print <<<HTML
                <div class="meniuc">
                    <p><strong>Pavadinimas:</strong> {$dungeon->name}</p>
                    <p><strong>Aprašymas:</strong> {$dungeon->description}</p>
                    <p><strong>Image:</strong> <img src="{$dungeon->img_url}" alt="dungeon logo" width="50" height="50"></p>
                    <p><strong>Lygis:</strong> {$dungeon->entry_level_min} - {$dungeon->entry_level_max}</p>
                    <p><strong>Etapų:</strong> {$sectionsCount}</p>
                    <p><strong>Sukurta:</strong> {$dungeon->created_at->toFormattedDateString()}</p>
                    <p><strong>Atnaujinta:</strong> {$dungeon->updated_at->diffForHumans()}</p>
                </div>
            HTML;
        });
    }

    private function setupNavigation(): void
    {
        $navigation[] = [self::NAVIGATION_PATH, "Žaidimas", "Dungeons"];
        navigacija($navigation);
    }
}
