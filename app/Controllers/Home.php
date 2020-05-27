<?php namespace App\Controllers;

//use App\Models\AuthModel;

class Home extends BaseController
{
	public function index() {

        $data = [];

        echo view('templates/header', $data);
        echo view('pages/home');
        echo view('templates/footer');

    }
}