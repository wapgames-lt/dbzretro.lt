<?php

/*
Nelysk čia. :D
*/


ob_start();
include("cfg/sql.php");
include_once 'cfg/funkcijos.php';




if(laikas($apie['vip']-time(),1) > 1){
    echo laikass($apie['vip']-time(),1);
}