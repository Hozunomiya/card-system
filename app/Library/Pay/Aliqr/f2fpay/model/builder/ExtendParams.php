<?php
class ExtendParams { private $sysServiceProviderId; private $hbFqNum; private $hbFqSellerPercent; private $extendParamsArr = array(); public function getExtendParams() { if (!empty($this->extendParamsArr)) { return $this->extendParamsArr; } } public function getSysServiceProviderId() { return $this->sysServiceProviderId; } public function setSysServiceProviderId($sp8e7730) { $this->sysServiceProviderId = $sp8e7730; $this->extendParamsArr['sys_service_provider_id'] = $sp8e7730; } public function getHbFqNum() { return $this->hbFqNum; } public function setHbFqNum($sp2bde43) { $this->hbFqNum = $sp2bde43; $this->extendParamsArr['hb_fq_num'] = $sp2bde43; } public function getHbFqSellerPercent() { return $this->hbFqSellerPercent; } public function setHbFqSellerPercent($spa0c81f) { $this->hbFqSellerPercent = $spa0c81f; $this->extendParamsArr['hb_fq_seller_percent'] = $spa0c81f; } }