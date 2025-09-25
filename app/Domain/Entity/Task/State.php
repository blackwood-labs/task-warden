<?php

declare(strict_types=1);

namespace App\Domain\Entity\Task;

enum State
{
    case OPEN;
    case CLOSED;
}
