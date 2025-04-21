<?php

use LegacyDbz\Dungeons\Controllers\DungeonsController;

include_once __DIR__ . '/head.php';

new DungeonsController()->render($id);

include_once __DIR__ . '/footer.php';