<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Opps;
use Illuminate\Http\Request;

class OppsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
      $contents = [
        'opps' => Opps::all(),
      ];
      // dd($contents);
      $pagecontent = view('opps.index',$contents );
  
      //masterpage
      $pagemain = array(
          'title' => 'Create Oppurtinity',
          'menu' => 'opps',
          'submenu' => '',
          'pagecontent' => $pagecontent,
      );
  
      return view('masterpage', $pagemain);
    }

    public function create_page()
    {

        $pagecontent = view('opps.create');
        //masterpage
        $pagemain = array(
            'title' => 'Opportunity Create',
            'menu' => 'opps',
            'submenu' => '',
            'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);
    }

    public function create_save(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'active' => ''
        // ]);


        $saveOpps = new Opps;
        $saveOpps->fill($request->all());
        $saveOpps->save();
        return redirect('opps')->with('status_success','Created Opportunity');
    }
}
