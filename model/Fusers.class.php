<?php

  class Fusers extends Model{

        function __construct(){
            parent::__construct();
        }

        function addUser($data)//增加用户
        {
            $name=$data['name'];
            $pass=$data['pass'];
            $imgpath = "http://121.40.56.79/taoaixin_phone/andriodinterface/customer_file/default.jpg";//默认头像
			
            $date=functions::getNowTime();
            $sql=sprintf("INSERT INTO user(name,pass,add_time) VALUES('%s','%s','%s')",$name,$pass,$date);
            return $this->link->query($sql);
        }
		
		function selectUserByName($data)//根据用户名查找用户
        {
            $name=$data['name'];
            $sql=sprintf("SELECT * FROM user WHERE name='%s'",$name);
            return $this->link->query($sql);
        }

        function checkValidUser($data)//验证登录信息
        {
             $name=$data['name'];//转义一些字符，防止sql注入
             $pass=$data['pass'];
             $sql=sprintf("SELECT name,pass FROM user WHERE name='%s'",$this->link->escape($name));
             $res=$this->link->query($sql);
             if($res->num==0)//不存在该用户
             {
                 return 0;
             }
             if($res->results[0]['pass']!=$pass)//密码错误
             {
                 return 2;
             }

             return 1;//登录成功


        }


  }