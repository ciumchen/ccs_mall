<?php
namespace wstmart\home\controller;
use wstmart\common\model\UserScores as MUserscores;
use think\Db;
/**
 *
 * 积分控制器
 */
class Userscores extends Base{
    protected $beforeActionList = ['checkAuth'];
    /**
    * 查看商城消息
    */
	public function index(){
        $userName = (int)session('WST_USER.userName');
        # halt($userName);
        # 连接会员中心数据库
        $userData = Db::connect('member')->table('m_users')->where('mobile', $userName)->field('uid,gold,image_url')->find();
        # halt($userData);
		# $rs = model('Users')->getFieldsById((int)session('WST_USER.userId'),['userScore','userTotalScore']);
		$this->assign('object',$userData);
		return $this->fetch('users/userscores/list');
	}
    /**
    * 获取数据
    */
    public function pageQuery(){
        $userId = (int)session('WST_USER.userId');
        # $mobile = (int)session('WST_USER.mobile');
        # 连接会员中心数据库
        # $userData = Db::connect('member')->table('m_users')->where('mobile', $mobile)->find();
        $data = model('UserScores')->pageQuery($userId);
        return WSTReturn("", 1,$data);
    }
    /**
     * 签到积分
     */
    public function signScore(){
    	$m = new MUserscores();
    	$userId = (int)session('WST_USER.userId');
    	$rs = $m->signScore($userId);
    	return $rs;
    }
}
