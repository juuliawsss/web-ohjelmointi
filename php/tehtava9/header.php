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
    <div style="display: flex; flex-direction: column; align-items: center; margin-top: 18px; gap: 12px;">
        <a href="http://punavuorigourmet.blogspot.com/2017/12/olut-ja-ruokamenu-suomi-100.html" target="_blank" style="text-align:center; margin-bottom:8px;">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEggDVecNPE5OuztdDrBigTsTzG2ECod-qnkgdOq8Zz-gCTwtkx-rtvw9TXPMij-TOql1k8wyDjv1prtnhFIJIu31EvdL5r-4OqjbPlYV-elvPJSkn468vDPC7YJ45BS-T46Vvewo13IDG-r/s1600/PB260123.JPG" alt="Suomalainen ruokamenu" style="border-radius:8px; box-shadow:0 2px 8px #ccc; width:90px; height:120px; object-fit:cover;">
            <div style="font-size:0.95em; color:#fff8f0;">Suomalainen ruokamenu</div>
        </a>
    </div>
</header>
<div class="container">
