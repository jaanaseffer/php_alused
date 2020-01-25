#Vormid
Peamiseks ülesandeks on kuidagi töödelda kasutaja poolt vormi sisestatud andmeid. Valida on kahe meetodi GET ja POST vahel.

##Vormi loomine
Enne kui otsustame kumb meetod on parem, loome kolme väljaga vormi ning lisame ühe nupu. Dokumendi faililaiend võib jääda .html, sest sellesse dokumenti php koodi ei lisa.

    <!doctype html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>06 - PHP - Vormid</title>
    </head>
    <body>
        <h1>Pood OÜ</h1>
        <form>
            Toode 1 <input type="text"><br>
            Toode 2 <input type="text"><br>
            Toode 3 <input type="text"><br>
            <input type="submit" value="Saada">
        </form>
    </body>
    </html>
    
Antud kood ei ole lõplik. Olemas on küll kolm tekstikasti, kuid programm ei suuda neid eristada. Selleks tuleb anda neile nimed. (Koodi kuvamisel jätan edaspidi html dokumendi osa, kuigi see on kindlasti olemas)

    <form>
        Toode 1 <input type="text" name="t1"><br>
        Toode 2 <input type="text" name="t2"><br>
        Toode 3 <input type="text" name="t3"><br>
        <input type="submit" value="Saada">
    </form>
    
Nüüd suudab kood mõista, kuhu kasti mingi väärtus lisati. Aga vajutades nupule saada, ei toimu mitte midagi! Selleks tuleb vormile öelda kuhu tuleb andmed saata ja mis meetodil. Seega **action** atribuudile lisa faili nimi, kuhu hakkame kirjutama php koodi ning meetodiks kirjutan juba **“get”**.

    <form action="tellimine.php" method="get">
        Toode 1 <input type="text" name="t1"><br>
        Toode 2 <input type="text" name="t2"><br>
        Toode 3 <input type="text" name="t3"><br>
        <input type="submit" value="Saada">
    </form>
    
Nüüd kui veebilehel vajutada nupule **‘Saada‘**, siis saan veateate, kuna ei ole teinud faili **‘tellimine.php‘**. Teen selle ära ning lisan sinna lihtsalt ühe pealkirja.

    <h1>Tellimine</h1>
    
Nüüd kui vajutada nuppu **‘Saada‘**, näen teise dokumendi sisu.

##GET vs POST
Kirjutasime koodis juba method=”post”, kuid üks võimalus on veel kasutada method=”get”. Põhimõtteliselt teevad need ühte ja sama – saadavad andmed serverisse. Suurim erinevus, mis määrab ka selle kumba valida, on saadetavate andmete kuvamise viis. GET meetodi puhul kuvatakse saadetavad andmed veebilehe aadressiribal ning saame kenasti näha millised väärtused millistele muutujatele on lisatud.

**POST** meetodi puhul jäetakse aadressiriba puutumatuks, kuigi andmed saadetakse samamoodi serveri poole teele.

Kui avada veebilehitseja arendaja tööriistad, siis on kenasti saadetavad andmed näha. Chrome veebilehitsejas vali selleks *Seaded>Tööriistad>Arendaja tööriistad*.

**GET**

- Nagu meetod ise ütleb, kasutame seda eelkõige info hankimiseks – näiteks andmebaasist tulemuste väljastamine (otsing)
- Kuna aadressiribal on andmeid näha, siis ära kasuta seda paroolide või mõne muu tundliku info saatmiseks
- Kasutaja saab aadressiribal olevaid parameetreid muuta ja salvestada veebilehitseja lemmikutesse
- Aadressiribal on märkide arv piiratud
- Talub lehe uuendamist

**POST**

- Kasutame meetodit andmete saatmiseks – näiteks artiklite saatmiseks andmebaasi
- Saadetavaid andmed ei kuvata veebilehe aadressiribal, seega sobib paroolide või mõne tundlikuma info saatmiseks
- Saadetavad andmete hulk ei ole praktiliselt piiratud
- Lehe värskendamisel küsitakse kinnitust

##Vormist saadud andmete töötlemine
 Laseme failil **tellimine.php** vormist saadud andmeid töödelda, alustades kõigepealt edastatud andmete kuvamisega. Kasutame selleks eeldefineeritud muutujat **$_GET[]**, kuhu lisame vormi tekstivälja nime.
 
     <?php
       //lisab vormist saadud andmed muutujasse
       $toode1 = $_GET['t1'];
       
       echo 'Toode 1: '.$toode1.'tk';
    ?>
    
Nüüd kui kasutaja on sisestanud esimesse kasti mingi väärtuse, siis kuvatakse see tellimine.php lehele.

Hetkel saab lisada nii numbreid kui tekste, kuid ärme selle pärast veel muretse. Täiendame koodi, et saada ka teiste väljade väärtused.

    <?php
        //lisab vormist saadud andmed muutujasse
        $toode1 = $_GET['t1'];
        $toode2 = $_GET['t2'];
        $toode3 = $_GET['t3'];
        
        echo 'Toode 1: '.$toode1.'tk<br>';
        echo 'Toode 2: '.$toode2.'tk<br>';
        echo 'Toode 3: '.$toode3.'tk<br>';
    ?>

#Massiivid
Massiiv on muutuja, mis hoiab endas hulka samatüüblisi väärtusi. Väärtusteks võivad olla nii tekstid, arvud kui ka teine massiiv. Viisakas on massiivile anda nimi mitmuses. Loome näiteks nimede massiivi ja vanuste massiivi.

    $nimed = array('mari', 'kati', 'juhan', 'miku', 'uku');
    $vanused = array(15, 23, 32, 28, 18);
    
Masiivi sisu kuvamiseks on kasutada täpne funktsioon **var_dump()** või vähemtäpne **print_r()**. Vaatame näiteks var_dump() funktsiooni ning me näeme, et see  kuvab meile massiivi elementide koguarvu, nende tüübid ja pikkused.

    <?php
        $nimed = array('mari', 'kati', 'juhan', 'miku', 'uku');
        
        //massiivi sisu koos parameetritega
        var_dump($nimed);
    ?>
    
Samas print_r() puhul kuvatakse põhimõtteliselt ainult oluline sisu.

    <?php 
        $nimed = array('mari', 'kati', 'juhan', 'miku', 'uku');
        
        //massiivi sisu koos parameetritega
        var_dump($nimed);
        
        //massiivi sisu kuvamine
        print_r($nimed);
    ?>
    
Kindlasti paned tähele, et massiivis olevad väärtused indekseeritakse alates nullist! See tähendab, et loendamine algab alati nullist. Näiteks, kui ma soovin saada massiivist esimest väärtust. Selleks tuleb kasutada massiivi nime ning seejärel kandiliste sulgude vahele lisada soovitud indeks.

    <?php 
        $nimed = array('mari', 'kati', 'juhan', 'miku', 'uku');
        echo $nimed[0];
    ?>
    
Antud koodi väljastab meile teksti **Mari**. Ja näiteks Uku saamiseks tuleb meil lisada indeksiks 4.

##Massiivi kõikide väärtuste kuvamine
Kood ülevalpool, kuvaks loendist ainult ühe väärtuse. Selleks, et kätte saada kõik väärtused, tuleks kasutada mõnda tsüklit. Tsüklite töötamist ja võimalusi vaatame  küll järgmises peatükis, aga siin sellega tutvumine ei tee ka paha. Kasutame siinkohal **foreach()** tsüklit, mis võtab iga väärtuse, lisab selle muutujasse ja väljastab.

    <?php 
            $nimed = array('mari', 'kati', 'juhan', 'miku', 'uku');
            
            //massiivi kõigi elementide väljastamine
            foreach($nimed as $nimi){
                echo "$nimi <br>";
            }
    ?>
   
##Assotsiatiivsed massiivid
Assotsiatiivsete massiivide puhul saame väärtuste võtmed ise määrata. Nin see tuleb nii kirja panna sarnase mudeli järgi, nagu me massiivi väljastamisel näeme: **võti=>väärtus**.

    <?php
        $hinded = array(
            'kehv' => 2,
            'rahuldav' => 3,
            'hea' => 4,
            'väga hea' => 5
        );
    ?>
    
See tähendab, et kui ma soovin näiteks võtme ‘kehv’ väärtust, siis kirjutan nii:

    echo $hinded['kehv']; //tulemus: 2
    
Tsüklisse panduna tuleb nii võtmele, kui ka väärtusele anda oma muutuja.

    <?php
        $hinded = array(
            'kehv' => 2,
            'rahuldav' => 3,
            'hea' => 4,
            'väga hea' => 5
        );
        foreach($hinded as $hinnang => $hinne){
            echo "<li>Hinne: $hinne ($hinnang)</li>";	
        }
    ?>
    
##Töötamine massiivi funktsioonidega
Massiividega töötamiseks on terve ports erinevaid funktsioone, mille leiad manualist http://php.net/manual/en/ref.array.php. Loomulikult ei pea kõiki kohe pähe õppima, vaid ikka vastavalt vajadusele. Vaatame mõningaid, mida on tulnud endal kõige sagedamini ette.

###Massiivi täiendamine
Aegajalt on vaja väärtusi massiivi juurde lisada. Selleks on kaks meetodit. Näiteks võime kasutada **array_push()** funktsiooni. Lisada saab nii ühe kui mitu nime korraga.

    <?php 
        $nimed = array('mari', 'kati', 'juhan', 'miku', 'uku');
        //lisamine massiivi
        array_push($nimed, 'ahmed', 'ahti');
        var_dump($nimed);
    ?>
    
Nagu näha, lisatakse uued väärtused massiivi lõppu. Teine võimalus on omistada uued väärtused

    <?php 
        $nimed = array('mari', 'kati', 'juhan', 'miku', 'uku');
        $nimed[] = 'ahmed';
        var_dump($nimed);
    ?>
    
Sellise võttega saad lisada ainult ühe väärtuse korraga. Kuid selle võttega saad määrata näiteks väärtuse indeksi. Juhul kui see on juba olemas, siis kirjutatakse olemasolev üle.

    $nimed[13] = 'ahmed';
    
Väärtuse lisamiseks massiivi algusesse, kasutatakse funktsiooni **array_unshift()**.

    <?php 
        $nimed = array('mari', 'kati', 'juhan', 'miku', 'uku');
        //lisab algusesse
        array_unshift($nimed, 'laura');
        var_dump($nimed);
    ?>
    
###Massiivist eemaldamine
Massiivist viimase väärtuse eemaldamiseks kasuta **array_pop()** funktsiooni

    array_pop($nimed);
    
ning esimese väärtuse eemaldamiseks **array_shift()** funktsiooni.

    array_shift($nimed);
    
Kasutajat võiks informeerida kirje eemaldamisest, lisades eemdaldatava väärtuse näiteks massiivi.

    <?php 
        $nimed = array('mari', 'kati', 'juhan', 'miku', 'uku');
        $nimi = array_pop($nimed);
        echo "Eemaldati: ".$nimi;
    ?>
    
###Massiivi väärtuse loendamine
Et teada saada mitut väärtust massiivis hoitakse, kasuta **count()** funktsiooni.

    echo count($nimed);
    
###Massiiivi väärtuse sorteerimine
Vaatame sorteerimiseks järgmisi funktsioone:

- sort()
- rsort()
- ksort()
- krsort()
- asort()
- arsort()

Funktsioon **sort()** sorteerib kasvavalt ja **rsort()** kahanevalt.

    <?php 
        $nimed = array('mari', 'kati', 'juhan', 'miku', 'uku');
        //sorteerimine
        sort($nimed);
        var_dump($nimed);
    ?>
    
Kasuta antud funktsioone ainult sel juhul, kui pole oluline, et nende võtmed lähevad sassi või assotsiatiivsete massiivide puhul asendatakse need indeksitega. Üldjuhul peetakse seda riskantseks ning sel juhul võetaksegi kasutusele hoopis **ksort()**, kus massiiiv sorteeritakse võtme järgi…

    <?php 
        //assotatiivne massiiv
        $hinded = array(
            'kehv' => 2,
            'rahuldav' => 3,
            'hea' => 4,
            'väga hea' => 5
        );
        ksort($hinded);
        var_dump($hinded);	
    ?>
    
… ning **asort()**, kus massiiv sorteeritakse väärtuse järgi.

    <?php 
        //assotatiivne massiiv
        $hinded = array(
            'kehv' => 2,
            'rahuldav' => 3,
            'hea' => 4,
            'väga hea' => 5
        );
        asort($hinded);
        var_dump($hinded);	
    ?>
    
Lisades kummagile funktsioonile ‘r’-tähe, muudetakse sorteerimine vastupidiseks: **krsort()** või **arsort()**. Nüüd kui soovid just nimekirja sassi ajada, siis kasuta **shuffle()** funktsiooni. Selle tulemusena on iga kord erinev tulemus.

    shuffle($nimed);
    var_dump($nimed);
    
##Mitmemõõtmelised massiivid
Mitmemõõtmeliseks loetakse massiivi, kui selle väärtusteks on uued massiivid.

    <?php
        //mitmemõõtmelised massiivid
        $riigid = array(
            'Eesti'=>array('pealinn'=>'Tallinn','rahvaarv'=>1340000),
            'Austria'=>array('pealinn'=>'Viin','rahvaarv'=>8356700),
            'Belgia'=>array('pealinn'=>'Brüssel','rahvaarv'=>10827500)
        );
        
        var_dump($riigid);
    ?>
    
Massiivist elementide saamiseks tuleb anda mõlemad võtmed. Kuvame näiteks Eesti pealinna:

    echo $riigid['Eesti']['pealinn'];
    
Kõikide andmete kuvamiseks kasutame **foreach()** tsüklit kaks korda.

    <?php
        //mitmemõõtmelised massiivid
        $riigid = array(
            'Eesti'=>array('pealinn'=>'Tallinn','rahvaarv'=>1340000),
            'Austria'=>array('pealinn'=>'Viin','rahvaarv'=>8356700),
            'Belgia'=>array('pealinn'=>'Brüssel','rahvaarv'=>10827500)
        );
        
        foreach ($riigid as $riik=>$andmed){
            echo "$riik - ";
            foreach($andmed as $detailid){
                echo "$detailid ";
            }
            echo "<br>";
        }
    ?>
    
# Ajafunktsioonid
## Ajaloomine
Aja loomisel kasutab PHP kokkulepitud UNIX stiilis ajatemplit (timestamp). Tegemist on sekunditega, mida loetakse alates 01.01.1970 ning selle väljakutsumiseks kasutatakse **time()** funktsiooni.

    echo time(); //1361551056
    
## Kasutajasõbraliku kuupäeva kuvamine
Kui vajutada hetkel veebilehitsejas Refresh, siis aeg muutub pidevalt. Selle kuupäevaga on probleem selles, et inimene ei saa aru, millise kuupäevaga on siis tegemist. Siinkohal tuleb mängu date() funktsioon, mis vajab kahte argumenti: kuupäevavorming ja ajatemplit.

    echo date('d.m.Y G:i' , time());	//22.02.2013 16:02
    
Eelpool lisatud kuupäevavorming sisaldab järgmisi vormindamise sümboleid:

- d – kuupäev 01-31
- m – kuu numbrina 01-12
- Y – neljakohaline aastaarv n: 2013
- G – 24-tunnine tunniformaat 0-23
- i –  minutid 0-59

See, mis märkide vahele lisad on sinu valida. Antud kuupäevavormingu sümbolid on ära toodud aadressil: http://php.net/manual/en/function.date.php. Selle funktsiooniga on veel tore see, et kui ajatemplit mitte lisada, siis võtab see vaikimisi hetkekuupäeva ja kellaaja.

    echo date('d.m.Y G:i');
    
## Ajavöönd
Kui ma nüüd võrdlen serverist saadetud kellaaega oma arvuti kellaajaga, siis on see kaks tundi maas. Selle parandamiseks on võimalus koodi lisada soovitud ajavöönd.

    date_default_timezone_set('Europe/Tallinn');	//22.02.2013 18:02
    
Teised ajavööndid leiad siit: http://www.php.net/manual/en/timezones.europe.php

## Pika kuupäeva eestistamine
PHP koodi loomisel ei ole vist piisavalt meie emakeelega arvestatud 🙂 ja sellepärast näiteks pika kuupäeva väljakutsumisel kuvatakse kuu nimetus võõrkeelsena.

    echo date('d.F.Y');	//22.February.2013
Selle parandamiseks peame looma eraldi massiivi, kus eestikeelse kuud algavad indeksiga 1. Pärast seda tegin päeva, kuu ja aasta jaoks eraldi muutujad, kusjuures kuu nimetuse saamiseks kasutan kuupäeva vormingut ‘n’. ‘n’ vormindab kuud 1-12, mis aitab massiivist leida üles õige kuu. Lõpuks väljastan kuu soovitud formaadis

    <?php
    //kuude massiiv
    $eesti_kuud = array(1=>'jaanuar', 'veebruar', 'märts', 'aprill', 'mai', 'juuni', 'juuli', 'august', 'september', 'oktoober', 'november', 'detsember');
    //kuupäevad massiividesse
    $paev = date('d');
    $kuu = $eesti_kuud[date('n')];
    $aasta = date('Y');
    //kuupäeva väljastamine
    echo $paev.'.'.$kuu.' '.$aasta;	//22.veebruar2013
    ?>
    
## Muu soovitud kuupäeva genereerimine
Hetkel lasime PHP’l genereerida hetkekuupäeva, tundus päris lihtne? Aga mis saab siis kui soovin mõnda muud kuupäeva? Sellisel juhul tuleb kasutada **mktime()** funktsiooni.

    mktime(tunnid, minutid, sekundid, kuu, päev, aasta, suveaeg)
Antud funktsioon loob ajatempli ikka sekundites, seega tuleb see vormindada vastavalt. Soovime näiteks kuvada interneti sünnipäeva 29.10.1969.

    $sp = mktime(0,0,0,10,29,1969);
    echo date('d.m.Y', $sp);	//29.10.1969
Funktsioonis oli selline tore parameeter nagu ‘suveaeg’. Lisades 1, lülitad suveaja sisse ja 0 välja. Kui sa seda ei lisa, siis jätad selle PHP’le otsustada.

## Tehted kuupäevadega
Üks võimalus ajaga arvutamiseks on **time()** ajatemplile lisada või eemaldada vastav arv sekundeid. Näiteks **time()+60** puhul lisatakse juurde 60sek ehk 1min jne. Loodan, et põhikooli matemaatika tuleb meelde 🙂

    echo date('d.m.Y G:i' , time()+60);			//1min pärast
    echo date('d.m.Y G:i' , time()+60*60);		//1h pärast
    echo date('d.m.Y G:i' , time()+60*60*24);	//24h pärast
Kui päevade, kuude ja aastateni jõuad, siis võib arvutamine natuke keerulisemaks osutada, seepärast võiks arvutusi teha mktime() funktsiooniga. Näiteks 27 aastat enne.

ui päevade, kuude ja aastateni jõuad, siis võib arvutamine natuke keerulisemaks osutada, seepärast võiks arvutusi teha mktime() funktsiooniga. Näiteks 27 aastat enne.

    $sp = mktime(0,0,0,10,29,1969-27);
    echo date('d.m.Y', $sp);			//29.10.1942
Kuupäevadega arvutamisel on võimalik kasutada ka inglise keelseid lauseid, näiteks järgmised:

      echo strtotime("now");
      echo strtotime("tomorrow");
      echo strtotime("yesterday");
      echo strtotime("10 September 2000");
      echo strtotime("+1 day");
      echo strtotime("+1 week");
      echo strtotime("+2 week 3 days 4 hours 5 seconds");
      echo strtotime("next Thursday");
      echo strtotime("last Monday");
      echo strtotime("5pm + 6 Hours");
      echo strtotime("now + 4 fortnights");
      echo strtotime("last Monday");
      echo strtotime("4pm yesterday");
      echo strtotime("6am 10 days ago");
      
Seletused leiad siit: http://www.php.net/manual/en/datetime.formats.relative.php

## Kuupäeva valideerimine
Nagu eelpool mainitud, on ajafunktsioone päris palju ja kõike ei jõua läbi vaadata. Viimase asjana tahaks siiski näidata funktsiooni, mis kontrollib, kas selline kuupäev eksisteerib. Kasuta seda näiteks kasutaja poolt sisestatud kuupäeva kontrollimiseks. Kui antud kuupäev on olemas, tuleb ‘Kuupäev korras!’ ja kui on mingi viga, nagu allpool, siis ‘Kuupäev on valesti sisestatud’.

    if(checkdate(12,32,2013)) {
        echo('Kuupäev korras!');
    } else {
        echo ('Kuupäev on valesti sisestatud');
    }
    
    
    
# Tekstifunktsioonid
Oleme siiani usinasti juba teksti kasutanud – seda väljastades, liitnud erinevaid tekstiosi ning teostanud mõningast vormindamist. Selles peatükis sunnime peale oma vormindamist, vaatame kuidas leida tekstist midagi ning vajadusel asendada soovitud sõnad teise tekstiga.

## Teksti vormindamine
Vaatame nelja funktsiooni, mis muudavad väiketähti suureks ja vastupidi:

- **strtolower()** – muudab teksti väiketähtedeks
- **strtoupper()** – muudab teksti SUURTÄHTEDEKS
- **ucfirst()** – muudab teksti kõige esimese märgi suureks
- **ucwords()** – muudab iga sõna esimese tähe suureks

Kõik need funktsioonid töötavad kenasti, sinu mureks on lisada ainult soovitud tekst.

    $tekst = 'Life Is About Ignoring The Drama.';
	echo strtolower($tekst);
	echo '<br>';
	echo strtoupper($tekst);
	
Kuid kui soovin **ucfirst()** abil muuta ainult esitähte suureks, siis see jätab ülejäänud muutmata. Sellepärast on hea mõte, tekst enne väiksemaks muuta ja siis esitäht suureks.

	$tekst = 'Life Is About Ignoring The Drama.';
	echo ucfirst(strtolower($tekst));
	
## Teksti pikkus
Aegajalt on tarvis teada, mitu märki on sinu tekstis või mitmest lausest sinu tekst koosneb. Seda näiteks kasutajanime ja parooli kontrollimiseks või näiteks tahate piirata sõnumite arvu. Nende soovide täitmiseks on kaks funktsiooni:

- **strlen()** – loeb kokku märkide arvu tekstis, ka tühikud ja kirjavahemärgid
- **str_word_count()** – loeb kokku sõnade arvu

        $tekst = 'Experience is the teacher of fools';
        echo strlen($tekst);			//34
        echo '<br>';
        echo str_word_count($tekst);	//6
    
str_word_count() pakub parameetrite näol veelgi võimalusi, kuid seda vaatame kaks pealkirja allpool.

## Teksti kärpimine
Teksti kärpimise all pean silmas seda, et tekstis võib olla midagi liiga palju, näiteks ülearused tühikud, tabulaatorid, soovimatu kood või soovid kuvada vähem. Alustame sellest, et muutuja algusesse ja lõppu on sattunud ülearused tühikud ja tabulaatorid. Sellise teksti kuvamisel eemaldatakse kõik automaatselt ja ei olegi nagu probleemi. Probleem tekib, kui see kirjutada näiteks andmebaasi. Aga, et tulemus oleks hetkel kenasti silmaga näha, siis lisan kõik **\<pre>\</pre>** siltide vahele.

    $tekst = ' 	A woman should soften but not weaken a man   ';
    echo "<pre>$tekst</pre>";
    echo "<pre>".trim($tekst)."</pre>";
    echo "<pre>".ltrim($tekst)."</pre>";
    echo "<pre>".rtrim($tekst)."</pre>"; 
    
Niisiis kasutasime **trim()** funktsiooni, mis eemaldas ülearuse tühja nii paremalt kui vasakult. Teised kaks, **ltrim()** ja **rtrim()** eemaldab vasavalt vasakult ja paremalt. Kõik kolm kärpimise funktsiooni lubavad lisada ka sümbolid, mida soovid eemaldada. Funktsioon on tõstutundlik, sümbolid eraldatakse komaga ning tähestiku vahemikk tuleb tähistada kahe punktiga (..). Eemaldame teksti otstest märgid A ja a ning k kuni n.

    $tekst = 'A woman should soften but not weaken a man';
    echo trim($tekst, "A, a, k..n, w");	//oman should soften but not weake
    
Aga kui kasutaja üritab saata teksti, mis sisaldab HTML ja PHP koodi, siis on juhtumeid, kus tahad sellest lahti saada. Sellest aitab lahti saada **strip_tags()** funktsioon.

    $tekst = '<b>Experience</b> <a href="#">is</a> the teacher <br>of fools';
    echo strip_tags($tekst); 	//Experience is the teacher of fools
 
Sama funktsioon lubab ka määrata, mis märgendid on lubatud. Lubame näiteks <b> ja <br> sildid.

    $tekst = '<b>Experience</b> <a href="#">is</a> the teacher <br>of fools';
    echo strip_tags($tekst, '<b>, <br>'); 	//<b>Experience</b> is the teacher <br>of fools   
   
## Tekst kui massiiv
PHP käsitleb teksti kui massiivi, kus esimene märk on indeksiga 0 jne.

    $tekst = 'All thinking men are atheists';
    echo $tekst[0]; 				//A
    echo '<br>';
    echo $tekst[4]; 				//t
    
Kui soovid tekstist mingit osa kätte saada, siis kasuta funktsiooni substr(), kus esimene arv määrab mitmenast indeksist alustatakse ning teine mitmendast lõpetatakse. Lisades negatiivsed arvud, hakkatakse lugema lõpust algusesse.

    $tekst = 'All thinking men are atheists';
    echo substr($tekst, 3, 5);		//thin
    echo '<br>';
    echo substr($tekst, 4, -13);	//thinking men
    echo '<br>';
    echo substr($tekst, -8, 7);		//atheist
    
Mõni rida üles, kasutasime sõnade kokkulugemiseks **str_word_count()** funktsiooni. Sellele funktsioonile lisades parameetrina 1, loetakse sõnad kui massiivi elemendid.

    $tekst = 'All thinking men are atheists';
    print_r(str_word_count($tekst, 1));		//Array ( [0] => All [1] => thinking [2] => men [3] => are [4] => atheists )
    
Sellest massiivist siis mõne sõna väljakutsumiseks paiguta see esmalt muutujasse ja siis määra indeks.

    $tekst = 'All thinking men are atheists';
    $sona = str_word_count($tekst, 1);
    echo $sona[2];							//men
    
Andes **str_word_count()** funktsioonile parameetri 2, määratakse sõna indeks vastava sümboli indeksiga kogu massiivis.

    $tekst = 'All thinking men are atheists';
    print_r(str_word_count($tekst, 2));		
    //Array ( [0] => All [4] => thinking [13] => men [17] => are [21] => atheists ) 
    
## Tekstist otsimine
Meie tekstifunktsioonide peatükk on jõudmas lõpule. Viimase osana vaatame kuidas leida tekstist teatud sõnu ning pärast seda kuidas soovitud asendada. Otsimiseks **strpos()** funktsiooni, mis lubab meil lisada kolm parameetrit:

 - tekst, kust otsitakse
- tekst, mida otsitakse
- nihe ehk mitmendast märgist otsimist alustatakse.

        $tekst = 'Happiness in intelligent people is the rarest thing I know.';
        $otsitav = 'in';
        $leia_tekstist = strpos($tekst, $otsitav, 0);	//4
        echo $leia_tekstist;
        
Meil on siis tekst, kust otsime näiteks sõna ‘in’ ja alustame algusest. Tulemuseks saame indeksi väärtuse ‘4’, kuna ‘Happiness’ sõnas on see täitsa olemas. Kui nihet muuta, siis leiab see kenasti järgmise asukoha.

    ...
    $leia_tekstist = strpos($tekst, $otsitav, 6);	//10
    ...
    
Järgmine samm selle koodi puhul võiks olla see, et see leiab tekstist kõik otsitavad. Arvatavasti võiks kasutada selleks mingisugust tsüklit, mis väljastab soovitud indeksi ja muudab nihet. Nihke arvutamisel tuleb siis arvesse võtta juba leitud indeksi väärtust ja otsitava sõna pikkus.

    $tekst = 'Happiness in intelligent people is the rarest thing I know.';
    $otsitav = 'in';
    $nihe = 0;
    while($leia_tekstist = strpos($tekst, $otsitav, $nihe)){	//4 10 13 48
        echo $leia_tekstist.'<br>';
        $nihe = $leia_tekstist+strlen($otsitav);
    }
    
Nagu näha, leiab see kenasti kõik sõna asukohad.

## Teksti asendamine
Teksti asendamiseks vaatame kahte funktsiooni. Esimesena kasutame **substr_replace()** funktsiooni, mis vajab nelja parameetrit:

- tekst, kust otsida
- asendatav tekst
- arv, mis tähistab indeksit, kuhu asendatav tekst lisatakse
- arv, mis tähistab asendatava sõna pikkuse

Loome lause, kus soovime asendada sõna ‘papa’ sõnaga ’emme’.

    $tekst = 'Pai papa, pane paadile punased purjed peale';
    $asendus = 'emme';
    $otsitav_algus = 4;
    $otsitav_pikkus = 4;
    echo substr_replace($tekst, $asendus, $otsitav_algus, $otsitav_pikkus);
    
Nagu näha määrasime koha, kuhu uus sõna läheb (4) ning mitu tähte nö. ära kustutatakse (4). Samas saab need arvud ka ju dünaamiliseks teha.

    $tekst = 'Pai papa, pane paadile punased purjed peale';
    $asendus = 'emme';
    $otsitav = 'papa';
    $nihe = 0;
    $asenduse_algus = strpos($tekst, $otsitav, $nihe);
    $asenduse_markide_arv = strlen($otsitav);
    echo substr_replace($tekst, $asendus, $asenduse_algus, $asenduse_markide_arv);
    
Loomulikult võid kasutada eelpool õpitud tsüklit, kui asendatavaid sõnu on tekstis rohkem. Kindla sõna asendamiseks kasutame **str_replace()**, mis tahab saada vähemalt kolme parameetrit:

- otsitav tekst
- asendus tekst
- tekst, kust otsida


    $tekst = 'Musta lehma saba musta lehma taga, valge lehma saba valge lehma taga';
    $otsi = 'lehm';
    $asenda = 'koer';
    echo str_replace($otsi, $asenda, $tekst); 

Selle funktsiooni juures on tore see, et otsitavad ja asendatavad võivad olla massiivis.

    $tekst = 'Musta lehma saba musta lehma taga, valge lehma saba valge lehma taga';
    $otsi = array('lehm', 'saba', 'taga');
    $asenda = array('koer', 'sarv', 'ees');
    echo str_replace($otsi, $asenda, $tekst);
    

# Koodi taaskasutamine
Vaatame kuidas on mõistlik varem kirjutatud koodi taaskasutada, et muuta koodi lühemaks ja võita ajas. Selles peatükis peatume **require()** ja **include()** funktsioonide juures. Kui saame teada, mida need teevad, siis loome nende abil nö. dünaamilise lingi.

## require vs include
Mõlemad funktsioonid teevad kasutaja jaoks ühte ja sama. Nende erinevus tuleb välja alles vea tekkimisel Require() annab fatal error‘i ja kood üritab edasi töötada aga include() lõpetab programmi edasise töö. Aga mida nad siis teevad? Nimetatud funktsioonid võimaldavad laadida avatud dokumenti teise faili sisu. See võimaldab pikka koodi jagada erinevate failide vahel. Näiteks on meil veebileht, kus dokumendi päis ja jalus on üks ja sama.

    <!doctype html>
    <html>
    <head>
    <title>Koodi taaskasutamine</title>
    <style>
    * {
        padding: 0;
        margin: 0;
        font-family: Verdana, Geneva, sans-serif;
    }
    #pais {
        background-color: #6C9;
        line-height: 100px;
    }
    #jalus {
        background-color: #F93;
        line-height: 30px;
    }
    </style>
    </head>
    <body>
    <header id="pais">
      <h1>Lorem Ipsum web</h1>
    </header>
    <div id="sisu">
      <h2>Lorem ipsum</h2>
      <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris lacinia feugiat mi, ac blandit purus hendrerit vel.</p>
    </div>
      <footer id="jalus">
        <p>No kopirait</p>
      </footer>
    </body>
    </html>
    
Ja kui meil lehti oleks rohkem ning kui soovid muudatusi teha, siis peaksid kõik lehed läbi käima (koodis olev CSS võiks ka olla omaette failis). Seega võtan hoopis kogu koodi, mis on sisust üleval  ja all ning kopeerin eraldi faili. Dokumenti toomiseks kasutan siis include() funktsiooni.

    <?php include('13_includerequire_pais.php'); ?>
    <div id="sisu">
      <h2>Lorem ipsum</h2>
      <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris lacinia feugiat mi, ac blandit purus hendrerit vel.</p>
     </div>
     
    <?php include('13_includerequire_jalus.php'); ?>
    
Nüüd dokumendi avamisel laetakse teised kaks teist faili kenasti omale kohale ja tulemus on sama, mis enne. Paremaks muutus nüüd see, et saame keskenduda just sisule ja kui vaja teha muudatusi päises, siis saan seda teha ühest failist. Ühendatava dokumendi faililõpp pole oluline ja seepärast võid nimetamisel kasutada näiteks **pais.inc** või **pais.inc.php** nimesid. Lihtsalt *.inc kasutamisel võib olla oht, et kasutaja trükkides sisse antud faili näeb su koodi.

## require_once ja include_once
Kasutades funktsioone **require_once** või **include_once**, uurib kood, kas soovitud fail on juba eelnevalt ühendatud. Kui on, siis seda rohkem ei tehta.

    <?php 
        include('13_includerequire_pais.php'); 
        include_once('13_includerequire_pais.php'); 	//ei käivitu, kuna on juba olemas
    ?>
    
## Dünaamilised lingid
Loome lingid, mille põhjal kood valib vastava dokumendi sisu. Ja kasutame kenasti **inlude()** funktsiooni abi. Meil on hetkel situatsioon, kus meil on neli php dokumenti ja soovime, et teiste dokumentide sisu kuvatakse index.php dokumendis.

Avame index.php ja loome lingid, mille kaudu saab kasutaja öelda, millise faili sisu vaja on (jätsin harjutusest päise ja jaluse välja).

    <menu>
        <a href="index.php">Avaleht</a> |
        <a href="index.php?leht=portfoolio">Portfoolio</a> |
        <a href="index.php?leht=kaart">Kaart</a> |
        <a href=index.php?leht=kontakt">Kontakt</a>
    </menu>
    
    <h2>Avaleht</h2>
    <p>Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum</p>
    
See kood lisab aadressiribale muutuja ‘leht’ koos väärtustega.

Info kättesaamiseks aadressiribalt kasutasime GET meetodit. Nüüd kui kasutaja on vajutanud lingile kontakt, siis saame selle ühildada meie failinimega. Et kasutaja ei saaks veateadet, kuni ta pole lingile vajutanud, siis lisame ette kontrolli.

    <menu>
        <a href="index.php">Avaleht</a> |
        <a href="index.php?leht=portfoolio">Portfoolio</a> |
        <a href="index.php?leht=kaart">Kaart</a> |
        <a href=index.php?leht=kontakt">Kontakt</a>
    </menu>
    
    <?php
    if(!empty(&_GET['leht'])){
        include(&_GET['leht'].'php');
    } else {
    
    ?>
    <h2>Avaleht</h2>
    <p>Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum</p>
    <?php
    }
    ?>
    
Antud koodis on PHP kood vahepeal katkestatud, et saaks kirjutada tavalist HTML koodi. Nüüd on probleem, et failide külgepookimine ilma kontrollita, ei ole kõige turvalisem ja kui kasutaja muudab aadressiribal muutuja väärtust, siis saame veateate. Kontrollida võiks kas küsitud fail eksisteerib **(is_file())**. Ja siis keelaks igasugused html märgendid.

    <?php
    if(!empty($_GET['leht'])){
        $leht = htmlspecialchars($_GET['leht']);
        if(is_file($leht.'.php')){
            include($leht.'.php');
        } else {
            echo 'Valitud lehte ei eksisteeri!';
        }
    } else {
    ?>
    
Võibolla tasuks luua lubatud lehtede massiivi ning kood kontrollib, kas selline leht on nimekirjas või mitte.

    <?php
    if(!empty($_GET['leht'])){
        $leht = htmlspecialchars($_GET['leht']);
        $lubatud = array('portfoolio','kaart','kontakt');
        $kontroll = in_array($leht, $lubatud);
        if($kontroll==true){
            include($leht.'.php');
        } else {
            echo 'Valitud lehte ei eksisteeri!';
        }
    } else {
    ?>
    
Täiendan seda peatükki veelgi, sest tekkis idee kuidas seda saaks veel kontrollida. Nimelt võiks ju tekitada lehed leht1.php, leht2.php jne. Miks? Sest me saaks läbi GET muutuja küsida numbrit ja seda kontrollida **is_numeric()** funktsiooniga.

    $leht = $_GET['leht'];
    if(is_numeric($leht)){
       include('leht'.$leht.'.php');
    }