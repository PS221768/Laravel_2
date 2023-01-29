<?php

namespace App\Http\APIControllers;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;


class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        //
        try
        {
            $user = auth()->user();
    
            $achievements = Achievement::all()->where('user_id', $user->id);
            return response()->json($achievements, 200);
        }
        catch(Exeption $e)
        {
            $obj->error = $e;
            return respose()->json(json_encode($obj));
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try
        {
            $user = auth()->user();
            $achievement = new Achievement();
            $achievement->name = $request->name;
            $achievement->amount = $request->amount;
            $achievement->user_id = $user->id;
            $achievement->exercise_id = $request->exercise_id;
            $achievement->startime = $request->startime;
            $achievement->endtime = $request->endtime;
            return response()->json($achievement->save(), 201);
        }
        catch(Exeption $e)
        {
            $obj->error = $e;
            return respose()->json(json_encode($obj));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Achievement $achievement)
    {
        return $achievement; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        try {
            $achievement->update($request->all());
            
            $user = auth()->user();
            Log::channel('update')->info('User (id): ' . $user->id . '. Updated (achievement: ' . $achievement->id . '.');
            
            return response()->json($achievement, 202);
        } catch (\Throwable $error) {
            return response()->json($error, 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Achievement $achievement)
    {
        //
        if ($achievement->delete())
        {
            $user = auth()->user();
            Log::channel('delete')->info('User (id): ' . $user->id . '. Deleted (achievement: ' . $achievement->id . '.');
            return response()->json("Succesvol verwijderd", 202);
        }
        return response()->json("Probleem met het verwijderen van de achievement", 400);
    }
}
