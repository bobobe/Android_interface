<?php
/**
 * Created by PhpStorm.
 * User: yanbo
 * Date: 2015/11/7
 * Time: 20:29
 */
namespace memcache;
use xpath\xpath;
include_once("D:/program/EasyPHP-DevServer-14.1VC11/data/localweb/projects/androidinterface/configs/system.config.php");

include_once(DIR_XPATH);//������

class Memcache {
    private $link;

    function __construct(){
        $xpath = new xpath(DIR_DB_CONFIG);
        $res=$xpath->query('/config/memcache/*');
        $ip=$res->item(0)->nodeValue;
        $port=$res->item(1)->nodeValue;

        $this->link = new \Memcache;
        $this->link->connect($ip,$port) or die("����memcacheʧ��");


    }

    //���һ����ֵ
    function add($key,$value){
        $this->link->add($key,$value,MEMCACHE_COMPRESSED,0) or die("memcache��ֵʧ��");

    }

    //�趨һ��ָ��key�Ļ���������ݣ����key����������ӣ��������޸�
    //������������ѹ�����
    function set($key,$value,$time=0)
    {
        $this->link->set($key.$value,MEMCACHE_COMPRESSED,$time) or die ("memcache��ֵʧ��");
    }

    //������ݣ�����Ϊ�����򷵻ع������飬���򷵻�ֵ��ʧ�ܷ���false
    function get($key)
    {
        return $this->link->get($key);

    }

    //�ڶ�������Ϊ0Ϊ����ɾ����������$timeʱ���ڱ�ɾ��
    function delete($key,$time=0)
    {
        $this->link->delete($key,$time) or die("ɾ��ʧ��");
    }

    //��������ջ������ͷ��ڴ棬ֻ�������б����������ʧЧ����ռ���ڴ�α�����������
    function flush(){
        $this->link->flush() or die("���ʧ��");
    }

    //���ص�ǰmemcache�е���Ϣ
    function getStats()
    {
        echo "<pre>";
        echo print_r($this->link->getstats());
        echo  "</pre>";
    }


    function close(){
        $this->link->close() or die("�ر�ʧ��");
    }






}