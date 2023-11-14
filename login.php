<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(); // Memulai Session
include("./connection.php"); // memasukkan koneksi.php ke dalam file login.php
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <!-- form  di bawah ini adalah form login yang akan di tampilkan di browser -->
    <form action="" method="POST">
        <table align="center">
            <tr>
                <th colspan="2"> Login Form</th>
            </tr>
            <tr>
                <td>Username</td>
                <td> <input type="text" name="username" placeholder="Enter Username" required> </td>
            </tr>
            <tr>
                <td>Password</td>
                <td> <input type="password" name="password" placeholder="Enter Password" required> </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="proseslog" value="Login">
                </td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['proseslog'])) {
        $sql = mysqli_query($connection, "SELECT * FROM user WHERE username = '$_POST[username]' AND password = '$_POST[password]'");

        $cek = mysqli_num_rows($sql);
        if ($cek > 0) {
            $_SESSION['username'] = $_POST['username'];
            echo "<meta http-equiv='refresh' content='0; url=home.php'>";
        } else {
            echo "<script>alert('Username atau Password Salah')</script>";
            echo "<meta http-equiv='refresh' content='0; url=login.php'>";
        }
    }
    ?>

</body>

</html>
