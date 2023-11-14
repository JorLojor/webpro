<?php
include "./connection.php";
include "./session.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <style>
        h1 {
            text-align: center;
        }

        a {
            text-decoration: none;
            color: blue;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Selamat Datang <?php echo $_SESSION['username']; ?></h1>
    <a href="logout.php">Logout</a>
</body>

</html>
