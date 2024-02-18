<?php

namespace App\Models;

use App\Models\BaseModel;
use PDO;

class UserModel extends BaseModel
{
    public function login($email, $password)
    {
        $query = "SELECT * FROM users WHERE email = :email AND role_id = 0 AND otp = 0 AND status = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
