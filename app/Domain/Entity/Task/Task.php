<?php

declare(strict_types=1);

namespace App\Domain\Entity\Task;

use App\Domain\Entity\StateTransitionException;
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

    /**
     * Close the task.
     *
     * @throws \App\Domain\Entity\StateTransitionException If the task is already closed.
     */
    public function close(): void
    {
        if ($this->attributes->state === State::CLOSED) {
            throw new StateTransitionException('Task is already closed.');
        }
        $this->attributes->state = State::CLOSED;
    }

    /**
     * Re-open the task.
     *
     * @throws \App\Domain\Entity\StateTransitionException If the task is already open.
     */
    public function reopen(): void
    {
        if ($this->attributes->state === State::OPEN) {
            throw new StateTransitionException('Task is already open.');
        }
        $this->attributes->state = State::OPEN;
    }
}
