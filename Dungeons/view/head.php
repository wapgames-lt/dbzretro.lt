<?php

/**
 * Import wap gay code
 */
include_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/sql.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/funkcijos.php';
$pathToModule = '/Dungeons';

$arrow = '<img src="' . $pathToModule . '/assets/img/right-arrow.png" width="15" height="15" style="vertical-align: bottom;"> ';
$checked = '<img src="' . $pathToModule . '/assets/img/checked.png" width="15" height="15" style="vertical-align: bottom;">';
$trophy = '<img src="' . $pathToModule . '/assets/img/trophy.png" width="18" height="18" style="vertical-align: bottom;">';
$warningIcon = '<img src="' . $pathToModule . '/assets/img/warning.png" width="18" height="18" style="vertical-align: bottom;">';
$skull = '<img src="' . $pathToModule . '/assets/img/skull.png" width="18" height="18" style="vertical-align: bottom;">';

head2();
baneris();
topbar();
top('Dungeon Zone');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ERROR);

