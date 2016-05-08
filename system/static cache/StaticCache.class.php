<?php
	/*
	功能：
	1.信息存入文件
	2.删除信息文件
	3.读取信息文件
	*/
class StaticCache{
	
	private $cache_dir;
	const EXT ='.txt';
	public function __construct()
	{
		$this->cache_dir = dirname(__FILE__);//默认缓存路径
		//echo $this->cache_dir;
	}
	
	public function dataCache($key,$value="")//可以运行
	{
		$filename = $this->cache_dir."\\staticCache".$key.self::EXT;
		
		if($value!=="")//写入缓存  使用全等,即null不是""
		{
			if(is_null($value))//如果第二个参数传得null，则删除文件
			{
				return unlink($filename);//php删除文件用unlink
			}
			$dir = dirname($filename);//dirname()取得当前文件所在目录
			if(!is_dir($dir))
			{
				mkdir($dir,0777);
			}
			return file_put_contents($filename,json_encode($value));//写入文件，这个函数只能写入字符串，所以转化为json
		}
		else//取出缓存
		{
			if(!is_file($filename))
		    {
			    return false;
		    }
		    return json_decode(file_get_contents($filename),true);//转化为数组
	    }
	}
}


//测试代码
/*$t = new StaticCache();
$data = array(
      "data1"=>"22",
	  "data2"=>"44",
	  "data3"=>array(
	  "dd"=>"gg",
	  "tt"=>"tt"));
var_dump($t->dataCache("ff",null));
*/
?>