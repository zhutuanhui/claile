<?php
    include "TopSdk.php";
    date_default_timezone_set('PRC'); 
    header("Content-Type:text/html;charset=utf-8"); 
	$c = new TopClient;
	$c->appkey = '23470532';
	$c->secretKey = '2636b5ac62c73c3ac4cc0d69ccf99b1e';
	$req = new AlibabaAliqinFcSmsNumSendRequest;
	$req->setExtend("123456");
	$req->setSmsType("normal");
	$req->setSmsFreeSignName("微笑说");
	$req->setSmsParam("{\"name\":\"1234\"}");
	$req->setRecNum("18818555014");
	$req->setSmsTemplateCode("SMS_16686152");
	$resp = $c->execute($req);
	print_r($resp);
?>