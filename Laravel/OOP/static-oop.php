<?php
class TinhDTCV{
    public static $width;
    public static $height;
    
    public function TinhDienTich()
    {
        return (self::$width * self::$height);
    }
    public function TinhChuVi(){
        return 2*(self::$width * self::$height);
    }
}   

class Demo{
    public function __construct() {
        TinhDTCV::$width =10;
        TinhDTCV::$height =10;
        echo TinhDTCV::TinhDienTich();
        echo "||";
        echo TinhDTCV::TinhChuVi();
    }
}
$a = new Demo;
?>