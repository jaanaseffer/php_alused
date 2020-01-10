<?php
$ained=array('mata','muusika','ajalugu','keka','bioloogia','keemia');
sort($ained);
foreach($ained as $aine){
    echo "$aine <br>";
}

$nimed = array('Martin','Hardi','Juhan','Tiina','Sirje','Kaie');
$pallivisked = array(33, 32, 27, 11, 15, 28);
echo count($nimed);
echo "<br>";
echo "Keskmine vise on: ".array_sum($pallivisked)/count($pallivisked);
echo "<br>";
echo "Parim tulemus on: ".max($pallivisked);
echo "<br>";
