<?php require_once 'inc/header.html' ?>
<!-- <?php require_once 'inc/contactController.php' ?> -->

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
        <textarea class="formField" name="message" id="" cols="30" rows="10"><?php echo isset($_POST['message']) ? $message : '' ?></textarea><br />
        <button class="formBtn" type="submit" name="submit">Skicka</button>
      </div>
      <div id="errorMsg">
        <?php echo "<p>$msg</p>" ?>
      </div>
    </form>
  </div>
</div>
<?php require_once 'inc/footer.html' ?>


