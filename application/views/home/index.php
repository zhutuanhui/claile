
<!doctype html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="render" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta http-equiv="Cache-Control" content="no-transform " />
<meta name="mobile-agent" content="format=html5; url=http://m.ycsd.cn">
<title>少儿书城_最新小说_书城-童话故事</title>
<meta name="keywords" content="少儿书城,最新小说" />
<meta name="description" content="少儿书城，儿童快乐之地，这里有你想要的故事，富含哲理，让儿童快乐成长" />
<link rel="stylesheet" type="text/css" href="/public/font/css/screen.css" />
<link rel="stylesheet" type="text/css" href="/public/font/css/main.css" />
<meta property="qc:admins" content="144006537761334636" />
<meta property="wb:webmaster" content="c8e5cb2c22dd9479" />
<meta name="360-site-verification" content="13b8caa7c6d6fc93ac01ac1ffa55e318" />
<!--[if lt IE 9]><script src="js/html5shiv.js"></script><![endif]-->
<!--[if IE 6]><script src="js/dd_belatedpng.js"></script><![endif]-->
<script type="text/javascript" src="/public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/public/js/jquery.plugin.js"></script>
<script type="text/javascript" src="/public/js/main.js"></script>
</head>
<body>
<div id="wrap">
<!--head-->	
	<header>
    	<div class="bg-line-black h-9"><div class="extra">
        	<h3><a href="http://www.claile.com/">少儿书城</a></h3>
            <nav>
            	<ul>
                	  <li><a href="">首页</a></li>
                    <!-- <li><a href="/home/index/books">书城</a></li> -->
                    <li><a href="/home/favor">童话城</a></li>
					<!-- <li><a href="" target="_blank" rel="nofollow"><i class="ico ico-fuli"></i>福利</a></li> -->
                    <!-- <li><a href="http://www.ycsd.cn/pay/" rel="nofollow"><i class="ico ico-1"></i>充值</a></li> -->
                </ul>
            </nav>
            <div class="box-sch">
				<form action="/home/search">
					<input class="text j_watermark" type="text" watermark="请输入关键字..." name="searchTxt" />
                <input class="submit" type="submit" value=" " />
              </form>
            </div>
        </div>
        </div>
        <div class="extra">
        	  <div class="l" id="temp_case"><i class="ico ico-4"></i>欢迎来到少儿书城</div>
            <div class="r" id="h_login_info">
				<!-- <a class="btn btn-normal-1 zhenggao" href="/zt/yuegao/index.html" target="_blank" rel="nofollow"><i class="ico ico-zhenggao"></i>征稿</a> -->
               <!--  <a class="btn btn-normal-1 bg-gray-1 txt-gray" href="/author/" rel="nofollow"><i class="ico ico-3"></i>注册</a>
                <span class="line"></span>
                <a href="javascript:;" class="userLogin" rel="nofollow"><b>登录</b></a> -->
               <!-- <a href="/user/register.aspx" rel="nofollow"><b>注册</b></a>-->
            </div>
        </div>
    </header>
<!--content-->
    <div id="pbody">
        <div class="extra">
        <!--第一栏-->
        <div class="pt-1-5 clearfix">
            <div class="w-74-5"><div class="bg-box-gray pt-1 h-40-5 clearfix">
                <div class="left slide">
                                    
        <div class="panne" id="j_slideCnt">
        <?php foreach($ret as $k=>$v):  if($v->week==2):?>
			
            <div class="slide-cnt">
                <div class="pic"><a href="/home/index/detail/book/<?php echo $v->id;?>"><img src="/public/<?php echo $v->img;?>" alt="<?php echo $v->bookname;?>" /></a></div>
                <strong class="t"><a href="/home/index/detail/book/<?php echo $v->id;?>">《<?php echo $v->bookname;?>》</a></strong>
                <div class="cnt"><?php echo $v->content;?>...</div>
                <!-- <div class="cnt">{/$vo.content|truncate:40:"---"/} </div> -->
            </div>
        <?php  endif; endforeach;?>
        </div>
        <div class="slide-tab" id="j_slide">
        <?php foreach($ret as $k=>$v):  if($v->week==2):?>

<a><img src="/public/<?php echo $v->img;?>" alt="<?php echo $v->bookname;?>" /></a>
        <?php  endif; endforeach;?>

 </div>
                    <div class="tips-bk"></div>
                </div>
                <div class="w-40-5 pr-1-5 right">
                	<ul class="push j_first"> 

<li>
<?php foreach($thbook as $k=>$v):if($k==0):?>
<strong><a href="/home/index/detail/book/<?php echo $v->id;?>"><?php echo $v->bookname;?></a></strong>
<div class="cnt">
<?php ;else:?>
<a href="/home/index/detail/book/<?php echo $v->id;?>"><?php echo $v->bookname;?></a>
<span>|</span>   
<?php endif;endforeach;?>
</div>
</li>
<li>
<?php foreach($yybook as $k=>$v):if($k==0):?>
<strong><a href="/home/index/detail/book/<?php echo $v->id;?>"><?php echo $v->bookname;?></a></strong>
<div class="cnt">
<?php ;else:?>
<a href="/home/index/detail/book/<?php echo $v->id;?>"><?php echo $v->bookname;?></a>
<span>|</span>   
<?php endif;endforeach;?>
</div>
</li>
<li>
<?php foreach($dwbook as $k=>$v):if($k==0):?>
<strong><a href="/home/index/detail/book/<?php echo $v->id;?>"><?php echo $v->bookname;?></a></strong>
<div class="cnt">
<?php ;else:?>
<a href="/home/index/detail/book/<?php echo $v->id;?>"><?php echo $v->bookname;?></a>
<span>|</span>   
<?php endif;endforeach;?>
</div>
</li>
</ul>
                    <div class="public-info">
                    	<div class="w-3"><i class="ico ico-6"></i></div>
                        <div class="panne">
                            <ul>                                      <li><a href="javascript:;">本站公告</a></li>
</ul>
                        </div>
                    </div>
                </div>
            </div></div>
            <div class="w-21-5 r"><div class="bg-box h-41-5 clearfix">
                <div class="t-1"><h3><i class="ico ico-7"></i>强推榜</h3></div>
                <div class="list-rank pl-1 pr-1 pt-1">
                    <ul>      
                    <?php foreach($tuijian as $k=>$v): if($k==0):?>
            <li class="first">
                <div class="num"><i class="ico ico-circle-red">1</i></div>
                <div class="ml-2-5 clearfix">
                    <a class="pic" href="/home/index/detail/book/{/$vo.id/}"><img src="/public/<?php echo $v->img;?>" alt="<?php echo $v->bookname;?>" /></a>
                    <div class="desc">
                        <strong><a href="/home/index/detail/book/{/$vo.id/}" target="_blank"><?php echo $v->bookname;?></a></strong>
                        <p class="cnt">作者：<a class="txt-brown" href="/w/0/"><?php echo $v->author;?></a><br /><br/>
                            <!-- {/$vo.content|truncate:10:"..."/}</p> -->
                    </div>
                </div>
            </li>
            <?php ;else:?>
                <li><div class="num"><?php if($k>2):?><i class="ico ico-circle-gray"><?php ;else:?><i class="ico ico-circle-red"><?php endif; $k+1;?></i></div>
                    <a href="/home/index/detail/book/{/$vo.id/}" target="_blank"><?php echo $v->bookname;?></a>
                </li>
                <?php endif; endforeach;?>


</ul>
                </div>
            </div></div>
        </div>
      
        <!--第二栏-->
        <div class="pt-1-5 clearfix">
        	<div class="w-74-5"><div class="bg-box h-47-5 clearfix">
                <div class="t-2 pl-1 pr-1">
                	<h3><i class="ico ico-8"></i>最新小说</h3>
                    <div class="fun"><a class="more" href="/home/more?type=xin">更多>></a></div>
                </div>
                <div class="w-72 list-bk-pictxt-1 pl-1 mt-0-5">
                <ul class="w-80">    
                <?php foreach($booknew as $k=>$v):if($k<6):?>
             <li><a class="pic" href="/home/index/detail/book/<?php echo $v->id;?>"><img src="/public/<?php echo $v->img;?>" alt="<?php echo $v->bookname;?>" /></a>
                 <div class="desc">
                     <strong><a href="/home/index/detail/book/<?php echo $v->id;?>"><?php echo $v->bookname;?></a></strong>
                     <div class="author">分类：<a href="http://www.ycsd.cn/book/tc_87.html"><?php echo $v->bqname;?></a></div>
                     <div class="cnt"><?php echo $v->content;?></div>
                 </div>
             </li>
         <?php endif;endforeach;?>
</ul>
                </div>
            </div></div>
            <div class="w-21-5 r">
            <div class="bg-box h-47-5 clearfix">
                <div class="t-1"><h3><i class="ico ico-7"></i>畅销榜</h3></div>
                <div class="tab-rank j_tabs"><a>周</a><a>月</a></div>
                <div class="h-42 tab-rank-panne pl-1 pr-1 pt-1">
                    <div class="list-rank j_tabCnt">
                        <ul>  
                        <?php foreach($cx as $k=>$v): if($k==0):?>
            <li class="first">
                <div class="num"><i class="ico ico-circle-red">1</i></div>
                <div class="ml-2-5 clearfix">
                    <a class="pic" href="/home/index/detail/book/<?php echo $v->id;?>"><img src="/public/<?php echo $v->img;?>" alt="<?php echo $v->bookname;?>" /></a>
                    <div class="desc">
                        <strong><a href="/home/index/detail/book/<?php echo $v->id;?>" target="_blank"><?php echo $v->bookname;?></a></strong>
                        <p class="cnt">作者：<a class="txt-brown" href="/w/0/"><?php echo $v->author;?></a><br /><br/>
                            </p>
                    </div>
                </div>
            </li>
            <?php ;else:?>
                <li><div class="num"><?php if($k<2):?><i class="ico ico-circle-gray"><?php ;else:?><i class="ico ico-circle-red"><?php endif; $k++;?></i></div>
                    <a href="/home/index/detail/book/<?php echo $v->id;?>" target="_blank"><?php echo $v->bookname;?></a>
                </li>
               <?php endif;endforeach;?>
                
</ul>
                        <div class="more"><a href="/home/more?type=Cx">·更多>></a></div>
                    </div>
                    <div class="list-rank j_tabCnt">
                        <ul>
                                 <?php foreach($cx as $k=>$v): if($k==0):?>
            <li class="first">
                <div class="num"><i class="ico ico-circle-red">1</i></div>
                <div class="ml-2-5 clearfix">
                    <a class="pic" href="/home/index/detail/book/<?php echo $v->id;?>"><img src="/public/<?php echo $v->img;?>" alt="<?php echo $v->bookname;?>" /></a>
                    <div class="desc">
                        <strong><a href="/home/index/detail/book/<?php echo $v->id;?>" target="_blank"><?php echo $v->bookname;?></a></strong>
                        <p class="cnt">作者：<a class="txt-brown" href="/w/0/"><?php echo $v->author;?></a><br /><br/>
                            </p>
                    </div>
                </div>
            </li>
            <?php ;else:?>
                <li><div class="num"><?php if($k<2):?><i class="ico ico-circle-gray"><?php ;else:?><i class="ico ico-circle-red"><?php endif; $k++;?></i></div>
                    <a href="/home/index/detail/book/<?php echo $v->id;?>" target="_blank"><?php echo $v->bookname;?></a>
                </li>
               <?php endif;endforeach;?>
               
</ul>
                        <div class="more"><a href="/home/more?type=Cx">·更多>></a></div>
                    </div>
                </div>
            </div></div>
        </div>  

        <!--第三栏-->
        <div class="pt-1-5 clearfix">
        	<div class="w-74-5"><div class="bg-box clearfix" style="height:967px;">
                <div class="t-2 pl-1 pr-1"><h3><i class="ico ico-8"></i>最近更新</h3></div>
                <div class="tab-update j_tabs"><a>更新</a><a>今日更新</a></div>
                <div class="tab-update-panne h-92 pl-1 pr-1 pt-0-5">
                    <div class="list-bk-txt-1 j_tabCnt">
                        <ul>  
                         <?php foreach($xinbook as $k=>$v): ?>
             <li class="clearfix">
                <div class="w-42">
                    <a class="txt-gray" href="javascript:;">[ <?php echo $v->bqname;?> ]</a>
                    <a class="txt-red" href="/home/index/detail/book/{/$val.bookid/}">《<?php echo $v->bookname;?>》</a><a class="txt-black" href="/home/book/index/chapter/{/$val.bookid/}_{/$val.articleid/}.html">第<?php echo $v->orderid;?>章；<?php echo $v->title;?></a>
                </div>
                <div class="w-28 r">
                    <a href="/w/1620300/" target="_blank"><?php echo $v->author;?></a><span>&nbsp;&nbsp;&nbsp;</span><span><?php echo date('Y-m-d H:i:s');?></span>
                </div>
           </li>
         <?php endforeach;?>                     
             
        </ul>
                    </div>
                    <div class="list-bk-txt-1 j_tabCnt">
                        <ul>                        

             <!--  <li class="clearfix">
                <div class="w-50">
                    <a class="txt-gray" href="http://www.ycsd.cn/book/tc_82.html">[古代言情]</a>
                    <a class="txt-red" href="http://www.ycsd.cn/book/4426/">《粉红女郎》</a><a class="txt-black" href="http://www.ycsd.cn/html/4/4426/928682.html">第10章：都海，我来了</a>
                </div>
                <div class="w-20 r">
                    <a href="/w/0/" target="_blank">汤圆</a><span>10-28 10:23</span>
                </div>
           </li> -->
        </ul>
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
                            <?php foreach($dianji as $k=>$v): if($k==0):?>
              <li class="first">
                <div class="num"><i class="ico ico-circle-red">1</i></div>
                <div class="ml-2-5 clearfix">
                    <a class="pic" href="/home/index/detail/book/{/$vo.id/}"><img src="/public/<?php echo $v->img;?>" alt="<?php echo $v->bookname;?>" /></a>
                    <div class="desc">
                        <strong><a href="/home/index/detail/book/{/$vo.id/}" target="_blank"><?php echo $v->bookname;?></a></strong>
                        <p class="cnt">作者：<a class="txt-brown" href="/w/0/"><?php echo $v->author;?></a><br /><br/>
                            {/$vo.content|truncate:10:"..."/}</p>
                    </div>
                </div>
            </li>

                <?php ;else:?>
                <li><div class="num"><?php if($k>2):?><i class="ico ico-circle-gray"><?php ;else:?><i class="ico ico-circle-red"><?php endif;$k++;?></i></div>
                    <a href="/home/index/detail/book/{/$vo.id/}" target="_blank"><?php echo $v->bookname;?></a>
                </li>
                <?php endif; endforeach;?>         
        </ul>
                            <div class="more"><a href="/home/more?type=DJ">·更多>></a></div>
                        </div>
                        <div class="list-rank j_tabCnt">
                            <ul>  
                                  <?php foreach($dianji as $k=>$v): if($k==0):?>
              <li class="first">
                <div class="num"><i class="ico ico-circle-red">1</i></div>
                <div class="ml-2-5 clearfix">
                    <a class="pic" href="/home/index/detail/book/{/$vo.id/}"><img src="/public/<?php echo $v->img;?>" alt="<?php echo $v->bookname;?>" /></a>
                    <div class="desc">
                        <strong><a href="/home/index/detail/book/{/$vo.id/}" target="_blank"><?php echo $v->bookname;?></a></strong>
                        <p class="cnt">作者：<a class="txt-brown" href="/w/0/"><?php echo $v->author;?></a><br /><br/>
                            </p>
                    </div>
                </div>
            </li>

                <?php ;else:?>
                <li><div class="num"><?php if($k>2):?><i class="ico ico-circle-gray"><?php ;else:?><i class="ico ico-circle-red"><?php endif;$k++;?></i></div>
                    <a href="/home/index/detail/book/{/$vo.id/}" target="_blank"><?php echo $v->bookname;?></a>
                </li>
                <?php endif; endforeach;?>            
            
</ul>
                            <div class="more"><a href="/home/more?type=DJ">·更多>></a></div>
                        </div>
                        <div class="list-rank j_tabCnt">
                            <ul>                
                  <?php foreach($dianji as $k=>$v): if($k==0):?>
              <li class="first">
                <div class="num"><i class="ico ico-circle-red">1</i></div>
                <div class="ml-2-5 clearfix">
                    <a class="pic" href="/home/index/detail/book/{/$vo.id/}"><img src="/public/<?php echo $v->img;?>" alt="<?php echo $v->bookname;?>" /></a>
                    <div class="desc">
                        <strong><a href="/home/index/detail/book/{/$vo.id/}" target="_blank"><?php echo $v->bookname;?></a></strong>
                        <p class="cnt">作者：<a class="txt-brown" href="/w/0/"><?php echo $v->author;?></a><br /><br/>
                            </p>
                    </div>
                </div>
            </li>

                <?php ;else:?>
                <li><div class="num"><?php if($k>2):?><i class="ico ico-circle-gray"><?php ;else:?><i class="ico ico-circle-red"><?php endif;$k++;?></i></div>
                    <a href="/home/index/detail/book/{/$vo.id/}" target="_blank"><?php echo $v->bookname;?></a>
                </li>
                <?php endif; endforeach;?> 
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
        <?php foreach($booknew as $k=>$v):if($k==0):?>                 
            <li class="first">
                <div class="num"><i class="ico ico-circle-red">1</i></div>
                <div class="ml-2-5 clearfix">
                    <a class="pic" href="/home/index/detail/book/{/$vo.id/}"><img src="/public/<?php echo $v->img;?>" alt="<?php echo $v->bookname;?>" /></a>
                    <div class="desc">
                        <strong><a href="http://www.ycsd.cn/book/2392/" target="_blank"><?php echo $v->bookname;?></a></strong>
                        <p class="cnt">作者：<a class="txt-brown" href="/w/892508/"><?php echo $v->author;?></a><br />
                            </p>
                    </div>
                </div>
            </li>
            <?php ;else:?>
            <li><div class="num"><?php if($k>2):?><i class="ico ico-circle-gray"><?php ;else:?><i class="ico ico-circle-red"><?php endif;$k++;?></i></div>
                    <a href="/home/index/detail/book/{/$vo.id/}" target="_blank"><?php echo $v->bookname;?></a>
                </li>
         <?php endif;endforeach;?>
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
    <!--友情链接-->
    <div class="links mt-1-5"><div class="extra"><div class="l">友情链接</div><div class="r"><a href="http://www.hotread.com" target="_blank">火星小说网</a><a href="http://m.cmwrite.net/" target="_blank">诚铭小说</a><a href="http://www.sxyj.net" target="_blank">书香云集</a><a href="http://www.lingyun5.com/" target="_blank">凌云文学网</a><a href="http://www.yycaf.net/" target="_blank">原创剧评</a><a href="http://www.tianxia360.com" target="_blank">天下新闻网</a><a href="http://www.lishiquwen.com/" target="_blank">历史网</a><a href="http://www.bt121.com" target="_blank">bt电影天堂</a><a href="http://www.tiandizw.com" target="_blank">天地中文网</a><a href="http://mm.faloo.com" target="_blank">言情小说</a><a href="http://hjsm.tom.com" target="_blank">幻剑书盟</a><a href="http://www.ebtang.com/" target="_blank">雁北堂中文网</a><a href="http://mm.shuhai.com" target="_blank">言情小说网</a><a href="http://www.baokan.name/" target="_blank">爆侃网文</a><a href="http://www.cooldu.com/" target="_blank">酷读小说网</a><a href="http://www.hengyan.com/  " target="_blank">恒言中文网</a><a href="http://www.ycsd.cn/book/tc_8.html" target="_blank">灵异小说</a><a href="http://www.shuhai.com/dushi/ " target="_blank">都市小说</a><a href="http://www.zhulang.com/" target="_blank">逐浪小说网</a><a href="http://yuedu.163.com/yc" target="_blank">网易原创</a><a href="http://www.heiyan.com/" target="_blank">黑岩小说网</a><a href="http://www.yqsd.cn/" target="_blank">言情书殿</a></div></div></div>
</div>
<!--javascript-->
<script type="text/javascript" src="js/jquery.flashslider-1.0.js"></script>
<script type="text/javascript">
    $("header nav").find("li").eq(0).addClass("current");
    $("#slider").flashSlider();
 </script>
<!-- {/include file="Public/footer.html"/}    -->

<footer class="bg-line-black">
  <div class="extra">
    <div class="l logo-foot"><a href="/"><img src="javascript:;" alt="少儿书城" /></a></div>
    <div class="r">
      <nav>
        <a href="javascript:window.external.AddFavorite('http://www.claile.com/','少儿书城');" rel="nofollow"><i class="ico ico-5"></i>添加到收藏夹</a>
        <span></span><a href="http://www.claile.com">童话故事</a>
        <span></span><a href="http://www.claile.com">联系我们</a>

        
      </nav>
      <div class="copyright clear">
	<a href="http://www.claile.com">少儿书城</a> 
        观点属其个人行为，不代表本站立场 <br />
        © Copyright (C) 2016-2017 少儿书城 All Rights Reserved<br />
       
        <a rel="nofollow" href="javascript:;"></a><br /><a  rel="nofollow" href="http://www.miitbeian.gov.cn/">京ICP备16018425号</a><br />
<!--安全联盟-->
<div style="display: block;width: 90px;position: absolute;margin-top: -160px;margin-left: 260px;">
<a  rel="nofollow" rel="nofollow" key ="56a1baaaefbfb06039ca0084"  logo_size="83x30"  logo_type="business"  href="http://www.anquan.org" >
<span style="height:20px;"><script src="http://static.anquan.org/static/outer/js/aq_auth.js"></script></span>
</a>
</div>
      </div>
    </div>
  </div>
</footer>
<!--  -->
<!--登陆弹出框-->
<div id="overlay-login" class="w-48 overlay">
	<div class="c-h bg-line-gray"><h3><i class="ico ico-13"></i>用户登录</h3></div>
    <div class="c-b p-3">
    	<form class="form-main">
        <table width="100%">
        	<tr>
            	<td width="50"><span class="txt-black">账号：</span></td>
                <td><input class="text w-28" type="text" value="" id="lusername" name="lusername" /></td>
            </tr>
            <tr>
            	<td><span class="txt-black">密码：</span></td>
                <td><input class="text w-28" type="password" value="" id="lpassword" name="lpassword" /></td>
            </tr>
          <tr>
            <td>
              <span class="txt-black">验证码：</span>
            </td>
            <td>
              <input class="text w-28" type="text" value="" id="vcode" name="vcode" style="width:200px" />
              <img id="valiImg" src="picture/validatorcode.ashx" alt="不清楚，再来一张" class="code" onclick="this.src='picture/validatorcode.ashx&'+Math.random()" style="vertical-align:middle;"/>
          </td>
          </tr>
            <tr>
            	<td></td>
            <td><label><input class="checkbox" type="checkbox" value="1" checked id="lsaveLogin" name="lsaveLogin" />下次自动登录</label><a class="txt-red l ml-15-5" href="/user/forgetPassword.aspx">忘记密码？</a></td>
            </tr>
            <tr>
            	<td></td>
                <td><input class="btn btn-normal-red bg-line-red w-8" type="button" value="登 录" name="chkLogin" id="chkLogin" /></td>
            </tr>
        </table>
        </form>
        <div class="login-other mt-1-5 clearfix">
        	<div class="t">使用其他账号登录：</div>
            <a href="/OAuth/sinaLogin.aspx"><i class="ico ico-sina"></i>新浪微博</a>
            <a href="/OAuth/qqLogin.aspx"><i class="ico ico-qq"></i>QQ账号</a>
			<a href="/OAuth/wechat.aspx"><i class="ico-wechat"></i>微信账号</a>
        </div>
    </div>
</div>
<script>
	var _hmt = _hmt || [];
	(function() {
	var hm = document.createElement("script");
	hm.src = "//hm.baidu.com/hm.js?e36b3e66139e5a0cf0e22ccb92e7b85c";
	var s = document.getElementsByTagName("script")[0];
	s.parentNode.insertBefore(hm, s);
	})();
	(function(){
	var bp = document.createElement('script');
	bp.src = '//push.zhanzhang.baidu.com/push.js';
	var s = document.getElementsByTagName("script")[0];
	s.parentNode.insertBefore(bp, s);
	})();
</script>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-66283513-2', 'auto');
	ga('send', 'pageview');
</script>
</body>
</html>
