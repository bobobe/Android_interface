<?php

  class Time extends Model{

        function __construct(){
            parent::__construct();
        }

        function addTime($data)
        {
            $sta_time=$data['sta_time'];
            $end_time=$data['end_time'];
            $uid = $data['uid'];
            //$imgpath = $data['imgpath'];
			
            $date=functions::getNowTime();
            $sql=sprintf("INSERT INTO time(sta_time,end_time,add_time,uid) VALUES('%s','%s','%s',%d)",$sta_time,$end_time,$date,$uid);
            return $this->link->query($sql);
        }

        function selectTimeByAddTime()
        {
            $sql = sprintf("SELECT * FROM time order by add_time desc");
			return $this->link->query($sql);

        }


        


  }