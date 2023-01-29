<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    const key = "16|bt3tQHcbMGlp9tdjbS0AklLqYYLMCtAMPgwAhua8";
    
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_exercise_on_id()
    {
        $response = $this->get('api/exercise/1');

        $response->assertStatus(200);

        $response->assertJsonFragment(['id'=>1, 'name'=>'Squat']);
    }

    public function test_insert_exercise()
    {
        $response = $this->withHeaders(['Authorization' => "Bearer 7|15IUU8OM8iHQ91DifEZGTpUNS1Dh2VeOnPojveWY"])
            ->json('POST', 'api/exercise', [
                'name' => 'some name',
                'description' => 'some description'
            ]);
        $this->assertDatabaseHas('exercises', 
            ['name'=>'some name','description'=>'some description']);
        
        $response->assertStatus(201);
        
        $response->assertJson(['name'=>'some name', 'description'=>'some description']);
    }

    public function test_delete_exercise()
    {
        $response = $this->withHeaders(['Authorization' => "Bearer 7|15IUU8OM8iHQ91DifEZGTpUNS1Dh2VeOnPojveWY"])
        ->json('DELETE', 'api/exercise/17');
        $response->assertStatus(202);
    }
}
