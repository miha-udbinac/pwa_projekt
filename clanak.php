<?php
include 'connect.php';
define('UPLPATH', 'uploads/');

$id = $_GET['id'];

$query = "SELECT * FROM vijesti WHERE id = ?";
$stmt = mysqli_stmt_init($dbc);
mysqli_stmt_prepare($stmt, $query);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title><?php echo $row['naslov']; ?></title>
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
        <section role="main">
            <h2 class="category"><?php echo strtoupper($row['kategorija']); ?></h2>
            <h1 class="title"><?php echo $row['naslov']; ?></h1>
            <p>OBJAVLJENO: <span><?php echo $row['datum']; ?></span></p>
            <div class="about">
                <p><i><?php echo $row['sazetak']; ?></i></p>
            </div>
            
            <section class="slika">
                <?php echo '<img src="' . UPLPATH . $row['slika'] . '" style="width:100%">'; ?>
            </section>
            
            <section class="sadrzaj">
                <p><?php echo $row['tekst']; ?></p>
            </section>
        </section>
    </main>

    <footer>
        <p>Mihael Uđbinac, 2026.</p>
    </footer>
</body>
</html>
