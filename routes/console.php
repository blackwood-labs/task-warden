<?php

use Illuminate\Support\Facades\Artisan;

// Simple command for testing bare minimum functionality
Artisan::command('test', function () {
    $this->line('Hello World!');
})->purpose('Test Command');
