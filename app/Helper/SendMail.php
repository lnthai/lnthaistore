<?php
namespace App\Helper;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SendMail{
function sendMail($emailNguoiNhan, $tieuDe, $noiDung) {
    $mail = new PHPMailer(true);
    try {
        // Cấu hình thông tin máy chủ email và tài khoản gửi
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host = getenv('MAIL_MAILER');  // Thay đổi nếu bạn sử dụng máy chủ email khác
        $mail->SMTPAuth = true;
        $mail->Username = getenv('MAIL_USERNAME'); // Thay đổi bằng địa chỉ email của bạn
        $mail->Password = getenv('MAIL_PASSWORD');  // Thay đổi bằng mật khẩu của bạn
        $mail->SMTPSecure = 'ssl';
        $mail->Port = getenv('MAIL_PORT');  // Thay đổi nếu máy chủ email của bạn yêu cầu cổng khác

        // Thiết lập người gửi và người nhận
        $mail->setFrom(getenv('MAIL_USERNAME'), 'Thai');  // Thay đổi bằng địa chỉ email và tên của bạn
        $mail->addAddress($emailNguoiNhan);  // Sử dụng địa chỉ email người nhận được truyền vào hàm
        $mail->isHTML(true);

        // Đặt tiêu đề và nội dung của email
        $mail->Subject = $tieuDe;
        $mail->Body = $noiDung;

        // Gửi email
        $mail->send();
        return true;

    } catch (Exception $e) {
        echo "Lỗi khi gửi email: " . $mail->ErrorInfo;
        return false;
    }
}
}