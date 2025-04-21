<?php

use LegacyDbz\Parties\Controllers\PartyController;

include_once __DIR__ . '/../head.php';

$controller = new PartyController();

match ($id ?? null) {
    null => $controller->index(),
    'view' => $controller->view(),
    'create' => $controller->create(),
    'createParty' => $controller->store(),
    'delete' => $controller->delete(),
    'leaveParty' => $controller->leaveParty(),
    default => null,
};

include_once __DIR__ . '/../footer.php';