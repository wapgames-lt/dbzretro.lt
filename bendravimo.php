<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();

topbar();
	if($id == "didinti_bendravimo2"){
    online('Didina Bendravimo prizą');
    top('Bendravimo  topo didinimas');
	
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
       
        	<img src="img/bicons/bendravimo.png"></div>';
            echo '<div class="meniuc">'.$klaida.'</div>';
        } else {
            mysql_query("UPDATE nustatymai SET bendravimo_priz2=bendravimo_priz2+'$kieks' ");
            mysql_query("UPDATE zaidejai SET vipticket=vipticket-'$kieks' WHERE nick='$nick' ");
echo '  <div class="meniuc">
       
        	<img src="img/bicons/sms2.png"></div>';
            echo '<div class="meniuc">Bendravimo TOP prizą padidinai <b>'.sk($kieks).'</b> '.$vipt.' </div>';
        }
    } 
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","bendravimo.php?id=", "Bendravimo topas", "Bendravimo topo prizo didinimas");
	navigacija($g_n);
}
    if($id == "didinti_bendravimo"){
    online('Didina Bendravimo TOP prizą');
    top('Bendravimo topo didinimas');
echo '  <div class="meniuc">
       
        	<img src="img/bicons/bendravimo.png"></div>';
    echo '<div class="meniuc">
    <form action="?id=didinti_bendravimo2" method="post">
    Kiek didinsi prizą:<br/><input type="text" name="kieks"><br/>
    <input type="submit" name="submit" value="Didinti">
    </form></div>';
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","bendravimo.php?id", "Bendravimo opas", "Bendravimo topo prizo didinimas");
	navigacija($g_n);
	
}
	if($id == ""){
    online('Bendravimo  tope');
		top("Dienos Bendravimo topas");
   echo '  <div class="meniuc">
       
        	<img src="img/bicons/bendravimo.png"></div>';
    echo '<div class="meniuc">Šiandien visi varžosi dėl <b>'.sk($nust['bendravimo_priz']).'</b>'.$eurui.' ir <b>'.sk($nust['bendravimo_priz2']).'</b>'.$vipt.'</div>';
    
    
  
    echo '<div class="title">
    '.$ico.' <a href="?id=didinti_bendravimo">Didinti Bendravimo prizą</a><br />
    </div>
    <div class="title">
    &raquo; Bendravimo topas baigiasi lygiai <b>00:00</b> , tada visi jūsų taškai anuliuojasi ir vėl galėsite varžytis dėl prizo.<br /></div>
    <div class="up"><b>Šiandien į topą pretenduoja:</b> </div>';
	if(mysql_num_rows(mysql_query("SELECT * FROM bendravimo_top"))== false){
		  echo '<div class="meniuc"><font color="red"><b>Dar niekas šiandien nebendravo!</b></font>';
		
		
	}else{
     $query = mysql_query("SELECT * FROM bendravimo_top WHERE  nick != 'Jomajo' ORDER BY sms DESC LIMIT 10");
    echo '<div class="meniu">';
    while($rowas = mysql_fetch_assoc($query)){
        $vt++;
        echo ' <b>'.$vt.'</b>. <a href="pagrindinis.php?id=apie&ka='.$rowas['nick'].'">'.statusas($rowas['nick']).'</a> Šiandien turi   bendravimo taškų <font color="red"><b>'.$rowas['sms'].'</b></font><img src="img/bicons/sms.png"><br />';
  
        	
        
}}

    echo '</div>';
 echo '<div class="up"> <b>Paskutinis laimėtojas</b>:</div>';
	
	
   


	 
    $query = mysql_query("SELECT * FROM bendravimo_log ORDER BY id DESC LIMIT 1");
    echo '<div class="meniuc">';
    while($row = mysql_fetch_assoc($query)){
       
       echo'Laimėjo <b>'.$row['nick'].'</b> gavo <b>'.$row['laimejo'].'</b>'.$eurui.'  ir '.$row['laimejo2'].' '.$vipt.' [<small><b>'.laikas($row['laikas']).' </b></small>]<br/>' ;

}
    echo '</div>';
    
	
    
    
    
    
   
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Dienos Bendravimo topas");
	navigacija($g_n);
    
	
}

foot();
