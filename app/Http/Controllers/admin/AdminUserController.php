<?php

namespace App\Http\Controllers\admin;
use App\Models\User;
use App\Http\Requests\admin\AdminUserRequest;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function show_users()
    {
        $users = DB::table('users')->where('group_id', '0')->get();
        
        if(count($users) == 0)
        {
            return view('admin.users', ['users' => $users,
                                        'error' => 'There are No Users']);
        }
        
        return view('admin.users', compact('users'));
    }
    
    public function add_user()
    {
        return view('admin.user_add');
    }
    
    public function insert_user(AdminUserRequest $request)
    {
        /* Starting The Validation Phase */
        
        $first_name = $request->input('firstname');
        $last_name = $request->input('lastname');
        $full_name = $request->input('fullname');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $confirm_password = $request->input('confirm_password');
        
         // Starting The Filtration Phase
        
        $filtered_first_name = filter_var($first_name, FILTER_SANITIZE_STRING);
        $filtered_last_name = filter_var($last_name, FILTER_SANITIZE_STRING);
        $filtered_full_name = filter_var($full_name, FILTER_SANITIZE_STRING);
        $filtered_username = filter_var($username, FILTER_SANITIZE_STRING);
        $filtered_email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $filtered_password = filter_var($password, FILTER_SANITIZE_STRING);
        
        if($filtered_password != $confirm_password)
        {
            return view('admin.user_add', ['error' => 'The Passwords Must Be Matching']);
        }
        
        else
        {
            User::create([
             'first_name' => $filtered_first_name,
             'last_name' => $filtered_last_name,
             'full_name' => $filtered_full_name,
             'username' => $filtered_username,
             'email' => $filtered_email,
             'password' => $filtered_password,
             'group_id' => '0',
             'registration_status' => '1'
         ]);
            
            return redirect('admin/users')->with(['success' => 'The User Was Added Successfully']);
        }
    }
    
    public function delete_user($user_id)
    { 
            $user = User::find($user_id);
            $carts = $user -> carts;
        
            if(!empty($user))
            {
                $user->delete();
                
                foreach($carts as $cart)
                {
                    $cart->delete();
                }
                
                $users = DB::table('users')->where('group_id', '0')->get();
                return view('admin.users', ['users' => $users, 'success' => 'The User was Successfully Deleted']);
            }
            else
            {
                $users = DB::table('users')->where('group_id', '0')->get();
                return view('admin.users', ['users' => $users]);
            }  
    }
    
    public function activate_user($user_id)
    {
        $user = User::find($user_id);
        $user->update(['registration_status' => '1']);
        $users = DB::table('users')->where('group_id', '0')->get();
        return view('admin.users', ['users' => $users, 'success' => 'The User was Successfully Activated']);
    }
    
    public function edit_user($user_id)
    {
        $user = User::find($user_id);
        return view('admin.user_edit', ['user' => $user]);
    }
    
    public function update_user(AdminUserRequest $request, $user_id)
    {
        /* Starting The Validation Phase */
        
        $user = User::find($user_id);
        $first_name = $request->input('firstname');
        $last_name = $request->input('lastname');
        $full_name = $request->input('fullname');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        
        /* Starting The Filtration Phase */
        
        $filtered_first_name = filter_var($first_name, FILTER_SANITIZE_STRING);
        $filtered_last_name = filter_var($last_name, FILTER_SANITIZE_STRING);
        $filtered_full_name = filter_var($full_name, FILTER_SANITIZE_STRING);
        $filtered_username = filter_var($username, FILTER_SANITIZE_STRING);
        $filtered_email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $filtered_password = filter_var($password, FILTER_SANITIZE_STRING);
        
        // Checking If The Added Usernames Or E-Mails Are Already Existed Or Not
        
        $users_unique = DB::table('users')->where('username', $filtered_username)
                                            ->where('email', $filtered_email)
                                            ->where('id', '!=', $user_id)->get();
        if(count($users_unique) == 1)
        {
            return redirect()->back()->with(['error' => "The Username Or E-mail Fields Must Be Unique"]);
        }
        
        else
            
        {
          $user -> update([
             'first_name' => $filtered_first_name,
             'last_name' => $filtered_last_name,
             'full_name' => $filtered_full_name,
             'username' => $filtered_username,
             'email' => $filtered_email,
             'password' => $filtered_password,
             'group_id' => '0',
             'registration_status' => '1'
         ]);
            
        $users = DB::table('users')->where('group_id', '0')->get();
        return view('admin.users', ['users' => $users, 'success' => 'The User was Successfully Updated']);  
            
        }
    }
    
    public function deactivate_user($user_id)
    {
        $user = User::find($user_id);
        $user->update(['registration_status' => '0']);
        $users = DB::table('users')->where('group_id', '0')->get();
        return view('admin.users', ['users' => $users, 'success' => 'The User was Successfully Deactivated']);
    }
    
    public function login(Request $request)
    {
        
        $username = $request->input('username');
        $password = $request->input('password');
        
        
        $users = User::where(['username' => $username, 'password' => $password, 'registration_status' => '1', 'group_id' => '1'])->get();
        $count = count($users);
        
        if(isset($users) && $count > 0)
        {
            foreach($users as $user)
            {
                $userid = $user->id;
            }
             
            session(['Admin' => $username, 'Admin_ID' => $userid]);
            
            // $request->session()->put(['Admin' => $username, 'Admin_ID' => $userid]);

            return redirect()->route('admin.dashboard');
            
        }
        else
        { 
            return redirect()->back()
                    ->with(['error' => 'You Have to Be an Admin Only to Make a Login']);
        }
        
    }
    
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('admin/login');
    }
}
