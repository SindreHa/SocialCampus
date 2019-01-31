<?php
// Bruk Config fil
require_once "config.php";
$result = mysqli_query($link,"SELECT * FROM post ORDER BY id DESC");
    if(mysqli_num_rows($result) > 0)
    {
        while($row=mysqli_fetch_row($result))
        {
            echo $row->tittel;
            echo $row->innhold;
        }
    }
?>