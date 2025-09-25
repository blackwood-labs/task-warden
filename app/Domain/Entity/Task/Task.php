<?php

declare(strict_types=1);

namespace App\Domain\Entity\Task;

use App\Domain\Support\UUID;

/**
 * A Task is a unit of work that should be completed.
 */
final class Task
{
    /**
     * Unique identifier
     */
    public readonly UUID $id;

    private string $textField;

    /**
     * Short description of the task
     */
    public string $text {
        get {
            return $this->textField;
        }
    }

    private State $stateField;

    /**
     * Current state of the task
     */
    public State $state {
        get {
            return $this->stateField;
        }
    }

    public function __construct(UUID $id, string $text)
    {
        $this->id = $id;
        $this->textField = $text;
        $this->stateField = State::OPEN;
    }
}
