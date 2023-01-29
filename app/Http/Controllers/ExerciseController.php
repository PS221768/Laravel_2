<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercise;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('exercise.index', ['items' => Exercise::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exercise.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $validated = $request->validate([
                'name' => 'required|max:255',
                'description' => 'required|max:1000',
            ]);

            $exercise = Exercise::create([
                'name' => $validated['name'],
                'description' => $validated['description'],
            ]);

            return view('exercise.show', ['exercise' => $exercise]);
        }
        catch(\Exception $e)
        {
            return "error: " . $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('exercise.show', ['exercise' => Exercise::Find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('exercise.edit', ['exercise' => Exercise::Find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $exercise = Exercise::findOrFail($id);
            $validated = $request->validate([
                'name' => 'required|max:255',
                'description' => 'required|max:1000',
            ]);

            $exercise->name = $validated['name'];
            $exercise->description = $validated['description'];
            $exercise->save();
            return view('exercise.show', ['exercise' => $exercise]);
        }
        catch(\Exception $e)
        {
            return "error: " . $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $exercise = Exercise::findOrFail($id);
            $exercise->delete();
            return redirect('/exercise');
        }
        catch(\Exception $e)
        {
            return "error: " . $e->getMessage();
        }
    }
}
