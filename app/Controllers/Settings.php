<?php namespace App\Controllers;

//use App\Models\AuthModel;

class Settings extends BaseController
{
	public function index() {

        $data = [];

        echo view('templates/header', $data);
        echo view('pages/settings');
        echo view('templates/footer');

    }
}