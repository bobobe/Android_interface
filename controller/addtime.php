<?php
include_once("C:/xampp/htdocs/taoaixin_phone/andriodinterface/configs/system.config.php");



        session_start();
		
        if($_POST['json'])
		{
			$request = json_decode($_POST["json"], true);//加上true是转化为数组，不加是转化为对象
			$data['sta_time'] = $request['sta_time'];
			$data['end_time'] = $request['end_time'];
		    $data['uid'] = $request['uid'];
			
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
		}
		
		
		
	
?>
