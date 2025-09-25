<?php

declare(strict_types=1);

namespace App\Domain\Entity\Task;

final class Attributes
{
    public function __construct(
        public string $text,
        public State $state,
    ) {}
}
