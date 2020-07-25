<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Approvals;
use App\Models\Leads;
use App\Models\Sources;
use App\Models\Industries;

class ApprovalsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (!$request->has('account') || !$request->has('status') ) {
            $account = 'account=';
            $status = 'status=p';
            return redirect('approvals?'.$account.'&'.$status);
          }

          $approvals = Approvals::join('users','approvals.idusers','=','users.idusers')
          ->join('leads','approvals.idleads','=','leads.idleads')
        //   ->join('sources','sources.idsources','=','sources.idsources')
          ->join('sources','leads.idsources','=','sources.idsources')
          ->join('industries','leads.idindustries','=','industries.idindustries')
          ->select(
            'approvals.*',
            'leads.description as account',
            'sources.name as name',
            'industries.name as name'
            )
          ->orderBy('.idapprovals');

        //   return $approvals;

          if (in_array($request->status, ['p','a','r'])) {
            $approvals->where('approvals.status',$request->status);
          }
      
          if (strlen($request->account) > 0) {
            $approvals->where('leads.idleads', $request->account);
          }
      
          $data_approvals = $approvals->get();
        //   return $data_approvals;

        $contents = [
            'accounts' => Leads::all(),
            'sources' => Sources::where('active',TRUE)->get(),
            'approvals' => $data_approvals,
          ];
      // return $contents;
          $pagecontent =  view('approvals.index', $contents);
      
          //masterpage
          $pagemain = array(
            'title' => 'Approvals',
            'menu' => 'approvals',
            'submenu' => '',
            'pagecontent' => $pagecontent,
          );
      
          return view('masterpage', $pagemain);
    }

    public function show(Approvals $approval, Leads $leads)
  {

        $contents = [
            'leads' => Leads::find($leads->idleads),
            'approvals' => Leads::find($approval->idapprovals)
        ];

    $pagecontent =  view('approvals.show', $contents);

    //masterpage
    $pagemain = array(
      'title' => 'Approvals',
      'menu' => 'approvals',
      'submenu' => '',
      'pagecontent' => $pagecontent,
    );

    return view('masterpage', $pagemain);
  }

  public function approve(Approvals $approvals) {

  }


}
