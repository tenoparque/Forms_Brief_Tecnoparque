<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * We manipulate the render method to handle HTTP request exceptions in a customized way.
     */
    public function render($request, Throwable $exception): Response
    {
        // If the exception occurs due to authentication problems
        if ($exception instanceof AuthorizationException) {
            return Response::view('errors.403', [], 403); // Through a response we return the error view and also the HTTP status code.
        }

        return parent::render($request, $exception);
    }
}
