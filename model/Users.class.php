<?php

  class Users extends Model{

        function __construct(){
            parent::__construct();
        }

        function addUser($data)
        {
            $nick_name=$data['nick_name'];
            $password=$data['password'];
			$role=$data['role'];
			$sex=$data['sex'];
            $imgpath = "http://121.40.56.79/taoaixin_phone/andriodinterface/customer_file/default.jpg";//默认头像
			
            $date=functions::getNowTime();
            $sql=sprintf("INSERT INTO users(nick_name,sex,role,password,add_time,img) VALUES('%s','%s','%s','%s','%s','%s')",$nick_name,$sex,$role,$password,$date,$imgpath);
            return $this->link->query($sql);
        }

        function selectUserByName($data)
        {
            $nick_name=$data['nick_name'];
            $sql=sprintf("SELECT * FROM users WHERE nick_name='%s'",$nick_name);
            return $this->link->query($sql);

        }

        function selectUserByUid($data)
        {
            $uid=$data['uid'];
            $sql=sprintf("SELECT * FROM users WHERE uid= %d",$uid);
            return $this->link->query($sql);

        }


        function deleteUser($data)
        {

        }

        function updateUser($data)
        {
	        $id = $data['id'];
			$type = $data['type'];
			switch($type)
			{
				case "nick_name":
				$sql=sprintf("UPDATE users SET nick_name='%s' where uid =%d",$data['catalog'],$id);
                return $this->link->query($sql);
				case "phone":
				$sql = sprintf("UPDATE users SET phone ='%s' where uid =%d",$data['catalog'],$id);
				return $this->link->query($sql);
				case "img":
				$sql = sprintf("UPDATE users SET img ='%s' where uid =%d",$data['catalog'],$id);
				return $this->link->query($sql);
				case "shopflag":
				$sql = sprintf("UPDATE users SET is_setupshop = %d where uid =%d",$data['catalog'],$id);
				return $this->link->query($sql);
			}

        }

        function checkValidUser($data)
        {
             $nick_name=$data['nick_name'];//转义一些字符，防止sql注入
             $password=$data['password'];
             $sql=sprintf("SELECT nick_name,password FROM users WHERE nick_name='%s'",$this->link->escape($nick_name));
             $res=$this->link->query($sql);
             if($res->num==0)//不存在该用户
             {
                 return 0;
             }
             if($res->results[0]['password']!=$password)//密码错误
             {
                 return 2;
             }

             return 1;//登录成功


        }


  }