<?php
include_once("C:/xampp/htdocs/taoaixin_phone/andriodinterface/configs/system.config.php");



        session_start();
		
			//$request = json_decode($_POST["json"], true);//加上true是转化为数组，不加是转化为对象
			$data['name'] = $_POST['productName'];//名字
			$data['price'] = $_POST['productPrice'];//价格
			$data['detail'] = $_POST['productDetail'];//描述
		    $data['uid'] = (int)$_POST['userId'];//用户id
			
			$data['num'] = $_POST['productNum'];//数量
			$data['type'] = $_POST['productClass'];//类别
			
			//$data['session_id'] = session_id();
            
            $file = new fileUpload();
			$result = $file->uploadfile();
			
			$data['imgpath'] = $file->getfilepath();//新的路径
			$product = new product();

			if($product->addProduct($data)&&$result)
			{
				$response_data['flag'] = 1;
			}
			else
			{
				$response_data['flag'] = 2;
			}
		
			
		    echo $response::json(200,"success",$response_data);
		
		
		
	
?>
