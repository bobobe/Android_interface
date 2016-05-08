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
			$shop = new Shop();
			$user = new Users();
			$data['uid'] = $_POST['uid'];
			if(!isset($_POST['name'])&&!isset($_POST['detail']))//首次进入判断是否开过店
			{
				$shop = new Shop();
			    if($shop->selectShopByUid($data)->num == 1)//判断是否已开过店
				{
				   echo 2;
				   return;
				}
				else
				{
					echo 1;
					return ;
				}
			}
			else//开店
			{
				$data['name'] = $_POST['name'];
			    $data['detail'] = $_POST['detail'];
            
			    $file = new fileUpload();
			    $result = $file->uploadfile();
			
			    $data['imgpath'] = $file->getfilepath();//图片路径
			
			
			    if($shop->selectShopByUid($data)->num == 0)
			    {
			      if($shop->addShop($data))
			      {
					 $data['id'] = $_POST['uid'];
					 $data['type'] = "shopflag";
					 $data['catalog'] = 1;
					 $user->updateUser($data);//更新是否开店标志
					 
				     echo 1;
			      }
			      else
			      {
				     echo 0;
			      }
			    }
			   
			}
			
        }
		



?>