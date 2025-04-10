<?php
ob_start();
session_start();
require 'cfg/sql.php';
head();
echo'
<div class="up">
<img src="img/baneriai/botasm.png" /></div>';
class aps{
function save($kint, $i=0){
$rez = trim(mysqli_real_escape_string(addslashes(htmlspecialchars(htmlentities($kint)))));	
if($id=1){
$rez = trim(mysqli_real_escape_string(stripslashes(htmlspecialchars(htmlentities($kint)))));		
	
	
}	
	return $rez;
}}
$aps = new aps;

$id = isset($_GET[id]) ? $aps->save($_GET[id],0) : null;
$ka = isset($_GET[id]) ? $_GET[ka] : null;
in_baneris();
if($id == ''){
	top('Registracija');
     
      echo'
        <div class="meniuc">';
        $query = mysqli_query($conn,"SELECT * FROM veikejai");
        while($row = mysqli_fetch_assoc($query)){
            echo ' <a href="reg.php?id=v&ka='.$row['id'].'"><img src="img/head/'.$row['logo'].'.png"></a>';
        }
  
		
		
		
}
if($id == "v"){
	  $veik = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM veikejai WHERE id='$ka' "));
    top(''.$veik['name'].' Veikėjas');
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM veikejai WHERE id='$ka'")) == 0){
  
        echo '<div class="meniuc">Tokio veikėjo nėra!</div>';
    } else {
      
      
        if($veik['name'] == 'Vedžitas'){
            $imgssxx = 'Vedzitas';
        } else {
            $imgssxx = $veik['name'];
        }
        echo '<div class="meniuc"><img src="img/char/'.$imgssxx.'-0.png"></div>';
		
        echo '<div class="up"> Veikėjo savybės</div><div class="meniu">
        '.$ico2.' Veikėjas: '.$veik['name'].'<br/>
        '.$ico2.' Turi transformacijų: '.$veik['trans'].'<br/>
           '.$ico2.' Jėga: '.$veik['jega'].'<br/>
               '.$ico2.' Gynyba: '.$veik['gynyba'].'<br/>
                '.$ico2.' Gyvybes: '.$veik['gyvybes'].'<br/>
                 '.$ico2.' Rasė: '.$veik['rase'].'<br/>';
       if(!empty($veik[sugebejimas])){     echo'      '.$ico2.' Sugebėjimas: '.$veik['sugebejimas'].'<br/>';}
     echo'   '.$ico2.' Veikėją pasirinko: '.mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='$veik[name]' ")).' žaidėjų<br/>
        </div>';
        echo '<div class="meniuc"><a href="index?id=reg2&mo='.$veik['name'].'">Pasirinkti šį veikėją</a></div>';
    }
   
}


foot();
?>
