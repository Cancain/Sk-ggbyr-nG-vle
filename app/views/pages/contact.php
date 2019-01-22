<?php require APPROOT . '/views/inc/header.php'?>
<div class="wrapper">
  <div class="contactBg">
    <div class="contactBox">
      <h1>Kontakta oss!</h1>
      <p class="gray">Har du några frågor eller funderingar som vi kan besvara?</p>
      <p class="gray bgsc">Tveka inte att skicka oss ett mail via formuläret till höger, så återkopplar vi så snart som
        möjligt.</p>
      <p class="gray smsc">Tveka inte att skicka oss ett mail via formuläret nedan, så återkopplar vi så snart som
        möjligt.</p>
      <div class="icon"><i class="fas fa-at fa-5x"></i></div>
    </div>
    <div>


      <div class="gridContact">
        <div id="box1Contact">
          <form action="" autocomplete="off" method="POST">
            <div class="formBox">
              <label for="">Namn</label><br />
              <input class="formField" type="text" name="name" id="" value="<?php echo $data['name']?>" />
            </div>

            <div class="formBox">
              <label for="">Email</label><br />
              <input class="formField" type="text" name="email" id="" value="<?php echo $data['email']?>" />
            </div>

            <div class="formBox">
              <label for="">Meddelande</label><br />
              <textarea class="formMsg" name="message" id="" cols="30" rows="8"><?php echo $data['message']?></textarea><br />
              <button class="formBtn" type="submit" name="submit">Skicka</button>
            </div>
            <div class="errorMsg">
              <?php if(!empty($data['errMsg'])): ?>
              <span class="warning">
                <?php echo $data['errMsg'] ?>
              </span>
              <?php endif ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'?>