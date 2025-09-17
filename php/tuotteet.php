<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Tuotteet - Meidän Firma</title>
    <style>
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #000000ff;
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
        <h1>Tämä on tuotesivu</h1>
        <p>Tämä on dynaamisella navigaatiolla varustetun sivustomme tuotesivu.</p>
    </main>
</body>
</html>
