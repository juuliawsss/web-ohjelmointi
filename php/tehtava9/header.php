<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Ravintola</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<header>
    <h1>Ravintola Aroma</h1>
    <?php

    $sivut = [
        'index' => 'Etusivu',
        'ruokalista' => 'Ruokalista',
        'varaus' => 'Pöytävaraus'
    ];
    include 'menu.php';
    renderMenu(basename($_SERVER['PHP_SELF']));
    ?>
</header>
<div class="container">
