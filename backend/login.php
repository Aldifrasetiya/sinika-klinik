<?php
require 'config/db-klinik.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class Auth
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function loginUser($email, $password)
    {
        $userQuery = mysqli_query($this->db, "SELECT * FROM users WHERE email ='$email'");

        if (mysqli_num_rows($userQuery) > 0) {
            $data = mysqli_fetch_assoc($userQuery);

            if (password_verify($password, $data['password'])) {
                $this->authorizeUser($data);
            } else {
                // Jika password salah, kembalikan pesan
                return "Password salah";
            }
        } else {
            // Jika username atau email tidak ditemukan, kembalikan pesan
            return "Username atau password salah";
        }
    }

    private function authorizeUser($userData)
    {
        $_SESSION['username'] = $userData['username'];
        $_SESSION['role'] = $userData['role'];

        $redirectPath = ($_SESSION['role'] == 'admin') && ($_SESSION['role'] == 'admin') ? '../pages/content/dashboard/dashboard.php' : '../pages/content/dashboard/d_owner.php';

        header("Location: $redirectPath");
        exit();
    }
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $authenticator = new Auth($db_connect);
    $authenticator->loginUser($email, $password);
}
?>