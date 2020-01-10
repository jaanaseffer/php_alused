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
for($i=0, $i<$opilasteArv;$i=i+1){
    echo $vso19[$i].'<br>';
}