<?php
	namespace Admin\Controller;
	use Think\Controller;
	class MenuController extends Controller{
		public function index(){
			$data = array();
			if(isset($_REQUEST['type'] )&& in_array($_REQUEST['type'], array(0,1))){
				$data['type'] = intval($_REQUEST['type']);
				$this->assign('type',$_REQUEST['type']);
			}else{
				$this->assign('type',-1);
			}
				/*
				分页操作
			*/
			$page = $_REQUEST['p']? $_REQUEST['p']:1;
			$pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize']:5;
			$menus = D('Menu') ->getMenus($data,$page,$pageSize);
			$menusCount = D('Menu')->getMenusCount($data);
			$res = new \Think\Page($menusCount,$pageSize);
			$pageRes = $res->show();
			$this->assign('pageRes',$pageRes);
			$this->assign('menus',$menus);
			$this->display();
		}
		public function add(){
			if($_POST){
				if(!isset($_POST['name'])|| !$_POST['name']){
					return show(0,"菜单名不能为空");
				}
				if(!isset($_POST['m']) || !$_POST['m']){
					return show(0,"模块名不能为空");
				}
				if(!isset($_POST['c']) || !$_POST['c']){
					return show(0,"控制器不能为空");
				}
				if(!isset($_POST['f']) || !$_POST['f']){
					return show(0,"方法名不能为空");
				}
				if($_POST['menu_id']){
					return $this->save($_POST);
				}
				$menuId = D('Menu')->insert($_POST);
				if($menuId){
					return show(1,"新增成功",$menuId);
				}
				return show(0,'新增失败',$menuId);
			}else{
				$this->display();
			}
		}
		public function edit(){
			$menu_id = $_GET['menu_id'];
			$ret = D('Menu') ->find($menu_id);
			$this->assign('ret',$ret);
			$this->display();
		}
		public function save($data){
			try{
				$id = D('Menu')->updataMenuById($data['menu_id'],$data);
				if($id == false){
					return show(0,'更新失败');
				}
				return show(1,'更新成功');
			}catch(Exception $e){
				return show(0,$e->getMessage());
			}
			
		}
		public function setStatus(){
			$menu_id = $_POST['menu_id'];
			$status = -1;
			try{
				$id=D('Menu')->setStatusById($menu_id,$status);
				if($id == false){
					return show(0,'操作失败');
				}
				return show(1,'操作成功');
			}catch(Exception $e){
				return show(0,$e->getMessage());
			}
		}
		public function listorder(){
			$listorder = $_POST['listOrder'];
			$jumpUrl = $_SERVER['HTTP_REFERER'];
			$errors = array();
			if($listorder){
				foreach ($listorder as $menuId => $v) {
					// 执行更新操作
					try{	
						$id = D('Menu')->updateListorderById($menuId,$v);
						if($id === false){
							$errors[] = $menuId;
						
						}
					}catch(Exception $e){
						return show(0,$e->getMessage());
					}
				}
				if($errors){
						return show(0,'排序失败-'.implode(',',$errors),array('jumpUrl'=>$jumpUrl));
				}
				return show(1,'排序成功',array('jumpUrl'=>$jumpUrl));
			}else{
				return show(0,'排序数据失败',array('jumpUrl'=>$jumpUrl));
			}
		}
		
	}
?>