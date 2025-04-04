<?php


echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>
   <style>
        /* Container to maintain aspect ratio */
        .video-container {
            position: relative;
            overflow: hidden;
            padding-bottom: 56.25%; /* 16:9 aspect ratio (change this value based on your video's aspect ratio) */
            height: 0;
        }

        /* Actual video element */
        .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>

";
/**
 * Import wap gay code
 */
include_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/sql.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/funkcijos.php';
$arrow = '<img src="../assets/img/right-arrow.png" width="15" height="15" style="vertical-align: bottom;"> ';
$checked = '<img src="../assets/img/checked.png" width="15" height="15" style="vertical-align: bottom;">';
$trophy = '<img src="../assets/img/trophy.png" width="18" height="18" style="vertical-align: bottom;">';
$warningIcon = '<img src="../assets/img/warning.png" width="18" height="18" style="vertical-align: bottom;">';
$skull = '<img src="../assets/img/skull.png" width="18" height="18" style="vertical-align: bottom;">';
$chest = '<img src="/../img/chest.png" height="16" width="16" />';

head2();
baneris();
topbar();
top('Legendary Bosses');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ERROR);

