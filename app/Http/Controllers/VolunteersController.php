<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VolunteerRequest;
use App\Institution;
use App\Volunteer;

class VolunteersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $volunteers = Volunteer::paginate(10);
        
        return view('volunteers.index', compact('volunteers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('volunteers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(VolunteerRequest $request)
    {
        $volunteer = Volunteer::create($request->all());
        
        $volunteer = $this->setVolunteerRelations($volunteer, $request);        
        $volunteer->save();
        
        return redirect()->route('volunteer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Volunteer $volunteer)
    {
        return view('volunteers.show', compact('volunteer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Volunteer $volunteer)
    {
        return view('volunteers.edit', compact('volunteer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(VolunteerRequest $request, Volunteer $volunteer)
    {
        $volunteer->update($request->all());
        
        $volunteer = $this->setVolunteerRelations($volunteer, $request);
        $volunteer->save();
        
        return redirect()->route('volunteer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Volunteer $volunteer)
    {
        $volunteer->delete();
        
        return redirect()->route('volunteer.index');
    }

    private function setVolunteerRelations(Volunteer $volunteer, Request $request)
    {
        $institution = Institution::findOrFail($request->institution_id);
        $volunteer->institution()->associate($institution);
        $volunteer->causes()->sync($request->causes_list);
        
        return $volunteer;
    }
}
