<?php

namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
  
class ChangePasswordController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('changePassword');
    } 
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new \App\Rules\MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        \App\Models\User::find(auth()->user()->id)->update(['password'=> \Illuminate\Support\Facades\Hash::make($request->new_password)]);
   
        return view('changePassword', [
            'success' => 'Password change successfully.',
        ]);
    }
}