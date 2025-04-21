<?php

use LegacyDbz\Parties\Controllers\PartyController;

include_once __DIR__ . '/../head.php';

new PartyController()->render($id);

include_once __DIR__ . '/../footer.php';