<?php

include_once '../cfg/sql.php';
include_once '../cfg/config.php';

\LegacyDbz\Core\Logger::logInfo('Cron job started in file: ' . basename(__FILE__));

$nust = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM nustatymai"));


// AUTO RESET
autoReset(190);

// veiksmu top
$ddata = date("Y-m-d");
if ($ddata != $nust['dtop_date']) {
    $prizas = $nust['dtop_priz'];
    $prizas2 = round($nust['dtop_priz'] / 2);
    $prizas3 = round($nust['dtop_priz'] / 3);
    $ltl = $nust['dtop_ltl'];

    $query = mysqli_query($conn, "SELECT * FROM dtop WHERE nick != '" . $nust['last'] . "' ORDER BY vksm DESC LIMIT 3");
    while ($row = mysqli_fetch_assoc($query)) {
        $iii++;
        if ($iii == 1) {
            mysqli_query($conn, "INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus dienos tope <b>1</b>-ą vietą!! :) Laimėjai <b>" . $prizas . "</b> $vipt ', time='" . time() . "', gavejas='$row[nick]', nauj='NEW'") || die(mysqli_error());
            mysqli_query($conn, "INSERT INTO dtop_log SET nick='$row[nick]',laimejo='$prizas', veiksmai='$row[$vksm]', laikas='" . time() . "' ") || die(mysqli_error());
            mysqli_query($conn, "UPDATE zaidejai SET vipticket=vipticket+'$prizas' WHERE nick='$row[nick]'") || die(mysqli_error());
            mysqli_query($conn, "INSERT INTO medaliai SET nick='$row[nick]', medalis='1', uz='1vt. veiksmų tope', laikas='" . time() . "' ") || die(mysqli_error());
            mysqli_query($conn, "UPDATE nustatymai SET last='$row[nick]'");
        }
        if ($iii == 2) {
            mysqli_query($conn, "INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus dienos tope <b>2</b>-ą vietą!! :) Laimėjai <b>" . $prizas2 . "</b> $vipt ', time='" . time() . "', gavejas='$row[nick]', nauj='NEW'") || die(mysqli_error());
            mysqli_query($conn, "UPDATE zaidejai SET vipticket=vipticket+'$prizas2' WHERE nick='$row[nick]'") || die(mysqli_error());
            mysqli_query($conn, "INSERT INTO medaliai SET nick='$row[nick]', medalis='2', uz='2vt. veiksmų tope', laikas='" . time() . "' ") || die(mysqli_error());
        }
        if ($iii == 3) {
            mysqli_query($conn, "INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus dienos tope <b>3</b>-ą vietą!! :) Laimėjai <b>" . $prizas3 . "</b> $vipt ', time='" . time() . "', gavejas='$row[nick]', nauj='NEW'") || die(mysqli_error());
            mysqli_query($conn, "UPDATE zaidejai SET vipticket=vipticket+'$prizas3' WHERE nick='$row[nick]'") || die(mysqli_error());
            mysqli_query($conn, "INSERT INTO medaliai SET nick='$row[nick]', medalis='3', uz='3vt. veiksmų tope', laikas='" . time() . "' ") || die(mysqli_error());

        }
    }
    $naujas_p = mt_rand(500, 200000);

    $laikas = date("Y-m-d");
    mysqli_query($conn, "UPDATE nustatymai SET dtop_priz='$naujas_p', dtop_date='$laikas', dtop_ltl='$naujas_ltl' ") || die(mysqli_error());
    $diena = random_int(1, 7);
    mysqli_query($conn, "UPDATE nustatymai SET snd_max='0', diena='$diena'");
    mysqli_query($conn, "TRUNCATE TABLE dtop");
    mysqli_query($conn, "TRUNCATE TABLE daily");
    mysqli_query($conn, "UPDATE nustatymai SET sndnew='0' ");
}

// kasimo top
$ddata2 = date("Y-m-d");
if ($ddata2 != $nust['kasimo_date']) {
    $prizask = $nust['kasimo_priz'];
    $prizask2 = round($nust['kasimo_priz'] / 2);
    $prizask3 = round($nust['kasimo_priz'] / 3);
    $ltl = $nust['kasimo_priz'];

    $query = mysqli_query($conn, "SELECT * FROM kasimotop ORDER BY surinkta DESC LIMIT 3");
    while ($row = mysqli_fetch_assoc($query)) {
        $iiik++;
        if ($iiik == 1) {
            mysqli_query($conn, "INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus kasimo tope <b>1</b>-ą vietą!! :) Laimėjai <b>" . $prizask . "</b> Kasimo LVL! ', time='" . time() . "', gavejas='$row[nick]', nauj='NEW'") || die(mysqli_error());

            mysqli_query($conn, "UPDATE zaidejai SET kasimolvl=kasimolvl+'$prizask' WHERE nick='$row[nick]'") || die(mysqli_error());


        }
        if ($iiik == 2) {
            mysqli_query($conn, "INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus kasimo tope <b>2</b>-ą vietą!! :) Laimėjai <b>" . $prizask2 . "</b> Kasimo LVL! ', time='" . time() . "', gavejas='$row[nick]', nauj='NEW'") || die(mysqli_error());
            mysqli_query($conn, "UPDATE zaidejai SET kasimolvl=kasimolvl+'$prizask2' WHERE nick='$row[nick]'") || die(mysqli_error());

        }
        if ($iiik == 3) {
            mysqli_query($conn, "INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus kasimo tope <b>3</b>-ą vietą!! :) Laimėjai <b>" . $prizask3 . "</b> Kasimo LVL! ', time='" . time() . "', gavejas='$row[nick]', nauj='NEW'") || die(mysqli_error());
            mysqli_query($conn, "UPDATE zaidejai SET kasimolvl=kasimolvl+'$prizask3' WHERE nick='$row[nick]'") || die(mysqli_error());


        }
    }
    $naujas_pk = mt_rand(1000, 25000);

    $laikask = date("Y-m-d");
    mysqli_query($conn, "UPDATE nustatymai SET kasimo_priz='$naujas_pk', kasimo_date='$laikask' ") || die(mysqli_error());


    mysqli_query($conn, "TRUNCATE TABLE kasimotop");


}


//Daily mission top
if ($ddata2 !== $nust['daily_mission_date'] && $nust['daily_mission_reward']) {
    $prizask = $nust['daily_mission_reward'];
    $prizask2 = round($nust['daily_mission_reward'] / 2);
    $prizask3 = round($nust['daily_mission_reward'] / 3);

    $query = mysqli_query($conn, "SELECT * FROM player_daily_mission_top WHERE completed_missions > 0 ORDER BY completed_missions DESC LIMIT 3");

    $count = 0;
    while ($row = mysqli_fetch_assoc($query)) {
        $count++;
        if ($count === 1) {
            mysqli_query($conn, "INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus legendinių misijų tope <b>" . $count . "</b>-ą vietą!! :) Laimėjai <b>" . $prizask . "</b> VEGITA CASH! ', time='" . time() . "', gavejas='$row[nick]', nauj='NEW'") || die(mysqli_error());
            mysqli_query($conn, "UPDATE zaidejai SET botas=botas+'$prizask' WHERE nick='$row[nick]'") || die(mysqli_error());
            mysqli_query($conn, "UPDATE nustatymai SET daily_mission_win='$row[nick]'") || die(mysqli_error());
        }

        if ($count === 2) {
            mysqli_query($conn, "INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus legendinių misijų tope <b>" . $count . "</b>-ą vietą!! :) Laimėjai <b>" . $prizask2 . "</b> VEGITA CASH! ', time='" . time() . "', gavejas='$row[nick]', nauj='NEW'") || die(mysqli_error());
            mysqli_query($conn, "UPDATE zaidejai SET botas=botas+'$prizask2' WHERE nick='$row[nick]'") || die(mysqli_error());
        }

        if ($count === 3) {
            mysqli_query($conn, "INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus legendinių misijų tope <b>" . $count . "</b>-ą vietą!! :) Laimėjai <b>" . $prizask3 . "</b> VEGITA CASH! ', time='" . time() . "', gavejas='$row[nick]', nauj='NEW'") || die(mysqli_error());
            mysqli_query($conn, "UPDATE zaidejai SET botas=botas+'$prizask3' WHERE nick='$row[nick]'") || die(mysqli_error());
        }
    }

    $naujas_pk = mt_rand(20, 50);
    $laikask = date("Y-m-d");
    mysqli_query($conn, "UPDATE nustatymai SET daily_mission_reward='$naujas_pk', daily_mission_date='$laikask' ") || die(mysqli_error());
    mysqli_query($conn, "TRUNCATE TABLE player_daily_mission_top");
    mysqli_query($conn, "TRUNCATE TABLE player_actions");

}

///////////// bendravimo topas
$laikk = date("Y-m-d");
if ($laikk != $nust['bendravimo_date']) {
    $prizb = $nust['bendravimo_priz'];
    $prizb2 = round($nust['bendravimo_priz'] / 2);
    $prizb3 = round($nust['bendravimo_priz'] / 3);
    $prizzb = $nust['bendravimo_priz2'];
    $prizzb2 = round($nust['bendravimo_priz2'] / 2);
    $prizzb3 = round($nust['bendravimo_priz2'] / 3);

    $query = mysqli_query($conn, "SELECT * FROM bendravimo_top ORDER BY sms DESC LIMIT 3");
    while ($row = mysqli_fetch_assoc($query)) {
        $nrb++;
        if ($nrb == 1) {
            mysqli_query($conn, "INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus bendravimo  tope <b>1</b>-ą vietą!! :) Laimėjai <b>" . $prizb . "</b> $eurui ir <b>" . $prizzb . "</b>$vipt ! ', time='" . time() . "', gavejas='$row[nick]', nauj='NEW'") || die(mysqli_error());

            mysqli_query($conn, "UPDATE zaidejai SET sms_litai=sms_litai+'$prizb', vipticket=vipticket+'$prizzb' WHERE nick='$row[nick]'") || die(mysqli_error());
            mysqli_query($conn, "INSERT INTO bendravimo_log SET nick='$row[nick]',laimejo='$prizb',laimejo2='$prizzb', laikas='" . time() . "' ") || die(mysqli_error());
        }
        if ($nrb == 2) {
            mysqli_query($conn, "INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus bendravimo tope <b>2</b>-ą vietą!! :) Laimėjai <b>" . $prizb2 . "</b> $eurui!', time='" . time() . "', gavejas='$row[nick]', nauj='NEW'") || die(mysqli_error());
            mysqli_query($conn, "UPDATE zaidejai SET sms_litai=sms_litai+'$prizb2' WHERE nick='$row[nick]'") || die(mysqli_error());

        }
        if ($nrb == 3) {
            mysqli_query($conn, "INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus bendravimo tope <b>3</b>-ą vietą!! :) Laimėjai <b>" . $prizb3 . "</b>$eurui ! ', time='" . time() . "', gavejas='$row[nick]', nauj='NEW'") || die(mysqli_error());
            mysqli_query($conn, "UPDATE zaidejai SET sms_litai=sms_litai+'$prizb3' WHERE nick='$row[nick]'") || die(mysqli_error());

        }

        $naujas_prr = mt_rand(50, 250);
        $naujas_prr2 = mt_rand(3000, 30000);
        $laikaszz = date("Y-m-d");
        mysqli_query($conn, "UPDATE nustatymai SET bendravimo_priz='$naujas_prr', bendravimo_priz2='$naujas_prr2', bendravimo_date='$laikaszz' ") || die(mysqli_error());
        mysqli_query($conn, "TRUNCATE TABLE bendravimo_top");

    }
}

////////////// endas


///////////// loterija
$l = date("Y-m-d");
if ($l != $nust['lotery_date']) {
    $prize = $nust['lotery_priz'];


    $query = mysqli_query($conn, "SELECT * FROM loterija ORDER BY kiek DESC LIMIT 1");
    while ($row = mysqli_fetch_assoc($query)) {
        $vt++;
        if ($vt == 1) {
            mysqli_query($conn, "INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus loterija. Laimėjai <b>" . $prize . "</b> Eurų.', time='" . time() . "', gavejas='$row[nick]', nauj='NEW'") || die(mysqli_error());
            mysqli_query($conn, "INSERT INTO medaliai SET nick='$row[nick]', medalis='7', uz='Laimėta dienos loteriją', laikas='" . time() . "' ");
            mysqli_query($conn, "UPDATE zaidejai SET sms_litai=sms_litai+'$prize' WHERE nick='$row[nick]'") || die(mysqli_error());
            mysqli_query($conn, "UPDATE nustatymai SET lotery_win='$row[nick]'");
        }


        $nauja = 2;
        $lai = date("Y-m-d");
        mysqli_query($conn, "UPDATE nustatymai SET lotery_priz='$nauja', lotery_date='$lai' ") || die(mysqli_error());
        mysqli_query($conn, "TRUNCATE TABLE loterija");
    }
}
////////////// endas


$taimux = date("Y-m-d");
if ($taimux != $nust['isbar_time']) {
    $prize = $nust['lotery_priz'];


    $query = mysqli_query($conn, "SELECT * FROM isbarstyta ORDER BY turima DESC LIMIT 1");
    while ($row = mysqli_fetch_assoc($query)) {
        $xd++;
        if ($xd == 1) {
            mysqli_query($conn, "INSERT INTO pm SET what='SISTEMA', txt='Sveikinu, surinkai šiandien daugiausiai išbarstytų rutulių gauni 200 $eurui ! ', time='" . time() . "', gavejas='$row[nick]', nauj='NEW'") || die(mysqli_error());
            mysqli_query($conn, "INSERT INTO medaliai SET nick='$row[nick]', medalis='8', uz='Surinko daugiausiai išbarstytų rutulių', laikas='" . time() . "' ");
            mysqli_query($conn, "UPDATE zaidejai SET sms_litai=sms_litai+'200' WHERE nick='$row[nick]'") || die(mysqli_error());
        }


        $laix = date("Y-m-d");
        mysqli_query($conn, "UPDATE nustatymai SET isbar_time='$laix' ") || die(mysqli_error());
        mysqli_query($conn, "TRUNCATE TABLE isbarstyta");
    }
}



///pin top
$taimux2 = date("Y-m-d");
if ($taimux2 != $nust['pin_time']) {
    $prize = $nust['lotery_priz'];


    $query = mysqli_query($conn, "SELECT * FROM pinigai ORDER BY surinkta DESC LIMIT 1");
    while ($row = mysqli_fetch_assoc($query)) {
        $xdd++;
        if ($xdd == 1) {
            mysqli_query($conn, "INSERT INTO pm SET what='SISTEMA', txt='Sveikinu, surinkai šiandien daugiausiai  $pinigaii , gauni 1000 $eurui ! ', time='" . time() . "', gavejas='$row[nick]', nauj='NEW'") || die(mysqli_error());

            mysqli_query($conn, "UPDATE zaidejai SET sms_litai=sms_litai+'1000' WHERE nick='$row[nick]'") || die(mysqli_error());
        }


        $laix2 = date("Y-m-d");
        mysqli_query($conn, "UPDATE nustatymai SET pin_time='$laix2' ") || die(mysqli_error());
        mysqli_query($conn, "TRUNCATE TABLE pinigai");
    }
}



// Savaitės kovų TOP'as


if ($nust['savaites_topas_liko'] - time() < 0) {

    $query = mysqli_query($conn, "SELECT * FROM s_top ORDER BY (0+ vksm) DESC LIMIT 3");
    while ($row = mysqli_fetch_assoc($query)) {
        $priz = $nust['savdtop_priz'];
        $priz2 = round($nust['savdtop_priz'] / 2);
        $priz3 = round($nust['savdtop_priz'] / 3);
        $prizz = $nust['savdtop_priz2'];
        $prizz2 = round($nust['savdtop_priz2'] / 2);
        $prizz3 = round($nust['savdtop_priz2'] / 3);
        $vt++;

        if ($vt == 1) {
            mysqli_query($conn, "UPDATE zaidejai SET sms_litai=sms_litai+'$prizz', vipticket=vipticket+'$prizz' WHERE nick='$row[nick]'");
            mysqli_query($conn, "INSERT INTO pm SET what='SISTEMA', txt='Sveikas, savaitės kovų TOPe užėmiai pirmą vietą ir gavai <b>" . $priz . "</b> $eur ir <b>" . $prizz . " $vipt ! ', time='" . time() . "', gavejas='$row[nick]', nauj='NEW'") || die(mysqli_error());
            mysqli_query($conn, "INSERT INTO medaliai SET nick='$row[nick]', medalis='10', uz='Laimėtą savaitės veiksmų topą', laikas='" . time() . "' ");
        }
        if ($vt == 2) {
            mysqli_query($conn, "UPDATE zaidejai SET sms_litai=sms_litai+'$priz2' WHERE nick='$row[nick]'");
            mysqli_query($conn, "INSERT INTO pm SET what='SISTEMA', txt='Sveikas, savaitės kovų TOPe užėmiai antrą vietą ir gavai <b>" . $priz2 . "</b> $eurui ! ', time='" . time() . "', gavejas='$row[nick]', nauj='NEW'") || die(mysqli_error());
        }
        if ($vt == 3) {
            mysqli_query($conn, "UPDATE zaidejai SET sms_litai=sms_litai+'$priz3' WHERE nick='$row[nick]'");
            mysqli_query($conn, "INSERT INTO pm SET what='SISTEMA', txt='Sveikas  savaitės kovų TOPe užėmiai trečią vietą ir gavai <b>" . $priz3 . "</b> $eurui ! ', time='" . time() . "', gavejas='$row[nick]', nauj='NEW'") || die(mysqli_error());
        }

    }
    $naujas_pr = mt_rand(10000, 25000);
    $naujas_pr2 = mt_rand(10000, 100000);

    mysqli_query($conn, "UPDATE nustatymai SET savdtop_priz='$naujas_pr', savdtop_priz2='$naujas_pr2' ") || die(mysqli_error());
    $time = time() + 60 * 60 * 24 * 7;
    mysqli_query($conn, "UPDATE nustatymai SET savaites_topas_liko = '$time'");
    mysqli_query($conn, "TRUNCATE TABLE s_top");

}





//fight machine
$ho = date("Y-m-d");
if ($ho != $nust['m_time']) {

    $l = random_int(100, 300);


    $query = mysqli_query($conn, "SELECT * FROM machine ORDER BY smugis DESC LIMIT 1");
    while ($row = mysqli_fetch_assoc($query)) {
        $go++;
        if ($go == 1) {
            mysqli_query($conn, "INSERT INTO pm SET what='SISTEMA', txt='Sveikinu, įkirtai didžiausią smūgi gauni $l " . $euro . "', time='" . time() . "', gavejas='$row[nick]', nauj='NEW'") || die(mysqli_error());
            mysqli_query($conn, "INSERT INTO medaliai SET nick='$row[nick]', medalis='9', uz='Už suduota didžiausią sumugį kovu simuliatoriuje', laikas='" . time() . "' ");
            mysqli_query($conn, "UPDATE zaidejai SET sms_litai=sms_litai+'$l' WHERE nick='$row[nick]'") || die(mysqli_error());
        }


        $lx = date("Y-m-d");
        mysqli_query($conn, "UPDATE nustatymai SET m_time='$lx' ") || die(mysqli_error());
        mysqli_query($conn, "TRUNCATE TABLE machine");
    }
}


##########################
$laikz = date("Y-m-d");
if ($laikz != $nust['quest']) {
    $naujas_pr = mt_rand(35, 50);
    $laikaszz = date("Y-m-d");

    $randas1 = random_int(1, 11);
    $randas2 = random_int(10, 30);
    $randas3 = random_int(100, 300);
    $randas4 = '1';
    mysqli_query($conn, "UPDATE zaidejai SET daily=''");
    mysqli_query($conn, "UPDATE quest SET valiuta='$randas1', atlygis='$randas2', reike='$randas3', ko='$randas4', snd='' WHERE nick='$nick' ");
    mysqli_query($conn, "UPDATE nustatymai SET quest='$laikaszz' ") || die(mysqli_error());


}



############### turgus $$$$$$$$$$$$$$$$$$$$$
$prek_inf = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM turgus"));
if ($prek_inf['laikas'] < time() && $prek_inf['kaina'] == 'sms_litai') {
    mysqli_query($conn, "UPDATE zaidejai SET sms_litai=sms_litai+'$prek_inf[kiek]' WHERE nick='$prek_inf[nick]'") || die(mysqli_error());
    $zinute = "Per 5 valandas tavo prek&#279;s turguje niekas nenupirko, tad tau jin gra&#382;inama. ";
    mysqli_query($conn, "INSERT INTO pm SET gavejas='$prek_inf[nick]', what='SISTEMA', txt='$zinute', time='" . time() . "', nauj='NEW'");
    mysqli_query($conn, "DELETE FROM turgus WHERE id='$prek_inf[id]'");
}

////////// komandu dienos topas////
$k_l = date("Y-m-d");
if ($k_l != $nust['kom_dtop']) {

    $query = mysqli_query($conn, "SELECT * FROM komandu_dtop WHERE team != '" . $nust['last2'] . "' ORDER BY laimejo_kovu DESC LIMIT 3");
    while ($row = mysqli_fetch_assoc($query)) {
        $vtas++;
        if ($vtas == 1) {

            mysqli_query($conn, "INSERT INTO teammedal SET pavadinimas='$row[team]', medalis='1', uz='Pirma vieta komandos dienos kovų tope!',bonusas='2x pinigu kovu zonoi visai komandai dienai!', laikas='" . time() . "' ") || die(mysqli_error());
            mysqli_query($conn, "INSERT INTO komandos_dtop_log SET pavadinimas='$row[team]', laimejo='$row[laimejo_kovu]', laikas='" . time() . "' ") || die(mysqli_error());
            mysqli_query($conn, "UPDATE team SET pinigai=pinigai+'1000000000', eurai=eurai+'50', laimetu_dtop=laimetu_dtop+'1' WHERE pavadinimas='$row[team]'") || die(mysqli_error());
            $timxx = time() + 60 * 60 * 24;
            mysqli_query($conn, "UPDATE team SET dienosmedaltime='$timxx', dienosmedal=dienosmedal+'1' WHERE pavadinimas='$row[team]' ");
            mysqli_query($conn, "UPDATE nustatymai SET laimejo_kovu='$row[laimejo_kovu]' ");
            mysqli_query($conn, "UPDATE nustatymai SET last2='$row[team]'");
        }
        if ($vtas == 2) {

            mysqli_query($conn, "INSERT INTO teammedal2 SET pavadinimas='$row[team]', medalis='3', uz='Antra vieta komandos dienos kovų tope!',bonusas='1.5x pinigu kovu zonoi visai komandai dienai!', laikas='" . time() . "' ") || die(mysqli_error());

            mysqli_query($conn, "UPDATE team SET pinigai=pinigai+'500000000', eurai=eurai+'30' WHERE pavadinimas='$row[team]'") || die(mysqli_error());
            $timxx = time() + 60 * 60 * 24;
            mysqli_query($conn, "UPDATE team SET dienosmedaltime2='$timxx', dienosmedal2=dienosmedal2+'1' WHERE pavadinimas='$row[team]' ");


        }
        if ($vtas == 3) {

            mysqli_query($conn, "INSERT INTO teammedal3 SET pavadinimas='$row[team]', medalis='4', uz='Trečia vieta komandos dienos kovų tope!',bonusas='1.2x pinigu kovu zonoi visai komandai dienai!', laikas='" . time() . "' ") || die(mysqli_error());

            mysqli_query($conn, "UPDATE team SET pinigai=pinigai+'300000000', eurai=eurai+'15' WHERE pavadinimas='$row[team]'") || die(mysqli_error());
            $timxx = time() + 60 * 60 * 24;
            mysqli_query($conn, "UPDATE team SET dienosmedaltime3='$timxx', dienosmedal3=dienosmedal3+'1' WHERE pavadinimas='$row[team]' ");


        }

        $k_l_d = date("Y-m-d");
        mysqli_query($conn, "UPDATE nustatymai SET kom_dtop='$k_l_d' ") || die(mysqli_error());
        mysqli_query($conn, "TRUNCATE TABLE komandu_dtop");
    }
}
/// savaites komandos top
if ($nust['kom_sav_liko'] - time() < 0) {

    $query = mysqli_query($conn, "SELECT * FROM komandu_sav_dtop ORDER BY laimejo_kovu DESC LIMIT 1");
    while ($row = mysqli_fetch_assoc($query)) {
        $vtas++;
        if ($vtas == 1) {

            mysqli_query($conn, "INSERT INTO teammedals SET pavadinimas='$row[team]', medalis='2', uz='Pirma vieta komandos Savaitės kovų tope!',bonusas='3x pinigu kovu zonoi visai komandai savaitei!', laikas='" . time() . "' ") || die(mysqli_error());
            mysqli_query($conn, "UPDATE team SET pinigai=pinigai+'10000000000', eurai=eurai+'500' WHERE pavadinimas='$row[team]'") || die(mysqli_error());
            $timxx = time() + 60 * 60 * 24 * 7;
            mysqli_query($conn, "UPDATE team SET savmedaltime='$timxx', savmedal=savmedal+'1' WHERE pavadinimas='$row[team]' ");
            mysqli_query($conn, "UPDATE nustatymai SET laimejo_kovu2='$row[laimejo_kovu]' ");
            mysqli_query($conn, "UPDATE nustatymai SET last3='$row[team]'");
        }

        $time = time() + 60 * 60 * 24 * 7;

        mysqli_query($conn, "UPDATE nustatymai SET kom_sav_liko='$time' ") || die(mysqli_error());
        mysqli_query($conn, "TRUNCATE TABLE komandu_sav_dtop");
    }
}

function autoReset($level): void
{
    global $conn;
    $playersCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM zaidejai WHERE lygis >= '$level'"));
    if (!$playersCount) {
        return;
    }

    mysqli_query($conn, "UPDATE zaidejai SET litai='50000', kred='20', sms_litai='10', css='2', jega='60', gynyba='180', gyvybes='100', max_gyvybes='100', exp='0', expl='50', minichatas='1', mini_chat='1', lygis='1',kai ='-' ,rodymas='10', auksiniai='0', laimeta='0', laimetapl='0', pralaimetapl='0', pralaimeta='0', sword='Neuzdetas', armor='Neuzdetas', amuletas='Neuzdetas', vipticket='0', zvejybosr = 50, malkur = 50,
                vipas2 = '',
                vipas3 = '',
                vipas4 = '',
                vipas5 = '',
                vipas6 = '',
                vipas7 = '',
                vipas8 = '',
                vipas9 = '',
                vipas10 = '',
                vipas11 = '',
                vipas12 = '',
                vipas13 = '',
                vipas14 = '',
                vipas15 = '',
                vipas16 = '',
                vipas17 = '',
                vipas18 = '',
                vipas19 = '',
                vipas20 = '',
                vipas21 = '',
                vipas22 = '',
                vipas23 = '',
                vipas24 = '',
                vipas25 = '',
                vipas26 = '',
                daily_mission_token = 0,
                jungle_king_token = 0,
                b_ltl = 0,
                b_zenu = 0,
                kasimolvl = 0,
                critical = 0,
                botas = 0,
                ad16 = '',
                ad17 = '',
                ad18 = '',
                ad19 = '',
                ad20 = '',
                kovu_misijos = 1,
                veiksmai = 0,
                istorija = 1,
                sagos = 1,
                namekm = 1,
                kasimom = 1,
                nukirtobosu = 0,
                online_time = 0,
                taskai = 0,
                chate = 0
               ") || die(mysqli_error());
    mysqli_query($conn, "TRUNCATE TABLE inv");
    mysqli_query($conn, "TRUNCATE TABLE jungle_king_bosses");
    mysqli_query($conn, "TRUNCATE TABLE user_daily_mission");
    mysqli_query($conn, "TRUNCATE TABLE team_logas");
    mysqli_query($conn, "TRUNCATE TABLE teammedal");
    mysqli_query($conn, "TRUNCATE TABLE teammedal2");
    mysqli_query($conn, "TRUNCATE TABLE teammedals");
    mysqli_query($conn, "TRUNCATE TABLE team");
    mysqli_query($conn, "TRUNCATE TABLE team_nariai");
    mysqli_query($conn, "TRUNCATE TABLE medaliai");
    mysqli_query($conn, "TRUNCATE TABLE arenos_log");
    mysqli_query($conn, "TRUNCATE TABLE perved_log");
    mysqli_query($conn, "TRUNCATE TABLE pasiekimai");
    mysqli_query($conn, "TRUNCATE TABLE technikos");
    mysqli_query($conn, "TRUNCATE TABLE transformacijos");
    mysqli_query($conn, "TRUNCATE TABLE auros");
    mysqli_query($conn, "TRUNCATE TABLE susijungimas");
    mysqli_query($conn, "TRUNCATE TABLE misijos");
    mysqli_query($conn, "TRUNCATE TABLE tikslas");
    mysqli_query($conn, "TRUNCATE TABLE callbacks");
    mysqli_query($conn, "TRUNCATE TABLE komandos_dtop_log");
    mysqli_query($conn, "TRUNCATE TABLE komandu_sav_dtop");
    mysqli_query($conn, "TRUNCATE TABLE komandu_dtop");
    mysqli_query($conn, "TRUNCATE TABLE user");
    mysqli_query($conn, "TRUNCATE TABLE autoboss");
    mysqli_query($conn, "TRUNCATE TABLE player_actions");

    $message = 'Žaidėjai pasiekė maksimalų lygį, todėl buvo įvykdytas automatinis žaidimo restartas.';
    mysqli_query($conn, "INSERT INTO pokalbiai SET nick='SISTEMA', sms='$message', data='" . time() . "'");
}



\LegacyDbz\Core\Logger::logInfo('Cron job ended in file: ' . basename(__FILE__));