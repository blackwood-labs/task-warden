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
     * Short description of the task
     */
    public string $text {
        get {
            return $this->attributes->text;
        }
    }

    /**
     * Current state of the task
     */
    public State $state {
        get {
            return $this->attributes->state;
        }
    }

    public function __construct(
        public readonly UUID $id,
        private Attributes $attributes,
    ) {}
}
