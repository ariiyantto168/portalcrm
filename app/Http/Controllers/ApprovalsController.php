<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Approvals;
use App\Models\Leads;
use App\Models\Sources;
use App\Models\Industries;
use Auth;
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
            'leads.account as account',
            'sources.name as name',
            'industries.name as name'
            )
          ->orderBy('approvals.idapprovals')
          ->where('approvals.user_approvals',Auth::user()->idusers);

          // return $approvals;

          if (in_array($request->status, ['p','a','r'])) {
            $approvals->where('approvals.status',$request->status);
          }
      
          if (strlen($request->account) > 0) {
            $approvals->where('leads.idleads', $request->account);
          }
          # 
          // return $approvals->get();
          $data_approvals = $approvals->get();
          # // return $data_approvals;

        $contents = [
            'account' => Leads::all(),
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

  //   public function show(Approvals $approval, Leads $leads)
  // {

  //       $contents = [
  //           'leads' => Leads::find($leads->idleads),
  //           'approvals' => Leads::find($approval->idapprovals)
  //       ];

  //   $pagecontent =  view('approvals.show', $contents);

  //   //masterpage
  //   $pagemain = array(
  //     'title' => 'Approvals',
  //     'menu' => 'approvals',
  //     'submenu' => '',
  //     'pagecontent' => $pagecontent,
  //   );

  //   return view('masterpage', $pagemain);
  // }

  public function show(Approvals $approval, Leads $leads)
  {
    // $approvals = Approvals::with(['leads'])->get()
    //             ->where('idapprovals', $approval->idapprovals)
    //             ->first();

    $approvals = Approvals::with([
      'leads' => function($led){
        $led->with([
          'sources',
          'industries',
        ]);
      }
    ])
    ->where('idapprovals', $approval->idapprovals)
    ->first();
                  // return $approvals;
    $contents = [
      'approvals' => $approvals,
    ];

    // return $contents;

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

  public function update_approvals(Request $request, Approvals $approval )
  {
    $save_approve = Approvals::find($approval->idapprovals);
    $save_approve->status  = $request->status;
    $save_approve->seen = 1;
    // return $save_approve;
     $save_approve->save();

     $this->update_leads($save_approve);
     return redirect('approvals')->with('success','Updated status equipment');
  }

  protected function update_leads($save_approve)
  {
    $get_app = Approvals::where('idleads',$save_approve->idleads)->get();
    
    $pending = $approved = $rejected = FALSE;
    foreach ($get_app as $app) {
      if ($app->status == 'r') {
        $rejected = TRUE;
      }elseif($app->status == 'a'){
        $approved = TRUE;
      }elseif($app->status == 'p'){
        $pending = TRUE;
      }
    }

    $status = 'p';
    if ($rejected) {
      $status = 'r'; 
    }elseif($approved && !$pending){
      $status = 'a';
    }elseif($pending){
      $status = 'p';
    }

    // return $get_app;
    $save_eqdet = Leads::find($save_approve->idleads);
    $save_eqdet->status = $status;
    $save_eqdet->save();

  }


}
