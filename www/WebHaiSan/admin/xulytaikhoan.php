<!-- start -->
<?php
    require_once ("header.php");
?>
<?php
    if(isset($_POST['doipass'])) {
        $id_update = $_POST['id_update'];
        $fullname = $_POST['full_name'];
        $pass1 = md5($_POST['pass1']);
        $pass2 = md5($_POST['pass2']);
        $pass3 = md5($_POST['pass3']);

        $lay_pass_ra = mysqli_query($connect,"SELECT * FROM tbl_admin WHERE admin_id='$id_update' LIMIT 1");
        while($row_get_pass= mysqli_fetch_assoc($lay_pass_ra)){
        if($pass2 != $pass3 || $pass1 != $row_get_pass['password'])
        {
           echo "<script>alert('Mật khẩu không trùng nhau')</script>";
        }else {
            $sql_update_pass = "UPDATE tbl_admin SET admin_fullname='$fullname',password='$pass2' WHERE admin_id='$id_update'";
            echo "<script>alert('Đổi mật khẩu thành công ')</script>";
        }}   
        mysqli_query($connect,$sql_update_pass);        
}
?>
<?php
    if(isset($_POST['themtaikhoan'])) {

        $fullname_admin = $_POST['name_admin'];
        $pass_admin = md5($_POST['pass_admin']);
        $pass_admin1 = md5($_POST['pass_admin1']);
        $email_admin = $_POST['email_admin'];
        $level = $_POST['level'];
        $position = $_POST['position'];

        if ($pass_admin != $pass_admin1 ) {
            echo "<script>alert('Mật khẩu không trùng nhau')</script>";
        }
        $lay_email_ra = mysqli_query ($connect,"SELECT * FROM tbl_admin WHERE admin_email='$email_admin'");
        $row_get_email = mysqli_fetch_array ($lay_email_ra);
        if(mysqli_num_rows($row_get_email) > 0){   
            echo "<script>alert('Email đã này đã được sử dụng')</script>";
        }else {
            $sql_themtk = mysqli_query($connect,"INSERT INTO `tbl_admin`(`admin_email`, `password`, `admin_fullname`, `position`, `level`) VALUES ('$email_admin','$pass_admin','$fullname_admin','$position','$level')");
            echo "<script>alert('Đăng ký thành công')</script>";
        }
}
?>
<div class="content-wrapper" style="min-height: 365px;">
    <div class="container-fluid">

        <div class="row">
        <?php
            if(isset($_GET['quanly'])=='doipass'){
                    $id_doipass = $_GET['doipass'];
                    $sql_doipass = mysqli_query($connect,"SELECT * FROM tbl_admin WHERE admin_id='$id_doipass'");
                    $row_pass = mysqli_fetch_array($sql_doipass);
                    ?>
            <div class="col-3" style="display: block;margin: auto; text-align:center;">
                    <form action="" method="POST">
                        <h3 style="text-align:center;margin-top:20px">Edit Profile</h3>
                        <div>
                            <input type="hidden" class="form-control" name="id_update" value="<?php echo $row_pass['admin_id'] ?>">
                            <label>Enter a full name</label>
                            <input type="text" class="form-control" name="full_name" value="<?php echo $row_pass['admin_fullname'] ?>"  required=""><br>
                            <label>Current Password</label>
                            <input type="password" class="form-control" name="pass1" value=""  required=""><br>
                            <label>New Password</label>
                            <input type="password" class="form-control" name="pass2" value=""  required=""><br>
                            <label>Enter a new password</label>
                            <input type="password" class="form-control" name="pass3" value=""  required=""><br>
                            <input type="submit" name="doipass" value="UPDATE PROFILE" class="btn btn-default">
                        </div>					
                    </form>            
            </div>      
                <?php
                }
                ?>
        <?php
            if(isset($_GET['quanlytk'])=='themmoitaikhoan'){
                    ?>
            <div class="col-3" style="display: block;margin: auto; text-align:center;">
                    <form action="" method="POST">
                        <h4 style="text-align:center;margin-top:20px">Thêm mới người dùng</h4>
                        <div>
                            <label>Nhập tên của bạn</label>
                            <input type="text" class="form-control" name="name_admin" value=""  required=""><br>
                            <label>Nhập Email</label>
                            <input type="text" class="form-control" name="email_admin" value=""  required=""><br>
                            <label>Nhập mật khẩu</label>
                            <input type="password" class="form-control" name="pass_admin" value=""  required=""><br>
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="pass_admin1" value=""  required=""><br>
                            <input type="hidden" name="level" value="2">
                            <input type="text" class="form-control" name="position" value="Staff"  required=""><br>
                            <input type="submit" name="themtaikhoan" value="Thêm Tài Khoản" class="btn btn-default">
                        </div>					
                    </form>            
            </div>      
            <?php
            }
            ?>
            <div class="col-8" style="display: block;margin: auto;">
                <?php
                if($_SESSION["level"]==0){
                ?>
                <h4 style="text-align:center;margin:20px"><button type="submit" class="btn btn-info"><a style="color:#fff;" href="xulytaikhoan.php?quanlytk=themmoitaikhoan">THÊM MỚI TÀI KHOẢN</a></button></h4>
                <?php
                }
                ?>
                <h4 style="text-align:center;margin:20px">Thông Tin Người Dùng</h4>
                <?php
                $admin_id = $_SESSION['admin_id'];
                $sql_lay_admin = mysqli_query($connect,"SELECT * FROM tbl_admin WHERE admin_id='$admin_id' LIMIT 1");
                while($row_lay_admin= mysqli_fetch_array($sql_lay_admin)){
                    ?>
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username"><?php echo $row_lay_admin['admin_fullname']; ?></h3>
                        <h5 class="widget-user-desc"><?php echo $row_lay_admin['position']; ?></h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="../uploads/<?php echo $row_lay_admin['hinh_admin']; ?> " alt="User Avatar">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">5</h5>
                                    <span class="description-text">SALES</span>
                                </div>
                            <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">13</h5>
                                    <span class="description-text">FOLLOWERS</span>
                                </div>
                            <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">19</h5>
                                    <span class="description-text">PRODUCTS</span>
                                </div>
                            <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="row" style="display: block;margin: auto;margin-top:20px">
                        <div class="row">
                            <div class="col-sm-3">
                                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                            </div>
                            <div class="col-sm-3">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                            <div class="col-sm-3">
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                            <div class="col-sm-3">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                            </div>
                            <!-- /.description-block -->
                        </div>

                        <div class="col-sm-12">
                            <p>
                                <a class="doitt" href="xulytaikhoan.php?quanly=doipasss&doipass=<?php echo $row_lay_admin['admin_id'] ?>">CẬP NHẬT THÔNG TIN</a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- /.widget-user -->
                </div>
                <?php
                    }
                ?>          
        </div>

    </div>
</div>
<?php
    require_once ("footer.php");
?>