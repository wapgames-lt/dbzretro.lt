<?php
ob_start();
session_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';


head();
baneris();
if($id == "news"){
          top('Naujienos');
	
          $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM news"))[0];
		   echo'<div class="meniuc">Viso atnaujinimu : '.$viso.'</div>';
       if($viso > 0){
        $rezultatu_rodymas=7;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
          $q = mysqli_query($conn,"SELECT * FROM news ORDER BY id DESC LIMIT $nuo_kiek, $rezultatu_rodymas");
          $puslapiu = ceil($viso/$rezultatu_rodymas);
          while($row = mysqli_fetch_assoc($q)){
          	echo'<div class="meniu">
           '.$ico.'  <b>Atnaujinimas</b>: '.smile($row['name']).'</a><br/>
           '.$ico.'   <b>Atliko atnaujinimą</b> : @'.$row[kas].'<br/>
           '.$ico.'   <b>Data</b> : '.laikas($row['data']).'</br>
          '.$ico.'    <b>Įvertinimas</b>: <img src="img/replike.gif"></a>'.$row['likes'].' <img src="img/repdislike.gif"></a>'.$row['unlike'].'
            </div>
            ';
          }
          echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=news').'</div>';   
        $g_n[] = array("index.php","Pagrindinis","Naujienos");
navigacija($g_n);
	
       }else{
          echo '<div class="titlec"><font color="red">Kolkas atnaujinimų nėra!</font></div>';
		  
       }
      
}






foot();
?>
