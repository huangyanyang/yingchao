<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/singcms/Public/css/bootstrap.min.css">
    <title>正在跳转到个人中心......</title></head>
<body bgcolor="rgb(234.234,234)">
<div class="container" style="height: 800px;">
    <div class="row" style="margin-bottom: 10px;"><h4 class="text-center" style="line-height: 500px">您已经录入过信息，正在跳转到个人中心......(<span id="second"></span>)</h4></div>
</div>
</div>
<script src="/singcms/Public/js/jquery.js"></script>
<script>
    $(function () {
        var i = 3;
        var int = self.setInterval(
                function () {
                    $('#second').text(i--);
                    console.log(i);
                    if(i == 0){
                        window.clearInterval(int);
                        window.location.href = '/singcms/index.php/home/index/userList'
                    }
                },1000);

    })
</script>
</body>
</html>