<?php
class Demo{
    public $mang1;
    private $mang2;
    protected $mang3 =30;

    public function show()
    {
        return $this->mang1;
    }
} 

class User extends Demo{

    public function __construct() {
       echo $this->mang3;
    }
}
   



$a= new User;
// $a -> mang1 =1210;
// $a -> mang2 =10;
// echo $a ->show();
// echo $a ->mang2;

?>