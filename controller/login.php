<?php
include_once("C:/xampp/htdocs/taoaixin_phone/andriodinterface/configs/system.config.php");



        session_start();
		
        if($_POST['json'])
		{
			$request = json_decode($_POST["json"], true);//加上true是转化为数组，不加是转化为对象
			$data['nick_name'] = $request['name'];
			$data['password'] = $request['password'];
			

			$user = new Users();

			$flag = $user->checkValidUser($data);
			
		
			//返回的数据
			$response_data['session_id'] = session_id();
			if ($flag == 1)//成功
			{
				$response_data['flag'] = 1;
				$result = $user->selectUserByName($data);
				$response_data['id'] = $result->results[0]['uid'];
				$response_data['name'] = $result->results[0]['nick_name'];
				$response_data['password'] = $result->results[0]['password'];
				$response_data['flagshop'] = $result->results[0]['is_setupshop'];
				$response_data['imgpath'] = $result->results[0]['img'];
				
			}
			else if($flag == 0)//不存在
			{
				$response_data['flag'] = 2;
			}
			else//密码错误
			{
				$response_data['flag'] = 3;
			}
			
		    echo $response::json(200,"success",$response_data);
		}
		
		
		
	
?>
