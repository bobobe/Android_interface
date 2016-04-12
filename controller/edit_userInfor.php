<?php
//获取用户的全部信息
include_once("C:/xampp/htdocs/taoaixin_phone/andriodinterface/configs/system.config.php");

        session_start();
		
        if($_POST['json'])
		{
			
			$request = json_decode($_POST["json"], true);//加上true是转化为数组，不加是转化为对象
			$data['type'] = $request['type'];
			$data['catalog'] = $request['catalog'];
			$data['id'] = $request['id'];
			$user = new Users();
			if($user->updateUser($data))
			{
				$response['flag'] = 1;//修改成功
			}
			else
			{
				$response['flag'] = 2;
			}
			
			
			
						
			//返回的数据
			
		    echo json_encode($response);
		}
		



?>