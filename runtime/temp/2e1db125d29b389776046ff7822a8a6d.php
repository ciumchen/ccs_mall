<?php /*a:1:{s:62:"/home/wwwroot/default/wstmart/home/view/default/box_login.html";i:1532940670;}*/ ?>
<input type="hidden" id="token" value='<?php echo WSTConf("CONF.pwdModulusKey"); ?>'/>
<form method="post" autocomplete="off">
	<table class="wst-table">
		<tr class="wst-login-tr">
		    <td width='90' align='right'>账号：</td>
			<td><input id="loginName" name="loginName" class="ipt wst-login-input"  tabindex="1" value="" autocomplete="off" type="text" data-rule="用户名: required;" data-msg-required="请填写用户名" data-tip="请输入用户名" placeholder="邮箱/用户名/手机号"/></td>
		</tr>
		<tr class="wst-login-tr">
		    <td align='right'>密码：</td>
			<td><input id="loginPwd" name="loginPwd" class="ipt wst-login-input" tabindex="2" autocomplete="off" type="password" data-rule="密码: required;" data-msg-required="请填写密码" data-tip="请输入密码" placeholder="密码"/> </td>
		</tr>
		<tr class="wst-login-tr">
			<td align='right'>验证码：</td>
			<td>
				<div class="wst-login-code">
					<input id="verifyCode" style="ime-mode:disabled" name="verifyCode"  class="ipt wst-login-codein" tabindex="6" autocomplete="off" maxlength="6" type="text" data-rule="验证码: required;" data-msg-required="请输入验证码" data-tip="请输入验证码" data-target="#verify"placeholder="验证码"/>
					<img id='verifyImg' class="wst-login-codeim" src="<?php echo url('home/users/getVerify'); ?>" onclick='javascript:WST.getVerify("#verifyImg")' style="width:116px;border-top-right-radius:6px;border-bottom-right-radius:6px;"><span id="verify"></span>    	
				</div>
			</td>
		</tr>
		<tr class="wst-login-tr">
			<td colspan="2" style="padding-left:43px;">
				<input id="rememberPwd" name="rememberPwd" class="ipt wst-login-ch" checked="checked" type="checkbox"/>
				<label>记住密码</label>                                      
				<label><a style="color:#666;line-height:32px;margin-left:10px;" target='_blank' href="<?php echo Url('home/users/regist'); ?>">免费注册</a>&nbsp;| </label>
				<label><a style="color:#666;line-height:32px;" target='_blank' href="<?php echo url('home/users/forgetpass'); ?>">忘记密码? </a></label>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="padding-left:200px;">
			    <div style="width: 100px;height:32px;line-height:32px;"><a class="wst-login-but" href="javascript:void(0);" onclick='javascript:login(3)'>登录</a></div>
			</td>
		</tr>
	</table>
	<?php echo hook('homeDocumentLogin'); ?>
</form>
