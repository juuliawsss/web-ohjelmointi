<?php
// Tarkistetaan onko lomake lähetetty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Otetaan vastaan lomakkeen tiedot
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Tarkistetaan käyttäjätunnus ja salasana
    if ($username === "admin" && $password === "kissa123") {
        // Kirjautuminen onnistui
        echo "<h1>Tervetuloa admin!</h1>";
        echo "<p>Sinut ohjataan palkkalaskuriin muutaman sekunnin kuluttua...</p>";

        // Ohjaus 2 sekunnin kuluttua
        echo '<meta http-equiv="refresh" content="2;url=palkkalaskuri.php">';
        exit();
    } else {
        // Kirjautuminen epäonnistui
        echo "<p>Virheellinen käyttäjätunnus tai salasana.</p>";
    }
}
?>