<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();

topbar();
	if($id == "didinti_sms2"){
    online('Didina SMS prizą');
    top('Sms topo didinimas');
	
    if(isset($_POST['submit'])){
        $kieks = isset($_POST['kieks']) ? preg_replace("/[^0-9]/","",$_POST['kieks'])  : null;
        
        if($kieks < 1){

            $klaida = "Mažiausia suma 1 $vipt ";
        }
        if($apie[vipticket] < $kieks){
            $klaida = "Neturi tiek $vipt ";
        }
        if(empty($kieks)){
            $klaida = "Palikai tuščia laukelį.";
        }

        if($klaida != ""){
echo '  <div class="meniuc">
       
        	<img src="img/bicons/sms2.png"></div>';
            echo '<div class="meniuc">'.$klaida.'</div>';
        } else {
            mysqli_query($conn,"UPDATE nustatymai SET sms_priz2=sms_priz2+'$kieks' ");
            mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket-'$kieks' WHERE nick='$nick' ");
echo '  <div class="meniuc">
       
        	<img src="img/bicons/sms2.png"></div>';
            echo '<div class="meniuc">SMS prizą padidinai <b>'.sk($kieks).'</b> '.$vipt.' </div>';
        }
    } 
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pagrindinis.php?id=sms_top", "SMS topas", "SMS topo prizo didinimas");
	navigacija($g_n);
}
    if($id == "didinti_sms"){
    online('Didina SMS prizą');
    top('Sms topo didinimas');
echo '  <div class="meniuc">
       
        	<img src="img/bicons/sms2.png"></div>';
    echo '<div class="meniuc">
    <form action="?id=didinti_sms2" method="post">
    Kiek didinsi prizą:<br/><input type="text" name="kieks"><br/>
    <input type="submit" name="submit" value="Didinti">
    </form></div>';
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pagrindinis.php?id=sms_top", "SMS topas", "SMS topo prizo didinimas");
	navigacija($g_n);
	
}
	if($id == ""){
    online('Sms  tope');
		top("Dienos SMS topas");
   echo '  <div class="meniuc">
       
        	<img src="img/bicons/sms2.png"></div>';
    echo '<div class="meniuc">Šiandien visi varžosi dėl <b>'.sk($nust['sms_priz']).'</b>'.$eurui.' ir  <b>'.sk($nust['sms_priz2']).'</b>'.$vipt.'</div>';
    
    
  
    echo '<div class="title">
    '.$ico.' <a href="?id=didinti_sms">Didinti SMS prizą</a><br />
    </div>
    <div class="title">
    &raquo; SMS topas baigiasi lygiai <b>00:00</b> , tada visi jūsų sms anuliuojasi ir vėl galėsite varžytis dėl prizo.<br /></div>
    <div class="up"><b>Šiandien į topą pretenduoja:</b> </div>';
	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM sms_top"))== false){
		  echo '<div class="meniuc"><font color="red"><b>Dar niekas nepateko į TOP!</b></font>';
		
		
	}else{
     $query = mysqli_query($conn,"SELECT * FROM sms_top ORDER BY sms DESC LIMIT 3");
    echo '<div class="meniu">';
    while($rowas = mysqli_fetch_assoc($query)){
        $vt++;
        echo ' <b>'.$vt.'</b>. <a href="pagrindinis.php?id=apie&ka='.$rowas['nick'].'">'.statusas($rowas['nick']).'</a> Šiandien Išsiuntė   už <font color="red"><b>'.$rowas['sms'].'</b></font>'.$eurui.'<br />';
  
        	
        
}}

    echo '</div>';
 echo '<div class="up"> <b>Paskutinis laimėtojas</b>:</div>';
	
	
   


	 
    $query = mysqli_query($conn,"SELECT * FROM smstop_log ORDER BY id DESC LIMIT 1");
    echo '<div class="meniuc">';
    while($row = mysqli_fetch_assoc($query)){
       
       echo'Laimėjo <b>'.$row['nick'].'</b> gavo <b>'.$row['laimejo'].'</b>'.$eurui.' ,  <b>'.$row['laimejo2'].'</b>'.$vipt.' ir <b>'.$row['laimejo3'].'</b>'.$botas.'[<small><b>'.laikas($row['laikas']).' </b></small>]<br/>' ;

}
    echo '</div>';
    
	
    
    
    
    
   
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Dienos SMS topas");
	navigacija($g_n);
    
	
}

foot();
