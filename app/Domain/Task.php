<?php declare(strict_types=1);

namespace App\Domain;

final class Task
{
    public int $id {
        get {
            return $this->id;
        }
    }
    public string $title {
        get {
            return $this->title;
        }
    }
    public TaskState $state {
        get {
            return $this->state;
        }
    }

    public function __construct(int $id, string $title, TaskState $state = TaskState::OPEN)
    {
        $this->id = $id;
        $this->title = $title;
        $this->state = $state;
    }

}
