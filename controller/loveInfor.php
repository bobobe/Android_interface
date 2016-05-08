<?php
//返回爱心的全部信息
include_once("C:/xampp/htdocs/taoaixin_phone/andriodinterface/configs/system.config.php");

        session_start();
		
        if($_POST['json'])
		{
			//$request = json_decode($_POST["json"], true);//加上true是转化为数组，不加是转化为对象
			$type = $_POST['type'];//类别
			$data['id'] = $_POST['loveId'];//id
				
				switch($type)
				{
					case'time':
					$time = new Time();
					$result = $time->selectTimeByAddTime($data);
					break;
					
					case'job':
					$job = new Job();
					$result = $job->selectJobByAddTime($data);
					break;
					
					case'product':
					$product = new Product();
					$result = $product->selectProductByAddTime($data);
					break;
				}
			
            $data = $result->results;		

            foreach($data[0] as $key=>$value)
			{
				$response_data[$key] = $value;
			}			

			
		    echo $response::json(200,"success",$response_data);
		}
		



?>