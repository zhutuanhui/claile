



<link href="/public/admin/styles/css/plugin.css" rel="stylesheet">

</head>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span2">
			
            <div class="accordion" id="accordion-13465">
            	<div class="accordion-group">
            		<div class="accordion-heading">
            			<a class="accordion-toggle" data-parent="#accordion-13465" data-toggle="collapse" href="#accordion-element-707348">用户管理</a>
            		</div>
            		<div class="accordion-body{x2;if:$method == 'basic'} in{x2;endif} collapse" id="accordion-element-707348">
            			<div class="accordion-inner">
            				<ul class="unstyled">
            					<li><a href="/admin/user/index">用户列表</a></li>
            		    		<!-- <li><a href="?{x2;$_app}-master-basic-area"></a></li> -->
            		    		<!--<li><a href="?{x2;$_app}-master-basic-subject">科目管理</a></li>-->
            		    		<li><a href="/admin/user/add">添加用户</a></li>
            				</ul>
            			</div>
            		</div>
            	</div>
            	<div class="accordion-group">
            		<div class="accordion-heading">
            			<a class="accordion-toggle" data-parent="#accordion-13465" data-toggle="collapse" href="#accordion-element-2120761">用户组管理</a>
            		</div>
            		<div class="accordion-body{x2;if:$method == 'users'} in{x2;endif} collapse" id="accordion-element-2120761">
            			<div class="accordion-inner">
            				<ul class="unstyled">
            					<li><a href="/admin/user/grouplist">用户组列表</a></li>
            					<li><a href="/admin/user/groupadd">添加用户组</a></li>
            				</ul>
            			</div>
            		</div>
            	</div>

            	 <div class="accordion-group">
            		<div class="accordion-heading">
            			<a class="accordion-toggle" data-parent="#accordion-13465" data-toggle="collapse" href="#accordion-element-212076">权限管理</a>
            		</div>
            		<div class="accordion-body{x2;if:$method == 'questions' || $method == 'rowsquestions'} in{x2;endif} collapse" id="accordion-element-212076">
            			<div class="accordion-inner">
            				<ul class="unstyled">
            					<li><a href="/admin/user/permission">设置权限</a></li>
            					<li><a href="/admin/user/resourcelist">权限列表</a></li>
            				</ul>
            			</div>
            		</div>
            	</div>
            	
            </div> 
		</div>
		<div class="span10">
			<ul class="breadcrumb">
				<li><a href="index.php?core-master">用户管理系统</a> <span class="divider">/</span></li>
				<li class="active">权限管理</li>
			</ul>
			<div class="row-fluid">
				<div class="span6">
					
				
			</div>
		</div>
 <div class="panel panel-default col-md-10">
      <!-- Default panel contents -->
      <div class="panel-heading"><?php echo $name->name;?>权限 <a href="/admin/user/aclresource?id=<?php echo $name->id; ?>" style="float:right">增加权限</a></div>
         <!-- Table -->
         <table class="table table-striped table-bordered table-hover dataTables-example" style="vertical-align: middle;text-align:center;">
      <tr>
            <th style='vertical-align: middle;text-align: center;'>ID</th>
            <th style='vertical-align: middle;text-align: center;'>资源描述</th>
            <th style='vertical-align: middle;text-align: center;'>类型</th>
            <th style='vertical-align: middle;text-align: center;'>类名</th>
            <th style='vertical-align: middle;text-align: center;'>方法</th>
            
            <th colspan='2' style='vertical-align: middle;text-align: center;'>权限操作</th>
            
      </tr>
      <?php if($ret){foreach($ret as $val):?>
            <tr>
                 
                  <td style='vertical-align: middle;text-align: center;'><?php echo $val->id;?></td>
                  <td style='vertical-align: middle;text-align: center;'><?php echo $val->description;?></td>
                  <td style='vertical-align: middle;text-align: center;'><?php echo $val->rsc_class;?></td>
                  <td style='vertical-align: middle;text-align: center;'><?php echo $val->rsc_function;?></td>
                  <td style='vertical-align: middle;text-align: center;'><?php echo $val->rsc_action;?></td>
                 
                  <td style='vertical-align: middle;text-align: center;'>删除  </td>
                  <td style='vertical-align: middle;text-align: center;'><a href="#">修改<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></a></td>
            
            </tr>
            <?php endforeach; }?>
      </table>

</div>
	</div>
</div>


 

