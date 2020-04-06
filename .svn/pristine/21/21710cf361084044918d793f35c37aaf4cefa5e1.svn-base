<?php
namespace wstmart\admin\controller;
/**
 *
 * 基础控制器
 */
use think\Controller;
class Base extends Controller {
	public function __construct(){
		parent::__construct();
		$this->assign("v",WSTConf('CONF.wstVersion'));
		$this->view->filter(function($content){
            return str_replace("__ADMIN__",str_replace('/index.php','',$this->request->root()).'/wstmart/admin/view/',$content);
        });
	}
    protected function fetch($template = '', $vars = [], $config = [])
    {
        return $this->view->fetch($template, $vars, $config);
    }

	public function getVerify(){
	    ob_clean();
		WSTVerify();
	}
	
	public function uploadPic(){
		return WSTUploadPic(1);
	}

	/**
    * 编辑器上传文件
    */
    public function editorUpload(){
        return WSTEditUpload(1);
    }
}