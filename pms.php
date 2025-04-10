<?php
ob_start();

echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
 $kam=$_GET['kam'];
head2();
echo'
<div class="up">
<img src="img/baneriai/botasm.png" /></div>';

topbar();

if($id == ""){
   online('Žiūri Gautas žinutęs');
	top("Gautos žinutės");
	  mysqli_query($conn,"UPDATE pm SET nauj='OLD' WHERE gavejas='$nick' AND what ='SUPPORT' ");
   echo'<div class="meniu">';
    $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM pm WHERE gavejas='$nick'"))[0];
    if($viso > 0){
    $rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
     $query = mysqli_query($conn,"SELECT * FROM pms WHERE gavejas='$nick' ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas")or die(mysqli_error());
     $puslapiu = ceil($viso/$rezultatu_rodymas);
     while($row = mysqli_fetch_assoc($query)){
     

   if($row['nauj'] == "NEW"){
       $kl = '<font color="red">';
	   $kls = '</font>';
   } else {
       $kl = '<font color="black">';
	   $kls = '</font>';
   }
   echo '» <a href="pagrindinis.php?id=apie&ka='.$row['what'].'"><b>'.statusas($row['what']).'</b></a> -'.$kl.' '.$row['txt'].''.$kls.' [<a href="pms.php?id=gautos_all&ID='.$row['what'].'"><small>Atsakyti</small></a>]<br/>
   <small>&raquo; '.laikas($row['time']).'</small>';
   unset($row);

 
}
	 echo'</div><div class="line"></div>';
   echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=gautos_all').'</div>';
   } else {
   echo 'Gautų žinučių nėra.</div>';
   }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pms.php", "Pm dežutė",  "Gautos žinutės");
	navigacija($g_n);
    
  
    
}

elseif($id == "gautos_all"){
   online('Žiūri Gautas žinutęs');
	top("Gautos žinutės");
	  mysqli_query($conn,"UPDATE pm SET nauj='OLD' WHERE gavejas='$nick' AND what ='SUPPORT' ");
   echo'<div class="meniu">';
    $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM pms WHERE gavejas='$nick' AND what='$ID'"))[0];
    if($viso > 0){
    $rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
     $query = mysqli_query($conn,"SELECT * FROM pms WHERE gavejas='$nick' AND what='$ID' ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas")or die(mysqli_error());
     $puslapiu = ceil($viso/$rezultatu_rodymas);
     while($row = mysqli_fetch_assoc($query)){
     	if($row['nauj'] == 'send'){
     	 echo '<div class="send">';		
		 echo '» <a href="pagrindinis.php?id=apie&ka='.$row['what'].'"><b>'.statusas($row['what']).'</b></a> -'.$kl.' '.$row['txt'].''.$kls.' </a><br/>
   <small>&raquo; '.laikas($row['time']).'</small></div>';		
     		
     	}else{
   echo '<div class="got">';
   if($row['nauj'] == "NEW"){
       $kl = '<font color="red">';
	   $kls = '</font>';
   } else {
       $kl = '<font color="black">';
	   $kls = '</font>';
   }
   echo '» <a href="pagrindinis.php?id=apie&ka='.$row['what'].'"><b>'.statusas($row['what']).'</b></a> -'.$kl.' '.$row['txt'].''.$kls.' [<a href="pms.php?id=read&ID='.$row['id'].'"><small>Atsakyti</small></a>]<br/>
   <small>&raquo; '.laikas($row['time']).'</small>';
   unset($row);
   echo '</div>'; 
 
}}
	 echo'</div><div class="line"></div>';
   echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=gautos_all').'</div>';
   } else {
   echo 'Gautų žinučių nėra.</div>';
   }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pms.php", "Pm dežutė",  "Gautos žinutės");
	navigacija($g_n);
    
  
}

elseif($id == "read"){
	
$ID = isset($_GET[ID]) ? $_GET[ID] : null;
	 $pmr = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM pm WHERE id='$ID' "));
   online('Skaito Gautą žinutę');
top('Žinutė nuo '.statusas($pmr[what]).'');
  
  
      mysqli_query($conn,"UPDATE pm SET nauj='OLD' WHERE id='$ID' ");
      echo '<div class="meniu"> <b>'.statusas($pmr['what']).'</b>: '.smile($pmr['txt']).'<br/>
      '.laikas($pmr['time']).'</div>';
   if($pmr['what'] != 'SUPPORT'){
   echo '<div class="title">
   <form action="pms.php?id=write&kam='.$pmr['what'].'" method="post"/>
    Atsakymas:<br />
   <textarea name="txt" rows="3"></textarea><br />
   <input type="submit" value="Siųsti"/>
   </div>';
   }
   
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pms.php", "Pm dežutė",  "Gautos žinutės");
	navigacija($g_n);
}

elseif($id == "new"){
   online('Rašo žinutę');
	top('Žinutės kurimas');
   if(!empty($ka)) $ats = $ka; else $ats = '';
   
   echo '<div class="meniuc">
   <form action="pms.php?id=write" method="post"/>
   Žinutės gavėjas:<br /><input type="text" value="'.$ats.'" name="kam"/><br />
   Žinutės tekstas:<br />
   <textarea name="txt" rows="3"></textarea><br />
   <input type="submit" name="submit" value="Siųsti"/>
   </div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pms.php", "Pm dežutė",  "Nauja žinutė");
	navigacija($g_n);
}

elseif($id == "write"){
   online('Siunčia žinutę');
 top('Žinutės siuntimas');
   if(isset($_POST['submit'])){
      $kam = post($_POST['kam']);
 
   }
      $txt = post($_POST['txt']); 
    
      if(empty($txt) ){
          echo '<div class="meniuc">Paliktai kažkurį tuščią laukelį!</div>';
      } else {
      if($kam == $nick){
          echo '<div class="meniuc">Sau siųsti žinutės negalimą!</div>';
      } else {
      if($apie['lygis'] < 35 AND $kam != 'aNox'){
          echo '<div class="meniuc">Tavo lygis per žemas! Reikia 35 lygio.</div>';
      } else {
      if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$kam'")) == 0){
          echo '<div class="meniuc">Tokio žaidėjo nėra!</div>';
      } else {
      		if($_SESSION['pm_flood']-time() > 0){
                echo '<div class="meniuc">Anti flood '.laikas($_SESSION['pm_flood']-time() , 1).'!</div>';
			
            }else{
         
		  mysqli_query($conn,"INSERT INTO pm SET what='$nick', txt='$txt', gavejas='$kam', time='".time()."', nauj='NEW' ") or die(mysqli_error());
          mysqli_query($conn,"INSERT INTO pm SET what='$kam', txt='$txt', gavejas='$nick', time='".time()."', nauj='send' ") or die(mysqli_error());
          $_SESSION['pm_flood'] = time()+5;
		   echo '<div class="meniuc">Žinutė išsiųsta!</div>';
          echo '<div class="titlec">'.smile($txt).'</div>';
		
          }
          }
          }
          }}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pms.php", "Pm dežutė",  "Žinutės siuntimas");
	navigacija($g_n);
}
elseif($id == "delete_gautos"){
   online('Trina Gautas žinutęs');
  top('Žinučiu trinimas');
   if($co == "yes"){
       echo '<div class="meniuc">Visos žinutės ištrintos.</div>';
       mysqli_query($conn,"DELETE FROM pm WHERE gavejas='$nick' ");
   } else {
   echo '<div class="meniuc">Ar tikrai norite ištrinti visas žinutes?<br/>
   <a href="pms.php?id=delete_gautos&co=yes">Taip</a> | <a href="pms.php?id=">Ne</a>
   </div>';
   }
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pms.php", "Pm dežutė",  "Žinučiu trinimas");
	navigacija($g_n);
}

else{
    
    atgal('Į Pradžią-?id=');
}
 foot();
?>
