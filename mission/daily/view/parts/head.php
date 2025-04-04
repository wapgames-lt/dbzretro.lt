<?php


echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";
/**
 * Import wap gay code
 */
include_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/sql.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/funkcijos.php';
head2();
baneris();
topbar();
top('Legendinės Dienos Misijos');
online('Legendinėse dienos misijose');

