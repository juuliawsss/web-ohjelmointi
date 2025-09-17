<?php
include 'includes/header.php';

$name = $email = $date = $time = $people = $requests = "";
$nameErr = $emailErr = $dateErr = $timeErr = $peopleErr = "";
$successMessage = "";

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
        // Tässä voit käsitellä lomakkeen esim. tallentamalla tiedot tietokantaan tai lähettämällä sähköpostia
        $successMessage = "Kiitos varauksestasi, $name! Otamme sinuun pian yhteyttä sähköpostitse.";
        // Tyhjennetään kentät
        $name = $email = $date = $time = $people = $requests = "";
        $specials = [];
    }
}
?>

<h2>Pöytävaraus</h2>

<?php if ($successMessage): ?>
    <div class="message"><?= $successMessage ?></div>
<?php endif; ?>

<form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Nimi *</label>
    <input type="text" id="name" name="name" value="<?= $name ?>">
    <span style="color:red"><?= $nameErr ?></span>

    <label for="email">Sähköposti *</label>
    <input type="email" id="email" name="email" value="<?= $email ?>">
    <span style="color:red"><?= $emailErr ?></span>

    <label for="date">Päivämäärä *</label>
    <input type="date" id="date" name="date" value="<?= $date ?>">
    <span style="color:red"><?= $dateErr ?></span>

    <label for="time">Kellonaika *</label>
    <input type="time" id="time" name="time" value="<?= $time ?>">
    <span style="color:red"><?= $timeErr ?></span>

    <label for="people">Henkilömäärä *</label>
    <input type="number" id="people" name="people" min="1" value="<?= $people ?>">
    <span style="color:red"><?= $peopleErr ?></span>

    <label>Erikoisruokavaliot</label>
    <input type="checkbox" id="gluten" name="specials[]" value="gluteeniton" <?= (isset($specials) && in_array('gluteeniton', $specials)) ? 'checked' : '' ?>>
    <label for="gluten">Gluteeniton</label><br>

    <input type="checkbox" id="vega" name="specials[]" value="vegaaninen" <?= (isset($specials) && in_array('vegaaninen', $specials)) ? 'checked' : '' ?>>
    <label for="vega">Vegaaninen</label><br>

    <input type="checkbox" id="lakto" name="specials[]" value="laktoositon" <?= (isset($specials) && in_array('laktoositon', $specials)) ? 'checked' : '' ?>>
    <label for="lakto">Laktoositon</label><br>

    <label for="requests">Erityistoiveet</label>
    <textarea id="requests" name="requests" rows="4"><?= $requests ?></textarea>

    <input type="submit" value="Varaa pöytä">
</form>

<?php
include 'includes/footer.php';
?>
