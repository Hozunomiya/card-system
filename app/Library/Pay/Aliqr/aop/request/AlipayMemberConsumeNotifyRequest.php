<?php
class AlipayMemberConsumeNotifyRequest { private $actPayAmount; private $bizCardNo; private $cardInfo; private $externalCardNo; private $gainBenefitList; private $memo; private $shopCode; private $swipeCertType; private $tradeAmount; private $tradeName; private $tradeNo; private $tradeTime; private $tradeType; private $useBenefitList; private $apiParas = array(); private $terminalType; private $terminalInfo; private $prodCode; private $apiVersion = '1.0'; private $notifyUrl; private $returnUrl; private $needEncrypt = false; public function setActPayAmount($sp92baca) { $this->actPayAmount = $sp92baca; $this->apiParas['act_pay_amount'] = $sp92baca; } public function getActPayAmount() { return $this->actPayAmount; } public function setBizCardNo($spb4a145) { $this->bizCardNo = $spb4a145; $this->apiParas['biz_card_no'] = $spb4a145; } public function getBizCardNo() { return $this->bizCardNo; } public function setCardInfo($sp40afe6) { $this->cardInfo = $sp40afe6; $this->apiParas['card_info'] = $sp40afe6; } public function getCardInfo() { return $this->cardInfo; } public function setExternalCardNo($sp5ec846) { $this->externalCardNo = $sp5ec846; $this->apiParas['external_card_no'] = $sp5ec846; } public function getExternalCardNo() { return $this->externalCardNo; } public function setGainBenefitList($sp6eec8f) { $this->gainBenefitList = $sp6eec8f; $this->apiParas['gain_benefit_list'] = $sp6eec8f; } public function getGainBenefitList() { return $this->gainBenefitList; } public function setMemo($sp0e7cff) { $this->memo = $sp0e7cff; $this->apiParas['memo'] = $sp0e7cff; } public function getMemo() { return $this->memo; } public function setShopCode($sp883c92) { $this->shopCode = $sp883c92; $this->apiParas['shop_code'] = $sp883c92; } public function getShopCode() { return $this->shopCode; } public function setSwipeCertType($sp1a9598) { $this->swipeCertType = $sp1a9598; $this->apiParas['swipe_cert_type'] = $sp1a9598; } public function getSwipeCertType() { return $this->swipeCertType; } public function setTradeAmount($spa2eed3) { $this->tradeAmount = $spa2eed3; $this->apiParas['trade_amount'] = $spa2eed3; } public function getTradeAmount() { return $this->tradeAmount; } public function setTradeName($sp32d43c) { $this->tradeName = $sp32d43c; $this->apiParas['trade_name'] = $sp32d43c; } public function getTradeName() { return $this->tradeName; } public function setTradeNo($spa6d234) { $this->tradeNo = $spa6d234; $this->apiParas['trade_no'] = $spa6d234; } public function getTradeNo() { return $this->tradeNo; } public function setTradeTime($sp987a3d) { $this->tradeTime = $sp987a3d; $this->apiParas['trade_time'] = $sp987a3d; } public function getTradeTime() { return $this->tradeTime; } public function setTradeType($sp3b529b) { $this->tradeType = $sp3b529b; $this->apiParas['trade_type'] = $sp3b529b; } public function getTradeType() { return $this->tradeType; } public function setUseBenefitList($spb94d4e) { $this->useBenefitList = $spb94d4e; $this->apiParas['use_benefit_list'] = $spb94d4e; } public function getUseBenefitList() { return $this->useBenefitList; } public function getApiMethodName() { return 'alipay.member.consume.notify'; } public function setNotifyUrl($spa00d19) { $this->notifyUrl = $spa00d19; } public function getNotifyUrl() { return $this->notifyUrl; } public function setReturnUrl($sp8a30df) { $this->returnUrl = $sp8a30df; } public function getReturnUrl() { return $this->returnUrl; } public function getApiParas() { return $this->apiParas; } public function getTerminalType() { return $this->terminalType; } public function setTerminalType($spb9b0b4) { $this->terminalType = $spb9b0b4; } public function getTerminalInfo() { return $this->terminalInfo; } public function setTerminalInfo($spf3f780) { $this->terminalInfo = $spf3f780; } public function getProdCode() { return $this->prodCode; } public function setProdCode($sp5992f8) { $this->prodCode = $sp5992f8; } public function setApiVersion($spc906d7) { $this->apiVersion = $spc906d7; } public function getApiVersion() { return $this->apiVersion; } public function setNeedEncrypt($sp48c449) { $this->needEncrypt = $sp48c449; } public function getNeedEncrypt() { return $this->needEncrypt; } }