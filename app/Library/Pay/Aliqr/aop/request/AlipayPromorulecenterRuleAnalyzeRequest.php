<?php
class AlipayPromorulecenterRuleAnalyzeRequest { private $bizId; private $ruleUuid; private $userId; private $apiParas = array(); private $terminalType; private $terminalInfo; private $prodCode; private $apiVersion = '1.0'; private $notifyUrl; private $returnUrl; private $needEncrypt = false; public function setBizId($sp45a909) { $this->bizId = $sp45a909; $this->apiParas['biz_id'] = $sp45a909; } public function getBizId() { return $this->bizId; } public function setRuleUuid($spaa267e) { $this->ruleUuid = $spaa267e; $this->apiParas['rule_uuid'] = $spaa267e; } public function getRuleUuid() { return $this->ruleUuid; } public function setUserId($sp4946d7) { $this->userId = $sp4946d7; $this->apiParas['user_id'] = $sp4946d7; } public function getUserId() { return $this->userId; } public function getApiMethodName() { return 'alipay.promorulecenter.rule.analyze'; } public function setNotifyUrl($spa00d19) { $this->notifyUrl = $spa00d19; } public function getNotifyUrl() { return $this->notifyUrl; } public function setReturnUrl($sp8a30df) { $this->returnUrl = $sp8a30df; } public function getReturnUrl() { return $this->returnUrl; } public function getApiParas() { return $this->apiParas; } public function getTerminalType() { return $this->terminalType; } public function setTerminalType($spb9b0b4) { $this->terminalType = $spb9b0b4; } public function getTerminalInfo() { return $this->terminalInfo; } public function setTerminalInfo($spf3f780) { $this->terminalInfo = $spf3f780; } public function getProdCode() { return $this->prodCode; } public function setProdCode($sp5992f8) { $this->prodCode = $sp5992f8; } public function setApiVersion($spc906d7) { $this->apiVersion = $spc906d7; } public function getApiVersion() { return $this->apiVersion; } public function setNeedEncrypt($sp48c449) { $this->needEncrypt = $sp48c449; } public function getNeedEncrypt() { return $this->needEncrypt; } }