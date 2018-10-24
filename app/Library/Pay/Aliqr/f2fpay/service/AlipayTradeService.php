<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . './../../AopSdk.php'; require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . './../model/result/AlipayF2FPayResult.php'; require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../model/result/AlipayF2FQueryResult.php'; require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../model/result/AlipayF2FRefundResult.php'; require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../model/result/AlipayF2FPrecreateResult.php'; require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../model/builder/AlipayTradeQueryContentBuilder.php'; require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../model/builder/AlipayTradeCancelContentBuilder.php'; require dirname(__FILE__) . DIRECTORY_SEPARATOR . '../config/config.php'; class AlipayTradeService { public $gateway_url = 'https://openapi.alipay.com/gateway.do'; public $notify_url; public $sign_type; public $alipay_public_key; public $private_key; public $appid; public $charset = 'UTF-8'; public $token = NULL; private $MaxQueryRetry; private $QueryDuration; public $format = 'json'; function __construct($spe325b5) { $this->gateway_url = $spe325b5['gatewayUrl']; $this->appid = $spe325b5['app_id']; $this->sign_type = $spe325b5['sign_type']; $this->private_key = $spe325b5['merchant_private_key']; $this->alipay_public_key = $spe325b5['alipay_public_key']; $this->charset = $spe325b5['charset']; $this->MaxQueryRetry = $spe325b5['MaxQueryRetry']; $this->QueryDuration = $spe325b5['QueryDuration']; $this->notify_url = $spe325b5['notify_url']; if (empty($this->appid) || trim($this->appid) == '') { throw new Exception('appid should not be NULL!'); } if (empty($this->private_key) || trim($this->private_key) == '') { throw new Exception('private_key should not be NULL!'); } if (empty($this->alipay_public_key) || trim($this->alipay_public_key) == '') { throw new Exception('alipay_public_key should not be NULL!'); } if (empty($this->charset) || trim($this->charset) == '') { throw new Exception('charset should not be NULL!'); } if (empty($this->QueryDuration) || trim($this->QueryDuration) == '') { throw new Exception('QueryDuration should not be NULL!'); } if (empty($this->gateway_url) || trim($this->gateway_url) == '') { throw new Exception('gateway_url should not be NULL!'); } if (empty($this->MaxQueryRetry) || trim($this->MaxQueryRetry) == '') { throw new Exception('MaxQueryRetry should not be NULL!'); } if (empty($this->sign_type) || trim($this->sign_type) == '') { throw new Exception('sign_type should not be NULL'); } } function AlipayWapPayService($spe325b5) { $this->__construct($spe325b5); } public function barPay($sp74b2e1) { $sp7bb339 = $sp74b2e1->getOutTradeNo(); $sp5896e5 = $sp74b2e1->getBizContent(); $spcf8a97 = $sp74b2e1->getAppAuthToken(); $this->writeLog($sp5896e5); $sp0fc69c = new AlipayTradePayRequest(); $sp0fc69c->setBizContent($sp5896e5); $sp5241d0 = $this->aopclientRequestExecute($sp0fc69c, NULL, $spcf8a97); $sp5241d0 = $sp5241d0->alipay_trade_pay_response; $spbcb528 = new AlipayF2FPayResult($sp5241d0); if (!empty($sp5241d0) && '10000' == $sp5241d0->code) { $spbcb528->setTradeStatus('SUCCESS'); } elseif (!empty($sp5241d0) && '10003' == $sp5241d0->code) { $sp28762f = new AlipayTradeQueryContentBuilder(); $sp28762f->setOutTradeNo($sp7bb339); $sp28762f->setAppAuthToken($spcf8a97); $spc15ccb = $this->loopQueryResult($sp28762f); return $this->checkQueryAndCancel($sp7bb339, $spcf8a97, $spbcb528, $spc15ccb); } elseif ($this->tradeError($sp5241d0)) { $sp28762f = new AlipayTradeQueryContentBuilder(); $sp28762f->setOutTradeNo($sp7bb339); $sp28762f->setAppAuthToken($spcf8a97); $spee2454 = $this->query($sp28762f); return $this->checkQueryAndCancel($sp7bb339, $spcf8a97, $spbcb528, $spee2454); } else { $spbcb528->setTradeStatus('FAILED'); } return $spbcb528; } public function queryTradeResult($sp74b2e1) { $sp5241d0 = $this->query($sp74b2e1); $spbcb528 = new AlipayF2FQueryResult($sp5241d0); if ($this->querySuccess($sp5241d0)) { $spbcb528->setTradeStatus('SUCCESS'); } elseif ($this->tradeError($sp5241d0)) { $spbcb528->setTradeStatus('UNKNOWN'); } else { $spbcb528->setTradeStatus('FAILED'); } return $spbcb528; } public function refund($sp74b2e1) { $sp5896e5 = $sp74b2e1->getBizContent(); $this->writeLog($sp5896e5); $sp0fc69c = new AlipayTradeRefundRequest(); $sp0fc69c->setBizContent($sp5896e5); $sp5241d0 = $this->aopclientRequestExecute($sp0fc69c, NULL, $sp74b2e1->getAppAuthToken()); $sp5241d0 = $sp5241d0->alipay_trade_refund_response; $spbcb528 = new AlipayF2FRefundResult($sp5241d0); if (!empty($sp5241d0) && '10000' == $sp5241d0->code) { $spbcb528->setTradeStatus('SUCCESS'); } elseif ($this->tradeError($sp5241d0)) { $spbcb528->setTradeStatus('UNKNOWN'); } else { $spbcb528->setTradeStatus('FAILED'); } return $spbcb528; } public function qrPay($sp74b2e1) { $sp5896e5 = $sp74b2e1->getBizContent(); $this->writeLog($sp5896e5); $sp0fc69c = new AlipayTradePrecreateRequest(); $sp0fc69c->setBizContent($sp5896e5); $sp0fc69c->setNotifyUrl($this->notify_url); $sp5241d0 = $this->aopclientRequestExecute($sp0fc69c, NULL, $sp74b2e1->getAppAuthToken()); $sp5241d0 = $sp5241d0->alipay_trade_precreate_response; $spbcb528 = new AlipayF2FPrecreateResult($sp5241d0); if (!empty($sp5241d0) && '10000' == $sp5241d0->code) { $spbcb528->setTradeStatus('SUCCESS'); } elseif ($this->tradeError($sp5241d0)) { $spbcb528->setTradeStatus('UNKNOWN'); } else { $spbcb528->setTradeStatus('FAILED'); } return $spbcb528; } public function query($sp28762f) { $sp6d3fd1 = $sp28762f->getBizContent(); $this->writeLog($sp6d3fd1); $sp0fc69c = new AlipayTradeQueryRequest(); $sp0fc69c->setBizContent($sp6d3fd1); $sp5241d0 = $this->aopclientRequestExecute($sp0fc69c, NULL, $sp28762f->getAppAuthToken()); return $sp5241d0->alipay_trade_query_response; } protected function loopQueryResult($sp28762f) { $sp64b49c = NULL; for ($sp1b7341 = 1; $sp1b7341 < $this->MaxQueryRetry; $sp1b7341++) { try { sleep($this->QueryDuration); } catch (Exception $sp2a4a9a) { print $sp2a4a9a->getMessage(); die; } $spee2454 = $this->query($sp28762f); if (!empty($spee2454)) { if ($this->stopQuery($spee2454)) { return $spee2454; } $sp64b49c = $spee2454; } } return $sp64b49c; } protected function stopQuery($sp5241d0) { if ('10000' == $sp5241d0->code) { if ('TRADE_FINISHED' == $sp5241d0->trade_status || 'TRADE_SUCCESS' == $sp5241d0->trade_status || 'TRADE_CLOSED' == $sp5241d0->trade_status) { return true; } } return false; } private function checkQueryAndCancel($sp7bb339, $spcf8a97, $spbcb528, $spee2454) { if ($this->querySuccess($spee2454)) { $spbcb528->setTradeStatus('SUCCESS'); $spbcb528->setResponse($spee2454); return $spbcb528; } elseif ($this->queryClose($spee2454)) { $spbcb528->setTradeStatus('FAILED'); return $spbcb528; } $spbd4b7d = new AlipayTradeCancelContentBuilder(); $spbd4b7d->setAppAuthToken($spcf8a97); $spbd4b7d->setOutTradeNo($sp7bb339); $sp1175de = $this->cancel($spbd4b7d); if ($this->tradeError($sp1175de)) { $spbcb528->setTradeStatus('UNKNOWN'); } else { $spbcb528->setTradeStatus('FAILED'); } return $spbcb528; } protected function querySuccess($spee2454) { return !empty($spee2454) && $spee2454->code == '10000' && ($spee2454->trade_status == 'TRADE_SUCCESS' || $spee2454->trade_status == 'TRADE_FINISHED'); } protected function queryClose($spee2454) { return !empty($spee2454) && $spee2454->code == '10000' && $spee2454->trade_status == 'TRADE_CLOSED'; } protected function tradeError($sp5241d0) { return empty($sp5241d0) || $sp5241d0->code == '20000'; } public function cancel($spbd4b7d) { $sp6d3fd1 = $spbd4b7d->getBizContent(); $this->writeLog($sp6d3fd1); $sp0fc69c = new AlipayTradeCancelRequest(); $sp0fc69c->setBizContent($sp6d3fd1); $sp5241d0 = $this->aopclientRequestExecute($sp0fc69c, NULL, $spbd4b7d->getAppAuthToken()); return $sp5241d0->alipay_trade_cancel_response; } private function aopclientRequestExecute($sp0fc69c, $spac2842 = NULL, $spcf8a97 = NULL) { $sp1db97f = new AopClient(); $sp1db97f->gatewayUrl = $this->gateway_url; $sp1db97f->appId = $this->appid; $sp1db97f->signType = $this->sign_type; $sp1db97f->rsaPrivateKey = $this->private_key; $sp1db97f->alipayrsaPublicKey = $this->alipay_public_key; $sp1db97f->apiVersion = '1.0'; $sp1db97f->postCharset = $this->charset; $sp1db97f->format = $this->format; $sp1db97f->debugInfo = true; $spbcb528 = $sp1db97f->execute($sp0fc69c, $spac2842, $spcf8a97); return $spbcb528; } function writeLog($spd65dab) { file_put_contents(dirname(__FILE__) . '/../log/log.txt', date('Y-m-d H:i:s') . '  ' . $spd65dab . '
', FILE_APPEND); } function create_erweima($spf0a6e9, $sp434ee2 = '200', $sp94ee72 = 'L', $sp739904 = '0') { $spf0a6e9 = urlencode($spf0a6e9); $sp49c25f = '<img src="http://chart.apis.google.com/chart?chs=' . $sp434ee2 . 'x' . $sp434ee2 . '&amp;cht=qr&chld=' . $sp94ee72 . '|' . $sp739904 . '&amp;chl=' . $spf0a6e9 . '"  widht="' . $sp434ee2 . '" height="' . $sp434ee2 . '" />'; return $sp49c25f; } function create_erweima_url($spf0a6e9, $sp434ee2 = '200', $sp94ee72 = 'L', $sp739904 = '0') { $spf0a6e9 = urlencode($spf0a6e9); $sp49c25f = 'http://chart.apis.google.com/chart?chs=' . $sp434ee2 . 'x' . $sp434ee2 . '&amp;cht=qr&chld=' . $sp94ee72 . '|' . $sp739904 . '&amp;chl=' . $spf0a6e9; return $sp49c25f; } }