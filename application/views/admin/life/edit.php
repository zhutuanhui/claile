 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
 
<style>
#imghead {filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image);}
#preview{border:1px solid #FFF;overflow:hidden;}
</style>
<link href="/public/admin/styles/css/plugin.css" rel="stylesheet">

 <script type="text/javascript" charset="utf-8" src="/public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/public/ueditor/lang/zh-cn/zh-cn.js"></script>

</head>

<div class="container-fluid">
  <div class="row-fluid">
    <div class="span2">
      
            <div class="accordion" id="accordion-13465">
              <div class="accordion-group">
                <div class="accordion-heading">
                  <a class="accordion-toggle" data-parent="#accordion-13465" data-toggle="collapse" href="#accordion-element-707348">点滴生活</a>
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
        <li><a href="/admin/show/index">全局</a> <span class="divider">/</span></li>
        <li class="active">我的生活记录</li>
      </ul>
      <div class="row-fluid">
        <div class="span6">
          <div class="well">
            <h5>
              修改新生活状态
            </h5>
          </div>
        </div>
        
      </div>
                 
                 <form action="/admin/life/doedit" method="post" enctype="multipart/form-data">
                 <input type="hidden" value="<?php echo $ret->lifeid;?>" name="lifeid">
                      <div class="form-group">
                      <label for="name">修改内容</label>
                      <textarea class="form-control" rows="10" name="content"><?php echo $ret->content;?></textarea>
                    </div> 
                  <input id="file0" type="file" name="img" style="display:none" onchange="previewImage(this)" multiple="multiple" >
                  <div class="input-append">
                  <input id="photoCover" class="input-large" name = "imgname" type="text" style="height:30px;" value="<?php echo $ret->img;?>">
                    <a class="btn" onclick="$('input[id=file0]').click();">请选择图片</a>
                  </div>
                  <script type="text/javascript">
                    $('input[id=file0]').change(function()
                     {
                          $('#photoCover').val($(this).val());
                    });
                    </script>
              <div class="col-sm-6 col-md-3" id="preview">
                     <img id="img0" src="<?php echo $ret->img;?>" 
                     alt="请选择要上传的图像" onclick="$('input[id=lefile]').click();">
               </div>
                 <ul class="breadcrumb">
                  <button class="btn btn-primary" type="submit">修改生活记录</button>

            </ul>
             </div>
           
      </div>
</div>
                  </div>
                  </form>
            </div>

    <script>
        $(function()
        {
          $("#file0").change(function(){
          var objUrl = getObjectURL(this.files[0]) ;
          console.log("objUrl = "+objUrl) ;
          if (objUrl) {
            $("#img0").attr("src", objUrl);
          }
          }) ;
          //建立一個可存取到該file的url
          function getObjectURL(file) {
            var url = null ; 
            if (window.createObjectURL!=undefined) { // basic
              url = window.createObjectURL(file) ;
            } else if (window.URL!=undefined) { // mozilla(firefox)
              url = window.URL.createObjectURL(file) ;
            } else if (window.webkitURL!=undefined) { // webkit or chrome
              url = window.webkitURL.createObjectURL(file) ;
            }
            return url ;
          }
        })  

      </script>
    </div>
  </div>
</div>


 

