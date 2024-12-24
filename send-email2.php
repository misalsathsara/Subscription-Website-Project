<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'dbase.php';

$mail = new PHPMailer(true);

try {
    // Enable verbose debug output (set to 0 for production)
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';

    // SMTP configuration
    $mail->isSMTP();
    $mail->SMTPAuth   = true;
    $mail->Host       = 'smtp.gmail.com';
    $mail->Username   = 'chamodi.malshika@ecyber.com';
    $mail->Password   = 'eogb lklw pzqk jauk';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    // Sender and recipient settings
    $mail->setFrom('chamodi.malshika@ecyber.com', 'Contact Request');
    $mail->addAddress('chamodi.malshika@ecyber.com', 'Chamodi');
    $mail->addAddress('sameera.rajapaksha@ecyber.com', 'Sameera');
    $mail->addAddress('misal.sathsara@ecyber.com', 'Misal');

    // Validate and sanitize POST data
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'] ?? '', FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'] ?? '', FILTER_SANITIZE_STRING);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Invalid email format');
    }

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO contact (email, subject, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $subject, $message);
    $stmt->execute();

    // Email content
    $mail->isHTML(true);
    $mail->Subject = htmlspecialchars($subject);
    $mail->Body    = 'From: ' . htmlspecialchars($email) . '<br>Message: ' . nl2br(htmlspecialchars($message));
    $mail->AltBody = 'From: ' . htmlspecialchars($email) . "\nMessage: " . htmlspecialchars($message);

    // Send email
    $mail->send();
    header('Location: contact.php?status=success');
    exit;
} catch (Exception $e) {
    // Handle exceptions
    error_log('Error: ' . $e->getMessage());
    header('Location: contact.php?status=error');
    exit;
} finally {
    // Close database connection
    if (isset($stmt)) {
        $stmt->close();
    }
    $conn->close();
}
