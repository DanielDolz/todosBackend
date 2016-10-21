<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TasksApiTest extends TestCase
{

    public function testShowAllTasks()
    {
        $this->json('GET', '/api/task')
//             ->dump();
                ->seeJson();
    }
}
