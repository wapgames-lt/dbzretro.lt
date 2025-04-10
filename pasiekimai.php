<?php
ob_start();

echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';;
head2();

baneris();
if($id == ""){
topbar();
	top('Pasiekimai');
   online('Pasiekimai');

	  echo '<div class="meniuc"><img src="img/imgg/pasiekimai.png"></br></div>';

if($nust['pasiekimai'] == "-"){
       echo '<div class="meniuc"><b>Pasiekimai išjungti!</br></div></div>';

       }
else{

 echo '<div class="meniuc">Čia gali parodyti ką esu pasiekes žaidime! įvygdyk visus pasiekimus!</div>';
 

  
if($apie['pvisi'] > 0){echo' <div class="meniuc"><font color="black">Įvygdęs pasiekimų:</font> <b>'.$apie['pvisi'].'</b> iš <b>100</b></div>';}
echo'
 ';

    $total = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM pasiek"))[0];

    if($total > 0){
   echo '<div class="up"> Pasirinkimas:</div>';
   echo '<div class="meniu">';
   $query = mysqli_query($conn,"SELECT * FROM pasiek");
   while($row = mysqli_fetch_assoc($query)){
         echo ' <img src="img/bicons/'.$row['img'].'.png"height="16" width="16" /><a href="pasiekimai.php?id=pasiek&ID='.$row['id'].'">'.$row['name'].'</a><br>';
         unset($row);
   }
   echo '</div>';
   } else {
         echo '<div class="meniuc">Kolkas pasiekimų nėra.</div>';
   }

/// bandau

}


			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Kovų laukas");
	navigacija($g_n);
		}

elseif($id == "pasiek"){
$KD = rand(9999,99999);
mysqli_query($conn,"UPDATE zaidejai SET kda='$KD' WHERE nick='$nick'");
$ID = sk($_GET['ID']);
   online('Pasiekimuose');

if($nust['pasiekimai'] == "-"){
       echo '<div class="meniuc"><b>Pasiekimai išjungti!</br></div></div>';

       }
else{
   $pasiek = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM pasiek WHERE id='$ID' "));
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pasiek WHERE id='$ID' ")) == 0){
          echo '<div class="up"><b>Klaida!</b></div>';
          echo '<div class="meniuc">Tokio pasiekimo nėra!</div>';
    } else {
        $total = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM pasiek2 WHERE kas='$ID'"))[0];

        echo '<div class="up">'.$pasiek['name'].'</div>';
         if($total > 0){
echo '<div class="meniuc"><img src="img/imgg/pasiekimai.png"></br></div>';
             echo '<div class="meniu">'.$ico.' Pasiekimas / Kiek ir ko reikia</div>';
echo '<div class="up">'.$ico.'<b>Reikalavimai: </b></div>';
             echo '';
             $query = mysqli_query($conn,"SELECT * FROM pasiek2 WHERE kas='$ID' ");
             while($row = mysqli_fetch_assoc($query)){
                   echo '<div class="meniuc"><b></b> 
<a href="pasiekimai.php?id=siekiu&ID='.$row['kas'].'&VS='.$row['id'].'&KA='.$row['ka'].'&KD='.$KD.'"><b>'.$row['name'].' </b></a> <b>'.skaicius($row['kiek']).'</b>
  <img src="img/bicons/'.$row['img'].'.png" height="16" width="16"/>'.$row['ko'].'';
if($pasiekimai[$row['ka']]-time() > 0){
echo'[<font color="green"><b>Įvygdyta</b></font><b>]';
}
if($pasiekimai[$row['ka']]-time() < 0){
echo'[<font color="red"><b>Neįvygdyta</b></font><b>]';

}



echo'</div>';
                   unset($row);
             }
         echo '';
         } else {
              echo '<div class="meniuc">Kolkas pasiekimų nėra.</div>';
         }
         
    }
}
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pasiekimai.php?id=","Pasiekimai","Pasiekimai");
	navigacija($g_n);
}

elseif($id == 'siekiu'){
top(' Pasiekimai');
if($nust['pasiekimai'] == "-"){
       echo '<div class="meniuc"><b>Pasiekimai išjungti!</br></div></div>';

       }
else{

$ID = mysqli_real_escape_string($conn,htmlspecialchars($_GET['ID']));
			$VS = mysqli_real_escape_string($conn,htmlspecialchars($_GET['VS']));
		$KA = mysqli_real_escape_string($conn,htmlspecialchars($_GET['KA']));

			$KD = rand(9999,99999);
$ID = post($_GET['ID']);
$VS = post($_GET['VS']);
$KA = post($_GET['KA']);
$KD = post($_GET['KD']);
    $siek = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM pasiek2 WHERE id='$VS' "));
$pasiekimai = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM pasiekimai WHERE nick='$nick'"));
   $m = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$nick'"));
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pasiek WHERE id='$ID' ")) == 0){
          echo '<div class="up">Klaida !</div>';
          echo '<div class="meniuc"><div class="error">Tokio pasiekimo nėra!</div></div>';
    } else {
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pasiek2 WHERE id='$VS' ")) == 0){
          echo '<div class="up">Klaida !</div>';
          echo '<div class="meniuc"><div class="error">Tokio pasiekimo nėra!</div></div>';
    } }

if($pasiekimai[$siek['ka']]-time() < 0){
	       $timxx = time()+60*60*24*100; 

if($apie[$siek['ko2']] < $siek['kiek']){
echo '<div class="meniuc"><img src="img/imgg/pasiekimai.png"></br></div>';
		echo'<div class="meniuc">Neturi  '.$siek['kiek'].'  <img src="img/bicons/'.$siek['img'].'.png" /></div>';
   }
else{
		echo '<div class="meniuc"><img src="img/imgg/pasiekimai.png"></br></div>';
		echo'<div class="meniuc"><b>Sėkmingai įvygdei pasiekimą!</b> Gavai <font color="red"> '.$siek['pt'].' </font> <b><img src="img/bicons/pt.png" /> bei <font color="red"> '.$siek['eur'].' <img src="img/bicons/euro.png" /></b></font></div>';
	
		     
		mysqli_query($conn,"UPDATE inv SET unikalus=unikalus+'$siek[pt]' WHERE nick='$nick'")or die(mysqli_error());

mysqli_query($conn,"UPDATE zaidejai SET pvisi=pvisi+'1', sms_litai=sms_litai+'$siek[eur]' WHERE nick='$nick'")or die(mysqli_error());
mysqli_query($conn,"UPDATE pasiekimai SET $siek[ka]='$timxx' WHERE nick='$nick' ");
}
		}
elseif($pasiekimai[$siek['ka']]-time() > 0){
echo '<div class="meniuc"><img src="img/imgg/pasiekimai.png"></br></div>';
                echo '<div class="meniuc">Tu jau įvygdei ši pasiekimą!</div>';
            }
}

  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pasiekimai.php", "Pasiekimai", "Pasiekimų progresas");
	navigacija($g_n);
}





foot();
?>
