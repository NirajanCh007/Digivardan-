<?php

namespace App\Http;

use App\Http\Middleware\checkroles;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use App\Http\Middleware\RoleMiddleware;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $routemiddleware = [


        // Add your custom RoleMiddleware here
        'role' => checkroles::class,
    ];
}
