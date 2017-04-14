<?php
/**
  * wechat php test
  */

//define your token
define("TOKEN", "weixinabc");
$wechatObj = new wechatCallbackapiTest();
// $wechatObj->valid();
$wechatObj->responseMsg();
// exit;
class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                //这个是$event事件的具体内容
                $event = $postObj->Event;
                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";     
				switch($postObj->MsgType)
				{
					case 'event':
					//如果是用户订阅事件
					if($event=='subscribe')
					{
						$msgType = 'text';
						$contentStr = "欢迎关注微笑公众号，您可以进行简单的计算：乘法#，除法/，加法+，减法 等运算。例如输入：4#5";
						$resultStrs = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStrs;
					}
					break;
					case 'text':
					$newsTpl="<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[news]]></MsgType>
						<ArticleCount>2</ArticleCount>
						<Articles>
						<item>
						<Title><![CDATA[%s]]></Title> 
						<Description><![CDATA[%s]]></Description>
						<PicUrl><![CDATA[%s]]></PicUrl>
						<Url><![CDATA[%s]]></Url>
						</item>
						<item>
						<Title><![CDATA[%s]]></Title>
						<Description><![CDATA[%s]]></Description>
						<PicUrl><![CDATA[%s]]></PicUrl>
						<Url><![CDATA[%s]]></Url>
						</item>
						</Articles>
						</xml>";
					if($keyword == '新闻' )
					{
						//返回新闻内容
					$title1 = "百度新闻";
					$title2 = "qq新闻";
					$description1 = "这是一个新闻页面";
					$description2 = "这是一个新闻页面";
					$picurl = "http://www.claile.com/public/img/1.jpg";
					$picur2 = "http://www.claile.com/public/img/2.jpg";
					$url1 = "http://news.baidu.com";
					$url2 = "http://news.qq.com";
                	$newsTpls = sprintf($newsTpl, $fromUsername, $toUsername, $time, $title1,$description1,$picurl,$url1,$title2,$description2,$picur2,$url2);
                	echo $newsTpls;
					}else if($keyword == '网站'|| $keyword=="笑话")
					{
						$title1 = "微微笑";
					$title2 = "笑话集";
					$description1 = "这是一个人的页面";
					$description2 = "这是一个笑话的网站";
					$picurl = "http://www.claile.com/public/img/1.jpg";
					$picur2 = "http://www.claile.com/public/img/2.jpg";
					$url1 = "http://www.claile.com/";
					$url2 = "http://www.jokeji.cn/";
                	$newsTpls = sprintf($newsTpl, $fromUsername, $toUsername, $time, $title1,$description1,$picurl,$url1,$title2,$description2,$picur2,$url2);
                	echo $newsTpls;
					}
					else if(preg_match("/^cx([\x{4e00}-\x{9fa5}]+)/ui",$keyword,$resul))
					{
						$msgType = "text";
						$address = $resul[1];
						//取出用户的地理位置
						$sql = "SELECT locationX,locationY FROM locations where fromuser ='".$fromUsername."'";
						$data = $this->newconnect($sql);
						if($row = mysql_fetch_assoc($data))
						{
							$contentStr = "请您点击下面获取您的查询结果 \r\n\r\n
					http://api.map.baidu.com/place/search?query='".urlencode($address)."'&location=".$row['locationX'].",".$row['locationY']."&radius=1000&output=html&coord_type=gcj02";
							
	                		$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
	                		echo $resultStr;
						}
						else
						{
								$contentStr = "您还未上报地理位置，请上报地理位置在查询";
	                		$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
	                		echo $resultStr;
						}
					}

					break;
					case "location":
					$msgType = "text";
					//获取经度纬度
					//经度
					$location_Y = $postObj->Location_Y;
					$location_X = $postObj->Location_X;
					$sql = "SELECT locationX,locationY,id FROM `locations` WHERE fromuser='".$fromUsername."'";
					$res = $this->newconnect($sql);
					if($row = mysql_fetch_assoc($res))
					{
						if($row['locationX']==$location_X && $row['locationY']==$location_Y)
						{
							$result = 1;
						}else
						{
							$sqlup = "UPDATE `locations` SET locationX='".$location_X."',locationY='".$location_Y."' where id='".$row['id']."'";
							$result = $this->newconnect($sqlup);
						}
					}else
					{
						$strs = "INSERT INTO locations(uname,time,fromuser,locationX,locationY) values('".$toUsername."','".date('Y-m-d',time())."','".$fromUsername."','".$location_X."','".$location_Y."')";
						$result = $this->newconnect($strs);
					}
				
					
					if($result)
					{
						$contentStr = "恭喜你成功上报地理位置，现在可以输入以cx开头查询的想去的地方";
					}else
					{
						$contentStr = "抱歉，请您重新上报地理位置";
					}
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                	break;
					default:
					break;
				}


				if(!empty( $keyword ))
                {
              		$msgType = "text";
					preg_match("/(\d+)([+*-\/#])(\d+)/i",$keyword,$strs);
					switch($strs[2])
					{
						case '+':
						$res = $strs[1]+$strs[3];
						$contentStr = $strs[0]."=".$res;
						break;
						case '-':
						$res = $strs[1]-$strs[3];
						$contentStr = $strs[0]."=".$res;
						break;
						case '*':
						$res = $strs[1]*$strs[3];
						$contentStr = $strs[0]."=".$res;
						break;
						case '#':
						$res = $strs[1]*$strs[3];
						$contentStr = $strs[0]."=".$res;
						break;
						
						case '/':
						$res = $strs[1]/$strs[3];
						$contentStr = $strs[0]."=".$res;
						break;
						default:
						$contentStr = "您好您可以进行简单的计算例如：5#5，25/5，4+5，3-2等运算";
					}
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }else{
                	echo "Input something...";
                }
				
        }else {
        	echo "";
        	exit;
        }
    }
		
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
	private function newconnect($strs)
	{
		$connect = mysql_connect("119.10.36.189","my9758399","X7d8d4e7");
		mysql_select_db("my9758399");
		mysql_query("SET NAMES UTF8");
		$sql = $strs;
		$res = mysql_query($sql);
		return $res;
	}
}

?>