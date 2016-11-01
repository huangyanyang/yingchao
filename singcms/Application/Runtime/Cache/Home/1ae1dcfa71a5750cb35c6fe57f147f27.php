<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/singcms/Public/css/bootstrap.min.css">
    <title>信息录入</title>
</head>
<body>
<div class="container">
    <div class="row" style="margin-bottom: 10px;">
        <h1 class="text-center">请录入以下信息</h1>
    </div>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <form action="/singcms/Application/" class="form-horizontal">
                <div class="form-group">
                    <label for="name" class="col-xs-4 control-label text-center">姓名：</label>
                    <div class="col-xs-8">
                        <input type="text" id="name" class="form-control" name="name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="school" class="col-xs-4 control-label text-center">学校：</label>
                    <div class="col-xs-8">
                        <select id="school" name="school">
                            <option value="1">华南理工大学大学城校区</option>
                            <option value="2">华南师范大学大学城校区</option>
                            <option value="3">广东工业大学</option>
                            <option value="4">广东外语外贸大学</option>
                            <option value="5">中山大学大学城校区</option>
                            <option value="6">广州中医药大学</option>
                            <option value="7">广东药学院</option>
                            <option value="8">广州美术学院</option>
                            <option value="9">星海音乐学院</option>
                            <option value="10">广州大学</option>
                            <option value="11">南华学院</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="profession" class="col-xs-4 control-label text-center">专业：</label>
                    <div class="col-xs-8">
                        <input type="text" id="profession" class="form-control" name="profession" placeholder="请输入专业的全称" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alipay" class="col-xs-4 control-label text-center">支付宝：</label>
                    <div class="col-xs-8">
                        <input type="text" id="alipay" class="form-control" name="alipay" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tel" class="col-xs-4 control-label text-center">手机号码：</label>
                    <div class="col-xs-8">
                        <input type="number" id="tel" class="form-control" name="tel" required>
                    </div>
                </div>
                <div class="col-xs-6 col-xs-offset-3">
                    <button type="submit" class="btn btn-success btn-block">录入</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>