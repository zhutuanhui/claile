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
              发表新生活状态
            </h5>
          </div>
        </div>
        
      </div>
                 
                 <form action="/admin/life/dolife" method="post" enctype="multipart/form-data">
                   <div class="control-group">
                             <!--  <div class="controls">
                                    <input name="title" id="area" type="text" style="height:35px;" value="" needle="needle" msg="请输入用户名称"   placeholder="标题在60字内"/>
                                     <select class="combox" name="args[group]" id="questchoice">
                                          <option value="">请选择类型</option>
                                          <option value="" selected>点滴生活</option>
                                          <option value="">歌词收集</option>
                                          <option value="">美文阅读</option>
                                          <option value="">我的学习</option>
                                    </select>
                              </div> -->
                              <div id="choicebox" class="control-group">
                              <div class="controls">
                              </div>
                        </div>
                        </div>
            
                       <div class="mws-form-row">
                                   
                    <div class="mws-form-item">
                        <script id="editor" name="content" type="text/plain" style="width:800px;height:500px;"></script>
                    </div>
                </div>     
            <div class="session2 clearfix">
                   
            </div>

                  <input id="file0" type="file" name="img" style="display:none" onchange="previewImage(this)" multiple="multiple">
                  <div class="input-append">
                  <input id="photoCover" class="input-large" name = "imgname" type="text" style="height:30px;">
                    <a class="btn" onclick="$('input[id=file0]').click();">请选择图片</a>
                  </div>
                  <script type="text/javascript">
                    $('input[id=file0]').change(function()
                     {
                          $('#photoCover').val($(this).val());
                    });
                    </script>
              <div class="col-sm-6 col-md-3" id="preview">
                     <img id="img0" src="/public/img/2.jpg" 
                     alt="请选择要上传的图像" onclick="$('input[id=lefile]').click();">
               </div>
                 <ul class="breadcrumb">
                  <button class="btn btn-primary" type="submit">添加生活记录</button>

            </ul>
             </div>
           
      </div>
</div>
                  </div>
                  </form>
            </div>
  <script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
    //当下拉框的值发生改变时
    </script>

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


 

