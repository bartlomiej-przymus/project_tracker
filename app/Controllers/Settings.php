<?php namespace App\Controllers;

use App\Models\AuthModel;

class Settings extends BaseController
{
	public function index() {

        $model = new AuthModel();

        $session = session();

        $user = $model->where('id', $session->get('id'))->first();

        helper(['form']);

        $data = [
            'firstname'   => $user['firstname'],
            'lastname'    => $user['lastname'],
            'email'       => $session->email,
        ];

        echo view('templates/header', $data);
        echo view('pages/settings');
        echo view('templates/footer');

    }

    public function update()
    {
        $model = new AuthModel();

        helper(['form']);

        $session = session();

        $user = $model->where('id', $session->get('id'))->first();

        $data = [
            'firstname'   => $user['firstname'],
            'lastname'    => $user['lastname'],
            'email'       => $session->email,
        ];

        $session = session();

        $updateData = [
            'id'        => session()->get('id'),
            'firstname' => $this->request->getVar('firstname'),
            'lastname'  => $this->request->getVar('lastname')
        ];

        if($this->request->getPost('password') != ''){
            $updateData['password'] = $this->request->getPost('password');
            $updateData['password_confirm'] = $this->request->getPost('password_confirm');
        }

        helper(['form']);
        
        if ($this->request->getMethod() == 'post') {

            if ($model->save($updateData) === false){

            } else {
                
                $model->save($updateData);

                $session->setFlashdata('update', 'User details successfuly updated');

                return redirect()->to('home/settings');
            
            }
        
            echo view('templates/header', $data);
            echo view('pages/settings', ['errors' => $model->errors()]);
            echo view('templates/footer');
        }

    }
}