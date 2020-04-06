<?php /*a:2:{s:66:"/home/wwwroot/default/wstmart/admin/view/wxpassivereplys/news.html";i:1532936934;s:50:"/home/wwwroot/default/wstmart/admin/view/base.html";i:1532939608;}*/ ?>
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

<?php if(WSTGrant('WX_TWXX_01')): ?>
<div class="wst-toolbar">
   <button class="btn btn-success f-right" onclick="javascript:location.href='<?=url("wxpassivereplys/newsEdit")?>'"><i class='fa fa-plus'></i>新增</button>
   <div style="clear:both"></div>
</div>
<?php endif; ?>
<script id="tblist" type="text/html">
{{# var dl = d['data'];for(var i = 0; i < dl.length; i++){ }}
<div class='style-box'>
   <div class='style-img'>
     <a href="javascript:void(0)">
     <img src='{{dl[i]["picUrl"]}}'/>
     </a>
   </div>
   <div class='style-txt'>关键字：{{dl[i]['keyword']}}</div>
   <div class='style-txt'>标题：{{dl[i]['title']}}</div>
   <div class='style-author'>描述：{{dl[i]['description']}}</div>
   <div class='style-op'>
	   {{#  if(WST.GRANT.WX_TWXX_02){ }}<a  class='btn btn-blue' onclick="toEdit({{dl[i]['id']}})"><i class='fa fa-pencil'></i>编辑</a> {{# } }}&nbsp;
	   {{#  if(WST.GRANT.WX_TWXX_03){ }}<a  class='btn btn-red' onclick="toDel({{dl[i]['id']}})"><i class='fa fa-trash-o'></i>删除</a> {{# } }}
   </div>
</div>
{{#}}}
</script>
<div id="maingrid"></div>


<script>
$(function (){ 
  listQuery('home');
});
</script>

<script src="__ADMIN__/js/bootstrap/js/bootstrap.min.js"></script>
<script language="javascript" type="text/javascript" src="/static/plugins/layui/layui.all.js"></script>
<script language="javascript" type="text/javascript" src="__ADMIN__/js/common.js"></script>

<script src="__ADMIN__/wxpassivereplys/news.js?v=<?php echo $v; ?>" type="text/javascript"></script>

<?php echo hook('initCronHook'); ?>
</body>
</html>