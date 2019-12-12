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