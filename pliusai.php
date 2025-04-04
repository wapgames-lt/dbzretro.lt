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
   top(Pliusai);

	if($apie['pliusaib']-time() < 0){
echo' <div class="meniuc">
Neturi licenzijos!</div>';
}
	if($apie['pliusaib']-time() > 0){
    echo '<div class="meniuc">Jūsų saskaitoje: <b>'.sk($apie['pliusai']).' <img src="img/bicons/pliusai.png"></b> </div>
 ';
	echo'
    <div class="meniu"> 
    
 
   
    
      '.$ico.' <a href="?id=eurai">Eurų pirkimas</br></a>
     '.$ico.' <a href="?id=pinigai">Pinigų pirkimas</br></a>
    '.$ico.' <a href="?id=kreditai">Kreditų pirkimas</br></a>
</div>    ';
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Pliusai");
	navigacija($g_n);}


elseif($id == "eurai"){
    online('Leidžia Pliusus');
	top('Eurų pirkimas');
if($apie['pliusaib']-time() < 0){
echo' <div class="meniuc">
Neturi licenzijos!</div>';
}
	if($apie['pliusaib']-time() > 0){
			echo'<div class="meniuc">100 <img src="img/bicons/pliusai.png" />   - 5   <img src="img/bicons/euro.png" />  </div>';
        echo '<div class="meniuc">
        <form action="?id=eurai2" method="post"/>
        Kiek kartų keisite:<br /><input type="text" name="sms_litai"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  }
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","pliusai.php","Pliusai", "Eurų pirkimas");
	navigacija($g_n);
	 
}
if($id =='eurai2'){
		
 top('Eurų pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $sms_litai= isset($_POST['sms_litai']) ? preg_replace("/[^0-9]/","",$_POST['sms_litai']) : null;
            $kainn = $sms_litai*100;
			$kiekis = $sms_litai * 5;
		
            
            if(empty($sms_litai)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['pliusai']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/pliusai.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! nusipirkai '.sk($kiekis).'  <img src="img/bicons/euro.png" /></div>';
	           
	            mysql_query("UPDATE zaidejai SET sms_litai=sms_litai +'$kiekis', pliusai=pliusai-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","pliusai.php","Pliusai", "Eurų pirkimas");
	navigacija($g_n);}
		}
elseif($id == "pinigai"){
    online('Leidžia Pliusus');
	top('Pinigų pirkimas');
if($apie['pliusaib']-time() < 0){
echo' <div class="meniuc">
Neturi licenzijos!</div>';
}
	if($apie['pliusaib']-time() > 0){
			echo'<div class="meniuc">1 <img src="img/bicons/pliusai.png" />   - 100,000   <img src="img/bicons/pinigai.png" />  </div>';
        echo '<div class="meniuc">
        <form action="?id=pinigai2" method="post"/>
        Kiek kartų keisite:<br /><input type="text" name="litai"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  }
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","pliusai.php","Pliusai", "Pinigų pirkimas");
	navigacija($g_n);
	 
}
if($id =='pinigai2'){
		
 top('Pinigų pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $litai= isset($_POST['litai']) ? preg_replace("/[^0-9]/","",$_POST['litai']) : null;
            $kainn = $litai*1;
			$kiekis = $litai * 100000;
		
            
            if(empty($litai)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['pliusai']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/pliusai.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! nusipirkai '.sk($kiekis).'  <img src="img/bicons/pinigai.png" /></div>';
	           
	            mysql_query("UPDATE zaidejai SET litai=litai +'$kiekis', pliusai=pliusai-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","pliusai.php","Pliusai", "Pinigų pirkimas");
	navigacija($g_n);}
		}
elseif($id == "kreditai"){
    online('Leidžia Pliusus');
	top('Kreditų pirkimas');
if($apie['pliusaib']-time() < 0){
echo' <div class="meniuc">
Neturi licenzijos!</div>';
}
	if($apie['pliusaib']-time() > 0){
			echo'<div class="meniuc">10 <img src="img/bicons/pliusai.png" />   - 1  <img src="img/bicons/credit.png" />  </div>';
        echo '<div class="meniuc">
        <form action="?id=kreditai2" method="post"/>
        Kiek eurų išleisite:<br /><input type="text" name="kred"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  }
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","pliusai.php","Pliusai", "Kreditų pirkimas");
	navigacija($g_n);
	 
}
if($id =='kreditai2'){
		
 top('Kreditų pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $kred= isset($_POST['kred']) ? preg_replace("/[^0-9]/","",$_POST['kred']) : null;
            $kainn = $kred*10;
			$kiekis = $kred * 1;
		
            
            if(empty($kred)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['pliusai']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/pliusai.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! nusipirkai '.sk($kiekis).'  <img src="img/bicons/credit.png" /></div>';
	           
	            mysql_query("UPDATE zaidejai SET kred=kred +'$kiekis', pliusai=pliusai-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","pliusai.php","Pliusai", "Kreditų pirkimas");
	navigacija($g_n);}
		}

///// bitcoin gavimas
elseif($id == "bt44"){
    online('Suka varkes');
	top('BitCoin Gavimas');
if($apie['bts']-time() < 0){
echo' <div class="meniuc">
Neturi licenzijos!</div>';
}
	if($apie['bts']-time() > 0){
			echo'<div class="meniuc">200 <img src="img/bicons/bitcoin.png" />   -  30 dienų!<br><b>Gausite  </b><img src="img/bicons/bitcoin.png" /> iš  kovų lauko! </div>';
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
            $kainn = $kiekv*200;
		
            
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
	              mysql_query("UPDATE zaidejai SET bt='$timxx' WHERE nick='$nick' ");
				   mysql_query("UPDATE zaidejai SET bitcoin=bitcoin-'$kainn' WHERE nick='$nick' ");
			  }   
		} }else {
        echo '<div class="meniuc">Paslauga tau dar galios: <b>'.laikas($apie['bitcoin']-time(), 1).'</b></div>';
        }  $g_n[] = array("bitcoin.php?id=","BitCoin","BitCoin gavimas");
	navigacija($g_n);
    }
foot();
?>
