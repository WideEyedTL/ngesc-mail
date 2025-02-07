<?php
$status = ""; // Default status message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipientEmail = $_POST['email'];
    $recipientName = $_POST['name'];

    $to = $recipientEmail;
    $subject = "NIES 2025 Registration Confirmation";

    // Email message with recipient's name
    $message = "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    </head>
    <body style='font-family: Arial, sans-serif; text-align: center; background-color: #f4f4f4; padding: 20px;'>
        <div style='max-width: 600px; margin: auto; background: #006400; padding: 20px; color: #ffffff; border-radius: 10px;'>
            <h2>NIES 2025 REGISTRATION</h2>
            <p>Hi <strong>$recipientName</strong>,</p>
            <p>🎉 Congratulations! You are officially registered for the <strong>NIES 2025 Conference</strong>!</p>
            <p>Join us from <strong>February 24th - 27th, 2025</strong> for an incredible experience with industry leaders.</p>
            <p style='color: yellow;'><strong>Note:</strong> The ₦15,000 registration fee covers only registration and <strong style='color: red;'>NOT</strong> transportation or accommodation.</p>
            <p><a href='https://tinyurl.com/n-gesc-inquiry' style='color: #fff; text-decoration: underline;'>Inquire About Accommodation & Transportation</a></p>
            <p><strong>Refund Policy:</strong> Request a refund before <strong>February 20th, 2025</strong>.<br>
            <a href='https://tinyurl.com/nies2025-refund' style='color: #fff; text-decoration: underline;'>Request a Refund</a></p>
        </div>
    </body>
    </html>";

    // Email headers
    $headers = "From: NIES 2025 <noreply@nigeriagesc.com>\r\n";
    $headers .= "Reply-To: noreply@nigeriagesc.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        $status = "✅ Email sent successfully to $recipientEmail.";
    } else {
        $status = "❌ Failed to send email.";
    }
}
?>
