<?php

namespace App\Models;

use PDO;

class LoginModel extends BaseModel
{
    public function login($email, $password)
    {
        $query = "SELECT * FROM users WHERE email = :email AND role_id = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['admin'] = $user;
                header('Location: /admin');
                exit(); 
            } else {
                return false; 
            }
        } else {
            return false; 
        }
    }
}
