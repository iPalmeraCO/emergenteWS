<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
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
        parent::report($e);
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
        if ($e instanceof ModelNotFoundException) {
            $e = new NotFoundHttpException($e->getMessage(), $e);
            return \Response::json(['error' => 'Model not found'], 404);
        }


        if(strpos($e->getMessage(),'SQLSTATE[23000') == 0)
        {

          $e = new NotFoundHttpException($e->getMessage(), $e);
            return \Response::json(['error' => 'Email  duplicado'], 404);
        }
         // dd($e);
        // if($e instanceof Exception)
        // {

        //     //dd($e->getMessage());
        //     //dd(strpos($e->getMessage(),'SQL'));
        //     if(strpos($e->getMessage(),'SQLSTATE[23000') == 0){
        //     dd($e);
        //     $e = new NotFoundHttpException($e->getMessage(), $e);
        //     return \Response::json(['error' => 'Email Duplicado o login duplicado'], 404);
        //     }

        // }

        return parent::render($request, $e);
    }
}
