
<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'applikasjon');
 
/* Connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$q = "SELECT * FROM post ORDER BY id DESC LIMIT 3";
$result = mysqli_query($link, $q);

if ( false===$result ) {
    printf("error: %s\n", mysqli_error($link));
  }
  else {
    echo 'done.';
  }
    if(mysqli_num_rows($result) > 0)
    {
        while($row=mysqli_fetch_row($result))
        {
           // echo $row->tittel
            echo $row->innhold; 


        }
    }
?>