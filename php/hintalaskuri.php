<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Hintalaskuri</title>
</head>
<body>
    <h1>Hintalaskuri</h1>
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

    // 3. Tietojen tulostus selaimelle
    echo "Tuote: " . $tuotteen_nimi . "<br>";
    echo "Hinta per kappale: " . number_format($hinta_kpl, 2, ",", " ") . " €<br>";
    echo "Kappalemäärä: " . $kappalemaara . "<br>";
    echo "Välisumma: " . number_format($valisumma, 2, ",", " ") . " €<br>";
    echo "Alennus (" . $alennusprosentti . "%): -" . number_format($alennus_eur, 2, ",", " ") . " €<br>";
    echo "<strong>Loppusumma: " . number_format($loppusumma, 2, ",", " ") . " €</strong><br>";
    ?>
</body>
</html>