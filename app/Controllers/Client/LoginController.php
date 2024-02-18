<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    private $UserModel;
    public function __construct()
    {
        parent::model('UserModel');
        $this->UserModel = new UserModel();
    }
    public function index()
    {
        ob_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if ($this->UserModel->login($email, $password)) {
                echo json_encode(['success' => true]);
                return;
            } else {
                echo json_encode(['success' => false]);
                return;
            }
        }
        $this->view('ClientMasterLayout', [
            'pages' => 'Login'
        ]);
        ob_end_flush();
    }
}
