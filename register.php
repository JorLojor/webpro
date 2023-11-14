<?php
//kode di bawah ini digunakan untuk menampilkan error
error_reporting(E_ALL);
//kode di bawah ini digunakan untuk menampilkan error
ini_set('display_errors', 1);

include("./connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check_username_query = mysqli_query($connection, "SELECT * FROM user WHERE username = '$username'");
    $check_username = mysqli_num_rows($check_username_query);

    if ($check_username > 0) {
        // kode di bawah ini akan dijalankan jika username sudah ada di database
        echo "<script>alert('Username already exists. Please choose a different username.')</script>";
        //kode di bawah ini akan dijalankan jika username sudah ada di database
        echo "<meta http-equiv='refresh' content='0; url=register.php'>";
    } else {
        // kode di bawah ini akan dijalankan jika username belum ada di database
        $insert_query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
        $result = mysqli_query($connection, $insert_query);

        if ($result) {
            //kode di bawah ini akan dijalankan jika proses insert berhasil
            echo "<script>alert('Registration successful. Please login.')</script>";
            //kode di bawah ini akan dijalankan jika proses insert berhasil dan akan diarahkan ke halaman login.php
            echo "<meta http-equiv='refresh' content='0; url=login.php'>";
        } else {
            //kode di bawah ini akan dijalankan jika proses insert gagal
            echo "<script>alert('Registration failed. Please try again.')</script>";
            //kode di bawah ini akan dijalankan jika proses insert gagal dan akan diarahkan ke halaman register.php
            echo "<meta http-equiv='refresh' content='0; url=register.php'>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration</title>
</head>

<body>
    <h2>Registration Form</h2>
    <form action="" method="post">
        <table align="center">
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
                    <input type="submit" name="prosesreg" value="Register">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
