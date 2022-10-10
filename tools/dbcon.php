<?php
class dbtools{
    var $con;
    function __construct($database)
    {
        $this->con=mysqli_connect('localhost','web','123456',$database);       
    }
    function selecttable($table)
    {
        $sql="select * from $table";
        $res=mysqli_query($this->con,$sql);
        return $res;
    }
    
}


?>
