<?php
ob_start();

echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();

baneris();
if($id == 'shop'){
	   online('kreditai');
	
        
		

 
		if($ka =='jega'){
			top('Jėgos pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/credit.png" />  - 10 <img src="img/bicons/attack.png" />    </div>';
        echo '<div class="titlec">
        <form action="?id=shop&ka=jega2" method="post"/>
        Kiek kreditų išleisite:<br /><input type="number" name="jegaa"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  
    
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pagrindinis.php?id=kredai", "Kreditai", "Jėgos pirkimas");
	navigacija($g_n);
	 
}
if($ka =='jega2'){
		top('Jėgos pirkimas');
 
    
   
   
        if(isset($_POST['submit'])){
            $jegaa= isset($_POST['jegaa']) ? preg_replace("/[^0-9]/","",$_POST['jegaa']) : null;
            $kainn = $jegaa;
			$kiekis = $jegaa * 10;
		
            
            if(empty($jegaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['kred']){
	              echo '<div class="meniuc">Neturi pakankamai <img src="img/bicons/credit.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! nusipirkai '.sk($kiekis).' <img src="img/bicons/attack.png" /></div>';
	           
	            mysql_query("UPDATE zaidejai SET jega=jega +'$kiekis', kred=kred-'$kainn' WHERE nick='$nick' ");
			  }
		
	   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pagrindinis.php?id=kredai", "Kreditai", "jėgos pirkimas");
	navigacija($g_n);
		}}
if($ka =='eurai'){
			top('Eurų pirkimas');
			echo'<div class="meniuc">100 <img src="img/bicons/credit.png" />  - 1 <img src="img/bicons/euro.png" />    </div>';
        echo '<div class="titlec">
        <form action="?id=shop&ka=eurai2" method="post"/>
        Kiek eurų pirksite:<br /><input type="number" name="jegaa"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  
    
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pagrindinis.php?id=kredai", "Kreditai", "Euru pirkimas");
	navigacija($g_n);
	 
}
if($ka =='eurai2'){
		top('Eurų pirkimas');
 
    
   
   
        if(isset($_POST['submit'])){
            $jegaa= isset($_POST['jegaa']) ? preg_replace("/[^0-9]/","",$_POST['jegaa']) : null;
            $kainn = $jegaa*100;
			$kiekis = $jegaa * 1;
		
            
            if(empty($jegaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['kred']){
	              echo '<div class="meniuc">Neturi pakankamai <img src="img/bicons/credit.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! nusipirkai '.sk($kiekis).' <img src="img/bicons/euro.png" /></div>';
	           
	            mysql_query("UPDATE zaidejai SET sms_litai=sms_litai+'$kiekis', kred=kred-'$kainn' WHERE nick='$nick' ");
			  }
		
	   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pagrindinis.php?id=kredai", "Kreditai", "Eurų pirkimas");
	navigacija($g_n);
		}}
if($ka =='auksiniai'){
			top('Jėgos pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/credit.png" />  - 10 <img src="img/bicons/auxo.png" />    </div>';
        echo '<div class="titlec">
        <form action="?id=shop&ka=auksiniai2" method="post"/>
        Kiek kreditų išleisite:<br /><input type="number" name="jegaa"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  
    
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pagrindinis.php?id=kredai", "Kreditai", "Auksinių pirkimas");
	navigacija($g_n);
	 
}
if($ka =='auksiniai2'){
		top('Auksinių pirkimas');
 
    
   
   
        if(isset($_POST['submit'])){
            $jegaa= isset($_POST['jegaa']) ? preg_replace("/[^0-9]/","",$_POST['jegaa']) : null;
            $kainn = $jegaa;
			$kiekis = $jegaa * 10;
		
            
            if(empty($jegaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['kred']){
	              echo '<div class="meniuc">Neturi pakankamai <img src="img/bicons/credit.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! nusipirkai '.sk($kiekis).' <img src="img/bicons/auxo.png" /></div>';
	           
	            mysql_query("UPDATE zaidejai SET auksiniai=auksiniai +'$kiekis', kred=kred-'$kainn' WHERE nick='$nick' ");
			  }
		
	   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pagrindinis.php?id=kredai", "Kreditai", "Auksinių pirkimas");
	navigacija($g_n);
		}}

if($ka =='pinigai'){
			top('Pinigų pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/credit.png" />  - 10 000<img src="img/bicons/pinigai.png" />    </div>';
        echo '<div class="titlec">
        <form action="?id=shop&ka=pinigai2" method="post"/>
        Kiek kreditų išleisite:<br /><input type="number" name="jegaa"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  
    
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pagrindinis.php?id=kredai", "Kreditai", "Pinigų pirkimas");
	navigacija($g_n);
	 
}
if($ka =='pinigai2'){
		top('Pinigų pirkimas');
 
    
   
   
        if(isset($_POST['submit'])){
            $jegaa= isset($_POST['jegaa']) ? preg_replace("/[^0-9]/","",$_POST['jegaa']) : null;
            $kainn = $jegaa;
			$kiekis = $jegaa * 10000;
		
            
            if(empty($jegaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['kred']){
	              echo '<div class="meniuc">Neturi pakankamai <img src="img/bicons/credit.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! nusipirkai '.sk($kiekis).' <img src="img/bicons/pinigai.png" /></div>';
	           
	            mysql_query("UPDATE zaidejai SET litai=litai +'$kiekis', kred=kred-'$kainn' WHERE nick='$nick' ");
			  }
		
	   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pagrindinis.php?id=kredai", "Kreditai", "Pinigų pirkimas");
	navigacija($g_n);
		}}

if($ka =='kale'){
top('Kale pirkimas');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Kale</b><br/>
'.$ico2.' Jėga:<b> +50%</b><br/>
'.$ico2.' Gynyba:<b> +50%</b><br/>
'.$ico2.' Gyvybes:<b> +50%</b><br/>
'.$ico2.' Veikėjo kaina:<b> 2000 <img src="img//bicons/credit.png"></b><br/>

		<td>
		<img src="img/acc/14-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="?id=shop&ka=kale2">Pirkti šį veikėją</a></b></div>
		
		
		';
		
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Kale");
	navigacija($g_n);	


}
		
elseif($ka == "kale2"){
	top('Kale');
	 online('Kredituose');

				if($apie['kaleb']-time() < 0){
	       $timxx = time()+60*60*24*1000;    

$kainn = 2000;
		
		if($kainn > $apie['kred']){
			
		echo'	<div class="meniuc">Tau nepakanka <img src="img/bicons/credit.png"></div> ';}
else{
				
	echo'	<div class="meniuc"><img src="img/acc/14-0.png">   <br>Nusipirkai už 2000 <img src="img/bicons/credit.png">  </div> ';		
	mysql_query("UPDATE zaidejai SET veikejas='Kale', trans='0', kred=kred-'2000', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		
	///
mysql_query("UPDATE zaidejai SET kaleb='$timxx' WHERE nick='$nick' ");

}
	}		
		
///
elseif($apie['kaleb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis", "Kale");
	navigacija($g_n);	

}

if($ka =='kale23'){
		top('Jėgos pirkimas');
 
    
   
   
        if(isset($_POST['submit'])){
            $jegaa= isset($_POST['kalee']) ? preg_replace("/[^0-9]/","",$_POST['jkalee']) : null;
            $kainn = $kalee;
			$kiekis = $kalee * 1;
		
            
            if(empty($kalee)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['kred']){
	              echo '<div class="meniuc">Neturi pakankamai <img src="img/bicons/credit.png" /></div>';
	          } else {
	              echo '<div class="meniuc"><img src="img/acc/20.png" /><br> Nusipirkai už 1000   <img src="img/bicons/credit.png" /> </div>';
	           
	            mysql_query("UPDATE veikejai SET kale +'$kiekis', kred=kred-'$kainn' WHERE nick='$nick' ");
			  }
		
	   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pagrindinis.php?id=kredai", "Kreditai", "Kale pirkimas");
	navigacija($g_n);
		}}


if($ka =='gyvybes'){
	top('Gyvybių pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/credit.png" /> -  5 <img src="img/bicons/hp.png" /></div>';
        echo '<div class="titlec">
        <form action="?id=shop&ka=gyvybes2" method="post"/>
        Kiek kreditų išleisite:<br /><input type="number" name="gyvybess"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pagrindinis.php?id=kredai", "Kreditai", "Gyvybių pirkimas");
	navigacija($g_n);}
//////unikalus	 



if($ka =='gyvybes2'){
		top('Gyvybių pirkimas');
 
    
   
   
        if(isset($_POST['submit'])){
            $gyvybess= isset($_POST['gyvybess']) ? preg_replace("/[^0-9]/","",$_POST['gyvybess']) : null;
            $kainn = $gyvybess;
			$kiekis = $gyvybess* 5;
		
            
            if(empty($gyvybess)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['kred']){
	              echo '<div class="meniuc">Neturi pakankamai <img src="img/bicons/credit.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! nusipirkai '.sk($kiekis).' <img src="img/bicons/hp.png" /></div>';
	           
	            mysql_query("UPDATE zaidejai SET max_gyvybes=max_gyvybes +'$kiekis', kred=kred-'$kainn' WHERE nick='$nick' ");
			  }
		
		  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pagrindinis.php?id=kredai", "Kreditai", "Gyvybių pirkimas");
	navigacija($g_n);
		}


}if($ka =='gynyba'){
	top('Gynybos pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/credit.png" /> -  10  <img src="img/bicons/shield.png" /></div>';
        echo '<div class="titlec">
        <form action="?id=shop&ka=gynyba2" method="post"/>
        Kiek kreditų išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  
    
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pagrindinis.php?id=kredai", "Kreditai", "Gynybos pirkimas");
	navigacija($g_n);
	 
}
if($ka =='gynyba2'){
		top('Gynybos pirkimas');
 
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa * 10;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['kred']){
echo '<div class="meniuc">Neturi pakankamai <img src="img/bicons/credit.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! nusipirkai '.sk($kiekis).' <img src="img/bicons/shield.png" /></div>';
	           
	            mysql_query("UPDATE zaidejai SET gynyba=gynyba +'$kiekis', kred=kred-'$kainn' WHERE nick='$nick' ");
			  }
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pagrindinis.php?id=kredai", "Kreditai", "Gynybos pirkimas");
	navigacija($g_n);
		}}
		
}
	
	
	
	
	

elseif($id == "kredai2"){
    if($ka == "radannnras"){
        top('Radaro pirkimas');
        if($kreditai < 100){
            echo '<div class="meniuc">Nepakanka <img src="img/bicons/credit.png" />!</div>';
       
        }
elseif($inv['radaras'] > 0){
echo'<div class="meniuc"><b>Jau turi radarą</b>!</div>';
}
        else{
            echo '<div class="meniuc">Drakono rutulių radaras nupirktas!</div>';
              mysql_query("UPDATE inv SET radaras=radaras+'1' WHERE nick='$nick'");
            mysql_query("UPDATE zaidejai SET kred=kred-'100' WHERE nick='$nick'");
		}
          $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pagrindinis.php?id=kredai", "Kreditai", "Radaro pirkimas");
	navigacija($g_n);
    }
    
    
    elseif($ka == "kg_mannt"){
        top('Matuoklio pirkimas');
        if($kreditai < 10000){
            echo '<div class="meniuc">Nepakanka <img src="img/bicons/credit.png" />!</div>';
        }
       elseif($inv['ki'] > 0){
echo'<div class="meniuc"><b>Jau turi KG Matuoklį</b>!</div>';
} 
        else{
            echo '<div class="meniuc">K.G. Matuoklis nupirktas!.</div>';
            
            mysql_query("UPDATE inv SET ki=ki+'1' WHERE nick='$nick'");
             mysql_query("UPDATE zaidejai SET kred=kred-'10000' WHERE nick='$nick'");
        }
      $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pagrindinis.php?id=kredai", "Kreditai", "Matuoklio pirkimas");
	navigacija($g_n);
    }     
  
}
    


    
    
 elseif($id == ""){
        online('Kreditai');
   top('Kreditai');
    echo '<div class="meniuc">Turi <b>'.sk($kreditai).'</b> <img src="img/bicons/credit.png" /></div>';
    
       
     
    
    echo '
  
    
    <div class="title">  
   
        '.$ico.' <a href="?id=shop&ka=jega">Jėgos pirkimas</a><br/>
      
    '.$ico.' <a href="?id=shop&ka=gynyba">Gynybos pirkimas</a><br/>
  '.$ico.' <a href="?id=shop&ka=gyvybes">Gyvybiu lygio pirkimas</a><br>
  '.$ico.' <a href="?id=shop&ka=auksiniai">Auksinių pirkimas</a><br>
  '.$ico.' <a href="?id=shop&ka=eurai">Eurų pirkimas</a><br>
  '.$ico.' <a href="?id=shop&ka=pinigai">Pinigų pirkimas</a><br>
'.$ico.' <a href="?id=shop&ka=kale">Kale pirkimas</a>
    </div>';
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Kreditai");
	navigacija($g_n);
  
}

foot();

