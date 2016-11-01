<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
class ImageController extends CommonController {
	private $_uploadObj;
	public function _construct(){

	}
	public function ajaxuploadimage(){
		$upload =D('UploadImage');
		$res = $upload->imageUpload();
		if($res === false){
			return show(0,'上传失败',' ');
		}else{
			return show(1,'上传成功',$res);
		}
	}
}