 
<link href="/public/admin/styles/css/plugin.css" rel="stylesheet">


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
            					<li><a href="admin/user/groupadd">添加用户组</a></li>
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
				<li class="active">添加用户</li>
			</ul>
			<div class="row-fluid">
				<div class="span6">
					
				
			</div>
		</div>
 <div class="span10" id="datacontent">

                  <ul class="nav nav-tabs">
                        <li class="active">
                              <a href="#">添加用户</a>
                        </li>
                        <li class="dropdown pull-right">
                        <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                              <!-- <a href="index.php?exam-master-basic-area&page={x2;$page}{x2;$u}"></a> -->
                        </li>
                  </ul>
              <form action="/admin/oprate/doeditresource" method="post" class="form-horizontal">
                        <fieldset>
                        <div class="control-group">
                              <label for="area" class="control-label">资源名称</label>
                              <div class="controls">
                                    <input name="args[description]" id="area" type="text" value="<?php echo $ret->description;?>" needle="needle" msg="请输入用户名称" />
                              </div>
                        </div>
                        <div class="control-group">
                              <label for="areacode" class="control-label">类行</label>
                              <div class="controls">
                                    <input name="args[rsc_class]" id="areacode" type="text" value="<?php echo $ret->rsc_class;?>" needle="needle" msg="请输入用户密码" />
                              </div>
                        </div> 
                        <div class="control-group">
                              <label for="areacode" class="control-label">类名</label>
                              <div class="controls">
                                    <input name="args[rsc_function]" id="areacode" type="text" value="<?php echo $ret->rsc_function;?>" needle="needle" msg="请输入类名" />
                              </div>
                        </div> 
                        <div class="control-group">
                              <label for="areacode" class="control-label">方法名</label>
                              <div class="controls">
                                    <input name="args[rsc_action]" id="areacode" type="text" value="<?php echo $ret->rsc_action;?>" needle="needle" msg="请输入方法名称" />
                              </div>
                        </div>
                   
                        <div class="control-group">
                              <label for="areacode" class="control-label">资源路径</label>
                              <div class="controls">
                                    <input name="args[rsc_view]" id="areacode" type="text" value="<?php echo $ret->rsc_view;?>" needle="needle" msg="请输入方法名称" />
                              </div>
                        </div>
                        <div class="control-group">
                              <div class="controls">
                              <input name="id" value="<?php echo $ret->id;?>" type="hidden">
                                    <button class="btn btn-primary" type="submit">提交</button>
                               
                              </div>
                        </div>
                        </fieldset>
                  </form>
     

</div>
	</div>
</div>
</html>



 

