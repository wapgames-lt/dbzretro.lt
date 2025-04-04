<?php
ob_start();
include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
echo'
<div class="up">
<img src="img/baneriai/botasm.png" /></div>';

		topbar();
		?>
<style type="text/css>
table.box {border: 1px solid #aaaaaa; border-spacing: 0px;}

table.eu {color: white; text-shadow: 0 0 1px #aaaaaa; background: url("//www.iv.lt/images/eu.jpg") center;}
.eu a {color: #ffee00;}
.eu a:hover {color: white;}

table.table {border: 1px solid #aaaaaa; border-collapse: collapse; border-spacing: 0px;}
.table th {border: 1px solid #aaaaaa; padding: 4px; color: black; background-color: #eeeeee;}
.table td {border: 1px solid #aaaaaa; padding: 4px;}

td.score {width: 10%; text-align: center; cursor: pointer; color: white;}
?>
</style>
<div class="meniuc">
<p>
      <table class=table>
       <tr>
        <th>Tel. nr.</th>
        <th>Žinutės tekstas</th>
        <th>Žinutės kaina</th>
        <th>Dovanojama suma</th>
       </tr>
              <tr align=center>
        <td>1679</td>
        <td>iv1 selectaz</td>
        <td>1 Lt (0.29 &euro;)</td>
        <td>1 Lt</td>
       </tr>
              <tr align=center>
        <td>1679</td>
        <td>iv2 selectaz</td>
        <td>2 Lt (0.58 &euro;)</td>
        <td>2 Lt</td>
       </tr>
              <tr align=center>
        <td>1679</td>
        <td>iv3 selectaz</td>
        <td>3 Lt (0.87 &euro;)</td>
        <td>3 Lt</td>
       </tr>
              <tr align=center>
        <td>1679</td>
        <td>iv5 selectaz</td>
        <td>5 Lt (1.45 &euro;)</td>
        <td>5 Lt</td>
       </tr>
              <tr align=center>
        <td>1679</td>
        <td>iv10 selectaz</td>
        <td>10 Lt (2.90 &euro;)</td>
        <td>10 Lt</td>
       </tr>
              <tr align=center>
        <td>1679</td>
        <td>iv15 selectaz</td>
        <td>15 Lt (4.34 &euro;)</td>
        <td>15 Lt</td>
       </tr>
             </table>
      <p>
      	</div>
      	
<?
foot();
