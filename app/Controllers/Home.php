<?php namespace App\Controllers;

use App\Models\AuthModel;

class Home extends BaseController
{
	public function index() {
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
            'password'  => $this->request->getVar('password')
        ]; 

        helper(['form']);

        $model = new AuthModel();

        if ($this->request->getMethod() == 'post') {
            if ($model->save($data) === false){
                //return view('pages/register', ['errors' => $model->errors()]);
                $errors = ['errors' => $model->errors()];
            }else{
                $model->save($data);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/');
            }
        }

        echo view('templates/header');
        echo view('pages/register', $errors);
        echo view('templates/footer');

    }
}
