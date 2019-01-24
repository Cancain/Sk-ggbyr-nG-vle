<?php require APPROOT . '/views/inc/header.php'?>
<div class="wrapper">
  <?php flash('loginSuccess'); ?>
      <!-- Top Container -->
      <section class="top-container">
        <header class="showcase">
          <h1>Välkommen till Skäggbyrån i Gävle</h1>
          <p>
            Vi levererar helhetslösningar för moderna hemsidor med stor variation av innehåll, som skräddarsydda filmer, illustrationer, smarta funktioner och effektiv design. Vi klarar det för att vi är en bred webbyrå.
          </p>
          <a href="#" class="btn">Läs Mer</a>
        </header>
        <div class="top-box top-box-a">
          <h4>Här finns vi!</h4>
          <p class="bigger">Gävle</p>
          <a href="" class="btn">Hitta hit!</a>
        </div>
        <div class="top-box top-box-b">
          <h4>Följ oss!</h4>
          <div class="social">
          <ul>
            <li>
            <a href="https://sv-se.facebook.com/skaggbyran/" target="_blank"><i class="fab fa-facebook-square fa-2x"></i></a>
            </li>
            <li>
            <a href="https://www.instagram.com/skaggbyran/?hl=sv" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
            </li>
            <li>
            <a href="https://www.youtube.com/channel/UCZIEICe8S2xMw5l5rDf5X3A/featured" target="_blank"><i class="fab fa-youtube fa-2x"></i></a>
            </li>
          </ul>
        </div>  
        <div class="socialSm">
        <a href="https://sv-se.facebook.com/skaggbyran/" target="_blank"><i class="fab fa-facebook-square fa-3x"></i></a>
        <a href="https://www.instagram.com/skaggbyran/?hl=sv" target="_blank"><i class="fab fa-instagram fa-3x"></i></a>
        <a href="https://www.youtube.com/channel/UCZIEICe8S2xMw5l5rDf5X3A/featured" target="_blank"><i class="fab fa-youtube fa-3x"></i></a>

        </div>
          
        </div>
      </section>

      <!-- Boxes Section  -->
      <section class="boxes">
        <!-- <div class="box">  -->
          <a href="<?php echo URLROOT ?>pages/arbetstraning" class="box"><i class="fas fa-briefcase fa-4x"></i>
          <p class="desc">Arbetsträning</p></a>
        <!-- </div> -->
          <div class="boximg">
        <img src="<?php echo URLROOT ?>img/code1.jpeg" alt="">
          </div>
        <!-- <div class="box"> -->
          <a href="portfolio.php" class="box"><i class="fas fa-archive fa-4x"></i>
          <p class="desc">Projekt</p></a>
        <!-- </div> -->
        <div class="boximg">
          <img src="<?php echo URLROOT ?>img/code2.jpeg" alt="">
            </div>
        <!-- <div class="box"> -->
          <a href="about.php" class="box"><i class="fas fa-info-circle fa-4x"></i>
          <p class="desc">Om oss</p></a>
        <!-- </div> -->
        <div class="boximg">
          <img src="<?php echo URLROOT ?>img/code3.jpg" alt="">
            </div>
        </section>
    

</div>
    <!-- Wrapper Ends -->
<?php require APPROOT . '/views/inc/footer.php'?>
