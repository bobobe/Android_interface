<?php
/**
 * Created by PhpStorm.
 * User: yanbo
 * Date: 2015/10/25
 * Time: 10:04
 */

 class Response{
    public static function json($code,$message = "",$data = array())
	{
		if(!is_numeric($code))
			return "";
		
		$responce = array(
           "code" => $code,
           "message" =>$message,
           "data" =>$data		   
		);
		
		return json_encode($responce);
		
	}
	
	public static function xml()
	{
		
	}


}
?>