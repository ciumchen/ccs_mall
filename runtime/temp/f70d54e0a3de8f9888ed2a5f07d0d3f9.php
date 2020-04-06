<?php /*a:2:{s:62:"/home/wwwroot/default/wstmart/admin/view/wsysconfigs/edit.html";i:1532936914;s:50:"/home/wwwroot/default/wstmart/admin/view/base.html";i:1532939608;}*/ ?>
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

<link rel="stylesheet" type="text/css" href="/static/plugins/webuploader/webuploader.css?v=<?php echo $v; ?>" />
<style>
body{overflow:hidden}
</style>

<link href="__ADMIN__/css/common.css?v=<?php echo $v; ?>" rel="stylesheet" type="text/css" />
<script>
window.conf = {"DOMAIN":"<?php echo str_replace('index.php','',app('request')->root(true)); ?>","ROOT":"","APP":"/index.php","STATIC":"/static","SUFFIX":"<?php echo config('url_html_suffix'); ?>","GOODS_LOGO":"<?php echo WSTConf('CONF.goodsLogo'); ?>","SHOP_LOGO":"<?php echo WSTConf('CONF.shopLogo'); ?>","MALL_LOGO":"<?php echo WSTConf('CONF.mallLogo'); ?>","USER_LOGO":"<?php echo WSTConf('CONF.userLogo'); ?>",'GRANT':'<?php echo implode(",",session("WST_STAFF.privileges")); ?>',"IS_CRYPT":"<?php echo WSTConf('CONF.isCryptPwd'); ?>","ROUTES":'<?php echo WSTRoute(); ?>',"MAP_KEY":"<?php echo WSTConf('CONF.mapKey'); ?>","__HTTP__":"<?php echo WSTProtocol(); ?>"}
</script>
<script language="javascript" type="text/javascript" src="/static/js/common.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div id="j-loader"><img src="__ADMIN__/img/ajax-loader.gif"/></div>

<style>
input[type="text"]{width:70%}
textarea{width:70%;height:100px;}
#wst-tab-5 input[type="text"]{width:50%}
</style>
<div id='alertTips' class='alert alert-success alert-tips fade in'>
	<div id='headTip' class='head'><i class='fa fa-lightbulb-o'></i>操作说明</div>
	<ul class='body'>
		<li>本功能主要用于设置与微信认证平台交互的认证信息。“微信验证代码”需与微信自定义菜单中的state参数值保持一致。</li>
	</ul>
</div>
<form autocomplete='off'>
<div class='wst-tab layui-form' style='margin-top:20px'>
     <table class='wst-form wst-box-top'>
      <tr>
	     <th width='150'>是否开启微信端：</th>
	     <td>
	     <input type="checkbox" <?php if($object['wxenabled']==1): ?>checked<?php endif; ?> value='1' class="ipt" id="wxenabled" name="wxenabled" lay-skin="switch" lay-filter="wxenabled" lay-text="开启|关闭">
	     </td>
	  </tr>
	  <tr>
	     <th width='150'>微信 APP ID：</th>
	     <td><input type="text" id='wxAppId' class='ipt' value="<?php echo $object['wxAppId']; ?>" maxLength='100'/></td>
	  </tr>
	  <tr>
	     <th>微信 APP SECRET：</th>
	     <td><input type="text" id='wxAppKey' class='ipt' value="<?php echo $object['wxAppKey']; ?>" maxLength='100'/></td>
	  </tr>
	  <tr>
	     <th>微信验证代码：</th>
	     <td><input type="text" id='wxAppCode' class='ipt' value="<?php echo $object['wxAppCode']; ?>" maxLength='100'/></td>
	  </tr>
	  <tr>
	     <th>微信公众号二维码：</th>
	     <td>
	     <div id='wxAppLogoPicker'>请上传微信公众号二维码</div><span id='wxAppLogoMsg'></span>
	     <div id="wxAppLogoPrevw">
	     <?php if(($object["wxAppLogo"])): ?>
	     	<img src='/<?php echo $object["wxAppLogo"]; ?>' width='120' hiegth='120'/>
	     <?php endif; ?>
	     </div>
	     <input type="hidden" id='wxAppLogo' class='ipt' value='<?php echo $object["wxAppLogo"]; ?>'/>
	     </td>
	  </tr>
	  <?php if(WSTGrant('WX_GZHSZ_04')): ?>
	  <tr>
	     <td colspan='2' style='padding-left:300px;padding-top:30px'>
	     	<button type="button"  class='btn btn-primary btn-mright' onclick='javascript:edit()'><i class="fa fa-check"></i>保存</button>
	     	<button type="reset"  class='btn'><i class="fa fa-refresh"></i>重置</button>
	     </td>
	  </tr>
	  <?php endif; ?>
	 </table>
</div>
</form>

<script src="__ADMIN__/js/bootstrap/js/bootstrap.min.js"></script>
<script language="javascript" type="text/javascript" src="/static/plugins/layui/layui.all.js"></script>
<script language="javascript" type="text/javascript" src="__ADMIN__/js/common.js"></script>

<script type='text/javascript' src='/static/plugins/webuploader/webuploader.js?v=<?php echo $v; ?>' type="text/javascript"></script>
<script src="__ADMIN__/wsysconfigs/wsysconfigs.js?v=<?php echo $v; ?>" type="text/javascript"></script>

<?php echo hook('initCronHook'); ?>
</body>
</html>