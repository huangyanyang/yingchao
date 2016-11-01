<?php
namespace Common\Model;
use Think\Model;
class MenuModel extends Model{
	private $_db = ' ';
	public function __construct(){
		$this->_db = M('menu');
	}
	public function insert($data = array()){
		if(!$data || !is_array($data)){
			return 0;
		}
		return $this->_db->add($data);
	}
	public function getMenus($data,$page,$pageSize = 10){
		$data['status'] = array('neq',-1);
		$offset = ($page-1)*$pageSize;
		$list = $this->_db->where($data)->order('listorder desc,menu_id desc')->limit($offset,$pageSize)->select();
		return $list;
	}
	public function getMenusCount($data = array()){
		$data['status'] = array('neq',-1);
		return $this->_db->where($data)->count();
	}
	public function find($menu_id){
		if(!$menu_id || !is_numeric($menu_id)){
			return array();
		}
		return $this->_db->where('menu_id='.$menu_id) ->find();
	}
	public function updataMenuById($id,$data){
		if(!$id || !is_numeric($id)){
			throw_exception('Id不合法');
		}
		if(!$data || !is_array($data)){
			throw_exception('更新的数据不合法');
		}
		return $this->_db->where('menu_id='.$id)->save($data);
	}
	public function setStatusById($menu_id,$status){
		if(!$menu_id || !is_numeric($menu_id)){
			throw_exception('ID不合法');
		}
		if(!$status || !is_numeric($status)){
			throw_exception('状态不合法');
		}
		$data['status'] = $status;
		return $this->_db->where("menu_id=".$menu_id)->save($data);
	}
	public function updateListorderById($id,$listorder){
		if(!$id || !is_numeric($id)){
			throw_exception('ID不合法');
		}
		$data['listorder'] = intval($listorder);
		return $this->_db->where('menu_id='.$id)->save($data);
	}
	public function getAdminMenus(){
		$data = array(
				'status' => array('neq',-1),
				'type' =>1,
			);
		return $this->_db->where($data)->order('listorder desc,menu_id desc')->select();
	}
}
?>