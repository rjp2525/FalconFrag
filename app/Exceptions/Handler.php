<?php

namespace Falcon\Exceptions;

use Bican\Roles\Exceptions\LevelDeniedException;
use Bican\Roles\Exceptions\PermissionDeniedException;
use Bican\Roles\Exceptions\RoleDeniedException;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($e instanceof RoleDeniedException
            || $e instanceof PermissionDeniedException
            || $e instanceof LevelDeniedException) {
            //return redirect()->back();
            abort(404);
        }

        return parent::render($request, $e);
    }
}
