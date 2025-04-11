<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();

		topbar();
$in = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$co'"));
		$info = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'"));
$info2 = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'"));
		$nust = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM nustatymai"));
$koma = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM team"));
$komanda = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM team WHERE vadas='$nick'"));
$team2 = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM team WHERE dienosmedal='$id'"));
$ismok = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user WHERE team !=''"));

if(empty($id)){
	top('Komandos');

echo'<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
	echo'
<div class="up">Informacija:</div>
<div class="meniu">
	

	
<img src=img/imgg/komandos.png border="1" width="16" height="16"><a href="komanda.php?id=all&ka='.$user['team'].'">Visos Komandos</a><br/>
';
	if(!empty($user['team'])){
		echo'<img src=img/imgg/komandos.png border="1" width="16" height="16"><a href="komanda.php?id=info&ka='.$user['team'].'">Mano Komanda</a><br/>';
	}else{
		echo'<img src=img/imgg/komandos.png border="1" width="16" height="16"><a href="komanda.php?id=ikurti">Įkurti Komandą</a><br/>';
	}
echo'<img src=img/imgg/komandos.png border="1" width="16" height="16"><a href="komanda.php?id=teamtop">Komandų Topai</a>';
echo'</div>';
echo'<div class="up">Komandų varžybos:</div>
<div class="meniu">
<img src=img/imgg/komandos.png border="1" width="16" height="16"><a href="komanda.php?id=dtop">Dienos kovų TOP</a><br/>
<img src=img/imgg/komandos.png border="1" width="16" height="16"> <a href="komanda.php?id=sdtop">Savaitės kovų TOP</a></div>';
	/*echo'<div class="up">Uždarbiai:</div><div class="meniu">'.$ico2.' Kreditai team nariams bus išmokėti po '.laikas($nust[team_ismokejimas]-time(),1).'</br>
	'.$ico2.'	Bus išmokėta iš žaidimo iždo '.$ismok*5 .' kreditų</div>';*/
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","Komandos");
navigacija($g_n);
}
if($id == 'teamtop'){
	top('Komandų Topai');
echo'<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
	echo"<div class='meniuc'>Komandų Topai
</div>";
echo'
<div class="meniu">
	<a href="?id=topdtop"><b>1.</b>Laimėtų dienos kovų TOP</a><br/>
	<a href="?id=topalgos"><b>2.</b>Didžiausios algos TOP</a><br/>
	<a href="?id=topkovu"><b>3.</b>Laimėtų kovų TOP</a><br/>
<a href="?id=toppinigu"><b>4.</b>Ižde Pinigų TOP</a><br>
<a href="?id=topeuru"><b>5.</b>Ižde Eurų TOP</a>
</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","Komandų topai");
navigacija($g_n);
}
if($id == 'topkovu'){
	top('Komandų laimėtų kovų topas');
echo'<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
	echo"<div class='meniuc'>Laimėtų kovų TOP
	 </div>
<div class='meniuc'>

	<b>TOP 5 Komandos</b>:<br></div>";
	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team")) == false){
		
			echo"<div class='meniuc'>Dar niekas neturi kovų.</div>";
		
	}else{
		

 $query = mysqli_query($conn,"SELECT * FROM team ORDER BY viso_laimejo_kovu DESC LIMIT 5");
    echo '<div class="meniu">';
    while($row = mysqli_fetch_assoc($query)){
        $vt++;
		  
        echo ' <b>'.$vt.'</b>.<a href="?id=info&ka='.$row['pavadinimas'].'"><b>'.$row['pavadinimas'].'</b></a> - <b>'.$row['viso_laimejo_kovu'].'</b><small> Laimėjo kovų</small><br>';

}
}
echo'</div>';


$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos", "Komandų kovų topas");
navigacija($g_n);
}
if($id == 'toppinigu'){
	top('Komandų ižde pinigų topas');
echo'<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
	echo"<div class='meniuc'>Ižde pinigų TOP
	 </div>
<div class='meniuc'>

	<b>TOP 5 Komandos</b>:<br></div>";
	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team")) == false){
		
			echo"<div class='meniuc'>Dar niekas neturi pinigų.</div>";
		
	}else{
		

 $query = mysqli_query($conn,"SELECT * FROM team ORDER BY pinigai DESC LIMIT 5");
    echo '<div class="meniu">';
    while($row = mysqli_fetch_assoc($query)){
        $vt++;
		  
        echo ' <b>'.$vt.'</b>.<a href="?id=info&ka='.$row['pavadinimas'].'"><b>'.$row['pavadinimas'].'</b></a> - '.skaicius($row['pinigai']).' '.$pinigaii.'</b><br>';

}
}
echo'</div>';


$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos", "Komandų ižde pinigų topas");
navigacija($g_n);
}
if($id == 'topeuru'){
	top('Komandų ižde eurų topas');
echo'<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
	echo"<div class='meniuc'>Ižde eurų TOP
	 </div>
<div class='meniuc'>

	<b>TOP 5 Komandos</b>:<br></div>";
	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team")) == false){
		
			echo"<div class='meniuc'>Dar niekas neturi eurų.</div>";
		
	}else{
		

 $query = mysqli_query($conn,"SELECT * FROM team ORDER BY eurai DESC LIMIT 5");
    echo '<div class="meniu">';
    while($row = mysqli_fetch_assoc($query)){
        $vt++;
		  
        echo ' <b>'.$vt.'</b>.<a href="?id=info&ka='.$row['pavadinimas'].'"><b>'.$row['pavadinimas'].'</b></a> - '.$row['eurai'].' '.$eurui.'</b><br>';

}
}
echo'</div>';


$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos", "Komandų ižde eurų topas");
navigacija($g_n);
}
if($id == 'topalgos'){
	top('Komandų didžiausios algos topas');
echo'<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
	echo"<div class='meniuc'>Didžiausios algos TOP
	 </div>
<div class='meniuc'>

	<b>TOP 5 Komandos</b>:<br></div>";
	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team")) == false){
		
			echo"<div class='meniuc'>Dar nemoka algų.</div>";
		
	}else{
		

 $query = mysqli_query($conn,"SELECT * FROM team ORDER BY uz_500_kovu DESC LIMIT 5");
    echo '<div class="meniu">';
    while($row = mysqli_fetch_assoc($query)){
        $vt++;
		  
        echo ' <b>'.$vt.'</b>.<a href="?id=info&ka='.$row['pavadinimas'].'"><b>'.$row['pavadinimas'].'</b></a> - '.skaicius($row['uz_500_kovu']).' '.$pinigaii.' </small><br>';

}
}
echo'</div>';


$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos", "Komandų didžiausios algos topas");
navigacija($g_n);
}

if($id == 'topdtop'){
	top('Komandų dienos kovų top win');
echo'<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
	echo"<div class='meniuc'><small>Komandų dienos kovų laimėjimų TOP</small>
	 </div>
<div class='meniuc'>

	<b>TOP 5 Komandos</b>:<br></div>";
	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team ")) == false){
		
			echo"<div class='meniuc'>Dar niekas nelaimėjo.</div>";
		
	}else{
		

 $query = mysqli_query($conn,"SELECT * FROM team ORDER BY laimetu_dtop DESC LIMIT 5");
    echo '<div class="meniu">';
    while($row = mysqli_fetch_assoc($query)){
        $vt++;
		  
        echo ' <b>'.$vt.'</b>.<a href="?id=info&ka='.$row['pavadinimas'].'"><b>'.$row['pavadinimas'].'</b></a> - <b>'.skaicius($row['laimetu_dtop']).' </b><small>Dienos TOP laimėjimų</small><br>';

}
}
echo'</div>';


$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos", "Komandų dienos kovų top win");
navigacija($g_n);
}
if($id == 'all'){
	top('Visos komandos');

echo'<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
	echo'<div class="meniu">';

	$viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM team"))[0];
	if($viso > 0){
        $rezultatu_rodymas=20;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
      
        $puslapiu=ceil($viso/$rezultatu_rodymas);}
 $nst = mysqli_query($conn,"SELECT * FROM team ORDER BY id LIMIT $nuo_kiek,$rezultatu_rodymas");
while($nt = mysqli_fetch_assoc($nst)){
	
	$nr++;
	echo"<b>".$nr.".</b> <a href='?id=info2&co=".$nt['pavadinimas']."&ka=".$ka."'>".$nt['pavadinimas']."</a><br>";

	
}
echo'</div>';
  echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=all').'</div>';
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","Visos komandos");
navigacija($g_n);
		
}

if($id == "ikurti"){
		top('Komandos ikurimas');
echo'<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
		 echo '
		     <div class="meniuc">Įkurimas kainuoja <b>500</b> <img src="img/bicons/euro.png">!</div>
         <form method="post" action="?id=ikurti2">
          
          <div class="meniuc">
        
          Komandos pavadinimas:<br /><input type="text" name="teamas"/><br />
      
         <input type="submit" name="submit" value="Ikurti"/></form>
        </div>';
			$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","Komandos ikurimas");
navigacija($g_n);
		
		
	}	
	if($id == "ikurti2"){
		top('Komandos ikurimas');
		if(isset($_POST['submit'])){
            $teamas = isset($_POST['teamas']) ? preg_replace("/[^A-Za-z0-9_]/","",$_POST['teamas'])  : null;
			
			if(empty($teamas)){
                $klaida = 'Tuscias laukelis!';}
			  elseif(strlen($teamas) < 3){
                $klaida = 'Min 3 simboliai.';
            }
            elseif(strlen($teamas) > 20){
                $klaida = 'Max 20 simboliu.';
            }
			 elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$teamas' ")) == true ){
                $klaida = 'Tokia komada jau yra!';
            }
			elseif ($apie['komanda_time'] > time()) {
				$klaida = 'Komandą neseniai buvai sukūręs. Palauk tada vėl kurk.';
			}
			 elseif(
			 	$apie['sms_litai'] < 499){
				  $klaida = 'Nepakanka <img src="img/bicons/euro.png">!';
			 }
		elseif(preg_match('/[^A-Za-z0-9]/', $teamas)){
                $klaida = 'Negalima naudoti spec. simbolių!';
            }else{
            	echo"<div class='meniuc'>Komanda ikurta</div>";
				mysqli_query($conn,"INSERT INTO team SET vadas='$nick', pavadinimas='$teamas',topic='Nenustatytas', max='5', kritinislvl='0' ");


				mysqli_query($conn,"UPDATE user SET team='$teamas', iki_algos='1000', iki_algos2='1000' WHERE nick='$nick'");
				mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'500' WHERE nick='$nick'");

				$time = time() + 60 * 60 * 48;
				mysqli_query($conn,"UPDATE zaidejai SET komanda_time='$time' WHERE nick='$nick'");
            }
			 if(isset($klaida)){
                echo '<div class="meniuc">'.$klaida.'</div>';
			 }
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","Komandos ikurimas");
navigacija($g_n);
	}}
   
		
	
if($id == 'info'){

$info = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'"));
top(''.$ka.' komanda');
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'")) == false){
echo"<div class='meniuc'>Tokios komandos nėra</div>";
}else{
if(apsas($ka) == apsas($ka)){
	
echo"
<div class='meniuc'>";
if($info['foto'] == ''){$ft_ko = "<img src='img/imgg/komandos.png'> ";}else{$ft_ko = "<img src='$info[foto]'height='180' width='240'>";}
echo'

'.$ft_ko.'</div>
<div class="up">Komandos Informacija:</div>
</div><div class="meniuc">
Topic: <b>'.$info['topic'].'</b></div>';
echo'<div class="up">Komandos prizai</div>';
echo'<div class="meniuc">';
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM teammedal WHERE pavadinimas='$ka'")) == 0){
	echo'Apdovanojimų ši komanda neturi!';
}else{
$qq = mysqli_query($conn,"SELECT * FROM teammedal WHERE pavadinimas='$ka'");
while($rr = mysqli_fetch_assoc($qq))
{

echo'<a href="?id=medal&ka='.$ka.'&ID='.$rr['id'].'"><img src="img/teammedal/'.$rr['medalis'].'.png" width="30" height="30"/></a>'	;

}
$qq = mysqli_query($conn,"SELECT * FROM teammedal2 WHERE pavadinimas='$ka'");
while($rr = mysqli_fetch_assoc($qq))
{

echo'<a href="?id=medal2&ka='.$ka.'&ID='.$rr['id'].'"><img src="img/teammedal/'.$rr['medalis'].'.png" width="30" height="30"/></a>'	;

}
$qq = mysqli_query($conn,"SELECT * FROM teammedal3 WHERE pavadinimas='$ka'");
while($rr = mysqli_fetch_assoc($qq))
{

echo'<a href="?id=medal3&ka='.$ka.'&ID='.$rr['id'].'"><img src="img/teammedal/'.$rr['medalis'].'.png" width="30" height="30"/></a>'	;

}
$qq = mysqli_query($conn,"SELECT * FROM teammedals WHERE pavadinimas='$ka'");
while($rr = mysqli_fetch_assoc($qq))
{

echo'<a href="?id=medals&ka='.$ka.'&ID='.$rr['id'].'"><img src="img/teammedal/'.$rr['medalis'].'.png" width="30" height="30"/></a>'	;

}


}
echo'</div>';
if(apsas($user['team']) == apsas($ka)){echo"<div class='up'>Komandos bosai</div>";}
if(apsas($user['team']) == apsas($ka)){echo"<div class='meniuc'> <a href='komanda.php?id=team_boss&ka=$ka'><font color='red'><h3><b>Komandos bosai</b></font></h3></a></div>
";}
echo'<div class="up">Komandos Ištekliai:</div>';





echo'<div class="meniu">


'.$ico.' Komandos ižde: <b>'.skaicius($info['pinigai']).'</b> <img src="img/bicons/pinigai.png"> , '.$info['eurai'].'</b> <img src="img/bicons/euro.png"><br>


'.$ico.' Alga už '.$user['iki_algos2'].' Kovų: <b>'.skaicius($info['uz_500_kovu']).' <img src="img/bicons/pinigai.png"></b>,<b> '.$info['uz_500_kovu2'].'</b> '.$eurui.'</br>';
if(apsas($info['vadas']) == apsas($nick)){

echo" ".$ico." Komandos ataka:<b> ".skaicius($info['ataka'])."</b> <a href='komanda.php?id=keltiataka&ka=$ka'> [<b>Kelti ataką</b>]</a><br>";}
if(apsas($info['vadas']) == apsas($nick)){

echo" ".$ico." Komandos gynyba:<b> ".skaicius($info['gynyba'])."</b> <a href='komanda.php?id=keltigynyba&ka=$ka'> [<b>Kelti gynybą</b>]</a><br>";}



echo' '.(empty($user['team']) ? "<a href='?id=prasytis&ka=".$ka."'>$ico Prašytis i komanda</a><br />" : NULL).'
	
	';
if(apsas($user['team']) == apsas($ka) AND apsas($komanda['nick']) != apsas($nick)){
echo"".$ico."Iki algos liko: <b>".$user['iki_algos']." kovų</b><br>";}
echo"".$ico."Komanda laimėjus: <b>".$info['win']." kartų</b><br>";
echo"".$ico."Komanda pralaimėjus: <b>".$info['lose']." kartų</b><br>";
echo'
'.$ico.' Vadas: <b>'.$info['vadas'].'</b><br>';
if(apsas($user['team']) == apsas($ka)){ echo'
'.$ico.' Ši komanda nukovė: <b>'.$info['nukirtobosu'].' bosų</b><img src="img/bicons/teamb.png" /><br>
'.$ico.' Komandos taškai: <b>'.$info['teamp'].' </b><img src="img/bicons/teamp.png" /><br>
'.$ico.' Komandos kritinis lygis: <b>'.$info['kritinislvl'].' </b><img src="img/bicons/teams.png" /><br>';}
echo''.$ico.' Viso laimėjo kovų: <b>'.$info['viso_laimejo_kovu'].'</b>
</div>';
echo'';
if(apsas($user['team']) == apsas($ka)){echo'<div class="up">Narys/Vadas:</div>';}

if(apsas($info['vadas']) == apsas($nick)){

echo" <div class='meniu'>".$ico." <a href='komanda.php?id=admin_cp&ka=$ka'>Vado CP</a></div>";}

if(apsas($info['pavadotuojas']) == apsas($nick)){

echo" <div class='meniu'>".$ico." <a href='komanda.php?id=pv_cp&ka=$ka'>Pavaduotojo CP</a></div>";}

if(apsas($user['team']) == apsas($ka)){echo"<div class='meniu'>".$ico." <a href='komanda.php?id=nario_cp&ka=$ka'>Nario CP</a></div>
";}
if(apsas($user['team']) == apsas($ka)){echo"<div class='meniu'>".$ico." <a href='komanda.php?id=kmisijos&ka=$ka'>Komandos Misijos</a></div>
";}
if(apsas($user['team']) == apsas($ka)){echo"<div class='meniu'>".$ico." <a href='komanda.php?id=shop&ka=$ka'><font color='red'><b>Komandos Parduotuvė<b></font></a></div>
";}
echo'<div class="up">Nariai</div><div class="meniu">';
$kiekis= number_format($nt['win_in_team']);

	$viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM user WHERE team ='$ka'"))[0];
    if($viso > 0){
        $rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
        $query = mysqli_query($conn,"SELECT * FROM user WHERE team='$ka' ORDER BY win_in_team DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
        $puslapiu=ceil($viso/$rezultatu_rodymas);
$nst = mysqli_query($conn,"SELECT * FROM user WHERE team='$ka' ORDER BY win_");
while($nt = mysqli_fetch_assoc($query)){

	$nr++;
	echo"<b>".$nr.".</b> <a href='pagrindinis.php?id=apie&ka=".$nt['nick']."'>".$nt['nick']." </a>-  Laimėjo kovų: <b>".number_format($nt['win_in_team'])."</b><br>";



}
echo'</div>';
  echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=info&ka='.$ka.'').'</div>';


}

}}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos"," $ka komanda");
navigacija($g_n);
}

if($id == 'info2'){

$in = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$co'"));
top(''.$co.' komanda');
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$co'")) == false){
echo"<div class='meniuc'>Tokios komandos nėra</div>";
}else{


echo"
<div class='meniuc'>";
if($in['foto'] == ''){$ft_ko = "<img src='img/imgg/komandos.png'> ";}else{$ft_ko = "<img src='$in[foto]'height='180' width='240'>";}
echo'

'.$ft_ko.'</div>
<div class="up">Komandos Informacija:</div>
</div><div class="meniuc">
Topic: <b>'.$in['topic'].'</b></div>';
echo'<div class="up">Komandos prizai</div>';
echo'<div class="meniuc">';
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM teammedal WHERE pavadinimas='$co'")) == 0){
	echo'Apdovanojimų ši komanda neturi!';
}else{
$qq = mysqli_query($conn,"SELECT * FROM teammedal WHERE pavadinimas='$co'");
while($rr = mysqli_fetch_assoc($qq))
{

echo'<a href="?id=medal&co='.$co.'&ID='.$rr['id'].'"><img src="img/teammedal/'.$rr['medalis'].'.png" width="30" height="30"/></a>'	;

}
$qq = mysqli_query($conn,"SELECT * FROM teammedal2 WHERE pavadinimas='$co'");
while($rr = mysqli_fetch_assoc($qq))
{

echo'<a href="?id=medal2&co='.$co.'&ID='.$rr['id'].'"><img src="img/teammedal/'.$rr['medalis'].'.png" width="30" height="30"/></a>'	;

}
$qq = mysqli_query($conn,"SELECT * FROM teammedal3 WHERE pavadinimas='$co'");
while($rr = mysqli_fetch_assoc($qq))
{

echo'<a href="?id=medal3&co='.$co.'&ID='.$rr['id'].'"><img src="img/teammedal/'.$rr['medalis'].'.png" width="30" height="30"/></a>'	;

}
$qq = mysqli_query($conn,"SELECT * FROM teammedals WHERE pavadinimas='$co'");
while($rr = mysqli_fetch_assoc($qq))
{

echo'<a href="?id=medals&co='.$co.'&ID='.$rr['id'].'"><img src="img/teammedal/'.$rr['medalis'].'.png" width="30" height="30"/></a>'	;

}


}
echo'</div>';

echo' <div class="meniuc"> '.(empty($user['team']) ? "<a href='?id=prasytis&co=".$co."'>Siųsti prašymą ! komandą!</a>" : NULL).' </div>
	
	';
echo'<div class="up">Komandos Ištekliai:</div>';

if (apsas($info['pavadinimas']) == apsas($ka)){

echo' <div class="meniuc">  <a href="?id=pultiteam&co='.$co.'&ka='.$user['team'].'">Pulti komandą</a></div>';
}

echo'<div class="meniu">';



echo'


'.$ico.' Komandos ižde: <b>'.skaicius($in['pinigai']).'</b> <img src="img/bicons/pinigai.png"> , '.$in['eurai'].'</b> <img src="img/bicons/euro.png"><br>';
echo' '.$ico.' Alga už '.$user['iki_algos2'].' Kovų: <b>'.skaicius($in['uz_500_kovu']).' <img src="img/bicons/pinigai.png"></b>,<b> '.$in['uz_500_kovu2'].'</b> '.$eurui.'</br>';
echo"".$ico."Komanda laimėjus: <b>".$in['win']." kartų</b><br>";
echo"".$ico."Komanda pralaimėjus: <b>".$in['lose']." kartų</b><br>";









if(apsas($user['team']) == apsas($co) AND apsas($komanda['nick']) != apsas($nick)){
echo"".$ico."Iki algos liko: <b>".$user['iki_algos']." kovų</b><br>";}
echo'

'.$ico.' Vadas: <b>'.$in['vadas'].'</b><br>';

echo''.$ico.' Viso laimėjo kovų: <b>'.$in['viso_laimejo_kovu'].'</b>
</div>';
echo'';

echo'<div class="up">Nariai</div><div class="meniu">';
$kiekis= number_format($nt['win_in_team']);

	$viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM user WHERE team ='$co'"))[0];
    if($viso > 0){
        $rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
        $query = mysqli_query($conn,"SELECT * FROM user WHERE team='$co' ORDER BY win_in_team DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
        $puslapiu=ceil($viso/$rezultatu_rodymas);
$nst = mysqli_query($conn,"SELECT * FROM user WHERE team='$ka' ORDER BY win_in_team");
while($nt = mysqli_fetch_assoc($query)){

	$nr++;
	echo"<b>".$nr.".</b> <a href='pagrindinis.php?id=apie&ka=".$nt['nick']."'>".$nt['nick']." </a>-  Laimėjo kovų: <b>".number_format($nt['win_in_team'])."</b><br>";



}
echo'</div>';
  echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=info&co='.$co.'').'</div>';




}}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos"," $co komanda");
navigacija($g_n);
}
/// dienos medal info 1vt
if($id == 'medal'){
	$med_inf = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM teammedal WHERE id='$ID'"));
	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'")) == false){

		header("location:pagrindinis.php");
	}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM teammedal WHERE id='$ID'")) == false){
			header("location:pagrindinis.php");
	}
	else{
				top('Dienos komandos kovų prizas');
	online('žiūri komandos prizus');
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
while($row = mysqli_fetch_assoc($query)){
	echo'<div class="meniuc"><img src="img/teammedal/'.$med_inf['medalis'].'.png"></div>';
 if($row['dienosmedaltime']-time() < 0){echo'<div class="meniuc"><b><small><font color="red">Ši komanda šio prizo nebeturi!</small></font></b></div>';}
if($row['dienosmedaltime']-time() > 0){
  echo '<div class="meniuc"><b>Prizas dar galios</b>:'; if($row['dienosmedaltime']-time() > 0){echo'<b>'.laikas($row['dienosmedaltime']-time(), 1).'</b>';}

echo'</div>';
}
echo'<div class="up">Prizo Informacija</div>';
echo'	<div class="meniuc"><b><small>Prizas už</small></b>: <font color="red"><small> '.$med_inf['uz'].'</small></font><br/>

	
<b><small>Kada</small></b>: <small>'.laikas($med_inf['laikas']).'</small><br>
	<b><small>Laimėtas kartų</small></b>: <small><font color="red">'.$row['dienosmedal'].'</small></font>
	
	</div>';
		}
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pagrindinis.php?id=", "Apie $ka", "Prizai");
	navigacija($g_n);
}}
/// dienos medal info 2vt
if($id == 'medal2'){
	$med_inf = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM teammedal2 WHERE id='$ID'"));
	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'")) == false){

		header("location:pagrindinis.php");
	}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM teammedal2 WHERE id='$ID'")) == false){
			header("location:pagrindinis.php");
	}
	else{
				top('Dienos komandos kovų prizas');
	online('žiūri komandos prizus');
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
while($row = mysqli_fetch_assoc($query)){
	echo'<div class="meniuc"><img src="img/teammedal/'.$med_inf['medalis'].'.png"></div>';
  if($row['dienosmedaltime2']-time() < 0){echo'<div class="meniuc"><b><small><font color="red">Ši komanda šio prizo nebeturi!</small></font></b></div>';}
if($row['dienosmedaltime2']-time() > 0){
  echo '<div class="meniuc"><b>Prizas dar galios</b>:'; if($row['dienosmedaltime2']-time() > 0){echo'<b>'.laikas($row['dienosmedaltime2']-time(), 1).'</b>';}

echo'</div>';
}
echo'<div class="up">Prizo Informacija</div>';
echo'	<div class="meniuc"><b><small>Prizas už</small></b>: <font color="red"><small> '.$med_inf['uz'].'</small></font><br/>

	
<b><small>Kada</small></b>: <small>'.laikas($med_inf['laikas']).'</small><br>
	<b><small>Laimėtas kartų</small></b>: <small><font color="red">'.$row['dienosmedal'].'</small></font>
	
	</div>';
		}
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pagrindinis.php?id=", "Apie $ka", "Prizai");
	navigacija($g_n);
}}

/// dienos medal info 3vt
if($id == 'medal3'){
	$med_inf = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM teammedal3 WHERE id='$ID'"));
	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'")) == false){

		header("location:pagrindinis.php");
	}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM teammedal3 WHERE id='$ID'")) == false){
			header("location:pagrindinis.php");
	}
	else{
				top('Dienos komandos kovų prizas');
	online('žiūri komandos prizus');
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
while($row = mysqli_fetch_assoc($query)){
	echo'<div class="meniuc"><img src="img/teammedal/'.$med_inf['medalis'].'.png"></div>';
  if($row['dienosmedaltime3']-time() < 0){echo'<div class="meniuc"><b><small><font color="red">Ši komanda šio prizo nebeturi!</small></font></b></div>';}
if($row['dienosmedaltime3']-time() > 0){
  echo '<div class="meniuc"><b>Prizas dar galios</b>:'; if($row['dienosmedaltime3']-time() > 0){echo'<b>'.laikas($row['dienosmedaltime3']-time(), 1).'</b>';}

echo'</div>';
}
echo'<div class="up">Prizo Informacija</div>';
echo'	<div class="meniuc"><b><small>Prizas už</small></b>: <font color="red"><small> '.$med_inf['uz'].'</small></font><br/>

	
<b><small>Kada</small></b>: <small>'.laikas($med_inf['laikas']).'</small><br>
	<b><small>Laimėtas kartų</small></b>: <small><font color="red">'.$row['dienosmedal'].'</small></font>
	
	</div>';
		}
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pagrindinis.php?id=", "Apie $ka", "Prizai");
	navigacija($g_n);
}}
/// sav medal info
if($id == 'medals'){
	$med_inf = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM teammedals WHERE id='$ID'"));
	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'")) == false){

		header("location:pagrindinis.php");
	}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM teammedals WHERE id='$ID'")) == false){
			header("location:pagrindinis.php");
	}
	else{
				top('Savaitės komandos kovų taurė');
	online('Žiūri komandos taures');
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
while($row = mysqli_fetch_assoc($query)){
	echo'<div class="meniuc"><img src="img/teammedal/'.$med_inf['medalis'].'.png"></div>';
if($row['savmedaltime']-time() < 0){
  echo '<div class="meniuc"><b><font color="red"><small>Taurės nebeturi ši komanda</small></font>!</div>';
}
if($row['savmedaltime']-time() > 0){
  echo '<div class="meniuc"><b>Taurę dar turės</b>: <b>'.laikas($row['savmedaltime']-time(), 1).'</b></div>';
}
echo'<div class="up">Taurės Informacija</div>';
echo'	<div class="meniuc"><b><small>Taurė už</small></b>: <font color="red"><small> '.$med_inf['uz'].'</small></font><br/>

	<b><small>Bonusas</small></b>: <small><font color="red">'.$med_inf['bonusas'].'</small></font><br>
<b><small>Kada</small></b>: <small>'.laikas($med_inf['laikas']).'</small><br>
	<b><small>Laimėtas kartų</small></b>: <small><font color="red">'.$row['savmedal'].'</small></font>
	
	</div>';
		}
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pagrindinis.php?id=", "Apie $ka", "$ka medaliai");
	navigacija($g_n);
}}


/// komandos puolimas


	if($id == 'pultiteam'){
	top(' Puolimas prieš '.$co.' ');
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'Tokios komandos nėra</div>";}
else{
echo'<div class="meniuc">Užpuolę komandą, ir ją nugalėję, gausite <b>komandos taškų</b>!<br><small>Norint laimėti tavo komandos  '.$jegai.' turi būti didesnė nei kitos komandos '.$gynybai.'!</small><br><b>Pulti komandas galima kas 3 valandas!</div>';
echo'<div class="meniuc">';
echo'Ar tikrai norite pulti?<br>
<a href="?id=pultiteam2&co='.$co.'&ka='.$user['team'].'">Taip</a>|<a href="komanda.php?id=">Ne</a>'	;


echo'</div>';}
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php?id=info&ka='.$ka.'", "Apie $ka", "Komandos užpuolimas");
	navigacija($g_n);
}

if($id == 'pultiteam2'){
	top(' Užpuolei komandą  '.$co.' ');


$in = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$co'"));
if($info['viso_laimejo_kovu'] <4999){
echo'<div class="meniuc">Pulti galima tik laimėjus 5000<b> kovų</b>!</div>';}
elseif($in['viso_laimejo_kovu'] <4999){
echo'<div class="meniuc">Ši komanda dar nėra padarius<b> 5000</b> kovų!</div>';}
   elseif($info['pllaikas']-time() > 0){
                echo '<div class="meniuc">Komanda galima pulti už <font color="red"><b>'.laikas($info['pllaikas']-time(), 1).'</b></font></div>';
            }
elseif(apsas($co) == apsas($ka)){
	echo'<div class="meniuc"><b>Savo komandos pulti negalima</b>!</div>';}
else{




    $query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){

	if($row['ataka']>$in['gynyba']){


 echo '<div class="meniuc"><img src="img/imgg/komandos.png" alt="*"></div>';
echo'<div class="meniuc">Tavo komanda užpuolė <b> '.$co.'</b> komandą! <br>
Tavo komanda <b>laimėjo šią kovą</b>!</div>';

echo'<div class="meniuc">';
echo'Tavo komanda į komandos iždą gavo <b>500 komandos taškų</b>!<br>';
echo'Pulti kita komanda galėsi už <b>3</b> valandų!</div>'	;
$timxx = time()+3600*3;


mysqli_query($conn,"UPDATE team SET teamp=teamp+'500', win=win+'1', pllaikas='$timxx' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET lose=lose+'1' WHERE pavadinimas='$co' ");
$txt = "Tavo komanda užpuolė <b>".$ka."</b>, ir tavo komanda <b>pralaimėjo</b>! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$in[vadas]' ");

echo'</div>';}


if($row['ataka']<$in['gynyba']){
echo '<div class="meniuc"><img src="img/imgg/komandos.png" alt="*"></div>';
echo'<div class="meniuc"><b>Tavo komanda Pralaimejo!</b>!</div>
<div class="meniuc">
<b>'.$co.'</b> už laimėjimą gavo <b>250 komandos taškų</b>!<br>
Pulti kita komanda galėsi už <b>3</b> valandų!<br>
</div>';


$timxx = time()+3600*3;
	mysqli_query($conn,"UPDATE team SET  pllaikas='$timxx' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET lose=lose+'1' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET teamp=teamp+'250', win=win+'1' WHERE pavadinimas='$co' ");
$txt = "Tavo komanda užpuolė <b> ".$ka."</b>, bet tavo komanda <b>Laimėjo</b> , ir gavo<b> 250</b><small> komandos taškų</small> ! ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$in[vadas]' ");
}
}
}
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php?id=info&ka='.$ka.'", "Apie $ka", "Komandos užpuolimas");
	navigacija($g_n);
}




/////// team bosai
if($id == "team_boss"){
    online('Komandos Bosai');
	top('Komandos Bosai');
$team_boss= mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'"));
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
echo' <div class="meniuc"><img src=img/imgg/bosai.png border="1" width="180" height="90"><alt="**"></div>';
    echo '<div class="meniuc"><b>Komandos Bosai</b> - tai stipriausiai priešai.<br>Norint kirsti daugiau <b>Komandos Bosui</b> turite kelti '.$kgi.', arba turėti gerą <b>Sword</b><br>Norint, kad jums <b>Komandos Bosas</b> kirstų mažiau turite turėti <b>Armor</b>.<br><b>Kritinis lygis</b> - kiek turėsite <b>kritinio lygio</b> tiek daugiau kirsite <b> komandos bosams</b>!<br><font color="red"><b>1 </b> </font>Kritinio lygio '.$lygu.' <b><font color="red">5</font></b> daromos <b>komandos bosui</b> žalos!<br><font color="red"><b>1 </b> </font>Komandos Kritinio lygio '.$lygu.' <b><font color="red">1</font></b> daromos <b>komandos bosui</b> žalos!<br><b>Šiuos komandos bosus gali daužyti tik šios komandos nariai!</b></div>';

    $query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
    if($row['kovm1']-time() < 0){echo'<div class="meniuc"><b><font color="red">Norint kirsti komandų bosus, pirma turi jūsų komanda atsirakinti</b></font>!</div>';}}
echo'<div class="meniu">';
    $query = mysqli_query($conn,"SELECT * FROM team_boss WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){

         if($row['prisikels']-time() > 0){
         echo ' <img src="img/veikejaic/'.$row['img'].'.png" alt="IMG" height="42" width="42"><b> '.$row['name'].' </b>užmuštas, galėsite mušti už <b>'.laikas($row['prisikels']-time(), 1).'</b><br/>';
         } else {
         if(apsas($user['team']) == apsas($ka)){    echo '   <img src="img/veikejaic/'.$row['img'].'.png" alt="IMG" height="42" width="42"> <b>'.$row['name'].' </b> [<a href="?id=inf&go='.$row['id'].'&ka='.$ka.'">Detaliau</a>]   <br/>';}
         }
         unset($row);
    }

    echo '</div>';
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","Bosai");
	navigacija($g_n);
}
elseif($id == "inf"){
    online('Boss Village');
    $boss = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM team_boss WHERE id='$go'"));
	top(''.$boss['name'].'');
   	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}

 $tims = $boss['laikas'];
    if($boss['prisikels']-time() > 0){

        echo '<div class="meniuc"> <img src="img/veikejaic/'.$boss['img'].'.png" /></div>';
        echo '<div class="meniuc"><b>'.$boss['name'].'</b>  užmuštas, galėsite mušti už <b>'.laikas($boss['prisikels']-time(), 1).'</b></div>';
    }
    elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team_boss WHERE id='$go' ")) == 0){

        echo '<div class="meniuc">Toks bosas neegzistuoja!</div>';
    }
    else {
        $KD = rand(9999,99999);
        $_SESSION['refresh'] = $KD;

        echo '<div class="meniuc"> <img src="img/veikejaic/'.$boss['img'].'.png" /></div>
      
        <div class="meniuc">
       <b> '.$boss['name'].' </b> būsena - <b> '.sk($boss['hp']).''.$hp.'</b><br/>

       <b>Atlygis</b> -  <b>'.skaicius($boss['zen']).'</b><b> '.$pinigaii.'</b>, <b>'.sk($boss['eur']).' '.$eurui.' </b>

</div>
       
            
         <div class="meniuc">
     
       Galima mušti kas - <b> '.laikas($tims, 1).'</b><br/>
       Paskutinis užmušė: <b>'.statusas($boss['nukirto']).'</b><br/>
 <b>'.$boss['name'].'</b> smūgis: Nuo<b> '.$boss['min_hit'].' '.$att1.'</b> iki <b>'.$boss['max_hit'].' '.$att1.'</b><br/>
        </div>
        <div class="meniuc">';
    if(apsas($user['team']) == apsas($ka)){echo'   '.$ico.'  <a href="?id=attack&KD='.$KD.'&go='.$go.'&ka='.$ka.'">Trenkti <b>'.$boss['name'].'</b></a></div>';}



    }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","Boso daužymas");
	navigacija($g_n);
}
elseif($id == "attack"){
    online('Boss Village');
    $KD = $_GET['KD'];
    $boss = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM team_boss WHERE id='$go'"));
top(''.$boss['name'].'');
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
    $tims = $boss['laikas'];
    if($boss['prisikels']-time() > 0){

        echo '<div class="meniuc"><img src="img/veikejaic/'.$boss['img'].'.png" /></div>';
        echo '<div class="meniuc"><b>'.$boss['name'].'</b> užmuštas, galėsite mušti už <b>'.laikas($boss['prisikels']-time(), 1).'</b></div>';
    }
    elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team_boss WHERE id='$go' ")) == 0){

        echo '<div class="meniuc">Toks bosas neegzistuoja!</div>';
    }

    elseif($KD != $_SESSION['refresh']){

        echo '<div class="meniuc"><img src="img/veikejaic/'.$boss['img'].'.png" /></div>';
        echo '<div class="meniuc">Atnaujinti puslapio negalimą! Eikite atgal ir vėl trenkite.</div>';
    }
    elseif($_SESSION['pad']-time() > 0){

        echo '<div class="meniuc"><img src="img/veikejaic/'.$boss['img'].'.png" /></div>';
        echo '<div class="meniuc">Padusai! Trenkti galėsi už <b>'.laikas($_SESSION['pad']-time(), 1).'</b></div>';
    }
    elseif($gyvybes < 1){

        echo '<div class="meniuc"><img src="img/veikejaic/'.$boss['img'].'.png" /></div>';
        echo '<div class="meniuc">Nebeturi '.$hp.'</div>';
 mysqli_query($conn,"UPDATE zaidejai SET gyvybes='0' WHERE nick='$nick' ");
   }
    else {

        echo '<div class="meniuc"><img src="img/veikejaic/'.$boss['img'].'.png" /></div>';
  if($apie['amuletas'] == 'Super amulet'){

         	$smugis3 = 3000;
         }
if($apie['armor'] == 'Vedzito sarvai'){

         	$mazina = 50;
         }
if($apie['armor'] == 'Gold armor'){

         	$mazina = 100;
         }
if($apie['armor'] == 'Time armor'){

         	$mazina = 200;
         }
if($apie['armor'] == 'Money armor'){

         	$mazina = 300;
         }

if($apie['armor'] == 'Super money armor'){

         	$mazina = 500;
         }
if($apie['armor'] == 'Vieno kircio armor'){

         	$mazina = 700;
         }
if($apie['armor'] == 'Galios armor'){

         	$mazina = 1000;
         }
if($apie['armor'] == 'Infinity armor'){

         	$mazina = 1500;
         }
if($apie['armor'] == 'Mirties armor'){

         	$mazina = 150000;
         }
if($apie['armor'] == 'Atgimimo armor'){

         	$mazina = 500000;
         }
if($apie['sword'] == 'Trankso kardas'){

         	$smugis2 = 500;
         }
if($apie['sword'] == 'Gold sword'){

         	$smugis2 = 1000;
         }
if($apie['sword'] == 'Time sword'){

         	$smugis2 = 1500;
         }
if($apie['sword'] == 'Money sword'){

         	$smugis2 = 2000;
         }
if($apie['sword'] == 'Super money sword'){

         	$smugis2 = 4000;
         }
if($apie['sword'] == 'Vieno kircio sword'){

         	$smugis2 = 6000;
         }
if($apie['sword'] == 'Infinity sword'){

         	$smugis2 = 10000;
         }
if($apie['sword'] == 'Mirties sword'){

         	$smugis2 = 1000000;
         }
if($apie['sword'] == 'Atgimimo sword'){

         	$smugis2 = 2000000;
         }
/// AD16 SETAS
if($apie['sword'] == 'AD16 Kardas'){

         	$smugis2 =15000;
         }
if($apie['armor'] == 'AD16 Sarvai'){

         	$mazina =3000;
         }
if($apie['amuletas'] == 'AD16 Amulet'){

         	$smugis3 =30000;
         }
if($apie['sword'] == 'AD16 Kardas'  and $apie['armor'] == 'AD16 Sarvai' and $apie['amuletas'] ==  'AD16 Amulet'){

         	$set1=50000;
         }
/// AD17 SETAS
if($apie['sword'] == 'AD17 Kardas'){

         	$smugis2 =40000;
         }
if($apie['armor'] == 'AD17 Sarvai'){

         	$mazina =6000;
         }
if($apie['amuletas'] == 'AD17 Amulet'){

         	$smugis3 =90000;
         }
if($apie['sword'] == 'AD17 Kardas'  and $apie['armor'] == 'AD17 Sarvai' and $apie['amuletas'] ==  'AD17 Amulet'){

         	$set2=15000;
         }
/// AD18 SETAS
if($apie['sword'] == 'AD18 Kardas'){

         	$smugis2 =80000;
         }
if($apie['armor'] == 'AD18 Sarvai'){

         	$mazina =12000;
         }
if($apie['amuletas'] == 'AD18 Amulet'){

         	$smugis3 =150000;
         }
if($apie['sword'] == 'AD18 Kardas'  and $apie['armor'] == 'AD18 Sarvai' and $apie['amuletas'] ==  'AD18 Amulet'){

         	$set1=200000;
         }
/// AD19 SETAS
if($apie['sword'] == 'AD19 Kardas'){

         	$smugis2 =150000;
         }
if($apie['armor'] == 'AD19 Sarvai'){

         	$mazina =25000;
         }
if($apie['amuletas'] == 'AD19 Amulet'){

         	$smugis3 =300000;
         }
if($apie['sword'] == 'AD19 Kardas'  and $apie['armor'] == 'AD19 Sarvai' and $apie['amuletas'] ==  'AD19 Amulet'){

         	$set2=50000;
         }
/// AD20 SETAS
if($apie['sword'] == 'AD20 Kardas'){

         	$smugis2 =500000;
         }
if($apie['armor'] == 'AD20 Sarvai'){

         	$mazina =50000;
         }
if($apie['amuletas'] == 'AD20 Amulet'){

         	$smugis3 =800000;
         }
if($apie['sword'] == 'AD20 Kardas'  and $apie['armor'] == 'AD20 Sarvai' and $apie['amuletas'] ==  'AD20 Amulet'){

         	$set1=500000;
         }
else{$tech=1;}
// Buu tech
    if($apie['kenergija6'] > 49999){
     $tech=2;

    }

// Selas tech
    if($apie['Sayanpower'] ==  '+'){
     $tech=3.5;

    }

// Pikolas tech
    if($apie['Makosen'] ==  '+'){
     $tech=4;

    }

// Krilinas tech
    if($apie['Kamehameha2'] ==  '+'){
     $tech=3;

    }

// Raditas tech
    if($apie['Begone'] ==  '+'){
     $tech=3;

    }

// Neilas tech
    if($apie['Regeneration'] ==  '+'){
     $tech=2;

    }

// Nappas tech
    if($apie['ArmBreak'] ==  '+'){
     $tech=3;

    }

// Dendis tech
    if($apie['Healing'] ==  '+'){
     $tech=5;



}
// Bulma tech
    if($apie['AngryBulma'] ==  '+'){
     $tech=4;

    }

///kyborgai
if($apie['kyborgas'] == ''){

         	$kyborg = 1;
         }
if($apie['kyborgas'] == 'Android 16'){

         	$kyborg = 2;
         }
if($apie['kyborgas'] == 'Android 17'){

         	$kyborg = 3;
         }
if($apie['kyborgas'] == 'Android 18'){

         	$kyborg = 4;
         }
if($apie['kyborgas'] == 'Android 19'){

         	$kyborg = 6;
         }
if($apie['kyborgas'] == 'Android 20'){

         	$kyborg = 8;
         }
   //// smugis
if($apie['sword'] == 'Galios sword'){

         	$smugis2 = 8000;
         }
if($apie['sword'] == 'Infinity sword'){

         	$smugis2 = 10000;
         }
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
$teamcrit=rand(0,$row['kritinislvl']*1);
}
         if($kg > '58'){
         			$crit =rand(0,$apie['critical']*5);
         	$smugis = rand(100,200)+$smugis2*$kyborg*$tech+$smugis3*$kyborg*$tech+$set1*$kyborg*$tech+$crit+$teamcrit*$kyborg*$tech;
         }





if($kg > '59'){



         	$smugiss = rand(100,200)+$smugis2*$kyborg*$tech+$smugis3*$kyborg*$tech+$set1*$kyborg*$tech+$teamcrit;
         }

        if($kg< '50'){

			$k_smugis = rand(100,300);
        }
        $hit = rand($boss['min_hit'],$boss['max_hit']-$mazina-$set2);
		$dmg =$smugis+$k_smugis;
        $bosui_liko = $boss['hp'] - $dmg;

        if($bosui_liko > 0){
$critk= rand(0,$crit);
            $KD = rand(9999,99999);
            $_SESSION['refresh'] = $KD;
            $_SESSION['pad'] = time()+1;
            mysqli_query($conn,"UPDATE zaidejai SET vveiksmai=vveiksmai+'1', gyvybes=gyvybes-'$hit' WHERE nick='$nick' ");
mysqli_query($conn,"UPDATE team_boss SET  kiekzalos=kiekzalos+'$smugis' WHERE id='$go' ");

            mysqli_query($conn,"UPDATE team_boss SET hp='$bosui_liko' WHERE id='$go' ");


			if($apie['kyborgas'] !=''){
echo '<div class="meniuc">';
			echo' <b> '.$apie['kyborgas'].' </b> padidina jūsų kirtį  <b>'.$kyborg.'</b>  kartus! </div>  ';	}
			if($apie['kenergija6'] > 49999){

echo'<div class="meniuc"><b>Gack technika</b> Padidina jūsų kirt! <b>2x</b> !</div>';}
			if($apie['kenergija7'] > 49999){

echo'<div class="meniuc"><b>Sayan Power technika</b> Padidina jūsų kirtį <b>3.5x</b> !</div>';}
if($apie['kenergija8'] > 49999){

echo'<div class="meniuc"><b>Makosen technika</b> Padidina jūsų kirtį <b>4x</b> !</div>';}
if($apie['kenergija9'] > 49999){

echo'<div class="meniuc"><b>Kamehameha technika</b> Padidina jūsų kirtį <b>3x</b> !</div>';}
if($apie['kenergija11'] > 49999){

echo'<div class="meniuc"><b>Begone technika</b> Padidina jūsų kirtį <b>3x</b> !</div>';}
if($apie['kenergija12'] > 49999){

echo'<div class="meniuc"><b>Regeneration technika</b> Padidina jūsų kirtį <b>2x</b> !</div>';}
if($apie['kenergija13'] > 49999){

echo'<div class="meniuc"><b>Regeneration technika</b> Padidina jūsų kirtį <b>3x</b> !</div>';}
if($apie['kenergija14'] > 49999){

echo'<div class="meniuc"><b>Healing technika</b> Padidina jūsų kirtį <b>5x</b> !</div>';}
if($apie['kenergija15'] > 49999){

echo'<div class="meniuc"><b>AngryBulma technika</b> Padidina jūsų kirtį <b>4x</b> !</div>';}
echo '<div class="meniuc">';
        echo' <img src="img/veikejai/'.$apie['veikejas'].'-'.$apie['trans'].'.png" alt="IMG" height="16" width="16"> <b> '.$nick.'  </b> nuėmei 
<font color="green"><b>'.skaicius($smugiss).'</b>';
	if($apie['critical'] !='0'){
		$bosui_liko = $boss['hp'] - $smugis;
		echo'
</font>'.$att1.' + <font color="red"><b>'.skaicius($crit).'</b></font> '.$att2.'';}   if($apie['kyborgas'] !=''){echo' <font color="green">*'.$kyborg.'</font> ';  echo''.$lygu.' <font color="blue">  <b>'.skaicius($smugis).'</font> '.$att1.'</b>';}echo'  <br/>
     <img src="img/veikejaic/'.$boss['img'].'.png" alt="IMG" height="16" width="16"> <b>'.$boss['name'].'</b>  nuėmė     <b> '.$apie['nick'].'</b> - '.sk($hit).' '.$att1.'</b> <br></div>

 ';



echo'<div class="meniuc">
 <img src="img/veikejai/'.$apie['veikejas'].'-'.$apie['trans'].'.png" alt="IMG" height="16" width="16"><b>'.$nick.'</b> liko '.$lygu.'<font color="green"><b>'.sk($gyvybes).'</b></font>'.$hp.'<br/>
<img src="img/veikejaic/'.$boss['img'].'.png" alt="IMG" height="16" width="16">  <b>'.$boss['name'].'</b> liko '.$lygu.'<font color="green"> <b>'.sk($bosui_liko).'</b></font>'.$hp.'<br>

             
        
            </div><div class="meniuc">';
       if(apsas($user['team']) == apsas($ka)){echo'     '.$ico.' <a href="?id=attack&KD='.$KD.'&go='.$go.'&ka='.$ka.'">Trenkti <b>'.$boss['name'].'</b></a></div>';}
        }
	elseif($bosui_liko < 1){
if(apsas($user['team']) == apsas($ka)){
        	 $bosui_liko = $boss['hp'] - $smugis;
            $eurxx = $boss['eur'];
            $zenxx = $boss['zen'];





            $time = time()+$boss['laikas'];
            mysqli_query($conn,"UPDATE team_boss SET hp='$boss[max_hp]',  nukirtobosu=nukirtobosu+'1', prisikels='$time', nukirto='$nick' WHERE id='$go'");
mysqli_query($conn,"UPDATE team SET pinigai=pinigai+'$zenxx', eurai=eurai+'$eurxx', nukirtobosu=nukirtobosu+'1' WHERE pavadinimas='$ka' ");

            echo '<div class="meniuc"><b>Įtrenkei paskutinį smūgį! </b><br>Tavo komanda gavo <b>'.sk($eurxx).'</b> '.$eurui.' , <b>'.sk($zenxx).'</b>'.$pinigaii.'  !</div>';
        }
    }
}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","Boso daužymas");
	navigacija($g_n);
}

///// komandos gynybos kelimas
elseif($id == "keltigynyba"){
    online('Leidžia komandos eurus');
	top('Komandos gynybos pirkimas');
	if($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'Tokios komandos nėra</div>";}
	else{
echo'<div class="meniuc">
	<img src="img/imgg/komandos.png"></div><div class="up">Komandos gynybos kėlimas</div> ';
			echo'<div class="meniuc">1 <img src="img/bicons/euro.png" />   - 1000  <img src="img/bicons/shield.png" />  </div>';
        echo '<div class="meniuc">
        <form action="?id=keltigynyba2&ka='.$ka.'" method="post"/>
        Kiek  <img src="img/bicons/euro.png" /> išleisite:<br /><input type="number" name="gynyba"><br />
        <input type="submit" name="submit" value="Pirkti"/></form>
        </div>';
  }
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos", "Gynybos pirkimas");
	navigacija($g_n);

}
if($id =='keltigynyba2'){

 top('Komandos gynybos pirkimas');

   $query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){

        if(isset($_POST['submit'])){
            $gynyba= isset($_POST['gynyba']) ? preg_replace("/[^0-9]/","",$_POST['gynyba']) : null;
            $kainn = $gynyba;
			$kiekis = $gynyba * 1000;

            if(empty($gynyba)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }


	          elseif($kainn > $row['eurai']){
	              echo '<div class="meniuc">Komanda neturi pakankamai  <img src="img/bicons/euro.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nupirkai komandai <b>'.sk($kiekis).' </b> <img src="img/bicons/shield.png" /> !</div>';

	            mysqli_query($conn,"UPDATE team SET gynyba=gynyba +'$kiekis', eurai=eurai-'$kainn' WHERE pavadinimas='$ka' ");
			  }

}
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos", "Gynyba pirkimas");
	navigacija($g_n);}
		}


///// komandos atakos kelimas
elseif($id == "keltiataka"){
    online('Leidžia komandos eurus');
	top('Komandos atakos pirkimas');
	if($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'Tokios komandos nėra</div>";}
	else{
echo'<div class="meniuc">
	<img src="img/imgg/komandos.png"></div><div class="up">Komandos atakos kėlimas</div> ';
			echo'<div class="meniuc">1 <img src="img/bicons/euro.png" />   - 500  <img src="img/bicons/attack.png" />  </div>';
        echo '<div class="meniuc">
        <form action="?id=keltiataka2&ka='.$ka.'" method="post"/>
        Kiek  <img src="img/bicons/euro.png" /> išleisite:<br /><input type="number" name="ataka"><br />
        <input type="submit" name="submit" value="Pirkti"/></form>
        </div>';
  }
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos", "Atakos pirkimas");
	navigacija($g_n);

}
if($id =='keltiataka2'){

 top('Komandos atakos pirkimas');

   $query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){

        if(isset($_POST['submit'])){
            $ataka= isset($_POST['ataka']) ? preg_replace("/[^0-9]/","",$_POST['ataka']) : null;
            $kainn = $ataka;
			$kiekis = $ataka * 500;

            if(empty($ataka)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }


	          elseif($kainn > $row['eurai']){
	              echo '<div class="meniuc">Komanda neturi pakankamai  <img src="img/bicons/euro.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nupirkai komandai <b>'.sk($kiekis).' </b> <img src="img/bicons/attack.png" /> !</div>';

	            mysqli_query($conn,"UPDATE team SET ataka=ataka +'$kiekis', eurai=eurai-'$kainn' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE user SET ataka=ataka +'$kiekis' WHERE team='$ka' ");
			  }

}
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos", "Ataka pirkimas");
	navigacija($g_n);}
		}

//// parduotves shop
elseif($id == "shopeuru"){
    online('Leidžia komandos taškus');
	top('Komandos eurų pirkimas');
	if($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'Tokios komandos nėra</div>";}
	else{
echo'<div class="meniuc">
	<img src="img/imgg/komandos.png"><br>Komandos Eurų Pirkimas</div> ';
			echo'<div class="meniuc">20 <img src="img/bicons/teamp.png" />   - 1  <img src="img/bicons/euro.png" />  </div>';
        echo '<div class="meniuc">
        <form action="?id=shopeuru2&ka='.$ka.'" method="post"/>
        Kiek  <img src="img/bicons/teamp.png" /> išleisite:<br /><input type="number" name="euru"><br />
        <input type="submit" name="submit" value="Pirkti"/></form>
        </div>';
  }
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos", "Eurų pirkimas");
	navigacija($g_n);

}
if($id =='shopeuru2'){

 top('Komandos eurų pirkimas');

   $query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){

        if(isset($_POST['submit'])){
            $euru= isset($_POST['euru']) ? preg_replace("/[^0-9]/","",$_POST['euru']) : null;
            $kainn = $euru;
			$kiekis = $euru * 20;

            if(empty($euru)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }


	          elseif($kiekis > $row['teamp']){
	              echo '<div class="meniuc">Komanda neturi pakankamai  <img src="img/bicons/teamp.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nupirkai komandai <b>'.sk($kainn).' </b> <img src="img/bicons/euro.png" /> !</div>';

	            mysqli_query($conn,"UPDATE team SET eurai=eurai +'$kainn', teamp=teamp-'$kiekis' WHERE pavadinimas='$ka' ");
			  }

}
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos", "Eurų pirkimas");
	navigacija($g_n);}
		}








if($id == 'shopbosstoppo'){
	top('Boso Pirkimas');

	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'Tokios komandos nėra</div>";}

    $query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['Toppo']-time() < 0){
	       $timxx = time()+60*60*24*1000;
			if($row['teamp'] < 49999){
			echo'<div class="meniuc"><img src="img/veikejaic/Toppo.png"></div>';
	echo'<div class="meniuc">
 <b> Komanda neturi tiek <img src="img/bicons/teamp.png"></b>!</div>';}
else{

	echo'<div class="meniuc"><img src="img/veikejaic/Toppo.png"></div>
<div class="meniuc">	Jūsų komanda sėkmingai nusipirko <b>Toppo</b> bosą</div> ';


	mysqli_query($conn,"INSERT INTO team_boss SET name='Toppo', img='Toppo', zen='150000000000',   hp='120000000000', max_hp='120000000000', laikas='72000', max_hit='20000', min_hit='15000', eur='1000', pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET Toppo='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['Toppo']-time() > 0){
echo'<div class="meniuc"><img src="img/veikejaic/Toppo.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau nusipirkus šį <b>bosą</b>!</div>';

}
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Boso Pirkime");
navigacija($g_n);

}



if($id == 'shopbossdyspo'){
	top('Boso Pirkimas');

		if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'Tokios komandos nėra</div>";}

    $query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['Dyspo']-time() < 0){
	       $timxx = time()+60*60*24*1000;
			if($row['teamp'] < 19999){
			echo'<div class="meniuc"><img src="img/veikejaic/Dyspo.png"></div>';
	echo'<div class="meniuc">
 <b> Komanda neturi tiek <img src="img/bicons/teamp.png"></b>!</div>';}
else{

	echo'<div class="meniuc"><img src="img/veikejaic/Dyspo.png"></div>
<div class="meniuc">	Jūsų komanda sėkmingai nusipirko <b>Dyspo</b> bosą</div> ';


	mysqli_query($conn,"INSERT INTO team_boss SET name='Dyspo', img='Dyspo', zen='100000000000',   hp='80000000000', max_hp='80000000000', laikas='36000', max_hit='16000', min_hit='10000', eur='800', pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET Dyspo='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['Dyspo']-time() > 0){
echo'<div class="meniuc"><img src="img/veikejaic/Dyspo.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau nusipirkus šį <b>bosą</b>!</div>';
            }

}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Boso Pirkime");
navigacija($g_n);

}




if($id == 'shopboss'){
	top('Komandos Bosų Parduotuvė');

if($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'Tokios komandos nėra</div>";}
	else{

echo'<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
echo' <div class="meniuc"><b>Komandos Bosų Parduotuvė</b> - čia  galite nusipirkti savo komandai naujų bosų  už <b>komandos taškus!</b></div>';
		echo'<div class="up">Dyspo</div>';
		echo'<div class="meniuc"><img src="img/veikejaic/Dyspo.png"></div>
<div class="meniuc">Kaina: <b>20,000</b><img src="img/bicons/teamp.png"></div>';
echo"		<div class='meniuc'> <a href='komanda.php?id=shopbossdyspo&ka=$ka'><input type='submit' Value='Pirkti'/></a></div>";
echo'<div class="up">Toppo</div>';
		echo'<div class="meniuc"><img src="img/veikejaic/Toppo.png"></div>
<div class="meniuc">Kaina: <b>50,000</b><img src="img/bicons/teamp.png"></div>';
echo"		<div class='meniuc'> <a href='komanda.php?id=shopbosstoppo&ka=$ka'><input type='submit' Value='Pirkti'/></a></div>";

	}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Bosų Parduotuvė");
navigacija($g_n);
}


if($id == 'shop'){
	top('Komandos Parduotuvė');

	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	else{

echo'<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
echo' <div class="meniuc"><b>Komandos Parduotuvė</b> - tai kur galite nusipirkti savo komandai įvairias prekias už <b>komandos taškus!</b></div>';
		echo"<div class='meniu'>";

echo"		".$ico." <a href='komanda.php?id=shopboss&ka=$ka'>Unikalių bosų atrakinimas</a><br>";
		echo"		".$ico." <a href='komanda.php?id=shopeuru&ka=$ka'>Eurų Pirkimas</a><br>";
echo"		</div>";
	}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Parduotuvė");
navigacija($g_n);
}



	if($id=='visiems')
{
	top('Žinutės siuntimas komandos nariams');
	if($info['vadas'] != $nick && $info['pavadotuojas'] != $nick){echo"<div class='meniuc'>Tu nesi šios komandos vadas</div>";}
		if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'")) == false)
	{echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	else{
echo"
<div class='meniu'>
<form action='?id=visiems2&ka=$ka' method=\"post\">
<B>Žinutė visiems nariams</B>:<Br/>
<input type=\"text\" name=\"pm\"><br>
<input type=\"submit\" value=\"Siųsti\"><br/></div>

";


   }
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Žinutės siuntimas komandos nariams");
navigacija($g_n);
}

if( $id =='visiems2')
{
	$pm = post($_POST['pm']);
	top('Žinutės siuntimas komandos nariams');
if($info['vadas'] != $nick && $info['pavadotuojas'] != $nick){echo"<div class='meniuc'>Tu nesi šios komandos vadas</div>";}
elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'")) == false){
	echo"<div class='meniuc'>Tokios komandos nėra</div>";}
elseif(empty($pm)){
	echo"<div class='meniuc'>Žinutė tuščia</div>";
}
else{



$on=mysqli_query($conn,"SELECT * FROM user WHERE team='$ka' ORDER BY id");
while ($onn = mysqli_fetch_row($on))
{
mysqli_query($conn,"INSERT INTO pms SET what='$nick', txt='$pm', gavejas='$onn[1]', time='".time()."', nauj='NEW' ") or die(mysqli_error());


}
echo "<div class='meniuc'>Atlikta, pm išsiųstos.<br></div>";

}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Žinutės siuntimas komandos nariams");
navigacija($g_n);
}


if($id == "isimtift")
{
    top('Foto išėmimas');
if($info['vadas'] != $nick && $info['pavadotuojas'] != $nick)echo"<div class='meniuc>Tu nesi šios komandos vadas</div>";
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
mysqli_query($conn,"UPDATE user SET foto='' WHERE team= $ka");
echo "<div class='meniuc'>Ištrinta </div>";
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Foto trinimas");
navigacija($g_n);

}
if($id == "ft")
{
top('Foto idėjimas');


	if($info['vadas'] != $nick && $info['pavadotuojas'] != $nick)echo"<div class='meniuc>Tu nesi šios komandos vadas</div>";
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	else{  echo '<div class="meniuc">
   <form action="?id=foto2&ka='.$ka.'" method="post"/>
   Nuotraukos adresas:<br /><input type="text" name="foto"/><br />
 
   <input type="submit" name="submit" value="Nustatyti"/>
   </div>';}
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Foto ikėlimas");
navigacija($g_n);

}

if($id == "foto2")
{
	top('Foto idėjimas');
	$foto = post($_POST['foto']);
   $info = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'"));
	
	if($info['vadas'] != $nick && $info['pavadotuojas'] != $nick)echo"<div class='meniuc'>Tu nesi šios komandos vadas</div>";
	
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
echo'<div class="meniuc">Nuotrauka pakeista</div>';
	mysqli_query($conn,"UPDATE team SET foto='$foto' WHERE pavadinimas ='$ka'")or die(mysqli_error());
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Foto ikėlimas");
navigacija($g_n);
	
}
///kritinio lygio misijos
if($id == 'misijoskrit10'){
	top('Kritinio Lygio Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['kritm10']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['kritinislvl'] < 2999999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek <font color="red">Kritinio lygio</font> !</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą gavote <b>15,000</b> <font color="red"><b><img src="img/bicons/teamp.png">Komandos taškų</b></font> ! </div> ';		


	mysqli_query($conn,"UPDATE team SET teamp=teamp+'15000' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET kritm10='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['kritm10']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}


///kritinio lygio misijos
if($id == 'misijoskrit9'){
	top('Kritinio Lygio Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['kritm9']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['kritinislvl'] < 1999999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek <font color="red">Kritinio lygio</font> !</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą gavote <b>12,000</b> <font color="red"><b><img src="img/bicons/teamp.png">Komandos taškų</b></font> ! </div> ';		


	mysqli_query($conn,"UPDATE team SET teamp=teamp+'12000' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET kritm9='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['kritm9']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}

///kritinio lygio misijos
if($id == 'misijoskrit8'){
	top('Kritinio Lygio Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['kritm8']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['kritinislvl'] < 1599999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek <font color="red">Kritinio lygio</font> !</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą gavote <b>10,000</b> <font color="red"><b><img src="img/bicons/teamp.png">Komandos taškų</b></font> ! </div> ';		


	mysqli_query($conn,"UPDATE team SET teamp=teamp+'10000' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET kritm8='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['kritm8']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}


///kritinio lygio misijos
if($id == 'misijoskrit7'){
	top('Kritinio Lygio Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['kritm7']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['kritinislvl'] < 1199999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek <font color="red">Kritinio lygio</font> !</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą gavote <b>8,000</b> <font color="red"><b><img src="img/bicons/teamp.png">Komandos taškų</b></font> ! </div> ';		


	mysqli_query($conn,"UPDATE team SET teamp=teamp+'8000' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET kritm7='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['kritm7']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}


///kritinio lygio misijos
if($id == 'misijoskrit6'){
	top('Kritinio Lygio Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['kritm6']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['kritinislvl'] < 799999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek <font color="red">Kritinio lygio</font> !</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą gavote <b>6,000</b> <font color="red"><b><img src="img/bicons/teamp.png">Komandos taškų</b></font> ! </div> ';		


	mysqli_query($conn,"UPDATE team SET teamp=teamp+'6000' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET kritm6='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['kritm6']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}


///kritinio lygio misijos
if($id == 'misijoskrit5'){
	top('Kritinio Lygio Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['kritm5']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['kritinislvl'] < 399999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek <font color="red">Kritinio lygio</font> !</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą gavote <b>4,000</b> <font color="red"><b><img src="img/bicons/teamp.png">Komandos taškų</b></font> ! </div> ';		


	mysqli_query($conn,"UPDATE team SET teamp=teamp+'4000' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET kritm5='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['kritm5']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}

///kritinio lygio misijos
if($id == 'misijoskrit4'){
	top('Kritinio Lygio Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['kritm4']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['kritinislvl'] < 199999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek <font color="red">Kritinio lygio</font> !</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą gavote <b>2,000</b> <font color="red"><b><img src="img/bicons/teamp.png">Komandos taškų</b></font> ! </div> ';		


	mysqli_query($conn,"UPDATE team SET teamp=teamp+'2000' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET kritm4='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['kritm4']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}
///kritinio lygio misijos
if($id == 'misijoskrit3'){
	top('Kritinio Lygio Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['kritm3']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['kritinislvl'] < 99999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek <font color="red">Kritinio lygio</font> !</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą gavote <b>1,000</b> <font color="red"><b><img src="img/bicons/teamp.png">Komandos taškų</b></font> ! </div> ';		


	mysqli_query($conn,"UPDATE team SET teamp=teamp+'1000' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET kritm3='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['kritm3']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}
///kritinio lygio misijos
if($id == 'misijoskrit2'){
	top('Kritinio Lygio Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['kritm2']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['kritinislvl'] < 49999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek <font color="red">Kritinio lygio</font> !</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą gavote <b>500</b> <font color="red"><b><img src="img/bicons/teamp.png">Komandos taškų</b></font> ! </div> ';		


	mysqli_query($conn,"UPDATE team SET teamp=teamp+'500' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET kritm2='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['kritm2']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}


///kritinio lygio misijos
if($id == 'misijoskrit1'){
	top('Kritinio Lygio Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['kritm1']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['kritinislvl'] < 9999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek <font color="red">Kritinio lygio</font> !</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą gavote <b>200</b> <font color="red"><b><img src="img/bicons/teamp.png">Komandos taškų</b></font> ! </div> ';		


	mysqli_query($conn,"UPDATE team SET teamp=teamp+'200' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET kritm1='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['kritm1']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}




///euruu misijos
if($id == 'misijoseuru10'){
	top('Eurų Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['eurm10']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['eurai'] < 29999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek '.$eurui.' !</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą gavote <b>30,000</b> <font color="red"><b>Kritinio lygio</b></font> ! </div> ';		


	mysqli_query($conn,"UPDATE team SET kritinislvl=kritinislvl+'30000' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET eurm10='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['eurm10']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}
///euruu misijos
if($id == 'misijoseuru9'){
	top('Eurų Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['eurm9']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['eurai'] < 19999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek '.$eurui.' !</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą gavote <b>25,000</b> <font color="red"><b>Kritinio lygio</b></font> ! </div> ';		


	mysqli_query($conn,"UPDATE team SET kritinislvl=kritinislvl+'25000' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET eurm9='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['eurm9']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}



///euruu misijos
if($id == 'misijoseuru8'){
	top('Eurų Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['eurm8']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['eurai'] < 11999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek '.$eurui.' !</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą gavote <b>20,000</b> <font color="red"><b>Kritinio lygio</b></font> ! </div> ';		


	mysqli_query($conn,"UPDATE team SET kritinislvl=kritinislvl+'20000' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET eurm8='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['eurm8']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}


///euruu misijos
if($id == 'misijoseuru7'){
	top('Eurų Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['eurm7']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['eurai'] < 6999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek '.$eurui.' !</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą gavote <b>16,000</b> <font color="red"><b>Kritinio lygio</b></font> ! </div> ';		


	mysqli_query($conn,"UPDATE team SET kritinislvl=kritinislvl+'16000' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET eurm7='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['eurm7']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}
///euruu misijos
if($id == 'misijoseuru6'){
	top('Eurų Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['eurm6']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['eurai'] < 3999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek '.$eurui.' !</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą gavote <b>12,000</b> <font color="red"><b>Kritinio lygio</b></font> ! </div> ';		


	mysqli_query($conn,"UPDATE team SET kritinislvl=kritinislvl+'12000' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET eurm6='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['eurm6']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}



///euruu misijos
if($id == 'misijoseuru5'){
	top('Eurų Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['eurm5']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['eurai'] < 1999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek '.$eurui.' !</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą gavote <b>8,000</b> <font color="red"><b>Kritinio lygio</b></font> ! </div> ';		


	mysqli_query($conn,"UPDATE team SET kritinislvl=kritinislvl+'8000' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET eurm5='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['eurm5']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}

///euruu misijos
if($id == 'misijoseuru4'){
	top('Eurų Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['eurm4']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['eurai'] < 999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek '.$eurui.' !</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą gavote <b>4,000</b> <font color="red"><b>Kritinio lygio</b></font> ! </div> ';		


	mysqli_query($conn,"UPDATE team SET kritinislvl=kritinislvl+'4000' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET eurm4='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['eurm4']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}
///euruu misijos
if($id == 'misijoseuru3'){
	top('Eurų Misijos');
	

	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['eurm3']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['eurai'] < 499){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek '.$eurui.' !</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą gavote <b>2,000</b> <font color="red"><b>Kritinio lygio</b></font> ! </div> ';		


	mysqli_query($conn,"UPDATE team SET kritinislvl=kritinislvl+'2000' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET eurm3='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['eurm3']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}
///euruu misijos
if($id == 'misijoseuru2'){
	top('Eurų Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['eurm2']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['eurai'] < 249){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek '.$eurui.' !</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą gavote <b>1,000</b> <font color="red"><b>Kritinio lygio</b></font> ! </div> ';		


	mysqli_query($conn,"UPDATE team SET kritinislvl=kritinislvl+'1000' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET eurm2='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['eurm2']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}
///euruu misijos
if($id == 'misijoseuru1'){
	top('Eurų Misijos');

	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['eurm1']-time() < 0){
	       $timxx = time()+60*60*24*1000;
			if($row['eurai'] < 99){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek '.$eurui.' !</b>!</div>';}
else{

	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą gavote <b>500</b> <font color="red"><b>Kritinio lygio</b></font> ! </div> ';


	mysqli_query($conn,"UPDATE team SET kritinislvl=kritinislvl+'500' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET eurm1='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['eurm1']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}
if($id == 'misijospinigu10'){
	top('Pinigų Misijos');

	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['pinm10']-time() < 0){
	       $timxx = time()+60*60*24*1000;
			if($row['pinigai'] < 49999999999999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek pinigų</b>!</div>';}
else{

	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą buvo pridėti <b>700</b>'.$eurui.' ! </div> ';


	mysqli_query($conn,"UPDATE team SET eurai=eurai+'700' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET pinm10='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['pinm10']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}


if($id == 'misijospinigu9'){
	top('Pinigų Misijos');

	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['pinm9']-time() < 0){
	       $timxx = time()+60*60*24*1000;
			if($row['pinigai'] < 19999999999999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek pinigų</b>!</div>';}
else{

	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą buvo pridėti <b>500</b>'.$eurui.' ! </div> ';


	mysqli_query($conn,"UPDATE team SET eurai=eurai+'500' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET pinm9='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['pinm9']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}


if($id == 'misijospinigu8'){
	top('Pinigų Misijos');

	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['pinm8']-time() < 0){
	       $timxx = time()+60*60*24*1000;
			if($row['pinigai'] < 4999999999999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek pinigų</b>!</div>';}
else{

	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą buvo pridėti <b>300</b>'.$eurui.' ! </div> ';


	mysqli_query($conn,"UPDATE team SET eurai=eurai+'300' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET pinm8='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['pinm8']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}


if($id == 'misijospinigu7'){
	top('Pinigų Misijos');

	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['pinm7']-time() < 0){
	       $timxx = time()+60*60*24*1000;
			if($row['pinigai'] < 1499999999999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek pinigų</b>!</div>';}
else{

	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą buvo pridėti <b>200</b>'.$eurui.' ! </div> ';


	mysqli_query($conn,"UPDATE team SET eurai=eurai+'200' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET pinm7='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['pinm7']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}


if($id == 'misijospinigu6'){
	top('Pinigų Misijos');

	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['pinm6']-time() < 0){
	       $timxx = time()+60*60*24*1000;
			if($row['pinigai'] < 499999999999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek pinigų</b>!</div>';}
else{

	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą buvo pridėti <b>150</b>'.$eurui.' ! </div> ';


	mysqli_query($conn,"UPDATE team SET eurai=eurai+'150' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET pinm6='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['pinm6']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}
if($id == 'misijospinigu5'){
	top('Pinigų Misijos');

	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['pinm5']-time() < 0){
	       $timxx = time()+60*60*24*1000;
			if($row['pinigai'] < 149999999999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek pinigų</b>!</div>';}
else{

	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą buvo pridėti <b>100</b>'.$eurui.' ! </div> ';


	mysqli_query($conn,"UPDATE team SET eurai=eurai+'100' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET pinm5='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['pinm5']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}



if($id == 'misijospinigu4'){
	top('Pinigų Misijos');

	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['pinm4']-time() < 0){
	       $timxx = time()+60*60*24*1000;
			if($row['pinigai'] < 49999999999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek pinigų</b>!</div>';}
else{

	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą buvo pridėti <b>80</b>'.$eurui.' ! </div> ';


	mysqli_query($conn,"UPDATE team SET eurai=eurai+'80' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET pinm4='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['pinm4']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}


if($id == 'misijospinigu3'){
	top('Pinigų Misijos');

	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['pinm3']-time() < 0){
	       $timxx = time()+60*60*24*1000;
			if($row['pinigai'] < 19999999999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek pinigų</b>!</div>';}
else{

	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą buvo pridėti <b>60</b>'.$eurui.' ! </div> ';


	mysqli_query($conn,"UPDATE team SET eurai=eurai+'60' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET pinm3='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['pinm3']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}
if($id == 'misijospinigu2'){
	top('Pinigų Misijos');

	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['pinm2']-time() < 0){
	       $timxx = time()+60*60*24*1000;
			if($row['pinigai'] < 4999999999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek pinigų</b>!</div>';}
else{

	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą buvo pridėti <b>40</b>'.$eurui.' ! </div> ';


	mysqli_query($conn,"UPDATE team SET eurai=eurai+'40' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET pinm2='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['pinm2']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}


if($id == 'misijospinigu1'){
	top('Pinigų Misijos');

	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['pinm1']-time() < 0){
	       $timxx = time()+60*60*24*1000;
			if($row['pinigai'] < 999999999){
		echo'<div class="meniuc">
 <b> Komanda neturi  tiek pinigų</b>!</div>';}
else{

	echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Į iždą buvo pridėti <b>20</b>'.$eurui.' ! </div> ';


	mysqli_query($conn,"UPDATE team SET eurai=eurai+'20' WHERE pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET pinm1='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['pinm1']-time() > 0){
echo'	
<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}



if($id == 'misijoskovu10'){
	top('Kovų Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['kovm10']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['viso_laimejo_kovu'] < 7999999){
		echo'<div class="meniuc">
 <b> Komanda nėra laimėjusi tiek kovų</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/veikejaic/Hopp.png"></div>
<div class="meniuc">	<b>Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Atrakinote <b>Dešimtąjį komandos bosą</b>! </div> ';		


	mysqli_query($conn,"INSERT INTO team_boss SET name='Hopp', img='Hopp', zen='60000000000',   hp='50000000000', max_hp='50000000000', laikas='28800', max_hit='13000', min_hit='8000', eur='600', pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET kovm10='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['kovm10']-time() > 0){
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}

if($id == 'misijoskovu9'){
	top('Kovų Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['kovm9']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['viso_laimejo_kovu'] < 4999999){
		echo'<div class="meniuc">
 <b> Komanda nėra laimėjusi tiek kovų</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/veikejaic/Bergamo.png"></div>
<div class="meniuc">	<b>Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Atrakinote <b>Devintąjį komandos bosą</b>! </div> ';		


	mysqli_query($conn,"INSERT INTO team_boss SET name='Bergamo', img='Bergamo', zen='30000000000',   hp='20000000000', max_hp='20000000000', laikas='25200', max_hit='10000', min_hit='6000', eur='400', pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET kovm9='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['kovm9']-time() > 0){
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}

if($id == 'misijoskovu8'){
	top('Kovų Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['kovm8']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['viso_laimejo_kovu'] < 2999999){
		echo'<div class="meniuc">
 <b> Komanda nėra laimėjusi tiek kovų</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/veikejaic/Frost.png"></div>
<div class="meniuc">	<b>Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Atrakinote <b>Aštuntąjį komandos bosą</b>! </div> ';		


	mysqli_query($conn,"INSERT INTO team_boss SET name='Frost', img='Frost', zen='15000000000',   hp='10000000000', max_hp='10000000000', laikas='21600', max_hit='8000', min_hit='4000', eur='300', pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET kovm8='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['kovm8']-time() > 0){
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}
if($id == 'misijoskovu7'){
	top('Kovų Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['kovm7']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['viso_laimejo_kovu'] < 1499999){
		echo'<div class="meniuc">
 <b> Komanda nėra laimėjusi tiek kovų</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/veikejaic/Basil.png"></div>
<div class="meniuc">	<b>Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Atrakinote <b>Septintąjį komandos bosą</b>! </div> ';		


	mysqli_query($conn,"INSERT INTO team_boss SET name='Basil', img='Basil', zen='8000000000',   hp='4000000000', max_hp='4000000000', laikas='18000', max_hit='6000', min_hit='3000', eur='200', pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET kovm7='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['kovm7']-time() > 0){
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}
if($id == 'misijoskovu6'){
	top('Kovų Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['kovm6']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['viso_laimejo_kovu'] < 799999){
		echo'<div class="meniuc">
 <b> Komanda nėra laimėjusi tiek kovų</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/veikejaic/Botamo.png"></div>
<div class="meniuc">	<b>Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Atrakinote <b>Šeštajį komandos bosą</b>! </div> ';		


	mysqli_query($conn,"INSERT INTO team_boss SET name='Botamo', img='Botamo', zen='4000000000',   hp='2000000000', max_hp='2000000000', laikas='14400', max_hit='4000', min_hit='2000', eur='150', pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET kovm6='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['kovm6']-time() > 0){
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}
if($id == 'misijoskovu5'){
	top('Kovų Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['kovm5']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['viso_laimejo_kovu'] < 399999){
		echo'<div class="meniuc">
 <b> Komanda nėra laimėjusi tiek kovų</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/veikejaic/A17.png"></div>
<div class="meniuc">	<b>Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Atrakinote <b>Penktajį komandos bosą</b>! </div> ';		


	mysqli_query($conn,"INSERT INTO team_boss SET name='Android 17', img='A17', zen='2000000000',   hp='1000000000', max_hp='1000000000', laikas='10800', max_hit='3000', min_hit='1500', eur='100', pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET kovm5='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['kovm5']-time() > 0){
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}


if($id == 'misijoskovu4'){
	top('Kovų Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['kovm4']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['viso_laimejo_kovu'] < 199999){
		echo'<div class="meniuc">
 <b> Komanda nėra laimėjusi tiek kovų</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/veikejaic/Hitas.png"></div>
<div class="meniuc">	<b>Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Atrakinote <b>Ketvirtajį komandos bosą</b>! </div> ';		


	mysqli_query($conn,"INSERT INTO team_boss SET name='Hitas', img='Hitas', zen='1000000000',   hp='400000000', max_hp='400000000', laikas='7200', max_hit='2000', min_hit='1000', eur='50', pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET kovm4='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['kovm4']-time() > 0){
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}
if($id == 'misijoskovu3'){
	top('Kovų Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['kovm3']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['viso_laimejo_kovu'] < 99999){
		echo'<div class="meniuc">
 <b> Komanda nėra laimėjusi tiek kovų</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/veikejaic/Buu2.png"></div>
<div class="meniuc">	<b>Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Atrakinote <b>Trečiajį komandos bosą</b>! </div> ';		


	mysqli_query($conn,"INSERT INTO team_boss SET name='Buu', img='Buu2', zen='500000000',   hp='200000000', max_hp='200000000', laikas='3600', max_hit='1200', min_hit='500', eur='30', pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET kovm3='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['kovm3']-time() > 0){
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}



if($id == 'misijoskovu2'){
	top('Kovų Misijos');
	
if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['kovm2']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['viso_laimejo_kovu'] < 49999){
		echo'<div class="meniuc">
 <b> Komanda nėra laimėjusi tiek kovų</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/veikejaic/Fryzas2.png"></div>
<div class="meniuc">	<b>Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Atrakinote <b>Antrajį komandos bosą</b>! </div> ';		


	mysqli_query($conn,"INSERT INTO team_boss SET name='Fryzas', img='Fryzas2', zen='300000000',   hp='100000000', max_hp='100000000', laikas='1800', max_hit='700', min_hit='200', eur='20', pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET kovm2='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['kovm2']-time() > 0){
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}
if($id == 'misijoskovu1'){
	top('Kovų Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
	if($row['kovm1']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($row['viso_laimejo_kovu'] < 9999){
		echo'<div class="meniuc">
 <b> Komanda nėra laimėjusi tiek kovų</b>!</div>';}
else{
				
	echo'	
<div class="meniuc">
	<img src="img/veikejaic/Kaba.png"></div>
<div class="meniuc">	<b>

Jūsų komanda sėkmingai įvygdė šią misiją</b>! <br>Atrakinote <b>Pirmajį komandos bosą</b>! </div> ';		


	mysqli_query($conn,"INSERT INTO team_boss SET name='Kaba', img='Kaba', zen='100000000',   hp='50000000', max_hp='50000000', laikas='1800', max_hit='500', min_hit='100', eur='10', pavadinimas='$ka' ");
mysqli_query($conn,"UPDATE team SET kovm1='$timxx' WHERE pavadinimas='$ka' ");
}}

elseif($row['kovm1']-time() > 0){
                echo '<div class="meniuc">Jūsų komanda jau įvygdžius šią misiją!</div>';
            }
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);

}

///kritinio lygio misijos
if($id == 'misijoskrit'){
	top('Kritinio lygio Misijos');
	
if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}

	else{
		
	$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
echo'<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
	echo'
<div class="up">Kritinio Lygio Misijos</div>
<div class="meniuc"><b>Komandų kritinio lygio misijos</b> - visa komanda renka <b>kritinį lygį</b> vis daugiau lygio turės ir gali įvygdyti pasiekus tam tikrą kritinio lygio šias misijas!</div>
<div class="meniu">';
if($row['kritm1']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoskrit1&ka=$ka'>Turėti <b>10,000 </b> Kritinio Lygio</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['kritm1']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoskrit1&ka=$ka'>Turėti <b>10,000</b> Kritinio Lygio</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['kritm2']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoskrit2&ka=$ka'>Turėti <b>50,000 </b> Kritinio Lygio</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['kritm2']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoskrit2&ka=$ka'>Turėti <b>50,000</b> Kritinio Lygio</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['kritm3']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoskrit3&ka=$ka'>Turėti <b>100,000 </b> Kritinio Lygio</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['kritm3']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoskrit3&ka=$ka'>Turėti <b>100,000</b> Kritinio Lygio</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['kritm4']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoskrit4&ka=$ka'>Turėti <b>200,000 </b> Kritinio Lygio</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['kritm4']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoskrit4&ka=$ka'>Turėti <b>200,000</b> Kritinio Lygio</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['kritm5']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoskrit5&ka=$ka'>Turėti <b>400,000 </b> Kritinio Lygio</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['kritm5']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoskrit5&ka=$ka'>Turėti <b>400,000</b> Kritinio Lygio</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['kritm6']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoskrit6&ka=$ka'>Turėti <b>800,000 </b> Kritinio Lygio</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['kritm6']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoskrit6&ka=$ka'>Turėti <b>800,000</b> Kritinio Lygio</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['kritm7']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoskrit7&ka=$ka'>Turėti <b>1,200,000 </b> Kritinio Lygio</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['kritm7']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoskrit7&ka=$ka'>Turėti <b>1,200,000</b> Kritinio Lygio</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['kritm8']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoskrit8&ka=$ka'>Turėti <b>1,600,000 </b> Kritinio Lygio</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['kritm8']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoskrit8&ka=$ka'>Turėti <b>1,600,000</b> Kritinio Lygio</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['kritm9']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoskrit9&ka=$ka'>Turėti <b>2,000,000 </b> Kritinio Lygio</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['kritm9']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoskrit9&ka=$ka'>Turėti <b>2,000,000</b> Kritinio Lygio</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['kritm10']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoskrit10&ka=$ka'>Turėti <b>3,000,000 </b> Kritinio Lygio</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['kritm10']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoskrit10&ka=$ka'>Turėti <b>3,000,000</b> Kritinio Lygio</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
}
	echo"	</div>";
	}

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);
}
///euru misijos
if($id == 'misijoseuru'){
	top('Eurų Misijos');
	
if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}

	else{
		
	$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
echo'<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
	echo'
<div class="up">Eurų Misijos</div>
<div class="meniuc"><b>Komandų eurų misijos</b> - visa komanda renka '.$euru.' vis daugiau eurų ir gali įvygdyti pasiekus tam tikrą eurų šias misijas!</div>
<div class="meniu">';
if($row['eurm1']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoseuru1&ka=$ka'>Sutaupyti <b>100 </b>$eurui</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['eurm1']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoseuru1&ka=$ka'>Sutaupyti <b>100</b>$eurui</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['eurm2']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoseuru2&ka=$ka'>Sutaupyti <b>250 </b>$eurui</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['eurm2']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoseuru2&ka=$ka'>Sutaupyti <b>250</b>$eurui</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['eurm3']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoseuru3&ka=$ka'>Sutaupyti <b>500 </b>$eurui</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['eurm3']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoseuru3&ka=$ka'>Sutaupyti <b>500</b>$eurui</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['eurm4']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoseuru4&ka=$ka'>Sutaupyti <b>1,000 </b>$eurui</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['eurm4']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoseuru4&ka=$ka'>Sutaupyti <b>1,000</b>$eurui</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['eurm5']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoseuru5&ka=$ka'>Sutaupyti <b>2,000 </b>$eurui</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['eurm5']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoseuru5&ka=$ka'>Sutaupyti <b>2,000</b>$eurui</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['eurm6']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoseuru6&ka=$ka'>Sutaupyti <b>4,000 </b>$eurui</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['eurm6']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoseuru6&ka=$ka'>Sutaupyti <b>4,000</b>$eurui</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['eurm7']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoseuru7&ka=$ka'>Sutaupyti <b>7,000 </b>$eurui</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['eurm7']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoseuru7&ka=$ka'>Sutaupyti <b>7,000</b>$eurui</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['eurm8']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoseuru8&ka=$ka'>Sutaupyti <b>12,000 </b>$eurui</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['eurm8']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoseuru8&ka=$ka'>Sutaupyti <b>12,000</b>$eurui</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['eurm9']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoseuru9&ka=$ka'>Sutaupyti <b>20,000 </b>$eurui</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['eurm9']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoseuru9&ka=$ka'>Sutaupyti <b>20,000</b>$eurui</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['eurm10']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoseuru10&ka=$ka'>Sutaupyti <b>30,000 </b>$eurui</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['eurm10']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoseuru10&ka=$ka'>Sutaupyti <b>30,000</b>$eurui</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}

}
	echo"	</div>";
	}

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);
}

if($id == 'misijospinigu'){
	top('Pinigų Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}

	else{
		
	$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
echo'<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
	echo'
<div class="up">Pinigų Misijos</div>
<div class="meniuc"><b>Komandų pinigų misijos</b> - visa komanda kovojant padaro vis daugiau kovų ir gali įvygdyti pasiekus tam tikrą kovų šias misijas!</div>
<div class="meniu">';
if($row['pinm1']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijospinigu1&ka=$ka'>Sutaupyti <b>".skaicius(1000000000)."</b></a>$pinigaii [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['pinm1']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijospinigu1&ka=$ka'>Sutaupyti <b>".skaicius(1000000000)."</b></a>$pinigaii [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['pinm2']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijospinigu2&ka=$ka'>Sutaupyti <b>".skaicius(5000000000)."</b></a>$pinigaii [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['pinm2']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijospinigu2&ka=$ka'>Sutaupyti <b>".skaicius(5000000000)."</b></a>$pinigaii [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['pinm3']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijospinigu3&ka=$ka'>Sutaupyti <b>".skaicius(20000000000)."</b></a>$pinigaii [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['pinm3']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijospinigu3&ka=$ka'>Sutaupyti <b>".skaicius(20000000000)."</b></a>$pinigaii [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['pinm4']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijospinigu4&ka=$ka'>Sutaupyti <b>".skaicius(50000000000)."</b></a>$pinigaii [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['pinm4']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijospinigu4&ka=$ka'>Sutaupyti <b>".skaicius(50000000000)."</b></a>$pinigaii [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['pinm5']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijospinigu5&ka=$ka'>Sutaupyti <b>".skaicius(150000000000)."</b></a>$pinigaii [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['pinm5']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijospinigu5&ka=$ka'>Sutaupyti <b>".skaicius(150000000000)."</b></a>$pinigaii [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['pinm6']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijospinigu6&ka=$ka'>Sutaupyti <b>".skaicius(500000000000)."</b></a>$pinigaii [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['pinm6']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijospinigu6&ka=$ka'>Sutaupyti <b>".skaicius(500000000000)."</b></a>$pinigaii [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['pinm7']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijospinigu7&ka=$ka'>Sutaupyti <b>".skaicius(1500000000000)."</b></a>$pinigaii [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['pinm7']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijospinigu7&ka=$ka'>Sutaupyti <b>".skaicius(1500000000000)."</b></a>$pinigaii [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['pinm8']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijospinigu8&ka=$ka'>Sutaupyti <b>".skaicius(5000000000000)."</b></a>$pinigaii [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['pinm8']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijospinigu8&ka=$ka'>Sutaupyti <b>".skaicius(5000000000000)."</b></a>$pinigaii [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['pinm9']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijospinigu9&ka=$ka'>Sutaupyti <b>".skaicius(20000000000000)."</b></a>$pinigaii [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['pinm9']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijospinigu9&ka=$ka'>Sutaupyti <b>".skaicius(20000000000000)."</b></a>$pinigaii [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['pinm10']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijospinigu10&ka=$ka'>Sutaupyti <b>".skaicius(50000000000000)."</b></a>$pinigaii [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['pinm10']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijospinigu10&ka=$ka'>Sutaupyti <b>".skaicius(50000000000000)."</b></a>$pinigaii [<b><font color='red'>Neįvygdyta</b></font>]<br>";}


}
	echo"	</div>";
	}

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);
}


if($id == 'misijoskovu'){
	top('Kovų Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}

	else{
		
	$query = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
    while($row = mysqli_fetch_assoc($query)){
echo'<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
	echo'
<div class="up">Kovų Misijos</div>
<div class="meniuc"><b>Komandų kovų misijos</b> - visa komanda kovojant padaro vis daugiau kovų ir gali įvygdyti pasiekus tam tikrą kovų šias misijas!</div>
<div class="meniu">';
if($row['kovm1']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoskovu1&ka=$ka'>Padaryti <b>10,000 </b>kovų</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['kovm1']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoskovu1&ka=$ka'>Padaryti <b>10,000</b> kovų</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
	if($row['kovm2']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoskovu2&ka=$ka'>Padaryti <b>50,000</b> kovų</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['kovm2']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoskovu2&ka=$ka'>Padaryti <b>50,000</b> kovų</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['kovm3']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoskovu3&ka=$ka'>Padaryti <b>100,000</b> kovų</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['kovm3']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoskovu3&ka=$ka'>Padaryti <b>100,000</b> kovų</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['kovm4']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoskovu4&ka=$ka'>Padaryti <b>200,000</b> kovų</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['kovm4']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoskovu4&ka=$ka'>Padaryti <b>200,000</b> kovų</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['kovm5']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoskovu5&ka=$ka'>Padaryti <b>400,000</b> kovų</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['kovm5']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoskovu5&ka=$ka'>Padaryti <b>400,000</b> kovų</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['kovm6']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoskovu6&ka=$ka'>Padaryti <b>800,000</b> kovų</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['kovm6']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoskovu6&ka=$ka'>Padaryti <b>800,000</b> kovų</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['kovm7']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoskovu7&ka=$ka'>Padaryti <b>1,500,000</b> kovų</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['kovm7']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoskovu7&ka=$ka'>Padaryti <b>1,500,000</b> kovų</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['kovm8']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoskovu8&ka=$ka'>Padaryti <b>3,000,000</b> kovų</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['kovm8']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoskovu8&ka=$ka'>Padaryti <b>3,000,000</b> kovų</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['kovm9']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoskovu9&ka=$ka'>Padaryti <b>5,000,000</b> kovų</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['kovm9']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoskovu9&ka=$ka'>Padaryti <b>5,000,000</b> kovų</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}
if($row['kovm10']-time() > 0){echo"		".$ico." <a href='komanda.php?id=misijoskovu10&ka=$ka'>Padaryti <b>8,000,000</b> kovų</a> [<b><font color='green'>Įvygdyta</b></font>]<br>";}
if($row['kovm10']-time() < 0){echo"		".$ico." <a href='komanda.php?id=misijoskovu10&ka=$ka'>Padaryti <b>8,000,000</b> kovų</a> [<b><font color='red'>Neįvygdyta</b></font>]<br>";}


}
	echo"	</div>";
	}

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);
}
if($id == 'kmisijos'){
	top('Komandos Misijos');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	else{

echo'<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
echo' <div class="meniuc"><b>Komandos misijos</b> - tai skirtos misijos vygdyti, ir parodyti savo komandos pranašumą prieš kitas komandas!</div>';
		echo"<div class='meniu'>";
		
echo"		".$ico." <a href='komanda.php?id=misijoskovu&ka=$ka'>Kovų Misijos</a><br>";
		echo"		".$ico." <a href='komanda.php?id=misijospinigu&ka=$ka'>Pinigų Misijos</a><br>";
echo"		".$ico." <a href='komanda.php?id=misijoseuru&ka=$ka'>Eurų Misijos</a><br>";
echo"		".$ico." <a href='komanda.php?id=misijoskrit&ka=$ka'>Kritinio lygio Misijos</a><br>";
echo"		</div>";
	}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Misijos");
navigacija($g_n);
}


if($id == 'nario_cp'){
	top('Nario cp');
	
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	else{
		echo"<div class='meniu'>
		
		".$ico." <a href='komanda.php?id=topic&ka=$ka'>Keisti Topic</a><br>
		".$ico." <a href='komanda.php?id=pinigai&ka=$ka'>Pervesti pinigų į komandą</a><br>
	".$ico." <a href='komanda.php?id=eurai&ka=$ka'>Pervesti eurų į komandą</a><br>
		".$ico." <a href='komanda.php?id=leave&ka=$ka'>Išeiti iš komandos</a><br>
		</div>";
	}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Nario cp");
navigacija($g_n);
}
if($id == 'leave'){
	top('Išėjimas iš komandos');
	if($user['team'] != $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	else{
		echo"<div class='meniuc'>Atlikta</div>";
		mysqli_query($conn,"UPDATE user SET team='',win_in_team='0',kiek_paaukojo_i_team='0' WHERE nick='$nick'");
	}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Išėjimas iš komandos");
navigacija($g_n);
}




if($id == 'pinigai'){
	
top('Pinigų pervedimas');
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	else{
		echo"<div class='meniuc'><b>Kiek:</b><br>
		<form action='komanda.php?id=pervedu_pinigus&ka=$ka' method='post'>
		<input type='number' maxlenght='10' name='kiek'><br>
		<input type='submit' value='Pervesti'><br>
		</form></div>";
	}
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Pinigų pervedimas");
navigacija($g_n);
}
if($id == 'pervedu_pinigus'){
	top('Pinigų pervedimas');
   $kiek = preg_replace("/[^0-9]/", "", $_POST['kiek']);
	

if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif(empty($kiek)){echo"<div class='meniuc'>Neįrašei kiek pervesi</div>";}
	elseif($apie['litai'] < $kiek){echo"<div class='meniuc'>Neturi tiek pinigų</div>";}
	else{
		echo"<div class='meniuc'><b>Atlikta</b></div>";
		$kiek2= $apie['litai'] - $kiek;
		$kiek3 = $info['pinigai'] + $kiek;
		mysqli_query($conn,"UPDATE zaidejai SET litai='$kiek2' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE team SET pinigai='$kiek3' WHERE pavadinimas='$ka'");
		mysqli_query($conn,"UPDATE user SET kiek_paaukojo_i_team='$kiek3' WHERE nick ='$nick'");
		
	}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Pinigų pervedimas");
navigacija($g_n);
}

if($id == 'eurai'){
	
top('Eurų pervedimas');
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	else{
		echo"<div class='meniuc'><b>Kiek:</b><br>
		<form action='komanda.php?id=pervedu_eurus&ka=$ka' method='post'>
		<input type='number' maxlenght='10' name='kiek'><br>
		<input type='submit' value='Pervesti'><br>
		</form></div>";
	}
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Eurų pervedimas");
navigacija($g_n);
}
if($id == 'pervedu_eurus'){
	top('Eurų pervedimas');
   $kiek = preg_replace("/[^0-9]/", "", $_POST['kiek']);
	

if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif(empty($kiek)){echo"<div class='meniuc'>Neįrašei kiek pervesi</div>";}
	elseif($apie['sms_litai'] < $kiek){echo"<div class='meniuc'>Neturi tiek eurų</div>";}
	else{
		echo"<div class='meniuc'><b>Atlikta</b></div>";
		$kiek2= $apie['sms_litai'] - $kiek;
		$kiek3 = $info['eurai'] + $kiek;
		mysqli_query($conn,"UPDATE zaidejai SET sms_litai='$kiek2' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE team SET eurai='$kiek3' WHERE pavadinimas='$ka'");
		mysqli_query($conn,"UPDATE user SET kiek_paaukojo_i_team2='$kiek3' WHERE nick ='$nick'");
		
	}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Eurų pervedimas");
navigacija($g_n);
}


if($id == 'topic'){
	top('Topikas');
if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	else{
		echo"<div class='meniuc'><b>Naujas Topic</b><br>
		<form action='komanda.php?id=keiciu_topic&ka=$ka' method='post'>
		<input type='text' maxlenght='1000' name='topic'><br>
		<input type='submit' value='Keisti'><br>
		</form></div>";
	}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Topikas");
navigacija($g_n);
}
if($id == 'keiciu_topic'){
	top('Keisti topika');
	$topic = post($_POST['topic']);
    
	if($user['team'] !== $ka){echo"<div class='meniuc'>Tu nesi šitoje komandoje</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif(empty($topic)){echo"<div class='meniuc'>Neįrašei topic</div>";}
	else{
		echo"<div class='meniuc'><b>Atlikta</b></div>";
		mysqli_query($conn,"UPDATE team SET topic='$topic' WHERE pavadinimas='$ka'");
	}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Keisti topika");
navigacija($g_n);
}
if($id == 'pv_cp'){
	
	top('Pavaduotojo cp');
	
	if($info['pavadotuojas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos pavaduotojas</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'Tokios komandos nėra</div>";}
	else{
		echo"<div class='meniu'>
		
		".$ico." <a href='komanda.php?id=kviesti&ka=$ka'>Kviesti žaidėją į komandą</a><br>
		".$ico." <a href='komanda.php?id=delete_player_from_team&ka=$ka'>Išmesti žaidėją iš komandos</a><br>	
		".$ico." <a href='komanda.php?id=log&ka=$ka'>Kovų logas</a><br>
		".$ico." <a href='komanda.php?id=aukos&ka=$ka'>".$pinigaii." Aukojimų statistika</a><br>
		".$ico." <a href='komanda.php?id=aukos2&ka=$ka'>".$eurui." Aukojimų statistika</a><br>
		".$ico." <a href='komanda.php?id=statyt_alga&ka=$ka'>Nustatyti algą už ".$nxkurva['iki_algos']." kovų ".$pinigaii."</a><br>
		".$ico." <a href='komanda.php?id=statyt_alga2&ka=$ka'>Nustatyti algą už  ".$nxkurva['iki_algos']." kovų ".$eurui."</a><br>
		".$ico." <a href='komanda.php?id=keist_kiek&ka=$ka'>Nustatyti kas kiek kovų mokama alga</a><br>	
		".$ico." <a href='komanda.php?id=visiems&ka=$ka'>Pm siuntimas komandos nariams</a><br>	
		".$ico." <a href='komanda.php?id=ft&ka=$ka'>Keisti komandos foto</a>[<a href=\"komanda.php?id=isimtift&ka=$ka\">x</a>]<br>
		</div>";
	}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Pavaduotojo cp");
navigacija($g_n);
}
if($id == 'admin_cp'){
	
	top('Vado cp');
	
	if($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'Tokios komandos nėra</div>";}
	else{
		echo"<div class='meniu'>
		
		".$ico." <a href='komanda.php?id=kviesti&ka=$ka'>Kviesti žaidėją į komandą</a><br>
		".$ico." <a href='komanda.php?id=delete_player_from_team&ka=$ka'>Išmesti žaidėją iš komandos</a><br>
		".$ico." <a href='komanda.php?id=pavsut&ka=$ka'>Suteikti pavadotojo pareigas</a><br>
		".$ico." <a href='komanda.php?id=log&ka=$ka'>Kovų logas</a><br>
		".$ico." <a href='komanda.php?id=veduospin&ka=$ka'>Persivesti sau ".$pinigaii."</a><br>	
	".$ico." <a href='komanda.php?id=veduoseur&ka=$ka'>Persivesti sau ".$eurui."</a><br>	
		".$ico." <a href='komanda.php?id=aukos&ka=$ka'>".$pinigaii." Aukojimų statistika</a><br>
".$ico." <a href='komanda.php?id=aukos2&ka=$ka'>".$eurui." Aukojimų statistika</a><br>
		".$ico." <a href='komanda.php?id=topic&ka=$ka'>Keisti vado topic</a><br>
		".$ico." <a href='komanda.php?id=statyt_alga&ka=$ka'>Nustatyti algą už ".$nxkurva['iki_algos']." kovų ".$pinigaii."</a><br>
".$ico." <a href='komanda.php?id=statyt_alga2&ka=$ka'>Nustatyti algą už  ".$nxkurva['iki_algos']." kovų ".$eurui."</a><br>
".$ico." <a href='komanda.php?id=keist_kiek&ka=$ka'>Nustatyti kas kiek kovų mokama alga</a><br>
		".$ico." <a href='komanda.php?id=delete&ka=$ka'>Ištrinti Komandą</a><br>	
		".$ico." <a href='komanda.php?id=visiems&ka=$ka'>Pm siuntimas komandos nariams</a><br>	
		".$ico." <a href='komanda.php?id=ft&ka=$ka'>Keisti komandos foto</a>[<a href=\"komanda.php?id=isimtift&ka=$ka\">x</a>]<br>
		</div>";
	}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Vado cp");
navigacija($g_n);
}
/// pinigu pervedimas sau
if($id == 'veduospin'){
	
top('Pinigų pervedimas');
		if($info['vadas'] !== $nick){echo"Tu nesi šios komandos vadas";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"Tokios komandos nėra";}
	else{
		echo"<div class='meniuc'><b>Kiek persivesi ".$pinigaii."</b><br>
		<form action='komanda.php?id=persivedu_pinigus&ka=$ka' method='post'>
		<input type='number' maxlenght='10' name='kiek'><br>
		<input type='submit' value='Pervesti'><br>
		</form></div>";
	}
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Pinigų pervedimas");
navigacija($g_n);
}
if($id == 'persivedu_pinigus'){
	top('Pinigų pervedimas');
   $kiek = preg_replace("/[^0-9]/", "", $_POST['kiek']);
	

if($info['vadas'] !== $nick){echo"Tu nesi šios komandos vadas";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"Tokios komandos nėra";}
	elseif(empty($kiek)){echo"<div class='meniuc'>Neįrašei kiek pervesi!</div>";}
	elseif($info['pinigai'] < $kiek){echo"<div class='meniuc'>Nėra tiek pinigų!</div>";}
	else{
		echo"<div class='meniuc'><b>Atlikta! Persivedei <b>".$kiek2." </b> ".$pinigaii." !</b></div>";
		$kiek2= $apie['litai'] + $kiek;
		$kiek3 = $info['pinigai'] - $kiek;
		mysqli_query($conn,"UPDATE zaidejai SET litai='$kiek2' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE team SET pinigai='$kiek3' WHERE pavadinimas='$ka'");
		
		
	}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Pinigų pervedimas");
navigacija($g_n);
}


/// eurų pervedimas sau
if($id == 'veduoseur'){
	
top('Eurų pervedimas');
		if($info['vadas'] !== $nick){echo"Tu nesi šios komandos vadas";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"Tokios komandos nėra";}
	else{
		echo"<div class='meniuc'><b>Kiek persivesi ".$eurui." </b><br>
		<form action='komanda.php?id=persivedu_eurus&ka=$ka' method='post'>
		<input type='number' maxlenght='10' name='kiek'><br>
		<input type='submit' value='Pervesti'><br>
		</form></div>";
	}
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Eurų pervedimas");
navigacija($g_n);
}
if($id == 'persivedu_eurus'){
	top('Eurų pervedimas');
   $kiek = preg_replace("/[^0-9]/", "", $_POST['kiek']);
	

if($info['vadas'] !== $nick){echo"Tu nesi šios komandos vadas";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"Tokios komandos nėra";}
	elseif(empty($kiek)){echo"<div class='meniuc'>Neįrašei kiek pervesi!</div>";}
	elseif($info['eurai'] < $kiek){echo"<div class='meniuc'>Nėra tiek eurų!</div>";}
	else{
		echo"<div class='meniuc'><b>Atlikta! Persivedei <b> ".$kiek2."</b> ".$eurui." !</b></div>";
		$kiek2= $apie['sms_litai'] + $kiek;
		$kiek3 = $info['eurai'] - $kiek;
		mysqli_query($conn,"UPDATE zaidejai SET sms_litai='$kiek2' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE team SET eurai='$kiek3' WHERE pavadinimas='$ka'");
		
		
	}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Eurų pervedimas");
navigacija($g_n);
}

//algos kiekis
if($id == 'keist_kiek'){
    top('Algos nustatymas kas kiek kovų');
	if($info['vadas'] != $nick && $info['pavadotuojas'] != $nick)echo"<div class='meniuc>Tu nesi šios komandos vadas </div>";
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	else{
		echo"<div class='meniuc'>
		 <b>Kas kiek kovų mokėsi</b><br>
		<form action='komanda.php?id=keist_kiek2&ka=$ka' method='post'>
		<input type='text' name='alga' maxlenght='30'><br>
		<input type='submit' value='Keisti'><br>
		</form>
		</div>";
	}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Algos nustatymas ");
navigacija($g_n);
}	
if($id == 'keist_kiek2'){
	top('Algos nustatymas kas kiek kovų');
    $alga = preg_replace("/[^0-9]/", "", $_POST['alga']);

	if($info['vadas'] != $nick && $info['pavadotuojas'] != $nick)echo"<div class='meniuc'>Tu nesi šios komandos vadas</div>";
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc>Tokios komandos nėra</div>";}
	
	elseif(empty($alga)){ echo"<div class='meniuc'>Neįrašei kiekio !</div>";}
	else{
	echo"<div class='meniuc'><b>Atlikta, algos kovų kiekis pakeistas!</b></div>";
	mysqli_query($conn,"UPDATE user SET iki_algos='$alga' WHERE team='$ka'");
mysqli_query($conn,"UPDATE user SET iki_algos2='$alga' WHERE team='$ka'");
mysqli_query($conn,"UPDATE team SET iki_algos='$alga' WHERE pavadinimas='$ka'");
mysqli_query($conn,"UPDATE team SET iki_algos2='$alga' WHERE pavadinimas='$ka'");
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Algos nustatymas");
navigacija($g_n);
}	
if($id == 'statyt_alga'){
    top('Algos nustatymas pinigais');
	if($info['vadas'] != $nick && $info['pavadotuojas'] != $nick)echo"<div class='meniuc>Tu nesi šios komandos vadas </div>";
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	else{
		echo"<div class='meniuc'>
		 <b>Nauja alga $pinigaii</b><br>
		<form action='komanda.php?id=keiciu_alga&ka=$ka' method='post'>
		<input type='number' name='alga' maxlenght='30'><br>
		<input type='submit' value='Keisti'><br>
		</form>
		</div>";
	}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Algos nustatymas ");
navigacija($g_n);
}	
if($id == 'keiciu_alga'){
	top('Algos nustatymas pinigais');
    $alga = preg_replace("/[^0-9]/", "", $_POST['alga']);

	if($info['vadas'] != $nick && $info['pavadotuojas'] != $nick)echo"<div class='meniuc'>Tu nesi šios komandos vadas</div>";
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc>Tokios komandos nėra</div>";}
	elseif($info['pinigai'] < 0){echo"<div class='meniuc'>Komandoje tiek $pinigaii nėra!</div>";}
	elseif(empty($alga)){ echo"<div class='meniuc'>Neįrašei algos $pinigaii !</div>";}
	else{
	echo"<div class='meniuc'><b>Atlikta, alga pakeista!</b></div>";
	mysqli_query($conn,"UPDATE team SET uz_500_kovu='$alga' WHERE pavadinimas='$ka'");
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Algos nustatymas");
navigacija($g_n);
}	
if($id == 'statyt_alga2'){
    top('Algos nustatymas eurais');
	if($info['vadas'] != $nick && $info['pavadotuojas'] != $nick)echo"<div class='meniuc>Tu nesi šios komandos vadas </div>";
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	else{
		echo"<div class='meniuc'>
		 <b>Nauja alga $eurui</b><br>
		<form action='komanda.php?id=keiciu_alga2&ka=$ka' method='post'>
		<input type='number' name='alga' maxlenght='30'><br>
		<input type='submit' value='Keisti'><br>
		</form>
		</div>";
	}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Algos nustatymas ");
navigacija($g_n);
}	
if($id == 'keiciu_alga2'){
	top('Algos nustatymas eurais');
    $alga = preg_replace("/[^0-9]/", "", $_POST['alga']);

	if($info['vadas'] != $nick && $info['pavadotuojas'] != $nick)echo"<div class='meniuc'>Tu nesi šios komandos vadas</div>";
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc>Tokios komandos nėra</div>";}
	elseif($info['eurai'] < 1){echo"<div class='meniuc'>Komandoje tiek $eurui nėra!</div>";}
	elseif(empty($alga)){ echo"<div class='meniuc'>Neįrašei algos $eurui !</div>";}
	else{
	echo"<div class='meniuc'><b>Atlikta, alga pakeista!</b></div>";
	mysqli_query($conn,"UPDATE team SET uz_500_kovu2='$alga' WHERE pavadinimas='$ka'");
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Algos nustatymas");
navigacija($g_n);
}	

if($id == 'delete'){
	top('Komandos ištrinimas');
	echo'
	<div class="meniuc">
				 Ar tikrai trinsite komanda ?</br>
				 <a href="?id=delete_team&ka='.$ka.'"><font color="blue">Taip</font></a>  <a href="?"><font color="red">Ne</font></a>
	</div>		';
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Komandos ištrinimas");
navigacija($g_n);
}

if($id == 'delete_team'){
	
top('Komandos ištrinimas');
	if($info['vadas'] != $nick)echo"<div class='meniuc'>Tu nesi šios komandos vadas</div>";
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc>Tokios komandos nėra</div>";}
	else{
		 echo"<div class='meniuc'>Komanda ištrinta</div>";
		 mysqli_query($conn,"DELETE FROM team WHERE pavadinimas='$ka'");
	     $inf = mysqli_query($conn,"SELECT * FROM user WHERE team = '$ka'");
	     while($info = mysqli_fetch_assoc($inf)){
			 $del = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM user WHERE nick='".$info['nick']."'"));
			 mysqli_query($conn,"UPDATE user SET team='',win_in_team='0',kiek_paaukojo_i_team='0' WHERE nick='".$info['nick']."'");
			 	
		     unset($info);
		 }
	 }
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Komandos ištrinimas");
navigacija($g_n);
}
if($id == 'aukos2'){
	top('Komandos eurų aukojimo statistika');
if($info['vadas'] != $nick && $info['pavadotuojas'] != $nick)echo"<div class='meniuc'>Tu nesi šios komandos vadas</div>";
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc>Tokios komandos nėra</div>";}
	else{
echo"<div class='meniuc'><b>Pagal ".$eurui."</b> aukojimą: </div>";
	echo"<div class='meniu'>
	";
    $nst = mysqli_query($conn,"SELECT * FROM user WHERE team='$ka'");
  while($nt = mysqli_fetch_assoc($nst)){
	
	$nr++;
	echo"<b> ".$nr.".</b> <a href='pagrindinis.php?id=apie&ka=".$nt['nick']."'>".$nt['nick']."</a> - <b>".$nt['kiek_paaukojo_i_team2']." ".$eurui."</b><br>";

	

	
	unset($nt);
}
    echo"</div>";
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Logas");
navigacija($g_n);
}

if($id == 'aukos'){
	top('Komandos pinigų aukojimo statistika');
if($info['vadas'] != $nick && $info['pavadotuojas'] != $nick)echo"<div class='meniuc'>Tu nesi šios komandos vadas</div>";
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc>Tokios komandos nėra</div>";}
	else{
	
echo"<div class='meniuc'><b>Pagal ".$pinigaii."</b> aukojimą: </div>";
echo"<div class='meniu'>
	";
    $nst = mysqli_query($conn,"SELECT * FROM user WHERE team='$ka'");
  while($nt = mysqli_fetch_assoc($nst)){
	
	$nr++;
	echo"<b> ".$nr.".</b> <a href='pagrindinis.php?id=apie&ka=".$nt['nick']."'>".$nt['nick']."</a> - <b>".$nt['kiek_paaukojo_i_team']." ".$pinigaii."</b><br>";

	

	
	unset($nt);
}
    echo"</div>";
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Logas");
navigacija($g_n);
}
if($id == 'log'){
	top('Kovų logas');
if($info['vadas'] != $nick && $info['pavadotuojas'] != $nick)echo"<div class='meniuc'>Tu nesi šios komandos vadas</div>";
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc>Tokios komandos nėra</div>";}
	else{
	echo"<div class='meniu'>
	";
	
    $nst = mysqli_query($conn,"SELECT * FROM team_logas WHERE team='$ka' ORDER BY id DESC LIMIT 0,10");

    while($nt = mysqli_fetch_assoc($nst)){
	$nr++;
	
	echo"<b>".$nr.".</b> ".$nt['msg']."<br>";
	
	unset($nt);
}
    echo"</div>";
}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Kovų logas");
navigacija($g_n);
}

		
if($id == 'delete_player_from_team'){
	top('Narių šalinimas');


	if($info['vadas'] != $nick && $info['pavadotuojas'] != $nick)echo"<div class='meniuc'>Tu nesi šios komandos vadas</div>";
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc>Tokios komandos nėra</div>";}
	else{
		echo"<div class='meniuc'>
		Ką išmesi iš komandos?<br>
		<form action='komanda.php?id=metu&ka=$ka' method='post'>
		<input name='kas' maxlenght='50' type='text'><br>
		<input type='submit' value='Išmesti'>
		</form></div>";
	}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Narių šalinimas");
navigacija($g_n);
}
if($id == 'metu'){
	top('Narių šalinimas');
    $kas = post($_POST['kas']);

	$info2 = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM user WHERE nick='".$kas."'"));
if($info['vadas'] != $nick && $info['pavadotuojas'] != $nick)echo"<div class='meniuc'>Tu nesi šios komandos vadas</div>";
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc>Tokios komandos nėra</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='".$kas."'")) == false){echo"<div class='meniuc>Tokio vartotojo nėra</div>";}
	elseif($info2['team'] !== $ka){echo"<div class='meniuc'>Šis žaidėjas ne tavo komandoje</div>";}
	elseif($kas == $nick){echo"<div class='meniuc'>Savęs išmesti negalite</div>";}
	else{
		echo"<div class='meniuc'>Atlikta, <b>$kas</b> išmestas iš tavo komandos</div>";
		mysqli_query($conn,"UPDATE user SET team='',win_in_team='0',kiek_paaukojo_i_team='0' WHERE nick='$kas'");
	}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Narių šalinimas");
navigacija($g_n);
}
if($id == 'kviesti'){
top('Žaidėju pakvietimas');
	$info2 = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM user WHERE nick='".$kas."'"));
if($info['vadas'] != $nick && $info['pavadotuojas'] != $nick)echo"<div class='meniuc'>Tu nesi šios komandos vadas</div>";
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc>Tokios komandos nėra</div>";}
	else{
		echo"<div class='meniuc'>Ką kviesi į komandą:<br>
		<form action='komanda.php?id=kvieciu&ka=$ka' method='post'>
		<input name='kas' maxlenght='50' type='text' value='$wh'><br>
		<input type='submit' value='Kviesti'>
		</form></div>";
	}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Žaidėjų pakvietimas");
navigacija($g_n);
}
if($id == 'kvieciu'){
	top('Žaidėjų pakvietimas');
	$kas = post($_POST['kas']);

	
	$info2 = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM user WHERE nick='".$kas."'"));
	if($info['vadas'] != $nick && $info['pavadotuojas'] != $nick)echo"<div class='meniuc'>Tu nesi šios komandos vadas</div>";
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['pavadinimas']."'")) == false){echo"<div class='meniuc>Tokios komandos nėra</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='".$kas."'")) == false){echo"<div class='meniuc'>Tokio vartotojo nėra</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kvietimai_i_komanda WHERE nick2='$kas'")) == TRUE){echo"<div class='meniuc'>Šiam žaidėjui jau išsiųstas pakvietimas</div>";}
	elseif($kas == $nick){echo"<div clas='meniuc'>Savęs kviesti negalima</div>";}
	elseif(!empty($info2['team'])){echo"<div class='meniuc'><b>$kas</b> žaidėjas jau yra komandoje</div>";}
	elseif(empty($kas)){echo"<div class='meniuc'>Neįrašei ką kvieti</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user WHERE team='$ka'")) >=$info['max']){
		echo"<div class='meniuc'>Narių gali būti tik <b>5</b>!</div>";
	}
	else{
		echo"<div class='meniuc'><b>$kas</b> išsiųstas pakvietimas įstoti į <b>$ka</b> komandą. Laukite atsakymo</div>";
		mysqli_query($conn,"INSERT INTO kvietimai_i_komanda SET kas='$nick', nick2='$kas',team='$ka'");
	}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Žaidėjų pakvietimas");
navigacija($g_n);
}
if($id == 'priimti'){
	top('Narių priemimas');
	$infa = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM kvietimai_i_komanda WHERE nick2='$nick'"));

	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kvietimai_i_komanda WHERE nick2='$nick'")) == false){echo"<div class='meniuc'>Tavęs nieks nekviečia į komandą</div>";}
	elseif($ka != $infa['team']){echo"<div class='meniuc'>Tavęs ši komanda nekviečia</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$infa['team']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif(!empty($user['team'])){echo"<div class='meniuc'>Tu jau esi komandoje</div>";}
	else{
		echo"<div class='meniuc'>Atlikta,įstojai į ".$infa['team']." komandą</div>";
		mysqli_query($conn,"UPDATE user SET team='".$infa['team']."',iki_algos='2000' WHERE nick='$nick'");
		mysqli_query($conn,"DELETE FROM kvietimai_i_komanda WHERE nick2='$nick'") or die(mysqli_error());
		}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Narių priėmimas");
navigacija($g_n);
}
if($id == 'atmesti'){
top('Narių kvietimų atšaukimas');
	$info = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM kvietimai_i_komanda WHERE nick2='$nick'"));
	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kvietimai_i_komanda WHERE nick2='$nick'")) == FALSE){echo"<div class='meniuc'>Tavęs nieks nekviečia į komandą</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$info['team']."'")) == false){echo"<div class='meniuc'>Tokios komandos nėra</div>";}
	elseif(!empty($user['team'])){echo"<div class='meniuc'>Tu jau esi komandoje</div>";}
	else{
		echo"<div class='meniuc'><b>Atmetei</b></div>";
		mysqli_query($conn,"DELETE FROM kvietimai_i_komanda WHERE nick2='$nick'") or die(mysqli_error());
	}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Narių kvietimų atšaukimas");
navigacija($g_n);
}

if($id == 'priimti_kv'){
	top('Narių priemimas');
$mano_team = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM team WHERE vadas='$nick'"));
$kvietimas_i_komanda = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM prasosi_i_komanda WHERE komanda='$mano_team[pavadinimas]'"));

	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM prasosi_i_komanda WHERE nick='$kvietimas_i_komanda[nick]'")) == false)
	{echo"<div class='meniuc'>Šis žaidėjas nesiprašo į jūsų komanda</div>";}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user WHERE team='$mano_team[pavadinimas]'")) >=$mano_team['max']){
		echo"<div class='meniuc'>Narių gali būti tik ".$mano_team['max']."</div>";
	}
else{
		echo"<div class='meniuc'>Priiemei sėkmingai</div>";
		mysqli_query($conn,"UPDATE user SET team='".$kvietimas_i_komanda['komanda']."',iki_algos='2000' WHERE nick='$kvietimas_i_komanda[nick]'");
		mysqli_query($conn,"DELETE FROM prasosi_i_komanda WHERE nick='$kvietimas_i_komanda[nick]'") or die(mysqli_error());
		 mysqli_query($conn,"INSERT INTO pm SET what='SUPPORT', txt='Jus priimtas į $kvietimas_i_komanda[komanda] komandą', gavejas='$kvietimas_i_komanda[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
		}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Narių priėmimas");
navigacija($g_n);
}

if($id == 'atmesti_kv'){
	top('Narių priemimas');
$mano_team = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM team WHERE vadas='$nick'"));
$kvietimas_i_komanda = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM prasosi_i_komanda WHERE komanda='$mano_team[pavadinimas]'"));

	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM prasosi_i_komanda WHERE nick='$kvietimas_i_komanda[nick]'")) == false)
	{echo"<div class='meniuc'>Šis žaidėjas nesiprašo į jūsų komanda</div>";}
	
else{
		echo"<div class='meniuc'>Atmesta sėkmingai</div>";
	 mysqli_query($conn,"INSERT INTO pm SET what='SUPPORT', txt='Jus prašimasis į $kvietimas_i_komanda['komanda'] komandą, atmestas', gavejas='$kvietimas_i_komanda[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
		mysqli_query($conn,"DELETE FROM prasosi_i_komanda WHERE nick='$kvietimas_i_komanda[nick]'") or die(mysqli_error());
		}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Narių priėmimas");
navigacija($g_n);
}

if($id == 'dtop'){
	top('Komandų dienos topas');
echo'<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
	echo"<div class='meniuc'>
	 Kiekvieną dieną visos komandos varžosi kuri daugiau laimės kovų, laimės ta komanda kuri laimės daugiausia kovų per dieną.</div>
<div class='meniuc'>
	<small><b>Pirma vieta į iždą gaus 100,000,000 $pinigaii, 50 $eurui, <img src='img/teammedal/1.png' width='16' height='16'></b></small><br>	<small><b>Antra vieta į iždą gaus 50,000,000 $pinigaii, 30 $eurui, <img src='img/teammedal/3.png' width='16' height='16'></b></small><br>	<small><b>Trečia vieta į iždą gaus 30,000,000 $pinigaii, 15 $eurui, <img src='img/teammedal/4.png' width='16' height='16'></b></small></div><div class='meniuc'><small><s><b>Komanda</b></s> - reiškias, kad šią dieną nedalyvauja varžybose!</small></div>

	<div class='up'>
	<b>TOP 5 Komandos</b>:<br></div>";
	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM komandu_dtop")) == false){
		
			echo"<div class='meniuc'>Dar niekas nekovojo</div>";
		
	}else{
		

 $query = mysqli_query($conn,"SELECT * FROM komandu_dtop ORDER BY laimejo_kovu DESC LIMIT 5");
    echo '<div class="meniu">';
    while($row = mysqli_fetch_assoc($query)){
        $vt++;
		  if($row['team'] == $nust['last2']){$last2_team = '<s>'.$row['team'].'</s>'; }
                           else {$last2_team = ''.$row['team'].''; }
        echo ' <b>'.$vt.'</b>.<a href="?id=info&ka='.$row['team'].'"><b>'.$last2_team.'</b></a>  --    <b>'.sk($row['laimejo_kovu']).' Laimėjo kovų</b><br>';

}
}
echo'</div>';

 echo '<div class="up"> <b>Vakar laimėjo:</b>:</div><div class="line"></div>';
	
	
   


	 
    $query = mysqli_query($conn,"SELECT * FROM komandos_dtop_log ORDER BY laimejo DESC LIMIT 1");
    echo '<div class="meniuc">';
    while($row = mysqli_fetch_assoc($query)){
       
       echo' <b><img src="img/teammedal/1.png" width="16" height="16"> '.$row['pavadinimas'].'</b><small> [<b>'.$row['laimejo'].'</b> kovų]</small>
<br/>' ;

}
echo'</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Komandų dienos topas");
navigacija($g_n);
}
if($id == 'sdtop'){
	top('Komandų Savaitės topas');
echo'<div class="meniuc">
	<img src="img/imgg/komandos.png"></div>';
	echo"<div class='meniuc'>
	 Kiekvieną savaitę visos komandos varžosi kuri daugiau padarys  kovų, laimės ta<b> komanda </b> kuri padarys daugiausia kovų per <b>savaitę</b>!</div>
<div class='meniuc'>
		<small><b>Pirma vieta į iždą gaus 200,000,000 $pinigaii, 100 $eurui, <img src='img/teammedal/2.png' width='16' height='16'></b></small></div>
<div class='meniuc'><small>	<s><b>Komanda</b></s> - reiškias, kad šią dieną nedalyvauja varžybose!</small></div>";
echo '<div class="meniuc"><small>Komandos Savaitės kovų TOP baigsis: <b>'.laikas($nust['kom_sav_liko']-time(), 1).'</b></small></div>';
echo"
	<div class='up'>
	<b>TOP 5 Komandos</b>:<br></div>";
	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM komandu_sav_dtop")) == false){
		
			echo"<div class='meniuc'>Dar niekas nepadarė kovų.</div>";
		
	}else{
		$query = mysqli_query($conn,"SELECT * FROM komandu_sav_dtop ORDER BY laimejo_kovu DESC LIMIT 5");
    echo '<div class="meniu">';
    while($row = mysqli_fetch_assoc($query)){
        $vt++;
		  if($row['team'] == $nust['last3']){$last3_team = '<s>'.$row['team'].'</s>'; }
                           else {$last3_team = ''.$row['team'].''; }
        echo ' <b>'.$vt.'</b>.<a href="?id=info&ka='.$row['team'].'"><b>'.$last3_team.'</b></a>  --    <b>'.sk($row['laimejo_kovu']).' Laimėjo kovų</b><br>';

}
}
echo'</div>';

 echo '<div class="up"> <b>Praeitą savaitę laimėjo:</b>:</div><div class="line"></div>';
	
	
   


	 
    $query = mysqli_query($conn,"SELECT * FROM komandos_sav_log ORDER BY laimejo DESC LIMIT 1");
    echo '<div class="meniuc">';
    while($row = mysqli_fetch_assoc($query)){
       
       echo' <b><img src="img/teammedal/2.png" width="16" height="16"> '.$row['pavadinimas'].'</b><small> [<b>'.$row['laimejo'].'</b> kovų]</small>
<br/>' ;

}
echo'</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Komandų Savaitės Topas");
navigacija($g_n);
}


if($id =='prasytis'){
top('Prašymasis į komanda');	
if(!empty($user['team'])){
	echo'<div class="meniuv">Tu jau turi komanda!</div>';
}	elseif (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM prasosi_i_komanda WHERE nick='$nick'")) == true) {
	echo'<div class="meniuc">Tu jau esi išsiuntęs prašymą į komandą!</div>';
}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user WHERE team='$co'")) >=$in['max']){
		echo"<div class='meniuc'><b>$co</b> komandoje telpa tik <b> ".$in['max']."</b> narių!</div>";
	}
else{
	mysqli_query($conn,"INSERT INTO prasosi_i_komanda SET nick='$nick', komanda='$co'");
		echo'<div class="meniuc">Sėkmingai išsiuntei prašymą į <b>'.$co.'</b> komandą!</div>';
	
	
	
}




	
	
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","komanda.php","Komandos","komanda.php?id=info&ka=$ka"," $ka komanda", "Prašymasis i komanda");
navigacija($g_n);
}



        if($id == "pavsut"){
        top('komandos pavaduotojo davimas');
		if($info['vadas'] !== $nick){echo"<div class='meniuc'>Tu neesi šios komandos vadas</div>";}
        if(isset($_POST['submit'])){
        $kam = post($_POST['kam']);
        $kaa = post($_POST['kaa']);
            if(empty($kam) or empty($kaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį.</div>';
            }
	if($kam == $nick){
	echo '<div class="meniuc">Sau dėti negalima!</div>';}
					  
            elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$kam'")) == 0){
			echo '<div class="meniuc">Toks žaidėjas neegzistuoja!</div>';}
					elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user WHERE team='".$kam."'")) == false){
						echo"<div class='meniuc'>Šis žaidejas nėra komandos narys</div>";}
	
            
            else{
                if($kaa == 1){
                    mysqli_query($conn,"UPDATE team SET pavadotuojas='$kam' WHERE pavadinimas='$ka' ");
                    $txt = "$nick Suteike komados pavaduotojo statusą.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Suteikiai '.$kam.' komandos pavaduotojo statusą.</div>';
                
				                }
                elseif($kaa == 2){
					mysqli_query($conn,"UPDATE team SET pavadotuojas='' WHERE pavadinimas='$ka' ");
                    $txt = "$nick Nuėme tavo komandos pavaduotojo statusą.";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$kam' ");
                    echo '<div class="meniuc">Atlikta! Nuėmei '.$kam.' komandos pavaduotojo statusą.</div>';
                }

            }
        }
        echo '<div class="meniu">
        <form action="?id=pavsut&ka='.$user['team'].'" method="post"/>
        Kam(komandos pavaduotojo statusą):<br /><input type="text" name="kam"><br />
        Pasirinkitę:<br/><select name="kaa">
        <option value="1">1. Duoti </option>
        <option value="2">2. Nuimti</option>
        </select><br/>
        <input type="submit" name="submit" value="Atlikti"/></form>
        </div>';

    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","meniu.php","Mano menių","Mod davimas");
	navigacija($g_n);    
        }

 foot();
?>
