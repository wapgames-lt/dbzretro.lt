<?php
ob_start();
include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();
topbar();
$sajanas =mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM legendinis_sajanas"));
switch ($id) {
default: 
$kodas = rand(11111,99999);
$_SESSION[kodas] = $kodas;
top('Cumber');
	echo'<div class="meniuc"><img src="img/gif/cumber.gif" height="100" width="200"><br/>
	Cumber yra labai stiprus, jis turi mistinių sugebėjimų, todėl būk atsargus! Nukovę igausite naujų jėgų, prizą laimės žaidėjas ikirtes didžiausią smugį.
	
	</div>
	
	<div class="meniu">
	<img src="img/hp.png"> Gyvybės : '.$sajanas[hp].'/'.$sajanas[hp_max].'<br/>
	<img src="img/str.png"> Puolimas : Priešui nuima iki <b>20</b>% gyvybių<br/>
	<img src="img/deff.png"> Gynyba : Atlaiko priešo smugį iki <b>100</b>%<br/>
	
	
	
	</div>
	<div class="meniu">';
	if($sajanas[prisikels]-time() > 0){echo'Cumber nukautas !!</b>';}	else{
echo'	
	'.$ico.' <a href="?id=go&ID='.$kodas.'">Pulti Cumber</a>';}
echo'	</div>
	';
	
	
	
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","Cumber");
navigacija($g_n);		
		
		break;
case'go':
top('Cumber');
		echo'<div class="meniuc"><img src="img/veikejai/Cumber-1.png"></div>';
if($ID != $_SESSION[kodas]){echo'<div class="meniuc">Perkrovinėti puslapį draudžiama</div>';}
elseif($apie[gyvybes] < 1){echo'<div class="meniuc">Jums nepakanka gyvynių</div>';}	
elseif($_SESSION[stime]-time() > 0){echo'<div class="meniuc">Per greit kovoji. kovoti galėsi už <b>'.laikas($_SESSION[stime]-time(),1).'</b></div>';}	
elseif($sajanas[prisikels]-time() > 0){echo'<div class="meniuc">Cumber nukautas !!</b></div>';}	

else{
	$_SESSION[kodas] = rand(11111,99999);
$inirsis = rand(1,20);
$smugis = rand(1000,5000);
if($inirsis == 7 ||$inirsis==18){$sajano_smugis=$apie[gyvybes]; $inirsis = 'Sajanas iniršo, smogė panaudojas kamėhamės smugį, ir nuemė jums visas gyvybes';}
else{$sajano_smugis = rand($apie[gyvybes]/20,$apie[gyvybes]/7); $inirsis = NULL;}	
$left =$sajanas[hp]-$smugis;
$leftu = $apie[gyvybes]-$sajano_smugis;
echo'<div class="meniu">
'.$ico.' Jūs ikirtote : <b>'.$smugis.'</b><br/>
'.$ico.' Cumber liko : <b>'.$left.'</b><br/>
'.$ico.' '.(isset($inirsis) ?  ($inirsis) :'Tau ikirto : <b>'.($sajano_smugis).'').'</b><br/>
'.$ico.' Tau liko: <b>'.$leftu.'</b><br/>
</div>';
echo'<div class="meniuc"><a href="?id=go&ID='.$_SESSION[kodas].'">Pulti vėl</a></div>';
mysqli_query($conn,"UPDATE legendinis_sajanas SET hp='$left'");
$_SESSION[stime] = time()+2;
mysqli_query($conn,"UPDATE zaidejai SET gyvybes='$leftu' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE user SET smoge_sjn=smoge_sjn+'1' WHERE nick='$nick'");
if($smugis > $user[sjn]){
mysqli_query($conn,"UPDATE user SET sjn='$smugis' WHERE nick='$nick'");
	
}
if($left < 1){
$jegaaaa = round($apie[jega]*20/100);
$gynybaaaa = round($apie[gynyba]*20/100);
			mysqli_query($conn,"UPDATE zaidejai SET jega=jega+'$jegaaaa',gynyba=gynyba+'$gynybaaaa',botas=botas+'100',sms_litai=sms_litai+'1500',vipticket=vipticket+'1000000000' WHERE nick='$row[nick]'");
mysqli_query($conn,"UPDATE legendinis_sajanas SET nukirto ='$nick'");
$q = mysqli_query($conn,"SELECT * FROM user ORDER BY sjn DESC LIMIT 1");
	while($row = mysqli_fetch_assoc($q)){
	$zi++;	
		if($zi==1){
			$jegaaaa = round($apie[jega]*5/100);
			$gynybaaaa = round($apie[gynyba]*5/100);
			mysqli_query($conn,"UPDATE zaidejai SET jega=jega+'$jegaaaa',gynyba=gynyba+'$gynybaaaa',botas=botas+'5',sms_litai=sms_litai+'700',vipticket=vipticket+'1000000' WHERE nick='$row[nick]'");
			
			  mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Jūs ikirtote didžiausią smūgį cumber, gaunate 5 % jėgos ir 15% gynybos, 700 euru, 5 vegeta cash, 1000000 vipticket', gavejas='$row[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
		}
	
	}
	
UNset($q);
$qq = mysqli_query($conn,"SELECT * FROM user ORDER BY smoge_sjn DESC LIMIT 1");
	while($rowas = mysqli_fetch_assoc($qq)){
	$z++;	
		if($z==1){
				$jegaaaa = round($apie[jega]*5/100);
			$gynybaaaa = round($apie[gynyba]*5/100);					
							
	mysqli_query($conn,"UPDATE zaidejai SET jega=jega+'$jegaaaa',gynyba=gynyba+'$gynybaaaa',botas=botas+'100',sms_litai=sms_litai+'10000',vipticket=vipticket+'10000' WHERE nick='$row[nick]'");

		}}
	unset($qq)	;
	$pr = time() +3600 * rand(10,24)*rand(2,4);
	mysqli_query($conn,"UPDATE legendinis_sajanas SET hp='$sajanas[hp_max]',prisikels='$pr'");
			
}
mysqli_query($conn,"UPDATE user SET sjn='0', smoge_sjn='0'");


}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","cumber.php","Cumber","Kova");
navigacija($g_n);	
break;
}
foot();
?>
