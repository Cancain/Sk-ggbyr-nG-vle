<?php require APPROOT . '/views/inc/header.php'?>
<h1><?php echo $data->firstName . ' ' . $data->lastName ?></h1>
<p>Användarnamn: <?php echo $data->userName?></p>
<p>Email: <?php echo $data->email ?></p>


<?php require APPROOT . '/views/inc/footer.php'?>