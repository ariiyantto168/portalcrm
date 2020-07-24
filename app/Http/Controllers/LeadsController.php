<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Leads;
use App\Models\Sources;
use App\Models\Industries;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
      $contents = [
        'leads' => Leads::with('sources','industries')->get(),
      ];
      // dd($contents);
      $pagecontent = view('leads.index',$contents );
  
      //masterpage
      $pagemain = array(
          'title' => 'Create Leads',
          'menu' => 'leads',
          'submenu' => '',
          'pagecontent' => $pagecontent,
      );
  
      return view('masterpage', $pagemain);
    }

    public function create_page()
    {
        $inds = Industries::all();

        $contents = [
            'industries' => $inds,
            'sources' => Sources::all(),
        ];

        $pagecontent = view('leads.create', $contents);
        //masterpage
        $pagemain = array(
            'title' => 'Leads Create',
            'menu' => 'leads',
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

        $active = FALSE;
        if($request->has('active')) {
            $active = TRUE;
        }

        $saveLeads = new Leads;
        $saveLeads->idsources = $request->idsources;
        $saveLeads->idindustries = $request->idindustries;
        $saveLeads->fill($request->all());
        $saveLeads->active = $active;
        $saveLeads->save();
        return redirect('leads')->with('status_success','Created leads');
    }

    public function update_page(Leads $leads)
    {
        $inds = Industries::all();

        $contents = [
            'leads' => Leads::find($leads->idleads),
            'sources' => Sources::all(),
            'industries' => $inds,
        ];
        // dd($contents);
        $pagecontent = view('leads.update',$contents);

        //masterpage
        $pagemain = array(
            'title' => 'updated leads',
            'menu' => 'leads',
            'submenu' => '',
            'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);
    }

    public function update_save(Request $request, Leads $leads)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'active' => ''
        // ]);

        $active = FALSE;
        if($request->has('active')) {
            $active = TRUE;
        }

        $saveLeads = Leads::find($leads->idleads);
        $saveLeads->idsources = $request->idsources;
        $saveLeads->idindustries = $request->idindustries;
        $saveLeads->fill($request->all());
        $saveLeads->active = $active;
        $saveLeads->save();
        return redirect('leads')->with('status_success','Updated leads');
    }
}
