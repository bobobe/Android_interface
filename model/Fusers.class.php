<?php

  class Fusers extends Model{

        function __construct(){
            parent::__construct();
        }

        function addUser($data)//�����û�
        {
            $name=$data['name'];
            $pass=$data['pass'];
            $imgpath = "http://121.40.56.79/taoaixin_phone/andriodinterface/customer_file/default.jpg";//Ĭ��ͷ��
			
            $date=functions::getNowTime();
            $sql=sprintf("INSERT INTO user(name,pass,add_time) VALUES('%s','%s','%s')",$name,$pass,$date);
            return $this->link->query($sql);
        }
		
		function selectUserByName($data)//�����û��������û�
        {
            $name=$data['name'];
            $sql=sprintf("SELECT * FROM user WHERE name='%s'",$name);
            return $this->link->query($sql);
        }

        function checkValidUser($data)//��֤��¼��Ϣ
        {
             $name=$data['name'];//ת��һЩ�ַ�����ֹsqlע��
             $pass=$data['pass'];
             $sql=sprintf("SELECT name,pass FROM user WHERE name='%s'",$this->link->escape($name));
             $res=$this->link->query($sql);
             if($res->num==0)//�����ڸ��û�
             {
                 return 0;
             }
             if($res->results[0]['pass']!=$pass)//�������
             {
                 return 2;
             }

             return 1;//��¼�ɹ�


        }


  }