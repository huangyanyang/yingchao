var login ={
    check:function(){
        var username = $("input[name='username']").val();
        var password = $("input[name='password']").val();
        if(!username){
            dialog.error("用户名不能为空");
        }
         if(!password){
            dialog.error("密码不能为空");
        }
        $.post('/singcms/index.php?m=admin&c=login&a=check', {"username": username,"password":password}, function(result) {
            if(result.status == 0){
                return dialog.error(result.message);
            }
            if(result.status == 1){
                return dialog.success(result.message,'/singcms/index.php?m=admin&c=index');
            }
        },'JSON');
    }
}

