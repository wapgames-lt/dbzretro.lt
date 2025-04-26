<?php
ob_start();
session_start();
$ipas = $_SERVER['REMOTE_ADDR'];
include_once 'cfg/sql.php';
include_once 'cfg/config.php';


head();
echo'
<div class="head">dbzretro.lt</div>';


   
     if($nust['reg'] == "-"){
top('Registracija');
       echo '<div class="meniuc"><b>Registracija išjungta!</br></div></div>';
  $g_n[] = array("index.php?id=","Pagrindinis","Registracija");
	navigacija($g_n);
       }





  
else{

if($id == ""){

echo'<div class="meniuc">
<img src="img/butonai/reg.png" /></div>';
	
echo'<div class="meniuc"><img src="img/bicons/green.png" />
Pasirink savo mėgstamiausią veikėją ir  būk pirmas!</br> Kiekvienas veikėjas turi savo privalumų, pliusų bei minusų!<img src="img/bicons/green.png" /><br>
</div><div class="meniuc">
<img src="img/bicons/green.png" />Kiekvienas veikėjas turintis bent vieną transformaciją negauna papildomų veikėjo procentų jėgai ir gynybai!
O tie kurie neturi nei vienos transformacijos, gauna jėgos ir gynybos procentus vos užsiregistravę!<img src="img/bicons/green.png" />
</div>';
 
      echo'  <div class="meniuc">';
    echo '<div class="champion-select">';
    echo '<a href="?id=veik&ka=1&ID="><img src="/img/characters/goku.webp"/>Gokas</a>';
    echo '<a href="?id=veik&ka=33&ID="><img src="/img/characters/krillin.webp"/>Krilinas</a>';
    echo '<a href="?id=veik&ka=6&ID="><img src="/img/characters/bulma.webp"/>Bulma</a>';
    echo '<a href="?id=veik&ka=10&ID="><img src="/img/characters/piccolo.webp"/>Pikolas</a>';
    echo '</div>';



		echo'</div>';
$g_n[] = array("index.php","Pagrindinis","Veikėjo pasirinkimas");
navigacija($g_n);
	}}
	
if($id == 'veik'){
 $veik = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM veikejai WHERE id='$ka' "));
    
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM veikejai WHERE id='$ka'")) == 0){
  
        echo '<div class="meniuc">Tokio veikėjo nėra!</div>';
		$g_n[] = array("index.php","Pagrindinis", "registracija.php?id=reg","Veikėjo pasirinkimas", "Klaida");
navigacija($g_n);
    } else {
      
      
        if($veik['name'] == 'Vedžitas'){
            $imgssxx = 'Vedzitas';
        } else {
            $imgssxx = $veik['name'];
        }
        echo '<div class="meniuc"><img src="img/veikejaic/'.$imgssxx.'.png" width="200" height="200" ></div><div class="up">'.$imgssxx.' Bonusai</div>
<div class="meniuc">
Jėga:<b> '.$veik['jega'].'%</b><img src="img/bicons/attack1.png"><br/>
Gynyba:<b>  '.$veik['gynyba'].'%</b><img src="img/bicons/shield.png"><br/>
Gyvybes:<b>  '.$veik['gyvybes'].'%</b><img src="img/bicons/hp.png"></div>
';
		
        echo '<div class="up"> Veikėjo informacija</div><div class="meniu">
        '.$ico2.' Veikėjas: <font color="white"><b>'.$veik['name'].'</b><br/></font>
        '.$ico2.' Turi transformacijų: <font color="red"><b>'.$veik['trans'].'</b><br/></font>';
     echo'   '.$ico2.' Veikėją pasirinko: <font color="white"><b>'.mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='$veik[name]' ")).'</b> žaidėjų<br/></font>
     '.$ico2.'<b> Unikali technika</b>: <font color="red"><b>'.$veik['technika'].'</b><br/></font>  
</div>';
        echo '<div class="meniuc"><a href="?id=reg2&ka='.$veik['name'].'&ID='.$ID.'"><img src="img/bicons/green.png" />
Pasirinkti šį veikėją</a></div>';
    }
   	$g_n[] = array("index.php","Pagrindinis", "registracija.php?id=","Veikėjo pasirinkimas", "".$veik['name']." Veikėjas");
navigacija($g_n);
   }

elseif($id == 'reg3'){
	$veik = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM veikejai WHERE name='$ka' "));
	
		echo'<div class="meniuc">
<img src="img/butonai/reg.png" /></div>';
if(isset($_POST['submit'])){
            $vardas = isset($_POST['vardas']) ? preg_replace("/[^A-Za-z0-9_]/","",$_POST['vardas'])  : null;
            $pass = isset($_POST['pass']) ? preg_replace("/[^A-Za-z0-9_]/","",$_POST['pass'])  : null;
            $pass2 = isset($_POST['pass2']) ? preg_replace("/[^A-Za-z0-9_]/","",$_POST['pass2'])  : null;
            $kodas = isset($_POST['kodas']) ? preg_replace("/[^A-Za-z0-9_]/","",$_POST['kodas'])  : null;
			$ip = isset($_POST['ip']) ? preg_replace("/[^A-Za-z0-9_]/","",$_POST['ip'])  : null; 
			$vardas2 = strtolower($vardas);
            $captcha = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : null;

if(empty($vardas) OR empty($pass) OR empty($pass2)){
                $klaida = '<img src="img/bicons/dislike.png" />   Paliktas kažkuris tuščias laukelis! <img src="img/bicons/dislike.png" />  ';
            }
	
   
elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM veikejai WHERE name='$ka'")) == 0){
  
         $klaida = '<div class="meniuc">Tokio veikėjo nėra!</div>';}


            elseif(preg_match('/[^A-Za-z0-9]/', $vardas)){
                $klaida = '<img src="img/bicons/dislike.png" />
Žaidėjo varde negalima naudoti tokių simbolių!
<img src="img/bicons/dislike.png" />
';
            }
            elseif(preg_match('/[^A-Za-z0-9]/', $pass)){
                $klaida = '<img src="img/bicons/dislike.png" />
Slaptažodyje negalima naudoti tokių simbolių!
<img src="img/bicons/dislike.png" />
';
            } elseif (!$captcha) {
    $klaida = '<img src="img/bicons/dislike.png" />
Pamiršote įrodyti, kad nesate robotas.
<img src="img/bicons/dislike.png" />
';
}
            elseif(strlen($vardas) < 3){
                $klaida = '<img src="img/bicons/dislike.png" />
Žaidėjo vardas yra per trumpas. Mažiausiai 3 simboliai.
<img src="img/bicons/dislike.png" />
';
            } elseif (!isValidCaptcha($captcha)) {
    $klaida = '<img src="img/bicons/dislike.png" />
Google sako, kad esate robotas arba wap gejus.
<img src="img/bicons/dislike.png" />';
}
            elseif(strlen($vardas) > 15){
                $klaida = '<img src="img/bicons/dislike.png" />
Žaidėjo vardas yra per ilgas. Daugiausiai 15 simbolių.
<img src="img/bicons/dislike.png" />
';
            }
            elseif(strlen($pass) < 6){
                $klaida = '<img src="img/bicons/dislike.png" />
Slaptažodis yra per trumpas. Mažiausiai 6 simboliai.
<img src="img/bicons/dislike.png" />
';
            }
            elseif(strlen($pass) > 20){
                $klaida = '<img src="img/bicons/dislike.png" />
Slaptažodis yra per ilgas. Daugiausiai 20 simbolių.
<img src="img/bicons/dislike.png" />
';
            }
            elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$vardas' ")) > 0 ){
                $klaida = '<img src="img/bicons/dislike.png" />
Toks žaidėjas jau užsiregistravęs!
<img src="img/bicons/dislike.png" />
';
            }
            elseif(strcasecmp($vardas, 'sistema') === 0){
                $klaida = '<img src="img/bicons/dislike.png" />
Toks žaidėjas jau užsiregistravęs!
<img src="img/bicons/dislike.png" />
';
            }
			      elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE ip='$ipas'")) > 0 ){
                $klaida = '<font color=red>Registruotis galima tik 1 kartą!!</font>';
				  }
            elseif($pass != $pass2){
                $klaida = '<img src="img/bicons/dislike.png" />
Slaptažodžiai nesutampa!
<img src="img/bicons/dislike.png" />
';
			}
else{
			
			
                echo '<div class="meniuc"><img src="img/bicons/like.png" />  Registracija sėkminga, <b>'.$vardas2.'</b><img src="img/bicons/like.png" />
<br /><img src="img/bicons/green.png" />
Dabar galite prisijungti prie žaidimo ! :)</br>Turite kokių klausimų, įdėjų? Rašykite testas1 privačia žinutę! Sekmės žaidime!</div>';
             
				      $g_n[] = array("index.php","Pagrindinis","Registracija");
				navigacija($g_n);
				
				
                mysqli_query($conn,"INSERT INTO zaidejai SET nick='$vardas2', pass='$pass', atved='$ID', litai='50000', kred='20', sms_litai='10', veikejas='$ka', css='2', statusas='Žaidėjas', jega='60', gynyba='180', gyvybes='100', max_gyvybes='100', exp='0', expl='50', minichatas='1', mini_chat='1', lygis='1',kai ='-' ,rodymas='10', auksiniai='0', laimeta='0', laimetapl='0', pralaimetapl='0', vip ='$vip_time', pralaimeta='0',ip ='$refip', sword='Neuzdetas', armor='Neuzdetas', amuletas='Neuzdetas', vipticket='0', uzsiregistravo='".time()."' ") or die(mysqli_error());
				mysqli_query($conn,"INSERT INTO veikejas SET nick='$vardas2', veikejas='$ka' ") or die(mysqli_error());

                mysqli_query($conn,"INSERT INTO susijungimas SET nick='$vardas2' ") or die(mysqli_error());
				mysqli_query($conn,"INSERT INTO auros SET nick='$vardas2' ") or die(mysqli_error());
				mysqli_query($conn,"INSERT INTO technikos SET nick='$vardas2' ") or die(mysqli_error());
				mysqli_query($conn,"INSERT INTO pasiekimai SET nick='$vardas2' ") or die(mysqli_error());
$timxx = time()+60*60*24;      
	
				mysqli_query($conn,"UPDATE zaidejai SET antipl='$timxx' WHERE nick='$vardas2' ");
				mysqli_query($conn,"UPDATE inv SET viplvl='0' WHERE nick='$vardas2' ");
                mysqli_query($conn,"INSERT INTO user SET nick='$vardas2', meniu1='+', meniu2='+', meniu3='+' ") or die(mysqli_error());
				mysqli_query($conn,"INSERT INTO daily set nick='$vardas2', snd='-', snd2='-', snd3='-', snd4='-', snd5='-', 2snd='-', 2snd2='-', 2snd3='-', 2snd4='-', 2snd5='-', m='-', m2='-', m3='-', m4='-', m5='-' ") or die(mysqli_error());
                mysqli_query($conn,"UPDATE nustatymai SET new='$vardas2' ");
				mysqli_query($conn,"INSERT INTO pm set what='SISTEMA', gavejas='$vardas2', time='".time()."', txt='Sveikas <b>$vardas2!</b>. Tu užsiregistravai į Dragon Ball Super žaidimą!.Kaip naujokas tu gavai 50000 Pinigų ,20 Kreditų ir 10 Eurų.Kodėl būtent verta žaisti šita žaidima? Atnaujinimai daromi dažnai .Puiki administracija .Išklausoma kiekviena žaidejo nuomonė. Tad prisijunkite ir tapkite šio žaidimo dalimi. Prisijungus prie žaidimo siūlome iškart pasiimti legendinę dienos misiją. (Misijos -> Legendinės dienos misijos)', nauj='NEW'") or die(mysqli_error());
	


            }}
            if(isset($klaida)){
                echo '<div class="meniuc">
'.$klaida.'<br>
<div class="lin"></div>
<a href="?id=reg2&ka='.$veik['name'].'&ID='.$ID.'">
<img src="img/bicons/atgal.png" />Atgal</a>
</div>';
				   $g_n[] = array("index.php","Pagrindinis","Registracija");
			navigacija($g_n);
            }}
            

elseif($id == 'reg2'){
	
		$veik = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM veikejai WHERE name='$ka' "));
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM veikejai WHERE name='$ka'")) == 0){
  
        echo '<div class="meniuc"><img src="img/bicons/dislike.png" />
Tokio veikėjo nėra!
<img src="img/bicons/dislike.png" />
</div>';}
else{
	
         
   if($veik['name'] == 'Vedžitas'){
            $imgssxx = 'Vedzitas';
        } else {
            $imgssxx = $veik['name'];
        }
    $siteKey = getenv('GOOGLE_CAPTCHA_SITE_KEY');
    if (!$siteKey) {
        die('Error: Google reCAPTCHA site key not set in .env file.');
    }
        echo '<div class="meniuc"><img src="img/veikejaic/'.$imgssxx.'.png"></div>';

    echo'    <form method="post" action="?id=reg3&ka='.$ka.'&ID='.$ID.'"></font>
     
          
        <div class="up"> Jūsų duomenys</div>
		
<div class="meniuc"><img src="img/bicons/green.png" />Vardas gali būti tik iš mažųjų raidžių. Jeigu vesite didžiosiom ,tai jis bus atomatiškai pakeistas į mažajas<img src="img/bicons/green.png" /><br></div>

<div class="meniuc">
      <img src="img/bicons/log.png" />
<b>Žaidėjo vardas</b>  <font color="white"><font color="black"><br /><input type="text" name="vardas" id="user"
placeholder="Įveskite norimą vardą">
 <span id="UserDiv"></span><br /></font>
          
    <font color="black">  <img src="img/bicons/log.png" />
<b>Slaptažodis</b> </font><img src="img/bicons/log2.png" /><font color="black"> <br>
<input type="password" name="pass" id="pass"
placeholder="Įveskite norimą slaptažodį"
/> 
<span id="PassDiv"></span><br /></font>
          
      <img src="img/bicons/log.png" />
<font color="black"><b>Pakartoti slaptažodį</b></font><img src="img/bicons/log2.png" /><font color="black">
    <br /><input type="password" name="pass2" id="pass"
placeholder="Pakartokite  savo slaptažodį"
/> <span id="PassDiv"></span><br /></font>
         
      <font color="white"><br /><b>Apsauga</b><br /><br />
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>';
    echo '<div class="g-recaptcha" data-theme="dark" data-sitekey="' . htmlspecialchars($siteKey) . '"></div>';
 echo '<br /></font></font
          
         <div class="line"></div>
   <div class="meniuc">      <input type="submit" name="submit" value="Registruotis"/></form></div>
        </div>';
         
      $g_n[] = array("index.php","Pagrindinis","registracija.php?id=","Veikėjo pasirinkimas","Registracija");
navigacija($g_n);


}}


function isValidCaptcha($captcha)
{
    $secretKey = getenv('GOOGLE_CAPTCHA_SECRET');

    if (!$secretKey) {
        die('Error: Google reCAPTCHA secret key not set in .env file.');
    }

    $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$captcha}&remoteip={$_SERVER['REMOTE_ADDR']}"));

    return $response['success'] === true;
}






foot();
?>
