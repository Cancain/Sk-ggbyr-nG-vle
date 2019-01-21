<?php

error_reporting(0);
$msg = '';
$msgClass = '';

if(filter_has_var(INPUT_POST, 'submit')){
  $msg = '';
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);
  

  if(!empty($name) && !empty($email) && !empty($message)){
    //empty check passes
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
      $msg = 'Du måste ange en korrekt email';
    } else {
      $toEmail = "eriksson.tomas@gmail.com";
      $subject = "Meddelande från" . $name;
      $body = '<h2>Bokningsönskan<h2>
      <h4>Namn</h4><p>'.$name.'</p>
      <h4>Email</h4><p>'.$email.'</p>
      <h4>Meddelande</h4><p>'.$message.'</p>';

      //Email headers
      $headers = "MIME-Version: 1.0" ."\r\n";
      $headers .= "Content-Type:text/hmtl;charset=UTF-8" . "\r\n";

      //additional headers
      $headers .= "From: " .$name. "<".$email.">"."\r\n";

      if(mail($toEmail, $subject, $body, $headers)){
        $msg = 'Bokningsönskan skickad';
      } else {
        $msg = 'Något gick fel, försök igen senare';
      }
    }
  } else {
     $msg = 'Du måste fylla i alla fält';
  }
}

?>