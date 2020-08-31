<?php
class TinhDTCV{
    private $width;
    private $height;
    
    // public function __construct() {
    //    $this->width = 12;
    //    $this->height= 3;
    // }

    public function setCDCR($w,$h){
        $this->width = $w;
        $this->height = $h;
    }
    
    public function getTinhDienTich()
    {
        return ($this->width * $this->height);
    }
    public function getTinhChuVi(){
        return 2*($this->width + $this->height);
    }
}

    $a = new TinhDTCV();
    $a->setCDCR(5,7);
    echo $a -> getTinhDienTich();
    echo "||";
    echo $a -> getTinhChuVi(); 
?>