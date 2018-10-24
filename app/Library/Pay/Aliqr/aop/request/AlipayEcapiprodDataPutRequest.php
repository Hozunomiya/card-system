<?php
class AlipayEcapiprodDataPutRequest { private $category; private $charSet; private $collectingTaskId; private $entityCode; private $entityName; private $entityType; private $isvCode; private $jsonData; private $orgCode; private $apiParas = array(); private $terminalType; private $terminalInfo; private $prodCode; private $apiVersion = '1.0'; private $notifyUrl; private $returnUrl; private $needEncrypt = false; public function setCategory($sp67f4a3) { $this->category = $sp67f4a3; $this->apiParas['category'] = $sp67f4a3; } public function getCategory() { return $this->category; } public function setCharSet($sp79abe0) { $this->charSet = $sp79abe0; $this->apiParas['char_set'] = $sp79abe0; } public function getCharSet() { return $this->charSet; } public function setCollectingTaskId($spc75f91) { $this->collectingTaskId = $spc75f91; $this->apiParas['collecting_task_id'] = $spc75f91; } public function getCollectingTaskId() { return $this->collectingTaskId; } public function setEntityCode($spfd622f) { $this->entityCode = $spfd622f; $this->apiParas['entity_code'] = $spfd622f; } public function getEntityCode() { return $this->entityCode; } public function setEntityName($spaf0ff8) { $this->entityName = $spaf0ff8; $this->apiParas['entity_name'] = $spaf0ff8; } public function getEntityName() { return $this->entityName; } public function setEntityType($sp359533) { $this->entityType = $sp359533; $this->apiParas['entity_type'] = $sp359533; } public function getEntityType() { return $this->entityType; } public function setIsvCode($spff89e3) { $this->isvCode = $spff89e3; $this->apiParas['isv_code'] = $spff89e3; } public function getIsvCode() { return $this->isvCode; } public function setJsonData($sp41b5ba) { $this->jsonData = $sp41b5ba; $this->apiParas['json_data'] = $sp41b5ba; } public function getJsonData() { return $this->jsonData; } public function setOrgCode($sp960aac) { $this->orgCode = $sp960aac; $this->apiParas['org_code'] = $sp960aac; } public function getOrgCode() { return $this->orgCode; } public function getApiMethodName() { return 'alipay.ecapiprod.data.put'; } public function setNotifyUrl($spa00d19) { $this->notifyUrl = $spa00d19; } public function getNotifyUrl() { return $this->notifyUrl; } public function setReturnUrl($sp8a30df) { $this->returnUrl = $sp8a30df; } public function getReturnUrl() { return $this->returnUrl; } public function getApiParas() { return $this->apiParas; } public function getTerminalType() { return $this->terminalType; } public function setTerminalType($spb9b0b4) { $this->terminalType = $spb9b0b4; } public function getTerminalInfo() { return $this->terminalInfo; } public function setTerminalInfo($spf3f780) { $this->terminalInfo = $spf3f780; } public function getProdCode() { return $this->prodCode; } public function setProdCode($sp5992f8) { $this->prodCode = $sp5992f8; } public function setApiVersion($spc906d7) { $this->apiVersion = $spc906d7; } public function getApiVersion() { return $this->apiVersion; } public function setNeedEncrypt($sp48c449) { $this->needEncrypt = $sp48c449; } public function getNeedEncrypt() { return $this->needEncrypt; } }