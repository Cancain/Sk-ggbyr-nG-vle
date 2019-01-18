<?php require_once 'inc/header.php' ?>
<?php require 'controllers/users.php';
$data = logIn();

?>
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
    <span><?php echo $data['userErr'] ?></span>
</form>


<?php require 'inc/footer.html' ?>