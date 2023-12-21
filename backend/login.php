<?php
session_start();
require './config/db-klinik.php';

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = mysqli_query($db_connect, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($user) > 0) {
        $data = mysqli_fetch_assoc($user);

        if (password_verify($password, $data['password'])) {

            //otorisasi
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = $data['role'];

            if ($_SESSION['role'] == 'admin') {
                header('Location:../pages/dashboard.php');
                exit;
            } else if ($_SESSION['role'] == 'owner') {
                header('Location:../pages/d_owner.php');
                exit;
            } else {
                header('Location:../pages/dashboard.php');
            }

        } else {
            echo "password salah";
            die;
        }

    } else {
        echo "username atau password salah";
        die;
    }
}
?>