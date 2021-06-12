<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;

class TodoTest extends TestCase
{
    use RefreshDatabase;
    public function test_example()
    {
        $this->assertTrue(true);

        $arr = [];
        $this->assertEmpty($arr);

        $msg = "Hello";
        $this->assertEquals('Hello', $msg);

        $n = random_int(0, 99);
        $this->assertLessThan(100, $n);

        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/no_route');
        $response->assertStatus(404);

        Task::factory()->create([
            'content' => 'aaaaa',
        ]);
        $this->assertDatabaseHas('tasks', [
            'content' => 'aaaaa',
        ]);
    }
}
