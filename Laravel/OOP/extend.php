<?php
class A{
    protected $mang1 =10;
    public function method_1(){
        echo "hehe";
    }
} 
class B extends A{
    public $mang2;
    public function method_2(){
        return $this-> mang1;
    }
} 
$b = new B();
$b ->mang2 =" Class B";
echo $b -> method_1();
echo $b -> method_2();

?>