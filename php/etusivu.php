<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Etusivu - Meidän Firma</title>
    <style>
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #f0f0f0;
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
            background-color: #ddd;
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
        <h1>Tervetuloa etusivulle!</h1>
        <p>Tämä on dynaamisella navigaatiolla varustetun sivustomme pääsivu.</p>
    </main>
</body>
</html>
