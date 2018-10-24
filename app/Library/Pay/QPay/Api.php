<?php
namespace App\Library\Pay\QPay; use App\Library\Helper; use App\Library\Pay\ApiInterface; use Illuminate\Support\Facades\Log; require_once __DIR__ . '/qpay_mch_sp/qpayMchAPI.class.php'; class Api implements ApiInterface { private $url_notify = ''; public function __construct($spfc3b4d) { $this->url_notify = SYS_URL_API . '/pay/notify/' . $spfc3b4d; } function goPay($sp8abf69, $spbd054b, $sp547016, $speb838e, $sp6c12fc) { if (!isset($sp8abf69['mch_id']) || !isset($sp8abf69['mch_key'])) { throw new \Exception('请设置 mch_id 和 mch_key'); } $spb9d69c = array('out_trade_no' => $spbd054b, 'body' => $sp547016, 'device_info' => 'qq_19060', 'fee_type' => 'CNY', 'notify_url' => $this->url_notify, 'spbill_create_ip' => Helper::getIP(), 'total_fee' => $sp6c12fc, 'trade_type' => 'NATIVE'); $spa3cc3d = new \QpayMchAPI('https://qpay.qq.com/cgi-bin/pay/qpay_unified_order.cgi', null, 10); $sp4a624b = $spa3cc3d->req($spb9d69c, $sp8abf69); $spbcb528 = \QpayMchUtil::xmlToArray($sp4a624b); if (!isset($spbcb528['code_url'])) { Log::error('Pay.QPay.goPay, order_no:' . $spbd054b . ', error:' . json_encode($spbcb528)); if (isset($spbcb528['err_code_des'])) { throw new \Exception($spbcb528['err_code_des']); } if (isset($spbcb528['return_msg'])) { throw new \Exception($spbcb528['return_msg']); } throw new \Exception('获取支付数据失败'); } header('location: /qrcode/pay/' . $spbd054b . '/qq?url=' . urlencode($spbcb528['code_url'])); die; } function verify($sp8abf69, $spc98f69) { $spdcb97c = isset($sp8abf69['isNotify']) && $sp8abf69['isNotify']; $spa3cc3d = new \QpayMchAPI('https://qpay.qq.com/cgi-bin/pay/qpay_order_query.cgi', null, 10); if ($spdcb97c) { $spb9d69c = $spa3cc3d->notify_params(); if (!$spa3cc3d->notify_verify($spb9d69c, $sp8abf69)) { echo '<xml><return_code>FAIL</return_code></xml>'; return false; } call_user_func_array($spc98f69, array($spb9d69c['out_trade_no'], $spb9d69c['total_fee'], $spb9d69c['transaction_id'])); echo '<xml><return_code>SUCCESS</return_code></xml>'; return true; } else { $spbd054b = @$sp8abf69['out_trade_no']; $spb9d69c = array('out_trade_no' => $spbd054b); $sp4a624b = $spa3cc3d->req($spb9d69c, $sp8abf69); $spbcb528 = \QpayMchUtil::xmlToArray($sp4a624b); if (array_key_exists('trade_state', $spbcb528) && $spbcb528['trade_state'] == 'SUCCESS') { call_user_func_array($spc98f69, array($spbcb528['out_trade_no'], $spbcb528['total_fee'], $spbcb528['transaction_id'])); return true; } else { return false; } } } }