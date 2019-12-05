<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Ruumalad</h1>
<?php
//lisab vormist saadud andmed muutujasse
$kera = $_GET['kera'];
$koonus_r = $_GET['koonuse_raadius'];
$koonus_h = $_GET['koonuse_korgus'];
$silinder_r = $_GET['silindri_raadius'];
$silinder_h = $_GET['silindri_korgus'];
//ruumalade arvutamine
$kera_ruumala = 4/3*3.14*pow($kera,3);
$silindri_ruumala = 3.14*pow($koonus_r, 2)*$silinder_h;
$koonuse_ruumala = 3.14*pow($koonus_r, 2)*($koonus_h/3);

echo 'Kera ruumala on: '.$kera_ruumala.'<br>';
echo 'Koonuse ruumala on: '.$koonuse_ruumala.'<br>';
echo 'Silindri ruumala on: '.$silindri_ruumala.'<br>';
?>
</body>
</html>
