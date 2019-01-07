<?php
 
$msg = '';
$msgClass = '';
 
if(filter_has_var(INPUT_POST, 'submit')){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
 
    if(!empty($name) && !empty($email) && !empty($message)){
      //passed
      //check mail
      if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        //failed
        $msg = 'please enter a valid email';
      } else {
        //passed
        $toEmail = "eriksson.tomas@gmail.com";
        $subject = "Message from your website";
        $body = '<h2>Contact request<h2>
        <h4>Name</h4><p>'.$name.'</p>
        <h4>Email</h4><p>'.$email.'</p>
        <h4>Message</h4><p>'.$message.'</p>';
 
        //Email headers
        $headers = "MIME-Version: 1.0" ."\r\n";
        $headers .= "Content-Type:text/hmtl;charset=UTF-8" . "\r\n";
 
        //additional headers
        $headers .= "From: " .$name. "<".$email.">"."\r\n";
 
        if(mail($toEmail, $subject,$body,$headers)){
          $msg = 'Your email has been sent';
        } else {
          $msg = 'Your email was not sent';
        }
      }
    } else {
      $msg = 'Please fill in all fields';
    }
}
 
?>
<div id="mainContent" class="">
  <div id="popupContent">
    <div class="textBg">
      <form action="" method="POST">
        <div class="formControl">
          <label for="">Name</label> <input type="text" name="name"
          value="<?php echo isset($_POST['name']) ? $name : '';?>" />
        </div>
        <div class="formControl">
          <label for="">Email</label> <input type="text" name="email"
          value="<?php echo isset($_POST['email']) ? $email : '';?>" />
        </div>
        <div class="formControl">
          <label for="">Message</label>
          <textarea name="message" id="" cols="30" rows="10"><?php echo isset($_POST['message']) ? $message : '';?></textarea>
        </div>
        <button type="submit" name="submit" id="submitBtn">Send</button>
      </form>
      <div id="errorMesg">
      <?php if (!empty($msg)) : ?>
        <p><?php echo $msg?></p>
      <?php endif ?>
      </div>
    </div>
  </div>
</div>