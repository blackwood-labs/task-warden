<?php

declare(strict_types=1);

namespace App\Domain\Support;

use Ramsey\Uuid\UuidFactory;
use Ramsey\Uuid\UuidInterface;

final class UUID extends \Ramsey\Uuid\Uuid
{
    private UuidInterface $concrete;

    public static function generate(): UUID
    {
        $concrete = new UuidFactory()->uuid4();

        return new self($concrete);
    }

    /**
     * @phpstan-impure
     */
    public static function fromString(string $string): UUID
    {
        $concrete = new UuidFactory()->fromString($string);

        return new self($concrete);
    }

    public function toString(): string
    {
        return (string) $this;
    }

    public function __toString(): string
    {
        return (string) $this->concrete;
    }

    private function __construct(UuidInterface $concrete)
    {
        $this->concrete = $concrete;
    }
}
