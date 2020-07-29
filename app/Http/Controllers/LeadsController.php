<?php

namespace App\Http\Controllers;

use Auth;
use PDF;
use App\Models\User;
use App\Models\Leads;
use App\Models\Approvals;
use App\Models\Sources;
use App\Models\Industries;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\Models\Contacts;

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
            // return Auth::user()->idusers;
        $active = FALSE;
        if($request->has('active')) {
            $active = TRUE;
        }

        $saveLeads = new Leads;
        $saveLeads->idsources = $request->idsources;
        $saveLeads->idindustries = $request->idindustries;
        $saveLeads->gelar = $request->gelar;
        $saveLeads->firstname = $request->firstname;
        $saveLeads->lastname = $request->lastname;
        $saveLeads->account = $request->account;
        $saveLeads->account = $request->account;
        $saveLeads->tittle = $request->tittle;
        $saveLeads->website = $request->website;
        $saveLeads->statusleads = $request->statusleads;
        $saveLeads->tipemoney = $request->tipemoney;
        $saveLeads->amount = $request->amount;
        $saveLeads->alamat = $request->alamat;
        $saveLeads->description = $request->description;
        $saveLeads->status = 'p';
        $saveLeads->save();

        
        $this->create_approvals($saveLeads->idleads);
        return redirect('leads')->with('status_success','Created leads');
    }

    public function update_page(Leads $leads)
    {
        $inds = Industries::all();
        $lead = Leads::with([
                        'approvals' => function($app){
                            $app->with(['approve_by']);
                        }
                        ])->where('idleads',$leads->idleads)->first();
        // return $lead;
        $contents = [
            'leads' => $lead,
            'sources' => Sources::all(),
            'industries' => $inds,
            // 'approvals' => $apps,
        ];
            // return $contents;
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
    
        $active = FALSE;
        if($request->has('active')) {
            $active = TRUE;
        }

        $saveLeads = Leads::find($leads->idleads);
        $saveLeads->idsources = $request->idsources;
        $saveLeads->idindustries = $request->idindustries;
        $saveLeads->gelar = $request->gelar;
        $saveLeads->firstname = $request->firstname;
        $saveLeads->lastname = $request->lastname;
        $saveLeads->account = $request->account;
        $saveLeads->account = $request->account;
        $saveLeads->tittle = $request->tittle;
        $saveLeads->website = $request->website;
        $saveLeads->statusleads = $request->statusleads;
        $saveLeads->tipemoney = $request->tipemoney;
        $saveLeads->amount = $request->amount;
        $saveLeads->alamat = $request->alamat;
        $saveLeads->description = $request->description;
        $saveLeads->save();
        return redirect('leads')->with('status_success','Updated leads');
    }

    protected  function create_approvals($idleads)
    {
        $loops = ['a','s'];
        foreach($loops as $loop) {
            $user = User::where('role',$loop)->first();
            if (!is_null($user)) {
                $save_approvals = new Approvals;
                $save_approvals->idleads = $idleads;
                $save_approvals->status = 'p';
                $save_approvals->level = $loop;
                $save_approvals->user_approvals = $user->idusers;
                $save_approvals->seen  = FALSE;
                $save_approvals->idusers = $idleads;
                $save_approvals->save();
            }
        }
    }

    public function add_contacts(Leads $leads)
    {
        $leads = Leads::with([
                                'industries',
                                'sources',
                                'contacts'
                            ])->where('idleads',$leads->idleads)
                              ->first();
        // return $leads;
        $contents = [
            'leads' => $leads
        ];
            // return $contents;
        // dd($contents);
        $pagecontent = view('leads.add-contacts',$contents);

        //masterpage
        $pagemain = array(
            'title' => 'updated leads',
            'menu' => 'leads',
            'submenu' => '',
            'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);
    }

    public function save_add_contacts(Leads $leads,Request $request)
    {
        // return $request->all();
        $count = count($request->gelar);
        for ($i=0; $i < $count ; $i++) { 
            $save_contact = new Contacts;
            $save_contact->idleads = $leads->idleads;
            $save_contact->gelar = $request->gelar[$i];
            $save_contact->account = $request->account[$i];
            $save_contact->firstname = $request->firstname[$i];
            $save_contact->lastname = $request->lastname[$i];
            $save_contact->alamat = $request->alamat[$i];
            $save_contact->description = $request->description[$i];
            $save_contact->save();
        }
        return redirect('leads/add-contacts/'.$leads->idleads)->with('status_success','Created Contacts');
      
    }

    public function save_update_contacts(Leads $leads, Request $request)
    {
        // return $request->all();
        $count = count($request->idcontacts);
        for ($i=0; $i < $count ; $i++) { 
            if ($request->idcontacts[$i] == 'new') {
                $save_contact = new Contacts;
                $save_contact->idleads = $leads->idleads;
            }else{
                $save_contact = Contacts::find($request->idcontacts[$i]);
            }
            $save_contact->gelar = $request->gelar[$i];
            $save_contact->account = $request->account[$i];
            $save_contact->firstname = $request->firstname[$i];
            $save_contact->lastname = $request->lastname[$i];
            $save_contact->alamat = $request->alamat[$i];
            $save_contact->description = $request->description[$i];
            $save_contact->save();
        }

        return redirect('leads/add-contacts/'.$leads->idleads)->with('status_success','Updated Contacts');
    }

    public function print_pdf(Leads $leads)
    {
        // return 'oke';
        $leads = Leads::with([
            'industries',
            'sources',
            'contacts'
        ])->where('idleads',$leads->idleads)
          ->first();
                    // return $leads;
          $view = view('leads.pdf-print')->with('leads',$leads);
          $pdf = PDF::loadHTML($view)->setPaper('a4', 'potrait');
        
        return $pdf->stream();
        //   return $leads;

    }
}
