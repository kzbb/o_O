<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\UserProfile;

class SettingController extends Controller
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
     * View Settings
     */
    public function viewSettings(Request $request)
    {
        $user_profile = $request->user()->userProfile()->first();

        return view('settings', compact('user_profile'));
    }

    /**
     * save Settings
     */
    public function saveSettings(Request $request)
    {
        $validatedData = $request->validate([
            'name'  => 'required',
            'email' => 'required',
        ]);

        $user = $request->user();

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        $user->userProfile()->update([
            'url'      => $request->url,
            'timezone' => $request->timezone
        ]);

        return redirect('home');
    }

    /**
     * Delete User
     */
    public function deleteUser(Request $request)
    {
        $user = $request->user();

        $user->posts()->delete();
        $user->userProfile()->delete();
        $user->delete();

        return redirect('/');
    }
}
