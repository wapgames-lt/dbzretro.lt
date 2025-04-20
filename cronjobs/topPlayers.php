<?php

include_once '../cfg/functions.php';

logInfo('Cron job started in file: ' . basename(__FILE__));

$topUsers = mysqli_query($conn,"SELECT * from zaidejai WHERE statusas != 'Kurejas' AND lygis > 1 ORDER BY lygis DESC LIMIT 3");
$message = '**Top Players**:' . "\n";
$nr = 1;

while ($row = mysqli_fetch_assoc($topUsers)) {
    $message .= $nr++ . '. **' . $row['nick'] . '** (' . $row['lygis'] . ')' . "\n";
}

sendDiscordMessage($message);

logInfo('Cron job ended in file: ' . basename(__FILE__));