<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/singcms/Public/css/bootstrap.min.css">
    <title>信息编辑</title></head>
<style>
    .key {
        height: 30px;
        line-height: 30px;
    }

    .value {
        height: 30px;
    }

    .row {
        padding-left: 20px;
        padding-right: 20px
    }
</style>
<body style="background-color: rgb(234,234,234)">
<div class="container">
    <div class="row" style="margin-bottom: 10px;background-color: white"><h3 class="text-center" style="margin: 10px;!important;">编辑信息</h3>
    </div>
    <form class="form-horizontal" id="edit-form" method="post">
        <div class="row">
            <div class="form-group"><label for="name" class="col-xs-4 key control-label text-left">姓名：</label>
                <div class="col-xs-8 value"><input type="text" id="name" class="form-control" name="name" required
                                                   value="<?php echo ($userTrueResult["name"]); ?>"></div>
            </div>
        </div>
        <div class="row">
            <div class="form-group"><label class="col-xs-4 key control-label text-left">性别：</label>
                <div class="col-xs-8 value"><select id="truesex" name="truesex"
                                                    style="height: 32px;width: 211.328px;padding-left: 10px">
                    <option value="0">请选择你的性别</option>
                    <option value="男">男</option>
                    <option value="女">女</option>
                </select></div>
            </div>
        </div>
        <div class="row">
            <div class="form-group"><label for="school" class="col-xs-4 key control-label text-left">学校：</label>
                <div class="col-xs-8 value"><select id="school" name="school"
                                                    style="height: 32px;width: 211.328px;padding-left: 10px">
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
                </select></div>
            </div>
        </div>
        <div class="row">
            <div class="form-group"><label for="academy" class="col-xs-4 key control-label text-left">学院：</label>
                <div class="col-xs-8 value"><input type="text" id="academy" class="form-control" name="academy"
                                                   placeholder="请输入学院的全称" required value="<?php echo ($userTrueResult["academy"]); ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group"><label for="profession" class="col-xs-4 key control-label text-left">专业：</label>
                <div class="col-xs-8 value"><input type="text" id="profession" class="form-control" name="profession"
                                                   placeholder="请输入专业的全称" required value="<?php echo ($userTrueResult["profession"]); ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group"><label for="alipay" class="col-xs-4 key control-label text-left">支付宝：</label>
                <div class="col-xs-8 value"><input type="text" id="alipay" class="form-control" name="alipay" required
                                                   value="<?php echo ($userTrueResult["alipay"]); ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group"><label for="alipayNickName"
                                           class="col-xs-4 key control-label text-left">支付宝昵称：</label>
                <div class="col-xs-8 value"><input type="text" id="alipayNickName" class="form-control"
                                                   name="alipaynickname" required
                                                   value="<?php echo ($userTrueResult["alipaynickname"]); ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="tel" class="col-xs-4 key control-label text-left">手机号码：</label>
                <div class="col-xs-8 value">
                    <input type="text" id="tel" class="form-control" name="tel" required value="<?php echo ($userTrueResult["tel"]); ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <a  class="btn btn-info btn-block" id="edit_button">确认并保存</a>
            </div>
        </div>
    </form>
</div>
</div>
<script src="/singcms/Public/js/jquery.js"></script>
<script>
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
    $("#edit_button").on('click', function () {
        var data = $("#edit-form").serializeArray();
        console.log(data);
        postData = {};
        $(data).each(function(i) {
            postData[this.name] = this.value;
        });
        postData['id'] =<?php echo ($id); ?>;
        $.post('http://bjx.cheerskeji.com/singcms/index.php/home/user/save',postData, function(result) {
            if (result.status == 0) {
                alert(result.message);

            } else if (result.status == 1) {
                alert(result.message);
                window.location.href = 'http://bjx.cheerskeji.com/singcms/index.php?m=home&c=index&a=findOpenId';
            }
        }, 'JSON');
    });
</script>
</body>
</html>