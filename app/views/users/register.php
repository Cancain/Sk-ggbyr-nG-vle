<?php require APPROOT . '/views/inc/header.php'?>
<div class="gridContact">
    <div id="box1Contact">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="formBox">
                <label>Förnamn</label><br>
                <input class="formField" type="text" name="firstName"
                value="<?php echo $data['firstName']?>">
                <?php if(!empty($data['firstNameErr'])): ?>
                    <span class="warning"><?php echo $data['firstNameErr'] ?></span>
                <?php endif;?>
            </div>

            <div class="formBox">
                <label>Efternamn</label><br>
                <input class="formField" type="text" name="lastName"
                value="<?php echo $data['lastName']?>">
                <?php if(!empty($data['lastNameErr'])): ?>
                    <span class="warning"><?php echo $data['lastNameErr'] ?></span>
                <?php endif;?>
            </div>

            <div class="formBox">
                <label>Email</label><br>
                <input class="formField" type="email" name="email"
                value="<?php echo $data['email']?>">
                <?php if(!empty($data['emailErr'])): ?>
                    <span class="warning"><?php echo $data['emailErr'] ?></span>
                <?php endif;?>
            </div>

            <div class="formBox">
                <label>Användarnamn</label><br>
                <input class="formField" type="text" name="userName"
                value="<?php echo $data['userName']?>">
                <?php if(!empty($data['userNameErr'])): ?>
                    <span class="warning"><?php echo $data['userNameErr'] ?></span>
                <?php endif;?>
            </div>

            <div class="formBox">
                <label>Lösenord</label><br>
                <input class="formField" type="password" name="password">
                <?php if(!empty($data['passwordErr'])): ?>
                    <span class="warning"><?php echo $data['passwordErr'] ?></span>
                <?php endif;?>
            </div>

            <div class="formBox">
                <label>Bekräfta lösenord</label><br>
                <input class="formField" type="password" name="confirmPassword">
                <?php if(!empty($data['confirmPasswordErr'])): ?>
                    <span class="warning"><?php echo $data['confirmPasswordErr'] ?></span>
                <?php endif;?><br>
                <button class="formBtn" type="submit" name="submit">Skicka</button>
            </div>
        </form>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'?>