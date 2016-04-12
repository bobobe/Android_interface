<?php
		/*
		参数
		myfile -》File file = new File(path);
		json格式：
		键值：
		id-》uid
		type-》img

		修改成功返回1，否则返回0
		*/
include_once("C:/xampp/htdocs/taoaixin_phone/andriodinterface/configs/system.config.php");


		//上传文件
		//if($_POST['json'])
		//{
			//$request = json_decode($_POST["json"], true);//加上true是转化为数组，不加是转化为对象
		
			
			
			$file = new fileUpload();
			//$user = new Users();
			
			//$data['type'] = $request['type'];
			$data['catalog'] = $file->getfilepath();//新的路径
			//$data['id'] = $request['id'];
			
			$result = $file->uploadfile();
			/*if($user->updateUser($data)&&$result)
			{
				$response['flag'] = 1;//修改成功
			}
			else
			{
				$response['flag'] = 0;
			}*/
			//var_dump($result);
			
			$response['flag'] = 1;
			echo json_encode($response);
		//}
		

?>
