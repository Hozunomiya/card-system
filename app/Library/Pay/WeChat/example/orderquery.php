<?php
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <title>微信支付样例-订单查询</title>
</head>
<?php  ini_set('date.timezone', 'Asia/Shanghai'); error_reporting(E_ERROR); require_once '../lib/WxPay.Api.php'; require_once 'log.php'; $sp0d13f3 = new CLogFileHandler('./logs/' . date('Y-m-d') . '.log'); $sp1ac1a0 = Log::Init($sp0d13f3, 15); function printf_info($sp1835de) { foreach ($sp1835de as $sp9684a3 => $spb66e06) { echo "<font color='#f00;'>{$sp9684a3}</font> : {$spb66e06} <br/>"; } } if (isset($_REQUEST['transaction_id']) && $_REQUEST['transaction_id'] != '') { $spb3784c = $_REQUEST['transaction_id']; $sp51043b = new WxPayOrderQuery(); $sp51043b->SetTransaction_id($spb3784c); printf_info(WxPayApi::orderQuery($sp51043b)); die; } if (isset($_REQUEST['out_trade_no']) && $_REQUEST['out_trade_no'] != '') { $spbd054b = $_REQUEST['out_trade_no']; $sp51043b = new WxPayOrderQuery(); $sp51043b->SetOut_trade_no($spbd054b); printf_info(WxPayApi::orderQuery($sp51043b)); die; } ?>
<body>  
	<form action="#" method="post">
        <div style="margin-left:2%;color:#f00">微信订单号和商户订单号选少填一个，微信订单号优先：</div><br/>
        <div style="margin-left:2%;">微信订单号：</div><br/>
        <input type="text" style="width:96%;height:35px;margin-left:2%;" name="transaction_id" /><br /><br />
        <div style="margin-left:2%;">商户订单号：</div><br/>
        <input type="text" style="width:96%;height:35px;margin-left:2%;" name="out_trade_no" /><br /><br />
		<div align="center">
			<input type="submit" value="查询" style="width:210px; height:50px; border-radius: 15px;background-color:#FE6714; border:0px #FE6714 solid; cursor: pointer;  color:white;  font-size:16px;" type="button" onclick="callpay()" />
		</div>
	</form>
</body>
</html><?php 