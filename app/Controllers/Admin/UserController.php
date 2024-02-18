<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    private $UserModel;
    public function __construct()
    {
        parent::model('UserModel');
        $this->UserModel = new UserModel();
    }
    public function index()
    {
        parent::view('AdminMasterLayout', [
            'pages' => 'User',
            'block' => 'user/list',
            'user' => $this->UserModel->getAll('users')
        ]);
    }
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $regex = "/^.{8,}$/";
            if (!preg_match($regex, $password)) {
                echo json_encode(['success' => false, 'message' => 'Mật khẩu phải đủ 8 ký tự']);
                exit();
            } else {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $avatar = $_FILES['avatar']['name'];
                $upload = $_FILES['avatar'];
                if ($upload['error'] === UPLOAD_ERR_OK) {
                    $tempName = $upload['tmp_name'];
                    // Xác định tên file mới
                    $originalName = basename($upload['name']);
                    $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                    $newFileName = uniqid() . '_' . $originalName; // Thêm một giá trị duy nhất vào tên file
                    // Thư mục lưu trữ ảnh
                    $uploadDir = 'public/uploads/';

                    // Di chuyển file ảnh đến thư mục lưu trữ
                    if (move_uploaded_file($tempName, $uploadDir . $newFileName)) {
                        // Trả về đường dẫn ảnh mới
                        $avatar = $uploadDir . $newFileName;

                        $this->UserModel->insert('users', [
                            'name' => $name,
                            'email' => $email,
                            'password' => $password,
                            'avatar' => $avatar
                        ]);
                        echo json_encode(['success' => true, 'message' => 'Người dùng đã được thêm']);
                        exit();
                    } else {
                        echo json_encode(['success' => false, 'message' => 'Có lỗi khi tải ảnh lên']);
                        exit();
                    }
                } else {
                    echo json_encode(['success' => false, 'message' => 'Có lỗi khi tải ảnh lên']);
                    exit();
                }
            }
        }

        parent::view('AdminMasterLayout', [
            'pages' => 'User',
            'block' => 'user/add'
        ]);
    }


    public function edit()
    {
        $url = $_SERVER['REQUEST_URI'];
        $pattern = '/\/(\d+)$/';
        if (preg_match($pattern, $url, $matches)) {
            $user_id = $matches[1];
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $avatar = $_FILES['avatar'];
            $upload = $_FILES['avatar'];
            if ($upload['error'] === UPLOAD_ERR_OK) {
                $tempName = $upload['tmp_name'];
                // Xác định tên file mới
                $originalName = basename($upload['name']);
                $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                $newFileName = uniqid() . '_' . $originalName; // Thêm một giá trị duy nhất vào tên file
                // Thư mục lưu trữ ảnh
                $uploadDir = 'public/uploads/';

                // Di chuyển file ảnh đến thư mục lưu trữ
                if (move_uploaded_file($tempName, $uploadDir . $newFileName)) {
                    // Trả về đường dẫn ảnh mới
                    $avatar = $uploadDir . $newFileName;

                    $this->UserModel->update('users', [
                        'name' => $name,
                        'email' => $email,
                        'avatar' => $avatar
                    ], 'id', $user_id);
                    echo json_encode(['success' => true, 'message' => 'Cập nhật thành công']);
                    exit();
                } else {
                    echo json_encode(['success' => false, 'message' => 'Có lỗi khi tải ảnh lên']);
                    exit();
                }
            } else {
                $avatar = $_POST['image'];
                $this->UserModel->update('users', [
                    'name' => $name,
                    'email' => $email,
                    'avatar' => $avatar
                ], 'id', $user_id);
                echo json_encode(['success' => true, 'message' => 'Cập nhật thành công']);
                exit();
            }  
        }
        parent::view('AdminMasterLayout', [
            'pages' => 'User',
            'block' => 'user/edit',
            'user' => $this->UserModel->getOne('users', 'id', $user_id),
        ]);
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $url = $_SERVER['REQUEST_URI'];
            $pattern = '/\/(\d+)$/';
            if (preg_match($pattern, $url, $matches)) {
                $user_id = $matches[1];
            }
            $this->UserModel->delete('users', 'id', $user_id);
        }
    }
}
