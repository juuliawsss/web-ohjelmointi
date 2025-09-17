<?php
function renderMenu($currentPage) {
    $menuItems = [
        "index.php" => "Etusivu",
        "ruokalista.php" => "Ruokalista",
        "varaus.php" => "Pöytävaraus"
    ];

    echo '<nav><ul>';
    foreach ($menuItems as $file => $name) {
        $class = ($currentPage === $file) ? 'style="text-decoration: underline;"' : '';
        echo "<li><a href='$file' $class>$name</a></li>";
    }
    echo '</ul></nav>';
}
?>