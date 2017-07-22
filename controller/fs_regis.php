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

			if($fuser->selectUserByName($data)->num==0)//用户不存在
			{
				if($fuser->addUser($request_data))
				{
					$response_data['flag'] = 1;//注册成功
				}
				else
				{
					$response_data['flag'] = 0;//注册失败
				}
			}
			else//用户已存在
			{
				$response_data['flag'] = 2;
			}
			
				
		    echo $response::json(200,"success",$response_data);
		}
		
		
		
	
?>
