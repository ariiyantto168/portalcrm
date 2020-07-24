<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pagecontent = view('/home');

        //masterpage
        $pagemain = array(
            'title' => 'Home',
            'menu' => 'home',
            'submenu' => '',
            'pagecontent' => $pagecontent,
        );
        return view('masterpage', $pagemain);   
    }
}
