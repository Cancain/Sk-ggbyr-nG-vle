<?php require_once 'inc/header.html' ?>
<?php require 'controllers/users.php'?>
<?php $data = registerUser();


?>

<div class="gridContact">
    <div id="box1Contact">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="formBox">
                <label>Förnamn</label><br>
                <input class="formField" type="text" name="firstName"
                value="<?php echo $data['firstName']?>">
                <span><?php echo $data['firstNameErrMsg'] ?></span>
            </div>

            <div class="formBox">
                <label>Efternamn</label><br>
                <input class="formField" type="text" name="lastName"
                value="<?php echo $data['lastName']?>">
                <span><?php echo $data['lastNameErrMsg'] ?></span>
            </div>

            <div class="formBox">
                <label>Email</label><br>
                <input class="formField" type="email" name="email"
                value="<?php echo $data['email']?>">
                <span><?php echo $data['emailErrMsg'] ?></span>
            </div>

            <div class="formBox">
                <label>Användarnamn</label><br>
                <input class="formField" type="text" name="userName"
                value="<?php echo $data['userName']?>">
                <span><?php echo $data['userNameErrMsg'] ?></span>
            </div>

            <div class="formBox">
                <label>Lösenord</label><br>
                <input class="formField" type="password" name="passW">
                <span class=warning><?php echo $data['passWErrMsg'] ?></span>
            </div>

            <div class="formBox">
                <label>Bekräfta lösenord</label><br>
                <input class="formField" type="password" name="confirmPassW">
                <span class="warning"><?php echo $data['confirmPassWErrMsg'] ?></span> <br>
                <button class="formBtn" type="submit" name="submit">Skicka</button>
            </div>
        </form>
    </div>
</div>


<?php require 'inc/footer.html' ?>