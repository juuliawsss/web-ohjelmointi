<?php
// Näytetään PHP-virheet kehitystä varten
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Lomake käsittely
$name = $email = $date = $time = $people = $requests = "";
$nameErr = $emailErr = $dateErr = $timeErr = $peopleErr = "";
$successMessage = "";
$specials = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;

    // Nimi
    if (empty($_POST["name"])) {
        $nameErr = "Nimi on pakollinen";
        $valid = false;
    } else {
        $name = htmlspecialchars(trim($_POST["name"]));
    }

    // Sähköposti
    if (empty($_POST["email"])) {
        $emailErr = "Sähköposti on pakollinen";
        $valid = false;
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Virheellinen sähköposti";
        $valid = false;
    } else {
        $email = htmlspecialchars(trim($_POST["email"]));
    }

    // Päivämäärä
    if (empty($_POST["date"])) {
        $dateErr = "Päivämäärä on pakollinen";
        $valid = false;
    } else {
        $date = $_POST["date"];
    }

    // Kellonaika
    if (empty($_POST["time"])) {
        $timeErr = "Kellonaika on pakollinen";
        $valid = false;
    } else {
        $time = $_POST["time"];
    }

    // Henkilömäärä
    if (empty($_POST["people"]) || !is_numeric($_POST["people"]) || $_POST["people"] < 1) {
        $peopleErr = "Anna kelvollinen henkilömäärä";
        $valid = false;
    } else {
        $people = intval($_POST["people"]);
    }

    // Erikoisruokavaliot (checkbox)
    $specials = isset($_POST["specials"]) ? $_POST["specials"] : [];

    // Erityistoiveet
    $requests = htmlspecialchars(trim($_POST["requests"]));

    if ($valid) {
        $successMessage = "Kiitos varauksestasi, $name! Otamme sinuun pian yhteyttä sähköpostitse.";
        // Tyhjennä kentät, jotta lomake tyhjenee onnistumisen jälkeen
        $name = $email = $date = $time = $people = $requests = "";
        $specials = [];
    }
}

// Sivun valikko (aktivoidaan "index", "ruokalista" ja "varaus")
$page = $_GET['page'] ?? 'index';

// Valikon funktio
function renderMenu($currentPage) {
    $menuItems = [
        "index" => "Etusivu",
        "ruokalista" => "Ruokalista",
        "varaus" => "Pöytävaraus"
    ];

    echo '<nav><ul>';
    foreach ($menuItems as $key => $name) {
        $style = ($currentPage === $key) ? 'style="text-decoration: underline;"' : '';
        echo "<li><a href='?page=$key' $style>$name</a></li>";
    }
    echo '</ul></nav>';
}
?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Ravintola Aroma</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0; padding: 0;
            background: #fff8f0;
            color: #333;
        }
        header, footer {
            background-color: #c94f3e;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            background-color: #f1a07a;
            margin: 0;
            display: flex;
            justify-content: center;
        }
        nav ul li {
            margin: 0 15px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        nav ul li a:hover {
            text-decoration: underline;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 0 20px;
        }
        form label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        form input[type="text"],
        form input[type="email"],
        form input[type="date"],
        form input[type="time"],
        form select,
        form textarea,
        form input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            box-sizing: border-box;
        }
        form input[type="submit"] {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #c94f3e;
            color: white;
            border: none;
            cursor: pointer;
        }
        form input[type="submit"]:hover {
            background-color: #a63b2a;
        }
        .message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
<header>
    <h1>Ravintola Aroma</h1>
    <?php renderMenu($page); ?>
</header>

<div class="container">

<?php if ($page === 'index'): ?>

    <h2>Tervetuloa Ravintola Aromaan!</h2>
    <p>Täällä voit tutustua herkulliseen ruokalistaamme ja varata pöydän helposti verkossa.</p>

<?php elseif ($page === 'ruokalista'): ?>

    <h2>Ruokalista</h2>
    <ul>
        <li>Alkupalat
            <ul>
                <li>Keitto päivän mukaan — 5,50 €</li>
                <li>Tapas-lautanen — 8,90 €</li>
            </ul>
        </li>
        <li>Pääruoat
            <ul>
                <li>Grillattu lohi ja kasvikset — 16,90 €</li>
                <li>Kasvispasta — 14,50 €</li>
            </ul>
        </li>
        <li>Jälkiruoat
            <ul>
                <li>Suklaakakku — 6,00 €</li>
                <li>Marjajäätelö — 5,50 €</li>
            </ul>
        </li>
    </ul>

<?php elseif ($page === 'varaus'): ?>

    <h2>Pöytävaraus</h2>

    <?php if ($successMessage): ?>
        <div class="message"><?= $successMessage ?></div>
    <?php endif; ?>

    <form method="post" action="?page=varaus">
        <label for="name">Nimi *</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>">
        <span class="error"><?= $nameErr ?></span>

        <label for="email">Sähköposti *</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>">
        <span class="error"><?= $emailErr ?></span>

        <label for="date">Päivämäärä *</label>
        <input type="date" id="date" name="date" value="<?= htmlspecialchars($date) ?>">
        <span class="error"><?= $dateErr ?></span>

        <label for="time">Kellonaika *</label>
        <input type="time" id="time" name="time" value="<?= htmlspecialchars($time) ?>">
        <span class="error"><?= $timeErr ?></span>

        <label for="people">Henkilömäärä *</label>
        <input type="number" id="people" name="people" min="1" value="<?= htmlspecialchars($people) ?>">
        <span class="error"><?= $peopleErr ?></span>

        <label>Erikoisruokavaliot</label>
        <input type="checkbox" id="gluten" name="specials[]" value="gluteeniton" <?= (in_array('gluteeniton', $specials)) ? 'checked' : '' ?>>
        <label for="gluten">Gluteeniton</label><br>

        <input type="checkbox" id="vega" name="specials[]" value="vegaaninen" <?= (in_array('vegaaninen', $specials)) ? 'checked' : '' ?>>
        <label for="vega">Vegaaninen</label><br>

        <input type="checkbox" id="lakto" name="specials[]" value="laktoositon" <?= (in_array('laktoositon', $specials)) ? 'checked' : '' ?>>
        <label for="lakto">Laktoositon</label><br>

        <label for="requests">Erityistoiveet</label>
        <textarea id="requests" name="requests" rows="4"><?= htmlspecialchars($requests) ?></textarea>

        <input type="submit" value="Varaa pöytä">
    </form>

<?php else: ?>

    <h2>Sivua ei löytynyt</h2>

<?php endif; ?>

</div>

<footer>
    <p>&copy; 2025 Ravintola Aroma</p>
</footer>
</body>
</html>



