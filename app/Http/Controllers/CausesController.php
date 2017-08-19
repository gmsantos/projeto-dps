<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CauseRequest;
use App\Http\Controllers\Controller;
use App\Cause;

class CausesController extends Controller
{
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
        $causes = Cause::paginate(10);
        
        return view('causes.index', compact('causes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('causes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CauseRequest $request)
    {
        if ($request->user()->cannot('create', new Cause))
        {
            return abort('Sem permissão');
        }
        
        Cause::create($request->all() + ['user_id' => $request->user()->id]);
        
        return redirect()->route('cause.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cause $cause)
    {
        return view('causes.show')->with('cause', $cause);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cause $cause)
    {
        return view('causes.edit')->with('cause', $cause);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CauseRequest $request, Cause $cause)
    {
        if (\Gate::denies('update', $cause)) {
            return abort('U should not pass');
        }
        
        $cause->update($request->all());
        $cause->save();        
        
        return redirect()->route('cause.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cause $cause)
    {
        $cause->delete();
        
        return redirect()->route('cause.index');
    }
}
