<?php
date_default_timezone_set('Europe/Tallinn');
// Kuva kuupäev ja kellaaeg formaadis 20.03.2013 12:31
$hetkeAeg = time();
$vormindatudAeg = date('d.m.Y G:i', $hetkeAeg);
$konkreetneAeg = mktime(12,31, 0, 3 , 20, 2013);
$vormindatudKonkreetneAeg = date('d.m.Y G:i', $konkreetneAeg);
echo $vormindatudAeg.'<br>';
echo $vormindatudKonkreetneAeg.'<br>';
echo '<hr>';
//Kuva tänane eestikeelne nädalapäev, N: kolmapäev
$nadal = array(
    '1' => 'esmaspäev',
    '2' => 'teisipäev',
    '3' => 'kolmapäev',
    '4' => 'neljapäev',
    '5' => 'reede',
    '6' => 'laupäev',
    '7' => 'pühapäev'
);
$hetkeAeg = time();
$nadalaPaevaNumber = date('N', $hetkeAeg);
echo $nadal[$nadalaPaevaNumber];
echo '<hr>';

// Kuva eestikeelne kuupäev koos nädalapäevaga. Näiteks: 23.veebruar 2013 laupäev
$kuud = array(
    '1' => 'jaanuar',
    '2' => 'veebruar',
    '3' => 'märts',
    '4' => 'aprill',
    '5' => 'mai',
    '6' => 'juuni',
    '7' => 'juuli',
    '8' => 'august',
    '9' => 'september',
    '10' => 'oktoober',
    '11' => 'november',
    '12' => 'detsember'
);
$hetkeAeg = time();
$nadalaPaevaNumber = date('N', $hetkeAeg);
$kuuNumber = date('n', $hetkeAeg);
$valjund = date('d.').$kuud[$kuuNumber].date(' Y ').$nadal[$nadalaPaevaNumber];
echo $valjund;
echo '<hr>';

// Leia mitu päeva on jäänud järgmise jaanipäevani. Näiteks: 2014 aasta jaanipäevani on jäänud 236 päeva!
$hetkel = time();
$jaaniPaev = mktime(0, 0, 0, 6, 24, date('Y'));
$vaheSekundites = $jaaniPaev - $hetkel;
$vahePaevadel = round($vaheSekundites / (60 * 60 *24) , 0);
$valjund1 = date('Y ').'aasta jaanipäevani on jäänud '.$vahePaevadel.' päeva!';
echo $valjund1;
echo '<hr>';

// Minu sünnipäev on 06.11.1980! Leia kumb on meist vanem. Kuva mõlema sünnikuupäevad ning vahe aastates.
$temaSynna1980 = mktime(0, 0, 0, 11, 6, 1980);
$temaSynna2020 = mktime(0,0,0,11,6,date('Y'));
$temaVanusSekundites = $temaSynna2020 - $temaSynna1980;
$temaValjund = date('d.m.Y', $temaSynna2020);

$minuSynna1987 = mktime(0,0,0, 2,11,1987);
$minuSynna2020 = mktime(0,0,0,2,11, date('Y'));
$minuVanusSekundites = $minuSynna2020 - $minuSynna1987;
$minuValjund = date('d.m.Y', $minuSynna2020);

$vaheSekundites = $temaVanusSekundites - $minuVanusSekundites;

echo $temaValjund.'<br>';
echo $minuValjund.'<br>';
echo 'Vahe aastates on: '.round(abs($vaheSekundites) / (60*60*24*30.4*12),0).'<br>';

if($vaheSekundites > 0) {
    echo 'Tema on vanem<br>';
} else if($vaheSekundites < 0) {
    echo 'Mina olen vanem<br>';
} else {
    echo 'Oleme sama vanad<br>';
}
echo '<hr>';

// Leia, kas sul on järgmine aasta juubel?
$minuVanusAastades = round($minuVanusSekundites / (60*60*24*30.4*12),0);
echo $minuVanusAastades.'<br>';
$juubel = $minuVanusAastades % 5;
echo $juubel.'<br>';
if($juubel = 0) {
    echo 'On juubel<br>';
} else {
    echo 'Ei ole juubel<br>';
}
echo '<hr>';

//Koosta kood, mis tervitab sind vastavalt ajale. N: 8:00+ “Tere hommikust!”, 13:00+ “Tere päevast!” ja 17:00+ “Tere õhtust!”
echo date("h:i a");
$morningTime = "08:00:00";
$dayTime = "13:00:00";
$eveningTime = "17:00:00";
$currentTime = date("h:i a");
if($currentTime > $morningTime and $currentTime < $dayTime) {
    echo "Tere hommikust!<br>";
} else if ($currentTime > $dayTime and $currentTime < $eveningTime) {
    echo "Tere päevast!<br>";
} else if ($currentTime > $eveningTime) {
    echo "Tere õhtust!<br>";
}
echo '<hr>';