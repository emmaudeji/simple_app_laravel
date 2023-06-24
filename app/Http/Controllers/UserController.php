<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function login(Request $request){
        $incomingFields = $request->validate([
            'lname' => 'required',
            'lpassword' => 'required'
        ]);  
        
        if(auth()->attempt(['name' => $incomingFields['lname'], 'password' =>  $incomingFields['lpassword']])){
            $request->session()->regenerate();
        }
        return redirect ('/');
    }

    public function logout(){ 
        auth()->logout();
        return redirect ('/');
    }

    public function register(Request $request){
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'max:20'],
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/');
    }
}

// extractrequest body
// hash passowrdd
// create user with default User model. remeber to import user.
// authenticate user login
// redirect to ... /