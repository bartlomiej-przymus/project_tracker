<?php namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'users';

    protected $useTimestamps = true;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

    protected $allowedFields = ['firstname', 'lastname', 'email', 'password', 'updated_at', 'token', 'reset_at'];

    protected $beforeInsert = ['beforeInsert'];

    protected $beforeUpdate = ['beforeUpdate'];

    protected $validationRules = [
        'firstname'         => 'required|alpha_dash|min_length[3]|max_length[30]',

        'lastname'          => 'required|alpha_dash|min_length[3]max_length[30]',

        'email'             => 'required|valid_email|is_unique[users.email]|max_length[30]',

        'password'          => 'required|min_length[6]|max_length[255]',

        'password_confirm'  => 'required_with[password]|matches[password]'
    ];

    protected $validationMessages = [
        'firstname'         => [
            'alpha_dash'    => 'Sorry. Name can contain only letters and dashes.',

            'min_length'    => 'Sorry. Name needs to be at least 3 characters long.',

            'max_length'    => 'Sorry. Name is to long. Maximum permitted length is 30 characters.'
        ],

        'lastname'         => [
            'alpha_dash'    => 'Sorry. Surname can contain only letters and dashes.',

            'min_length'    => 'Sorry. Surname needs to be at least 3 characters long.',

            'max_length'    => 'Sorry. Surname is to long. Maximum permitted length is 30 characters.'
        ],

        'email'             => [
            'is_unique'     => 'Sorry. That email has already been taken. Please choose another.',

            'valid_email'   => 'Provided email is not valid',

            'max_length'    => 'Sorry. Provided email exceeds maximum permitted length of 30 characters'
        ],

        'password'          => [
            'min_length'    => 'Sorry. Minimum required password length is 6 characters',
            
            'max_length'    => 'Sorry. Maximum password length exceeded'
        ],

        'password_confirm'  => [
            'matches'       => 'Passwords do not match. Please try again.',
        ],
    ];

    protected function passwordHash(array $data)
    {
        if (isset($data['data']['password']))
        {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);

        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);

        return $data;
    }
}
