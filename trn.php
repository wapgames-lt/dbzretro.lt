<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include("cfg/sql.php");
include_once 'cfg/funkcijos.php';
head2();

baneris();

		topbar();
$nst = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM turnyras"));

if($id == ''){
	top('Kovų turnyras');
		echo'<div class="meniuc">
	<img src="img/imgg/turnyras.png"></div>
 <div class="meniuc">
			  '.$ic.' Turnyro Nugalėtojas gauna:<br> <small><b>'.skaicius(1000000000000).' '.$pinigaii.' , 200 '.$eurui.' ,  400 '.$kreditaii.'</b> bei <b>2000</b> <font color="red">Kario tobulėjimo!</font></small><br>
Antros vietos užėmėjas gauna:<br>
<small><b>'.skaicius(300000000000).' '.$pinigaii.' , 70 '.$eurui.' ,  150 '.$kreditaii.'</b> bei <b>500</b> <font color="red">Kario tobulėjimo!</font></small>

			  </div>';

		if($nst['trn_busena'] == 0 AND mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user WHERE kovu_trn='+'")) < 8)
		{
			echo'
				  <div class="meniuc"><b>Iki turnyro pradžios trūksta <font color="red">'.(8-mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user WHERE kovu_trn='+'"))).'</font> dalyvių</b></div>
				  ';
		}
		elseif($nst['trn_busena'] == 1)
		{
			echo'
				  <div class="meniuc"><b>Turnyras prasidės už <font color="red">'.laikas($nst['trn_time']-time(),1).'</font></b></div>
				  ';
		}
		elseif($nst['trn_busena'] == 2)
		{
			echo'
				  <div class="meniuc"><b>Iki pirmojo etapo pabaigos liko <font color="red">'.laikas($nst['trn_time']-time(),1).'</font></b></div>
				  ';
 if($apie['statusas'] == "Kurejas"){

 $query = mysqli_query($conn,"SELECT * FROM user ORDER BY kiek_trn DESC LIMIT 8");
     echo'<div class="up">Pirmaujantys:</div>';
    echo '<div class="meniuc">';
    while($row = mysqli_fetch_assoc($query)){

   $vt++;
		  
        echo ' <b>'.$vt.'</b>.<a href="pagrindinis.php?&ka='.$row['nick'].'"> '.$row['nick'].'</a>  --    <b>'.sk($row['kiek_trn']).' Laimėjo kovų</b><br>';


}
}
echo'</div>';
	


	}
		elseif($nst['trn_busena'] == 3)
		{
			echo'
				  <div class="meniuc"><b>Iki ketvirtfinalio pabaigos liko <font color="red">'.laikas($nst['trn_time']-time(),1).'</font></b></div>
				  ';
 if($apie['statusas'] == "Kurejas"){

 $query = mysqli_query($conn,"SELECT * FROM user ORDER BY kiek_trn DESC LIMIT 6");
     echo'<div class="up">Pirmaujantys:</div>';
    echo '<div class="meniuc">';
    while($row = mysqli_fetch_assoc($query)){

   $vt++;
		  
        echo ' <b>'.$vt.'</b>.<a href="pagrindinis.php?&ka='.$row['nick'].'">'.$row['nick'].'</a>  --    <b>'.sk($row['kiek_trn']).' Laimėjo kovų</b><br>';


}
}
echo'</div>';


		}
		elseif($nst['trn_busena'] == 4)
		{
			echo'
				  <div class="meniuc"><b>Iki pusfinalio pabaigos liko <font color="red">'.laikas($nst['trn_time']-time(),1).'</font></b></div>
				  ';
 if($apie['statusas'] == "Kurejas"){

 $query = mysqli_query($conn,"SELECT * FROM user ORDER BY kiek_trn DESC LIMIT 4");
     echo'<div class="up">Pirmaujantys:</div>';
    echo '<div class="meniuc">';
    while($row = mysqli_fetch_assoc($query)){

   $vt++;
		  
        echo ' <b>'.$vt.'</b>.<a href="pagrindinis.php?&ka='.$row['nick'].'">'.$row['nick'].'</a>  --    <b>'.sk($row['kiek_trn']).' Laimėjo kovų</b><br>';


}
}
echo'</div>';

		}
		elseif($nst['trn_busena'] == 5)
		{
			echo'
				  <div class="meniuc"><b>Iki finalo pabaigos liko <font color="red">'.laikas($nst['trn_time']-time(),1).'</font></b></div>
				  ';
 if($apie['statusas'] == "Kurejas"){

 $query = mysqli_query($conn,"SELECT * FROM user ORDER BY kiek_trn DESC LIMIT 2");
     echo'<div class="up">Pirmaujantys:</div>';
    echo '<div class="meniuc">';
    while($row = mysqli_fetch_assoc($query)){

   $vt++;
		  
        echo ' <b>'.$vt.'</b>.<a href="pagrindinis.php?&ka='.$row['nick'].'">'.$row['nick'].'</a>  --    <b>'.sk($row['kiek_trn']).' Laimėjo kovų</b><br>';


}
}
echo'</div>';



		}
		else
		{
			echo'
				  <div class="meniuc"><b>Turnyras jau prasidėjęs</b></div>
				  ';
		}
if($user['kovu_trn'] == '+')
		{
		    echo'
		    <div class="meniuc"> Tu laimėjai: <b>'.$user['kiek_trn'].' kovų</b></div>
		    ';
	    }

		echo'
			<div class="up">Informacija</div>
			  <div class="meniu">
			  '.$ico.' <a href="?id=reg">Registracija į turnyrą</a><br>
			  '.$ico.' <a href="?id=info">Turnyro informacija</a><br>
		
			  </div>
			  ';
		if($nst['trn_busena'] == 0 AND mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user WHERE kovu_trn='+'")) > 0)
		{
			echo'
				  <div class="up"><b>Turnyro dalyviai</b></div>
			  <div class="meniu">
				  ';
			if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user WHERE kovu_trn='+'")) == false)
			{
				echo'
					  '.$ic.' <b><font color="red">Turnyre dalyvių nėra.</font></b>
					  ';
			}
			else
			{
				
			$query = mysqli_query($conn,"SELECT * FROM user WHERE kovu_trn = '+'");
				while($row = mysqli_fetch_assoc($query))
				{
					$nr++;
					
					echo'<font color="blue"><b>'.$nr.'.</b></font> <a href="pagrindinis.php?id=apie&ka='.$row['nick'].'">'.$row['nick'].'</a><br>';
			
					
				}
unset($query);
			}

			echo'</div>';
		}
		elseif($nst['trn_busena'] == 1)
		{
			echo'
				  <div class="up"><b>Dalyviai</b></div>
			  <div class="meniu">
				  ';
				$query = mysqli_query($conn,"SELECT * FROM user WHERE kovu_trn = '+'");
				while($row = mysqli_fetch_assoc($query))
				{
					$nr++;
					
					echo'<font color="blue"><b>'.$nr.'.</b></font> <a href="pagrindinis.php?id=apie&ka='.$row['nick'].'">'.$row['nick'].'</a><br>';
				
					
				}
unset($query);
			
			echo'</div>';
		}
		elseif($nst['trn_busena'] == 2)
		{
				echo'
				  <div class="up"><b>Pirmojo etapo dalyviai</b></div>
			  <div class="meniu">
				  ';
		$query = mysqli_query($conn,"SELECT * FROM user WHERE kovu_trn = '+'");
				while($row = mysqli_fetch_assoc($query))
				{
					$nr++;
					
					echo'<font color="blue"><b>'.$nr.'.</b></font> <a href="pagrindinis.php?id=apie&ka='.$row['nick'].'">'.$row['nick'].' </a><br>';
				
					
				}
unset($query);			echo'</div>';
		}
		elseif($nst['trn_busena'] == 3)
		{
			echo'
				  <div class="up"><b>Ketvirtfinalio dalyviai</b></div>
			  <div class="meniu">
				  ';
			$query = mysqli_query($conn,"SELECT * FROM user WHERE kovu_trn = '+'");
				while($row = mysqli_fetch_assoc($query))
				{
					$nr++;
					
					echo'<font color="blue"><b>'.$nr.'.</b></font> <a href="pagrindinis.php?id=apie&ka='.$row['nick'].'">'.$row['nick'].'</a><br>';
			
					
				}
unset($query);
			echo'</div>';
		}
		
		elseif($nst['trn_busena'] == 4)
		{
			echo'
				  <div class="up"><b>Pusfinalio dalyviai</b></div>
			  <div class="meniu">
				  ';
		$query = mysqli_query($conn,"SELECT * FROM user WHERE kovu_trn = '+'");
				while($row = mysqli_fetch_assoc($query))
				{
					$nr++;
					
					echo'<font color="blue"><b>'.$nr.'.</b></font> <a href="pagrindinis.php?id=apie&ka='.$row['nick'].'">'.$row['nick'].'</a><br>';
				
					
				}
unset($query);
			echo'</div>';
		}
		
		elseif($nst['trn_busena'] == 5)
		{
			echo'
				  <div class="up"><b>Finalo dalyviai</b></div>
			  <div class="meniu">
				  ';
			$query = mysqli_query($conn,"SELECT * FROM user WHERE kovu_trn = '+'");
				while($row = mysqli_fetch_assoc($query))
				{
					$nr++;
					
					echo'<font color="blue"><b>'.$nr.'.</b></font> <a href="pagrindinis.php?id=apie&ka='.$row['nick'].'">'.$row['nick'].'</a><br>';
			
					
				}
unset($query);
			echo'</div>';
		}



     
    
echo'<div class="up">Paskutinis laimėtojas</div>
<div class="meniuc"><a href="pagrindinis.php?id=apie&ka='.$nst['trn_last'].'"><b>'.$nst['trn_last'].'</b></a></div>';

$query = mysqli_query($conn,"SELECT * FROM zaidejai ORDER BY kiek_trn DESC LIMIT 5");
     echo'<div class="up">Laimėtų turnyrų TOP:</div>';
    echo '<div class="meniuc">';
    while($row = mysqli_fetch_assoc($query)){

   $vt++;
		  
        echo ' <b><a href="pagrindinis.php?&ka='.$row['nick'].'">'.$row['nick'].'</a>  --    <b>'.sk($row['kiek_trn']).' <small>Laimėjo kovų turnyrų</small></b><br>';


}
echo'</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Kovų turnyras");
	navigacija($g_n);
}
		

		
if($id == 'reg'){
	top('Registracija i turnyrą');
	
		
		echo'
			 <div class="meniuc">
			  ';
		if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user WHERE kovu_trn='+'")) == 8)
		{
			echo'
				
				 Registracija į turnyrą dabar yra uždarytą.
				  ';
		}
		elseif($user['kovu_trn'] == '+')
		{
			echo'
				
				  Jūs jau užsiregistravote į turnyrą.
				  ';
		}
		else
		{
			echo'
				  Registracijos mokestis 500 kreditų. Ar tikrai norite registruotis į turnyrą?<br>
				 <a href="?id=reg_yes"><font color="blue">Taip</font></a>  <a href="?"><font color="red">Ne</font></a>
			';
		}
		echo'</div>';
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","trn.php", "Turnyras", "Registracija į turnyrą");
	navigacija($g_n);
}
		
if($id == 'reg_yes'){
			top('Registracija i turnyrą');
		
		echo'
			
			  <div class="meniuc">
			  ';
		if(mysqli_num_rows(mysqli_query($conn,"SEELCT * FROM user WHERE kovu_trn='+'")) == 8)
		{
			echo'
			
				  '.$ic.' Registracija į turnyrą dabar yra uždarytą.
				  ';
		}
		elseif($nst['trn_busena'] != 0)
		{
			echo'
	
				  '.$ic.' Registracija į turnyrą dabar yra uždarytą.
				  ';
		}
		elseif($user['trn'] == '+')
		{
			echo'
			
				  '.$ic.' Jūs jau užsiregistravote į turnyrą.
				  ';
		}
		elseif($apie[kred] < 2)
		{
			echo'
				 
				  '.$ic.' Jūs neturite 500 kreditų.
				  ';
		}
		else
		{
			echo'
				 
				  '.$ic.' Sėkmingai užsiregistravote į turnyrą.
				  ';
			mysqli_query($conn,"UPDATE zaidejai SET kred=kred-500 WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE user SET kovu_trn='+' WHERE nick='$nick'");
			
		
		}
		echo'</div>';			 	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","trn.php", "Turnyras", "Registracija į turnyrą");
	navigacija($g_n); 
}
		
if($id == 'info'){
		top('Turnyro informacija');
		
		echo'
			  <div class="meniu">
			  '.$ic.' <b>Pirmojo etapo dalyviai</b><br>
			  <div class="lin"></div>
			  <font color="blue"><b>1.</b></font> Tai grupelė žaidėjų kurie sulaukė savo eilės laukiančiūjų turnyro etape, jame dalyvauja 8 žmonės. <br>
			  <font color="blue"><b>2.</b></font> Turnyras prasideda kai susirenka 8 žmonės. <br>
			  <font color="blue"><b>3.</b></font> Į kitą etapą patenka jau 6 žaidėjai. <br>
			  <font color="blue"><b>4.</b></font> Visi rungtyniauja kas per 1h surinks kuo daugiau veiksmų kovų zonoje. <br>
		</div> <div class="meniu">
			  '.$ic.' <b>Ketvirtfinalio dalyviai</b><br>
			  <div class="lin"></div>
			  <font color="blue"><b>1.</b></font> Šiame etape automatiškai paskirstomi pagal veiksmus 6 žaidėjai <br>
              <font color="blue"><b>2.</b></font> Turnyras prasideda iš karto kai baigiasi pirmasis etapas. <br>
			  <font color="blue"><b>3.</b></font> Į kitą etapą patenka jau 4 žaidėjai. <br>
			  <font color="blue"><b>4.</b></font> Visi rungtyniauja kas per 1h surinks kuo daugiau veiksmų kovų zonoje. <br>
			</div> <div class="meniu">
			  '.$ic.' <b>Pusfinalio dalyviai</b><br>
			  <div class="lin"></div>
			  <font color="blue"><b>1.</b></font> Šiame etape automatiškai paskirstomi pagal veiksmus 4 žaidėjai <br>
			  <font color="blue"><b>2.</b></font> prasideda iš karto kai baigiasi ketvirtfinalis. <br>
			  <font color="blue"><b>3.</b></font> Į kitą etapą patenka tik 2 žaidėjai. <br>
			  <font color="blue"><b>4.</b></font> Visi rungtyniauja kas per 1h surinks kuo daugiau veiksmų kovų zonoje. <br>
			 </div> <div class="meniu">
			  '.$ic.' <b>Finalo dalyviai</b><br>
			  <div class="lin"></div>
			  <font color="blue"><b>1.</b></font> Šiame etape automatiškai paskirstomi pagal veiksmus 2 geriausieji žaidėjai <br>
			  <font color="blue"><b>2.</b></font> Turnyras prasideda iš karto kai baigiasi pusfinalis. <br>
			  <font color="blue"><b>3.</b></font> Į kitą etapą nebepatenka nei vienas žaidėjas. <br>
			  <font color="blue"><b>4.</b></font> Išmokami prizai. <br>
			  </div> <div class="meniuc">
			  '.$ic.' Turnyro nugalėtojas gauna:<br> <small><b>'.skaicius(1000000000000).' '.$pinigaii.' , 200 '.$eurui.' ,  400 '.$kreditaii.'</b> bei <b>2000</b> <font color="red">Kario tobulėjimo!</font></small>
			  </div>
			
			  ';	 			  
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","trn.php", "Turnyras", "Registracija į turnyrą");
	navigacija($g_n);
}
foot();
?>
