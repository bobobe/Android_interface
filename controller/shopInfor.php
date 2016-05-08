<?php
//返回店铺的全部信息
include_once("C:/xampp/htdocs/taoaixin_phone/andriodinterface/configs/system.config.php");

        session_start();
		
        if($_POST['json'])
		{
			//$request = json_decode($_POST["json"], true);//加上true是转化为数组，不加是转化为对象
			$data['uid'] = $_POST['uid'];
			
			$user = new Shop();
			$result = $user->selectShopByUid($data);
            $data = $result->results;		

            foreach($data[0] as $key=>$value)
			{
				$response_data[$key] = $value;
			}			

			
		    echo $response::json(200,"success",$response_data);
		}
		



?>