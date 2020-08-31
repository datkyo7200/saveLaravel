<?php
    require "./Mail/PHPMailer.php";
    require "./Mail/Exception.php";
    require "./Mail/OAuth.php";
    require "./Mail/POP3.php";
    require "./Mail/SMTP.php";
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

// Instantiation and passing `true` enables exceptions
function sendMail($title, $content, $nTo, $mTo,$diachicc=''){
    $nFrom = 'Phan Thành Đạt';
    $mFrom = 'datkyo7200@gmail.com';  //dia chi email cua ban 
    $mPass = 'Chieubuon720';       //mat khau email cua ban
    $mail             = new PHPMailer();
    $body             = $content;
    //Server settings
    $mail->CharSet   = "utf-8";
    $mail->SMTPDebug  = 0;                        // Enable verbose debug output
    $mail->IsSMTP();                                           // Send using SMTP
    $mail->Host       = "smtp.gmail.com";                   // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $mFrom;                     // SMTP username
    $mail->Password   = $mPass;                               // SMTP password
    $mail->SMTPSecure = "ssl";          // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                  // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->SetFrom($mFrom, $nFrom);
    //chuyen chuoi thanh mang
    $ccmail = explode(',', $diachicc);
    $ccmail = array_filter($ccmail);
    if(!empty($ccmail)){
        foreach ($ccmail as $k => $v) {
            $mail->AddCC($v);
        }
    }
    $mail->Subject    = $title;
    $mail->MsgHTML($body);
    $address = $mTo;
    $mail->AddAddress($address, $nTo);
    $mail->AddReplyTo($mFrom,$nFrom);
    if(!$mail->Send()) {
        return 0;
    } else {
        return 1;
    }
}
?>