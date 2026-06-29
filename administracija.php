<?php
include 'connect.php';
session_start();

if (isset($_SESSION['username'])) {
    echo '<p>Dobrodošli, <strong>' . $_SESSION['username'] . '</strong>! | <a href="logout.php">Odjavi se</a></p>';
}

if (!isset($_SESSION['level'])) {
    echo '<h1>Pristup administraciji</h1>';
    echo '<a href="login.php">Prijavi se</a> ili <a href="registracija.php">Registriraj se</a>';
    echo '<br>';
    echo '<a href="index.php">Povratak na početnu</a>';
    exit();
}

if ($_SESSION['level'] != 1) {
    echo '<h2>Nemate administratorska prava!</h2>';
    echo '<a href="index.php">Povratak na početnu</a>';
    exit();
}

$query = "SELECT * FROM vijesti";
$result = mysqli_query($dbc, $query);
?>

<!DOCTYPE html>
<html lang="hr">
<head><meta charset="UTF-8"><link rel="stylesheet" href="style.css"><title>Administracija</title></head>
<body>
    <header><h1>Administracija vijesti</h1></header>
    <main>
        <div><a href="unos.html">Unos nove vijesti</a></div>
        <?php
        while($row = mysqli_fetch_array($result)) {
            echo '<form method="POST" action="administracija.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="'.$row['id'].'">
                <input type="text" name="title" value="'.$row['naslov'].'">
                <textarea name="about">'.$row['sazetak'].'</textarea>
                <input type="checkbox" name="archive" '.($row['arhiva'] == 1 ? 'checked' : '').'> Arhiviraj
                <button type="submit" name="update">Izmijeni</button>
                <button type="submit" name="delete">Izbriši</button>
            </form><hr>';
        }

        if(isset($_POST['update'])) {
            $id = $_POST['id'];
            $naslov = $_POST['title'];
            $sazetak = $_POST['about'];
            $arhiva = isset($_POST['archive']) ? 1 : 0;

            $stmt = mysqli_stmt_init($dbc);
            $query = "UPDATE vijesti SET naslov=?, sazetak=?, arhiva=? WHERE id=?";
            if (mysqli_stmt_prepare($stmt, $query)) {
                mysqli_stmt_bind_param($stmt, 'ssii', $naslov, $sazetak, $arhiva, $id);
                mysqli_stmt_execute($stmt);
            }
        }

        if(isset($_POST['delete'])) {
            $id = $_POST['id'];
            $stmt = mysqli_stmt_init($dbc);
            $query = "DELETE FROM vijesti WHERE id=?";
            if (mysqli_stmt_prepare($stmt, $query)) {
                mysqli_stmt_bind_param($stmt, 'i', $id);
                mysqli_stmt_execute($stmt);
            }
        }
        ?>
    </main>
</body>
</html>