<?php
include 'connect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Registracija korisnika</h1></header>
    <main>
        <form action="registracija.php" method="POST">
            <label>Korisničko ime:</label><br>
            <input type="text" name="username" required><br>
            
            <label>Lozinka:</label><br>
            <input type="password" name="password" required><br>
            
            <button type="submit" name="submit">Registriraj se</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $hashed_password = password_hash($password, CRYPT_BLOWFISH);
            $razina = 0; // 0 za običnog korisnika, 1 za admina

            $sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
            $stmt = mysqli_stmt_init($dbc);
            
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 's', $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) > 0) {
                    echo "<p>Korisničko ime već postoji!</p>";
                } else {
                    // Unos u bazu
                    $sql = "INSERT INTO korisnik (korisnicko_ime, lozinka, razina) VALUES (?, ?, ?)";
                    $stmt = mysqli_stmt_init($dbc);
                    if (mysqli_stmt_prepare($stmt, $sql)) {
                        mysqli_stmt_bind_param($stmt, 'ssi', $username, $hashed_password, $razina);
                        mysqli_stmt_execute($stmt);
                        echo "<p>Registracija uspješna!</p>";
                        echo "<p>Registracija uspješna!</p>";
                        echo '<a href="index.php">Povratak na početnu stranicu</a>';
                    }
                }
            }
        }
        ?>
    </main>
</body>
</html>