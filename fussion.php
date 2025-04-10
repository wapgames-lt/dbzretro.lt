<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();
		topbar();
if($id == 'mokytis'){
	  echo '<div class="meniuc"><img src="img/fusion_dance.png" alt="*"></div>';
	
	 
       echo '<div class="meniuc">Susijungimo šokis - išmoke šią technika jūs galėsite susijungti su kitu žaidėju ir jūs gausite <b>3%</b> jo K.G 
        Norint išmokti <b>Susijungimo šokį</b> jūs turite buti didesnio lygio nei 100, atnešti 500 Fusion Fail.<br/>
        Dvigubas susijungimo šokis tai techniką kurią išmoke galėsite kovose uždirbti EXP žaidėjui kuris su susijunges su jumis, bei taip pat jis uždirbs EXP jums, norint išmokt dvigubą susijungimo šokį reike 1000 fussion fail
    </div>
    <div class="meniu"> '.$ico.' <a href="?id=ismokti">Išmokti susijungimo šokį</a><br/>
    '.$ico.' <a href="?id=ismokti2">Išmokti Dvigubą susijungimo šokį</a><br/>
       </div>';
    
    
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Susijungimo šokis");
	navigacija($g_n);
}

  if($id == ""){
   	top('Susijungimo šokis');
    online('Susijungimo šokis');
    $fsn = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM susijungimas WHERE nick='$nick' "));
    $fsn2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM susijungimas WHERE nick='$fsn[kitas_zaidejas]' "));
    if($fsn['ar_susijungias'] == "") $su_kuo = 'Niekuo'; else $su_kuo = $fsn['kitas_zaidejas'];
    
    echo '<div class="meniuc"><img src="img/fusion_dance.png" alt="*"></div>';
   
  
  
   
     
  
   
  
   
    if(empty($fsn['fusion_dance'])){
       echo '<div class="meniuc">Susijungimo šokis - išmoke šią technika jūs galėsite susijungti su kitu žaidėju ir jūs gausite <b>3%</b> jo K.G 
      
   
       </div>';
    
    } else {
       if(!empty($fsn['ar_kvieti'])){
          echo '<div class="meniu">
           <font color="red">Tu siūlai susijungti žaidėjui</font> <b>'.statusas($fsn['ka_kvieti']).'</b> <font color="red">!!!</font> <a href="?id=atsaukti">[X]</a>
          </div>';
       }
       echo '<div class="meniu">
     '.$ico2.'    Tu esi susijungęs su: <b>'.statusas($su_kuo).'</b> <a href="?id=delete&ID='.$su_kuo.'">[X]</a><br/>
      '.$ico2.'  Jums žaidėjas prideda: '.sk($prideda_jegos).' jegos ir '.sk($prideda_gynybos).' ginybos<br/>
        '.$ico2.' Jūs uždirbote EXP: <b>'.sk($fsn['uzdirbo_exp']).'</b><br/>
      '.$ico2.' Tau uždirbo EXP: <b>'.sk($fsn2['uzdirbo_exp']).'</b><br/>
       </div>';
       if(!empty($fsn['ar_susijungias'])){ } else {
      
       echo '<div class="meniuc">
       <form action="?id=kviesti" method="POST">
        Ką kviesite: <br/> <input name="kvieciu" type="text"><br/>
       <input type="submit" name="submit" value="Kviesti"/></form>
       </form></div>';
    }
    }
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Susijungimo šokis");
	navigacija($g_n);
    }
    
      if($id == "delete"){
      top('Susijungimo šokis');
       if($ID != $fsn['kitas_zaidejas']){
          echo '<div class="meniuc">Tu nesi susijunges su <b>'.statusas($ID).'</b>!</div>';
       } else {
          echo '<div class="meniuc">Sėkmingai atsijungei nuo <b>'.statusas($ID).'</b>!</div>';
          mysqli_query($conn,"UPDATE susijungimas SET ar_susijungias='', kitas_zaidejas='', uzdirbo_exp='0' WHERE nick='$nick'");
          mysqli_query($conn,"UPDATE susijungimas SET ar_susijungias='', kitas_zaidejas='', uzdirbo_exp='0' WHERE nick='$ID'");
       }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Susijungimo šokis");
	navigacija($g_n);
}
    
     if($id == "ismokti"){
     	top("Susijungimo šokis");
       	if($fsn['fusion_dance'] == '+'){
		       echo '<div class="meniuc">Tu jau moki <b>Susijungimo šokį</b>.</div>';
	     }
	     elseif($lygis < 100){
	        echo '<div class="meniuc">Tavo lygis per žemas! Reikia 100 lygio.</div>';
       }
       
		 elseif($inv['Fusionfail'] < 499 ){
   echo '<div class="meniuc">Neturi pakankamai Fusion fail</div>'; 	
   
       } else {
          echo '<div class="meniuc">Sėkmingai išmokai <b>Susijungimo šokį</b>.</div>';
          mysqli_query($conn,"UPDATE susijungimas SET fusion_dance='+' WHERE nick='$nick' ");
          mysqli_query($conn,"UPDATE inv SET Fusionfail=Fusionfail-'500' WHERE nick='$nick' ")or die(mysqli_error());
		  mysqli_query($conn,"UPDATE zaidejai set potara = '+' WHERE nick = '$nick'");
         
       }
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Susijungimo šokis");
	navigacija($g_n);}
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
     if($id == "ismokti2"){
     	top("Susijungimo šokis");
       	if($fsn['dauble_fusion_dance'] == '+'){
		       echo '<div class="meniuc">Tu jau moki <b>Susijungimo šokį</b>.</div>';
	     }
		elseif($fsn['fusion_dance'] == ''){
		       echo '<div class="meniuc">Pirma turi mokėti paprastą susujungimo šokį</div>';
	     }
	     elseif($lygis < 100){
	        echo '<div class="meniuc">Tavo lygis per žemas! Reikia 100 lygio.</div>';
       }
       
		 elseif($inv['Fusionfail'] < 1000 ){
   echo '<div class="meniuc">Neturi pakankamai Fusion fail</div>'; 	
   
       } else {
          echo '<div class="meniuc">Sėkmingai išmokai <b>Susijungimo šokį</b>.</div>';
          mysqli_query($conn,"UPDATE susijungimas SET dounble_fusion_dance='+' WHERE nick='$nick' ");
          mysqli_query($conn,"UPDATE inv SET Fusionfail=Fusionfail-'1000' WHERE nick='$nick' ")or die(mysqli_error());
		  mysqli_query($conn,"UPDATE zaidejai set potara = '+' WHERE nick = '$nick'");
         
       }
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Susijungimo šokis");
	navigacija($g_n);}
	   
	
		
		 if($id == "atsaukti"){
		 	top('Susijungimo šokis');
       if(empty($fsn['ar_kvieti'])){
          echo '<div class="meniuc">Tu nieko nekvieti susijungti!</div>';
       } else {
          $fsnn = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM susijungimas WHERE nick='$nick' "));
          echo '<div class="meniuc">Sėkmingai atšauktas kvietmas!</div>';
          mysqli_query($conn,"UPDATE susijungimas SET kas_kviecia='' WHERE nick='$fsnn[ka_kvieti]' ");
          mysqli_query($conn,"UPDATE susijungimas SET ar_kvieti='', ka_kvieti='' WHERE nick='$nick' ");
       } $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Susijungimo šokis");
	navigacija($g_n);}
		 
		    if($id == "priimti"){
		    	top("Susijungimo šokis");
       if(empty($fsn['kas_kviecia'])){
          echo '<div class="meniuc">Taves niekas nekviečia susijungti!</div>';
       }
       elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$ID'")) == 0){
          echo '<div class="meniuc">Toks žaidėjas neegzistuoja!</div>';
       } else {
          echo '<div class="meniuc">Sėkmingai priėmei <b>'.statusas($ID).'</b> pasiūlymą susijungti!</div>';
          mysqli_query($conn,"UPDATE susijungimas SET ar_susijungias='+', kitas_zaidejas='$nick', ar_kvieti='', ka_kvieti='' WHERE nick='$ID'");
          mysqli_query($conn,"UPDATE susijungimas SET ar_susijungias='+', kitas_zaidejas='$ID', kas_kviecia='' WHERE nick='$nick'");
       }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Susijungimo šokis");
	navigacija($g_n);
       }
  if($ka == "priimti"){
       if(empty($fsn['kas_kviecia'])){
          echo '<div class="meniuc">Taves niekas nekviečia susijungti!</div>';
       }
       elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$ID'")) == 0){
          echo '<div class="meniuc">Toks žaidėjas neegzistuoja!</div>';
       } else {
          echo '<div class="meniuc">Sėkmingai priėmei <b>'.statusas($ID).'</b> pasiūlymą susijungti!</div>';
          mysqli_query($conn,"UPDATE susijungimas SET ar_susijungias='+', kitas_zaidejas='$nick', ar_kvieti='', ka_kvieti='' WHERE nick='$ID'");
          mysqli_query($conn,"UPDATE susijungimas SET ar_susijungias='+', kitas_zaidejas='$ID', kas_kviecia='' WHERE nick='$nick'");
       }}
  
   if($id == "atmesti"){
   	top("Susijungimo šokis");
       if(empty($fsn['kas_kviecia'])){
          echo '<div class="meniuc">Tu nesi susijungęs!</div>';
       }
       elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$ID'")) == 0){
          echo '<div class="meniuc">Toks žaidėjas neegzistuoja!</div>';
       } else {
          echo '<div class="meniuc">Sėkmingai atmetei <b>'.statusas($ID).'</b> pasiūlymą susijungti!</div>';
          mysqli_query($conn,"UPDATE susijungimas SET ar_kvieti='', ka_kvieti='' WHERE nick='$ID'");
	        mysqli_query($conn,"UPDATE susijungimas SET kas_kviecia='' WHERE nick='$nick'");
       } $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Susijungimo šokis");
	navigacija($g_n);}
   if($id == 'kviesti'){
   	top("Susijungimo šokis");
	 if(isset($_POST['submit'])){
          $kak = post($_POST['kvieciu']);
          $fsnn = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM susijungimas WHERE nick='$kak' "));
          if(empty($kak)){
             echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
          }
          
		    elseif(apsas($kak) == apsas($apie['nick'])){
             echo '<div class="meniuc">Saves kviesti negalimą!</div>';
          }
		  
          elseif(empty($fsn['fusion_dance'])){
             echo '<div class="meniuc">Tu nemoki <b>Susijungimo šokio</b>!</div>';
          }
          elseif(empty($fsnn['fusion_dance'])){
             echo '<div class="meniuc">Žaidėjas <b>'.statusas($kak).'</b> nemoka <b>Susijungimo šokio</b>!</div>';
          }
          elseif(!empty($fsn['ar_susijungias'])){
             echo '<div class="meniuc">Tu jau susijungęs su <b>'.statusas($su_kuo).'</b>!</div>';
          }
          elseif(!empty($fsnn['ar_susijungias'])){
             echo '<div class="meniuc">Žaidėjas <b>'.statusas($kak).'</b> jau susijungęs!</div>';
          }
          elseif(!empty($fsn['kas_kviecia'])){
             echo '<div class="meniuc">Tave jau kažkas kviečia susijungti!</div>';
          }
          elseif(!empty($fsnn['kas_kviecia'])){
             echo '<div class="meniuc">Žaidėją <b>'.statusas($kak).'</b> jau kviečia susijungti!</div>';
          }
          elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$kak'")) == 0){
             echo '<div class="meniuc">Toks žaidėjas neegzistuoja!</div>';
          }
          elseif(!empty($fsn['ar_kvieti'])){
             echo '<div class="meniuc">Tu jau kažką kvieti susijungti!</div>';
          } else {
             echo '<div class="meniuc">Kvietimas susijungti sėkmingai išsiūstas žaidėjui <b>'.statusas($kak).'</b>!</div>';
             mysqli_query($conn,"UPDATE susijungimas SET ar_kvieti='taip', ka_kvieti='$kak' WHERE nick='$nick' ");
             mysqli_query($conn,"UPDATE susijungimas SET kas_kviecia='$nick' WHERE nick='$kak' ");
          }

       }
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Susijungimo šokis");
	navigacija($g_n);
   }
foot();
?>
