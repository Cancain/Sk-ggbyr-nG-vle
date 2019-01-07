<?php include 'inc/navBar.html' ?>

<?php
error_reporting(0);
$msg = '';
$msgClass = '';

if(filter_has_var(INPUT_POST, 'submit')){
  $msg = 'something';
  $name = htmlspecialchars($_POST['name']);
  $date = htmlspecialchars($_POST['date']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);
  

  if(!empty($name) && !empty($date) && !empty($email) && !empty($message)){
    //empty check passes
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
      $msg = 'Du måste ange en korrekt email';
    } else {
      $toEmail = "eriksson.tomas@gmail.com";
      $subject = "Bokningsönskan från" . $name;
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

<div class="gridContact">
  <div id="box1Contact">
  <form action="" autocomplete="off" method="POST">
      <div class="formBox">
        <label for="">Namn</label><br />
        <input class="formField" type="text" name="name" id="" 
        value="<?php echo isset($_POST['name']) ? $name : '' ?>" />
      </div>

      <div class="formBox">
        <label for="">Datum</label><br />
        <input class="formField noAuto" type="text" name="date" id="date" 
        value="<?php echo isset($_POST['date']) ? $date : '' ?>" />
      </div>

      <div class="formBox">
        <label for="">Email</label><br />
        <input class="formField" type="text" name="email" id="" 
        value="<?php echo isset($_POST['email']) ? $email : '' ?>"/>
      </div>

      <div class="formBox">
        <label for="">Meddelande</label><br />
        <textarea class="formField" name="message" id="" cols="30" rows="10"><?php echo isset($_POST['message']) ? $message : '' ?></textarea><br />
        <button type="submit" name="submit">Skicka</button>
      </div>
      <div id="errorMsg">
        <?php echo "<p>$msg</p>" ?>
      </div>
      <script src="../node_modules/js-datepicker/dist/datepicker.min.js"></script>
      <script src="./js/calendar.js"></script>
    </form>
  </div>
</div>


