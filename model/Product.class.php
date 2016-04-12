<?php

  class Product extends Model{

        function __construct(){
            parent::__construct();
        }

        function addProduct($data)//Ìí¼ÓÉÌÆ·
        {
            $name=$data['name'];
            $detail=$data['detail'];
			$price=$data['price'];
            //$num = $data['num'];
			$uid = $data['uid'];
            $imgpath = $data['imgpath'];
            $date=functions::getNowTime();

            $sql=sprintf("INSERT INTO product(imgpath,name,detail,price,add_time,uid) VALUES('%s','%s','%s','%s','%s',%d)",$imgpath,$name,$detail,$price,$date,$uid);
            return $this->link->query($sql);
        }
		
		function selectProductByAddTime()
		{
			$sql = sprintf("SELECT * FROM product order by add_time desc");
			return $this->link->query($sql);
		}



        function deleteProduct($data)
        {

        }

        function updateProduct($data)
        {

        }


  }