<footer>
	<div class="footer-shortcut-container">
	<div class="footer-shortcut">
      	<h3>Snareveier</h3>
        <p><a href="404.php">Mine grupper</a></p>
        <p><a href="profil.php">Mine profilinstillinger</a></p>
        <p><a href="404.php">Labore et dolore</a></p>
        <p><a href="404.php">Lorem ipsum</a></p>
	</div>

	<div class="footer-shortcut">
      	<h3>Informasjon</h3>
        <p><a href="omoss.php">Om oss</a></p>
        <p><a href="404.php">Kontakt oss</a></p>
        <p><a href="404.php">Finn oss</a></p>
        <p><a href="404.php">Ofte stilte spørsmål</a></p>
	</div>

	<div class="footer-shortcut">
      	<h3>Støtte</h3>
        <p><a href="404.php">Kontakt informasjon</a></p>
        <p><a href="404.php">Dolor sit amet</a></p>
        <p><a href="404.php">Consectetur adipisicing elit</a></p>
        <p><a href="404.php">Labore et dolore</a></p>
        <p><a href="404.php">Lorem ipsum</a></p>
	</div>

	<div class="footer-shortcut">
      	<h3>Sosiale medier</h3>
      	<a href="404.php"><img src="https://en.facebookbrand.com/wp-content/uploads/2016/05/flogo_rgb_hex-brc-site-250.png">Facebook</a>
      	<a href="404.php"><img src="https://seeklogo.com/images/T/twitter-2012-negative-logo-5C6C1F1521-seeklogo.com.png">Twitter</a>
      	<a href="404.php"><img src="https://i.kinja-img.com/gawker-media/image/upload/s--OPwjwQZd--/c_scale,f_auto,fl_progressive,q_80,w_800/vsbj7xu992tmklw7hbjj.jpg">Snapchat</a>
	</div>
	</div>

	<div class="footer-info">
    <div class="footer-copy">
      <p>Gruppe 7 &copy; <?php echo date("Y");?></p>
      <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) 
      {?>
      <p><a href="../PHP/logout.php"><i class="fas fa-sign-out-alt"></i>Logg ut</a></p>
      <?php } 
      else {?> 
      <p><a href="../HTML/login.php"><i class="fas fa-sign-in-alt"></i>Logg inn</a></p> <?php 
      }?>
    </div>

    <div class="footer-lang">
            <a href="javascript:TooltipMessage('Norsk er allerde valgt språk');">
              <img src="../Pictures/norwegian.svg"/>
            </a>
            <a href="javascript:TooltipMessage('Engelsk oversettelse under arbeid');">
              <img src="../Pictures/english.svg"/>
            </a>
    </div>
	</div>

</footer>

<div class="toTop">
  <i class="fas fa-arrow-up"></i>
</div>

<div class="tooltip" id="notification-box">
  <a href="#/"><i class="fas fa-times"></i></a>
  <i class="fas fa-info-circle"></i><p>Lorem ipsum dolor sit, amet</p>
</div>