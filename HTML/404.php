<!DOCTYPE html>
<html lang="no">
<head>
	<title>Om Oss</title>
	<?php include '../PHP/head.php';?>
</head>
<body>
<div class="wrapper">
        
    <?php session_start(); include '../PHP/nav.php';?>

    <section class="error-wrapper">
        <img src="../Pictures/404.png">
        <div>
            <h1>Woopsie daisy!</h1>
            <p>Siden du leter etter finnes ikke</p>
            <p>Error 404</p>
            <input type="button" class="btn btn-wrapper" value="Gå Tilbake" onclick="history.back()">
        </div>
    </section>

</div>

<?php include '../PHP/footer.php';?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../JS/js.js"></script>
</body>
</html>