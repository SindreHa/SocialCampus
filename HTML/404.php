<!DOCTYPE html>
<html lang="no">
<head>
	<title>Om Oss</title>
	<?php include '../PHP/head.php';?>
</head>
<body style="margin: 0">
<div class="error wrapper">
        

    <section class="error-wrapper">
            <h1>Woopsie daisy!</h1>
        <img src="../Pictures/404.png">
        <div>
            <p>Siden du leter etter finnes ikke!</p>
            <input type="button" class="btn btn-wrapper" value="Flykt hjem" onclick="window.location.href='index.php'">
            <input type="button" class="btn btn-wrapper" value="Fortsett ekspedisjonen på forrige side" onclick="history.back()">
        </div>
    </section>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../JS/js.js"></script>
</body>
</html>