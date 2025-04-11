<?php

use LegacyDbz\Dungeons\Models\Dungeon;

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
    echo '<div class="meniuc">';
    echo 'Dugeonų sąrašas:';
    echo '</div>';

    /** @var Dungeon[] $dungeons */
    $dungeons = Dungeon::get()->all();
    if (!$dungeons) {
        echo '<div class="meniuc">';
        echo 'Dungeonu nėra :(';
        echo '</div>';
    }

    foreach ($dungeons as $dungeon) {
        echo '<div class="meniuc">';
        echo "Pavadinimas: {$dungeon->name} <br>";
        echo "Aprašymas: {$dungeon->description} <br>";
        echo "Image url: {$dungeon->img_url} <br>";

        echo '</div>';
    }
}


include_once 'footer.php';