<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_can_be_accessed(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_task_can_be_created(): void
    {
        $response = $this->post('/tasks', [
            'title' => 'Test Task',
            'description' => 'Testing',
            'due_date' => now()->toDateString(),
        ]);

        $this->assertDatabaseHas('tasks', [
            'title' => 'Test Task'
        ]);
    }

    public function test_dashboard_can_be_accessed(): void
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(200);
    }

    public function test_report_can_be_accessed(): void
    {
        $response = $this->get('/report');

        $response->assertStatus(200);
    }
}