<?php

$arrow = '<img src="../assets/img/right-arrow.png" width="15" height="15" style="vertical-align: bottom;"> ';
$checked = '<img src="../assets/img/checked.png" width="15" height="15" style="vertical-align: bottom;">';
$trophy = '<img src="../assets/img/trophy.png" width="18" height="18" style="vertical-align: bottom;">';
$tokens = '<img src="../assets/img/tokens.png" style="vertical-align: bottom;">';



















$config = [
    'missions_per_day' => '10',
];

function getConfigValueByName($name)
{
    global $config;

    if (!isset($config[$name])) {
        return '';
    }

    return $config[$name];
}