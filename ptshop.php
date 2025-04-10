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
	 online('Leidžia PT');
   top('PT Parduotuvė');
    echo' 
<div class="meniuc">
<b>'.$inv['unikalus'].'</b><font color="red"> Pasiekimų taškai</font> </br></div>';

    
echo'
<div class="meniu">
     '.$ico.' <a href="ptshop.php?id=veikejai"><font color="white"><b>Veikėjai</b></font></a></br>
	 '.$ico.' <a href="ptshop.php?id=euru"><font color="white"><b>Eurų pirkimas</b></font></a></br>
	 '.$ico.' <a href="ptshop.php?id=auksiniai"><font color="white"><b>Auksinių pirkimas</b></font></a></br>
	 '.$ico.' <a href="ptshop.php?id=kreditai"><font color="white"><b>Kreditų pirkimas</b></font></a></br></div>
	 
	 
	 ';
     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","PT Parduotuvė");
	navigacija($g_n);
	
	
		
}

elseif($id == "veikejai"){
	 online('Leidžia PT');
	 top('Veikėjai');
	echo'
<div class="meniuc">
Svarbu - šitus veikėjus galite gauti tik čia, už PT taškus!<br></div>



<div class="meniu">'.$ico.' <a href="ptshop.php?id=mojito">Mojito</a> [<b>5000</b>  <font color="red"><b>Pasiekimų taškų</b></font>]</div>
<div class="meniu">'.$ico.' <a href="ptshop.php?id=iwan">Iwan</a> [<b>7000</b>  <font color="red"><b>Pasiekimų taškų</b></font>]</div>
<div class="meniu">'.$ico.' <a href="ptshop.php?id=geene">Geene</a> [<b>10000</b>  <font color="red"><b>Pasiekimų taškų</b></font>]</div>
';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","ptshop.php","PT Parduotuvė", "veikejai");
	navigacija($g_n);

}
elseif($id == "mojito"){
				top('Mojito');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Mojito</b><br/>
'.$ico2.' Jėga: <font color="green"><b>+700%</b></font><br/>
'.$ico2.' Gynyba: <font color="green"><b>+700%</b></font><br/>
'.$ico2.' Gyvybes: <font color="green"><b>+700%</b></font><br/>
'.$ico2.' Kaina: <b> 5000 </b><font color="red"><b>Pasiekimų taškų</b></font><br/>
		</td>
		<td>
		<img src="img/veikejai/Mojito-0.png">
		</td>
		</tr>
		</table> </div>	

		
<div class="meniu">'.$ico.' <b><a href="ptshop.php?id=perku_mojito">Pirkti šį veikėją</a></b></div>
		
		
		
		';
		
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","ptshop.php","PT Parduotuvė", "Mojito");
	navigacija($g_n);


}

elseif($id == "perku_mojito"){
	top('Mojito');
	 online('Leidžia PT');
if($apie['mojitob']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
	if($inv['unikalus'] < 5000 || $inv['angelwing'] < 0){
		echo'<div class="meniuc">
  Neužtenka  <b><font color="red">Pasiekimų taškų!</b></font></div>';}

else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Mojito-0.png"><br> Nusipirkai už 5000 <b><font color="red">Pasiekimų taškų!</b></font>
 </div> ';		
mysqli_query($conn,"UPDATE inv SET  unikalus=unikalus-'5000' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Mojito', trans='0', sms_litai=sms_litai-'0' , kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");


mysqli_query($conn,"UPDATE zaidejai SET mojitob='$timxx' WHERE nick='$nick' ");
}}


elseif($apie['mojitob']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","ptshop.php","PT Parduotuvė", "ptshop.php?id=veikejai", "Veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	
}

// iwan
elseif($id == "iwan"){
				top('Iwan');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Iwan</b><br/>
'.$ico2.' Jėga: <font color="green"><b>+1200%</b></font><br/>
'.$ico2.' Gynyba: <font color="green"><b>+1200%</b></font><br/>
'.$ico2.' Gyvybes: <font color="green"><b>+1200%</b></font><br/>
'.$ico2.' Kaina: <b> 7000 </b><font color="red"><b>Pasiekimų taškų</b></font><br/>
		</td>
		<td>
		<img src="img/veikejai/Iwan-0.png">
		</td>
		</tr>
		</table> </div>	

		
<div class="meniu">'.$ico.' <b><a href="ptshop.php?id=perku_iwan">Pirkti šį veikėją</a></b></div>
		
		
		
		';
		
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","ptshop.php","PT Parduotuvė", "Iwan");
	navigacija($g_n);


}

elseif($id == "perku_iwan"){
	top('Iwan');
	 online('Leidžia PT');
if($apie['iwanb']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
	if($inv['unikalus'] < 7000 || $inv['angelwing'] < 0){
		echo'<div class="meniuc">
  Neužtenka  <b><font color="red">Pasiekimų taškų!</b></font></div>';}

else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Iwan-0.png"><br> Nusipirkai už 7000 <b><font color="red">Pasiekimų taškų!</b></font>
 </div> ';		
mysqli_query($conn,"UPDATE inv SET  unikalus=unikalus-'7000' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Iwan', trans='0', sms_litai=sms_litai-'0' , kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");


mysqli_query($conn,"UPDATE zaidejai SET iwanb='$timxx' WHERE nick='$nick' ");
}}


elseif($apie['iwanb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","ptshop.php","PT Parduotuvė", "ptshop.php?id=veikejai", "Veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	
}
//// Geene
elseif($id == "geene"){
				top('Geene');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Geene</b><br/>
'.$ico2.' Jėga: <font color="green"><b>+2000%</b></font><br/>
'.$ico2.' Gynyba: <font color="green"><b>+2000%</b></font><br/>
'.$ico2.' Gyvybes: <font color="green"><b>+2000%</b></font><br/>
'.$ico2.' Kaina: <b> 10000 </b><font color="red"><b>Pasiekimų taškų</b></font><br/>
		</td>
		<td>
		<img src="img/veikejai/Geene-0.png">
		</td>
		</tr>
		</table> </div>	

		
<div class="meniu">'.$ico.' <b><a href="ptshop.php?id=perku_geene">Pirkti šį veikėją</a></b></div>
		
		
		
		';
		
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","ptshop.php","PT Parduotuvė", "Geene");
	navigacija($g_n);


}

elseif($id == "perku_geene"){
	top('Geene');
	 online('Leidžia PT');
if($apie['geeneb']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
	if($inv['unikalus'] < 10000 || $inv['angelwing'] < 0){
		echo'<div class="meniuc">
  Neužtenka  <b><font color="red">Pasiekimų taškų!</b></font></div>';}

else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Geene-0.png"><br> Nusipirkai už 10000 <b><font color="red">Pasiekimų taškų!</b></font>
 </div> ';		
mysqli_query($conn,"UPDATE inv SET  unikalus=unikalus-'10000' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Iwan', trans='0', sms_litai=sms_litai-'0' , kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");


mysqli_query($conn,"UPDATE zaidejai SET geeneb='$timxx' WHERE nick='$nick' ");
}}


elseif($apie['geeneb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","ptshop.php","PT Parduotuvė", "ptshop.php?id=veikejai", "Veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	
}
if($id =='euru'){
		top('Eurų pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/pt.png" /> - <b>'.skaicius(1).'</b> <img src="img/bicons/euro.png" />    </div>';
        echo '<div class="meniuc">
        <form action="?id=euru2" method="post"/>
        Kiek PT išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Pirkti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","ptshop.php","PT Parduotuvė", "Eurų pirkimas");
	navigacija($g_n);
	 
}
if($id =='euru2'){
		
 top('Eurų pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa * 1;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $inv['unikalus']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/pt.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).'  </b><img src="img/bicons/euro.png" /></div>';
	           
	            mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai +'$kiekis' WHERE nick='$nick' ");
				mysqli_query($conn,"UPDATE inv SET unikalus=unikalus-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","ptshop.php","PT Parduotuvė", "Eurų pirkimas");
	navigacija($g_n);}
		}
if($id =='auksiniai'){
		top('Auksinių pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/pt.png" /> - <b>'.skaicius(10).'</b> <img src="img/bicons/auxo.png" />    </div>';
        echo '<div class="meniuc">
        <form action="?id=auksiniai2" method="post"/>
        Kiek PT išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Pirkti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","ptshop.php","PT Parduotuvė", "Auksinių pirkimas");
	navigacija($g_n);
	 
}
if($id =='auksiniai2'){
		
 top('Auksinių pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa * 10;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $inv['unikalus']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/pt.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).'  </b><img src="img/bicons/auxo.png" /></div>';
	           
	            mysqli_query($conn,"UPDATE zaidejai SET auksiniai=auksiniai +'$kiekis' WHERE nick='$nick' ");
				mysqli_query($conn,"UPDATE inv SET unikalus=unikalus-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","ptshop.php","PT Parduotuvė", "Auksinių pirkimas");
	navigacija($g_n);}
		}
		if($id =='kreditai'){
		top('Kreditų pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/pt.png" /> - <b>'.skaicius(5).'</b> <img src="img/bicons/credit.png" />    </div>';
        echo '<div class="meniuc">
        <form action="?id=kreditai2" method="post"/>
        Kiek PT išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Pirkti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","ptshop.php","PT Parduotuvė", "Kreditų pirkimas");
	navigacija($g_n);
	 
}
if($id =='kreditai2'){
		
 top('Kreditų pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa * 5;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $inv['unikalus']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/pt.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).'  </b><img src="img/bicons/credit.png" /></div>';
	           
	            mysqli_query($conn,"UPDATE zaidejai SET kred=kred +'$kiekis' WHERE nick='$nick' ");
				mysqli_query($conn,"UPDATE inv SET unikalus=unikalus-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","ptshop.php","PT Parduotuvė", "Kreditų pirkimas");
	navigacija($g_n);}
		}
foot();
?>
