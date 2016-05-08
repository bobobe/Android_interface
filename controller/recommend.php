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
				$product = new Product();
				$time = new Time();
				$job = new Job();
				
				$result1 = $product->selectProductByAddTime();
				$result2 = $time->selectTimeByAddTime();
				$result3 = $job->selectJobByAddTime();
				
				$data1 = $result1->results;
				$data2 = $result2->results;
				$data3 = $result3->results;
				
				
				$num = $result1->num + $result2->num + $result3->num;//总的记录数
				
				$i = 0;
			    foreach($data1 as $value)
				{
					$response_data[$i] = $value;
					$response_data[$i]['type'] = "1";
					//echo strtotime($response_data[$i]['add_time']);
					$i++;
					
				}
				foreach($data2 as $value)
				{
					$response_data[$i] = $value;
					$response_data[$i]['type'] = "2";
					$i++;
					
				}
				foreach($data3 as $value)
				{
					$response_data[$i] = $value;
				    $response_data[$i]['type'] = "3";
					$i++;
				}
				
				
				$temp = array();
				for($i = 0;$i < $num-1;$i ++)
					for($j = $i+1;$j <$num;$j ++)
				    {
					    if(strtotime($response_data[$i]['add_time'])<strtotime($response_data[$i]['add_time']))
						{
							$temp = $response_data[$i];
							$response_data[$i]= $response_data[$j];
							$response_data[$j] = $temp;
						}
				    }
					
				
				
				
				echo $response::json(200,"success",$response_data);
           }
		

?>
