<?php namespace App\Controllers;

//use App\Models\AuthModel;

class Name extends BaseController
{
    public function index()
    {
        $data = [];

        echo view('templates/header', $data);

        echo view('pages/name');

        echo view('templates/footer');
    }
}