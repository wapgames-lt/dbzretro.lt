<?php



function ch($url) {
 $ch = curl_init();
 curl_Setopt($ch, CURLOPT_URL, $url);
 curl_Setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_Setopt($ch, CURLOPT_POSTFIELDS, "zinute=labuka");
  curl_Setopt($ch, CURLOPT_POSTFIELDS, "nick=Selectaz");
  curl_Setopt($ch, CURLOPT_POSTFIELDS, "kodas=$kodas");
 $rez = curl_exec($ch);
 curl_close($ch);
 return $rez;

}
function preg($ka, $is) {
 preg_match('#'.$ka.'#', $is, $out);
 return $out[1];
}
function preg_all($preg, $is) {
 preg_match_all('#'.$preg.'#', $is, $out);
 return $out;
}


$kodass = ch('http://ultra.gbreg.eu/?id=rasyti');
$kodas = preg('<b>Kodas:</b> (.*?)<br/>',$kodass);

print $kodas;
//print $ka;
 

function chas($url, $kodas, $kome) {
 $ch = curl_init();
 curl_Setopt($ch, CURLOPT_URL, $url);
 curl_Setopt($ch, CURLOPT_RETURNTRANSFER, true);
 //curl_Setopt($ch, CURLOPT_COOKIE, $cookie);

   curl_Setopt($ch, CURLOPT_POSTFIELDS, array('nicka'=>'asdas' , 'komentaras'=>"$kome", 'kodas'=>"$kodas"));
 
 $rez = curl_exec($ch);
 curl_close($ch);
 return $rez;

}

$cokis='as';
for($i = 1; $i < 5; $i++){
	$rnd = rand(11111,999999);
	
	$km = "labas $rnd";
$ka = chas('http://ultra.gbreg.eu/?id=rasyti2', $kodas, $km);
  print $ka;
}
   

