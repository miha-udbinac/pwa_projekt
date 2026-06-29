<?php
include 'connect.php';
define('UPLPATH', 'uploads/');
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Le Monde</title>
</head>
<body>
    <header>
        <h1>Le Monde</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="kategorija.php?id=politique">Politique</a></li>
                <li><a href="kategorija.php?id=sport">Sport</a></li>
                <li><a href="administracija.php">Administracija</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <hr>
        <h2>POLITIQUE</h2>
        <section class="row">
            <?php
            $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='politique' LIMIT 3";
            $result = mysqli_query($dbc, $query);
            while($row = mysqli_fetch_array($result)) {
                echo '<article>';
                echo '<img src="' . UPLPATH . $row['slika'] . '" width="200px">';
                echo '<h3><a href="clanak.php?id=' . $row['id'] . '">' . $row['naslov'] . '</a></h3>';
                echo '</article>';
            }
            ?>
        </section>

        <hr>
        <h2>SPORT</h2>
        <section class="row">
            <?php
            $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='sport' LIMIT 3";
            $result = mysqli_query($dbc, $query);
            while($row = mysqli_fetch_array($result)) {
                echo '<article>';
                echo '<img src="' . UPLPATH . $row['slika'] . '" width="200px">';
                echo '<h3><a href="clanak.php?id=' . $row['id'] . '">' . $row['naslov'] . '</a></h3>';
                echo '</article>';
            }
            ?>
        </section>
    </main>

    <footer>
        <p>SUIVEZ LE MONDE</p>
    </footer>
</body>
</html>