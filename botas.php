<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();

topbar();
$veikejas = mysql_fetch_assoc(mysql_query("SELECT * FROM veikejas WHERE nick='$nick'"));
if($id == ""){
	 online('Leidžia Vegita Cash');
   top('Vegita Cash');
   	echo'<div class="meniuc"> '.$ico.' <a href="?id=add">Papildyti sąskaita</a></br></div>';
    echo '<div class="meniuc">Jūsų saskaitoje: <b>'.round($apie['botas'],2).'</b>   <img src="img/bicons/cash.png" />   </div>';

    
   
   echo'<div class="meniu"> '.$ico.' <a href="?id=krd">Kreditų pirkimas</a></br>
    '.$ico.' <a href="?id=pinigai">Pinigų pirkimas</a></br>
	
    
    '.$ico.' <a href="?id=euru">Eurų pirkimas</a></br>
  '.$ico.' <a href="?id=auksiniu">Auksinių pirkimas</a></br>
'.$ico.' <a href="?id=bitcoin">BitCoin pirkimas</a></br>
'.$ico.' <a href="?id=vipticket">VIP TICKET pirkimas</a></br>
'.$ico.' <a href="?id=kovine"><b>Kovines galios pirkimas</b></a></br>
'.$ico.' <a href="?id=daiktai">Daiktų pirkimas</a></br>

  '.$ico.' <a href="?id=istorija">Istorijos misijos perėjimas</a></br>
  '.$ico.' <a href="?id=kovos">Kovų misijos perėjimas</a></br>

';



if($apie['botas5x']-time() > 0){
echo'
'.$ico.' <a href="?id=botas5x">Daugiau 
 <img src="img/bicons/pinigai.png" /> ,  <img src="img/bicons/exp.png" /> </a>';
    if($apie['botas5x']-time() > 0){
echo'
(<font color="green"><b>'.laikas($apie["botas5x"]-time(), 1).'</b></font>)<br>';
}
}
if($apie['botas5x']-time() < 0){
echo'
'.$ico.' <a href="?id=botas5x">Daugiau 
 <img src="img/bicons/pinigai.png" /> ,  <img src="img/bicons/exp.png" /> </a>(<font color="red"><b>Neužsakyta</b></font>)<br>';

}
if($apie['20xpin']-time() > 0){
echo'
'.$ico.' <a href="?id=botas20x">Daugiau 
 <img src="img/bicons/pinigai.png" /> ,  <img src="img/bicons/exp.png" /> </a>';
    if($apie['20xpin']-time() > 0){
echo'
(<font color="green"><b>'.laikas($apie["20xpin"]-time(), 1).'</b></font>)<br>';
}
}
if($apie['20xpin']-time() < 0){
echo'
'.$ico.' <a href="?id=botas20x">Daugiau 20x
 <img src="img/bicons/pinigai.png" /> ,  <img src="img/bicons/exp.png" /> </a>(<font color="red"><b>Neužsakyta</b></font>)<br>';

}

echo' '.$ico.' <a href="?id=kefla"><font color="red"><b>Kefla Pirkimas</b></font></a></br>';
echo' '.$ico.' <a href="?id=zamasu"><font color="red"><b>Zamasu Pirkimas</b></font></a></br>';
echo' '.$ico.' <a href="?id=omniking"><font color="red"><b>Omniking Pirkimas</b></font></a></br>';


echo'
	</div>
 
     
    ';

     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Vegita Cash");
	navigacija($g_n);
	
	
		
}
if($id == "add"){
	 online('Perka Vegita Cash');
   top('Vegita Cash Pirkimas Banko Pavedimu');
    

echo'
<div class="meniu" style="text-align: left;">
'.$ico.'Prekė: <b>+300 Vegita Cash </b><img src="img/bicons/cash.png" /> <br/>
'.$ico.'Kaina: <b>5 EUR</b> <br/>
</div>

<div class="meniu" style="text-align: left;">
'.$ico.'Prekė:  <b>+1000 Vegita Cash </b><img src="img/bicons/cash.png" /> <br/>
'.$ico.'Kaina: <b>10 EUR</b><br/>
</div>

<div class="meniu" style="text-align: left;">
'.$ico.'Prekė:  <b>+2500 Vegita Cash </b><img src="img/bicons/cash.png" /> <br/>
'.$ico.'Kaina: <b>20 EUR</b><br/>
</div>
  
  <div class="meniu" style="text-align: left;">
* <b>Dėl pirkimo kreptis pas neofix arba testas1 į PM</b><br/>
</div>
    ';

     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Vegita Cash");
	navigacija($g_n);
	
	
		
}

if($id == "daiktai"){
	 online('Leidžia Vegita Cash');
   top('Vegita Cash');
    
	echo '<div class="meniuc">Jūsų saskaitoje: <b>'.round($apie['botas'],2).'</b>   <img src="img/bicons/cash.png" />   </div>';

    
   
   echo'<div class="meniu">
 '.$ico.' <a href="?id=sayiantail">Sayiantail pirkimas</a></br>
 '.$ico.' <a href="?id=mikro">Mikroskemų pirkimas</a></br>
 '.$ico.' <a href="?id=majin">Majin Scroll pirkimas</a></br>
 '.$ico.' <a href="?id=fusion">Fusion Fail pirkimas</a></br>
 '.$ico.' <a href="?id=stone">Stone pirkimas</a></br>
 '.$ico.' <a href="?id=magic">Magic Ball pirkimas</a></br>
 '.$ico.' <a href="?id=energy">Energy stone pirkimas</a></br>
 '.$ico.' <a href="?id=tobulas">Kario tobulėjimo pirkimas</a></br>
 '.$ico.' <a href="?id=naikinti">Naikinimo galios pirkimas</a></br>
 '.$ico.' <a href="?id=sparnu">Angelo sparnų pirkimas</a></br>
  '.$ico.' <a href="?id=zuvis">Žuvies pirkimas</a></br>
	</div>

 
     
    ';

     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Vegita Cash");
	navigacija($g_n);
	
	
		
}
/// mikro
if($id =='mikro'){
		top('Daiktų pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/cash.png" /> - <b>'.skaicius(50).'</b> Mikroskemų!   </div>';
        echo '<div class="meniuc">
        <form action="?id=mikro2" method="post"/>
        Kiek cash išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Daiktų pirkimas");
	navigacija($g_n);
	 
}
if($id =='mikro2'){
		
 top('Daiktų pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa * 50;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['botas']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/cash.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).' </b> Mikroskemų!</div>';
	    mysql_query("UPDATE zaidejai SET  botas=botas-'$kainn' WHERE nick='$nick' ");       
	            mysql_query("UPDATE inv SET Microshem=Microshem +'$kiekis' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Daiktų pirkimas");
	navigacija($g_n);}
		}
/// Sayiantail
if($id =='sayiantail'){
	top('Daiktų pirkimas');
	echo'<div class="meniuc">1 <img src="img/bicons/cash.png" /> - <b>'.skaicius(150).'</b> Sayiantail!   </div>';
	echo '<div class="meniuc">
        <form action="?id=sayiantail2" method="post"/>
        Kiek cash išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';


	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Daiktų pirkimas");
	navigacija($g_n);

}
if($id =='sayiantail2'){

	top('Daiktų pirkimas');



	if(isset($_POST['submit'])){
		$gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
		$kainn = $gynybaa;
		$kiekis = $gynybaa * 150;


		if(empty($gynybaa)){
			echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
		}


		elseif($kainn > $apie['botas']){
			echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/cash.png" />!</div>';
		} else {
			echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).' </b> Sayiantail!</div>';
			mysql_query("UPDATE zaidejai SET  botas=botas-'$kainn' WHERE nick='$nick' ");
			mysql_query("UPDATE inv SET Sayiantail=Sayiantail +'$kiekis' WHERE nick='$nick' ");
		}

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Daiktų pirkimas");
		navigacija($g_n);}
}
/// mikro
if($id =='majin'){
		top('Daiktų pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/cash.png" /> - <b>'.skaicius(50).'</b> Majin Scroll!   </div>';
        echo '<div class="meniuc">
        <form action="?id=majin2" method="post"/>
        Kiek cash išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Daiktų pirkimas");
	navigacija($g_n);
	 
}
if($id =='majin2'){
		
 top('Daiktų pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa * 50;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['botas']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/cash.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).' </b> Majin Scroll!</div>';
	    mysql_query("UPDATE zaidejai SET  botas=botas-'$kainn' WHERE nick='$nick' ");       
	            mysql_query("UPDATE inv SET Majinsroll=Majinsroll +'$kiekis' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Daiktų pirkimas");
	navigacija($g_n);}
		}
/// mikro
if($id =='fusion'){
		top('Daiktų pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/cash.png" /> - <b>'.skaicius(50).'</b> Fusion Fail!   </div>';
        echo '<div class="meniuc">
        <form action="?id=fusion2" method="post"/>
        Kiek cash išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Daiktų pirkimas");
	navigacija($g_n);
	 
}
if($id =='fusion2'){
		
 top('Daiktų pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa * 50;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['botas']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/cash.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).' </b> Fusion Fail!</div>';
	    mysql_query("UPDATE zaidejai SET  botas=botas-'$kainn' WHERE nick='$nick' ");       
	            mysql_query("UPDATE inv SET Fusionfail=Fusionfail +'$kiekis' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Daiktų pirkimas");
	navigacija($g_n);}
		}
/// stone
if($id =='stone'){
		top('Daiktų pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/cash.png" /> - <b>'.skaicius(50).'</b> Stone!   </div>';
        echo '<div class="meniuc">
        <form action="?id=stone2" method="post"/>
        Kiek cash išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Daiktų pirkimas");
	navigacija($g_n);
	 
}
if($id =='stone2'){
		
 top('Daiktų pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa * 50;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['botas']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/cash.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).' </b> Stone!</div>';
	    mysql_query("UPDATE zaidejai SET  botas=botas-'$kainn' WHERE nick='$nick' ");       
	            mysql_query("UPDATE inv SET Stone=Stone +'$kiekis' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Daiktų pirkimas");
	navigacija($g_n);}
		}
/// magic
if($id =='magic'){
		top('Daiktų pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/cash.png" /> - <b>'.skaicius(50).'</b> Magic ball!   </div>';
        echo '<div class="meniuc">
        <form action="?id=magic2" method="post"/>
        Kiek cash išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Daiktų pirkimas");
	navigacija($g_n);
	 
}
if($id =='magic2'){
		
 top('Daiktų pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa * 50;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['botas']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/cash.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).' </b> Magic ball!</div>';
	    mysql_query("UPDATE zaidejai SET  botas=botas-'$kainn' WHERE nick='$nick' ");       
	            mysql_query("UPDATE inv SET Magicball=Magicball +'$kiekis' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Daiktų pirkimas");
	navigacija($g_n);}
		}

/// energy
if($id =='energy'){
		top('Daiktų pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/cash.png" /> - <b>'.skaicius(50).'</b> Energy stone!   </div>';
        echo '<div class="meniuc">
        <form action="?id=energy2" method="post"/>
        Kiek cash išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Daiktų pirkimas");
	navigacija($g_n);
	 
}
if($id =='energy2'){
		
 top('Daiktų pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa * 50;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['botas']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/cash.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).' </b> Energy stone!</div>';
	    mysql_query("UPDATE zaidejai SET  botas=botas-'$kainn' WHERE nick='$nick' ");       
	            mysql_query("UPDATE inv SET Energystone=Energystone+'$kiekis' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Daiktų pirkimas");
	navigacija($g_n);}
		}

/// tobulėjimas
if($id =='tobulas'){
		top('Daiktų pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/cash.png" /> - <b>'.skaicius(50).'</b> Kario tobulėjimo!   </div>';
        echo '<div class="meniuc">
        <form action="?id=tobulas2" method="post"/>
        Kiek cash išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Daiktų pirkimas");
	navigacija($g_n);
	 
}
if($id =='tobulas2'){
		
 top('Daiktų pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa * 50;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['botas']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/cash.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).' </b> Kario tobulėjimo!</div>';
	    mysql_query("UPDATE zaidejai SET  botas=botas-'$kainn' WHERE nick='$nick' ");       
	            mysql_query("UPDATE inv SET tobulas=tobulas+'$kiekis' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Daiktų pirkimas");
	navigacija($g_n);}
		}
/// naikinimo galios
if($id =='naikinti'){
		top('Daiktų pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/cash.png" /> - <b>'.skaicius(50).'</b> Naikinimo galios!   </div>';
        echo '<div class="meniuc">
        <form action="?id=naikinti2" method="post"/>
        Kiek cash išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Daiktų pirkimas");
	navigacija($g_n);
	 
}
if($id =='naikinti2'){
		
 top('Daiktų pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa * 50;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['botas']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/cash.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).' </b> Naikinimo galios!</div>';
	    mysql_query("UPDATE zaidejai SET  botas=botas-'$kainn' WHERE nick='$nick' ");       
	            mysql_query("UPDATE inv SET naikinti=naikinti+'$kiekis' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Daiktų pirkimas");
	navigacija($g_n);}
		}
/// angelo sparnu
if($id =='sparnu'){
		top('Daiktų pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/cash.png" /> - <b>'.skaicius(50).'</b> Angelo sparnų!   </div>';
        echo '<div class="meniuc">
        <form action="?id=sparnu2" method="post"/>
        Kiek cash išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Daiktų pirkimas");
	navigacija($g_n);
	 
}
if($id =='sparnu2'){
		
 top('Daiktų pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa * 50;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['botas']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/cash.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).' </b> Angelo sparnų!</div>';
	    mysql_query("UPDATE zaidejai SET  botas=botas-'$kainn' WHERE nick='$nick' ");       
	            mysql_query("UPDATE inv SET angelwing=angelwing+'$kiekis' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Daiktų pirkimas");
	navigacija($g_n);}
		}



/// zuvis
if($id =='zuvis'){
	top('Daiktų pirkimas > Žuvis');
	echo'<div class="meniuc">1 <img src="img/bicons/cash.png" /> - <b>'.skaicius(50).'</b> Žuvies!   </div>';
	echo '<div class="meniuc">
        <form action="?id=zuvis2" method="post"/>
        Kiek cash išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';


	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Daiktų pirkimas");
	navigacija($g_n);

}
if($id =='zuvis2'){

	top('Daiktų pirkimas > Žuvis');



	if(isset($_POST['submit'])){
		$gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
		$kainn = $gynybaa;
		$kiekis = $gynybaa * 50;


		if(empty($gynybaa)){
			echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
		}


		elseif($kainn > $apie['botas']){
			echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/cash.png" />!</div>';
		} else {
			echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).' </b> Žyvues!</div>';
			mysql_query("UPDATE zaidejai SET  botas=botas-'$kainn' WHERE nick='$nick' ");
			mysql_query("UPDATE inv SET Zuvis=Zuvis+'$kiekis' WHERE nick='$nick' ");
		}

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Daiktų pirkimas");
		navigacija($g_n);}
}


///daugiau pinigu ir exp
elseif($id == "botas5x"){
    online('Leidžia Vegita Cash');
	top('Daugiau pinigų ir exp');
			echo'<div class="meniuc">10 <img src="img/bicons/cash.png" />   -  1 Para<br><b>Gausite <b>5 kartus daugiau</b>  </b><img src="img/bicons/pinigai.png" />,   <img src="img/bicons/exp.png" />  kovų lauke. </div>';
        echo '<div class="meniuc">
        <form action="?id=botas5x2" method="post"/>
        Kiek pirksite parų?<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
 

$g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Daugiau pinigų ir exp");
	navigacija($g_n);
	 
}


// 2x pin ir exp pirkimas
elseif($id == "botas5x2"){
    online('Leidžia Vegita Cash');
    top("Daugiau pinigų ir exp gavimas");
  
    if($apie['botas5x']-time() < 0){
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*10;
		
            
            if(empty($kiekv)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            elseif($apie['botas5x']-time() > 0){
                echo '<div class="meniuc">Tu jau turi šią paslaugą!</div>';
            }


	          elseif($kainn > $apie['botas']){
	              echo '<div class="meniuc">Neturi pakankamai 
<img src="img/bicons/cash.png" />
</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>5 kartus daugiau</b> '.$pinigaii.' , .'.$expi.' gavimą kovų lauke! </div>';
	              $timxx = time()+60*60*24*$kiekv;
	              mysql_query("UPDATE zaidejai SET botas5x='$timxx' WHERE nick='$nick' ");
				   mysql_query("UPDATE zaidejai SET botas=botas-'$kainn' WHERE nick='$nick' ");
			  }   
		} }else {
        echo '<div class="meniuc">Paslauga tau dar galios: <b>'.laikas($apie['botas5x']-time(), 1).'</b></div>';
        }  $g_n[] = array("botas.php?id=","Vegita Cash","5x pinigų ir exp gavimas");
	navigacija($g_n);
    }


/// 20x daugiau pinigu ir exp
elseif($id == "botas20x"){
    online('Leidžia Vegita Cash');
	top('Daugiau pinigų ir exp');
			echo'<div class="meniuc">150 <img src="img/bicons/cash.png" />   -  1 Para<br><b>Gausite <b>20 kartų daugiau</b>  </b><img src="img/bicons/pinigai.png" />,   <img src="img/bicons/exp.png" />  kovų lauke. </div>';
        echo '<div class="meniuc">
        <form action="?id=botas20x2" method="post"/>
        Kiek pirksite parų?<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
 

$g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "20x Daugiau pinigų ir exp");
	navigacija($g_n);
	 
}


// 20x pin ir exp pirkimas
elseif($id == "botas20x2"){
    online('Leidžia Vegita Cash');
    top("20x Daugiau pinigų ir exp gavimas");
  
    if($apie['20xpin']-time() < 0){
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*150;
		
            
            if(empty($kiekv)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            elseif($apie['20xpin']-time() > 0){
                echo '<div class="meniuc">Tu jau turi šią paslaugą!</div>';
            }


	          elseif($kainn > $apie['botas']){
	              echo '<div class="meniuc">Neturi pakankamai 
<img src="img/bicons/cash.png" />
</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>20 kartu daugiau</b> '.$pinigaii.' , .'.$expi.' gavimą kovų lauke! </div>';
	              $timxx = time()+60*60*24*$kiekv;
	              mysql_query("UPDATE zaidejai SET 20xpin='$timxx' WHERE nick='$nick' ");
				   mysql_query("UPDATE zaidejai SET botas=botas-'$kainn' WHERE nick='$nick' ");
			  }   
		} }else {
        echo '<div class="meniuc">Paslauga tau dar galios: <b>'.laikas($apie['20xpin']-time(), 1).'</b></div>';
        }  $g_n[] = array("botas.php?id=","Vegita Cash","20x pinigų ir exp gavimas");
	navigacija($g_n);
    }



elseif($id == "kefla"){
						top('Kefla');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b>Kefla</b><br/>
'.$ico2.' Jėga:<b> +6500%</b><br/>
'.$ico2.' Gynyba:<b> +6500%</b><br/>
'.$ico2.' Gyvybes:<b> +6500%</b><br/>
'.$ico2.' Veikėjo kaina: <font color="green">     <b> 1,000 <img src="img/bicons/cash.png" /> </b></font><br>
'.$ico2.' Unikali savybė:  <font color="green">    <b> iš kovų gauna 15 kart daugiau <img src="img/bicons/pinigai.png" />    </b><br/></font>
</b><br/>

		<td>
		<img src="img/veikejai/Kefla-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="?id=perku_kefla">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Kefla");
	navigacija($g_n);


}
elseif($id == "perku_kefla"){
	top('Kefla');
	 online('Leidžia Vegita Cash');

		if($apie['keflab']-time() < 0){
	       $timxx = time()+60*60*24*1000;      

		if($apie['botas'] < 999){
	echo'	<div class="meniuc"><img src="img/veikejai/Kefla-0.png"></div> ';
		echo'<div class="meniuc">
  Neužtenka <img src="img/bicons/cash.png" /> !</div>';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Kefla-0.png"></div> 
<div class="meniuc">
Nusipirkai už 1000 <img src="img/bicons/cash.png"> 
 !</div> ';		

	mysql_query("UPDATE zaidejai SET veikejas='Kefla', trans='0', botas=botas-'1000' , kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		
	              mysql_query("UPDATE zaidejai SET keflab='$timxx' WHERE nick='$nick' ");
	
}
			}

	elseif($apie['keflab']-time() > 0){
	echo'	<div class="meniuc"><img src="img/veikejai/Kefla-0.png"></div>';

                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}

elseif($id == "zamasu"){
						top('Zamasu');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b>Zamasu</b><br/>
'.$ico2.' Jėga:<b> +8500%</b><br/>
'.$ico2.' Gynyba:<b> +8500%</b><br/>
'.$ico2.' Gyvybes:<b> +8500%</b><br/>
'.$ico2.' Veikėjo kaina: <font color="green">     <b> 1,500 <img src="img/bicons/cash.png" /> </b></font><br>
'.$ico2.' Unikali savybė:  <font color="green">    <b> iš kovų gauna 50 kart daugiau <img src="img/bicons/pinigai.png" />    </b><br/></font>
</b><br/>

		<td>
		<img src="img/veikejai/Zamasu-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="?id=perku_zamasu">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Zamasu");
	navigacija($g_n);


}
elseif($id == "perku_zamasu"){
	top('Zamasu');
	 online('Leidžia Vegita Cash');

		if($apie['zamasub']-time() < 0){
	       $timxx = time()+60*60*24*1000;      

		if($apie['botas'] < 1499){
	echo'	<div class="meniuc"><img src="img/veikejai/Zamasu-0.png"></div> ';
		echo'<div class="meniuc">
  Neužtenka <img src="img/bicons/cash.png" /> !</div>';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Zamasu-0.png"></div> 
<div class="meniuc">
Nusipirkai už 1,500 <img src="img/bicons/cash.png"> 
 !</div> ';		

	mysql_query("UPDATE zaidejai SET veikejas='Zamasu', trans='0', botas=botas-'1500' , kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		
	              mysql_query("UPDATE zaidejai SET zamasub='$timxx' WHERE nick='$nick' ");
	
}
			}

	elseif($apie['zamasub']-time() > 0){
	echo'	<div class="meniuc"><img src="img/veikejai/Zamasu-0.png"></div>';

                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}


elseif($id == "omniking"){
						top('omniking');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b>OmniKing</b><br/>
'.$ico2.' Jėga:<b> +15500%</b><br/>
'.$ico2.' Gynyba:<b> +15500%</b><br/>
'.$ico2.' Gyvybes:<b> +15500%</b><br/>
'.$ico2.' Veikėjo kaina: <font color="green">     <b> 3,500 <img src="img/bicons/cash.png" /> </b></font><br>
'.$ico2.' Unikali savybė:  <font color="green">    <b> iš kovų gauna 50 kart daugiau <img src="img/bicons/pinigai.png" />    </b><br/></font>
</b><br/>

		<td>
		<img src="img/veikejai/Omniking-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="?id=perku_omniking">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "OmniKing");
	navigacija($g_n);


}
elseif($id == "perku_omniking"){
	top('omniking');
	 online('Leidžia Vegita Cash');

		if($apie['omniking']-time() < 0){
	       $timxx = time()+60*60*24*1000;      

		if($apie['botas'] < 3499){
	echo'	<div class="meniuc"><img src="img/veikejai/Omniking-0.png"></div> ';
		echo'<div class="meniuc">
  Neužtenka <img src="img/bicons/cash.png" /> !</div>';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Omniking-0.png"></div> 
<div class="meniuc">
Nusipirkai už 3,500 <img src="img/bicons/cash.png"> 
 !</div> ';		

	mysql_query("UPDATE zaidejai SET veikejas='omniking', trans='0', botas=botas-'3500' , kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		
	              mysql_query("UPDATE zaidejai SET omnikingb='$timxx' WHERE nick='$nick' ");
	
}
			}

	elseif($apie['omnikingb']-time() > 0){
	echo'	<div class="meniuc"><img src="img/veikejai/Omniking-0.png"></div>';

                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}




if($id =='pinigai'){
		top('Pinigų pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/cash.png" /> - <b>'.skaicius(1000000000).'</b> <img src="img/bicons/pinigai.png" />    </div>';
        echo '<div class="meniuc">
        <form action="?id=pinigai2" method="post"/>
        Kiek cash išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Pinigų pirkimas");
	navigacija($g_n);
	 
}
if($id =='pinigai2'){
		
 top('Pinigų pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa * 1000000000;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['botas']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/cash.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).' </b><img src="img/bicons/pinigai.png" /></div>';
	           
	            mysql_query("UPDATE zaidejai SET litai=litai +'$kiekis', botas=botas-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Pinigų pirkimas");
	navigacija($g_n);}
		}


if($id =='euru'){
		top('Eurų pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/cash.png" /> - <b>'.skaicius(250).'</b> <img src="img/bicons/euro.png" />    </div>';
        echo '<div class="meniuc">
        <form action="?id=euru2" method="post"/>
        Kiek cash išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Eurų pirkimas");
	navigacija($g_n);
	 
}
if($id =='euru2'){
		
 top('Eurų pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa * 250;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['botas']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/cash.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).'  </b><img src="img/bicons/euro.png" /></div>';
	           
	            mysql_query("UPDATE zaidejai SET sms_litai=sms_litai +'$kiekis', botas=botas-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Eurų pirkimas");
	navigacija($g_n);}
		}
if($id =='krd'){
		top('Kreditų pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/cash.png" /> - <b>'.skaicius(250).'</b> <img src="img/bicons/credit.png" />    </div>';
        echo '<div class="meniuc">
        <form action="?id=krd2" method="post"/>
        Kiek cash išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Kreditų pirkimas");
	navigacija($g_n);
	 
}
if($id =='krd2'){
		
 top('Kreditų pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa * 250;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['botas']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/cash.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).' </b> <img src="img/bicons/credit.png" /></div>';
	           
	            mysql_query("UPDATE zaidejai SET kred=kred +'$kiekis', botas=botas-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Kreditų pirkimas");
	navigacija($g_n);}
		}
if($id =='istorija'){
		top('Istorijos misijos perėjimas');
			echo'<div class="meniuc">Nenori naudoti daiktų ar jų neturi istorijos misijai? Gali pereiti misiją už <b>5</b><img src="img/bicons/cash.png" /> <br><b>P.S</b> jei praleidžiate misiją už <img src="img/bicons/cash.png" /> atlygio negausite!   </div>';
        echo '<div class="meniuc">
        <form action="?id=istorija2" method="post"/>
        Kiek misijų praleisite?:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Istorijos misijų perėjimas");
	navigacija($g_n);
	 
}
if($id =='istorija2'){
		
 top('Istorijos misijos perėjimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa*5;
			$kiekis = $gynybaa * 1;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['botas']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/cash.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Praleidai sėkmingai <b> '.sk($kiekis).' </b>Istorijos misijas!</div>';
	           
	            mysql_query("UPDATE zaidejai SET istorija=istorija+'$kiekis', botas=botas-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Istorijos misijų perėjimas");
	navigacija($g_n);}
		}
if($id =='kovos'){
		top('Kovų misijų perėjimas');
			echo'<div class="meniuc">Neturi pakankamai <b>KG</b> ir nori pereiti kovų misiją? Gali pereiti misiją už <b>3</b><img src="img/bicons/cash.png" /> <br><b>P.S</b> jei praleidžiate misiją su atlygiu už <img src="img/bicons/cash.png" /> atlygio negausite!   </div>';
        echo '<div class="meniuc">
        <form action="?id=kovos2" method="post"/>
        Kiek misijų praleisite?:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Kovų misijų perėjimas");
	navigacija($g_n);
	 
}
if($id =='kovos2'){
		
 top('Kovų misijų perėjimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa*3;
			$kiekis = $gynybaa * 1;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['botas']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/cash.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Praleidai sėkmingai <b> '.sk($kiekis).' </b>Kovų misijas!</div>';
	           
	            mysql_query("UPDATE zaidejai SET istorija=istorija+'$kiekis', botas=botas-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Kovų misijų perėjimas");
	navigacija($g_n);}
		}
if($id =='auksiniu'){
		top('Auksinių pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/cash.png" /> - <b>'.skaicius(10000).'</b> <img src="img/bicons/auxo.png" />    </div>';
        echo '<div class="meniuc">
        <form action="?id=auksiniu2" method="post"/>
        Kiek cash išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Auksinių pirkimas");
	navigacija($g_n);
	 
}
if($id =='auksiniu2'){
		
 top('Auksinių pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa * 10000;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['botas']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/cash.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).' </b> <img src="img/bicons/auxo.png" /></div>';
	           
	            mysql_query("UPDATE zaidejai SET auksiniai=auksiniai+'$kiekis', botas=botas-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Auksinių pirkimas");
	navigacija($g_n);}
		}
if($id =='bitcoin'){
		top('BitCoin pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/cash.png" /> - <b>'.skaicius(15).'</b> <img src="img/bicons/bitcoin.png" />    </div>';
        echo '<div class="meniuc">
        <form action="?id=bitcoin2" method="post"/>
        Kiek cash išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "BitCoin pirkimas");
	navigacija($g_n);
	 
}
if($id =='bitcoin2'){
		
 top('BitCoin pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa * 15;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['botas']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/cash.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).' </b> <img src="img/bicons/bitcoin.png" /></div>';
	           
	            mysql_query("UPDATE zaidejai SET bitcoin=bitcoin+'$kiekis', botas=botas-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "Auksinių pirkimas");
	navigacija($g_n);}
		}
		if($id =='vipticket'){
		top('VIP TICKET pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/cash.png" /> - <b>'.skaicius(1500).'</b> <img src="img/bicons/vipt.png" />    </div>';
        echo '<div class="meniuc">
        <form action="?id=vipticket2" method="post"/>
        Kiek cash išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "VIP TICKET pirkimas");
	navigacija($g_n);
	 
}
if($id =='vipticket2'){
		
 top('BitCoin pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa * 1500;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['botas']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/cash.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).' </b> <img src="img/bicons/vipt.png" /></div>';
	           
	            mysql_query("UPDATE zaidejai SET vipticket=vipticket+'$kiekis', botas=botas-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","botas.php","Vegita Cash", "VIP TICKET pirkimas");
	navigacija($g_n);}
		}

if($id == "kovine"){
	 online('Leidžia Vegita Cash');
   top('Vegita Cash');
    
	echo '<div class="meniuc">Jūsų saskaitoje: <b>'.round($apie['botas'],2).'</b>   <img src="img/bicons/cash.png" />   </div>';

    echo'<div class="up">Jėgos pirkimas</div>';
   
  echo'<div class="meniu">
 '.$ico.' <a href="?id=jegos&co=1">15% Jėgos [<b>5 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br>
 '.$ico.' <a href="?id=jegos&co=2">20% Jėgos [<b>10 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br>
 '.$ico.' <a href="?id=jegos&co=3">25% Jėgos [<b>15 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br>
 '.$ico.' <a href="?id=jegos&co=4">30% Jėgos [<b>20 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br>
 '.$ico.' <a href="?id=jegos&co=5">35% Jėgos [<b>25 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br>
 '.$ico.' <a href="?id=jegos&co=6">40% Jėgos [<b>30 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br>
 '.$ico.' <a href="?id=jegos&co=7">45% Jėgos [<b>35 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br>
 '.$ico.' <a href="?id=jegos&co=8">60% Jėgos [<b>50 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br>
 '.$ico.' <a href="?id=jegos&co=9">65% Jėgos [<b>55 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br>
 '.$ico.' <a href="?id=jegos&co=10">70% Jėgos [<b>60 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br>
 '.$ico.' <a href="?id=jegos&co=11">75% Jėgos [<b>65 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br>
 '.$ico.' <a href="?id=jegos&co=12">100% Jėgos [<b>90 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br></div>';
 
	echo'<div class="up">Gynybos pirkimas</div>';
  echo'<div class="meniu">
 '.$ico.' <a href="?id=gynybos&co=1">15% Gynybos [<b>5 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br>
 '.$ico.' <a href="?id=gynybos&co=2">20% Gynybos [<b>10 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br>
 '.$ico.' <a href="?id=gynybos&co=3">25% Gynybos [<b>15 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br>
 '.$ico.' <a href="?id=gynybos&co=4">30% Gynybos [<b>20 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br>
 '.$ico.' <a href="?id=gynybos&co=5">35% Gynybos [<b>25 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br>
 '.$ico.' <a href="?id=gynybos&co=6">40% Gynybos [<b>30 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br>
 '.$ico.' <a href="?id=gynybos&co=7">45% Gynybos [<b>35 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br>
 '.$ico.' <a href="?id=gynybos&co=8">60% Gynybos [<b>50 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br>
 '.$ico.' <a href="?id=gynybos&co=9">65% Gynybos [<b>55 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br>
 '.$ico.' <a href="?id=gynybos&co=10">70% Gynybos [<b>60 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br>
 '.$ico.' <a href="?id=gynybos&co=11">75% Gynybos [<b>65 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br>
 '.$ico.' <a href="?id=gynybos&co=12">100% Gynybos [<b>90 Vegita Cash</b> <img src="img/bicons/cash.png" />]</a></br></div>';

     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Vegita Cash");
	navigacija($g_n);
		
}
if($id == "jegos"){
	online('Leidžia Vegita Cash');
 echo'<div class="up">Jėgos pirkimas</div>';
 if($co == 1){$kaina = 5;$kiek = 15;}
 if($co == 2){$kaina = 10;$kiek = 20;}
 if($co == 3){$kaina = 15;$kiek = 25;}
 if($co == 4){$kaina = 20;$kiek = 30;}
 if($co == 5){$kaina = 25;$kiek = 35;}
 if($co == 6){$kaina = 30;$kiek = 40;}
 if($co == 7){$kaina = 35;$kiek = 45;}
 if($co == 8){$kaina = 50;$kiek = 60;}
 if($co == 9){$kaina = 55;$kiek = 65;}
 if($co == 10){$kaina = 60;$kiek = 70;}
 if($co == 11){$kaina = 65;$kiek = 75;}
 if($co == 12){$kaina = 90;$kiek = 100;}
 if($co > 12 or $co < 1){echo '<div class="error">Tokios prekės nėra.</div>';}
 elseif($kaina > $apie['botas']){echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/cash.png" />!</div>';}

 else {
 $kiekj = ($jega / 100) * $kiek;
 $kiekk = $kiekj;
 echo '<div class="meniuc">Atlikta, nusipirkai <b>'.sk($kiekk).'</b> Jėgos.</div>';mysql_query("UPDATE zaidejai SET botas=botas-'$kaina', jega=jega+'$kiekj' WHERE nick='$nick'");}
      $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Vegita Cash");
	navigacija($g_n);
 }
 if($id == "gynybos"){
	online('Leidžia Vegita Cash');
 echo'<div class="up">Gynybos pirkimas</div>';
 if($co == 1){$kaina = 5;$kiek = 15;}
 if($co == 2){$kaina = 10;$kiek = 20;}
 if($co == 3){$kaina = 15;$kiek = 25;}
 if($co == 4){$kaina = 20;$kiek = 30;}
 if($co == 5){$kaina = 25;$kiek = 35;}
 if($co == 6){$kaina = 30;$kiek = 40;}
 if($co == 7){$kaina = 35;$kiek = 45;}
 if($co == 8){$kaina = 50;$kiek = 60;}
 if($co == 9){$kaina = 55;$kiek = 65;}
 if($co == 10){$kaina = 60;$kiek = 70;}
 if($co == 11){$kaina = 65;$kiek = 75;}
 if($co == 12){$kaina = 90;$kiek = 100;}
 if($co > 12 or $co < 1){echo '<div class="error">Tokios prekės nėra.</div>';}
 elseif($kaina > $apie['botas']){echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/cash.png" />!</div>';}

 else {
 $kiekg = ($gynyba / 100) * $kiek;
 $kiekk = $kiekg;
 echo '<div class="meniuc">Atlikta, nusipirkai <b>'.sk($kiekk).'</b> Gynybos.</div>';mysql_query("UPDATE zaidejai SET botas=botas-'$kaina', gynyba=gynyba+'$kiekg' WHERE nick='$nick'");}
      $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Vegita Cash");
	navigacija($g_n);
 }

foot();
?>
