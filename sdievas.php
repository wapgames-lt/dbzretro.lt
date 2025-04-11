<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";


include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();

baneris();

topbar();
if ($id == "sdball") {
    top('Super drakono rutukiai');
    online('Keičia rutulius');

    if (($apie['lazdele']) == '') {
        echo '<div class="meniuc"><img src=img/imgg/namai.png><alt="**"></div>
    <div class="meniuc">
   Tu neturi lazdelės, todėl negali įeiti į dievo rūmus, lazdelę gali gauti karino bokšte!
 </div>  ';


        $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "dievas.php", "Dievo namai", "Laiko ir sielos kambarys");
        navigacija($g_n);
    } else {

        if ($inv['dball'] < 700) {
            echo '<div class="meniuc"><img src="img/shenrons.png" alt="*"></div>';
            echo '<div class="meniuc">Neturi 700 drakono rutulių!</div>';

        } else {

            echo '<div class="meniuc"><img src="img/shenrons.png" alt="*"></div>';
            echo '<div class="meniuc">';
            if ($ka == 1) {
                echo 'Jūs išsikeitėte 700 drakono rutulių į <b>Super drakono rutulį</b>! </div>';
                mysqli_query($conn,"UPDATE inv  SET sdball=sdball+'1' WHERE nick='$nick' ");
                mysqli_query($conn,"UPDATE inv SET dball=dball-'700' WHERE nick='$nick'") or die(mysqli_error());
            } else {
                echo 'Sveikas ' . statusas($nick) . '. Keiskite savo turimus rutulius į Super Rutulius!</div>';
                echo '<div class="title">
         <b>1.</b> <a href="?id=sdball&ka=1">Keisti<b> 700 drakono rutulių</b> į <b>Super drakono rutulį</b>!</a><br/>
        
         </div>';
            }
        }
    }
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "dievas.php", "Dievo namai", "Keitimas");
    navigacija($g_n);
} elseif ($id == "shenrons") {
    top('Super dievas drakonas');
    online('Kviečią Super Dievą drakoną');
    if (($apie['lazdele']) == '') {
        echo '<div class="meniuc"><img src=img/imgg/namai.png><alt="**"></div>
    <div class="meniuc">
   Tu neturi lazdelės, todėl negali įeiti į dievo rūmus, lazdelę gali gauti karino bokšte!
 </div>  ';


        $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "dievas.php", "Dievo namai", "Laiko ir sielos kambarys");
        navigacija($g_n);
    } else {


        if ($inv['sdball'] < 7) {
            echo '<div class="meniuc"><img src="img/shenrons.png" alt="*"></div>';
            echo '<div class="meniuc">Neturi 7 <b>Super drakono rutulių!</b></div>';

        } else {

            echo '<div class="meniuc"><img src="img/shenrons.png" alt="*"></div>';
            echo '<div class="meniuc">';
            if ($co == 1) {
                echo 'Jūsų noras išpildytas! Gavai 5000  <b>AD17</Bb></div>';
                mysqli_query($conn,"UPDATE inv SET ad17=ad17+'5000' WHERE nick='$nick' ");
                mysqli_query($conn,"UPDATE inv SET sdball=sdball-'7' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($co == 2) {
                echo 'Jūsų noras išpildytas! Gavai 50 <b>Vegeta Cash</Bb></div>';
                mysqli_query($conn,"UPDATE zaidejai SET botas=botas+'50' WHERE nick='$nick' ");
                mysqli_query($conn,"UPDATE inv SET sdball=sdball-'7' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($co == 3) {
                echo 'Jūsų noras išpildytas! Gavai 1000000000 <b>Vip Ticket</Bb></div>';
                mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'1000000000' WHERE nick='$nick' ");
                mysqli_query($conn,"UPDATE inv SET sdball=sdball-'7' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($co == 4) {
                echo 'Jūsų noras išpildytas! Gavai 1000000000000 <b>Pinigų</Bb></div>';
                mysqli_query($conn,"UPDATE zaidejai SET litai=litai+'1000000000000' WHERE nick='$nick' ");
                mysqli_query($conn,"UPDATE inv SET sdball=sdball-'7' WHERE nick='$nick'") or die(mysqli_error());
            }
            $timxx = time() + 60 * 60 * 24 * 1000;
            if ($co == 5) {
                echo 'Jūsų noras išpildytas! Gavai <b>Gokas Ultra Instinct</Bb></div>';
                mysqli_query($conn,"UPDATE zaidejai SET veikejas='Gokas Ultra Instinct', trans='0', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
                mysqli_query($conn,"UPDATE zaidejai SET gokasultrab='$timxx' WHERE nick='$nick' ");
                mysqli_query($conn,"UPDATE inv SET sdball=sdball-'7' WHERE nick='$nick'") or die(mysqli_error());
            }
            if ($co == 6 && $apie['vip'] - time() < 0) {
                echo 'Jūsų noras išpildytas! Gavai <b>VIP privilegiją 14 dienų</b></div>';
                $vip_time = time() + 3600 * 24 * 14;

                mysqli_query($conn,"UPDATE zaidejai SET vip='$vip_time' WHERE nick='$nick'");
                mysqli_query($conn,"UPDATE inv SET sdball=sdball-'7' WHERE nick='$nick'") or die(mysqli_error());
            } else {
                echo 'Sveikas ' . statusas($nick) . '. Koki norą nori kad išpildyčiau?</div>';
                echo '<div class="title">
         <b>1.</b> <a href="?id=shenrons&co=1">Noriu už norą - <b> 5000</b> AD17 Item </a><br/>
		 <b>2.</b> <a href="?id=shenrons&co=2">Noriu už norą - <b> 50 Vegeta Cash </b></a><br/>
		 <b>3.</b> <a href="?id=shenrons&co=3">Noriu už norą - <b> 1000000000</b> Vip Ticket </b></a><br/>
		 <b>4.</b> <a href="?id=shenrons&co=4">Noriu už norą - <b> 1000000000000 pinigu</b></a><br/>
		 <b>5.</b> <a href="?id=shenrons&co=5">Noriu už norą - <b> Gokas Ultra Instinct</b></a><br/>
		 <b>6.</b> <a href="?id=shenrons&co=6">Noriu už norą - <b> VIP privilegija 14 dienų</b></a><br/>
		 
       
         </div>';
            }
        }
    }
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "dievas.php", "Dievo namai", "Super dievas drakonas");
    navigacija($g_n);
}


foot();
?>
