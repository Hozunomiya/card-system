<?php
class AlipayMobilePublicInfoModifyRequest { private $appName; private $authPic; private $licenseUrl; private $logoUrl; private $publicGreeting; private $shopPic1; private $shopPic2; private $shopPic3; private $apiParas = array(); private $terminalType; private $terminalInfo; private $prodCode; private $apiVersion = '1.0'; private $notifyUrl; private $returnUrl; private $needEncrypt = false; public function setAppName($sp65400e) { $this->appName = $sp65400e; $this->apiParas['app_name'] = $sp65400e; } public function getAppName() { return $this->appName; } public function setAuthPic($spe9824a) { $this->authPic = $spe9824a; $this->apiParas['auth_pic'] = $spe9824a; } public function getAuthPic() { return $this->authPic; } public function setLicenseUrl($sp5f0ebf) { $this->licenseUrl = $sp5f0ebf; $this->apiParas['license_url'] = $sp5f0ebf; } public function getLicenseUrl() { return $this->licenseUrl; } public function setLogoUrl($spc2339e) { $this->logoUrl = $spc2339e; $this->apiParas['logo_url'] = $spc2339e; } public function getLogoUrl() { return $this->logoUrl; } public function setPublicGreeting($sp082712) { $this->publicGreeting = $sp082712; $this->apiParas['public_greeting'] = $sp082712; } public function getPublicGreeting() { return $this->publicGreeting; } public function setShopPic1($sp97b63f) { $this->shopPic1 = $sp97b63f; $this->apiParas['shop_pic1'] = $sp97b63f; } public function getShopPic1() { return $this->shopPic1; } public function setShopPic2($sp22cd2d) { $this->shopPic2 = $sp22cd2d; $this->apiParas['shop_pic2'] = $sp22cd2d; } public function getShopPic2() { return $this->shopPic2; } public function setShopPic3($sp76bb61) { $this->shopPic3 = $sp76bb61; $this->apiParas['shop_pic3'] = $sp76bb61; } public function getShopPic3() { return $this->shopPic3; } public function getApiMethodName() { return 'alipay.mobile.public.info.modify'; } public function setNotifyUrl($spa00d19) { $this->notifyUrl = $spa00d19; } public function getNotifyUrl() { return $this->notifyUrl; } public function setReturnUrl($sp8a30df) { $this->returnUrl = $sp8a30df; } public function getReturnUrl() { return $this->returnUrl; } public function getApiParas() { return $this->apiParas; } public function getTerminalType() { return $this->terminalType; } public function setTerminalType($spb9b0b4) { $this->terminalType = $spb9b0b4; } public function getTerminalInfo() { return $this->terminalInfo; } public function setTerminalInfo($spf3f780) { $this->terminalInfo = $spf3f780; } public function getProdCode() { return $this->prodCode; } public function setProdCode($sp5992f8) { $this->prodCode = $sp5992f8; } public function setApiVersion($spc906d7) { $this->apiVersion = $spc906d7; } public function getApiVersion() { return $this->apiVersion; } public function setNeedEncrypt($sp48c449) { $this->needEncrypt = $sp48c449; } public function getNeedEncrypt() { return $this->needEncrypt; } }