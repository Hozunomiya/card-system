<?php
namespace App\Exceptions; use App\Library\Response; use Exception; use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler; class Handler extends ExceptionHandler { protected $dontReport = array(); protected $dontFlash = array('password', 'password_confirmation'); public function report(Exception $spb36450) { parent::report($spb36450); } public function render($sp0fc69c, Exception $sp2a4a9a) { if ($sp0fc69c->expectsJson()) { if ($sp2a4a9a instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) { return Response::json(array('message' => '记录未找到'), 404); } elseif ($sp2a4a9a instanceof \Illuminate\Auth\AuthenticationException) { return Response::json(array('message' => '请登录'), 401); } elseif ($sp2a4a9a instanceof \Illuminate\Auth\Access\AuthorizationException) { return Response::json(array('message' => '未授权的操作'), 403); } elseif ($sp2a4a9a instanceof \Illuminate\Validation\ValidationException) { return parent::render($sp0fc69c, $sp2a4a9a); } } else { if ($sp2a4a9a instanceof \Illuminate\Session\TokenMismatchException) { return response()->view('errors.419', array('exception' => null), 419); } elseif ($sp2a4a9a instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) { return response()->view('errors.404', array('exception' => null), 404); } elseif ($sp2a4a9a instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException) { return response()->view('errors.404', array('exception' => null), 404); } elseif ($sp2a4a9a instanceof \Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException) { return response()->view('errors.503', array('exception' => null), 503); } } \Log::error('Uncaught Exception', array('Exception' => $sp2a4a9a)); if (config('app.debug')) { return parent::render($sp0fc69c, $sp2a4a9a); } else { return $sp0fc69c->expectsJson() ? response()->json(array('message' => '未知错误，请联系客服'), 500) : response()->view('errors.500', array(), 500); } } }