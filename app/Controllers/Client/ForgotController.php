<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\ForgotModel;
use App\Helper\SendMail;

class ForgotController extends BaseController
{
    private $ForgotModel;
    private $SendMail;
    public function __construct()
    {
        parent::model('ForgotModel');
        $this->ForgotModel = new ForgotModel();
        $this->SendMail = new SendMail();
    }
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $result = $this->ForgotModel->getOne('users', 'email', $email);
            if ($result > 0) {
                $token = hash('sha256', uniqid(rand(), true));
                $token_expires_at = date('Y-m-d H:i:s', strtotime('+5 minutes'));
                $this->ForgotModel->update('users', [
                    'token' => $token,
                    'token_expires_at' => $token_expires_at
                ], 'email', $email);
                $title = "Kính gửi $result!";
                $content = "<a href='http://localhost:8000/resetpassword?token=" . $token . "&email=" . $email . "'>Bấm vào đây</a> để đặt lại mật khẩu";
                $this->SendMail->sendMail($email, $title, $content);
                echo json_encode(['success' => true,'message'=> 'Đã gửi mail xác minh']);
                return;
            } else {
                echo json_encode(['success' => false]);
                return;
            }
        }
        parent::view('ClientMasterLayout', [
            'pages' => 'Forgot'
        ]);
    }
}
