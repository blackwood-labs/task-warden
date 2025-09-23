<?php declare(strict_types=1);

namespace App\Services;

use App\Domain\Task;
use App\Domain\TaskState;

final class TaskService
{
    public function __construct()
    {
        //
    }

    public function createTask(string $title, TaskState $state = TaskState::OPEN): Task
    {
        return new Task(0, $title, $state);
    }
}
