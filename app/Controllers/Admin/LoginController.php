<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LoginModel;

class LoginController extends BaseController
{
    private $LoginModel;
    public function __construct()
    {
        parent::model('LoginModel');
        $this->LoginModel = new LoginModel();
    }
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (empty($email) || empty($password)) {
                $_SESSION['error'] = "Vui lòng nhập đúng email và mật khẩu.";
                header("Location: /login");
                exit();
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = "Định dạng email không hợp lệ.";
                header("Location: /login");
                exit();
            }
            if ($this->LoginModel->login($email, $password) == false) {
                $_SESSION['error'] = "Email hoặc mật khẩu sai";
                header("Location: /login");
                exit();
            }
        }

        // Nếu không có yêu cầu POST, hiển thị trang đăng nhập
        parent::login('LoginAdmin');
    }


    public function logout()
    {
        unset($_SESSION['admin']);
        echo "<script>window.location.reload();</script>";
    }

    public function reset_password()
    {
        parent::view('ResetPassword');
    }
}
