<?php namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
	public function index() {
	    $data = []; 

        helper(['form']);

        //I will need to add here check if user is already logged in then redirect to projects page
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

        if ($this->request->getMethod() == 'post') {
            if ($model->save($data) === false){

                //carries on to echo statements below

            }else{
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
        
        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email'     => 'required|max_length[30]|valid_email',
                'password'  => 'required|max_length[255]|validateUser[email,password]'
            ];

            $errors = [
                'password' => [
                'validateUser'  => 'Ooops! Email or Password don\'t match'
            ]];

            if (!$this->validate($rules, $errors)) {

                $data['errors'] = $this->validator->getErrors();

            }else{

                $model = new AuthModel();

                $user = $model->where('email', $this->request->getVar('email'))->first();

                $this->setUserStatus($user);

                return redirect()->to('home');

            }
        }

        echo view('templates/header');
        echo view('pages/login', $data);
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
        $data = [
            'email'     => $this->request->getPost('email'),
        ]; 

        helper(['form']);

        if($this->request->getMethod() == 'post'){
        
            $rules = [
                'email'     => 'required|max_length[30]|valid_email',
            ];

            if (!$this->validate($rules)) {

                $data['errors'] = $this->validator->getErrors();

            }else{

                $model = new AuthModel();

                $session = session();

                $session->setFlashdata('reset', 'Email with reset link will be sent to you if email exists on our system.');

                $user = $model->where('email', $this->request->getVar('email'))->first();

                if(!empty($user)){
                    //send reset email to user -- to do
                    $this->sendReset($user['email'], '123456');
                }

            }

        }

        echo view('templates/header');
        echo view('pages/recovery', $data);
        echo view('templates/footer');
    }

    private function sendReset($recipientEmail, $token)
    {
        $email = \Config\Services::email();
        $email->setFrom('admin@projectracker.com');
        $email->setTo($recipientEmail);
        //$email->setBCC('admin@yourdomain.com');
        $email->SetSubject('Project Tracker - Password Reset Link');
        $link = site_url('reset/'.$token);
        $email->setMessage('Please click on password reset link below to reset your password/n <a href="'.$link.'">Reset Link</a>');
        $email->send();
    }

}
