<?php
class AlipayPassFileAddRequest { private $fileContent; private $recognitionInfo; private $recognitionType; private $apiParas = array(); private $terminalType; private $terminalInfo; private $prodCode; private $apiVersion = '1.0'; private $notifyUrl; private $returnUrl; private $needEncrypt = false; public function setFileContent($sp31b327) { $this->fileContent = $sp31b327; $this->apiParas['file_content'] = $sp31b327; } public function getFileContent() { return $this->fileContent; } public function setRecognitionInfo($spd3d6f0) { $this->recognitionInfo = $spd3d6f0; $this->apiParas['recognition_info'] = $spd3d6f0; } public function getRecognitionInfo() { return $this->recognitionInfo; } public function setRecognitionType($sp4d0f73) { $this->recognitionType = $sp4d0f73; $this->apiParas['recognition_type'] = $sp4d0f73; } public function getRecognitionType() { return $this->recognitionType; } public function getApiMethodName() { return 'alipay.pass.file.add'; } public function setNotifyUrl($spa00d19) { $this->notifyUrl = $spa00d19; } public function getNotifyUrl() { return $this->notifyUrl; } public function setReturnUrl($sp8a30df) { $this->returnUrl = $sp8a30df; } public function getReturnUrl() { return $this->returnUrl; } public function getApiParas() { return $this->apiParas; } public function getTerminalType() { return $this->terminalType; } public function setTerminalType($spb9b0b4) { $this->terminalType = $spb9b0b4; } public function getTerminalInfo() { return $this->terminalInfo; } public function setTerminalInfo($spf3f780) { $this->terminalInfo = $spf3f780; } public function getProdCode() { return $this->prodCode; } public function setProdCode($sp5992f8) { $this->prodCode = $sp5992f8; } public function setApiVersion($spc906d7) { $this->apiVersion = $spc906d7; } public function getApiVersion() { return $this->apiVersion; } public function setNeedEncrypt($sp48c449) { $this->needEncrypt = $sp48c449; } public function getNeedEncrypt() { return $this->needEncrypt; } }