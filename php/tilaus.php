<?php
// PHP-tehtävä 7: Tilauslomakkeen prototyyppi

// Kopioidaan funktio tehtävästä 6
function laskeToimituskulut($toimitustapa) {
    switch ($toimitustapa) {
        case "Nouto":
            return 0;
        case "Postipaketti":
            return 5.90;
        case "Kotiinkuljetus":
            return 14.90;
        default:
            return 0;
    }
}

// Alustetaan muuttujat
$yhteenveto = null;

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
        <h2>Tilauksen yhteenveto</h2>
        <p>Tuote: $tuote</p>
        <p>Määrä: $maara kpl</p>
        <p>Välisumma: " . number_format($valisumma, 2, ",", " ") . " €</p>
        <p>Toimitustapa: $toimitustapa</p>
        <p>Toimituskulut: " . number_format($toimituskulut, 2, ",", " ") . " €</p>
        <hr>
        <p><strong>Kokonaishinta: " . number_format($kokonaishinta, 2, ",", " ") . " €</strong></p>
    ";
}
?>
<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Tilauslomake</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
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
            color: #333;
        }
        h3 {
            margin-top: 20px;
            color: #444;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-top: 12px;
            margin-bottom: 4px;
            font-weight: bold;
        }
        input, select, button {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }
        button {
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .yhteenveto {
            margin-top: 20px;
            padding: 15px;
            background: #f0f8ff;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tilauslomake</h1>
       
        <h3>Tuote: Sähköpotkulauta (349,90 €/kpl)</h3>

        <form method="post" action="tilaus.php">
            <label for="maara">Määrä</label>
            <input type="number" id="maara" name="maara" min="1" required>

            <label for="toimitustapa">Toimitustapa</label>
            <select id="toimitustapa" name="toimitustapa" required>
                <option value="Nouto">Nouto</option>
                <option value="Postipaketti">Postipaketti</option>
                <option value="Kotiinkuljetus">Kotiinkuljetus</option>
            </select>

            <button type="submit">Laske hinta</button>
        </form>

        <?php
        // Tulostetaan yhteenveto, jos se on laskettu
        if ($yhteenveto) {
            echo "<div class='yhteenveto'>$yhteenveto</div>";
        }
        ?>
    </div>
</body>
</html>
