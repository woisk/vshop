<?php 
ini_set("memory_limit","128M");
header("Content-Type: text/html; charset=UTF-8");
// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
define('BIND_MODULE','Home');
// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',false);
define('APP_NAME', 'HOME');
define('APP_PATH','./Application/');
// 加载框架入口文件
require '../ThinkPHP/ThinkPHP.php';
?>