<?php
/**
 * 图片类
* @author http://blog.csdn.net/haiqiao_2010
* @version 1.0
*
* PHP默认只识别application/x-www.form-urlencoded标准的数据类型。
* 因此，对型如text/xml 或者 soap 或者 application/octet-stream 之类的内容无法解析，如果用$_POST数组来接收就会失败！
* 故保留原型，交给$GLOBALS['HTTP_RAW_POST_DATA'] 来接收。

* 另外还有一项 php://input 也可以实现此这个功能

* php://input 允许读取 POST 的原始数据。和 $HTTP_RAW_POST_DATA 比起来，它给内存带来的压力较小，并且不需要任何特殊的 php.ini 设置。php://input和 $HTTP_RAW_POST_DATA 不能用于 enctype="multipart/form-data"。
*/

class fileUpload {
	private $filepath;
	function uploadfile()
	{
		$base_path = "C:/xampp/htdocs/taoaixin_phone/andriodinterface/customer_file/"; //接收文件目录  
        $target_path = $base_path.date("YmdHis", time()) . rand(1000, 9999).basename ( $_FILES ['productImage'] ['name'] ); 
        $this->filepath = $target_path;		
        if (move_uploaded_file ( $_FILES ['productImage'] ['tmp_name'], $target_path )) {  
          $array = array ("code" => "1", "message" => $_FILES ['productImage'] ['name'] );  
          return 1;  //json_encode ( $array[$code] );  
        } else {  
          $array = array ("code" => "0", "message" => "There was an error uploading the file, please try again!" . $_FILES ['productImage'] ['error'] );  
          return 0; //json_encode ( $array[$code] );  
	    }
    }
	
	function getfilepath()
	{
		return $this->filepath;
	}
}
?>