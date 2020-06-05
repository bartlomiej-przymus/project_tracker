<?php namespace App\Controllers;

use App\Models\AuthModel;

use CodeIgniter\I18n\Time;

class Auth extends BaseController
{
    public function index()
    {
	    $data = []; 

        helper(['form']);

        echo view('templates/header', $data);

        echo view('pages/login');

        echo view('templates/footer');
    }
    
    public function register()
    {
        $data = [
            'firstname' => $this->request->getVar('firstname'),

            'lastname'  => $this->request->getVar('lastname'),
            
            'email'     => $this->request->getVar('email'),

            'password'  => $this->request->getVar('password'),

            'password_confirm'  => $this->request->getVar('password_confirm')
        ]; 

        helper(['form']);

        $model = new AuthModel();

        if ($this->request->getMethod() == 'post')
        {
            if ($model->save($data) === true)
            {
                $model->save($data);

                $session = session();

                $session->setFlashdata('success', 'Successful Registration');

                return redirect()->to('/');
            }
        }

        echo view('templates/header');

        echo view('pages/register', ['errors' => $model->errors()]);

        echo view('templates/footer');
    }

    public function login()
    {
        $data = [
            'email'     => $this->request->getPost('email'),

            'password'  => $this->request->getPost('password')
        ]; 

        helper(['form']);
        
        if ($this->request->getMethod() == 'post')
        {
            $rules = [
                'email'     => 'required|max_length[30]|valid_email',

                'password'  => 'required|max_length[255]|validateUser[email,password]'
            ];

            $errors = [
                'password' => [

                    'validateUser'  => 'Ooops! Email or Password don\'t match'
                ]
            ];

            if (!$this->validate($rules, $errors))
            {
                $data['errors'] = $this->validator->getErrors();

            }else{

                $model = new AuthModel();

                $user = $model->where('email', $this->request->getVar('email'))->first();

                $this->setUserStatus($user);

                return redirect()->to('home');
            }
        }

        echo view('templates/header');

        echo view('pages/login');

        echo view('templates/footer');
    }

    private function setUserStatus($user)
    {
        $data = [
            'id'            => $user['id'],

            'firstname'     => $user['firstname'],

            'lastname'      => $user['lastname'],

            'email'         => $user['email'],

            'isLoggedIn'    => true
        ];

        session()->set($data);

        return true;
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('login');
    }

    public function recovery()
    {
        $data = []; 

        helper(['form']);

        if($this->request->getMethod() == 'post'){
        
            $rules = [

                'email'     => 'required|max_length[30]|valid_email',

            ];

            if (!$this->validate($rules))
            {
                $data['errors'] = $this->validator->getErrors();

            }else{

                $model = new AuthModel();

                $session = session();

                $session->setFlashdata('reset', 'Email with reset link will be sent to you if email exists on our system.');

                $user = $model->where('email', $this->request->getVar('email'))->first();

                if(!empty($user))
                {
                    $data['id'] = $user['id'];
                    
                    $token = openssl_random_pseudo_bytes(16);

                    $token = bin2hex($token);

                    $hashedToken = password_hash($token, PASSWORD_DEFAULT);

                    $data['token'] = $hashedToken;

                    $format = 'Y-m-d H:i:s';
                    
                    $data['reset_at'] = date($format);

                    $model->save($data);

                    $this->sendReset($user['email'], $user['id'], $token);
                }
            }
        }

        echo view('templates/header');

        echo view('pages/recovery');

        echo view('templates/footer');
    }

    public function reset($id, $tokenReceived)
    {
        $model = new AuthModel();

        $user = $model->where('id', $id)->first();

        if($this->request->getMethod() == 'get')

            echo $tokenReceived;

        if(password_verify($tokenReceived, $user['token']))
        {
            echo 'token match';

        }else{

            echo 'token don\'t match';
        }
    
    }

    private function sendReset($recipientEmail, $id, $token)
    {
        $email = \Config\Services::email();

        $email->setFrom('admin@projectracker.com');

        $email->setTo($recipientEmail);

        //$email->setBCC('admin@yourdomain.com');

        $email->SetSubject('Project Tracker - Password Reset Link');

        $link = site_url('reset/'.$id.'/'.$token);

        //$email->setMessage('Please click on password reset link below to reset your password/n <a href="'.$link.'">Reset Link</a>');

        //$email->send();

        echo 'Please click on password reset link below to reset your password <br> <a href="'.$link.'">Reset Link</a>';
    }
}
