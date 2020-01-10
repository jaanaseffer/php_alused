<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ülesanne 3</title>
</head>
<body>
<form action="ylesanne3.php" method="get">
    Kera ruumala, sisesta kera raadius <input type="text" name="kera"><br>
    Koonuse ruumala, sisesta koonuse raadius <input type="text" name="koonuse_raadius"><br>
    Koonuse ruumala, sisesta koonuse kõrgus <input type="text" name="koonuse_korgus"><br>
    Silindri ruumala, sisesta silindri raadius <input type="text" name="silindri_raadius"><br>
    Silindri ruumala, sisesta silindri kõrgus <input type="text" name="silindri_korgus"><br>
    <input type="submit" value="Saada">
</form>
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
