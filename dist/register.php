<?php require_once 'inc/header.html' ?>
<?php require 'config/db.php'?>
<?php registerUser() ?>

<div class="gridContact">
    <div id="box1Contact">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="formBox">
                <label>Förnamn</label><br>
                <input class="formField" type="text" name="firstName">
            </div>

            <div class="formBox">
                <label>Efternamn</label><br>
                <input class="formField" type="text" name="lastName">
            </div>

            <div class="formBox">
                <label>Email</label><br>
                <input class="formField" type="text" name="email">
            </div>

            <div class="formBox">
                <label>Användarnamn</label><br>
                <input class="formField" type="text" name="userName">
            </div>

            <div class="formBox">
                <label>Lösenord</label><br>
                <input class="formField" type="password" name="passW">
            </div>

            <div class="formBox">
                <label>Bekräfta lösenord</label><br>
                <input class="formField" type="password" name="confirmPassW">
                <button class="formBtn" type="submit" name="submit">Skicka</button>
            </div>
        </form>
    </div>
</div>


<?php require 'inc/footer.html' ?>