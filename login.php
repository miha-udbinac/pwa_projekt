<?php
include 'connect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Prijava</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Prijava korisnika</h1></header>
    <main>
        <form action="login.php" method="POST">
            <label>Korisničko ime:</label><br>
            <input type="text" name="username" required><br>
            
            <label>Lozinka:</label><br>
            <input type="password" name="password" required><br>
            
            <button type="submit" name="submit">Prijavi se</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT lozinka, razina FROM korisnik WHERE korisnicko_ime = ?";
            $stmt = mysqli_stmt_init($dbc);
            
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 's', $username);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                
                if ($row = mysqli_fetch_array($result)) {
                    if (password_verify($password, $row['lozinka'])) {
                        $_SESSION['username'] = $username;
                        $_SESSION['level'] = $row['razina'];
                        
                        header("Location: index.php");
                        exit();
                    } else {
                        echo "<p>Pogrešna lozinka!</p>";
                    }
                } else {
                    echo "<p>Korisnik ne postoji!</p>";
                }
            }
        }
        ?>
    </main>
</body>
</html>