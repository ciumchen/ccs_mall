<?php
namespace wstmart\wechat\controller;
use wstmart\wechat\model\GoodsCats as M;
/**
 *
 * 商品分类控制器
 */
class GoodsCats extends Base{
	/**
     * 列表
     */
    public function index(){
    	$m = new M();
    	$goodsCatList = $m->getGoodsCats();
    	$this->assign('list',$goodsCatList);
    	return $this->fetch('goods_category');
    }  
}
