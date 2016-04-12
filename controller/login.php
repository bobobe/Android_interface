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
			$response['session_id'] = session_id();
			if ($flag == 1)//成功
			{
				$response['flag'] = 1;
				$result = $user->selectUserByName($data);
				$response['id'] = $result->results[0]['uid'];
				$response['name'] = $result->results[0]['nick_name'];
				$response['password'] = $result->results[0]['password'];
			}
			else if($flag == 0)//不存在
			{
				$response['flag'] = 2;
			}
			else//密码错误
			{
				$response['flag'] = 3;
			}
			
		    echo json_encode($response);
		}
		
		
		
	
?>
