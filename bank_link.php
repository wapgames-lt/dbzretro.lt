<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/funkcijos.php';
require_once 'cfg/sql.php';
require_once('cfg/web.php');
 head();

baneris();
 topbar();
 top('eurupirkimas');
function get_self_url() {
$s = substr(strtolower($_SERVER['SERVER_PROTOCOL']), 0,
strpos($_SERVER['SERVER_PROTOCOL'], '/'));
 
if (!empty($_SERVER["HTTPS"])) {
$s .= ($_SERVER["HTTPS"] == "on") ? "s" : "";
}
 
$s .= '://'.$_SERVER['HTTP_HOST'];
 
if (!empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != '80') {
$s .= ':'.$_SERVER['SERVER_PORT'];
}
 
$s .= dirname($_SERVER['SCRIPT_NAME']);
 
return $s;
}
$orderId = $nick;
 if($_POST[gen]){
try {
$self_url = get_self_url();
 
$request = WebToPay::redirectToPayment(array(
'projectid' => 43428,
'sign_password' => '6dc56828337908826a8277d768ba726d',
'orderid' => $orderId,
'amount' => $_POST['Amount'],
'currency' => 'LTL',
'country' => 'LT',
'accepturl' => $self_url.'/accept.php',
'cancelurl' => $self_url.'/cancel.php',
'callbackurl' => $self_url.'/callback.php',
'test' => 0,
));
} catch (WebToPayException $e) {
// handle exception
}}
else{

?>
<div class="meniuc">Pasirink sumą</div>
<div class="meniuc">
	<form method="post" action="">

	<input type="hidden" name="gen" value="1">
   

    <select name="Amount" class="input">
    <option value="500">5 LT(50 ltl)</option>
    <option value="1000">10 LT(100 ltl)</option>
    
    <option value="2000">20 LT(200 ltl)</option>
    <option value="5000">50 LT(500 ltl)</option>
    <option value="10000">100 LT(1100 ltl)</option>

     
     
    </select><br/>
      <input class="green_sm2" type="submit" class="button" value="Toliau">
	  
 </div>
 <?
 $g_n[] = array("pagrindinis.php", "Pagrindinis", "litai.php", "Litai", "Litų pirkimas");
 navigacija($g_n);
 ?>
      <?
 }
 foot();

?>

