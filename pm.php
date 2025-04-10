<?php
ob_start();

echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
$kam=$_GET['kam'];
head2();

baneris();
topbar();

if($id == ""){
    online('PM Dėžutėję');
    top("PM dežutė");

    echo'<div class="meniu"> 
 '.$ico.'  <a href="pm.php?id=new">Kurti naują žinutę</a></br> 
 '.$ico.'   <a href="pm.php?id=gautos_all">Gautos žinutės</a> ['.new_pm($new_pm).'/'.$viso_pm.']</br> 
 '.$ico.'   <a href="pm.php?id=issiustos_all">Išsiūstos žinutės</a><br>
  '.$ico.'   <a href="pm.php?id=sys">Sisteminės žinutės</a> </br> 


 '.$ico.'  <a href="pm.php?id=delete_gautos">Trinti gautas žinutęs</a></br>
 '.$ico.'  <a href="pm.php?id=delete_issiustos">Trinti išsiūstas žinutęs</a></br>
 '.$ico.'  <a href="pm.php?id=delete_sys">Trinti sistemines žinutęs</a></br>
   </div>';
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Pm dežutė");
    navigacija($g_n);

}

elseif($id == "gautos_all"){
    online('Žiūri Gautas žinutęs');
    top("Gautos žinutės");
    echo'<div class="meniuc"><a href="?id=ok">Žymėti visas kaip skaitytas</div>';

    $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM pms WHERE gavejas='$nick'"))[0];
    if($viso > 0){
        $rezultatu_rodymas=10;
        $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
        if (empty($psl) or $psl < 0) $psl = 1;
        if ($psl > $total) $psl = $total;
        $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
        $query = mysqli_query($conn,"SELECT * FROM pms WHERE gavejas='$nick' ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
        $puslapiu = ceil($viso/$rezultatu_rodymas);
        while($row = mysqli_fetch_assoc($query)){


            echo '<div class="meniu">';
            if($row['nauj'] == "NEW"){

                $kl = '<font color="red">';
                $kls = '</font>';
                $see='<img src="img/bicons/new2.png" />';
                $pm='<img src="img/bicons/pm2.png" />';
                $sms='Neperskaityta nauja žinutė';

            }
            else{
                $kl = '<font color="white">';
                $kls = '</font>';
                $pm='<img src="img/bicons/pm1.png" />';
                $see='<img src="img/bicons/seen2.png" />';
                $sms='Perskaitei šią žinutę';
            }
            echo '» '.$pm.'<small>Siuntėjas</small> - <b><a href="pagrindinis.php?id=apie&ka='.$row['what'].'"><b>'.statusas($row['what']).'</b></a> <br>» '.$see.'<a href="pm.php?id=read&ID='.$row['id'].'"> '.$kl.'<small>'.$sms.'</small></a>'.$kls.'<br/>
   <small>&raquo; <img src="img/bicons/time.png" />  '.laikas($row['time']).'</small>';
            unset($row);
            echo'</div>';
            echo '</div>';
            echo '</div>';

        }
        echo'</div>';
        echo'</div>';


        echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=gautos_all').'</div>';
    } else {
        echo '<div class="meniuc">Gautų žinučių nėra.</div>';
    }
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pm.php", "Pm dežutė",  "Gautos žinutės");
    navigacija($g_n);


}

elseif($id == "issiustos_all"){
    online('Žiūri Gautas žinutęs');
    top("Gautos žinutės");


    $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM pms2 WHERE gavejas='$nick'"))[0];
    if($viso > 0){
        $rezultatu_rodymas=10;
        $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
        if (empty($psl) or $psl < 0) $psl = 1;
        if ($psl > $total) $psl = $total;
        $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
        $query = mysqli_query($conn,"SELECT * FROM pms2 WHERE gavejas='$nick' ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
        $puslapiu = ceil($viso/$rezultatu_rodymas);
        while($row = mysqli_fetch_assoc($query)){

            if($row['nauj'] == 'send'){
                echo '<div class="meniu">';

                echo '» <img src="img/bicons/log.png" /> <b>Tu išsiuntei</b> - <a href="pagrindinis.php?id=apie&ka='.$row['what'].'"><b>'.statusas($row['what']).'</b></a> <br>» <img src="img/bicons/pm1.png" /><b> Išsiūsta žinutė:</b><br> » <img src="img/bicons/pm2.png" /> '.$kl.'  '.$row['txt'].''.$kls.' </a><br><small>&raquo; <img src="img/bicons/time.png" /><b> '.laikas($row['time']).'</b></small>
   </div>';

            }

            else {
                $kl = '<font color="white">';
                $kls = '</font>';

            }



            unset($row);
            echo'</div>';
            echo '</div>';


        }
        echo'</div>';



        echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=issiustos_all').'</div>';
    } else {
        echo '<div class="meniuc">Išsiūstų žinučių nėra.</div>';
    }
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pm.php", "Pm dežutė",  "Išsiūstos žinutės");
    navigacija($g_n);


}




elseif($id == "read"){


    $pmr = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM pms WHERE id='$ID' "));
    online('Skaito Gautą žinutę');

    if(apsas($pmr[gavejas]) != apsas($nick)){

        echo '<div class="meniu">Irech >:D</div>';

    }else{
        top('Žinutė nuo '.statusas($pmr[what]).'');


        mysqli_query($conn,"UPDATE pms SET nauj='OLD' WHERE id='$ID' ");
        echo '<div class="meniuc"> <b>'.statusas($pmr['what']).'</b>: '.smile($pmr['txt']).'<br/>
      '.laikas($pmr['time']).'</div>';
        if($pmr['what'] != 'SUPPORT'){
            echo '<div class="titlec">
   <form action="pm.php?id=write&kam='.$pmr['what'].'" method="post"/>
    Atsakymas:<br />
   <textarea name="txt" rows="3"></textarea><br />
   <input type="submit" value="Siųsti"/>
   </div>';
        }
    }
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pm.php", "Pm dežutė",  "Gautos žinutės");
    navigacija($g_n);
}

elseif($id == "new"){
    online('Rašo žinutę');
    top('Žinutės kurimas');
    if(!empty($ka)) $ats = $ka; else $ats = '';

    echo '<div class="meniuc">
   <form action="pm.php?id=write" method="post"/>
   Žinutės gavėjas:<br /><input type="text" value="'.$ats.'" name="kam"/><br />
   Žinutės tekstas:<br />
   <textarea name="txt" rows="3"></textarea><br />
   <input type="submit" name="submit" value="Siųsti"/>
   </div>';
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pm.php", "Pm dežutė",  "Nauja žinutė");
    navigacija($g_n);
}

elseif($id == "write"){
    online('Siunčia žinutę');
    top('Žinutės siuntimas');
    if(isset($_POST['submit'])){
        $kam = post($_POST['kam']);

    }
    $txt = post($_POST['txt']);

    if(empty($txt) ){
        echo '<div class="meniuc">Paliktai kažkurį tuščią laukelį!</div>';
    } else {
        $isReceiverAdmin = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$kam' AND statusas IN ('Kurejas', 'Admin')")) == 1;
        if(apsas($kam) == apsas($nick)){
            echo '<div class="meniuc">Sau siųsti žinutės negalimą!</div>';
        } else {
            if(!$isReceiverAdmin && $apie['lygis'] < 25 && apsas($kam) != apsas(sajanas) && !in_array($apie['statusas'], ['Kurejas', 'Admin'])){
                echo '<div class="meniuc">Tavo lygis per žemas! Reikia 25 lygio.</div>';
            }
            elseif($gaves == "+"&& apsas($kam) != apsas(erika)){
                echo '<div class="meniuc"><b>Klaida!</b> Tu esi užtildytas!</div>';

            }
            else {
                if($apie['veiksmai'] < 0 && apsas($kam) != apsas(erika)){
                    echo '<div class="meniuc">Rašyti galima atlikus bent 0 veiksmų</div>';
                } else {
                    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$kam'")) == 0){
                        echo '<div class="meniuc">Tokio žaidėjo nėra!</div>';
                    } else {
                        if($_SESSION['pm_flood']-time() > 0){
                            echo '<div class="meniuc">Anti flood '.laikas($_SESSION['pm_flood']-time() , 1).'!</div>';

                        }
                        else{
                            if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pm_ban WHERE baned='$nick' AND kas='$kam'")) == true){


                                echo '<div class="meniuc">'.statusas($kam).' jus užblokavo</div>';

                            }


                            else{

                                mysqli_query($conn,"INSERT INTO pms SET what='$nick', txt='$txt', gavejas='$kam', time='".time()."', nauj='NEW' ") or die(mysqli_error());
                                mysqli_query($conn,"INSERT INTO pms2 SET what='$kam', txt='$txt', gavejas='$nick', time='".time()."', nauj='send' ") or die(mysqli_error());
                                $_SESSION['pm_flood'] = time()+5;
                                echo '<div class="meniuc"><img src="img/bicons/pm1.png" />Žinutė išsiųsta <b>'.$kam.'</b>!</div>';
                                echo '<div class="titlec"><img src="img/bicons/pm2.png" />Žinutė: <b>'.smile($txt).'</b></div>';

                                mysqli_query($conn,"UPDATE zaidejai SET  pliusai=pliusai+5 WHERE nick='$nick'");
                                mysqli_query($conn,"UPDATE bendravimo_top SET sms=sms+'1'  WHERE nick='$nick'");
                            }
                        }
                    }}
            }}}
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pm.php", "Pm dežutė",  "Žinutės siuntimas");
    navigacija($g_n);
}
elseif($id == "delete_gautos"){
    online('Trina Gautas žinutęs');
    top('Žinučiu trinimas');
    if($co == "yes"){
        echo '<div class="meniuc">Visos gautos žinutės ištrintos.</div>';
        mysqli_query($conn,"DELETE FROM pms WHERE gavejas='$nick' ");
    } else {
        echo '<div class="meniuc">Ar tikrai norite ištrinti visas gautas žinutes?<br/>
   <a href="pm.php?id=delete_gautos&co=yes">Taip</a> | <a href="pm.php?id=">Ne</a>
   </div>';
    }
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pm.php", "Pm dežutė",  "Žinučiu trinimas");
    navigacija($g_n);
}
elseif($id == "delete_issiustos"){
    online('Trina Išsiūstas žinutęs');
    top('Žinučiu trinimas');
    if($co == "yes"){
        echo '<div class="meniuc">Visos išsiųstos žinutės ištrintos.</div>';
        mysqli_query($conn,"DELETE FROM pms2 WHERE gavejas='$nick' ");
    } else {
        echo '<div class="meniuc">Ar tikrai norite ištrinti visas išsiųstas žinutes?<br/>
   <a href="pm.php?id=delete_issiustos&co=yes">Taip</a> | <a href="pm.php?id=">Ne</a>
   </div>';
    }
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pm.php", "Pm dežutė",  "Žinučiu trinimas");
    navigacija($g_n);
}

elseif($id == "delete_sys"){
    online('Trina Gautas žinutęs');
    top('Žinučiu trinimas');
    if($co == "yes"){
        echo '<div class="meniuc">Visos žinutės ištrintos.</div>';
        mysqli_query($conn,"DELETE FROM pm WHERE gavejas='$nick' ");
    } else {
        echo '<div class="meniuc">Ar tikrai norite ištrinti visas sistemines žinutes?<br/>
   <a href="pm.php?id=delete_sys&co=yes">Taip</a> | <a href="pm.php?id=">Ne</a>
   </div>';
    }
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pm.php", "Pm dežutė",  "Žinučiu trinimas");
    navigacija($g_n);
}
elseif($id == "sys"){
    online('Žiūri Gautas žinutęs');
    top("Gautos sistemos žinutės");

    mysqli_query($conn,"UPDATE pm SET nauj='OLD' WHERE gavejas='$nick'");
    $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM pm WHERE gavejas='$nick' AND what='SISTEMA'"))[0];
    if($viso > 0){
        $rezultatu_rodymas=10;
        $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
        if (empty($psl) or $psl < 0) $psl = 1;
        if ($psl > $total) $psl = $total;
        $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
        $query = mysqli_query($conn,"SELECT * FROM pm WHERE gavejas='$nick' and what ='SISTEMA' ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
        $puslapiu = ceil($viso/$rezultatu_rodymas);
        while($row = mysqli_fetch_assoc($query)){

            echo '<div class="meniu">';

            echo '» <b>'.statusas($row['what']).'</b></a> '.$row['txt'].' <br/>
   <small>&raquo; '.laikas($row['time']).'</small>';
            unset($row);
            echo ' </div> ';

        }
        echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=sys').'</div></div>';
    } else {
        echo '<div class="meniuc">Sisteminių žinučių nėra.</div>';
    }
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pm.php", "Pm dežutė",  "Sistemos žinutės žinutės");
    navigacija($g_n);


}
if($id == 'ok'){

    mysqli_query($conn,"UPDATE pms SET nauj='OLD' WHERE gavejas='$nick'");

    header("location:pm.php?id=gautos_all");
}

foot();
?>
