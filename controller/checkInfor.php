<?php
//检查用户是否更改了密码
include_once("C:/xampp/htdocs/taoaixin_phone/andriodinterface/configs/system.config.php");

        session_start();
		
        if($_POST['json'])
		{
			$request = json_decode($_POST["json"], true);//加上true是转化为数组，不加是转化为对象
			$data['uid'] = $request['id'];
			$data["name"] = $request['nick_name'];
			$data['password'] = $request['password'];
			
			$user = new Users();
			$result = $user->selectUserByUid($data);			
		    if($result->results[0]["nick_name"] == $data["name"]&&$result->results[0]["password"] == $data["password"])
		    {
		    	$flag =1;
		    }
		    else
		    {
		    	$flag = 0;
		    }
			//返回的数据
			$response['session_id'] = session_id();
			if ($flag == 1)//成功
			{
				$response['flag'] = 1;
			}
			else if($flag == 0)//账号变更
			{
				$response['flag'] = 2;
			}
			
		    echo json_encode($response);
		}
		



?>