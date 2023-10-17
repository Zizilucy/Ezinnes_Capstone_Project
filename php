<?php
if(isset($_POST['message'])) {
    //Get form data
    $name = $_POST['name'];
    $name = $_POST['email'];
    $name = $_POST['subject'];
    $name = $_POST['message'];

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>The email address you entered is not valid.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
        <?php exit;
    }

    $to = "yourname@example.com";
    //recipient email address
    $subject = "Contact Form";
    //Subject of the email

    //Message content to send in an email
    $message = "Name: ".$name."<br>Email: ".$email."<br>Subject: ".$subject."<br>Message: ".$message;
    //Send email in HTML format
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    //$headers = "CC: someone@example.com";
    $headers .= "Reply-To:".$email."\r\n;
    $headers .= "X-Mailer: PHP/".phpversion();

    //Send email
    $sendemail = mail($to, $subject, $message, $headers);

    //If mail sent
    if ($sendmail == true) {
    ?>
        <div class="alert alert-success alert-dismissible fade show">
            <strong>Message has been sent seuccessfully.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }else {
    ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>Message could not be sent. Please try again.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
    }
}
?>