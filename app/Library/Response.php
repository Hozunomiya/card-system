<?php
namespace App\Library; class Response { public static function json($sp1835de = array(), $sp1a65a5 = 200, array $spdbbeeb = array(), $spcd8e08 = 0) { return response()->json($sp1835de, $sp1a65a5, $spdbbeeb, $spcd8e08); } public static function success($sp1835de = array()) { return self::json(array('message' => 'success', 'data' => $sp1835de)); } public static function fail($spbfa8f4 = 'fail', $sp1835de = array()) { return self::json(array('message' => $spbfa8f4, 'data' => $sp1835de), 500); } public static function forbidden($spbfa8f4 = 'forbidden', $sp1835de = array()) { return self::json(array('message' => $spbfa8f4, 'data' => $sp1835de), 403); } }