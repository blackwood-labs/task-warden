<?php

declare(strict_types=1);

namespace Tests\Unit\Task;

use App\Domain\Entity\Task\State;
use App\Domain\Entity\Task\Task;
use App\Domain\Support\UUID;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(Task::class)]
final class TaskTest extends TestCase
{
    #[Test]
    public function tasks_are_created_open(): void
    {
        $task = new Task(UUID::generate(), 'Basic Task');

        $this->assertSame(State::OPEN, $task->state);
    }

    #[Test]
    public function attributes_match_constructed_args(): void
    {
        $uuid = UUID::generate();
        $text = 'Basic Task';

        $task = new Task($uuid, $text);

        $this->assertSame($uuid->toString(), $task->id->toString());
        $this->assertSame($text, $task->text);
    }

    #[Test]
    public function attributes_cannot_be_directly_modified(): void
    {
        $uuid = UUID::generate();
        $text = 'Basic Task';

        $task = new Task($uuid, $text);

        $this->expectException(\Error::class);
        $this->expectExceptionMessageMatches('/Property ([^ ]+) is read-only/');
        $task->text = 'Updated Task'; // @phpstan-ignore-line
    }
}
