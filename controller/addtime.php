<?php
include_once("C:/xampp/htdocs/taoaixin_phone/andriodinterface/configs/system.config.php");



        session_start();
		
			//$request = json_decode($_POST["json"], true);//加上true是转化为数组，不加是转化为对象
			$data['sta_time'] = $_POST['staTime'];
			$data['end_time'] = $_POST['endTime'];
		    $data['uid'] = $_POST['userId'];
			
			$data['session_id'] = session_id();


			$time = new Time();

			if($time->addTime($data))
			{
				$response_data['flag'] = 1;
			}
			else
			{
				$response_data['flag'] = 2;
			}
		
			//$flag = 1;

			
		    echo $response::json(200,"success",$response_data);;
		
		
		
	
?>
