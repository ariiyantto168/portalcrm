<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       $contents = [
         'users' => User::all(),
       ];
       // dd($contents);
       $pagecontent = view('users.index',$contents);

       //masterpage
       $pagemain = array(
           'title' => 'Users Profile',
           'menu' => 'master',
           'submenu' => 'users',
           'pagecontent' => $pagecontent,
       );

       return view('masterpage', $pagemain);
    }

    public function create_page()
    {
        $pagecontent = view('users.create');

        //masterpage
        $pagemain = array(
            'title' => 'Create Users',
            'menu' => 'users',
            'submenu' => 'users',
            'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);
    }

    public function create_save(Request $request)
    {
        $request->validate([
            'name' => 'required|max:225',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $save_users = new User;
        $save_users->idusers = Uuid::uuid4();
        $save_users->name = $request->name;
        $save_users->email = $request->email;
        $save_users->role = $request->role;
        $save_users->password = Hash::make($request->password);
        $save_users->save();

        return redirect('users')->with('status_success','Created New Users');
    }

    public function update_page(User $users)
    {
      $user = User::where('idusers',$users->idusers)->first();

      $contents = [
        'users' => $user,
      ];
      // return $content;

      $pagecontent = view('users.update', $contents);

    //masterpage
      $pagemain = array(
          'title' => 'Update User',
          'menu' => 'master',
          'submenu' => 'users',
          'pagecontent' => $pagecontent,
      );

      return view('masterpage', $pagemain);
    }

    public function update_save(Request $request, User $users)
    {
        
      $save_users = User::find($users->idusers);
      $save_users->idusers = Uuid::uuid4();
      $save_users->name = $request->name;
      $save_users->email = $request->email;
      $save_users->role = $request->role;
      $save_users->password = Hash::make($request->password);
      return $save_users;
      $save_users->save();

      return redirect('users')->with('status_success','Created New Users');
    }
}
