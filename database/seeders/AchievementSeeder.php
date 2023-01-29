<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as carbon;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('achievements')->truncate();
        DB::table('achievements')->insert([
            'name' => "Achievement1",
            'amount' => 3,
            'user_id' => 1,
            'exercise_id' => 1,
            'startime' => carbon::now(),
            'endtime' => carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('achievements')->insert([
            'name' => "Achievement2",
            'amount' => 3,
            'user_id' => 1,
            'exercise_id' => 5,
            'startime' => carbon::now(),
            'endtime' => carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('achievements')->insert([
            'name' => "Achievement2",
            'amount' => 3,
            'user_id' => 2,
            'exercise_id' => 6,
            'startime' => carbon::now(),
            'endtime' => carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}