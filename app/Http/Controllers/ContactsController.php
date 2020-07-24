<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
      $contents = [
        'contacts' => Contacts::all(),
      ];
      // dd($contents);
      $pagecontent = view('contacts.index',$contents );
  
      //masterpage
      $pagemain = array(
          'title' => 'Create Contacts',
          'menu' => 'contacts',
          'submenu' => '',
          'pagecontent' => $pagecontent,
      );
  
      return view('masterpage', $pagemain);
    }

    public function create_page()
    {

        $pagecontent = view('contacts.create');
        //masterpage
        $pagemain = array(
            'title' => 'Contacts Create',
            'menu' => 'contacts',
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


        $saveContacts = new Contacts;
        $saveContacts->fill($request->all());
        $saveContacts->save();
        return redirect('contacts')->with('status_success','Created Contacts');
    }

    public function update_page(Contacts $contacts)
    {

        $contents = [
            'contacts' => Contacts::find($contacts->idcontacts),
        ];
        // dd($contents);
        $pagecontent = view('contacts.update',$contents);

        //masterpage
        $pagemain = array(
            'title' => 'updated contacts',
            'menu' => 'contacts',
            'submenu' => '',
            'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);
    }

    public function update_save(Request $request, Contacts $contacts)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'active' => ''
        // ]);


        $saveContacts = Contacts::find($contacts->idcontacts);
        $saveContacts->fill($request->all());
        $saveContacts->save();
        return redirect('contacts')->with('status_success','Update Contacts');
    }
}
