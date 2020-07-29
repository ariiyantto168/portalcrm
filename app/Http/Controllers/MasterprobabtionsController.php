<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Masterprobabtions;
use Illuminate\Http\Request;


class MasterprobabtionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
      $contents = [
        'industries' => Industries::all(),
      ];
      // dd($contents);
      $pagecontent = view('industries.index',$contents );
  
      //masterpage
      $pagemain = array(
          'title' => 'Create Industry',
          'menu' => 'master',
          'submenu' => 'industries',
          'pagecontent' => $pagecontent,
      );
  
      return view('masterpage', $pagemain);
    }
}
