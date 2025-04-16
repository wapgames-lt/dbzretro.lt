<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();

topbar();

if ($apie['lygis'] < 20) {
    top('Aukcionas');
    echo "<div class='meniuc'>I aukciona galima tik nuo 20 lygio!</div>";

    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "miestas.php?id=", "Miestas", "Aukcionas");
    navigacija($g_n);


} else {

    $litai = $apie['litai'];
    $smsLitai = $apie['sms_litai'];
    $inv = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM inv WHERE nick='$nick'"));

    if ($id == "") {
        top("Aukcijonas");
        $time = time();
        $query = mysqli_query($conn, "SELECT * FROM aukcijonas WHERE laikas < '$time'");
        while ($prekes_inf = mysqli_fetch_assoc($query)) {
            if ($prekes_inf['laikas'] < $time) {
                if ($prekes_inf['preke'] == 1) {
                    $kiek_gaunas = $inv['Dball1'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET Dball1='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 2) {
                    $kiek_gaunas = $inv['Microshem'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET Microshem='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 3) {
                    $kiek_gaunas = $inv['Fusionfail'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET Fusionfail='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 4) {
                    $kiek_gaunas = $inv['Sayiantail'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET Sayiantail='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 5) {
                    $kiek_gaunas = $inv['Stone'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET Stone='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 6) {
                    $kiek_gaunas = $inv['Soul'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET Soul='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 7) {
                    $kiek_gaunas = $inv['Nball'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET Nball='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 8) {
                    $kiek_gaunas = $inv['Energystone'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET Energystone='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 9) {
                    $kiek_gaunas = $inv['Pragarovaisius'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET Pragarovaisius='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }

                if ($prekes_inf['preke'] == 10) {
                    $kiek_gaunas = $inv['Majinsroll'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET Majinsroll='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }

                if ($prekes_inf['preke'] == 11) {
                    $kiek_gaunas = $inv['Goldstone'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET Goldstone='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 12) {
                    $kiek_gaunas = $inv['Magicball'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET Magicball='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 13) {
                    $kiek_gaunas = $inv['Powerstone'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET Powerstone='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 14) {
                    $kiek_gaunas = $inv['Jball'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET Jball='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 15) {
                    $kiek_gaunas = $inv['Dball2'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET Dball2='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }

                if ($prekes_inf['preke'] == 16) {
                    $kiek_gaunas = $inv['Dball3'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET Dball3='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 17) {
                    $kiek_gaunas = $inv['Dball4'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET Dball4='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 18) {
                    $kiek_gaunas = $inv['Dball5'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET Dball5='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 19) {
                    $kiek_gaunas = $inv['Dball6'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET Dball6='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 20) {
                    $kiek_gaunas = $inv['Dball7'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET Dball7='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 21) {
                    $kiek_gaunas = $inv['Sball'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET Sball='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 22) {
                    $kiek_gaunas = $inv['angelwing'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET angelwing='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 23) {
                    $kiek_gaunas = $inv['naikinti'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET naikinti='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 24) {
                    $kiek_gaunas = $inv['tobulas'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET tobulas='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 25) {
                    $kiek_gaunas = $inv['dball'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET dball='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 26) {
                    $kiek_gaunas = $inv['ad16'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET ad16='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 27) {
                    $kiek_gaunas = $inv['ad17'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET ad17='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }
                if ($prekes_inf['preke'] == 28) {
                    $kiek_gaunas = $inv['alavas'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET alavas='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }

                if ($prekes_inf['preke'] == 29) {
                    $kiek_gaunas = $inv['kvarcas'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET kvarcas='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }

                if ($prekes_inf['preke'] == 30) {
                    $kiek_gaunas = $inv['titanas'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET titanas='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }

                if ($prekes_inf['preke'] == 31) {
                    $kiek_gaunas = $inv['Zuvis'] + $prekes_inf['kiek'];
                    mysqli_query($conn, "UPDATE inv SET Zuvis='$kiek_gaunas' WHERE nick='$prekes_inf[kas]'") or die(mysqli_error());
                }

                $zinute = "Per 5 valandas tavo prek&#279;s aukcijone niekas nenupirko, tad tau jin gra&#382;inama. Kiek turėsi po grąžinmo: $kiek_gaunas ";
                mysqli_query($conn, "INSERT INTO pm SET gavejas='$prekes_inf[kas]', what='SISTEMA', txt='$zinute', time='" . time() . "', nauj='NEW'");
                mysqli_query($conn, "DELETE FROM aukcijonas WHERE id='$prekes_inf[id]'");
            }
        }

        echo '<div class="meniuc">
<a href="aukcijonas.php?id=ideti">&#302;d&#279;ti preke</a>
</div><div class="line"></div>';
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM aukcijonas")) == false) {
            echo '<div class="meniuc"><b>Kolkas prekių nėra!</b></div>';
        } else {
            $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM aukcijonas"))[0];
            if ($viso > 0) {
                $rezultatu_rodymas = 5;
                $total = @intval(($viso - 1) / $rezultatu_rodymas) + 1;
                if (empty($psl) or $psl < 0) $psl = 1;
                if ($psl > $total) $psl = $total;
                $nuo_kiek = $psl * $rezultatu_rodymas - $rezultatu_rodymas;

                $query = mysqli_query($conn, "SELECT * FROM aukcijonas ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
                $puslapiu = ceil($viso / $rezultatu_rodymas);


                while ($row = mysqli_fetch_assoc($query)) {
                    if ($auk['zaidejui'] == '') {
                        $kam_skirta = 'Visi';
                    }
                    if ($row['zaidejui'] !== '') {
                        $kam_skirta = '' . $row['zaidejui'] . '';
                    }

                    if ($row['valiuta'] == 1) {
                        $valiuta = 'pinig&#371;';
                    }
                    if ($row['valiuta'] == 2) {
                        $valiuta = 'eur';
                    }
                    if ($row['preke'] == 1) {
                        $pre = '1 Žvaigždis drakono rutulys';
                    }
                    if ($row['preke'] == 2) {
                        $pre = 'Microshem';
                    }
                    if ($row['preke'] == 3) {
                        $pre = 'Fusion fail';
                    }
                    if ($row['preke'] == 4) {
                        $pre = 'Sayain tail';
                    }
                    if ($row['preke'] == 5) {
                        $pre = 'Stone';
                    }
                    if ($row['preke'] == 6) {
                        $pre = 'Soul';
                    }
                    if ($row['preke'] == 7) {
                        $pre = '1 Žvaigždis Namek drakono rutulys';
                    }
                    if ($row['preke'] == 8) {
                        $pre = 'Energy stone';
                    }
                    if ($row['preke'] == 9) {
                        $pre = 'Pragaro vaisius';
                    }
                    if ($row['preke'] == 10) {
                        $pre = 'Majin scroll';
                    }
                    if ($row['preke'] == 11) {
                        $pre = 'Gold stone';
                    }
                    if ($row['preke'] == 12) {
                        $pre = 'Magic ball';
                    }
                    if ($row['preke'] == 13) {
                        $pre = 'Power stone';
                    }
                    if ($row['preke'] == 14) {
                        $pre = 'Juodasis drakono rutulys';
                    }
                    if ($row['preke'] == 15) {
                        $pre = '2 Žvaigždis drakono rutulys';
                    }
                    if ($row['preke'] == 16) {
                        $pre = '3 Žvaigždis drakono rutulys';
                    }
                    if ($row['preke'] == 17) {
                        $pre = '4 Žvaigždis drakono rutulys';
                    }
                    if ($row['preke'] == 18) {
                        $pre = '5 Žvaigždis drakono rutulys';
                    }
                    if ($row['preke'] == 19) {
                        $pre = '6 Žvaigždis drakono rutulys';
                    }
                    if ($row['preke'] == 20) {
                        $pre = '7 Žvaigždis drakono rutulys';
                    }
                    if ($row['preke'] == 21) {
                        $pre = 'Samungo drakono rutulys';
                    }
                    if ($row['preke'] == 22) {
                        $pre = 'Αngelo sparnai';
                    }
                    if ($row['preke'] == 23) {
                        $pre = 'Naikinimo galios';
                    }
                    if ($row['preke'] == 24) {
                        $pre = 'Κario tobulėjimo';
                    }
                    if ($row['preke'] == 25) {
                        $pre = 'Drakono rutulių';
                    }
                    if ($row['preke'] == 26) {
                        $pre = 'AD16 item';
                    }
                    if ($row['preke'] == 27) {
                        $pre = 'AD17 item';
                    }
                    if ($row['preke'] == 28) {
                        $pre = 'Alavo rūda';
                    }
                    if ($row['preke'] == 29) {
                        $pre = 'Kvarco rūda';
                    }
                    if ($row['preke'] == 30) {
                        $pre = 'Titano rūda';
                    }
                    if ($row['preke'] == 31) {
                        $pre = 'Žuvis';
                    }
                    $kk = $row['kaina'] / $row['kiek'];


                    echo '<div class="meniu">
			[&#187;] <b>Pardav&#279;jas:</b> <a href="pagrindinis.php?id=apie&ka=' . $row['kas'] . '">' . $row['kas'] . '</a><br>
			[&#187;] <b>Prek&#279:</b> ' . number_format($row['kiek']) . ' (' . $pre . ')<br>
			[&#187;] <b>Kaina:</b> ' . sk($row['kaina']) . ' (' . skaicius($row['kaina']) . ' ' . $valiuta . ') <br>
			
			[&#187;] <b>Vnt. Kaina:</b> (' . skaicius($kk) . ' ' . $valiuta . ') <br>
			
			[&#187;] <b>Baigsis:</b> ' . laikas($row['laikas'] - time(), 1) . '<br>
			[&#187;] <b>Gali pirkti:</b> ' . $kam_skirta . '<br>';
                    if (apsas($row['kas']) != apsas($nick)) {
                        echo '			
			' . $ico . ' <a href="aukcijonas.php?id=pirkti&nr=' . $row['id'] . '">Pirkti</a>';
                    }
                    if (apsas($row['kas']) == apsas($nick)) {
                        echo '' . $ico . ' <a href="aukcijonas.php?id=trinti&nr=' . $row['id'] . '">Trinti</a>';
                    }
                    echo '</div>';
                    unset($row);

                }

            }
            echo '<div class="meniuc">' . puslapiavimas($puslapiu, $psl, '?id=') . '</div>';
        }

        $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "miestas.php?id=", "Miestas", "Aukcijonas");
        navigacija($g_n);
    }

    if ($id == "ideti") {
        top('Prekės idėjimas');
        echo '
	<form action="aukcijonas.php?id=ideti_2" method="post">
	<div class="meniu">
	<b>Prek&#279;:</b><br>
	<select name="preke">';
        if ($inv['Dball1'] > 0) {
            echo "<option value=\"1\">1 Žvaigždis drakono rutulys [" . $inv['Dball1'] . "]</option>";
        }
        if ($inv['Dball2'] > 0) {
            echo "<option value=\"15\">2 Žvaigždis drakono rutulys [" . $inv['Dball2'] . "]</option>";
        }
        if ($inv['Dball3'] > 0) {
            echo "<option value=\"16\">3 Žvaigždis drakono rutulys [" . $inv['Dball3'] . "]</option>";
        }
        if ($inv['Dball4'] > 0) {
            echo "<option value=\"17\">4 Žvaigždis drakono rutulys [" . $inv['Dball4'] . "]</option>";
        }
        if ($inv['Dball5'] > 0) {
            echo "<option value=\"18\">5 Žvaigždis drakono rutulys [" . $inv['Dball5'] . "]</option>";
        }
        if ($inv['Dball6'] > 0) {
            echo "<option value=\"19\">6 Žvaigždis drakono rutulys [" . $inv['Dball6'] . "]</option>";
        }
        if ($inv['Dball7'] > 0) {
            echo "<option value=\"20\">7 Žvaigždis drakono rutulys [" . $inv['Dball7'] . "]</option>";
        }
        if ($inv['Sball'] > 0) {
            echo "<option value=\"21\">Samungo drakono rutulys [" . $inv['Sball'] . "]</option>";
        }

        if ($inv['Microshem'] > 0) {
            echo "<option value=\"2\">Mikroschemos [" . $inv['Microshem'] . "]</option>";
        }
        if ($inv['Fusionfail'] > 0) {
            echo "<option value=\"3\">Fusion fail [" . $inv['Fusionfail'] . "]</option>";
        }
        if ($inv['Sayiantail'] > 0) {
            echo "<option value=\"4\">Sayian Tail[" . $inv['Sayiantail'] . "]</option>";
        }
        if ($inv['Stone'] > 0) {
            echo "<option value=\"5\">Stone [" . $inv['Stone'] . "]</option>";
        }
        if ($inv['Soul'] > 0) {
            echo "<option value=\"6\">Soul [" . $inv['Soul'] . "]</option>";
        }
        if ($inv['Nball'] > 0) {
            echo "<option value=\"7\">Namek drakono rutulys [" . $inv['Nball'] . "]</option>";
        }
        if ($inv['Energystone'] > 0) {
            echo "<option value=\"8\">Energy Stone [" . $inv['Energystone'] . "]</option>";
        }
        if ($inv['Pragarovaisius'] > 0) {
            echo "<option value=\"9\">Pragaro vaisius [" . $inv['Pragarovaisius'] . "]</option>";
        }
        if ($inv['Majinsroll'] > 0) {
            echo "<option value=\"10\">Majin sroll [" . $inv['Majinsroll'] . "]</option>";
        }
        if ($inv['Goldstone'] > 0) {
            echo "<option value=\"11\">Gold Stone [" . $inv['Goldstone'] . "]</option>";
        }
        if ($inv['Magicball'] > 0) {
            echo "<option value=\"12\">Magic Ball [" . $inv['Magicball'] . "]</option>";
        }
        if ($inv['Powerstone'] > 0) {
            echo "<option value=\"13\">Power Stone [" . $inv['Powerstone'] . "]</option>";
        }
        if ($inv['Jball'] > 0) {
            echo "<option value=\"14\">Juodasis drakono rutulys [" . $inv['Jball'] . "]</option>";
        }
        if ($inv['angelwing'] > 0) {
            echo "<option value=\"22\">Angelo sparnai [" . $inv['angelwing'] . "]</option>";
        }
        if ($inv['naikinti'] > 0) {
            echo "<option value=\"23\">Νaikinimo galios  [" . $inv['naikinti'] . "]</option>";
        }
        if ($inv['tobulas'] > 0) {
            echo "<option value=\"24\">Kario tobulėjimo  [" . $inv['tobulas'] . "]</option>";
        }
        if ($inv['dball'] > 0) {
            echo "<option value=\"25\">Drakono rutulių  [" . $inv['dball'] . "]</option>";
        }
        if ($inv['ad16'] > 0) {
            echo "<option value=\"26\">AD16 item  [" . $inv['ad16'] . "]</option>";
        }
        if ($inv['ad17'] > 0) {
            echo "<option value=\"27\">AD17 item  [" . $inv['ad17'] . "]</option>";
        }
        if ($inv['alavas'] > 0) {
            echo "<option value=\"28\">Alavo rūda  [" . $inv['alavas'] . "]</option>";
        }
        if ($inv['kvarcas'] > 0) {
            echo "<option value=\"29\">Kvarco rūda  [" . $inv['kvarcas'] . "]</option>";
        }
        if ($inv['titanas'] > 0) {
            echo "<option value=\"30\">Titano rūda  [" . $inv['titanas'] . "]</option>";
        }
        if ($inv['Zuvis'] > 0) {
            echo "<option value=\"31\">Žuvis  [" . $inv['Zuvis'] . "]</option>";
        }

        echo '</select><br>
	<b>Kiek:</b><br>
	<input name="kieks" type="text"/><br>
	<b>Kaina:</b><br>
	<input name="kains" type="text"/><br>
	
	<b>Kam:</b> (tik jis galės nusipirkti,  Jei norite parduoti visiems palikite laukelį tuščią)<br>
	<input name="kam_tokiam" type="text"/><br>
	<b>Valiuta:</b><br/>
	<select name="valut">
	<option value="1">Pinigais</option>
	<option value="2">Eurais</option>
	
	</select></div>
	<div class="line"></div><div class="meniuc">
	<input type="submit" value="&#302;d&#279;ti">
	</form>
	</div>';

        $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "miestas.php?id=", "Miestas", "aukcijonas.php", "Aukcijonas", "Prekės idėjimas");
        navigacija($g_n);
    }

    if ($id == "ideti_2") {
        top('Prekės idėjimas');
        $preke = (int)abs($_POST['preke']);
        $kains = preg_replace("/[^0-9]/", "", $_POST['kains']);
        $valut = (int)abs($_POST['valut']);
        $kieks = (int)abs($_POST['kieks']);
        $kam_tokiam = post($_POST['kam_tokiam']);
        if ($preke == 1) {
            $prek = $inv['Dball1'];
        }
        if ($preke == 2) {
            $prek = $inv['Microshem'];
        }
        if ($preke == 3) {
            $prek = $inv['Fusionfail'];
        }
        if ($preke == 4) {
            $prek = $inv['Sayiantail'];
        }
        if ($preke == 5) {
            $prek = $inv['Stone'];
        }
        if ($preke == 6) {
            $prek = $inv['Soul'];
        }
        if ($preke == 7) {
            $prek = $inv['Nball'];
        }
        if ($preke == 8) {
            $prek = $inv['Energystone'];
        }
        if ($preke == 9) {
            $prek = $inv['Pragarovaisius'];
        }
        if ($preke == 10) {
            $prek = $inv['Majinsroll'];
        }
        if ($preke == 11) {
            $prek = $inv['Goldstone'];
        }
        if ($preke == 12) {
            $prek = $inv['Magicball'];
        }
        if ($preke == 13) {
            $prek = $inv['Powerstone'];
        }
        if ($preke == 14) {
            $prek = $inv['Jball'];
        }
        if ($preke == 15) {
            $prek = $inv['Dball2'];
        }
        if ($preke == 16) {
            $prek = $inv['Dball3'];
        }
        if ($preke == 17) {
            $prek = $inv['Dball4'];
        }
        if ($preke == 18) {
            $prek = $inv['Dball5'];
        }
        if ($preke == 19) {
            $prek = $inv['Dball6'];
        }
        if ($preke == 20) {
            $prek = $inv['Dball7'];
        }
        if ($preke == 21) {
            $prek = $inv['Sball'];
        }
        if ($preke == 22) {
            $prek = $inv['angelwing'];
        }
        if ($preke == 23) {
            $prek = $inv['naikinti'];
        }
        if ($preke == 24) {
            $prek = $inv['tobulas'];
        }
        if ($preke == 25) {
            $prek = $inv['dball'];
        }
        if ($preke == 26) {
            $prek = $inv['ad16'];
        }
        if ($preke == 27) {
            $prek = $inv['ad17'];
        }
        if ($preke == 28) {
            $prek = $inv['alavas'];
        }
        if ($preke == 29) {
            $prek = $inv['kvarcas'];
        }
        if ($preke == 30) {
            $prek = $inv['titanas'];
        }
        if ($preke == 31) {
            $prek = $inv['Zuvis'];
        }

        if (empty($preke) or empty($kains) or empty($valut) or empty($kieks)) {
            echo '<div class="meniuc">
		<b>Klaida!</b><br>
		Tuščias laukelis!</div>';
            $error = 'Yes';
        }
        if ($prek < $kieks) {
            echo '<div class="meniuc">
		<b>Klaida!</b><br>
		Nepakanka turim&#371; daigt&#371;</div>';
            $error = 'Yes';
        }
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM aukcijonas WHERE kas='$nick'")) >= 5) {
            echo '<div class="meniuc">
		<b>Klaida!</b><br>
		Max galima &#303;d&#279;ti 5 prekes!</div>';
            $error = 'Yes';
        }
        if ($preke < 1 || $preke > 31) {
            echo '<div class="meniuc">
		<b>Klaida!</b><br>
		Tokios prekės nėra!</div>';
            $error = 'Yes';
        }
        if ($valut < 1 || $valut > 2) {
            echo '<div class="meniuc>
		<b>Klaida!</b><br>
		Tokios valiutos nėra!</div>';
            $error = 'Yes';
        }

        if (empty($error)) {
            $expiresAt = date('Y-m-d H:i:s', strtotime(' + 1 hours'));
            $message = '';
            if ($preke == 1) {
                $kiek_minus = $inv['Dball1'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET Dball1='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($preke == 2) {
                $kiek_minus = $inv['Microshem'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET Microshem='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
                $message = 'Žaidėjas ' . $nick . ' įdėjo ' . $kieks . ' Microshem į aukcioną';
                $insert1 = mysqli_query($conn, "INSERT INTO pokalbiai SET nick='SISTEMA', sms='$message', data='" . time() . "', expired_at='$expiresAt'");
            }
            if ($preke == 3) {
                $kiek_minus = $inv['Fusionfail'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET Fusionfail='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($preke == 4) {
                $kiek_minus = $inv['Sayiantail'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET Sayiantail='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
                $message = 'Žaidėjas ' . $nick . ' įdėjo ' . $kieks . ' Microshem į aukcioną';
                $insert1 = mysqli_query($conn, "INSERT INTO pokalbiai SET nick='SISTEMA', sms='$message', data='" . time() . "', expired_at='$expiresAt'");
            }
            if ($preke == 5) {
                $kiek_minus = $inv['Stone'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET Stone='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($preke == 6) {
                $kiek_minus = $inv['Soul'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET Soul='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($preke == 7) {
                $kiek_minus = $inv['Nball'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET Nball='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($preke == 8) {
                $kiek_minus = $inv['Energystone'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET Energystone='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($preke == 9) {
                $kiek_minus = $inv['Pragarovaisius'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET Pragarovaisius='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }

            if ($preke == 10) {
                $kiek_minus = $inv['Majinsroll'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET Majinsroll='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($preke == 11) {
                $kiek_minus = $inv['Goldstone'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET Goldstone='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }

            if ($preke == 12) {
                $kiek_minus = $inv['Magicball'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET Magicball='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }

            if ($preke == 13) {
                $kiek_minus = $inv['Powerstone'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET Powerstone='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($preke == 14) {
                $kiek_minus = $inv['Jball'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET Jball='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }

            if ($preke == 15) {
                $kiek_minus = $inv['Dball2'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET Dball2='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }

            if ($preke == 16) {
                $kiek_minus = $inv['Dball3'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET Dball3='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }

            if ($preke == 17) {
                $kiek_minus = $inv['Dball4'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET Dball4='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($preke == 18) {
                $kiek_minus = $inv['Dball5'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET Dball5='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($preke == 19) {
                $kiek_minus = $inv['Dball6'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET Dball6='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }

            if ($preke == 20) {
                $kiek_minus = $inv['Dball7'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET Dball7='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($preke == 21) {
                $kiek_minus = $inv['Sball'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET Sball='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($preke == 22) {
                $kiek_minus = $inv['angelwing'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET angelwing='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($preke == 23) {
                $kiek_minus = $inv['naikinti'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET naikinti='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($preke == 24) {
                $kiek_minus = $inv['tobulas'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET tobulas='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($preke == 25) {
                $kiek_minus = $inv['dball'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET dball='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($preke == 26) {
                $kiek_minus = $inv['ad16'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET ad16='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($preke == 27) {
                $kiek_minus = $inv['ad17'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET ad17='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
            }

            if ($preke == 28) {
                $kiek_minus = $inv['alavas'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET alavas='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
                $message = 'Žaidėjas ' . $nick . ' įdėjo ' . $kieks . ' alavo į aukcioną';
                $insert1 = mysqli_query($conn, "INSERT INTO pokalbiai SET nick='SISTEMA', sms='$message', data='" . time() . "', expired_at='$expiresAt'");
            }

            if ($preke == 29) {
                $kiek_minus = $inv['kvarcas'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET kvarcas='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
                $message = 'Žaidėjas ' . $nick . ' įdėjo ' . $kieks . ' kvarco į aukcioną';
                $insert1 = mysqli_query($conn, "INSERT INTO pokalbiai SET nick='SISTEMA', sms='$message', data='" . time() . "', expired_at='$expiresAt'");
            }

            if ($preke == 30) {
                $kiek_minus = $inv['titanas'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET titanas='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
                $message = 'Žaidėjas ' . $nick . ' įdėjo ' . $kieks . ' titano į aukcioną';
                $insert1 = mysqli_query($conn, "INSERT INTO pokalbiai SET nick='SISTEMA', sms='$message', data='" . time() . "', expired_at='$expiresAt'");
            }

            if ($preke == 31) {
                $kiek_minus = $inv['Zuvis'] - $kieks;
                mysqli_query($conn, "UPDATE inv SET Zuvis='$kiek_minus' WHERE nick='$nick'") or die(mysqli_error());
                $message = 'Žaidėjas ' . $nick . ' įdėjo ' . $kieks . ' žuvies į aukcioną';
                $insert1 = mysqli_query($conn, "INSERT INTO pokalbiai SET nick='SISTEMA', sms='$message', data='" . time() . "', expired_at='$expiresAt'");
            }


            $liko_laiko = time() + 60 * 60 * 5;

            mysqli_query($conn, "INSERT INTO aukcijonas SET kas='$nick',zaidejui='$kam_tokiam', preke='$preke', kiek='$kieks', kaina='$kains', valiuta='$valut', laikas='$liko_laiko'");
            if ($kam_tokiam != '') {
                $txt = 'Jūsų vardu i aukcijona idėta prekė idėjo ' . $nick . '';
                mysqli_query($conn, "INSERT INTO pm SET what = 'SISTEMA', txt='$txt', gavejas='$kam_tokiam', nauj='NEW', `time`='" . time() . "'");
            }
            logInfo($message);
            echo '<div class="meniuc">
		<b>Atlikta!</b><br>
		Tavo prek&#279; &#303;d&#279;ta s&#279;kmingai! Jei niekas prek&#279;s nenupirks per <b>5</b> valandas ji gry&#353; atgal pas tave.
		</div>';
        }
        $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "miestas.php?id=", "Miestas", "aukcijonas.php", "Aukcijonas", "Prekės idėjimas");
        navigacija($g_n);
    }
    if ($id == "trinti") {
        top('Prekės trinimas');
        $nr = (int)abs($_GET['nr']);
        $prekes_inf = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM aukcijonas WHERE id='$nr'")) or die(mysqli_error());
        if (apsas($prekes_inf['kas']) !== apsas($nick)) {
            echo "<div class='meniuc'>
			<b>Šį prekė ne tavo</b>
			</div>
			";


        } else {
            if ($prekes_inf['preke'] == 1) {
                $kiek_gaunas = $inv['Dball1'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET Dball1='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 2) {
                $kiek_gaunas = $inv['Microshem'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET Microshem='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 3) {
                $kiek_gaunas = $inv['Fusionfail'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET Fusionfail='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 4) {
                $kiek_gaunas = $inv['Sayiantail'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET Sayiantail='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 5) {
                $kiek_gaunas = $inv['Stone'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET Stone='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 6) {
                $kiek_gaunas = $inv['Soul'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET Soul='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 7) {
                $kiek_gaunas = $inv['Nball'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET Nball='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 8) {
                $kiek_gaunas = $inv['Energystone'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET Energystone='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 9) {
                $kiek_gaunas = $inv['Pragarovaisius'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET Pragarovaisius='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }

            if ($prekes_inf['preke'] == 10) {
                $kiek_gaunas = $inv['Majinsroll'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET Majinsroll='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }

            if ($prekes_inf['preke'] == 11) {
                $kiek_gaunas = $inv['Goldstone'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET Goldstone='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 12) {
                $kiek_gaunas = $inv['Magicball'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET Magicball='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 13) {
                $kiek_gaunas = $inv['Powerstone'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET Powerstone='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 14) {
                $kiek_gaunas = $inv['Jball'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET Jball='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 15) {
                $kiek_gaunas = $inv['Dball2'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET Dball2='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 16) {
                $kiek_gaunas = $inv['Dball3'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET Dball3='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 17) {
                $kiek_gaunas = $inv['Dball4'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET Dball4='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 18) {
                $kiek_gaunas = $inv['Dball5'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET Dball5='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }

            if ($prekes_inf['preke'] == 19) {
                $kiek_gaunas = $inv['Dball6'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET Dball6='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 20) {
                $kiek_gaunas = $inv['Dball7'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET Dball7='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }

            if ($prekes_inf['preke'] == 21) {
                $kiek_gaunas = $inv['Sball'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET Sball='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 22) {
                $kiek_gaunas = $inv['angelwing'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET angelwing='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 23) {
                $kiek_gaunas = $inv['naikinti'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET naikinti='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 24) {
                $kiek_gaunas = $inv['tobulas'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET tobulas='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 25) {
                $kiek_gaunas = $inv['dball'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET dball='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 26) {
                $kiek_gaunas = $inv['ad16'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET ad16='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 27) {
                $kiek_gaunas = $inv['ad17'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET ad17='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 28) {
                $kiek_gaunas = $inv['alavas'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET alavas='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }

            if ($prekes_inf['preke'] == 29) {
                $kiek_gaunas = $inv['kvarcas'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET kvarcas='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }

            if ($prekes_inf['preke'] == 30) {
                $kiek_gaunas = $inv['titanas'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET titanas='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($prekes_inf['preke'] == 31) {
                $kiek_gaunas = $inv['Zuvis'] + $prekes_inf['kiek'];
                mysqli_query($conn, "UPDATE inv SET Zuvis='$kiek_gaunas' WHERE nick='$nick'") or die(mysqli_error());
            }
            echo "
			<div class='meniuc'>Sekmingai, ištrinei prekę!
			</div>";

            mysqli_query($conn, "DELETE FROM aukcijonas WHERE id='$prekes_inf[id]'") or die(mysqli_error());
        }
        $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "miestas.php?id=", "Miestas", "aukcijonas.php", "Aukcijonas", "Prekės trinimas");
        navigacija($g_n);
    }
    if ($id == "pirkti") {
        top('Prekės pirkimas');
        $nr = (int)abs($_GET['nr']);
        $apie_pr = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM aukcijonas WHERE id='$nr'")) or die(mysqli_error());
        if ($apie_pr['valiuta'] == 1) {
            $kiek_kaina = $litai;
        }
        if ($apie_pr['valiuta'] == 2) {
            $kiek_kaina = $apie['sms_litai'];
        }
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM aukcijonas WHERE id='$nr'")) == false) {
            echo '<div class="meniuc">
		<b>Klaida!</b><br>
		Tokios prek&#279;s n&#279;ra!
		</div>';
            $error = 'Yes';
        } elseif (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM zaidejai WHERE nick='$apie_pr[kas]'")) == 0) {

            echo '<div class="meniuc">Žaidėjas buvo ištryntas kuris įdėjo šią prekę dėlto jos pirkti negalima!</div>';
            $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Klaida");
            navigacija($g_n);
            foot();
        } elseif (apsas($apie_pr['kas']) == apsas($nick)) {
            echo '<div class="meniuc">
		<b>Klaida!</b><br>
		Negalima pirkti savo prekės
		</div>';
            $error = 'Yes';
        } elseif ($kiek_kaina < $apie_pr['kaina']) {
            echo '<div class="meniuc">
		<b>Klaida!</b><br>
		Neu&#382;tenk&#261; reikiamos valiutos!
		</div>';
            $error = 'Yes';
        } elseif (apsas($apie_pr['zaidejui']) != "" && apsas($apie_pr['zaidejui']) != apsas($nick)) {
            echo '<div class="meniuc">
		<b>Klaida!</b><br>
		Šį prekė ne tau!
		</div>';
            $error = 'Yes';
        }

        if (empty($error)) {
            if ($apie_pr['preke'] == 1) {
                $gaus = $inv['Dball1'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET Dball1='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 2) {
                $gaus = $inv['Microshem'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET Microshem='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 3) {
                $gaus = $inv['Fusionfail'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET Fusionfail='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 4) {
                $gaus = $inv['Sayiantail'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET Sayiantail='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 5) {
                $gaus = $inv['Stone'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET Stone='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 6) {
                $gaus = $inv['Soul'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET Soul='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 7) {
                $gaus = $inv['Nball'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET Nball='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 8) {
                $gaus = $inv['Energystone'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET Energystone='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 9) {
                $gaus = $inv['Pragarovaisius'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET Pragarovaisius='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 10) {
                $gaus = $inv['Majinsroll'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET Majinsroll='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 11) {
                $gaus = $inv['Goldstone'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET Goldstone='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 12) {
                $gaus = $inv['Magicball'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET Magicball='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 13) {
                $gaus = $inv['Powerstone'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET Powerstone='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 14) {
                $gaus = $inv['Jball'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET Jball='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 15) {
                $gaus = $inv['Dball2'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET Dball2='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 16) {
                $gaus = $inv['Dball3'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET Dball3='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 17) {
                $gaus = $inv['Dball4'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET Dball4='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }

            if ($apie_pr['preke'] == 18) {
                $gaus = $inv['Dball5'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET Dball5='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }

            if ($apie_pr['preke'] == 19) {
                $gaus = $inv['Dball6'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET Dball6='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }

            if ($apie_pr['preke'] == 20) {
                $gaus = $inv['Dball7'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET Dball7='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 21) {
                $gaus = $inv['Sball'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET Sball='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 22) {
                $gaus = $inv['angelwing'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET angelwing='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 23) {
                $gaus = $inv['naikinti'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET naikinti='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 24) {
                $gaus = $inv['tobulas'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET tobulas='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 25) {
                $gaus = $inv['dball'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET dball='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 26) {
                $gaus = $inv['ad16'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET ad16='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 27) {
                $gaus = $inv['ad17'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET ad17='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($apie_pr['preke'] == 28) {
                $gaus = $inv['alavas'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET alavas='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }

            if ($apie_pr['preke'] == 29) {
                $gaus = $inv['kvarcas'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET kvarcas='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }

            if ($apie_pr['preke'] == 30) {
                $gaus = $inv['titanas'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET titanas='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }

            if ($apie_pr['preke'] == 31) {
                $gaus = $inv['Zuvis'] + $apie_pr['kiek'];
                mysqli_query($conn, "UPDATE inv SET Zuvis='$gaus' WHERE nick='$nick'") or die(mysqli_error());
            }

            if ($apie_pr['valiuta'] == 1) {
                $valuta = 'pinig&#371;';
            }
            if ($apie_pr['valiuta'] == 2) {
                $valuta = 'eurasikų';
            }

            $zinute = "Taigi tavo prekę aukcijone nupirko <b>$nick</b> už tai gauni <b>$apie_pr[kaina]</b> $valuta!";
            mysqli_query($conn, "INSERT INTO pm SET gavejas='$apie_pr[kas]', what='SISTEMA', txt='$zinute', time='" . time() . "', nauj='NEW'") or die(mysqli_error());
            if ($apie_pr['valiuta'] == 1) {
                $litai = $litai - $apie_pr['kaina'];
                mysqli_query($conn, "UPDATE zaidejai SET litai='$litai' WHERE nick='$nick'") or die(mysqli_error());
                $infd = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM zaidejai WHERE nick='$apie_pr[kas]'")) or die(mysqli_error());
                $infdp = $infd['litai'] + $apie_pr['kaina'];
                mysqli_query($conn, "UPDATE zaidejai SET litai='$infdp' WHERE nick='$apie_pr[kas]'") or die(mysqli_error());
            }
            if ($apie_pr['valiuta'] == 2) {
                $litai = $smsLitai - $apie_pr['kaina'];
                mysqli_query($conn, "UPDATE zaidejai SET sms_litai='$litai' WHERE nick='$nick'") or die(mysqli_error());
                $infd = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM zaidejai WHERE nick='$apie_pr[kas]'")) or die(mysqli_error());
                $infdp = $infd['sms_litai'] + $apie_pr['kaina'];
                mysqli_query($conn, "UPDATE zaidejai SET sms_litai='$infdp' WHERE nick='$apie_pr[kas]'") or die(mysqli_error());
            }

			logInfo('Player bought item from auction.', [
				'product_id' => $apie_pr['preke'],
				'buyer_nick' => currentPlayer()->nick(),
				'seller_nick' => $apie_pr['kas'],
			]);
            mysqli_query($conn, "DELETE FROM aukcijonas WHERE id='$nr'") or die(mysqli_error());
            echo '<div class="meniuc">
		<b>Atlitka!</b><br>
		S&#279;kmingai nusipirkai prek&#281;!</div>';
        }
        $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "miestas.php?id=", "Miestas", "aukcijonas.php", "Aukcijonas", "Prekės pirkimas");
        navigacija($g_n);
    }
}

foot();
?>
	
