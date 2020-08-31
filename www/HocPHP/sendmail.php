<?php
    //goi thu vien
    include "./Mailfunctions.php"; 
    $title = 'Hướng dẫn gửi mail bằng phpmailer';
    $content = 'Bạn đang tìm hiểu về cách gửi email bằng php mailler trên seafoodtds.net chúc các bạn có những phút giây vui vẻ.';
    $nTo = 'Chào bạn';
    $mTo = 'ptd58131284@gmail.com';
    $diachicc = 'xcc@gmail.com';
    //test gui mail
    $mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
    // $mail = sendMailAttachment($title, $content, $nTo, $mTo,$diachicc='','filedinhkem.docx','Day la file dinh kem');
    if($mail==1){
        echo 'Mail của bạn đã được gửi đi hãy kiếm tra hộp thư đi để xem kết quả. ';
    }
    else{ 
        echo 'Có lỗi trong việc gửi mail!';
    }
?>