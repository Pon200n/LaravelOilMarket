<?php
use Illuminate\Routing\Router;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        function (Router $router){
            $router->middleware('web')
                ->group(base_path('routes/web.php'));
            $router->middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));
            $router->middleware('api')
                ->prefix('api')
                ->group(base_path('routes/guest.php'));
        },
        // web: __DIR__.'/../routes/web.php',
        // api: __DIR__.'/../routes/api.php',
        // // !
        // api: __DIR__.'/../routes/guest.php',
        // // !
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->api(prepend: [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        ]);

        $middleware->alias([
            'verified' => \App\Http\Middleware\EnsureEmailIsVerified::class,
            'admin_panel' => \App\Http\Middleware\AdminPanelMiddleware::class,
        ]);

        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
