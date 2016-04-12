<?php
//获取用户的全部信息
include_once("C:/xampp/htdocs/taoaixin_phone/andriodinterface/configs/system.config.php");

        session_start();
		
        if($_POST['json'])
		{
			$request = json_decode($_POST["json"], true);//加上true是转化为数组，不加是转化为对象
			$data['uid'] = $request['id'];
			
			$user = new Users();
			$result = $user->selectUserByUid($data);			
			//返回的数据
			$response['session_id'] = session_id();
			$response['nick_name'] = $result->results[0]["nick_name"];
			$response['sex'] = $result->results[0]["sex"];
			$response['score'] = $result->results[0]["score"];
			$response['add_time'] = $result->results[0]["add_time"];
			$response['intro'] = $result->results[0]["intro"];
			$response['phone'] = $result->results[0]["phone"];
			$response['flag'] = 1;
			
		    echo json_encode($response);
		}
		



?>