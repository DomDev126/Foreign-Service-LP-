<?php


if (isset($_POST)) {

    // EDIT THE 2 LINES BELOW AS REQUIRED

    $email_to = "dom.wolf126@gmail.com";
    $email_subject = "お問い合わせ";

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];
    $message = $_POST['message'];

    $email_message1 = $name. "様から下記のお問合せがありました。\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message = "名前： " . clean_string($name) ."\n";
    $email_message .= "電話番号： " . clean_string($phone) . "\n";
    $email_message .= "メールアドレス： " . clean_string($mail) . "\n";
    $email_message .= "お問い合わせ内容： " . clean_string($message) . "\n";

    $email_message1 .= $email_message;

    // create email headers
    $headers = 'From: ' . $mail . "\r\n" .
        'Reply-To: ' . $mail . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    @mail($email_to, $email_subject, $email_message1, $headers);

    $email_message2 = clean_string($name) ."様\n\n";
    $email_message2 .= "お問い合わせいただき、ありがとうございました。\n以下の内容で送信いたしました。\n\n";

    $email_message2 .= $email_message . "\n\n";
    $email_message2 .= "後で返信いたしますので、お待ち頂ければ本当に幸いです。\nどうぞよろしくお願い申し上げます。\n\n";
    $email_message2 .= "My Tomodachi Japan";

    // create email headers
    $headers = 'From: ' . $email_to . "\r\n" .
        'Reply-To: ' . $email_to . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    @mail($mail, $email_subject, $email_message2, $headers);

    header("Location: ./thanks.html"); 
    exit();
}

?>