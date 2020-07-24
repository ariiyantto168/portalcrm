<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Sources;
use Illuminate\Http\Request;

class SourcesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
      $contents = [
        'sources' => Sources::all(),
      ];
      // dd($contents);
      $pagecontent = view('sources.index',$contents );
  
      //masterpage
      $pagemain = array(
          'title' => 'Create Sources',
          'menu' => 'master',
          'submenu' => 'sources',
          'pagecontent' => $pagecontent,
      );
  
      return view('masterpage', $pagemain);
    }

    public function create_page()
    {
      $pagecontent = view('sources.create');
  
      //masterpage
      $pagemain = array(
          'title' => 'Create Sources',
          'menu' => 'sources',
          'submenu' => 'sources',
          'pagecontent' => $pagecontent,
      );
  
      return view('masterpage', $pagemain);
    }

    public function save_page(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'active' => ''
        ]);

        $active = FALSE;
        if($request->has('active')) {
            $active = TRUE;
        }

        $saveSources = new Sources;
        $saveSources->name = $request->name;
        $saveSources->active = $active;
        $saveSources->save();
        return redirect('sources')->with('status_success','Created Sources');
    }

    public function update_page(Sources $sources)
    {
        $contents = [
        'sources' => Sources::find($sources->idsources),
        ];
        // dd($contents);
        $pagecontent = view('sources.update',$contents);

        //masterpage
        $pagemain = array(
            'title' => 'sources',
            'menu' => 'sources',
            'submenu' => 'sources',
            'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);
    }

    public function update_save(Request $request, Sources $sources)
    {
        $request->validate([
            'name' => 'required',
            'active' => ''
        ]);

        $active = FALSE;
        if($request->has('active')) {
            $active = TRUE;
        }

        $saveSources = Sources::find($sources->idsources);
        $saveSources->name = $request->name;
        $saveSources->active = $active;
        $saveSources->save();
        return redirect('sources')->with('status_success','Updated Sources');
    }
}
