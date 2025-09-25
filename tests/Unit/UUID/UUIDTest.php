<?php

declare(strict_types=1);

namespace Tests\Unit\UUID;

use App\Domain\Support\UUID;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(UUID::class)]
final class UUIDTest extends TestCase
{
    #[Test]
    public function generated_uuid_is_valid_uuid_v4(): void
    {
        $uuidv4Pattern = '/^[0-9A-F]{8}-[0-9A-F]{4}-[4][0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i';

        $this->assertTrue((bool) preg_match($uuidv4Pattern, UUID::generate()->toString()));
    }

    #[Test]
    public function generated_uuids_are_different(): void
    {
        $set = [];
        $numGenerations = 10;
        for ($i = 0; $i < $numGenerations; $i++) {
            $uuid = UUID::generate()->toString();
            $this->assertFalse(isset($set[$uuid]));
            $set[$uuid] = true;
        }
    }

    #[Test]
    public function rehydration_from_string(): void
    {
        $origin = UUID::generate();
        $rehydrated = UUID::fromString($origin->toString());

        $this->assertSame($origin->toString(), $rehydrated->toString());
    }
}
