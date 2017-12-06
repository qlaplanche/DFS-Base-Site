<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Get information and all posts about a user
     *
     * @return \Illuminate\Http\Response
     */
    public function getUser($id)
    {
        return view('admin.profile', ['user' => User::findOrFail($id)]);      
    }

    /**
     * Get information about a user
     *
     * @return \Illuminate\Http\Response
     */
    public function getEditUser($id)
    {
        return view('admin.editprofile', ['user' => User::findOrFail($id)]);
    }

    /**
     * Edit a user
     *
     * @return \Illuminate\Http\Response
     */
    public function editUser(Request $request, $id)
    {
         $this->validate($request, [
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'email' => 'required|max:300',
        ]);

        $user = User::findOrFail($id);
        if(!$user) return redirect()->route('home')->with('message', 'This user doesn\'t exist');
        if (Auth::id() != $user->id || Auth::user()->role != 'admin') {
            return redirect()->route('home')->with('message', 'It is not your profile!');
        }

        $user->firstname = $request->input("firstname");
        $user->lastname = $request->input("lastname");
        $user->email = $request->input("email");
        $user->update();
        $message = 'User updated!';

        return back()->with('message', $message);
    }

    /**
     * Delete a user
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if(!$user) return redirect()->route('home')->with('message', 'This user doesn\'t exist');
        if (Auth::id() != $user->id && Auth::user()->role != 'admin') {
            return redirect()->route('home')->with('message', 'It is not your profile!');
        }

        $user->delete();
        return redirect()->route('users')->with('message', "User deleted!");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function listUser()
    {

        return view('admin.users', ['users' => User::all()->sortBy('id')->take(10)]);
    }
}

