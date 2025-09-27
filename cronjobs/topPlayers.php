<?php

include_once __DIR__ . '/../cfg/functions.php';

if (PHP_SAPI !== 'cli') {
    \LegacyDbz\Core\Logger::logInfo('WAP gay trying to run cron jobs from the browser.');

    exit('Running cron jobs from browser is not good practice');
}

logInfo('Cron job started in file: ' . basename(__FILE__));

$nust = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM nustatymai"));

if (random_int(1, 3) === 3) {
    $topUsers = mysqli_query($conn, "SELECT * from zaidejai WHERE statusas != 'Kurejas' AND lygis > 1 ORDER BY lygis DESC LIMIT 3");
    $message = '**Top Players By Level**:' . "\n";
    $nr = 1;

    while ($row = mysqli_fetch_assoc($topUsers)) {
        $message .= $nr++ . '. **' . $row['nick'] . '** (' . $row['lygis'] . ')' . "\n";
    }

    sendDiscordMessage($message);
    sleep(5);
}


$topPlayersByActions = mysqli_query($conn, "SELECT * FROM dtop WHERE nick != '" . mysqli_real_escape_string($conn, $nust['last']) . "' ORDER BY vksm DESC LIMIT 5");
if (mysqli_num_rows($topPlayersByActions) > 0) {

    $message = '**Top Players By Actions Today**:' . "\n";
    $nr = 1;
    while ($row = mysqli_fetch_assoc($topPlayersByActions)) {
        $message .= $nr++ . '. **' . $row['nick'] . '** (' . sk($row['vksm']) . ')' . "\n";
    }

    sendDiscordMessage($message);
}

logInfo('Cron job ended in file: ' . basename(__FILE__));