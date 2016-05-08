<?php
		/*
        返回所有爱心数据,按时间排序
		*/
include_once("C:/xampp/htdocs/taoaixin_phone/andriodinterface/configs/system.config.php");


		//上传文件
		if($_POST['json'])
		{
			//$request = json_decode($_POST['json'], true);//加上true是转化为数组，不加是转化为对象
		    //if($request['flag']==1)//验证合法请求
			//{
				//$file = new fileUpload();
				$type = $_POST['type'];
				switch($type)
				{
					case'time':
					$time = new Time();
					$result = $time->selectTimeByAddTime();
					break;
					
					case'job':
					$job = new Job();
					$result = $job->selectJobByAddTime();
					break;
					
					case'product':
					$product = new Product();
					$result = $product->selectProductByAddTime();
					break;
				}
				
				
				$data = $result->results;
				
				foreach($data as $value)
				{
					$response_data[] = $value;
				}
				
				
				echo $response::json(200,"success",$response_data);
           }
		

?>
