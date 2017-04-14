 

<link href="/public/admin/styles/css/plugin.css" rel="stylesheet">




		
<div class="container-fluid">
      <div class="row-fluid">
            <div class="span2">
                  
            <div class="accordion" id="accordion-13465">
                  <div class="accordion-group">
                        <div class="accordion-heading">
                              <a class="accordion-toggle" data-parent="#accordion-13465" data-toggle="collapse" href="#accordion-element-707348">我的生活</a>
                        </div>
                        <div class="accordion-body{x2;if:$method == 'basic'} in{x2;endif} collapse" id="accordion-element-707348">
                              <div class="accordion-inner">
                                    <ul class="unstyled">
                                          <li><a href="/admin/life/lifelist">生活记录</a></li> 
                                          <li><a href="/admin/life/index">添加记录</a></li>
                                    </ul>
                              </div>
                        </div>
                  </div>
           
            </div> 
            </div>
		<div class="span10">
			<ul class="breadcrumb">
				<li><a href="index.php?core-master">生活记录</a> <span class="divider">/</span></li>
				<li class="active">记录列表</li>
			</ul>
			<div class="row-fluid">
				<div class="span6">
					
				
			</div>
		</div>
 <div class="panel panel-default col-md-10">
      <!-- Default panel contents -->
      <div class="panel-heading">生活记录 <a href="/admin/life/index" style="float:right">增加记录</a></div>
         <!-- Table -->
         <table class="table table-striped table-bordered table-hover dataTables-example" style="vertical-align: middle;text-align:center;">
      <tr>
            <th style='vertical-align: middle;text-align: center;'>ID</th>
            <th style='vertical-align: middle;text-align: center;'>作者</th>
            <th style='vertical-align: middle;text-align: center;'>创建时间</th>
            <th style='vertical-align: middle;text-align: center;'>发表ip</th>
            
            <th colspan='2' style='vertical-align: middle;text-align: center;'>权限操作</th>
            
      </tr>
      <?php if($ret){foreach($ret as $val):?>
            <tr>
                 
                  <td style='vertical-align: middle;text-align: center;'><?php echo $val->lifeid;?></td>
                  <td style='vertical-align: middle;text-align: center;'><?php echo $val->name;?></td>
                  <td style='vertical-align: middle;text-align: center;'><?php echo $val->createtime;?></td>
                  <td style='vertical-align: middle;text-align: center;'><?php echo long2ip($val->ip);?></td>
                 
                  <td style='vertical-align: middle;text-align: center;'><a href="/admin/life/dellife?id=<?php echo $val->lifeid;?>">删除 </a> </td>
                  <td style='vertical-align: middle;text-align: center;'><a href="/admin/life/edit?id=<?php echo $val->lifeid;?>">修改<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></a></td>
            
            </tr>
            <?php endforeach; } ?>
      </table>

</div>
	</div>
</div>


 

