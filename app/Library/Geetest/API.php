<?php
namespace App\Library\Geetest; use Illuminate\Support\Facades\Session; class API { private $geetest_conf = null; public function __construct($sp8abf69) { $this->geetest_conf = $sp8abf69; } public static function get() { $spa02c0f = new Lib(config('services.geetest.id'), config('services.geetest.key')); $sp5670aa = time() . rand(1, 10000); $sp1a65a5 = $spa02c0f->pre_process($sp5670aa); $spc8aebe = json_decode($spa02c0f->get_response_str()); Session::put('gt_server', $sp1a65a5); Session::put('gt_user_id', $sp5670aa); return $spc8aebe; } public static function verify($spf1763c, $spaaaf25, $sp83809f) { $spa02c0f = new Lib(config('services.geetest.id'), config('services.geetest.key')); $sp5670aa = Session::get('gt_user_id'); if (Session::get('gt_server') == 1) { $spbcb528 = $spa02c0f->success_validate($spf1763c, $spaaaf25, $sp83809f, $sp5670aa); if ($spbcb528) { return true; } else { return false; } } else { if ($spa02c0f->fail_validate($spf1763c, $spaaaf25, $sp83809f)) { return true; } else { return false; } } } }