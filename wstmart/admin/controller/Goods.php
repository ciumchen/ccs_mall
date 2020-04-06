<?php
namespace wstmart\admin\controller;
use think\facade\Request;
use wstmart\admin\model\Goods as M;
/**
 *
 * 商品控制器
 */
class Goods extends Base{
   /**
	* 查看上架商品列表
	*/
	public function index(){
    	$this->assign("areaList",model('areas')->listQuery(0));
		return $this->fetch('list_sale');
	}
   /**
    * 批量删除商品
    */
    public function batchDel(){
        $m = new M();
        return $m->batchDel();
    }

    /**
    * 设置违规商品
    */
    public function illegal(){
        $m = new M();
        return $m->illegal();
    }
    /**
    * 批量设置违规商品
    */
    public function batchIllegal(){
        $m = new M();
        return $m->batchIllegal();
    }
    /**
     * 通过商品审核
     */
    public function allow(){
        $m = new M();
        return $m->allow();
    }
    /**
     * 编辑订单表积分、奖金
     */
    public function edit()
    {
        # 获取更新商品的主键id
        $goodsId = Request::param('goodsId');
        # 根据主键进行查询
        $goodsInfo = M::where('goodsId', $goodsId)->find();
        # halt($goodsInfo);
        # 设置模版变量
        $this->view->assign('title', '商品属性编辑');
        $this->view->assign('goodsInfo', $goodsInfo);
        # 进行模版渲染
        return $this->view->fetch('edit');
    }

    /*
     * 保存商品积分、奖金
     * */
    public function doEdit()
    {
        # 获取用户提交的信息
        $data = Request::param();
        # halt($data['id']);
        # 取出主键
        $goodsId = $data['goodsId'];
        # halt($goodsId);
        # 删除主键id
        unset($data['goodsId']);
        # 执行更新信息
        if(M::where('goodsId', $goodsId)->data($data)->update())
        {
            return $this->success('修改成功', 'index');
        }
        # 更新失败
        $this->error('修改失败');
    }

    /**
     * 批量通过商品审核
     */
    public function batchAllow(){
        $m = new M();
        return $m->batchAllow();
    }
	/**
	 * 获取上架商品列表
	 */
	public function saleByPage(){
		$m = new M();
		$rs = $m->saleByPage();
		$rs['status'] = 1;
		return WSTGrid($rs);
	}
	
    /**
	 * 审核中的商品
	 */
    public function auditIndex(){
    	$this->assign("areaList",model('areas')->listQuery(0));
		return $this->fetch('goods/list_audit');
	}
	/**
	 * 获取审核中的商品
	 */
    public function auditByPage(){
		$m = new M();
		$rs = $m->auditByPage();
		$rs['status'] = 1;
		return WSTGrid($rs);
	}
   /**
	 * 审核中的商品
	 */
    public function illegalIndex(){
    	$this->assign("areaList",model('areas')->listQuery(0));
		return $this->fetch('list_illegal');
	}
    /**
	 * 获取违规商品列表
	 */
	public function illegalByPage(){
		$m = new M();
		$rs = $m->illegalByPage();
		$rs['status'] = 1;
		return WSTGrid($rs);
	}
    
    /**
     * 删除商品
     */
    public function del(){
    	$m = new M();
    	return $m->del();
    }
}
