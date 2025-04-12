<?php

use LegacyDbz\Dungeons\Models\Dungeon;
use LegacyDbz\Dungeons\Models\DungeonSection;

include_once 'head.php';

render($id);

function render($id): void
{
    match ($id) {
        default => renderIndex(),
    };
}

function renderIndex(): void
{
    online('Dungeons');
    echo '<div class="meniuc">';
    echo ' <a href="parties/index.php" class="button">Parties</a><br>';
    echo '</div>';

    renderDungeons();

    $g_n[] = ["/pagrindinis.php", "Žaidimas", "Dungeons"];
    navigacija($g_n);
}

function renderDungeons(): void
{
    echo '<div class="meniuc">Dungeonu sąrašas:</div>';

    $dungeons = Dungeon::query()->get();

    if ($dungeons->isEmpty()) {
        echo '<div class="meniuc">Dungeonu nėra :(</div>';
        return;
    }

    $dungeons->each(fn (Dungeon $dungeon) => renderDungeon($dungeon));
}

function renderDungeon(Dungeon $dungeon): void
{
    $dungeonSectionsCount = DungeonSection::query()
        ->where('dungeon_id', '=', $dungeon->id)
        ->count();

    print <<<HTML
        <div class="meniuc">
            <p><strong>Pavadinimas:</strong> {$dungeon->name}</p>
            <p><strong>Aprašymas:</strong> {$dungeon->description}</p>
            <p><strong>Image:</strong> <img src="{$dungeon->img_url}" alt="dungeon logo" width="50" height="50"></p>
            <p><strong>Lygis:</strong> {$dungeon->entry_level_min} - {$dungeon->entry_level_max}</p>
            <p><strong>Etapų:</strong> {$dungeonSectionsCount}</p>
            <p><strong>Sukurta:</strong> {$dungeon->created_at->toFormattedDateString()}</p>
            <p><strong>Atnaujinta:</strong> {$dungeon->updated_at->diffForHumans()}</p>
        </div>
HTML;
}


include_once 'footer.php';