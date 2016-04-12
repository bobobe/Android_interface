<?php
//参数：
/*
   json: 
   name:
   detail:
   uid:商店拥有者id
   
*/
   
//获取用户的全部信息
include_once("C:/xampp/htdocs/taoaixin_phone/andriodinterface/configs/system.config.php");

		
        if($_POST['json'])
        {
			$data['uid'] = $_POST['uid'];
			$data['name'] = $_POST['name'];
			$data['detail'] = $_POST['detail'];
			
			$shop = new Shop();
			if($shop->selectShopByUid($data)->num == 0)//判断是否已开过店
				return 2;
			
            
			$file = new fileUpload();
			$result = $file->uploadfile();
			
			$data['imgpath'] = $file->getfilepath();//图片路径
			
			
			
			if($shop->selectShopByUid($data)->num == 0)
			{
			    if($shop->addShop($data))
			    {
				    echo 1;
			    }
			    else
			    {
				    echo 0;
			    }
			}
			else{
				return 2;
			}
        }
		



?>