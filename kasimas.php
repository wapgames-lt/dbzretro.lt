<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";
include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();

baneris();
topbar();
$kasimas = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM kasyklav WHERE id='$VS' "));
   if(empty($apie['kasimasa'])){
	
	mysqli_query($conn,"UPDATE zaidejai SET kasimasa='paprastas' WHERE nick='$nick'");
}
      	if($id == "auto_off"){
    online('Auto kasimas');
   echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
    echo '<div class="meniuc">Auto kasimas išjungtas!</div>';
    mysqli_query($conn,"UPDATE zaidejai SET autok='-', kasimasa='-' WHERE nick='$nick' ");
  $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php?id=kasykla","Kasykla", "Kasimo auto OFF"];
	navigacija($g_n);
  
}
elseif($id == "auto_on"){
    online('Auto kasimas');
    echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
    echo '<div class="meniuc">Auto kasimas  įjungtas!</div>';
    mysqli_query($conn,"UPDATE zaidejai SET autok='+', kasimasa='paprastas' WHERE nick='$nick' ");
   $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php?id=kasykla","Kasykla", "Kasimo auto ON"];
	navigacija($g_n);
	
}	           



elseif($id == "pap"){
    online('Auto kasimas');
    
   header('location:kasimas.php');
    mysqli_query($conn,"UPDATE zaidejai SET kasimasa='paprastas' WHERE nick='$nick' ");
   
	
}	          
if((int)$apie['vip']-time() > 0){
$kasimasa = 1;
 $padusimas = 1;
 
}
else{
 
 $kasimasa = 5;
 $padusimas = 5;
}


if($id == ''){
	top('Rudų kasimas');


    $total = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM kasykla"))[0];
    echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>
<div class="meniuc"><b>Kasimas</b> - čia galite rasti įvairių užsiemimų!
</div>
<div class="meniuc"><a href="?id=rudushop"><font color="green"><b>Iškasenų parduotuvė</b></font></a></div>

<div class="meniuc"><a href="?id=kirtikliai"><font color="red"><b>Kirtiklių pirkimas</b></font></a></div>
<div class="meniuc"><a href="?id=kasimoreward"><font color="blue"><b>Kasimo LVL Reward</b></font></a></div>
';
   if($total > 0){
   echo '<div class="up"> Vietovės:</div>';
   
   $query = mysqli_query($conn,"SELECT * FROM kasykla Order by ID");
   while($row = mysqli_fetch_assoc($query)){
	
echo '<div class="meniu">';
         echo ' <img src="img/kasimas/'.$row['img'].'.png"alt="IMG" height="16" width="16" /><a href="kasimas.php?id=kasykla&ID='.$row['id'].'">'.$row['name'].' </a><br>';


       
echo '';

  
   echo'</div>';

  unset($row);
}
    $query = mysqli_query($conn,"SELECT * FROM kasykla2");
   while($row = mysqli_fetch_assoc($query)){
	
echo '<div class="meniu">';
         echo ' <img src="img/kasimas/'.$row['img'].'.png"height="16" width="16" /><a href="kasimas2.php?id=kasykla&ID='.$row['id'].'">'.$row['name'].' </a><br>';


      

  unset($row);
echo'</div>';
   
}
    $query = mysqli_query($conn,"SELECT * FROM kasykla3");
   while($row = mysqli_fetch_assoc($query)){
	
echo '<div class="meniu">';
         echo ' <img src="img/kasimas/'.$row['img'].'.png"height="16" width="16" /><a href="kasimas3.php?id=kasykla&ID='.$row['id'].'">'.$row['name'].' </a><br>';


      

  unset($row);
echo'</div>';
   
}
   } else {
         echo '<div class="meniuc">Kolkas  vietų nėra.</div>';
   }

/// bandau






			 $g_n[] = ["pagrindinis.php?id=","Pagrindinis", "Kasykla"];
	navigacija($g_n);
}


// reward
elseif($id == "kasimoreward"){
   online('Vygdo kasyklos misiją');
   top('Kasimo Lvl Reward');
   echo '<div class="meniuc"><img src="img/kasimoreward.png"></div>
<div class="meniuc">
  Pasiek <b>'.skaicius(5000000).' LVL</b> kasimo ir tada galėsi įvygdyti šią kasimo misiją!<br>Įvygdžius gausi <b>Kasimo Rewardą</b>!<br>Su kuriuo kasykloje iškasi ne po <b>1</b> rūdą, o  po <b>2</b>!<br><small><b>P.S</b> su papildomai nupirkta paslauga už '.$eurui.' gausi po <b>3</b> rūdas!</small>
   </div><div class="titlec">
   <a href="?id=kasimoreward2">Pasiekiau reikiama lygį!</a>
   </div>';
    $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php", "Kasykla", "Kasimo Lvl misija"];
	navigacija($g_n);
}
elseif($id == "kasimoreward2"){
   online('Vygdo kasyklos misiją');
   top('Kasimo Lvl Reward');
 
 
   if($apie['kasimolvl'] < 4999999){
echo '<div class="meniuc"><img src="img/kasimoreward.png"></div>';

      echo '<div class="meniuc">Tu neturi pasiekęs <b>'.skaicius(5000000).' LVL</b> Kasimo!</div>';}
elseif($apie['kasimoreward'] == '+'){
		echo'<div class="meniuc"><img src="img/kasimoreward.png" /></div>';
			echo'<div class="meniuc">Šią misiją jau esi įvygdęs!</div>';
		
	
}

   else{
echo '<div class="meniuc"><img src="img/kasimoreward.png"></div>';
      echo '<div class="meniuc">Sėkmingai įvygdei misiją!<br>Nuo šiol kasite po <b>2</b> rudas, o su paslauga po <b>3</b>!</div>';
       
      mysqli_query($conn,"UPDATE zaidejai SET kasimoreward='+' WHERE nick='$nick' ");}
 
    $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php", "Kasykla", "Kasimo Lvl reward"];
	navigacija($g_n);

}



elseif($id == "rudushop"){
 
top('Iškasenų keitykla');
  


   online('Pardavinėja iškasenas');

echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>
<div class="meniuc"><b>Iškasenų parduotuvė</b> - čia galite keisti rudas į kitus dalykus!
</div>';
echo'<div class="up">Alavo iškasenų</div>
		<div class="meniuc">300 <img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(10).'</b> <img src="img/bicons/vipt.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciua1" method="post"/>
        Kiek alavo iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['alavas'] . '" min="300" max="'. $inv['alavas'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form>
        </div>
		
		<div class="meniuc">500 <img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(5).'</b> <img src="img/bicons/euro.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciua2" method="post"/>
        Kiek alavo iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['alavas'] . '" min="500" max="'. $inv['alavas'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form>
        </div>';
		
echo'<div class="up">Vario iškasenų</div>
		<div class="meniuc">300 <img src="img/kasimas/vario.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(12).'</b> <img src="img/bicons/vipt.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciuv1" method="post"/>
        Kiek vario iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['varis'] . '" min="300" max="'. $inv['varis'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form>
        </div>
		
		<div class="meniuc">500 <img src="img/kasimas/vario.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(10).'</b> <img src="img/bicons/euro.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciuv2" method="post"/>
        Kiek vario iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['varis'] . '" min="500" max="'. $inv['varis'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>';

echo'<div class="up">Kadmio iškasenų</div>
		<div class="meniuc">300 <img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(50).'</b> <img src="img/bicons/vipt.png" />    </div>
		<div class="meniuc">
        <form action="?id=keiciuk1" method="post"/>
        Kiek kadmio iškasenų iškeisite:<br />
         <input type="number" value="'. $inv['kadmis'] . '" min="300" max="'. $inv['kadmis'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form>
        </div>
		
		<div class="meniuc">500 <img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(15).'</b> <img src="img/bicons/euro.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciuk2" method="post"/>
        Kiek kadmio iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['kadmis'] . '" min="500" max="'. $inv['kadmis'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>
		';
echo'<div class="up">Cirkonio iškasenų</div>
		<div class="meniuc">300 <img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(200).'</b> <img src="img/bicons/vipt.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciuc1" method="post"/>
        Kiek cirkonio iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['cirkonis'] . '" min="300" max="'. $inv['cirkonis'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form>
        </div>
		
		<div class="meniuc">500 <img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(20).'</b> <img src="img/bicons/euro.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciuc2" method="post"/>
        Kiek cirkonio iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['cirkonis'] . '" min="500" max="'. $inv['cirkonis'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>
		';
echo'<div class="up">Geležies iškasenų</div>
		<div class="meniuc">300 <img src="img/kasimas/gelezies.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(250).'</b> <img src="img/bicons/vipt.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciug1" method="post"/>
        Kiek geležies iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['gelezis'] . '" min="300" max="'. $inv['gelezis'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form>
        </div>
		
		<div class="meniuc">500 <img src="img/kasimas/gelezies.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(25).'</b> <img src="img/bicons/euro.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciug2" method="post"/>
        Kiek geležies iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['gelezis'] . '" min="500" max="'. $inv['gelezis'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>
		';
echo'<div class="up">Sidabro iškasenų</div>
		<div class="meniuc">300 <img src="img/kasimas/sidabro.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(350).'</b> <img src="img/bicons/vipt.png" />    </div>
        <div class="meniuc">
        <form action="?id=keicius1" method="post"/>
        Kiek sidabro iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['sidabras'] . '" min="300" max="'. $inv['sidabras'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form>
        </div>
		
		<div class="meniuc">500 <img src="img/kasimas/sidabro.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(30).'</b> <img src="img/bicons/euro.png" />    </div>
        <div class="meniuc">
        <form action="?id=keicius2" method="post"/>
        Kiek sidabro iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['sidabras'] . '" min="500" max="'. $inv['sidabras'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>
		';
echo'<div class="up">Aukso iškasenų</div>
		<div class="meniuc">300 <img src="img/kasimas/aukso.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(450).'</b> <img src="img/bicons/vipt.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciuaux1" method="post"/>
        Kiek aukso iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['auksas'] . '" min="300" max="'. $inv['auksas'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form>
        </div>
		
		<div class="meniuc">500 <img src="img/kasimas/aukso.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(35).'</b> <img src="img/bicons/euro.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciuaux2" method="post"/>
        Kiek aukso iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['auksas'] . '" min="500" max="'. $inv['auksas'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>
		';

echo'<div class="up">Platinos iškasenų</div>
		<div class="meniuc">300 <img src="img/kasimas/platinos.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(550).'</b> <img src="img/bicons/vipt.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciup1" method="post"/>
        Kiek platinos iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['platina'] . '" min="300" max="'. $inv['platina'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form>
        </div>
		
		<div class="meniuc">500 <img src="img/kasimas/platinos.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(40).'</b> <img src="img/bicons/euro.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciup2" method="post"/>
        Kiek platinos iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['platina'] . '" min="500" max="'. $inv['platina'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>
		';
echo'<div class="up">Titano iškasenų</div>
		<div class="meniuc">300 <img src="img/kasimas/titano.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(650).'</b> <img src="img/bicons/vipt.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciut1" method="post"/>
        Kiek titano iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['titanas'] . '" min="300" max="'. $inv['titanas'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form>
        </div>
		
		<div class="meniuc">500 <img src="img/kasimas/titano.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(45).'</b> <img src="img/bicons/euro.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciut2" method="post"/>
        Kiek titano iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['titanas'] . '" min="500" max="'. $inv['titanas'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>
		';
echo'<div class="up">Osmio iškasenų</div>
		<div class="meniuc">300 <img src="img/kasimas/osmio.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(750).'</b> <img src="img/bicons/vipt.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciuo1" method="post"/>
        Kiek osmio iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['osmis'] . '" min="300" max="'. $inv['osmis'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form>
        </div>
		
		<div class="meniuc">500 <img src="img/kasimas/osmio.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(50).'</b> <img src="img/bicons/euro.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciuo2" method="post"/>
        Kiek osmio iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['osmis'] . '" min="500" max="'. $inv['osmis'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>
		';
echo'<div class="up">Mangano iškasenų</div>
		<div class="meniuc">300 <img src="img/kasimas/mangano.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(850).'</b> <img src="img/bicons/vipt.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciumangana1" method="post"/>
        Kiek mangano iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['manganas'] . '" min="300" max="'. $inv['manganas'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form>
        </div>
		
		<div class="meniuc">500 <img src="img/kasimas/mangano.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(55).'</b> <img src="img/bicons/euro.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciumangana2" method="post"/>
        Kiek mangano iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['manganas'] . '" min="500" max="'. $inv['manganas'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>
		';
echo'<div class="up">Anglies iškasenų</div>
		<div class="meniuc">300 <img src="img/kasimas/anglies.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(950).'</b> <img src="img/bicons/vipt.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciuang1" method="post"/>
        Kiek anglies iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['anglis'] . '" min="300" max="'. $inv['anglis'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form>
        </div>
		
		<div class="meniuc">500 <img src="img/kasimas/anglies.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(60).'</b> <img src="img/bicons/euro.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciuang2" method="post"/>
        Kiek anglies iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['anglis'] . '" min="500" max="'. $inv['anglis'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>
		';
echo'<div class="up">Mineralų iškasenų</div>
		<div class="meniuc">300 <img src="img/kasimas/mineralu.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(1100).'</b> <img src="img/bicons/vipt.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciumin1" method="post"/>
        Kiek mineralų iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['mineralai'] . '" min="300" max="'. $inv['mineralai'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form>
        </div>
		
		<div class="meniuc">500 <img src="img/kasimas/mineralu.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(65).'</b> <img src="img/bicons/euro.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciumin2" method="post"/>
        Kiek mineralų iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['mineralai'] . '" min="500" max="'. $inv['mineralai'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>
		';
echo'<div class="up">Spato iškasenų</div>
		<div class="meniuc">300 <img src="img/kasimas/spato.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(1250).'</b> <img src="img/bicons/vipt.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciuspa1" method="post"/>
        Kiek spato iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['spatas'] . '" min="300" max="'. $inv['spatas'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form>
        </div>
		
		<div class="meniuc">500 <img src="img/kasimas/spato.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(70).'</b> <img src="img/bicons/euro.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciuspa2" method="post"/>
        Kiek spato iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['spatas'] . '" min="500" max="'. $inv['spatas'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>
		';
echo'<div class="up">Kvarco iškasenų</div>
		<div class="meniuc">300 <img src="img/kasimas/kvarco.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(1400).'</b> <img src="img/bicons/vipt.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciukva1" method="post"/>
        Kiek kavrco iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['kvarcas'] . '" min="300" max="'. $inv['kvarcas'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form>
        </div>
		
		<div class="meniuc">500 <img src="img/kasimas/kvarco.png" alt="IMG" height="16" width="16"> - <b>'.skaicius(75).'</b> <img src="img/bicons/euro.png" />    </div>
        <div class="meniuc">
        <form action="?id=keiciukva2" method="post"/>
        Kiek kvarco iškasenų iškeisite:<br />
        <input type="number" value="'. $inv['kvarcas'] . '" min="500" max="'. $inv['kvarcas'] . '" name="gynybaa"><br />
        <input type="submit" name="submit" value="Keisti"/></form></div>
		';
$g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų parduotuvė"];
	navigacija($g_n);

}



elseif($id == "rudos"){
 
top('Kasykla');
mysqli_query($conn,"TRUNCATE TABLE player_actions");
  


   online('Kasykloje');

echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>
<div class="meniuc"><b>Turimos rūdos</b> - čia galite rasti rudas kurias turite išsikasęs!
</div>';
echo'<div class="up">Paprastos rūdos</div>
<div class="meniuc">
<b>'.$inv['alavas'].'</b><img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16"> | 
<b>'.$inv['varis'].'</b><img src="img/kasimas/vario.png" alt="IMG" height="16" width="16"> |
<b>'.$inv['kadmis'].'</b><img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16"> |
<b>'.$inv['cirkonis'].'</b><img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16"> |
<b>'.$inv['gelezis'].'</b><img src="img/kasimas/gelezies.png" alt="IMG" height="16" width="16"> </div>
<div class="up">Vidutinės rūdos</div>
<div class="meniuc">
<b>'.$inv['sidabras'].'</b><img src="img/kasimas/sidabro.png" alt="IMG" height="16" width="16"> | 
<b>'.$inv['auksas'].'</b><img src="img/kasimas/aukso.png" alt="IMG" height="16" width="16"> | 
<b>'.$inv['platina'].'</b><img src="img/kasimas/platinos.png" alt="IMG" height="16" width="16"> | 
<b>'.$inv['titanas'].'</b><img src="img/kasimas/titano.png" alt="IMG" height="16" width="16"> </div>
<div class="up">Geros rūdos</div>
<div class="meniuc">
<b>'.$inv['osmis'].'</b><img src="img/kasimas/osmio.png" alt="IMG" height="16" width="16"> | 
<b>'.$inv['manganas'].'</b><img src="img/kasimas/mangano.png" alt="IMG" height="16" width="16"> 
</div>';
$g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kasimas"];
	navigacija($g_n);

}

elseif($id == "kasykla"){
 
top('Kasykla');
  


$KD = random_int(9999,99999);
mysqli_query($conn,"UPDATE zaidejai SET kda2='$KD' WHERE nick='$nick'");
$ID = sk($_GET['ID']);
   online('Kasykloje');
   $lok = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM kasykla WHERE id='$ID' "));
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>
<div class="meniuc"><b>Rudų kasimas</b> - čia galite kasti rudas ir kelti  rūdų kasimo  lygį, kuo jis aukštesnis tuo geresnę rūdą galima kasti!
</div>';
 if($autok == "paprastas"){
       $onoff = '<font color="green">Įjunkti</font>';
       $nurd = '<a href="kasimas.php?id=auto_off">Išjungti</a>';
   } else {
       $onoff = '<font color="red">Išjungti</font>';
       $nurd = '<a href="kasimas.php?id=auto_on">Ijungti</a>';  
   }
 echo'  <div class="titlec">Dabar auto kasimas <b>'.$onoff.'</b> ['.$nurd.']<br/></div>

  <div class="titlec">Dabar padusimai kas <b><font color="green">'.$padusimas.'</font></b> sec , auto kasimas kas <b><font color="green">'.$kasimasa.'</font></b> sec<br/></div>
';
if((int)$apie['kasimas2x']-time() > 0){
  echo '<div class="meniuc">Daugiau iškasamų rūdų tau galios: <b>'.laikas($apie['kasimas2x']-time(), 1).'</b></div>';
}
if((int)$apie['kasimolvl2x']-time() > 0){
  echo '<div class="meniuc">Daugiau kasimi LVL tau galios: <b>'.laikas($apie['kasimolvl2x']-time(), 1).'</b></div>';
}
echo'<div class="meniuc"><a href="?id=rudos"><font color="red"><b>Iškasti ištekliai</b></font></a></div>';
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kasykla WHERE id='$ID' ")) == 0){
          echo '<div class="up"><b>Klaida!</b></div>';
          echo '<div class="meniuc">Tokios vietos nėra!</div>';
    } else {
        $total = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM kasyklav WHERE lokacija='$ID'"))[0];
        echo '<div class="up">'.$lok['name'].'</div>';
         if($total > 0){
      if($kg < $lok['nuo']){
header('Location:fight.php');
echo' <div class="meniuc"> Manai esi gudrus? :DD </div>';}
else{

    echo '<div class="meniu">'.$ico.' Rūda  <b> (Reikiamas kasimo lygis)</b></div>';


echo '<div class="up">'.$ico.'Jūsų (<b>'.$apie['kasimolvl'].'   LVL</b> kasimo)</div>';
             echo '';
             $query = mysqli_query($conn,"SELECT * FROM kasyklav WHERE lokacija='$ID' ");
             while($row = mysqli_fetch_assoc($query)){
                   



echo'
<div class="meniu">';
echo'<img src="img/kasimas/'.$row['img'].'.png"alt="IMG" height="16" width="16" /><a href="kasimas.php?id=kasu&ID='.$row['lokacija'].'&VS='.$row['id'].'&KD='.$KD.'"><b>'.$row['name'].'</b> (<b>'.$row['kasimolvl'].' LVL</b> kasimo )

</a>'; 




echo'</div>';}
                   unset($row);
             }
         echo '';
         } else {
              echo '<div class="meniuc">Kolkas išteklių nėra.</div>';
         
         
    }
}
		 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","Kasimas"];
	navigacija($g_n);
}

if($id == 'kasu'){
    // GAY PROTECTION
    $time = time() - 3;
    if ($apie['last_fight_time'] > $time) {
        $message = 'Seniokas ' . $nick . ' bando buti kasykloje ir kovu zonoje vienu metu :D';
        error_log($message);
        $b_laikas2 = time()+60;
        $kasBan = 'testas1';
        mysqli_query($conn,"INSERT INTO ban_logai SET nick='$nick', uz='$message', time='$b_laikas2', kas_ban='$kasBan'")or die(\MYSQLI_ERROR);
        mysqli_query($conn,"INSERT INTO block SET nick='$nick', uz='$message', time='$b_laikas2', kas_ban='$kasBan'");
        header('Refresh: 1; url=pagrindinis.php');
    }

    $gayRandom = mt_rand(1, 500);
    if ($gayRandom === 1) {
        // WAP GAY PROTECTION
        $ip = $_SERVER['REMOTE_ADDR'];
        $location = 'mine';
        $browser = $browser['name'];
        mysqli_query($conn,"INSERT INTO `player_actions` SET player_id = '$apie[id]', location='$location', ip='$ip', browser='$browser'");

        $fiveSecondsAgo = date('Y-m-d H:i:s', strtotime('-5 seconds'));
        $sql = "SELECT * FROM player_actions 
                                    WHERE ip = '$ip'
                                    AND player_id != '$apie[id]'
                                    AND created_at >= '$fiveSecondsAgo' 
                                    ORDER BY created_at DESC 
                                    LIMIT 1";
        $exist = mysqli_num_rows(mysqli_query($conn,$sql));
        if ($exist) {

            $random = mt_rand(1, 100);
            if ($random === 1) {
                header('Location: https://www.pornhub.com/view_video.php?viewkey=ph6310ae706594b');
            }
            if ($random === 2) {
                header('Location: /');
            }
        }
    }

		$ID = mysqli_real_escape_string($conn, htmlspecialchars((string) $_GET['ID']));
			$VS = mysqli_real_escape_string($conn,htmlspecialchars((string) $_GET['VS']));
	
$kasimas = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM kasyklav WHERE id='$VS' "));
			$KD = random_int(9999,99999);
$ID = post($_GET['ID']);
$VS = post($_GET['VS']);
$KD = post($_GET['KD']);
   online('Kasykloje');
//// 2x kasimo lvl
  if((int)$apie['kasimolvl2x']-time() > 0){
$kasimas2x=2;}
  if((int)$apie['kasimolvl2x']-time() < 0){
$kasimas2x=1;}
/// 2x rudu
   if((int)$apie['kasimas2x']-time() > 0){
$kasimasx=1;}
if((int)$apie['kasimas2x']-time() < 0){
$kasimasx=0;}
/// reward
if($apie['kasimoreward'] == '+'){
$kasimoreward=1;}
if($apie['kasimoreward'] == ''){
$kasimoreward=0;}
   $lok = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM kasykla WHERE id='$ID' "));
   $mob = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM kasyklav WHERE id='$VS' "));
   $m = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$nick'"));
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kasykla WHERE id='$ID' ")) == 0){
          echo '<div class="up">Klaida !</div>';
          echo '<div class="meniuc"><div class="error">Tokios vietos nėra!</div></div>';
    } else {
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kasyklav WHERE id='$VS' ")) == 0){
          echo '<div class="up">Klaida !</div>';
          echo '<div class="meniuc"><div class="error">Tokios iškasenos nėra!</div></div>';
    } }

	   if($m['kda2'] != $KD){
  
        top('Klaida');
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
          echo '<div class="meniu" style="text-align: center;">Taip kasti negalimą! Eikite atgal ir vėl kaskite!</div>';
    
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php", "Rūdų kasimas", "Klaida"];
	navigacija($g_n);
	}

	elseif(($apie['kasimolvl']) < $kasimas
['kasimolvl']){
  
             
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
		echo'	<div class="meniuc">Tu neturi tokio <b>Rūdų kasimo lvl</b>!  </div> ';

			 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kasimas"];
	navigacija($g_n);

}

	elseif($inv[$kasimas['kirtiklis']] < '1'){
  
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tu neturi <b>'.$kasimas['img'].' kirtiklio</b>!
</div> ';
			 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kasimas"];
	navigacija($g_n);
}

	elseif($_SESSION['kasu'] > time()){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
		echo'<div class="meniuc">Per greit kasi galėsi po '.laikas($_SESSION['kasu']-time(), 1).'</div>';
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php", "Rūdos kasimas", "Klaida"];
	navigacija($g_n);
	
	}
	else{


		   $KDS= random_int(9999,99999);
    mysqli_query($conn,"UPDATE zaidejai SET kda2='$KDS' WHERE nick='$nick'");

             $query = mysqli_query($conn,"SELECT * FROM kasyklav WHERE lokacija='$ID' ORDER BY id='$VS' DESC LIMIT 1");
             while($row = mysqli_fetch_assoc($query)){
		$_SESSION['kasu'] = time()+$padusimas;
		$randas = random_int(1,1);
		$randas2 =random_int(1+$kasimasx+$kasimoreward,1+$kasimasx+$kasimoreward);
		$randas3 =random_int($row['minlvl']*$kasimas2x,$row['maxlvl']*$kasimas2x);
		online('Kasykloje > ' . $row['name']);
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
echo'<div class="up">'.$row['kasimolvl'].' LVL Rūdu kasimas</div>';
if((int)$apie['kasimas2x']-time() > 0){
  echo '<div class="meniuc">Gausite <b>2x</b> iškasamų rūdų dar: <b>'.laikas($apie['kasimas2x']-time(), 1).'</b></div>';
}
if((int)$apie['kasimolvl2x']-time() > 0){
  echo '<div class="meniuc">Gausite <b>2x</b> kasimo LVL dar: <b>'.laikas($apie['kasimolvl2x']-time(), 1).'</b></div>';
}
echo'<div class="meniuc">Iškasei<b> '.$randas2.' </b><img src="img/kasimas/'.$row['img'].'.png" alt="IMG" height="16" width="16"> | Išviso turi: <b>'.$inv[$row['ruda']].'</b><img src="img/kasimas/'.$row['img'].'.png" alt="IMG" height="16" width="16"><br>Gavai +<font color="red">'.$randas3.'</font><b> Rūdų kasimo lygio</b><br>Turi <font color="red">'.skaicius($apie['kasimolvl']).'</font><b> Rūdų kasimo lygio</b>
</div>';
	mysqli_query($conn,"UPDATE inv SET $row[ruda]=$row[ruda]+'$randas2' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET kasimolvl=kasimolvl+'$randas3', vveiksmai=vveiksmai+'1',  veiksmai=veiksmai+'1' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE kasimotop SET surinkta=surinkta+'$randas3' WHERE nick='$nick'");

                 if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE dtop SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO dtop SET vksm='1', nick='$nick'");
                 if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM s_top WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE s_top SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO s_top SET vksm='1', nick='$nick'");
	}
	    
if($autok = '+' AND $apie['kasimasa'] == 'paprastas'){
    echo '<meta http-equiv="refresh" content="'.$kasimasa.'; url=kasimas.php?id=kasu&ID='.$ID.'&VS='.$VS.'&KD='.$KDS.'">';}	     



		echo'<div class="meniuc"><a href="kasimas.php?id=kasu&ID='.$ID.'&VS='.$VS.'&KD='.$KDS.'">Kasti toliau</a></div>';
		 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php", "Rūdų kasimas", "Kasimas"];
	navigacija($g_n);
	}
	
	
	
}


if($id == 'kirtikliai'){
	top('Kirtiklių pirkimas');

	
	echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>
<div class="meniuc"><b>Kirtikliai</b> - čia įsigyti jums reikiamų kirtiklių norint kasti geras rūdas!
</div>
<div class="up">Kirtikliai</div>


<div class="meniuc">
<b>Alavo kirtiklis  </b><br> Kaina - 20'.$eurui.' <a href="?id=kirtalavo"> [<b>Pirkti</b>]</a></div>
<div class="meniuc">
<b>Vario kirtiklis </b><br> Kaina - 40'.$eurui.' | 75 <img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16">   <a href="?id=kirtvario">[<b>Pirkti</b>]</a></div>
<div class="meniuc">
<b>Kadmio kirtiklis </b><br> Kaina - 70'.$eurui.' | 1, 000 <img src="img/kasimas/vario.png" alt="IMG" height="16" width="16"> <a href="?id=kirtkadmio">  [<b>Pirkti</b>]</a></div>
<div class="meniuc">
<b>Cirkonio kirtiklis  </b><br> Kaina - 100'.$eurui.' | 1, 200 <img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16"> <a href="?id=kirtcirkonio">  [<b>Pirkti</b>]</a></div>
<div class="meniuc">
<b>Geležies kirtiklis  </b><br> Kaina - 120'.$eurui.' | 2, 000 <img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16"><a href="?id=kirtgelezies"> [<b>Pirkti</b>]</a>
</div>
<div class="meniuc">
<b>Sidabro kirtiklis  </b><br> Kaina - 150'.$eurui.' | 2, 500 <img src="img/kasimas/gelezies.png" alt="IMG" height="16" width="16"><a href="?id=kirtsidabro"> [<b>Pirkti</b>]</a>
</div>
<div class="meniuc">
<b>Aukso kirtiklis  </b><br> Kaina - 200'.$eurui.' | 3, 000 <img src="img/kasimas/sidabro.png" alt="IMG" height="16" width="16"><a href="?id=kirtaukso"> [<b>Pirkti</b>]</a>
</div>
<div class="meniuc">
<b>Platinos kirtiklis  </b><br> Kaina - 250'.$eurui.' | 3, 500 <img src="img/kasimas/aukso.png" alt="IMG" height="16" width="16"><a href="?id=kirtplatinos"> [<b>Pirkti</b>]</a>
</div>
<div class="meniuc">
<b>Titano kirtiklis  </b><br> Kaina - 300'.$eurui.' | 5, 000 <img src="img/kasimas/platinos.png" alt="IMG" height="16" width="16"><a href="?id=kirttitano"> [<b>Pirkti</b>]</a>
</div>
<div class="meniuc">
<b>Osmio kirtiklis  </b><br> Kaina - 350'.$eurui.' | 8, 000 <img src="img/kasimas/titano.png" alt="IMG" height="16" width="16"><a href="?id=kirtosmio"> [<b>Pirkti</b>]</a>
</div>
<div class="meniuc">
<b>Mangano kirtiklis  </b><br> Kaina - 400'.$eurui.' | 12, 000 <img src="img/kasimas/osmio.png" alt="IMG" height="16" width="16"><a href="?id=kirtmangano"> [<b>Pirkti</b>]</a></div>
<div class="meniuc">
<b> Unikalus kirtiklis  </b><br> Kaina - 12000'.$eurui.' | 100, 000 <img src="img/kasimas/mangano.png" alt="IMG" height="16" width="16"><a href="?id=kirtunikalus"> [<b>Pirkti</b>]</a>
</div>
<div class="meniuc">
<b> Super Unikalus kirtiklis  </b><br> Kaina - 50000'.$eurui.' | 1, 000, 000  <img src="img/kasimas/kvarco.png" alt="IMG" height="16" width="16"><a href="?id=kirtunikalus2"> [<b>Pirkti</b>]</a>
</div>


';
		 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rudų kasimas","Kirtiklių pirkimas"];
	navigacija($g_n);
}
if($id == "kirtalavo"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai']) < '19'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" />
</div> ';}
elseif($inv['alavok'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Alavo kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'20' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET alavok=alavok+'1' WHERE nick='$nick' ");


		}
	

 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas"];
	navigacija($g_n);
	

}			
if($id == "kirtvario"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '39' || $inv['alavas'] < '74')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['variok'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Vario kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'40' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET variok=variok+'1', alavas=alavas-'75' WHERE nick='$nick' ");


		}
	

 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas"];
	navigacija($g_n);
	

}			
if($id == "kirtkadmio"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '69' || $inv['varis'] < '1000')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/vario.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['kadmiok'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Kadmio kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'70' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET kadmiok=kadmiok+'1', varis=varis-'1000' WHERE nick='$nick' ");


		}
	

 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas"];
	navigacija($g_n);
	

}			
if($id == "kirtcirkonio"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '99' || $inv['kadmis'] < '1200')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['cirkoniok'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Cirkonio kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'100' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET cirkoniok=cirkoniok+'1', kadmis=kadmis-'1200' WHERE nick='$nick' ");


		}
	

 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas"];
	navigacija($g_n);
	

}			
if($id == "kirtgelezies"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '119' || $inv['cirkonis'] < '2000')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['geleziesk'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Geležies kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'120' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET geleziesk=geleziesk+'1', cirkonis=cirkonis-'2000' WHERE nick='$nick' ");


		}
	

 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas"];
	navigacija($g_n);
	

}			
if($id == "kirtsidabro"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '149' || $inv['gelezis'] < '2500')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/gelezies.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['sidabrok'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Sidabro kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'150' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET sidabrok=sidabrok+'1', gelezis=gelezis-'2500' WHERE nick='$nick' ");


		}
	

 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas"];
	navigacija($g_n);
	

}			
if($id == "kirtaukso"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '199' || $inv['sidabras'] < '3000')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/sidabro.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['auksok'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Aukso kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'200' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET auksok=auksok+'1', sidabras=sidabras-'3000' WHERE nick='$nick' ");


		}
	

 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas"];
	navigacija($g_n);
	

}	
if($id == "kirtplatinos"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '249' || $inv['auksas'] < '3500')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/aukso.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['platinosk'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Platinos kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'250' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET platinosk=platinosk+'1', auksas=auksas-'3500' WHERE nick='$nick' ");


		}
	

 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas"];
	navigacija($g_n);
	

}			
if($id == "kirttitano"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '299' || $inv['platina'] < '5000')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/platinos.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['titanok'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Titano kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'300' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET titanok=titanok+'1', platina=platina-'5000' WHERE nick='$nick' ");


		}
	

 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas"];
	navigacija($g_n);
	

}			
if($id == "kirtosmio"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '349' || $inv['titanas'] < '8000')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/titano.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['osmiok'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Osmio kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'350' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET osmiok=osmiok+'1', titanas=titanas-'8000' WHERE nick='$nick' ");


		}
	

 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas"];
	navigacija($g_n);
	

}			
if($id == "kirtmangano"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '399' || $inv['osmis'] < '12000')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/osmio.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['manganok'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Mangano kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'400' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET manganok=manganok+'1', osmis=osmis-'1200' WHERE nick='$nick' ");


		}
	

 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas"];
	navigacija($g_n);
	

}			
if($id == "kirtunikalus"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '11999' || $inv['manganas'] < '100000')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/mangano.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['unikalusk'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Unikalų kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'12000' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET unikalusk=unikalusk+'1', manganas=manganas-'100000' WHERE nick='$nick' ");


		}
	

 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas"];
	navigacija($g_n);
	

}			

if($id == "kirtunikalus2"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '49999' || $inv['kvarcas'] < '1000000')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/kvarco.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['unikalusk2'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Super Unikalų kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'50000' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET unikalusk2=unikalusk2+'1', kvarcas=kvarcas-'1000000' WHERE nick='$nick' ");


		}
	

 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas"];
	navigacija($g_n);
	

}

// manganas
if($id =='keiciumangana1'){
    online('Išteklių parduotuvėje > > Keičia manganą į vip ticketus');
    top('Iškasenų keitimas');


    if(isset($_POST['submit'])){
        $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
        $kainn = $gynybaa;
        $kiekis = $gynybaa / 0.352941176;


        if(empty($gynybaa)){
            echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
        }
        elseif($inv['manganas'] < '299' || $inv['manganas'] < $gynybaa){
            echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/mangano.png" alt="IMG" height="16" width="16">!</div>';
        }
        elseif($gynybaa < 300){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(300).' <img src="img/kasimas/mangano.png" alt="IMG" height="16" width="16">!</div>';
        } else {
            echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/mangano.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$vipt.'!</div> ';
            mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'$kiekis' WHERE nick='$nick' ");
            mysqli_query($conn,"UPDATE inv SET manganas=manganas-'$kainn' WHERE nick='$nick' ");
        }


        $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
        navigacija($g_n);}
}
if($id == "keiciumangana2"){
    online('Išteklių parduotuvėje > Keičia manganą į eurus');
    top('Iškasenų keitimas');


    if(isset($_POST['submit'])){
        $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
        $kainn = $gynybaa;
        $kiekis = $gynybaa / 5.454545455;


        if(empty($gynybaa)){
            echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
        }
        elseif($inv['manganas'] < '499' || $inv['manganas'] < $gynybaa){
            echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/mangano.png" alt="IMG" height="16" width="16">!</div>';
        }
        elseif($gynybaa < 500){
            echo '<div class="meniuc">Mažiausiai galima isikeisti '.sk(500).' <img src="img/kasimas/mangano.png" alt="IMG" height="16" width="16">!</div>';
        } else {
            echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/mangano.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$eurui.'!</div> ';
            mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$kiekis' WHERE nick='$nick' ");
            mysqli_query($conn,"UPDATE inv SET manganas=manganas-'$kainn' WHERE nick='$nick' ");
        }


        $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
        navigacija($g_n);}


}

// alavas
if($id =='keiciua1'){	
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 30;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['alavas'] < '299' || $inv['alavas'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 300){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(300).' <img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$vipt.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET alavas=alavas-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
	navigacija($g_n);}
}		
if($id == "keiciua2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 100;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['alavas'] < '499' || $inv['alavas'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 500){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(500).' <img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$eurui.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET alavas=alavas-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
		navigacija($g_n);}
	

}			
	if($id == "keiciuv1"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');

		        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 25;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['varis'] < '299' || $inv['varis'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/vario.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 300){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(300).' <img src="img/kasimas/vario.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/vario.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$vipt.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET varis=varis-'$kainn' WHERE nick='$nick' ");
			  }
			  
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
				navigacija($g_n);}
	

}			
if($id == "keiciuv2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');

				if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 50;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['varis'] < '499' || $inv['varis'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/vario.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 500){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(500).' <img src="img/kasimas/vario.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/vario.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$eurui.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET varis=varis-'$kainn' WHERE nick='$nick' ");
			  
		}

 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
				navigacija($g_n);}
	

}				
	if($id =='keiciuk1'){	
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 6;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['kadmis'] < '299' || $inv['kadmis'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 300){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(300).' <img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$vipt.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET kadmis=kadmis-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
	navigacija($g_n);}
}		
if($id == "keiciuk2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 33.3333333;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['kadmis'] < '499' || $inv['kadmis'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 500){
            echo '<div class="meniuc">Mažiausiai galima isikeisti '.sk(500).' <img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$eurui.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET kadmis=kadmis-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
		navigacija($g_n);}
	

}			
if($id =='keiciuc1'){	
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 1.5;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['cirkonis'] < '299' || $inv['cirkonis'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 300){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(300).' <img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$vipt.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET cirkonis=cirkonis-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
	navigacija($g_n);}
}		
if($id == "keiciuc2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 25;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['cirkonis'] < '499' || $inv['cirkonis'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 500){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(500).' <img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$eurui.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET cirkonis=cirkonis-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
		navigacija($g_n);}
	

}			
if($id =='keiciug1'){	
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 1.2;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['gelezis'] < '299' || $inv['gelezis'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/gelezies.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 300){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(300).' <img src="img/kasimas/gelezies.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/gelezies.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$vipt.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET gelezis=gelezis-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
	navigacija($g_n);}
}		
if($id == "keiciug2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 20;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['gelezis'] < '499' || $inv['gelezis'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/gelezies.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 500){
            echo '<div class="meniuc">Mažiausiai galima isikeisti '.sk(500).' <img src="img/kasimas/gelezies.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/gelezies.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$eurui.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET gelezis=gelezis-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
		navigacija($g_n);}
	
}
if($id =='keicius1'){	
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 0.857142857;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['sidabras'] < '299' || $inv['sidabras'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/sidabro.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 300){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(300).' <img src="img/kasimas/sidabro.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/sidabro.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$vipt.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET sidabras=sidabras-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
	navigacija($g_n);}
}		
if($id == "keicius2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 16.6666667;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['sidabras'] < '499' || $inv['sidabras'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/sidabro.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 500){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(500).' <img src="img/kasimas/sidabro.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/sidabro.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$eurui.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET sidabras=sidabras-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
		navigacija($g_n);}
	

}
if($id =='keiciuaux1'){	
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 0.666666667;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['auksas'] < '299' || $inv['auksas'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/aukso.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 300){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(300).' <img src="img/kasimas/aukso.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/aukso.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$vipt.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET auksas=auksas-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
	navigacija($g_n);}
}		
if($id == "keiciuaux2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 14.2857143;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['auksas'] < '499' || $inv['auksas'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/aukso.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 500){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(500).' <img src="img/kasimas/aukso.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/aukso.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$eurui.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET auksas=auksas-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
		navigacija($g_n);}
	

}
if($id =='keiciup1'){	
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 0.857142857;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['platina'] < '299' || $inv['platina'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/platinos.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 300){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(300).' <img src="img/kasimas/platinos.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/platinos.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$vipt.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET platina=platina-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
	navigacija($g_n);}
}		
if($id == "keiciup2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 12.5;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['platina'] < '499' || $inv['platina'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/platinos.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 500){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(500).' <img src="img/kasimas/platinos.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/platinos.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$eurui.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET platina=platina-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
		navigacija($g_n);}
	

}
if($id =='keiciut1'){	
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 0.461538462;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['titanas'] < '299' || $inv['titanas'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/titano.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 300){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(300).' <img src="img/kasimas/titano.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/titano.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$vipt.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET titanas=titanas-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
	navigacija($g_n);}
}		
if($id == "keiciut2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 11.1111111;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['titanas'] < '499' || $inv['titanas'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/titano.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 500){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(500).' <img src="img/kasimas/titano.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/titano.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$eurui.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET titanas=titanas-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
		navigacija($g_n);}
	

}
if($id =='keiciuo1'){	
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 0.4;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['osmis'] < '299' || $inv['osmis'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/osmio.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 300){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(300).' <img src="img/kasimas/osmio.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/osmio.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$vipt.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET osmis=osmis-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
	navigacija($g_n);}
}		
if($id == "keiciuo2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 10;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['osmis'] < '499' || $inv['osmis'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/osmio.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 500){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(500).' <img src="img/kasimas/osmio.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/osmio.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$eurui.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET osmis=osmis-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
		navigacija($g_n);}
	

}

if($id =='keiciuang1'){	
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 0.315789474;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['anglis'] < '299' || $inv['anglis'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/anglies.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 300){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(300).' <img src="img/kasimas/anglies.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/anglies.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$vipt.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET anglis=anglis-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
	navigacija($g_n);}
}		
if($id == "keiciuang2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 8.33333333;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['anglis'] < '499' || $inv['anglis'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/anglies.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 500){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(500).' <img src="img/kasimas/anglies.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/anglies.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$eurui.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET anglis=anglis-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
		navigacija($g_n);}
	

}

if($id =='keiciumin1'){	
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 0.272727273;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['mineralai'] < '299' || $inv['mineralai'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/mineralu.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 300){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(300).' <img src="img/kasimas/mineralu.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/mineralu.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$vipt.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET mineralai=mineralai-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
	navigacija($g_n);}
}		
if($id == "keiciumin2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 7.69230769;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['mineralai'] < '499' || $inv['mineralai'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/mineralu.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 500){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(500).' <img src="img/kasimas/mineralu.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/mineralu.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$eurui.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET mineralai=mineralai-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
		navigacija($g_n);}
	

}
if($id =='keiciuspa1'){	
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 0.24;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['spatas'] < '299' || $inv['spatas'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/spatu.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 300){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(300).' <img src="img/kasimas/spatu.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/spatu.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$vipt.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET spatas=spatas-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
	navigacija($g_n);}
}		
if($id == "keiciuspa2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 7.14285714;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['spatas'] < '499' || $inv['spatas'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/spatu.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 500){
            echo '<div class="meniuc">Mažiausiai galima isikeisti '.sk(500).' <img src="img/kasimas/spatu.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/spatu.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$eurui.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET spatas=spatas-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
		navigacija($g_n);}
	

}
if($id =='keiciukva1'){	
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 0.214285714;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['kvarcas'] < '299' || $inv['kvarcas'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/kvarco.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 300){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(300).' <img src="img/kasimas/kvarco.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/kvarco.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$vipt.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET kvarcas=kvarcas-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
	navigacija($g_n);}
}		
if($id == "keiciukva2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa / 6.66666667;
		
            
            if(empty($gynybaa)){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
	        elseif($inv['kvarcas'] < '499' || $inv['kvarcas'] < $gynybaa){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
			echo'<div class="meniuc">Tau nepakanka<img src="img/kasimas/kvarco.png" alt="IMG" height="16" width="16">!</div>';
			}		   
			elseif($gynybaa < 500){
            echo '<div class="meniuc">Mažiausiai galima isikeesti '.sk(500).' <img src="img/kasimas/kvarco.png" alt="IMG" height="16" width="16">!</div>';
            } else {
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
			echo'<div class="meniuc">Išsikeitei sėkmingai <b>'.sk($kainn).'</b><img src="img/kasimas/kvarco.png" alt="IMG" height="16" width="16"> į <b>'.sk($kiekis).'</b>'.$eurui.'!</div> ';	
	        mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$kiekis' WHERE nick='$nick' ");
			mysqli_query($conn,"UPDATE inv SET kvarcas=kvarcas-'$kainn' WHERE nick='$nick' ");
			  }

		
 $g_n[] = ["pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas"];
		navigacija($g_n);}
	

}

foot();
?>