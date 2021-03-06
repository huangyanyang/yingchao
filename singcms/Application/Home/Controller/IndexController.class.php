<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
//        $timestamp = $_GET['timestamp'];
//        $nonce = $_GET['nonce'];
//        $token = 'yingchaofuwu';
//        $signature = $_GET['signature'];
//        $array = array($timestamp,$nonce,$token);
//        sort($array);
//        $tmpstr = implode('',$array);
//        $tmpstr = sha1($tmpstr);
//        if($tmpstr == $signature){
//            echo $_GET['echostr'];
//            exit;
//        }
//        $this->display();
        //获得参数 signature nonce token timestamp echostr
        $nonce = $_GET['nonce'];
        $token = 'yingchaofuwu';
        $timestamp = $_GET['timestamp'];
        $echostr = $_GET['echostr'];
        $signature = $_GET['signature'];
        //形成数组，然后按字典序排序
        $array = array();
        $array = array($nonce, $timestamp, $token);
        sort($array);
        //拼接成字符串,sha1加密 ，然后与signature进行校验
        $str = sha1(implode($array));
        if ($str == $signature) {
            //第一次接入weixin api接口的时候
            echo $echostr;
            exit;
        } else {
            $this->definedItem();
            $this->reponseMsg();

        }

    }

    public function show()
    {
        echo 'imooc';
    }

    //消息处理函数
    public function reponseMsg()
    {
        //1.获取到微信推送过来post数据（xml格式）
        $postArr = $GLOBALS['HTTP_RAW_POST_DATA'];
        //2.处理消息类型，并设置回复类型和内容
        /*<xml>
<ToUserName><![CDATA[toUser]]></ToUserName>
<FromUserName><![CDATA[FromUser]]></FromUserName>
<CreateTime>123456789</CreateTime>
<MsgType><![CDATA[event]]></MsgType>
<Event><![CDATA[subscribe]]></Event>
</xml>*/
        $postObj = simplexml_load_string($postArr);
        //$postObj->ToUserName = '';
        //$postObj->FromUserName = '';
        //$postObj->CreateTime = '';
        //$postObj->MsgType = '';
        //$postObj->Event = '';
        // gh_e79a177814ed
        //判断该数据包是否是订阅的事件推送
        if (strtolower($postObj->MsgType) == 'event') {
            //如果是关注 subscribe 事件
            if (strtolower($postObj->Event == 'subscribe')) {
                //回复用户消息(纯文本格式)
                $toUser = $postObj->FromUserName;
                $fromUser = $postObj->ToUserName;
                $time = time();
                $msgType = 'text';
                $content = '欢迎关注鹰巢服务，如果您还未录入信息，请点击下方的录入信息按钮进行录入，如果您已经录入，可以点击个人中心按钮查看您的个人信息';
                $template = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Content><![CDATA[%s]]></Content>
                            </xml>";
                $info = sprintf($template, $toUser, $fromUser, $time, $msgType, $content);
                echo $info;
                /*<xml>
                <ToUserName><![CDATA[toUser]]></ToUserName>
                <FromUserName><![CDATA[fromUser]]></FromUserName>
                <CreateTime>12345678</CreateTime>
                <MsgType><![CDATA[text]]></MsgType>
                <Content><![CDATA[你好]]></Content>
                </xml>*/


            }
        } //根据用户输入消息进行回复
        else if (strtolower($postObj->MsgType) == 'text') {
            $toUser = $postObj->FromUserName;
            $fromUser = $postObj->ToUserName;
            $time = time();
            $msgType = 'text';
            //$content  = 'imooc is very good'.$postObj->FromUserName.'-'.$postObj->ToUserName;
            $template = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Content><![CDATA[%s]]></Content>
                            </xml>";
            switch (trim($postObj->Content)) {
                case 1:
                    $content = '您输入的数字是1';
                    break;
                case 2:
                    $content = '您输入的数字是2';
                    break;
                case 3:
                    $content = '<a href="http://www.baidu.com">百度</a>';
                    break;
                case tuwen:
                    $arr = array(
                        array('title' => 'imooc',
                            'description' => 'imooc描述',
                            'picUrl' => 'http://www.imooc.com/static/img/common/logo.png',
                            'url' => 'http://www.baidu.com'),
                        array('title' => 'hao123',
                            'description' => 'hao123描述',
                            'picUrl' => 'http://www.imooc.com/static/img/common/logo.png',
                            'url' => 'http://www.hao123.com'),
                        array('title' => 'baidu',
                            'description' => 'baidu描述',
                            'picUrl' => 'http://www.imooc.com/static/img/common/logo.png',
                            'url' => 'http://www.baidu.com'),
                    );
                    $content = '<a href="http://www.baidu.com">百度</a>';
                    $template_tuWen = "<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <ArticleCount>" . count($arr) . "</ArticleCount>
                                <Articles>";
                    foreach ($arr as $k => $v) {
                        $template_tuWen .= "<item>
                                <Title><![CDATA[" . $v['title'] . "]]></Title>
                                <Description><![CDATA[" . $v['description'] . "]]></Description>
                                <PicUrl><![CDATA[" . $v['picUrl'] . "]]></PicUrl>
                                <Url><![CDATA[" . $v['url'] . "]]></Url>
                                </item>";
                    }

                    $template_tuWen .= "</Articles>
                                </xml>";
                    $info = sprintf($template_tuWen, $toUser, $fromUser, $time, 'news');
                    echo $info;
                    break;
            }

            $info = sprintf($template, $toUser, $fromUser, $time, $msgType, $content);
            echo $info;
        }

    }

    //$url  接口url string
    //$type 请求类型string
    //$res  返回类型string
    //$arr= 请求参数string
    public function http_curl($url, $type = 'get', $res = 'json', $arr = '')
    {

        //1.初始化curl
        $ch = curl_init();
        //2.设置curl的参数
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        if ($type == 'post') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
        }
        //3.采集
        $output = curl_exec($ch);

        //4.关闭
        curl_close($ch);
        if ($res == 'json') {
            if (curl_error($ch)) {
                //请求失败，返回错误信息
                return curl_error($ch);
            } else {
                //请求成功，返回数据

                return json_decode($output, true);
            }
        }
        echo var_dump($output);
    }

    //获取测试号微信AccessToken
    /*function  getWxAccessToken(){

        //2初始化
        $ch  =curl_init();
        //3设置参数
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        //4.调用接口
        $res =curl_exec($ch);
        //5.关闭curl
        curl_close($ch);
        if(curl_error($ch)){
            var_dump(curl_error($ch));
        }
        $arr=json_decode($res,true);
        var_dump($arr);
    }*/

    //获取微信服务器IP地址
    function getWxServerIp()
    {
        $accessToken = "Y7cYto0UvJz1U-9NpN04lhQuBkO5BO7Sim6hCZ0GkZlLLfisnvXLjg6VTX_v7veESGX24zAIlu31GD5YXjQFWd5AYXkQTv5a1iGIwk9oxL4gPeWC3fCciWTp2e5ftVZvUXFcAHAHKS";
        $url = "https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token=" . $accessToken;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($ch);
        //5.关闭curl
        curl_close($ch);
        if (curl_error($ch)) {
            var_dump(curl_error($ch));
        }
        $arr = json_decode($res, true);
        echo "<pre>";
        var_dump($arr);
        echo "</pre>";
    }

//返回access_token *session解决办法 存mysql memcache
    public function getWxAccessToken()
    {
        if ($_SESSION['access_token'] && $_SESSION['expire_time'] > time()) {
            //如果access_token在session没有过期
            echo "111";
            echo $_SESSION['access_token'];;
            return $_SESSION['access_token'];
        } else {
            //如果access_token比存在或者已经过期，重新取access_token
            //1 请求url地址
            $AppId = 'wxae13a6fd5e378b97';
            $AppSecret = '8fa5fc461b36a01d199459ce5ab9ca2e';
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $AppId . "&secret=" . $AppSecret;
            $res = $this->http_curl($url, 'get', 'json');
            echo "res";
            echo $res;
            $access_token = $res['access_token'];
            //将重新获取到的aceess_token存到session
            $_SESSION['access_token'] = $access_token;
            $_SESSION['expire_time'] = time() + 7000;
            echo "2222";
            echo $access_token;
            return $access_token;
        }
    }


    public function definedItem()
    {
        //创建微信菜单
        //目前微信接口的调用方式都是通过 curl post/get
        header('content-type:text/html;charset=utf-8');
        echo $access_token = $this->getWxAccessToken();
        echo $url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token=' . $access_token;
        $postArr = array(
            'button' => array(
                array(
                    'name' => urlencode('信息录入'),
                    'type' => 'view',
                    'url' => 'http://bjx.cheerskeji.com/singcms/index.php?m=home&c=index&a=showsignup',
                ),
                array(
                    'name' => urlencode('个人中心'),
                    'type' => 'view',
                    'url' => 'http://bjx.cheerskeji.com/singcms/index.php?m=home&c=index&a=findOpenId',
//                    'sub_button'=>array(
//                        array(
//                            'name'=>urlencode('歌曲'),
//                            'type'=>'click',
//                            'key'=>'songs'
//                        ),//第一个二级菜单
//                        array(
//                            'name'=>urlencode('电影'),
//                            'type'=>'view',
//                            'url'=>'http://www.baidu.com'
//                        ),//第二个二级菜单
//                    )
                ),

//                array(
//                    'name'=>urlencode('菜单三'),
//                    'type'=>'view',
//                    'url'=>'http://www.qq.com',
//                ),//第三个一级菜单

            ));
        echo $postJson = urldecode(json_encode($postArr));
        $res = $this->http_curl($url, 'post', 'json', $postJson);
        var_dump($res);
    }

    function findOpenId()
    {
        $appId = 'wxae13a6fd5e378b97';
        $redrectUrl = urlencode('http://bjx.cheerskeji.com/singcms/index.php/home/index/getWebAccessToken');
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $appId . "&redirect_uri=" . $redrectUrl . "&response_type=code&scope=snsapi_userinfo&state=0#wechat_redirect";
        header('location:' . $url);
    }

    function showsignup()
    {
        $appId = 'wxae13a6fd5e378b97';
        $redrectUrl = urlencode('http://bjx.cheerskeji.com/singcms/index.php/home/index/checkIsSignUp');
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $appId . "&redirect_uri=" . $redrectUrl . "&response_type=code&scope=snsapi_userinfo&state=0#wechat_redirect";
        header('location:' . $url);
    }

    function checkIsSignUp()
    {
        $appId = 'wxae13a6fd5e378b97';
        $appScrect = '8fa5fc461b36a01d199459ce5ab9ca2e';
        $code = $_GET['code'];
        $userWx = D('user_wx');
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=' . $appId . '&secret=' . $appScrect . '&code=' . $code . '&grant_type=authorization_code';
        $data = $this->http_curl($url, 'get', 'json');
        $openId = $data['openid'];
        $IsSignUp = $userWx->where("openid='" . $openId . "'")->find();
        if ($IsSignUp) {
            $id = $IsSignUp['id'];
            $_SESSION['id'] = $id;
            $this->display(T('Signup/hasSignUp'));
        } else {
            $this->display(T('Signup/showsignup'));
        }
    }

    function signup()
    {
        $trueName = $_POST['name'];
        $userTrue = D('user_true');
        $result = $userTrue->add($_POST);
        if ($result) {
            $info = '插入用户真实信息成功！';
        } else {
            $info = '插入用户真实信息失败！';
        }
        $rs = $userTrue->where('name="' . $trueName . '"')->find();
        $id = $rs['id'];
        $appId = 'wxae13a6fd5e378b97';
        $redrectUrl = urlencode('http://bjx.cheerskeji.com/singcms/index.php/home/index/getWebAccessToken');
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $appId . "&redirect_uri=" . $redrectUrl . "&response_type=code&scope=snsapi_userinfo&state=" . $id . "#wechat_redirect";
        header('location:' . $url);
    }

    function getWebAccessToken()
    {
        $appId = 'wxae13a6fd5e378b97';
        $appScrect = '8fa5fc461b36a01d199459ce5ab9ca2e';
        $code = $_GET['code'];
        $userWx = D('user_wx');
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=' . $appId . '&secret=' . $appScrect . '&code=' . $code . '&grant_type=authorization_code';
        $data = $this->http_curl($url, 'get', 'json');
        $openId = $data['openid'];
        trace($openId);
        $ifUser = $userWx->where("openid='" . $openId . "'")->find();
        trace($ifUser == null);
        if ($ifUser != null) {
            $info = '查询个人信息成功（每个微信号只能录入一次）！';
            $id = $ifUser['id'];
            $_SESSION['info'] = $info;
            $_SESSION['id'] = $id;
            $this->userList();
        } else {
            $id = $_GET['state'];
            if ($id != '0') {
                $accessToken = $data['access_token'];
                $newurl = 'https://api.weixin.qq.com/sns/userinfo?access_token=' . $accessToken . '&openid=' . $openId . '&lang=zh_CN';
                $newdata = $this->http_curl($newurl, 'get', 'json');
                $array = array('id' => $id);
                $array += $newdata;
                $result = $userWx->add($array);
                if ($result) {
                    $info = '录入成功！';
                } else {
                    $info = '录入失败！';
                }
                $_SESSION['info'] = $info;
                $_SESSION['id'] = $id;
                $this->userList();
            }else {
                $this->display(T('Signup/hasNotSignUp'));
            }
        }
    }

    function userList()
    {
        $info = $_SESSION['info'];
        $id = $_SESSION['id'];
        $userTrue = D('user_true');
        $userWx = D('user_wx');
        $userTrueResult = $userTrue->where('id="' . $id . '"')->find();
        $userWxResult = $userWx->where('id="' . $id . '"')->find();
        $this->assign('userTrueResult', $userTrueResult);
        $this->assign('userWxResult', $userWxResult);
        $this->assign('info', $info);
        $this->assign('id', $id);
        $this->display(T('UserList/userlist'));
    }
}