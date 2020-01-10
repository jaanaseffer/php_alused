<?php
$vso19 = array(
    'Anne-Mari',
    'Andre',
    'Rene',
    'Maritn',
    'Mairit',
    'Erko',
    'Kerli',
    'Hanna-Liisa',
    'Jaana'
);
$opilasteArv = count($vso19);
echo 'VSO19 rühmas on '.$opilasteArv.' õpilast<br>';
echo 'Need on:<br>';
for($i=0; $i<$opilasteArv;$i++){
    echo $vso19[$i].'<br>';
}
foreach ($vso19 as $opilane){
    echo $opilane.'<br>';
}
$jaana = array(
    'eesnimi' => 'Jaana',
    'perenimi' => 'Šeffer'
);
echo '<pre>';
print_r($jaana);
echo '</pre>';
foreach ($jaana as $element => $vaartus){
    echo $element.'<br>';
}
foreach ($jaana as $element => $vaartus){
    echo $vaartus.'<br>';
}
foreach ($jaana as $element => $vaartus){
    echo $element.' - '.$vaartus.'<br>';
}
