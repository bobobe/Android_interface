<?php
class file
{
    private $allow_type = array("gif", "png", "jpg","jpeg");
    //private $size = 1000000;
    private $path = "C:/xampp/htdocs/taoaixin_phone/andriodinterface/customer_file";
    private $error = NULL;
    private $filename = "myfile";//文件上传时表单的name字段

    public function  getPath(){
        return $this->path;
    }


    public function upload_file()
    {
		
		if ($_FILES[$this->filename]['error'] > 0)
        {
            switch ($_FILES[$this->filename]['error'])
            {
                case 1:;
                case 2:
                     $this->error = "<span>上传文件过大</span>";
                     return $this->error;

                case 3:
                     $this->error = "<span>文件只有部分被上传</span>";
                     return $this->error;

                case 4:
                     $this->error = "<span>没有上传文件</span>";
                     return $this->error;

                default:
                     $this->error = "<span>未知错误</span>";
                     return $this->error;


            }

        }
        
            list($maintype, $subtype) = explode("/", $_FILES[$this->filename]['type']);
            //var_dump($_FILES[$this->filename]['type']);
            if (!in_array($subtype, $this->allow_type))
            {
                $this->error = "<span>图片格式是</span>".$_FILES[$this->filename]['type'];
                return $this->error;
            }

        

        list($maintype, $subtype) = explode("/", $_FILES[$this->filename]['type']);
        $new_file_name = date("YmdHis", time()) . rand(1000, 9999).".".$subtype;

        if (is_uploaded_file($_FILES[$this->filename]['tmp_name']))
        {
            if (!move_uploaded_file($_FILES[$this->filename]['tmp_name'], $this->path.'/'.$new_file_name))
            {
                $this->error = "<span>移动到指定目录失败</span>";
                return  $this->error;
            }
            else
            {
                $this->path = "http://localhost/projects/androidinterface/customer_file/".$new_file_name;
            }

        }
        else
        {
            $this->error = "<span>这个文件不合法上传</span>";
            return  $this->error;
        }

    }
}









