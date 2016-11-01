<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <title>个人中心</title>
    <style>
        body {
            font-family: 微软雅黑;
        }

        .information-div {
            height: 50px;
            border-bottom: 1px solid gray;
            line-height: 50px;
        }

        .key {
            color: gray;
        }

        .value {

        }
        a:link{
            text-decoration:none;
        }
        a:visited{
            text-decoration:none;
        }
        a:hover{
            text-decoration:none;
        }
        a:active{
            text-decoration:none;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row" style="background-color:rgb(55,169,255);height: 150px;padding-top: 20px;color: white">
        <div class="col-xs-4 col-xs-offset-4 text-center">
            <img src="<?php echo ($userWxResult["headimgurl"]); ?>" alt="头像" style="width: 70px;height: 70px;border-radius: 35px;"
                 class="center-block">
            <span style="font-size: 20px"><?php echo ($userTrueResult["name"]); ?></span><br>
            <span class="glyphicon glyphicon-pencil" style="font-size: 10px"></span>&nbsp;<a
                style="font-size: 15px;color: white" href="/singcms/index.php/home/user/edit">编辑信息</a>
        </div>
    </div>
    <div class="row information-div">
        <div class="col-xs-5 text-left key">姓名</div>
        <div class="col-xs-7 text-right value"><strong><?php echo ($userTrueResult["name"]); ?></strong>&nbsp;<a
                href="" data-toggle="modal" data-target="#name_modal">&gt;</a>
        </div>
    </div>
    <div class="row information-div">
        <div class="col-xs-5 text-left key">性别</div>
        <div class="col-xs-7 text-right value"><strong><?php echo ($userTrueResult["truesex"]); ?></strong>&nbsp;<a
                href="" data-toggle="modal" data-target="#truesex_modal">&gt;</a>
        </div>
    </div>
    <div class="row information-div">
        <div class="col-xs-5 text-left key">学校</div>
        <div class="col-xs-7 text-right value"><strong><?php echo ($userTrueResult["school"]); ?></strong>&nbsp;<a
                href="" data-toggle="modal" data-target="#school_modal">&gt;</a>
        </div>
    </div>
    <div class="row information-div">
        <div class="col-xs-5 text-left key">学院</div>
        <div class="col-xs-7 text-right value"><strong><?php echo ($userTrueResult["academy"]); ?></strong>&nbsp;<a
                href="" data-toggle="modal" data-target="#academy_modal">&gt;</a>
        </div>
    </div>
    <div class="row information-div">
        <div class="col-xs-5 text-left key">专业</div>
        <div class="col-xs-7 text-right value"><strong><?php echo ($userTrueResult["profession"]); ?></strong>&nbsp;<a
                href="" data-toggle="modal" data-target="#profession_modal">&gt;</a>
        </div>
    </div>
    <div class="row information-div">
        <div class="col-xs-5 text-left key">支付宝</div>
        <div class="col-xs-7 text-right value"><strong><?php echo ($userTrueResult["alipay"]); ?></strong>&nbsp;<a
                href="" data-toggle="modal" data-target="#alipay_modal">&gt;</a>
        </div>
    </div>
    <div class="row information-div">
        <div class="col-xs-5 text-left key">支付宝昵称</div>
        <div class="col-xs-7 text-right value"><strong><?php echo ($userTrueResult["alipaynickname"]); ?></strong>&nbsp;<a
                href="" data-toggle="modal" data-target="#alipaynickname_modal">&gt;</a>
        </div>
    </div>
    <div class="row information-div">
        <div class="col-xs-5 text-left key">手机号码</div>
        <div class="col-xs-7 text-right value"><strong><?php echo ($userTrueResult["tel"]); ?></strong>&nbsp;<a
                href="" data-toggle="modal" data-target="#tel_modal">&gt;</a>
        </div>
    </div>
</div>
<?php if(is_array($userTrueResult)): foreach($userTrueResult as $k=>$v): ?><div class="modal fade" id="<?php echo ($k); ?>_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">修改<?php echo (option($k)); ?></h4>
                </div>
                <div class="modal-body">
                    <?php switch($k): case "truesex": ?><select id="<?php echo ($k); ?>" name="truesex" class="v" style="height: 32px;width: 211.328px;padding-left: 10px">
                                <option value="0">请选择你的性别</option>
                                <option value="男">男</option>
                                <option value="女">女</option>
                            </select><?php break;?>
                        <?php case "school": ?><select id="<?php echo ($k); ?>" class="v" name="school" style="height: 32px;width: 211.328px;padding-left: 10px">
                                <option value="0">请选择你的学校</option>
                                <option value="华南理工大学大学城校区">华南理工大学大学城校区</option>
                                <option value="华南师范大学大学城校区">华南师范大学大学城校区</option>
                                <option value="广东工业大学">广东工业大学</option>
                                <option value="广东外语外贸大学">广东外语外贸大学</option>
                                <option value="中山大学大学城校区">中山大学大学城校区</option>
                                <option value="广州中医药大学">广州中医药大学</option>
                                <option value="广东药学院">广东药学院</option>
                                <option value="广州美术学院">广州美术学院</option>
                                <option value="星海音乐学院">星海音乐学院</option>
                                <option value="广州大学">广州大学</option>
                                <option value="南华学院">南华学院</option>
                            </select><?php break;?>
                        <?php default: ?>
                        <input type="text" class="v" id="<?php echo ($k); ?>" value="<?php echo ($v); ?>"><?php endswitch;?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary save">保存</button>
                </div>
            </div>
        </div>
    </div><?php endforeach; endif; ?>
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script>
    $(function () {
        var school_options = $("#school option");
        for (i = 0; i < school_options.length; i++) {
            if ($(school_options[i]).val() == "<?php echo ($userTrueResult["school"]); ?>") {
                $(school_options[i]).prop('selected', true);
            }
        }
        var truesex_options = $("#truesex option");
        for (i = 0; i < truesex_options.length; i++) {
            if ($(truesex_options[i]).val() == "<?php echo ($userTrueResult["truesex"]); ?>") {
                $(truesex_options[i]).prop('selected', true);
            }
        }
        $(".save").on('click', function () {
            var v = $('.v');
            var arr = {};
            for (i = 0; i < v.length; i++) {
                arr[v[i].id] = v[i].value;
            }
            arr['id'] = <?php echo ($id); ?>;
            console.log(arr);
            $.post('http://bjx.cheerskeji.com/singcms/index.php/home/user/save', arr, function (result) {
                if (result.status == 0) {
//                    return dialog.error(result.message);
                    alert(result.message);

                } else if (result.status == 1) {
                    alert(result.message);
                    window.location.href = 'http://bjx.cheerskeji.com/singcms/index.php?m=home&c=index&a=findOpenId';
//                    return dialog.success(result.message,'http://bjx.cheerskeji.com/singcms/index.php?m=home&c=index&a=findOpenId');
                }
            }, "JSON")
        });
    })
</script>
<!--<div class="row"><h1 class="center-block"><?php echo ($info); ?></h1></div>-->
<!--<div class="row">-->
<!--<div class="col-xs-12">-->
<!--<dl class="dl-horizontal" id="<?php echo ($id); ?>">-->
<!--&lt;!&ndash;<?php if(is_array($userTrueResult)): foreach($userTrueResult as $k=>$v): ?>&ndash;&gt;-->
<!--&lt;!&ndash;<dt><?php echo ($k); ?></dt>&ndash;&gt;-->
<!--&lt;!&ndash;<dd><?php echo ($v); ?><a class="btn btn-primary" data-toggle="modal" data-target="#<?php echo ($k); ?>">&gt;</a></dd>&ndash;&gt;-->
<!--&lt;!&ndash;<?php endforeach; endif; ?>&ndash;&gt;-->
<!--<dt>头像</dt>-->
<!--<dd><img style="width: 100px;height: 100px;" src="<?php echo ($userWxResult["headimgurl"]); ?>"><a href="" data-toggle="modal" data-target="#headimgurl_modal">&gt;</a></dd>-->
<!--<dt>姓名</dt>-->
<!--<dd><?php echo ($userTrueResult["name"]); ?><a href="" data-toggle="modal" data-target="#name_modal">&gt;</a></dd>-->
<!--<dt>昵称</dt>-->
<!--<dd><?php echo ($userWxResult["nickname"]); ?><a href="" data-toggle="modal" data-target="#nickname_modal">&gt;</a></dd>-->
<!--<dt>国家</dt>-->
<!--<dd><?php echo ($userWxResult["country"]); ?><a href="" data-toggle="modal" data-target="#country_modal">&gt;</a></dd>-->
<!--<dt>省份</dt>-->
<!--<dd><?php echo ($userWxResult["province"]); ?><a href="" data-toggle="modal" data-target="#province_modal">&gt;</a></dd>-->
<!--<dt>城市</dt>-->
<!--<dd><?php echo ($userWxResult["city"]); ?><a href="" data-toggle="modal" data-target="#city_modal">&gt;</a></dd>-->
<!--<dt>学校</dt>-->
<!--<dd><?php echo ($userTrueResult["school"]); ?><a href="" data-toggle="modal" data-target="#school_modal">&gt;</a></dd>-->
<!--<dt>学院</dt>-->
<!--<dd><?php echo ($userTrueResult["academy"]); ?><a href="" data-toggle="modal" data-target="#academy_modal">&gt;</a></dd>-->
<!--<dt>专业</dt>-->
<!--<dd><?php echo ($userTrueResult["profession"]); ?><a href="" data-toggle="modal" data-target="#profession_modal">&gt;</a></dd>-->
<!--<dt>支付宝账号</dt>-->
<!--<dd><?php echo ($userTrueResult["alipay"]); ?><a href="" data-toggle="modal" data-target="#alipay_modal">&gt;</a></dd>-->
<!--<dt>支付宝昵称</dt>-->
<!--<dd><?php echo ($userTrueResult["alipaynickname"]); ?><a href="" data-toggle="modal" data-target="#alipaynickname_modal">&gt;</a></dd>-->
<!--<dt>手机号码</dt>-->
<!--<dd><?php echo ($userTrueResult["tel"]); ?><a href="" data-toggle="modal" data-target="#tel_modal">&gt;</a></dd>-->
<!--</dl>-->
<!--</div>-->
<!--</div>-->

<!--<?php if(is_array($userWxResult)): foreach($userWxResult as $a=>$c): ?>-->
<!--<div class="modal fade" id="<?php echo ($a); ?>_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
<!--<div class="modal-dialog">-->
<!--<div class="modal-content">-->
<!--<div class="modal-header">-->
<!--<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
<!--<h4 class="modal-title">&gt;<?php echo (option($a)); ?></h4>-->
<!--<h5>(如果弹出框背景为灰色请将背后的页面往下滑即可)</h5>-->
<!--</div>-->
<!--<div class="modal-body">-->
<!--<input type="text" class="v" id="<?php echo ($a); ?>" value="<?php echo ($c); ?>">-->
<!--</div>-->
<!--<div class="modal-footer">-->
<!--<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>-->
<!--<button type="button" class="btn btn-primary save">保存</button>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<?php endforeach; endif; ?>-->
</body>
</html>