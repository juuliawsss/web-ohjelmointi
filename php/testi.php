<!DOCTYPE html>
<html>
  <head>
    <title>Ensimmäinen PHP-sivu</title>
  </head>
  <body>
    <p>Vuorokaudessa on <?php echo 24 * 60 * 60; ?> sekuntia.</p>
    <p>Tänään on <?php echo date("j.n.Y"); ?>.</p>
    <p>Palvelimella on PHP:n versio <?php echo PHP_VERSION; ?>.</p>
    <?php
    echo "<ul>";
    for ($i = 1; $i <= 10; $i++) {
        echo "<li>" . $i;
    }
    echo "</ul>";
    ?>

    <?php
    // Uusi PHP-osio
    $tervehdys = "Hei maailma!"; // keksitty tervehdys
    $kerrat = 5;                 // montako kertaa toistetaan
    $laskuri = 0;                // lisämuuttuja toistoa varten

    while ($laskuri < $kerrat) {
        echo "<p>" . $tervehdys . "</p>";
        $laskuri++;
    }
    ?>
  </body>
</html>
