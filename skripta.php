<?php
include 'connect.php';

$naslov = $_POST['title'];
$sazetak = $_POST['about'];
$tekst = $_POST['content'];
$kategorija = $_POST['category'];
$datum = date('d.m.Y');
$slika = $_FILES['photo']['name'];

if(isset($_POST['archive'])) {
    $arhiva = 1;
} else {
    $arhiva = 0;
}

$target_dir = 'uploads/' . $slika;
move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir);

$query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($dbc);

if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, 'ssssssi', $datum, $naslov, $sazetak, $tekst, $slika, $kategorija, $arhiva);
    mysqli_stmt_execute($stmt);
    mysqli_close($dbc);
    header("Location: index.php");
    exit();
}

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($dbc);
    header("Location: index.php");
    exit();
}

mysqli_close($dbc);
?>
