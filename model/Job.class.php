<?php


  class Job extends Model{

        function __construct(){
            parent::__construct();
        }

        function addJob($data)
        {
            $job_name=$data['job_name'];
            $time=$data['time'];
            $detail=$data['detail'];
            //$imgpath = $data['imgpath'];
            $date=functions::getNowTime();

            $sql=sprintf("INSERT INTO job(name,detail,add_time,time) VALUES('%s','%s','%s')",$job_name,$detail,$date,$time);
            return $this->link->query($sql);
        }

        function selectJobByAddTime()
        {
            $sql = sprintf("SELECT * FROM job order by add_time desc");
			return $this->link->query($sql);

        }


        function deleteUser($data)
        {

        }

        function updateUser($data)
        {

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