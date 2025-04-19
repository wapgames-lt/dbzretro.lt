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
if($apie['karinokm'] < 4999){

$kodas = rand(1111,9999);
	
	$_SESSION['kd'] = $kodas;

		top('Karino boksto lipime');
echo '<div class="meniuc"><img src="img/imgg/bokstas.png" border="1"></div><div class="meniuc"></br></br>Norint patekti į <b>Karino Bokštą</b> pirma turite į jį užlipti <b></b> !</div>

<div class="meniuc">
<b>Lipti Karino Bokštu</b><br>
 <a href="?id=lipukm&kodas='.$kodas.'">Lipti</a>('.$apie['karinokm'].'/<b>5000</b>)
</div>
<div class="meniuc"><a href="?id=uzlipimas"><b>Užlipti iš karto</a></b>[<b>5</b><img src="img/bicons/cash.png" />]</div>
';
  
}

}

	if($id == "uzlipimas"){
    online('Karino bokstas');
  top('Karino bokstas');
if($apie['botas'] < 5){
echo '<div class="meniuc"><img src="img/imgg/bokstas.png" border="1"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php?id=","Atgal","Karino Bokstas");
echo'</div>';
	navigacija($g_n);
}
else{
	echo '<div class="meniuc"><img src="img/imgg/bokstas.png" border="1"></div>';
echo'<div class="meniuc">Sėkmingai! Užlipote į <b>karino bokštą</b> už <b>5</b><img src="img/bicons/cash.png" />!</div>';
mysqli_query($conn,"UPDATE zaidejai SET karinokm=karinokm+'5000', botas=botas-'5' WHERE nick='$nick'");
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php?id=","Atgal","Karino Bokstas");

	navigacija($g_n);
}
}


if($id == "lipukm"){
    online('Karino bokstas');
  top('Karino bokstas');
$kodas = isset($_GET['kodas']) ? $_GET['kodas'] : null;
      	if($kodas != $_SESSION['kd']){
	echo '<div class="meniuc"><img src="img/imgg/bokstas.png" border="1"></div>';
	echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php?id=","Atgal","Karino Bokstas");

	navigacija($g_n);
	}
	elseif($_SESSION['karino'] > time()){
	echo '<div class="meniuc"><img src="img/imgg/bokstas.png" border="1"></div>';
	echo'<div class="meniuc">Per greit lipi! Lipti galėsi po '.laikas($_SESSION['karino']-time(), 1).'
</div>';
 echo'<div class="meniuc"><a href="?id=lipukm&kodas='.$kodas.'">Lipti toliau</a></div>';
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php?id=","Atgal","Karino Bokstas");

	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION['kd'] = $kodas;
		$_SESSION['karino'] = time()+1;


       echo '<div class="meniuc"><img src="img/imgg/bokstas.png" border="1"></div>';
 echo '<div class="meniuc">Sėkmingai! +<b>10km</b> Išviso užlipęs: <b>'.$apie['karinokm'].'</b>Km!</div>';

mysqli_query($conn,"UPDATE zaidejai SET karinokm=karinokm+'10' WHERE nick='$nick'");
echo'<div class="meniuc"><a href="?id=lipukm&kodas='.$kodas.'">Lipti toliau</a></div>';
}

}







if($id == ""){
  if($apie['karinokm'] > 4999){
  online('Karino bokštas');
  top('Karino bokštas');
    
   
        echo '<div class="meniuc"><img src="img/imgg/bokstas.png"></br>
       Sveikas '.statusas($nick).' aš esu Karinas, noriu tau padėti, gyvybes gali atsipildyti suvalgęs stebuklingą pupą.</div>
        <div class="up">Vietovės</div>
        <div class="meniu">
        <img src=img/imgg/bokstas.png border="1" width="16" height="16">  <a href="karinas.php?id=pupos">Stebuklingos pupos</a><br/>
        <img src=img/imgg/bokstas.png border="1" width="16" height="16"><a href="karinas.php?id=karin">Karino misijos</a><br/>
         <img src=img/imgg/bokstas.png border="1" width="16" height="16"><a href="karinas.php?id=divine">Dieviškasis vanduo</a><br/>
       <img src=img/imgg/bokstas.png border="1" width="16" height="16"><a href="karinas.php?id=potion"><img src="img/boxes/anti2.png">Anti puolimų potion</a><br/>     
        </div>';
   } 
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Karino bokštas");
	navigacija($g_n);
	 
}
if($id == "potion"){
	 online('Potion gaminime');
   top('Potion gaminimas');
	
	
	echo'	<div class="meniuc">Čia gali pasirinkti kokius <b>Potion</b> gaminsite!</div>
	<div class="meniu">

	'.$ico.' <a href="?id=10min"> Gaminti <b><img src="img/boxes/anti2.png">10min</b> anti puolimų potion</a></br>
	'.$ico.' <a href="?id=30min"> Gaminti <b><img src="img/boxes/anti2.png">30min</b> anti puolimų potion</a></br>
'.$ico.' <a href="?id=60min"> Gaminti <b><img src="img/boxes/anti2.png">60min</b> anti puolimų potion</a></br>	
'.$ico.' <a href="?id=180min"> Gaminti <b><img src="img/boxes/anti2.png">3h</b> anti puolimų potion</a></br>
'.$ico.' <a href="?id=6h"> Gaminti <b><img src="img/boxes/anti2.png">6h</b> anti puolimų potion</a></br>
'.$ico.' <a href="?id=12h"> Gaminti <b><img src="img/boxes/anti2.png">12h</b> anti puolimų potion</a></br>
'.$ico.' <a href="?id=24h"> Gaminti <b><img src="img/boxes/anti2.png">24h</b> anti puolimų potion</a></br>

	</div>
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php?id=","Karino bokstas","Potion gaminimas ");
	navigacija($g_n);
		}
if($id == "10min"){
	 online('Potion gaminime');
   top('Potion gaminimas');
	
	
	echo'	<div class="meniuc">Čia galite pasigaminti <b><img src="img/boxes/anti2.png">10min</b> anti puolimų potion!</div>
	<div class="meniuc">
5<b><img src="img/boxes/anti.png">anti potion</b> -  <b><img src="img/boxes/anti2.png">10min</b> anti puolimų potion!</b>!</div>
<div class="meniuc">
<form action="?id=10min2" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Gaminti"/></form>
</div>



	
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php?id=","Karino bokstas","Potion gaminimas");
	navigacija($g_n);
		}
elseif($id == "10min2"){
online('Potion gaminime');
   top('Potion gaminimas');
  
   
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*5;
		
            
            if(empty($kiekv)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv['antipotion']){
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/boxes/anti.png">anti  potion</b> !
</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/boxes/anti.png">Anti Potion</b>, Gavai '.$kiekv.'<img src="img/boxes/anti2.png"> <b>10min Anti puolimų potion</b>!</div>';
	             
	              
				   mysqli_query($conn,"UPDATE inv SET antipotion=antipotion-'$kainn', antipl=antipl+'$kiekv' WHERE nick='$nick' ");
			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php?id=10min","Atgal","Potion gaminime");
	navigacija($g_n);
    }


if($id == "30min"){
	 online('Potion gaminime');
   top('Potion gaminimas');
	
	
	echo'	<div class="meniuc">Čia galite pasigaminti <b><img src="img/boxes/anti2.png">30min</b> anti puolimų potion!</div>
	<div class="meniuc">
10<b><img src="img/boxes/anti.png">anti potion</b> -  <b><img src="img/boxes/anti2.png">30min</b> anti puolimų potion!</b>!</div>
<div class="meniuc">
<form action="?id=30min2" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Gaminti"/></form>
</div>



	
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php?id=","Karino bokstas","Potion gaminimas");
	navigacija($g_n);
		}
elseif($id == "30min2"){
online('Potion gaminime');
   top('Potion gaminimas');
  
   
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*10;
		
            
            if(empty($kiekv)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv['antipotion']){
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/boxes/anti.png">anti  potion</b> !
</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/boxes/anti.png">Anti Potion</b>, Gavai '.$kiekv.'<img src="img/boxes/anti2.png"> <b>30min Anti puolimų potion</b>!</div>';
	             
	              
				   mysqli_query($conn,"UPDATE inv SET antipotion=antipotion-'$kainn', antipl2=antipl2+'$kiekv' WHERE nick='$nick' ");
			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php?id=30min","Atgal","Potion gaminime");
	navigacija($g_n);
    }
if($id == "60min"){
	 online('Potion gaminime');
   top('Potion gaminimas');
	
	
	echo'	<div class="meniuc">Čia galite pasigaminti <b><img src="img/boxes/anti2.png">60min</b> anti puolimų potion!</div>
	<div class="meniuc">
20<b><img src="img/boxes/anti.png">anti potion</b> -  <b><img src="img/boxes/anti2.png">60min</b> anti puolimų potion!</b>!</div>
<div class="meniuc">
<form action="?id=60min2" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Gaminti"/></form>
</div>



	
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php?id=","Karino bokstas","Potion gaminimas");
	navigacija($g_n);
		}
elseif($id == "60min2"){
online('Potion gaminime');
   top('Potion gaminimas');
  
   
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*20;
		
            
            if(empty($kiekv)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv['antipotion']){
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/boxes/anti.png">anti  potion</b> !
</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/boxes/anti.png">Anti Potion</b>, Gavai '.$kiekv.'<img src="img/boxes/anti2.png"> <b>60min Anti puolimų potion</b>!</div>';
	             
	              
				   mysqli_query($conn,"UPDATE inv SET antipotion=antipotion-'$kainn', antipl3=antipl3+'$kiekv' WHERE nick='$nick' ");
			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php?id=60min","Atgal","Potion gaminime");
	navigacija($g_n);
    }
if($id == "180min"){
	 online('Potion gaminime');
   top('Potion gaminimas');
	
	
	echo'	<div class="meniuc">Čia galite pasigaminti <b><img src="img/boxes/anti2.png">3h</b> anti puolimų potion!</div>
	<div class="meniuc">
50<b><img src="img/boxes/anti.png">anti potion</b> -  <b><img src="img/boxes/anti2.png">3h</b> anti puolimų potion!</b>!</div>
<div class="meniuc">
<form action="?id=180min2" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Gaminti"/></form>
</div>



	
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php?id=","Karino bokstas","Potion gaminimas");
	navigacija($g_n);
		}
elseif($id == "180min2"){
online('Potion gaminime');
   top('Potion gaminimas');
  
   
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*50;
		
            
            if(empty($kiekv)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv['antipotion']){
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/boxes/anti.png">anti  potion</b> !
</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/boxes/anti.png">Anti Potion</b>, Gavai '.$kiekv.'<img src="img/boxes/anti2.png"> <b>3h Anti puolimų potion</b>!</div>';
	             
	              
				   mysqli_query($conn,"UPDATE inv SET antipotion=antipotion-'$kainn', antipl4=antipl4+'$kiekv' WHERE nick='$nick' ");
			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php?id=180min","Atgal","Potion gaminime");
	navigacija($g_n);
    }

if($id == "6h"){
	 online('Potion gaminime');
   top('Potion gaminimas');
	
	
	echo'	<div class="meniuc">Čia galite pasigaminti <b><img src="img/boxes/anti2.png">6h</b> anti puolimų potion!</div>
	<div class="meniuc">
90<b><img src="img/boxes/anti.png">anti potion</b> -  <b><img src="img/boxes/anti2.png">6h</b> anti puolimų potion!</b>!</div>
<div class="meniuc">
<form action="?id=6h2" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Gaminti"/></form>
</div>



	
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php?id=","Karino bokstas","Potion gaminimas");
	navigacija($g_n);
		}
elseif($id == "6h2"){
online('Potion gaminime');
   top('Potion gaminimas');
  
   
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*90;
		
            
            if(empty($kiekv)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv['antipotion']){
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/boxes/anti.png">anti  potion</b> !
</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/boxes/anti.png">Anti Potion</b>, Gavai '.$kiekv.'<img src="img/boxes/anti2.png"> <b>6h Anti puolimų potion</b>!</div>';
	             
	              
				   mysqli_query($conn,"UPDATE inv SET antipotion=antipotion-'$kainn', antipl5=antipl5+'$kiekv' WHERE nick='$nick' ");
			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php?id=6h","Atgal","Potion gaminime");
	navigacija($g_n);
    }

if($id == "12h"){
	 online('Potion gaminime');
   top('Potion gaminimas');
	
	
	echo'	<div class="meniuc">Čia galite pasigaminti <b><img src="img/boxes/anti2.png">12h</b> anti puolimų potion!</div>
	<div class="meniuc">
150<b><img src="img/boxes/anti.png">anti potion</b> -  <b><img src="img/boxes/anti2.png">12h</b> anti puolimų potion!</b>!</div>
<div class="meniuc">
<form action="?id=12h2" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Gaminti"/></form>
</div>



	
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php?id=","Karino bokstas","Potion gaminimas");
	navigacija($g_n);
		}
elseif($id == "12h2"){
online('Potion gaminime');
   top('Potion gaminimas');
  
   
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*150;
		
            
            if(empty($kiekv)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv['antipotion']){
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/boxes/anti.png">anti  potion</b> !
</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/boxes/anti.png">Anti Potion</b>, Gavai '.$kiekv.'<img src="img/boxes/anti2.png"> <b>12h Anti puolimų potion</b>!</div>';
	             
	              
				   mysqli_query($conn,"UPDATE inv SET antipotion=antipotion-'$kainn', antipl6=antipl6+'$kiekv' WHERE nick='$nick' ");
			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php?id=12h","Atgal","Potion gaminime");
	navigacija($g_n);
    }
if($id == "24h"){
	 online('Potion gaminime');
   top('Potion gaminimas');
	
	
	echo'	<div class="meniuc">Čia galite pasigaminti <b><img src="img/boxes/anti2.png">24h</b> anti puolimų potion!</div>
	<div class="meniuc">
250<b><img src="img/boxes/anti.png">anti potion</b> -  <b><img src="img/boxes/anti2.png">24h</b> anti puolimų potion!</b>!</div>
<div class="meniuc">
<form action="?id=24h2" method="post"/>
        Kiek keisite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Gaminti"/></form>
</div>



	
	';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php?id=","Karino bokstas","Potion gaminimas");
	navigacija($g_n);
		}
elseif($id == "24h2"){
online('Potion gaminime');
   top('Potion gaminimas');
  
   
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*250;
		
            
            if(empty($kiekv)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            


	          elseif($kainn > $inv['antipotion']){
	              echo '<div class="meniuc">Neturi pakankamai 
<b><img src="img/boxes/anti.png">anti  potion</b> !
</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b><img src="img/boxes/anti.png">Anti Potion</b>, Gavai '.$kiekv.'<img src="img/boxes/anti2.png"> <b>24h Anti puolimų potion</b>!</div>';
	             
	              
				   mysqli_query($conn,"UPDATE inv SET antipotion=antipotion-'$kainn', antipl7=antipl7+'$kiekv' WHERE nick='$nick' ");
			  }   
		 }$g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php?id=24h","Atgal","Potion gaminime");
	navigacija($g_n);
    }
elseif($id == "karin"){
    online('Karino bokštas');
   top('Karino misijos');
       
        echo '<div class="meniuc"><img src="img/karinas.png"></br>';
        echo 'Įvygdęs visas mano duotas misijas gausi gerą atlygį!</div>';
        if($apie['kmis'] >= 11){
            $kmis = 10;
        } else {
            $kmis = $apie['kmis'];
        }
        echo '<div class="title">
        '.$ico.' Tu vygdai <b>'.$kmis.'</b> iš <b>10</b> užduočių.<br/>';
        if($apie['kmis'] >= 11){
            echo ''.$ico.' Įvygdei visas užduotis!';
        } else {
        if($apie['kmis'] == 1){
            echo ''.$ico.' Reikia: <b>2000 Soul!</b><br/>';
        }
        if($apie['kmis'] == 2){
            echo ''.$ico.' Reikia: <b>3000 Stone!</b><br/>';
        }
        if($apie['kmis'] == 3){
            echo ''.$ico.' Reikia: <b>2500000 Jegos!</b><br/>';
        }
        if($apie['kmis'] == 4){
            echo ''.$ico.' Reikia: <b>1250 kreditų!</b><br/>';
        }
        if($apie['kmis'] == 5){
            echo ''.$ico.' Reikia: <b>4000 Microshem!</b><br/>';
        }
        if($apie['kmis'] == 6){
            echo ''.$ico.' Reikia: <b>5000 Sayian Tail!</b><br/>';
        }
        if($apie['kmis'] == 7){
            echo ''.$ico.' Reikia: <b>'.skaicius(5000000000).' pinigų!</b><br/>';
        }
        if($apie['kmis'] == 8){
            echo ''.$ico.' Reikia: <b>6000 Fusion Tail!</b><br/>';
        }
        if($apie['kmis'] == 9){
            echo ''.$ico.' Reikia: <b>Būti 50 lygio!</b><br/>';
        }
        if($apie['kmis'] == 10){
            echo ''.$ico.' Reikia: <b>2mlrd pinigu!</b><br/>';
        }
        echo ''.$ico.' <a href="karinas.php?id=karinn">Vygdyti misiją!</a><br/>';
        }
        echo '</div>';
    
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php", "Karino bokštas", "Karino misijos");
	navigacija($g_n);
	 
}
elseif($id == "karinn"){
    online('Karino bokštas');
   top('Karino misijos');
       
        echo '<div class="meniuc"><img src="img/karinas.png"></div>';
       if($apie['kmis'] > 10) $err = 'Tokios užduoties nėra.';
       elseif($apie['kmis'] < 1) $err = 'Tokios užduoties nėra.';
       elseif($apie['kmis'] == 1 && $inv['Soul'] < 2000) $err = 'Neturi 2000 Soul!';
       elseif($apie['kmis'] == 2 && $inv['Stone'] < 3000) $err = 'Neturi 3000 Stone!';
       elseif($apie['kmis'] == 3 && $apie['jega'] < 2500000) $err = 'Neturi 2500000 Jegos!';
       elseif($apie['kmis'] == 4 && $kreditai < 1250) $err = 'Neturi 1250 kreditų!';
       elseif($apie['kmis'] == 5 && $inv['Microshem'] < 4000) $err = 'Neturi 4000 Microshem!.';
       elseif($apie['kmis'] == 6 && $inv['Sayiantail'] < 5000) $err = 'Neturi 5000 Sayian Tail!';
       elseif($apie['kmis'] == 7 && $apie['litai'] < 5000000000) $err = 'Neturi '.skaicius(5000000000).' pinigu!';
       elseif($apie['kmis'] == 8 && $inv['Fusionfail']  < 6000) $err = 'Neturi 6000 Fusion Tail!';
       elseif($apie['kmis'] == 9 && $lygis < 49) $err = 'Neesi pasiekęs 50 lygio!';
       elseif($apie['kmis'] == 10 && $apie['litai'] < 1999999999) $err = 'Neturi '.skaicius(2000000000).' pinigu!';
       if(!empty($err)){
           echo '<div class="meniuc">'.$err.'</div>';
       } else {
          if($apie['kmis'] == 1){
               $ko = "50 Lygio taškų!";
               mysqli_query($conn,"UPDATE zaidejai SET taskai=taskai+'50' WHERE nick='$nick'");
               mysqli_query($conn,"UPDATE inv SET Soul=Soul-'2000' WHERE nick='$nick'")or die(mysqli_error());
          }
          elseif($apie['kmis'] == 2){
               $ko = "".sk(20000000)." Pinigu!";
                  mysqli_query($conn,"UPDATE inv SET Stone=Stone-'3000' WHERE nick='$nick'")or die(mysqli_error());
               mysqli_query($conn,"UPDATE zaidejai SET litai=litai+'20000000' WHERE nick='$nick'");
          }
          elseif($apie['kmis'] == 3){
               $ko = "15 kreditus!";
               mysqli_query($conn,"UPDATE zaidejai SET  kred=kred+'15' WHERE nick='$nick'");
          }
          elseif($apie['kmis'] == 4){
               $ko = "".sk(2000)." Jėgos!";
               mysqli_query($conn,"UPDATE zaidejai SET jega=jega+'2000', kred=kred-'1250' WHERE nick='$nick'");
          }
          elseif($apie['kmis'] == 5){
               $ko = "".skaicius(9000)." Gynybos!";
              mysqli_query($conn,"UPDATE inv SET Microshem=Microshem-'4000' WHERE nick='$nick'")or die(mysqli_error());
               mysqli_query($conn,"UPDATE zaidejai SET gynyba=gynyba+'9000' WHERE nick='$nick'");
          }
          elseif($apie['kmis'] == 6){
               $ko = "".skaicius(10000)." Gyvybių lygio!";
                 mysqli_query($conn,"UPDATE inv SET Sayiantail=Sayiantail-'5000' WHERE nick='$nick'")or die(mysqli_error());
               mysqli_query($conn,"UPDATE zaidejai SET max_gyvybes=max_gyvybes+'10000' WHERE nick='$nick'");
          }
          elseif($apie['kmis'] == 7){
               $ko = "".sk(100)." kreditų!";
               mysqli_query($conn,"UPDATE zaidejai SET kred=kred+'100', litai=litai-'5000000000' WHERE nick='$nick'");
          }
          elseif($apie['kmis'] == 8){
               $ko = "150mln pinigų!";
               mysqli_query($conn,"UPDATE inv SET Fusionfail=Fusionfail-'6000' WHERE nick='$nick'")or die(mysqli_error());
                mysqli_query($conn,"UPDATE zaidejai SET litai=litai+'150000000' WHERE nick='$nick'")or die(mysqli_error());
          }
          elseif($apie['kmis'] == 9){
               $ko = "150 kreditų ir ".skaicius(400000000)." pinigu!";
               mysqli_query($conn,"UPDATE zaidejai SET litai=litai+'400000000', kred=kred+'150' WHERE nick='$nick'");
          }
          elseif($apie['kmis'] == 10){
               $ko = "2% savo jėgos ir  6% gynybos. bei lazdelę!";
               $jg = $jega * 2/100;
               $gn = $gynyba * 6/100;
               
               mysqli_query($conn,"UPDATE zaidejai SET jega=jega+'$jg, gynyba=gynyba+'$gn' WHERE nick='$nick' ");
			   mysqli_query($conn,"UPDATE zaidejai SET lazdele='+' WHERE nick='$nick' ");
          }
          echo '<div class="meniuc">Užduotis įvygdyta! Gavai '.$ko.'</div>';
          mysqli_query($conn,"UPDATE zaidejai SET kmis=kmis+'1' WHERE nick='$nick' ");
       }

  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php", "Karino bokštas", "Karino misijos");
	navigacija($g_n);
	 
}
if($id =='pupos'){
	top('Pupu pirkimas');
	online('Pupu pirkimas');
	
			echo'<div class="meniuc"><img src="img/beans.png"></br>1<img src="img/bicons/euro.png"> = 1 stebuklingos pupos</div>';
        echo '<div class="titlec">
        <form action="?id=pupos2" method="post"/>
        Kiek kreditu išleisite:<br /><input type="text" name="pupos"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  
    
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php", "Karino bokštas", "Pupu pirkimas");
	navigacija($g_n);
	 
}
if($id =='pupos2'){
		top('Pupu pirkimas');
	online('Pupų pirkimas');
 
    
   
   
        if(isset($_POST['submit'])){
            $pupos= isset($_POST['pupos']) ? preg_replace("/[^0-9]/","",$_POST['pupos']) : null;
   
			$kiekis= $pupos*1;
	

            if(empty($pupos)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kiekis > $apie['sms_litai']){
	              echo '<div class="meniuc">Neturi pakankamai <img src="img/bicons/euro.png"></div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! <br>Nusipirkai <b>'.sk($kiekis*1).' </b> pupų, sumokėjai <b>'.sk($kiekis*1).'</b> '.$eurui.'!</div>';
	           
	            mysqli_query($conn,"UPDATE inv SET Pupos=Pupos +'$kiekis' WHERE nick='$nick'");
				mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'$kiekis' WHERE nick='$nick'")or die(mysqli_error());
			
			  }
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php", "Karino bokštas", "Pupu pirkimas");
	navigacija($g_n);
	 
		}}
		if($id == 'divine'){
			top('Dieviškasis vanduo');
			online('Geria dieviškajį vandenį');
			echo'<div class="meniuc"><img src="img/divine.png"></br>Išgėre dieviškojo vandens gausite <b>Critical stone</b> nuo <b>10</b>-<b>20</b>! <br>Galima gerti kas <b>3 valandas</b>!<br> Išgėrimo kaina: 10 '.$eurui.'</div>
			<div class="meniuc">'.$ico.' <a href="?id=divine2">Gerti</a></div>
			';
			
			
			
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php", "Karino bokštas", "Dieviškasis vanduo");
	navigacija($g_n);
		}
if($id == 'divine2'){
$kiekcrit=rand(10,20);
			top('Dieviškasis vanduo');
			online('Geria dieviškajį vandenį');
		

			if($apie['sms_litai'] < 9){
				
		echo'<div class="meniuc">Nepakanka '.$eurui.' !</div>';
			}
elseif($apie['vandensh']-time() > 0){
	echo'
	<div class="meniuc"><b>Gerti galima kas 3 valandas!</b><br> Gerti galėsi už <b><font color="red">  '.laikas($apie['vandensh']-time(), 1).'</b></font></div>
'; 
}


else{
				$h = $apie['jega'] * 1.00;
				$k = $apie['gynyba'] * 1.00;
					echo'<div class="meniuc">Išgėriai dieviškojo vandens!<br>Ir už tai gauni <b>'.$kiekcrit.'</b> Critical Stone!</div>';
		$laikas = time() + 60 * 60 * 3;
mysqli_query($conn,"UPDATE zaidejai SET vandensh= '$laikas' WHERE nick = '$nick' ")or die(mysqli_error());		
				mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'10' WHERE nick='$nick'");
				mysqli_query($conn,"UPDATE inv SET critical=critical+'$kiekcrit' WHERE nick='$nick'");
				
			

			}
			
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","karinas.php", "Karino bokštas", "Dieviškasis vanduo");
	navigacija($g_n);
		}

	
 foot();
?>
