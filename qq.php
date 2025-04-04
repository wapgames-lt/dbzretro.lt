<?php
function ch($url, $cookie) {
 $ch = curl_init();
 curl_Setopt($ch, CURLOPT_URL, $url);
 curl_Setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_Setopt($ch, CURLOPT_COOKIE, $cookie);
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

$zeme ='Hell';
$name = 'Hell General Rilldo';
$cookie = 'nick=selectaz;pass=a8f5f167f44f4964e6c998dee827110c';


for ($a = 0; $a < 1; $a++) {
 $vs = ch('http://vegeta.us.lt/fighting.php?id='.$zeme, $cookie); 
 $kodas = preg('kd=(.*?)&',$vs); // get koda
 $pilnas_url = 'http://vegeta.us.lt/fighting.php?id=kova&vs='.$name.'&kd='.$kodas.'&kas=mem';
 $kaunasi = ch($pilnas_url, $cookie);
 
 print''.$kraunasi.'';
 sleep(5);
}