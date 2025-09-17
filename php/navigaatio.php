<?php
// Määritellään sivut taulukkoon
$sivut = [
    'Etusivu' => 'etusivu.php',
    'Tuotteet' => 'tuotteet.php',
    'Ota yhteyttä' => 'yhteystiedot.php'
];

// Haetaan nykyisen sivun tiedostonimi
$nykyinen_sivu = basename($_SERVER['PHP_SELF']);
?>
<nav>
    <ul>
        <?php foreach ($sivut as $nimi => $url): ?>
            <li class="<?php if ($nykyinen_sivu == $url) echo 'active'; ?>">
                <a href="<?php echo $url; ?>"><?php echo $nimi; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>