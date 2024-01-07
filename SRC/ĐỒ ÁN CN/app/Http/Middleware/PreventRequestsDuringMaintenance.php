<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

class PreventRequestsDuringMaintenance extends Middleware
{
    /**
     * Các URI có thể truy cập được khi chế độ bảo trì được bật.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
