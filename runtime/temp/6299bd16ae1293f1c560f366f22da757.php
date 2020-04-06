<?php /*a:2:{s:50:"/home/wwwroot/default/wstmart/admin/view/main.html";i:1532939506;s:50:"/home/wwwroot/default/wstmart/admin/view/base.html";i:1532939608;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title>后台管理中心 - <?php echo WSTConf('CONF.mallName'); ?></title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="__ADMIN__/js/bootstrap/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="/static/plugins/layui/css/layui.css" type="text/css" />
<link rel="stylesheet" href="/static/plugins/font-awesome/css/font-awesome.min.css" type="text/css" />
<script src="__ADMIN__/js/jquery.min.js"></script>

<link href="__ADMIN__/css/common.css?v=<?php echo $v; ?>" rel="stylesheet" type="text/css" />
<script>
window.conf = {"DOMAIN":"<?php echo str_replace('index.php','',app('request')->root(true)); ?>","ROOT":"","APP":"/index.php","STATIC":"/static","SUFFIX":"<?php echo config('url_html_suffix'); ?>","GOODS_LOGO":"<?php echo WSTConf('CONF.goodsLogo'); ?>","SHOP_LOGO":"<?php echo WSTConf('CONF.shopLogo'); ?>","MALL_LOGO":"<?php echo WSTConf('CONF.mallLogo'); ?>","USER_LOGO":"<?php echo WSTConf('CONF.userLogo'); ?>",'GRANT':'<?php echo implode(",",session("WST_STAFF.privileges")); ?>',"IS_CRYPT":"<?php echo WSTConf('CONF.isCryptPwd'); ?>","ROUTES":'<?php echo WSTRoute(); ?>',"MAP_KEY":"<?php echo WSTConf('CONF.mapKey'); ?>","__HTTP__":"<?php echo WSTProtocol(); ?>"}
</script>
<script language="javascript" type="text/javascript" src="/static/js/common.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div id="j-loader"><img src="__ADMIN__/img/ajax-loader.gif"/></div>

<div id='wstmart-version-tips' class="alert alert-warning alert-dismissible wst-repair layui-col-xs12" role="alert" style='margin-bottom:-4px;background: #e6f7ff;display:none'>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <img class="img-remind"src="__ADMIN__/img/main_remind.png"/><strong >更新提示：　</strong>您有新的版本(<span id='wstmart_version'>0.0.0</span>)可以下载啦~，请联系客服<a href="tencent://message/?uin=153289970&Site=QQ交谈&Menu=yes">
					  <img border="0" style='vertical-align:middle' src="<?php echo WSTProtocol(); ?>://wpa.qq.com/pa?p=1:153289970:7" alt="QQ交谈" width="60" height="20" />
				  </a>获取
  <div ><img class="remind-angle-right" src="__ADMIN__/img/angle_13.png"/></div>
</div>
<div id='wstmart-accredit-tips' class="alert alert-warning alert-dismissible wst-repair layui-col-xs12" role="alert" style="background: #e6f7ff;display:none;margin-bottom:0px">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <img class="img-remind"src="__ADMIN__/img/main_remind1.png"/><strong>授权提示：　</strong>系统检测到您未获取授权，点此<a target='_blank' href='http://www.wstmart.net/index.php?c=License&a=index'>获取系统授权码</a>
  <div ><img class="remind-angle-left" src="__ADMIN__/img/angle_12.png"/></div>
</div>
<div width='100%' border='0' class="layui-row">
	<div class="layui-col-md9" >
		<div class="wst-total wst-summary">
			<div class='wst-summary-head  layui-col-md12'>
				<span class="content">今日统计</span>
			</div>
			<div class="layui-col-md4"style="height: auto;overflow: hidden;">
			 <div class="wst-summary-content">
			    <div class="img"><img src="__ADMIN__/img/img_info1.png"/></div>
				<div class="data">
					<p class="data-top" style="color: #73c734;"><?php echo $object['tody']['userType0']; ?></p>
					<div class="data-bottom">今日新增会员</div>
				</div>
			 </div>
			 <div class="wst-summary-content">
				<div class="img"><img src="__ADMIN__/img/img_info4.png"/></div>
				<div class="data">
					<p class="data-top" style="color: #1fafec;"><?php echo $object['tody']['userType1']; ?></p>
					<div class="data-bottom">今日新增商家</div>
				</div>
			 </div>
			</div>
			<div class="layui-col-md4"style="height: auto;overflow: hidden;">
			 <div class="wst-summary-content">
			    <div class="img"><img src="__ADMIN__/img/img_info2.png"/></div>
				<div class="data">
					<p class="data-top" style="color: #15b5e9;"><?php echo $object['tody']['shopApplys']; ?></p>
					<div class="data-bottom">今日开店申请</div>
				</div>
			 </div>
			 <div class="wst-summary-content">
				<div class="img"><img src="__ADMIN__/img/img_info5.png"/></div>
				<div class="data">
					<p class="data-top" style="color: #0c8ae1;"><?php echo $object['tody']['compalins']; ?></p>
					<div class="data-bottom">今日新增投诉</div>
				</div>
			 </div>
			</div>
			<div class="layui-col-md4"style="height: auto;overflow: hidden;">
			 <div class="wst-summary-content">
			    <div class="img"><img src="__ADMIN__/img/img_info3.png"/></div>
				<div class="data">
					<p class="data-top" style="color: #da53d3;"><?php echo $object['mall']['saleGoods']; ?>/<?php echo $object['tody']['auditGoods']; ?></p>
					<div class="data-bottom">上架商品/待审核</div>
				</div>
			 </div>
			 <div class="wst-summary-content">
				<div class="img"><img src="__ADMIN__/img/img_info6.png"/></div>
				<div class="data">
					<p class="data-top" style="color: #ae1aa2;"><?php echo $object['tody']['order']; ?></p>
					<div class="data-bottom">今日新增订单</div>
				</div>
			 </div>
			</div>
		</div>
		<div class="wst-total wst-summary">
			<div class='wst-summary-head layui-col-md12'>
				<span class="content">商城统计</span>
			</div>
			<div class="wst-summary-content2 layui-col-md6">
				<div class="wst-strip">
                  <div class="wst-title">会员总数</div>
                  <img src="__ADMIN__/img/img_info1-1.png"/><span class="wst-num"><?php echo $object['mall']['userType0']; ?>个</span>
				</div>
				<div class="wst-strip">
                  <div class="wst-title">上架商品总数/待审核数</div>
                  <img src="__ADMIN__/img/img_info3-1.png"/><span class="wst-num"><?php echo $object['mall']['saleGoods']; ?>/<?php echo $object['mall']['auditGoods']; ?>个</span>
				</div>
				<div class="wst-strip">
                  <div class="wst-title">品牌总数</div>
                  <img src="__ADMIN__/img/img_info5-1.png"/><span class="wst-num"><?php echo $object['mall']['brands']; ?>个</span>
				</div>
		    </div>
		    <div class="wst-summary-content2 layui-col-md6">
		    	<div class="wst-strip">
                  <div class="wst-title">商家总数</div>
                  <img src="__ADMIN__/img/img_info2-1.png"/><span class="wst-num"><?php echo $object['mall']['userType1']; ?>个</span>
				</div>
				<div class="wst-strip">
                  <div class="wst-title">订单总数</div>
                  <img src="__ADMIN__/img/img_info4-1.png"/><span class="wst-num">0个</span>
				</div>
				<div class="wst-strip">
                  <div class="wst-title">评价总数</div>
                  <img src="__ADMIN__/img/img_info6-1.png"/><span class="wst-num"><?php echo $object['mall']['appraise']; ?>个</span>
				</div>
		    </div>
	    </div>
	</div>
	<div class="layui-col-md3 " style="padding: 10px 10px 10px 0px;">
	<div class="wst-cont-total ">
	  <div class="wst-cont-bor">
		<div class="wst-cont-head">
			<img src="__ADMIN__/img/about_1.png"/><span> 走进我们</span>
		</div>
		<div class="wst-cont-body">官网：<a href='http://www.wstmart.net' target='_blank'>http://www.wstmart.net</a></div>
	  </div>
	  <div class="wst-cont-bor">
		<div class="wst-cont-head">
			<img src="__ADMIN__/img/about_2.png"/><span> 开发团队：</span>
		</div>
		<div class="wst-cont-body">广州商淘信息科技有限公司</div>
	  </div>
	  <div class="wst-cont-bor">
		<div class="wst-cont-head">
			<img src="__ADMIN__/img/about_8.png"/><span> 我们的理念</span>
		</div>
		<div class="wst-cont-body">我们愿与更多中小企业一起努力，一起成功!<br/>We Success together!</div>
	  </div>
	  <div class="wst-cont-bor">
		<div class="wst-cont-head">
			<img src="__ADMIN__/img/about_4.png"/><span> 使用交流</span>
		</div>
		<div class="wst-cont-body">交流社区：<a href='http://bbs.shangtao.net' target='_blank'>http://bbs.shangtao.net</a><br/>用户QQ群：590755485</div>
	  </div>
	  <div class="wst-cont-bor">
		<div class="wst-cont-head">
			<img src="__ADMIN__/img/about_3.png"/><span> 商城定制</span>
		</div>
		<div class="wst-cont-body" style='border-bottom:0px'>电话：020-85289921<br/>QQ：153289970</div>
	  </div>
	  
	</div>
	</div>
</div>
<div class="wst-total wst-summary" style="height: 400px;>
 <div class='wst-summary-head layui-col-md12'>
   <span class="content">最近1个月新增会员</span>
   <div id="main" style='width:100%;height:350px;'></div>
 </div>
</div>
<div class="wst-total wst-summary" style="height: 400px;">
  <div class='wst-summary-head layui-col-md12'>
   <span class="content">最近1个月订单数</span>
   <div id="main1" style='width:100%;height:350px;'></div>
  </div>
</div>
<div class="wst-total wst-summary" style='padding-bottom:40px'>
			<div class='wst-summary-head layui-col-md12'>
				<span class="content">系统信息</span>
			</div>
			<div class="wst-system-chunk layui-col-md6 wst-bor-top">
				<div class="wst-system-strip wst-line-top">
					<div class="title"><span>软件版本号：</span></div>
					<div class="text">【授权版】<?php echo WSTConf("CONF.wstVersion"); ?></div>
				</div>
				<div class="wst-system-strip">
					<div class="title"><span>问题反馈：</span></div>
					<div class="text"><a href="http://bbs.shangtao.net" target='_blank'>点击反馈</a></span></div>
				</div>
				<div class="wst-system-strip">
					<div class="title"><span>服务器操作系统：</span></div>
					<div class="text"><?php echo PHP_OS; ?></div>
				</div>
				<div class="wst-system-strip">
					<div class="title"><span>PHP版本：</span></div>
					<div class="text"><?php echo PHP_VERSION; ?></div>
				</div>
			</div>
			<div class="wst-system-chunk layui-col-md6 wst-bor-top" style="border-right:0px solid transparent;">
				<div class="wst-system-strip wst-line-top">
					<div class="title"><span>授权类型：</span></div>
					<div class="text"><div id='licenseStatus'></div></div>
				</div>
				<div class="wst-system-strip">
					<div class="title"><span>授权码：</span></div>
					<div class="text"><?php echo WSTConf("CONF.mallLicense"); ?></div>
				</div>
				<div class="wst-system-strip">
					<div class="title"><span>WEB服务器：</span></div>
					<div class="text"><?php echo app('request')->server('SERVER_SOFTWARE'); ?></div>
				</div>
				<div class="wst-system-strip">
					<div class="title"><span>MYSQL版本：</span></div>
					<div class="text"><?php echo $object['MySQL_Version']; ?></div>
				</div>
			</div>
</div>
<input type="hidden" id="startDate" name="startDate" class="laydate-icon ipt" maxLength="20" value="<?php echo $object['time']['startDate']; ?>" placeholder='开始日期'/>
<input type="hidden" id="endDate" name="endDate" class="laydate-icon ipt" maxLength="20" value="<?php echo $object['time']['endDate']; ?>" placeholder='结束日期'/>

<script src="__ADMIN__/js/bootstrap/js/bootstrap.min.js"></script>
<script language="javascript" type="text/javascript" src="/static/plugins/layui/layui.all.js"></script>
<script language="javascript" type="text/javascript" src="__ADMIN__/js/common.js"></script>

<script src="/static/plugins/echarts/echarts.min.js?v=<?php echo $v; ?>" type="text/javascript"></script>
<script src="__ADMIN__/js/main.js?v=<?php echo $v; ?>" type="text/javascript"></script>
<script>
function enterLicense(){
	location.href='<?php echo Url("admin/index/enterLicense"); ?>';
}
</script>

<?php echo hook('initCronHook'); ?>
</body>
</html>