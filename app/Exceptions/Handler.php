<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Support\Facades\Mail;
use App\Mail\ErrorNotification;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        // Check if the app is in production
        if (app()->environment('production')) {

            // Send an email with the exception details
            //Mail::to(config('constant.error_report_emails'))->send(new ErrorNotification($exception));
        }

        parent::report($exception);
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException) {
            // return response()->view('errors.404', [], 404);
            // return redirect('/');
            return redirect('/', 301); // Use 301 redirect instead of default behavior
        }
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException && $exception->getStatusCode() == 500) {
            return response()->view('errors.500', [], 500);
        }
        return parent::render($request, $exception);
    }
}
