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

                //return view('pages/register', ['errors' => $model->errors()]);
                //$errors = ['errors' => $model->errors()];

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

                $user = $model->model('email', $this->request->getVar('email'))->first();

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
            'firstNane'     => $user['firstname'],
            'lastname'      => $user['lastname'],
            'email'         => $user['id'],
            'isLoggedIn'    => true
        ];

        session()->set($data);

        return true;
    }
}
