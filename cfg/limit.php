<?php

function limit_requests($nr=10,$t=1) {

    if (!session_id()) {
        start_session_based_on_ip();
    }

    if( !isset($_SESSION['tzero']) ) {
        $_SESSION['tzero']=time();
    }

    $since_interval_start = time() - $_SESSION['tzero'];

    if( $since_interval_start> $t ) {
        $_SESSION['tzero'] = time();
        $_SESSION['hits'] = 1;
    } else {
        $_SESSION['hits']++;
    }

    if( $_SESSION['hits'] > $nr ) {
        $message = '[Security-Alert][' . date('Y-m-d H:i') . ']: Galima DDOS ataka. Fiksuojama labai daug užklausų iš IP: ' . $_SERVER['REMOTE_ADDR'];
        error_log($message);

        mysqli_query($conn,"INSERT INTO logs (`message`) VALUES ('$message')") or die(mysqli_error());

        $random = mt_rand(1, 5);
        if ($random === 1) {
            header('Location: https://www.pornhub.com/view_video.php?viewkey=ph6310ae706594b');
        }

        die('<h1>Error 500</h1>');
//        die('<h1>Too many requests!</h1> You will be able to make a new request in <b style="color:red">'.($t-$since_interval_start).'</b> seconds.');
    }

    $remaining_hits = $nr - $_SESSION['hits'];
    $remaining_time = $t - $since_interval_start;
    if ( $remaining_time < 0 ) $remaining_time = $t;
}

function start_session_based_on_ip() {
    $ip_hash = md5($_SERVER['REMOTE_ADDR']);
    session_id($ip_hash);
    session_start();
}

limit_requests();

