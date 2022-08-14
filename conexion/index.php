<?php

require("mail.php"); 

    function validate($name, $email, $subject, $message, $form) {
        return !empty($name) && !empty($email) && !empty($subject) && !empty($message);
    }

    $status = "";

    if(isset($_POST["form"])) { 

        if( validate(...$_POST) ) { 
            $name = $_POST["name"];
            $email = $_POST["email"];
            $subject = $_POST["subject"];
            $message = $_POST["message"];

            $body = "$aname <$email> Te envia el siguiente mensaje: <br><br> $message";

            //Send email
            sendMail($subject, $body, $email, $name);

            $status = "success";
        } else { 
            $status = "danger";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>

    <?php if($status == "danger") : ?>
        <div class="alert-danger">
        <span>There is a problem</span>
        </div>
    <?php endif; ?>

    <?php if($status == "success") : ?>
        <div class="alert-success">
        <span>Message was sending</span>
        </div>
    
    <?php endif; ?>
  

    <form action="./" method="post" >
        <h1>Contact</h1>
        <input type="text" name="name" placeholder="Name" require>
        <input type="email" name="email" placeholder="Email" require>
        <input type="text" name="subject" placeholder="Subject" require>
        <textarea name='message' placeholder='Message'require></textarea>
        <button name='form' type='submit'>Submit</button>
    </form>
    
   

</body>
</html>