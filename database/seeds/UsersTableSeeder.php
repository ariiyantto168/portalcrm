<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['a','s','p'];
       foreach ($roles as $role) {
         $save_user = new User;
         $save_user->idusers = Uuid::uuid4();
         if ($role == 'a') {
           $save_user->name = 'Admin';
           $save_user->email ='root@root.com';
           $save_user->password =  bcrypt('rootroot');
        }elseif($role == 's') {
           $save_user->name = 'Sales';
           $save_user->email ='sales@crm.com';
           $save_user->password =  bcrypt('123456');
        }elseif($role == 'p') {
         $save_user->name = 'Partner';
         $save_user->email ='partner@crm.com';
         $save_user->password =  bcrypt('123456');
      }
         $save_user->role = $role;
         $save_user->save();
    }
    }
}
