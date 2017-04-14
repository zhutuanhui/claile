 
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
				<li class="active">添加用户组</li>
			</ul>
			<div class="row-fluid">
				<div class="span6">
					
				
			</div>
		</div>
 <div class="span10" id="datacontent">

                  <ul class="nav nav-tabs">
                        <li class="active">
                              <a href="#">添加用户组</a>
                        </li>
                        <li class="dropdown pull-right">
                        <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                              <!-- <a href="index.php?exam-master-basic-area&page={x2;$page}{x2;$u}"></a> -->
                        </li>
                  </ul>
              <form action="/admin/user/dogroupadd" method="post" class="form-horizontal">
                        <fieldset>
                        <div class="control-group">
                              <label for="area" class="control-label">用户组名：</label>
                              <div class="controls">
                                    <input name="args[name]" id="area" type="text" value="" needle="needle" msg="请输入用户名称" />
                              </div>
                        </div>
                        <div class="control-group">
                              <label for="areacode" class="control-label">用户组描述：</label>
                              <div class="controls">
                                    <input name="args[description]" id="areacode" type="text" value="" needle="needle" msg="请输入对用户组的说明" />
                              </div>
                        </div>
                       <!--  <div id="choicebox" class="control-group">
                              <label for="questchoice" class="control-label">选择用户组：</label>
                              <div class="controls">
                                    <select class="combox" name="args[group]" id="questchoice">
                                          <option value="1">普通用户</option>
                                          <option value="2">管理员</option>
                                          <option value="3">超级管理员</option>
                                          <option value="4">特殊者</option>
                                    </select>
                                
                              </div>
                        </div> -->
                        <div class="control-group">
                              <div class="controls">
                                    <button class="btn btn-primary" type="submit">提交</button>
                                    <input type="hidden" name="insertarea" value="1"/>
                                    <input type="hidden" name="page" value=""/>
                              </div>
                        </div>
                        </fieldset>
                  </form>
     

</div>
	</div>
</div>


 

