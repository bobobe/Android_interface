<?php
/**
 * Created by PhpStorm.
 * User: yanbo
 * Date: 2015/11/4
 * Time: 15:53
 */
//json_decode( file_get_contents( "php://input" ), true );
//echo $request_method;
include_once("C:/xampp/htdocs/taoaixin_phone/andriodinterface/configs/system.config.php");
$request_method = $_SERVER['REQUEST_METHOD'];

if($request_method == "GET")
{

     $data = explode('amp;',$_SERVER['QUERY_STRING']);//只能接受get请求发送的参数
}
else
{
     $data = file_get_contents("php://input");//只能接受post请求的参数
	 //$data = json_decode($data,true);
}

file_put_contents("../output.txt", $data);

//echo $data;
echo $response::json(200,"success",$data);


?>

