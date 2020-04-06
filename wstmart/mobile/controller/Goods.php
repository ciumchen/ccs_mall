<?php
namespace wstmart\mobile\controller;
use wstmart\common\model\GoodsCats;
use wstmart\common\model\Attributes as AT;
/**
 *
 * 商品控制器
 */
class Goods extends Base{
	/**
	 * 商品主页
	 */
	public function detail(){
        $root = WSTDomain();
		$m = model('goods');
        $goods = $m->getBySale(input('goodsId/d'));
        hook('mobileControllerGoodsIndex',['getParams'=>input()]);
        // 找不到商品记录
        if(empty($goods))return $this->fetch('error_lost');
        $goods['goodsDesc']=htmlspecialchars_decode($goods['goodsDesc']);
        $rule = '/<img src="\/(upload.*?)"/';
        preg_match_all($rule, $goods['goodsDesc'], $images);

        foreach($images[0] as $k=>$v){
            $goods['goodsDesc'] = str_replace('/'.$images[1][$k], $root.'/'.WSTConf("CONF.goodsLogo") . "\"  data-echo=\"".$root."/".WSTImg($images[1][$k],3), $goods['goodsDesc']);
        }
        if(!empty($goods)){
            $history = cookie("wx_history_goods");
            $history = is_array($history)?$history:[];
            array_unshift($history, (string)$goods['goodsId']);
            $history = array_values(array_unique($history));
            if(!empty($history)){
                cookie("wx_history_goods",$history,25920000);
            }
        }
        $goods['consult'] = model('GoodsConsult')->firstQuery($goods['goodsId']);
        $goods['appraises'] = model('GoodsAppraises')->getGoodsEachApprNum($goods['goodsId']);
		$this->assign("info", $goods);

        /**
         * 微信分享
         */
        $we = WSTWechat();
        $datawx = $we->getJsSignature(request()->scheme().'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        $this->assign("datawx", $datawx);

		return $this->fetch('goods_detail');
	}
	/**
     * 商品列表
     */
    public function lists(){
    	$this->assign("keyword", input('keyword'));
    	$this->assign("catId", input('catId/d'));
    	$this->assign("brandId", input('brandId/d'));
    	$this->assign("isDouble", input('isDouble/d'));
    	$this->assign("isGlobal", input('isGlobal/d'));
        $this->assign("isTrain", input('isTrain/d'));
        $this->assign("isGold", input('isGold/d'));
    	return $this->fetch('goods_list');
    }

    /**
     * 双倍积分区
     */
    public function doubleList(){
        $this->assign("keyword", input('keyword'));
        $this->assign("catId", input('catId/d'));
        $this->assign("brandId", input('brandId/d'));
        $this->assign("isDouble", 1);
        $this->assign("isGlobal", 0);
        return $this->fetch('double_list');
    }

    /**
     * 全球代购区
     */
    public function globalList(){
        $this->assign("keyword", input('keyword'));
        $this->assign("catId", input('catId/d'));
        $this->assign("brandId", input('brandId/d'));
        $this->assign("isDouble", 0);
        $this->assign("isGlobal", 1);
        return $this->fetch('global_list');
    }

    /**
     * V3直通车
     */
    public function trainList()
    {
        $this->assign("keyword", input('keyword'));
        $this->assign("catId", input('catId/d'));
        $this->assign("brandId", input('brandId/d'));
        $this->assign("isTrain", 1);
        return $this->fetch('goods_list');
    }

    /**
     * 金币专区
     */
    public function goldList()
    {
        $this->assign("keyword", input('keyword'));
        $this->assign("catId", input('catId/d'));
        $this->assign("brandId", input('brandId/d'));
        $this->assign("isGold", 1);
        return $this->fetch('gold_list');
    }

    /**
     * 获取列表
     */
    public function pageQuery(){
    	$m = model('goods');
    	$gc = new GoodsCats();
    	$catId = (int)input('catId');
        $data = []; 
    	if($catId>0){
    		$goodsCatIds = $gc->getParentIs($catId);
    	}else{
    		$goodsCatIds = [];
    	}

        //处理已选属性
        $vs = input('vs');
        $vs = ($vs!='')?explode(',',$vs):[];
        $data['arvs'] = $vs;
        $data['vs'][] = implode(',',$vs);

        $at = new AT();
        $goodsFilter = $at->listQueryByFilter((int)input('catId/d'));
        $ngoodsFilter = [];
        if(!empty($vs)){
            // 存在筛选条件,取出符合该条件的商品id,根据商品id获取可选属性进行拼凑
            $goodsId = model('goods')->filterByAttributes();

            $attrs = model('Attributes')->getAttribute($goodsId);
            // 去除已选择属性
            foreach ($attrs as $key =>$v){
                if(!in_array($v['attrId'],$vs)){$ngoodsFilter[] = $v;}
            }
        }else{
            // 当前无筛选条件,取出分类下所有属性
            foreach ($goodsFilter as $key =>$v){
                if(!in_array($v['attrId'],$vs))$ngoodsFilter[] = $v;
            }
        }
        $data['goodsPage'] = $m->pageQuery($goodsCatIds);
        foreach ($ngoodsFilter as $k => $val) {
           $result = array_values(array_unique($ngoodsFilter[$k]['attrVal']));

           $ngoodsFilter[$k]['attrVal'] = $result;
        }
        $data['goodsFilter'] = $ngoodsFilter;

    	foreach ($data['goodsPage']['data'] as $key =>$v){
    		$data['goodsPage']['data'][$key]['goodsImg'] = WSTImg($v['goodsImg'],3,'goodsLogo');
    		$data['goodsPage']['data'][$key]['praiseRate'] = ($v['totalScore']>0)?(sprintf("%.2f",$v['totalScore']/($v['totalUsers']*15))*100).'%':'100%';
    	}
        // `券`标签
        hook('afterQueryGoods',['page'=>&$data['goodsPage']]);
    	return $data;
    }

    /**
    * 浏览历史页面
    */
    public function history(){
        return $this->fetch('users/history/list');
    }
    /**
    * 获取浏览历史
    */
    public function historyQuery(){
        $rs = model('goods')->historyQuery();
        if(!empty($rs)){
	        foreach($rs['data'] as $k=>$v){
	            $rs['data'][$k]['goodsImg'] = WSTImg($v['goodsImg'],3,'goodsLogo');
	        }
        }
        return $rs;
    }
}
