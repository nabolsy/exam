<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */

    protected function unauthenticated($request, AuthenticationException $exception)
    {

        if($request->expectsJson()){
            return response()->json(['message' => $exception->getMessage()], 401);
        }
        
        $guard = array_get($exception->guards(), 0);

        switch ($guard){
            case 'admin':
                $login = 'admin.login';
                break;
            default:
                $login = 'login';
                break;
        }

        return redirect()->guest(route($login));
    }


    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if($exception instanceOf TokenInvalidException)
        {
            return response()->json(['error'=>'Token is Invalid'],400);
        }

        elseif($exception instanceOf TokenExpiredException)
        {
            return response()->json(['error'=>'Token is Expired'],400);
        }
        elseif($exception instanceOf JWTException)
        {
            return response()->json(['error'=>'there is a problem with your token'],400);
        }
        return parent::render($request, $exception);
    }
}
