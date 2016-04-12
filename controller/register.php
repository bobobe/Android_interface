<?php
include_once("C:/xampp/htdocs/taoaixin_phone/andriodinterface/configs/system.config.php");



        
		/*$data['flag'] = 1;
		$data['session_id'] = session_id();
		echo json_encode($data);
		*/
		
         if($_POST['json'])
		{
			$request = json_decode($_POST["json"], true);//加上true是转化为数组，不加是转化为对象
			$data['nick_name'] = $request['name'];
			$data['password'] = $request['password'];
			$data['role'] = $request['role'];
			$data['sex'] = $request['sex'];
			$data['session_id'] = session_id();
			
            $user = new Users();
            if($user->selectUserByName($data)->num==0)
			{
				if($user->addUser($data))//添加用户
			    {
				   $data['flag'] = 1;
			    }
			}
			else
			{
				$data['flag'] = 2;//已存在
			}
			echo json_encode($data);
		}
		

		