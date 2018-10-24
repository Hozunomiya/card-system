<?php
require_once 'alipay_core.function.php'; require_once 'alipay_md5.function.php'; class AlipaySubmit { var $alipay_config; var $alipay_gateway_new = 'https://mapi.alipay.com/gateway.do?'; function __construct($spe325b5) { $this->alipay_config = $spe325b5; } function AlipaySubmit($spe325b5) { $this->__construct($spe325b5); } function buildRequestMysign($sp473cc2) { $sp8338f0 = createLinkString($sp473cc2); $spcbfef1 = ''; switch (strtoupper(trim($this->alipay_config['sign_type']))) { case 'MD5': $spcbfef1 = md5Sign($sp8338f0, $this->alipay_config['key']); break; default: $spcbfef1 = ''; } return $spcbfef1; } function buildRequestPara($sp159e40) { $sp4bb27a = paraFilter($sp159e40); $sp473cc2 = argSort($sp4bb27a); $spcbfef1 = $this->buildRequestMysign($sp473cc2); $sp473cc2['sign'] = $spcbfef1; $sp473cc2['sign_type'] = strtoupper(trim($this->alipay_config['sign_type'])); return $sp473cc2; } function buildRequestParaToString($sp159e40) { $sp6d9830 = $this->buildRequestPara($sp159e40); $sp8267e7 = createLinkStringUrlEncode($sp6d9830); return $sp8267e7; } function buildRequestForm($sp159e40, $sp4a290e, $sp003cba) { $sp6d9830 = $this->buildRequestPara($sp159e40); $sp273d5c = '<form id=\'alipaysubmit\' name=\'alipaysubmit\' action=\'' . $this->alipay_gateway_new . '_input_charset=' . trim(strtolower($this->alipay_config['input_charset'])) . '\' method=\'' . $sp4a290e . '\'>'; foreach ($sp6d9830 as $sp9684a3 => $spc28c86) { $sp273d5c .= '<input type=\'hidden\' name=\'' . $sp9684a3 . '\' value=\'' . $spc28c86 . '\'/>'; } $sp273d5c = $sp273d5c . '<input type=\'submit\'  value=\'' . $sp003cba . '\' style=\'display:none;\'></form>'; $sp273d5c = $sp273d5c . '<script>document.forms[\'alipaysubmit\'].submit();</script>'; return $sp273d5c; } function query_timestamp() { $spdfc1ea = $this->alipay_gateway_new . 'service=query_timestamp&partner=' . trim(strtolower($this->alipay_config['partner'])) . '&_input_charset=' . trim(strtolower($this->alipay_config['input_charset'])); $sp8ada3e = ''; $sp6792af = new DOMDocument(); $sp6792af->load($spdfc1ea); $sp176aac = $sp6792af->getElementsByTagName('encrypt_key'); $sp8ada3e = $sp176aac->item(0)->nodeValue; return $sp8ada3e; } }