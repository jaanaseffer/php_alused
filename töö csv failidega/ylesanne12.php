<?php
//leia auto sõiduaeg tundides ja minutites. Arvutused teosta kasutajalt saadud andmete põhjal, kus kasutaja lisab
// stardi ja lõppaja kujul hh:mm. Eeldame, et sõiduaeg jääb ühe ööpäeva sisse. Lisa tühja välja kontroll ja näiteks,
// kas lisatud ajad on vähemalt viis sümbolit pikad.
$andmeFail = 'soiduaeg.csv';
$algusAeg = $_GET['start'];
$loppAeg = $_GET['finish'];
// tühja välja kontroll
if(strlen($algusAeg) == 0 or strlen($loppAeg) == 0) {
    echo '<a href="form12.php">Sisesta kõik andmed!</a>';
} else {
    // sisestatud andmete pikkus peab olema 5 sümbolit pikk
    if(strlen($algusAeg) != 5 or strlen($loppAeg) != 5) {
        echo '<a href="form12.php">Sisesta andmed õiges formaadis!</a>';
    } else {
        // arvutame sõiudaeg
        $ajaAndmed = array(); // vormist tulnud andmed võtame ühekaupa
        foreach ($_GET as $aeg){
            $aeg = explode(':', $aeg); // jagame tundideks ja minutiteks
            // vormistame absoluutaeg sekundites
            $aeg = mktime($aeg[0], $aeg[1], 0,date('m', time()),date('d', time()),date('Y', time()));
            $ajaAndmed[] = $aeg; // ja salvestame massiivi
        }
// arvutame sekundites vahe sõidu alguse ja lõppu vahel
        $vaheSekundites = $ajaAndmed[1] - $ajaAndmed[0];
        // leiame tunnid ja minutid
        $soiduTunnid = (int)($vaheSekundites / (60 * 60));
        $soiduMinutid = $vaheSekundites % (60 * 60) / 60;
        // salvestame andmed failisse
        $ridaFailisse = $algusAeg.";".$loppAeg.";".$soiduTunnid.";".$soiduMinutid."\n"; // loome rida CSV formaadis
        $kasSalvestatud = file_put_contents($andmeFail, $ridaFailisse, FILE_APPEND | LOCK_EX); // paneme rida failisse kirja
        // kui salvestamine õnnestus - väljastame vastav teade
        if($kasSalvestatud !== false){
            echo '<h4>Sinu andmed on salvestatud!</h4>';
            echo '<a href="form12.php">Sisesta uued andmed</a>';
        }
    }
}
// kontrollime faili sisu
echo '<hr>';
echo '<h3>Andmed</h3>';
echo '<table>';
echo '
    <thead>
        <tr>
            <th>sõidu algus</th>
            <th>sõidu lõpp</th>
            <th>tunnid</th>
            <th>minutid</th>
        </tr>
    </thead>';
echo '<tbody>';
$sisu = fopen($andmeFail, 'r') or die('Ei leia faili!');
$jrk = 1;
while(!feof($sisu)){
    $rida = fgetcsv($sisu, filesize($andmeFail),';');
    echo '<tr>';
    $arv = count($rida); //rea väljade arv
    if($arv == 4) {
        for ($i = 0; $i < $arv; $i++) {
            echo '<td>' . $rida[$i] . '</td>';
        }
        echo '</tr>';
    }
}
fclose($sisu);
echo '<tbody>';
echo '</table>';
