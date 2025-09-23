<?php declare(strict_types=1);

namespace Tests\Unit;

use App\Domain\TaskState;
use App\Services\TaskService;
use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(TaskService::class)]
final class TaskServiceTest extends TestCase
{
    #[Test]
    public function create_simple_open_task(): void
    {
        $state = TaskState::OPEN;

        $service = new TaskService();
        $task = $service->createTask('First Task', $state);

        $this->assertSame($state, $task->state);
    }

    #[Test]
    public function create_simple_closed_task(): void
    {
        $state = TaskState::CLOSED;

        $service = new TaskService();
        $task = $service->createTask('First Task', $state);

        $this->assertSame($state, $task->state);
    }

    #[Test]
    public function task_title_matches_input(): void
    {
        $title = Str::random(16);

        $service = new TaskService();
        $task = $service->createTask($title, TaskState::OPEN);

        $this->assertSame($title, $task->title);
    }

    #[Test]
    public function new_tasks_default_to_open(): void
    {
        $service = new TaskService();
        $task = $service->createTask('First Task');

        $this->assertSame(TaskState::OPEN, $task->state);
    }
}
