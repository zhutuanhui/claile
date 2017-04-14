<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>微笑</title>
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css">
	<script src="/public/js/jquery-1.11.3.min.js"></script>
	<script src="/bootstrap/js/bootstrap.min.js"></script>
	<link href="/public/admin/styles/css/bootstrap-combined.min.css" rel="stylesheet">

	<!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/css/bootstrap.min.css"/> -->
	<!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css"/> -->
	<!-- <link rel="stylesheet" href="/Ajax-Bootstrap-Select/dist/css/ajax-bootstrap-select.css"/> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 
</head>
<body>
<div class="navbar navbar-inverse">
	<div class="navbar-inner">
		<div class="container-fluid">
			

		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">我的后台</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="<?PHP echo ($this->uri->segment(1) == 'home' or $this->uri->segment(1) == '') ? 'active' : ''; ?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">用户管理 <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="/admin/user/index">用户组</a></li>
						<li><a href="/admin/user/resourcelist">权限管理</a></li>
						
					</ul>
				</li>
				<li class="dropdown <?PHP echo ($this->uri->segment(1) == 'operate') ? 'active' : ''; ?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">文章管理<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="/admin/life/index">点滴生活</a></li>
						<li><a href="/operate/synclogissync">美文阅读</a></li>
						<li><a href="/operate/synclogissync">歌词搜集</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="/admin/smille/index">我的学习</a></li>
					</ul>
				</li>
				<li class="dropdown <?PHP echo ($this->uri->segment(1) == 'operate') ? 'active' : ''; ?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">联系人<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="/admin/phone/index">电话</a></li>
						<li><a href="/admin/message/index">短信</a></li>
						<li><a href="/admin/message/email">邮箱</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="/admin/history/index">通讯录</a></li>
					</ul>
				</li>
				<li class="<?PHP echo ($this->uri->segment(1) == 'api') ? 'active' : ''; ?>"><a href="/api/index"></a></li>
			</ul>
		
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">系统设置 <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li class="version-check"><a href="#">系统版本检测</a></li>
						<li><a href="/">个人中心</a></li>
						<li><a href="#">默认信息设置</a></li>
						<li><a href="#">Something else here</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#">退出登录</a></li>
					</ul>
				</li>
			</ul>
				<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="/" target="black">网站首页 </a>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
		</div>
	</div>
</div>