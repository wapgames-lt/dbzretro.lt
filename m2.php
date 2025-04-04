<?php

ob_start();
include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';

head2();
baneris();
   topbar();

   $asas = mysql_fetch_assoc(mysql_query("SELECT * FROM unikalai WHERE unikalas='$veikejas'"));
if(mysql_num_rows(mysql_query("SELECT * FROM unikalai WHERE unikalas='$asas[unikalas]'")) > 0){


        $kguni = ($kg/100)*$asas['kg'];

        if($bonusask !=""){
        $kgun = $kg+$kguni+$bonusask;
      }
      else{
        $kgun = $kg+$kguni;
      }


    }
    else{
      $kgun = $kg;
    
    }

if($id == ""){

   online('M2');

   if($auto == "+"){

       $onoff = '<font color="green">Įjunkti</font>';

       $nurd = '<a href="game.php?i=auto_off">OFF</a>';

   } else {

       $onoff = '<font color="red">Išjungti</font>';

       $nurd = '<a href="game.php?i=auto_on">ON</a>';  

   }

   echo '<div class="top"><b>M2 Planeta</b></div>';

 echo '<div class="main_c"><img src="img/m2.png" border="0" alt="*"></div>';

   echo '<div class="main_c">

Jūs galite nukauti <b><font color="red">'.sk($kgun).'</font></b> lygio karį.</div>

   <div class="main_c">

   Dabar auto kovojimai <b>'.$onoff.'</b> ['.$nurd.']<br/>

   Auto kovojimai kas <b><font color="red">'.$autov.'</font></b> sek. | Dabar padusimai: <b><font color="red">'.$pad.'</font></b> sek.</div>';

   $total = mysql_result(mysql_query("SELECT COUNT(*) FROM m2_lokacijos"),0);

   if($total > 0){

   echo '<div class="main_l"><b>'.$ico.' Vietovės</b>:</div>';

   echo '<div class="main_l">';

   $query = mysql_query("SELECT * FROM m2_lokacijos");

   while($row = mysql_fetch_assoc($query)){

         echo '<b>[&raquo;]</b> <a href="m2.php?i=vieta&ID='.$row['id'].'">'.$row['name'].'</a><br/>';

         unset($row);

   }

   echo '</div>';

   } else {

         echo '<div class="error">Kolkas lokacijų nėra.</div>';

   }//<b>[&raquo;]</b> <a href="m2_uolienos.php?i=">Kalnai</a><br/>  // Įterpti po BLACK SMOKE SHENRON

   echo '<div class="main_l"><b>'.$ico.' Papildoma</b>:</div>

   <div class="main_l">

 <b>[&raquo;]</b> <a href="m2_uolienos.php">Ieškoti Uolienų!!!</a><br/>

   <b>[&raquo;]</b> <a href="m2.php?i=black">Black smoke shenron</a><br/>

   <b>[&raquo;]</b> <a href="m2.php?i=grigas">Robotas Grigas</a> (<font color="red">Paslaptingoji misija!</font>)<br/>

   </div>';

  echo '<div class="acept"> <b><font color="white"> Navigacija</b></font> </div>';


   echo '<div class="main_c"><div align="left"><a href="Singeru%20Village.php">< Singeru Village < </a><br/><a href="Singeru%20Village.php"> *Teleport to Singeru Village*</a></div></div>';
echo '<div class="acept"> <b> <a href="mano_m.php">Meniu [+]</b> </div>';



}








elseif($id == "vieta"){

$KD = rand(9999,99999);

$_SESSION['refresh'] = $KD;

$ID = $klase->sk($_GET['ID']);

   online('M2 Planeta - Kovose');

   $lok = mysql_fetch_assoc(mysql_query("SELECT * FROM m2_lokacijos WHERE id='$ID' "));

    if(mysql_num_rows(mysql_query("SELECT * FROM m2_lokacijos WHERE id='$ID' ")) == 0){

          echo '<div class="top"><b>Klaida ! ! !</b></div>';

          echo '<div class="error">Tokios lokacijos nėra!</div>';

    } else {

         $total = mysql_result(mysql_query("SELECT COUNT(*) FROM m2_mobai WHERE lokacija='$ID'"),0);

         echo '<div class="top"><b>'.$lok['name'].'</b></div>';



if(empty($lok[foto])){}else{$foto="<div class='main_c'><img src='$lok[foto]' alt='Planetos paveiksliukas'/></div>";}

echo ''.$foto.'';



         if($total > 0){

             echo '<div class="main_l"><b>'.$ico.' Kovotojas (K.G)</b></div>';

             echo '<div class="main_l">';

             $query = mysql_query("SELECT * FROM m2_mobai WHERE lokacija='$ID' ORDER BY -kg DESC LIMIT 0,30");

             while($row = mysql_fetch_assoc($query)){

                   echo '<b>[&raquo;]</b> <a href="m2.php?i=pulti&ID='.$row['lokacija'].'&VS='.$row['id'].'&KD='.$KD.'">'.$row['name'].'</a> ('.sk($row['kg']).')<br/>';

                   unset($row);

             }

         echo '</div>';

         } else {

              echo '<div class="error">Kolkas monstrų nėra.</div>';

         }

         }

    echo '<div class="acept"> <b><font color="white"> Navigacija</b></font> </div>';


   echo '<div class="main_c"><div align="left"><a href="Singeru%20Village.php">< Singeru Village < </a><br/><a href="Singeru%20Village.php"> *Teleport to Singeru Village*</a></div></div>';
echo '<div class="acept"> <b> <a href="mano_m.php">Meniu [+]</b> </div>';

}
elseif($id == "pulti"){

$ID = $klase->sk($_GET['ID']);

$VS = $klase->sk($_GET['VS']);

$KD = $klase->sk($_GET['KD']);

   online('Kovoja M2 Planetoje');

   $lok = mysql_fetch_assoc(mysql_query("SELECT * FROM m2_lokacijos WHERE id='$ID' "));

   $mob = mysql_fetch_assoc(mysql_query("SELECT * FROM m2_mobai WHERE id='$VS' "));

    if(mysql_num_rows(mysql_query("SELECT * FROM m2_lokacijos WHERE id='$ID' ")) == 0){

          echo '<div class="top"><b>Klaida ! ! !</b></div>';

          echo '<div class="error">Tokios lokacijos nėra!</div>';

    } else {

    if(mysql_num_rows(mysql_query("SELECT * FROM m2_mobai WHERE id='$VS' ")) == 0){

          echo '<div class="top"><b>Klaida ! ! !</b></div>';

          echo '<div class="error">Tokio monstro kovų lauke nėra!</div>';

    } else {

    if($KD != $_SESSION['refresh']){

     $KDS = rand(9999,99999);

    $_SESSION['refresh'] = $KDS;

          echo '<div class="top"><b>Klaida ! ! !</b></div>';

          echo '<div class="error">Taip kovoti negalimą! Eikite atgal ir vėl pulkite.</div>';

   echo '<div class="main_c"><a href="m2.php?i=pulti&ID='.$ID.'&VS='.$VS.'&KD='.$KDS.'">Pulti vėl</a></div>';

 } else {

    if($apie['kov']-time() > 0){

      $KDS = rand(9999,99999);

    $_SESSION['refresh'] = $KDS;

          echo '<div class="top"><b>Klaida ! ! !</b></div>';

          echo '<div class="error">Padusai! Kovoti galėsi už <b>'.laikas($apie['kov']-time(), 1).'</b>.</div>';

    echo '<div class="main_c"><a href="m2.php?i=pulti&ID='.$ID.'&VS='.$VS.'&KD='.$KDS.'">Pulti vėl</a></div>';

    } else {

    echo '<div class="top"><img src="http://tools.uiwap.com/icon/art/icon.snow.png"style="float:left" ><font color="white"><b>Kovojimas</b></font></div>';

    if($gyvybes <= 0 or $mob['kg'] > $kgun){

          echo '<div class="error">Jūs pralaimėjote kovą prieš <b>'.$mob['name'].'</b>!<br/>Praradai visas gyvybęs.</div>';

          mysql_query("UPDATE zaidejai SET gyvybes='0' WHERE nick='$nick' ");

          mysql_query("UPDATE zaidejai SET pveiksmai=pveiksmai+1, vveiksmai=vveiksmai+1 WHERE nick='$nick'");

    } else {

    $KDS = rand(9999,99999);

    $_SESSION['refresh'] = $KDS;

 // SUKURTA: JEIGU NARYS VAKAR LAIMĖJO DIENOS TOPĄ, TAI ŠIANDIENA JO VEIKSMAI NESISKAIČIUOJA IR NEDALYVAUJA TOP'E!

 // YRA PARAŠOMA IF FUNKCIJA! IF($NUST('dtop_nick' == $nick) ..

 if ($nust['dtop_nick'] !== $nick) {

    if(mysql_num_rows(mysql_query("SELECT * FROM dtop WHERE nick='$nick'")) > 0) mysql_query("UPDATE dtop SET vksm=vksm+1 WHERE nick='$nick'"); else mysql_query("INSERT INTO dtop SET vksm='1', nick='$nick'");

 }

    mysql_query("UPDATE zaidejai SET veiksmai=veiksmai+1, vveiksmai=vveiksmai+1 WHERE nick='$nick'");

 lvl_k();

//$vakar_laimejo=mysql_fetch_array(mysql_query("SELECT * FROM `top_laimetojai` ORDER BY `ID` DESC LIMIT 1"));

//if(strtolower($nick) == strtolower($vakar_laimejo[nick])){}else{



    //if(mysql_num_rows(mysql_query("SELECT * FROM dtop WHERE nick='$nick'")) > 0) {mysql_query("UPDATE dtop SET vksm=vksm+1 WHERE nick='$nick'");} else{ mysql_query("INSERT INTO dtop SET vksm='1', nick='$nick'");}

//} Uždarytas vakar laimėjo if'as (nereikalingas)

  //mysql_query("UPDATE zaidejai SET veiksmai=veiksmai+1, jega=jega+'$jegaaa', gynyba=gynyba+'$ginybaaa, vveiksmai=vveiksmai+1 WHERE nick='$nick'");

   

    //* EVENTAS

    if($apie['majin']-time() > 0){

        $pin = $mob['pin']*1.20;

        $drop_xp = $mob['exp']*1.15;

        $xxs = "+";

    }

    if(isset($xx2)){

        $pin = $mob['pin']*2;

        $drop_xp = $mob['exp']*2;

        $xxs2 = "+";

    }

    if($xxs != '+'){

        $pin = $mob['pin'];

        $drop_xp = $mob['exp'];

    }

    ///

if ($nust['day'] == 2) { $drop_xp = $drop_xp * 2; }

if ($nust['day'] == 3) { $pin = $pin * 2; }



$timt = time();

if($apie[vip]>$timt){

$pin = $pin * 2;

$drop_xp = $drop_xp * 2;

}





if(empty($mob[foto])){}else{$foto="<img src='$mob[foto]' alt='Kovotojo paveiksliukas'/><br/>";}

echo '<div class="main_c">';

    if($apie[paveiksliukai]=="0"){ echo" ".$foto."";}



$pliusai = rand(1,2);

    $pin = $pin/3;

if($bonusaskj !="" AND $kgun > 100000000){
  $jegaaa = round($bonusaskj);
  $ginybaaa = round($bonusaskj);
}
else{
$jegaaa = rand(1,100);
$ginybaaa = rand(1,100);
}

 echo 'Jūs laimėjote kovą prieš <b>'.$mob['name'].'</b>! Įgavai <b>'.$jegaaa.'</b> Jėgos ir <b>'.$ginybaaa.'</b> Ginybos!</div>

    <div class="main_l">

    '.$ico.' Jūsų Kovine galia: <b>'.sk($kgun).'</b><br/>

    '.$ico.' '.$mob['name'].' Kovine galia: <b>'.sk($mob['kg']).'</b><br/>

    </div>

 

 ';

 if ($nust['day'] == 2) { echo "<div class='main_l'>

 <font color='red'><b>EXP Diena!</b></font>

 </div>"; }

 if ($nust['day'] == 3) { echo "<div class='main_l'>

 <font color='red'><b>Pinigų Diena!</b></font>

 </div>"; }
$proc = ($apie['exp']/$apie['expl'])*100;
 echo '

 

    <div class="main_l">

    '.$ico.' Gavai <b>'.sk($drop_xp).'</b> EXP, Turi '.sk($apie['exp']).'/'.sk($apie['expl']).' EXP. (<b>'.round($proc).'</b>%)<br/>

    '.$ico.' Gavai <b>'.sk($pin).'</b> Zen\'ų, Turi '.sk($litai).' Zen\'ų.<br/>';

    dropas();



 echo'<br/> '.$ico.' <a href="inv.php">Inventorius</a>';

    echo '</div>';


    echo '<div class="main_c"><a href="m2.php?i=pulti&ID='.$ID.'&VS='.$VS.'&KD='.$KDS.'">Pulti vėl</a></div>';

    mysql_query("UPDATE zaidejai SET exp=exp+'$drop_xp', litai=litai+'$pin', jega=jega+'$jegaaa' WHERE nick='$nick'");

 //mysql_query("UPDATE zaidejai SET exp=exp+'$drop_xp', litai=litai+'$pin' WHERE nick='$nick'");

     if ($apie['pad_time'] > time()) {

 $pad = 1;

 }

 $kob = time()+$pad;

 mysql_query("UPDATE zaidejai SET kov='$kob' WHERE nick='$nick'");

    if($auto == "+"){

 if ($apie['auto_time'] > time()) {

 $autov = 1;

 }

    echo '<meta http-equiv="refresh" content="'.$autov.'; url=m2.php?i=pulti&ID='.$ID.'&VS='.$VS.'&KD='.$KDS.'">';

    }

    

    $fusn = mysql_fetch_assoc(mysql_query("SELECT * FROM susijungimas WHERE nick='$nick'"));

    $fusn_k2 = mysql_fetch_assoc(mysql_query("SELECT * FROM susijungimas WHERE nick='$fusn[kitas_zaidejas]'"));

    if(!empty($fusn['kitas_zaidejas'])){ 

        $kiek_exp = $pin*2/100; //2 procentai EXP

        mysql_query("UPDATE zaidejai SET exp=exp+'$kiek_exp' WHERE nick='$fusn[kitas_zaidejas]'");

        mysql_query("UPDATE susijungimas SET uzdirbo_exp=uzdirbo_exp+'$kiek_exp' WHERE nick='$nick'");

    }

    }

    }

    }

    }

    }



 if($apie['mini_chat_kovose'] == '1'){

 echo '<div class="main_l">'.$ico.' <b>Mini Čhatas</b>:</div>';



   

  $zaidejai = mysql_fetch_assoc(mysql_query("SELECT * FROM `zaidejai` WHERE `nick` = '$nick'"));





    $visi = mysql_result(mysql_query("SELECT COUNT(*) FROM pokalbiai"),0);

    if($visi > 0){

       

  $q = mysql_query("SELECT * FROM pokalbiai ORDER BY id DESC LIMIT 10");

        echo '<div class="main_l">';

        while($rr = mysql_fetch_assoc($q)){

   $nr++;

   echo '<b>'.$nr.'</b>. <a href="game.php?i=apie&wh='.$rr['nick'].'"><b>'.statusas($rr['nick']).'</b></a> - '.smile($rr['sms']).' (<small>'.date("Y-m-d H:i:s", $rr['data']).'</small>)';

   if($rr['nick'] != $nick && $rr['nick']  != '@Sistema') echo ' <a href="game.php?i=&wh='.$rr['nick'].'#"><small>[A]</small></a><br />'; else echo '<br />';

      

     }

        unset($nr);

        echo '</div>';

  }

    }



    echo '<div class="acept"> <b><font color="white"> Navigacija</b></font> </div>';


   echo '<div class="main_c"><div align="left"><a href="Singeru%20Village.php">< Singeru Village < </a><br/><a href="Singeru%20Village.php"> *Teleport to Singeru Village*</a></div></div>';
echo '<div class="acept"> <b> <a href="mano_m.php">Meniu [+]</b> </div>';

}

elseif($id == "grigas"){

 online('Robotas Grigas');

 $count= mysql_num_rows(mysql_query("SELECT * FROM inventorius WHERE nick='$nick' AND daiktas='7' AND tipas='3'"));

 if ($apie['grigas'] == "+") {

  echo '<div class="top">Klaida!</div>';

  echo '<div class="error">Roboto Grigo misiją jūs esate įvykdęs!</div>';   

 } else if ($count > 300) {

  echo '<div class="top"><b>Robotas Grigas</b></div>';

  echo '<div class="main_c">Tu įvykdei paslaptingąją misiją !</div>';

  echo '<div class="main_l"><b>Robotas Grigas</b> tau dovanoja: <b>10 eurų ir 25 kreditus!</b></div>';

  mysql_query("UPDATE zaidejai SET sms_litai=sms_litai+'10', kred=kred+'25', grigas='+' WHERE nick='$nick'");

  mysql_query("DELETE FROM inventorius WHERE nick='$nick' && daiktas='7' && tipas='3' LIMIT 300"); 

 } else {

  echo '<div class="top"><img src="http://tools.uiwap.com/icon/art/icon.snow.png"style="float:left" ><font color="white"><b>Klaida !</b></font></div>';

  echo '<div class="error">Jūs neturite <b>300</b> Saiyan tail!</div>'; 

 }

    echo '<div class="acept"> <b><font color="white"> Navigacija</b></font> </div>';


   echo '<div class="main_c"><div align="left"><a href="Singeru%20Village.php">< Singeru Village < </a><br/><a href="Singeru%20Village.php"> *Teleport to Singeru Village*</a></div></div>';
echo '<div class="acept"> <b> <a href="mano_m.php">Meniu [+]</b> </div>';

}

elseif($id == "black"){

   online('Kviečią Black smoke shenron drakoną');

   $kiek_yra= mysql_num_rows(mysql_query("SELECT * FROM inventorius WHERE nick='$nick' AND daiktas='41' AND tipas='3'"));



   if( $kiek_yra > 6){

      echo '<div class="top"><img src="http://tools.uiwap.com/icon/art/icon.snow.png"style="float:left" ><font color="white"><b>Black smoke shenron</b></font></div>';

      echo '<div class="main_c"><img src="img/black.png" alt="*"></div>';

      if($id == 1){

         echo '<div class="acept">Jūsų noras išpildytas! Gavai 15 kreditų.</div>';

         mysql_query("UPDATE zaidejai SET kred=kred+'15' WHERE nick='$nick' ");

 mysql_query("DELETE FROM inventorius WHERE nick='$nick' && daiktas='29' && tipas='3' LIMIT 7");

      }

      elseif($id == 2){

         echo '<div class="acept">Jūsų noras išpildytas! Gavai '.sk(20000000).' zen\'ų.</div>';

         mysql_query("UPDATE zaidejai SET litai=litai+'20000000' WHERE nick='$nick' ");

 mysql_query("DELETE FROM inventorius WHERE nick='$nick' && daiktas='29' && tipas='3' LIMIT 7");

      }

      elseif($id == 3){

         echo '<div class="acept">Jūsų noras išpildytas! Gavai 20% savo Jėgos.</div>';

         $jeggoo = round($jega*20/100);

         mysql_query("UPDATE zaidejai SET jega=jega+'$jeggoo' WHERE nick='$nick' ");

 mysql_query("DELETE FROM inventorius WHERE nick='$nick' && daiktas='29' && tipas='3' LIMIT 7");

      }

      elseif($id == 4){

         echo '<div class="acept">Jūsų noras išpildytas! Gavai 15% savo Gynybos.</div>';

         $gynnoo = round($gynyba*15/100);

         mysql_query("UPDATE zaidejai SET gynyba=gynyba+'$gynnoo' WHERE nick='$nick' ");

 mysql_query("DELETE FROM inventorius WHERE nick='$nick' && daiktas='29' && tipas='3' LIMIT 7");

      } else {

         echo '<div class="main_c">Sveikas '.statusas($nick).'. Koki norą nori kad išpildyčiau?</div>';

         echo '<div class="main_l">

         <b>1.</b> <a href="?i=black&id=1">15 Kreditų</a><br/>

         <b>2.</b> <a href="?i=black&id=2">'.sk(20000000).' zen\'ų</a><br/>

         <b>3.</b> <a href="?i=black&id=3">20% Jėgos</a><br/>

         <b>4.</b> <a href="?i=black&id=4">15% Gynybos</a><br/>

         </div>';

      }

            

   } else {

      echo '<div class="top"><img src="http://tools.uiwap.com/icon/art/icon.snow.png"style="float:left" ><font color="white"><b>Klaida ! ! !</b></font></div>';

      echo '<div class="error">Neturi 7 Juoduju Drakono rutulių!</div>';

   }

   echo '<div class="acept"> <b><font color="white"> Navigacija</b></font> </div>';


   echo '<div class="main_c"><div align="left"><a href="Singeru%20Village.php">< Singeru Village < </a><br/><a href="Singeru%20Village.php"> *Teleport to Singeru Village*</a></div></div>';
echo '<div class="acept"> <b> <a href="mano_m.php">Meniu [+]</b> </div>';

}

else{

    echo '<div class="top"><b>Klaida ! ! !</b></div>';

    echo '<div class="error">Puslapis nerastas!</div>';

   echo '<div class="acept"> <b><font color="white"> Navigacija</b></font> </div>';


   echo '<div class="main_c"><div align="left"><a href="Singeru%20Village.php">< Singeru Village < </a><br/><a href="Singeru%20Village.php"> *Teleport to Singeru Village*</a></div></div>';
echo '<div class="acept"> <b> <a href="mano_m.php">Meniu [+]</b> </div>';
}


foot();

?>