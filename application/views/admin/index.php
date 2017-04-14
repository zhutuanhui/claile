<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>微笑</title>
	
	<script src="/public/js/jquery-1.11.3.min.js"></script>

	<style>
		body {font-family:helvetica; background:url("/public/admin/styles/images/1646430764.jpg") no-repeat center 10px #EAEAEA;margin:0;}
		.weixiaologion{width:300px; margin:0 auto}
		.weixiaologion p{margin:0;margin-bottom:25px;}
		.weixiaologion span{display:inline-block;text-align:right; width:50px;font-size:14px;color:#333;margin-right:10px;}
		.ib {border:1px solid #ccc; width:200px;padding:7px 5px;}
		#head {color:#fff; border-bottom:1px solid #aaa500;}
		#mbody {padding-top:310px; padding-bottom:250px; color:#336699;}
		#foot {font-size:12px; color:#fff; padding:10px; text-align:center;}
</style>

</head>
<body>
<div id="mbody">
	<div class="weixiaologion">
	<p><span>用户名</span><input id="userNameKK" class="ib" name="name" type="text" autocomplete="off" placeholder="登录账号"/></p>
	<p><span>密码</span><input id="passWordKK" class="ib" name="password" type="password" autocomplete="off" placeholder="账户密码" /></p><p><span></span><input id="btnqq" type="submit" value="登 录" class="submit" /></p>
	</div>
	</div>
<script>
	$(document).ready(function() {
	$(document).keyup(function(event) {
	  if(event.keyCode ==13){
				var $u = $("#userNameKK").val();
				var $p = $("#passWordKK").val();
				if(!$u || !$p)
				{
					alert('用户名或密码不能为空');
				}else
				{
					$.post("/admin/logion/dologion",{name:$u,password:$p}, function(result) {
						if(result == "1")
						{
							window.location.href='/admin/logion/aci';
						}
						else
						{
							alert("用户名或密码错误");
						}
					});
				}
		}
	});

	$("#btnqq").click(function() {

		var $u = $("#userNameKK").val();
		var $p = $("#passWordKK").val();
		if(!$u || !$p)
		{
			alert('用户名或者密码不能为空');
		}else
		{
			$.post("/admin/logion/dologion",{name:$u,password:$p}, function(result) {
			
				if(result == "1")
				{
					window.location.href='/admin/logion/aci';
				}
				else
				{
					alert("用户名或密码错误");
				}
			});
		}
		
	});
});
 </script>

</div>