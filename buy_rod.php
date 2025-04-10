<?
require_once '../core/system.php';
$header = 'Покупка удочки';
$req = mysqli_query($conn,"SELECT * from `ban` where `id_us` = '".$user['id']."'  and `time`>'".$_SERVER['REQUEST_TIME']."'");
$ban = mysqli_fetch_array($req);
if($ban['ban'] == 3){
header('Location: /moduls/ban');
}
if($ban['ban'] == 2){
header('Location: /');
$_SESSION['err'] = "Вы находитесь в бане!";
exit;
}
if(!isset($user['id'])) 
header('Location: /');
require_once '../core/head.php';
 



	$rod = array ('Простая Удочка','Необычная Удочка','Редкая Удочка','Элитная Удочка');


	$pic = array (0,50000,250000,500000); // цена на починку


	$rem = array (0,2000,5000,10000); // износ удочек

  if (isset($_SESSION['we'])){?><?=$_SESSION['we']?><?   $_SESSION['we']=NULL; }





$fish = mysqli_query($conn,'SELECT * FROM `fish` WHERE `user` = "'.$user['id'].'"');
$fish = mysqli_fetch_array($fish);
if(!$fish) {
mysqli_query($conn,'INSERT INTO `fish` (`user`) VALUES ("'.$user['id'].'")');
header('location:index.php');
exit;

}


$bs = $rem[$fish['udo4ka']];

$bsg = 100*$pic[$fish['udo4ka']];
if(isset($_GET['rem'])){


if($fish['level']<5){  
header('location:buy_rod.php');
exit; 
}

if($user['gold']< 100*$pic[$fish['udo4ka']]){ 
$_SESSION['we']='<center><font color=red>Недостаточно Золота</font></center>';  
header('location:buy_rod.php');
exit; 
}


mysqli_query($conn,'UPDATE `fish` SET `iznos`='.$bs.' WHERE `user` = "'.$user['id'].'"');
mysqli_query($conn,'UPDATE `user` SET `gold` = `gold` - '.$bsg.' WHERE `id` = "'.$user['id'].'"');
$_SESSION['we']='<center><font color=green>Удочка успешно починена!</font></center>'; header('location:buy_rod.php');exit;

}
if(isset($_GET['buy']) and !empty($_GET['id'])){

$vib = $_GET['id'];


$_SESSION['notic']=''.$vib.'';


if($vib==1){ 
$udo4ka=1; 
$iznos=20; 
$gold=10000; 
}

elseif($vib==2){ 
$udo4ka=2; 
$iznos=50; 
$gold=50000;
}
elseif($vib==3){ 
$udo4ka=3; 
$iznos=100; 
$gold=100000; 
}

else{ header('location:fish.php');
exit;
}


if($user['gold']<$gold){ 
$_SESSION['we']='Недостаточно Золота!';
header('location:buy_rod.php');
exit;
}


mysqli_query($conn,'UPDATE `fish` SET `udo4ka` ='.$udo4ka.',`iznos`='.$iznos.' WHERE `user` = "'.$user['id'].'"');
mysqli_query($conn,'UPDATE `user` SET `gold` = `gold` - '.$gold.' WHERE `id` = "'.$user['id'].'"');
$_SESSION['notic']='<center><font color=green>Вы купили новую удочку!</font></center>';
header('location:index.php');
exit;





}
?><div class='line'></div><div class='content'> 
  <table cellpadding='0' cellspacing='0'><tr><td><img src='/fish/ud/0.jpg' alt='*'/></td> 

  <td valign='top' style='padding-left: 5px;'>Простая Удочка</a><br/> 



  <font color='#60c030'><b>Эффекты:</b></font> <font color='#30c030'>Нет</font></td> 



  </tr></table> 
  <br/> 
 

</div> <?
?><div class='line'></div><div class='content'> 
  <table cellpadding='0' cellspacing='0'><tr><td><img src='/fish/ud/1.jpg' alt='*'/></td> 


  <td valign='top' style='padding-left: 5px;'>Хорошая Удочка</a><br/> 



<font color='#60c030'><b>Эффекты:</b></font> <font color='#30c030'>Шанс Улова +5% Награда за улов Х2, Износ: 20</font></td> 



  </tr></table> 
  <br/> 
  <div align='center'><a href='buy_rod.php?id=1&amp;buy' class='button'>Купить за <img src='/images/icon/gold.png' alt='*'/> 100 золота</a></div> 




</div> <? 
?><div class='line'></div><div class='content'> 
  <table cellpadding='0' cellspacing='0'><tr><td><img src='/fish/ud/2.jpg' alt='*'/></td> 


  <td valign='top' style='padding-left: 5px;'>Редкая Удочка</a><br/> 



<font color='#60c030'><b>Эффекты:</b></font> <font color='#30c030'>Шанс Улова +10% Награда за улов Х3, Износ: 50</font></td> 



  </tr></table> 
  <br/> 
  <div align='center'><a href='buy_rod.php?id=2&amp;buy' class='button'>Купить за <img src='/images/icon/gold.png' alt='*'/> 500 золота</a></div> 



</div> <?  
?><div class='line'></div><div class='content'> 
  <table cellpadding='0' cellspacing='0'><tr><td><img src='/fish/ud/3.jpg' alt='*'/></td> 


  <td valign='top' style='padding-left: 5px;'>Элитная Удочка</a><br/> 



<font color='#60c030'><b>Эффекты:</b></font> <font color='#30c030'>Шанс Улова +20% Награда за улов Х4, Износ: 100</font></td> 



  </tr></table> 
  <br/> 
  <div align='center'><a href='buy_rod.php?id=3&amp;buy' class='button'>Купить за <img src='/images/icon/gold.png' alt='*'/> 1000 золота</a></div> 


</div> <?   
if($fish['level']>=5 and $fish['iznos']<10){ 
?><div class='line'></div><div class='content'> 
<center><font color=green>Ваша Удочка</font></center> <table cellpadding='0' cellspacing='0'><tr><td><img src='/fish/ud/<?=$fish['udo4ka']?>.jpg' alt='*'/></td> 



  <td valign='top' style='padding-left: 5px;'><?=$rod[$fish['udo4ka']]?></a><br/> 




<font color='#60c030'><b>Износ:</b></font> <font color='#30c030'><?=$fish['iznos']?></font></td> 




  </tr></table> 
  <br/> 
  <div align='center'><a href='buy_rod.php?rem' class='button'>Починить за <img src='/images/icon/gold.png' alt='*'/> <?=$pic[$fish['udo4ka']]?> золота</a></div> 



</div> <? 
}
include_once '../core/foot.php';
