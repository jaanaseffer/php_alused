<?php
$ained=array('mata','muusika','ajalugu','keka','bioloogia','keemia');
sort($ained);
foreach($ained as $aine){
    echo "$aine <br>";
}

$nimed = array('Martin','Hardi','Juhan','Tiina','Sirje','Kaie');
$pallivisked = array(33, 32, 27, 11, 15, 28);
//loeme osalejad kokku
echo count($nimed);
//tühi rida
echo "<br>";
//leiame keskmise palliviske summa
echo "Keskmine vise on: ".array_sum($pallivisked)/count($pallivisked);
echo "<br>";
//leiame suurima tulemuse
echo "Parim tulemus on: ".max($pallivisked);
echo "<br>";
echo "Parima tulemuse visanud õpilane on: ".print_r(array_keys($pallivisked, max($pallivisked)));