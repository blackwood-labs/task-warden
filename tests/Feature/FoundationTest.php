<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Testing\PendingCommand;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversNothing]
final class FoundationTest extends TestCase
{
    /**
     * Make sure a dead simple route returns what it is supposed to.
     *
     * Also ensures that the core application is working!
     */
    #[Test]
    public function web_route_loads_correctly(): void
    {
        $response = $this->get(route('test'));

        $response->assertStatus(200);

        $this->assertSame('Hello World!', $response->getContent());
    }

    /**
     * Make sure a dead simple command returns what it is supposed to.
     *
     * Also ensures that the core application is working!
     */
    #[Test]
    public function command_executes_correctly(): void
    {
        $response = $this->artisan('test');
        $this->assertInstanceOf(PendingCommand::class, $response);

        $response->assertExitCode(0);
        $response->expectsOutput('Hello World!');
    }
}
