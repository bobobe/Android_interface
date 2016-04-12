<?php
session_start();
include_once("C:/xampp/htdocs/taoaixin_phone/andriodinterface/configs/system.config.php");
include_once("../system/functions/functions.class.php");

$smarty->clearCache('login.tpl');

unset($_SESSION);//删除session文件中的内容
session_destroy();//删除session文件
setcookie('nick_name','',time()-100,'/');//删除cookie


functions::login_out($smarty);

?>