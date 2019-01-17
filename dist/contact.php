<?php require_once 'inc/header.html' ?>
<!-- <?php require_once 'inc/contactController.php' ?> -->
<div class="wrapper">
<div class="contactBg">
  <div class="contactBox">
<h1>Kontakta oss!</h1>
<p class="gray">Har du några frågor eller funderingar som vi kan besvara?</p>
<p class="gray bgsc">Tveka inte att skicka oss ett mail via formuläret till höger, så återkopplar vi så snart som möjligt.</p>
<p class="gray smsc">Tveka inte att skicka oss ett mail via formuläret nedan, så återkopplar vi så snart som möjligt.</p>
<div class="icon"><i class="fas fa-at fa-5x"></i></div>
  </div>
  <div>


  <div class="gridContact">
  <div id="box1Contact">
  <form action="" autocomplete="off" method="POST">
      <div class="formBox">
        <label for="">Namn</label><br />
        <input class="formField" type="text" name="name" id="" 
        value="<?php echo isset($_POST['name']) ? $name : '' ?>" />
      </div> 

      <div class="formBox">
        <label for="">Email</label><br />
        <input class="formField" type="text" name="email" id="" 
        value="<?php echo isset($_POST['email']) ? $email : '' ?>"/>
      </div>

      <div class="formBox">
        <label for="">Meddelande</label><br />
        <textarea class="formMsg" name="message" id="" cols="30" rows="8"><?php echo isset($_POST['message']) ? $message : '' ?></textarea><br />
        <button class="formBtn" type="submit" name="submit">Skicka</button>
      </div>
      <div class="errorMsg">
        <?php if(!empty($msg)) echo "<span class='warning'>$msg</span>"; ?>
      </div>
    </form>
  </div>
</div>
  </div>
</div>
</div>
<?php require_once 'inc/footer.html' ?>


