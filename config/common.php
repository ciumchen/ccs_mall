<?php
// 加载公共函数文件
use think\facade\Env;
include Env::get('root_path').'wstmart/common/common/function.php';
include Env::get('root_path').'wstmart/home/common/function.php';
include Env::get('root_path').'wstmart/admin/common/function.php';
include Env::get('root_path').'wstmart/wechat/common/function.php';