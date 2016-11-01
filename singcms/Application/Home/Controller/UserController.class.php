<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    function save(){
        $userTruePost['name'] =$_POST['name'];
        $userTruePost['school'] =$_POST['school'];
        $userTruePost['academy'] =$_POST['academy'];
        $userTruePost['profession'] =$_POST['profession'];
        $userTruePost['alipay'] =$_POST['alipay'];
        $userTruePost['alipaynickname'] =$_POST['alipaynickname'];
        $userTruePost['tel'] =$_POST['tel'];
        $userTruePost['truesex'] =$_POST['truesex'];
        $id = $_POST['id'];
        $userTrue = D('user_true');
        $userTrueResult = $userTrue->where('id='.$id)->save($userTruePost);
        if($userTrueResult){
            return show(1,'保存成功！');;
        }else{
            return show(0,'保存失败');;
        }
    }
    function edit(){
        $id = $_SESSION['id'];
        $userTrue = D('user_true');
        $userWx = D('user_wx');
        $userTrueResult = $userTrue->where('id="' . $id . '"')->find();
        $userWxResult = $userWx->where('id="' . $id . '"')->find();
        $this->assign('id', $id);
        $this->assign('userTrueResult', $userTrueResult);
        $this->assign('userWxResult', $userWxResult);
        $this->display(T("UserList/edit"));
    }
}