<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
 
    $messageBody = "";
    $to = "matthiasvandam.1991@gmail.com";

    unset($_POST['submit']);

    foreach($_POST as $key => $value){
        $messageBody .= "$key: $value\n";
    }
    
    var_dump($messageBody);

    if(mail($to,$subject, $messageBody)){   

        if($_SERVER['SCRIPT_FILENAME'] === "C:/xampp/htdocs/buyse-tuinaanleg/index.php"){
            header("location: index.php?success#vragen");   
        }
        
        elseif($_SERVER['SCRIPT_FILENAME'] === "C:/xampp/htdocs/buyse-tuinaanleg/contact.php"){
            header("location: contact.php?success#vragen");   
        }

                     
    }
    
}


?>