<?php

namespace App\Models;

use App\Models\BaseModel;

class RegisterModel extends BaseModel
{
    public function confirmOTP($otp)
    {
        $result = $this->getOne('users', 'otp', $otp);

        if ($result) {
            if ($result['otp_expires_at'] < date('Y-m-d H:i:s')) {
                $this->delete('users', 'otp', $otp);
            } else {
                $this->update('users', [
                    'otp' => 0,
                    'status' => 1
                ], 'otp', $otp);
            }
        }
    }
}
