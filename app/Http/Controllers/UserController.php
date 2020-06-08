<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function register(UserRequest $request)
    {
        // Starting The Validation Phase
        
        $first_name = $request->input('fisrtname');
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
            return view('register', ['error' => 'The Passwords Must Be Matching']);
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
             'registration_status' => '0'
         ]);
        
        return redirect('/login')->with(['success' => 'You are Successfully Logged in']);
        }
 
    }
    
    public function login(Request $request)
    {
        
        $username = $request->input('username');
        $password = $request->input('password');
        
        
        $users = User::where(['username' => $username, 'password' => $password, 'registration_status' => '1', 'group_id' => '0'])->get();
        $count = count($users);
        
        if(isset($users) && $count > 0)
        {
            foreach($users as $user)
            {
                $userid = $user->id;
            }
             
            session(['Username' => $username, 'ID' => $userid]);
            
            // $request->session()->put(['Username' => $username, 'ID' => $userid]);

            return redirect()->route('index');
            
        }
        else
        {
            return redirect()->back()
                    ->with(['error' => 'You Have To Register & Be Activated By The Admin']);
        }
        
    }
    
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('homepage');
    }
    
    public function show_profile()
    {
        $user_id = session('ID');
        $user = User::find($user_id);
        return view('profile', ['user' => $user]);
    }
    
    public function edit_user()
    {
        $user_id = session('ID');
        $user = User::find($user_id);
        return view('user_edit', ['user' => $user]);
    }
    
    public function update_user(UserRequest $request)
    {
        /* Starting The Validation Phase */
        
        $user_id = session('ID');
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
            
        return view('profile', ['user' => $user, 'success' => 'Your Profile was Successfully Updated']);
            
        }
    }
}