<?php

define("DIR_APPLICATION","C:/xampp/htdocs/taoaixin_phone/andriodinterface");
define("DIR_DB_CONFIG","C:/xampp/htdocs/taoaixin_phone/andriodinterface/configs/db.config.xml");

include_once(DIR_APPLICATION."/system/functions/functions.class.php");
include_once(DIR_APPLICATION."/system/xml_op/xpath.php");
include_once(DIR_APPLICATION."/system/mysqli/mysqli.class.php");
include_once(DIR_APPLICATION."/system/Model.class.php");
include_once(DIR_APPLICATION."/model/Users.class.php");
include_once(DIR_APPLICATION."/model/Time.class.php");
include_once(DIR_APPLICATION."/model/Job.class.php");
include_once(DIR_APPLICATION."/model/Shop.class.php");
include_once(DIR_APPLICATION."/model/Product.class.php");
include_once(DIR_APPLICATION."/system/file/file.class.php");
include_once(DIR_APPLICATION."/system/response/Response.class.php");


//修改错误处理
error_reporting(E_ALL);//这样设置是为了记录错误到文件中。
ini_set('display_errors',0);//关闭错误显示(这里的错误是非语法错误，语法错误还是要显示的）
//主要是为了mysql连接不上时等不显示给用户信息
//当然也不包括用户自定义的错误显示
//时间校正
date_default_timezone_set('PRC');
//修改错误日志文件配置
ini_set("error_log",DIR_APPLICATION."/error.log");//日志保存路径
ini_set("log_errors",1);

header("Content-type:text/html;Charset=utf8");//设置编码

$response = new Response();

set_error_handler('functions::error_handler');//设置自定义处理机制
?>