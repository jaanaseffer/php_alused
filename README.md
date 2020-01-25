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
    
    
    
