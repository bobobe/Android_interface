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
			$uid = $data['uid'];
            $imgpath = $data['imgpath'];
			
			$num = $data['num'];
			$type = $data['type'];
            $date=functions::getNowTime();

            $sql=sprintf("INSERT INTO product(imgpath,name,detail,price,add_time,uid,num,type) VALUES('%s','%s','%s','%s','%s',%d,'%s','%s')",$imgpath,$name,$detail,$price,$date,$uid,$num,$type);
            return $this->link->query($sql);
        }
		
		function selectProductByAddTime()
		{
			$sql = sprintf("SELECT p.*,u.nick_name,u.img  FROM product as p inner join users as u on u.uid = p.uid order by p.add_time desc");
			return $this->link->query($sql);
		}
        
		function selectJobById($data)
        {
			$pid = $data['loveId'];
            $sql = sprintf("SELECT * FROM product where pid = %d ",$pid);
			return $this->link->query($sql);

        }


        function deleteProduct($data)
        {

        }

        function updateProduct($data)
        {

        }


  }