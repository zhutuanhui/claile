<div class="span6">
			    <span class="label label-success">邮件列表</span>
			<span class="label label-default">编辑邮件</span>
			 <table class="table">
                              <caption>响应式表格布局</caption>
                              <thead>
                                 <tr>
                                    <th>发送邮箱</th>
                                    <th>发送人数</th>
                                    <th>发送状态</th>
                                    <th>编辑时间</th>
                                    <th>审核</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php if($email){foreach($email as $val): ?> 
                                 <tr style="background:rgb(<?php echo rand(200,250).','.rand(220,250).','.rand(220,250); ?>)">
                                    <td><?php echo $val->title;?></td>
                                    <td><?php echo $val->count;?></td>
                                    <td><?php echo $val->status;?></td>
                                    <td><?php echo date("Y-m-d",$val->createtime);?></td>
                                    <td><?php if($val->check==1){echo "已审核";}else{?>
										<span onclick="check(<?php echo $val->id;?>)">未审核</span>
										<?php } ?>
                                    </td>
                                 </tr>
                               <?php  endforeach;}?>
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
                              <a href="#">编辑邮件</a>
                        </li>
                        <li class="dropdown pull-right">
                        <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                              <!-- <a href="index.php?exam-master-basic-area&page={x2;$page}{x2;$u}"></a> -->
                        </li>
                  </ul>
              <form  role="form"  action="/admin/message/doemail" method="post">
                  <label for="name">请选择要发送的邮件人</label>
			      <select multiple class="form-control" name="email[]">
			      <?php foreach($ret as $val):?>
			         <option value=<?php echo $val->phone;?>><?php echo $val->name.'---------'.$val->phone;?></option>
			     <?php endforeach;?>
			      </select>
               <div class="form-group">
                 <label for="name">或者手动输入邮箱,多个邮箱用英文逗号隔开</label>
                 <input type="text" name="email" class="form-control" placeholder="####@qq.com,###@163.com">
               </div>
                <div class="form-group">
                 <label for="name">邮件标题</label>
                 <input type="text" name="title" class="form-control" placeholder="请您输入邮件标题">
               </div>
                <div class="form-group">
                 <label for="name">编辑邮箱内容</label>
                 <textarea name="contents" class="form-control" rows="3"></textarea>
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
      var r=confirm("您确定这封邮件吗？")
      if (r==true)
      {
         if(rid)
        {
          $.post('/admin/message/checkemail',{'rid':rid},function(data){
              if(data==200)
                {
                   alert("审核成功");
                   window.location.reload();
                }else{
                  alert("审核失败");
                }
          },'json')
        }
      }
    }
</script>
