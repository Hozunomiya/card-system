<?php
class AlipayPassCodeVerifyRequest { private $extInfo; private $operatorId; private $operatorType; private $verifyCode; private $apiParas = array(); private $terminalType; private $terminalInfo; private $prodCode; private $apiVersion = '1.0'; private $notifyUrl; private $returnUrl; private $needEncrypt = false; public function setExtInfo($sp84b2c1) { $this->extInfo = $sp84b2c1; $this->apiParas['ext_info'] = $sp84b2c1; } public function getExtInfo() { return $this->extInfo; } public function setOperatorId($sp0413f5) { $this->operatorId = $sp0413f5; $this->apiParas['operator_id'] = $sp0413f5; } public function getOperatorId() { return $this->operatorId; } public function setOperatorType($spe6cd5c) { $this->operatorType = $spe6cd5c; $this->apiParas['operator_type'] = $spe6cd5c; } public function getOperatorType() { return $this->operatorType; } public function setVerifyCode($spb75e91) { $this->verifyCode = $spb75e91; $this->apiParas['verify_code'] = $spb75e91; } public function getVerifyCode() { return $this->verifyCode; } public function getApiMethodName() { return 'alipay.pass.code.verify'; } public function setNotifyUrl($spa00d19) { $this->notifyUrl = $spa00d19; } public function getNotifyUrl() { return $this->notifyUrl; } public function setReturnUrl($sp8a30df) { $this->returnUrl = $sp8a30df; } public function getReturnUrl() { return $this->returnUrl; } public function getApiParas() { return $this->apiParas; } public function getTerminalType() { return $this->terminalType; } public function setTerminalType($spb9b0b4) { $this->terminalType = $spb9b0b4; } public function getTerminalInfo() { return $this->terminalInfo; } public function setTerminalInfo($spf3f780) { $this->terminalInfo = $spf3f780; } public function getProdCode() { return $this->prodCode; } public function setProdCode($sp5992f8) { $this->prodCode = $sp5992f8; } public function setApiVersion($spc906d7) { $this->apiVersion = $spc906d7; } public function getApiVersion() { return $this->apiVersion; } public function setNeedEncrypt($sp48c449) { $this->needEncrypt = $sp48c449; } public function getNeedEncrypt() { return $this->needEncrypt; } }