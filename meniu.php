<?php
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

ob_start();
include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';

if($statusas == "Admin"){
    $stat = 'Administratorius';
}
elseif($statusas == "Mod"){
    $stat = '1 Lygio Moderatorius';
}
elseif($apie['auto_time'] > time()){
       $stat= 'VIP';}
elseif($statusas == "Mod2"){
    $stat = '2 Lygio Moderatorius';}
elseif($statusas == "Mod3"){
    $stat = '3 Lygio Moderatorius';}
elseif($statusas == "Mod4"){
    $stat = '4 Lygio Moderatorius';}
elseif($statusas == "vmod"){
    $stat = 'Viktorinos prižiūrėtojas';}
elseif($statusas == "Kurejas"){
    $stat = 'Kurejas';}
else{
    $stat = 'Žaidėjas';
}
head2();
baneris();

		topbar();
if($id == ""){
	
	     online('Mano Meniu');
       top("Mano menių");
     if($apie['kovuimg'] == "-"){ $kovuimg = "įjungti kovų paveiksliukus"; }else{ $kovuimg = "Išjungti kovų paveiksliukus";}
   echo '
          <div class="meniuc">
       
        	<img src="img/imgg/meniu.png"></div>
      
       <div class="meniu">

 '.$ico.' <a href="?id=topic">Asmeninis topikas</a><br />
 '.$ico.' <a href="?id=kovuimg"><b>'.$kovuimg.'</b></a><br />
    '.$ico.' <a href="?id=css">Stiliaus keitimas</a><br />
      '.$ico.' <a href="?id=pass">Slaptažodžio keitimas</a><br />
      '.$ico.' <a href="?id=atv">Lankytoju atvedimas</a><br /</div>
      
         '.$ico.' <a href="?id=search"><b>Žadėjo paieška</b></a><br />
        
        '.$ico.' <a href="?id=nustatymai">Nustatymai</a><br />


	'.$ico.' <a href="?id=greitasiskeitimas"> Greitasis meniu</a><br />
		'.$ico.' <a href="?id=log">Reputacijos logas</a><br />
		</div>
   ';
       
	

		
        
        if($statusas == "Mod" or $statusas == "Mod2" or $statusas =="Mod3" or $statusas =="Admin" or $statusas =="vmod" or $statusas == "Mod4" or $statusas == "Kurejas"){
            echo '<div class="up"> <b>1 Lygio Moderatoriaus Meniu</b></div><div class="line"></div>
            <div class="meniu">
            '.$ico.' <a href="?id=mod&co=block">Žaidėjo baninimas</a><br />
              '.$ico.' <a href="?id=mod&ka=perved_log">Pervedimų logas</a><br />
             '.$ico.' <a href="?id=mod&ka=clean_chat">Išvalyti pokalbius</a><br />
             '.$ico.' <a href="?id=mod&ka=clean_topic">Išvalyti topicą</a><br />
                '.$ico.' <a href="?id=mod&ka=ban_log">Banu logas</a><br />
'.$ico.' <a href="?id=mod&ka=mod_topic">MOD Topic Keitimas</a><br />
            </div>';
        }
if($statusas == "Mod2" or $statusas =="Mod3" or $statusas =="Admin" or $statusas == "Mod4"or $statusas == "Kurejas"){
            echo '<div class="line"></div><div class="up"> <b>2 Lygio Moderatoriaus Meniu</b></div><div class="line"></div>
            <div class="meniu">
            '.$ico.' <a href="?id=mod2&ka=bals">Kurti balsavimą</a><br /> 
          '.$ico.' <a href="?id=mod2&ka=unban">Nuimti bana</a><br />
'.$ico.' <a href="?id=mod2&ka=uztildyti">Užtildyti žaidėją</a><br />        
  '.$ico.' <a href="?id=mod2&ka=unmute">Nuimti užtildymą</a><br />        
          
            </div>';
        }



if($statusas =="Mod3" or $statusas =="Admin" or $statusas == "Mod4"or $statusas == "Kurejas"){
            echo '<div class="line"></div><div class="up"> <b>3 Lygio Moderatoriaus Meniu</b></div><div class="line"></div>
            <div class="meniu">
            '.$ico.' <a href="?id=mod3&ka=sms">PM logai</a><br /> 
       '.$ico.' <a href="?id=mod3&ka=chat">Mini chat logai</a><br /> 
           '.$ico.' <a href="?id=mod3&ka=tpc">Topic logai</a><br /> 
              '.$ico.' <a href="?id=mod3&ka=unb">Atbaninimo logai</a><br /> 
       '.$ico.' <a href="?id=mod3&ka=searchip">Paieska pagal ip</a><br /> 
      
            </div>';
        }
 if($statusas == "Mod4" or $statusas == "Admin"or $statusas == "Kurejas"){
	 echo '<div class="line"></div><div class="up"> <b>4 Lygio Moderatoriaus Meniu</b></div>
	 <div class="meniu">'.$ico.' <a href="?id=mod4&co=addban">Moderatoriaus baninimas</a>
	     </div> 
	 
	 
	 
	 
	 ';
 	
	
	
 }





        if($statusas == "Admin" or $statusas == "Kurejas"){
            echo '<div class="line"></div><div class="up"> <b>Administratoriaus Meniu</b></div><div class="line"></div>
            <div class="meniu">
        
                   '.$ico.' <a href="?id=admin&ka=moda">Suteikti privilegijas</a><br />
             '.$ico.' <a href="?id=admin&ka=admin_topic">Keisti Admin topic\'ą</a><br />
          
                  '.$ico.' <a href="?id=admin&ka=dalybos">Resursų dalybos</a><br /> 

                 '.$ico.' <a href="?id=admin&ka=dalybos2">Daigtų dalybos</a><br /> 
			
          
          
      
           
		    </div>';
        }
    if($statusas == "Kurejas" OR $apie['nick'] == 'testas1'){
            if($nust['reg'] == "-"){ $kkk = "įjungti registraciją"; }else{ $kkk = "Išjungti registracija";}
  if($nust['kovos'] == "-"){ $kkk2 = "įjungti kovų lauką"; }else{ $kkk2 = "Išjungti kovų lauką";}
  if($nust['pas'] == "-"){ $kkk3 = "įjungti pasiūlymų rašymą"; }else{ $kkk3 = "Išjungti pasiūlymų rašymą";}
if($nust['topic'] == "-"){ $kkk4 = "įjungti topic"; }else{ $kkk4 = "Išjungti topic";}
if($nust['pasiekimai'] == "-"){ $kkk5= "Įjungti pasiekimus"; }else{ $kkk5 = "Išjungti pasiekimus";}
if($nust['misijos'] == "-"){ $kkk6 = "Įjungti misijas"; }else{ $kkk6 = "Išjungti misijas";}
            echo '<div class="line"></div><div class="up"> <b>Kurejo Meniu</b></div><div class="line"></div>
            <div class="meniu">
  '.$ico.' <a href="?id=kurejas&ka=reg">'.$kkk.'</a><br />      
   
  '.$ico.' <a href="?id=kurejas&ka=kovos">'.$kkk2.'</a><br />      
  '.$ico.' <a href="?id=kurejas&ka=pas">'.$kkk3.'</a><br />
  '.$ico.' <a href="?id=kurejas&ka=topic">'.$kkk4.'</a><br />
  '.$ico.' <a href="?id=kurejas&ka=pasiekimai">'.$kkk5.'</a><br />
    '.$ico.' <a href="?id=kurejas&ka=misijos">'.$kkk6.'</a><br />    
            '.$ico.' <a href="?id=admin&ka=new">Pridėti naujieną</a><br />
                
              '.$ico.' <a href="?id=kurejas&ka=duoduv">Unikalių veikėjų suteikimas (visiems)</a><br /> 
             
                      '.$ico.' <a href="?id=kurejas&ka=veikeja">Unikalių veikėjų suteikimas (ant nick)</a><br />            
                '.$ico.' <a href="?id=kurejas&ka=atimti">Resursų atėmimas (visiems)</a><br />            
                '.$ico.' <a href="?id=kurejas&ka=admin">Admin Davimas/nuėmimas</a><br />               
     '.$ico.' <a href="?id=kurejas&ka=dalyboss">Resursų davimas (visiems)</a><br />       
           '.$ico.' <a href="?id=kurejas&ka=dalyboss2">Daigtų/resursų davimas (visiems)</a><br />       
 '.$ico.' <a href="?id=kurejas&ka=new_lok">Sukurti lokaciją</a><br />      
  '.$ico.' <a href="?id=kurejas&ka=new_mob">Kurti MOBUS</a><br />       
  '.$ico.' <a href="?id=kurejas&ka=uztildyti">Užtyldyti žaidėją</a><br />       
  '.$ico.' <a href="?id=kurejas&ka=unmute">Nuimti užtildymą</a><br />       
     '.$ico.' <a href="?id=kurejas&ka=new_pasl">Sukurti naują pasiekimą(lentelę)</a><br />    
     '.$ico.' <a href="?id=kurejas&ka=new_pasiek2">Sukurti naują pasiekimą</a><br />    
  '.$ico.' <a href="?id=kurejas&ka=clean_news">Išvalyti naujienas</a><br />       
     '.$ico.' <a href="?id=kurejas&ka=clean_pm">Valyti PM</a><br />           
               '.$ico.' <a href="?id=kurejas&ka=clean_pas">Valyti Pasiūlymus</a><br />           
          
         '.$ico.' <a href="?id=kurejas&ka=duotiv">Resursų davimas (ant nicko) </a><br />           
        '.$ico.' <a href="?id=kurejas&ka=new_misija">Kurti misiją</a><br />      
       '.$ico.' <a href="?id=kurejas&ka=new_misija2">Kurtos misijos reikalavimai</a><br />   
         '.$ico.' <a href="?id=kurejas&ka=duotidg">Daiktų davimas (ant nicko) </a><br />          
               '.$ico.' <a href="?id=kurejas&ka=atimtiv">Resursų atėmimas  (ant nicko) </a><br />      
      '.$ico.' <a href="?id=kurejas&ka=new_boss">Bosų kūrimas</a><br />            
 '.$ico.' <a href="?id=kurejas&ka=newk_boss">Komandinių Bosų kūrimas</a><br />            
'.$ico.' <a href="?id=kurejas&ka=kurejas">Žaidimo kūrėjo statuso davimas</a><br />          
 '.$ico.' <a href="?id=ip&ka=keiciuip">Savininko IP KEITIMAS</a><br />    
 '.$ico.' <a href="?id=kurejas&ka=new_kasim">Sukurti naują kasyklą(lentelę)</a><br />    
      '.$ico.' <a href="?id=kurejas&ka=new_kasim2">Sukurti naujas iškasenas</a><br />      
'.$ico.' <a href="?id=kurejas&ka=smstop">Įdėti į SMS TOP</a><br />      
'.$ico.' <a href="?id=kurejas&ka=pm_logai">PM LOGAI</a><br />      
'.$ico.' <a href="?id=kurejas&ka=monakas">Monako pasirodymas</a><br />      
		    </div>';
        }
else{
            echo '<div class="up">Privilegijos</div>';
            echo '<div class="meniuc">Neturi daugiau <b>jokių</b>  privilegijų!</div>';
        }
       $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Mano menių");
	navigacija($g_n);
    
}



/// kovu img
elseif($id == "kovuimg"){
        echo '<div class="up">Kovų Paveiksliukai ON/OFF</div>';
        if($apie['kovuimg'] == "+"){
            echo '<div class="meniuc">Išjungei kovų Paveiksliukus!</div></div>';
            mysqli_query($conn,"UPDATE zaidejai SET kovuimg='-' WHERE nick='$nick' ");
        }else{
            echo '<div class="meniuc">Įjungei kovų paveiksliukus!</div></div>';
            mysqli_query($conn,"UPDATE zaidejai SET kovuimg='+' WHERE nick='$nick' ");
        }
              $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano meniu","ON/OFF Kovų Paveiksliukai");
	navigacija($g_n);    
    }
	////
	if($id == "email"){
		top('EL. paštas');
	 echo '
        <div class="meniu">
        <form action="?id=email2" method="post"/>
        Jūsų email:<br /><textarea name="email"></textarea><br />
        <input type="submit" name="submit" value="Nustatyti"/></form>
        </div>';
	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","EL. paštas");
	navigacija($g_n);
}
elseif($id == "email2"){
	top('EL.paštas');
        online('Asmeninis topikas');
     
        if(isset($_POST['submit'])){
            $email = post($_POST['email']);
            if(empty($email)){
                echo '<div class="meniuc">Paliktas tuščias laukelis!</div>';
            }
            elseif(strlen($email) < 5){
                echo '<div class="meniuc">Email per trumpas!</div>';
        }
  elseif($apie[email] != ''){
               echo '<div class="meniuc">Jūs jau nusistatėte email!</div>';
            }
			else{
                mysqli_query($conn,"UPDATE zaidejai SET email='$email' WHERE nick='$nick'");
                echo '<div class="meniuc">Email nustatytas!</div>';
            }
        }
       
     	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","EL. paštas");
	navigacija($g_n);
    }
	
	



if($id == "topic"){
	top('Asmeninis topikas');
	 echo '<div class="meniu"> <b>Dabartinis topikas</b>: '.smile($apie[topic]).'</div>
        <div class="meniu">
        <form action="?id=topic2" method="post"/>
         Naujas topikas:<br /><textarea name="tp" rows="3"></textarea><br />
        <input type="submit" name="submit" value="Keisti -&raquo;"/></form>
        </div>';
	
	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Asmeninis topikas");
	navigacija($g_n);
}
elseif($id == "topic2"){
	top('Asmeninis topikas');
        online('Asmeninis topikas');
        if(empty($asm_topic)) $topic = 'Topic tuscias.. ;) !'; else $topic = $asm_topic;
        echo '<div class="meniuc"><b>Asmeninis Topikas</b></div>';
        if(isset($_POST['submit'])){
            $tp = post($_POST['tp']);
            if(empty($tp)){
                echo '<div class="meniu">Paliktas tuščias laukelis!</div>';
            }
            elseif(strlen($tp) < 5){
                echo '<div class="meniu">Topikas yra per trumpas!</div>';
            }else{
                mysqli_query($conn,"UPDATE zaidejai SET topic='$tp' WHERE nick='$nick'");
                echo '<div class="meniu">Topikas pakeistas!</div>';
            }
        }
       
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Asmeninis topikas");
	navigacija($g_n);
    }

elseif($id == "atv"){
	top('Lankytojų atvedimas');
        online('LAnkytoju atvedimas');
       
        echo '<div class="meniuc"> <b>Jusu lankytoju atvedimo nuoroda :</b></div>
        <div class="meniu">Už kekvieną atvestą vartotoją gaunate po 50 kreditų kai jis padarys 5000 kovų</div> 
		
		
		
        <div class="meniuc">
        
         
       <td class="cont3" align="left"><input type="text" class="ninp" value="http://vegeta.us.lt?ID='.$nick.'" size="30" onclick="select(this);"/></td><br/>
        </div>
        <div class="meniu"> Jau atvėdete : '.$apie[atvede].' </div>        ';
     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Lankytojų atvedimas");
	navigacija($g_n);
    }
elseif($id == ""){
	top('Nick trinimas');
        online('trinasi nick');
        
        echo '
        <div class="meniuc">Nick trinimas, ar tikrai trinsite ?</div> 
     
		 <div class="titlec"><a href="meniu.php?id=delete2">Taip</a></div> 
		
		';
     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php", "Mano meniu", "Nick trinimas");
	navigacija($g_n);
    }
elseif($id == ""){
		top('Nick trinimas');
	
        online('trinasi nick');
        
        echo '
        <div class="meniuc">Nick trinimas, ar tikrai tikrai tikrai trinsite ?</div> 
      
		 <div class="title"><a href="meniu.php?id=delete3">Taip</a></div> 
		
		';
        $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php", "Mano meniu", "Nick trinimas");
	navigacija($g_n);
    }
elseif($id == "delete3"){
        online('trinasi nick');
		top('Nick trinimas');
       mysqli_query($conn,"DELETE FROM zaidejai WHERE nick='$nick'");
	   mysqli_query($conn,"DELETE FROM technikos WHERE nick='$nick'");
	    mysqli_query($conn,"DELETE FROM user WHERE nick='$nick'");
		 mysqli_query($conn,"DELETE FROM medaliai WHERE nick='$nick'");
		  mysqli_query($conn,"DELETE FROM tikslas WHERE nick='$nick'");
	   mysqli_query($conn,"DELETE FROM pm WHERE what='$nick'");
	   mysqli_query($conn,"DELETE FROM inv WHERE nick='$nick'");
	    mysqli_query($conn,"DELETE FROM auros WHERE nick='$nick'");
        echo '
        <div class="meniuc">Nick istrintas</div>';
		
        $g_n[] = array("index.php?id=","Pagrindinis", "Nick trinimas");
	navigacija($g_n);
    }
elseif($id == "css2"){
        online('Stiliaus Keitimas');
       top('Stiliaus keitimas');
      
        if(isset($_POST['submit'])){
            $stil = post($_POST['stils']);
            if($stil < 1 || $stil > 2){
                echo '<div class="meniuc">Tokio stiliaus negalima naudoti!</div>';
            }else{
                mysqli_query($conn,"UPDATE zaidejai SET css='$stil' WHERE nick='$nick'");
                echo '<div class="meniuc">Stilius pakeistas!</div>';
            }
        }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Stiliaus keitimas");
	navigacija($g_n);
}
        
        elseif($id == "css"){
        	top('Stiliaus keitimas');
        	  echo '<div class="meniuc"> Pasikeisk stilių į tau patinkantį!</div>';
        	online('Stiliaus Keitimas');
        echo '<div class="meniu">
        <form action="?id=css2" method="post"/>
   
		<input type="radio" name="stils" value="1">Pilkai Mėlynas (PAGRINDINIS)</br>
		<input type="radio" name="stils" value="2">Juodai Oranžinis
        </select><br /><input type="submit" name="submit" value="Keisti"/></form>
        </div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Stliaus keitimas");
	navigacija($g_n);
    }
elseif($id == "colonjr2"){
       online('Nick spalva');
       top('Nick spalva');
        if(isset($_POST['submit'])){
            $color = post($_POST['color']);
            $color2 = post($_POST['color2']);
            if(empty($color)){
                echo '<div class="meniuc">Paliktas tuščias laukelis!</div>';
           
            }
            else{
                echo '<div class="meniuc">Pasikeitei vardo spalvą :)</div>';
                mysqli_query($conn,"UPDATE zaidejai SET  color='$color', shadow='$color2' WHERE nick='$nick'");
            }

        }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Nick spalva");
	navigacija($g_n);
}
        elseif($id == "colojjjr"){
        	top('Nick spalva');
        	online('Nick spalva');
         echo '<div class="meniuc">'.smile('Pasirink savo mėgstamą spalvą ;)').'</div>';
        echo '<div class="meniu">
        <form action="?id=color2" method="post"/>
        Pasirinkite nick spalvą:<br /><input type="color" name="color"/><br />
          Pasirinkite nick šešėlį:<br /><input type="color" name="color2"/><br />
        <input type="submit" name="submit" value="Keisti"/></form>
        </div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Nick spalva");
	navigacija($g_n);
    }
		    elseif($id == "pass"){
		    	top('Pass keitimas');
          online('Keičią slaptažodį');
         
          if(isset($_POST['submit'])){
               $passs = post($_POST['passs']);
               $passn = post($_POST['passn']);
               if(empty($passs) or empty($passn)){
                   $klaida = "Paliktas tuščias laukelis.";
               }

               if($passs != $apie['pass']){
                   $klaida = "Senas slaptažodis neteisingas.";
               }
               if(preg_match('/[^A-Za-z0-9]/', $passn)){
                   $klaida = 'Slaptažodyje negalima naudoti spec. simbolių!';
               }
               
               if(strlen($passn) < 6){
                   $klaida = 'Slaptažodis yra per trumpas. Max 6 simboliai.';
               }
            
               if(strlen($passn) > 20){
                   $klaida = 'Slaptažodis yra per ilgas. Max 20 simbolių.';
               }
               
               if($klaida != ""){
                   echo '<div class="meniuc">'.$klaida.'</div>';
               } else {
                   echo '<div class="meniuc">Slaptažodis pakeistas</div>'.$lin.'';
                   mysqli_query($conn,"UPDATE zaidejai SET pass='$passn' WHERE nick='$nick' ");
            }
       }
    echo '<div class="meniu">
    <form action="?id=pass" method="post"/>
    Senas slaptažodis:<br /><input type="text" name="passs"/><br />
    Naujas slaptažodis:<br /><input type="text" name="passn"/><br />
    <input type="submit" name="submit" value="Keisti;"/>
    </div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Pass keitimas");
	navigacija($g_n);
    }
elseif($id == "no"){
mysqli_query($conn,"UPDATE zaidejai SET meniu='0' WHERE nick='$nick' ");
?>
		<script>
			window.location="pagrindinis.php";
		</script>
	<?
}
elseif($id == "yes"){
mysqli_query($conn,"UPDATE zaidejai SET meniu='1' WHERE nick='$nick' ");
?>
		<script>
			window.location="pagrindinis.php";
		</script>
	<?
}



elseif($id == "mod"){

    if($statusas != "Mod" && $statusas != "Mod2" && $statusas != "Admin" && $statusas != "Mod3" && $statusas != "vmod" && $statusas !='Mod4'&& $statusas !='Kurejas'){

        echo '<div class="up">Klaida!</div>';
     echo '
          <div class="meniuc"> 	<img src="img/bicons/mod.jpg"></div>';
        echo '<div class="meniuc"><font color="red"><b>Tu neturi 1 lygio moderatorius</b>!</font></div>';
           $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php?id=","Mano meniu","Klaida!");
	navigacija($g_n);
   }
        
    else{
    
    online('Mod CP');
    if($ka == "perved_log"){
    		top('Pervedimų logas');
            echo '<div class="meniu">';
        $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM perved_log"))[0];
        if($viso > 0){
                $rezultatu_rodymas=10;
                $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
                if (empty($psl) or $psl < 0) $psl = 1;
                if ($psl > $total) $psl = $total;
                $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
                 $q = mysqli_query($conn,"SELECT * FROM perved_log ORDER BY id DESC LIMIT $nuo_kiek, $rezultatu_rodymas");
                 $puslapiu = ceil($viso/$rezultatu_rodymas);
                 while($row = mysqli_fetch_assoc($q)){
                    
                     echo ' '.smile($row['txt']).'<br/>
                   ';
                     unset($row);
                  
                 }
				    echo '</div>';
                 echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=mod&ka=perved_log').'</div>';
                 echo '<div class="meniuc">Viso pervedimų - <b>'.kiek('perved_log').'</b></div>';
            }else{
                 echo '<div class="meniuc"><font color="red">Pervedimų log\'as tuščias!</font></div>';
            }
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Pervedimų logas");
	navigacija($g_n);
        }
if($ka == 'searchip3'){
	top('Paieška pagal ip');
$ip = post($_GET[ip]);
	echo"<div class='meniu'>";
	 $viso = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE ip LIKE '%".$ip."%'")) or die(mysqli_error());
   if($viso > 0){
    $rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
     
     $puslapiu = ceil($viso/$rezultatu_rodymas);}
   $uzklausa = mysqli_query($conn,"SELECT * FROM zaidejai WHERE ip LIKE '%$ip%' ORDER BY replace(ip,',','.')+0 ASC LIMIT $nuo_kiek,$rezultatu_rodymas");
        while($row = mysqli_fetch_array($uzklausa))
            {
			
			$ar_ban=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM block WHERE nick='".$row['nick']."'"));
                $i++;
                $xa = $i + $skaiciuojama;
				$use=$row["nick"];
				$usex = $row[ip];
				$usex = str_replace("$ip", "<font color = 'red'>$ip</font>", $usex);
				if($ar_ban == 1){
				echo "$xa.<a href=\"pagrindinis.php?id=apie&ka=".$row["nick"]."\">$use -> ".$usex."</a> [<font color='green'>Nick Užbanintas!</font>]<br/>";
				}
				else{
                echo "$xa.<a href=\"pagrindinis.php?id=apie&ka=".$row["nick"]."\">$use -> ".$usex."</a><br/>";
				}
            }
			echo"</div>";
			  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Paieška pagal ip");
	navigacija($g_n);    
}
 if($ka == "ban_log"){
 	top('Banų logai');
            echo '<div class="meniu">';
     $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM ban_logai"))[0];

     if($viso > 0){
                $rezultatu_rodymas=10;
                $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
                if (empty($psl) or $psl < 0) $psl = 1;
                if ($psl > $total) $psl = $total;
                $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
                 $q = mysqli_query($conn,"SELECT * FROM ban_logai ORDER BY id DESC LIMIT $nuo_kiek, $rezultatu_rodymas");
                 $puslapiu = ceil($viso/$rezultatu_rodymas);
                 while($row = mysqli_fetch_assoc($q)){
                   
             echo'      <b>'.statusas($row['kas_ban']).'</b> uzbanino <b>'.$row['nick'].'</b> del <b>'.$row['uz'].'</br>';  
                   
                     unset($row);
                    
                 }
              echo '</div>';    echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=mod&ka=ban_log').'</div>';
                
            }else{
                 echo '<div class="meniuc"><font color="red">Ban log\'as tuščias!</font></div>';
            }
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Ban logas");
	navigacija($g_n);
        }
     elseif($co == "block2"){
     	top('Žaidėjo baninimas');
     	$laikas=post($_POST['laikas']);
     	
     	
            if(!empty($wh)) $ats = $wh; else $ats = '';
           
            if(isset($_POST['submit'])){
                $b_nick = post($_POST['nick']); $b_p = post($_POST['przt']); $b_laikas = post($_POST['laikas']);
                $blokas = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick = '$b_nick'"));
				

				if(empty($b_nick) OR empty($b_p) OR empty($b_laikas)){
                    echo '<div class="meniuc">Paliktas tuščias laukelis!</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Klaida!");
	navigacija($g_n);
                }
                elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$b_nick'")) == 0){
                    echo '<div class="meniuc">Tokio žaidėjo nėra!</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Klaida!");
	navigacija($g_n);
                }
                elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM block WHERE nick='$b_nick'")) > 0){
                    echo '<div class="meniuc">Šis žaidėjas jau užblokuotas!</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Klaida!");
	navigacija($g_n);
                }
				 		elseif($b_nick == 'testas1' or $b_nick == 'frankunderwood'){
                    echo '<div class="meniuc"><b>testas1</b> baninti negalima!</div>';
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Klaida!");
	navigacija($g_n);  
 $ti = time()+600;
	    mysqli_query($conn,"INSERT INTO block SET nick = '$nick', uz='Ka darai?!', kas_ban='SISTEMA', time='$ti'");
        }
      elseif($b_nick == 'testas1' or $b_nick == 'frankunderwood'){
                    echo '<div class="meniuc"><b>testas1</b> baninti negalima!</div>';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Klaida!");
	navigacija($g_n);    
 $ti = time()+20;
	    mysqli_query($conn,"INSERT INTO block SET nick = '$nick', uz='Ka darai?!', kas_ban='SISTEMA', time='$ti'");
        }      
elseif($b_nick == 'frankunderwood' or $b_nick == 'testas1'){
                    echo '<div class="meniuc"><b>testas1</b> baninti negalima!</div>';
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Klaida!");
	navigacija($g_n);  
 $ti = time()+20;
	    mysqli_query($conn,"INSERT INTO block SET nick = '$nick', uz='Ka darai?!', kas_ban='SISTEMA', time='$ti'");
        }
elseif($b_nick == 'testas1' or $b_nick == 'frankunderwood'){
                    echo '<div class="meniuc"><b>testas1</b> baninti negalima!</div>';
      		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Klaida!");
	navigacija($g_n);
 $ti = time()+20;
	    mysqli_query($conn,"INSERT INTO block SET nick = '$nick', uz='Ka darai?!', kas_ban='SISTEMA', time='$ti'");
        }

    
                elseif($b_nick == $nick){
                    echo '<div class="meniuc">Savęs užblokuoti negalima!</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Klaida!");
	navigacija($g_n);
					  }
				
            
                else{
                    $b_laikas2 = time()+60*$b_laikas;
						mysqli_query($conn,"INSERT INTO ban_logai SET nick='$b_nick', uz='$b_p', time='$b_laikas2', kas_ban='$nick'")or die(mysqli_error);
                    mysqli_query($conn,"INSERT INTO block SET nick='$b_nick', uz='$b_p', time='$b_laikas2', kas_ban='$nick'");
                    mysqli_query($conn,"UPDATE user SET gavoban=gavoban + '1' WHERE nick='$b_nick'");
                    echo '<div class="meniuc">Žaidėjas užblokuotas!</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Atlikta!");
	navigacija($g_n);
                }
            }}
if($co == 'block'){
	$uz = isset($_GET[uz]) ?  post($_GET[uz]) : null;
		$ti = isset($_GET[ti]) ?  post($_GET[ti]) : null;
	top('Žaidėjo baninimas');
         echo ' <div class="meniu""><a href="?id=mod&co=block&uz=Už reklamą, nuorodas&ti=99999">Už reklamą, nuorodas - 99999 minučių.</a></div>


<div class="meniu""><a href="?id=mod&co=block&uz=Turėjimas daugiau nei 1 nicka&ti=99999 ">Turėjimas daugiau nei 1 nicka: - 99999 minučių.</a></div>


<div class="meniu"">Už kreditų, pinigų arba nick pardavinėjimą/pirkimą už tikrus pinigus - 90000 minučių. <br/></div>


<div class="meniu"">Už reketavimus - 3000 minučių. <br/></div>


<div class="meniu"">Už siūlymą pakelti lygį, prašymą žymos adreso ar kitokį prašinėjimą su tikslu į jūsų vartotojo įėjimą - 3000 minučių. <br/></div>


<div class="meniu"">Už sms siuntimą/prašymą siųsti į kita žaidimą arba sms pervedimą į sąskaitą nesusijusią su šiuo žaidimu - 3000 minučių. <br/></div>
 
 



<div class="meniu"">Už bet kokį varymą ant žaidimo, jo reputacijos teršimą. Taip pat apie kūrėją. - 500 minučių. <br/></div>

<div class="meniu"">Už aukštesnio rango žaidėjo negerbimą, varymą - 120 minučių. </br></div>

<div class="meniu"">Už vartotojų įžeidinėjimą - 60 minučių.<br/>

 </div>

';

            echo '<div class="meniu">
            <form action="?id=mod&co=block2" method="post"/>
           Žaidėjo vardas:<br /><input type="text" value="'.$ats.'" name="nick"/><br />
           Už ką blokuojat:<br />
            <input type="text" name="przt" value="'.$uz.'"/><br />
            Kiek laiko <small>(minutėmis)</small>:<br />
            <input type="number" size="7" name="laikas" value="'.$ti.'"/><br />
            <input type="submit" name="submit" value="Blokuoti"/>
            </div>';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Žaidėjo baninimas");
	navigacija($g_n);
        }
elseif($ka == "mod_topic"){
      top('MOD topic')  ;
        if(isset($_POST['submit'])){
        $zinute = post($_POST['zinute']);
            if(empty($zinute)){
                echo '<div class="meniuc">Palikai tuščią laukelį.</div>';
            }else{
                mysqli_query($conn,"UPDATE nustatymai SET mod_topic='$zinute', mod_kas='$nick', mod_time='".time()."' ");
                echo '<div class="meniuc">Mod Topic\'as sėkmingai pakeistas!</div>';
        }
        }
        echo '<div class="meniu">
        <form action="?id=mod&ka=mod_topic" method="post"/>
        Topic\'as:<br /><textarea name="zinute" rows="3"></textarea><br />
        <input type="submit" name="submit" value="Keisti"/></form>
        </div>';
		  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Mod topic");
	navigacija($g_n);    
        }



        elseif($ka == "clean_chat"){
          top('Mini chat išvalymas');
            echo '<div class="meniuc">Ar tikrai norite išvalyti pokalbius?<br/><a href="?id=mod&ka=clean_chat2">Taip</a> | <a href="?id=">Ne</a></div>';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Mini chat išvalymas");
	navigacija($g_n);
        }
        elseif($ka == "clean_chat2"){
         top('Mini chat išvalymas');
            mysqli_query($conn,"DELETE FROM pokalbiai");
            mysqli_query($conn,"INSERT INTO pokalbiai SET nick='$nick', sms='išvalė pokalbius.',  data='".time()."' ");
            echo '<div class="meniuc">Pokalbiai išvalyti!</div>';
				 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Mini chat išvalymas");
	navigacija($g_n);
        }
        elseif($ka == "clean_topic"){
           top('Topic išvalymas');
            echo '<div class="meniuc">Ar tikrai norite išvalyti topic\'ą?<br/><a href="?id=mod&ka=clean_topic2">Taip</a> | <a href="?id=">Ne</a></div>';
				 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Topic išvalymas");
	navigacija($g_n);
        }
        elseif($ka == "clean_topic2"){
          top('Topic išvalymas');
            mysqli_query($conn,"DELETE FROM topic");
            mysqli_query($conn,"INSERT INTO topic SET message='išvalė topiką.', kas='$nick', time='".time()."' ");
            echo '<div class="meniuc">Topic\'as išvalytas!</div>';
				 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Topic išvalymas");
	navigacija($g_n);
        }
          elseif($ka == "ft_tikrinimas"){
          top('Nuotraukos patvirtinimas');
			  if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM foto WHERE ar_patvirtinta='ne'")) > 0){
        $query = mysqli_query($conn,"SELECT * FROM foto WHERE ar_patvirtinta='ne'");
				  echo'<div class="meniu">';
		while($row = mysqli_fetch_assoc($query)){
			$aa++;
			echo' '.$aa.' <a href="?id=mod&ka=ft_tikrinimas2&ft_id='.$row[id].'">Nauja '.$row[nick].' nuotrauka</a><br />';
			
			
			
		}
			echo'</div>'  ;
			  }
			  else{
			  	
				header("location:pagrindinis.php");
			  }
				 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Nuotraukos patvirtinimas");
	navigacija($g_n);
        }    
     elseif($ka == "ft_tikrinimas2"){
     	$foto_inf = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM foto WHERE id='$ft_id'"));
          top('Nuotraukos patvirtinimas');
			  if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM foto WHERE ar_patvirtinta='ne' AND id='$ft_id'")) == true){
		$dydis = getimagesize('foto/'.$foto_inf[pavadinimas].'');
		$aukstis = $dydis[1];
		$plotis = $dydis[0];
		if($aukstis > 128){$h = '128';}else{$h=$aukstis;}
		if($plotis > 128){$w = '128';}else{$w = $plotis;}

		echo'<div class="meniuc">
		<img src="view.php?foto='.$foto_inf[pavadinimas].'&x='.$w.'&y='.$h.'"><br />';
		
	echo'		<a href="foto/'.$foto_inf[pavadinimas].'">Rodyti pilnu dydžiu</a>
		</div>'  ;
		
		   echo '<div class="meniu">
        <form action="?id=mod&ka=ft_tikrinimas3&ft_id='.$ft_id.'" method="post"/>
        Komentaras(būtinas atmetant)<br /><input type="text" name="kom"><br />
        Nuotrauka<br/><select name="kaa">
        <option value="taip">Praleidžiama</option>
        <option value="ne">Nepraleidžiama</option>
        </select><br/>
        <input type="submit" name="submit" value="OK"></form>
        </div>';
			  }
			  else{
			  	
				header("location:pagrindinis.php");
			  }
				 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Nuotraukos patvirtinimas");
	navigacija($g_n);
        }    
     elseif($ka == "ft_tikrinimas3"){
     	$leid = post($_POST[kaa]);
		$kom=  post($_POST[kom]);
     	$foto_inf = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM foto WHERE id='$ft_id'"));
          top('Nuotraukos patvirtinimas');
			  if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM foto WHERE ar_patvirtinta='ne' AND id='$ft_id'")) == true){
		
		if($leid == 'taip'){
				echo'<div class="meniuc">Nuotrauka praleista</div>';
			mysqli_query($conn,"UPDATE foto SET ar_patvirtinta='taip' WHERE id='$ft_id'");
			mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Tavo nuotrauka priimta, priimė $nick', gavejas='$foto_inf[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
		}
elseif($leid =='ne'){
	if(empty($kom)){echo'<div class="meniuc">Komentaras būtinas</div>';}
	else{
	echo'<div class="meniuc">Nuotrauka atmesta</div>';
	mysqli_query($conn,"DELETE FROM foto WHERE id='$ft_id'");
 mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Tavo nuotrauka atmesta, atmetė $nick ($kom)', gavejas='$foto_inf[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
}
		
			  }}
			  else{
			  	
				header("location:pagrindinis.php");
			  }
				 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Nuotraukos patvirtinimas");
	navigacija($g_n);
        }    
}




}
    elseif($id == "mod2"){
   if($statusas != "Mod2" && $statusas != "Mod3" && $statusas != "Admin" && $statusas != "Mod4"&& $statusas != "Kurejas"){
    echo '<div class="up">Klaida!</div>';
          echo '
          <div class="meniuc"> 	<img src="img/bicons/mod.jpg"></div>';
        echo '<div class="meniuc"><font color="red"><b>Tu neturi 2 lygio moderatorius</b>!</font></div>';
           $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php?id=","Mano meniu","Klaida!");
	navigacija($g_n);
   
    }else{
	online('Mod CP');
if($ka == "bals"){
          top('Balsavimo kurimas');
            if(isset($_POST['submit'])){
                $kl = post($_POST['klsm']); $ats = post($_POST['ats1']); $ats2 = post($_POST['ats2']); $ats3 = post($_POST['ats3']);
                if(empty($kl) OR empty($ats) OR empty($ats2) OR empty($ats3)){
                    echo '<div class="meniuc">Paliktas tuščias laukelis!</div>';
               
                }
                else{
                    echo '<div class="meniuc">Balsavimas sukurtas!</div>';
                    mysqli_query($conn,"UPDATE bals SET klausimas='$kl', autorius='$nick', ats='$ats', ats2='$ats2', ats3='$ats3', kada='".time()."' WHERE id='1'");
               mysqli_query($conn,"TRUNCATE b_rez");
			    mysqli_query($conn,"TRUNCATE b_komentarai");
			    }
            }
            echo '<div class="meniu">
            <form action="?id=mod2&ka=bals" method="post"/>
             Klausimas:<br />
            <input type="text" name="klsm" size="20"/></div><div class="meniu">
             1 atsakymas:<br /><input type="text" name="ats1" size="8"/><br />
             2 atsakymas:<br /><input type="text" name="ats2" size="8"/><br />
             3 atsakymas:<br /><input type="text" name="ats3" size="8"/><br />
            <input type="submit" name="submit" value="Kurti"/></form>
            </div>';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Balsavimo kurimas");
	navigacija($g_n);
        }
elseif($ka == "uztildyti"){
	$laikas=post($_POST['laikas']);
            if(!empty($wh)) $ats = $wh; else $ats = '';
            echo '<div class="up">Žaidėjo užtildymas</b></div>';
            if(isset($_POST['submit'])){
                $b_nick = post($_POST['nick']); $b_p = post($_POST['przt']); $b_laikas = post($_POST['laikas']);
                if(empty($b_nick) OR empty($b_p) OR empty($b_laikas)){
                    echo '<div class="meniuc"><div class="error">Paliktas tuščias laukelis!</div></div>';
                }
                elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$b_nick'")) == 0){
                    echo '<div class="meniuc"><div class="error">Tokio žaidėjo nėra!</div></div>';
                }
                elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM block1 WHERE nick='$b_nick'")) > 0){
                    echo '<div class="meniuc"><div class="error">Šis žaidėjas jau užtildytas!</div></div>';
                }
                elseif($b_nick == $nick){
                    echo '<div class="meniuc">Savęs užtildyti negalima!</div>';
                }
                       else{
                    $b_laikas2 = time()+60*$b_laikas;
										
									
                    mysqli_query($conn,"INSERT INTO block1 SET nick='$b_nick', uz='$b_p', time='$b_laikas2', kas_ban='$nick'");
                    echo '<div class="meniuc"><div class="meniuc">Žaidėjas užtildytas!</div></div>';
                }
            }
        
            echo '<div class="meniu">
            <form action="?id=mod2&ka=uztildyti" method="post"/>
            Žaidėjo vardas:<br />
            <input type="text" value="'.$ats.'" name="nick"/><br />
            Už ką užtildot:<br />
            <input type="text" name="przt"/><br />
            Kiek laiko <small>(minutėmis)</small>:<br />
            <input type="number" size="7" name="laikas"/><br />
            <input type="submit" name="submit" class="submit" value="Tildyti"/>
            </div>';
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Užtildymas");
	navigacija($g_n);    
        }



elseif( $ka == "unban" ){
	top('Atbaninimas');
	echo'<div class="meniu">';

$un = mysqli_query($conn,"SELECT * FROM block ORDER by id");

while($unban = mysqli_fetch_assoc($un)){

	

echo''.$ico.' <b>'.$unban['nick'].'</b>('.$unban['uz'].') [<a href="?id=mod2&ka=unban2&nr='.$unban['id'].'">Atbaninti</a>]<br>';

	
}
echo'</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Atbaninimas");
	navigacija($g_n);
}

elseif($ka == "unmute"){
        echo '<div class="up">Žaidėjo atitildymas</div>';
		 $kam = post($_GET['kam']);
        if(empty($kam)){}else{
      
            if(empty($kam)){
                echo '<div class="meniuc"><div class="error">Palikote tuščią laukelį.</div></div>';
            }
            elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM block1 WHERE nick='$kam'")) == 0){
                echo '<div class="meniuc"><div class="error">Toks žaidėjas neegzistuoja!</div></div>';
            }
elseif($kam == 'testas1' ){
                    echo '<div class="meniuc">Savęs atitildyti negali!</div>';}
            else{
              mysqli_query($conn,"DELETE FROM block1 WHERE nick='$kam'");
			  echo '<div class="meniuc"><div class="error">'.$kam.' žaidėjas atitildytas!</div></div>';
            }
        }
    $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM block1"))[0];

    if($viso > 0){
                $rezultatu_rodymas=10;
                $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
                if (empty($psl) or $psl < 0) $psl = 1;
                if ($psl > $total) $psl = $total;
                $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
                 $q = mysqli_query($conn,"SELECT * FROM block1 ORDER BY id DESC LIMIT $nuo_kiek, $rezultatu_rodymas");
                 $puslapiu = ceil($viso/$rezultatu_rodymas);
                 while($row = mysqli_fetch_assoc($q)){
                     echo '<div class="meniu">';
                     echo ''.$ico.' Atitildyti: <a href="?id=mod2&ka=unmute&kam='.$row['nick'].'">'.statusas($row['nick']).'</a>';
                     unset($row);

                     echo '</div>';
                 }
                 echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=mod2&ka=unmute').'</div>';
        }
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Atitildymas");
	navigacija($g_n);    
  }

elseif( $ka == "unban2" ){
	top('Atbaninimas');
	$nr = abs((int)$_GET['nr']);
	$tpc = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM block WHERE id='$nr'"));

echo'<div class="meniuc"> Žaidėjas sėkmingai atbanintas.</div>';
mysqli_query($conn,"INSERT INTO logas SET nick='$nick', msg='$tpc[nick]',laikas='".time()."', tipas='unban'");
mysqli_query($conn,"DELETE FROM block WHERE id='$nr'");

  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Atbaninimas");
	navigacija($g_n);    
   
}



  

}}
	elseif($id == "mod3"){
   if($statusas != "Mod3" && $statusas != "Admin" && $statusas != "Mod4"&& $statusas != "Kurejas"){
    echo '<div class="up">Klaida!</div>';
         echo '
          <div class="meniuc"> 	<img src="img/bicons/mod.jpg"></div>';
        echo '<div class="meniuc"><font color="red"><b>Tu neturi 3 lygio moderatorius</b>!</font></div>';
           $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php?id=","Mano meniu","Klaida!");
	navigacija($g_n);
   }else{
	online('Mod CP');
	
if($ka=='searchip'){
	top('Paieška pagal ip');
	  echo '<div class="meniuc"><img src="img/search.png"></div><div class="meniuc">
            <form action="?id=mod3&ka=searchip2" method="post"/>
    Žaidėjo ip:</br>
            <input type="text" name="ip"/><br />
          
            <input type="submit" name="submit" value="Ieškoti"/>
            </div>';
        
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Paieška pagal ip");
	navigacija($g_n);    
   
	
}
elseif($ka == 'searchip2'){
	top('Paieška pagal ip');
$ip = post($_POST[ip]);
	echo"<div class='meniu'>";
	 $viso = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE ip LIKE '%".$ip."%'")) or die(mysqli_error());
   if($viso > 0){
    $rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
     
     $puslapiu = ceil($viso/$rezultatu_rodymas);}
   $uzklausa = mysqli_query($conn,"SELECT * FROM zaidejai WHERE ip LIKE '%$ip%' ORDER BY replace(ip,',','.')+0 ASC LIMIT $nuo_kiek,$rezultatu_rodymas");
        while($row = mysqli_fetch_array($uzklausa))
            {
                $i++;
                $xa = $i + $skaiciuojama;
				$use=$row["nick"];
				$usex = $row[ip];
				$usex = str_replace("$ip", "<font color = 'red'>$ip</font>", $usex);
                echo "$xa.<a href=\"pagrindinis.php?id=apie&ka=".$row["nick"]."\">$use -> ".$usex."</a><br/>";
            }
			echo"</div>";
			  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Paieška pagal ip");
	navigacija($g_n);    
}

	
	elseif($ka == 'chat'){
	top('Mini chat logas');
	
	 echo '<div class="meniu">';
        $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM logas WHERE tipas='chat'"))[0];
        if($viso > 0){
                $rezultatu_rodymas=10;
                $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
                if (empty($psl) or $psl < 0) $psl = 1;
                if ($psl > $total) $psl = $total;
                $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
                 $q = mysqli_query($conn,"SELECT * FROM logas WHERE tipas='chat' ORDER BY id DESC LIMIT $nuo_kiek, $rezultatu_rodymas");
                 $puslapiu = ceil($viso/$rezultatu_rodymas);
                 while($row = mysqli_fetch_assoc($q)){
                    $ia++;
                     echo '<b>'.$ia.'.</b> '.statusas($row[nick]).' ištrynė žinute  ('.smile($row['msg']).')<br/>';
                }
                     
                     unset($row);
                   echo'</div>';
                 echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=mod3&ka=chat').'</div>';
                   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Mini chat logai");
	navigacija($g_n);    
           
           }  ;}
	
elseif($ka == 'tpc'){
	top('TOPIC logas');
	
	 echo '<div class="meniu">';
    $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM logas WHERE tipas='topic'"))[0];
    if($viso > 0){
                $rezultatu_rodymas=10;
                $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
                if (empty($psl) or $psl < 0) $psl = 1;
                if ($psl > $total) $psl = $total;
                $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
                 $q = mysqli_query($conn,"SELECT * FROM logas WHERE tipas='topic' ORDER BY id DESC LIMIT $nuo_kiek, $rezultatu_rodymas");
                 $puslapiu = ceil($viso/$rezultatu_rodymas);
                 while($row = mysqli_fetch_assoc($q)){
                    $ia++;
                     echo '<b>'.$ia.'.</b> '.statusas($row[nick]).' ištrynė žinute  ('.smile($row['msg']).')<br/>';
                }
                     
                     unset($row);
                   echo'</div>';
                 echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=mod3&ka=tpc').'</div>';
                   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Topic logai");
	navigacija($g_n);    
           
           }  }
	elseif($ka == 'unb'){
	top('Unban logas');
	
	 echo '<div class="meniu">';
        $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM logas WHERE tipas='unban'"))[0];
        if($viso > 0){
                $rezultatu_rodymas=10;
                $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
                if (empty($psl) or $psl < 0) $psl = 1;
                if ($psl > $total) $psl = $total;
                $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
                 $q = mysqli_query($conn,"SELECT * FROM logas WHERE tipas='unban' ORDER BY id DESC LIMIT $nuo_kiek, $rezultatu_rodymas");
                 $puslapiu = ceil($viso/$rezultatu_rodymas);
                 while($row = mysqli_fetch_assoc($q)){
                    $ia++;
                     echo '<b>'.$ia.'.</b> '.statusas($row[nick]).' atbanino  ('.smile($row['msg']).')<br/>';
                
				 }
                     unset($row);
                   echo'</div>';
                 echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=mod3&ka=unb').'</div>';
                   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Unban logai");
	navigacija($g_n);    
           
           }  }
elseif($ka == "pm_logas"){
	$r = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$ID'"));
	top('PM logai');
	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$ID'")) == false){
		
		header("location:pagrindinis.php");
	}
	elseif($r[statusas] == 'Admin' or $r[statusas] == 'Mod4'or $r[statusas] == 'Kurejas'){
				
			 echo '<div class="meniuc">Administratorių pm skaityti negalima!</div>';	
		
	}
	else{

        $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM pms WHERE gavejas='$ID'"))[0];

        if($viso < 1){
   	
		 echo '<div class="meniuc">Žinučių nėra</div>';	
	
}else{
   	echo'<div class="meniu">';
    $rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
     $query = mysqli_query($conn,"SELECT * FROM pms WHERE gavejas='$ID' ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
     $puslapiu = ceil($viso/$rezultatu_rodymas);
     while($row = mysqli_fetch_assoc($query)){
     	if($row['nauj'] == 'send'){
     	 echo '<div class="send">';		
		 echo '» <a href="pagrindinis.php?id=apie&ka='.$row['what'].'"><b>'.statusas($row['what']).'</b></a> -'.$kl.' '.$row['txt'].''.$kls.' </a><br/>
   <small>&raquo; '.laikas($row['time']).'</small></div>';		
     		
     	}else{
   echo '<div class="got">';

   echo '» <a href="pagrindinis.php?id=apie&ka='.$row['what'].'"><b>'.statusas($row['what']).'</b></a> - '.$row['txt'].' [<a href="pm.php?id=read&ID='.$row['id'].'"><small>Atsakyti</small></a>]<br/>
   <small>&raquo; '.laikas($row['time']).'</small>';
   unset($row);
   echo '</div>'; 
		
		}}
	 echo'</div>';
   echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=mod3&ka=pm_logas&ID='.$ID.'').'</div>';
   }}
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pagrindinis.php?id=apie&ka=$ID", "Apie $ID", "$ID žinutės");
	navigacija($g_n);

}

        
elseif($ka == "sms"){
	top('PM logai');
           echo'
		   <div class="meniu">
		





';

    $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM pms WHERE nauj != 'send'"))[0];
    if($viso > 0){
                $rezultatu_rodymas=20;
                $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
                if (empty($psl) or $psl < 0) $psl = 1;
                if ($psl > $total) $psl = $total;
                $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
                 $v = mysqli_query($conn,"SELECT * FROM pms WHERE nauj != 'send' AND what != 'testas1' AND gavejas != 'testas1' ORDER BY id DESC LIMIT $nuo_kiek, $rezultatu_rodymas");
                 $puslapiu = ceil($viso/$rezultatu_rodymas);

$nr = 0;


while($log = mysqli_fetch_assoc($v))

{
	
	$nr++;
if($log['what']== 'testas1' or $log['gavejas'] == 'frankunderwood' && $log['what']== 'testas1' or $log['gavejas'] == 'frankunderwood'){
echo'	<b>'.$nr.'.</b> '.statusas($log['what']).' -> <b>'.$log['gavejas'].'</b>: Slapta zinute <br>';
}else{
echo'
a
<b>'.$nr.'.</b> '.statusas($log['what']).' -> <b>'.$log['gavejas'].'</b>: '.$log['txt'].' <small>&raquo; '.lai($log['time']).'</small> <br>

';

  unset($log);

}}
echo'
</div>
';
 echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=mod3&ka=sms').'</div>';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","PM logai");
	navigacija($g_n);    

        }}
     

     
	
	
	}}
elseif($id == "vik"){
   if( $statusas != "vmod" AND $nick != 'frankunderwood' && $nick !='testas1' && $statusas != "Kurejas"){
    echo '<div class="meniuc">Tau čia negalima!</div>';
    
    }else{
	online('Mod CP');
	
   if($go == "add" ){
   	top('Klausimų pridėjimas');
echo' 

 <div class="meniu">
        <form method="post" action="?id=vik&go=add2"">
          Klausimas:<br /><input type="text" name="klausimas"/><br />
          
         Atsakymas:<br /><input type="text" name="atsakymas"/><br />
          
         
        </div><div class="meniuc">
         <input type="submit" name="submit" value="Irašyti"/></form>
        </div>';
 
   
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Klausimų pridėjimas");
	navigacija($g_n);    
 
}
elseif( $go == "add2" )
{
top('Klausimų pridėjimas');

$klausimas = post($_POST['klausimas']);

$atsakymas = post($_POST['atsakymas']);

mysqli_query($conn,"INSERT INTO vikte_klsm SET klsm='$klausimas',ats='$atsakymas'") or die(mysqli_error());
mysqli_query($conn,"UPDATE vikte_cfg SET randas=randas+'1'");


echo "<div class='meniuc'>Atlikta.<br></div>";

     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Klausimų pridėjimas");
	navigacija($g_n);    
}

 
}}

   
elseif($id == "ipq"){
 if($ka == "keiciuip"){
        top('IP KEITIMAS');
     if(!empty($wh)) $ats = $wh; else $ats = '';
   if(isset($_POST['submit'])){
        
        $kaa = post($_POST['kaa']);
  $kiekis = post($_POST['kiekis']);

            if(empty($kaa) or empty($kiekis)){
                echo '<div class="meniuc">Palikai tuščią laukelį.</div>';
            }
            
            else{
                if($kaa == 1){

	     
mysqli_query($conn,"UPDATE nustatymai SET ip='$kiekis' ");





                    
                   
                    echo '<div class="meniuc">Atlikta! <b>IP</b> pakeistas į <b> '.$kiekis.'</b> !</div>';
                }
   if($kaa == 2){

	     
mysqli_query($conn,"UPDATE nustatymai SET ip2='$kiekis' ");





                    
                   
                    echo '<div class="meniuc">Atlikta! <b>IP</b> pakeistas į <b> '.$kiekis.'</b> !</div>';
                }

if($kaa == 3){

	     
mysqli_query($conn,"UPDATE nustatymai SET ip3='$kiekis' ");





                    
                   
                    echo '<div class="meniuc">Atlikta! <b>IP</b> pakeistas į <b> '.$kiekis.'</b> !</div>';
                }
}
}
echo' <div class="meniuc">Pirmas IP  <b>'.$nust['ip'].'</b><br>
Antras IP  <b>'.$nust['ip2'].'</b><br>
Trečias IP  <b>'.$nust['ip3'].'</b>
</div>';
echo '<div class="meniu">
        <form action="?id=ipq&ka=keiciuip" method="post"/>
       
        Pasirinkitę:<br/><select name="kaa">
        <option value="1">1. PRIEIGOS IP</option>
<option value="2">2. PRIEIGOS IP</option>
<option value="3">3. PRIEIGOS IP</option>
 </select><br/>
Kiek duosite <small></small>:<br />
            <input type="text" size="12" name="kiekis" value="'.$kiekis.'"/><br />
        <input type="submit" name="submit" value="Atlikti"/></form>
        </div>';
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","IP KEITIMAS");
	navigacija($g_n);    
        }

}
elseif($id == "admin"){
    if($statusas != "Admin" && $statusas !='Kurejas'){
       
        echo '<div class="up">Klaida!</div>';
 echo '
          <div class="meniuc"> 	<img src="img/bicons/noadmin.gif"></div>';
        echo '<div class="meniuc"><font color="red"><b>Tu neturi Admin Statuso</b>!</font></div>';
        
           $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php?id=","Mano meniu","Klaida!");
	navigacija($g_n);
   }else{
    online('Admin CP');
        if($ka == "new"){
          top('Naujienos rašymas');
            if(isset($_POST['submit'])){
                $pav = post($_POST['pav']);
                
                if(empty($pav) ){
                    echo '<div class="meniuc">Paliktas tuščias laukelis!</div>';
                }else{
                    $tmxs = time()+60;
                    mysqli_query($conn,"INSERT INTO news SET name='$pav', new='$new', kas='$nick', data='".time()."'");
                    mysqli_query($conn,"UPDATE nustatymai SET new_time='$tmxs' ");
mysqli_query($conn,"UPDATE nustatymai SET sndnew=sndnew+'1' ");
                    echo '<div class="meniuc">Naujiena pridėta!</div>';
					
					
					
					
					
					
					
                }
            }
            echo '<div class="meniu">
            <form action="?id=admin&ka=new" method="post"/>
             Naujienos aprašymas:<br />
             
             <textarea name="pav"></textarea><br />
              
            <input type="submit" name="submit" value="Pridėti"/>
            </div>';
			  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Naujienos rašymas");
	navigacija($g_n);    
        }
        
          
        elseif($ka == "moda"){
        top('Mod davimas');
        if(isset($_POST['submit'])){
        $kam = post($_POST['kam']);
        $kaa = post($_POST['kaa']);
            if(empty($kam) or empty($kaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį.</div>';
            }
	if($kam == 'testas1' or $kam == 'frankunderwood'){
                    echo '<div class="meniuc">testas1 keisti statusą griežtai draudžiama!</div>';}
elseif($kam == $nick){
                    echo '<div class="meniuc">Sau dėti negalima!</div>';
					  }
            elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$kam'")) == 0){
                echo '<div class="meniuc">Toks žaidėjas neegzistuoja!</div>';
            }
            else{
                if($kaa == 1){
                    mysqli_query($conn,"UPDATE zaidejai SET statusas='Mod' WHERE nick='$kam' ");
                    $txt = "$nick Davė tau moderatoriaus statusą.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' moderatoriaus statusą.</div>';
                }
                elseif($kaa == 2){
                    mysqli_query($conn,"UPDATE zaidejai SET statusas='' WHERE nick='$kam' ");
                    $txt = "$nick Nuėme tavo moderatoriaus statusą.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Nuėmei '.$kam.' moderatoriaus statusą.</div>';
                }

       if($kaa == 3){
                    mysqli_query($conn,"UPDATE zaidejai SET statusas='Mod2' WHERE nick='$kam' ");
                    $txt = "$nick Davė tau 2 lygio moderatoriaus statusą.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' 2 lygio moderatoriaus statusą.</div>';
                }
                elseif($kaa == 4){
                    mysqli_query($conn,"UPDATE zaidejai SET statusas='' WHERE nick='$kam' ");
                    $txt = "$nick Nuėme tavo 2 lygio moderatoriaus statusą.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Nuėmei '.$kam.' 2 lvlmoderatoriaus statusą.</div>';
                }
      if($kaa == 5){
                    mysqli_query($conn,"UPDATE zaidejai SET statusas='Mod3' WHERE nick='$kam' ");
                    $txt = "$nick Davė tau 3 lygio moderatoriaus statusą.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' 3 ygio moderatoriaus statusą.</div>';
                }
                elseif($kaa == 6){
                    mysqli_query($conn,"UPDATE zaidejai SET statusas='' WHERE nick='$kam' ");
                    $txt = "$nick Nuėme tavo 3 lygio moderatoriaus statusą.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Nuėmei '.$kam.' 3 lvlmoderatoriaus statusą.</div>';
                }
      if($kaa == 7){
                    mysqli_query($conn,"UPDATE zaidejai SET statusas='Mod4' WHERE nick='$kam' ");
                    $txt = "$nick Davė tau 4 lygio moderatoriaus statusą.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' 4 lygio moderatoriaus statusą.</div>';
                }
                elseif($kaa == 8){
                    mysqli_query($conn,"UPDATE zaidejai SET statusas='' WHERE nick='$kam' ");
                    $txt = "$nick Nuėme tavo 4 lygio moderatoriaus statusą.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Nuėmei '.$kam.' 4 lvlmoderatoriaus statusą.</div>';
                }
if($kaa == 9){
                    mysqli_query($conn,"UPDATE zaidejai SET statusas='vmod' WHERE nick='$kam' ");
                    $txt = "$nick Davė tau Viktorinos prižiūrėtojo statusą.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Viktorinos prižiūrėtojo statusą.</div>';
                }
                elseif($kaa == 10){
                    mysqli_query($conn,"UPDATE zaidejai SET statusas='' WHERE nick='$kam' ");
                    $txt = "$nick Nuėme tavo Viktorinos prižiūrėtojo statusą.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Nuėmei '.$kam.' Viktorinos prižiūrėtojo statusą.</div>';
                }

            }
        }
        echo '<div class="meniu">
        <form action="?id=admin&ka=moda" method="post"/>
        Kam(mod):<br /><input type="text" name="kam"><br />
        Pasirinkitę:<br/><select name="kaa">
        <option value="1">1. Duoti </option>
        <option value="2">2. Nuimti</option>
        </select><br/>
        <input type="submit" name="submit" value="Atlikti"/></form>
        </div>';
echo '<div class="meniu">
        <form action="?id=admin&ka=moda" method="post"/>
        Kam(mod2):<br /><input type="text" name="kam"><br />
        Pasirinkitę:<br/><select name="kaa">
        <option value="3">1. Duoti </option>
        <option value="4">2. Nuimti</option>
        </select><br/>
        <input type="submit" name="submit" value="Atlikti"/></form>
        </div>';
echo '<div class="meniu">
        <form action="?id=admin&ka=moda" method="post"/>
        Kam(mod3):<br /><input type="text" name="kam"><br />
        Pasirinkitę:<br/><select name="kaa">
        <option value="5">1. Duoti </option>
        <option value="6">2. Nuimti</option>
        </select><br/>
        <input type="submit" name="submit" value="Atlikti"/></form>
        </div>';
echo '<div class="meniu">
        <form action="?id=admin&ka=moda" method="post"/>
        Kam(mod4):<br /><input type="text" name="kam"><br />
        Pasirinkitę:<br/><select name="kaa">
        <option value="7">1. Duoti </option>
        <option value="8">2. Nuimti</option>
        </select><br/>
        <input type="submit" name="submit" value="Atlikti"/></form>
        </div>';

echo '<div class="meniu">
        <form action="?id=admin&ka=moda" method="post"/>
        Kam(Viktorinis priz):<br /><input type="text" name="kam"><br />
        Pasirinkitę:<br/><select name="kaa">
        <option value="9">1. Duoti </option>
        <option value="10">2. Nuimti</option>
        </select><br/>
        <input type="submit" name="submit" value="Atlikti"/></form>
        </div>';

    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Mod davimas");
	navigacija($g_n);    
        }

elseif($ka== "dalybos"){
top('Dalybos');


echo' 

 <div class="meniuc">
        <form method="post" action="?id=admin&ka=dovana2"">
          Per dalybas duos 100mln pinigų, 100 eurų!:<br />
      

        </div><div class="meniuc">
         <input type="submit" name="submit" value="Duoti"/></form>
        </div>';
 
     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Dalybos");
	navigacija($g_n);    
  
 
}
elseif( $ka == "dovana2" )
{
top('Dalybos');
$visko = abs(intval($_POST['kiek_visko']));
$jegos = abs(intval($_POST['kiek_jegos']));
$gynybos = abs(intval($_POST['kiek_gynybos']));
$pinigu = abs(intval($_POST['kiek_pinigu']));
$auksiniu = abs(intval($_POST['kiek_auksiniu']));
$auksiniu1 = abs(intval($_POST['kiek_auksiniu1']));
$kreditu = abs(intval($_POST['kiek_kreditu']));
$galios = abs(intval($_POST['kiek_galios']));
$sparnu = abs(intval($_POST['kiek_sparnu']));
$exp = abs(intval($_POST['kiek_exp']));
$tobulas = abs(intval($_POST['kiek_tobulas']));

$on=mysqli_query($conn,"SELECT * FROM online ORDER BY id");
while ($onn = mysqli_fetch_row($on))
{

	
	if($apie['dalybuap']-time() < 0){
 $timxx = time()+60*60*24;   
$zinute = "Adminas $nick padarė dalybas! Per dalybas gavai: 100,000,000 pinigų ir 100 eurų! Ačiū, kad žaidžiate, pagarbiai žaidimo Administracija!.";

mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$zinute', gavejas='$onn[1]', time='".time()."', nauj='NEW' ") or die(mysqli_error());

mysqli_query($conn,"UPDATE zaidejai SET jega=jega+'$jegos', gynyba=gynyba+'$gynybos', litai=litai+'100000000', sms_litai=sms_litai+'100', auksiniai=auksiniai+'$auksiniu1', kred=kred+'$kreditu',  exp=exp+'$exp' WHERE nick='$onn[1]'");
mysqli_query($conn,"UPDATE zaidejai SET dalybuap='$timxx' WHERE nick='$nick' ");
}


}
if($apie['dalybuap']-time() > 0){
  echo '<div class="meniuc">Kitas dalybas galėsu daryti po <b>'.laikas($apie['dalybuap']-time(), 1).'</b></div>';

}
else{
echo "<div class='meniuc'>Atlikta, dovanos išsiųstos.<br></div>";
}
     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Dalybos");
	navigacija($g_n);    
}

//// admin dav




///daigtu davimas be pm
elseif($ka== "dalybos2"){
top('Dalybos');


echo' 

 <div class="meniuc">
        <form method="post" action="?id=admin&ka=duoti2"">
          Duoti po 100 kario tobulejimo, naikimo galios, angelo sparnu!<br />
          
          
        </div><div class="meniuc">
         <input type="submit" name="submit" value="Duoti"/></form>
        </div>';
 
     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Dalybos");
	navigacija($g_n);    
  
 
}
elseif( $ka == "duoti2" )
{
top('Dalybos');

$visko = abs(intval($_POST['kiek_visko']));
$gynybos = abs(intval($_POST['kiek_gynybos']));
$pinigu = abs(intval($_POST['kiek_pinigu']));
$auksiniu = abs(intval($_POST['kiek_auksiniu']));
$auksiniu1 = abs(intval($_POST['kiek_auksiniu1']));
$kreditu = abs(intval($_POST['kiek_kreditu']));
$galios = abs(intval($_POST['kiek_galios']));
$sparnu = abs(intval($_POST['kiek_sparnu']));
$exp = abs(intval($_POST['kiek_exp']));
$tobulas = abs(intval($_POST['kiek_tobulas']));
$on=mysqli_query($conn,"SELECT * FROM online ORDER BY id");
while ($onn = mysqli_fetch_row($on))
{

	if($apie['dalybuap2']-time() < 0){
 $timxx = time()+60*60*24;   
$zinute = "Adminas $nick padarė dalybas! Per dalybas gavai: 100 kario tobulėjimo,naikinimo galios bei angelo sparnų! Ačiū, kad žaidžiate, pagarbiai žaidimo Administracija!.";

mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$zinute', gavejas='$onn[1]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
mysqli_query($conn,"UPDATE zaidejai SET jega=jega+'$jegos', gynyba=gynyba+'$gynybos', litai=litai+'$pinigu', sms_litai=sms_litai+'$auksiniu', auksiniai=auksiniai+'$auksiniu1', kred=kred+'$kreditu',  exp=exp+'$exp' WHERE nick='$onn[1]'");
mysqli_query($conn,"UPDATE inv SET naikinti=naikinti+'100', angelwing=angelwing+'100', tobulas=tobulas+'100' WHERE nick='$onn[1]'");
mysqli_query($conn,"UPDATE zaidejai SET dalybuap2='$timxx' WHERE nick='$nick' ");
}

}

if($apie['dalybuap2']-time() > 0){
  echo '<div class="meniuc">Kitus daigtus galėsi duoti po <b>'.laikas($apie['dalybuap2']-time(), 1).'</b></div>';

}
else{
echo "<div class='meniuc'>Atlikta, daigtai išsiųsti!.<br></div>";
}
     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Dalybos");
	navigacija($g_n);    
}



 
 elseif($ka == "admin_topic"){
      top('Admin tipic')  ;
        if(isset($_POST['submit'])){
        $zinute = post($_POST['zinute']);
            if(empty($zinute)){
                echo '<div class="meniuc">Palikai tuščią laukelį.</div>';
            }else{
                mysqli_query($conn,"UPDATE nustatymai SET admin_topic='$zinute', admin_kas='$nick', admin_time='".time()."' ");
                echo '<div class="meniuc">Admin Topic\'as sėkmingai pakeistas.</div>';
        }
        }
        echo '<div class="meniu">
        <form action="?id=admin&ka=admin_topic" method="post"/>
        Topic\'as:<br /><textarea name="zinute" rows="3"></textarea><br />
        <input type="submit" name="submit" value="Keisti"/></form>
        </div>';
		  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Admin topic");
	navigacija($g_n);    
        }
elseif($ka == 'sms_logai'){
	top('Sms logai');
	
	 echo '<div class="meniu">';
    $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM sms_log"))[0];
    if($viso > 0){
                $rezultatu_rodymas=10;
                $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
                if (empty($psl) or $psl < 0) $psl = 1;
                if ($psl > $total) $psl = $total;
                $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
                 $q = mysqli_query($conn,"SELECT * FROM sms_log ORDER BY id DESC LIMIT 10");
                 $puslapiu = ceil($viso/$rezultatu_rodymas);
                 while($row = mysqli_fetch_assoc($q)){
                    
                     echo ' '.smile($row['zinute']).'<br/>';
                      echo '<div class="lin"></div>';
                     
                     unset($row);
                   
                 
                   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","SMS logai");
	navigacija($g_n);    
           
           }  echo '</div>';}}
	
	



	





      
        
        else{
            echo '<div class="meniuc"><b>Klaida ! ! !</b></div>';
            echo '<div class="meniuc">Tokios <b>ADMIN</b> funkcijos nėra!</div>';
        }
     
    }

}

elseif($id == "mod4"){
    if($statusas != "Admin" && $statusas != 'Mod4'&& $statusas != 'Kurejas'){
       
        echo '<div class="up">Klaida!</div>';
          echo '
          <div class="meniuc"> 	<img src="img/bicons/mod.jpg"></div>';
        echo '<div class="meniuc"><font color="red"><b>Tu neturi 4 lygio moderatorius</b>!</font></div>';
           $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php?id=","Mano meniu","Klaida!");
	navigacija($g_n);
   }else{
    online('Mod cp');

   


	if($co == 'addban2'){
		 top('Mod baninimas');
     	$laikas=post($_POST['laikas']);
     	
     	
           
            if(isset($_POST['submit'])){
                $b_nick = post($_POST['nick']); $b_p = post($_POST['przt']); $b_laikas = post($_POST['laikas']);
                $blokas = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick = '$b_nick'"));
			if($b_nick == 'testas1' or $b_nick == 'frankunderwood'){
                    echo '<div class="meniuc">testas1 baninti negali</div>';
       $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Klaida!");
	navigacija($g_n);     
 $ti = time()+600;
	    mysqli_query($conn,"INSERT INTO block SET nick = '$nick', uz='Ka darai?!', kas_ban='SISTEMA', time='$ti'");
        }
elseif($b_nick == 'testas1' or $b_nick == 'frankunderwood'){
                    echo '<div class="meniuc"><b>testas1</b> baninti negalima!</div>';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Klaida!");
	navigacija($g_n);    
 $ti = time()+20;
	    mysqli_query($conn,"INSERT INTO block SET nick = '$nick', uz='Ka darai?!', kas_ban='SISTEMA', time='$ti'");
        }      
elseif($b_nick == 'testas1' or $b_nick == 'frankunderwood'){
                    echo '<div class="meniuc"><b>testas1</b> baninti negalima!</div>';
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Klaida!");
	navigacija($g_n);  
 $ti = time()+20;
	    mysqli_query($conn,"INSERT INTO block SET nick = '$nick', uz='Ka darai?!', kas_ban='SISTEMA', time='$ti'");
        }

				elseif(empty($b_nick) OR empty($b_p) OR empty($b_laikas)){
                    echo '<div class="meniuc">Paliktas tuščias laukelis!</div>';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Klaida!");
	navigacija($g_n);    
                }
                elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$b_nick'")) == 0){
                    echo '<div class="meniuc">Tokio žaidėjo nėra!</div>';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Klaida!");
	navigacija($g_n);    
                }
              
				
                
                elseif($b_nick == $nick){
                    echo '<div class="meniuc">Savęs užblokuoti negalima!</div>';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Klaida!");
	navigacija($g_n);    
					  }
				
            
                else{
                     $b_laikas2 = time()+60*$b_laikas;
					   if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM block WHERE nick='$b_nick'")) > 0){
					    	
							mysqli_query($conn,"UPDATE block SET uz='$b_p', time='$b_laikas2', kas_ban='$nick' WHERE nick='$b_nick'");
							  echo '<div class="meniuc">Banas pakeistas!</div>';
							
						}else{
						mysqli_query($conn,"INSERT INTO ban_logai SET nick='$b_nick', uz='$b_p', time='$b_laikas2', kas_ban='$nick'")or die(mysqli_error);
                    mysqli_query($conn,"INSERT INTO block SET nick='$b_nick', uz='$b_p', time='$b_laikas2', kas_ban='$nick'");
                    echo '<div class="meniuc">Žaidėjas užblokuotas!</div>';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Atlikta!");
	navigacija($g_n);    
                }}
            }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Mod baninimas");
	navigacija($g_n);    
}
if($co == 'addban'){
	top('Moderatoriaus baninimas');
            if(!empty($wh)) $ats = $wh; else $ats = '';
         echo ' <div class="meniu" style="text-align: left;">
Už reklamą, nuorodas: - 99999 minučių.<br/>

 </div><div class="meniu" style="text-align: left;">
 Turėjimas daugiau nei 1 nicka: - 99999 minučių.<br/>

 </div><div class="meniu" style="text-align: left;">
Už kreditų, pinigų arba nick pardavinėjimą/pirkimą už tikrus pinigus - 90000 minučių. <br/>

 </div><div class="meniu" style="text-align: left;">
Už reketavimus - 3000 minučių. <br/>

 </div><div class="meniu" style="text-align: left;">
Už siūlymą pakelti lygį, prašymą žymos adreso ar kitokį prašinėjimą su tikslu į jūsų vartotojo įėjimą - 3000 minučių. <br/>

 </div><div class="meniu" style="text-align: left;">
Už sms siuntimą/prašymą siųsti į kita žaidimą arba sms pervedimą į sąskaitą nesusijusią su šiuo žaidimu - 3000 minučių. <br/>
 
 


 </div><div class="meniu" style="text-align: left;">
Už bet kokį varymą ant žaidimo, jo reputacijos teršimą. Taip pat apie kūrėją. - 500 minučių. <br/>

 </div><div class="meniu" style="text-align: left;">
Už aukštesnio rango žaidėjo negerbimą, varymą - 120 minučių. 
</div><div class="meniu" style="text-align: left;">
Už vartotojų įžeidinėjimą - 60 minučių.<br/>

 </div>

';

            echo '<div class="meniu">
            <form action="?id=mod4&co=addban2" method="post"/>
           Žaidėjo vardas:<br /><input type="text" value="'.$ats.'" name="nick"/><br />
           Už ką blokuojat:<br />
            <input type="text" name="przt"/><br />
            Kiek laiko <small>(minutėmis)</small>:<br />
            <input type="number" size="7" name="laikas"/><br />
            <input type="submit" name="submit" value="Blokuoti"/>
            </div>';
        
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Mod baninimas");
	navigacija($g_n);    
	}}


   if($ka == "moda"){
        top('Mod nuėminas');
        if(isset($_POST['submit'])){
        $kam = post($_POST['kam']);
        $kaa = post($_POST['kaa']);
            if(empty($kam) or empty($kaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį.</div>';
            }
		if($b_nick == 'testas1' or $b_nick == 'frankunderwood'){
                    echo '<div class="meniuc">testas1 nuimti statuso negalima!</div>';
      
 $ti = time()+20;
	    mysqli_query($conn,"INSERT INTO block SET nick = '$nick', uz='Ka darai?!', kas_ban='SISTEMA', time='$ti'");
        }
            elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$kam'")) == 0){
                echo '<div class="meniuc">Toks žaidėjas neegzistuoja!</div>';
            }
            else{
                if($kaa == 1){
                    mysqli_query($conn,"UPDATE zaidejai SET statusas='Mod' WHERE nick='$kam' ");
                    $txt = "$nick Davė tau moderatoriaus statusą.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' moderatoriaus statusą.</div>';
                }
                elseif($kaa == 2){
		if($b_nick == 'frankunderwood' or $b_nick == 'testas1'){
                    echo '<div class="meniuc">testas1 baninti negali</div>';
      
 $ti = time()+20;
	    mysqli_query($conn,"INSERT INTO block SET nick = '$nick', uz='Ka darai?!', kas_ban='SISTEMA', time='$ti'");
        }
                    mysqli_query($conn,"UPDATE zaidejai SET statusas='' WHERE nick='$kam' ");
                    $txt = "$nick Nuėme tavo moderatoriaus statusą.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");

                    echo '<div class="meniuc">Atlikta! Nuėmei '.$kam.' moderatoriaus statusą.</div>';
                }
		if($b_nick == 'frankunderwood' or $b_nick == 'testas1'){
                    echo '<div class="meniuc">testas1 baninti negali</div>';
      
 $ti = time()+20;
	    mysqli_query($conn,"INSERT INTO block SET nick = '$nick', uz='Ka darai?!', kas_ban='SISTEMA', time='$ti'");
        }
            }
        }
        echo '<div class="meniu">
        <form action="?id=mod4&ka=moda" method="post"/>
        Kam:<br /><input type="text" name="kam"><br />
        Pasirinkitę:<br/><select name="kaa">
      
        <option value="2"> Nuimti</option>
        </select><br/>
        <input type="submit" name="submit" value="OK"/></form>
        </div>';
		  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Mod nuėmimas");
	navigacija($g_n);    
        }
	
	}
elseif($ka == "pm_logai"){
	top('PM logai');
           echo'
		   <div class="meniu">
		





';

    $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM pms WHERE nauj != 'send'"))[0];
    if($viso > 0){
                $rezultatu_rodymas=20;
                $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
                if (empty($psl) or $psl < 0) $psl = 1;
                if ($psl > $total) $psl = $total;
                $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
                 $v = mysqli_query($conn,"SELECT * FROM pms WHERE nauj != 'send' AND what != 'testas1' AND gavejas != 'testas1' ORDER BY id DESC LIMIT $nuo_kiek, $rezultatu_rodymas");
                 $puslapiu = ceil($viso/$rezultatu_rodymas);

$nr = 0;


while($log = mysqli_fetch_assoc($v))

{
	
	$nr++;
if($log['what']== 'testas1' or $log['gavejas'] == 'frankunderwood' ){
echo'	<b>'.$nr.'.</b> '.statusas($log['what']).' -> <b>'.$log['gavejas'].'</b>: Slapta zinute <br>';
}else{
echo'

<b>'.$nr.'.</b> '.statusas($log['what']).' -> <b>'.$log['gavejas'].'</b>: '.$log['txt'].' <small>&raquo; '.lai($log['time']).'</small> <br>

';

  unset($log);

}}
echo'
</div>
';
 echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=kurejas&ka=pm_logai').'</div>';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","PM logai");
	navigacija($g_n);    

        }}
     


if($id == "nuotaika2"){
top('Nuotaika');
$k=$_GET['k'];
$nuot= post($_POST[nuot]);
 if($nuot){
 $a = file("txt/nuotaikos.txt");
        for ($i = 0; $i < count($a); $i++)
        {
            $b = explode("|", $a[$i]);
            if ($b[0] == $nuot)
            {
                $l = "yra";
                break;
            }
      }
if($l != 'yra')
{
$kl="Nuotaika nerasta";}
if(!$kl){
mysqli_query($conn,"UPDATE zaidejai SET nuotaika='$nuot' WHERE nick='$nick'"); 
$kl="Nuotaika pakeista sekmingai!";
}
echo"<div class='meniuc'>$kl</div>"; 
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Nuotaika");
	navigacija($g_n);    
 }}
 if($id == "nuotaika"){
 	top('Nuotaika');
$st = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$nick'"));

echo " <div class='meniuc'>";
if($st[nuotaika] != ''){ echo"
Tavo nuotaika:<b>$st[nuotaika]</b><br/><img src=\"img/nuotaikos/$st[nuotaika].gif\"/><br/>";}
else{ echo"Be nuotaikos<br/>";} echo"
</div><div class='meniu'>
 <form method='post' action='?id=nuotaika2'>
<u>Pasirinkite nuotaika:</u></br>

<br/><select name=\"nuot\">
";
$slines = file("txt/nuotaikos.txt"); $smax = count($slines); $i="0"; do {$dts = explode("|", $slines[$i]);
echo "<option value=\"$dts[0]\">$dts[0]</option>\r\n"; $i++; } while($i < $smax);
echo "</select><br/>

<input type='submit' name='submit' value='Keisti'/></form>
</div>";
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Nuotaika");
	navigacija($g_n);    
}
if($id=='search'){
	top('Paieška');
	  echo '<div class="meniuc"><img src="img/search.png"></div><div class="meniuc">
            <form action="?id=search2" method="post"/>
    Žaidėjo nick:</br>
            <input type="text" name="nickas"/><br />
          
            <input type="submit" name="submit" value="Ieškoti"/>
            </div>';
        
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Paieška");
	navigacija($g_n);    
	
}
if($id == 'search2'){
	top('Paieška');
	echo"<div class='meniu'>";
$nickas = post($_POST[nickas]);
	 $viso = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick LIKE '%".$nickas."%'")) or die(mysqli_error());
   if($vičso > 0){
    $rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
     
     $puslapiu = ceil($viso/$rezultatu_rodymas);}
   $uzklausa = mysqli_query($conn,"SELECT nick FROM zaidejai WHERE nick LIKE '%$nickas%' ORDER BY replace(nick,',','.')+0 ASC LIMIT $nuo_kiek,$rezultatu_rodymas");
        while($row = mysqli_fetch_array($uzklausa))
            {
                $i++;
                $xa = $i + $skaiciuojama;
				$use=$row["nick"];
				$use = str_replace("$nickas", "<font color = 'red'>$nickas</font>", $use);
                echo "$xa.<a href=\"pagrindinis.php?id=apie&ka=".$row["nick"]."\">$use</a><br/>";
            }
			  echo '</div><div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=search2').'</div>';
			   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Paieška");
	navigacija($g_n);  
}

if($id == 'nustatymai'){
	top('Nustatymai');
	echo' <div class="meniu">
        <form action="?id=nst" method="post"/>
         Kiek žinučių rodyti minichate (5-20) :
         <input type="number" name="rod" value="'.$apie[rodymas].'"/><br />
      
      
        <form action="?id=turnonminichat" method="post"/>
        Mini chatas:<select name="kas">';
      	if($apie['minichatatas'] == 1){echo'<option value="1" selected="selected">Išmanusis</option>';}
				else{echo'<option value="1">Išmanusis</option>';}
				if($apie['minichatas'] == 0){echo'<option value="0" selected="selected">Paprastas</option>';}
				else{echo'<option value="0">Paprastas</option>';}
     echo'   </select><br/>
       
      
       
        Mini chat rodymas<br/><select name="ks">';
		 if($apie['mini_chat'] == 1){echo'<option value="1" selected="selected">Ijungtas</option>';}
				else{echo'<option value="1">Ijungtas</option>';}
				if($apie['mini_chat'] == 0){echo'<option value="0" selected="selected">Išjungtas</option>';}
				else{echo'<option value="0">Išjungtas</option>';}
				echo'
      
        </select><br/>
    
        
       
		     
     
        Pranešti apie turnyro pradžia?:<select name="trn">
           ';
          if($user[rodyti_turnyra] == 0){echo'<option value="0" selected="selected">Išjungtas</option>';}
				else{echo'<option value="0">Išjuntas</option>';}
				if($user[rodyti_turnyra] == '1'){echo'<option value="1" selected="selected">Ijungtas</option>';}
				else{echo'<option value="1">Ijungtas</option>';}
				echo'
        </select><br/>Chatas kovose<select name="kov">';
        
           if($user[chat] == 0){echo'<option value="0" selected="selected">Išjungtas</option>';}
				else{echo'<option value="0">Išjuntas</option>';}
				if($user[chat] == 1){echo'<option value="1" selected="selected">Ijungtas</option>';}
				else{echo'<option value="1">Ijungtas</option>';}
				echo'
        </select><br/>
        <input type="submit" name="submit" value="Keisti"/></form>
        </div>';
		
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php", "Mano meniu", "Nustatymai");
	navigacija($g_n);
}

if($id == 'greitasiskeitimas'){
	top('Greitasis meniu');
	echo' <div class="meniu">

      ';

				echo'   <form action="?id=greitasis2" method="post"/>
        1 meniu<select name="meniu1">';
        
           if($user[greitas] == 'Pradžia'){echo'<option text="Pradžia" selected="selected">Pradžia</option>';}
				else{echo'<option text="Pradžia">Pradžia</option>';}
				if($user[greitas] == 'Kovu zona'){echo'<option text="Kovu zona" selected="selected">Kovu zona</option>';}
				else{echo'<option text="Kovu zona">Kovu zona</option>';}

				echo'
        </select><br/>';
echo' 2 meniu<select name="meniu2">';
        
           if($user[greitas] == 'Miestas'){echo'<option text="Miestas" selected="selected">Miestas</option>';}
			else{echo'<option text="Miestas">Miestas</option>';}	
				  if($user[greitas] == 'Bosai'){echo'<option text="Bosai" selected="selected">Bosai</option>';}
			else{echo'<option text="Bosai">Bosai</option>';}	
				if($user[greitas] == 'Inventorius'){echo'<option text="Inventorius" selected="selected">Inventorius</option>';}
			else{echo'<option text="Inventorius">Inventorius</option>';}	
				if($user[greitas] == 'Apie mane'){echo'<option text="Apie mane" selected="selected">Apie mane</option>';}
			else{echo'<option text="Apie mane">Apie mane</option>';}	
				if($user[greitas] == 'Misijos'){echo'<option text="Misijos" selected="selected">Misijos</option>';}
			else{echo'<option text="Misijos">Misijos</option>';}	
				
				echo'
        </select><br/>';
echo' 3 meniu<select name="meniu3">';
        
           if($user[greitas] == 'Pasiekimai'){echo'<option text="Pasiekimai" selected="selected">Pasiekimai</option>';}
			else{echo'<option text="Pasiekimai">Pasiekimai</option>';}	
				  if($user[greitas] == 'Meniu'){echo'<option text="Meniu" selected="selected">Meniu</option>';}
			else{echo'<option text="Meniu">Meniu</option>';}	
				if($user[greitas] == 'Mano skill'){echo'<option text="Mano skill" selected="selected">Mano skill</option>';}
			else{echo'<option text="Mano skill">Mano skill</option>';}	
				if($user[greitas] == 'PM dezute'){echo'<option text="PM dezute" selected="selected">PM dezute</option>';}
			else{echo'<option text="PM dezute">PM dezute</option>';}	
				if($user[greitas] == 'Eurai'){echo'<option text="Eurai" selected="selected">Eurai</option>';}
			else{echo'<option text="Eurai">Eurai</option>';}	
				
				echo'
        </select><br/>


        <input type="submit" name="submit" value="Keisti"/></form>
        </div>';
		
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php", "Mano meniu", "Greitasis meniu");
	navigacija($g_n);
}
if($id =='greitasis2'){
				  $rod = isset($_POST['rod']) ? preg_replace("/[^0-9_]/","",$_POST['rod'])  : null;
				  $meniu1= post($_POST['meniu1']);	
				$meniu2= post($_POST['meniu2']);	
$meniu3= post($_POST['meniu3']);	
	  mysqli_query($conn,"UPDATE user SET greitas='$meniu1' WHERE nick='$nick'")or die(mysqli_error());			
	  mysqli_query($conn,"UPDATE user SET greitas2='$meniu2' WHERE nick='$nick'")or die(mysqli_error());		
	  mysqli_query($conn,"UPDATE user SET greitas3='$meniu3' WHERE nick='$nick'")or die(mysqli_error());							
	  echo'<div class="up">Meniu keitimas</div>';
				   echo'<div class="meniuc">Pakeista!</div>';
				    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php", "Mano meniu", "Meniu keitimas");
navigacija($g_n);
			}





elseif($id == "sniegas"){
top("Nustatymai");

if(empty($user['snow'])){
mysqli_query($conn,"UPDATE user SET snow='ne' WHERE nick='$nick'");
}
else{
mysqli_query($conn,"UPDATE user SET snow='' WHERE nick='$nick'");
}
	?>
		<script>
			window.location="meniu.php?id=";
		</script>
	<?
	}
	
	
	elseif($id == "greitasis"){
top("Nustatymai");

if($user['greitas'] == '+'){
mysqli_query($conn,"UPDATE user SET greitas4='-' WHERE nick='$nick'");
 
}
else{
mysqli_query($conn,"UPDATE user SET greitas='+' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE user SET greitas2='+' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE user SET greitas3='+' WHERE nick='$nick'");
}
	?>
		<script>
			window.location="meniu.php?id=";
		</script>
	<?
	}
	


			
			if($id =='nst'){
				  $rod = isset($_POST['rod']) ? preg_replace("/[^0-9_]/","",$_POST['rod'])  : null;
				  $trn = post($_POST['trn']);	
				   $ks = post($_POST['ks']);
				   $in = post($_POST['in']);
				$kas = post($_POST['kas']);
					$kov = post($_POST['kov']);
	  mysqli_query($conn,"UPDATE user SET rodyti_turnyra='$trn' WHERE nick='$nick'")or die(mysqli_error());						
	  mysqli_query($conn,"UPDATE zaidejai SET inv_rodymas='$in' WHERE nick='$nick'")or die(mysqli_error());						
		  mysqli_query($conn,"UPDATE zaidejai SET mini_chat='$ks' WHERE nick='$nick' ")or die(mysqli_error());		
		     mysqli_query($conn,"UPDATE zaidejai SET minichatas='$kas' WHERE nick='$nick'")or die(mysqli_error());		
	 mysqli_query($conn,"UPDATE zaidejai SET rodymas='$rod' WHERE nick='$nick'")or die(mysqli_error());	
		 mysqli_query($conn,"UPDATE user SET chat='$kov' WHERE nick='$nick'")or die(mysqli_error());				
				   echo'<div class="meniuc">Nustatyta</div>';
				    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php", "Mano meniu", "Nustatymai");
			}

if($id =='log'){
	top('Reputacijos logas');
	echo'<div class="meniu">';
    $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM rep WHERE kam='$nick'"))[0];

    if($viso > 0){
        $rezultatu_rodymas=15;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
$q = mysqli_query($conn,"SELECT * FROM rep WHERE kam='$nick' ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas") or die(mysqli_error());
   $puslapiu=ceil($viso/$rezultatu_rodymas);
	while($row = mysqli_fetch_assoc($q)){
		$pl++;
$fj = $row[ka] == 1 ? "Teigiamą" : "Neigiamą";
	echo'<b>'.$pl.'.</b> '.statusas($row[kas]).' uždėjo '.(($row[ka] == 1) ? "<b>Teigiamą</b>" : "<b>Neigiamą</b>").'  reptutaciją '.laikas($row['time']).'</br>';	
		

	}
	
	echo'</div>';
	      echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=log').'</div>';
   }
else{
	
	echo'Reputacijos logas tuščias';
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php", "Mano meniu", "Reputacijos logas");
	navigacija($g_n);
}

/// kurejo meniu

elseif($id == "kurejas"){
    $isAdminIp = $apie['ip'] == $nust['ip'] || $apie['ip'] == $nust['ip2'] || $apie['ip'] == $nust['ip3'];
  
  if($statusas !='Kurejas'){
        echo '<div class="up">Klaida!</div>';
        echo '<div class="meniuc"><font color="red">Čia gali patekti tik testas1</font></div>';}
elseif(!$isAdminIp){
        echo '<div class="up">Klaida!</div>';
    echo $nust['ip3'];
    echo $apie['ip'];
       echo '
          <div class="meniuc">

       
        	<img src="img/bicons/noadmin.gif"></div>';
        echo '<div class="meniuc"><font color="red"><b>Tavo IP neatitinka savininko IP</b>!</font></div>';
           $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php?id=","Mano meniu","Klaida!");
	navigacija($g_n);
   }
elseif($ka == "monakas"){
top('Monako pasirodymas');
	echo'<div class="meniuc"><img src="img/veikejai/Monakas.png"></div>
<div class="meniuc">Monakas atsirado!</div>';
mysqli_query($conn,"UPDATE nustatymai SET monakas='' ");
mysqli_query($conn,"UPDATE legendinis_sajanas SET prisikels='0' ");

    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Monako įjungimas");
	navigacija($g_n);    
        }

elseif($ka == "admin"){
        top('Admin davimas');
        if(isset($_POST['submit'])){
        $kam = post($_POST['kam']);
        $kaa = post($_POST['kaa']);
            if(empty($kam) or empty($kaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį.</div>';
            }


	if($kam == 'testas1' or $kam == 'frankunderwood'){
                    echo '<div class="meniuc">testas1 keisti statusą  Draudžiama!</div>';
}


elseif($kam == $nick){
                    echo '<div class="meniuc">Sau dėti negalima!</div>';
					  }
            elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$kam'")) == 0){
                echo '<div class="meniuc">Toks žaidėjas neegzistuoja!</div>';
            }
            else{
                if($kaa == 1){
                    mysqli_query($conn,"UPDATE zaidejai SET statusas='Admin' WHERE nick='$kam' ");
                    $txt = "$nick Davė tau Admin statusą.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Admin statusą.</div>';
                }
                elseif($kaa == 2){
                    mysqli_query($conn,"UPDATE zaidejai SET statusas='' WHERE nick='$kam' ");
                    $txt = "$nick Nuėme tavo Admin statusą.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Nuėmei '.$kam.' Admin statusą.</div>';
                }

            }
        }
        echo '<div class="meniu">
        <form action="?id=kurejas&ka=admin" method="post"/>
        Kam(Admin):<br /><input type="text" name="kam"><br />
     Pasirinkitę:<br/><select name="kaa">
        <option value="1">1. Duoti </option>
        <option value="2">2. Nuimti</option>
        </select><br/>
        <input type="submit" name="submit" value="Atlikti"/></form>
        </div>';
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Admin davimas");
	navigacija($g_n);    
        }

elseif($ka == "kurejas"){
        top('Savininko davimas');
        if(isset($_POST['submit'])){
        $kam = post($_POST['kam']);
        $kaa = post($_POST['kaa']);
            if(empty($kam) or empty($kaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį.</div>';
            }


	if($kam == 'frankunderwood' or $kam == 'testas1'){
                    echo '<div class="meniuc">testas1 keisti statusą  Draudžiama!</div>';
}


elseif($kam == $nick){
                    echo '<div class="meniuc">Sau dėti negalima!</div>';
					  }
            elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$kam'")) == 0){
                echo '<div class="meniuc">Toks žaidėjas neegzistuoja!</div>';
            }
            else{
                if($kaa == 1){
                    mysqli_query($conn,"UPDATE zaidejai SET statusas='Kurejas' WHERE nick='$kam' ");
                    $txt = "$nick Davė tau Žaidimo kūrėjo statusą!";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Kūrėjo statusą.</div>';
                }
                elseif($kaa == 2){
                    mysqli_query($conn,"UPDATE zaidejai SET statusas='' WHERE nick='$kam' ");
                    $txt = "$nick Nuėme tavo Žaidimo kūrėjo statusą.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Nuėmei '.$kam.' Kūrėjo statusą.</div>';
                }

            }
        }
        echo '<div class="meniu">
        <form action="?id=kurejas&ka=kurejas" method="post"/>
        Kam(Kūrėjas):<br /><input type="text" name="kam"><br />
     Pasirinkitę:<br/><select name="kaa">
        <option value="1">1. Duoti </option>
        <option value="2">2. Nuimti</option>
        </select><br/>
        <input type="submit" name="submit" value="Atlikti"/></form>
        </div>';
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Kūrėjo davimas");
	navigacija($g_n);    
        }


	//veikejo suteikimas
elseif($ka== "duoduv"){
top('Veikejo davimas');


echo' 

 <div class="meniu">
        <form method="post" action="?id=kurejas&ka=duoduh">
          

Hitas veikejas: 
        </div><div class="meniuc">
         <input type="submit" name="submit" value="Duoti"/></form>
        </div>';


 echo' 

 <div class="meniu">
        <form method="post" action="?id=kurejas&ka=duoducus">
          
Cus veikejas: 
        </div><div class="meniuc">
         <input type="submit" name="submit" value="Duoti"/></form>
        </div>';
     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Veikejo davimas");
	navigacija($g_n);    
  
 
}
elseif( $ka == "duoduh" )
{
top('Veikejo davimas');


$veikejas = Hitas;
$veikejas1 = abs(intval($_POST['koks_hitas']));
$on=mysqli_query($conn,"SELECT * FROM online ORDER BY id");
while ($onn = mysqli_fetch_row($on))
{

$zinute = "Adminas visiems davė po <b>$veikejas</b> veikėją!  Ačiū, kad žaidžiate, pagarbiai testas1!.";

	       $timxx = time()+60*60*24*100;      
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Hitas', trans='0', sms_litai=sms_litai-'0' WHERE nick='$onn[1]'");


mysqli_query($conn,"UPDATE zaidejai SET hitasb='$timxx' WHERE nick='$onn[1]'");

mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$zinute', gavejas='$onn[1]', time='".time()."', nauj='NEW' ") or die(mysqli_error());



}





echo "<div class='meniuc'>Atlikta!<br></div>";

     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Davimas");
	navigacija($g_n);    
}

elseif( $ka == "duoducus" )
{
top('Veikejo davimas');


$veikejas = Cus;
$veikejas1 = abs(intval($_POST['koks_cus']));
$on=mysqli_query($conn,"SELECT * FROM online ORDER BY id");
while ($onn = mysqli_fetch_row($on))
{

$zinute = "Adminas visiems davė po <b>$veikejas</b> veikėją!  Ačiū, kad žaidžiate, pagarbiai testas1!.";

	       $timxx = time()+60*60*24*100;      
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Cus', trans='0', sms_litai=sms_litai-'0' WHERE nick='$onn[1]'");
	

	              






mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$zinute', gavejas='$onn[1]', time='".time()."', nauj='NEW' ") or die(mysqli_error());

mysqli_query($conn,"UPDATE zaidejai SET cusb='$timxx' WHERE nick='$onn[1]'");



}



echo "<div class='meniuc'>Atlikta!<br></div>";



     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Davimas");
	navigacija($g_n);    
}
//// veik ant nicko
elseif($ka == "veikeja"){
        top('Veikejo davimas');
       if(!empty($wh)) $ats = $wh; else $ats = '';
 if(isset($_POST['submit'])){
        $kam = post($_POST['kam']);
        $kaa = post($_POST['kaa']);
            if(empty($kam) or empty($kaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį.</div>';
            }
            elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$kam'")) == 0){
                echo '<div class="meniuc">Toks žaidėjas neegzistuoja!</div>';
            }
            else{
                if($kaa == 1){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Jiren', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET jirenb='$timxx', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Jiren veikeją.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' JIREN.</div>';
                }
                
if($kaa == 2){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Champa', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET champab='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Champa veikeją.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Champa.</div>';
                }

if($kaa == 3){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Lord bills', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET billsb='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Lord Bills veikeją.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Lord Bills.</div>';
                }
if($kaa == 4){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Vadose', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET vadoseb='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Vadose veikeją.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Vadose.</div>';
                }

if($kaa == 5){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Wiss', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET visasb='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Visas veikeją.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Visas!</div>';
                }


if($kaa == 6){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Quitela', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET quitelab='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Quitela veikeją.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Quitela!</div>';
                }

if($kaa == 7){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Mosco', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET moscob='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Mosco veikeją.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Mosco!</div>';
                }

if($kaa == 8){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Gokas SSJGB Kaioken 20x', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET gokas20xb='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Gokas SSJGB Kaioken 20x veikeją.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Gokas 20x!</div>';
                }

if($kaa == 9){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Arack', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET arackb='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Arack veikeją.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Arack!</div>';
                }
if($kaa == 10){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Cus', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET cusb='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Cus veikeją.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Cus!</div>';
                }
if($kaa == 11){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='MAX Power Gold Fryzas', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET maxfryzasb='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau MAX Power Gold Fryzas veikeją.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' MAX FRYZAS!</div>';
                }

if($kaa == 12){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Goku Gods', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET gokasb='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Gokas Gods veikeją.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Gokas Gods!</div>';
                }
if($kaa == 13){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Vegeta gods', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET vegetab='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Vegeta Gods veikeją.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Vegeta Gods!</div>';
                }
if($kaa == 14){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Gold Ozaru Baby', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET ozarubabyb='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Gold Ozaru Baby veikeją.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Gold Ozaru Baby!</div>';
                }
if($kaa == 15){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Super Android 17', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET s17b='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");
                    
                    $txt = "$nick Davė tau Super Android 17 veikeją.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Super Android 17!</div>';
                }
if($kaa == 16){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Baby Vegeta', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET babyb='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Baby Vegeta veikeją.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Baby Vegeta!</div>';
                }
if($kaa == 17){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Majin Buu', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET mbuub='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Majin Buu veikeją.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Majin Buu!</div>';
                }
if($kaa == 18){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Botamo', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET magetab='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Botamo veikeją.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Botamo!</div>';
                }
if($kaa == 19){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Kaba', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET kabab='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Kaba veikeją.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Kaba!</div>';
                }
if($kaa == 20){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Gold Fryzas', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET fryzasb='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Gold Fryzas veikeją.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Gold Fryzas!</div>';
                }

if($kaa == 21){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Mojito', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET mojitob='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Mojito veikeją.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Mojito!</div>';
                }

if($kaa == 22){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Iwan', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET iwanb='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Iwan veikeją.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Iwan!</div>';
                }

if($kaa == 23){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Geene', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET geeneb='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Geene veikeją.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Geene!</div>';
                }

if($kaa == 24){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Grand Prest', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET prestb='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Grand Prest veikėją!!";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Grand Prest!</div>';
                }
if($kaa == 25){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Zeno Sama', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET zenob='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Zeno Sama veikėją!!.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Zeno Sama!</div>';
                }
if($kaa == 26){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Cognac', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET cognacb='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Cognac veikėją!!.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Cognac!</div>';
                }
if($kaa == 27){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Cukatail', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET cukatailb='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Cukatail veikėją!!.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Cukatail!</div>';
                }

if($kaa == 28){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Gokas Ultra Instinct', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET gokasultrab='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Gokas Ultra Instinct veikėją!!.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Gokas Ultra Instinct</div>';
                }

if($kaa == 29){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Gokas Mastered Ultra Instinct', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET gokasultramb='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Gokas Mastered Ultra Instinct veikėją!!.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Gokas Mastered Ultra Instinct</div>';
                }
if($kaa == 30){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Toppo', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET toppomb='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Toppo veikėją!!.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Toppo</div>';
                }
if($kaa == 31){

	       $timxx = time()+60*60*24*100; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Max Form Jiren', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET jirenmb='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Max Form Jiren veikėją!!.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Max Form Jiren</div>';
                }
if($kaa == 32){

	       $timxx = time()+60*60*24*1000; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Zamasu', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET zamasub='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Zamasu veikėją!!.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Zamasu</div>';
                }
if($kaa == 33){

	       $timxx = time()+60*60*24*1000; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Gohanas Ultra Instinct', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET gohanultrab='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Gohanas Ultra Instinct veikėją!!.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Gohanas Ultra Instinct</div>';
                }
if($kaa == 34){

	       $timxx = time()+60*60*24*1000; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Vegeta Ultra Instinct', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET vegetaultrab='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Vegeta Ultra Instinct veikėją!!.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Vegeta Ultra Instinct</div>';
                }

if($kaa == 35){

	       $timxx = time()+60*60*24*1000; 
mysqli_query($conn,"UPDATE zaidejai SET veikejas='Vegito Ultra Instinct', trans='0', sms_litai=sms_litai-'0' WHERE nick='$kam' ");


mysqli_query($conn,"UPDATE zaidejai SET vegitoultrab='$timxx', kiek_unikaliu=kiek_unikaliu+'1'  WHERE nick='$kam' ");


                    
                    $txt = "$nick Davė tau Vegito Ultra Instinct veikėją!!.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' Vegito Ultra Instinct</div>';
                }


            }



        }
        echo '<div class="meniu">
        <form action="?id=kurejas&ka=veikeja" method="post"/>
        Kam:<br /><input type="text" name="kam"><br />
        Pasirinkitę:<br/><select name="kaa">
        <option value="1">1. Jiren</option>
        <option value="2">2. Champa</option>
     <option value="3">3. Lord Bills</option>
     <option value="4">4. Vadose</option>
     <option value="5">5. Visas</option>
  <option value="6">6. Quitela</option>
  <option value="7">7. Mosco</option>
  <option value="8">8. Gokas SSJGB Kaioken 20x</option>
  <option value="9">9. Arack</option>
  <option value="10">10. Cus</option>
  <option value="11">11. MAX Power Gold Fryzas</option>
  <option value="12">12. Goku Gods</option>
  <option value="13">13. Vegeta gods</option>
  <option value="14">14. Gold Ozaru Baby</option>
  <option value="15">15. Super Android 17</option>
  <option value="16">16. Baby Vegeta</option>
  <option value="17">17. Majin Buu</option>
  <option value="18">18. Botamo</option>
  <option value="19">19. Kaba</option>
  <option value="20">20. Gold Fryzas</option>
 <option value="21">21. Mojito</option>
 <option value="22">22. Iwan</option>
 <option value="23">23. Geene</option>
<option value="24">24. Grand Prest</option>
<option value="25">25. Zeno Sama</option>
<option value="26">26. Cognac</option>
<option value="27">27. Cukatail</option>
<option value="28">28. Gokas Ultra Instinct</option>
<option value="29">29. Gokas Mastered Ultra Instinct</option>
<option value="30">30. Toppo</option>
<option value="31">31. Max Form Jiren</option>
<option value="32">32. Zamasu</option>
<option value="33">33. Gohanas Ultra Instinct</option>
<option value="34">34. Vegeta Ultra Instinct</option>
<option value="35">35. Vegito Ultra Instinct</option>
        </select><br/>
        <input type="submit" name="submit" value="Atlikti"/></form>
        </div>';
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Veikėjo davimas");
	navigacija($g_n);    
        }
elseif($ka == "uztildyti"){
	$laikas=post($_POST['laikas']);
            if(!empty($wh)) $ats = $wh; else $ats = '';
            echo '<div class="up">Žaidėjo užtildymas</b></div>';
            if(isset($_POST['submit'])){
                $b_nick = post($_POST['nick']); $b_p = post($_POST['przt']); $b_laikas = post($_POST['laikas']);
                if(empty($b_nick) OR empty($b_p) OR empty($b_laikas)){
                    echo '<div class="meniuc"><div class="error">Paliktas tuščias laukelis!</div></div>';
                }
                elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$b_nick'")) == 0){
                    echo '<div class="meniuc"><div class="error">Tokio žaidėjo nėra!</div></div>';
                }
                elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM block1 WHERE nick='$b_nick'")) > 0){
                    echo '<div class="meniuc"><div class="error">Šis žaidėjas jau užtildytas!</div></div>';
                }
                elseif($b_nick == $nick){
                    echo '<div class="meniuc">Savęs užtildyti negalima!</div>';
                }
                       else{
                    $b_laikas2 = time()+60*$b_laikas;
										
									
                    mysqli_query($conn,"INSERT INTO block1 SET nick='$b_nick', uz='$b_p', time='$b_laikas2', kas_ban='$nick'");
                    echo '<div class="meniuc"><div class="meniuc">Žaidėjas užtildytas!</div></div>';
                }
            }
        
            echo '<div class="meniu">
            <form action="?id=kurejas&ka=uztildyti" method="post"/>
            Žaidėjo vardas:<br />
            <input type="text" value="'.$ats.'" name="nick"/><br />
            Už ką užtildot:<br />
            <input type="text" name="przt"/><br />
            Kiek laiko <small>(minutėmis)</small>:<br />
            <input type="number" size="7" name="laikas"/><br />
            <input type="submit" name="submit" class="submit" value="Tildyti"/>
            </div>';
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Užtildymas");
	navigacija($g_n);    
        }
	
			/* užtagintas užtildymas [išimta mod funkcija], tad jeigu įjungsiu, bus čia else if*/
			elseif($ka == "unmute"){
        echo '<div class="up">Žaidėjo atitildymas</div>';
		 $kam = post($_GET['kam']);
        if(empty($kam)){}else{
      
            if(empty($kam)){
                echo '<div class="meniuc"><div class="error">Palikote tuščią laukelį.</div></div>';
            }
            elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM block1 WHERE nick='$kam'")) == 0){
                echo '<div class="meniuc"><div class="error">Toks žaidėjas neegzistuoja!</div></div>';
            }
            else{
              mysqli_query($conn,"DELETE FROM block1 WHERE nick='$kam'");
mysqli_query($conn,"INSERT INTO pokalbiai SET nick='SISTEMA', sms='Žaidėjas <b>".$apie['nick']."</b> nuėmė mutę  <b>".$kam."</b> ! :) ', data='".time()."'");
			  echo '<div class="meniuc"><div class="error">$kam žaidėjas atitildytas!</div></div>';

            }
        }
                $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM block1"))[0];
                if($viso > 0){
                $rezultatu_rodymas=10;
                $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
                if (empty($psl) or $psl < 0) $psl = 1;
                if ($psl > $total) $psl = $total;
                $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
                 $q = mysqli_query($conn,"SELECT * FROM block1 ORDER BY id DESC LIMIT $nuo_kiek, $rezultatu_rodymas");
                 $puslapiu = ceil($viso/$rezultatu_rodymas);
                 while($row = mysqli_fetch_assoc($q)){
                     echo '<div class="meniu">';
                     echo ''.$ico.' Atitildyti: <a href="?id=kurejas&ka=unmute&kam='.$row['nick'].'">'.statusas($row['nick']).'</a>';
                     unset($row);

                     echo '</div>';
                 }
                 echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=kurejas&ka=unmute').'</div>';
        }
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Atitildymas");
	navigacija($g_n);    
  }
/// kurti kasimo lentele
elseif($ka == "new_kasim"){
            echo '<div class="up">Kurti naują  kasyklą(lentele)</div>';
            if(isset($_POST['submit'])){
                $pas = post($_POST['pas']);
$img = post($_POST['img']);
             
                if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kasykla WHERE name='$pas' ")) > 0 ){
                    echo '<div class="meniuc"><div class="error">Tokia kasykla jau sukurta!</div></div>';
                } else {
                    echo '<div class="meniuc"><div class="true">Nauja kasykla sukurta!</div></div>';
                    mysqli_query($conn,"INSERT INTO kasykla SET name='$pas', img='$img' ");
                }
            }
            echo '<div class="meniu">
            <form action="?id=kurejas&ka=new_kasim" method="post"/>
            Kasyklos pavadinimas:<br /><input type="text" name="pas"/><br />
Kasyklos iconele:<br /><input type="text" name="img"/><br />
            <input type="submit" name="submit" class"submit" value="Kurti -&raquo;"/>
            </div>';
         $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","kasyklos kurimas");
	navigacija($g_n);    
  }
///kasimo reikalavimai
elseif($ka == "new_kasim2"){
            echo '<div class="up">Kurti naują iškaseną</div>';
            if(isset($_POST['submit'])){
                $name = post($_POST['name']);
                $kasimolvl = post($_POST['kasimolvl']);
                $minlvl = post($_POST['minlvl']);
                $maxlvl = post($_POST['maxlvl']);
                $lokacija = post($_POST['lokacija']);
    $img = post($_POST['img']);
    $ruda = post($_POST['ruda']);
    $kirtiklis = post($_POST['kirtiklis']);
    

                if(empty($name) OR empty($kasimolvl) OR empty($minlvl) OR empty($maxlvl) OR empty($lokacija) OR empty($img) OR empty($ruda) OR empty($kirtiklis)){
                    echo '<div class="meniuc"><div class="meniuc">Paliktas tuščias laukelis!</div></div>';
                }
                elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kasyklav WHERE name='$img' ")) > 0 ){
                    echo '<div class="meniuc"><div class="error">Toks img jau sukurtas!</div></div>';
                } else {
                    echo '<div class="meniuc"><div class="true">Nauja iškasena sukurta!</div></div>';
                    mysqli_query($conn,"INSERT INTO kasyklav SET name='$name', kasimolvl='$kasimolvl', minlvl='$minlvl', maxlvl='$maxlvl', lokacija='$lokacija', ruda='$ruda', img='$img', kirtiklis='$kirtiklis' ");
                }
            }
            echo '<div class="meniu">
            <form action="?id=kurejas&ka=new_kasim2" method="post"/>
             Iškasenos name<br /><input type="text" name="name"/><br />
            Kiek reikia kasimo lvl:<br /><input type="text" name="kasimolvl"/><br />
            Duoda MIN lvl:<br /><input type="text" name="minlvl"/><br />
            Duoda MAX lvl:<br /><input type="text" name="maxlvl"/><br />
Kelintas ID:<br /><input type="text" name="lokacija"/><br />
Kokia iškasena:<br /><input type="text" name="ruda"/><br />
Koks kirtiklis:<br /><input type="text" name="kirtiklis"/><br />

IMG:<br /><input type="text" name="img"/><br />';
            $query = mysqli_query($conn,"SELECT * FROM kasykla");
            echo 'I kur deti:<br/>
            <select name="lok">';
            while($row = mysqli_fetch_assoc($query)){
                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                unset($row);
            }
            echo '</select><br/>';
            echo '<input type="submit" name="submit" class="submit" value="Kurti"/>
            </div>';
       $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Iškasenų kūrimas");
	navigacija($g_n);    
        }



/// kurti pask lentele
elseif($ka == "new_pasl"){
            echo '<div class="up">Kurti naują  pasiekimą(lentele)</div>';
            if(isset($_POST['submit'])){
                $pas = post($_POST['pas']);
$img = post($_POST['img']);
               
                if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pasiek WHERE name='$pas' ")) > 0 ){
                    echo '<div class="meniuc"><div class="error">Toks pasiekimas jau sukurtas!</div></div>';
                } else {
                    echo '<div class="meniuc"><div class="true">Naujas pasiekimas sukurtas!</div></div>';
                    mysqli_query($conn,"INSERT INTO pasiek SET name='$pas', img='$img' ");
                }
            }
            echo '<div class="meniu">
            <form action="?id=kurejas&ka=new_pasl" method="post"/>
            Pasiekimo pavadinimas:<br /><input type="text" name="pas"/><br />
Pasiekimo iconele:<br /><input type="text" name="img"/><br />
            <input type="submit" name="submit" class"submit" value="Kurti -&raquo;"/>
            </div>';
         $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Pasiekimo kurimas");
	navigacija($g_n);    
  }

///pasiek reikalavimai
elseif($ka == "new_pasiek2"){
            echo '<div class="up">Kurti naują pasiekimą</div>';
            if(isset($_POST['submit'])){
                $name = post($_POST['name']);
                $kiek = post($_POST['kiek']);
                $pt = post($_POST['pt']);
                $kas = post($_POST['kas']);
                $ko = post($_POST['ko']);
$ko2 = post($_POST['ko2']);
$ka = post($_POST['ka']);
  $img = post($_POST['img']);
 $eur = post($_POST['eur']);
                if(empty($name) OR empty($kas) OR empty($kiek) OR empty($pt) OR empty($ko2) OR empty($ko) OR empty($img) OR empty($eur) OR empty($ka)){
                    echo '<div class="meniuc"><div class="meniuc">Paliktas tuščias laukelis!</div></div>';
                }
                elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pasiek2 WHERE name='$img' ")) > 0 ){
                    echo '<div class="meniuc"><div class="error">Toks img jau sukurtas!</div></div>';
                } else {
                    echo '<div class="meniuc"><div class="true">Naujas pasiekimas sukurtas!</div></div>';
                    mysqli_query($conn,"INSERT INTO pasiek2 SET name='$name', kiek='$kiek', kas='$kas', ka='$ka', pt='$pt', ko='$ko', img='$img', ko2='$ko2', eur='$eur' ");
                }
            }
            echo '<div class="meniu">
            <form action="?id=kurejas&ka=new_pasiek2" method="post"/>
             Tikslas:<br /><input type="text" name="name"/><br />
            Kiek reikia:<br /><input type="text" name="kiek"/><br />
            Kiek PT duos:<br /><input type="text" name="pt"/><br />
            Kurioj lok:<br /><input type="text" name="kas"/><br />
Ko:<br /><input type="text" name="ko"/><br />
Kintamsis(is lenteles):<br /><input type="text" name="ka"/><br />
Ko pasiekt:<br /><input type="text" name="ko2"/><br />
Kiek eurų duos:<br /><input type="text" name="eur"/><br />
IMG:<br /><input type="text" name="img"/><br />';
            $query = mysqli_query($conn,"SELECT * FROM pasiek");
            echo 'I kur deti:<br/>
            <select name="lok">';
            while($row = mysqli_fetch_assoc($query)){
                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                unset($row);
            }
            echo '</select><br/>';
            echo '<input type="submit" name="submit" class="submit" value="Kurti"/>
            </div>';
       $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Pasiekimu kūrimas");
	navigacija($g_n);    
        }




/// kurti misijos lentele
elseif($ka == "new_misija"){
            echo '<div class="up">Kurti naują misiją</div>';
            if(isset($_POST['submit'])){
                $lok = post($_POST['lok']);
                if(empty($lok)){
                    echo '<div class="meniuc"><div class="error">Paliktas tuščias laukelis!</div></div>';
                }
                elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM vietam WHERE name='$lok' ")) > 0 ){
                    echo '<div class="meniuc"><div class="error">Tokia misija jau sukurta!</div></div>';
                } else {
                    echo '<div class="meniuc"><div class="true">Nauja misija sukurta!</div></div>';
                    mysqli_query($conn,"INSERT INTO vietam SET name='$lok' ");
                }
            }
            echo '<div class="meniu">
            <form action="?id=kurejas&ka=new_misija" method="post"/>
            Misijos pavadinimas:<br /><input type="text" name="lok"/><br />
            <input type="submit" name="submit" class"submit" value="Kurti -&raquo;"/>
            </div>';
         $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Misijos kurimas");
	navigacija($g_n);    
  }
///misijos reikalavimai
elseif($ka == "new_misija2"){
            echo '<div class="up">Kurti misijos reikalavimus</div>';
            if(isset($_POST['submit'])){
               
                $lok = post($_POST['lok']);
                $kario = post($_POST['kario']);
                $galios = post($_POST['galios']);
                $sparnu = post($_POST['sparnu']);
$atlygio = post($_POST['atlygio']);
 $laikas = post($_POST['laikas']);
$kas = post($_POST['kas']);
                if(empty($lok) OR empty($kario) OR empty($galios) OR empty($sparnu) OR empty($laikas) OR  empty($kas) OR empty($atlygio)){
                    echo '<div class="meniuc"><div class="meniuc">Paliktas tuščias laukelis!</div></div>';
                }
                elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM misijos2 WHERE name='$name' ")) > 0 ){
                    echo '<div class="meniuc"><div class="error">Toks reikalavimas jau sukurtas!</div></div>';
                } else {
                    echo '<div class="meniuc"><div class="true">Naujas misijos reikalavimas sukurtas!</div></div>';
                    mysqli_query($conn,"INSERT INTO misijos2 SET  kario='$kario', galios='$galios', sparnu='$sparnu', lokacija='$lok', atlg='$atlygio', laikas='$laikas', kas='$kas' ");
                }
            }
            echo '<div class="meniu">
            <form action="?id=kurejas&ka=new_misija2" method="post"/>
            
            Kario tobulėjimo:<br /><input type="text" name="kario"/><br />
            Naikinimo galios:<br /><input type="text" name="galios"/><br />
            Angelo sparnų:<br /><input type="text" name="sparnu"/><br />
Atlygis:<br /><input type="text" name="atlygio"/><br />
Kas kiek valandu:<br /><input type="text" name="laikas"/><br />
Koks kintamasis:<br /><input type="text" name="kas"/><br />
';
            $query = mysqli_query($conn,"SELECT * FROM vietam");
            echo ' Kuriai Misijai pridesit:<br/>
            <select name="lok">';
            while($row = mysqli_fetch_assoc($query)){
                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                unset($row);
            }
            echo '</select><br/>';
            echo '<input type="submit" name="submit" class="submit" value="Kurti"/>
            </div>';
       $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Misijos reikalavimų kūrimas");
	navigacija($g_n);    
        }
elseif($ka == "new_boss"){
            echo '<div class="up">Kurti naują Bosą</div>';
            if(isset($_POST['submit'])){
                
 $name = post($_POST['name']);
 $zen = post($_POST['zen']);
 $exp = post($_POST['exp']);
 $hp = post($_POST['hp']);
 $max_hp = post($_POST['max_hp']);
 $krd = post($_POST['krd']);
 $laikas = post($_POST['laikas']);
 $minhit = post($_POST['minhit']);
 $maxhit = post($_POST['maxhit']);
 $crit = post($_POST['crit']);
  $vipt = post($_POST['vipt']);
             $img = post($_POST['img']);

                
                if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM boss WHERE name='$name' ")) > 0 ){
                    echo '<div class="meniuc"><div class="error">Toks bosas jau sukurtas!</div></div>';
                } else {
                    echo '<div class="meniuc"><div class="true">Bosas '.$name.' sukurtas!</div></div>';
                    mysqli_query($conn,"INSERT INTO boss SET name='$name', img='$img', zen='$zen', exp='$exp',  krd='$krd', vipt='$vipt', hp='$hp', max_hp='$max_hp', laikas='$laikas', max_hit='$maxhit', min_hit='$minhit', crit='$crit' ");
                }
            }
            echo '<div class="meniu">
            <form action="?id=kurejas&ka=new_boss" method="post"/>
            Boso pavadinimas:<br /><input type="text" name="name"/><br />
Boso HP:<br /><input type="text" name="hp"/><br />
Boso MAX HP:<br /><input type="text" name="max_hp"/><br />
Boso IMG:<br /><input type="text" name="img"/><br />
Duos pinigu:<br /><input type="text" name="zen"/><br />
Duos kreditu:<br /><input type="text" name="krd"/><br />
Boso Exp:<br /><input type="text" name="exp"/><br />
Duos VIP Ticket:<br /><input type="text" name="vipt"/><br />
Kas kiek laiko prisikels:<br /><input type="text" name="laikas"/><br />
Min kirtis:<br /><input type="text" name="minhit"/><br />
Max kirtis:<br /><input type="text" name="maxhit"/><br />
Duos Crit:<br /><input type="text" name="crit"/><br />
            <input type="submit" name="submit" class"submit" value="Kurti -&raquo;"/>
            </div>';
         $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Boso kurimas");
	navigacija($g_n);    
  }
///komandu bosai
elseif($ka == "newk_boss"){
            echo '<div class="up">Kurti naują Komandos Bosą</div>';
            if(isset($_POST['submit'])){
                
 $name = post($_POST['name']);
 $zen = post($_POST['zen']);
$eur = post($_POST['eur']);
 $team = post($_POST['team']);
 $hp = post($_POST['hp']);
 $max_hp = post($_POST['max_hp']);
 
 $laikas = post($_POST['laikas']);
 $minhit = post($_POST['minhit']);
 $maxhit = post($_POST['maxhit']);
 
             $img = post($_POST['img']);

              
                if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team_boss WHERE id='$ID' ")) > 0 ){
                    echo '<div class="meniuc"><div class="error">Toks bosas jau sukurtas!</div></div>';
                } else {
                    echo '<div class="meniuc"><div class="true">Bosas '.$name.' sukurtas!</div></div>';
                    mysqli_query($conn,"INSERT INTO team_boss SET name='$name', img='$img', zen='$zen',   hp='$hp', max_hp='$max_hp', laikas='$laikas', max_hit='$maxhit', min_hit='$minhit', eur='$eur', pavadinimas='$team' ");
                }
            }
            echo '<div class="meniu">
            <form action="?id=kurejas&ka=newk_boss" method="post"/>
            Boso pavadinimas:<br /><input type="text" size="7" name="name"/><br />
Boso HP:<br /><input type="text" size="7" name="hp"/><br />
Boso MAX HP:<br /><input type="text" size="7" name="max_hp"/><br />
Boso IMG:<br /><input type="text" size="7" name="img"/><br />
Duos pinigu:<br /><input type="text" size="7" name="zen"/><br />
Duos eurų:<br /><input type="text" size="7" name="eur"/><br />
Kas kiek laiko prisikels:<br /><input type="text" size="7" name="laikas"/><br />
Min kirtis:<br /><input type="text" size="7" name="minhit"/><br />
Max kirtis:<br /><input type="text" size="7" name="maxhit"/><br />';
 $query = mysqli_query($conn,"SELECT * FROM team");
            echo 'Kuriai  Komandai:<br/>
            <select name="team">';
            while($row = mysqli_fetch_assoc($query)){
                echo '<option value="'.$row['pavadinimas'].'">'.$row['pavadinimas'].'</option>';
                unset($row);
            }
          echo'  <input type="submit" name="submit" class"submit" value="Kurti -&raquo;"/>
            </div>';
         $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Komandos Boso kurimas");
	navigacija($g_n);    
  }
//// kurti lokacija
elseif($ka == "new_lok"){
            echo '<div class="up">Kurti naują lokaciją</div>';
            if(isset($_POST['submit'])){
                $lok = post($_POST['lok']);
             $img = post($_POST['img']);
$nuo = post($_POST['nuo']);
                
                if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM lokacijos WHERE name='$lok' ")) > 0 ){
                    echo '<div class="meniuc"><div class="error">Tokia lokaciją jau sukurta!</div></div>';
                } else {
                    echo '<div class="meniuc"><div class="true">Nauja lokaciją sukurta!</div></div>';
                    mysqli_query($conn,"INSERT INTO lokacijos SET name='$lok', img='$img', nuo='$nuo' ");
                }
            }
            echo '<div class="meniu">
            <form action="?id=kurejas&ka=new_lok" method="post"/>
            Lokacijos pavadinimas:<br /><input type="text" name="lok"/><br />
Lokacijos iconele:<br /><input type="text" name="img"/><br />
Lokacijos draudimas:<br /><input type="text" name="nuo"/><br />
            <input type="submit" name="submit" class"submit" value="Kurti -&raquo;"/>
            </div>';
         $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Lokacijos kurimas");
	navigacija($g_n);    
  }

///kurt mobus
elseif($ka == "new_mob"){
            echo '<div class="up">Kurti naują monstrą</div>';
            if(isset($_POST['submit'])){
                $name = post($_POST['name']);
                $lok = post($_POST['lok']);
                $kg = post($_POST['kg']);
                $exp = post($_POST['exp']);
                $zen = post($_POST['zen']);
  $img = post($_POST['img']);
                if(empty($name) OR empty($lok) OR empty($kg) OR empty($exp) OR empty($zen) OR empty($img)){
                    echo '<div class="meniuc"><div class="meniuc">Paliktas tuščias laukelis!</div></div>';
                }
                elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM mobai WHERE kg='$kg' ")) > 0 ){
                    echo '<div class="meniuc"><div class="error">Toks monstras jau sukurtas!</div></div>';
                } else {
                    echo '<div class="meniuc"><div class="true">Naujas monstras sukurtas!</div></div>';
                    mysqli_query($conn,"INSERT INTO mobai SET name='$name', kg='$kg', pin='$zen', exp='$exp', lokacija='$lok', img='$img' ");
                }
            }
            echo '<div class="meniu">
            <form action="?id=kurejas&ka=new_mob" method="post"/>
            Monstro pavadinimas:<br /><input type="text" name="name"/><br />
            Monstro K.G:<br /><input type="text" name="kg"/><br />
            Meta EXP:<br /><input type="text" name="exp"/><br />
            Meta Zen\'ų:<br /><input type="text" name="zen"/><br />
IMG:<br /><input type="text" name="img"/><br />';
            $query = mysqli_query($conn,"SELECT * FROM lokacijos");
            echo 'Lokacija:<br/>
            <select name="lok">';
            while($row = mysqli_fetch_assoc($query)){
                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                unset($row);
            }
            echo '</select><br/>';
            echo '<input type="submit" name="submit" class="submit" value="Kurti"/>
            </div>';
       $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Mobų kūrimas");
	navigacija($g_n);    
        }

////atimti
elseif($ka== "atimti"){
top('Atemimas');
if(!empty($wh)) $ats = $wh; else $ats = '';
echo' 

 <div class="meniu">
        <form method="post" action="?id=kurejas&ka=atimti2 "">
          Jega:<br /><input type="text" name="kiek_jegos"/><br />
          
          Gynyba:<br /><input type="text" name="kiek_gynybos"/><br />
          
          Pinigai :<br /><input type="text" name="kiek_pinigu"/><br />
         
          Eurai: <br /><input type="text" name="kiek_auksiniu" /><br />
Auksiniai: <br /><input type="text" name="kiek_auksiniu1" /><br />
Kreditu: <br /><input type="text" name="kiek_kreditu" /><br />
Naikinimo galios: <br /><input type="text" name="kiek_galios" /><br />
Angelo sparnu: <br /><input type="text" name="kiek_sparnu" /><br />
Kario tobulejimo: <br /><input type="text" name="kiek_tobulas" /><br />
EXP: <br /><input type="text" name="kiek_exp" /><br />
        </div><div class="meniuc">
         <input type="submit" name="submit" value="Atimti"/></form>
        </div>';
     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Atemimas");
	navigacija($g_n);    
  
 
}
elseif( $ka == "atimti2" )
{
top('Atimti');

$jegos = abs(intval($_POST['kiek_jegos']));
$gynybos = abs(intval($_POST['kiek_gynybos']));
$pinigu = abs(intval($_POST['kiek_pinigu']));
$auksiniu = abs(intval($_POST['kiek_auksiniu']));
$auksiniu1 = abs(intval($_POST['kiek_auksiniu1']));
$kreditu = abs(intval($_POST['kiek_kreditu']));
$galios = abs(intval($_POST['kiek_galios']));
$sparnu = abs(intval($_POST['kiek_sparnu']));
$exp = abs(intval($_POST['kiek_exp']));
$tobulas = abs(intval($_POST['kiek_tobulas']));
$on=mysqli_query($conn,"SELECT * FROM online ORDER BY id");
while ($onn = mysqli_fetch_row($on))
{


mysqli_query($conn,"UPDATE zaidejai SET jega=jega-'$jegos', gynyba=gynyba-'$gynybos', litai=litai-'$pinigu', sms_litai=sms_litai-'$auksiniu', auksiniai=auksiniai-'$auksiniu1', kred=kred-'$kreditu',  exp=exp-'$exp' WHERE nick='$onn[1]'");
mysqli_query($conn,"UPDATE inv SET naikinti=naikinti-'$galios', angelwing=angelwing-'$sparnu', tobulas=tobulas-'$tobulas' WHERE nick='$onn[1]'");
}





echo "<div class='meniuc'>Atlikta, resursai nuimti.<br></div>";

     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Atemimas");
	navigacija($g_n);    
}




///// reikalingi 

elseif($ka== "dalyboss"){
top('Dalybos');


echo' 

 <div class="meniu">
        <form method="post" action="?id=kurejas&ka=dovanaa"">
          Jega:<br /><input type="text" name="kiek_jegos"/><br />
          
          Gynyba:<br /><input type="text" name="kiek_gynybos"/><br />
          
          Pinigai :<br /><input type="text" name="kiek_pinigu"/><br />
         
          Eurai: <br /><input type="text" name="kiek_auksiniu" /><br />
Auksiniai: <br /><input type="text" name="kiek_auksiniu1" /><br />
Kreditu: <br /><input type="text" name="kiek_kreditu" /><br />
Vip ticket <br /><input type="text" name="kiek_vipt" /><br />
        </div><div class="meniuc">
         <input type="submit" name="submit" value="Duoti"/></form>
        </div>';
 
     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Dalybos");
	navigacija($g_n);    
  
 
}
elseif( $ka == "dovanaa" )
{
top('Dalybos');

$jegos = abs(intval($_POST['kiek_jegos']));
$gynybos = abs(intval($_POST['kiek_gynybos']));
$pinigu = abs(intval($_POST['kiek_pinigu']));
$auksiniu = abs(intval($_POST['kiek_auksiniu']));
$auksiniu1 = abs(intval($_POST['kiek_auksiniu1']));
$kreditu = abs(intval($_POST['kiek_kreditu']));
$galios = abs(intval($_POST['kiek_galios']));
$sparnu = abs(intval($_POST['kiek_sparnu']));
$exp = abs(intval($_POST['kiek_exp']));
$vipt = abs(intval($_POST['kiek_vipt']));
$tobulas = abs(intval($_POST['kiek_tobulas']));
$on=mysqli_query($conn,"SELECT * FROM online ORDER BY id");
while ($onn = mysqli_fetch_row($on))
{

$zinute = "Adminas $nick padarė dalybas! Per dalybas gavai: <b>$jegos</b> Jėgos, <b>$gynybos</b> Gynybos, <b>$pinigu</b> pinigu, <b>$auksiniu eurų</b>, <b>$auksiniu1</b> auksinių, <b>$kreditu</b> kreditų, <b>$vipt</b> Vip ticketų! Ačiū, kad žaidžiate, pagarbiai testas1!.";

mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$zinute', gavejas='$onn[1]', time='".time()."', nauj='NEW' ") or die(mysqli_error());

mysqli_query($conn,"UPDATE zaidejai SET jega=jega+'$jegos', gynyba=gynyba+'$gynybos', litai=litai+'$pinigu', sms_litai=sms_litai+'$auksiniu', auksiniai=auksiniai+'$auksiniu1', kred=kred+'$kreditu', vipticket=vipticket+'$vipt' WHERE nick='$onn[1]'");

}





echo "<div class='meniuc'>Atlikta, dovanos išsiųstos.<br></div>";

     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Dalybos");
	navigacija($g_n);    
}


/// be pm visko
elseif($ka== "dalyboss2"){
top('Dalybos');


echo' 

 <div class="meniu">
        <form method="post" action="?id=kurejas&ka=duotii2"">
          Jega:<br /><input type="text" name="kiek_jegos"/><br />
          
          Gynyba:<br /><input type="text" name="kiek_gynybos"/><br />
          
          Pinigai :<br /><input type="text" name="kiek_pinigu"/><br />
         
          Eurai: <br /><input type="text" name="kiek_auksiniu" /><br />
Auksiniai: <br /><input type="text" name="kiek_auksiniu1" /><br />
Kreditu: <br /><input type="text" name="kiek_kreditu" /><br />
Naikinimo galios: <br /><input type="text" name="kiek_galios" /><br />
Angelo sparnu: <br /><input type="text" name="kiek_sparnu" /><br />
Kario tobulejimo: <br /><input type="text" name="kiek_tobulas" /><br />
EXP: <br /><input type="text" name="kiek_exp" /><br />
Pasiekimo taškai: <br /><input type="text" name="kiek_pt" /><br />
Malkos: <br /><input type="text" name="kiek_malku" /><br />
Žuvys: <br /><input type="text" name="kiek_zuvu" /><br />
 Mikroskemų: <br /><input type="text" name="kiek_mikro" /><br />
Fusion Fail: <br /><input type="text" name="kiek_ff" /><br />
Sayan Taili: <br /><input type="text" name="kiek_sayan" /><br />
Stone: <br /><input type="text" name="kiek_stone" /><br />
Soul: <br /><input type="text" name="kiek_soul" /><br />
Energy Stone: <br /><input type="text" name="kiek_estone" /><br />
Pragaro vaisius: <br /><input type="text" name="kiek_vaisius" /><br />
Majin scroll: <br /><input type="text" name="kiek_scroll" /><br />
Gold Stone: <br /><input type="text" name="kiek_gstone" /><br />
Magic Ball: <br /><input type="text" name="kiek_ball" /><br />
Power Stone: <br /><input type="text" name="kiek_pstone" /><br />
Pupos: <br /><input type="text" name="kiek_pupu" /><br />
       </div><div class="meniuc">
         <input type="submit" name="submit" value="Duoti"/></form>
        </div>';
 
     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Dalybos");
	navigacija($g_n);    
  
 
}
elseif($ka == "reg"){
        echo '<div class="up">Registracija ON/OFF</div>';
        if($nust['reg'] == "+"){
            echo '<div class="meniuc">Išjungei registraciją!</div></div>';
            mysqli_query($conn,"UPDATE nustatymai SET reg='-'");
        }else{
            echo '<div class="meniuc">Įjungei registraciją!</div></div>';
            mysqli_query($conn,"UPDATE nustatymai SET reg='+'");
        }
              $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","ON/OFF Registracija");
	navigacija($g_n);    
    }
elseif($ka == "kovos"){
        echo '<div class="up">Kovų laukas ON/OFF</div>';
        if($nust['kovos'] == "+"){
            echo '<div class="meniuc">Išjungei kovų lauką!</div></div>';
            mysqli_query($conn,"UPDATE nustatymai SET kovos='-'");
        }else{
            echo '<div class="meniuc">Įjungei kovų lauką!</div></div>';
            mysqli_query($conn,"UPDATE nustatymai SET kovos='+'");
        }
              $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","ON/OFF Kovų laukas");
	navigacija($g_n);    
    }
elseif($ka == "pas"){
        echo '<div class="up">Pasiūlymų rašymas ON/OFF</div>';
        if($nust['pas'] == "+"){
            echo '<div class="meniuc">Išjungei pasiūlymų rašymą!</div></div>';
            mysqli_query($conn,"UPDATE nustatymai SET pas='-'");
        }else{
            echo '<div class="meniuc">Įjungei pasiūlymų rašymą!</div></div>';
            mysqli_query($conn,"UPDATE nustatymai SET pas='+'");
        }
              $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","ON/OFF Pasiūlymų rašymas");
	navigacija($g_n);    
    }

elseif($ka == "topic"){
        echo '<div class="up">Topic rašymo ON/OFF</div>';
        if($nust['topic'] == "+"){
            echo '<div class="meniuc">Išjungei topic rašymą!</div></div>';
            mysqli_query($conn,"UPDATE nustatymai SET topic='-'");
        }else{
            echo '<div class="meniuc">Įjungei topic rašymą!</div></div>';
            mysqli_query($conn,"UPDATE nustatymai SET topic='+'");
        }
              $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","ON/OFF Topic");
	navigacija($g_n);    
    }
elseif($ka == "misijos"){
        echo '<div class="up">Misijos ON/OFF</div>';
        if($nust['misijos'] == "+"){
            echo '<div class="meniuc">Išjungei misijas!</div></div>';
            mysqli_query($conn,"UPDATE nustatymai SET misijos='-'");
        }else{
            echo '<div class="meniuc">Įjungei Misijas!</div></div>';
            mysqli_query($conn,"UPDATE nustatymai SET misijos='+'");
        }
              $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","ON/OFF Misijos");
	navigacija($g_n);    
    }
elseif($ka == "pasiekimai"){
        echo '<div class="up">Pasiekimai ON/OFF</div>';
        if($nust['pasiekimai'] == "+"){
            echo '<div class="meniuc">Išjungei Pasiekimus!</div></div>';
            mysqli_query($conn,"UPDATE nustatymai SET pasiekimai='-'");
        }else{
            echo '<div class="meniuc">Įjungei Pasiekimus!</div></div>';
            mysqli_query($conn,"UPDATE nustatymai SET pasiekimai='+'");
        }
              $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","ON/OFF Pasiekimai");
	navigacija($g_n);    
    }



elseif( $ka == "duotii2" )
{
top('Dalybos');

$jegos = abs(intval($_POST['kiek_jegos']));
$gynybos = abs(intval($_POST['kiek_gynybos']));
$pinigu = abs(intval($_POST['kiek_pinigu']));
$auksiniu = abs(intval($_POST['kiek_auksiniu']));
$auksiniu1 = abs(intval($_POST['kiek_auksiniu1']));
$kreditu = abs(intval($_POST['kiek_kreditu']));
$galios = abs(intval($_POST['kiek_galios']));
$sparnu = abs(intval($_POST['kiek_sparnu']));
$exp = abs(intval($_POST['kiek_exp']));
$pt = abs(intval($_POST['kiek_pt']));
$mikro = abs(intval($_POST['kiek_mikro']));
$ff = abs(intval($_POST['kiek_ff']));
$sayan = abs(intval($_POST['kiek_sayan']));
$stone = abs(intval($_POST['kiek_stone']));
$soul = abs(intval($_POST['kiek_soul']));
$estone = abs(intval($_POST['kiek_estone']));
$vaisius = abs(intval($_POST['kiek_vaisius']));
$scroll = abs(intval($_POST['kiek_scroll']));
$gstone= abs(intval($_POST['kiek_gstone']));
$ball = abs(intval($_POST['kiek_ball']));
$pstone = abs(intval($_POST['kiek_pstone']));
$malkos = abs(intval($_POST['kiek_malku']));
$zuvis = abs(intval($_POST['kiek_zuvu']));
$pupos = abs(intval($_POST['kiek_pupu']));
$pt = abs(intval($_POST['kiek_pt']));
$tobulas = abs(intval($_POST['kiek_tobulas']));
$on=mysqli_query($conn,"SELECT * FROM online ORDER BY id");
while ($onn = mysqli_fetch_row($on))
{


mysqli_query($conn,"UPDATE zaidejai SET jega=jega+'$jegos', gynyba=gynyba+'$gynybos', litai=litai+'$pinigu', sms_litai=sms_litai+'$auksiniu', auksiniai=auksiniai+'$auksiniu1', kred=kred+'$kreditu',  exp=exp+'$exp' WHERE nick='$onn[1]'");
mysqli_query($conn,"UPDATE inv SET naikinti=naikinti+'$galios', angelwing=angelwing+'$sparnu', tobulas=tobulas+'$tobulas', unikalus=unikalus+'$pt' , Microshem=Microshem+'$mikro'  , Fusionfail=Fusionfail+'$ff'  , Sayiantail=Sayiantail+'$sayan'  , Stone=Stone+'$stone' , Soul=Soul+'$soul'  , Energystone=Energystone+'$estone' , Pragarovaisius=Pragarovaisius+'$vaisius', Majinsroll=Majinsroll+'$scroll', Goldstone=Goldstone+'$gstone'  , Magicball=Magicball+'$ball'  , Powerstone=Powerstone+'$pstone', Malkos=Malkos+'$malkos', Zuvis=Zuvis+'$zuvis', Pupos=Pupos+'$pupos' WHERE nick='$onn[1]'")or die(mysqli_error());
}





echo "<div class='meniuc'>Atlikta, dovanos išsiųstos.<br></div>";

     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Dalybos");
	navigacija($g_n);    
}

     elseif($ka == "clean_news"){
            echo '<div class="up">Naujienų valymas</div>';
            echo '<div class="meniuc">Ar tikrai norite išvalyti naujienas?<br/><a href="?id=kurejas&ka=clean_news2">Taip</a> | <a href="?i=">Ne</a></div>';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Išvalyti Naujienas");
	navigacija($g_n);    
        }
        elseif($ka == "clean_news2"){
            echo '<div class="up">Naujienų valymas</div>';
            mysqli_query($conn,"DELETE FROM news");
            mysqli_query($conn,"INSERT INTO news SET sms='".statusas($nick)." išvalė naujienas.', nick='Sistema', data='".time()."' ");
            echo '<div class="meniuc">Naujienos išvalytos!</div></div>';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Naujienų valymas");
	navigacija($g_n);    
        }
        elseif($ka == "clean_pm"){
            echo '<div class="up">PM valymas</div>';
            echo '<div class="meniuc">Ar tikrai norite išvalyti PM?<br/><a href="?id=kurejas&ka=clean_pm2">Taip</a> | <a href="?i=">Ne</a></div>';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","PM VALYMAS");
	navigacija($g_n);    
        }
        elseif($ka == "clean_pm2"){
            echo '<div class="up">PM valymas</div>';
            mysqli_query($conn,"DELETE FROM pm");
            mysqli_query($conn,"INSERT INTO pm SET message='".statusas($nick)." išvalė pm.', kas='Sistema', time='".time()."' ");
mysqli_query($conn,"INSERT INTO pms SET message='".statusas($nick)." išvalė pm.', kas='Sistema', time='".time()."' ");
            echo '<div class="meniuc"><div class="true">PM išvalytas!</div></div>';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","PM VALYMAS");
	navigacija($g_n);    
        }

elseif($ka == "clean_pas"){
            echo '<div class="up">Pasiūlymų valymas</div>';
            echo '<div class="meniuc">Ar tikrai norite išvalyti pasiūlymus?<br/><a href="?id=kurejas&ka=clean_pas2">Taip</a> | <a href="?i=">Ne</a></div>';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Išvalyti Pasiūlymus");
	navigacija($g_n);    
        }
        elseif($ka == "clean_pas2"){
            echo '<div class="up">Pasiūlymų valymas</div>';
            mysqli_query($conn,"DELETE FROM pasiulymai");
            mysqli_query($conn,"INSERT INTO pasiulymai SET sms='".statusas($nick)." išvalė pasiulymus .', nick='Sistema', data='".time()."' ");
            echo '<div class="meniuc">Pasiūlymai išvalyti!</div></div>';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Pasiūlymų valymas");
	navigacija($g_n);    
        }



        

      

elseif($ka == "duotiv"){
        top('Resursų davimas');
     if(!empty($wh)) $ats = $wh; else $ats = '';
   if(isset($_POST['submit'])){
        $kam = post($_POST['kam']);
        $kaa = post($_POST['kaa']);
  $kiekis = post($_POST['kiekis']);

            if(empty($kam) or empty($kaa) or empty($kiekis)){
                echo '<div class="meniuc">Palikai tuščią laukelį.</div>';
            }
            elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$kam'")) == 0){
                echo '<div class="meniuc">Toks žaidėjas neegzistuoja!</div>';
            }
            else{
                if($kaa == 1){

	     
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.$kiekis.' eurų! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.$kiekis.' eurų!</div>';
                }
   if($kaa == 2){

	     
mysqli_query($conn,"UPDATE zaidejai SET bitcoin=bitcoin+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.$kiekis.' BitCoin! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.$kiekis.' BitCoin!</div>';
                }

  if($kaa == 3){

	     
mysqli_query($conn,"UPDATE zaidejai SET kred=kred+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.$kiekis.' Kreditų! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.$kiekis.' Kreditų!</div>';
                }
  if($kaa == 4){

	     
mysqli_query($conn,"UPDATE zaidejai SET auksiniai=auksiniai+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.$kiekis.' auksinių! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.$kiekis.' auksinių!</div>';
                }

  if($kaa == 5){

	     
mysqli_query($conn,"UPDATE inv SET unikalus=unikalus+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.$kiekis.' pasiekimų taškų! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.$kiekis.' pasiekimų taškų!</div>';
                }

  if($kaa == 6){

	     
mysqli_query($conn,"UPDATE zaidejai SET litai=litai+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' pinigų! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' pinigų!</div>';
                }
  if($kaa == 7){

	     
mysqli_query($conn,"UPDATE zaidejai SET jega=jega+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' jegos! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' jegos!</div>';
                }
  if($kaa == 8){

	     
mysqli_query($conn,"UPDATE zaidejai SET gynyba=gynyba+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' gynybos! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' gynybos!</div>';
                }

 if($kaa == 9){

	     
mysqli_query($conn,"UPDATE zaidejai SET pliusai=pliusai+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' pliusų! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' pliusų!</div>';
                }

if($kaa == 10){

	     
mysqli_query($conn,"UPDATE zaidejai SET dailyp=dailyp+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Daily tasku! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Daily tasku!</div>';
                }

if($kaa == 11){

	     
mysqli_query($conn,"UPDATE zaidejai SET kasimolvl=kasimolvl+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Kasimi Lvl! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Kasimo LVL!</div>';
                }

if($kaa == 12){

	     
mysqli_query($conn,"UPDATE zaidejai SET botas=botas+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Botas Cash! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Botas Cash!</div>';
                }


}

}

echo '<div class="meniu">
        <form action="?id=kurejas&ka=duotiv" method="post"/>
        Kam:<br /><input type="text" name="kam"><br />
        Pasirinkitę:<br/><select name="kaa">
        <option value="1">1. Eurų</option>
   <option value="2">2. BitCoin</option>
   <option value="3">3. Kreditų</option>
   <option value="4">4. Auksinių</option>
       <option value="5">5. Pasiekimų taškų</option>
   <option value="6">6. Pinigų</option>
  <option value="7">7. Jėgos</option>
  <option value="8">8. Gynybos</option>
  <option value="9">9. Pliusų</option>
  <option value="10">10. Daily Taškų</option>
<option value="11">11. Κasimo LVL</option>
<option value="12">12. Botas Cash</option>

 </select><br/>
Kiek duosite <small></small>:<br />
            <input type="number" size="7" name="kiekis" value="'.$kiekis.'"/><br />
        <input type="submit" name="submit" value="Atlikti"/></form>
        </div>';
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Resursų davimas");
	navigacija($g_n);    
        }
elseif($ka == "smstop"){
        top('SMS TOP');
     if(!empty($wh)) $ats = $wh; else $ats = '';
   if(isset($_POST['submit'])){
        $kam = post($_POST['kam']);
        $kaa = post($_POST['kaa']);
  $kiekis = post($_POST['kiekis']);

            if(empty($kam) or empty($kaa) or empty($kiekis)){
                echo '<div class="meniuc">Palikai tuščią laukelį.</div>';
            }
            elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$kam'")) == 0){
                echo '<div class="meniuc">Toks žaidėjas neegzistuoja!</div>';
            }
            else{
                if($kaa == 1){

	     
mysqli_query($conn,"UPDATE sms_top SET sms='$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Įdėjo tave į SMS TOP! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Įdęjai '.$kam.'   SMS TOP</div>';
                }
}

}

echo '<div class="meniu">
        <form action="?id=kurejas&ka=smstop" method="post"/>
        Kam:<br /><input type="text" name="kam"><br />
        Pasirinkitę:<br/><select name="kaa">
        <option value="1">1. Pridėti į SMS TOP</option>

 </select><br/>
Kiek pridėsite eurų<small></small>:<br />
            <input type="number" size="7" name="kiekis" value="'.$kiekis.'"/><br />
        <input type="submit" name="submit" value="Atlikti"/></form>
        </div>';
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","SMS TOP");
	navigacija($g_n);    
        }


elseif($ka == "atimtiv"){
        top('Resursų atėmimas');
  if(!empty($wh)) $ats = $wh; else $ats = ''; 
     if(isset($_POST['submit'])){
        $kam = post($_POST['kam']);
        $kaa = post($_POST['kaa']);
  $kiekis = post($_POST['kiekis']);

            if(empty($kam) or empty($kaa) or empty($kiekis)){
                echo '<div class="meniuc">Palikai tuščią laukelį.</div>';
            }
            elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$kam'")) == 0){
                echo '<div class="meniuc">Toks žaidėjas neegzistuoja!</div>';
            }
            else{
                if($kaa == 1){

	     
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Atėmė iš tavęs '.$kiekis.' eurų! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Atėmei '.$kam.'  '.$kiekis.' eurų!</div>';
                }
   if($kaa == 2){

	     
mysqli_query($conn,"UPDATE zaidejai SET bitcoin=bitcoin-'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Atėmė iš tavęs '.$kiekis.' BitCoin! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Atėmei '.$kam.'  '.$kiekis.' BitCoin!</div>';

        }

  if($kaa == 3){

	     
mysqli_query($conn,"UPDATE zaidejai SET kred=kred-'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Atėmė iš tavęs '.$kiekis.' Kreditų! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Atėmei '.$kam.'  '.$kiekis.' Kreditų!</div>';
                }
  if($kaa == 4){

	     
mysqli_query($conn,"UPDATE zaidejai SET auksiniai=auksiniai-'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Atėmė iš tavęs '.$kiekis.' auksinių! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Atėmei '.$kam.'  '.$kiekis.' auksinių!</div>';
                }

  if($kaa == 5){

	     
mysqli_query($conn,"UPDATE inv SET unikalus=unikalus-'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Atėmė iš tavęs '.$kiekis.' pasiekimų taškų! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Atėmei '.$kam.'  '.$kiekis.' pasiekimų taškų!</div>';
                }

  if($kaa == 6){

	     
mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Atėmė iš tavęs '.skaicius($kiekis).' pinigų! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Atėmei '.$kam.'  '.skaicius($kiekis).' pinigų!</div>';
                }
  if($kaa == 7){

	     
mysqli_query($conn,"UPDATE zaidejai SET jega=jega-'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Atėmė iš tavęs '.skaicius($kiekis).' jegos! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Atėmei '.$kam.'  '.skaicius($kiekis).' jegos!</div>';
                }
  if($kaa == 8){

	     
mysqli_query($conn,"UPDATE zaidejai SET gynyba=gynyba-'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Atėmė iš tavęs '.skaicius($kiekis).' gynybos! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Atėmei '.$kam.'  '.skaicius($kiekis).' gynybos!</div>';
                }

 if($kaa == 9){

	     
mysqli_query($conn,"UPDATE zaidejai SET pliusai=pliusai-'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Atėmė iš tavęs '.skaicius($kiekis).' pliusų! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Atėmei '.$kam.'  '.skaicius($kiekis).' pliusų!</div>';
                }


}
}

echo '<div class="meniu">
        <form action="?id=kurejas&ka=atimtiv" method="post"/>
        Kam:<br /><input type="text" name="kam"><br />
        Pasirinkitę:<br/><select name="kaa">
        <option value="1">1. Eurų</option>
   <option value="2">2. BitCoin</option>
   <option value="3">3. Kreditų</option>
   <option value="4">4. Auksinių</option>
       <option value="5">5. Pasiekimų taškų</option>
   <option value="6">6. Pinigų</option>
  <option value="7">7. Jėgos</option>
  <option value="8">8. Gynybos</option>
  <option value="9">9. Pliusų</option>
 </select><br/>
Kiek atimsite <small></small>:<br />
            <input type="number" size="7" name="kiekis" value="'.$kiekis.'"/><br />
        <input type="submit" name="submit" value="Atlikti"/></form>
        </div>';
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Resursų davimas");
	navigacija($g_n);    
        }



elseif($ka == "duotidg"){
        top('Daiktų davimas');
        if(isset($_POST['submit'])){
        $kam = post($_POST['kam']);
        $kaa = post($_POST['kaa']);
  $kiekis = post($_POST['kiekis']);

            if(empty($kam) or empty($kaa) or empty($kiekis)){
                echo '<div class="meniuc">Palikai tuščią laukelį.</div>';
            }
            elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$kam'")) == 0){
                echo '<div class="meniuc">Toks žaidėjas neegzistuoja!</div>';
            }
            else{
                if($kaa == 1){

	     
mysqli_query($conn,"UPDATE inv SET tobulas=tobulas+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.$kiekis.' kario tobulėjimo! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.$kiekis.' kario tobulėjimo!</div>';
                }
   if($kaa == 2){

	     
mysqli_query($conn,"UPDATE inv SET naikinti=naikinti+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.$kiekis.' galios naikinimo! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.$kiekis.' naikinimo galios!</div>';
                }

  if($kaa == 3){

	     
mysqli_query($conn,"UPDATE inv SET angelwing=angelwing+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.$kiekis.' angelo sparnų! ";
                 mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.$kiekis.' angelo sparnų!</div>';
                }
  if($kaa == 4){

	     
mysqli_query($conn,"UPDATE inv SET Microshem=Microshem+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.$kiekis.' mikroskemų! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.$kiekis.' mikroskemų!</div>';
                }

  if($kaa == 5){

	     
mysqli_query($conn,"UPDATE inv SET Fusionfail=Fusionfail+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.$kiekis.' fusion fail! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.$kiekis.' fusion fail!</div>';
                }

  if($kaa == 6){

	     
mysqli_query($conn,"UPDATE inv SET sayiantail=sayiantail+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' sayan tail! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' sayan tail!</div>';
                }
  if($kaa == 7){

	     
mysqli_query($conn,"UPDATE inv SET Stone=Stone+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' stone! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' stone!</div>';
                }
  if($kaa == 8){

	     
mysqli_query($conn,"UPDATE inv SET Soul=Soul+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' soul! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' soul!</div>';
                }

 if($kaa == 9){

	     
mysqli_query($conn,"UPDATE inv SET Energystone=Energystone+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' energy stone! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' energy stone!</div>';
                }

if($kaa == 10){

	     
mysqli_query($conn,"UPDATE inv SET Pragarovaisius=Pragarovaisius+'$kiekis' WHERE nick='$nick' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' pragaro vaisius! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' pragaro vaisius!</div>';
                }
if($kaa == 11){

	     
mysqli_query($conn,"UPDATE inv SET Majinsroll=Majinsroll+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' majin scroll! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' majin scroll!</div>';
                }

if($kaa == 12){

	     
mysqli_query($conn,"UPDATE inv SET Goldstone=Goldstone+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' gold stone! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' gold stone!</div>';
                }
if($kaa == 13){

	     
mysqli_query($conn,"UPDATE inv SET Magicball=Magicball+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' magic ball! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' magic ball!</div>';
                }

if($kaa == 14){

	     
mysqli_query($conn,"UPDATE inv SET Powerstone=Powerstone+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' power stone! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' power stone!</div>';
                }

if($kaa == 15){

	     
mysqli_query($conn,"UPDATE inv SET Pupos=Pupos+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' pupu! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' pupu!</div>';
                }

if($kaa == 16){

	     
mysqli_query($conn,"UPDATE inv SET Malkos=Malkos+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' malku! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' malku!</div>';
                }

if($kaa == 17){

	     
mysqli_query($conn,"UPDATE inv SET Zuvis=Zuvis+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' žuvų! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' žuvų!</div>';
                }
if($kaa == 18){

	     
mysqli_query($conn,"UPDATE inv SET ki=ki+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' ki matuokli! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' ki matuokli!</div>';
                }
if($kaa == 19){

	     
mysqli_query($conn,"UPDATE inv SET radaras=radaras+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' radara! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' radara!</div>';
                }
if($kaa == 20){

	     
mysqli_query($conn,"UPDATE inv SET Trankso_kardas=Trankso_kardas+'$kiekis' WHERE nick='$kam' ");
mysqli_query($conn,"UPDATE zaidejai SET sword='Trankso kardas' WHERE nick='$kam'");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Trankso karda! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Trankso karda!</div>';
                }
if($kaa == 21){

	     
mysqli_query($conn,"UPDATE inv SET Vedzito_sarvai=Vedzito_sarvai+'$kiekis' WHERE nick='$kam' ");
mysqli_query($conn,"UPDATE zaidejai SET armor='Vedzito sarvai' WHERE nick='$kam'");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Vedzito sarvus! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Vedzito sarvus!</div>';
                }

if($kaa == 22){

	     
mysqli_query($conn,"UPDATE zaidejai SET k_laivas='1' WHERE nick='$kam' ");
    mysqli_query($conn,"UPDATE inv SET  laivas=laivas+'1' WHERE nick='$kam'");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Kosmini laiva! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Kosmini laiva!</div>';
                }

if($kaa == 23){

	     
mysqli_query($conn,"UPDATE inv SET Time_sword=Time_sword+'$kiekis' WHERE nick='$kam' ");

mysqli_query($conn,"UPDATE zaidejai SET sword='Time sword' WHERE nick='$kam'");



                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Time sword! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Time sword!</div>';
                }
if($kaa == 24){

	     
mysqli_query($conn,"UPDATE inv SET Time_armor=Time_armor+'$kiekis' WHERE nick='$kam' ");
mysqli_query($conn,"UPDATE zaidejai SET armor='Time armor' WHERE nick='$kam'");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Time armor! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Time armor!</div>';
                }

if($kaa == 25){

	     
mysqli_query($conn,"UPDATE inv SET Money_sword=Money_sword+'$kiekis' WHERE nick='$kam' ");
mysqli_query($conn,"UPDATE zaidejai SET sword='Money sword' WHERE nick='$kam'");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Money sword! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Money sword!</div>';
                }
if($kaa == 26){

	     
mysqli_query($conn,"UPDATE inv SET Super_money_sword=Super_money_sword+'$kiekis' WHERE nick='$kam' ");
mysqli_query($conn,"UPDATE zaidejai SET sword='Super money sword' WHERE nick='$kam'");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Super money sword! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Super money sword!</div>';
                }
if($kaa == 27){

	     
mysqli_query($conn,"UPDATE inv SET One_tap_sword=One_tap_sword+'$kiekis' WHERE nick='$kam' ");

mysqli_query($conn,"UPDATE zaidejai SET sword='Vieno kircio sword' WHERE nick='$kam'");



                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Vieno kirčio kardą! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Vieno kirčio kardą!</div>';
                }
if($kaa == 28){

	     
mysqli_query($conn,"UPDATE inv SET kg_sword=kg_sword+'$kiekis' WHERE nick='$kam' ");
mysqli_query($conn,"UPDATE zaidejai SET sword='Galios sword' WHERE nick='$kam'");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Galios kardą! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Galios kardą!</div>';
                }
if($kaa == 29){

	     
mysqli_query($conn,"UPDATE inv SET Money_armor=Money_armor+'$kiekis' WHERE nick='$kam' ");
mysqli_query($conn,"UPDATE zaidejai SET armor='Money' WHERE nick='$kam'");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Money sword! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Money sword!</div>';
                }
if($kaa == 30){

	     
mysqli_query($conn,"UPDATE inv SET Super_money_armor=Super_money_armor+'$kiekis' WHERE nick='$kam' ");
mysqli_query($conn,"UPDATE zaidejai SET armor='Super money armor' WHERE nick='$kam'");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Super money sword! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Super money sword!</div>';
                }
if($kaa == 31){

	     
mysqli_query($conn,"UPDATE inv SET One_tap_armor=One_tap_armor+'$kiekis' WHERE nick='$kam' ");
mysqli_query($conn,"UPDATE zaidejai SET armor='Vieno kircio armor' WHERE nick='$kam'");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Vieno kircio armor! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' vieno kircio armor!</div>';
                }

if($kaa == 32){

	     
mysqli_query($conn,"UPDATE inv SET kg_armor=kg_armor+'$kiekis' WHERE nick='$kam' ");
mysqli_query($conn,"UPDATE zaidejai SET armor='Galios armor' WHERE nick='$kam'");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Galios armor! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Galios armor!</div>';
                }
if($kaa == 33){

	     
mysqli_query($conn,"UPDATE inv SET Infinity_armor=Infinity_armor+'$kiekis' WHERE nick='$kam' ");

mysqli_query($conn,"UPDATE zaidejai SET armor='Infinity armor' WHERE nick='$kam'");



                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Infinity armor! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Infinity armor!</div>';
                }
if($kaa == 34){

	     
mysqli_query($conn,"UPDATE inv SET Infinity_sword=Infinity_sword+'$kiekis' WHERE nick='$kam' ");
mysqli_query($conn,"UPDATE zaidejai SET sword='Infinity sword' WHERE nick='$kam'");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Infinity sword! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Infinity sword!</div>';
                }
if($kaa == 35){
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'0' WHERE nick='$kam' ");

	     
mysqli_query($conn,"UPDATE inv SET Super_amulet=Super_amulet+'$kiekis' WHERE nick='$kam' ");
mysqli_query($conn,"UPDATE zaidejai SET amuletas='Super amulet' WHERE nick='$kam'");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Super amulet! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Super amulet!</div>';
                }
if($kaa == 36){


	     
mysqli_query($conn,"UPDATE inv SET Super_amulet_item=Super_amulet_item+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Super amulet item! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Super amulet item!</div>';
                }

if($kaa == 37){


	     
mysqli_query($conn,"UPDATE inv SET dball=dball+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Drakono rutuliu! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Drakono rutuliu!</div>';
                }
if($kaa == 38){


	     
mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Vip ticket! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' VIP Ticket!</div>';
                }
if($kaa == 39){


	     
mysqli_query($conn,"UPDATE inv SET naikinimo_amulet_item=naikinimo_amulet_item+'$kiekis' WHERE nick='$kam' ");





                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Naikinimo Amulet Item! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Naikinimo Amulet Item!</div>';
                }

if($kaa == 40){


	     
mysqli_query($conn,"UPDATE inv SET naikinimo_amulet=naikinimo_amulet+'$kiekis' WHERE nick='$kam' ");
mysqli_query($conn,"UPDATE zaidejai SET amuletas='Naikinimo amulet' WHERE nick='$kam'");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Naikinimo amulet! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Naikinimo amulet!</div>';
                }
if($kaa == 41){


	     
mysqli_query($conn,"UPDATE zaidejai SET critical=critical+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Kritinio lygio! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Kritinio lygio!</div>';
                }

if($kaa == 42){


	     
mysqli_query($conn,"UPDATE inv SET critical=critical+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Kritinio lygio! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Kritinio lygio!</div>';
                }
if($kaa == 43){


	     
mysqli_query($conn,"UPDATE inv SET ad16=ad16+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' AD16 item! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' AD16 item!</div>';
                }
if($kaa == 44){


	     
mysqli_query($conn,"UPDATE inv SET ad17=ad17+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' AD17 item! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' AD17 item!</div>';
                }
if($kaa == 45){


	     
mysqli_query($conn,"UPDATE inv SET ad18=ad18+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' AD18 item! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' AD18 item!</div>';
                }
if($kaa == 46){


	     
mysqli_query($conn,"UPDATE inv SET ad19=ad19+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' AD19 item! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' AD19 item!</div>';
                }
if($kaa == 47){


	     
mysqli_query($conn,"UPDATE inv SET ad20=ad20+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' AD20 item! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' AD20 item!</div>';
                }
if($kaa == 48){


	     
mysqli_query($conn,"UPDATE inv SET ad16kard=ad16kard+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' AD16 karda! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' AD16 karda!</div>';
                }
if($kaa == 49){


	     
mysqli_query($conn,"UPDATE inv SET ad17kard=ad17kard+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' AD17 karda! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' AD17 karda!</div>';
                }
if($kaa == 50){


	     
mysqli_query($conn,"UPDATE inv SET ad18kard=ad18kard+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' AD18 karda! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' AD18 karda!</div>';
                }
if($kaa == 51){


	     
mysqli_query($conn,"UPDATE inv SET ad19kard=ad19kard+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' AD19 karda! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' AD19 karda!</div>';
                }
if($kaa == 52){


	     
mysqli_query($conn,"UPDATE inv SET ad20kard=ad20kard+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' AD20 karda! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' AD20 karda!</div>';
                }
if($kaa == 53){


	     
mysqli_query($conn,"UPDATE inv SET ad16sarv=ad16sarv+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' AD16 sarvus! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' AD16 sarvus!</div>';
                }
if($kaa == 54){


	     
mysqli_query($conn,"UPDATE inv SET ad17sarv=ad17sarv+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' AD17 sarvus! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' AD17 sarvus!</div>';
                }
if($kaa == 55){


	     
mysqli_query($conn,"UPDATE inv SET ad18sarv=ad18sarv+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' AD18 sarvus! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' AD18 sarvus!</div>';
                }
if($kaa == 56){


	     
mysqli_query($conn,"UPDATE inv SET ad19sarv=ad19sarv+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' AD19 sarvus! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' AD19 sarvus!</div>';
                }
if($kaa == 57){


	     
mysqli_query($conn,"UPDATE inv SET ad20sarv=ad20sarv+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' AD20 sarvus! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' AD20 sarvus!</div>';
                }
if($kaa == 58){


	     
mysqli_query($conn,"UPDATE inv SET ad16amulet=ad16amulet+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' AD16 amulet! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' AD16 amulet!</div>';
                }

if($kaa == 59){


	     
mysqli_query($conn,"UPDATE inv SET ad17amulet=ad17amulet+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' AD17 amulet! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' AD17 amulet!</div>';
                }
if($kaa == 60){


	     
mysqli_query($conn,"UPDATE inv SET ad18amulet=ad18amulet+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' AD18 amulet! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' AD18 amulet!</div>';
                }
if($kaa == 61){


	     
mysqli_query($conn,"UPDATE inv SET ad19amulet=ad19amulet+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' AD19 amulet! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' AD19 amulet!</div>';
                }
if($kaa == 62){


	     
mysqli_query($conn,"UPDATE inv SET ad20amulet=ad20amulet+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' AD20 amulet! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' AD20 amulet!</div>';
                }
if($kaa == 63){


	     
mysqli_query($conn,"UPDATE inv SET event1=event1+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Roziu! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Roziu!</div>';
                }
if($kaa == 64){


	     
mysqli_query($conn,"UPDATE inv SET event2=event2+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Lapeliai! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Lapeliai!</div>';
                }

if($kaa == 65){


	     
mysqli_query($conn,"UPDATE inv SET event3=event3+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Vysniu! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Vysniu!</div>';
                }
if($kaa == 66){


	     
mysqli_query($conn,"UPDATE inv SET event4=event4+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Drugeliu! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Drugeliu!</div>';
                }
if($kaa == 67){


	     
mysqli_query($conn,"UPDATE inv SET mirties_sword=mirties_sword+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Mirties sword! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Mirties sword!</div>';
                }
if($kaa == 68){


	     
mysqli_query($conn,"UPDATE inv SET mirties_armor=mirties_armor+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Mirties armor! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Mirties armor!</div>';
                }
if($kaa == 69){


	     
mysqli_query($conn,"UPDATE inv SET mirties_amulet=mirties_amulet+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Mirties amulet! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Mirties amulet!</div>';
                }

if($kaa == 70){


	     
mysqli_query($conn,"UPDATE inv SET atgimimo_sword=atgimimo_sword+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Atgimimo Sword! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Atgimimo Sword!</div>';
                }

if($kaa == 71){


	     
mysqli_query($conn,"UPDATE inv SET atgimimo_armor=atgimimo_armor+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Atgimimo Armor! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Atgimimo Armor!</div>';
                }
if($kaa == 72){


	     
mysqli_query($conn,"UPDATE inv SET atgimimo_amulet=atgimimo_amulet+'$kiekis' WHERE nick='$kam' ");




                    
                    $txt = "$nick Davė tau '.skaicius($kiekis).' Atgimimo amulet! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Davei '.$kam.'  '.skaicius($kiekis).' Atgimimo amulet!</div>';
                }




}
}

echo '<div class="meniu">
        <form action="?id=kurejas&ka=duotidg" method="post"/>
        Kam:<br /><input type="text" name="kam"><br />
        Pasirinkitę:<br/><select name="kaa">
        <option value="1">1. Kario tobulėjimo</option>
   <option value="2">2. Naikinimo galios</option>
   <option value="3">3. Angelo Sparnų</option>
   <option value="4">4. Mikroskemų</option>
       <option value="5">5. Fusion Fail</option>
   <option value="6">6. Sayan tail</option>
  <option value="7">7. Stone</option>
  <option value="8">8. Soul</option>
  <option value="9">9. Energy stone</option>
  <option value="10">10. Pragaro vaisius</option>
  <option value="11">11. Majin scroll</option>
  <option value="12">12. Gold stone</option>
  <option value="13">13. Magic ball</option>
  <option value="14">14. Power stone</option>
  <option value="15">15. Pupos</option>
  <option value="16">16. Malkos</option>
  <option value="17">17. Zuvis</option>
  <option value="18">18. KG matuoklis</option>
  <option value="19">19. Radaras</option>
  <option value="20">20. Trankso kardas</option>
  <option value="21">21. Vedzito sarvai</option>
  <option value="22">22. Kosminis laivas</option>
  <option value="23">23. Time Sword</option>
  <option value="24">24. Time Armor</option>
  <option value="25">25. Money Sword</option>
  <option value="26">26. Super Money Sword</option>
  <option value="27">27. Vieno kirčio kardas</option>
  <option value="28">28. Galios kardas</option>
  <option value="29">29. Money Armor</option>
  <option value="30">30. Super Money Armor</option>
  <option value="31">31. Vieno kirčio Armor</option>
  <option value="32">32. Galios Armor</option>
<option value="33">33. Infinity Armor</option>
<option value="34">34. Infinity Sword</option>
<option value="35">35. Super Amulet</option>
<option value="36">36. Super Amulet Item</option>
<option value="37">37. Drakono Rutuliai</option>
<option value="38">38. VIP ticket</option>
<option value="39">39. Naikinimo Amulet Item</option>
<option value="40">40. Naikinimo Amulet </option>
<option value="41">41. Kritinio lygio </option>
<option value="42">42. Critical stone</option>
<option value="43">43. AD16 item</option>
<option value="44">44. AD17 item</option>
<option value="45">45. AD18 item</option>
<option value="46">46. AD19 item</option>
<option value="47">47. AD20 item</option>
<option value="48">48. AD16 karda</option>
<option value="49">49. AD17 karda</option>
<option value="50">50. AD18 karda</option>
<option value="51">51. AD19 karda</option>
<option value="52">52. AD20 karda</option>
<option value="53">53. AD16 sarvus</option>
<option value="54">54. AD17 sarvus</option>
<option value="55">55. AD18 sarvus</option>
<option value="56">56. AD19 sarvus</option>
<option value="57">57. AD20 sarvus</option>
<option value="58">58. AD16 amulet</option>
<option value="59">59. AD17 amulet</option>
<option value="60">60. AD18 amulet</option>
<option value="61">61. AD19 amulet</option>
<option value="62">62. AD20 amulet</option>
<option value="63">63. Rožių</option>
<option value="64">64. Lapelių</option>
<option value="65">65. Vyšnių</option>
<option value="66">66. Drugelių</option>
<option value="67">67. Mirties Sword</option>
<option value="68">68. Mirties armor</option>
<option value="69">69. Mirties amulet</option>
<option value="70">70. Atgimimo sword</option>
<option value="71">71. Atgimimo armor</option>
<option value="72">72. Atgimimo amulet</option>
 </select><br/>
Kiek duosite <small></small>:<br />
            <input type="number" size="7" name="kiekis" value="'.$kiekis.'"/><br />
        <input type="submit" name="submit" value="Atlikti"/></form>
        </div>';
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Daiktų davimas");
	navigacija($g_n);    
        } elseif ($ka == "pm") {
        echo '<div class="up">PM Žinutės</div>';
        $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM pm"))[0];
        if ($viso > 0) {
                $rezultatu_rodymas=10;
                $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
                if (empty($psl) or $psl < 0) $psl = 1;
                if ($psl > $total) $psl = $total;
                $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
                 $q = mysqli_query($conn,"SELECT * FROM pm WHERE what != 'Sistema' ORDER BY id DESC LIMIT $nuo_kiek, $rezultatu_rodymas");
                 $puslapiu = ceil($viso/$rezultatu_rodymas);
                 while($row = mysqli_fetch_assoc($q)){
                     echo '<div class="main">';
                     echo ''.$ico.' <a href="game.php?i=apie&wh='.$row['what'].'">'.statusas($row['what']).'</a> >> <a href="game.php?i=apie&wh='.$row['gavejas'].'">'.statusas($row['gavejas']).':</a> '.smile($row['txt']).'<br/>
                     &raquo; '.laikas($row['time']).'';
                     unset($row);
                     echo '</div>';
                 }
                 echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?i=admin&ka=pm').'</div>';
                 echo '<div class="meniuc">Viso PM - <b>'.kiek('pm').'</b></div>';
            }else{
                 echo '<div class="meniuc"><font color="red">Pm log\'as tuščias!</font></div>';
            }
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","PM Logas");
	navigacija($g_n);    
        }
        elseif($ka == "perved_log"){
            echo '<div class="up">Pervedimų log\'as</div>';
            $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM perved_log"))[0];
            if($viso > 0){
                $rezultatu_rodymas=10;
                $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
                if (empty($psl) or $psl < 0) $psl = 1;
                if ($psl > $total) $psl = $total;
                $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
                 $q = mysqli_query($conn,"SELECT * FROM perved_log ORDER BY id DESC LIMIT $nuo_kiek, $rezultatu_rodymas");
                 $puslapiu = ceil($viso/$rezultatu_rodymas);
                 while($row = mysqli_fetch_assoc($q)){
                     echo '<div class="meniuc">';
                     echo ''.$ico.' '.smile($row['txt']).'<br/>
                     &raquo; '.laikas($row['time']).'';
                     unset($row);
                     echo '</div>';
                 }
                 echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?i=admin&ka=perved_log').'</div>';
                 echo '<div class="meniuc">Viso pervedimų - <b>'.kiek('perved_log').'</b></div>';
            }else{
                 echo '<div class="meniuc"><font color="red">Pervedimų log\'as tuščias!</font></div>';
            }
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Pervedimų Logas");
	navigacija($g_n);    
        }


else{
            echo '<div class="up">Klaida !</div>';
            echo '<div class="meniuc">Tokios <b>FUNKCIJOS</b>  nėra!</div>';
        }

   
    }








 foot();
?>
    
