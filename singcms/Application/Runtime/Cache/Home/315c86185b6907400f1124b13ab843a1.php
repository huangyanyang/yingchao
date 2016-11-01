<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/singcms/Public/css/bootstrap.min.css">
    <title>信息录入</title></head>
<style>
    .key{
        height: 30px;
        line-height: 30px;
    }
    .value{
        height: 30px;
    }
</style>
<body style="background-color: rgb(234,234,234)">
<div class="container">
    <div class="row" style="margin-bottom: 10px;background-color: white"><h3 class="text-center" style="margin: 10px;!important;">请录入以下信息</h3></div>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1" >
            <form action="http://bjx.cheerskeji.com/singcms/index.php/home/index/signup" class="form-horizontal"
                  method="post">
                <div class="form-group"><label for="name" class="col-xs-4 key control-label text-center">姓名：</label>
                    <div class="col-xs-8 value"><input type="text" id="name" class="form-control" name="name" required></div>
                </div>
                <div class="form-group"><label class="col-xs-4 key control-label text-center">性别：</label>
                    <div class="col-xs-8 value"><select id="truesex" name="truesex" style="height: 32px;width: 211.328px;padding-left: 10px">
                        <option value="0">请选择你的性别</option>
                        <option value="男">男</option>
                        <option value="女">女</option>
                    </select></div>
                </div>
                <div class="form-group"><label for="school" class="col-xs-4 key control-label text-center">学校：</label>
                    <div class="col-xs-8 value"><select id="school" name="school" style="height: 32px;width: 211.328px;padding-left: 10px">
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
                <div class="form-group"><label for="academy" class="col-xs-4 key control-label text-center">学院：</label>
                    <div class="col-xs-8 value"><input type="text" id="academy" class="form-control" name="academy"
                                                 placeholder="请输入学院的全称" required></div>
                </div>
                <div class="form-group"><label for="profession" class="col-xs-4 key control-label text-center">专业：</label>
                    <div class="col-xs-8 value"><input type="text" id="profession" class="form-control" name="profession"
                                                 placeholder="请输入专业的全称" required></div>
                </div>
                <div class="form-group"><label for="alipay" class="col-xs-4 key control-label text-center">支付宝：</label>
                    <div class="col-xs-8 value"><input type="text" id="alipay" class="form-control" name="alipay" required>
                    </div>
                </div>
                <div class="form-group"><label for="alipayNickName" class="col-xs-4 key control-label text-center">支付宝昵称：</label>
                    <div class="col-xs-8 value"><input type="text" id="alipayNickName" class="form-control" name="alipaynickname" required>
                    </div>
                </div>
                <div class="form-group"><label for="tel" class="col-xs-4 key control-label text-center">手机号码：</label>
                    <div class="col-xs-8 value"><input type="number" id="tel" class="form-control" name="tel" required></div>
                </div>
                <div class="col-xs-8 col-xs-offset-2">
                    <button type="submit" class="btn btn-info btn-block">录入</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>