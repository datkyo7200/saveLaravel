<?php
class TinhDTCV{
    public $width;
    public $height;
    
    public function __construct() {
       $this->width = 12;
       $this->height= 3;
    }

    public function TinhDienTich()
    {
        return ($this->width * $this->height);
    }
    public function TinhChuVi(){
        return 2*($this->width + $this->height);
    }
}
    $a = new TinhDTCV();
    echo $a -> TinhDienTich();
    echo "||";
    echo $a -> TinhChuVi(); 
?>