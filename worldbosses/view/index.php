<?php

/**
 * HEADER
 */

use LegacyDbz\Skills\DTO\Skill;

include_once __DIR__ . '/parts/head.php';

$date = date('Y-m-d H:i:s');

/**
 * CONTENT
 */
if (!isset($id)) {
    online('World Bosso peržiūra');
    $repository = new \LegacyDbz\WorldBosses\Repositories\WorldBossRepository();
    $service = new \LegacyDbz\WorldBosses\Services\WorldBossService($repository);
    $boss = $service->get();
    echo '<div class="meniuc">
<b>World Bosai</b> - galingi bosai, prieš kuriuos gali kovoti visi žaidimo žaidėjai, o prizus sužinosite nukovę bosą. 
Neužsidėjus mirties, atgimimo daiktų kovoti nerekomenduojama.
</div>';

    if (!$boss) {
        echo '<div class="meniuc">';
        echo 'Bosų nėra.';
        echo '</div>';
        $g_n[] = ["/pagrindinis.php?id=", "Pagrindinis", "World bosai"];
        navigacija($g_n);
        return;
    }

    $bossConfig = $service->getBossConfig($boss->getBossId());
    echo '<div class="meniuc">';
    echo '<b>' . $bossConfig['name'] . '</b><br>';
    echo 'Gyvybių: ' . skaicius($boss->getHealth());
    echo '<br>';
    echo 'Pasiekiamas iki: <b>' . $boss->getEndsAt() . '</b><br><br>';
    if (isset($bossConfig['videos'])) {
        $video = $service->getRandomVideo($bossConfig);
        echo ' <div class="video-container">';
        echo ' <video controls autoplay>';
        echo '<source src="../assets/videos/' . $video . '" type="video/mp4">';
        echo '</video></div><br>';
    }
    if (isset($bossConfig['images'])) {
        $image = $service->getRandomImage($bossConfig);
        echo '<img width="100" src="../assets/img/' . $image . '">';
    }
    echo '</div>';
    if ($bossConfig['chests']) {
        echo '  <div class="meniu">';

        echo $chest;
        echo " <b>Skrynių drop</b>:";

        echo '<br><br>';
        foreach ($bossConfig['chests'] as $key => $chest) {
            echo '  <div class="meniu">';
            echo $arrow;
            echo '<font color="#f84cb1">' . $key . '</font>';
            echo ' - ' . $chest['dropRate'] . '%';
            echo '<br>';
            foreach ($chest['contents'] as $itemName => $amountArray) {
                echo $arrow;
                if ($itemName === 'deathArmour') {
                    echo '<font color="#6495ed">Mirties armour</font>';
                }
                elseif ($itemName === 'deathSword') {
                    echo '<font color="#6495ed">Mirties sword</font>';
                }
                elseif ($itemName === 'deathAmulet') {
                    echo '<font color="#6495ed">Mirties amulet</font>';
                }
                elseif ($itemName === 'revivalAmulet') {
                    echo '<font color="#6495ed">Atgimimo amulet</font>';
                }
                elseif ($itemName === 'destructionAmulet') {
                    echo '<font color="#6495ed">Naikinimo amulet</font>';
                }
                else {
                    echo $itemName;
                }
                if ($amountArray[0] === $amountArray[1]) {
                    echo ' +' . $amountArray[0];
                } else {
                    echo ' - nuo ' . skaicius($amountArray[0]) . ' iki ' . skaicius($amountArray[1]);
                }
                echo '<br>';
            }
            echo '</div>';
        }
        echo '</div>';
    }

    echo '<div class="meniu">';
    if (!$inv['mirties_armor']) {
        echo '<font color="#6495ed"><b>Neturite Mirties Armour, bosas darys Jums daug damage!</b></font><br>';
    }
    if (!$inv['mirties_sword']) {
        echo '<font color="#6495ed"><b>Neturite Mirties Sword, bosui darysite mažai damage!</b></font><br>';
    }
    if (!$inv['atgimimo_armor']) {
        echo '<font color="#6495ed"><b>Neturite Atgimimo Armour, bosas darys Jums daug damage!</b></font><br>';
    }
    if (!$inv['atgimimo_sword']) {
        echo '<font color="#6495ed"><b>Neturite Atgimimo Sword, bosui darysite mažai damage!</b></font><br>';
    }
    echo 'Daugiausiai damage World Bosams daro veikėjas: <font color="red">Kefla</font><br>';
    echo '</div>';

    echo '<div class="meniuc">';
    echo ' <a href="index.php?id=attack"><font color="red">Kovoti</font></a><br>';
    if (!$boss->isFreezed()) {
        echo '<br>';
        echo ' <a href="index.php?id=freeze"><font color="#f5f5f5">Freezinti</font></a><br>';
    } else {
        echo '<br>';
        echo '<p style="
    color: #b3e0ff;
    text-shadow: 2px 2px 5px rgba(173, 216, 230, 0.8), 0 0 10px rgba(173, 216, 230, 0.5);
    font-weight: bold;
    font-size: 12px;
    font-family: Arial, sans-serif;
    filter: brightness(0.9) saturate(1.1);
">
    Šis bosas užfreezintas iki ' . $boss->getFreezeEndsAt() . '
</p>';

        echo '<script>
             let audio = new Audio("../assets/sounds/ice_barrage.mp3");
            audio.play();
            </script>';
    }
    echo '</div>';
    echo '<div class="meniuc">';
    echo ' <a href="index.php?id=dead_bosses">Nukauti bosai</a><br>';
    echo '</div>';
    $g_n[] = ["/pagrindinis.php?id=", "Pagrindinis", "World bosai"];
    navigacija($g_n);
}

if ($id === 'dead_bosses') {
    online('Peržiūri nukautus World Bosus');
    echo '<div class="meniuc">
   Nukauti bosai
</div>';

    $repository = new \LegacyDbz\WorldBosses\Repositories\WorldBossRepository();
    $service = new \LegacyDbz\WorldBosses\Services\WorldBossService($repository);
    $deadBosses = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM world_bosses WHERE dead_at IS NOT NULL"))[0];

    if ($deadBosses > 0) {
        $perPage = 3;
        $total = @(int)(($deadBosses - 1) / $perPage) + 1;
        if (empty($psl) || $psl < 0) {
            $psl = 1;
        }
        if ($psl > $total) {
            $psl = $total;
        }
        $startFrom = $psl * $perPage - $perPage;

        $deadBossesQuery = mysqli_query($conn,"SELECT * FROM world_bosses WHERE dead_at IS NOT NULL ORDER BY id DESC LIMIT $startFrom, $perPage");
        $pages = ceil($deadBosses / $perPage);

        while ($boss = mysqli_fetch_assoc($deadBossesQuery)) {
            echo '<div class="meniu">';
            $bossConfig = $service->getBossConfig($boss['boss_id']);
            if ($bossConfig) {
                echo $arrow;
                echo 'Bosas: ' . $bossConfig['name'];
                echo '<br>';
                echo $arrow;
                echo 'Prisikėlė: ' . formatDateTimeString($boss['starts_at']);
                echo '<br>';
                echo $arrow;
                echo 'Nukautas: ' . formatDateTimeString($boss['dead_at']);
                echo '<br>';
                $hitsCount = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `world_boss_fights` WHERE world_boss_id = '$boss[id]'"));
                echo $arrow;
                echo 'Kad nukauti bosą žaidėjams prireikė suduoti bosui: ' . $hitsCount . ' smūgių.';
                echo '<br>';
                $blockCount = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `world_boss_fights` WHERE world_boss_id = '$boss[id]' AND player_damage = 0"));
                echo $arrow;
                echo 'Bosas blokavo: ' . $blockCount . ' smūgius.';
                echo '<br>';
                $bossBlocksPercentage = mysqli_fetch_assoc(mysqli_query($conn,"SELECT ROUND((COUNT(CASE WHEN player_damage = 0 THEN 1 END) / COUNT(*)) * 100) AS blocks_percentage FROM world_boss_fights WHERE world_boss_id = '$boss[id]'"));
                echo $arrow;
                echo 'Smūgių blokavimo procentas: ' . $bossBlocksPercentage['blocks_percentage'] . '%';
                echo '<br>';
                $bossTotalDamageToPlayer = mysqli_fetch_assoc(mysqli_query($conn,"SELECT nick, SUM(boss_damage) AS most_damage FROM world_boss_fights INNER JOIN zaidejai ON world_boss_fights.player_id = zaidejai.id WHERE world_boss_id = '$boss[id]' GROUP BY player_id ORDER BY most_damage DESC LIMIT 1"));
                echo $arrow;
                echo 'Daugiausiai žalos bosas padarė žaidėjui: ' . $bossTotalDamageToPlayer['nick'] . '(' . sk($bossTotalDamageToPlayer['most_damage']) . ')';
                echo '<br><br>';
                echo 'Atlygiai: <br><br>';
                $rewardsQuery = mysqli_query($conn,"SELECT world_boss_rewards.*, zaidejai.nick FROM world_boss_rewards INNER JOIN zaidejai ON world_boss_rewards.player_id = zaidejai.id WHERE world_boss_id = '$boss[id]'");
                while ($reward = mysqli_fetch_assoc($rewardsQuery)) {
                    if ($reward['type'] === 'first_hit') {
                        echo '<img src="../assets/img/reward.png">';
                        echo 'Už pirmą smūgį bosui: <br>';
                        echo $reward['nick'] . ': ' . $reward['message'];
                        echo '<br>';
                    }
                    if ($reward['type'] === 'last_hit') {
                        echo '<img src="../assets/img/reward.png">';
                        echo 'Už paskutinį smūgį bosui: <br>';
                        echo $reward['nick'] . ': ' . $reward['message'];
                        echo '<br>';
                    }
                    if ($reward['type'] === 'most_damage') {
                        echo '<img src="../assets/img/reward.png">';
                        echo 'Už padarymą daugiausiai žalos: <br>';
                        echo $reward['nick'] . ': ' . $reward['message'];
                        echo '<br>';
                    }
                    if ($reward['type'] === 'most_hits') {
                        echo '<img src="../assets/img/reward.png">';
                        echo 'Už daugiausiai smūgių bosui: <br>';
                        echo $reward['nick'] . ': ' . $reward['message'];
                        echo '<br>';
                    }
                    if ($reward['type'] === 'damage') {
                        echo '<img src="../assets/img/reward.png">';
                        echo 'Už žalos padarymą: <br>';
                        echo $reward['nick'] . ': ' . $reward['message'];
                        echo '<br>';
                    }
                }
                echo '<br>';
                echo 'Daugiausiai žalos padarė: <br><br>';
                $playersByTotalDamage = mysqli_query($conn,"SELECT player_id, nick, SUM(player_damage) AS total_damage FROM world_boss_fights INNER JOIN zaidejai ON world_boss_fights.player_id = zaidejai.id WHERE world_boss_id = '$boss[id]' GROUP BY player_id HAVING total_damage > 0 ORDER BY total_damage DESC LIMIT 3");
                while ($playerByTotalDamage = mysqli_fetch_assoc($playersByTotalDamage)) {
                    echo $arrow;
                    echo $playerByTotalDamage['nick'] . '(', sk($playerByTotalDamage['total_damage']) . ')';
                    echo '<br>';
                }
                echo '<br>';
                $mostDamagePlayer = mysqli_fetch_assoc(mysqli_query($conn,"SELECT player_id, nick, MAX(player_damage) AS most_damage FROM world_boss_fights INNER JOIN zaidejai ON world_boss_fights.player_id = zaidejai.id WHERE world_boss_id = '$boss[id]' GROUP BY player_id ORDER BY most_damage DESC LIMIT 1"));
                echo $arrow;
                echo 'Stipriausią smūgį sudavė: ' . $mostDamagePlayer['nick'] . '(' . sk($mostDamagePlayer['most_damage']) . ')';
                echo '<br>';
                $playerByMostHits = mysqli_fetch_assoc(mysqli_query($conn,"SELECT nick, COUNT(*) AS hits_count FROM world_boss_fights INNER JOIN zaidejai ON world_boss_fights.player_id = zaidejai.id WHERE world_boss_id = '$boss[id]' GROUP BY player_id ORDER BY hits_count DESC LIMIT 1"));
                echo $arrow;
                echo 'Daugiausia smūgių sudavė: ' . $playerByMostHits['nick'] . '(' . $playerByMostHits['hits_count'] . ')';
                echo '<br>';

                echo '</div>';
            }
        }

        echo '<div class="meniuc">' . puslapiavimas($pages, $psl, '?id=dead_bosses') . '</div>';
    } else {
        echo '<div class="meniuc">Bosų nėra.</div>';
    }
    $g_n[] = ["index.php", "World bosai", "Nukauti bosai"];
    navigacija($g_n);
}

/**
 * Freeze boss
 */
if ($id === 'freeze') {
    online('Freezina World Bosą');
    top('World boss mental freeze');
    $repository = new \LegacyDbz\WorldBosses\Repositories\WorldBossRepository();
    $service = new \LegacyDbz\WorldBosses\Services\WorldBossService($repository);
    $boss = $service->get();
    echo '<div class="meniuc">';
    if (!$boss) {
        echo $warningIcon;
        echo 'Šis bosas mirė.';
        return;
    }

    if (!$bossConfig = $service->getBossConfig($boss->getBossId())) {
        echo $warningIcon;
        echo 'Bloga boso konfigūracija. Kreipkitės į administraciją.';
        return;
    }

    if ($boss->isFreezed()) {
        echo $warningIcon;
        echo 'Šis bosas užfreezintas.';
        return;
    }

    echo '<form action="?id=freezeWorldBoss" method="post"/>';
    echo 'Kiek minučių freezinti:<br />';
    echo '<input type="number" value="1" min="1" max="15" name="minutes"><br />
        <input type="submit" name="submit" value="Freezinti"/></form></div>';
    echo '</form>';
    echo '</div>';
}

if ($id === 'freezeWorldBoss') {
    online('World boss > Freeze World Boss');
    top('World boss mental freeze');
    $repository = new \LegacyDbz\WorldBosses\Repositories\WorldBossRepository();
    $service = new \LegacyDbz\WorldBosses\Services\WorldBossService($repository);
    $boss = $service->get();
    $bossConfig = $service->getBossConfig($boss->getBossId());
    echo '<div class="meniuc">';


    if (isset($_POST['submit'])) {
        $minutes = isset($_POST['minutes']) ? preg_replace("/[^0-9]/", "", $_POST['minutes']) : null;
        $microshems = $minutes * 20;

        if (empty($minutes)) {
            echo '<div class="meniuc">Palikote tuščią laukelį!</div>';
        } elseif ($inv['Microshem'] < $microshems) {
            echo '<div class="meniuc">Neturite pakankamai microschemų!</div>';
        } elseif ($boss->isFreezed()) {
            echo '<div class="meniuc">Bosas jau užfreezintas!</div>';
        } elseif ($minutes > 15) {
            echo '<div class="meniuc">Freezinti galima tik 15 min!</div>';
        } else {
            echo '<div class="meniuc">Bosas gavo mental freezą <font color="red"><b>' . sk($minutes) . '</b> min</font> už <font color="red"><b>' . sk($microshems) . '</b></font> Microschem</div> ';
            mysqli_query($conn,"UPDATE inv SET Microshem=Microshem-'$microshems' WHERE nick='$apie[nick]' ");
            $freezeEndsAt = date('Y-m-d H:i:s', strtotime($date) + (60 * $minutes));
            $repository->freeze($boss->getId(), $freezeEndsAt);

            $message = $apie['nick'] . ' užfreezino bosą (' . $bossConfig['name'] . ') todėl šis bosas daro žymiai mažiau damage, skubėkite nukauti!';
            $expiresAt = date('Y-m-d H:i:s', strtotime(' + 5 minutes'));
            mysqli_query($conn,"INSERT INTO pokalbiai SET nick='SISTEMA', sms='$message', data='" . time() . "', expired_at='$expiresAt'");
            echo '<script>
             let audio = new Audio("../assets/sounds/ice_barrage.mp3");
            audio.play();
            </script>';
        }
    }

    echo '</div>';
}

/**
 * Attack boss
 */
if ($id === 'attack') {
    online('Kapoja World Bosą');
    $repository = new \LegacyDbz\WorldBosses\Repositories\WorldBossRepository();
    $service = new \LegacyDbz\WorldBosses\Services\WorldBossService($repository);
    $boss = $service->get();

    $KD = $_GET['KD'];
    $playerHealth = round($apie['gyvybes']);
    $playerPower = round($apie['jega']);
    $playerDefence = round($apie['gynyba']);
    $playerMaxHealth = round($apie['max_gyvybes']);

    echo '<div class="meniu">';
    if (!$boss) {
        echo $warningIcon;
        echo 'Šis bosas mirė.';
        return;
    }

    if (!$bossConfig = $service->getBossConfig($boss->getBossId())) {
        echo $warningIcon;
        echo 'Bloga boso konfigūracija. Kreipkitės į administraciją.';
        return;
    }

    if ($playerHealth === 0.0) {
        echo $warningIcon;
        echo 'Neturite gyvybių.<br>';
        if ($inv['Pupos'] > 0) {
            echo '<b>Stebuklingos pupos: <b>' . $inv['Pupos'] . '</b> <a href="/inv.php?id=eat">[Valgyti]</a></br>';
        }
        return;
    }

    if ($_SESSION['pad-world-bosses'] - time() > 0) {
        echo 'Padusai! Trenkti galėsi už <b>' . laikas($_SESSION['pad-world-bosses'] - time(), 1) . '</b>';
    } elseif ($KD && (int)$KD !== (int)$_SESSION['refresh-world-bosses']) {
        echo 'Atnaujinti puslapio negalimą! Eikite atgal ir vėl trenkite.';
    } else {
        $worldBossId = $boss->getId();
        $damageType = $boss->getDamageType();
        echo '<div class="meniuc">';
        echo 'Bosas: ' . $bossConfig['name'];
        echo '<br>';
        if ($boss->isFreezed()) {
            echo 'Boso Mental freeze baigsis po: ' . $boss->freezeEndsAfter();
            echo '<br>';
        }
        if ($boss->getDamageType() === \LegacyDbz\WorldBosses\DTO\WorldBoss::DAMAGE_TYPE_DEATH) {
            echo 'Daro mirties damage.';
        }
        if ($boss->getDamageType() === \LegacyDbz\WorldBosses\DTO\WorldBoss::DAMAGE_TYPE_REVIVAL) {
            echo 'Daro atgimimo damage.';
        }
        if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM online WHERE vieta = 'Kapoja World Bosą' AND nick <> '$nick'")) > 0) {
            echo '<br>';
            echo 'Bosą kapoja: ';
            $bossAttackers = mysqli_query($conn,"SELECT * FROM online WHERE vieta = 'Kapoja World Bosą' AND nick <> '$nick'");
            while ($bossAttacker = mysqli_fetch_assoc($bossAttackers)) {
                echo $bossAttacker['nick'] . ' ';
            }
        }
        echo '</div>';
        $bossDamagePercentages = $bossConfig['damagePercentage'];
        $randomKey = array_rand($bossDamagePercentages);
        $bossDamagePercent = $bossDamagePercentages[$randomKey];
        $bossDamage = round(($bossDamagePercent / 1000) * $playerMaxHealth);
        if ($bossDamage < 10 || $boss->isFreezed()) {
            $bossDamage = 10;
        }

        if ($apie['armor'] === 'Mirties armor' && $boss->getDamageType() === \LegacyDbz\WorldBosses\DTO\WorldBoss::DAMAGE_TYPE_DEATH) {
            $initialBossDamage = $bossDamage;
            $bossDamage *= 0.30;
            echo $warningIcon;
            echo '<font color="#6495ed"><b>Boso smūgį sumažino Mirties Armour!</b></font><br>';
        }
        if ($apie['armor'] === 'Atgimimo armor' && $boss->getDamageType() === \LegacyDbz\WorldBosses\DTO\WorldBoss::DAMAGE_TYPE_REVIVAL) {
            $initialBossDamage = $bossDamage;
            $bossDamage *= 0.30;
            echo $warningIcon;
            echo '<font color="#6495ed"><b>Boso smūgį sumažino Atgimimo Armour!</b></font><br>';
        }

        $bossCriticalChancePercentages = $bossConfig['criticalChancePercentage'];
        $randomKey = array_rand($bossCriticalChancePercentages);
        $bossCriticalChancePercent = $bossCriticalChancePercentages[$randomKey];

        $isBossCriticalDamage = false;
        if (random_int(1, 100) <= $bossCriticalChancePercent) {
            $isBossCriticalDamage = true;
            $bossDamage *= 2;
            $bossDamage = round($bossDamage);
            $randomMessagesAfterCritical = $bossConfig['messagesAfterCriticalDamage'];
            $randomKey = array_rand($randomMessagesAfterCritical);
            $randomMessageAfterCriticalDamage = $randomMessagesAfterCritical[$randomKey];
            echo $warningIcon;
            echo '<font color="red"><b>Bosas sudavė kritinį smūgį!</b></font><br>';
            echo $warningIcon;
            echo $randomMessageAfterCriticalDamage . '<br><br>';
        }

        $bossBlockRatePercentages = $bossConfig['blockRatePercentage'];
        $randomKey = array_rand($bossBlockRatePercentages);
        $bossBlockRatePercent = $bossBlockRatePercentages[$randomKey];

        $playerDamage = 0;

        $isBossBlockedAttack = false;
        if (random_int(1, 100) <= $bossBlockRatePercent) {
            $isBossBlockedAttack = true;
            echo $warningIcon;
            echo '<font color="#808080"><b>Jūsų smūgis buvo blokuotas!</b></font><br>';
        }

        if (!$isBossBlockedAttack) {
            $playerDamage = random_int(1000, 2000);
            $bossDefencePercentages = $bossConfig['defencePercentage'];
            $randomKey = array_rand($bossDefencePercentages);
            $bossDefencePercent = $bossDefencePercentages[$randomKey];
            if (random_int(1, 100) <= $bossDefencePercent) {
                $playerDamage = round((1 - ($bossDefencePercent / 100)) * $playerDamage);
            }
        }

        if (!$isBossBlockedAttack && $apie['veikejas'] === 'Gokas SSJGB Kaioken 20x') {
            $playerDamage *= 2;
            echo $warningIcon;
            echo '<font color="#9370db"><b>Jūsų veikėjas Gokas SSJGB Kaioken 20x padidino žąlą bosui.</b></font><br><br>';
        }

        if (!$isBossBlockedAttack && $apie['veikejas'] === 'Gokas Mastered Ultra Instinct') {
            $playerDamage *= 2;
            echo $warningIcon;
            echo '<font color="#9370db"><b>Jūsų veikėjas Gokas Mastered Ultra Instinct padidino žąlą bosui.</b></font><br><br>';
        }

        if (!$isBossBlockedAttack && $apie['veikejas'] === 'Gohanas Ultra Instinct') {
            $playerDamage *= 3;
            echo $warningIcon;
            echo '<font color="#9370db"><b>Jūsų veikėjas Gohanas Ultra Instinct padidino žąlą bosui.</b></font><br><br>';
        }

        if (!$isBossBlockedAttack && $apie['veikejas'] === 'Kefla') {
            $playerDamage *= 4;
            echo $warningIcon;
            echo '<font color="#9370db"><b>Jūsų veikėjas Kefla padidino žąlą bosui.</b></font><br><br>';
        }

        $hasPlayerFullDeathSet = hasPlayerFullDeathSet();
        if (!$hasPlayerFullDeathSet && !$isBossBlockedAttack && $apie['sword'] === 'Mirties sword' && $boss->getDamageType() === \LegacyDbz\WorldBosses\DTO\WorldBoss::DAMAGE_TYPE_REVIVAL) {
            $playerDamage *= random_int(3, 7);
            echo $warningIcon;
            echo '<font color="#9370db"><b>Jūsų smūgį padidino Mirties Sword!</b></font><br>';
        }
        if (!$isBossBlockedAttack && $hasPlayerFullDeathSet && $boss->getDamageType() === \LegacyDbz\WorldBosses\DTO\WorldBoss::DAMAGE_TYPE_REVIVAL) {
            $playerDamage *= mt_rand(5, 8);
            echo $warningIcon;
            echo '<font color="#9370db"><b>Užsidėjus visą mirties setą bosui darote daugiau damage!</b></font><br>';
        }
        $hasPlayerFullRevivalSet = hasPlayerFullRevivalSet();
        if (!$hasPlayerFullRevivalSet && !$isBossBlockedAttack && $apie['sword'] === 'Atgimimo sword' && $boss->getDamageType() === \LegacyDbz\WorldBosses\DTO\WorldBoss::DAMAGE_TYPE_DEATH) {
            $playerDamage *= mt_rand(3, 7);
            echo $warningIcon;
            echo '<font color="#9370db"><b>Jūsų smūgį padidino Atgimimo Sword!</b></font><br>';
        }
        if (!$isBossBlockedAttack && $hasPlayerFullRevivalSet && $boss->getDamageType() === \LegacyDbz\WorldBosses\DTO\WorldBoss::DAMAGE_TYPE_DEATH) {
            $playerDamage *= mt_rand(5, 8);
            echo $warningIcon;
            echo '<font color="#9370db"><b>Užsidėjus visą atgimimo setą bosui darote daugiau damage!</b></font><br>';
        }
        if (!$isBossBlockedAttack && $apie['sword'] === 'Infinity sword') {
            $playerDamage *= mt_rand(2, 3);
            echo $warningIcon;
            echo '<font color="#9370db"><b>Jūsų smūgį padidino Infinity Sword!</b></font><br>';
        }
        $blessingOfWarBuff = mysqli_fetch_assoc(mysqli_query($conn,"SELECT skills.name, player_id, power, ends_at FROM player_skills JOIN skills ON player_skills.skill_id = skills.id WHERE player_id = '$apie[id]' AND ends_at > NOW() AND skills.name = 'Blessing Of War' LIMIT 1"));
        if (!$isBossBlockedAttack && $blessingOfWarBuff) {
            $playerDamage *= $blessingOfWarBuff['power'];
            echo $warningIcon;
            echo '<font color="red"><b>Jūsų smūgį padidino ' . $blessingOfWarBuff['name'] . ' buffas!</b></font><br>';
        }

        $bossHealth = $boss->getHealth() - $playerDamage;
        if ($bossHealth < 0) {
            $bossHealth = 0;
        }

        $playerHealth -= $bossDamage;
        if ($playerHealth < 0) {
            $playerHealth = 0;
        }

        if ($playerHealth === 0) {
            echo '<font color="red"><b>Tu pralaimėjai!</b></font><br>';
            mysqli_query($conn,"UPDATE zaidejai SET gyvybes='0' WHERE nick='$apie[nick]' ");
            if ($inv['Pupos'] > 0) {
                echo '<b>Stebuklingos pupos: <b>' . $inv['Pupos'] . '</b> <a href="/inv.php?id=eat">[Valgyti]</a></br>';
            }
            echo '</div>';
            $g_n[] = ["index.php", "World bosai", "Pulti bosą"];
            navigacija($g_n);
            return;
        }

        if ($bossHealth == 0) {
            echo $warningIcon;
            echo '<font color="green"><b>Bosas mirė!</b></font><br><br>';
            echo 'Atlygis sudavus paskutinį smūgį:<br>';
            $vegitaCashRewardForLastHit = 10;
            echo '<img src="../assets/img/reward.png"> Vegita cash: ' . skaicius($vegitaCashRewardForLastHit);
            echo '<br><br>';
            $vegitaCashRewardForFirstHit = 10;
            if ($boss->getFirstHitPlayerId() == $apie['id']) {
                echo 'Atlygis sudavus pirmą smūgį:<br>';
                echo '<img src="../assets/img/reward.png"> Vegita cash: ' . skaicius($vegitaCashRewardForFirstHit);
                echo '<br><br>';
            }

            $vegitaCashRewardForMostDamage = 50;
            $mostDamage = mysqli_fetch_assoc(mysqli_query($conn,"SELECT player_id, nick, SUM(player_damage) AS total_damage FROM world_boss_fights INNER JOIN zaidejai ON world_boss_fights.player_id = zaidejai.id WHERE world_boss_id = '$worldBossId' GROUP BY player_id ORDER BY total_damage DESC LIMIT 1"));
            if ($apie['id'] == $mostDamage['player_id']) {
                echo 'Atlygis padarius daugiausiai damage:<br>';
                echo '<img src="../assets/img/reward.png"> Vegita cash: ' . skaicius($vegitaCashRewardForMostDamage);
                echo '<br>';
                echo 'Padarei damage: ' . skaicius($mostDamage['total_damage']);
                echo '<br><br>';
            }

            // reward queries

            $vegitaCashRewardForMostHits = 20;
            $playerByMostHits = mysqli_fetch_assoc(mysqli_query($conn,"SELECT nick, player_id, COUNT(*) AS hits_count FROM world_boss_fights INNER JOIN zaidejai ON world_boss_fights.player_id = zaidejai.id WHERE world_boss_id = '$worldBossId' GROUP BY player_id ORDER BY hits_count DESC LIMIT 1"));
            mysqli_query($conn,"UPDATE zaidejai SET botas=botas+'$vegitaCashRewardForMostHits' WHERE id='$playerByMostHits[player_id]' ");

            // chest rewards
            if ($chest = $service->getRandomChest($bossConfig)) {
                if ($playerByMostHits['player_id'] == $apie['id']) {
                    echo '<img src="../assets/img/reward.png"> Skrynia: <font color="#6495ed"><b>' . $chest['type'] . '</b></font>';
                    echo '<br>';
                }

                $date = date('Y-m-d H:i:s');
                $expiresAt = date('Y-m-d H:i:s', strtotime($date . ' +1 hours'));
                mysqli_query($conn,"INSERT INTO `player_chest_drops` SET player_id = '$playerByMostHits[player_id]', type = '$chest[type]', expires_at = '$expiresAt' ");
                $insertedId = mysqli_insert_id($conn);
                foreach ($chest['config']['contents'] as $name => $chestContent) {
                    $amount = mt_rand($chestContent[0], $chestContent[1]);
                    mysqli_query($conn,"INSERT INTO `player_chest_drop_contents` SET chest_drop_id = '$insertedId', name = '$name', amount = '$amount' ") || die(mysqli_error());
                }
            }

            mysqli_query($conn,"UPDATE zaidejai SET botas=botas+'$vegitaCashRewardForLastHit' WHERE id='$apie[id]' ");
            $firstHitPlayerId = $boss->getFirstHitPlayerId();
            mysqli_query($conn,"UPDATE zaidejai SET botas=botas+'$vegitaCashRewardForFirstHit' WHERE id='$firstHitPlayerId' ");
            mysqli_query($conn,"UPDATE zaidejai SET botas=botas+'$vegitaCashRewardForMostDamage' WHERE id='$mostDamage[player_id]' ");

            $mostHitsMessage = 'Gavo ' . $vegitaCashRewardForMostHits . ' Vegita Cash.';
            mysqli_query($conn,"INSERT INTO `world_boss_rewards` SET world_boss_id = '$worldBossId', player_id = '$playerByMostHits[player_id]', type = 'most_hits', message = '$mostHitsMessage' ");
            $lastHitMessage = 'Gavo ' . $vegitaCashRewardForLastHit . ' Vegita Cash.';
            mysqli_query($conn,"INSERT INTO `world_boss_rewards` SET world_boss_id = '$worldBossId', player_id = '$apie[id]', type = 'last_hit', message = '$lastHitMessage' ");
            $firstHitMessage = 'Gavo ' . $vegitaCashRewardForFirstHit . ' Vegita Cash.';
            mysqli_query($conn,"INSERT INTO `world_boss_rewards` SET world_boss_id = '$worldBossId', player_id = '$firstHitPlayerId', type = 'first_hit', message = '$firstHitMessage' ");
            $mostDamageMessage = 'Gavo ' . $vegitaCashRewardForMostDamage . ' Vegita Cash.';
            mysqli_query($conn,"INSERT INTO `world_boss_rewards` SET world_boss_id = '$worldBossId', player_id = '$mostDamage[player_id]', type = 'most_damage', message = '$mostDamageMessage' ");
            $vegitaCashRewardForDamage = 10;
            $damageMessage = 'Gavo ' . $vegitaCashRewardForDamage . ' Vegita Cash.';

            $moneyBuff = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id, name, cooldown FROM skills WHERE name = 'Money Drop' LIMIT 1"));
            $luckyDropBuff = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id, name, cooldown FROM skills WHERE name = '" . Skill::BUFF_NAME_LUCKY_DROP . "' LIMIT 1"));
            $crossOfBloodBuff = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id, name, cooldown FROM skills WHERE name = '" . Skill::BUFF_NAME_CROSS_OF_BLOOD . "' LIMIT 1"));
            $divineProsperityBuff = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id, name, cooldown FROM skills WHERE name = 'Divine Prosperity' LIMIT 1"));
            $playersByTotalDamage = mysqli_query($conn,"SELECT player_id, nick, SUM(player_damage) AS total_damage FROM world_boss_fights INNER JOIN zaidejai ON world_boss_fights.player_id = zaidejai.id WHERE world_boss_id = '$worldBossId' GROUP BY player_id HAVING total_damage > 0 ORDER BY total_damage DESC LIMIT 3");
            while ($playerByTotalDamage = mysqli_fetch_assoc($playersByTotalDamage)) {
                mysqli_query($conn,"UPDATE zaidejai SET botas=botas+'$vegitaCashRewardForDamage' WHERE id='$playerByTotalDamage[player_id]' ");
                mysqli_query($conn,"INSERT INTO `world_boss_rewards` SET world_boss_id = '$worldBossId', player_id = '$playerByTotalDamage[player_id]', type = 'damage', message = '$damageMessage' ");

                // add buffs;
                if ($moneyBuff) {
                    $moneyBuffEndsAt = date('Y-m-d H:i:s', strtotime("now + $moneyBuff[cooldown] seconds"));
                    mysqli_query($conn,"INSERT INTO `player_skills` SET skill_id = '$moneyBuff[id]', player_id = '$playerByTotalDamage[player_id]', ends_at = '$moneyBuffEndsAt' ") || die(mysqli_error());
                    $message = $playerByTotalDamage['nick'] . ' padarė damage World bosui (' . $bossConfig['name'] . ') todėl gavo ' . $moneyBuff['name'] . ' bufą.';
                    $expiresAt = date('Y-m-d H:i:s', strtotime(' + 10 minutes'));
                    mysqli_query($conn,"INSERT INTO pokalbiai SET nick='SISTEMA', sms='$message', data='" . time() . "', expired_at='$expiresAt'");
                }

                if ($divineProsperityBuff) {
                    $divineProsperityBuffEndsAt = date('Y-m-d H:i:s', strtotime("now + $divineProsperityBuff[cooldown] seconds"));
                    mysqli_query($conn,"INSERT INTO `player_skills` SET skill_id = '$divineProsperityBuff[id]', player_id = '$playerByTotalDamage[player_id]', ends_at = '$divineProsperityBuffEndsAt' ") || die(mysqli_error());
                    $message = $playerByTotalDamage['nick'] . ' padarė damage World bosui (' . $bossConfig['name'] . ') todėl gavo ' . $divineProsperityBuff['name'] . ' bufą.';
                    $expiresAt = date('Y-m-d H:i:s', strtotime(' + 10 minutes'));
                    mysqli_query($conn,"INSERT INTO pokalbiai SET nick='SISTEMA', sms='$message', data='" . time() . "', expired_at='$expiresAt'");
                }

                if ($luckyDropBuff) {
                    $luckyDropBuffEndsAt = date('Y-m-d H:i:s', strtotime("now + $luckyDropBuff[cooldown] seconds"));
                    mysqli_query($conn,"INSERT INTO `player_skills` SET skill_id = '$luckyDropBuff[id]', player_id = '$playerByTotalDamage[player_id]', ends_at = '$luckyDropBuffEndsAt' ") || die(mysqli_error());
                    $message = $playerByTotalDamage['nick'] . ' padarė damage World bosui (' . $bossConfig['name'] . ') todėl gavo ' . $luckyDropBuff['name'] . ' bufą.';
                    $expiresAt = date('Y-m-d H:i:s', strtotime(' + 10 minutes'));
                    mysqli_query($conn,"INSERT INTO pokalbiai SET nick='SISTEMA', sms='$message', data='" . time() . "', expired_at='$expiresAt'");
                }

                if ($crossOfBloodBuff) {
                    $crossOfBloodBuffEndsAt = date('Y-m-d H:i:s', strtotime("now + $crossOfBloodBuff[cooldown] seconds"));
                    mysqli_query($conn,"INSERT INTO `player_skills` SET skill_id = '$crossOfBloodBuff[id]', player_id = '$playerByTotalDamage[player_id]', ends_at = '$crossOfBloodBuffEndsAt' ") || die(mysqli_error());
                    $message = $playerByTotalDamage['nick'] . ' padarė damage World bosui (' . $bossConfig['name'] . ') todėl gavo ' . $crossOfBloodBuff['name'] . ' bufą.';
                    $expiresAt = date('Y-m-d H:i:s', strtotime(' + 10 minutes'));
                    mysqli_query($conn,"INSERT INTO pokalbiai SET nick='SISTEMA', sms='$message', data='" . time() . "', expired_at='$expiresAt'");
                }

            }

            $text = 'Padarėte daugiausiai damage(' . $mostDamage['total_damage'] . ') world bosui ' . $bossConfig['name'] . ' už tai gaunate: ' . $vegitaCashRewardForMostDamage . ' Vegita Cash!';
            mysqli_query($conn,"INSERT INTO pm SET what = 'SISTEMA', txt='$text', gavejas='$mostDamage[nick]', nauj='NEW', time='" . time() . "'");
            $message = $apie['nick'] . ' sudavė paskutinį smūgį world bosui (' . $bossConfig['name'] . ') ';
            $expiresAt = date('Y-m-d H:i:s', strtotime(' + 1 hours'));
            $insert1 = mysqli_query($conn,"INSERT INTO pokalbiai SET nick='SISTEMA', sms='$message', data='" . time() . "', expired_at='$expiresAt'");
            sendDiscordMessage($message);

            $update2 = mysqli_query($conn,"UPDATE world_bosses SET dead_at = '$date', health = 0, last_hit_player_id = '$apie[id]' WHERE id = '$worldBossId'");
            mysqli_query($conn,"DELETE FROM world_bosses WHERE `ends_at` < '$date' AND dead_at IS NULL ");
            echo '</div>';

            $g_n[] = ["index.php", "World bosai", "Pulti bosą"];
            navigacija($g_n);
            return;
        }

        if ($playerHealth && $bossHealth) {
            echo '<br>';
            echo $arrow;
            echo 'Bosui liko gyvybių: ' . $bossHealth . '<br>';
            echo $arrow;
            echo 'Tau liko gyvybių: ' . $playerHealth . '<br>';
            if ($isBossCriticalDamage) {
                echo $arrow;
                echo '<font color="red"><b>Boso žala: ' . $bossDamage . '</b></font><br>';
            } else {
                echo $arrow;
                echo 'Boso žala: ' . sk($bossDamage) . '<br>';
            }
            echo $arrow;
            echo 'Tavo žala: ' . sk($playerDamage) . '<br>';

            // handle boss and player
            if ($boss->canSwitchDamage()) {
                $switchDamageAt = date('Y-m-d H:i:s', strtotime($date) + 60);
                $damageType = $boss->getDamageType() === \LegacyDbz\WorldBosses\DTO\WorldBoss::DAMAGE_TYPE_DEATH ? \LegacyDbz\WorldBosses\DTO\WorldBoss::DAMAGE_TYPE_REVIVAL : \LegacyDbz\WorldBosses\DTO\WorldBoss::DAMAGE_TYPE_DEATH;
                mysqli_query($conn,"UPDATE world_bosses SET damage_type='$damageType', switch_damage_at = '$switchDamageAt' WHERE id='$worldBossId'");

            }
            if ($apie['armor'] !== 'Mirties armor' && $damageType === \LegacyDbz\WorldBosses\DTO\WorldBoss::DAMAGE_TYPE_DEATH && $inv['mirties_armor'] > 0) {
                echo '<a href="/inv.php?id=use_mirtiesa&ID=Mirties armor">Užsidėti Mirties Armour</a><br>';
            }
            if ($apie['sword'] !== 'Mirties sword' && $damageType === \LegacyDbz\WorldBosses\DTO\WorldBoss::DAMAGE_TYPE_DEATH && $inv['mirties_sword'] > 0) {
                echo '<a href="/inv.php?id=use_mirtiess&ID=Mirties sword">Užsidėti Mirties Sword</a><br>';
            }
            if ($apie['armor'] !== 'Atgimimo armor' && $damageType === \LegacyDbz\WorldBosses\DTO\WorldBoss::DAMAGE_TYPE_REVIVAL && $inv['atgimimo_armor'] > 0) {
                echo '<a href="/inv.php?id=use_atgimimoa&ID=Atgimimo armor">Užsidėti Atgimimo Armour</a><br>';
            }
            if ($apie['sword'] !== 'Atgimimo sword' && $damageType === \LegacyDbz\WorldBosses\DTO\WorldBoss::DAMAGE_TYPE_REVIVAL && $inv['atgimimo_sword'] > 0) {
                echo '<a href="/inv.php?id=use_atgimimos&ID=Atgimimo sword">Užsidėti Atgimimo Sword</a><br>';
            }


            if (!$boss->getFirstHitPlayerId()) {
                mysqli_query($conn,"UPDATE world_bosses SET first_hit_player_id='$apie[id]' WHERE id='$worldBossId'");
            }

            mysqli_query($conn,"UPDATE world_bosses SET health='$bossHealth' WHERE id='$worldBossId'");
            mysqli_query($conn,"INSERT INTO world_boss_fights SET world_boss_id = '$worldBossId', player_id = '$apie[id]', player_damage = '$playerDamage', boss_damage = '$bossDamage', created_at='$date'");
            mysqli_query($conn,"UPDATE zaidejai SET vveiksmai=vveiksmai+'1', gyvybes=gyvybes-'$bossDamage' WHERE nick='$apie[nick]' AND gyvybes > 0");
        }
        echo '<br>';
        $_SESSION['pad-world-bosses'] = time() + 1;
    }
    $KD = random_int(9999, 99999);
    $_SESSION['refresh-world-bosses'] = $KD;

    echo '<div class="meniuc">';
    $linkText = 'Trenkti <b>' . $bossConfig['name'] . '</b>';
    echo '<a id="myLink" href="index.php?id=attack&KD=' . $KD . '">' . $linkText . '</a>';
    echo '<script>
    function startTimer() {
    let timerSeconds = 2;

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

    echo '<div class="meniuc">';
    echo '<p>Atsinaujins po <span id="timer">' . $refresh . '</span> sekundžių</p>';
    echo '</div>';

    echo '<script>
let refreshTime = ' . $refresh . '; // Set refresh time from PHP
let timerElement = document.getElementById("timer");

if (timerElement) {
    // Countdown timer
    let countdown = setInterval(function() {
        refreshTime--;  // Decrease the timer each second
        timerElement.textContent = refreshTime;  // Update the displayed time

        // When the timer reaches 0, refresh the page
        if (refreshTime <= 0) {
            clearInterval(countdown);  // Stop the countdown
            window.location.href = "index.php?id=attack&KD=" + ' . $KD . ';
        }
    }, 1000);  // Update every second
} else {
    console.error("Timer element not found!");
}
</script>';
    echo '</div>';
    $g_n[] = ["index.php", "World bosai", "Pulti bosą"];
    navigacija($g_n);
}

function hasPlayerFullDeathSet()
{
    global  $apie;

    $amulet = $apie['amuletas'];
    $armour = $apie['armor'];
    $sword = $apie['sword'];
    if ($amulet !== 'Mirties amulet') {
        return false;
    }
    if ($armour !== 'Mirties armor') {
        return false;
    }
    return $sword === 'Mirties sword';
}

function hasPlayerFullRevivalSet()
{
    global  $apie;

    $amulet = $apie['amuletas'];
    $armour = $apie['armor'];
    $sword = $apie['sword'];
    if ($amulet !== 'Atgimimo amulet') {
        return false;
    }
    if ($armour !== 'Atgimimo armor') {
        return false;
    }
    return $sword === 'Atgimimo sword';
}

/**
 * FOOTER
 */
include_once __DIR__ . '/parts/footer.php';
