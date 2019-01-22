<?php require APPROOT . '/views/inc/header.php'?>
<form action="" method="post">
    <div class="formBox">
        <label for="user">Användarnamn</label><br>
        <input type="text" name="user">        
    </div>
    <div class="formBox">
        <label for="password">Lösenord</label><br>
        <input type="password" name="password">
    </div>
    <input type="submit" value="Logga in">
    <a href="register.php">Har du inget konto? Registrera här</a><br>
    <?php if(!empty($data['userErr'])):?>
        <span class="warning"><?php echo $data['userErr'] ?></span>
    <?php endif;?>
</form>


<?php require APPROOT . '/views/inc/footer.php'?>