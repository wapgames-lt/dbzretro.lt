<?php

/**
 * HEADER
 */
include_once 'parts/head.php';
include_once '../config/mission-config.php';
include_once '../config/settings.php';

$newMissions = mysql_num_rows(mysql_query("SELECT * FROM user_daily_mission WHERE user_id = $apie[id] AND status='new' AND DATE(created_at) = '$date'"));
$completedMissions = mysql_num_rows(mysql_query("SELECT * FROM user_daily_mission WHERE user_id = $apie[id] AND status = 'done' AND DATE(created_at) = '$date'"));

/**
 * CONTENT
 */
if (!isset($id)) {
    echo '<div class="meniuc">
<b>Legendinės Dienos Misijos</b> - kiekvieną dieną gali gauti naują misiją, misiją gausi pagal savo lygį ir resursus.
</div>';
    if ($apie['daily_mission_token'] > 0) {
        echo '<div class="meniuc">
<img src="../assets/img/shop.png" width="18" height="18"> 
<a href="index.php?id=shop"><font color="red">Tokenų keitykla</font></a>
</div>';
    }

    echo '<div class="meniu">';
    if (!$newMissions) {
        echo '<img src="../assets/img/quest.png"> <a href="index.php?id=getMission"><font color="red">Gauti misiją</font></a>';
    } else {
        echo 'Vykdomos misijos: <br><br>';

        $q = mysql_query("SELECT * FROM user_daily_mission WHERE user_id = $apie[id] AND status='new' AND DATE(created_at) = '$date'");
        while ($row = mysql_fetch_assoc($q)) {
            if ($missionConfig = getMissionById($row['mission_id'])) {
            echo '<img src="../assets/img/quest.png"> ';
            echo '<font color="red">' . $missionConfig['name'].'</font> <br><br>';
                $requirements = $missionConfig['requirements'];
                renderRequirements($requirements);
                echo 'Atlygis įvykdžius misiją:<br><br>';
                if ($row['defence']) {
                    echo '<img src="../assets/img/reward.png"> Gynybos: '. skaicius($row['defence']);
                    echo '<br>';
                }
                if ($row['power']) {
                    echo '<img src="../assets/img/reward.png"> Jėgos: '. skaicius($row['power']);
                    echo '<br>';
                }
                if ($row['euro']) {
                    echo '<img src="../assets/img/reward.png"> Eurų: '. sk($row['euro']);
                    echo '<br>';
                }
                if ($row['exp']) {
                    echo '<img src="../assets/img/reward.png"> Exp: '. skaicius($row['exp']);
                    echo '<br>';
                }
                if ($row['vipticket']) {
                    echo '<img src="../assets/img/reward.png"> Vip ticketų: '. sk($row['vipticket']);
                    echo '<br>';
                }
                if ($row['token']) {
                    echo '<img src="../assets/img/reward.png"> Tokenų: <font color="red">'. sk($row['token']) . '</font>';
                    echo '<br>';
                }
                echo '<br>';
                echo $arrow;
                echo ' <a href="index.php?id=completeMission&missionId=' .$row['mission_id'].'"><font color="red">Įvykdyti misiją</font></a><br>';
            } else {
                echo "Misija nerasta.";
            }
        }
    }
    echo '</div>';

    if ($completedMissions) {
        echo '<div class="meniu">';
        echo '['. $completedMissions . '/' . getConfigValueByName('missions_per_day'). '] ';
        echo 'Įvykdytos misijos: <br><br>';

        $q = mysql_query("SELECT * FROM user_daily_mission WHERE user_id = $apie[id] AND status = 'done' AND DATE(created_at) = '$date'");
        while ($row = mysql_fetch_assoc($q)) {
            if ($missionConfig = getMissionById($row['mission_id'])) {
                echo $checked;
                echo $missionConfig['name'].' <br>';
            }
        }
        echo '</div>';
    }

    renderTopMissionExecutors();
    renderTopPlayersByTokens();

    $g_n[] = array("/pagrindinis.php?id=","Pagrindinis","Dienos misijos");
    navigacija($g_n);
}

if ($id === 'getMission') {
    $mission = getRandomMission($apie);
    if ($newMissions) {
        echo '<div class="meniu">';
        echo 'Jau turite misiją.
</div>';
    } elseif ($completedMissions === (int)getConfigValueByName('missions_per_day')) {
        echo '<div class="meniu">';
        echo 'Jau įvykdėte visas dienos misijas.
</div>';
    } elseif (!$mission) {
        echo '<div class="meniu">';
        echo 'Jūsų lygiui misijos nesukonfiguruotos, kreipkitės į administraciją.
</div>';
    } else {
        $requirements = $mission['requirements'];
        $missionName = $mission['name'];
        $rewards = $mission['rewards'];
        echo '<div class="meniuc">';
        echo 'Jūs gavote naują misiją: <font color="red">' . $missionName . '</font></div>';
        echo '<div class="meniu">';
        renderRequirements($requirements);
        handleRewards($rewards, $mission);
        echo '</div>';
    }

    $g_n[] = array("index.php","Dienos Misijos","Gauti Misiją");
    navigacija($g_n);
}

/**
 * COMPLETE MISSION
 */
if ($id === 'completeMission') {
    $missionId = isset($_GET['missionId']) ? preg_replace('/\D/',"",$_GET['missionId'])  : null;
    $missionConfig = getMissionById($missionId);
    $missionName = isset($missionConfig['name']) ? $missionConfig['name'] : null;
    $requirements = $missionConfig ? $missionConfig['requirements'] : [];
    $rewards = mysql_fetch_assoc(mysql_query("SELECT * FROM user_daily_mission WHERE status='new' AND user_id='$apie[id]' AND mission_id = '$missionId' AND DATE(created_at) = '$date'"));

    echo '<div class="meniu">';
    if (!$requirements || !$missionName) {
        echo 'Bloga misijos konfigūracija';
    } elseif(!$rewards) {
        echo 'Už šią misiją atlygį jau gavai';
    }
    else {
        $error = false;
        if ($requirements['winFights']) {
            $dtop2 = mysql_fetch_assoc(mysql_query("SELECT * FROM dtop WHERE nick='$nick'"));
            $dontHave = $requirements['winFights'] > $dtop2['vksm'];
            if ($dontHave) {
                $value = $requirements['winFights'] - $dtop2['vksm'];
                echo $arrow;
                echo 'Trūksta padarytų veiksmų: '.$value;
                echo '<br>';
                $error = true;
            }
        }
        if ($requirements['wood']) {
            $dontHave = $requirements['wood'] > $inv['Malkos'];
            if ($dontHave) {
                $value = $requirements['wood'] - $inv['Malkos'];
                echo $arrow;
                echo 'Trūksta malkų: '.$value;
                echo '<br>';
                $error = true;
            }
        }
        if ($requirements['fish']) {
            $dontHave = $requirements['fish'] > $inv['Zuvis'];
            if ($dontHave) {
                $value = $requirements['fish'] - $inv['Zuvis'];
                echo $arrow;
                echo 'Trūksta žuvies: '.$value;
                echo '<br>';
                $error = true;
            }
        }
        if ($requirements['tinOre']) {
            $dontHave = $requirements['tinOre'] > $inv['alavas'];
            if ($dontHave) {
                $value = $requirements['tinOre'] - $inv['alavas'];
                echo $arrow;
                echo 'Trūksta alavo: '.$value;
                echo '<br>';
                $error = true;
            }
        }
        if ($requirements['sayiantail']) {
            $dontHave = $requirements['sayiantail'] > $inv['Sayiantail'];
            if ($dontHave) {
                $value = $requirements['sayiantail'] - $inv['Sayiantail'];
                echo $arrow;
                echo 'Trūksta sayiantail: '.$value;
                echo '<br>';
                $error = true;
            }
        }
        if ($requirements['fusionfail']) {
            $dontHave = $requirements['fusionfail'] > $inv['Fusionfail'];
            if ($dontHave) {
                $value = $requirements['fusionfail'] - $inv['Fusionfail'];
                echo $arrow;
                echo 'Trūksta fusionfail: '.$value;
                echo '<br>';
                $error = true;
            }
        }
        if ($requirements['stone']) {
            $dontHave = $requirements['stone'] > $inv['Stone'];
            if ($dontHave) {
                $value = $requirements['stone'] - $inv['Stone'];
                echo $arrow;
                echo 'Trūksta stone: '.$value;
                echo '<br>';
                $error = true;
            }
        }
        if ($requirements['cadmiumOre']) {
            $dontHave = $requirements['cadmiumOre'] > $inv['kadmis'];
            if ($dontHave) {
                $value = $requirements['cadmiumOre'] - $inv['kadmis'];
                echo $arrow;
                echo 'Trūksta kadmio: '.$value;
                echo '<br>';
                $error = true;
            }
        }
        if ($requirements['quartzOre']) {
            $dontHave = $requirements['quartzOre'] > $inv['kvarcas'];
            if ($dontHave) {
                $value = $requirements['quartzOre'] - $inv['kvarcas'];
                echo $arrow;
                echo 'Trūksta kvarco: '.$value;
                echo '<br>';
                $error = true;
            }
        }
        if ($requirements['titanOre']) {
            $dontHave = $requirements['titanOre'] > $inv['titanas'];
            if ($dontHave) {
                $value = $requirements['titanOre'] - $inv['titanas'];
                echo $arrow;
                echo 'Trūksta titano: '.$value;
                echo '<br>';
                $error = true;
            }
        }
        if ($requirements['microshem']) {
            $dontHave = $requirements['microshem'] > $inv['Microshem'];
            if ($dontHave) {
                $value = $requirements['microshem'] - $inv['Microshem'];
                echo $arrow;
                echo 'Trūksta mikroschemų: '.$value;
                echo '<br>';
                $error = true;
            }
        }

        // Success
        if (!$error) {
            startTransaction();
           $update1 = mysql_query("UPDATE inv SET
                Microshem=Microshem-'$requirements[microshem]',
                titanas=titanas-'$requirements[titanOre]',
                kvarcas=kvarcas-'$requirements[quartzOre]',
                kadmis=kadmis-'$requirements[cadmiumOre]',
                Stone=Stone-'$requirements[stone]',
                Sayiantail=Sayiantail-'$requirements[sayiantail]',
                Fusionfail=Fusionfail-'$requirements[fusionfail]',
                alavas=alavas-'$requirements[tinOre]',
                Zuvis=Zuvis-'$requirements[fish]',
                Malkos=Malkos-'$requirements[wood]'
            WHERE nick='$apie[nick]'");

            $update2 = mysql_query("UPDATE user_daily_mission SET status = 'done' WHERE user_id='$apie[id]' AND mission_id = '$missionId' AND DATE(created_at) = '$date'");

            $update3 = mysql_query("UPDATE zaidejai SET
                sms_litai=sms_litai+'$rewards[euro]',
                exp=exp+$rewards[exp],
                jega=jega+'$rewards[power]',
                gynyba=gynyba+'$rewards[defence]',
                vipticket=vipticket+'$rewards[vipticket]',
                daily_mission_token=daily_mission_token+'$rewards[token]'
            WHERE nick='$apie[nick]'");

            mysql_query("UPDATE player_daily_mission_top SET completed_missions = completed_missions+'1' WHERE nick='$nick'");

            $message = $apie['nick'].' įvykdė legendinę dienos misiją('.$missionName.') ';
            if ($rewards['euro'] > 2000) {
                $message .= 'Gavo: '.$rewards['euro'] . ' eurų';
            }

            $expiresAt = date('Y-m-d H:i:s', strtotime(' + 1 hours'));
            $insert1 = mysql_query("INSERT INTO pokalbiai SET nick='SISTEMA', sms='$message', data='".time()."', expired_at='$expiresAt'");


            // ugly lvl calculation(wap gay code)
            $kiek_exp = $rewards['exp'] + $apie['exp'];
            $lvlas = 99999;
            $enda = 99999;
            $qq = 1.1;
            for ($rr = 1; $rr < 99999; $rr++) {
                if ($rr == 1) {
                    $qq = 1.4;
                } else {
                    $qq = $qq * 1.4;
                }
                if ($qq >= $kiek_exp / 10 && $enda != $rr) {
                    $lvlas = $rr;
                    $enda = $rr + 1;
                    $buves = $qq;
                }
                if ($enda == $rr) {
                    $left = round($buves * 2, 1);
                    break;
                }
            }
            mysql_query("UPDATE zaidejai SET exp=exp+'$rewards[exp]', lygis='$lvlas',expl='$left', expl2='$left*3.53' WHERE nick='$apie[nick]'");

            if ($update1 && $update2 && $update3 && $insert1) {
                commitTransaction();
                echo $checked;
                echo 'Misija įvykdyta.';

                $image = getRandomRewardImage($missionConfig);
                if ($image) {
                    echo '<br>';
                    echo '<img width="100" src="../assets/img/'. $image .'">';
                }
            } else {
                rollbackTransaction();
                echo 'Įvyko klaida kreipkitės į administratorių.';
            }
            echo '<br>';
        }
    }
    echo '</div>';

    $g_n[] = array("index.php","Dienos Misijos","Įvykdyti Misiją");
    navigacija($g_n);
}

/**
 * SHOP
 */
if ($id === 'shop') {
    echo '<div class="meniuc">';
    echo '<img src="../assets/img/shop.png" width="20" height="20"> Tokenų keitykla';
    echo '</div>';
    echo '<div class="meniuc">';
    echo '<img src="../assets/img/tokens.png" style="vertical-align: middle;"> <font color="green">'.$apie['daily_mission_token'].'</font>';
    echo '</div>';
    echo '<div class="meniuc"><font color="red">1</font> token -  <font color="red"><b>'.skaicius(500).'</b></font> Majinsroll</div>';
    echo '<div class="meniuc">
        <form action="?id=changeToMajinScroll" method="post"/>
        Kiek tokenų iškeisite:<br />
        <input type="number" value="'.$apie['daily_mission_token'].'" min="1" max="'.$apie['daily_mission_token'].'" name="tokens"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>';

    echo '<div class="meniuc"><font color="red">1</font> token -  <font color="red"><b>'.skaicius(500).'</b></font> Magic ball</div>';
    echo '<div class="meniuc">
        <form action="?id=changeToMagicBall" method="post"/>
        Kiek tokenų iškeisite:<br />
        <input type="number" value="'.$apie['daily_mission_token'].'" min="1" max="'.$apie['daily_mission_token'].'" name="tokens"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>';

    echo '<div class="meniuc"><font color="red">1</font> token -  <font color="red"><b>'.skaicius(500).'</b></font> Power stone</div>';
    echo '<div class="meniuc">
        <form action="?id=changeToPowerStone" method="post"/>
        Kiek tokenų iškeisite:<br />
        <input type="number" value="'.$apie['daily_mission_token'].'" min="1" max="'.$apie['daily_mission_token'].'" name="tokens"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>';

    echo '<div class="meniuc"><font color="red">1</font> token -  <font color="red"><b>'.skaicius(500).'</b></font> Energy stone</div>';
    echo '<div class="meniuc">
        <form action="?id=changeToEnergyStone" method="post"/>
        Kiek tokenų iškeisite:<br />
        <input type="number" value="'.$apie['daily_mission_token'].'" min="1" max="'.$apie['daily_mission_token'].'" name="tokens"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>';

    echo '<div class="meniuc"><font color="red">1</font> token -  <font color="red"><b>'.skaicius(500).'</b></font> Soul</div>';
    echo '<div class="meniuc">
        <form action="?id=changeToSoul" method="post"/>
        Kiek tokenų iškeisite:<br />
        <input type="number" value="'.$apie['daily_mission_token'].'" min="1" max="'.$apie['daily_mission_token'].'" name="tokens"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>';

    echo '<div class="meniuc"><font color="red">1</font> token -  <font color="red"><b>'.skaicius(3000).'</b></font> Kario tobulėjimo</div>';
    echo '<div class="meniuc">
        <form action="?id=changeToTobulas" method="post"/>
        Kiek tokenų iškeisite:<br />
        <input type="number" value="'.$apie['daily_mission_token'].'" min="1" max="'.$apie['daily_mission_token'].'" name="tokens"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>';

    echo '<div class="meniuc"><font color="red">1</font> token -  <font color="red"><b>'.skaicius(300).'</b></font> Angelo sparnai</div>';
    echo '<div class="meniuc">
        <form action="?id=changeToAngelWing" method="post"/>
        Kiek tokenų iškeisite:<br />
        <input type="number" value="'.$apie['daily_mission_token'].'" min="1" max="'.$apie['daily_mission_token'].'" name="tokens"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>';

    echo '<div class="meniuc"><font color="red">1</font> token -  <font color="red"><b>'.skaicius(200).'</b></font> Naikinimo Amulet Item</div>';
    echo '<div class="meniuc">
        <form action="?id=changeToNaikinimoAmuletItem" method="post"/>
        Kiek tokenų iškeisite:<br />
        <input type="number" value="'.$apie['daily_mission_token'].'" min="1" max="'.$apie['daily_mission_token'].'" name="tokens"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>';

    echo '<div class="meniuc"><font color="red">1</font> token -  <font color="red"><b>'.skaicius(100).'</b></font> Naikinimo galia</div>';
    echo '<div class="meniuc">
        <form action="?id=changeToNaikinti" method="post"/>
        Kiek tokenų iškeisite:<br />
        <input type="number" value="'.$apie['daily_mission_token'].'" min="1" max="'.$apie['daily_mission_token'].'" name="tokens"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>';

    $g_n[] = array("/pagrindinis.php?id=", "Pagrindinis", "index.php", "Legendinės dienos misijos", "Tokenų keitykla");
    navigacija($g_n);
}

if ($id === 'changeToMajinScroll') {
    online('Legendinių dienos misijų keitykloje > Keičia į MajinScroll');
    top('Tokenų keitimas į MajinScroll');


    if (isset($_POST['submit'])) {
        $tokens = isset($_POST['tokens']) ? preg_replace("/[^0-9]/", "", $_POST['tokens']) : null;
        $majinScroll = $tokens / 0.002;

        if (empty($tokens)) {
            echo '<div class="meniuc">Palikote tuščią laukelį!</div>';
        } elseif ($apie['daily_mission_token'] < $tokens) {
            echo '<div class="meniuc">Neturite pakankamai tokenų!</div>';
        } else {
            echo '<div class="meniuc">Išsikeitėte sėkmingai <font color="red"><b>'.sk($tokens).'</b></font> tokenų į <font color="red"><b>'.sk($majinScroll).'</b></font> MajinScroll</div> ';
            mysql_query("UPDATE zaidejai SET daily_mission_token=daily_mission_token-'$tokens' WHERE nick='$nick' ");
            mysql_query("UPDATE inv SET Majinsroll=Majinsroll+'$majinScroll' WHERE nick='$nick' ");
        }
    }

    $g_n[] = array("/pagrindinis.php?id=", "Pagrindinis", "index.php", "Legendinės dienos misijos", "index.php?id=shop", "Tokenų keitykla", "Tokenų keitimas");
    navigacija($g_n);
}

if ($id === 'changeToMagicBall') {
    online('Legendinių dienos misijų keitykloje > Keičia į MagicBall');
    top('Tokenų keitimas į MagicBall');


    if (isset($_POST['submit'])) {
        $tokens = isset($_POST['tokens']) ? preg_replace("/[^0-9]/", "", $_POST['tokens']) : null;
        $magicBall = $tokens / 0.002;

        if (empty($tokens)) {
            echo '<div class="meniuc">Palikote tuščią laukelį!</div>';
        } elseif ($apie['daily_mission_token'] < $tokens) {
            echo '<div class="meniuc">Neturite pakankamai tokenų!</div>';
        } else {
            echo '<div class="meniuc">Išsikeitėte sėkmingai <font color="red"><b>'.sk($tokens).'</b></font> tokenų į <font color="red"><b>'.sk($magicBall).'</b></font> Magic ball</div> ';
            mysql_query("UPDATE zaidejai SET daily_mission_token=daily_mission_token-'$tokens' WHERE nick='$nick' ");
            mysql_query("UPDATE inv SET Magicball=Magicball+'$magicBall' WHERE nick='$nick' ");
        }
    }

    $g_n[] = array("/pagrindinis.php?id=", "Pagrindinis", "index.php", "Legendinės dienos misijos", "index.php?id=shop", "Tokenų keitykla", "Tokenų keitimas");
    navigacija($g_n);
}

if ($id === 'changeToSoul') {
    online('Legendinių dienos misijų keitykloje > Keičia į Soul');
    top('Tokenų keitimas į Soul');


    if (isset($_POST['submit'])) {
        $tokens = isset($_POST['tokens']) ? preg_replace("/[^0-9]/", "", $_POST['tokens']) : null;
        $soul = $tokens / 0.002;

        if (empty($tokens)) {
            echo '<div class="meniuc">Palikote tuščią laukelį!</div>';
        } elseif ($apie['daily_mission_token'] < $tokens) {
            echo '<div class="meniuc">Neturite pakankamai tokenų!</div>';
        } else {
            echo '<div class="meniuc">Išsikeitėte sėkmingai <font color="red"><b>'.sk($tokens).'</b></font> tokenų į <font color="red"><b>'.sk($soul).'</b></font> Soul</div> ';
            mysql_query("UPDATE zaidejai SET daily_mission_token=daily_mission_token-'$tokens' WHERE nick='$nick' ");
            mysql_query("UPDATE inv SET Soul=Soul+'$soul' WHERE nick='$nick' ");
        }
    }

    $g_n[] = array("/pagrindinis.php?id=", "Pagrindinis", "index.php", "Legendinės dienos misijos", "index.php?id=shop", "Tokenų keitykla", "Tokenų keitimas");
    navigacija($g_n);
}

if ($id === 'changeToTobulas') {
    online('Legendinių dienos misijų keitykloje > Keičia į Kario tobulėjimą');
    top('Tokenų keitimas į Kario tobulėjimą');


    if (isset($_POST['submit'])) {
        $tokens = isset($_POST['tokens']) ? preg_replace("/[^0-9]/", "", $_POST['tokens']) : null;
        $tobulas = (int)($tokens / 0.000333333);

        if (empty($tokens)) {
            echo '<div class="meniuc">Palikote tuščią laukelį!</div>';
        } elseif ($apie['daily_mission_token'] < $tokens) {
            echo '<div class="meniuc">Neturite pakankamai tokenų!</div>';
        } else {
            echo '<div class="meniuc">Išsikeitėte sėkmingai <font color="red"><b>'.sk($tokens).'</b></font> tokenų į <font color="red"><b>'.sk($tobulas).'</b></font> Kario tobulėjimo</div> ';
            mysql_query("UPDATE zaidejai SET daily_mission_token=daily_mission_token-'$tokens' WHERE nick='$nick' ");
            mysql_query("UPDATE inv SET tobulas=tobulas+'$tobulas' WHERE nick='$nick' ");
        }
    }

    $g_n[] = array("/pagrindinis.php?id=", "Pagrindinis", "index.php", "Legendinės dienos misijos", "index.php?id=shop", "Tokenų keitykla", "Tokenų keitimas");
    navigacija($g_n);
}

if ($id === 'changeToAngelWing') {
    online('Legendinių dienos misijų keitykloje > Keičia į Angelo sparnus');
    top('Tokenų keitimas į Angelo sparnus');


    if (isset($_POST['submit'])) {
        $tokens = isset($_POST['tokens']) ? preg_replace("/[^0-9]/", "", $_POST['tokens']) : null;
        $angelWings = (int)($tokens * 300);

        if (empty($tokens)) {
            echo '<div class="meniuc">Palikote tuščią laukelį!</div>';
        } elseif ($apie['daily_mission_token'] < $tokens) {
            echo '<div class="meniuc">Neturite pakankamai tokenų!</div>';
        } else {
            echo '<div class="meniuc">Išsikeitėte sėkmingai <font color="red"><b>'.sk($tokens).'</b></font> tokenų į <font color="red"><b>'.sk($angelWings).'</b></font> Angelo sparnų</div> ';
            mysql_query("UPDATE zaidejai SET daily_mission_token=daily_mission_token-'$tokens' WHERE nick='$nick' ");
            mysql_query("UPDATE inv SET angelwing=angelwing+'$angelWings' WHERE nick='$nick' ");
        }
    }

    $g_n[] = array("/pagrindinis.php?id=", "Pagrindinis", "index.php", "Legendinės dienos misijos", "index.php?id=shop", "Tokenų keitykla", "Tokenų keitimas");
    navigacija($g_n);
}

if ($id === 'changeToNaikinimoAmuletItem') {
    online('Legendinių dienos misijų keitykloje > Keičia į Naikinimo Amulet Item');
    top('Tokenų keitimas į Naikinimo Amulet Item');


    if (isset($_POST['submit'])) {
        $tokens = isset($_POST['tokens']) ? preg_replace("/[^0-9]/", "", $_POST['tokens']) : null;
        $naikinimoAmuletItem = (int)($tokens * 200);

        if (empty($tokens)) {
            echo '<div class="meniuc">Palikote tuščią laukelį!</div>';
        } elseif ($apie['daily_mission_token'] < $tokens) {
            echo '<div class="meniuc">Neturite pakankamai tokenų!</div>';
        } else {
            echo '<div class="meniuc">Išsikeitėte sėkmingai <font color="red"><b>'.sk($tokens).'</b></font> tokenų į <font color="red"><b>'.sk($naikinimoAmuletItem).'</b></font> Naikinimo Amulet Item</div> ';
            mysql_query("UPDATE zaidejai SET daily_mission_token=daily_mission_token-'$tokens' WHERE nick='$nick' ");
            mysql_query("UPDATE inv SET naikinimo_amulet_item=naikinimo_amulet_item+'$naikinimoAmuletItem' WHERE nick='$nick' ");
        }
    }

    $g_n[] = array("/pagrindinis.php?id=", "Pagrindinis", "index.php", "Legendinės dienos misijos", "index.php?id=shop", "Tokenų keitykla", "Tokenų keitimas");
    navigacija($g_n);
}

if ($id === 'changeToNaikinti') {
    online('Legendinių dienos misijų keitykloje > Keičia į Naikinimo galią');
    top('Tokenų keitimas į Naikinimo galią');


    if (isset($_POST['submit'])) {
        $tokens = isset($_POST['tokens']) ? preg_replace("/[^0-9]/", "", $_POST['tokens']) : null;
        $naikinimoGalia = (int)($tokens * 100);

        if (empty($tokens)) {
            echo '<div class="meniuc">Palikote tuščią laukelį!</div>';
        } elseif ($apie['daily_mission_token'] < $tokens) {
            echo '<div class="meniuc">Neturite pakankamai tokenų!</div>';
        } else {
            echo '<div class="meniuc">Išsikeitėte sėkmingai <font color="red"><b>'.sk($tokens).'</b></font> tokenų į <font color="red"><b>'.sk($naikinimoGalia).'</b></font> Naikinimo galią</div> ';
            mysql_query("UPDATE zaidejai SET daily_mission_token=daily_mission_token-'$tokens' WHERE nick='$nick' ");
            mysql_query("UPDATE inv SET naikinti=naikinti+'$naikinimoGalia' WHERE nick='$nick' ");
        }
    }

    $g_n[] = array("/pagrindinis.php?id=", "Pagrindinis", "index.php", "Legendinės dienos misijos", "index.php?id=shop", "Tokenų keitykla", "Tokenų keitimas");
    navigacija($g_n);
}

if ($id === 'changeToPowerStone') {
    online('Legendinių dienos misijų keitykloje > Keičia į Powerstone');
    top('Tokenų keitimas į Powerstone');


    if (isset($_POST['submit'])) {
        $tokens = isset($_POST['tokens']) ? preg_replace("/[^0-9]/", "", $_POST['tokens']) : null;
        $powerStone = $tokens / 0.002;

        if (empty($tokens)) {
            echo '<div class="meniuc">Palikote tuščią laukelį!</div>';
        } elseif ($apie['daily_mission_token'] < $tokens) {
            echo '<div class="meniuc">Neturite pakankamai tokenų!</div>';
        } else {
            echo '<div class="meniuc">Išsikeitėte sėkmingai <font color="red"><b>'.sk($tokens).'</b></font> tokenų į <font color="red"><b>'.sk($powerStone).'</b></font> Power stone</div> ';
            mysql_query("UPDATE zaidejai SET daily_mission_token=daily_mission_token-'$tokens' WHERE nick='$nick' ");
            mysql_query("UPDATE inv SET Powerstone=Powerstone+'$powerStone' WHERE nick='$nick' ");
        }
    }
}

if ($id === 'changeToEnergyStone') {
    online('Legendinių dienos misijų keitykloje > Keičia į Energy stone');
    top('Tokenų keitimas į Energy stone');


    if (isset($_POST['submit'])) {
        $tokens = isset($_POST['tokens']) ? preg_replace("/[^0-9]/", "", $_POST['tokens']) : null;
        $energyStone = $tokens / 0.002;

        if (empty($tokens)) {
            echo '<div class="meniuc">Palikote tuščią laukelį!</div>';
        } elseif ($apie['daily_mission_token'] < $tokens) {
            echo '<div class="meniuc">Neturite pakankamai tokenų!</div>';
        } else {
            echo '<div class="meniuc">Išsikeitėte sėkmingai <font color="red"><b>' . sk($tokens) . '</b></font> tokenų į <font color="red"><b>' . sk($energyStone) . '</b></font> Energy stone</div> ';
            mysql_query("UPDATE zaidejai SET daily_mission_token=daily_mission_token-'$tokens' WHERE nick='$nick' ");
            mysql_query("UPDATE inv SET Energystone=Energystone+'$energyStone' WHERE nick='$nick' ");
        }
    }

    $g_n[] = array("/pagrindinis.php?id=", "Pagrindinis", "index.php", "Legendinės dienos misijos", "index.php?id=shop", "Tokenų keitykla", "Tokenų keitimas");
    navigacija($g_n);
}

function renderRequirements(array $requirements)
{
    global $nick, $inv, $arrow, $checked;

    echo 'Kad įvykdytumėte misiją jums reikia atlikti šiuos veiksmus: <br><br>';
    if ($requirements['winFights']) {
        $dtop2 = mysql_fetch_assoc(mysql_query("SELECT * FROM dtop WHERE nick='$nick'"));
        $dontHave = $requirements['winFights'] > $dtop2['vksm'];
        $icon = $dontHave ? $arrow : $checked;
        echo $icon;
        echo ' Padaryti '.skaicius($requirements['winFights']).' veiksmų';
        if ($dontHave) {
            echo ' ('.(int)$dtop2['vksm'].'/'.(int)$requirements['winFights'].')';
        }
        echo '<br>';
    }
    if ($requirements['wood']) {
        $dontHave = $requirements['wood'] > $inv['Malkos'];
        $icon = $dontHave ? $arrow : $checked;
        echo $icon;
        echo ' Gauti '.skaicius($requirements['wood']).' malkų';
        if ($dontHave) {
            echo ' ('.(int)$inv['Malkos'].'/'.(int)$requirements['wood'].')';
        }
        echo '<br>';
    }
    if ($requirements['fish']) {
        $dontHave = $requirements['fish'] > $inv['Zuvis'];
        $icon = $dontHave ? $arrow : $checked;
        echo $icon;
        echo ' Gauti '.skaicius($requirements['fish']).' žuvies';
        if ($dontHave) {
            echo ' ('.(int)$inv['Zuvis'].'/'.(int)$requirements['fish'].')';
        }
        echo '<br>';
    }
    if ($requirements['tinOre']) {
        $dontHave = $requirements['tinOre'] > $inv['alavas'];
        $icon = $dontHave ? $arrow : $checked;
        echo $icon;
        echo ' Gauti '.skaicius($requirements['tinOre']).' alavo rūdos';
        if ($dontHave) {
            echo ' ('.(int)$inv['alavas'].'/'.(int)$requirements['tinOre'].')';
        }
        echo '<br>';
    }
    if ($requirements['sayiantail']) {
        $dontHave = $requirements['sayiantail'] > $inv['Sayiantail'];
        $icon = $dontHave ? $arrow : $checked;
        echo $icon;
        echo ' Gauti '.skaicius($requirements['sayiantail']).' sayiantail';
        if ($dontHave) {
            echo ' ('.(int)$inv['Sayiantail'].'/'.(int)$requirements['sayiantail'].')';
        }
        echo '<br>';
    }
    if ($requirements['fusionfail']) {
        $dontHave = $requirements['fusionfail'] > $inv['Fusionfail'];
        $icon = $dontHave ? $arrow : $checked;
        echo $icon;
        echo ' Gauti '.skaicius($requirements['fusionfail']).' fusionfail';
        if ($dontHave) {
            echo ' ('.(int)$inv['Fusionfail'].'/'.(int)$requirements['fusionfail'].')';
        }
        echo '<br>';
    }
    if ($requirements['stone']) {
        $dontHave = $requirements['stone'] > $inv['Stone'];
        $icon = $dontHave ? $arrow : $checked;
        echo $icon;
        echo ' Gauti '.skaicius($requirements['stone']).' stone';
        if ($dontHave) {
            echo ' ('.(int)$inv['Stone'].'/'.(int)$requirements['stone'].')';
        }
        echo '<br>';
    }
    if ($requirements['cadmiumOre']) {
        $dontHave = $requirements['cadmiumOre'] > $inv['kadmis'];
        $icon = $dontHave ? $arrow : $checked;
        echo $icon;
        echo ' Gauti '.skaicius($requirements['cadmiumOre']).' kadmio rūdos';
        if ($dontHave) {
            echo ' ('.(int)$inv['kadmis'].'/'.(int)$requirements['cadmiumOre'].')';
        }
        echo '<br>';
    }
    if ($requirements['titanOre']) {
        $dontHave = $requirements['titanOre'] > $inv['titanas'];
        $icon = $dontHave ? $arrow : $checked;
        echo $icon;
        echo ' Gauti '.skaicius($requirements['titanOre']).' titano rūdos';
        if ($dontHave) {
            echo ' ('.(int)$inv['titanas'].'/'.(int)$requirements['titanOre'].')';
        }
        echo '<br>';
    }
    if ($requirements['quartzOre']) {
        $dontHave = $requirements['quartzOre'] > $inv['kvarcas'];
        $icon = $dontHave ? $arrow : $checked;
        echo $icon;
        echo ' Gauti '.skaicius($requirements['quartzOre']).' kvarco rūdos';
        if ($dontHave) {
            echo ' ('.(int)$inv['kvarcas'].'/'.(int)$requirements['quartzOre'].')';
        }
        echo '<br>';
    }
    if ($requirements['microshem']) {
        $dontHave = $requirements['microshem'] > $inv['Microshem'];
        $icon = $dontHave ? $arrow : $checked;
        echo $icon;
        echo ' Gauti '.skaicius($requirements['microshem']).' mikroschemų';
        if ($dontHave) {
            echo ' ('.(int)$inv['Microshem'].'/'.(int)$requirements['microshem'].')';
        }
        echo '<br>';
    }

    echo '<br>';
}

function handleRewards(array $rewards, $mission)
{
    global $apie;

    echo 'Kokius prizus gausi įvykdęs misiją:<br><br>';

    $token = 0;
    $defence = 0;
    $power = 0;
    $euro = 0;
    $exp = 0;
    $vipTicket = 0;
    if ($tokenConfig = $rewards['token']) {
        $token = is_array($tokenConfig) ? mt_rand($tokenConfig[0], $tokenConfig[1]) : $tokenConfig;
        echo '<img src="../assets/img/reward.png"> Tokenų: '. $token;
        echo '<br>';
    }
    if ($euroConfig = $rewards['euro']) {
        $euro = is_array($euroConfig) ? mt_rand($euroConfig[0], $euroConfig[1]) : $euroConfig;
        echo '<img src="../assets/img/reward.png"> Eurų: '. $euro;
        echo '<br>';
    }
    if ($expConfig = $rewards['expPercentage']) {
        $expPercentage = is_array($expConfig) ? mt_rand($expConfig[0], $expConfig[1]) : $expConfig;
        $currentExp = max($apie['exp'], 10000);
        $exp = (($currentExp / 100) * $expPercentage);
        echo '<img src="../assets/img/reward.png"> Exp: '. skaicius($exp);
        echo '<br>';
    }
    if ($rewards['power']) {
        $randomPercentage = mt_rand(5, 20);
        $powerIncrease = calculatePowerIncreaseByPercentage($randomPercentage);
        $powerConfig = is_array($rewards['power']) ? mt_rand($rewards['power'][0], $rewards['power'][1]) : $rewards['power'];
        $power = resolveReward($powerIncrease, $powerConfig);
        echo '<img src="../assets/img/reward.png"> Jėgos: '. skaicius($power);
        echo '<br>';
    }
    if ($rewards['defence']) {
        $randomPercentage = mt_rand(5, 20);
        $defenceIncrease = calculateDefenceIncreaseByPercentage($randomPercentage);
        $defenceConfig = is_array($rewards['defence']) ? mt_rand($rewards['defence'][0], $rewards['defence'][1]) : $rewards['defence'];
        $defence = resolveReward($defenceIncrease, $defenceConfig);
        echo '<img src="../assets/img/reward.png"> Gynybos: '. skaicius($defence);
        echo '<br>';
    }
    if ($rewards['vipTicket']) {
        $vipTicket = is_array($rewards['vipTicket']) ? mt_rand($rewards['vipTicket'][0], $rewards['vipTicket'][1]) : $rewards['vipTicket'];
        echo '<img src="../assets/img/reward.png"> Vip ticketų: '. sk($vipTicket);
        echo '<br>';
    }
    // Insert reward to database
    $date = date('Y-m-d H:i:s');
    mysql_query("DELETE FROM `user_daily_mission` WHERE user_id='$apie[id]' AND status='new' AND DATE(created_at) <> '$date'")or die(mysql_error());
    mysql_query("INSERT INTO `user_daily_mission` (`user_id`, `mission_id`, `token`, `euro`, `exp`, `vipticket`, `defence`, `power`, `created_at`)
    VALUES ('".$apie['id']."', '$mission[id]', '$token', '$euro', $exp, '$vipTicket', '$defence', '$power', '$date')
    ") or die(mysql_error());

    echo '</div>';
}


function renderTopMissionExecutors()
{
    global $trophy;

    $allCompletedMissionsCount = mysql_num_rows(mysql_query("SELECT * FROM user_daily_mission WHERE status='done'"));
    if ($allCompletedMissionsCount) {
        echo '<div class="meniu">';
        echo $trophy;
        echo ' TOP vykdytojai<br><br>';
        $topUsers = mysql_query("SELECT COUNT(zaidejai.nick) as completed_missions, zaidejai.nick as nick FROM user_daily_mission INNER JOIN zaidejai ON user_daily_mission.user_id = zaidejai.id AND user_daily_mission.status = 'done' GROUP BY zaidejai.nick HAVING COUNT(zaidejai.nick) > 0 ORDER BY COUNT(zaidejai.nick) DESC LIMIT 3");
        $count = 1;
        while ($row = mysql_fetch_assoc($topUsers)) {
            echo $count++.'. ';
            echo $row['nick'];
            echo '('.$row['completed_missions'].')';
            echo '<br>';
        }
        echo '</div>';
    }
}

function renderTopPlayersByTokens()
{
    global $tokens;

    $userCount = mysql_num_rows(mysql_query("SELECT nick, daily_mission_token FROM `zaidejai` WHERE daily_mission_token > 0"));

    if ($userCount) {
        $users = mysql_query("SELECT nick, daily_mission_token FROM `zaidejai` WHERE daily_mission_token > 0 ORDER BY daily_mission_token DESC LIMIT 3");
        echo '<div class="meniu">';
        echo $tokens;
        echo ' Žaidėjai pagal tokenus<br><br>';
        $count = 1;
        while ($row = mysql_fetch_assoc($users)) {
            echo $count++.'. ';
            echo $row['nick'];
            echo '('.$row['daily_mission_token'].')';
            echo '<br>';
        }
        echo '</div>';
    }
}

/**
 * FOOTER
 */
include_once 'parts/footer.php';