<?php

function show($status, $message, $data = array())
{
    $result = array('status' => $status, 'message' => $message, 'data' => $data,);
    exit(json_encode($result));
}

function getMd5Password($password)
{
    return md5($password . C('MD5_PRE'));
}

function getMenuType($type)
{
    return $type == 1 ? '后台菜单' : '前端导航';
}

function status($status)
{
    if ($status == 1) {
        $str = '正常';
    } elseif ($status == 0) {
        $str = '关闭';
    } else {
        $str = '删除';
    }
    return $str;
}

//根据数据库的字段名（英文）转换为中文
function option($english)
{
    switch ($english) {
        case 'headimgurl':
            return '头像';
        case 'name':
            return '姓名';
        case 'nickname':
            return '昵称';
        case 'country':
            return '国家';
        case 'province':
            return '省份';
        case 'city':
            return '城市';
        case 'school':
            return '学校';
        case 'academy':
            return '学院';
        case 'profession':
            return '专业';
        case 'alipay':
            return '支付宝账号';
        case 'alipaynickname':
            return '支付宝昵称';
        case 'tel':
            return '手机号码';
    }
}

function getAdminMenuUrl($nav)
{
    $url = '/singcms/admin.php?c=' . $nav['c'] . '&a=' . $nav['f'];
    if ($nav['f'] == 'index') {
        $url = '/singcms/admin.php?c=' . $nav['c'];
    }
    return $url;
}

function getActive($navc)
{
    $c = strtolower(CONTROLLER_NAME);
    if ($navc == $c) {
        return 'class="active"';
    }
    return ' ';
}