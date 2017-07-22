<?php
include_once("E:/xampp/htdocs/Android_interface/configs/system.config.php");



        session_start();
		
        if(file_get_contents("php://input"))
		{
			$data = file_get_contents("php://input");
			$data = json_decode($data, true);//加上true是转化为数组，不加是转化为对象
			$request_data['name'] = $data['name'];
			$request_data['pass'] = $data['pass'];
			

			$fuser = new Fusers();

			$flag = $fuser->checkValidUser($request_data);
			
			if($flag == "1")//登录成功
			{
				$response_data['flag'] = 1;
			}
			else if($flag =="2")//密码错误
			{
				$response_data['flag'] = 2;
			}
			else if($flag == "0")//用户不存在
			{
				$response_data['flag'] = 0;
			}
			
				
		    echo $response::json(200,"success",$response_data);
		}
		
		
		
	
?>
