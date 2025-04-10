<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();

		topbar();

   
if($id == ""){
    online('Forumas');
    top("Forumo kategorijos");


    $visi = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM forum_kat"))[0];

    if($visi > 0){
        $query = mysqli_query($conn,"SELECT * FROM forum_kat ORDER BY id DESC LIMIT $visi");
echo' <div class="meniuc"><img src=img/imgg/forumas.png border="1" width="180" height="90"><alt="**"></div>';
        echo '<div class="meniu">';
        while($row = mysqli_fetch_assoc($query)){
            echo $ico . ' <a href="?id=temos&ID=' . $row['id'] . '">' . $row['name'] . '</a> (<b>' . mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM forum_tem WHERE kat='" . $row['id'] . "'"))[0] . '/' . mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM forum_zin WHERE kat='" . $row['id'] . "'"))[0] . '</b>)<br />';

        }
        echo '</div>';
        echo '<div class="meniuc">Kategorijų - <b>'.$visi.'</b></div>';
    }else{
        echo '<div class="meniuc">Kategorijų nėra!</div>';
    }
   
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Forumas");
	navigacija($g_n);
}
elseif($id == "temos"){
	top("Forumo temos");
    $ID = isset($_GET['ID']) ? $_GET['ID'] : null;
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM forum_kat WHERE id='$ID'")) == 0){
     
        echo '<div class="meniuc">Tokios kategorijos nėra!</div>';
       
	  
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","forumas.php","Forumas","Klaida");
	navigacija($g_n);
    }
    elseif($ka == "kurti"){
    	
        online('Kuria naują forumo temą');
        if(isset($_POST['submit'])){
            $tema = post($_POST['tema']); $zinute = post($_POST['zinute']);
            if(empty($tema) OR empty($zinute)){
                $klaida = 'Paliktas tuščias laukelis!';
            }
            elseif($lygis < 20){
                $klaida = 'Jūsų lygis peržemas! Reikia 20 lygio.';
            }
elseif($gaves == "+"){
 echo '<div class="meniuc"><b>Klaida!</b> Tu esi užtildytas!</div>';

}
			  elseif($apie[veiksmai] < 2000){
                $klaida = 'Rašyti galima laimėjus 2000 kovų';
            }
			
			
            elseif(strlen($tema) < 4){
                $klaida = 'Tema per trumpa!';
            }
            elseif(strlen($zinute) < 4){
                $klaida = 'Žinutė per trumpa!';
            }
            elseif($_SESSION['time']> time()){
                $klaida = 'Kitą temą galėsite kurti už '.laikas($_SESSION['time']-time(),1).'';
            }
            else{
                mysqli_query($conn,"INSERT INTO forum_tem SET name='$tema', kat='$ID', kas='$nick'");
                mysqli_query($conn,"INSERT INTO forum_zin SET nick='$nick', text='$zinute', data='".time()."', kat='$ID', tem='".kiek('forum_tem')."'");
                $_SESSION['time'] = time()+120;
                $klaida = 'Tema sėkmingai sukurta!';
            }
        }
        
       
        if(isset($klaida)){
            echo '<div class="meniuc"><b>'.$klaida.'</b></div>';
        }
        echo '<div class="meniu">
        <form action="?id=temos&ID='.$ID.'&ka=kurti" method="post"/>
        Tema:<br /><input type="text" name="tema"/><br />
         Žinutė<br /><textarea name="zinute"></textarea><br />
        <input type="submit" name="submit" value="Kurti "/></form>
        </div>';
        
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","forumas.php","Forumas","Temos kurimas");
	navigacija($g_n);
    }else{
        online('Forumo kategorijos');
        $inf_kat = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM forum_kat WHERE id='$ID'"));

        $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM forum_tem WHERE kat='$ID'"))[0];

        echo '<div class="meniuc"><a href="?id=temos&ID='.$ID.'&ka=kurti"><b>Kurti temą</b></a></div>';
        
        if($viso > 0){
            $rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
            $query = mysqli_query($conn,"SELECT * FROM forum_tem WHERE kat='$ID' ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
            $puslapiu=ceil($viso/$rezultatu_rodymas);
            
            echo '<div class="meniu">';
            while($row = mysqli_fetch_assoc($query)){
                echo '' . $ico . ' <a href="?id=ziureti&ID=' . $row['kat'] . '&T=' . $row['id'] . '">' . $row['name'] . '</a> (<b>' . mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM forum_zin WHERE kat='$ID' AND tem='" . $row['id'] . "'"))[0] . '</b>) [<b>' . statusas($row['kas']) . '</b>]<br />';

            }
            echo '</div>';
            echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=temos&ID='.$ID.'').'</div>';
            
        }else{
            echo '<div class="meniuc">Kategorijoje <b>'.$inf_kat['name'].'</b> temų nėra!</div>';
        }
      $g_n[] = array("pagrindinis.php?id=","Pagrindinis","forumas.php","Forumas","Forumo kategorijos");
	navigacija($g_n);
    }
}
elseif($id == "ziureti"){
	top("Forumo temos");
    $ID = isset($_GET['ID']) ? $_GET['ID'] : null; 
	 $T = isset($_GET['T']) ? $_GET['T'] : null;
    $inf_kat = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM forum_kat WHERE id='$ID'"));
        $inf_tem = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM forum_tem WHERE id='$T'"));
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM forum_kat WHERE id='$ID'")) == 0){
     
        echo '<div class="meniuc">Tokios kategorijos nėra!</div>';
        $g_n[] = array("pagrindinis.php?id=","Pagrindinis","forumas.php","Forumas","Klaida");
	navigacija($g_n);
    }
    elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM forum_tem WHERE id='$T'")) == 0){
     
        echo '<div class="meniuc">Tokios temos nėra!</div>';
         $g_n[] = array("pagrindinis.php?id=","Pagrindinis","forumas.php","Forumas","Klaida");
	navigacija($g_n);
    }
    elseif($ka == "rasyti"){
        $zin = post($_POST['zinute']);
        if(empty($zin)){
            echo '<script>document.location="?id=ziureti&ID='.$ID.'&T='.$T.'"</script>';
        }
        elseif($lygis < 100 && $apie['statusas'] === 'Žaidėjas'){
            echo '<script>document.location="?id=ziureti&ID='.$ID.'&T='.$T.'"</script>';
        }
          elseif($apie[veiksmai] < 200 && $apie['statusas'] === 'Žaidėjas'){
              echo '<script>document.location="?id=ziureti&ID='.$ID.'&T='.$T.'"</script>';
            }
        elseif($_SESSION['time'] > time()){
            echo '<script>document.location="?id=ziureti&ID='.$ID.'&T='.$T.'"</script>';
        }else{
            mysqli_query($conn,"INSERT INTO forum_zin SET nick='$nick', text='$zin', data='".time()."', kat='$ID', tem='$T'");
            $_SESSION['time'] = time()+5;
            mysqli_query($conn,"UPDATE zaidejai SET forums=forums+1 WHERE nick='$nick'");
            echo '<script>document.location="?id=ziureti&ID='.$ID.'&T='.$T.'"</script>';
        }
    }
    else{
        online('Žiūri forumo temą');

        $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM forum_zin WHERE kat='$ID' AND tem='$T'"))[0];


        echo '<div class="meniuc">
    <form action="?id=ziureti&ID='.$ID.'&T='.$T.'&ka=rasyti" method="post"/>
    <textarea name="zinute" cols="25" rows="2">'.$ats.'</textarea><br />
    <input type="submit" value="Rašyti"/></form>
    </div>';
        if($viso > 0){
        	  $rezultatu_rodymas=15;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
            $query = mysqli_query($conn,"SELECT * FROM forum_zin WHERE kat='$ID' AND tem='$T' ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas") or die(mysqli_error());
        $puslapiu=ceil($viso/$rezultatu_rodymas);
            while($row = mysqli_fetch_assoc($query)){
                echo '<div class="meniu">'.$ico.' <a href="pagrindinis.php?id=apie&ka='.$row['nick'].'"><b>'.statusas($row['nick']).'</b></a> - '.smile($row['text']).'<br /><small>'.laikas($row['data']).'</small></div>';
            }
 
            echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=ziureti&ID='.$ID.'&T='.$T.'').'</div>';
          
        }else{
            echo '<div class="meniuc">Temoje <b>'.$inf_tem['name'].'</b> žinučių nėra!</div>';
        }
     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","forumas.php","Forumas","Forumos temos");
	navigacija($g_n);
    }

}
 foot();
?>
