<div class="span6">
			    <span class="label label-success">短信列表</span>
			<span class="label label-default">编辑短信</span>
			 <table class="table">
                              <caption>响应式表格布局</caption>
                              <thead>
                                 <tr>
                                    <th>短信内容</th>
                                    <th>发送人数</th>
                                    <th>发送状态</th>
                                    <th>编辑时间</th>
                                    <th>审核</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php foreach($messages as $val): ?> 
                                 <tr style="background:rgb(<?php echo rand(200,250).','.rand(220,250).','.rand(220,250); ?>)">
                                    <td><?php echo $val->content;?></td>
                                    <td><?php echo $val->count;?></td>
                                    <td><?php echo $status[$val->status];?></td>
                                    <td><?php echo date("Y-m-d",$val->createtime);?></td>
                                    <td><?php if($val->check==1){echo "已审核";}else{?>
										<span onclick="check(<?php echo $val->id;?>)">未审核</span>
										<?php } ?>
                                    </td>
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
                              <a href="#">编辑短信</a>
                        </li>
                        <li class="dropdown pull-right">
                        <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                              <!-- <a href="index.php?exam-master-basic-area&page={x2;$page}{x2;$u}"></a> -->
                        </li>
                  </ul>
              <form  role="form"  action="/admin/message/send" method="post">
                  <label for="name">请选择要发送的手机号</label>
			      <select multiple class="form-control" name="phone1[]">
			      <?php foreach($ret as $val):?>
			         <option value=<?php echo $val->phone;?>><?php echo $val->name.'---------'.$val->phone;?></option>
			     <?php endforeach;?>
			      </select>
               <div class="form-group">
                 <label for="name">手动输入手机号,多个手机号用逗号隔开</label>
                 <input type="text" name="phone" class="form-control" placeholder="18818555014,18818333014">
               </div>
                <div class="form-group">
                 <label for="name">编辑短信内容</label>
                 <textarea name="content" class="form-control" rows="3"></textarea>
               </div>
               <button class="btn btn-primary" type="submit">提交</button>
              </form>
             </div>
		</div>
	</div>
</div>
<script>
   $(function()
   {
         $('.phoneadd').hide();
      $('.label-success').click(function(){
         $('table').show("fast");
         $('.phoneadd').hide();
      });
      $('.label-default').click(function(){
         $('table').hide();
         $('.phoneadd').show("fast");
      });
   })
   function check(rid)
    {
      var r=confirm("您确定这条短信通过吗？")
      if (r==true)
      {
         if(rid)
        {
          $.post('/admin/message/check',{'rid':rid},function(data){
              if(data==200)
                {
                    alert("发送成功");
                   window.location.reload();
                }else{
                  alert("审核失败");
                }
          },'json')
        }
      }
    }
</script>
