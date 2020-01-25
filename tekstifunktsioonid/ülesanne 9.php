<?php
// Kasutaja lisab vormi nime, seda näiteks suured ja väikesed tähed läbisegi. Sina kood tervitab teda kenasti nimepidi,
// kus nimi algab suure algustähega.
//Näiteks: sisend–>mARiO; väljund–>Tere, Mario!
$sisend = "mARiO";
echo "Tere, ".ucfirst(strtolower($sisend))." !";
echo '<hr>';

// Kuna on teada, et PHP käsitleb teksti kui massiivi, siis peaks saama seda tsükli abil nö. tükeldada. Ülesandeks on
// etteantud teksti iga tähe järgi lisada punkt.
//Näiteks: sisend–>stalker; väljund–>S.T.A.L.K.E.R.
$sisend1 = "stalker";
$strLen = strlen( $sisend1 );
for($i = 0; $i < $strLen; $i += 1){
    echo strtoupper(substr($sisend1, $i, 1) . '.');
}
echo '<hr>';
//Koosta tekstiväli, mis kuvab kasutaja sisestatud sõnumeid. Kasutaja ropud sõnad asendatakse tärnidega.
//Näiteks: sisend–>Sa oled täielik noob; väljund–>Sa oled täielik ***
$sisend2 = "Sa oled täielik noob";
$otsi = array('noob', 'jobu', 'nõme', 'värdjas');
echo str_replace($otsi, "***", $sisend2);
echo '<hr>';
//Kasutajalt saadud eesnime ja perenime põhjal luuakse talle email lõpuga @hkhk.edu.ee. Kusjuures täpitähed
// asendatakse ä->a, ö->o, ü->y, õ->o ja kogu email on väikeste tähtedega
//Näiteks: sisend–>Ülle ja Doos; väljund–>ylle.doos@hkhk.edu.ee
$eesNimi = "Ülle";
$pereNimi = "Doos";
$otsi = array('Ü', 'Õ', 'Ö', 'Ä', 'ü', 'õ', 'ö', 'ä');
$asenda = array('u', 'o', 'o', 'a', 'u', 'o', 'o', 'a');
$eesNimiAsendatud = strtolower(str_replace($otsi, $asenda, $eesNimi));
$pereNimiAsendatud = strtolower(str_replace($otsi, $asenda, $pereNimi));
echo $eesNimiAsendatud.'.'.$pereNimiAsendatud."@khk.edu.ee";
echo '<hr>';