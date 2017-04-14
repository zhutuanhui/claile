 

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
				<li class="active">用户组列表</li>
			</ul>
			<div class="row-fluid">
				<div class="span6">
					
				
			</div>
		</div>
 <div class="panel panel-default col-md-10">
      <!-- Default panel contents -->
      <div class="panel-heading">用户组列表<a href="/admin/user/groupadd" style="float:right">增加角色</a></div>
         <!-- Table -->
         <table class="table table-striped table-bordered table-hover dataTables-example">
      <tr>

            <th>用户组ID</th>
            <th>用户组名</th>
            
            <th>用户描述</th>
            <th>权限设置</th>
            <th colspan='2' style='vertical-align: middle;text-align: center;'>操作</th>
            
      </tr>
      <?php foreach($ret as $val):?>
            <tr>
                  <td><?php echo $val->id;?></td>
                  <td><?php echo $val->name;?></td>
                  
                  <td>
                  <?php echo $val->description;?>
                  </td>
                   <td><a href="/admin/user/authorization?id=<?php echo $val->id;?>"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></a></td>
                  <td><a href="/admin/oprate/editrole?id=<?php echo $val->id;?>">编辑</a></td>

                  <td><a href="#">删除</a></td>
            
            </tr>
            <?php endforeach; ?>
      </table>

</div>
	</div>
</div>


 

