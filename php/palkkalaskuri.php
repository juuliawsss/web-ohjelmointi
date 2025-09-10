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