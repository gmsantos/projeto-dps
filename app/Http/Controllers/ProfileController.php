<?php

namespace App\Http\Controllers;

use App\User;
use App\Institution;
use App\Volunteer;
use App\Http\Requests\CreateProfileRequest;
use Illuminate\Http\Request;

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
        $this->middleware('hasRole')->except(['newProfile', 'createProfile']);
        $this->middleware('chooseRole')->only(['newProfile', 'createProfile']);
    }

    public function newProfile()
    {
        return view('profiles.new');
    }

    public function createProfile(CreateProfileRequest $request)
    {
        $role = $request->role;
        $user = auth()->user();

        $user->role = $role;
        $user->$role()->create($request->toArray());
        $user->save();

        return redirect()->route('profile.'.$role, [$user->$role]);
    }

    public function institutionProfile(Institution $institution)
    {
        return view('profiles.institution')->with(compact('institution'));
    }

    public function volunteerProfile(Volunteer $volunteer)
    {
        return view('profiles.volunteer')->with(compact('volunteer'));
    }
}
