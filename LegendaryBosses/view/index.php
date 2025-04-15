<?php

/**
 * HEADER
 */

use LegacyDbz\LegendaryBosses\DTO\LegendaryBoss;
use LegacyDbz\Players\Services\CurrentPlayer;

include_once __DIR__ . '/parts/head.php';

$date = date('Y-m-d H:i:s');

/**
 * CONTENT
 */
if (!isset($id)) {
    online('Legendary Bosso peržiūra');
    $repository = new \LegacyDbz\LegendaryBosses\Repositories\LegendaryBossRepository();
    $service = new \LegacyDbz\LegendaryBosses\Services\LegendaryBossService($repository);
    $boss = $service->get();
    if (!$boss) {
        $bossList = $service->getBossesFromConfig();
        echo '  <div class="meniuc">';
        echo 'Pasirinkite bosą, kurį norite iškviesti';
        echo '</div>';
        echo '  <div class="meniuc">';
        echo '<div class="boss-select">';
        foreach ($bossList as $boss) {
            $additionalStyle = 'border: 2px solid #000;';
            if ($boss['name'] === 'Jiren') {
                $additionalStyle = 'border: 2px solid #999;';
            } elseif ($boss['name'] === 'Beerus') {
                $additionalStyle = 'border: 3px solid purple;';
            }

            echo '<a href="?id=summon&bossId=' . $boss['id'] . '" style="' . $additionalStyle . '">
            <img src="../assets/img/' . $boss['image'] . '" alt="' . $boss['name'] . '">
            <div class="boss-name">' . $boss['name'] . '</div>
          </a>';
        }
        echo '</div>';
        echo '</div>';
        echo '<div class="meniuc">';
        echo ' <a href="index.php?id=dead_bosses">Nukauti bosai</a><br>';
        echo '</div>';
        $g_n[] = ["/pagrindinis.php?id=", "Pagrindinis", "Legendary bosai"];
        navigacija($g_n);
        return;
    }

    echo '<div class="meniuc">
<b>Legendary Bosai</b> - galingi bosai, prieš kuriuos gali kovoti visi žaidimo žaidėjai, o prizus sužinosite nukovę bosą. 
Neužsidėjus mirties, atgimimo daiktų kovoti nerekomenduojama.
</div>';

    if (!$boss) {
        echo '<div class="meniuc">';
        echo 'Bosų nėra.';
        echo '</div>';
        $g_n[] = ["/pagrindinis.php?id=", "Pagrindinis", "Legendary bosai"];
        navigacija($g_n);
        return;
    }

    $bossConfig = $service->getBossConfig($boss->getBossId());
    echo '<div class="meniuc parent-container">';
    echo '<div class="card">';

    if (isset($bossConfig['videos'])) {
        $video = $service->getRandomVideo($bossConfig);
        echo ' <div class="video-container">';
        echo ' <video controls autoplay>';
        echo '<source src="../assets/videos/' . $video . '" type="video/mp4">';
        echo '</video></div><br>';
    }
    if (isset($bossConfig['images'])) {
        $additionalStyle = 'border: 2px solid #000;';
        if ($bossConfig['name'] === 'Jiren') {
            $additionalStyle = 'border: 2px solid #999;';
        } elseif ($bossConfig['name'] === 'Beerus') {
            $additionalStyle = 'border: 3px solid purple;';
        }
        $image = $service->getRandomImage($bossConfig);
        echo '<img width="150" src="../assets/img/' . $image . '" style="' . $additionalStyle . '">';
    }
    echo '<div class="card-body">';

    echo '<b>' . $bossConfig['name'] . '</b><br><br>';
    $totalHealth = $bossConfig['health'];
    $currentHealth = $boss->getHealth();
    $healthPercentage = ($currentHealth / $totalHealth) * 100;
    echo 'Gyvybių: ' . skaicius($boss->getHealth());
    echo '<div class="health-bar">';
    echo '<div class="health-bar-fill" style="width: ' . $healthPercentage . '%;"></div>';
    echo '<div class="bar-text">' . round($healthPercentage) . '%</div>';
    echo '</div>';
    echo '<br>';
    $totalBlockRate = 100;
    $currentBlockRate = array_sum($bossConfig['blockRatePercentage']) / count($bossConfig['blockRatePercentage']); // Current health from your logic
    $blockRatePercentage = ($currentBlockRate / $totalBlockRate) * 100;
    echo 'Blokavimo procentas:<br>';
    echo '<div class="block-rate-bar">';
    echo '<div class="block-rate-bar-fill" style="width: ' . $blockRatePercentage . '%;"></div>';
    echo '<div class="bar-text">' . round($blockRatePercentage) . '%</div>';
    echo '</div>';
    echo '<br>';
    echo 'Prikeltas iki: <b>' . formatDateTimeString($boss->getEndsAt()) . '</b><br><br>';
    echo ' <a href="index.php?id=attack" class="button">Kovoti</a><br>';
    if (!$boss->isFreezed()) {
        echo '<br>';
        echo ' <a href="index.php?id=freeze" class="button">Freezinti</a><br>';
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
    echo '</div>';
    echo '</div>';

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
    echo 'Daugiausiai damage Legendary Bosams daro veikėjas: <font color="red">Kefla</font><br>';
    echo '</div>';

    $g_n[] = ["/pagrindinis.php?id=", "Pagrindinis", "Legendary bosai"];
    navigacija($g_n);
}

if ($id === 'dead_bosses') {
    online('Peržiūri nukautus Legendary Bosus');
    echo '<div class="meniuc">
   Nukauti bosai
</div>';

    $repository = new \LegacyDbz\LegendaryBosses\Repositories\LegendaryBossRepository();
    $service = new \LegacyDbz\LegendaryBosses\Services\LegendaryBossService($repository);
    $result = mysqli_query($conn,"SELECT COUNT(*) FROM legendary_bosses WHERE dead_at IS NOT NULL");
    $row = mysqli_fetch_row($result);
    $deadBosses = $row[0];

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

        $deadBossesQuery = mysqli_query($conn,"SELECT * FROM legendary_bosses WHERE dead_at IS NOT NULL ORDER BY id DESC LIMIT $startFrom, $perPage");
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
                $hitsCount = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `legendary_boss_fights` WHERE legendary_boss_id = '$boss[id]'"));
                echo $arrow;
                echo 'Kad nukauti bosą žaidėjams prireikė suduoti bosui: ' . $hitsCount . ' smūgių.';
                echo '<br>';
                $blockCount = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `legendary_boss_fights` WHERE legendary_boss_id = '$boss[id]' AND player_damage = 0"));
                echo $arrow;
                echo 'Bosas blokavo: ' . $blockCount . ' smūgius.';
                echo '<br>';
                $bossBlocksPercentage = mysqli_fetch_assoc(mysqli_query($conn,"SELECT ROUND((COUNT(CASE WHEN player_damage = 0 THEN 1 END) / COUNT(*)) * 100) AS blocks_percentage FROM legendary_boss_fights WHERE legendary_boss_id = '$boss[id]'"));
                echo $arrow;
                echo 'Smūgių blokavimo procentas: ' . $bossBlocksPercentage['blocks_percentage'] . '%';
                echo '<br>';
                $bossTotalDamageToPlayer = mysqli_fetch_assoc(mysqli_query($conn,"SELECT nick, SUM(boss_damage) AS most_damage FROM legendary_boss_fights INNER JOIN zaidejai ON legendary_boss_fights.player_id = zaidejai.id WHERE legendary_boss_id = '$boss[id]' GROUP BY player_id ORDER BY most_damage DESC LIMIT 1"));
                echo $arrow;
                echo 'Daugiausiai žalos bosas padarė žaidėjui: ' . $bossTotalDamageToPlayer['nick'] . '(' . sk($bossTotalDamageToPlayer['most_damage']) . ')';
                echo '<br><br>';
                echo 'Atlygiai: <br><br>';
                $rewardsQuery = mysqli_query($conn,"SELECT legendary_boss_rewards.*, zaidejai.nick FROM legendary_boss_rewards INNER JOIN zaidejai ON legendary_boss_rewards.player_id = zaidejai.id WHERE legendary_boss_id = '$boss[id]'");
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
                $playersByTotalDamage = mysqli_query($conn,"SELECT player_id, nick, SUM(player_damage) AS total_damage FROM legendary_boss_fights INNER JOIN zaidejai ON legendary_boss_fights.player_id = zaidejai.id WHERE legendary_boss_id = '$boss[id]' GROUP BY player_id HAVING total_damage > 0 ORDER BY total_damage DESC LIMIT 3");
                while ($playerByTotalDamage = mysqli_fetch_assoc($playersByTotalDamage)) {
                    echo $arrow;
                    echo $playerByTotalDamage['nick'] . '(', sk($playerByTotalDamage['total_damage']) . ')';
                    echo '<br>';
                }
                echo '<br>';
                $mostDamagePlayer = mysqli_fetch_assoc(mysqli_query($conn,"SELECT player_id, nick, MAX(player_damage) AS most_damage FROM legendary_boss_fights INNER JOIN zaidejai ON legendary_boss_fights.player_id = zaidejai.id WHERE legendary_boss_id = '$boss[id]' GROUP BY player_id ORDER BY most_damage DESC LIMIT 1"));
                echo $arrow;
                echo 'Stipriausią smūgį sudavė: ' . $mostDamagePlayer['nick'] . '(' . sk($mostDamagePlayer['most_damage']) . ')';
                echo '<br>';
                $playerByMostHits = mysqli_fetch_assoc(mysqli_query($conn,"SELECT nick, COUNT(*) AS hits_count FROM legendary_boss_fights INNER JOIN zaidejai ON legendary_boss_fights.player_id = zaidejai.id WHERE legendary_boss_id = '$boss[id]' GROUP BY player_id ORDER BY hits_count DESC LIMIT 1"));
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
    $g_n[] = ["index.php", "Legendary bosai", "Nukauti bosai"];
    navigacija($g_n);
}

/**
 * Freeze boss
 */
if ($id === 'freeze') {
    online('Freezina Legendary Bosą');
    top('Legendary boss mental freeze');
    $repository = new \LegacyDbz\LegendaryBosses\Repositories\LegendaryBossRepository();
    $service = new \LegacyDbz\LegendaryBosses\Services\LegendaryBossService($repository);
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

    echo '<form action="?id=freezeLegendaryBoss" method="post"/>';
    echo 'Kiek minučių freezinti:<br />';
    echo '<input type="number" value="1" min="1" max="15" name="minutes"><br />
        <input type="submit" name="submit" value="Freezinti"/></form></div>';
    echo '</form>';
    echo '</div>';
}

if ($id === 'freezeLegendaryBoss') {
    online('Legendary boss > Freeze Legendary Boss');
    top('Legendary boss mental freeze');
    $repository = new \LegacyDbz\LegendaryBosses\Repositories\LegendaryBossRepository();
    $service = new \LegacyDbz\LegendaryBosses\Services\LegendaryBossService($repository);
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

if ($id === 'summon') {
    $bossId = isset($_GET['bossId']) ? preg_replace('/\D/', "", (string) $_GET['bossId']) : null;
    $repository = new \LegacyDbz\LegendaryBosses\Repositories\LegendaryBossRepository();
    $service = new \LegacyDbz\LegendaryBosses\Services\LegendaryBossService($repository);
    $boss = $service->get();
    $bossConfig = $service->getBossConfig($bossId);
    online('Iškviečia Legendary Bosą');

    if ($boss) {
        echo '<div class="meniu">';
        echo 'Bosas jau iškviestas<br>';
        echo '</div>';
        $g_n[] = ["index.php", "Legendary bosai", "Iškviesti bosą"];
        navigacija($g_n);
        return;
    }
    if (!$bossConfig) {
        echo '<div class="meniu">';
        echo 'Neteisinga boso konfigūraciją<br>';
        echo '</div>';
        $g_n[] = ["index.php", "Legendary bosai", "Iškviesti bosą"];
        navigacija($g_n);
        return;
    }
    $legendaryBoss = $service->getPreparedBoss($bossConfig['id']);
    if (!$legendaryBoss) {
        echo '<div class="meniu">';
        echo 'Bosas neseniai buvo prikeltas<br>';
        echo '</div>';
        $g_n[] = ["index.php", "Legendary bosai", "Iškviesti bosą"];
        navigacija($g_n);
        return;
    }
    $legendaryBossId = $legendaryBoss->getId();

    echo '  <div class="meniuc">';
    $additionalStyle = 'border: 3px solid #000;';
    if ($bossConfig['name'] === 'Jiren') {
        $additionalStyle = 'border: 3px solid #f84cb1;';
    } elseif ($bossConfig['name'] === 'Beerus') {
        $additionalStyle = 'border: 3px solid purple;';
    }

    echo '
            <img width=150 src="../assets/img/' . $service->getRandomImage($bossConfig) . '" alt="' . $bossConfig['name'] . '">
            <div class="boss-name">' . $bossConfig['name'] . '</div>
          ';

    echo '</div>';
    echo '  <div class="meniu">';

    $contributionsQuery = mysqli_query($conn,"SELECT item_name, SUM(quantity) AS total_quantity FROM legendary_boss_summon_contributions WHERE legendary_boss_id = '$legendaryBossId' GROUP BY item_name");
    $contributions = [];
    while ($row = mysqli_fetch_assoc($contributionsQuery)) {
        $contributions[$row['item_name']] = $row['total_quantity'];
    }

    $requirements = $bossConfig['summon_items'];
    echo $skull;
    echo '<b>Turite paaukoti:</b>';
    echo '<br><br>';
    if ($requirements['tinOre']) {
        $dontHave = $requirements['tinOre'] > $contributions['tinOre'];
        $icon = $dontHave ? $arrow : $checked;
        echo $icon;
        echo skaicius($requirements['tinOre']) . ' alavo rūdos';
        if ($dontHave) {
            echo ' (' . (int)$contributions['tinOre'] . '/' . (int)$requirements['tinOre'] . ')';
        }
        echo '<br>';
    }
    if ($requirements['sayiantail']) {
        $dontHave = $requirements['sayiantail'] > $contributions['sayiantail'];
        $icon = $dontHave ? $arrow : $checked;
        echo $icon;
        echo skaicius($requirements['sayiantail']) . ' sayiantail';
        if ($dontHave) {
            echo ' (' . (int)$contributions['sayiantail'] . '/' . (int)$requirements['sayiantail'] . ')';
        }
        echo '<br>';
    }
    if ($requirements['fusionfail']) {
        $dontHave = $requirements['fusionfail'] > $contributions['fusionfail'];
        $icon = $dontHave ? $arrow : $checked;
        echo $icon;
        echo skaicius($requirements['fusionfail']) . ' fusionfail';
        if ($dontHave) {
            echo ' (' . (int)$contributions['fusionfail'] . '/' . (int)$requirements['fusionfail'] . ')';
        }
        echo '<br>';
    }
    if ($requirements['stone']) {
        $dontHave = $requirements['stone'] > $contributions['stone'];
        $icon = $dontHave ? $arrow : $checked;
        echo $icon;
        echo skaicius($requirements['stone']) . ' stone';
        if ($dontHave) {
            echo ' (' . (int)$contributions['stone'] . '/' . (int)$requirements['stone'] . ')';
        }
        echo '<br>';
    }
    if ($requirements['cadmiumOre']) {
        $dontHave = $requirements['cadmiumOre'] > $contributions['cadmiumOre'];
        $icon = $dontHave ? $arrow : $checked;
        echo $icon;
        echo skaicius($requirements['cadmiumOre']) . ' kadmio rūdos';
        if ($dontHave) {
            echo ' (' . (int)$contributions['cadmiumOre'] . '/' . (int)$requirements['cadmiumOre'] . ')';
        }
        echo '<br>';
    }
    if ($requirements['titanOre']) {
        $dontHave = $requirements['titanOre'] > $contributions['titanOre'];
        $icon = $dontHave ? $arrow : $checked;
        echo $icon;
        echo skaicius($requirements['titanOre']) . ' titano rūdos';
        if ($dontHave) {
            echo ' (' . (int)$contributions['titanOre'] . '/' . (int)$requirements['titanOre'] . ')';
        }
        echo '<br>';
    }
    if ($requirements['quartzOre']) {
        $dontHave = $requirements['quartzOre'] > $contributions['quartzOre'];
        $icon = $dontHave ? $arrow : $checked;
        echo $icon;
        echo skaicius($requirements['quartzOre']) . ' kvarco rūdos';
        if ($dontHave) {
            echo ' (' . (int)$contributions['quartzOre'] . '/' . (int)$requirements['quartzOre'] . ')';
        }
        echo '<br>';
    }
    if ($requirements['microshem']) {
        $dontHave = $requirements['microshem'] > $contributions['microshem'];
        $icon = $dontHave ? $arrow : $checked;
        echo $icon;
        echo skaicius($requirements['microshem']) . ' mikroschemų';
        if ($dontHave) {
            echo ' (' . (int)$contributions['microshem'] . '/' . (int)$requirements['microshem'] . ')';
        }
        echo '<br>';
    }
    echo '</div>';
    echo '<div class="meniuc">';
    echo '<a href="index.php?id=contribute_items&bossId=' . $bossId . '" class="button">Aukoti</a>';
    echo '</div>';
    echo '<div class="meniuc">';
    echo '<a href="index.php?id=summon_boss&bossId=' . $bossId . '" class="button">Iškviesti</a>';
    echo '</div>';
    echo '  <div class="meniu">';
    echo 'Aukų logas';
    echo '<br><br>';
    $playerContributionsQuery = mysqli_query($conn,"SELECT zaidejai.nick, item_name, quantity, contributed_at FROM legendary_boss_summon_contributions
    INNER JOIN legendary_bosses ON legendary_boss_summon_contributions.legendary_boss_id = legendary_bosses.id
                                                 INNER JOIN zaidejai ON legendary_boss_summon_contributions.player_id = zaidejai.id
                                                 WHERE legendary_bosses.boss_id = '$bossConfig[id]' AND starts_at IS NULL
                                                 ORDER BY contributed_at DESC
                                                 LIMIT 5
                                                 ");
    while ($row = mysqli_fetch_assoc($playerContributionsQuery)) {
        echo $arrow;
        echo $row['nick'] . ' paaukojo ' . $row['item_name'] . ' x' . $row['quantity'];
        echo '(' . formatDateTimeString($row['contributed_at']) . ')';
        echo '<br>';
    }

    echo '</div>';
    if ($bossConfig['chests']) {
    echo '  <div class="meniu">';

        echo $chest;
        echo " <b>Skrynių drop</b>:";

        echo '<br><br>';
        foreach ($bossConfig['chests'] as $key => $chest) {
            echo $arrow;
            echo $key;
            echo ' - ' . $chest['dropRate'] . '%';
            echo '<br>';
        }
    echo '</div>';
    }


    $g_n[] = ["index.php", "Legendary bosai", "Iškviesti bosą"];
    navigacija($g_n);
}

if ($id === 'summon_boss') {
    top('Boso iškvietimo apeigos');
    online('Legendary Boso iškvietimo apeigos');

    echo '  <div class="meniu">';
    $bossId = isset($_GET['bossId']) ? preg_replace('/\D/', "", (string) $_GET['bossId']) : null;
    $repository = new \LegacyDbz\LegendaryBosses\Repositories\LegendaryBossRepository();
    $service = new \LegacyDbz\LegendaryBosses\Services\LegendaryBossService($repository);
    $boss = $service->get();
    $bossConfig = $service->getBossConfig($bossId);

    $legendaryBoss = $service->getPreparedBoss($bossConfig['id']);
    $legendaryBossId = $legendaryBoss->getId();

    $contributionsQuery = mysqli_query($conn,"SELECT item_name, SUM(quantity) AS total_quantity FROM legendary_boss_summon_contributions WHERE legendary_boss_id = '$legendaryBossId' GROUP BY item_name");
    $contributions = [];
    while ($row = mysqli_fetch_assoc($contributionsQuery)) {
        $contributions[$row['item_name']] = $row['total_quantity'];
    }

    $requirements = $bossConfig['summon_items'];
    $error = false;
    if ($requirements['stone']) {
        $dontHave = $requirements['stone'] > $contributions['stone'];
        if ($dontHave) {
            $value = $requirements['stone'] - $contributions['stone'];
            echo $arrow;
            echo 'Trūksta stone: ' . $value;
            echo '<br>';
            $error = true;
        }
    }
    if ($requirements['cadmiumOre']) {
        $dontHave = $requirements['cadmiumOre'] > $contributions['cadmiumOre'];
        if ($dontHave) {
            $value = $requirements['cadmiumOre'] - $contributions['cadmiumOre'];
            echo $arrow;
            echo 'Trūksta kadmio: ' . $value;
            echo '<br>';
            $error = true;
        }
    }
    if ($requirements['sayiantail']) {
        $dontHave = $requirements['sayiantail'] > $contributions['sayiantail'];
        if ($dontHave) {
            $value = $requirements['sayiantail'] - $contributions['sayiantail'];
            echo $arrow;
            echo 'Trūksta sayiantail: ' . $value;
            echo '<br>';
            $error = true;
        }
    }
    if ($requirements['microshem']) {
        $dontHave = $requirements['microshem'] > $contributions['microshem'];
        if ($dontHave) {
            $value = $requirements['microshem'] - $contributions['microshem'];
            echo $arrow;
            echo 'Trūksta microshem: ' . $value;
            echo '<br>';
            $error = true;
        }
    }

    if (!$error) {
        $repository->summon($legendaryBossId);
        $message = $nick . ' iškvietė Legendary bosą (' . $bossConfig['name'] . ')! Skubėkite nukauti!';
        $expiresAt = date('Y-m-d H:i:s', strtotime(' + 10 minutes'));
        mysqli_query($conn,"INSERT INTO pokalbiai SET nick='SISTEMA', sms='$message', data='" . time() . "', expired_at='$expiresAt'");
        echo $bossConfig['name'] . ' sėkmingai iškviestas';
        sendDiscordMessage($message);

    }

    echo '</div>';

    $g_n[] = ["/pagrindinis.php?id=", "Pagrindinis", "index.php", "Legendary bosai", "index.php?id=summon&bossId=$bossId", "Iškviesti bosą", "Kvietimo apeigos"];
    navigacija($g_n);
}


if ($id === 'contribute_items') {
    $bossId = isset($_GET['bossId']) ? preg_replace('/\D/', "", (string) $_GET['bossId']) : null;
    $repository = new \LegacyDbz\LegendaryBosses\Repositories\LegendaryBossRepository();
    $service = new \LegacyDbz\LegendaryBosses\Services\LegendaryBossService($repository);
    $boss = $service->get();
    $bossConfig = $service->getBossConfig($bossId);
    online('Aukoja Legendary Bosui');

    if ($boss) {
        echo '<div class="meniu">';
        echo 'Bosas jau iškviestas<br>';
        echo '</div>';
        $g_n[] = ["index.php", "Legendary bosai", "Iškviesti bosą"];
        navigacija($g_n);
        return;
    }
    if (!$bossConfig) {
        echo '<div class="meniu">';
        echo 'Neteisinga boso konfigūraciją<br>';
        echo '</div>';
        $g_n[] = ["index.php", "Legendary bosai", "Iškviesti bosą"];
        navigacija($g_n);
        return;
    }

    $legendaryBoss = $service->getPreparedBoss($bossConfig['id']);
    $legendaryBossId = $legendaryBoss->getId();
    $contributionsQuery = mysqli_query($conn,"SELECT item_name, SUM(quantity) AS total_quantity FROM legendary_boss_summon_contributions WHERE legendary_boss_id = '$legendaryBossId' GROUP BY item_name");
    $contributions = [];
    while ($row = mysqli_fetch_assoc($contributionsQuery)) {
        $contributions[$row['item_name']] = $row['total_quantity'];
    }
    $requirements = $bossConfig['summon_items'];

    $sayiantailAmount = $requirements['sayiantail'] - $contributions['sayiantail'];
    $sayiantailAmount = max($sayiantailAmount, 0);
    $sayiantailToContribute = min($inv['Sayiantail'], $sayiantailAmount);
    if ($sayiantailToContribute) {
        echo '<div class="meniuc">Trūksta <font color="red"><b>' . skaicius($sayiantailAmount) . '</b></font> Sayiantail</div>';
        echo '<div class="meniuc">
        <form action="?id=contributeSayiantail&bossId=' . $bossId . '" method="post"/>
        Kiek paaukosite:<br />
        <input type="number" value="' . $sayiantailToContribute . '" min="1" max="' . $sayiantailToContribute . '" name="amount"><br />
        <input type="submit" name="submit" value="Aukoti"/></form></div>';
    }

    $stoneAmount = $requirements['stone'] - $contributions['stone'];
    $stoneAmount = max($stoneAmount, 0);
    $stoneToContribute = min($inv['Stone'], $stoneAmount);
    if ($stoneToContribute) {
        echo '<div class="meniuc">Trūksta <font color="red"><b>' . skaicius($stoneAmount) . '</b></font> Stone</div>';
        echo '<div class="meniuc">
        <form action="?id=contributeStone&bossId=' . $bossId . '" method="post"/>
        Kiek paaukosite:<br />
        <input type="number" value="' . $stoneToContribute . '" min="1" max="' . $stoneToContribute . '" name="amount"><br />
        <input type="submit" name="submit" value="Aukoti"/></form></div>';
    }

    $cadmiumOreAmount = $requirements['cadmiumOre'] - $contributions['cadmiumOre'];
    $cadmiumOreAmount = max($cadmiumOreAmount, 0);
    $cadmiumOreToContribute = min($inv['kadmis'], $cadmiumOreAmount);
    if ($cadmiumOreToContribute) {
        echo '<div class="meniuc">Trūksta <font color="red"><b>' . skaicius($cadmiumOreAmount) . '</b></font> Kadmio rūdos</div>';
        echo '<div class="meniuc">
        <form action="?id=contributeCadmiumOre&bossId=' . $bossId . '" method="post"/>
        Kiek paaukosite:<br />
        <input type="number" value="' . $cadmiumOreToContribute . '" min="1" max="' . $cadmiumOreToContribute . '" name="amount"><br />
        <input type="submit" name="submit" value="Aukoti"/></form></div>';
    }

    $microshemAmount = $requirements['microshem'] - $contributions['microshem'];
    $microshemAmount = max($microshemAmount, 0);
    $microshemToContribute = min($inv['Microshem'], $microshemAmount);
    if ($microshemToContribute) {
        echo '<div class="meniuc">Trūksta <font color="red"><b>' . skaicius($microshemAmount) . '</b></font> Microshem</div>';
        echo '<div class="meniuc">
        <form action="?id=contributeMicroshem&bossId=' . $bossId . '" method="post"/>
        Kiek paaukosite:<br />
        <input type="number" value="' . $microshemToContribute . '" min="1" max="' . $microshemToContribute . '" name="amount"><br />
        <input type="submit" name="submit" value="Aukoti"/></form></div>';
    }


    $g_n[] = ["/pagrindinis.php?id=", "Pagrindinis", "index.php", "Legendary bosai", "index.php?id=summon&bossId=$bossId", "Iškviesti bosą", "Aukoti daiktus"];
    navigacija($g_n);
}

if ($id === 'contributeSayiantail') {
    online('Auka bosui > aukoja Sayiantail');
    top('Sayiantail aukojimas');
    $bossId = isset($_GET['bossId']) ? preg_replace('/\D/', "", (string) $_GET['bossId']) : null;

    if (isset($_POST['submit'])) {
        $repository = new \LegacyDbz\LegendaryBosses\Repositories\LegendaryBossRepository();
        $service = new \LegacyDbz\LegendaryBosses\Services\LegendaryBossService($repository);
        $boss = $service->getPreparedBoss($bossId);
        $bossConfig = $service->getBossConfig($bossId);
        $amount = isset($_POST['amount']) ? preg_replace("/[^0-9]/", "", $_POST['amount']) : null;

        if (empty($amount)) {
            echo '<div class="meniuc">Palikote tuščią laukelį!</div>';
        } elseif ($inv['Sayiantail'] < $amount) {
            echo '<div class="meniuc">Neturite pakankamai Sayiantail!</div>';
        } else {
            echo '<div class="meniuc">Paakojote sėkmingai <font color="red"><b>' . sk($amount) . '</b></font> Sayiantail</div> ';
            mysqli_query($conn,"UPDATE inv SET Sayiantail=Sayiantail-'$amount' WHERE nick='$nick' ");
            $legendaryBossId = $boss->getId();
            $currentDate = date('Y-m-d H:i:s');
            mysqli_query($conn,"INSERT INTO legendary_boss_summon_contributions SET player_id='$apie[id]', legendary_boss_id='$legendaryBossId', item_name='sayiantail', quantity='$amount', contributed_at='$currentDate'");
        }
    }

    $g_n[] = ["/pagrindinis.php?id=", "Pagrindinis", "index.php", "Legendary bosai", "index.php?id=contribute_items&bossId=$bossId", "Iškviesti bosą", "Aukoti daiktus"];
    navigacija($g_n);
}

if ($id === 'contributeStone') {
    online('Auka bosui > aukoja Stone');
    top('Stone aukojimas');
    $bossId = isset($_GET['bossId']) ? preg_replace('/\D/', "", (string) $_GET['bossId']) : null;

    if (isset($_POST['submit'])) {
        $repository = new \LegacyDbz\LegendaryBosses\Repositories\LegendaryBossRepository();
        $service = new \LegacyDbz\LegendaryBosses\Services\LegendaryBossService($repository);
        $boss = $service->getPreparedBoss($bossId);
        $bossConfig = $service->getBossConfig($bossId);
        $amount = isset($_POST['amount']) ? preg_replace("/[^0-9]/", "", $_POST['amount']) : null;

        if (empty($amount)) {
            echo '<div class="meniuc">Palikote tuščią laukelį!</div>';
        } elseif ($inv['Stone'] < $amount) {
            echo '<div class="meniuc">Neturite pakankamai Stone!</div>';
        } else {
            echo '<div class="meniuc">Paakojote sėkmingai <font color="red"><b>' . sk($amount) . '</b></font> Stone</div> ';
            mysqli_query($conn,"UPDATE inv SET Stone=Stone-'$amount' WHERE nick='$nick' ");
            $legendaryBossId = $boss->getId();
            $currentDate = date('Y-m-d H:i:s');
            mysqli_query($conn,"INSERT INTO legendary_boss_summon_contributions SET player_id='$apie[id]', legendary_boss_id='$legendaryBossId', item_name='stone', quantity='$amount', contributed_at='$currentDate'");
        }
    }

    $g_n[] = ["/pagrindinis.php?id=", "Pagrindinis", "index.php", "Legendary bosai", "index.php?id=contribute_items&bossId=$bossId", "Iškviesti bosą", "Aukoti daiktus"];
    navigacija($g_n);
}

if ($id === 'contributeCadmiumOre') {
    online('Auka bosui > aukoja Kadmio rūdą');
    top('Kadmio rūdos aukojimas');
    $bossId = isset($_GET['bossId']) ? preg_replace('/\D/', "", (string) $_GET['bossId']) : null;

    if (isset($_POST['submit'])) {
        $repository = new \LegacyDbz\LegendaryBosses\Repositories\LegendaryBossRepository();
        $service = new \LegacyDbz\LegendaryBosses\Services\LegendaryBossService($repository);
        $boss = $service->getPreparedBoss($bossId);
        $bossConfig = $service->getBossConfig($bossId);
        $amount = isset($_POST['amount']) ? preg_replace("/[^0-9]/", "", $_POST['amount']) : null;

        if (empty($amount)) {
            echo '<div class="meniuc">Palikote tuščią laukelį!</div>';
        } elseif ($inv['kadmis'] < $amount) {
            echo '<div class="meniuc">Neturite pakankamai kadmio rūdos!</div>';
        } else {
            echo '<div class="meniuc">Paakojote sėkmingai <font color="red"><b>' . sk($amount) . '</b></font> kadmio rūdos</div> ';
            mysqli_query($conn,"UPDATE inv SET kadmis=kadmis-'$amount' WHERE nick='$nick' ");
            $legendaryBossId = $boss->getId();
            $currentDate = date('Y-m-d H:i:s');
            mysqli_query($conn,"INSERT INTO legendary_boss_summon_contributions SET player_id='$apie[id]', legendary_boss_id='$legendaryBossId', item_name='cadmiumOre', quantity='$amount', contributed_at='$currentDate'");
        }
    }

    $g_n[] = ["/pagrindinis.php?id=", "Pagrindinis", "index.php", "Legendary bosai", "index.php?id=contribute_items&bossId=$bossId", "Iškviesti bosą", "Aukoti daiktus"];
    navigacija($g_n);
}

if ($id === 'contributeMicroshem') {
    online('Auka bosui > aukoja Microshemas');
    top('Microshemų aukojimas');
    $bossId = isset($_GET['bossId']) ? preg_replace('/\D/', "", (string) $_GET['bossId']) : null;

    if (isset($_POST['submit'])) {
        $repository = new \LegacyDbz\LegendaryBosses\Repositories\LegendaryBossRepository();
        $service = new \LegacyDbz\LegendaryBosses\Services\LegendaryBossService($repository);
        $boss = $service->getPreparedBoss($bossId);
        $bossConfig = $service->getBossConfig($bossId);
        $amount = isset($_POST['amount']) ? preg_replace("/[^0-9]/", "", $_POST['amount']) : null;

        if (empty($amount)) {
            echo '<div class="meniuc">Palikote tuščią laukelį!</div>';
        } elseif ($inv['Microshem'] < $amount) {
            echo '<div class="meniuc">Neturite pakankamai Microshem!</div>';
        } else {
            echo '<div class="meniuc">Paakojote sėkmingai <font color="red"><b>' . sk($amount) . '</b></font> Microshem</div> ';
            mysqli_query($conn,"UPDATE inv SET Microshem=Microshem-'$amount' WHERE nick='$nick' ");
            $legendaryBossId = $boss->getId();
            $currentDate = date('Y-m-d H:i:s');
            mysqli_query($conn,"INSERT INTO legendary_boss_summon_contributions SET player_id='$apie[id]', legendary_boss_id='$legendaryBossId', item_name='microshem', quantity='$amount', contributed_at='$currentDate'");
        }
    }

    $g_n[] = ["/pagrindinis.php?id=", "Pagrindinis", "index.php", "Legendary bosai", "index.php?id=contribute_items&bossId=$bossId", "Iškviesti bosą", "Aukoti daiktus"];
    navigacija($g_n);
}

/**
 * Attack boss
 */
if ($id === 'attack') {
    online('Kapoja Legendary Bosą');
    $repository = new \LegacyDbz\LegendaryBosses\Repositories\LegendaryBossRepository();
    $service = new \LegacyDbz\LegendaryBosses\Services\LegendaryBossService($repository);
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

    if ($_SESSION['pad-legendary-bosses'] - time() > 0) {
        echo 'Padusai! Trenkti galėsi už <b>' . laikas($_SESSION['pad-legendary-bosses'] - time(), 1) . '</b>';
    } elseif ($KD && (int)$KD !== $_SESSION['refresh-legendary-bosses']) {
        echo 'Atnaujinti puslapio negalimą! Eikite atgal ir vėl trenkite.';
    } else {
        $time = time();
        mysqli_query($conn,"UPDATE zaidejai SET last_fight_time='$time' WHERE nick='$nick' ");

        $legendaryBossId = $boss->getId();
        $damageType = $boss->getDamageType();
        $bossConfig = $service->getBossConfig($boss->getBossId());
        echo '<div class="meniuc parent-container">';
        echo '<div class="card">';
        echo '<div class="card-body">';

        echo '<b>' . $bossConfig['name'] . '</b><br><br>';
        $totalHealth = $bossConfig['health'];
        $currentHealth = $boss->getHealth();
        $healthPercentage = ($currentHealth / $totalHealth) * 100;
        echo 'Gyvybių: ' . skaicius($boss->getHealth());
        echo '<div class="health-bar">';
        echo '<div class="health-bar-fill" style="width: ' . $healthPercentage . '%;"></div>';
        echo '<div class="bar-text">' . round($healthPercentage) . '%</div>';
        echo '</div>';
        echo '<br>';
        $totalBlockRate = 100;
        $currentBlockRate = array_sum($bossConfig['blockRatePercentage']) / count($bossConfig['blockRatePercentage']);
        $blockRatePercentage = ($currentBlockRate / $totalBlockRate) * 100;
        echo 'Blokavimo procentas:<br>';
        echo '<div class="block-rate-bar">';
        echo '<div class="block-rate-bar-fill" style="width: ' . $blockRatePercentage . '%;"></div>';
        echo '<div class="bar-text">' . round($blockRatePercentage) . '%</div>';
        echo '</div>';
        if ($boss->isFreezed()) {
            echo 'Boso Mental freeze baigsis po: ' . $boss->freezeEndsAfter();
            echo '<br>';
        }
        echo '</div>';
        echo '</div>';
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<b>' . $nick . '</b><br><br>';
        $totalHealth = $apie['max_gyvybes'];
        $currentHealth = $playerHealth;
        $healthPercentage = ($currentHealth / $totalHealth) * 100;
        echo 'Gyvybių: ' . skaicius($playerHealth);
        echo '<div class="health-bar">';
        echo '<div class="health-bar-fill" style="width: ' . $healthPercentage . '%;"></div>';
        echo '<div class="bar-text">' . round($healthPercentage) . '%</div>';
        echo '</div>';
        echo '<br>';
        $totalBlockRate = 100;
        $currentBlockRate = calculatePlayerBlockPercentage($boss);
        $playerBlockRatePercentage = ($currentBlockRate / $totalBlockRate) * 100;
        echo 'Blokavimo procentas:<br>';
        echo '<div class="block-rate-bar">';
        echo '<div class="block-rate-bar-fill" style="width: ' . $playerBlockRatePercentage . '%;"></div>';
        echo '<div class="bar-text">' . round($playerBlockRatePercentage) . '%</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        echo '</div>';
        echo '</div>';

        echo top('Kovos logas');
        echo '<div class="meniu">';
        echo '<div class="meniuc">';
        if ($boss->getDamageType() === LegendaryBoss::DAMAGE_TYPE_DEATH) {
            echo 'Bosas daro mirties damage.';
        }
        if ($boss->getDamageType() === LegendaryBoss::DAMAGE_TYPE_REVIVAL) {
            echo 'Bosas daro atgimimo damage.';
        }
        echo '</div>';
        $bossDamagePercentages = $bossConfig['damagePercentage'];
        $randomKey = array_rand($bossDamagePercentages);
        $bossDamagePercent = $bossDamagePercentages[$randomKey];
        $bossDamage = round(($bossDamagePercent / 1000) * $playerMaxHealth);
        if ($bossDamage < 10 || $boss->isFreezed()) {
            $bossDamage = 10;
        }

        if ($apie['armor'] === 'Mirties armor' && $boss->getDamageType() === LegendaryBoss::DAMAGE_TYPE_DEATH) {
            $initialBossDamage = $bossDamage;
            $bossDamage *= 0.30;
            echo $warningIcon;
            echo '<font color="#6495ed"><b>Boso smūgį sumažino Mirties Armour!</b></font><br>';
        }
        if ($apie['armor'] === 'Atgimimo armor' && $boss->getDamageType() === LegendaryBoss::DAMAGE_TYPE_REVIVAL) {
            $initialBossDamage = $bossDamage;
            $bossDamage *= 0.30;
            echo $warningIcon;
            echo '<font color="#6495ed"><b>Boso smūgį sumažino Atgimimo Armour!</b></font><br>';
        }
        $isPlayerBlockedAttack = false;
        if (random_int(1, 100) <= $playerBlockRatePercentage) {
            $isPlayerBlockedAttack = true;
            $bossDamage = 0;
            echo $warningIcon;
            echo '<font color="#808080"><b>Boso smūgis buvo blokuotas!</b></font><br>';
        }

        $bossCriticalChancePercentages = $bossConfig['criticalChancePercentage'];
        $randomKey = array_rand($bossCriticalChancePercentages);
        $bossCriticalChancePercent = $bossCriticalChancePercentages[$randomKey];

        $isBossCriticalDamage = false;
        if (!$isPlayerBlockedAttack && random_int(1, 100) <= $bossCriticalChancePercent) {
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

        if (!$isBossBlockedAttack && CurrentPlayer::get()->isGokasKaioken20x()) {
            $playerDamage *= 2;
            echo $warningIcon;
            echo '<font color="#9370db"><b>Jūsų veikėjas Gokas SSJGB Kaioken 20x padidino žąlą bosui.</b></font><br><br>';
        }

        if (!$isBossBlockedAttack && CurrentPlayer::get()->isGokasMasteredUltraInstinct()) {
            $playerDamage *= 2;
            echo $warningIcon;
            echo '<font color="#9370db"><b>Jūsų veikėjas Gokas Mastered Ultra Instinct padidino žąlą bosui.</b></font><br><br>';
        }

        if (!$isBossBlockedAttack && CurrentPlayer::get()->isGohanasUltraInstinct()) {
            $playerDamage *= 3;
            echo $warningIcon;
            echo '<font color="#9370db"><b>Jūsų veikėjas Gohanas Ultra Instinct padidino žąlą bosui.</b></font><br><br>';
        }

        if (!$isBossBlockedAttack && CurrentPlayer::get()->isKefla()) {
            $playerDamage *= 4;
            echo $warningIcon;
            echo '<font color="#9370db"><b>Jūsų veikėjas Kefla padidino žąlą bosui.</b></font><br><br>';
        }

        $hasPlayerFullDeathSet = hasPlayerFullDeathSet();
        if (!$hasPlayerFullDeathSet && !$isBossBlockedAttack && $apie['sword'] === 'Mirties sword' && $boss->getDamageType() === LegendaryBoss::DAMAGE_TYPE_REVIVAL) {
            $playerDamage *= random_int(3, 7);
            echo $warningIcon;
            echo '<font color="#9370db"><b>Jūsų smūgį padidino Mirties Sword!</b></font><br>';
        }
        if (!$isBossBlockedAttack && $hasPlayerFullDeathSet && $boss->getDamageType() === LegendaryBoss::DAMAGE_TYPE_REVIVAL) {
            $playerDamage *= random_int(5, 8);
            echo $warningIcon;
            echo '<font color="#9370db"><b>Užsidėjus visą mirties setą bosui darote daugiau damage!</b></font><br>';
        }
        $hasPlayerFullRevivalSet = hasPlayerFullRevivalSet();
        if (!$hasPlayerFullRevivalSet && !$isBossBlockedAttack && $apie['sword'] === 'Atgimimo sword' && $boss->getDamageType() === LegendaryBoss::DAMAGE_TYPE_DEATH) {
            $playerDamage *= random_int(3, 7);
            echo $warningIcon;
            echo '<font color="#9370db"><b>Jūsų smūgį padidino Atgimimo Sword!</b></font><br>';
        }
        if (!$isBossBlockedAttack && $hasPlayerFullRevivalSet && $boss->getDamageType() === LegendaryBoss::DAMAGE_TYPE_DEATH) {
            $playerDamage *= random_int(5, 8);
            echo $warningIcon;
            echo '<font color="#9370db"><b>Užsidėjus visą atgimimo setą bosui darote daugiau damage!</b></font><br>';
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
            $g_n[] = ["index.php", "Legendary bosai", "Pulti bosą"];
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

            $vegitaCashRewardForMostDamage = 20;
            $mostDamage = mysqli_fetch_assoc(mysqli_query($conn,"SELECT player_id, nick, SUM(player_damage) AS total_damage FROM legendary_boss_fights INNER JOIN zaidejai ON legendary_boss_fights.player_id = zaidejai.id WHERE legendary_boss_id = '$legendaryBossId' GROUP BY player_id ORDER BY total_damage DESC LIMIT 1"));
            if ($apie['id'] == $mostDamage['player_id']) {
                echo 'Atlygis padarius daugiausiai damage:<br>';
                echo '<img src="../assets/img/reward.png"> Vegita cash: ' . skaicius($vegitaCashRewardForMostDamage);
                echo '<br>';
                echo 'Padarei damage: ' . skaicius($mostDamage['total_damage']);
                echo '<br><br>';
            }

            // reward queries

            $vegitaCashRewardForMostHits = 20;
            $playerByMostHits = mysqli_fetch_assoc(mysqli_query($conn,"SELECT nick, player_id, COUNT(*) AS hits_count FROM legendary_boss_fights INNER JOIN zaidejai ON legendary_boss_fights.player_id = zaidejai.id WHERE legendary_boss_id = '$legendaryBossId' GROUP BY player_id ORDER BY hits_count DESC LIMIT 1"));
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
                    $amount = random_int($chestContent[0], $chestContent[1]);
                    mysqli_query($conn,"INSERT INTO `player_chest_drop_contents` SET chest_drop_id = '$insertedId', name = '$name', amount = '$amount' ") || die(mysqli_error());
                }
            }

            mysqli_query($conn,"UPDATE zaidejai SET botas=botas+'$vegitaCashRewardForLastHit' WHERE id='$apie[id]' ");
            $firstHitPlayerId = $boss->getFirstHitPlayerId();
            mysqli_query($conn,"UPDATE zaidejai SET botas=botas+'$vegitaCashRewardForFirstHit' WHERE id='$firstHitPlayerId' ");
            mysqli_query($conn,"UPDATE zaidejai SET botas=botas+'$vegitaCashRewardForMostDamage' WHERE id='$mostDamage[player_id]' ");

            $mostHitsMessage = 'Gavo ' . $vegitaCashRewardForMostHits . ' Vegita Cash.';
            mysqli_query($conn,"INSERT INTO `legendary_boss_rewards` SET legendary_boss_id = '$legendaryBossId', player_id = '$playerByMostHits[player_id]', type = 'most_hits', message = '$mostHitsMessage' ");
            $lastHitMessage = 'Gavo ' . $vegitaCashRewardForLastHit . ' Vegita Cash.';
            mysqli_query($conn,"INSERT INTO `legendary_boss_rewards` SET legendary_boss_id = '$legendaryBossId', player_id = '$apie[id]', type = 'last_hit', message = '$lastHitMessage' ");
            $firstHitMessage = 'Gavo ' . $vegitaCashRewardForFirstHit . ' Vegita Cash.';
            mysqli_query($conn,"INSERT INTO `legendary_boss_rewards` SET legendary_boss_id = '$legendaryBossId', player_id = '$firstHitPlayerId', type = 'first_hit', message = '$firstHitMessage' ");
            $mostDamageMessage = 'Gavo ' . $vegitaCashRewardForMostDamage . ' Vegita Cash.';
            mysqli_query($conn,"INSERT INTO `legendary_boss_rewards` SET legendary_boss_id = '$legendaryBossId', player_id = '$mostDamage[player_id]', type = 'most_damage', message = '$mostDamageMessage' ");
            $vegitaCashRewardForDamage = 10;
            $damageMessage = 'Gavo ' . $vegitaCashRewardForDamage . ' Vegita Cash.';

            $blessingOfWarBuff = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id, name, cooldown FROM skills WHERE name = 'Blessing Of War' LIMIT 1"));
            $playersByTotalDamage = mysqli_query($conn,"SELECT player_id, nick, SUM(player_damage) AS total_damage FROM legendary_boss_fights INNER JOIN zaidejai ON legendary_boss_fights.player_id = zaidejai.id WHERE legendary_boss_id = '$legendaryBossId' GROUP BY player_id HAVING total_damage > 0 ORDER BY total_damage DESC LIMIT 3");
            while ($playerByTotalDamage = mysqli_fetch_assoc($playersByTotalDamage)) {
                mysqli_query($conn,"UPDATE zaidejai SET botas=botas+'$vegitaCashRewardForDamage' WHERE id='$playerByTotalDamage[player_id]' ");
                mysqli_query($conn,"INSERT INTO `legendary_boss_rewards` SET legendary_boss_id = '$legendaryBossId', player_id = '$playerByTotalDamage[player_id]', type = 'damage', message = '$damageMessage' ");

                // add buffs
                $blessingOfWarBuffEndsAt = date('Y-m-d H:i:s', strtotime("now + $blessingOfWarBuff[cooldown] seconds"));
                mysqli_query($conn,"INSERT INTO `player_skills` SET skill_id = '$blessingOfWarBuff[id]', player_id = '$playerByTotalDamage[player_id]', ends_at = '$blessingOfWarBuffEndsAt' ") || die(mysqli_error());
                $message = $playerByTotalDamage['nick'] . ' padarė damage Legendary bosui (' . $bossConfig['name'] . ') todėl gavo ' . $blessingOfWarBuff['name'] . ' bufą.';
                $expiresAt = date('Y-m-d H:i:s', strtotime(' + 10 minutes'));
                mysqli_query($conn,"INSERT INTO pokalbiai SET nick='SISTEMA', sms='$message', data='" . time() . "', expired_at='$expiresAt'");
            }

            $text = 'Padarėte daugiausiai damage(' . $mostDamage['total_damage'] . ') legendary bosui ' . $bossConfig['name'] . ' už tai gaunate: ' . $vegitaCashRewardForMostDamage . ' Vegita Cash!';
            mysqli_query($conn,"INSERT INTO pm SET what = 'SISTEMA', txt='$text', gavejas='$mostDamage[nick]', nauj='NEW', time='" . time() . "'");
            $message = $apie['nick'] . ' sudavė paskutinį smūgį legendary bosui (' . $bossConfig['name'] . ') ';
            $expiresAt = date('Y-m-d H:i:s', strtotime(' + 1 hours'));
            $insert1 = mysqli_query($conn,"INSERT INTO pokalbiai SET nick='SISTEMA', sms='$message', data='" . time() . "', expired_at='$expiresAt'");
            sendDiscordMessage($message);

            $update2 = mysqli_query($conn,"UPDATE legendary_bosses SET dead_at = '$date', health = 0, last_hit_player_id = '$apie[id]' WHERE id = '$legendaryBossId'");
            mysqli_query($conn,"DELETE FROM legendary_bosses WHERE `ends_at` < '$date' AND dead_at IS NULL ");
            echo '</div>';

            $g_n[] = ["index.php", "Legendary bosai", "Pulti bosą"];
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
                $damageType = $boss->getDamageType() === LegendaryBoss::DAMAGE_TYPE_DEATH ? LegendaryBoss::DAMAGE_TYPE_REVIVAL : LegendaryBoss::DAMAGE_TYPE_DEATH;
                mysqli_query($conn,"UPDATE legendary_bosses SET damage_type='$damageType', switch_damage_at = '$switchDamageAt' WHERE id='$legendaryBossId'");

            }
            if ($apie['armor'] !== 'Mirties armor' && $damageType === LegendaryBoss::DAMAGE_TYPE_DEATH && $inv['mirties_armor'] > 0) {
                echo '<a href="/inv.php?id=use_mirtiesa&ID=Mirties armor">Užsidėti Mirties Armour</a><br>';
            }
            if ($apie['sword'] !== 'Mirties sword' && $damageType === LegendaryBoss::DAMAGE_TYPE_DEATH && $inv['mirties_sword'] > 0) {
                echo '<a href="/inv.php?id=use_mirtiess&ID=Mirties sword">Užsidėti Mirties Sword</a><br>';
            }
            if ($apie['armor'] !== 'Atgimimo armor' && $damageType === LegendaryBoss::DAMAGE_TYPE_REVIVAL && $inv['atgimimo_armor'] > 0) {
                echo '<a href="/inv.php?id=use_atgimimoa&ID=Atgimimo armor">Užsidėti Atgimimo Armour</a><br>';
            }
            if ($apie['sword'] !== 'Atgimimo sword' && $damageType === LegendaryBoss::DAMAGE_TYPE_REVIVAL && $inv['atgimimo_sword'] > 0) {
                echo '<a href="/inv.php?id=use_atgimimos&ID=Atgimimo sword">Užsidėti Atgimimo Sword</a><br>';
            }


            if (!$boss->getFirstHitPlayerId()) {
                mysqli_query($conn,"UPDATE legendary_bosses SET first_hit_player_id='$apie[id]' WHERE id='$legendaryBossId'");
            }

            mysqli_query($conn,"UPDATE legendary_bosses SET health='$bossHealth' WHERE id='$legendaryBossId'");
            mysqli_query($conn,"INSERT INTO legendary_boss_fights SET legendary_boss_id = '$legendaryBossId', player_id = '$apie[id]', player_damage = '$playerDamage', boss_damage = '$bossDamage', created_at='$date'");
            mysqli_query($conn,"UPDATE zaidejai SET vveiksmai=vveiksmai+'1', gyvybes=gyvybes-'$bossDamage' WHERE nick='$apie[nick]' AND gyvybes > 0");
        }
        echo '<br>';
        $_SESSION['pad-legendary-bosses'] = time() + 1;
    }
    $KD = random_int(9999, 99999);
    $_SESSION['refresh-legendary-bosses'] = $KD;
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
    $refresh = 8;
    echo '<meta http-equiv="refresh" content="'.$refresh.'; url=index.php?id=attack&KD='.$KD.'">';
    echo '</div>';

    echo '</div>';
    $g_n[] = ["index.php", "Legendary bosai", "Pulti bosą"];
    navigacija($g_n);
}

function calculatePlayerBlockPercentage(LegendaryBoss $boss)
{
    global  $apie;

    $amulet = $apie['amuletas'];

    $blockPercentage = 0;
    if ($amulet === 'Naikinimo amulet') {
        $blockPercentage += 5;
    }

    if ($amulet === 'Super amulet') {
        $blockPercentage += 10;
    }

    if ($amulet === 'Atgimimo amulet' && $boss->isRevivalDamageType()){
        $blockPercentage += 20;
    }

    if ($amulet === 'Mirties amulet' && $boss->isRevivalDamageType()){
        $blockPercentage += 20;
    }

    return min($blockPercentage, 100);
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
