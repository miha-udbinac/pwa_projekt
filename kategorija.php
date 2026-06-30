<?php
include 'connect.php';
define('UPLPATH', 'uploads/');

$kategorija = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Kategorija: <?php echo ucfirst($kategorija); ?></title>
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
        <h2><?php echo strtoupper($kategorija); ?></h2>
        <section class="row">
            
            <?php
            $query = "SELECT * FROM vijesti WHERE kategorija=? AND arhiva=0 ORDER BY datum DESC";
            $stmt = mysqli_stmt_init($dbc);

            if (mysqli_stmt_prepare($stmt, $query)) {
                mysqli_stmt_bind_param($stmt, 's', $kategorija);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                while($row = mysqli_fetch_array($result)) {
                    echo '<article>';
                    echo '<img src="' . UPLPATH . $row['slika'] . '" width="200px">';
                    echo '<h3><a href="clanak.php?id=' . $row['id'] . '">' . $row['naslov'] . '</a></h3>';
                    echo '</article>';
                }
            }
            ?>
        </section>
    </main>

    <footer>
        <p>Mihael Uđbinac, 2026.</p>
    </footer>
</body>
</html>
