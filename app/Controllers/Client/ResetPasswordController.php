<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\ResetModel;

class ResetPasswordController extends BaseController
{
    private $ResetModel;
    public function __construct()
    {
        parent::model('ResetModel');
        $this->ResetModel = new ResetModel();
    }
    public function index()
    {
       
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
            $token = $_POST['token'];
            $email = $_POST['email'];
            $result = $this->ResetModel->reset($password, $confirmPassword, $token, $email);
            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Mật khẩu đã được đổi']);
                return;
            } else {
                echo json_encode(['success' => false]);
                return;
            }
        }

        parent::view('ClientMasterLayout', [
            'pages' => 'ResetPassword'
        ]);
       
    }
}
