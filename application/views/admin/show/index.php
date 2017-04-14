 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>微笑</title>
<!-- Le styles -->
<!-- <link href="/public/admin/styles/css/bootstrap-combined.min.css" rel="stylesheet"> -->
<!-- <link href="/public/admin/styles/css/layoutit.css" rel="stylesheet"> -->
<link href="/public/admin/styles/css/plugin.css" rel="stylesheet">
<!-- <link href="/public/admin/styles/css/datetimepicker.css" rel="stylesheet"> -->
<!-- <script type="text/javascript" src="/public/admin/styles/js/jquery-1.9.1.min.js"></script> -->
<!-- <link rel="stylesheet" href="app/exam/styles/css/mathquill.css" type="text/css"> -->
<!-- <script type="text/javascript" src="/public/admin/styles/js/jquery-ui.js"></script> -->
<!-- <script type="text/javascript" src="/public/admin/styles/js/bootstrap.min.js"></script> -->
<!-- <script type="text/javascript" src="/public/admin/styles/js/bootstrap-datetimepicker.js"></script> -->
<!-- <script type="text/javascript" src="/public/admin/styles/js/bootstrap-datetimepicker.zh-CN.js"></script> -->
<!-- <script type="text/javascript" src="/public/admin/styles/js/ckeditor/ckeditor.js"></script> -->
<!-- <script type="text/javascript" src="/public/admin/styles/js/swfu/swfupload.js"></script> -->
<!-- <script type="text/javascript" src="/public/admin/styles/js/plugin.js"></script>/ -->
</head>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span2">
			
            <div class="accordion" id="accordion-13465">
            	<div class="accordion-group">
            		<div class="accordion-heading">
            			<a class="accordion-toggle" data-parent="#accordion-13465" data-toggle="collapse" href="#accordion-element-707348">后台首页</a>
            		</div>
            		<div class="accordion-body{x2;if:$method == 'basic'} in{x2;endif} collapse" id="accordion-element-707348">
            			<div class="accordion-inner">
            				<ul class="unstyled">
            					<!-- <li><a href="?{x2;$_app}-master-basic">图书列表</a></li> -->
            		    		<!--<li><a href="?{x2;$_app}-master-basic-area">地区设置</a></li>-->
            		    		<!--<li><a href="?{x2;$_app}-master-basic-subject">科目管理</a></li>-->
            		    		<!-- <li><a href="?{x2;$_app}-master-basic-questype">题型管理</a></li> -->
            				</ul>
            			</div>
            		</div>
            	</div>
            <!-- 	<div class="accordion-group">
            		<div class="accordion-heading">
            			<a class="accordion-toggle" data-parent="#accordion-13465" data-toggle="collapse" href="#accordion-element-2120761">课程开通 </a>
            		</div>
            		<div class="accordion-body{x2;if:$method == 'users'} in{x2;endif} collapse" id="accordion-element-2120761">
            			<div class="accordion-inner">
            				<ul class="unstyled">
            					<li><a href="index.php?{x2;$_app}-master-users">开通课程</a></li>
            					<li><a href="index.php?{x2;$_app}-master-users-batopen">批量开通</a></li>
            				</ul>
            			</div>
            		</div>
            	</div>
            	<div class="accordion-group">
            		<div class="accordion-heading">
            			<a class="accordion-toggle" data-parent="#accordion-13465" data-toggle="collapse" href="#accordion-element-212076">试题管理 </a>
            		</div>
            		<div class="accordion-body{x2;if:$method == 'questions' || $method == 'rowsquestions'} in{x2;endif} collapse" id="accordion-element-212076">
            			<div class="accordion-inner">
            				<ul class="unstyled">
            					<li><a href="index.php?{x2;$_app}-master-questions">普通试题管理</a></li>
            					<li><a href="index.php?{x2;$_app}-master-rowsquestions">题帽题管理</a></li>
            				</ul>
            			</div>
            		</div>
            	</div>
            	<div class="accordion-group">
            		<div class="accordion-heading">
            			<a class="accordion-toggle" data-parent="#accordion-13465" data-toggle="collapse" href="#accordion-element-212096">试卷管理 </a>
            		</div>
            		<div class="accordion-body{x2;if:$method == 'exams'} in{x2;endif} collapse" id="accordion-element-212096">
            			<div class="accordion-inner">
            				<ul class="unstyled">
            					<li><a href="index.php?{x2;$_app}-master-exams">试卷列表</a></li>-->
            					<!--<li><a href="index.php?{x2;$_app}-master-exams-autopage">随机组卷</a></li>-->
            					<!--<li><a href="index.php?{x2;$_app}-master-exams-selfpage">手工组卷</a></li>
            				</ul>
            			</div>
            		</div>
            	</div>
            	<div class="accordion-group">
            		<div class="accordion-heading">
            			<a class="accordion-toggle" data-parent="#accordion-13465" data-toggle="collapse" href="#accordion-element-212090">回收站 </a>
            		</div>
            		<div class="accordion-body{x2;if:$method == 'recyle'} in{x2;endif} collapse" id="accordion-element-212090">
            			<div class="accordion-inner">
            				<ul class="unstyled">
            					<li><a href="index.php?{x2;$_app}-master-recyle">普通试题</a></li>
            					<li><a href="index.php?{x2;$_app}-master-recyle-rows">题帽题</a></li>
            					<li><a href="index.php?{x2;$_app}-master-recyle-knows">知识点</a></li>
            				</ul>
            			</div>
            		</div>
            	</div>
            	<div class="accordion-group">
            		<div class="accordion-heading">
            			<a class="accordion-toggle" data-parent="#accordion-13465" data-toggle="collapse" href="#accordion-element-2120901">批量工具 </a>
            		</div>
            		<div class="accordion-body{x2;if:$method == 'tools'} in{x2;endif} collapse" id="accordion-element-2120901">
            			<div class="accordion-inner">
            				<ul class="unstyled">
            					<li><a href="index.php?{x2;$_app}-master-tools">删除试题</a></li>
            					<li><a href="index.php?{x2;$_app}-master-tools-clearhistory">清空考试记录</a></li>
            					<li><a href="index.php?{x2;$_app}-master-tools-clearsession">清理会话</a></li>
            				</ul>
            			</div>
            		</div>
            	</div>-->
            </div> 
		</div>
		<div class="span10">
			<ul class="breadcrumb">
				<li><a href="/admin/show">全局</a> <span class="divider">/</span></li>
				<li class="active">首页</li>
			</ul>
			<div class="row-fluid">
				<div class="span6">
					<div class="well">
						<h5>
							欢迎进入后台管理系统
						</h5>
                                    <p>今日浏览量<span style="color:red;">&nbsp;<?php echo $current;?></span></p>
                                    <p>总浏览量<span style="color:red;">&nbsp;<?php echo $nums->num;?></span></p> 

					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>


 

