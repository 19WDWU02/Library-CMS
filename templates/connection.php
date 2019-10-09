<?php
    date_default_timezone_set('Pacific/Auckland');
    // $dbc = mysqli_connect(host, username, password, table);
    $dbc = mysqli_connect(getenv('DB_HOST'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'), getenv('DB_TABLE'));

    if($dbc){
        // var_dump('we are connected');
        $dbc->set_charset('utf8mb4');
    } else {
        die('ERROR, connection could not be made to the database, please check your enviroment variables in your .env file. There is an example provided if you do not have one.');
    }

 ?>
