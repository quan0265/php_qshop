<?php
ob_start();
session_start();
include_once "../../admin/database.php";

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
// require 'vendor/autoload.php';

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/OAuth.php';
require 'PHPMailer-master/src/POP3.php';

if(!isset($_GET['order_id'])){
    header('location: ../../index.php');
}
else{
    $order_id= $_GET['order_id'];
}


$customer_id= $_SESSION['customer']['id'];

$ship_fullname= $_SESSION['customer']['full_name'];

$ship_email= $_SESSION['customer']['email'];

$ship_phone= $_SESSION['customer']['phone'];

$ship_address= $_SESSION['customer']['address'];


$sql= "SELECT * FROM order_detail INNER JOIN products ON order_detail.product_id=products.product_id WHERE order_detail.order_id='$order_id'";

$query= mysqli_query($conn, $sql);

$strBody = '';
        // Thông tin Khách hàng
        $strBody = '<p>
    <b>Khách hàng:</b> ' . $ship_fullname . '<br />
    <b>Email:</b> ' . $ship_email . '<br />
    <b>Điện thoại:</b> ' . $ship_phone . '<br />
    <b>Địa chỉ:</b> ' . $ship_address . '
</p>';

// Danh sách Sản phẩm đã mua
        $strBody .= '<table border="1px" cellpadding="10px" cellspacing="1px" width="100%">
    <tr>
        <td align="center" bgcolor="#3F3F3F" colspan="4"><font color="white"><b>XÁC NHẬN HÓA ĐƠN THANH TOÁN</b></font></td>
    </tr>
    <tr id="invoice-bar">
        <td width="45%"><b>Tên Sản phẩm</b></td>
        <td width="15%"><b>Số lượng</b></td>
        <td width="20%"><b>Thành tiền</b></td>
    </tr>';

        $totalPriceAll = 0;
        while ($row = mysqli_fetch_array($query)) {
            $total_price= $row['total_price'];

            $strBody .= '<tr>
        <td class="prd-name">' . $row['product_name'] . '</td>
        <td class="prd-number">' . $row['quanlity'] . '</td>
        <td class="prd-total"><font color="#C40000">' . $total_price . ' VNĐ</font></td>
    </tr>';

            $totalPriceAll += $total_price;
        }

        $strBody .= '<tr>
        <td class="prd-name">Tổng giá trị hóa đơn là:</td>
        <td colspan="1"></td>
        <td class="prd-total"><b><font color="#C40000">' . $totalPriceAll . ' VNĐ</font></b></td>
    </tr>
</table>';

        $strBody .= '<p align="justify">
    <b>Quý khách đã đặt hàng thành công!</b><br />
    • Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br />
    • Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng.<br />
    <b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</b>
</p>';


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'quan02655@gmail.com';                     // SMTP username
    $mail->Password   = 'sxmuixcjvqabione';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('quan02655@gmail.com', 'qshop');
    $mail->addAddress($ship_email, $ship_fullname);     // Add a recipient
    // $mail->addAddress('quan0265@gmail.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'HOA DON THANH TON MUA HANG QSHOP';
    $mail->Body    = $strBody;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Message has been sent';

    unset($_SESSION['cart']);

    $_SESSION['thongbao']='<script>alert("Bạn đã mua hàng thành công")</script>';

    header('location: ../../index.php');


} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


