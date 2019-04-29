<footer>
	<div class="footer-shortcut-container">
	<div class="footer-shortcut">
      	<h3>Snareveier</h3>
        <p><a href="404.php">Mine grupper</a></p>
        <p><a href="profil.php">Mine profilinstillinger</a></p>
        <p><a href="404.php">Mine venner</a></p>
        <p><a href="404.php">Mine arrangement</a></p>
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
        <p><a href="404.php">Brukskatalog</a></p>
        <p><a href="404.php">Rapporter misbruk av siden</a></p>
        <p><a href="404.php">Stjålen identitet</a></p>
        <p><a href="404.php">Rapporter identitets-løgn</a></p>
	</div>

	<div class="footer-shortcut">
      	<h3>Sosiale medier</h3>
      	<a href="404.php"><img src="../Pictures/Facebook.png" alt="Facebook">Facebook</a>
      	<a href="404.php"><img src="../Pictures/Twitter.png" alt="Twitter">Twitter</a>
      	<a href="404.php"><img src="../Pictures/SNapchat.png" alt="Snapchat">Snapchat</a>
	</div>
	</div>

	<div class="footer-info">
    <div class="footer-copy">
      <p>SocialCampus &copy; <?php echo date("Y");?></p>
      <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) 
      {?>
      <p><a href="../PHP/logout.php"><i class="fas fa-sign-out-alt"></i>Logg ut</a></p>
      <?php } 
      else {?> 
      <p><a href="../HTML/login.php"><i class="fas fa-sign-in-alt"></i>Logg inn</a></p> <?php 
      }?>
    </div>

    <div class="footer-lang">
            <a href="javascript:TooltipMessage('Norsk er allerede valgt språk');">
              <img src="../Pictures/norwegian.svg" alt="Norwegian">
            </a>
            <a href="javascript:TooltipMessage('Engelsk oversettelse under arbeid');">
              <img src="../Pictures/english.svg" alt="English">
            </a>
    </div>
	</div>

</footer>

<div class="toTop">
  <i class="fas fa-arrow-up"></i>
</div>

<div class="tooltip" id="notification-box">
  <a href="#/" id="notification-exitID"><i class="fas fa-times"></i></a>
  <i class="fas fa-info-circle"></i><p id="notification-boxID">Lorem ipsum dolor sit, amet</p>
</div>

<script src="../JS/jQuery.js"></script>
<script src="../JS/scripts.js"></script>