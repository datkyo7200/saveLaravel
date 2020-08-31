<?php

class User{
    private $userName;
    private $passWord;
    private $fullname ="Phan Thành Đạt";
    private $db_userName ="thanhdat";
    private $db_passWord= "dat123456";

    public function setUser($userName,$passWord){
        $this->userName = $userName;
        $this->passWord = $passWord;
    }
    public function CheckLogin(){
        if ($this->userName == $this->db_userName && $this->passWord == $this->db_passWord) {
            echo "Xin chào bạn: ".$this->fullname;
        }
        else{
            echo "Sai tai khoản hoăc mật khẩu";
        }
    }
}
    $u = new User;
    $u->setUser("thanhdat","dat123456");
    echo $u->CheckLogin();
?>