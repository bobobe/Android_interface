<?php
//参数：


//开店审核
include_once("C:/xampp/htdocs/taoaixin_phone/andriodinterface/configs/system.config.php");

		
        if($_POST['json'])
        {
			
			$data['name'] = $_POST['name'];
			$data['id'] = $_POST['uid'];
			$data['intro'] = $_POST['intro'];
		
            //上传证件照
			$file = new fileUpload();
			$result = $file->uploadfile();
			$data['idcard'] = $file->getfilepath();//图片路径
			
			$data['is_setupshop'] = 2;//正在认证
			$data['type'] = 'verify';
			
			$user = new Users();
			if($user->updateUser($data))
			{
				 
				 echo 2;//返回2是正在认证
			}
			else
			{
				 echo 0;
			}
			
        }
		



?>