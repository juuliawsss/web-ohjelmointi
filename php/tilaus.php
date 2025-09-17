<?php
// Funktio toimituskulujen laskemiseksi
function laskeToimituskulut($toimitustapa) {
    switch ($toimitustapa) {
        case "Nouto":
            return 0;
        case "Postipaketti":
            return 5.90;
        case "Kotiinkuljetus":
            return 12.50;
        default:
            return 0;
    }
}

// Alustetaan muuttujat
$yhteenveto = null;
$maara = "";
$toimitustapa = "";

// Tarkistetaan, onko lomake lähetetty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haetaan tiedot lomakkeelta
    $maara = intval($_POST["maara"]);
    $toimitustapa = $_POST["toimitustapa"];

    // Tuotetiedot
    $hinta_kpl = 349.90;
    $tuote = "Sähköpotkulauta";

    // Laskutoimitukset
    $valisumma = $maara * $hinta_kpl;
    $toimituskulut = laskeToimituskulut($toimitustapa);
    $kokonaishinta = $valisumma + $toimituskulut;

    // Rakennetaan yhteenveto tulostusta varten
    $yhteenveto = "
        <div class='yhteenveto'>
            <h2>Tilauksen yhteenveto</h2>
            <p>Määrä: $maara kpl</p>
            <p>Välisumma: " . number_format($valisumma, 2, ",", " ") . " €</p>
            <p>Toimitustapa: $toimitustapa</p>
            <p>Toimituskulut: " . number_format($toimituskulut, 2, ",", " ") . " €</p>
            <hr>
            <p><strong>Yhteensä: " . number_format($kokonaishinta, 2, ",", " ") . " €</strong></p>
        </div>
    ";
}
?>
<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Tilaustuote</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            display: flex;
            justify-content: center;
            padding: 40px;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            max-width: 500px;
            width: 100%;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        h2 {
            margin-top: 30px;
            font-size: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 8px;
        }
        h3 {
            margin-top: 15px;
            font-weight: normal;
            color: #444;
        }
        label {
            display: block;
            margin-top: 12px;
            margin-bottom: 4px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .yhteenveto {
            margin-top: 20px;
            padding-top: 10px;
        }
        .yhteenveto p {
            margin: 6px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tilaa tuote</h1>
        <h3>Tuote: Sähköpotkulauta (349,90 €/kpl)</h3>

        <form method="post" action="tilaus.php">
            <label for="maara">Määrä:</label>
            <input type="number" id="maara" name="maara" min="1" value="<?php echo htmlspecialchars($maara); ?>" required>

            <label for="toimitustapa">Toimitustapa:</label>
            <select id="toimitustapa" name="toimitustapa" required>
                <option value="Nouto" <?php if ($toimitustapa=="Nouto") echo "selected"; ?>>Nouto (0,00 €)</option>
                <option value="Postipaketti" <?php if ($toimitustapa=="Postipaketti") echo "selected"; ?>>Postipaketti (5,90 €)</option>
                <option value="Kotiinkuljetus" <?php if ($toimitustapa=="Kotiinkuljetus") echo "selected"; ?>>Kotiinkuljetus (12,50 €)</option>
            </select>

            <button type="submit">Laske hinta</button>
        </form>

        <?php
        // Tulostetaan yhteenveto, jos se on laskettu
        if ($yhteenveto) {
            echo $yhteenveto;
        }
        ?>
    </div>
</body>
</html>

