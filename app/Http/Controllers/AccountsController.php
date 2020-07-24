<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Accounts;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
      $contents = [
        'accounts' => Accounts::all(),
      ];
      // dd($contents);
      $pagecontent = view('accounts.index',$contents );
  
      //masterpage
      $pagemain = array(
          'title' => 'Create Accounts',
          'menu' => 'accounts',
          'submenu' => '',
          'pagecontent' => $pagecontent,
      );
  
      return view('masterpage', $pagemain);
    }

    public function create_page()
    {

        $pagecontent = view('accounts.create');
        //masterpage
        $pagemain = array(
            'title' => 'Accounts Create',
            'menu' => 'accounts',
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


        $saveAccounts = new Accounts;
        $saveAccounts->fill($request->all());
        $saveAccounts->save();
        return redirect('accounts')->with('status_success','Created Accounts');
    }

    public function update_page(Accounts $accounts)
    {

        $contents = [
            'accounts' => Accounts::find($accounts->idaccounts),
        ];
        // dd($contents);
        $pagecontent = view('accounts.update',$contents);

        //masterpage
        $pagemain = array(
            'title' => 'updated Accounts',
            'menu' => 'accounts',
            'submenu' => '',
            'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);
    }

    public function update_save(Request $request, Accounts $accounts)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'active' => ''
        // ]);


        $saveAccounts = Accounts::find($accounts->idaccounts);
        $saveAccounts->fill($request->all());
        $saveAccounts->save();
        return redirect('accounts')->with('status_success','Created Accounts');
    }
}
