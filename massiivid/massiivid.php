<?php
$nimed=array('mari','kati','juhan','miku','uku');
$vanused=array(15, 23, 32, 28, 18);
/*
//massiivi sisu parameetritega
var_dump($nimed);
//massiivi sisu kuvamine
print_r($nimed);
echo $nimed[0];
//massiivi kõigi elementide kuvamine
foreach ($nimed as $nimi){
    echo "$nimi <br>";
}

//assotsiatiivsed massiivid
$hinded = array(
    'kehv' => 2,
    'rahuldav' => 3,
    'hea' => 4,
    'väga hea' => 5
);
echo $hinded['kehv'];
$hinded = array(
    'kehv' => 2,
    'rahuldav' => 3,
    'hea' => 4,
    'väga hea' => 5
);
foreach($hinded as $hinnang => $hinne){
    echo "<li>Hinne: $hinne ($hinnang)</li>";
}

//lisamine massiivi
array_push($nimed, 'ahmed', 'ahti');
var_dump($nimed);

$nimed[] = 'ahmed';
var_dump($nimed);
$nimed[13] = 'ahmed';

//lisab algusesse
array_unshift($nimed, 'laura');
var_dump($nimed);
//massiivist eemaldamine (viimane)
array_pop($nimed);
//massiivist eemaldamine (esimene)
array_shift($nimed);

$nimi = array_pop($nimed);
echo "Eemaldati: ".$nimi;

//massiivi väärtuse loendamine
echo count($nimed);

//massiivi väärtuste sorteerimine
//sorteerimine
sort($nimed);
var_dump($nimed);

//assotatiivne massiiv
$hinded = array(
    'kehv' => 2,
    'rahuldav' => 3,
    'hea' => 4,
    'väga hea' => 5
);
ksort($hinded);
var_dump($hinded);

//assotatiivne massiiv
$hinded = array(
    'kehv' => 2,
    'rahuldav' => 3,
    'hea' => 4,
    'väga hea' => 5
);
asort($hinded);
var_dump($hinded);

shuffle($nimed);
var_dump($nimed);

//mitmemõõtelised massiivid
//mitmemõõtmelised massiivid
$riigid = array(
    'Eesti'=>array('pealinn'=>'Tallinn','rahvaarv'=>1340000),
    'Austria'=>array('pealinn'=>'Viin','rahvaarv'=>8356700),
    'Belgia'=>array('pealinn'=>'Brüssel','rahvaarv'=>10827500)
);

var_dump($riigid);
echo $riigid['Eesti']['pealinn'];
*/
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