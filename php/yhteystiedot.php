<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Ota yhteyttä - Meidän Firma</title>
    <style>
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #ffffffff;
        }
        nav ul li {
            margin: 0;
            padding: 0;
        }
        nav ul li a {
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: black;
        }
        nav ul li a:hover {
            background-color: #1d1c1cff;
        }
        /* Aktiivisen linkin korostus */
        nav ul li.active a {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <?php include 'navigaatio.php'; ?>
    </header>
    <main>
        <h1>Yhteystiedot</h1>
        <p>Tältä sivulta löydät yrityksemme yhteystiedot ja palautelomakkeen.</p>
    </main>
</body>
</html>
