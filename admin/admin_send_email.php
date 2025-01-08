<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Adjust paths for PHPMailer and database connection
require __DIR__ . '/../PHPMailer/src/Exception.php';
require __DIR__ . '/../PHPMailer/src/PHPMailer.php';
require __DIR__ . '/../PHPMailer/src/SMTP.php';
include '../dbase.php';

$mail = new PHPMailer(true);

try {

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


    $recipientEmail = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $originalMessage = filter_var($_POST['message'] ?? '', FILTER_SANITIZE_STRING);
    $adminResponse = filter_var($_POST['admin_message'] ?? '', FILTER_SANITIZE_STRING);
    $subject = filter_var($_POST['subject'] ?? 'Admin Response', FILTER_SANITIZE_STRING);

    if (!filter_var($recipientEmail, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Invalid recipient email format');
    }

    // Insert the admin's response into the database
    $stmt = $conn->prepare("INSERT INTO admin_responses (email, subject, original_message, admin_response) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $recipientEmail, $subject, $originalMessage, $adminResponse);
    $stmt->execute();

    // Sender and recipient settings
    $mail->setFrom('chamodi.malshika@ecyber.com', 'Admin');
    $mail->addAddress($recipientEmail, 'User');

    // Email content
    $mail->isHTML(true);
    $mail->Subject = htmlspecialchars($subject);
    $mail->Body    = "
        <p>Dear User,</p>
        <p>You have received a response to your inquiry:</p>
        <p><strong>Original Message:</strong></p>
        <blockquote>" . nl2br(htmlspecialchars($originalMessage)) . "</blockquote>
        <p><strong>Admin's Response:</strong></p>
        <blockquote>" . nl2br(htmlspecialchars($adminResponse)) . "</blockquote>
        <p>Best regards,<br>Admin Team</p>
    ";
    $mail->AltBody =
        "Dear User,\n\n" .
        "You have received a response to your inquiry:\n\n" .
        "Original Message:\n" . htmlspecialchars($originalMessage) . "\n\n" .
        "Admin's Response:\n" . htmlspecialchars($adminResponse) . "\n\n" .
        "Best regards,\nAdmin Team";

    // Send email
    $mail->send();
    $response['status'] = 'success';
    $response['message'] = 'Email sent successfully!';
} catch (Exception $e) {
    $response['message'] = 'Error: ' . $e->getMessage();
}

echo json_encode($response);
