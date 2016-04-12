<?php

  class Shop extends Model{

        function __construct(){
            parent::__construct();
        }

        function addShop($data)//Ìí¼ÓÉÌµê
        {
            $name=$data['name'];
            $detail=$data['detail'];
			$uid=$data['uid'];
            $imgpath = $data['imgpath'];
			
            $date=functions::getNowTime();
            $sql=sprintf("INSERT INTO shop(name,detail,uid,add_time,imgpath) VALUES('%s','%s',%d,'%s','%s')",$name,$detail,$uid,$date,$imgpath);
            return $this->link->query($sql);
        }

        function selectShopByUid($data)
        {
			$uid=$data['uid'];
			$sql=sprintf("SELECT * FROM shop WHERE uid = %d",$uid);
			return $this->link->query($sql);


        }


        function deleteShop($data)
        {

        }

        function updateShop($data)
        {
	       
        }
  }
?>

 