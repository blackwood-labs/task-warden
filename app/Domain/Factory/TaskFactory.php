<?php

declare(strict_types=1);

namespace App\Domain\Factory;

use App\Domain\Entity\Task\Attributes;
use App\Domain\Entity\Task\State;
use App\Domain\Entity\Task\Task;
use App\Domain\Support\UUID;

final class TaskFactory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'text' => fake()->text(32),
            'state' => State::OPEN,
        ];
    }

    /**
     * @param  array<string, mixed>  $attributes
     */
    public function make(?UUID $id = null, array $attributes = []): Task
    {
        $mergedAttributes = array_merge($this->definition(), $attributes);

        return new Task($id ?? UUID::generate(), new Attributes(...$mergedAttributes));
    }
}
