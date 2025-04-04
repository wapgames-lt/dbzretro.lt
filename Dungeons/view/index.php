<?php

include_once 'head.php';

if (!isset($id)) {
    online('Dungeons');
    echo '<div class="meniuc">';
    echo ' <a href="parties/index.php" class="button">Parties</a><br>';
    echo '</div>';
}

include_once 'footer.php';