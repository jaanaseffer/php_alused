<?php
// Kasutaja lisab vormi nime, seda näiteks suured ja väikesed tähed läbisegi. Sina kood tervitab teda kenasti nimepidi,
// kus nimi algab suure algustähega.
//Näiteks: sisend–>mARiO; väljund–>Tere, Mario!
$sisend = $_GET['nimi'];
echo "Tere, ".ucfirst(strtolower($sisend))." !";
echo '<hr>';

// Kuna on teada, et PHP käsitleb teksti kui massiivi, siis peaks saama seda tsükli abil nö. tükeldada. Ülesandeks on
// etteantud teksti iga tähe järgi lisada punkt.
//Näiteks: sisend–>stalker; väljund–>S.T.A.L.K.E.R.
$sisend1 = $_GET['sisend'];
$strLen = strlen( $sisend1 );
for($i = 0; $i < $strLen; $i += 1){
    echo strtoupper(substr($sisend1, $i, 1) . '.');
}
echo '<hr>';


//Koosta tekstiväli, mis kuvab kasutaja sisestatud sõnumeid. Kasutaja ropud sõnad asendatakse tärnidega.
//Näiteks: sisend–>Sa oled täielik noob; väljund–>Sa oled täielik ***
$lause = $_GET['lause'];
$otsi = array('noob', 'jobu', 'nõme', 'värdjas');
echo str_replace($otsi, "***", $lause);
echo '<hr>';


//Kasutajalt saadud eesnime ja perenime põhjal luuakse talle email lõpuga @hkhk.edu.ee. Kusjuures täpitähed
// asendatakse ä->a, ö->o, ü->y, õ->o ja kogu email on väikeste tähtedega
//Näiteks: sisend–>Ülle ja Doos; väljund–>ylle.doos@hkhk.edu.ee
//$eesNimi = "Ülle";
//$pereNimi = "Doos";
//$otsi = array('Ü', 'Õ', 'Ö', 'Ä', 'ü', 'õ', 'ö', 'ä');
//$asenda = array('u', 'o', 'o', 'a', 'u', 'o', 'o', 'a');
//$eesNimiAsendatud = strtolower(str_replace($otsi, $asenda, $eesNimi));
//$pereNimiAsendatud = strtolower(str_replace($otsi, $asenda, $pereNimi));
//echo $eesNimiAsendatud.'.'.$pereNimiAsendatud."@khk.edu.ee";

// regulaaravaldistega

$nimiJaPerenimi = $_GET['nimijaperenimi'];
$asendus = array(
    'ä' => 'a',
    'ö' => 'o',
    'ü' => 'u',
    'õ' => 'o',
    'Ä' => 'A',
    'Ö' => 'O',
    'Ü' => 'U',
    'Õ' => 'O',
);
foreach ($asendus as $otsi=>$asenda){
    $nimiJaPerenimi = str_replace($otsi, $asenda, $nimiJaPerenimi);
}
$tyhikuIndeks = strpos($nimiJaPerenimi, ' ', 0);
$nimi = strtolower(substr($nimiJaPerenimi, 0, $tyhikuIndeks));
$nimiJaPerenimi = substr($nimiJaPerenimi, $tyhikuIndeks+1);
$tyhikuIndeks = strpos($nimiJaPerenimi, ' ');
$perenimi = strtolower(substr($nimiJaPerenimi,$tyhikuIndeks+1));
$email = $nimi.'.'.$perenimi.'@khk.ee';
echo $email;
echo '<hr>';
// regulaaravaldistega
$nimiJaPerenimi = $_GET['nimijaperenimi'];
$asendus = array(
    'ä' => 'a',
    'ö' => 'o',
    'ü' => 'u',
    'õ' => 'o',
    'Ä' => 'A',
    'Ö' => 'O',
    'Ü' => 'U',
    'Õ' => 'O',
);
foreach ($asendus as $otsi=>$asenda){
    $nimiJaPerenimi = str_replace($otsi, $asenda, $nimiJaPerenimi);
}
$eesnimiRE = '/^[A-Z][a-z]* /';
$perenimiRE = '/ [A-Z][a-z]*/';
preg_match($eesnimiRE, $nimiJaPerenimi, $eesnimi);
preg_match($perenimiRE, $nimiJaPerenimi, $perenimi);
if(!empty($eesnimi) and !empty($perenimi)){
    $kasutaja = strtolower(trim($eesnimi[0])).'.'.strtolower(trim($perenimi[0]));
    echo $kasutaja.'@khk.ee';
}
