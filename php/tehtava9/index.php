<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$name = $email = $date = $time = $people = $requests = "";
$nameErr = $emailErr = $dateErr = $timeErr = $peopleErr = "";
$successMessage = "";
$specials = [];

if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_GET['page'] ?? '') === 'varaus') {
    $valid = true;

    if (empty($_POST["name"])) {
        $nameErr = "Nimi on pakollinen";
        $valid = false;
    } else {
        $name = htmlspecialchars(trim($_POST["name"]));
    }

    if (empty($_POST["email"])) {
        $emailErr = "Sähköposti on pakollinen";
        $valid = false;
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Virheellinen sähköposti";
        $valid = false;
    } else {
        $email = htmlspecialchars(trim($_POST["email"]));
    }

    if (empty($_POST["date"])) {
        $dateErr = "Päivämäärä on pakollinen";
        $valid = false;
    } else {
        $date = $_POST["date"];
    }

    if (empty($_POST["time"])) {
        $timeErr = "Kellonaika on pakollinen";
        $valid = false;
    } else {
        $time = $_POST["time"];
    }

    if (empty($_POST["people"]) || !is_numeric($_POST["people"]) || (int)$_POST["people"] < 1) {
        $peopleErr = "Anna kelvollinen henkilömäärä";
        $valid = false;
    } else {
        $people = intval($_POST["people"]);
    }

    $specials = $_POST["specials"] ?? [];
    $requests = htmlspecialchars(trim($_POST["requests"] ?? ""));

    if ($valid) {
        $successMessage = "Kiitos varauksestasi, $name! Otamme sinuun pian yhteyttä sähköpostitse.";
        $name = $email = $date = $time = $people = $requests = "";
        $specials = [];
    }
}

$page = $_GET['page'] ?? 'index';

function renderMenu($currentPage) {
    $menuItems = [
        "index" => "Etusivu",
        "ruokalista" => "Ruokalista",
        "varaus" => "Pöytävaraus"
    ];

    echo '<nav><ul class="menu">';
    foreach ($menuItems as $key => $label) {
        $class = ($currentPage === $key) ? 'active' : '';
        echo "<li><a href='?page=$key' class='$class'>$label</a></li>";
    }
    echo '</ul></nav>';
}
?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8" />
    <title>Ravintola Aroma</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff8f0;
            margin: 0;
            color: #333;
        }
        header, footer {
            background: #c94f3e;
            color: white;
            text-align: center;
            padding: 15px;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 15px;
        }
        .menu {
            list-style: none;
            padding: 0;
            margin: 0;
            background: #f1a07a;
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .menu li {
            margin: 0;
        }
        .menu a {
            color: white;
            font-weight: bold;
            text-decoration: none;
            padding: 10px 15px;
            display: inline-block;
        }
        .menu a.active, .menu a:hover {
            text-decoration: underline;
        }
        form label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        form input[type="text"],
        form input[type="email"],
        form input[type="date"],
        form input[type="time"],
        form input[type="number"],
        form textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }
        form input[type="submit"] {
            margin-top: 20px;
            background: #c94f3e;
            color: white;
            border: none;
            padding: 12px 25px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 1rem;
        }
        form input[type="submit"]:hover {
            background: #a63b2a;
        }
        .message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 12px;
            margin-top: 20px;
            border-radius: 5px;
        }
        .error {
            color: red;
            font-size: 0.9rem;
        }
        .checkbox-group label {
            font-weight: normal;
            margin-right: 10px;
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
            <div class="checkbox-group">
                <input type="checkbox" id="gluten" name="specials[]" value="gluteeniton" <?= in_array('gluteeniton', $specials) ? 'checked' : '' ?>>
                <label for="gluten">Gluteeniton</label>

                <input type="checkbox" id="vega" name="specials[]" value="vegaaninen" <?= in_array('vegaaninen', $specials) ? 'checked' : '' ?>>
                <label for="vega">Vegaaninen</label>

                <input type="checkbox" id="lakto" name="specials[]" value="laktoositon" <?= in_array('laktoositon', $specials) ? 'checked' : '' ?>>
                <label for="lakto">Laktoositon</label>
            </div>

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





