<meta charset="utf-8">
<?php require APPROOT . '/views/inc/header.php'?>
<div class="wrapper">
<?php foreach ($data as $post) : ?>

 
<section class="content-container">
    <header class="content">
        <h1><?php echo utf8_encode($post->title); ?></h1>
        <?php echo utf8_encode($post->createdAt); ?>
        <p><?php echo utf8_encode($post->body); ?></p>
    </header>
</section>


<?php endforeach; ?>
</div>

<?php require APPROOT . '/views/inc/footer.php'?>