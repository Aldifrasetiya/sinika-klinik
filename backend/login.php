<?php
require 'config/db-klinik.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class Authentication
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function authenticate($email, $password)
    {
        $user = mysqli_query($this->db, "SELECT * FROM users WHERE email = '$email'");

        if (mysqli_num_rows($user) > 0) {
            $data = mysqli_fetch_assoc($user);

            if (password_verify($password, $data['password'])) {
                $this->authorizeUser($data);
            } else {
                $this->showErrorAlert("Password tidak valid!");
            }
        } else {
            $this->showErrorAlert("Email atau password tidak valid!");
        }
    }

    private function showErrorAlert($message)
    {
        $_SESSION['error'] = $message;
        header('Location:../pages/login?error=1');
        exit();
    }

    private function authorizeUser($userData)
    {
        $_SESSION['username'] = $userData['username'];
        $_SESSION['role'] = $userData['role'];

        $redirectPath = ($_SESSION['role'] == 'admin') ? '../pages/content/dashboard/dashboard' : '../pages/content/dashboard/d_owner';

        header("Location: $redirectPath");
        exit();
    }
}

// Penggunaan
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $authenticator = new Authentication($db_connect);
    $authenticator->authenticate($email, $password);
}
?>





<!-- <?php
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
                $message = '<p><b>Selamat datang di Sinika!</b></p>';
                echo "<body onload='successLoginUser()'><input type='hidden' id='msg' value='" . $message . "''></input></body>";
                return false;
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
?> -->