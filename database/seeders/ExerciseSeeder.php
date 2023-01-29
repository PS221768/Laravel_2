<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as carbon;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('exercises')->truncate();
        DB::table('exercises')->insert([
            'name' => "Squat",
            'description' => "
            Stap 1
            Eerst, sta met je benen wijder dan je heupen.
            
            Stap 2
            Daarna, wijs met je tenen naar voren.
            
            Stap 3
            Daarna, houd je armer voor je uit terwijl je langzaam je lichaam laat zakken tot je knie een hoek van 90 graden is.
            
            Stap 4
            Als laatst, zorg dat je hielen en tenen de grond blijven aanraken.",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('exercises')->insert([
            'name' => "Push-up",
            'description' => "
            Stap 1
            Eerst, sta met je benen wijder dan je heupen.
            
            Stap 2
            Daarna, wijs met je tenen naar voren.
            
            Stap 3
            Daarna, houd je armer voor je uit terwijl je langzaam je lichaam laat zakken tot je knie een hoek van 90 graden is.
            
            Stap 4
            Als laatst, zorg dat je hielen en tenen de grond blijven aanraken.",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('exercises')->insert([
            'name' => "Dip",
            'description' => "
            Stap 1
            Eerst, sta met je benen wijder dan je heupen.
            
            Stap 2
            Daarna, wijs met je tenen naar voren.
            
            Stap 3
            Daarna, houd je armer voor je uit terwijl je langzaam je lichaam laat zakken tot je knie een hoek van 90 graden is.
            
            Stap 4
            Als laatst, zorg dat je hielen en tenen de grond blijven aanraken.",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('exercises')->insert([
            'name' => "Plank",
            'description' => "
            Stap 1
            Eerst, sta met je benen wijder dan je heupen.
            
            Stap 2
            Daarna, wijs met je tenen naar voren.
            
            Stap 3
            Daarna, houd je armer voor je uit terwijl je langzaam je lichaam laat zakken tot je knie een hoek van 90 graden is.
            
            Stap 4
            Als laatst, zorg dat je hielen en tenen de grond blijven aanraken.",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('exercises')->insert([
            'name' => "Paardentrap",
            'description' => "
            Stap 1
            Eerst, sta met je benen wijder dan je heupen.
            
            Stap 2
            Daarna, wijs met je tenen naar voren.
            
            Stap 3
            Daarna, houd je armer voor je uit terwijl je langzaam je lichaam laat zakken tot je knie een hoek van 90 graden is.
            
            Stap 4
            Als laatst, zorg dat je hielen en tenen de grond blijven aanraken.",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('exercises')->insert([
            'name' => "Mountain Climber",
            'description' => "Stap 1
            Eerst, sta met je benen wijder dan je heupen.
            \n
            Stap 2
            Daarna, wijs met je tenen naar voren.
            \n
            Stap 3
            Daarna, houd je armer voor je uit terwijl je langzaam je lichaam laat zakken tot je knie een hoek van 90 graden is.
            \n
            Stap 4
            Als laatst, zorg dat je hielen en tenen de grond blijven aanraken.",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('exercises')->insert([
            'name' => "Burpee",
            'description' => "
            Stap 1
            Eerst, sta met je benen wijder dan je heupen.
            
            Stap 2
            Daarna, wijs met je tenen naar voren.
            
            Stap 3
            Daarna, houd je armer voor je uit terwijl je langzaam je lichaam laat zakken tot je knie een hoek van 90 graden is.
            
            Stap 4
            Als laatst, zorg dat je hielen en tenen de grond blijven aanraken.",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('exercises')->insert([
            'name' => "Lunge",
            'description' => "
            Stap 1
            Eerst, sta met je benen wijder dan je heupen.
            
            Stap 2
            Daarna, wijs met je tenen naar voren.
            
            Stap 3
            Daarna, houd je armer voor je uit terwijl je langzaam je lichaam laat zakken tot je knie een hoek van 90 graden is.
            
            Stap 4
            Als laatst, zorg dat je hielen en tenen de grond blijven aanraken.",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('exercises')->insert([
            'name' => "Wall sit",
            'description' => "
            Stap 1
            Eerst, sta met je benen wijder dan je heupen.
            
            Stap 2
            Daarna, wijs met je tenen naar voren.
            
            Stap 3
            Daarna, houd je armer voor je uit terwijl je langzaam je lichaam laat zakken tot je knie een hoek van 90 graden is.
            
            Stap 4
            Als laatst, zorg dat je hielen en tenen de grond blijven aanraken.",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('exercises')->insert([
            'name' => "Crunch",
            'description' => "
            Stap 1
            Eerst, sta met je benen wijder dan je heupen.
            
            Stap 2
            Daarna, wijs met je tenen naar voren.
            
            Stap 3
            Daarna, houd je armer voor je uit terwijl je langzaam je lichaam laat zakken tot je knie een hoek van 90 graden is.
            
            Stap 4
            Als laatst, zorg dat je hielen en tenen de grond blijven aanraken.",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
