<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
echo'
<div class="up">
<img src="img/baneriai/botasm.png" /></div>';

topbar();
$misija = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM misijos WHERE nick='$nick'"));
$inv = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM inv WHERE nick='$nick'"));
if($id == ""){
	top('Daigtų Misijos');
   online('Daigtų Misijose');
	  echo '<div class="meniuc"><img src="img/imgg/nmisijos.png"></div>';

if($nust['misijos'] == "-"){
       echo '<div class="meniuc"><b>Misijos išjungtos!</br></div></div>';

       }
else{
echo '<div class="meniuc"><b>Daigtų Misijos </b> - turite surinkti tam tikrą kiekį daigtų, ta pačia misiją galima vygdyti daug kartų, bet kas tam tikrą laiko tarpą.</div>';
    $total = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM vietam"))[0];

    if($total > 0){
   
   echo '<div class="meniu">';
   $query = mysqli_query($conn,"SELECT * FROM vietam");
   while($row = mysqli_fetch_assoc($query)){
         echo ' '.$ico.'<a href="misijos2.php?id=vieta&ID='.$row['id'].'">'.$row['name'].'</a><br/>';
         unset($row);
   }
   echo '</div>';
   } else {
echo'<div class="up">Klaida!</div>';
         echo '<div class="meniuc">Kolkas misijų nėra.</div>';
   }

/// bandau

}


			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Daigtų Misijos");
	navigacija($g_n);
		}


elseif($id == "vieta"){
 if($nust['misijos'] == "-"){
top('Daigtų Misijos');
   online('Daigtų Misijose');
       echo '<div class="meniuc"><b>Kolkas misijos išjungtos!</br></div></div>';

       }
else{


mysqli_query($conn,"UPDATE zaidejai SET kda='$KD' WHERE nick='$nick'");
$ID = sk($_GET['ID']);
   online('Misijose');
   $lok = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM vietam WHERE id='$ID' "));
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM  vietam WHERE id='$ID' ")) == 0){
          echo '<div class="up"><b>Klaida!</b></div>';
          echo '<div class="meniuc">Tokios misijos nėra!</div>';
    } else {
        $total = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM misijos2 WHERE lokacija='$ID'"))[0];

        echo '<div class="up">'.$lok['name'].'</div>';
         if($total > 0){
             echo '<div class="meniu">'.$ico.' <b>Reikia surinkti tam tikrą kiekį daigtų, už tai gausite prizą! </b></div>';

echo '<div class="up"><b>Reikalavimai:</b>)</div>';
echo'<div class="meniuc"><img src="img/imgg/nmisijos.png"></div>';
             echo '';
             $query = mysqli_query($conn,"SELECT * FROM misijos2 WHERE lokacija='$ID' ");
             while($row = mysqli_fetch_assoc($query)){
                   echo '<div class="meniuc">


<b> '.$row['kario'].' </b><font color="red">Kario tobulėjimo</font><br>
<b>'.$row['galios'].'</b> <font color="red">Naikinimo galios</font><br>
 <b>'.$row['sparnu'].'</b> <font color="red">Angelo sparnų</font></div>
<div class="meniuc">
<a href="misijos2.php?id=vygdau&ID='.$row['lokacija'].'&VS='.$row['id'].'"><b>Vygdyti</b></a>
</div>';
                   unset($row);
             }
         echo '';
         } else {
              echo '<div class="meniuc">Kolkas misijos nėra.</div>';
         }
         
    }
}

		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","misijos2.php?id=","Misijos","Vygdymas");
	navigacija($g_n);
}
elseif($id == "vygdau"){

	$ID = mysqli_real_escape_string(htmlspecialchars($_GET['ID']));
			$VS = mysqli_real_escape_string(htmlspecialchars($_GET['VS']));
	

			
$ID = post($_GET['ID']);
$VS = post($_GET['VS']);

   online('Vygdo misiją');

  
   if($nust['misijos'] == "-"){
top('Daigtų Misijos');
   online('Daigtų Misijose');
       echo '<div class="meniuc"><b>Kolkas misijos išjungtos!</br></div></div>';

       }
else{
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM vietam WHERE id='$ID' ")) == 0){
          echo '<div class="up">Klaida !</div>';
          echo '<div class="meniuc">Tokios misijos nėra!</div></div>';
    } else {
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM misijos2 WHERE id='$VS' ")) == 0){
          echo '<div class="up">Klaida !</div>';
          echo '<div class="meniuc">Tokios misijos nėra!</div></div>';
    } }
	if($apie[$misijos2['kas']]-time() < 0){
	       $timxx = time()+60*60*$misijos2['laikas'];    

if($inv['tobulas'] < $misijos2['kario'] || $inv['naikinti'] < $misijos2['galios'] || $inv['angelwing'] < $misijos2['sparnu']){
	echo'<div class="up">Vygdymas</div>';
echo '<div class="meniuc"><img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc"><font color="red">Neturi pakankamai daigtų!</font></div>';
	}else{
		
		
		echo'<div class="up">Vygdymas</div>';
echo '<div class="meniuc"><img src="img/imgg/nmisijos.png"></div>';
		echo'<div class="meniuc">Įvygdei! Gavai '.$misijos2['atlg'].' <img src="img/bicons/euro.png"> </div>';
		
		
		mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'.$misijos2[atlg].' WHERE nick='$nick'")or die(mysqli_error());
		mysqli_query($conn,"UPDATE inv SET tobulas=tobulas-'$misijos2[kario]', naikinti=naikinti-'$misijos2[galios]', angelwing=angelwing-'$misijos2[sparnu]' WHERE nick='$nick'")or die(mysqli_error());
	
mysqli_query($conn,"UPDATE zaidejai SET $misijos2[kas]='$timxx' WHERE nick='$nick' ");
///
	}	
	}



elseif($apie[$misijos2['kas']]-time() > 0){
	echo'<div class="up">Vygdymas</div>';
echo '<div class="meniuc"><img src="img/imgg/nmisijos.png"></div>';
                echo '<div class="meniuc"><b>Jau vygdei šią misiją!</b><br> Šitą misiją galėsi vygdyti už <b> <font color="red">  '.laikas($apie[$misijos2['kas']]-time(), 1).' </b></font></div>';
            }
}
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","misijos2.php?id=","Misijos","Įvygdymas");
	navigacija($g_n);
}


foot();
?>
