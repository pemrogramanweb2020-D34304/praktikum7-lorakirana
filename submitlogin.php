<?php
    require_once('koneksidisek.php');
    session_start();

    $username = $_POST["username"];
    $password = $_POST["password"];
    $password = md5($password);
    $sql = "SELECT * FROM user
                WHERE username = '$username' AND pass = '$password'";
    $result = mysqli_query($connect, $sql);


    if (mysqli_num_rows($result) > 0) {//Cek apakah ada user dan password nya sama
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['pass'];
        $_SESSION['is_login'] = TRUE;
        header('location: index.php');
    } else {
        $_SESSION['pesan'] = "Username atau password salah";
        header('location: login.php');
    }
?>