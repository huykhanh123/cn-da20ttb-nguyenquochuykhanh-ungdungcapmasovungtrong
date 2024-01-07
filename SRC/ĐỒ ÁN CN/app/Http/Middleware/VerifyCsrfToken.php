<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Các URI cần được loại trừ khỏi quá trình xác minh CSRF.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
