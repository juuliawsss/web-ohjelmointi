<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Lemmikkilomake</title>
    <link rel="stylesheet" href="../exercises/style.css">
</head>
<body>
    <header>
        <?php include 'navigaatio.php'; ?>
    </header>
    <main>
        <h1>Lemmikkilomake</h1>
        <form action="lemmikkilomake.php" method="post">
            <label for="nimi">Nimi:</label>
            <input type="text" id="nimi" name="nimi" required><br><br>

            <label for="ika">Ikä:</label>
            <input type="number" id="ika" name="ika" min="0" max="100"><br><br>

            <label>Laji:</label>
            <input type="radio" id="koira" name="laji" value="Koira" required>
            <label for="koira">Koira</label>
            <input type="radio" id="kissa" name="laji" value="Kissa">
            <label for="kissa">Kissa</label>
            <input type="radio" id="muu" name="laji" value="Muu">
            <label for="muu">Muu</label><br><br>

            <label for="rotu">Rotu:</label>
            <input type="text" id="rotu" name="rotu"><br><br>

            <label for="harrastukset">Harrastukset:</label>
            <input type="checkbox" id="juoksu" name="harrastukset[]" value="Juoksu">
            <label for="juoksu">Juoksu</label>
            <input type="checkbox" id="uinti" name="harrastukset[]" value="Uinti">
            <label for="uinti">Uinti</label>
            <input type="checkbox" id="metsastys" name="harrastukset[]" value="Metsästys">
            <label for="metsastys">Metsästys</label><br><br>

            <label for="vari">Väri:</label>
            <select id="vari" name="vari">
                <option value="Musta">Musta</option>
                <option value="Valkoinen">Valkoinen</option>
                <option value="Ruskea">Ruskea</option>
                <option value="Kirjava">Kirjava</option>
            </select><br><br>

            <label for="lisatiedot">Lisätiedot:</label><br>
            <textarea id="lisatiedot" name="lisatiedot" rows="4" cols="40"></textarea><br><br>

            <input type="submit" value="Lähetä">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo '<h2>Syötetyt tiedot:</h2>';
            echo '<ul>';
            echo '<li><strong>Nimi:</strong> ' . htmlspecialchars($_POST['nimi']) . '</li>';
            echo '<li><strong>Ikä:</strong> ' . htmlspecialchars($_POST['ika']) . '</li>';
            echo '<li><strong>Laji:</strong> ' . htmlspecialchars($_POST['laji']) . '</li>';
            echo '<li><strong>Rotu:</strong> ' . htmlspecialchars($_POST['rotu']) . '</li>';
            if (!empty($_POST['harrastukset'])) {
                echo '<li><strong>Harrastukset:</strong> ' . implode(", ", array_map('htmlspecialchars', $_POST['harrastukset'])) . '</li>';
            }
            echo '<li><strong>Väri:</strong> ' . htmlspecialchars($_POST['vari']) . '</li>';
            echo '<li><strong>Lisätiedot:</strong> ' . nl2br(htmlspecialchars($_POST['lisatiedot'])) . '</li>';
            echo '</ul>';
        }
        ?>
    </main>
    <footer>
        <p>&copy; 2025 Meidän Firma</p>
    </footer>
</body>
</html>
