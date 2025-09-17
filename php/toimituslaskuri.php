<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Toimituskululaskuri</title>
</head>
<body>
    <h1>Laske toimituskulut</h1>
    <?php
    // 1. Muuttujien määrittely
    $toimitustapa = "Postipaketti";
    $toimituskulut = 6.90;

    // 2. Tulostus
    echo "Valittu toimitustapa: " . $toimitustapa . "<br><br>";
    echo "<strong>Toimituskulut: " . number_format($toimituskulut, 2, ",", " ") . " €</strong>";
    ?>
</body>
</html>