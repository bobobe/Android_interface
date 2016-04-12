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
$data = array(
   "array1" => array(
      "1"=>"name",
	  "2"=>"password"
	  ),
	"array2" => array(
      "3"=>"name",
	  "4"=>"password"
	  )
	);
	
$data["flag"] = 1;
$data["array1"]["flag"] = 1;
$data["array1"]["name"]["first_name"] = "xiaoming";

//$data['flag'] = 1;


echo $response::json(200,"success",$data);


?>

