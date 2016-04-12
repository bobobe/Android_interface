<?php
include_once("C:/xampp/htdocs/taoaixin_phone/andriodinterface/configs/system.config.php");



        session_start();
		
        if($_POST['json'])
		{
			$request = json_decode($_POST["json"], true);//加上true是转化为数组，不加是转化为对象
			$data['job_name'] = $_POST['jobName'];
			$data['time'] = $_POST['jobTime'];
			$data['detail'] = $_POST['jobDetail'];
		    $data['uid'] = $_POST['userId'];
			
			$data['session_id'] = session_id();


			$job = new job();

			if($job->addJob($data))
			{
				$response_data['flag'] = 1;
			}
			else
			{
				$response_data['flag'] = 2;
			}
		
		    echo $response::json(200,"success",$response_data);;
		}
		
		
		
	
?>
