<?php
/**
 * Created by PhpStorm.
 * User: yanbo
 * Date: 2015/10/25
 * Time: 10:04
 */

 class Response{
    public static function json($code,$message = "",$data = array())//json封装
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
	
	
	public static function xml($code,$message = "",$data = array())//用xml封装方法(百度测试借口可以运行）)
	{
		if(!is_numeric($code))
		{
			return "";
			
		}
		
		$responce = array(
		"code" => $code,
		"message" => $message,
		"data" => $data
		);
		
		header("Content-Type:text/xml");
		$xml="<?xml version='1.0' encoding='UTF-8'?>\n";
		$xml.="<root>\n";
		
		$xml.=self::xml_encode($responce);
		
		$xml.="</root>\n";
		
		return $xml;
		
	}
	
	public static function xml_encode($data = array())//实际xml封装操作
	{
		$xml2 ="";
		foreach($data as $key => $value)
		{
			$attr ="";
			if(is_numeric($key))//为了解决xml节点不能为数字的情形
			{
				$attr = "id ='{$key}'";
				$key = "number";
			}
			$xml2.= "<{$key} {$attr}>\n";
			
			$xml2.= is_array($value)?self::xml_encode($value):$value;//如果是数组,应该digui封装
			
			$xml2.= "</{$key}>\n";
		}
		return $xml2;
		
	}


}
?>