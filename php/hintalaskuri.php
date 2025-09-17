<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Hintalaskuri</title>
</head>
<body>
    <h1>Tuotteen hintatiedot</h1>
    <?php
    // 1. Muuttujien määrittely
    $tuotteen_nimi = "Sähköpotkulauta";
    $hinta_kpl = 349.90; 
    $kappalemaara = 2; 
    $alennusprosentti = 15;

    // 2. Laskutoimitukset
    $valisumma = $hinta_kpl * $kappalemaara;
    $alennus_eur = $valisumma * ($alennusprosentti / 100);
    $loppusumma = $valisumma - $alennus_eur;

    // 3. Tulostus
    echo "Tuote: " . $tuotteen_nimi . "<br>";
    echo "Kappalehinta: " . number_format($hinta_kpl, 2, ",", " ") . " €<br>";
    echo "Määrä: " . $kappalemaara . " kpl<br>";
    echo "--------------------------<br>";
    echo "Välisumma: " . number_format($valisumma, 2, ",", " ") . " €<br>";
    echo "Alennus (" . $alennusprosentti . "%): " . number_format($alennus_eur, 2, ",", " ") . " €<br>";
    echo "--------------------------<br>";
    echo "<strong>Lopullinen hinta: " . number_format($loppusumma, 2, ",", " ") . " €</strong><br>";
    ?>
</body>
</html>
