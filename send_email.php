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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
        }
        .container {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background: #006400;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: #004d00;
        }
        .status {
            font-weight: bold;
            color: red;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Send NIES 2025 Registration Email</h2>

        <?php if (!empty($status)) { echo "<p class='status'>$status</p>"; } ?>

        <form action="" method="post">
            <label for="name">Recipient Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Recipient Email:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Send Email</button>
        </form>
    </div>

</body>
</html>
