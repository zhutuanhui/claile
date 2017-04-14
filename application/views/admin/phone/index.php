 <style>
        .pagetest{display:inline-block;padding:0;margin:20px 0;border-radius:4px;float:right;}
        .pagetestli{box-sizing: border-box;text-align: -webkit-match-parent;}
        .pagetestli a{position: relative;
              border-radius:10px;
              float: left;
              padding: 6px 12px;
              margin-left: -1px;
              line-height: 1.42857143;
              color: #428bca;
              text-decoration: none;
              background-color: #fff;
              border: 1px solid #ddd;}
      .pagetestli strong{position: relative;
              float: left;
              padding: 6px 12px;
              margin-left: -1px;
              line-height: 1.42857143;
              color: cyan;
              text-decoration: none;
              background-color: #fff;
              border: 1px solid #ddd;}
    </style>
<div class="span6">

         <span class="label label-success">联系人列表</span>
			<span class="label label-default">添加联系人</span>
			<span class="qiehuan"><?php echo $qiehuan;?></span>        
                           <table class="table">
                              <caption>响应式表格布局</caption>
                              <thead>
                                 <tr>
                                    <th>联系人</th>
                                    <th>电话号码</th>
                                    <th>联系时间</th>
                                    <th>发送短信</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php foreach($ret as $val): ?> 
                                 <tr style="background:rgb(<?php echo rand(200,250).','.rand(220,250).','.rand(220,250); ?>)">
                                    <td><?php echo $val->name;?></td>
                                    <td><?php echo $val->phone;?></td>
                                    <td><?php echo date("Y-m-d",$val->createtime);?></td>
                                    <td><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></td>
                                 </tr>
                               <?php  endforeach;?>
                              </tbody>

                           </table>
                                 <nav>
                                   <ul class="pagetest">
                                     <li class="pagetestli" style="list-style-type:none">
                                       <?php echo $this->pagination->create_links();?>
                                     </li>
                                   </ul>
                               </nav>
   
               <div class="phoneadd">
                     <ul class="nav nav-tabs">
                        <li class="active">
                              <a href="#">添加联系人</a>
                        </li>
                        <li class="dropdown pull-right">
                        <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                              <!-- <a href="index.php?exam-master-basic-area&page={x2;$page}{x2;$u}"></a> -->
                        </li>
                  </ul>
              <form action="/admin/phone/phoneadd" method="post" class="form-horizontal">
                        <fieldset>
                        <div class="control-group">
                              <label for="area" class="control-label">联系人：</label>
                              <div class="controls">
                                    <input name="args[name]" id="area" type="text" value="" needle="needle" msg="请输入用户名称" />
                              </div>
                        </div>
                        <div class="control-group">
                              <label for="areacode" class="control-label">手机号：</label>
                              <div class="controls">
                                    <input name="args[phone]" id="areacode" type="text" value="" needle="needle" msg="请输入用户密码" />
                              </div>
                        </div>
                         <div class="control-group">
                              <label for="areacode" class="control-label">email：</label>
                              <div class="controls">
                                    <input name="args[email]" id="areacode" type="text" value="" needle="needle" msg="请输入用户邮箱" />
                              </div>
                        </div>
                      <!--   <div id="choicebox" class="control-group">
                              <label for="questchoice" class="control-label">选择用户组：</label>
                              <div class="controls">
                                    <select class="combox" name="args[group]" id="questchoice">
                                    <?php foreach($ret as $val){?>
                                          <option value="<?php echo $val->id;?>"><?php echo $val->name;?></option>
                                         <?php }?>
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
			<!-- <blockquote>
				<p>
					联系人列表
				</p> <small>关键词 <cite>开源</cite></small>
			</blockquote> -->
		</div>
	</div>
</div>
<script>
   $(function()
   {
      if($('.qiehuan').html() =='add')
      {
         $('table').hide();
      }else
      {
         $('.phoneadd').hide();
      }
      $('.qiehuan').hide();
      $('.label-success').click(function(){
         $('table').show("fast");
         $('.phoneadd').hide();
      });
      $('.label-default').click(function(){
         $('table').hide();
         $('.phoneadd').show("fast");
      });
   })
</script>