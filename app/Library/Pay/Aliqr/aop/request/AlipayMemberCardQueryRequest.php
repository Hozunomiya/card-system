<?php
class AlipayMemberCardQueryRequest { private $bizCardNo; private $cardMerchantInfo; private $cardUserInfo; private $extInfo; private $requestFrom; private $apiParas = array(); private $terminalType; private $terminalInfo; private $prodCode; private $apiVersion = '1.0'; private $notifyUrl; private $returnUrl; private $needEncrypt = false; public function setBizCardNo($spb4a145) { $this->bizCardNo = $spb4a145; $this->apiParas['biz_card_no'] = $spb4a145; } public function getBizCardNo() { return $this->bizCardNo; } public function setCardMerchantInfo($sp6034b8) { $this->cardMerchantInfo = $sp6034b8; $this->apiParas['card_merchant_info'] = $sp6034b8; } public function getCardMerchantInfo() { return $this->cardMerchantInfo; } public function setCardUserInfo($sp94497b) { $this->cardUserInfo = $sp94497b; $this->apiParas['card_user_info'] = $sp94497b; } public function getCardUserInfo() { return $this->cardUserInfo; } public function setExtInfo($sp84b2c1) { $this->extInfo = $sp84b2c1; $this->apiParas['ext_info'] = $sp84b2c1; } public function getExtInfo() { return $this->extInfo; } public function setRequestFrom($spe42ad4) { $this->requestFrom = $spe42ad4; $this->apiParas['request_from'] = $spe42ad4; } public function getRequestFrom() { return $this->requestFrom; } public function getApiMethodName() { return 'alipay.member.card.query'; } public function setNotifyUrl($spa00d19) { $this->notifyUrl = $spa00d19; } public function getNotifyUrl() { return $this->notifyUrl; } public function setReturnUrl($sp8a30df) { $this->returnUrl = $sp8a30df; } public function getReturnUrl() { return $this->returnUrl; } public function getApiParas() { return $this->apiParas; } public function getTerminalType() { return $this->terminalType; } public function setTerminalType($spb9b0b4) { $this->terminalType = $spb9b0b4; } public function getTerminalInfo() { return $this->terminalInfo; } public function setTerminalInfo($spf3f780) { $this->terminalInfo = $spf3f780; } public function getProdCode() { return $this->prodCode; } public function setProdCode($sp5992f8) { $this->prodCode = $sp5992f8; } public function setApiVersion($spc906d7) { $this->apiVersion = $spc906d7; } public function getApiVersion() { return $this->apiVersion; } public function setNeedEncrypt($sp48c449) { $this->needEncrypt = $sp48c449; } public function getNeedEncrypt() { return $this->needEncrypt; } }