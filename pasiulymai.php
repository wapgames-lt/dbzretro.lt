<?php
ob_start();

echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();

baneris();
		topbar();
		$k = isset($_GET[k]) ? post($_GET[k]) : null;
if($id == ""){
	
    online('Pasiūlymai');
  top('Pasiūlymai');
    if(isset($_POST['submit'])){
        $pasiulymas = post($_POST['pasiulymas']);

        if(empty($pasiulymas)){
            $klaida = "Pasiūlymo laukelis tuščias.";
			//$klaida='<font color="red">Pasiūlymai kolkas nepriimami, nes jų ir taip yra nemažai.</font>';
        }
elseif($gaves == "+"){
 echo '<div class="meniuc"><b>Klaida!</b> Tu esi užtildytas!</div>';

}
        elseif($lygis < 20){
            $klaida = "Tavo lygis per žemas! Reikia 20 lygio.";
        }
        if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pasiulymai WHERE pasiulymas='$pasiulymas'")) > 0 ){
            $klaida = "Toks pasiūlymas jau yra.";
        }

        if ($klaida != ""){
            echo '<div class="meniuc">'.$klaida.'</div>';
        } else {
            	
            mysqli_query($conn,"INSERT INTO pasiulymai SET kas='$nick', pasiulymas='$pasiulymas', laikas='".time()."', busena='Neperžiūrėtas' ");
            echo '<div class="meniuc">Pasiūlymas sėkmingai pridėtas.</div>';
        }
    }

 if($nust['pas'] == "-"){
       echo '<div class="meniuc"><b>Pasiūlymų rašymas išjungtas!</br></div></div>';

       }
else{
echo' <div class="meniuc"><img src=img/imgg/pasiulymai.png border="1" width="180" height="90"><alt="**"></div>';
	echo "<div class='meniuc'><font color='red'><b>Jūs kai rašot pasiūlymus - rašykit aiškiai ir su paaiškinimais, nes debiliškus pasiūlymus trinsim. Ir nerašyk klaidų čia, rašykit adminam..</b></font></div>";
    echo '<div class="meniuc">
    <form action="?id=" method="post"/>
    Pasiūlymas:<br />
    <textarea name="pasiulymas" rows="5"></textarea><br />
    <input type="submit" name="submit" value="Rašyti"/>
    </div>';}
	echo"<div class='meniuc'><a href='?id=watch&k=atlikta'>Atlikti</a> | <a href='?id=watch&k=atmesta'>Atmesti</a> | <a href='?id=watch&k=itraukta i planus'>Itraukti i planus</a> | <a href='?id=watch&k=Neperžiūrėtas'>Neperžiūrėti</a> | <a href='?id=watch&k=Komentuoti'>Komentuoti</a></div>"
 ;
    $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM pasiulymai WHERE busena != 'Atmesta'"))[0];
    if($viso > 0){
    $rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
     $query = mysqli_query($conn,"SELECT * FROM pasiulymai WHERE busena !='atmesta' ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
     $puslapiu = ceil($viso/$rezultatu_rodymas);
     while ($row = mysqli_fetch_assoc($query)) {
    
         echo '<div class="meniu">
         '.$ico2.' <a href="pagrindinis.php?id=apie&ka='.$row['kas'].'">'.statusas($row['kas']).'</a>: '.smile($row['pasiulymas']).'  '; 
echo'<br>'.$ico2.' Įvertinimas:<a href=?id=nrep&co=1&ka='.$row['id'].'><img src="img/replike.gif"></a>'.$row['likes'].' <a href=?id=nrep&co=2&ka='.$row['id'].'><img src="img/repdislike.gif"></a>'.$row['unlike'].'</br>
         '.$ico2.' Būsena: <b>'.$row['busena'].'</b>
         
         ';
		 
         if($apie['statusas'] == "Kurejas"){
             echo ' <a href="pasiulymai.php?id=edit&co='.$row['id'].'">[R]</a> <a href="pasiulymai.php?id=koment&co='.$row['id'].'">[K]</a> <a href="pasiulymai.php?id=delete&co='.$row['id'].'">[X]</a> <a href="?id=naujienos&co='.$row['id'].'">[Įdėti į naujienas]</a>';
         }
         if($row['komentaras'] == ""){} else {
             echo '<br/>'.$ico.' '.statusas($row[admin]).' Komentaras: <b>'.smile($row['komentaras']).'</b>';
         }
         echo '<br/>'.$ico.' <a href="pasiulymai.php?id=komentarai&co='.$row['id'].'">Komentarai</a> ('.mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pas_kom WHERE p_id='$row[id]' ")).')';
         echo '</div>';
         unset($row);
     }
     echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=').'</div>';
     echo '<div class="meniuc">Viso pasiūlymų: <b>'.mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pasiulymai")).'</b></div>';
   } else {
   echo '<div class="meniuc">Pasiūlymų nėra.</div>';
   }
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","Pasiūlymai");
navigacija($g_n);
}
elseif($id == "edit"){
	top('Pasiūlimo būsena');
    online('Pasiūlymai');
	$kieno = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM pasiulymai WHERE id='$co'"));
    if($apie['statusas'] != "Kurejas"){
      
        echo '<div class="meniuc">Tu ne Administratorius!</div>';
    }
    elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pasiulymai WHERE id='$co'")) == false){
     
        echo '<div class="meniuc">Tokio pasiūlymo nėra!</div>';
    } else {
       

        if(isset($_POST['submit'])){
            $st = post($_POST['status']);
            if(empty($st)){
                $klaida = "Nepasirinkai statuso!";
            }
            if ($klaida != ""){
                echo '<div class="meniuc">'.$klaida.'</div>';
            } else {
                mysqli_query($conn,"UPDATE pasiulymai SET busena='$st' WHERE id='$co' ");
				$txt='Jūsų pasiulimas buvo : '.$st.'';
				  mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', gavejas='$kieno[kas]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
                echo '<div class="meniuc">Būsena pakeista.</div>';
            }
        }
        echo '<div class="meniu">';
        echo '<form action="pasiulymai.php?id=edit&co='.$co.'" method="post">
        Pasirinkite statusa:<br>
        <select name="status">
        <option value="Atlikta">Atlikta</option>
        <option value="Komentuoti">Komentuoti</option>
        <option value="Atmesta">Atmesta</option>
        <option value="&#302;traukta &#303; planus">&#302;traukta &#303; planus</option>
        <option value="Svarstomas">Svarstomas</option>
        <option value="Nepaai&#353;kintas">Nepaai&#353;kintas</option>
        </select><br/>
        <input type="submit" name="submit" value="Keisti"/>
        </form></div>';
    }
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","pasiulymai.php","Pasiūlymai", "Pasiūlymo busena");
navigacija($g_n);
}
elseif($id == "delete"){
	top('Pasiūlimo trinimas');
    online('Pasiūlymai');
    if($apie['statusas'] != "Kurejas"){
      
        echo '<div class="meniuc">Tu ne Administratorius!</div>';
    }
    elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pasiulymai WHERE id='$co'")) == false){
       
        echo '<div class="meniuc">Tokio pasiūlymo nėra!</div>';
    } else {
        mysqli_query($conn,"DELETE FROM pasiulymai WHERE id='$co'");
        mysqli_query($conn,"DELETE FROM pas_kom WHERE p_id='$co'");
      
        echo '<div class="meniuc">Pasiūlymas ištrintas!</div>';
    }
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","pasiulimai.php","Pasiūlymai", "Pasiūlymo trinimas");
navigacija($g_n);
}
elseif($id == "koment"){
	top('Pasiūlimų komentarai');
    online('Pasiūlymai');
    if($apie['statusas'] != "Kurejas"){
      
        echo '<div class="meniuc">Tu ne Administratorius!</div>';
    }
    elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pasiulymai WHERE id='$co'")) == false){
     
        echo '<div class="meniuc">Tokio pasiūlymo nėra!</div>';
    } else {
    
        
        if(isset($_POST['submit'])){
            $kom = post($_POST['kom']);

            if(empty($kom)){
                $klaida = "Komentaro laukelis tuščias.";
            }
            if ($klaida != ""){
                echo '<div class="meniuc">'.$klaida.'</div>';
            } else {
                mysqli_query($conn,"UPDATE pasiulymai SET komentaras='$kom',admin='$nick' WHERE id='$co' ");
                echo '<div class="meniuc">Komentaras parašytas.</div>';
            }
        }
        echo '<div class="meniuc">
        <form action="?id=koment&co='.$co.'" method="post"/>
         Komentaras:<br /><textarea name="kom" rows="3"></textarea><br />
        <input type="submit" name="submit" value="Rašyti"/>
        </div>';
    }
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","pasiulymai.php","Pasiūlymai", "Pasiūlymo komentarai");
navigacija($g_n);
}
elseif($id == "komentarai"){
	top('Pasiūlimo komentarai');
    online('Pasiūlymų komentarai');
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pasiulymai WHERE id='$co'")) == false){
      
        echo '<div class="meniuc">Tokio pasiūlymo nėra!</div>';
    } else {
     

        if(isset($_POST['submit'])){
            $kom = post($_POST['kom']);
            if(empty($kom)){
                $klaida = "Komentaro laukelis tuščias.";
            }
elseif($gaves == "+"){
 echo '<div class="meniuc"><b>Klaida!</b> Tu esi užtildytas!</div>';

}
            if($lygis < 20){
echo' <div class="meniuc"><img src=img/imgg/pasiulymai.png border="1" width="180" height="90"><alt="**"></div>';
                $klaida = "Tavo lygis per žemas! Reikia 20 lygio.";
            }

            if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pas_kom WHERE kom='$kom' AND p_id='$co' ")) > 0 ){
                $klaida = "Toks komentaras jau yra.";
            }
            if ($klaida != ""){
                echo '<div class="meniuc">'.$klaida.'</div>';
            } else {
                mysqli_query($conn,"INSERT INTO pas_kom SET kas='$nick', kom='$kom', laikas='".time()."', p_id='$co' ");
                echo '<div class="meniuc">Komentaras parašytas.</div>';
            }
        }
echo' <div class="meniuc"><img src=img/imgg/pasiulymai.png border="1" width="180" height="90"><alt="**"></div>';
        echo '<div class="meniuc">
        <form action="?id=komentarai&co='.$co.'" method="post"/>
        Komentaras:<br /><textarea name="kom" rows="3"></textarea><br />
        <input type="submit" name="submit" value="Rašyti"/>
        </div>';
        $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM pas_kom WHERE p_id='$co'"))[0];
        if($viso > 0){
    $rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
     $query = mysqli_query($conn,"SELECT * FROM pas_kom WHERE p_id='$co' ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
     $puslapiu = ceil($viso/$rezultatu_rodymas);
     $nr = 1+$page_sql;
     while ($row = mysqli_fetch_assoc($query)) {
         echo '<div class="meniu">
         '.$nr.'. <a href="pagrindinis.php?id=apie&ka='.$row['kas'].'">'.statusas($row['kas']).'</a>: '.smile($row['kom']).'<br/>
         '.laikas($row['laikas']).'';
         echo '</div>';
         $nr++;
         unset($row);
     }
     echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=komentarai&id='.$id.'').'</div>';
   
   } else {
   echo '<div class="meniuc">Komentarų nėra.</div>';
   }
   }
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","pasiulymai.php","Pasiūlymai", "Pasiūlymo busena");
navigacija($g_n);
}

elseif($id == "nrep"){
top('Pasiūlimų reputacija');
    if($lygis < 30){
       
        echo '<div class="meniuc">Reputacija galim duoti nuo 30 lygio!</div>';
    }
   	elseif($co > 2 or $co < 1){
       
        echo '<div class="meniuc">ERROR!</div>';}
	  
	  elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pas_rep WHERE kas='$nick' && kam='$ka'"))){
        
        echo '<div class="meniuc">Tu jau vertinai šį pasiūlymą!</div>';

     
	  
	
    

	  
	  
    } else {
        
        if($co == 1){
          
    mysqli_query($conn,"UPDATE pasiulymai SET likes=likes+'1' WHERE id='$ka'")or die(mysqli_error());
          
        } else {
           
            mysqli_query($conn,"UPDATE pasiulymai SET unlike=unlike-'1' WHERE id='$ka'")or die(mysqli_error());
          
        }
        echo '<div class="meniuc">Atlikta</div>';
       
        mysqli_query($conn,"INSERT INTO pas_rep SET kas='$nick', kam='$ka'")or die(mysqli_error());
	  }
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","pasiulymai.php","Pasiūlymai", "Pasiūlymo reputacija");
navigacija($g_n);
   
   
}
if($id == 'watch'){
	top(ucfirst($k));

    $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM pasiulymai WHERE busena='$k'"))[0];
    if($viso > 0){
    $rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
     $query = mysqli_query($conn,"SELECT * FROM pasiulymai WHERE busena='$k' ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
     $puslapiu = ceil($viso/$rezultatu_rodymas);
     while ($row = mysqli_fetch_assoc($query)) {
         echo '<div class="meniu">
         '.$ico.' <a href="pagrindinis.php?id=apie&ka='.$row['kas'].'">'.statusas($row['kas']).'</a>: '.smile($row['pasiulymas']).'  <a href=?id=nrep&co=1&ka='.$row['id'].'><img src="img/replike.gif"></a>'.$row['likes'].' <a href=?id=nrep&co=2&ka='.$row['id'].'><img src="img/repdislike.gif"></a>'.$row['unlike'].'</br>
         '.$ico.' Būsena: <b>'.$row['busena'].'</b>';
         if($apie['statusas'] == "Kurejas"){
             echo ' <a href="pasiulymai.php?id=edit&co='.$row['id'].'">[R]</a> <a href="pasiulymai.php?id=koment&co='.$row['id'].'">[K]</a> <a href="pasiulymai.php?id=delete&co='.$row['id'].'">[X]</a>';
         }
         if($row['komentaras'] == ""){} else {
             echo '<br/>'.$ico.' Admin Komentaras: <b>'.smile($row['komentaras']).'</b>';
         }
         echo '<br/>'.$ico.' <a href="pasiulymai.php?id=komentarai&co='.$row['id'].'">Komentarai</a> ('.mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pas_kom WHERE p_id='$row[id]' ")).')';
         echo '</div>';
         unset($row);
     }
     echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=watch&k='.$k.'').'</div>';
   
   } else {
   echo '<div class="meniuc">Pasiūlymų nėra.</div>';
   }
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","pasiulymai.php","Pasiūlymai", "".ucfirst($k)."");
navigacija($g_n);
}

if($id == 'istrinti'){
mysqli_query($conn,"DELETE FROM pasiulymai WHERE busena='Atmesta'");
}


if($id == 'naujienos'){

if($apie['statusas'] == 'Kurejas'){
$info = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM pasiulymai WHERE id='$co'"));
$tmxs = time()+60;
                    mysqli_query($conn,"INSERT INTO news SET name='Atliktas <b>".$info['kas']."</b> pasiūlymas: <b>".$info['pasiulymas']."</b>', new='$new', kas='$nick', data='".time()."'");
                    mysqli_query($conn,"UPDATE nustatymai SET new_time='$tmxs' ");
                    echo '<div class="meniuc">Naujiena pridėta!</div>';
					mysqli_query($conn,"DELETE FROM pasiulymai WHERE id='$co'");
			mysqli_query($conn,"UPDATE nustatymai SET sndnew=sndnew+'1' ");
$txt = "Tavo <b>pasiūlymas</b>  buvo atliktas! Gavai <b>100</b> $eurui ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$info[kas]' ");

	mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'100' WHERE nick='$info[kas]'")or die(mysqli_error());


$g_n[] = array("pagrindinis.php?id=","Pagrindinis","pasiulymai.php","Pasiūlymai", "Naujienos įdėjimas");
navigacija($g_n);
}
}

 foot();
?>
