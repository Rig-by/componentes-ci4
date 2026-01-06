<?php

namespace App\Controllers;

class Test extends BaseController
{
    public function index()
    {
        // Cargar el helper de URL para poder usar base_url()
        helper('url'); 
        
        return view('test_components');
    }
}