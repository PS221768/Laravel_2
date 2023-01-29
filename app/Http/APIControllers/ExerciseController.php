<?php

namespace App\Http\APIControllers;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exercise;
use Laravel\Sanctum\PersonalAccessToken;

use Illuminate\Support\Facades\Route;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            if (!! $request->name)
            {
                $name = $request->name;
                return Exercise::All()->where('name', $name);
            }
            else{
                return Exercise::All();
            }
        } catch (\Throwable $error) {
            return response()->json($error, 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);
        Log::channel('create')->info($request->name . ". Has been created.\n");
        return Exercise::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Exercise $exercise)
    {
        //
        return $exercise;
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exercise $exercise)
    {
        //$exercise->update($request->all()); return $exercise;
        $exercise->update($request->all());
        return response()->json($exercise, 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercise $exercise)
    {
        // $exercise->delete();
        return response()->json($exercise->delete() ? "Succesvol verwijderd":"Probleem met het verwijderen van de exercise", 202);
    }
}
