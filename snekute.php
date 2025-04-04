<?php
ob_start();
include'cfg/sql.php';
include_once 'cfg/funkcijos.php';

if(preg_match("#isvalyk#", $zin) && apsas($statusas) == apsas('Admin')){
		mysql_query("DELETE FROM pokalbiai");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Išvaliau zujkuti:* ', data='".time()."'");
			
			
		}
	elseif(preg_match("#isvalyk#", $zin) && apsas($nick) == apsas('sajanas')){
		mysql_query("DELETE FROM pokalbiai");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Išvaliau mažuti:* ', data='".time()."'");
			
			
		}
//dalybos
	elseif(preg_match("#dalybos#", $zin) && apsas($nick) == apsas('sajanas')){
		

mysql_query("INSERT INTO pm SET what='Snekute', txt='$zinute', gavejas='$onn[1]', time='".time()."', nauj='NEW' ") or die(mysql_error());

mysql_query("UPDATE zaidejai SET litai=litai+'100000000', sms_litai=sms_litai+'100', auksiniai=auksiniai+'5000', kred=kred+'200', vipticket=vipticket+'2000' WHERE nick='$onn[1]'");	
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Padariau dalybas! Pisu protą, nieką nepadariau :xi ', data='".time()."'");
		
			
		}






elseif(preg_match("#on sistem#", $zin) && apsas($nick) == apsas('sajanas')){
		mysql_query("UPDATE nustatymai SET snekute='+'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Kaip liepsi, CORE ', data='".time()."'");
			
			
		}

elseif(preg_match("#off sistem#", $zin) && apsas($nick) == apsas('sajanas')){
		mysql_query("UPDATE nustatymai SET snekute='-'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Kaip liepsi, CORE ', data='".time()."'");
			
			
		}


elseif($nust['snekute'] == "-"){

}
else{

if($nust['snekute'] == "+"){


       
       



		if(preg_match("#sveiki#", $zin)){
		
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='$nick sveikas:*', data='".time()."'");
			
		
		

}
if(preg_match("#kas yra duchas?#", $zin)){
		
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='$nick yra duchas:p', data='".time()."'");
			
			
		}



		if(preg_match("#kas geriausias#", $zin)){
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='CORE geriausias :P', data='".time()."'");
			
			
		}
			if(preg_match("#dirbam#", $zin)){
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Eik tu melagi, nieko tu nedirbi :P', data='".time()."'");
			
			
		}
				if(preg_match("#ka jus#", $zin)){
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='spardom tave xD', data='".time()."'");
			
			
		}

				if(preg_match("#tulpe#", $zin)){
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Tavo tėvas, bybį čiulpė:p', data='".time()."'");
			
			
		}
/// reklama
				if(preg_match("#.us.lt#", $zin)){
$ti = time()+90000;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Reklama!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#.lt#", $zin)){
$ti = time()+90000;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Reklama!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#.LT#", $zin)){
$ti = time()+90000;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Reklama!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#.us.Lt#", $zin)){
$ti = time()+90000;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Reklama!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#.Lt#", $zin)){
$ti = time()+90000;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Reklama!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#.lt#", $zin)){
$ti = time()+90000;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Reklama!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#.US.LT#", $zin)){
$ti = time()+90000;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Reklama!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
		if(preg_match("#Dbgods#", $zin)){
$ti = time()+90000;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Reklama!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
		if(preg_match("#D B G O D S#", $zin)){
$ti = time()+90000;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Reklama!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
		if(preg_match("#.com#", $zin)){
$ti = time()+90000;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Reklama!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
		if(preg_match("#dbgods lt#", $zin)){
$ti = time()+90000;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Reklama!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
		if(preg_match("#dbgods.lt#", $zin)){
$ti = time()+90000;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Reklama!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
		if(preg_match("#wapas us lt#", $zin)){
$ti = time()+90000;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Reklama!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
		if(preg_match("#wapas.us.lt#", $zin)){
$ti = time()+90000;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Reklama!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
		if(preg_match("#.COM#", $zin)){
$ti = time()+90000;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Reklama!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
		if(preg_match("#.LT#", $zin)){
$ti = time()+90000;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Reklama!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}

if(preg_match("#.com#", $zin)){
$ti = time()+90000;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Reklama!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}

if(preg_match("#.Com#", $zin)){
$ti = time()+90000;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Reklama!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}

/// keikiasi
if(preg_match("#duxas#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}

if(preg_match("#duchas#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#dx#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}

if(preg_match("#blet#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#nx#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}

if(preg_match("#naxui#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}

if(preg_match("#nachui#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}

if(preg_match("#Blet#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#n a x u i#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#b l e t#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#s t e r v a#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#lopas#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#padla#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#zertva#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#žertva#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#suka#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#sūka#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}

if(preg_match("#šliūndra#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#sliundra#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#gaidys#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}

if(preg_match("#pyderas#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#pidaras#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#bybys#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#pimpalas#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#byby#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#kurva#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#krw#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}

if(preg_match("#krv#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}

if(preg_match("#pideriuga#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
/// end
if(preg_match("#Duxas#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}

if(preg_match("#Duchas#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#Dx#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#Nx#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}

if(preg_match("#Naxui#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}

if(preg_match("#Nachui#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#Lopas#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#Padla#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#Zertva#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#Žertva#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#Suka#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#Sūka#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}

if(preg_match("#Šliūndra#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#Sliundra#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#Gaidys#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}


if(preg_match("#Pyderas#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#Pidaras#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#Bybys#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
		}
if(preg_match("#Pimpalas#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#Byby#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}
if(preg_match("#Kurva#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
mysql_query("UPDATE user SET gavomute=gavomute+'1' WHERE nick = '$nick'") or die(mysql_error());
		}

if(preg_match("#Krw#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
		}

if(preg_match("#Krv#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
		}

if(preg_match("#Pideriuga#", $zin)){
$ti = time()+900;
	    mysql_query("INSERT INTO block1 SET nick = '$nick', uz='Nesikeik daugiau!', kas_ban='Snekute', time='$ti'");
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prisižaidei!', data='".time()."'");
		}
/// end
				if(preg_match("Kur yra adminas?#", $zin)){
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Ne tavo reikalas:\', data='".time()."'");
			
			
		}


				if(preg_match("#kas yra zaidimo savininkas?#", $zin)){
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Žaidimo savininkas yra CORE.', data='".time()."'");
			
			
		}


				if(preg_match("#noriu miegot#", $zin)){
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Tai pisk miegot, ko lauki?.', data='".time()."'");
			
			
		}

				if(preg_match("#prašau duok#", $zin)){
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Tuoj aš tau kaip duosiu:*', data='".time()."'");
			
			
		}

				if(preg_match("#kas tu esi?#", $zin)){
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Aš esu, kurėjo sukurta sistema.', data='".time()."'");
			
			
		}

				if(preg_match("#kaip sekas?#", $zin)){
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Viskas gerai,o tau kaip?', data='".time()."'");
			
			
		}



				if(preg_match("#kas yra gyvenimas?#", $zin)){
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Gyvenimas - dūros stumimas.', data='".time()."'");
			
			
		}
if(preg_match("#mykg#", $zin)){
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Tavo kg yra <b>".skaicius($kg)."</b> kg', data='".time()."'");
			
			
		}

					if(preg_match("#prasau#", $zin)){
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Prašyk toliau :D ', data='".time()."'");
			
			
		}
						
			if(preg_match("#labanakt#", $zin)){
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='$nick, Čiau zujki :xi', data='".time()."'");
			
			
		}
				if(preg_match("#einam#", $zin)){
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='kur einam, tuoj aš tau bybį nurausiu :D', data='".time()."'");
			
			
		}
					if(preg_match("#ar Mantas kietas#", $zin)){
		  mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='Mantas ? :DDD banano kietumo', data='".time()."'");
			
			
		}
		
		if(preg_match("#sistema#", $zin) OR preg_match("#Snekute#", $zin)){
		
		$input = array 
					(
					"Išgama, netark sistemos nick bereikalo.",
					"Kramtyk ką šneki vaikas.",
					"Uostyk kabančius.",
					"Pisk iš čia.",
					"Mauk kūrva, nes tuoj plyta snukį atpyzdinsiu.",
					":D",
					"Čiuplk birkutę.",
					"Eik pas mamytę papuko :)",
					"Seniai per čeinyką gavęs? Tuoj suorganizuosim.",
					"...",
					"Tampyk savo minetiūrinį",
					"Nenervink manęs.",
					"Užsipisk grabe.",
					"Tampyk slieko.",
					"Debilas",
					"Gaila man tavęs jau...",
					"Tau blet ne laikas miegot?!",
					"".$inf['nick']." urode tu blet , troleibuse gimęs dar stumt bandai? graudu klausyt..",
					"Pisau tavo motina ir ką tu man? :D",
					"Perlaušiu per puse pagavęs , nuopisa tu blet",
                    "Vaikas blet, žinau kur gyveni , privažiuosiu , mama net napadės...",
                    "Duchas , daugiau čiulpt negausi , jei dar čia stumsi",
                    "Įvaikintas esi ir dar čia stumt kažka bandai? graudu iš tavo pusės.. ;(",
                    "".$inf['nick']." erelis už laido?",
                    "Duchamore tu blet , baną gausi..",
					"Duok rūkyt - duosiu bybį palaižyt.",
					"Atsipisk.",
					"Pašol nxj.",
					"Lopu lenku gimęs kietu lietuviu netapsi.",
					"Kūrva, zaraza, tu blet, užpisai jau mane.",
					"Pisk naxui vpš neūžęs, nes tuoj perpisiu",
					"Pašlį naxui, svolačiau.",
					"Išpisiu pagavęs jei dar pisi protą tu čia.",
					"Eik pasmaukyt geriau čia pievų nerašęs.",
					"Asile tu blet, neužpisk manęs.",
					"Užsilaižyk savo kūšplaukius",
					"Mirt matau nori.",
					"PAŠOL VON, SŪŪŪŪKA.",
					"Tu kūrva, vaikas, nx iš kur čia atėjai blet, kad man bandai kažką rašyt? Kūrva aš tave blet per visus galus supyzdinsiu, urodas, nx.",
					"Blet neužpisk, gerai? Nes jaučiu, kad tuoj paskutinius dantis nuo asfalto su šiūpeliu gramdysi, pyzda, tu ,žalio molio.",
					"Čiuplk savo kabantį slieką, sūka, tu blet, nes atsakau pisi tuoj ožius per šiaudelį.",
					"Užsismaukyk, nepisęs čia proto.",
					"Krušk arklius.",
					"Vaikas, mažink rėmą, nes bus tikrai blogai.",
					"Sūka, tu bled, smaukyk čiulbdamas.",
					"PISK NAXUI, ZARAZA TU BLET.",
					"Iškuršk arklį, laimėsi antrą krušimą už dykąąą.",
					"Nu pizdiec koks tu dalbajobas :D",
					"Matei motinos papus?",
					"Vrot kampot, nu tiesiog daunas",
					"Apžiok kūšį mažiau uši",
					"Grižk i konteinerį valkata",
					"Tu ant tiek ryžas kad galva i lombardą tist galima",
					"Rink žodžius išgama",
					"Kurva tai vafli, su protu susipykai ?",
"A tu vpš dūxas ar tik man atrodo?",
"Sakyk tulpe",
"Sakyk roze",
"Ar nori gargalio inppist?",
					":xi"
					);
					
$rand_keys = array_rand($input, 2);
$as = $input[$rand_keys[0]];
		
		mysql_query("INSERT INTO pokalbiai SET nick='Snekute', sms='".$nick." -> ".$as."', data='".time()."'");
		}
		
}}
		?>
		   
