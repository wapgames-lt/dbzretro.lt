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
	 online('Suka varkes..');
   top('BitCoin');

	if((int)$apie['bts']-time() < 0){
echo' <div class="meniuc">
Neturi licenzijos!</div>';
}
	if($apie['bts']-time() > 0){
    echo '<div class="meniuc">Jūsų saskaitoje: <b>'.sk($apie['bitcoin']).' <img src="img/bicons/bitcoin.png"></b> BitCoin.</div>
 ';
	echo'
    <div class="meniu"> 
    
 
   
    
      '.$ico.' <a href="?id=eurai">Eurų pirkimas</br></a>
'.$ico.' <a href="?id=auksiniai">Auksinių pirkimas</br></a>
'.$ico.' <a href="?id=kreditai">Kreditų pirkimas</br></a>
'.$ico.' <a href="?id=pinigai">Pinigų pirkimas</br></a>
    '.$ico.' <a href="?id=bt">BitCoin gavimas</br></a>
</div>    ';
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","BitCoin");
	navigacija($g_n);}


elseif($id == "eurai"){
    online('Leidžia BitCoins');
	top('Eurų pirkimas');
if($apie['bts']-time() < 0){
echo' <div class="meniuc">
Neturi licenzijos!</div>';
}
	if($apie['bts']-time() > 0){
			echo'<div class="meniuc">1 <img src="img/bicons/bitcoin.png" />   - 10   <img src="img/bicons/euro.png" />  </div>';
        echo '<div class="meniuc">
        <form action="?id=eurai2" method="post"/>
        Kiek bitcoin išleisite:<br /><input type="number" name="sms_litai"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  }
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","bitcoin.php","BitCoin", "Eurų pirkimas");
	navigacija($g_n);
	 
}
if($id =='eurai2'){
		
 top('Eurų pirkimas');
    
   
   
          if(isset($_POST['submit'])){
            $sms_litai= isset($_POST['sms_litai']) ? preg_replace("/[^0-9]/","",$_POST['sms_litai']) : null;
            $kainn = $sms_litai;
			$kiekis = $sms_litai * 10;
		
            
            if(empty($sms_litai)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['bitcoin']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/bitcoin.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! nusipirkai '.sk($kiekis).'  <img src="img/bicons/euro.png" /></div>';
	           
	            mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai +'$kiekis', bitcoin=bitcoin-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","bitcoin.php","BitCoin", "Eurų pirkimas");
	navigacija($g_n);}
		}

elseif($id == "auksiniai"){
    online('Leidžia BitCoins');
	top('Auksinių pirkimas');
if($apie['bts']-time() < 0){
echo' <div class="meniuc">
Neturi licenzijos!</div>';
}
	if($apie['bts']-time() > 0){
			echo'<div class="meniuc">1 <img src="img/bicons/bitcoin.png" />   - 1000   <img src="img/bicons/auxo.png" />  </div>';
        echo '<div class="meniuc">
        <form action="?id=auksiniai2" method="post"/>
        Kiek bitcoin išleisite:<br /><input type="number" name="sms_litai"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  }
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","bitcoin.php","BitCoin", "Auksinių pirkimas");
	navigacija($g_n);
	 
}
if($id =='auksiniai2'){
		
 top('Auksinių pirkimas');
    
   
   
          if(isset($_POST['submit'])){
            $sms_litai= isset($_POST['sms_litai']) ? preg_replace("/[^0-9]/","",$_POST['sms_litai']) : null;
            $kainn = $sms_litai;
			$kiekis = $sms_litai * 1000;
		
            
            if(empty($sms_litai)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['bitcoin']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/bitcoin.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai '.sk($kiekis).'  <img src="img/bicons/auxo.png" /></div>';
	           
	            mysqli_query($conn,"UPDATE zaidejai SET auksiniai=auksiniai +'$kiekis', bitcoin=bitcoin-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","bitcoin.php","BitCoin", "Auksinių pirkimas");
	navigacija($g_n);}
		}
elseif($id == "kreditai"){
    online('Leidžia BitCoins');
	top('Kreditų pirkimas');
if($apie['bts']-time() < 0){
echo' <div class="meniuc">
Neturi licenzijos!</div>';
}
	if($apie['bts']-time() > 0){
			echo'<div class="meniuc">1 <img src="img/bicons/bitcoin.png" />   - 100   <img src="img/bicons/credit.png" />  </div>';
        echo '<div class="meniuc">
        <form action="?id=kreditai2" method="post"/>
        Kiek bitcoin išleisite:<br /><input type="number" name="sms_litai"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  }
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","bitcoin.php","BitCoin", "Kreditų pirkimas");
	navigacija($g_n);
	 
}
if($id =='kreditai2'){
		
 top('Kreditų pirkimas');
    
   
   
          if(isset($_POST['submit'])){
            $sms_litai= isset($_POST['sms_litai']) ? preg_replace("/[^0-9]/","",$_POST['sms_litai']) : null;
            $kainn = $sms_litai;
			$kiekis = $sms_litai * 100;
		
            
            if(empty($sms_litai)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['bitcoin']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/bitcoin.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai '.sk($kiekis).'  <img src="img/bicons/credit.png" /></div>';
	           
	            mysqli_query($conn,"UPDATE zaidejai SET kred=kred +'$kiekis', bitcoin=bitcoin-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","bitcoin.php","BitCoin", "Kreditų pirkimas");
	navigacija($g_n);}
		}
elseif($id == "pinigai"){
    online('Leidžia BitCoins');
	top('Pinigų pirkimas');
if($apie['bts']-time() < 0){
echo' <div class="meniuc">
Neturi licenzijos!</div>';
}
	if($apie['bts']-time() > 0){
			echo'<div class="meniuc">1 <img src="img/bicons/bitcoin.png" />   - 500,000,000   <img src="img/bicons/pinigai.png" />  </div>';
        echo '<div class="meniuc">
        <form action="?id=pinigai2" method="post"/>
        Kiek bitcoin išleisite:<br /><input type="number" name="sms_litai"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  }
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","bitcoin.php","BitCoin", "Pinigų pirkimas");
	navigacija($g_n);
	 
}
if($id =='pinigai2'){
		
 top('Pinigų pirkimas');
    
   
   
          if(isset($_POST['submit'])){
            $sms_litai= isset($_POST['sms_litai']) ? preg_replace("/[^0-9]/","",$_POST['sms_litai']) : null;
            $kainn = $sms_litai;
			$kiekis = $sms_litai * 500000000;
		
            
            if(empty($sms_litai)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['bitcoin']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/bitcoin.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai '.sk($kiekis).'  <img src="img/bicons/pinigai.png" /></div>';
	           
	            mysqli_query($conn,"UPDATE zaidejai SET litai=litai +'$kiekis', bitcoin=bitcoin-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","bitcoin.php","BitCoin", "Pinigų pirkimas");
	navigacija($g_n);}
		}

////bt gav

elseif($id == "bt"){
    online('Leidžia BitCoin');
	top('BitCoin');
			echo'<div class="meniuc">BitCoin gavimas kovų lauke mėnesiui!<br>Jo kaina: 300
<img src="img/bicons/bitcoin.png" />
</div>';
        echo '<div class="meniuc">
        <a href="?id=perku_bt">Pirkti</a>	
        </div>';
  
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","bitcoin.php","Bitcoin", "BitCoin Gavimas");
	navigacija($g_n);
	 
}

elseif($id == "perku_bt"){
	 online('Bitcoin');
top('Gavimo pirkimas');
		if($apie['bt']-time() < 0){
	       $timxx = time()+60*60*24*100;    
////

		


		if(($apie['bitcoin']) < '299'){
			
		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/bitcoin.png" />
</div> ';}
else{
				
	echo'	<div class="meniuc">Nusipirkai <img src="img/bicons/bitcoin.png" /> gavimą!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET bitcoin=bitcoin-'300' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE zaidejai SET bt='$timxx' WHERE nick='$nick' ");

}
		}
	elseif($apie['bt']-time() > 0){
                echo '<div class="meniuc">Tu jau turi šią paslaugą!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","bitcoin.php","BitCoin", "Gavimo pirkimas");
	navigacija($g_n);
	

}			


///// bitcoin gavimas
elseif($id == "bt"){
    online('Suka varkes');
	top('BitCoin Gavimas');
if($apie['bts']-time() < 0){
echo' <div class="meniuc">
Neturi licenzijos!</div>';
}
	if($apie['bts']-time() > 0){
			echo'<div class="meniuc">300 <img src="img/bicons/bitcoin.png" />   -  30 dienų!<br><b>Gausite  </b><img src="img/bicons/bitcoin.png" /> iš  kovų lauko! </div>';
        echo '<div class="meniuc">
        <form action="?id=bt2" method="post"/>
        Kiek mėnesių pirksite:<br /><input type="text" name="kiekv"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  }
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","bitcoin.php","BitCoin", "BitCoin gavimas");
	navigacija($g_n);
	 
}
///// bitcoin gavimas

elseif($id == "bt2"){
    online('Suka varkes..');
    top("BitCoingavimas");
  
    if($apie['bt']-time() < 0){
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*300;
		
            
            if(empty($kiekv)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            elseif($apie['bt']-time() > 0){
                echo '<div class="meniuc">Tu jau turi šią paslaugą!</div>';
            }
	          elseif($kainn > $apie['bitcoin']){
	              echo '<div class="meniuc">Neturi pakankamai 
<img src="img/bicons/bitcoin.png" />
</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai
<img src="img/bicons/bitcoin.png" />
 gavimą kovų lauke! </div>';
	              $timxx = time()+60*60*24*30*$kiekv;
	              mysqli_query($conn,"UPDATE zaidejai SET bt='$timxx' WHERE nick='$nick' ");
				   mysqli_query($conn,"UPDATE zaidejai SET bitcoin=bitcoin-'$kainn' WHERE nick='$nick' ");
			  }   
		} }else {
        echo '<div class="meniuc">Paslauga tau dar galios: <b>'.laikas($apie['bitcoin']-time(), 1).'</b></div>';
        }  $g_n[] = array("bitcoin.php?id=","BitCoin","BitCoin gavimas");
	navigacija($g_n);
    }
foot();
?>
