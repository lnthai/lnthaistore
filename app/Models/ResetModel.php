<?php

namespace App\Models;

use App\Models\BaseModel;
use PDOException;
class ResetModel extends BaseModel
{
    public function reset($password, $confirmPassword, $token, $email)
    {
        if ($password !== $confirmPassword) {
            return "Mật khẩu nhập lại sai";
        }
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password = :password WHERE email = :email AND token = :token";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':token', $token);
        try {
            $stmt->execute();
            $rowCount = $stmt->rowCount();
            if ($rowCount == 1) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Error updating password: " . $e->getMessage();
        }
    }
}
