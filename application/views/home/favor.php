   <style>
    .bqhuo{cursor:pointer; }
     a:hover { text-decoration:none;} 
   </style>
    <div class="extra">
        	  <div class="l" style="padding-top:1px;" id="temp_case"><i class="ico ico-4"></i>最美的童话世界</div>
            <div class="r" id="h_login_info" style="padding-top:1px;">
				<!-- <a class="btn btn-normal-1 zhenggao" href="/zt/yuegao/index.html" target="_blank" rel="nofollow"><i class="ico ico-zhenggao"></i>征稿</a> -->
                <!--<a class="btn btn-normal-1 bg-gray-1 txt-gray" href="/author/" rel="nofollow"><i class="ico ico-3"></i>注册</a>
                <span class="line"></span>
                <a href="javascript:;" class="userLogin" rel="nofollow"><b>登录</b></a>
                <a href="/user/register.aspx" rel="nofollow"><b>注册</b></a>-->
            </div>
        </div>
    </header>
  <!--第二栏-->
  <div id="pbody" class="extra">
        <div class="extra">
        <div class="pt-1-5 clearfix">
            <div class="w-74-5"><div class="bg-box-gray h-24-5 clearfix">
                <div class="t-2 pl-1 pr-1">
                    <h3><i class="ico ico-50"></i>童话城</h3>
                    <div class="fun"><a class="more" href="/home/more?type=xin  ">我的童话世界>></a></div>
                </div>
                <div class="pt-1-5  pl-1 mt-0-5 ">
                <ul id="fenlei"> 
                    <li>             
                        <div class="pl-1 mt-0-5 clearfix">
                            <div class="l mt-0-5 "><b>分类:</b></div>
                            <a href="javascript:;" name="0" class="bg-gray-200 leibie ml-2-5">全部</a>
                            <?php forach($bq as $k=>$v)?>
                            <a href="javascript:;" name="{/$vo.id/}" class="leibie ml-1-5"><b>{/$vo.bqname/}</b></a>
                            <?php endforeach;?>                        </div>
                         <div class="pl-1 mt-3 clearfix">
                         <div class="l mt-0-5 "><b>更新时间:</b></div>
                            <a href="javascript:;" name="0" class="bg-gray-200 leibie ml-2-5">不限</a>
                            <a href="javascript:;" name="1_1" class="leibie ml-1-5"><b>今天</b></a>
                            <a href="javascript:;" name="1_3" class="leibie ml-1-5"><b>三天内</b></a>
                            <a href="javascript:;" name="1_7" class="leibie ml-1-5"><b>七天内</b></a>
                            <a href="javascript:;" name="1_30" class="leibie ml-1-5"><b>一月内</b></a>
                        </div>
                         <div class="pl-1 mt-3 clearfix">
                         <div class="l mt-0-5 "><b>是否免费:</b></div>
                            <a href="javascript:;" name="0" class="bg-gray-200 leibie ml-2-5">不限</a>
                            <a href="javascript:;" name="free" class="leibie ml-1-5"><b>免费</b></a>
                        </div>
                         <div class="pl-1 mt-3 clearfix">
                         <div class="l mt-0-5 "><b>是否完结:</b></div>
                            <a href="javascript:;" name="0" class="bg-gray-200 leibie ml-2-5">不限</a>
                            <a href="javascript:;" name="yi" class="leibie ml-1-5"><b>已完结</b></a>
                            <a href="javascript:;" name="wei" class="leibie ml-1-5"><b>未完结</b></a>
                        </div>
                    </li>
                </ul>
                </div>
            </div></div>
                <script>
                    $(function(){
                    //     $('#fenlei a').click(function(){
                    //         $(this).addClass('bg-gray-200');
                    //         $(this).siblings('a').removeClass('bg-gray-200');
                    //         var btns = new Array(); //或者写成：var btns= [];
                    //         $('.bg-gray-200').each(function(key,value){
                    //              btns[key] = $(this).attr('name');
                    //         });
                    //         $.ajax({
                    //             type:"post",
                    //             dataType: "json",
                    //             url:"{/U('index/ajaxsx')/}",
                    //             data:{'data':btns},
                    //             success:function(result){
                    //                 if(result){
                    //                     var html = '';
                    //                     $.each(result.data , function(key, val) {  
                    //                      html +="<li class='clearfix'><div class='w-42'><a class='txt-gray' href='http://www.ycsd.cn/book/tc_82.html'>[ "+val['bqname']+" ]</a><a class='txt-red' href='/home/index/detail/book/"+val['bookid']+"'>《"+val['bookname']+"》</a><a class='txt-black' href='http://www.ycsd.cn/vip/read/3749_956330.html'>第"+val['orderid']+"章；"+val['title']+"</a></div><div class='w-28 r'><a href='/w/1620300/' target='_blank'>"+val['author']+"</a><span>&nbsp;&nbsp;更新中&nbsp;&nbsp;</span><span></span></div></li>";
                    //                     }); 
                    //                     var page = "<div class='pagepages'>"+result.page+"";
                    //                     $('#ajaxbook').empty();
                    //                     $('#ajaxbook').append(html);
                    //                     $('#ajaxbook').append(page);
                    //                 }else{
                    //                     $('#ajaxbook').empty();
                    //                 }

                    //             },
                    //             error:function(){
                    //                 alert('筛选失败');
                    //             }   
                    //         });

                    //     })
                     })
                </script>


            <div class="w-21-5 r">
            <div class="bg-box h-24-5 clearfix">
                <div class="t-1"><h3><i class="ico ico-7"></i>畅销榜</h3></div>
                <div class="tab-rank j_tabs"><a>周</a><a>月</a></div>
                <div class="h-42 tab-rank-panne pl-1 pr-1 pt-1">
                    <div class="list-rank j_tabCnt">
                        <ul>                
        {/foreach from=$cx item=vo key=k/} 
                        {/if $k<=3/}            
                        {/if $k==0/}            
            <li class="first">
                <div class="num"><i class="ico ico-circle-red">1</i></div>
                <div class="ml-2-5 clearfix">
                    <a class="pic" href="/home/index/detail/book/{/$vo.id/}"><img src="/Public/Uploads/{/$vo.img/}" alt="{/$bookname/}" /></a>
                    <div class="desc">
                        <strong><a href="/home/index/detail/book/{/$vo.id/}" target="_blank">{/$vo.bookname/}</a></strong>
                        <p class="cnt">作者：<a class="txt-brown" href="/w/0/">{/$vo.author/}</a><br /><br/>
                            {/$vo.content|truncate:10:"..."/}</p>
                    </div>
                </div>
            </li>
            {/else/}
                <li><div class="num">{/if $k>2/}<i class="ico ico-circle-gray">{/else/}<i class="ico ico-circle-red">{//if/}{/$k+1/}</i></div>
                    <a href="/home/index/detail/book/{/$vo.id/}" target="_blank">{/$vo.bookname/}</a>
                </li>
                {//if/}
                {//if/}

                {//foreach/}
                
            </ul>
                        <div class="more"><a href="/home/more?type=Cx">·更多>></a></div>
                    </div>
                    <!-- <div class="list-rank j_tabCnt">
                        <ul>                
             {/foreach from=$cx item=vo key=k/}  

                        {/if $k==0/}            
            <li class="first">
                <div class="num"><i class="ico ico-circle-red">1</i></div>
                <div class="ml-2-5 clearfix">
                    <a class="pic" href="/home/index/detail/book/{/$vo.id/}"><img src="/Public/Uploads/{/$vo.img/}" alt="{/$bookname/}" /></a>
                    <div class="desc">
                        <strong><a href="/home/index/detail/book/{/$vo.id/}" target="_blank">{/$vo.bookname/}</a></strong>
                        <p class="cnt">作者：<a class="txt-brown" href="/w/0/">{/$vo.author/}</a><br /><br/>
                            {/$vo.content|truncate:10:"..."/}</p>
                    </div>
                </div>
            </li>
            {/else/}
                <li><div class="num">{/if $k>2/}<i class="ico ico-circle-gray">{/else/}<i class="ico ico-circle-red">{//if/}{/$k+1/}</i></div>
                    <a href="/home/index/detail/book/{/$vo.id/}" target="_blank">{/$vo.bookname/}</a>
                </li>
                {//if/}

                {//foreach/}
</ul>
                        <div class="more"><a href="/home/more?type=Cx">·更多>></a></div>
                    </div> -->
                </div>
            </div></div>
        </div>  
         <!--第三栏-->
        <div class="pt-1-5 clearfix">
        	<div class="w-74-5"><div class="bg-box clearfix" style="height:967px;">
                <div class="t-2 pl-1 pr-1">
                <h3>
                <ul>
                <li style="float:left;margin-left:10px"><span>分类</span></li>
                <li style="float:left;margin-left:20px"><span>书名</span></li>
                <li style="float:right;margin-right:10px"><span>更新时间</span></li>
                <li style="float:right;margin-right:10px"><span>状态</span></li>
                <li style="float:right;margin-right:30px"><span>作者</span></li>
                </h3>
                </div>
                <div class="tab-update-panne h-92 pl-1 pr-1 pt-0-5">
                    <div class="list-bk-txt-1 j_tabCnt">
        <ul id="ajaxbook">                         
          <!--   {/foreach from=$book item=val/}
             <li class="clearfix">
                <div class="w-42">
                    <a class="txt-gray" href="http://www.ycsd.cn/book/tc_82.html">[ {/$val.bqname/} ]</a>
                    <a class="txt-red" href="/home/index/detail/book/{/$val.id/}">《{/$val.bookname/}》</a><a class="txt-black" href="http://www.ycsd.cn/vip/read/3749_956330.html">第{/$val.orderid/}章；{/$val.title/}</a>
                </div>
                <div class="w-28 r">
                    <a href="/w/1620300/" target="_blank">{/$val.author/}</a><span>&nbsp;&nbsp;更新中&nbsp;&nbsp;</span><span>{/$val.addtime|date_format:"%Y-%m-%d"/}</span>
                </div>
           </li>
         {//foreach/}
         {/$page/} -->
        </ul>
        <style>
            .current{float:left;margin-right:5px;color:red;}
        </style>
           <style>
        .pagination{box-sizing: border-box;text-align: -webkit-match-parent;}
        .pagination li{float:left;padding:0px;}
        .pagination .active a{background:cyan;}
        .pagination li a{position: relative;
              float: left;
              padding: 6px 12px;
              margin-left: -1px;
              line-height: 1.42857143;
              color: #428bca;
              text-decoration: none;
              background-color: #fff;
              border: 1px solid #ddd;}
      .pagination li span{position: relative;
              float: left;
              padding: 6px 12px;
              margin-left: -1px;
              line-height: 1.42857143;
              color: cyan;
              text-decoration: none;
              background-color: #fff;
              border: 1px solid #ddd;}
    </style>
         <script>
                // $(function(){
                //       ajax_get_table('search-form2',1);
                    
                // })
                </script>
                <script>
       //          $('#fenlei a').click(function(){
       //                      $(this).addClass('bg-gray-200');
       //                      $(this).siblings('a').removeClass('bg-gray-200');
       //                      ajax_get_table('search-form2',1);
       //                  })
       // function ajax_get_table(form,page){
       //                   var btns = new Array(); 
       //                      $('.bg-gray-200').each(function(key,value){
       //                           btns[key] = $(this).attr('name');
       //                      });
       //                   $.ajax({
       //                      type:"post",
       //                      dataType: "html",
       //                      url:"/home/index/ajaxpages/p/"+page,
       //                      data:{'data':btns,'pages':page,},
       //                      success:function(result){
       //                          if(result){
       //                              $('#ajaxbook').empty();
       //                              $('#ajaxbook').html(result);
       //                          }
       //                      },
       //                      error:function(){
       //                          alert('筛选失败');
       //                      } 
       //                  });
       //              }
</script> 

                    </div>
                </div>
            </div></div>
            <div class="w-21-5 r">
                <div class="bg-box h-47-5 clearfix">
                    <div class="t-1"><h3><i class="ico ico-7"></i>点击榜</h3></div>
                    <div class="tab-rank j_tabs"><a>周</a><a>月</a><a>总</a></div>
                    <div class="h-42 tab-rank-panne pl-1 pr-1 pt-1">
                        <div class="list-rank j_tabCnt">
                            <ul>                
            {/foreach from=$dianJi item=vo key=k/}  
                        {/if $k==0/}                  
              <li class="first">
                <div class="num"><i class="ico ico-circle-red">1</i></div>
                <div class="ml-2-5 clearfix">
                    <a class="pic" href="/home/index/detail/book/{/$vo.id/}"><img src="/Public/Uploads/{/$vo.img/}" alt="{/$bookname/}" /></a>
                    <div class="desc">
                        <strong><a href="/home/index/detail/book/{/$vo.id/}" target="_blank">{/$vo.bookname/}</a></strong>
                        <p class="cnt">作者：<a class="txt-brown" href="/w/0/">{/$vo.author/}</a><br /><br/>
                            {/$vo.content|truncate:10:"..."/}</p>
                    </div>
                </div>
            </li>

                {/else/}
                <li><div class="num">{/if $k>2/}<i class="ico ico-circle-gray">{/else/}<i class="ico ico-circle-red">{//if/}{/$k+1/}</i></div>
                    <a href="/home/index/detail/book/{/$vo.id/}" target="_blank">{/$vo.bookname/}</a>
                </li>
                {//if/}

                {//foreach/}       
</ul>
                            <div class="more"><a href="/home/more?type=DJ">·更多>></a></div>
                        </div>
                        <div class="list-rank j_tabCnt">
                            <ul>                
            {/foreach from=$dianJi item=vo key=k/}  
                        {/if $k==0/}                  
              <li class="first">
                <div class="num"><i class="ico ico-circle-red">1</i></div>
                <div class="ml-2-5 clearfix">
                    <a class="pic" href="/home/index/detail/book/{/$vo.id/}"><img src="/Public/Uploads/{/$vo.img/}" alt="{/$bookname/}" /></a>
                    <div class="desc">
                        <strong><a href="/home/index/detail/book/{/$vo.id/}" target="_blank">{/$vo.bookname/}</a></strong>
                        <p class="cnt">作者：<a class="txt-brown" href="/w/0/">{/$vo.author/}</a><br /><br/>
                            {/$vo.content|truncate:10:"..."/}</p>
                    </div>
                </div>
            </li>

                {/else/}
                <li><div class="num">{/if $k>2/}<i class="ico ico-circle-gray">{/else/}<i class="ico ico-circle-red">{//if/}{/$k+1/}</i></div>
                    <a href="/home/index/detail/book/{/$vo.id/}" target="_blank">{/$vo.bookname/}</a>
                </li>
                {//if/}

                {//foreach/}       
</ul>
                            <div class="more"><a href="/home/more?type=DJ">·更多>></a></div>
                        </div>
                        <div class="list-rank j_tabCnt">
                            <ul>                
             {/foreach from=$dianJi item=vo key=k/}  
                        {/if $k==0/}                  
              <li class="first">
                <div class="num"><i class="ico ico-circle-red">1</i></div>
                <div class="ml-2-5 clearfix">
                    <a class="pic" href="/home/index/detail/book/{/$vo.id/}"><img src="/Public/Uploads/{/$vo.img/}" alt="{/$bookname/}" /></a>
                    <div class="desc">
                        <strong><a href="/home/index/detail/book/{/$vo.id/}" target="_blank">{/$vo.bookname/}</a></strong>
                        <p class="cnt">作者：<a class="txt-brown" href="/w/0/">{/$vo.author/}</a><br /><br/>
                            {/$vo.content|truncate:10:"..."/}</p>
                    </div>
                </div>
            </li>

                {/else/}
                <li><div class="num">{/if $k>2/}<i class="ico ico-circle-gray">{/else/}<i class="ico ico-circle-red">{//if/}{/$k+1/}</i></div>
                    <a href="/home/index/detail/book/{/$vo.id/}" target="_blank">{/$vo.bookname/}</a>
                </li>
                {//if/}

                {//foreach/}       
</ul>
                            <div class="more"><a href="/home/more?type=DJ">·更多>></a></div>
                        </div>
                    </div>
                </div>
            	<div class="mt-1-5">
            	    <div class="bg-box h-47-5 clearfix">
                    <div class="t-1"><h3><i class="ico ico-7"></i>新书榜</h3></div>
                    <div class="h-42 tab-rank-panne pl-1 pr-1 pt-1">
                        <div class="list-rank j_tabCnt">
                            <ul>                
            {/foreach from=$xinBooks item=vo key=k/}                  
            {/if $k==0/}
            <li class="first">
                <div class="num"><i class="ico ico-circle-red">1</i></div>
                <div class="ml-2-5 clearfix">
                    <a class="pic" href="/home/index/detail/book/{/$vo.id/}"><img src="/Public/Uploads/{/$vo.img/}" alt="{/$vo.bookname/}" /></a>
                    <div class="desc">
                        <strong><a href="http://www.ycsd.cn/book/2392/" target="_blank">{/$vo.bookname/}</a></strong>
                        <p class="cnt">作者：<a class="txt-brown" href="/w/892508/">{/$vo.author/}</a><br />
                            {/$vo.content|truncate:15:"..."/}</p>
                    </div>
                </div>
            </li>
            {/else/}
            <li><div class="num">{/if $k>2/}<i class="ico ico-circle-gray">{/else/}<i class="ico ico-circle-red">{//if/}{/$k+1/}</i></div>
                    <a href="/home/index/detail/book/{/$vo.id/}" target="_blank">{/$vo.bookname/}</a>
                </li>
            {//if/}
        {//foreach/}
</ul>
                            <div class="more"><a href="/home/more?type=xin">·更多>></a></div>
                        </div>
                    </div>
                </div>
            	</div>
            </div>
        </div>
            
    </div>
    </div>
        </div>
        </div>
        </div>

     <script>
         $(function(){
             $('header nav ul li:eq(1)').addClass('current');
             // $('header nav ul li:eq(0)').deleteClass('current');
         })
 </script>
