<?php
function ch($url, $httpheader) {
 $ch = curl_init();
 curl_Setopt($ch, CURLOPT_URL, $url);
 curl_Setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_Setopt($ch, CURLOPT_COOKIE, $cookie);
curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
 $rez = curl_exec($ch);
 curl_close($ch);
 return $rez;
}

function preg($ka, $is) {
 preg_match('#'.$ka.'#', $is, $out);
 return $out[1];
}

$int =  1;
$httpheader = array(
'Accept-Charset: iso-8859-1, utf-8, utf-16, *;q=0.1',
'User-Agent: Opera/9.80 (Windows NT 6.1; WOW64) Presto/2.12.388 Version/12.16',
'Accept-Language: en-US, en',
'Accept: text/html, application/xml;q=0.9, application/xhtml+xml, multipart/mixed, application/vnd.wap.multipart.mixed, image/png, image/jpeg, image/gif, image/x-xbitmap, */*;q=0.1',
);

for ($a = 0; $a < $int; $a++) {

$vs = ch('http://duel.lt/index.php?kas=wap&id=registruotis2&s=h', $httpheader); 
$kodas = preg('type="hidden" maxlength="8" value="(.*?)"/></div>',''.$vs.''); 
$pilnas_url = 'http://dbgt.eu/kovos.php?go=kova&w=7&vs=36&kd='.$kodas.'';
$kaunasi = ch($pilnas_url, $cookie);
print''. $kodas.'';

}