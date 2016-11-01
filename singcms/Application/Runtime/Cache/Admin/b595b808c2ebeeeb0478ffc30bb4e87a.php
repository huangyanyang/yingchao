<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>sing后台管理平台</title>
    <!-- Bootstrap Core CSS -->
    <link href="/singcms/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/singcms/Public/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/singcms/Public/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/singcms/Public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/singcms/Public/css/sing/common.css" />
    <link rel="stylesheet" href="/singcms/Public/css/party/bootstrap-switch.css" />
    <link rel="stylesheet" type="text/css" href="/singcms/Public/css/party/uploadify.css">

    <!-- jQuery -->
    <script src="/singcms/Public/js/jquery.js"></script>
    <script src="/singcms/Public/js/bootstrap.min.js"></script>
    <script src="/singcms/Public/js/dialog/layer.js"></script>
    <script src="/singcms/Public/js/dialog.js"></script>
    <script type="text/javascript" src="/singcms/Public/js/party/jquery.uploadify.js"></script>

</head>

    



<body>

<div id="wrapper">

    
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    
    <a class="navbar-brand" >鹰巢服务后台管理系统</a>
  </div>
  <!-- Top Menu Items -->
  <ul class="nav navbar-right top-nav">
    
    
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo ($username); ?> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li>
          <a href="#"><i class="fa fa-fw fa-user"></i> 个人中心</a>
        </li>
       
        <li class="divider"></li>
        <li>
          <a href="/singcms/admin.php?c=login&a=loginout"><i class="fa fa-fw fa-power-off"></i> 退出</a>
        </li>
      </ul>
    </li>
  </ul>
  <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav nav_list">
      <li >
        <a href="/singcms/admin.php"><i class="fa fa-fw fa-dashboard"></i> 首页</a>
      </li>
      <?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li>
        <a href=''><i class="fa fa-fw fa-bar-chart-o"></i></a>
      </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    您好!欢迎使用鹰巢服务后台管理系统
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> 用户信息列表如下
                    </li>
                </ol>
            </div>
        </div>


        <div class="row">
            <table class="table table-hover table-bordered">
                <tr>
                    <th>Id</th>
                    <th>姓名</th>
                    <th>学院</th>
                    <th>学校</th>
                    <th>专业</th>
                    <th>支付宝</th>
                    <th>支付宝昵称</th>
                    <th>手机号码</th>
                    <th>性别</th>
                </tr>
            <?php if(is_array($user_ture_res)): foreach($user_ture_res as $key=>$user_ture_res): ?><tr>
                    <td><?php echo ($user_ture_res["id"]); ?></td>
                    <td><?php echo ($user_ture_res["name"]); ?></td>
                    <td><?php echo ($user_ture_res["academy"]); ?></td>
                    <td><?php echo ($user_ture_res["school"]); ?></td>
                    <td><?php echo ($user_ture_res["profession"]); ?></td>
                    <td><?php echo ($user_ture_res["alipay"]); ?></td>
                    <td><?php echo ($user_ture_res["alipaynickname"]); ?></td>
                    <td><?php echo ($user_ture_res["tel"]); ?></td>
                    <td><?php echo ($user_ture_res["truesex"]); ?></td>
                    </tr><?php endforeach; endif; ?>
            </table>
        </div>
        <div class="row">
            <a href="/singcms/admin.php/admin/index/export_excel" class="btn btn-success">导出为Excel表格</a>
        </div>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<!-- Morris Charts JavaScript -->

</div>
    <!-- /#wrapper -->

<script src="/singcms/Public/js/admin/common.js"></script>



</body>

</html>