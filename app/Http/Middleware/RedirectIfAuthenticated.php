<?php
namespace App\Http\Middleware; use Closure; use Illuminate\Support\Facades\Auth; class RedirectIfAuthenticated { public function handle($sp0fc69c, Closure $sp9846c1, $sp6c76ab = null) { if (Auth::guard($sp6c76ab)->check()) { return redirect('/home'); } return $sp9846c1($sp0fc69c); } }