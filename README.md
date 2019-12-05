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

