<?php
// faili sisu kuvamine
$allikas = 'pallivise.csv';
$minu_csv = fopen($allikas, 'r') or die('Ei leia faili!');
$rida = fgetcsv($minu_csv, filesize($allikas),';');
var_dump($rida);
fclose($minu_csv);
echo '<hr>';

//rea kaupa
$allikas = 'pallivise.csv';
$minu_csv = fopen($allikas, 'r') or die('Ei leia faili!');
$jrk = 1;
while(!feof($minu_csv)){
    $rida = fgetcsv($minu_csv, filesize($allikas),';');
    $arv = count($rida); //rea väljade arv
    echo $jrk.'. '; //järjekorra number
    $jrk++;
    for($i = 0; $i<$arv; $i++){
        echo $rida[$i].' ';
    }
    echo '<br>';

}
fclose($minu_csv);
echo '<hr>';

//faili sisu tükeldamine
$allikas = 'emailid.txt';
$minu_fail = fopen($allikas, 'r');
$faili_sisu = file_get_contents($allikas);
$massiiv = explode("\n", $faili_sisu); //tükeldab realõpust
$suurus = count($massiiv);
for ($i = 0; $i < $suurus; $i++) {
    $rida = $massiiv[$i];
    $nimi = explode('(at)', $rida); //tükeldab (at) märgi kohast
    echo $nimi[0].'<br>';
}
fclose($minu_fail);
echo '<hr>';

//faili sisu ühendamine
$nimed = array('jyri', 'mari', 'juhan', 'kr66t', 'gusta');
$emailid = implode(", ", $nimed);
echo $emailid;