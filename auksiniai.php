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
	 online('Auksiniai');
   top('Auksiniai');
    echo '<div class="meniuc">Jūsų saskaitoje: <b>'.sk($apie['auksiniai']).' <img src="img/coin.png"></b> auksinių.</div>
 ';
	echo'
    <div class="meniu"> 
    
 
   
    
      '.$ico.' <a href="?id=krd"> Kreditų pirkimas</a></br>
'.$ico.' <a href="?id=eurai"> Eurų pirkimas</a></br>
'.$ico.' <a href="?id=dball"> Drakono rutulių pirkimas</a></br>
'.$ico.' <a href="?id=jball"> Juodųjųų drakono rutulių pirkimas</a></br>

     
'.$ico.' <a href="?id=fussion">Fusion omega cooler [25000  <img src="img/coin.png">]</a></br>
 
      
'.$ico.' <a href="?id=sidra">Sidra [100000  <img src="img/coin.png">]</a></br>
    
    '.$ico.' <a href="?id=bgoku">Black Goku Rose [200000  <img src="img/coin.png">]</a></br>
     '.$ico.' <a href="?id=hopp">Hopp ['.skaicius(1000000).' <img src="img/coin.png">]</a></br>   
    '.$ico.' <a href="?id=goku">Final goku gods ['.skaicius(5000000).'  <img src="img/coin.png">]</a></br>
</div>    ';
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Auksiniai");
	navigacija($g_n);}
    





	if($id == 'kgggg'){
		top('Auksinių keitimas');
		if($apie['auksiniai'] < 10000){
			
			echo "<div class='meniuc'>Neturi 10000 <img src='img/coin.png'></div>";
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php", "Auksiniai", "Klaida");
	navigacija($g_n);
		}else{
			
			
			$je = $apie['jega'] * 1.02;
			$gy = $apie['gynyba'] * 1.06;
			mysqli_query($conn,"UPDATE zaidejai SET jega='$je', gynyba ='$gy', auksiniai =auksiniai-'10000' WHERE nick='$nick'");
			echo'<div class="meniuc">Įgavai 2% kovinės galios!     </div>';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php", "Auksiniai", "Auksinių keitimas");
	navigacija($g_n);		}
		
	}


	if($id == 'ball2'){
		top('Auksinių keitimas');
		if($apie['auksiniai'] < 1000){
			
			echo "<div class='meniuc'>Neturi 1000 auksinių</div>";
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php", "Auksiniai", "Klaida");
	navigacija($g_n);}
		elseif($ID > 7 OR $ID < 1){
			
		
			echo "<div class='meniuc'>Klaida</div>";
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php", "Auksiniai", "Klaida");
		}else{
			
		
			mysqli_query($conn,"UPDATE zaidejai SET auksiniai = auksiniai-'1000' WHERE nick='$nick'");
				mysqli_query($conn,"UPDATE inv SET Dball".$ID."=Dball".$ID."+'1' WHERE nick='$nick'");
			
			echo'<div class="meniuc">Gavai drakono rutulį</div>';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php", "Auksiniai", "Auksinių keitimas");
	navigacija($g_n);		}
		
	}
if($id == 'jbaljjl'){
		top('Auksinių keitimas');
		if($apie['auksiniai'] < 2000){
			
			echo "<div class='meniuc'>Neturi 2000 auksinių</div>";
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php", "Auksiniai", "Klaida");
	navigacija($g_n);
		}else{
			
		
			mysqli_query($conn,"UPDATE zaidejai SET auksiniai = auksiniai-'2000' WHERE nick='$nick'");
				mysqli_query($conn,"UPDATE inv SET Jball =Jball+'1' WHERE nick='$nick'");
			
			echo'<div class="meniuc">Gavai juodajį drakono rutulį</div>';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php", "Auksiniai", "Auksinių keitimas");
	navigacija($g_n);		}
		
	}

if($id == 'nballkk'){
		top('Auksinių keitimas');
		if($apie['auksiniai'] < 3000){
			
			echo "<div class='meniuc'>Neturi 3000 auksinių</div>";
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php", "Auksiniai", "Klaida");
	navigacija($g_n);
		}else{
			
		
			mysqli_query($conn,"UPDATE zaidejai SET auksiniai = auksiniai-'3000' WHERE nick='$nick'");
				mysqli_query($conn,"UPDATE inv SET Nball =Nball+'1' WHERE nick='$nick'");
			
			echo'<div class="meniuc">Gavai namek drakono ruTulį,/�iv>';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php", "Auksiniai", "Auksinių keitimas");
	navigacija($g_n);		}
		
	}
	if($id == "goku"){
						top('Goku');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Final goku gods</b><br/>
'.$ico2.' Jėga:<b> +1000%</b><br/>
'.$ico2.' Gynyba:<b> +1000%</b><br/>
'.$ico2.' Gyvybes:<b> +1000%</b><br/>
'.$ico2.' Veikėjo kaina:<b> 5,000,000 <img src="img/coin.png"></b><br/>

		<td>
		<img src="img/veikejai/Final goku gods-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="?id=goku2">Pirkti šį veikėją</a></b></div>
		
		
		';
		
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php", "Auksiniai", "Final goku gods");
	navigacija($g_n);	


}
elseif($id == "goku2"){
	top('Goku');
	 online('Auksiniai');

			if($apie['finalgokub']-time() < 0){
	       $timxx = time()+60*60*24*1000;    
////
		
//

		if(($apie['auksiniai']) < '5000000'){
			
		echo'	<div class="meniuc">Tau nepakanka <img src="img/coin.png"></div> ';}
else{
				
	echo'	<div class="meniuc">	<img src="img/veikejai/Final goku gods-0.png"><br>Nusipirkai už 5,000,000 <img src="img/coin.png"> </div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Final goku gods', trans='0', auksiniai=auksiniai-'5000000' , kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE zaidejai SET finalgokub='$timxx' WHERE nick='$nick' ");
}
	
}
			
		elseif($apie['finalgokub']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php", "Auksiniai", "Final goku gods");
	navigacija($g_n);	

}


	if($id == "fussion"){
						top('Fusion omega cooler');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Fusion omega cooler</b><br/>
'.$ico2.' Jėga:<b> +15%</b><br/>
'.$ico2.' Gynyba:<b> +15%</b><br/>
'.$ico2.' Gyvybes:<b> +15%</b><br/>
'.$ico2.' Veikėjo kaina:<b> 25000 <img src="img/coin.png"></b><br/>

		<td>
		<img src="img/veikejai/Fusion omega cooler-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="?id=fussion2">Pirkti šį veikėją</a></b></div>
		
		
		';
		
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php", "Auksiniai", "Final goku gods");
	navigacija($g_n);	


}
elseif($id == "fussion2"){
top('Fusion omega cooler');
	 online('Auksiniai');
if($apie['omegab']-time() < 0){
	       $timxx = time()+60*60*24*1000;    
		
		if(($apie['auksiniai']) < '25000'){
			
		echo'	<div class="meniuc">Tau nepakanka <img src="img/coin.png"></div> ';}
else{
				
	echo'	<div class="meniuc"> <img src="img/veikejai/Fusion omega cooler-0.png"><br> Nusipirkai už 25000 <img src="img/coin.png">  </div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Fusion omega cooler', trans='0', auksiniai=auksiniai-'25000', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		
	mysqli_query($conn,"UPDATE zaidejai SET omegab='$timxx' WHERE nick='$nick' ");
}
}
			
		elseif($apie['omegab']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php", "Auksiniai", "Final Goku Gods");
	navigacija($g_n);	

}

if($id == "sidra"){
						top('Sidra');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Sidra</b><br/>
'.$ico2.' Jėga:<b> +100%</b><br/>
'.$ico2.' Gynyba:<b> +100%</b><br/>
'.$ico2.' Gyvybes:<b> +100%</b><br/>
'.$ico2.' Veikėjo kaina:<b> 100000 <img src="img/coin.png"></b><br/>

		<td>
		<img src="img/acc/15-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="?id=sidra2">Pirkti šį veikėją</a></b></div>
		
		
		';
		
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php", "Auksiniai", "Sidra");
	navigacija($g_n);	


}
elseif($id == "sidra2"){
	top('Sidra');
	 online('Auksiniai');

		if($apie['sidrab']-time() < 0){
	       $timxx = time()+60*60*24*1000;    
		if(($apie['auksiniai']) < '100000'){
			
		echo'	<div class="meniuc">Tau nepakanka <img src="img/coin.png"></div> ';}
else{
				
	echo'	<div class="meniuc"><img src="img/acc/15-0.png">   <br>Nusipirkai už 100000 <img src="img/coin.png">  </div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Sidra', trans='0', auksiniai=auksiniai-'100000' , kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE zaidejai SET sidrab='$timxx' WHERE nick='$nick' ");
}
	
}
			
		elseif($apie['sidrab']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php", "Auksiniai", "Sidra");
	navigacija($g_n);	

}

if($id == "bgoku"){
						top('Black Goku Rose');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Black Goku Rose</b><br/>
'.$ico2.' Jėga:<b> +200%</b><br/>
'.$ico2.' Gynyba:<b> +200%</b><br/>
'.$ico2.' Gyvybes:<b> +200%</b><br/>
'.$ico2.' Veikėjo kaina:<b> 200000 <img src="img/coin.png"></b><br/>

		<td>
		<img src="img/acc/bgoku-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="?id=bgoku2">Pirkti šį veikėją</a></b></div>
		
		
		';
		
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php", "Auksiniai", "Black Goku Rose");
	navigacija($g_n);	


}
elseif($id == "bgoku2"){
	top('Black Goku Rose');
	 online('Auksiniai');
if($apie['blackb']-time() < 0){
	       $timxx = time()+60*60*24*1000;    
		
		if(($apie['auksiniai']) < '200000'){
			
		echo'	<div class="meniuc">Tau nepakanka <img src="img/coin.png"></div> ';}
else{
				
	echo'	<div class="meniuc"><img src="img/acc/bgoku-0.png">   <br>Nusipirkai už 200000 <img src="img/coin.png">  </div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Black Goku Rose', trans='0', auksiniai=auksiniai-'200000', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE zaidejai SET blackb='$timxx' WHERE nick='$nick' ");
}
	
}
			
		elseif($apie['blackb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php", "Auksiniai", "Black Goku Rose");
	navigacija($g_n);	

}
if($id == "hopp"){
						top('Hopp');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Hopp</b><br/>
'.$ico2.' Jėga:<b> +700%</b><br/>
'.$ico2.' Gynyba:<b> +700%</b><br/>
'.$ico2.' Gyvybes:<b> +700%</b><br/>
'.$ico2.' Veikėjo kaina:<b> '.skaicius(1000000).'<img src="img/coin.png"></b><br/>

		<td>
		<img src="img/veikejai/Hopp-0.png"alt="IMG" height="140" width="140">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="?id=hopp2">Pirkti šį veikėją</a></b></div>
		
		
		';
		
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php", "Auksiniai", "Hopp");
	navigacija($g_n);	


}
elseif($id == "hopp2"){
	top('Hopp');
	 online('Auksiniai');
if($apie['hoppb']-time() < 0){
	       $timxx = time()+60*60*24*1000;    
		
		if(($apie['auksiniai']) < '999999'){
			
		echo'	<div class="meniuc">Tau nepakanka <img src="img/coin.png"></div> ';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Hopp-0.png"alt="IMG" height="140" width="140">   <br>Nusipirkai už '.skaicius(1000000).' <img src="img/coin.png">  </div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Hopp', trans='0', auksiniai=auksiniai-'1000000', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE zaidejai SET hoppb='$timxx' WHERE nick='$nick' ");
}
	
}
			
		elseif($apie['hoppb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php", "Auksiniai", "Hopp");
	navigacija($g_n);	

}


	if($id =='eurai'){
		top('Eurų pirkimas');
			echo'<div class="meniuc">2000 <img src="img/bicons/auxo.png" /> - <b>'.skaicius(1).'</b> <img src="img/bicons/euro.png" />    </div>';
        echo '<div class="meniuc">
        <form action="?id=euru2" method="post"/>
        Kiek kartų pirksite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php","Auksiniai", "Eurų pirkimas");
	navigacija($g_n);
	 
}
if($id =='euru2'){
		
 top('Eurų pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa*1000;
			$kiekis = $gynybaa * 1;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['auksiniai']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/auxo.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).'  </b><img src="img/bicons/euro.png" /></div>';
	           
	            mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai +'$kiekis', auksiniai=auksiniai-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php","Auksiniai", "Eurų pirkimas");
	navigacija($g_n);}
		}
if($id =='krd'){
		top('Kreditų pirkimas');
			echo'<div class="meniuc">100 <img src="img/bicons/auxo.png" /> - <b>'.skaicius(1).'</b> <img src="img/bicons/credit.png" />    </div>';
        echo '<div class="meniuc">
        <form action="?id=krd2" method="post"/>
        Kiek kartų pirksite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php","Auksiniai", "Kreditų pirkimas");
	navigacija($g_n);
	 
}
if($id =='krd2'){
		
 top('Kreditų pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa*100;
			$kiekis = $gynybaa * 1;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['auksiniai']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/auxo.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).' </b> <img src="img/bicons/credit.png" /></div>';
	           
	            mysqli_query($conn,"UPDATE zaidejai SET kred=kred +'$kiekis', auksiniai=auksiniai-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php","Auksiniai", "Kreditų pirkimas");
	navigacija($g_n);}
		}
if($id =='dball'){
		top('Rutulių pirkimas');
			echo'<div class="meniuc">100000 <img src="img/bicons/auxo.png" /> - <b>'.skaicius(1).'</b> Drakono rutulys </div>';
        echo '<div class="meniuc">
        <form action="?id=dball2" method="post"/>
        Kiek kartų pirksite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php","Auksiniai", "Rutulių pirkimas");
	navigacija($g_n);
	 
}
if($id =='dball2'){
		
 top('Rutulių pirkimas');
   
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa*100000;
			$kiekis = $gynybaa * 1;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['auksiniai']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/auxo.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).' </b> Drakono rutulių!</div>';
	           mysqli_query($conn,"UPDATE inv SET dball=dball+'$kiekis' WHERE nick='$nick' ");
	            mysqli_query($conn,"UPDATE zaidejai SET auksiniai=auksiniai-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php","Auksiniai", "Rutulių pirkimas");
	navigacija($g_n);}
		}
if($id =='jball'){
		top('Rutulių pirkimas');
			echo'<div class="meniuc">600000 <img src="img/bicons/auxo.png" /> - <b>'.skaicius(1).'</b> Juodasis Drakono rutulys </div>';
        echo '<div class="meniuc">
        <form action="?id=jball2" method="post"/>
        Kiek kartų pirksite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php","Auksiniai", "Rutulių pirkimas");
	navigacija($g_n);
	 
}
if($id =='jball2'){
		
 top('Rutulių pirkimas');
   
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa*600000;
			$kiekis = $gynybaa * 1;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['auksiniai']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/auxo.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).' </b> Juodųjų Drakono rutulių!</div>';
	           mysqli_query($conn,"UPDATE inv SET jball=jball+'$kiekis' WHERE nick='$nick' ");
	            mysqli_query($conn,"UPDATE zaidejai SET auksiniai=auksiniai-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","auksiniai.php","Auksiniai", "Rutulių pirkimas");
	navigacija($g_n);}
		}
 foot();
?>
	
    
    
    
    
