<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class TasksApiTest
 */
class TasksApiTest extends TestCase
{
    protected $uri = '/api/task';

    use DatabaseMigrations;

    public function testShowAllTasks()
    {
        $this->json('GET', $this->uri)
//             ->dump();
              ->seeJson();
    }


    // Group failing
    public function testShowOneTask()
    {
        $task = factory(App\Task::class)->create();
        $id = 1;
        $this->json('GET', $this->uri . '/' . $task->id)
//            ->dump();
//            ->seeJson();
            ->seeJsonStructure(
                ["id", "name", "done", "priority"]
            )
            ->seeJsonContains([
                "name" => $task->name,
                "done" => $task->done,
                "priority" => $task->priority
            ]);
    }


}
