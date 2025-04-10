<?php
ob_start();
include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
echo'
<div class="up">
<img src="img/baneriai/botasm.png" /></div>';

		 topbar();
if($id == ""){
		top('Nenaudojamų nick turgus');
		

	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM nick_turgus")) == false){
	echo'<div class="meniuc"><b>Parduodamų nick nėra</b></div>';
	}
	else
	{
		$viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM nick_turgus"))[0];

		if($viso > 0){
       $rezultatu_rodymas=5;
       $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
       if (empty($psl) or $psl < 0) $psl = 1;
       if ($psl > $total) $psl = $total;
       $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
            
       $query = mysqli_query($conn,"SELECT * FROM nick_turgus ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
       $puslapiu=ceil($viso/$rezultatu_rodymas);
            
     
       while($row = mysqli_fetch_assoc($query)){
		
									
			echo'<div class="meniu">
			'.$ico.' Parduodamas nick <b><a href="pagrindinis.php?id=apie&ka='.$row[nick].'">'.statusas($row[nick]).'</a></b><br />
		'.$ico.' 	Kaina <b>10 LT</b><br/>
		'.$ico.' 	Norėdami gauti nick siuskite sms <b>dbafn '.$row[nick].'</b> numeriu <b>1398</b>, slaptažodį gausite sms žinutę į tą numerį iš kurio pirkote!
			
			
		</div>
		';
		
			
			
			
			unset($row);
			
		}
      
        }
	  echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=').'</div>';
	}
		
		
		
		
		    
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php","Miestas","Nick turgus");
	navigacija($g_n);
}
foot();
?>
