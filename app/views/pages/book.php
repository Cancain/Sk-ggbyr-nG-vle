<?php require APPROOT . '/views/inc/header.php'?>
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
        value="<?php echo $data['name']?>" />
      </div>

      <div class="formBox">
        <label for="">Datum</label><br />
        <input class="formField" type="text" name="date" id="date" 
        value="<?php echo $data['date']?>" />
      </div>

      <div class="formBox">
        <label for="">Email</label><br />
        <input class="formField" type="email" name="email" id="" 
        value="<?php echo $data['email']?>"/>
      </div>

      <div class="formBox">
        <label for="">Meddelande</label><br />
        <textarea class="formMsg" name="message" id="" cols="30" rows="8"><?php echo $data['message']?></textarea><br />
        <button class="formBtn" type="submit" name="submit">Skicka</button>
      </div>
      <div class="errorMsg">
      <?php if(!empty($data['errMsg'])) : ?>
      <span class="warning"><?php echo $data['errMsg'] ?></span>      
      <?php endif; ?>
      </div>
      <!-- <script src="../node_modules/js-datepicker/dist/datepicker.min.js"></script> -->
      <!-- <script src="./js/calendar.js"></script> -->
    </form>
  </div>
</div>
  </div>
</div>


</div>

<?php require APPROOT . '/views/inc/footer.php'?>


