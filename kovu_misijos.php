<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();

topbar();
if($apie['kovu_misijos'] == '1'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='1000000' ;}
if($apie['kovu_misijos'] == '2'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='5000000' ;}
if($apie['kovu_misijos'] == '3'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='10000000' ;}
if($apie['kovu_misijos'] == '4'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='20000000' ;}
if($apie['kovu_misijos'] == '5'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='40000000' ;}
if($apie['kovu_misijos'] == '6'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='80000000' ;}
if($apie['kovu_misijos'] == '7'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='120000000' ;}
if($apie['kovu_misijos'] == '8'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='150000000' ;}
if($apie['kovu_misijos'] == '9'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='200000000' ;}
if($apie['kovu_misijos'] == '10'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='300000000' ;}
if($apie['kovu_misijos'] == '11'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='500000000' ;}
if($apie['kovu_misijos'] == '12'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='1000000000' ;}
if($apie['kovu_misijos'] == '13'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='2000000000' ;}
if($apie['kovu_misijos'] == '14'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='3000000000' ;}
if($apie['kovu_misijos'] == '15'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='5000000000' ;}
if($apie['kovu_misijos'] == '16'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='7000000000' ;}
if($apie['kovu_misijos'] == '17'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='10000000000' ;}
if($apie['kovu_misijos'] == '18'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='15000000000' ;}
if($apie['kovu_misijos'] == '19'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='20000000000' ;}
if($apie['kovu_misijos'] == '20'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='25000000000' ;}
if($apie['kovu_misijos'] == '21'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='35000000000' ;}
if($apie['kovu_misijos'] == '22'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='45000000000' ;}
if($apie['kovu_misijos'] == '23'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='70000000000' ;}
if($apie['kovu_misijos'] == '24'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='100000000000' ;}
if($apie['kovu_misijos'] == '25'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='120000000000' ;}
if($apie['kovu_misijos'] == '26'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='150000000000' ;}
if($apie['kovu_misijos'] == '27'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='200000000000' ;}
if($apie['kovu_misijos'] == '28'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='300000000000' ;}
if($apie['kovu_misijos'] == '29'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='400000000000' ;}
if($apie['kovu_misijos'] == '30'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='500000000000' ;}
if($apie['kovu_misijos'] == '31'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='700000000000' ;}
if($apie['kovu_misijos'] == '32'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='1000000000000' ;}
if($apie['kovu_misijos'] == '33'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='1500000000000' ;}
if($apie['kovu_misijos'] == '34'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='2000000000000' ;}
if($apie['kovu_misijos'] == '35'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='2500000000000' ;}
if($apie['kovu_misijos'] == '36'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='5000000000000' ;}
if($apie['kovu_misijos'] == '37'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='10000000000000' ;}
if($apie['kovu_misijos'] == '38'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='20000000000000' ;}
if($apie['kovu_misijos'] == '39'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='40000000000000' ;}
if($apie['kovu_misijos'] == '40'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='70000000000000' ;}
if($apie['kovu_misijos'] == '41'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='100000000000000' ;}
if($apie['kovu_misijos'] == '42'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='150000000000000' ;}
if($apie['kovu_misijos'] == '43'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='250000000000000' ;}
if($apie['kovu_misijos'] == '44'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='350000000000000' ;}
if($apie['kovu_misijos'] == '45'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='500000000000000' ;}
if($apie['kovu_misijos'] == '46'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='1000000000000000' ;}
if($apie['kovu_misijos'] == '47'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='2000000000000000' ;}
if($apie['kovu_misijos'] == '48'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='5000000000000000' ;}
if($apie['kovu_misijos'] == '49'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='10000000000000000' ;}
if($apie['kovu_misijos'] == '50'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='20000000000000000' ;}
if($apie['kovu_misijos'] == '51'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='30000000000000000' ;}
if($apie['kovu_misijos'] == '52'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='50000000000000000' ;}
if($apie['kovu_misijos'] == '53'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='100000000000000000' ;}
if($apie['kovu_misijos'] == '54'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='200000000000000000' ;}
if($apie['kovu_misijos'] == '55'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='500000000000000000' ;}
if($apie['kovu_misijos'] == '56'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='1000000000000000000' ;}
if($apie['kovu_misijos'] == '57'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='2000000000000000000' ;}
if($apie['kovu_misijos'] == '58'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='5000000000000000000' ;}
if($apie['kovu_misijos'] == '59'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='10000000000000000000' ;}
if($apie['kovu_misijos'] == '60'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='20000000000000000000' ;}
if($apie['kovu_misijos'] == '61'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='30000000000000000000' ;}
if($apie['kovu_misijos'] == '62'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='50000000000000000000' ;}
if($apie['kovu_misijos'] == '63'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='100000000000000000000' ;}
if($apie['kovu_misijos'] == '64'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='200000000000000000000' ;}
if($apie['kovu_misijos'] == '65'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='300000000000000000000' ;}
if($apie['kovu_misijos'] == '66'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='400000000000000000000' ;}
if($apie['kovu_misijos'] == '67'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='500000000000000000000' ;}
if($apie['kovu_misijos'] == '68'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='600000000000000000000' ;}
if($apie['kovu_misijos'] == '69'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='700000000000000000000' ;}
if($apie['kovu_misijos'] == '70'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='800000000000000000000' ;}
if($apie['kovu_misijos'] == '71'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='1000000000000000000000' ;}
if($apie['kovu_misijos'] == '72'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='2000000000000000000000' ;}
if($apie['kovu_misijos'] == '73'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='3000000000000000000000' ;}
if($apie['kovu_misijos'] == '74'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='4000000000000000000000' ;}
if($apie['kovu_misijos'] == '75'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='5000000000000000000000' ;}
if($apie['kovu_misijos'] == '76'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='6000000000000000000000' ;}
if($apie['kovu_misijos'] == '77'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='7000000000000000000000' ;}
if($apie['kovu_misijos'] == '78'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='8000000000000000000000' ;}
if($apie['kovu_misijos'] == '79'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='9000000000000000000000' ;}
if($apie['kovu_misijos'] == '80'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='10000000000000000000000' ;}
if($apie['kovu_misijos'] == '81'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='20000000000000000000000' ;}
if($apie['kovu_misijos'] == '82'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='50000000000000000000000' ;}
if($apie['kovu_misijos'] == '83'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='100000000000000000000000' ;}
if($apie['kovu_misijos'] == '84'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='200000000000000000000000' ;}
if($apie['kovu_misijos'] == '85'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='300000000000000000000000' ;}
if($apie['kovu_misijos'] == '86'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='400000000000000000000000' ;}
if($apie['kovu_misijos'] == '87'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='500000000000000000000000' ;}
if($apie['kovu_misijos'] == '88'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='700000000000000000000000' ;}
if($apie['kovu_misijos'] == '89'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='1000000000000000000000000' ;}
if($apie['kovu_misijos'] == '90'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='2000000000000000000000000' ;}
if($apie['kovu_misijos'] == '91'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='4000000000000000000000000' ;}
if($apie['kovu_misijos'] == '92'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='5000000000000000000000000' ;}
if($apie['kovu_misijos'] == '93'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='7000000000000000000000000' ;}
if($apie['kovu_misijos'] == '94'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='10000000000000000000000000' ;}
if($apie['kovu_misijos'] == '95'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='20000000000000000000000000' ;}
if($apie['kovu_misijos'] == '96'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='30000000000000000000000000' ;}
if($apie['kovu_misijos'] == '97'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='40000000000000000000000000' ;}
if($apie['kovu_misijos'] == '98'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='50000000000000000000000000' ;}
if($apie['kovu_misijos'] == '99'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='70000000000000000000000000' ;}
if($apie['kovu_misijos'] == '100'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='100000000000000000000000000' ;}
if($apie['kovu_misijos'] == '101'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='150000000000000000000000000' ;}
if($apie['kovu_misijos'] == '102'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='200000000000000000000000000' ;}
if($apie['kovu_misijos'] == '103'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='250000000000000000000000000' ;}
if($apie['kovu_misijos'] == '104'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='300000000000000000000000000' ;}
if($apie['kovu_misijos'] == '105'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='350000000000000000000000000' ;}
if($apie['kovu_misijos'] == '106'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='400000000000000000000000000' ;}
if($apie['kovu_misijos'] == '107'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='450000000000000000000000000' ;}
if($apie['kovu_misijos'] == '108'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='500000000000000000000000000' ;}
if($apie['kovu_misijos'] == '109'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='600000000000000000000000000' ;}
if($apie['kovu_misijos'] == '110'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='700000000000000000000000000' ;}
if($apie['kovu_misijos'] == '111'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='1000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '112'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='2000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '113'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='3000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '114'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='4000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '115'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='5000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '116'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='6000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '117'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='7000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '118'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='8000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '119'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='9000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '120'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='10000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '121'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='20000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '122'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='30000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '123'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='40000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '124'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='50000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '125'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='60000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '126'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='70000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '127'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='80000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '128'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='90000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '129'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='100000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '130'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='200000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '131'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='300000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '132'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='400000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '133'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='500000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '134'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='600000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '135'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='700000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '136'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='800000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '137'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='900000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '138'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='1000000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '139'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='2000000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '140'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='3000000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '141'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='4000000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '142'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='5000000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '143'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='6000000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '144'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='7000000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '145'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='8000000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '146'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='9000000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '147'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='10000000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '148'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='20000000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '149'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='30000000000000000000000000000000' ;}
if($apie['kovu_misijos'] == '150'){$img ='kovu_misijos'; $vieta = 'inv'; $reikia = 'KG'; $kiek ='40000000000000000000000000000000' ;}

if($id == ''){
top('Kovų misijos');
	if((int)$user['istorijos_time']-time()> 0){
			top('Kovų misijos');
			echo'<div class="meniuc">
<img src="img/bicons/like.png" />
Tu esi perėjas visas misijas!
<img src="img/bicons/like.png" />
</div>';
		
	
	}
	elseif($apie['kovu_misijos'] != '150'){ 


echo '<div class="meniuc">
<b>Kovų misijos</b> - tai misijos, kuriose turite nukauti tam tikros KG priešą ir už tai gausite atlygį!:)
</div>
<div class="meniuc">  <a href="?id=progresas"><font color="red"><small>Kovų misijų progresas</font> </small></a>
</div>
<div class="meniuc">
<img src="img/imgg/'.$img.'.png"></div>
<div class="meniuc">
Reikia nukauti priešą  <b><font color="red">'.skaicius($kiek).' </font>'.$reikia.'</b> 




<br>
</div>
<div class="meniuc"> Dabar vygdai  '.$apie['kovu_misijos'].' iš 150</div>
';



$ID = rand(100000,999999);
$_SESSION['no_refresh'] = $ID;
echo'<div class="meniuc">  <a href="?id=kovu&ID='.$ID.'"><small><input type="submit" Value="Nukauti šį priešą"/> </small></a>
</div>';}

else{

	echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo'<div class="meniuc">Tu perėjai visas kovų misijas!</div>';
		
}


$g_n[] = array('pagrindinis.php?id=', 'Pagrindinis',"kovu_misijos.php","Kovų misijas", "Misijų vygdymas");
navigacija($g_n);

}
elseif($id == 'kovu'){

if($apie['kovu_misijos'] == 1){
if($kg < 999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 2){
if($kg < 4999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 3){
if($kg < 9999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/nmisijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 4){
if($kg < 19999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 5){
if($kg < 39999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!<br><small>Perėjai <b>5</b> kovų misijas!<small><br>Už tai gaunate, <b>35</b> Majin scroll!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE inv SET  Majinsroll=Majinsroll+'35'  WHERE nick = '$nick'");


}
}	
if($apie['kovu_misijos'] == 6){
if($kg < 79999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 7){
if($kg < 119999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 8){
if($kg < 149999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 9){
if($kg < 199999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	

if($apie['kovu_misijos'] == 10){
if($kg < 299999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!<br><small>Perėjai <b>10</b> kovų misijų!<small><br>Už tai gaunate, <b>50</b> Μikroskemų!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE inv SET  Microshem=Microshem+'50'  WHERE nick = '$nick'");


}
}	
if($apie['kovu_misijos'] == 11){
if($kg < 499999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 12){
if($kg < 999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 13){
if($kg < 1999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 14){
if($kg < 2999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 15){
if($kg < 4999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!<br><small>Perėjai <b>15</b> kovų misijų!<small><br>Už tai gaunate, <b>100</b> Stone!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE inv SET  Stone=Stone+'100'  WHERE nick = '$nick'");


}
}	
if($apie['kovu_misijos'] == 16){
if($kg < 6999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 17){
if($kg < 9999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 18){
if($kg < 14999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 19){
if($kg < 19999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 20){
if($kg < 24999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!<br><small>Perėjai <b>20</b> kovų misijų!<small><br>Už tai gaunate, <b>350</b> Kreditų</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  kred=kred+'350'  WHERE nick = '$nick'");


}
}	
if($apie['kovu_misijos'] == 21){
if($kg < 34999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 22){
if($kg < 44999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 23){
if($kg < 69999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 24){
if($kg < 99999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	

if($apie['kovu_misijos'] == 25){
if($kg < 119999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!<br><small>Perėjai <b>25</b> kovų misijų!<small><br>Už tai gaunate, <b>1 Mlrd</b> Pinigų!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  litai=litai+'1000000000'  WHERE nick = '$nick'");


}
}	
if($apie['kovu_misijos'] == 26){
if($kg < 149999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 27){
if($kg < 199999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 28){
if($kg < 299999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 29){
if($kg < 399999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 30){
if($kg < 499999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!<br><small>Perėjai <b>30</b> kovų misijų!<small><br>Už tai gaunate, <b>150</b> Power Stone!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE inv SET Powerstone=Powerstone+'150'  WHERE nick = '$nick'");


}
}	
if($apie['kovu_misijos'] == 31){
if($kg < 699999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 32){
if($kg < 999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 33){
if($kg < 1499999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 34){
if($kg < 1999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 35){
if($kg < 2499999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!<br><small>Perėjai <b>35</b> kovų misijų!<small><br>Už tai gaunate, <b>1,800</b> Fusion Fail!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE inv SET Fusionfail=Fusionfail+'1800'  WHERE nick = '$nick'");


}
}	

if($apie['kovu_misijos'] == 36){
if($kg < 4999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 37){
if($kg < 9999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 38){
if($kg < 19999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 39){
if($kg < 39999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 40){
if($kg < 69999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!<br><small>Perėjai <b>40</b> kovų misijų!<small><br>Už tai gaunate, <b>2,000</b> Κario tobulėjimo!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE inv SET tobulas=tobulas+'2000'  WHERE nick = '$nick'");


}
}	
if($apie['kovu_misijos'] == 41){
if($kg < 99999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 42){
if($kg < 149999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 43){
if($kg < 249999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 44){
if($kg < 349999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 45){
if($kg < 499999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!<br><small>Perėjai <b>45</b> kovų misijų!<small><br>Už tai gaunate, <b>2,500</b> Mikroskemų!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE inv SET Microshem=Microshem+'2500'  WHERE nick = '$nick'");


}
}	
if($apie['kovu_misijos'] == 46){
if($kg < 999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 47){
if($kg < 1999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 48){
if($kg < 4999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 49){
if($kg < 9999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 50){
if($kg < 19999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!<br><small>Perėjai <b>50</b> kovų misijų!<small><br>Už tai gaunate, <b>3,000</b> Angelo sparnų!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE inv SET angelwing=angelwing+'3000'  WHERE nick = '$nick'");


}
}	
if($apie['kovu_misijos'] == 51){
if($kg < 29999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 52){
if($kg < 49999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 53){
if($kg < 99999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 54){
if($kg < 199999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 55){
if($kg < 499999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 56){
if($kg < 999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 57){
if($kg < 1999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 58){
if($kg < 4999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 59){
if($kg < 9999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 60){
if($kg < 19999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!<br><small>Perėjai <b>60</b> kovų misijų!</small><br>Už tai gaunate, <b5,000</b> Angelo sparnų!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE inv SET angelwing=angelwing+'5000'  WHERE nick = '$nick'");


}
}	
if($apie['kovu_misijos'] == 61){
if($kg < 29999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 62){
if($kg < 49999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 63){
if($kg < 99999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 64){
if($kg < 199999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 65){
if($kg < 299999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!<br><small>Perėjai <b>65</b> kovų misijų!<small><br>Už tai gaunate, <b10,000</b>Kario tobulėjimo!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE inv SET tobulas=tobulas+'10000'  WHERE nick = '$nick'");


}
}	
if($apie['kovu_misijos'] == 66){
if($kg < 399999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 67){
if($kg < 499999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 68){
if($kg < 599999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 69){
if($kg < 699999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 70){
if($kg < 799999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!<br><small>Perėjai <b>70</b> kovų misijų!</small><br><small>Už tai gaunate, <b12,000</b> Mikroskemų!</b></small></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE inv SET Microshem=Microshem+'12000'  WHERE nick = '$nick'");


}
}	
if($apie['kovu_misijos'] == 71){
if($kg < 999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 72){
if($kg < 1999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 73){
if($kg < 2999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 74){
if($kg < 3999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 75){
if($kg < 4999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 76){
if($kg < 5999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 77){
if($kg < 6999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 78){
if($kg < 7999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 79){
if($kg < 8999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 80){
if($kg < 9999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!<br><small>Perėjai <b>80</b> kovų misijų!</small><br><small>Už tai gaunate, <b13,000</b> Mirties Item!</b></small></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE inv SET mirties_item=mirties_item+'13000'  WHERE nick = '$nick'");


}
}	
if($apie['kovu_misijos'] == 81){
if($kg < 19999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 82){
if($kg < 49999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 83){
if($kg < 99999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 84){
if($kg < 199999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 85){
if($kg < 299999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 86){
if($kg < 399999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 87){
if($kg < 499999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 88){
if($kg < 69999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 89){
if($kg < 999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 90){
if($kg < 1999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!<br><small>Perėjai <b>90</b> kovų misijų!</small><br><small>Už tai gaunate, <b10,000</b> Atgimimo Item!</b></small></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE inv SET atgimimo_item=atgimimo_item+'10000'  WHERE nick = '$nick'");


}
}	
if($apie['kovu_misijos'] == 91){
if($kg < 3999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 92){
if($kg < 4999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 93){
if($kg < 6999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 94){
if($kg < 9999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 95){
if($kg < 19999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 96){
if($kg < 29999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 97){
if($kg < 39999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 98){
if($kg < 49999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 99){
if($kg < 69999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 100){
if($kg < 99999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!<br><small>Perėjai <b>100</b> kovų misijų!</small><br><small>Už tai gaunate, <b>Infinity Setą!</b></small></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");
mysqli_query($conn,"UPDATE inv SET infinity_armor=infinity_armor+'1' , infinity_sword=infinity_sword+'1' WHERE nick = '$nick'");


}
}	

if($apie['kovu_misijos'] == 101){
if($kg < 149999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	

if($apie['kovu_misijos'] == 102){
if($kg < 199999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 103){
if($kg < 249999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 104){
if($kg < 299999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 105){
if($kg < 299999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 106){
if($kg < 349999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 107){
if($kg < 399999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 108){
if($kg < 499999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 109){
if($kg < 599999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 110){
if($kg < 699999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!<br><small>Perėjai <b>110</b> kovų misijų!</small><br><small>Už tai gaunate, <b>25 BotCash!</b></small></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1', botas=botas+'25' WHERE nick = '$nick'");



}
}	
if($apie['kovu_misijos'] == 111){
if($kg < 999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 112){
if($kg < 1999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 113){
if($kg < 2999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 114){
if($kg < 3999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 115){
if($kg < 4999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 116){
if($kg < 5999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 117){
if($kg < 6999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 118){
if($kg < 7999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 119){
if($kg < 8999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 120){
if($kg < 9999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!<br><small>Perėjai <b>120</b> kovų misijų!</small><br><small>Už tai gaunate, <b>100 BotCash!</b></small></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1', botas=botas+'100' WHERE nick = '$nick'");



}
}	
if($apie['kovu_misijos'] == 121){
if($kg < 19999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 122){
if($kg < 29999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 123){
if($kg < 39999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 124){
if($kg < 49999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 125){
if($kg < 59999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 126){
if($kg < 69999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 127){
if($kg < 79999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 128){
if($kg < 89999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 129){
if($kg < 99999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 130){
if($kg < 199999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!<br><small>Perėjai <b>130</b> kovų misijų!</small><br><small>Už tai gaunate, <b>200 BotCash!</b></small></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1', botas=botas+'200' WHERE nick = '$nick'");



}
}	
if($apie['kovu_misijos'] == 131){
if($kg < 299999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 132){
if($kg < 399999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 133){
if($kg < 499999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 134){
if($kg < 599999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 135){
if($kg < 699999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 136){
if($kg < 799999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 137){
if($kg < 899999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 138){
if($kg < 999999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 139){
if($kg < 1999999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 140){
if($kg < 2999999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!<br><small>Perėjai <b>140</b> kovų misijų!</small><br><small>Už tai gaunate, <b>400 BotCash!</b></small></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1', botas=botas+'400' WHERE nick = '$nick'");



}
}	





if($apie['kovu_misijos'] == 141){
if($kg < 3999999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 142){
if($kg < 4999999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 143){
if($kg < 5999999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 144){
if($kg < 6999999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 145){
if($kg < 7999999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 146){
if($kg < 7999999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 147){
if($kg < 9999999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	
if($apie['kovu_misijos'] == 148){
if($kg < 19999999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	

if($apie['kovu_misijos'] == 149){
if($kg < 29999999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!</b></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1'  WHERE nick = '$nick'");

}
}	

if($apie['kovu_misijos'] == 150){
if($kg < 39999999999999999999999999999999 ){
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
		echo'<div class="meniuc">
 <b>Neturi tiek KG!</b></div>';}
else{
echo'<div class="meniuc">
<img src="img/imgg/kovu_misijos.png"></div>';
	echo '<div class="meniuc"><b>Sekmingai nukovei priešą!<br><small>Perėjai <b>150</b> kovų misijų!</small><br><small>Už tai gaunate, <b>600 BotCash!</b></small></div>';
	mysqli_query($conn,"UPDATE zaidejai SET  kovu_misijos=kovu_misijos+'1', botas=botas+'600' WHERE nick = '$nick'");


}
}	
$g_n[] = array('pagrindinis.php?id=', 'Pagrindinis',"kovu_misijos.php","Kovų misijas", "Misijų vygdymas");
navigacija($g_n);


}

foot();
?>
