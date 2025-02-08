<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $program = $_POST['program'];
    $message = $_POST['message'];
    
    // Your email address where you want to receive the form submissions
    $to = "your-email@example.com"; // Replace with your actual email
    
    // Email subject
    $subject = "New Training Inquiry from $name";
    
    // Email content
    $email_content = "You have received a new inquiry from the website:\n\n";
    $email_content .= "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n";
    $email_content .= "Interested Program: $program\n";
    $email_content .= "Message:\n$message\n";
    
    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    
    // Send email
    if(mail($to, $subject, $email_content, $headers)) {
        $success_message = "Thank you for your message. We will contact you soon!";
    } else {
        $error_message = "Sorry, there was an error sending your message. Please try again later.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vocational Training Centre - Anamaduwa</title>
    <style>
        /* Previous CSS styles remain the same */
        /* Adding styles for success/error messages */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            text-align: center;
        }
        .alert-success {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
        }
        .alert-error {
            background-color: #f2dede;
            color: #a94442;
            border: 1px solid #ebccd1;
        }
        /* Rest of the previous CSS remains the same */
    </style>
</head>
<body>
    <!-- Previous HTML content remains the same until the form section -->

    <section id="contact-form" class="section contact-form">
        <div class="container">
            <h2>Get in Touch</h2>
            
            <?php if(isset($success_message)): ?>
                <div class="alert alert-success">
                    <?php echo $success_message; ?>
                </div>
            <?php endif; ?>
            
            <?php if(isset($error_message)): ?>
                <div class="alert alert-error">
                    <?php echo $error_message; ?>
                </div>
            <?php endif; ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="program">Interested Program</label>
                    <select id="program" name="program" required>
                        <option value="">Select a Program</option>
                        <option value="technical">Technical Training</option>
                        <option value="it">IT Skills</option>
                        <option value="soft-skills">Soft Skills Development</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </section>

    <!-- Rest of the previous HTML content remains the same -->
</body>
</html>