<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\RegisterModel;
use App\Helper\SendMail;

class RegisterController extends BaseController
{
    private $RegisterModel;
    private $SendMail;
    public function __construct()
    {
        parent::model('RegisterModel');
        $this->RegisterModel = new RegisterModel();
        $this->SendMail = new SendMail();
    }
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $otp = sprintf('%06d', mt_rand(0, 999999));
            $expiresAt = date('Y-m-d H:i:s', strtotime('+5 minutes'));
            $title = "Kính gửi $name!";
            $content = "Mã OTP xác nhận đăng kí của bạn là: $otp";
            $this->SendMail->sendMail($email, $title, $content);
            $this->RegisterModel->insert('users', [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'otp' => $otp,
                'otp_expires_at' => $expiresAt,
                'status' => 0,
                'role_id' => 0
            ]);
            echo json_encode(['success' => true]);
            return;
        }
        $this->view('ClientMasterLayout', [
            'pages' => 'Register',
        ]);
    }

    public function confirm()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $otp = $_POST['otp'];
            $result = $this->RegisterModel->getOne('users', 'otp', $otp);
            if($result){
                $this->RegisterModel->confirmOTP($otp);
                echo json_encode(['success' => true, 'message' => 'Đăng kí thành công']);
                exit();
            }
        }
        $this->view('ClientMasterlayout', [
            'pages' => 'Confirm',
        ]);
    }
}
