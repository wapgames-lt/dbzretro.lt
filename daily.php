<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";
include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();
		topbar();
		
		$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM daily WHERE nick='$nick'"));
$dtop2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$nick'"));
		if($id == ''){
			top('Dienos misijos');
			
			echo'<div class="meniuc"><b>Dienos Misijos</b> - tai misijos, kuriamas galima vygdyti kiekvieną dieną iš naujo!</div>';
echo'<div class="meniuc">Turite <font color="red"><b>'.$apie['dailyp'].' </b></font>'.$dailyp.' Daily taškų</div>';
echo'<div class="meniuc"><a href="?id=dailyp"><font color="red"><b>Daily Taškų pasiekimai</b></font></a></div>';
echo'<div class="meniuc"><a href="?id=dyspo"><font color="green"><b>Dyspo</b></font></a></div>';
echo'<div class="meniuc"><a href="dienosratas.php?id="><font color="blue"><b>Dienos sekmės ratas!</b></font></a></div>';
echo'<div class="up">1 lygio Dienos Misijos</div>';
	if($row['snd'] == '+'){
		echo'<div class="meniuc">Atnešti '.skaicius(20).' '.$eurui.'
			[<font color="green"><b>Įvygdyta</b></font>] </div>
			
			';	}
if($row['snd'] == '-'){
		echo'<div class="meniuc">Atnešti '.skaicius(20).' '.$eurui.'
		[<font color="red"><b>Neįvygdyta</b></font>]	<br> <a href="?id=turiueur"><b>Vygdyti</b></a></div>
			
			';	}		
		if($row['snd2'] == '+'){
		echo'<div class="meniuc">Padaryti '.skaicius(10000).' '.$attack2.'
			[<font color="green"><b>Įvygdyta</b></font>] </div>
			
			';	}
if($row['snd2'] == '-'){
		echo'<div class="meniuc">Padaryti '.skaicius(10000).' '.$attack2.'
		[<font color="red"><b>Neįvygdyta</b></font>]	<br> <a href="?id=padariauvk"><b>Vygdyti</b></a></div>
			
			';	}			
	if($row['snd3'] == '+'){
		echo'<div class="meniuc">Atnešti '.skaicius(500).'  <b>Majin Srcoll</b>
			[<font color="green"><b>Įvygdyta</b></font>] </div>
			
			';	}
if($row['snd3'] == '-'){
		echo'<div class="meniuc">Atnešti '.skaicius(500).' <b>Majin Scroll</b>
		[<font color="red"><b>Neįvygdyta</b></font>]	<br> <a href="?id=atnesuscroll"><b>Vygdyti</b></a></div>
			
			';	}			

if($row['snd4'] == '+'){
		echo'<div class="meniuc">Paaukoti '.skaicius(1000000000).' '.$pinigaii.'
			[<font color="green"><b>Įvygdyta</b></font>] </div>
			
			';	}
if($row['snd4'] == '-'){
		echo'<div class="meniuc">Paaukoti '.skaicius(1000000000).' '.$pinigaii.'
		[<font color="red"><b>Neįvygdyta</b></font>]	<br> <a href="?id=aukojupin">Vygdyti</a></div>
			
			';	}
if($row['snd5'] == '+'){
		echo'<div class="meniuc">Atnešti '.skaicius(500).'  <b>Mikroskemų</b>
			[<font color="green"><b>Įvygdyta</b></font>] </div>
			
			';	}
if($row['snd5'] == '-'){
		echo'<div class="meniuc">Atnešti '.skaicius(500).' <b>Mikroskemų</b>
		[<font color="red"><b>Neįvygdyta</b></font>]	<br> <a href="?id=atnesumikro"><b>Vygdyti</b></a></div>
			
			';	}		
	elseif($apie['dailyp'] > 999){
echo'<div class="up">2 lygio Dienos Misijos</div>';
	if($row['2snd'] == '+'){
		echo'<div class="meniuc">Atnešti '.skaicius(50).' '.$eurui.'
			[<font color="green"><b>Įvygdyta</b></font>] </div>
			
			';	}
if($row['2snd'] == '-'){
		echo'<div class="meniuc">Atnešti '.skaicius(50).' '.$eurui.'
		[<font color="red"><b>Neįvygdyta</b></font>]	<br> <a href="?id=turiueur2"><b>Vygdyti</b></a></div>
			
			';	}		
		if($row['2snd2'] == '+'){
		echo'<div class="meniuc">Padaryti '.skaicius(20000).' '.$attack2.'
			[<font color="green"><b>Įvygdyta</b></font>] </div>
			
			';	}
if($row['2snd2'] == '-'){
		echo'<div class="meniuc">Padaryti '.skaicius(20000).' '.$attack2.'
		[<font color="red"><b>Neįvygdyta</b></font>]	<br> <a href="?id=padariauvk2"><b>Vygdyti</b></a></div>
			
			';	}			
	if($row['2snd3'] == '+'){
		echo'<div class="meniuc">Atnešti '.skaicius(1000).'  <b>Majin Srcoll</b>
			[<font color="green"><b>Įvygdyta</b></font>] </div>
			
			';	}
if($row['2snd3'] == '-'){
		echo'<div class="meniuc">Atnešti '.skaicius(1000).' <b>Majin Scroll</b>
		[<font color="red"><b>Neįvygdyta</b></font>]	<br> <a href="?id=atnesuscroll2"><b>Vygdyti</b></a></div>
			
			';	}			

if($row['2snd4'] == '+'){
		echo'<div class="meniuc">Paaukoti '.skaicius(5000000000).' '.$pinigaii.'
			[<font color="green"><b>Įvygdyta</b></font>] </div>
			
			';	}
if($row['2snd4'] == '-'){
		echo'<div class="meniuc">Paaukoti '.skaicius(5000000000).' '.$pinigaii.'
		[<font color="red"><b>Neįvygdyta</b></font>]	<br> <a href="?id=aukojupin2">Vygdyti</a></div>
			
			';	}
if($row['2snd5'] == '+'){
		echo'<div class="meniuc">Atnešti '.skaicius(1000).'  <b>Mikroskemų</b>
			[<font color="green"><b>Įvygdyta</b></font>] </div>
			
			';	}
if($row['2snd5'] == '-'){
		echo'<div class="meniuc">Atnešti '.skaicius(1000).' <b>Mikroskemų</b>
		[<font color="red"><b>Neįvygdyta</b></font>]	<br> <a href="?id=atnesumikro2"><b>Vygdyti</b></a></div>
			
			';	}			
}

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","Dienos misijos");
navigacija($g_n);	
			
		}
	if($id == 'dailyp'){
			top('Daily taškų pasiekimai');
			
			echo'<div class="meniuc"><b>Daily taškų pasiekimai</b> - tai pasiekimai, iš kurių galite gauti nemenkus prizus!</div>';
echo'<div class="meniuc">Reikiamas kiekis</div>';
echo' <div class="meniu">';
if($row['m'] == '+'){echo"		".$ico." Turėti <b>1,000 </b> $dailyp [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['m'] == ''){echo"		".$ico." <a href='?id=dailym1'>Turėti <b>1,000</b>$dailyp</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['m2'] == '+'){echo"		".$ico." Turėti <b>2,000 </b> $dailyp [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['m2'] == ''){echo"		".$ico." <a href='?id=dailym2'>Turėti <b>2,000</b>$dailyp</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['m3'] == '+'){echo"		".$ico." Turėti <b>4,000 </b> $dailyp [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['m3'] == ''){echo"		".$ico." <a href='?id=dailym3'>Turėti <b>4,000</b>$dailyp</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['m4'] == '+'){echo"		".$ico." Turėti <b>7,000 </b> $dailyp [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['m4'] == ''){echo"		".$ico." <a href='?id=dailym4'>Turėti <b>7,000</b>$dailyp</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['m5'] == '+'){echo"		".$ico." Turėti <b>12,000 </b> $dailyp [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['m5'] == ''){echo"		".$ico." <a href='?id=dailym5'>Turėti <b>12,000</b>$dailyp</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
echo'</div>';
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","Dienos misijos");
navigacija($g_n);	
			
		}
// pasiekimai
if($id == 'dailym1'){
	top("Daily pasiekimas");
	
	
	$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM daily WHERE nick='$nick'"));
	if($apie['dailyp'] < 999){
				echo"<div class='meniuc'>Nepakanka $dailyp !</div>";
			
}			

elseif($row['m'] == '+'){
		
			echo'<div class="meniuc">Šį pasiekimą jau esi įvygdęs!</div>';
		
	
}
			else{
				
			echo'<div class="meniuc">Įvygdei pasiekimą sėkmingai! Gavai  <b>100 </b> '.$eurui.' !</div>';
			mysqli_query($conn,"UPDATE daily SET m='+' WHERE nick='$nick'");
	
			mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'100'WHERE nick='$nick'");
		
		
			}


	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","daily.php?id=","Daily Misijos","Daily pasiekimai");
navigacija($g_n);	
			
		}
if($id == 'dailym2'){
	top("Daily pasiekimas");
	
	
	$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM daily WHERE nick='$nick'"));
	if($apie['dailyp'] < 1999){
				echo"<div class='meniuc'>Nepakanka $dailyp !</div>";
			
}			

elseif($row['m2'] == '+'){
		
			echo'<div class="meniuc">Šį pasiekimą jau esi įvygdęs!</div>';
		
	
}
			else{
				
			echo'<div class="meniuc">Įvygdei pasiekimą sėkmingai! Gavai  <b>150 </b> '.$eurui.' !</div>';
			mysqli_query($conn,"UPDATE daily SET m2='+' WHERE nick='$nick'");
	
			mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'150'WHERE nick='$nick'");
		
		
			}


	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","daily.php?id=","Daily Misijos","Daily pasiekimai");
navigacija($g_n);	
			
		}
if($id == 'dailym3'){
	top("Daily pasiekimas");
	
	
	$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM daily WHERE nick='$nick'"));
	if($apie['dailyp'] < 3999){
				echo"<div class='meniuc'>Nepakanka $dailyp !</div>";
			
}			

elseif($row['m3'] == '+'){
		
			echo'<div class="meniuc">Šį pasiekimą jau esi įvygdęs!</div>';
		
	
}
			else{
				
			echo'<div class="meniuc">Įvygdei pasiekimą sėkmingai! Gavai  <b>200 </b> '.$eurui.' !</div>';
			mysqli_query($conn,"UPDATE daily SET m3='+' WHERE nick='$nick'");
	
			mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'200'WHERE nick='$nick'");
		
		
			}


	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","daily.php?id=","Daily Misijos","Daily pasiekimai");
navigacija($g_n);	
			
		}
if($id == 'dailym4'){
	top("Daily pasiekimas");
	
	
	$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM daily WHERE nick='$nick'"));
	if($apie['dailyp'] < 6999){
				echo"<div class='meniuc'>Nepakanka $dailyp !</div>";
			
}			

elseif($row['m4'] == '+'){
		
			echo'<div class="meniuc">Šį pasiekimą jau esi įvygdęs!</div>';
		
	
}
			else{
				
			echo'<div class="meniuc">Įvygdei pasiekimą sėkmingai! Gavai  <b>300 </b> '.$eurui.' !</div>';
			mysqli_query($conn,"UPDATE daily SET m4='+' WHERE nick='$nick'");
	
			mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'300'WHERE nick='$nick'");
		
		
			}


	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","daily.php?id=","Daily Misijos","Daily pasiekimai");
navigacija($g_n);	
			
		}
if($id == 'dailym5'){
	top("Daily pasiekimas");
	
	
	$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM daily WHERE nick='$nick'"));
	if($apie['dailyp'] < 11999){
				echo"<div class='meniuc'>Nepakanka $dailyp !</div>";
			
}			

elseif($row['m5'] == '+'){
		
			echo'<div class="meniuc">Šį pasiekimą jau esi įvygdęs!</div>';
		
	
}
			else{
				
			echo'<div class="meniuc">Įvygdei pasiekimą sėkmingai! Gavai  <b>500 </b> '.$eurui.' !</div>';
			mysqli_query($conn,"UPDATE daily SET m5='+' WHERE nick='$nick'");
	
			mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'500'WHERE nick='$nick'");
		
		
			}


	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","daily.php?id=","Daily Misijos","Daily pasiekimai");
navigacija($g_n);	
			
		}

//1 lvl
if($id == 'aukojupin'){
	top("Daily misija");
	
	
	$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM daily WHERE nick='$nick'"));
	if($apie['litai'] < 999999999){
				echo"<div class='meniuc'>Nepakanka '.$pinigaii.' !</div>";
			
}			

elseif($row['snd4'] == '+'){
		
			echo'<div class="meniuc">Šiandien jau paaukojai '.$pinigaii.' !</div>';
		
	
}
			else{
				
			echo'<div class="meniuc">Įvygdei misiją sėkmingai, gavai  <b>100 </b> '.$dailyp.' !</div>';
			mysqli_query($conn,"UPDATE daily SET snd4='+' WHERE nick='$nick'");
	
			mysqli_query($conn,"UPDATE zaidejai SET dailyp=dailyp+'100', litai=litai-'1000000000' WHERE nick='$nick'");
		
		
			}


	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","daily.php?id=","Daily Misijos","Daily misija");
navigacija($g_n);	
			
		}
if($id == 'turiueur'){
	top("Daily misija");
	
			$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM daily WHERE nick='$nick'"));
	
	if($apie['sms_litai'] < 19){
				echo"<div class='meniuc'>Nepakanka '.$eurui.' !</div>";
			
}			
elseif($row['snd'] == '+'){
		
			echo'<div class="meniuc">Šiandien jau paaukojai '.$eurui.'!</div>';
		
	}
			else{
				
			echo'<div class="meniuc">Įvygdei sėkmingai, gavai  <b>50</b> '.$dailyp.'!</div>';
			
	
			mysqli_query($conn,"UPDATE zaidejai SET dailyp=dailyp+'50', sms_litai=sms_litai-'20' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE daily SET snd='+' WHERE nick='$nick'");
		
			}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","daily.php?id=","Daily Misijos","Daily misija");
navigacija($g_n);	
			
		}

if($id == 'atnesuscroll'){
	top("Daily misija");
	
	
	
	if($inv['Majinsroll'] < 499){
				echo"<div class='meniuc'>Neturi pakankamai <b>Majin Scroll</b>  !</div>";
			
}			
elseif($row['snd3'] == '+'){
		
			echo'<div class="meniuc">Šiandien jau atnešei <b>Majin Scroll</b> !</div>';
		
	}
			else{
				
			echo'<div class="meniuc">Įvygdei sėkmingai, gavai  <b>30 </b>'.$dailyp.'  !</div>';
			mysqli_query($conn,"UPDATE daily SET snd3='+' WHERE nick='$nick'");
	
			mysqli_query($conn,"UPDATE zaidejai SET dailyp=dailyp+'30' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE inv SET Majinsroll=Majinsroll-'500' WHERE nick='$nick'");
		
			}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","daily.php?id=","DAILY MISIJOS","Daily misija");
navigacija($g_n);	
			
		}
if($id == 'atnesumikro'){
	top("Daily misija");
	
	
	
	if($inv['Microshem'] < 499){
				echo"<div class='meniuc'>Neturi pakankamai mikroskemų !</div>";
			
}			
elseif($row['snd5'] == '+'){
		
			echo'<div class="meniuc">Šiandien jau atnešei mikroskemas!</div>';
		
	}
			else{
				
			echo'<div class="meniuc">Įvygdei sėkmingai, gavai  <b>30 </b> '.$dailyp.' !</div>';
			mysqli_query($conn,"UPDATE daily SET snd5='+' WHERE nick='$nick'");
	
			mysqli_query($conn,"UPDATE zaidejai SET dailyp=dailyp+'30' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE inv SET Microshem=Microshem-'500' WHERE nick='$nick'");
		
			}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","daily.php?id=","DAILY MISIJOS","Daily misija");
navigacija($g_n);	
			
		}
if($id == 'padariauvk'){
	top("Daily misija");
	
	
	
	if($dtop2['vksm'] < 9999){
				echo"<div class='meniuc'>Neesi šiandien padaręs tiek veiksmų!</div>";
			
}			
elseif($row['snd2'] == '+'){
		
			echo'<div class="meniuc">Šiandien jau padarei tiek veiksmų!</div>';
		
	}
			else{
				
			echo'<div class="meniuc">Įvygdei sėkmingai, gavai  <b>40 </b>'.$dailyp.' !</div>';
			mysqli_query($conn,"UPDATE daily SET snd2='+' WHERE nick='$nick'");
	
			mysqli_query($conn,"UPDATE zaidejai SET dailyp=dailyp+'40' WHERE nick='$nick'");
		
			}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","daily.php?id=","DAILY MISIJOS","Daily misija");
navigacija($g_n);	
			
		}
/// 2 lvl

if($id == 'aukojupin2'){
	top("Daily misija");
	
	
	$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM daily WHERE nick='$nick'"));
	if($apie['litai'] < 4999999999){
				echo"<div class='meniuc'>Nepakanka '.$pinigaii.' !</div>";
			
}			
	elseif($apie['dailyp'] < 999){
echo'<div class="meniuc">Norint vygdyti turite turėti bent <b>1000</b>'.$dailyp.'</div>';
		
	}
elseif($row['2snd4'] == '+'){
		
			echo'<div class="meniuc">Šiandien jau paaukojai '.$pinigaii.' !</div>';
		
	
}
			else{
				
			echo'<div class="meniuc">Įvygdei misiją sėkmingai, gavai  <b>200 </b> '.$dailyp.' !</div>';
			mysqli_query($conn,"UPDATE daily SET 2snd4='+' WHERE nick='$nick'");
	
			mysqli_query($conn,"UPDATE zaidejai SET dailyp=dailyp+'200', litai=litai-'5000000000' WHERE nick='$nick'");
		
		
			}


	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","daily.php?id=","Daily Misijos","Daily misija");
navigacija($g_n);	
			
		}
if($id == 'turiueur2'){
	top("Daily misija");
	
			$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM daily WHERE nick='$nick'"));
	
	if($apie['sms_litai'] < 49){
				echo"<div class='meniuc'>Nepakanka '.$eurui.' !</div>";
			
}			
	elseif($apie['dailyp'] < 999){
echo'<div class="meniuc">Norint vygdyti turite turėti bent <b>1000</b>'.$dailyp.'</div>';
		
	}
elseif($row['2snd'] == '+'){
		
			echo'<div class="meniuc">Šiandien jau paaukojai '.$eurui.'!</div>';
		
	}
			else{
				
			echo'<div class="meniuc">Įvygdei sėkmingai, gavai  <b>100</b> '.$dailyp.'!</div>';
			
	
			mysqli_query($conn,"UPDATE zaidejai SET dailyp=dailyp+'100', sms_litai=sms_litai-'50' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE daily SET 2snd='+' WHERE nick='$nick'");
		
			}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","daily.php?id=","Daily Misijos","Daily misija");
navigacija($g_n);	
			
		}

if($id == 'atnesuscroll2'){
	top("Daily misija");
	
	
	
	if($inv['Majinsroll'] < 999){
				echo"<div class='meniuc'>Neturi pakankamai <b>Majin Scroll</b>  !</div>";
			
}			
	elseif($apie['dailyp'] < 999){
echo'<div class="meniuc">Norint vygdyti turite turėti bent <b>1000</b>'.$dailyp.'</div>';
		
	}
elseif($row['2snd3'] == '+'){
		
			echo'<div class="meniuc">Šiandien jau atnešei <b>Majin Scroll</b> !</div>';
		
	}
			else{
				
			echo'<div class="meniuc">Įvygdei sėkmingai, gavai  <b>70 </b>'.$dailyp.'  !</div>';
			mysqli_query($conn,"UPDATE daily SET 2snd3='+' WHERE nick='$nick'");
	
			mysqli_query($conn,"UPDATE zaidejai SET dailyp=dailyp+'70' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE inv SET Majinsroll=Majinsroll-'1000' WHERE nick='$nick'");
		
			}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","daily.php?id=","DAILY MISIJOS","Daily misija");
navigacija($g_n);	
			
		}
if($id == 'atnesumikro2'){
	top("Daily misija");
	
	
	
	if($inv['Microshem'] < 999){
				echo"<div class='meniuc'>Neturi pakankamai mikroskemų !</div>";
			
}			
	elseif($apie['dailyp'] < 999){
echo'<div class="meniuc">Norint vygdyti turite turėti bent <b>1000</b>'.$dailyp.'</div>';
		
	}
elseif($row['2snd5'] == '+'){
		
			echo'<div class="meniuc">Šiandien jau atnešei mikroskemas!</div>';
		
	}
			else{
				
			echo'<div class="meniuc">Įvygdei sėkmingai, gavai  <b>70 </b> '.$dailyp.' !</div>';
			mysqli_query($conn,"UPDATE daily SET 2snd5='+' WHERE nick='$nick'");
	
			mysqli_query($conn,"UPDATE zaidejai SET dailyp=dailyp+'70' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE inv SET Microshem=Microshem-'1000' WHERE nick='$nick'");
		
			}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","daily.php?id=","DAILY MISIJOS","Daily misija");
navigacija($g_n);	
			
		}
if($id == 'padariauvk2'){
	top("Daily misija");
	
	
	
	if($dtop2['vksm'] < 19999){
				echo"<div class='meniuc'>Neesi šiandien padaręs tiek veiksmų!</div>";
			
}			
	elseif($apie['dailyp'] < 999){
echo'<div class="meniuc">Norint vygdyti turite turėti bent <b>1000</b>'.$dailyp.'</div>';
		
	}
elseif($row['2snd2'] == '+'){
		
			echo'<div class="meniuc">Šiandien jau padarei tiek veiksmų!</div>';
		
	}
			else{
				
			echo'<div class="meniuc">Įvygdei sėkmingai, gavai  <b>90 </b>'.$dailyp.' !</div>';
			mysqli_query($conn,"UPDATE daily SET 2snd2='+' WHERE nick='$nick'");
	
			mysqli_query($conn,"UPDATE zaidejai SET dailyp=dailyp+'90' WHERE nick='$nick'");
		
			}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","daily.php?id=","DAILY MISIJOS","Daily misija");
navigacija($g_n);	
			
		}
elseif($id == "dyspo"){
				top('Dyspo');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Dyspo</b><br/>
'.$ico2.' Jėga: <font color="green"><b>+1500%</b></font><br/>
'.$ico2.' Gynyba: <font color="green"><b>+1500%</b></font><br/>
'.$ico2.' Gyvybes: <font color="green"><b>+1500%</b></font><br/>
'.$ico2.' Kaina: <b> 50000 </b><font color="red"><b>'.$dailyp.'</b></font><br/>
		</td>
		<td>
		<img src="img/veikejai/Dyspo-0.png">
		</td>
		</tr>
		</table> </div>	

		
<div class="meniu">'.$ico.' <b><a href="daily.php?id=perku_dyspo">Pirkti šį veikėją</a></b></div>
		
		
		
		';
		
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","daily.php","Daily misijos", "Dyspo");
	navigacija($g_n);


}

elseif($id == "perku_dyspo"){
	top('Dyspo');
	 online('Leidžia Daily taskus');
if($apie['dyspob']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
	if($apie['dailyp'] < 49999 ){
		echo'<div class="meniuc">
  Neužtenka  <b><font color="red">'.$dailyp.'!</b></font></div>';}

else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Dyspo-0.png"></div><div class="meniuc"> Nusipirkai už <b>50000 </b> <b><font color="red">'.$dailyp.'</b></font>
 </div> ';		
mysqli_query($conn,"UPDATE zaidejai SET  dailyp=dailyp-'50000' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Dyspo', trans='0', sms_litai=sms_litai-'0' , kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");


mysqli_query($conn,"UPDATE zaidejai SET dyspob='$timxx' WHERE nick='$nick' ");
}}


elseif($apie['dyspob']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","daily.php","Dienos misijos",  "Veikejo pirkimas");
	navigacija($g_n);
	
}



 foot();
