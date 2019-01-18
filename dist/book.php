<?php require_once 'inc/header.php' ?>
<?php require_once 'inc/bookController.php' ?>
<div class="wrapper">

<div class="contactBg">
  <div class="contactBox">
  <h1>Boka tid!</h1>
<p class="gray bgsc">Använd formuläret till höger för att boka en tid för möte med oss.</p>
<p class="gray smsc">Använd formuläret nedan för att boka en tid för möte med oss.</p>
<p class="gray">Vänligen observera att din tidsbokning är en förfrågan eller förslag på tid.</p>
<p class="gray">Vi återkopplar med bekräftelse så snart vi kan.</p>
<div class="icon"><i class="fas fa-clipboard-list fa-5x"></i></div>
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
        <label for="">Datum</label><br />
        <input class="formField" type="text" name="date" id="date" 
        value="<?php echo isset($_POST['date']) ? $date : '' ?>" />
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
      <script src="../node_modules/js-datepicker/dist/datepicker.min.js"></script>
      <script src="./js/calendar.js"></script>
    </form>
  </div>
</div>
  </div>
</div>


</div>

<?php require_once 'inc/footer.html' ?>


