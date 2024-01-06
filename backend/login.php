<!-- <?php
session_start();
require 'config/db-klinik.php';

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
                header('Location:../index.php');
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
?> -->

<?php

class Auth
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function loginUser($email, $password)
    {
        $userQuery = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($userQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();

            if (password_verify($password, $data['password'])) {
                $this->authorizeUser($data['username'], $data['role']);
            } else {
                return "Password salah";
            }
        } else {
            return "Username atau password salah";
        }
    }

    private function authorizeUser($username, $role)
    {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        if ($role == 'admin') {
            header('Location:../pages/dashboard.php');
            exit;
        } else if ($role == 'owner') {
            header('Location:../pages/d_owner.php');
            exit;
        } else {
            header('Location:../index.php');
            exit;
        }
    }
}
?>