<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();

		topbar();
		if ($id == '') {
	
		
		if ($user['kid_goku'] < 1) {
			echo '<center><img src=\'images/istorijos/kid_goku0.jpg\'></center>
			Štai ir prasidėjo mažojo goko gyvenimo pradžia, niekas net negalėjo isivaizduoti, kad šis vaikas
darys tokią didelę įtaką žmonijos likimui.<br/>';
			
			echo '<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		} 
		elseif ($users['kid_goku'] == '1') {
			$tikimybe = $users['Ataka'] / 2;
			if ($tikimybe > 100) { $tikimybe = 100; }
			echo '<center><img src=\'images/istorijos/kid_goku1.jpg\'></center>
				Gokas įšalko ir turi prasimanyti sau maisto. Pagauk žuvį ir bent laikinai numalšink 
				alkį. Tikimybė, jog ištrauksi žuvį priklauso nuo tavo jėgos, padalintos pusiau.<br/><br/>
				Tikimybė, jog žuvis užkibs: <b>50%</b><br/>
				Tikimybė, jog ištrauksi žuvį: <b>'.$tikimybe.'%</b><br/>
				<a href=\'misijos.php?id=istorijav&amp;kas=Kid Goku&amp;f=1\'><b>Žvejoti</b></a>
			';
		}
		elseif ($users['kid_goku'] == '2') {
			echo '<center><img src=\'images/istorijos/kid_goku2.jpg\'></center>
			Grįžtant namo, į goką trenkė iš niekur išdygęs monstras.
			Tau reikia turėti 100 gynybos, jog atlaikytum smūgį.<br/>
			<a href=\'misijos.php?id=istorijav&amp;kas=Kid Goku&amp;f=2\'><b>Toliau</b></a>';
		} 
		elseif ($users['kid_goku'] == '3') {
			$DB->db->query("Update users set kid_goku='4' Where user_name='$username'");
			echo '<center><img src=\'images/istorijos/kid_goku3.jpg\'></center>
			Kaip vėliau paaiškėjo, tai buvo mergaitė vardu Bulma, kuri rėžėsi į jį savo automobiliu.
Ji iškart pastebejo, jog Gokas turi spintintį rutulį, su keturiomis žvaigždutėmis jame. 
Kadangi Bulmos kelionės tikslas ir buvo surasti visus 7 rutulius, ji papasakojo 
Gokui istoriją apie dievą drakoną, kuris mainais į rutulius gali išpildyti vieną tavo norą. 
Goką sudomino pasakojimas, todėl jis prisijungė prie Bulmos ir tęsė žygį drauge.<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '4') {
			$DB->db->query("Update users set istorijos_priesas='Lokys plesikas', istorijos_prieso_saga='kid_goku' Where user_name='$username'");
			echo '<center><img src=\'images/mobai/Lokys plesikas.jpg\'></center>
				Eidami jie sutiko milžinišką jūrų vėžlį, kuris pasiprašė nutempiamas iki vandenyno. 
				Gokas su Bulma sutiko jam padėti, tačiau jiems kelią pastojo Lokys plėšikas. 
				Norint tęsti kelionę, teks jį įveikti.<br/>
				<a href=\'kovos.php?id=apie&amp;kas=Lokys plesikas\'><b>Pūlti</b></a>
			';
		}
		elseif ($users['kid_goku'] == '5') {
			$DB->db->query("Update users set kid_goku='6' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/kid_goku5.jpg\'></center>
			Pasiekus pajūrį įvyko netikėtas dalykas. Vėžlys, išsikvietė savo 
			šeimininką, Master Roshi. Jis buvo toks dėkingas už pagalbą, jog net padovanojo Gokui 
			skraidantį debesį, kuris leidžia skristi dideliu greičiu, visai nenaudojant energijos. 
			Bulma taip pat pareikalavo atlygio, nors ir vėžlys teigė, jog ji niekuom jam nepadėjo.
			Bulma pamatė drakono rutulį, kabantį ant meistro kaklo ir užsimanė jo. Master Roshi sutiko 
			jį atiduoti, tačiau tik su viena salyga - Bulma turės parodyti jam savo apatinius. 
			Bulma nenoromis sutiko ir jiedu žengė didelį žingsnį galutinio tikslo link.<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '6') {
			$debesis = $DB->db->query("Select kiekis From kuprine Where pavadinimas='Skraidantis Debesis' and user='$username'")->fetch_array();
			if ($debesis['kiekis'] > 0) {
				$DB->db->query("Update kuprine set kiekis=kiekis+1 Where pavadinimas='Skraidantis Debesis' and user='$username'");
			} else {
				$DB->db->query("Insert into kuprine (pavadinimas, kiekis, user) 
								values ('Skraidantis Debesis', '1', '$username')");
			}
			$DB->db->query("Update users set kid_goku='7', xp=xp+100, Gynyba=Gynyba+10 Where user_name='$username'");
			
			echo 'Perėjai pirmą istorijos dalį "Beginning the Adventure". Gavai: Skairantį debesį, 
			100xp ir 10 gynybos.<br/>Tavęs laukia naujas išbandymas "Dangers in the Diablo Desert".<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '7') {
			$DB->db->query("Update users set istorijos_priesas='Oolong', istorijos_prieso_saga='kid_goku' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/kid_goku6.jpg\'></center>
			Po trijų dienų jiedu priėjo Aru kaimelį, kuris kenčia nuo siaubingo monstro Oolong, vagiančio žmonių dukras. 
			Jie taip pat sužinojo, kad tame kaimelyje gyvena senutė vardu Paozu, kuri turi šešiažvaigždį drakono 
			rutulį. Bulma sugalvojo, kad padėjus susigražinti kaimo mergeles, senutė padovanoms jiems rutulį. 
			Tačiau tam reikės įveikti baisūjį monstrą Oolong.<br/>
			<a href=\'kovos.php?id=apie&amp;kas=Oolong\'><b>Pūlti</b></a>. 
			';
		}
		elseif ($users['kid_goku'] == '8') {
			$DB->db->query("Update users set kid_goku='9' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/kid_goku7.jpg\'></center>
			Įveikus Oolong Bulma nusprendė, jog jo pavidalo keitimo savybė galėtu būti naudinga 
			jų kelionėje, tačiau Oolong nė už ką nesutiko prie jų prisidėti. Tuomet Bulma davė jam 
			vitaminų, kurie leido jai kontroluoti Oolong.<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '9') {
			$DB->db->query("Update users set kid_goku='10' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/kid_goku8.jpg\'></center>
			Praradę automobilį, jie buvo priversti keliauti pėščiomis. 
			Taip jie po kelių mylių priėjo "Diablo" dykumą.
			Bulmai pasidarė baisiai karšta, todėl jie buvo priversti sustoti ir pailsėti pavėsyje. 
			Tuo metu dykumų banditas Yamcha su savo pakaliku Puar bandė juos apiplėšti, tačiau kelią 
			jam pastojo Gokas. Jie inirtingai kovėsi kol kovą nutraukė Bulmos pasirodymas, kaip 
			paaiškėjo, Yamcha buvo labai drovus ir bijojo merginų.<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '10') {
			$DB->db->query("Update users set kid_goku='11' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/kid_goku9.jpg\'></center>
			Atėjus nakčiai Yamcha vėl mėgino juos apvogti, tačiau išgirdęs jų pokalbį apie drakono 
			rutulius persigalvojo ir nusprendė verčiau vogti rutulius. Palaukęs kol visi užmigs Yamcha isėlino 
			į namelį, padaryta iš transformavusio Oolong, tačiau jis pamatė Bulmą visiškai nuogą ir 
			spruko laukan.<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '11') {
			$DB->db->query("Update users set istorijos_priesas='Yamcha.', istorijos_prieso_saga='kid_goku' Where user_name='$username'");
			
			echo '<center><img src=\'images/mobai/Yamcha.jpg\'></center>
			Kitą rytą Gokas su Bulma pajuto stiprų smūgi. Tai buvo
			 Yamcha, kuris šovė į jų namelį su Bazooka. 
			 Kadangi nuo smūgio Bulma prarado sąmonę, Yamcha su 
			 Goku galėjo nieko netrukdomi baikti savo kovą.
			<br/>
			<a href=\'kovos.php?id=apie&amp;kas=Yamcha.\'><b>Pūlti</b></a>';
		}
		elseif ($users['kid_goku'] == '12') {
			$DB->db->query("Update users set kid_goku='13' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/kid_goku11.jpg\'></center>
			Pralaimėjus kovą Yamcha kilo nauja mintis. Jis sutiko netrukdyti jiems toliau rinkti 
			drakono rutulius ir net pasiulė mašiną. Tačiau nusprendė sekti juos ir laukti kada 
			Gokas su Bulma atliks visą juodą darbą už jį.<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '13') {
			$DB->db->query("Update users set kid_goku='14', Ataka=Ataka+30, Gynyba=Gynyba+20 Where user_name='$username'");
			
			$debesis = $DB->db->query("Select kiekis From kuprine Where pavadinimas='Sasanishiki' and user='$username'")->fetch_array();
			if ($debesis['kiekis'] > 0) {
				$DB->db->query("Update kuprine set kiekis=kiekis+1 Where pavadinimas='Sasanishiki' and user='$username'");
			} else {
				$DB->db->query("Insert into kuprine (pavadinimas, kiekis, user) 
								values ('Sasanishiki', '1', '$username')");
			}
			echo '
			Perėjai antrąją istorijos dalį "Dangers in the Diablo Desert". <br/>
			Gavai: Sasanishiki, 30 atakos, 20 gynybos.<br/><br/>
			Tavęs laukia naujas išbandymas "The Destruction of Fire Mountain".<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>			';
		}
		elseif ($users['kid_goku'] == '14') {
			$DB->db->query("Update users set kid_goku='15' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/Ugnikalnis.jpg\'></center>
			Keliaujant radaras juos nuvedė prie ugnikalnio, tačiau Oolongas išsigando istorijos apie 
			Ox-King gyvendantį jame. Oolong manė, jog jiems nepavyks gyviems ištrukti iš šio ugnikalnio.
			<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '15') {
			$DB->db->query("Update users set kid_goku='16' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/Ox-King.jpg\'></center>
			Bulmai privertus jį eiti drauge, jie sutiko Ox-King ir Gokui teko stoti į kovą prieš jį. 
			 Iš pradžių atrodė, jog Gokas bus sutriuškintas, tačiau jis išsikvietė savo skairandį 
			 debesį, kurį jam padovadojo Master Roshi ir Ox-King nuspręndė jo nebepūlti.
			<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '16') {
			$DB->db->query("Update users set kid_goku='17' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/Fan.jpg\'></center>
			Ox-king paprašė Goko nukeliauti pas Master Roshi drauge su jo dukra Chi-Chi ir paprašyti jo 
			Bansho Fan vėduoklės, kuri padėtų išsklaidyti ugnį supančią kalną.
			<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '17') {
			$DB->db->query("Update users set kid_goku='18' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/Krutine.jpg\'></center>
			Master Roshi teigė prieš daug metų išmetęs vėduoklę, tačiau vis tiek galėtų išsklaidyti 
			ugnį tvyrančią virs kalno. Bet tik su viena sąlyga - Jis galės paliesti Bulmos krūtinę.
			<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '18') {
			$DB->db->query("Update users set kid_goku='19' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/Kamehameha.jpg\'></center>
			Nukeliavus prie ugnies kalno Master Roshi pademonstravo galingą techniką, kuri vadinosi 
			Kamehameha. Ji greitai sunaikino ugnį ir Gokas su Bulma galėjo sėkmingai surasti šeštajį 
			rutulį. Gokas taip pat norėjo išbandyti šią techniką, tačiau viskas baigėsi jų automobilio 
			sunaikinimu. Laimei Ox-King pasiūlė padovanoti jiems savąjį.
			<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '19') {
			$DB->db->query("Update users set kid_goku='20', pinigai=pinigai+500 Where user_name='$username'");
			
			echo 'Perėjai trečiają istorijos dalį "The Destruction of Fire Mountain".<br/>
			Gavai: 500 zen.<br/><br/>
			>Tavęs laukia naujas išbandymas "Conflict with the Rabbit Mob".<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '20') {
			$DB->db->query("Update users set kid_goku='21' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/Triuso kostiumas.jpg\'></center>
			Važiuojant tolyn, radaro rodoma kryptimi, Oolongas pastebėjo, jog jų degalai baiginėjasi 
			ir jie privalo sustoti artimiausiame kaime. Tačiau visi tame kaime paniškai bijojo Bulmos, 
			kuri vis dar dėvėjo vienintelį Oolonge namelyje tikusį rūbą - Triušio kostiumą. Todėl visi 
			kaimelio pardavėjai neėmė pinigų už jos prekes, taip ji įsigyjo normalius rubūs.
			<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '21') {
			$DB->db->query("Update users set istorijos_priesas='Rabbit Mob nariai', istorijos_prieso_saga='kid_goku' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/rabbit mob.jpg\'></center>
			Bulmai grįžus su naujais rūbais žmonės į ją nebežiūrėjo taip palankiai, nes žmonės ją 
			buvo klaidingai palaikę "Rabbit Mob" gaujos nare. Kiek vėliau Gokas pastebėjo 2 "Rabbit Mob" 
			gaujos narius besikabinėjančius prie praeivio, todėl Gokas pajuto pareigą jam padėti.
			<br/>
			<a href=\'kovos.php?id=apie&amp;kas=Rabbit Mob nariai\'><b>Pūlti</b></a>';
		}
		elseif ($users['kid_goku'] == '22') {
			$DB->db->query("Update users set kid_goku='23' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/Monster Carrot.jpg\'></center>
			Po pralaimėjimo gaujos nariai pasikvietė savo vadą - Monster Carrot. Jam einant link Goko 
			visi kaimo gyventojo iš baimės pradėjo bėkti į visas puses. Priėjęs jis palietė Bulmą savo 
			ranka ir pavertė ją morka. Taip pagrasindamas Gokui, jog suvalgys Bulmą, jeigu jis priešinsis 
			mušamas jo parankinių.
			<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '23') {
			$DB->db->query("Update users set istorijos_priesas='Monster Carrot', istorijos_prieso_saga='kid_goku' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/monster carrot2.jpg\'></center>
			Laimei visą laiką juos sekęs Yamcha su Puaru nuspręndė laikinai pereiti į jų pusę. 
			Puaras, gebantis keisti savo pavidalą pavirto paukščiu ir pavogė morką iš Monster Carrot 
			rankų, taip leisdamas Gokui su Yamcha netrukdomiems kautis su Monster Carrot. 
			Pastaba: (Tik) šiai kovai Yamcha prisijungs prie jūsų kaip konpanjonas.
			<br/>
			<a href=\'kovos.php?id=apie&amp;kas=Monster Carrot\'><b>Pūlti</b></a>';
		}
		elseif ($users['kid_goku'] == '24') {
			$DB->db->query("Update users set kid_goku='25' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/Puar.jpg\'></center>
			Puaras pakeitęs pavidalą į Monster Carrot pagrasino jam jį patį paversti morka, todėl iš baimės 
			Monster Carrot sutiko atversti Bulmą atgal į žmogų ir pasidavė.
			<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '25') {
			$DB->db->query("Update users set kid_goku='26', xp=xp+400, sp=sp+20 Where user_name='$username'");
			
			echo 'Perėjai ketvirtąją istorijos dalį "Conflict with the Rabbit Mob".<br/>
			Gavai: 400 xp, 20sp.<br/>
			<br/>Tavęs laukia naujas išbandymas "Emperor Pilaf and the Eternal Dragon".<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '26') {
			$DB->db->query("Update users set kid_goku='27' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/Emperor Pilaf.jpg\'></center>
			Kaip paaiškėjo, Gokas su Bulma nebuvo vieninteliai ieškoję rutulių. Mažas, mėlynos odos 
			žmegutis Emperor Pilaf taip pat jų ieškojo, ir siekė užvaldyti pasaulį.
			<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '27') {
			$DB->db->query("Update users set kid_goku='28' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/kalejimas.jpg\'></center>
			Emperor Pilaf su savo parankiniais daugelį kartų bandė pavogt rutulius iš Goko su Bulma. 
			Tačiau jo pastangos neatnešė vaisių iki to karto, kai jis įkalino juos kambarį ir prileido 
			ten migdomųjų dujų. Surinkęs rutulius iš miegančių bendražygių, jis nieko nelaukdamas 
			nuskubėjo į savo pilį ir iškvietė drakoną Shenron.
			<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '28') {
			$DB->db->query("Update users set kid_goku='29' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/drakonas.jpg\'></center>
			Emperor Pilaf nespėjus ištarti noro, iššoko Oolong ir paprašė drakono savo noro, pačių 
			patogiausių moteriškų apatinių pasaulyje. Drakonas išpildė jo norą ir darką išbarstė 
			drakono rutulius po visą pasaulį.
			<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '29') {
			$DB->db->query("Update users set kid_goku='30' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/great ape.jpg\'></center>
			Vėliau tą vakarą Gokas pasakojo Bulmai ir Yamcha istoriją apie milžinišką beždžionę atėjusių 
			prie jo namelio ir sutraiškiusiu jo senelį Gohaną. Jis taip pat pabrėžė, jog tuo metu buvo 
			pilnatis. Jam baigiant pasakojimą, Gokas pažvelgė per kameros langą ir išvydęs pilnametį 
			pavirto baisiąja beždžione. 
			<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '30') {
			$DB->db->query("Update users set kid_goku='31' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/issiskyrimas.jpg\'></center>
			Yamcha su kitais jautė pareigą padėti Gokui, todėl supratę, jog visa jo jėga slypi uodegoje, 
			nukirpo ją ir baisioji beždžionė vėl atgavo mažo ir taikaus berniuko pavidalą. Kitą rytą 
			jie nusprendė keliauti savais keliais, Bulma su Yamcha tapti draugais ir keliauti į Bulmos 
			gimtajį miestą, o Gokas - toliau tobulėti ir treniruotis pas Master Roshi
			<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '31') {
			$DB->db->query("Update users set kid_goku='32', Gyvybesm=Gyvybesm+200 Where user_name='$username'");
			
			echo 'Perėjai dar vieną istorijos dalį "Emperor Pilaf". <br/>
			Gavai: 300 gyvybių.<br/><br/>
			Tavęs laukia naujas išbandymas "Turtle School Training".
			<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '32') {
			$DB->db->query("Update users set kid_goku='33' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/launch.jpg\'></center>
			Gokui atvykus pas Master Roshi, jis paprašė jo, kad jį pamokytu kovos menų, tačiau meistras 
			atsisakė teigdamas, jog praėjo labai daug laiko, nuo paskutinio karto, kada jis mokė. 
			Tačiau atėjus dar vienam norinčiajam mokytis, Krilinui. Jis pasakė, jog su tiktu tik su ta 
			salygą, jeigu jie jam surastų merginą. Jie surado banko plėšikę vardu Launch ir gavo galimybę 
			pradėt treniruotis.
			<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '33') {
			echo '<center><img src=\'images/istorijos/akmuo.jpg\'></center>
			Pirma treniruočių dalis. Master Roshi numetė į mišką akmenį, pažymėjas jį tam tikru ženklu. 
			Jūs su Krilinu privalote surasti jį iki dienos pabaigos. Tikimybė rasti akmenuką - 10%.
			<br/>
			<a href=\'misijos.php?id=istorijav&amp;kas=Kid Goku&amp;f=33\'><b>Ieškoti</b></a>';
		}
		elseif ($users['kid_goku'] == '34') {
			$atk = $users['Ataka']/4;
			  $def = $users['Gynyba']/5;
			  $gyv = $users['Gyvybesm']/10;
			  $ene = $users['Energijam']/10;
			  $suma = $atk+$def+$gyv+$ene;
			  $suma = (int)$suma;
			echo '<center><img src=\'images/istorijos/arimas.jpg\'></center>
			Antra treniruočių dalis. Jums reiks suarti ūkininko žemes plikomis rankomis. 
			Tam reikės 500 jėgos koeficiento, susidedančio iš visų tavo kovos statų.<br/><br/>
			Tavo jėgos koefientas: <b>'.$suma.'</b><br/>
			<br/>
			<a href=\'misijos.php?id=istorijav&amp;kas=Kid Goku&amp;f=34\'><b>Arti</b></a>';
		}
		elseif ($users['kid_goku'] == '35') {
			$DB->db->query("Update users set kid_goku='36' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/plaukimas.jpg\'></center>
			Trečia treniruočių dalis. Jums reiks perplaukti ryklių knibždantį ežerą.
			<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Plaukti</b></a>';
		} 
		elseif ($users['kid_goku'] == '36') {
			$DB->db->query("Update users set istorijos_priesas='Ryklys', istorijos_prieso_saga='kid_goku' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/Ryklys.jpg\'></center>
			Likus ne daug kelio iki pabaigos, Kriliną užpuolė ryklys, padėk jam.
			<br/>
			<a href=\'kovos.php?id=apie&amp;kas=Ryklys\'><b>Pūlti</b></a>';
		}
		elseif ($users['kid_goku'] == '37') {
			$atk = $users['Ataka']/4;
			$def = $users['Gynyba']/5;
			$gyv = $users['Gyvybesm']/10;
			$ene = $users['Energijam']/10;
			$suma = $atk+$def+$gyv+$ene;
			$suma = (int)$suma;
			echo '<center><img src=\'images/istorijos/pavarge.jpg\'></center>
			Liko treniruočių dalis. 100 kartų įbėgti į šventyklą, kurią nuo žemės skiria šimtai laiptelių. 
			Tam reikės turėt 600 jėgos koeficiento.<br/><br/>
			Tavo jėgos koefientas: <b>'.$suma.'</b><br/>
			<br/>
			<a href=\'misijos.php?id=istorijav&amp;kas=Kid Goku&amp;f=37\'><b>Bėgti</b></a>';
		} 
		elseif ($users['kid]goku&](== '38') {
			$DB->db->query("Update users set kid_goku='39', Ataka=Ataka+100, Gynyba=Gynyba+100, Energijam=Energijam+200, xp=xp+200 Where user_name='$username'");
			
			echo 'Perėjai dar vieną istorijos dalį "Turtle School Training". <br/>
			Gavai: 100 atakos, 100 gynybos, 200 energijos, 200xp.<br/><br/>
			Tavęs laukia naujas išbandymas "21st World Martial Arts Tournament".<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		} 
		elseif ($users['kid_goku'] == '39') {
			$DB->db->query("Update users set kid_goku='40' Where user_name='$username'");
			
			echo '<img src=\'images/istorijos/turnyras.jpg\'><br/>
			Po ilgų treniravimosi mėnesiu, Gokas su Krilinu pagaliau gavo proga išbandyti savo jėgas. 
			Dabar vyksta 21-asis pasaulio kovos menų turnyras, į kurį išmėginti savo jėgų atvyks 
			stipriausi kovotojai iš viso pasaulio. Tarp dalyvių bus ir Yamcha.<br/>
			
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		} 
		elseif ($users['kid_goku'] == '40' && $f != 'kova') {
			
			echo '<img src=\'images/istorijos/Bacterian.jpg\'><br/>
			Pirmojoje turnyro kovoje, kurioje rungėsi vienas iš Goko draugų tapo: Krilinas prieš Bacterian.
			Krilinas nori susikauti su Goku finale, todėl šita kova jam labai svarbi. Tau teks 
			pasinerti į Krilino kūną ir dalyvauti kovoje su Bacterian.<br/>
			
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku&amp;f=kova\'><b>Toliau</b></a>';
		} 
		elseif ($users['kid_goku'] == '40' && $f == 'kova') {
			$DB->db->query("Update users set istorijos_priesas='Bacterian', istorijos_prieso_saga='kid_goku', priesas='Bacterian', uzsakovas='Krilinas', uzsakovo_mobas='Bacterian' Where user_name = '$username'");
			header("Location: kovos.php?id=apie&kas=Bacterian");
		}
		
		elseif ($users['kid_goku'] == '41') {
			$DB->db->query("Update users set kid_goku='42' Where user_name='$username'");
			
			echo '<img src=\'images/istorijos/YamchaChun.jpg\'><br/>
			Antrąja turnyro kova tavo: Yamcha prieš Jackie Chun. Įnirtingai kovą pradėjas Yamcha 
			nesugebėjo pataikyti į apgaulingai silpnai atrodantį Jackie Chun ir nepadaręs didesnės 
			žalos pralaimėjo seniui. Taip pat Yamcha kilo įtarimas, jog tai gali būti užsimaskavęs Master Roshi.<br/>
			
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		} 
		elseif ($users['kid_goku'] == '42') {
			$DB->db->query("Update users set istorijos_priesas='Giran', istorijos_prieso_saga='kid_goku' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/Giran.jpg\'></center>
			Sekanti turnyro kova: Gokas prieš Giran.
			<br/>
			<a href=\'kovos.php?id=apie&amp;kas=Giran\'><b>Kovoti</b></a>';
		}
		
		elseif ($users['kid_goku'] == '43') {
			$DB->db->query("Update users set kid_goku='44' Where user_name='$username'");
			
			echo '<img src=\'images/istorijos/KrilinChun.jpg\'><br/>
			Visų nuostabai, paslaptingasis senukas Jackie Chun nesunkiai įveikė ir Kriliną.<br/>
			
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '44') {
			$DB->db->query("Update users set istorijos_priesas='Nam', istorijos_prieso_saga='kid_goku' Where user_name='$username'");
			
			echo '<center><img src=\'images/istorijos/GokuNam.jpg\'></center>
			Atėjo metas dar vienai Goko kovai. Dabar jam teks susikauti su Nam.
			<br/>
			<a href=\'kovos.php?id=apie&amp;kas=Nam\'><b>Kovoti</b></a>';
		}
		elseif ($users['kid_goku'] == '45') {
			$DB->db->query("Update users set kid_goku='46' Where user_name='$username'");
			
			echo '<img src=\'images/istorijos/GokuChun.jpg\'><br/>
			Pagaliau atėjo ilgai lauktas finalas, kuriame sutiko Gokas ir Jackie Chun. Po ilgos ir 
			įnirtingos kovos, Gokui teko pripažinti Jackie Chun pranašumą ir viltis laimėti 
			stipriausio pasaulio kovotojo titulą kitamet.<br/>
			
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		}
		elseif ($users['kid_goku'] == '46') {
			$DB->db->query("Update users set kid_goku='200', Ataka=Ataka+200, Gynyba=Gynyba+200, pinigai=pinigai+5000 Where user_name='$username'");
			
			echo 'Perėjai dar vieną istorijos dalį "21st World Martial Arts Tournament". <br/>
			Gavai: 200 atakos, 200 gynybos, 5000 zen.<br/><br/>
			Tavęs laukia naujas išbandymas "Red Ribbon Army".<br/>
			<a href=\'misijos.php?id=istorija&amp;kas=Kid Goku\'><b>Toliau</b></a>';
		} else {
			echo 'Tu perėjai visą esamą Songoko istoriją, lauk pratęsimo.';
		}
	

}
