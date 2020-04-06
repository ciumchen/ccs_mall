<?php /*a:2:{s:58:"/home/wwwroot/default/wstmart/admin/view/wxmenus/list.html";i:1532936928;s:50:"/home/wwwroot/default/wstmart/admin/view/base.html";i:1532939608;}*/ ?>
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

<style>
html{height: 100%;}
body{height: 100%;overflow:hidden}
.mmGrid{border-bottom:0px}
</style>
<div id='alertTips' class='alert alert-success alert-tips fade in'>
	<div id='headTip' class='head'><i class='fa fa-lightbulb-o'></i>操作说明</div>
	<ul class='body'>
		<li>本功能主要用于管理微信公众号菜单，使用前请先在微信认证平台中停用了微信公众号自定义菜单功能。</li>
	</ul>
</div>
<div class="wst-toolbar">
<?php if(WSTGrant('WX_ZDYCD_01')): ?>
   <button class="btn btn-success f-right" onclick='javascript:toEdit(0,0)'><i class='fa fa-plus'></i>新增</button>
<?php endif; if(WSTGrant('WX_ZDYCD_00')): ?>
   <button class="btn btn-success f-right" style="margin-right:10px;" onclick='javascript:adSynchro();'><i class='fa fa-cloud-upload'></i>同步到微信菜单</button>
   <button class="btn btn-success f-right" style="margin-right:10px;" onclick='javascript:wxSynchro();'><i class='fa fa-cloud-upload'></i>与微信菜单同步</button>
<?php endif; ?>
   <div style='clear:both'></div>
</div>
<div class="wst-views">
	<div class="reveal">
		<div class="revealt"></div>
		<div class="revealb"><i></i><div class="ui" id="list"></div></div>
	</div>
</div>
 <div class='mmGrid layui-form wst-maingr' id="maingrid"></div>

<script src="__ADMIN__/js/bootstrap/js/bootstrap.min.js"></script>
<script language="javascript" type="text/javascript" src="/static/plugins/layui/layui.all.js"></script>
<script language="javascript" type="text/javascript" src="__ADMIN__/js/common.js"></script>

<script src="__ADMIN__/js/wstgridtree.js?v=<?php echo $v; ?>" type="text/javascript"></script>
<script src="__ADMIN__/wxmenus/wxmenus.js?v=<?php echo $v; ?>" type="text/javascript"></script>
<script>
$(function(){initGrid();inView();})
</script>

<?php echo hook('initCronHook'); ?>
</body>
</html>