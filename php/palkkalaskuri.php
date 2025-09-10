<!DOCTYPE html>
<html>
  <head>
    <title>Palkkalaskuri</title>
  </head>
  <body>
    <form action="palkka.php" method="post">
      Tuntipalkka: <input type="text" name="tuntipalkka"> <br>
      Tuntimäärä: <input type="text" name="tuntimaara"> <br>
      <input type="submit" value="Lähetä">
    </form>
  </body>
</html>
<?php
$tuntipalkka = $_POST["tuntipalkka"] ?? 0;
$tuntimaara = $_POST["tuntimaara"] ?? 0;
$yhteispalkka = $tuntipalkka * $tuntimaara;
echo "Yhteispalkka: " . $yhteispalkka;
?>
<?php
// Haetaan lomakkeen tiedot
$tuntipalkka = $_POST["tuntipalkka"] ?? 0;
$tuntimaara = $_POST["tuntimaara"] ?? 0;
$viikonloppulisa = $_POST["viikonloppulisa"] ?? 0;
$viikonlopputunnit = $_POST["viikonlopputunnit"] ?? 0;

// Lasketaan peruspalkka
$yhteispalkka = $tuntipalkka * $tuntimaara;

// Lasketaan viikonloppulisät
$viikonloppulisat = $viikonloppulisa * $viikonlopputunnit;

// Lasketaan kokonaispalkka lisien kanssa
$kokonaispalkka = $yhteispalkka + $viikonloppulisat;

// Tulostetaan tulokset
echo "Yhteispalkka ilman viikonloppulisiä: " . $yhteispalkka . " €<br>";
echo "Yhteispalkka viikonloppulisien kanssa: " . $kokonaispalkka . " €";
?>
