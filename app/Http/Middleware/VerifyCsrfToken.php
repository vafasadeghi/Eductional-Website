<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'Admin/panel/upload-image',
        '5437205698:AAGQWULHXCdy0ZsQ1BueXcDMLN4umgHRxto/webhook'
    ];
}
