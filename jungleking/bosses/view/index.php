<?php

/**
 * HEADER
 */

use LegacyDbz\Core\Collection;
use LegacyDbz\Skills\DTO\PlayerSkill;
use LegacyDbz\Skills\DTO\Skill;
use LegacyDbz\Skills\Repositories\PlayerSkillsRepository;

include_once 'parts/head.php';
include_once '../config/boss-config.php';
include_once '../config/settings.php';

$playerSkillsRepository = new PlayerSkillsRepository();
/** @var PlayerSkill[]|Collection $playerActiveBuffs */
$playerActiveBuffs = $playerSkillsRepository->getActiveBuffs($apie['id'], Skill::JUNGLE_KING_BOSSES_BUFFS);

$newMissions = mysql_num_rows(mysql_query("SELECT * FROM jungle_king_bosses WHERE user_id = $apie[id] AND (status = 'alive' OR status = 'prepared') AND DATE(created_at) = '$date'"));
$completedMissions = mysql_num_rows(mysql_query("SELECT * FROM jungle_king_bosses WHERE user_id = $apie[id] AND status = 'dead' AND DATE(created_at) = '$date'"));

/**
 * CONTENT
 */
if (!isset($id)) {
    echo '<div class="meniuc">
<b>Jungle King bosai</b> - Jungle King turnyro herojai meta Tau iššūkį. </b> 
</div>';
    if ($apie['jungle_king_token'] > 0) {
        echo '<div class="meniuc">
<img src="../assets/img/shop.png" width="18" height="18"> 
<a href="index.php?id=shop"><font color="red">Tokenų keitykla</font></a>
</div>';
    }

    echo '<div class="meniu">';
    if (!$newMissions) {
        echo '<img src="../assets/img/quest.png"> <a href="index.php?id=getMission"><font color="red">Gauti priešininką</font></a>';
    } else {
        echo 'Bosai: <br><br>';

        $q = mysql_query("SELECT * FROM jungle_king_bosses WHERE user_id = $apie[id] AND (status = 'alive' OR status = 'prepared') AND DATE(created_at) = '$date'");
        while ($row = mysql_fetch_assoc($q)) {
            if ($missionConfig = getBossById($row['boss_id'])) {
                echo '<img src="../assets/img/quest.png"> ';
                echo '<font color="red">' . $missionConfig['name'].'</font> <br><br>';
                if ($row['status'] === 'prepared') {
                    $requirements = $missionConfig['requirements'];
                    renderRequirements($requirements);
                }
                echo 'Atlygis nukovus bosą:<br><br>';
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
                if ($row['status'] === 'prepared') {
                    echo ' <a href="index.php?id=completeMission&bossId=' . $row['boss_id'] . '"><font color="red">Įvykdyti pasiruošimo misiją</font></a><br>';
                }
                if ($row['status'] === 'alive') {
                    echo ' <a href="index.php?id=attack&bossId=' . $row['boss_id'] . '"><font color="red">Kovoti</font></a><br>';
                }
            } else {
                echo "Bosas nerastas.";
            }
        }
    }
    echo '</div>';

    if ($completedMissions) {
        echo '<div class="meniu">';
        echo '['. $completedMissions . '/' . getConfigValueByName('missions_per_day'). '] ';
        echo 'Nukauti bosai: <br><br>';

        $q = mysql_query("SELECT * FROM jungle_king_bosses WHERE user_id = $apie[id] AND status = 'dead' AND DATE(created_at) = '$date'");
        while ($row = mysql_fetch_assoc($q)) {
            if ($missionConfig = getBossById($row['boss_id'])) {
                echo $checked;
                echo $missionConfig['name'].' <br>';
            }
        }
        echo '</div>';
    }

    renderTopBossKillers();
    renderTopPlayersByTokens();

    $g_n[] = array("/pagrindinis.php?id=","Pagrindinis","Jungle King bosai");
    navigacija($g_n);
}

if ($id === 'getMission') {
    $mission = getRandomBoss($apie);
    $requirements = $mission['requirements'];
    $missionName = $mission['name'];
    $rewards = $mission['rewards'];
    if ($newMissions) {
        echo '<div class="meniu">';
        echo 'Jau turite bosą.
</div>';
    } elseif ($completedMissions === (int)getConfigValueByName('missions_per_day')) {
        echo '<div class="meniu">';
        echo 'Nukovėte visus Jungle King bosus, pabandykite vėliau.
</div>';
    } elseif (!$mission || !$requirements || !$rewards) {
        echo '<div class="meniu">';
        echo 'Nerasta boso konfiūracija, kreipkitės į administraciją.
</div>';
    } else {
        echo '<div class="meniuc">';
        echo 'Jūs gavote naują bosą: <font color="red">' . $missionName . '</font></div>';
        echo '<div class="meniu">';
        renderRequirements($requirements);
        handleRewards($rewards, $mission);
        echo '</div>';
    }

    $g_n[] = array("index.php","Jungle King bosai","Gauti Misiją");
    navigacija($g_n);
}

/**
 * Attack boss
 */
if ($id === 'attack') {
    $KD = $_GET['KD'];
    $bossId = isset($_GET['bossId']) ? preg_replace('/\D/', "", $_GET['bossId']) : null;
    $bossConfig = getBossById($bossId);
    $playerHealth = round($apie['gyvybes']);
    $playerPower = round($apie['jega']);
    $playerDefence = round($apie['gynyba']);
    $playerMaxHealth = round($apie['max_gyvybes']);

    $boss = mysql_fetch_assoc(mysql_query("SELECT * FROM jungle_king_bosses WHERE status='alive' AND health > 0 AND user_id='$apie[id]' AND boss_id = '$bossId' AND DATE(created_at) = '$date'"));
    echo '<div class="meniu">';
    if (!$bossConfig) {
        echo 'Bloga boso konfigūracija, kreipkitės į administracija';
        return;
    } elseif (!$boss) {
        echo 'Šis bosas mirė.';
        return;
    } elseif (!$playerHealth) {
        echo 'Neturite gyvybių.';
        return;
    } elseif ($_SESSION['pad-jungle-king'] - time() > 0) {
        echo 'Padusai! Trenkti galėsi už <b>'.laikas($_SESSION['pad-jungle-king']-time(), 1).'</b>';
    }
    elseif($KD && (int) $KD !== $_SESSION['refresh-jungle-king']){
        echo 'Atnaujinti puslapio negalimą! Eikite atgal ir vėl trenkite.';
    } elseif (!$KD) {
        echo '<div class="meniuc">';
        echo '<b>' . $bossConfig['name'] . '</b> <br><br>';
        if ($bossConfig['videos']) {
            $video = getRandomVideo($bossConfig);
            echo' <div class="video-container">';
            echo ' <video controls height="360" autoplay>';
            echo '<source src="../assets/videos/'. $video .'" type="video/mp4">';
            echo '</video></div><br>';
        }
        echo 'Boso gyvybės: ' . $boss['health'] . '<br>';
        echo 'Tavo gyvybės: ' . $playerHealth . '<br>';
        echo '* Kovoti su bosais gali padėti Unikalūs armour ir sword.<br>';
        echo '</div>';
    } else {
        $time = time();
        mysql_query("UPDATE zaidejai SET last_fight_time='$time' WHERE nick='$nick' ");
        $ip = $_SERVER['REMOTE_ADDR'];
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $location = 'jungle_king_bosses';
        mysql_query("INSERT INTO `player_actions` SET player_id = '$apie[id]', location='$location', ip='$ip', browser='$browser'");

        // looking for gays
        $tenSecondsAgo = date('Y-m-d H:i:s', strtotime('-10 seconds'));
        $sql = "SELECT * FROM player_actions 
                                    WHERE ip = '$ip'
                                    AND location != '$location'
                                    AND created_at >= '$tenSecondsAgo' 
                                    ORDER BY created_at DESC 
                                    LIMIT 1";
        $exist = mysql_num_rows(mysql_query($sql));
        if ($exist) {
            $message = 'Seniokas ' . $nick . ' daro labai daug užklausų ir labai apkrauna serverį.';
            error_log($message);
            $b_laikas2 = time()+60;
            $kasBan = 'testas1';
            mysql_query("INSERT INTO pm SET gavejas='testas1', what='SISTEMA', txt='$message', time='" . time() . "', nauj='NEW'")or die(mysql_error());
            mysql_query("INSERT INTO ban_logai SET nick='$nick', uz='$message', time='$b_laikas2', kas_ban='$kasBan'")or die(mysql_error());
            mysql_query("INSERT INTO block SET nick='$nick', uz='$message', time='$b_laikas2', kas_ban='$kasBan'")or die(mysql_error());
            header('Refresh: 1; url=pagrindinis.php');
        }



        echo '<div class="meniuc">';
        echo 'Bosas: ' . $bossConfig['name'];
        echo '</div>';
        if ($playerDefence > $bossConfig['power']) {
            $bossDamagePercentages = $bossConfig['damagePercentage'];
            $randomKey = array_rand($bossDamagePercentages);
            $bossDamagePercent = $bossDamagePercentages[$randomKey];
        } else {
            $bossDamagePercent = mt_rand(30, 50);
        }
        $bossDamage = round(($bossDamagePercent / 1000) * $playerMaxHealth);
        if ($bossDamage < 10) {
            $bossDamage = 10;
        }

        if ($apie['armor'] === 'Galios armor') {
            $initialBossDamage = $bossDamage;
            $bossDamage *= 0.8;
            echo '<font color="#6495ed"><b>Boso smūgį sumažino Galios Armour!</b></font><br>';
        }
        if ($apie['armor'] === 'Infinity armor') {
            $initialBossDamage = $bossDamage;
            $bossDamage *= 0.7;
            echo '<font color="#6495ed"><b>Boso smūgį sumažino Infinity Armour!</b></font><br>';
        }
        if ($apie['armor'] === 'Mirties armor') {
            $initialBossDamage = $bossDamage;
            $bossDamage *= 0.5;
            echo '<font color="#6495ed"><b>Boso smūgį sumažino Mirties Armour!</b></font><br>';
        }
        if ($apie['armor'] === 'Atgimimo armor') {
            $initialBossDamage = $bossDamage;
            $bossDamage *= 0.1;
            echo '<font color="#6495ed"><b>Boso smūgį sumažino Atgimimo Armour!</b></font><br>';
        }

        $bossCriticalChancePercentages = $bossConfig['criticalChancePercentage'];
        $randomKey = array_rand($bossCriticalChancePercentages);
        $bossCriticalChancePercent = $bossCriticalChancePercentages[$randomKey];

        $isBossCriticalDamage = false;
        if (mt_rand(1, 100) <= $bossCriticalChancePercent) {
            $isBossCriticalDamage = true;
            $bossDamage *= 2;
            $bossDamage = round($bossDamage);
            $randomMessagesAfterCritical = $bossConfig['messagesAfterCriticalDamage'];
            $randomKey = array_rand($randomMessagesAfterCritical);
            $randomMessageAfterCriticalDamage = $randomMessagesAfterCritical[$randomKey];
            echo '<font color="red"><b>Bosas sudavė kritinį smūgį!</b></font><br>';
            echo $randomMessageAfterCriticalDamage . '<br><br>';
        }

        $bossBlockRatePercentages = $bossConfig['blockRatePercentage'];
        $randomKey = array_rand($bossBlockRatePercentages);
        $bossBlockRatePercent = $bossBlockRatePercentages[$randomKey];

        $playerDamage = 0;

        $isBossBlockedAttack = false;
        if (mt_rand(1, 100) <= $bossBlockRatePercent) {
            $isBossBlockedAttack = true;
            echo '<font color="#808080"><b>Jūsų smūgis buvo blokuotas!</b></font><br>';
        }

        if (!$isBossBlockedAttack) {
            if ($playerPower > $bossConfig['defence']) {
                $playerDamage = mt_rand(1000, 2000);
                $bossDefencePercentages = $bossConfig['defencePercentage'];
                $randomKey = array_rand($bossDefencePercentages);
                $bossDefencePercent = $bossDefencePercentages[$randomKey];
                if (mt_rand(1, 100) <= $bossDefencePercent) {
                    $playerDamage = round((1 - ($bossDefencePercent / 100)) * $playerDamage);
                }
            } else {
                $playerDamage = mt_rand(1, 5);
            }
        }

        if (!$isBossBlockedAttack && $apie['veikejas'] === 'Gokas SSJGB Kaioken 20x') {
            $playerDamage *= 2;

            echo '<font color="#9370db"><b>Jūsų veikėjas Gokas SSJGB Kaioken 20x padidino žąlą bosui.</b></font><br><br>';
        }

        if (!$isBossBlockedAttack && $apie['veikejas'] === 'Gokas Mastered Ultra Instinct') {
            $playerDamage *= 2;

            echo '<font color="#9370db"><b>Jūsų veikėjas Gokas Mastered Ultra Instinct padidino žąlą bosui.</b></font><br><br>';
        }

        if (!$isBossBlockedAttack && $apie['sword'] === 'Mirties sword') {
            $playerDamage *= 2;

            echo '<font color="#9370db"><b>Jūsų smūgį padvigubino Mirties Sword!</b></font><br>';
        }
        if (!$isBossBlockedAttack && $apie['sword'] === 'Atgimimo sword') {
            $playerDamage *= 3;

            echo '<font color="#9370db"><b>Jūsų smūgį patrigubino Atgimimo Sword!</b></font><br>';
        }

        /** @var PlayerSkill $crossOfBloodBuff */
        $crossOfBloodBuff = $playerActiveBuffs->first(function (PlayerSkill $playerSkill) {
            return $playerSkill->skill()->name() === Skill::BUFF_NAME_CROSS_OF_BLOOD;
        });
        if (!$isBossBlockedAttack && $crossOfBloodBuff) {
            $playerDamage *= $crossOfBloodBuff->skill()->power();

            echo '<font color="#9370db"><b>Jūsų smūgį padidino ' . $crossOfBloodBuff->skill()->power() .  'x ' . $crossOfBloodBuff->skill()->name() . ' buffas!</b></font><br>';
        }

        $bossHealth = $boss['health'] - $playerDamage;
        if ($bossHealth < 0) {
            $bossHealth = 0;
        }

        $playerHealth -= $bossDamage;
        if ($playerHealth < 0) {
            $playerHealth = 0;
        }

        if ($playerHealth === 0) {
            echo '<font color="red"><b>Tu pralaimėjai!</b></font><br>';
            mysql_query("UPDATE zaidejai SET gyvybes='0' WHERE nick='$nick' ");
            echo '</div>';
            $g_n[] = array("index.php","Jungle King bosai","Pulti bosą");
            navigacija($g_n);
            return;
        }


        if ($bossHealth == 0) {
            echo '<font color="green"><b>Tu laimėjai!</b></font><br><br>';
            echo 'Atlygis nukovus bosą:<br><br>';
            if ($boss['defence']) {
                echo '<img src="../assets/img/reward.png"> Gynybos: '. skaicius($boss['defence']);
                echo '<br>';
            }
            if ($boss['power']) {
                echo '<img src="../assets/img/reward.png"> Jėgos: '. skaicius($boss['power']);
                echo '<br>';
            }
            if ($boss['euro']) {
                echo '<img src="../assets/img/reward.png"> Eurų: '. sk($boss['euro']);
                echo '<br>';
            }
            if ($boss['exp']) {
                echo '<img src="../assets/img/reward.png"> Exp: '. skaicius($boss['exp']);
                echo '<br>';
            }
            if ($boss['vipticket']) {
                echo '<img src="../assets/img/reward.png"> Vip ticketų: '. sk($boss['vipticket']);
                echo '<br>';
            }
            if ($boss['token']) {
                echo '<img src="../assets/img/reward.png"> Token: ' . sk($boss['token']);
                echo '<br>';
            }
                $update3 = mysql_query("UPDATE zaidejai SET
                sms_litai=sms_litai+'$boss[euro]',
                exp=exp+$boss[exp],
                jega=jega+'$boss[power]',
                gynyba=gynyba+'$boss[defence]',
                vipticket=vipticket+'$boss[vipticket]',
                jungle_king_token=jungle_king_token+'$boss[token]'
            WHERE nick='$apie[nick]'");

            $message = $apie['nick'] . ' nukovė Jungle King bosą(' . $bossConfig['name'] . ') ';
            if ($boss['euro'] > 2000) {
                $message .= 'Gavo: ' . $boss['euro'] . ' eurų';
            }


            $expiresAt = date('Y-m-d H:i:s', strtotime(' + 1 hours'));
            if ($apie['nick'] !== 'testas1') {
                $insert1 = mysql_query("INSERT INTO pokalbiai SET nick='SISTEMA', sms='$message', data='" . time() . "', expired_at='$expiresAt'");
            }
            $update2 = mysql_query("UPDATE jungle_king_bosses SET status = 'dead', health = 0 WHERE user_id='$apie[id]' AND status='alive' AND boss_id = '$bossId' AND DATE(created_at) = '$date'");
            echo '</div>';

            // ugly lvl calculation(wap gay code)
            $kiek_exp = $boss['exp'] + $apie['exp'];
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
            mysql_query("UPDATE zaidejai SET exp=exp+'$boss[exp]', lygis='$lvlas',expl='$left', expl2='$left*3.53' WHERE nick='$apie[nick]'");

            $g_n[] = array("index.php","Jungle King bosai","Pulti bosą");
            navigacija($g_n);
            return;
        }

        if ($playerHealth && $bossHealth) {
            echo 'Bosui liko gyvybių: ' . $bossHealth . '<br>';
            echo 'Tau liko gyvybių: ' . $playerHealth . '<br>';
            if ($isBossCriticalDamage) {
                echo '<font color="red"><b>Boso žala: ' . $bossDamage . '</b></font><br>';
            } else {
                echo 'Boso žala: ' . $bossDamage . '<br>';
            }
            echo 'Tavo žala: ' . $playerDamage . '<br>';

            // handle boss and player
            mysql_query("UPDATE jungle_king_bosses SET health='$bossHealth' WHERE status='alive' AND user_id='$apie[id]' AND boss_id='$bossId' AND DATE(created_at) = '$date'");
            mysql_query("UPDATE zaidejai SET vveiksmai=vveiksmai+'1', gyvybes=gyvybes-'$bossDamage' WHERE nick='$nick' AND gyvybes > 0");
        }
        echo '<br>';
        $_SESSION['pad-jungle-king'] = time() + 2;
    }
    $KD = mt_rand(9999, 99999);
    $_SESSION['refresh-jungle-king'] = $KD;
    echo '<div class="meniuc">';
    $linkText = 'Trenkti <b>' . $bossConfig['name'] . '</b>';
    echo '<a id="myLink" href="index.php?id=attack&bossId=' . $bossId . '&KD=' . $KD . '">' . $linkText .'</a>';
    echo '<script>
    function startTimer() {
    let timerSeconds = 3;

    let link = document.getElementById("myLink");
    link.style.pointerEvents = "none";

    // Update the link text
    link.innerHTML = "Kovoti galėsi po: " + timerSeconds;

    // Set up the timer
    let countdown = setInterval(function () {
        timerSeconds--;

        // Update the link text
        link.innerHTML = "Kovoti galėsi po: " + timerSeconds;

        // If the timer reaches 0, re-enable the link and clear the timer
        if (timerSeconds <= 0) {
            
        // Display the link text in the console (you can use it as needed)
            link.style.pointerEvents = "auto";
            link.innerHTML = "Tęsti kovą ";
            clearInterval(countdown);
        }
    },1000);
    }
    

    startTimer();
</script>';
    echo '</div>';
    $refresh = 8;
    echo '<meta http-equiv="refresh" content="'.$refresh.'; url=index.php?id=attack&KD='.$KD.'&bossId='.$bossId.'">';
    echo '</div>';
    $g_n[] = array("index.php","Jungle King bosai","Pulti bosą");
    navigacija($g_n);
}


/**
 * COMPLETE MISSION
 */
if ($id === 'completeMission') {
    $bossId = isset($_GET['bossId']) ? preg_replace('/\D/',"",$_GET['bossId'])  : null;
    $missionConfig = getBossById($bossId);
    $missionName = isset($missionConfig['name']) ? $missionConfig['name'] : null;
    $requirements = $missionConfig ? $missionConfig['requirements'] : [];
    $rewards = mysql_fetch_assoc(mysql_query("SELECT * FROM jungle_king_bosses WHERE status='prepared' AND user_id='$apie[id]' AND boss_id = '$bossId' AND DATE(created_at) = '$date'"));

    echo '<div class="meniu">';
    if (!$requirements || !$missionName) {
        echo 'Bloga boso konfigūracija, kreipkitės į administracija';
    } elseif(!$rewards) {
        echo 'Šis bosas jau pasiruošęs kovai.';
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

            $update2 = mysql_query("UPDATE jungle_king_bosses SET status = 'alive' WHERE status='prepared' AND user_id='$apie[id]' AND boss_id = '$bossId' AND DATE(created_at) = '$date'");

//            $update3 = mysql_query("UPDATE zaidejai SET
//                sms_litai=sms_litai+'$rewards[euro]',
//                exp=exp+$rewards[exp],
//                jega=jega+'$rewards[power]',
//                gynyba=gynyba+'$rewards[defence]',
//                vipticket=vipticket+'$rewards[vipticket]',
//                daily_mission_token=daily_mission_token+'$rewards[token]'
//            WHERE nick='$apie[nick]'");
//
//            $message = $apie['nick'].' įvykdė legendinę dienos misiją('.$missionName.') ';
//            if ($rewards['euro'] > 2000) {
//                $message .= 'Gavo: '.$rewards['euro'] . ' eurų';
//            }
//
//            $expiresAt = date('Y-m-d H:i:s', strtotime(' + 1 hours'));
//            $insert1 = mysql_query("INSERT INTO pokalbiai SET nick='SISTEMA', sms='$message', data='".time()."', expired_at='$expiresAt'");

            if ($update1 && $update2) {
                commitTransaction();
                echo $checked;
                echo 'Pasiruošimo misija įvykdyta.';

//                $image = getRandomRewardImage($missionConfig);
//                if ($image) {
//                    echo '<br>';
//                    echo '<img width="100" src="../assets/img/'. $image .'">';
//                }
            } else {
                rollbackTransaction();
                echo 'Įvyko klaida kreipkitės į administratorių.';
            }
            echo '<br>';
        }
    }
    echo '</div>';

    $g_n[] = array("index.php","Jungle King bosai","Įvykdyti Pasiruošimo Misiją");
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
    echo '<img src="../assets/img/tokens.png" style="vertical-align: middle;"> <font color="green">'.$apie['jungle_king_token'].'</font>';
    echo '</div>';
    echo '<div class="meniuc"><font color="red">1</font> token -  <font color="red"><b>'.skaicius(50).'</b></font> MirtiesItem</div>';
    echo '<div class="meniuc">
        <form action="?id=changeToMirtiesItem" method="post"/>
        Kiek tokenų iškeisite:<br />
        <input type="number" value="'.$apie['jungle_king_token'].'" min="1" max="'.$apie['jungle_king_token'].'" name="tokens"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>';

    echo '<div class="meniuc"><font color="red">1</font> token -  <font color="red"><b>'.skaicius(50).'</b></font> AtgimimoItem</div>';
    echo '<div class="meniuc">
        <form action="?id=changeToAtgimimoItem" method="post"/>
        Kiek tokenų iškeisite:<br />
        <input type="number" value="'.$apie['jungle_king_token'].'" min="1" max="'.$apie['jungle_king_token'].'" name="tokens"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>';

    echo '<div class="meniuc"><font color="red">1</font> token -  <font color="red"><b>'.skaicius(50).'</b></font> Sayiantail</div>';
    echo '<div class="meniuc">
        <form action="?id=changeToSayiantail" method="post"/>
        Kiek tokenų iškeisite:<br />
        <input type="number" value="'.$apie['jungle_king_token'].'" min="1" max="'.$apie['jungle_king_token'].'" name="tokens"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>';


    $g_n[] = array("/pagrindinis.php?id=", "Pagrindinis", "index.php", "Jungle King bosai", "Tokenų keitykla");
    navigacija($g_n);
}

if ($id === 'changeToMirtiesItem') {
    online('Jungle Token Keitykla > Keičia į MirtiesItem');
    top('Tokenų keitimas į MirtiesItem');


    if (isset($_POST['submit'])) {
        $tokens = isset($_POST['tokens']) ? preg_replace("/[^0-9]/", "", $_POST['tokens']) : null;
        $mirtiesItem = (int)($tokens * 50);

        if (empty($tokens)) {
            echo '<div class="meniuc">Palikote tuščią laukelį!</div>';
        } elseif ($apie['jungle_king_token'] < $tokens) {
            echo '<div class="meniuc">Neturite pakankamai tokenų!</div>';
        } else {
            echo '<div class="meniuc">Išsikeitėte sėkmingai <font color="red"><b>'.sk($tokens).'</b></font> tokenų į <font color="red"><b>'.sk($mirtiesItem).'</b></font> MirtiesItem</div> ';
            mysql_query("UPDATE zaidejai SET jungle_king_token=jungle_king_token-'$tokens' WHERE nick='$nick' ");
            mysql_query("UPDATE inv SET mirties_item=mirties_item+'$mirtiesItem' WHERE nick='$nick' ");
        }
    }

    $g_n[] = array("/pagrindinis.php?id=", "Pagrindinis", "index.php", "Jungle King bosai", "index.php?id=shop", "Tokenų keitykla", "Tokenų keitimas");
    navigacija($g_n);
}

if ($id === 'changeToAtgimimoItem') {
    online('Jungle Token Keitykla > Keičia į AtgimimoItem');
    top('Tokenų keitimas į AtgimimoItem');


    if (isset($_POST['submit'])) {
        $tokens = isset($_POST['tokens']) ? preg_replace("/[^0-9]/", "", $_POST['tokens']) : null;
        $atgimimoItem = (int)($tokens * 50);

        if (empty($tokens)) {
            echo '<div class="meniuc">Palikote tuščią laukelį!</div>';
        } elseif ($apie['jungle_king_token'] < $tokens) {
            echo '<div class="meniuc">Neturite pakankamai tokenų!</div>';
        } else {
            echo '<div class="meniuc">Išsikeitėte sėkmingai <font color="red"><b>'.sk($tokens).'</b></font> tokenų į <font color="red"><b>'.sk($atgimimoItem).'</b></font> AtgimimoItem</div> ';
            mysql_query("UPDATE zaidejai SET jungle_king_token=jungle_king_token-'$tokens' WHERE nick='$nick' ");
            mysql_query("UPDATE inv SET atgimimo_item=atgimimo_item+'$atgimimoItem' WHERE nick='$nick' ");
        }
    }

    $g_n[] = array("/pagrindinis.php?id=", "Pagrindinis", "index.php", "Jungle King bosai", "index.php?id=shop", "Tokenų keitykla", "Tokenų keitimas");
    navigacija($g_n);
}

if ($id === 'changeToSayiantail') {
    online('Jungle Token Keitykla > Keičia į Sayiantail');
    top('Tokenų keitimas į Sayiantail');


    if (isset($_POST['submit'])) {
        $tokens = isset($_POST['tokens']) ? preg_replace("/[^0-9]/", "", $_POST['tokens']) : null;
        $sayiantail = (int)($tokens * 50);

        if (empty($tokens)) {
            echo '<div class="meniuc">Palikote tuščią laukelį!</div>';
        } elseif ($apie['jungle_king_token'] < $tokens) {
            echo '<div class="meniuc">Neturite pakankamai tokenų!</div>';
        } else {
            echo '<div class="meniuc">Išsikeitėte sėkmingai <font color="red"><b>'.sk($tokens).'</b></font> tokenų į <font color="red"><b>'.sk($sayiantail).'</b></font> Sayiantail</div> ';
            mysql_query("UPDATE zaidejai SET jungle_king_token=jungle_king_token-'$tokens' WHERE nick='$nick' ");
            mysql_query("UPDATE inv SET Sayiantail=Sayiantail+'$sayiantail' WHERE nick='$nick' ");
        }
    }

    $g_n[] = array("/pagrindinis.php?id=", "Pagrindinis", "index.php", "Jungle King bosai", "index.php?id=shop", "Tokenų keitykla", "Tokenų keitimas");
    navigacija($g_n);
}

function renderRequirements(array $requirements)
{
    global $nick, $inv, $arrow, $checked;

    echo 'Kad susikautumėte su bosu Jums reikia atlikti šiuos veiksmus: <br><br>';
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

function handleRewards(array $rewards, $boosConfig)
{
    global $apie;

    echo 'Kokius prizus gausi nukovęs bosą:<br><br>';

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
    mysql_query("DELETE FROM `jungle_king_bosses` WHERE user_id='$apie[id]' AND (status = 'alive' OR status = 'prepared') AND DATE(created_at) <> '$date'")or die(mysql_error());
    mysql_query("INSERT INTO `jungle_king_bosses` (`user_id`, `boss_id`, `health`, `token`, `euro`, `exp`, `vipticket`, `defence`, `power`, `created_at`)
    VALUES ('".$apie['id']."', '$boosConfig[id]', '$boosConfig[health]', '$token', '$euro', $exp, '$vipTicket', '$defence', '$power', '$date')
    ") or die(mysql_error());

    echo '</div>';
}


function renderTopBossKillers()
{
    global $trophy;

    $allCompletedMissionsCount = mysql_num_rows(mysql_query("SELECT * FROM jungle_king_bosses WHERE status='dead'"));
    if ($allCompletedMissionsCount) {
        echo '<div class="meniu">';
        echo $trophy;
        echo ' TOP kovotojai<br><br>';
        $topUsers = mysql_query("SELECT COUNT(zaidejai.nick) as completed_missions, zaidejai.nick as nick FROM jungle_king_bosses INNER JOIN zaidejai ON jungle_king_bosses.user_id = zaidejai.id AND jungle_king_bosses.status = 'dead' GROUP BY zaidejai.nick HAVING COUNT(zaidejai.nick) > 0 ORDER BY COUNT(zaidejai.nick) DESC LIMIT 3");
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

    $userCount = mysql_num_rows(mysql_query("SELECT nick, jungle_king_token FROM `zaidejai` WHERE jungle_king_token > 0"));

    if ($userCount) {
        $users = mysql_query("SELECT nick, jungle_king_token FROM `zaidejai` WHERE jungle_king_token > 0 ORDER BY jungle_king_token DESC LIMIT 3");
        echo '<div class="meniu">';
        echo $tokens;
        echo ' Žaidėjai pagal tokenus<br><br>';
        $count = 1;
        while ($row = mysql_fetch_assoc($users)) {
            echo $count++.'. ';
            echo $row['nick'];
            echo '('.$row['jungle_king_token'].')';
            echo '<br>';
        }
        echo '</div>';
    }
}

/**
 * FOOTER
 */
include_once 'parts/footer.php';
