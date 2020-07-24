<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Industries;
use Illuminate\Http\Request;

class IndustriesController extends Controller
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

    public function create_page()
    {
      $pagecontent = view('industries.create');
  
      //masterpage
      $pagemain = array(
          'title' => 'Create industry',
          'menu' => 'industries',
          'submenu' => 'industries',
          'pagecontent' => $pagecontent,
      );
  
      return view('masterpage', $pagemain);
    }

    public function save_page(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $saveIndustries = new Industries;
        $saveIndustries->name = $request->name;
        $saveIndustries->save();
        return redirect('industries')->with('status_success','Created Industry');
    }

    public function update_page(Industries $industries)
    {
        $contents = [
        'industries' => Industries::find($industries->idindustries),
        ];
        // dd($contents);
        $pagecontent = view('industries.update',$contents);

        //masterpage
        $pagemain = array(
            'title' => 'industries',
            'menu' => 'industries',
            'submenu' => 'industries',
            'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);
    }

    public function update_save(Request $request, Industries $industries)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $saveIndustries = Industries::find($industries->idindustries);
        $saveIndustries->name = $request->name;
        $saveIndustries->save();
        return redirect('industries')->with('status_success','Created Industry');
    }
}
