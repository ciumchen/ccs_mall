<?php /*a:2:{s:65:"/home/wwwroot/default/wstmart/admin/view/wxtemplatemsgs/list.html";i:1532936928;s:50:"/home/wwwroot/default/wstmart/admin/view/base.html";i:1532939608;}*/ ?>
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

<link rel="stylesheet" type="text/css" href="__ADMIN__/js/mmgrid/mmGrid.css?v=<?php echo $v; ?>" />

<link href="__ADMIN__/css/common.css?v=<?php echo $v; ?>" rel="stylesheet" type="text/css" />
<script>
window.conf = {"DOMAIN":"<?php echo str_replace('index.php','',app('request')->root(true)); ?>","ROOT":"","APP":"/index.php","STATIC":"/static","SUFFIX":"<?php echo config('url_html_suffix'); ?>","GOODS_LOGO":"<?php echo WSTConf('CONF.goodsLogo'); ?>","SHOP_LOGO":"<?php echo WSTConf('CONF.shopLogo'); ?>","MALL_LOGO":"<?php echo WSTConf('CONF.mallLogo'); ?>","USER_LOGO":"<?php echo WSTConf('CONF.userLogo'); ?>",'GRANT':'<?php echo implode(",",session("WST_STAFF.privileges")); ?>',"IS_CRYPT":"<?php echo WSTConf('CONF.isCryptPwd'); ?>","ROUTES":'<?php echo WSTRoute(); ?>',"MAP_KEY":"<?php echo WSTConf('CONF.mapKey'); ?>","__HTTP__":"<?php echo WSTProtocol(); ?>"}
</script>
<script language="javascript" type="text/javascript" src="/static/js/common.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div id="j-loader"><img src="__ADMIN__/img/ajax-loader.gif"/></div>

<style>.body li{height:22px;}</style>
<div id='alertTips' class='alert alert-success alert-tips fade in'>
	<div id='headTip' class='head'><i class='fa fa-lightbulb-o'></i>操作说明</div>
	<ul class='body'>
		<li>本功能使用微信公众号接口，需在注册并认证“服务号”，并获得模板消息的使用权限，<a class='wst-wiki' target='_blank' href='https://mp.weixin.qq.com/wiki'>微信公众平台文档</a>。</li>
		<li>本系统中的模板仅供参考，建议在公众平台模板库中选择“<strong>IT科技 互联网|电子商务 | IT科技 IT软件与服务</strong>”的行业，然后添加与本模板内容相同的模板。</li>
		<li>因微信对通知内容要求较严格，不支持营销、到期提醒类消息推送，详细规则<a class='wst-wiki' href='https://mp.weixin.qq.com/wiki?t=resource/res_main&id=mp1433751288' target='_blank'>查看</a>。</li>
	</ul>
</div>
<div class='wst-grid'>
 <div id="mmg" class="mmg layui-form"></div>
 <div id="pg" style="text-align: right;"></div>
</div>
<script>$(function(){initGrid();})</script>

<script src="__ADMIN__/js/bootstrap/js/bootstrap.min.js"></script>
<script language="javascript" type="text/javascript" src="/static/plugins/layui/layui.all.js"></script>
<script language="javascript" type="text/javascript" src="__ADMIN__/js/common.js"></script>

<script src="__ADMIN__/js/mmgrid/mmGrid.js?v=<?php echo $v; ?>" type="text/javascript"></script>
<script src="__ADMIN__/wxtemplatemsgs/wxtemplatemsgs.js?v=<?php echo $v; ?>" type="text/javascript"></script>

<?php echo hook('initCronHook'); ?>
</body>
</html>