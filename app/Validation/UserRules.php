<?php

namespace App\Validation;

use App\Models\AuthModel;

// following class checks first if user exist for given email address if user found it checks password

class UserRules
{
    public function validateUser(string $str, string $fields, array $data)
    {
        $model = new AuthModel();
        $user = $model->where('email', $data['email'])->first();

        if(!$user)
            return false;
        
        return password_verify($data['password'], $user['password']);
    }
}