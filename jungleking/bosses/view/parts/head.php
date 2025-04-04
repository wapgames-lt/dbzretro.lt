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
head2();
baneris();
topbar();
top('Jungle King bosai');
online('Kapoja Jungle King bosus');

