<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $name =['Address' => 'Большая Семёновская', 'Phone' => '88005553535', 'Email'=>'test@test.com'];
        return view('contact', ['name'=>$name]);
    }
}
