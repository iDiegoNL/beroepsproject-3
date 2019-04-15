<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Redirect;

class ProfileController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->input('passwordChange') == 'true') {
            $request->validate([
                'oldPassword' => 'required',
                'password' => 'required|min:6|confirmed',
            ]);

            $current_password = Auth::user()->password;
            if(Hash::check($request->oldPassword, $current_password)) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
            } else {
                return Redirect::back()->withErrors(['Het huidige wachtwoord dat u ingevoerd heeft is incorrect.']);
            }
        } else {
            $request->validate([
                'voornaam' => 'required',
                'achternaam' => 'required',
                'email' => 'required',
            ]);

            $user = User::find(Auth::id());
            $user->voornaam = $request->voornaam;
            $user->achternaam = $request->achternaam;
            $user->email = $request->email;
            $user->save();

            return redirect(route('klantenprofiel.index'));
        }
    }
}
