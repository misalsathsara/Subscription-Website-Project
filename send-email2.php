<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'dbase.php'; 

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->SMTPAuth   = true;
    $mail->Host       = 'smtp.gmail.com';
    $mail->Username   = 'chamodi.malshika@ecyber.com';
    $mail->Password   = 'rnfn pflo xccg owum';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    $mail->setFrom('chamodi.malshika@ecyber.com', 'chamodi');
    $mail->addAddress('chamodi.malshika@ecyber.com', 'Recipient Name');
    $mail->addAddress('misal.sathsara@ecyber.com', 'Misal');

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Invalid email format');
    }

    // Insert data ito the database
    $stmt = $conn->prepare("INSERT INTO contact (email, subject, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $subject, $message);
    $stmt->execute();

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = 'From: ' . htmlspecialchars($email) . '<br>Message: ' . nl2br(htmlspecialchars($message));
    $mail->AltBody = 'From: ' . htmlspecialchars($email) . "\nMessage: " . htmlspecialchars($message);

    $mail->send();
    header('Location: contact.php?status=success');
} catch (Exception $e) {
    header('Location: contact.php?status=error');
} finally {
    if (isset($stmt)) {
        $stmt->close();
    }
    $conn->close();
}
?>
