<meta charset="utf-8">
<?php require 'inc/header.html' ?>
<?php require 'config/db.php' ?>
<div class="wrapper">
<?php foreach ($posts as $post) : ?>

 
<section class="content-container">
    <header class="content">
        <h1><?php echo utf8_encode($post->title); ?></h1>
        <?php echo utf8_encode($post->createdAt); ?>
        <p><?php echo utf8_encode($post->body); ?></p>
    </header>
</section>





<?php endforeach; ?>
</div>

<?php require 'inc/footer.html' ?>