<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();

topbar();


if ($id == "") {
    top('Informacija');
    echo ' <div class="meniuc"><img src=img/imgg/informacija.png border="1" width="180" height="90"><alt="**"></div>';
    echo '<div class="meniuc">' . smile('Čia rasite pagrindinę informaciją apie žaidimą :)') . '</div>';
    echo '<div class="up">Vietovės</div><div class="meniu">
        ' . $ico . ' <a href="?id=taisykles">Taisyklės</a><br />
      
          ' . $ico . ' <a href="?id=smile2&psl=1">Naujos šypsenėlės</a><br />
        ' . $ico . ' <a href="?id=st">Veikėju statistika</a><br />
         ' . $ico . ' <a href="topai.php?id=">Žaidėju topai</a><br />
          ' . $ico . ' <a href="?id=valdo">Žaidimo valdžia</a><br />
           ' . $ico . ' <a href="?id=info">Žaidimo informacija</a><br />
             ' . $ico . ' <a href="?id=bufai">Bufai</a><br />
                 ' . $ico . ' <a href="balsavimai.php">Balsavimas</a><br />
        </div>';
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Informacija");
    navigacija($g_n);
}

if ($id == "smile") {
    top('Šipsenėlės');
    online('Žiūri Šypsenėles');
    $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM smile"))[0];
    if ($viso > 0) {
        $rezultatu_rodymas = 20;
        $total = @intval(($viso - 1) / $rezultatu_rodymas) + 1;
        if (empty($psl) or $psl < 0) $psl = 1;
        if ($psl > $total) $psl = $total;
        $nuo_kiek = $psl * $rezultatu_rodymas - $rezultatu_rodymas;

        $puslapiu = ceil($viso / $rezultatu_rodymas);
        echo '<div class="meniu">';
        $query = mysqli_query($conn,"SELECT * FROM smile ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
        while ($row = mysqli_fetch_assoc($query)) {
            echo '' . $row['img'] . ' - <b>' . $row['kodas'] . '</b><br/>';


            unset($row);

        }

        echo '</div>';
        echo '<div class="meniu" style="text-align: center;">' . puslapiavimas($puslapiu, $psl, '?id=smile') . '</div>';

        $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "informacija.php", "Informacija", "Šipsenėlės");
        navigacija($g_n);
    }
}
if ($id == "smile2") {
    online('Žiūri Šypsenėles');
    top('Šypsenėlės');

    $puslapiu = 6;

    if ($psl == '1') {

        echo '<div class="meniu">
:9dangui: <img src="img/smile/9dangui.png"></br>
:aciu: <img src="img/smile/aciu.png" ></br>
:agresivus: <img src="img/smile/agresivus.png"></br>
:alkoholikas: <img src="img/smile/alkoholikas.gif"></br>
:alus: <img src="img/smile/alus.png"></br>
:alus2: <img src="img/smile/alus.png"></br>
:alus3: <img src="img/smile/alus.png"></br>
:alus4: <img src="img/smile/alus.png"></br>
:angel: <img src="img/smile/angel.png"></br>
:angeliukas: <img src="img/smile/angel.png"></br>
:ateivis: <img src="img/smile/ateivis.png"></br>
:baisu2: <img src="img/smile/baisu2.png"></br>
:baisu3: <img src="img/smile/baisu2.png"></br>
:ban: <img src="img/smile/ban.png"></br>
:bausme: <img src="img/smile/bausme.png"></br>
:bee: <img src="img/smile/bee.png"></br>
:birthday: <img src="img/smile/birthday.png"></br>
:bomba: <img src="img/smile/bomba.png"></br> 
:bosas: <img src="img/smile/bosas.png"></br>
:cake: <img src="img/smile/cake.png"></br>
:club: <img src="img/smile/club.png"></br>
</div>
';
    }
    if ($psl == '2') {
        echo '
<div class="meniu">
:draugai: <img src="img/smile/draugai.png"></br>
:dumas: <img src="img/smile/dumas.png"></br>
:durnas: <img src="img/smile/durnas.png"></br>
:fanaras: <img src="img/smile/fanaras.png"></br>
:flirtas: <img src="img/smile/flirtas.png"></br>
:flood: <img src="img/smile/flood.png"></br>
:fucku: <img src="img/smile/fucku.png"></br>
:fyfius: <img src="img/smile/fyfius.png"></br>
:gerai: <img src="img/smile/gerai.png"></br>
:heart: <img src="img/smile/heart.png"></br>
:hmm: <img src="img/smile/hmm.png"></br>
:hug: <img src="img/smile/hug.png"></br>
:iki: <img src="img/smile/bye.gif"></br>
:kabutese: <img src="img/smile/collection-quotation-mark-cliparts.png"></br>
:kaledos: <img src="img/smile/kaledos.png"></br>
:kava: <img src="img/smile/kava.png"></br>
:knyga: <img src="img/smile/knyga.png"></br>
:kvailas: <img src="img/smile/kvailas.png"></br>
:la: <img src="img/smile/la.png"></br>
:ledai: <img src="img/smile/ledai.png"></br>
</div>
';
    }
    if ($psl == '3') {
        echo '
<div class="meniu">
:lt: <img src="img/smile/lt.png"></br>
:maldauja: <img src="img/smile/maldauja.png"></br>
:meet: <img src="img/smile/meet.png"></br>
:meile: <img src="img/smile/meile.png"></br>
:mirkt: <img src="img/smile/mirkt.png"></br>
:mirtis: <img src="img/smile/mirtis.png"></br>
:mokslas: <img src="img/smile/mokslas.png"></br>
:muzika: <img src="img/smile/muzika.png"></br>
:myliu: <img src="img/smile/myliu.png"></br>
:myliu2: <img src="img/smile/myliu.png"></br>
:ne: <img src="img/smile/ne.gif"></br>
:ne2: <img src="img/smile/ne.gif"></br>
:ne3: <img src="img/smile/ne.gif"></br>
:neas: <img src="img/smile/neas.gif"></br>
:negera: <img src="img/smile/negera.gif"></br>
:neitema: <img src="img/smile/neitema.png"></br>
:netikras: <img src="img/smile/fake.png"></br>
:nuobodu: <img src="img/smile/nuobodu.gif"></br>
:nzn: <img src="img/smile/idk.png"></br>
:ok: <img src="img/smile/ok.gif"></br>
</div>
';
    }
    if ($psl == '4') {
        echo '

<div class="meniu">
:orobuckis: <img src="img/smile/orokiss.png"></br>
:pa: <img src="img/smile/pa.gif"></br>
:padek: <img src="img/smile/help.png"></br>
:pardon: <img src="img/smile/pardon.png"></br>
:paslaptis: <img src="img/smile/paslaptis.png"></br>
:pergale: <img src="img/smile/pergale.png"></br>
:ploja: <img src="img/smile/ploja.png"></br>
:pyp: <img src="img/smile/pyp.png"></br>
:ragai: <img src="img/smile/ragai.png"></br>
:rek: <img src="img/smile/rek.png"></br>
:repas: <img src="img/smile/repas.png"></br>
:rokas: <img src="img/smile/rokas.png"></br>
:roze: <img src="img/smile/roze.png"></br>
:rulete: <img src="img/smile/rulete.png"/></br>
:salta: <img src="img/smile/salta.png"></br>
:se: <img src="img/smile/se.png"></br>
:serenada: <img src="img/smile/serenada.png"></br>
:sergu: <img src="img/smile/sergu.png"></br>
:sex: <img src="img/smile/sex.gif"></br>
:silke: <img src="img/smile/fish.png"></br>
</div>
';
    }
    if ($psl == '5') {
        echo '

<div class="meniu">
:siunciu: <img src="img/smile/siunciu.png"></br>
:skaitau: <img src="img/smile/skaitau.png"></br>
:sokas: <img src="img/smile/sokas.gif"></br>
:sorry: <img src="img/smile/sorry.gif"></br>
:spirk: <img src="img/smile/kickk.png"></br>
:stanga: <img src="img/smile/stangaa.png"></br>
:stiprus: <img src="img/smile/stipru.gif"></br>
:stop: <img src="img/smile/stop.png" /></br>
:sutinku: <img src="img/smile/sutinku.png"></br>
:tele: <img src="img/smile/tele.png"></br>
:temauzdaryta: <img src="img/smile/temauzdaryta.png"></br>
:tusas: <img src="img/smile/tusas.png"></br>
:tv: <img src="img/smile/televizorius.png"></br>
:tv2: <img src="img/smile/televizorius.png"></br>
:vaikas: <img src="img/smile/vaikai.png"></br>
:vargsas: <img src="img/smile/vargsas.png"></br>
:verkia: <img src="img/smile/verkia.png"></br>
:wow: <img src="img/smile/wow.png"></br>
:xe: <img src="img/smile/xde.png"></br>
:xe2: <img src="img/smile/xde.png"></br>
</div>
';
    }
    if ($psl == '6') {
        echo '
<div class="meniu">
:yahoo: <img src="img/smile/yahoo.gif"></br>
:yahoo2: <img src="img/smile/yahoo.gif"></br>
:yahoo3: <img src="img/smile/yahoo.gif"></br>
:zuikis: <img src="img/smile/zuikis.png"></br>
:*: <img src="img/smile/kiss.gif"></br>
:dick: <img src="img/smile/Boner.png"></br>
</div>
	';
    }


    echo '<div class="meniu" style="text-align: center;">' . puslapiavimas($puslapiu, $psl, '?id=smile2') . '</div>';

    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "informacija.php", "Informacija", "Šypsenėlės");
    navigacija($g_n);
} elseif ($id == "taisykles") {
    top('Taisyklės');
    online('Skaito taisyklęs');
    echo ' <div class="meniuc"><img src=img/imgg/informacija.png border="1" width="180" height="90"><alt="**"></div>';
    echo '<div class="meniuc"><b>Už taisyklių pažeidimą, Ban, Delete, Ip ban, administracija pasilieka teisę keisti taisykles bet kada.</b></div>';

    echo '<b><div class="up"> Bendros taisyklės</b></div>';

    echo '
<div class="meniu"><b>1.1.</b> Draudžiama reklamuoti svetainę (nesvarbu kokia ji būtų ar filmų puslapis ar pažinčių svetainė)</br></div>
<div class="meniu"><b>1.2.</b> Draudžiama iš kitų žaidėjų vogti žaidimo resursus.</br></div>
<div class="meniu"><b>1.3.</b> Draudžiama nepargarbiai elgtis su žaidėjais, juos įžeidinėti, grasinti.</br></div>
<div class="meniu"><b>1.4.</b> Draudžiama žaidime keiktis.</br></div>
<div class="meniu"><b>1.5.</b> Žaidime galima turėti tik vieną vartotoją. (Jeigu žaidžiate su broliu ar dar kuo per tą patį ip adresą, būtina įspėti administraciją)</br></div>
<div class="meniu"><b>1.6.</b> Draudžiama prašyti administratoriaus žaidimo resursų ar statuso.</br></div>
<div class="meniu"><b>1.7.</b> Taisyklių nežinojimas yra nieko kito bet tik jūsų kaltė.</br></div>
<div class="meniu"><b>1.8.</b> Draudžiama pervedinėti ar kitais būdais gauti žaidimo resursų ir įvairių daiktų iš tų kurie turi tokį patį ip ir įrenginius (kai būna broliai ar dar koks giminaitis)</br></div>
<div class="meniu"><b>1.9.</b> Draudžiama naudoti programas kurios palengvintų žaidimą</br></div>
<div class="meniu"><b>1.10.</b> Negalima vogti kitų žaidėjų vartotojus, įvairius žaidimo resursus!</div>';


    echo '<b><div class="up"> Mod taisyklės</b></div>
<div class="meniu"><b>1.1.</b> Nesinaudot mod funkcijomis savo naudai </br></div>
<div class="meniu"><b>1.2.</b> Netrint be reikalo topic ar pokalbiu jei nera reklamos ar izeidzianciu zodziu</br></div>
<div class="meniu"><b>1.3.</b> Nebanint zaideju jei nepazeide taisykliu o jei pazeide nurodyt tikslei kuria</br></div>
<div class="meniu"><b>1.4.</b> Draudziama baninant naudot netinkamus banu laikus ar priežastis</br></div>
<div class="meniu"><b>1.5.</b> Draudziama kurti nesamoningus balsavimus </br></div>
<div class="meniu"><b>1.6.</b> Draudziama nuemineti banus zaidejam kurie gavo bana nuo admino</br></div>
<div class="meniu"><b>1.7.</b> Draudziama nuimti moda neispėjus 3 kartus</br></div>
<div class="meniu"><b>1.8.</b> Draudziama viešinti kitų žaidėju pm zinutes</br></div>
<div class="meniu"><b>1.9.</b> Draudziama naudoti funkcija siusti pm visiem zaidejam saviem tikslam </br></div>
<div class="meniu"><b>2.0.</b> Draudzima baninti žaidėjus su vienu nick ir jei yra nenaudojami (mažas lygis, neaktyvus)<br/></div>
<div class="meniu"><b>2.1.</b> Draudžiama trinti topic, mini chat žinute, kurios nesusijusios su reklama ar ižeidinėjimais

</div>
		';
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "informacija.php", "Informacija", "Taisyklės");
    navigacija($g_n);
} elseif ($id == "st") {
    online('Informacija');
    top('Veikėju statistika');
    echo '<div class="meniu">';
    echo ' <div class="meniuc"><img src=img/imgg/informacija.png border="1" width="180" height="90"><alt="**"></div>';
    echo '
      ' . $ico2 . ' Goku pasirinko ' . mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='Gokas' ")) . ' žaidėjų<br/>
       ' . $ico2 . ' Vegeta pasirinko ' . mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='Vedžitas' ")) . ' žaidėjų<br/>
       ' . $ico2 . ' Gohan pasirinko ' . mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='Gohanas' ")) . ' žaidėjų<br/>
       ' . $ico2 . ' Goten pasirinko ' . mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='Goten' ")) . ' žaidėjų<br/>
     ' . $ico2 . ' Trunks pasirinko ' . mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='Tranksas' ")) . ' žaidėjų<br/>
       ' . $ico2 . ' Bulma pasirinko ' . mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='Bulma' ")) . ' žaidėjų<br/>
       ' . $ico2 . ' Pikola pasirinko ' . mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='Pikolas' ")) . ' žaidėjų<br/>
        ' . $ico2 . ' Fryza pasirinko ' . mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='Fryzas' ")) . ' žaidėjų<br/>
      ' . $ico2 . ' Buu pasirinko ' . mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='Buu' ")) . ' žaidėjų<br/>
     ' . $ico2 . ' Kid trunks pasirinko ' . mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='Kid trunks' ")) . ' žaidėjų<br/>
      ' . $ico2 . ' Baby pasirinko ' . mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='Baby' ")) . ' žaidėjų<br/>
	   ' . $ico2 . ' Android18 pasirinko ' . mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='Android18' ")) . ' žaidėjų<br/>
	  ' . $ico2 . ' Android17 pasirinko ' . mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='Android17' ")) . ' žaidėjų<br/>
	  ' . $ico2 . ' Cell pasirinko ' . mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='Cell' ")) . ' žaidėjų<br/>
	   ' . $ico2 . ' Broly pasirinko ' . mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='Broly' ")) . ' žaidėjų<br/>
	   ' . $ico2 . ' Gohan pasirinko ' . mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='Gohanas' ")) . ' žaidėjų<br/>
	   ' . $ico2 . ' Raditz pasirinko ' . mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='Bardock' ")) . ' žaidėjų<br/>
	  ' . $ico2 . ' Bardock pasirinko ' . mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='Bardock' ")) . ' žaidėjų<br/>
' . $ico2 . ' Vegeta gods pasirinko ' . mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='Vegeta gods' ")) . ' žaidėjų<br/>
	 ' . $ico2 . ' Goku gods pasirinko ' . mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='Goku gods' ")) . ' žaidėjų<br/>
	 ' . $ico2 . ' Vegito pasirinko ' . mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='Vegito' ")) . ' žaidėjų<br/>
	   ' . $ico2 . ' Gold oozuru pasirinko ' . mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='Gold Oozuru' ")) . ' žaidėjų<br/>
	  
	   </div>
        ';
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "informacija.php", "Informacija", "Veikėju statistika");
    navigacija($g_n);
} elseif ($id == "valdo") {
    online('Žiūri Žaidimo valdžią');
    top('Žaidėju statistika');
    echo ' <div class="meniuc"><img src=img/imgg/informacija.png border="1" width="180" height="90"><alt="**"></div>';
    echo '<div class="meniu">Viso prižiūrėtoju ';
    $a = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE statusas='Admin'"));
    $b = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE statusas='Mod'"));
    $c = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE statusas='Mod2'"));
    $d = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE statusas='Mod3'"));
    $e = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE statusas='Mod4'"));
    $k = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE statusas='Kurejas' "));
    echo '' . $a + $b + $c + $d + $e + $k . '</div>';
    echo '<div class="up"><b>Žaidimo KŪRĖJAS</b>:</div>';
    echo '<div class="meniuc">';
    if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE statusas='Kurėjas' ")) == 0) {
        echo '<b>[&raquo;]</b> Kūrėjų nėra...<br/>';
    } else {
        $query = mysqli_query($conn,"SELECT * FROM zaidejai WHERE statusas='Kurejas' ");
        while ($row = mysqli_fetch_assoc($query)) {
            $nr++;
            echo ' <a href="pagrindinis.php?id=apie&ka=' . $row['nick'] . '">' . statusas($row['nick']) . '</a><br/>';
        }

        unset($nr);
    }
    echo '</div>';
    echo '<div class="up"><b> Administratoriai</b>:</div>';
    echo '<div class="meniu">';
    if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE statusas='Admin' ")) == 0) {
        echo '<b>[&raquo;]</b> Administratorių nėra...<br/>';
    } else {
        $query = mysqli_query($conn,"SELECT * FROM zaidejai WHERE statusas='Admin' ");
        while ($row = mysqli_fetch_assoc($query)) {
            $nr++;
            echo '<b>' . $nr . '.</b> <a href="pagrindinis.php?id=apie&ka=' . $row['nick'] . '">' . statusas($row['nick']) . '</a><br/>';
        }

        unset($nr);
    }

    echo '</div>';
    echo '<div class="up"><b>1 Lygio modai:</b></div>';
    echo '<div class="meniu">';
    if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE statusas='Mod' ")) == 0) {
        echo ' 1 Lygio modu nera...<br/></div>';
    } else {
        $query = mysqli_query($conn,"SELECT * FROM zaidejai WHERE statusas='Mod' ");
        while ($row = mysqli_fetch_assoc($query)) {
            $nr++;
            echo '<b>' . $nr . '.</b> <a href="pagrindinis.php?id=apie&ka=' . $row['nick'] . '">' . statusas($row['nick']) . '</a><br/>';
        }
    }
    unset($nr);
    echo '</div><div class="up"><b>2 Lygio modai:</b></div>';
    echo '<div class="meniu">';
    if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE statusas='Mod2' ")) == 0) {
        echo ' 2 Lygio modu nera...<br/></div>';
    } else {
        $query = mysqli_query($conn,"SELECT * FROM zaidejai WHERE statusas='Mod2' ");
        while ($row = mysqli_fetch_assoc($query)) {
            $nr++;
            echo '<b>' . $nr . '.</b> <a href="pagrindinis.php?id=apie&ka=' . $row['nick'] . '">' . statusas($row['nick']) . '</a><br/>';
        }

        unset($nr);
        echo "</div>";
    }
    echo '<div class="up"><b>3 Lygio modai:</b></div>';
    echo '<div class="meniu">';
    if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE statusas='Mod3' ")) == 0) {
        echo ' 3 Lygio modu nera...<br/></div>';
    } else {
        $query = mysqli_query($conn,"SELECT * FROM zaidejai WHERE statusas='Mod3' ");
        while ($row = mysqli_fetch_assoc($query)) {
            $nr++;
            echo '<b>' . $nr . '.</b> <a href="pagrindinis.php?id=apie&ka=' . $row['nick'] . '">' . statusas($row['nick']) . '</a><br/>';
        }
        echo "</div>";
        unset($nr);
    }
    echo '<div class="up"><b>4 Lygio modai:</b></div>';
    echo '<div class="meniu">';
    if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE statusas='Mod4' ")) == 0) {
        echo ' 4 Lygio modu nera...<br/></div>';
    } else {
        $query = mysqli_query($conn,"SELECT * FROM zaidejai WHERE statusas='Mod4' ");
        while ($row = mysqli_fetch_assoc($query)) {
            $nr++;
            echo '<b>' . $nr . '.</b> <a href="pagrindinis.php?id=apie&ka=' . $row['nick'] . '">' . statusas($row['nick']) . '</a><br/>';
        }
        echo "</div>";
        unset($nr);
    }
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "informacija.php", "Informacija", "Žaidimo valdžia");
    navigacija($g_n);
}
if ($id === 'bufai') {

$buffsQuery = mysqli_query($conn,"SELECT * FROM skills WHERE skills.category = 'buff' LIMIT 10");
if (mysqli_num_rows($buffsQuery)) {
    echo '<div class="up">Bufai:</div>
  <div class="meniu">';
    while ($buff = mysqli_fetch_assoc($buffsQuery)) {
        echo '<div style="display: flex; align-items: center;">';
        echo '<img width="30" height="30" src="/img/skills/' . $buff['icon'] . '">';

        echo '<span>- <b>' . $buff['name'] . '</b> ' . $buff['description'] . ', trukmė(' . $buff['cooldown'] . 'sek.)</span>';
        echo '</div>';
    }
    echo '</div>';
    echo '<div class="meniu">';
    echo '* Bufus galite gauti nukaudami Legandary arba World bosus';
    echo '</div>';
}



    $playerBuffsQuery = mysqli_query($conn,"SELECT player_id, skills.icon as icon, skills.description as description, ends_at FROM player_skills JOIN skills ON player_skills.skill_id = skills.id WHERE player_id = '$apie[id]' AND ends_at > NOW() AND skills.category = 'buff' ORDER BY ends_at LIMIT 10");
    if (mysqli_num_rows($playerBuffsQuery)) {

        echo '<div class="up">Tavo bufai:</div>
  <div class="meniu">';
        while ($playerBuff = mysqli_fetch_assoc($playerBuffsQuery)) {
            echo '<div style="display: flex; align-items: center;">';
            echo '<img width="30" height="30" src="/img/skills/' . $playerBuff['icon'] . '">';
            $currentDate = new DateTime();
            $endDateObject = new DateTime($playerBuff['ends_at']);
            $timeDifference = $currentDate->diff($endDateObject);
            if ($timeDifference->i > 0) {
                $remainingTime = $timeDifference->format('%i min %s sec');
            } else {
                $remainingTime = $timeDifference->format('%s sec');
            }
            echo '<span>- ' . $playerBuff['description'] . '(' . $remainingTime . ')</span>';
            echo '</div>';
        }
        echo '</div>';
    }
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "informacija.php", "Bufai", "Bufai");
    navigacija($g_n);
}


if ($id == 'info') {
    top('Apie žaidimą');
    echo ' <div class="meniuc"><img src=img/imgg/informacija.png border="1" width="180" height="90"><alt="**"></div>';

    echo '

<div class="meniu">
<b>Kaip pasikelti savo kovinę galią?</b><br />
Ją galite keltis Vežlio saloje ten yra specialios treniruotės už kurias gausite jėgos ir gynybos. Dar galite pirkti už kreditus. Santykis tarp jėgos ir gynybos yra: 1:3. (1 jėgos 3 gynybos = 1 kovinė galia)<br>
</div>
<div class="meniu">
<b>Kaip užsidirbti pinigų?</b><br />
Juos gausite kovodami, arba keisdami už kreditus.<br>
</div>
<div class="meniu">
<b>Ar įmanoma gauti kreditų neremiant žaidimo?</b><br />
Taip įmanoma. Kreditus galite gauti atvesdamin žaidėjus<br>
</div>
<div class="meniu">
<b>Dienos topas</b><br />
Čia galite laimėti kreditų, kovos skaičiuojasi kai kovojate.<br>
</div>
<div class="meniu">
<b>Mano skillai</b><br />
Čia galite tranformuotis, išmokti naujas technikas, bei auras. Už tai gausite jėgos, gynybos, bei gyvybių lygių procentą<br>
</div>
<div class="meniu">
<b>Inventorius</b><br />
Tai jūsų inventorius. Čia jūs laikysite visus savo turimus daigtus<br>
</div>
<div class="meniu">
<b>Kovų arena</b><br />
Tai vieta kur galite kautis su kitais žaidėjais. Pralaimėją prarandate visus su savimi turimus pinigus.<br>
</div>
<div class="meniu">
<b>Karino bokštas</b><br />
Tai vieta kur galėsite pirkti stebuklingas pupas (pagydo pilnas gyvybes)<br>
</div>
<div class="meniu">
<b>Dievo namai</b><br />
Čia galėsite rasti drakono rutulius, kuriuos surinkus 7 galėsite iškviesti drakoną, ir jis jums išpildys vieną norą. Yra laiko ir sielos kambarys (pridės jėgos ir gynybos)<br>

</div>

';
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "informacija.php", "Informacija", "Apie žaidimą");
    navigacija($g_n);
}

foot();
?>
