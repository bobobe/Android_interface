<?php
/**
 * Created by PhpStorm.
 * User: yanbo
 * Date: 2015/10/25
 * Time: 10:04
 */

abstract class Model{
    protected $data=array();
    protected $link;
    function __construct()
    {
        $this->link = new mysql_i();
    }


}
?>