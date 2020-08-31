<?php 
    class Nguoi{

        private $maso,$hoten,$ngaysinh;
        
        function setMaso($maso){
            $this->maso = $maso;
        }
        function getMaso(){
           return $this->maso;
        }
        function setHoten($hoten){
            $this->hoten = $hoten;
        }
        function getHoten(){
            return $this->hoten;
        }
        function setngaysinh($ngaysinh){
            $this->ngaysinh = $ngaysinh;
        }
        function getngaysinh(){
            return $this->ngaysinh;
        }
    }
    class HocVien extends Nguoi{
        private $lophoc,$sotiethoc,$hocphi1tiet;

        function setLophoc($lophoc){
            $this->lophoc = $lophoc;
        }
        function getLophoc(){
           return $this->lophoc;
        }
        function setSotiethoc($sotiethoc){
            $this->sotiethoc = $sotiethoc;
        }
        function getSotiethoc(){
            return $this->sotiethoc;
        }
        function setHocphi1tiet($hocphi1tiet){
            $this->hocphi1tiet = $hocphi1tiet;
        }
        function getngaysinh(){
            return $this->hocphi1tiet;
        }
        function HocPhiPhaiDong(){
            if($this->sotiethoc>50){
                return 9*($this->sotiethoc*$this->hocphi1tiet)/100;
            }else{
                return $this->sotiethoc*$this->hocphi1tiet;
            }

        }
    }
    $lh = new HocVien();
    $a ;
    if(isset($_POST['submit']))
    {   
        $n = $_POST['hocvien'];
        $sth = $_POST['sotiethoc'];
        $hpt = $_POST['hocphi1tiet'];
        if( 2 <$n && $n<15 ){
        }
        else{
            echo "Không được nhập vào";
        }


    }
    
?>
<form action="" method="post">
<br>
    <label for="hocvien">Nhập số học viên</label>
    <input type="text" id="hocvien" value="3" name='hocvien'>
    <br>
    <br>
    <label for="sotiethoc">Nhập số tiết</label>
    <input type="text" id="sotiethoc" value="50" name="sotiethoc">
    <br>
    <br>
    <label for="sotiethoc">Nhập học phí 1 tiết</label>
    <input type="text" id="sotiethoc" value="50" name="hocphi1tiet">
    <br>
    <br>
    <button type="submit" name="submit">Nhấn vào đây</button>
</form>
