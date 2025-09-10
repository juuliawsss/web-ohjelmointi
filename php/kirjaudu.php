<?php
// Tarkistetaan onko lomake lähetetty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Otetaan vastaan lomakkeen tiedot
    $kayttajatunnus = $_POST["kayttajatunnus"];
    $salasana = $_POST["salasana"];

    // Tarkistetaan käyttäjätunnus ja salasana
    if ($kayttajatunnus == "admin" && $salasana == "1234") {
        // Kirjautuminen onnistui
        echo "Kirjautuminen onnistui! Ohjataan palkkalaskuriin...";

        // Ohjaa käyttäjän palkkalaskuriin 2 sekunnin kuluttua
        echo '<meta http-equiv="refresh" content="2;url=palkkalaskuri_kirjautuminen.html">';
        exit();
    } else {
        // Kirjautuminen epäonnistui
        echo "<p style='color:red;'>Virheellinen käyttäjätunnus tai salasana!</p>";
        echo '<p><a href="palkkalaskuri_kirjautuminen.html">Yritä uudelleen</a></p>';
    }
}
?>