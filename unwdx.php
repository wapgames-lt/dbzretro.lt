<?php

/*
Nelysk čia. :D
*/


ob_start();
include("cfg/sql.php");
include_once 'cfg/funkcijos.php';




if(laikas((int)$apie['vip']-time(),1) > 1){
    echo laikass((int)$apie['vip']-time(),1);
}