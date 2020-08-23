<?php   

// $user = "root";
// $password = "root";
// $db = "locnet_dev";
// $host = "localhost";
// $port = 3306;
// $link = mysqli_init();

// $success = mysqli_real_connect(
//     $link,
//     $host,
//     $user,
//     $password,
//     $db,
//     $port
// );

// if (!$success) {

//         echo "Database Connection Error";

//     }



$serverName = "shareddb1c.hosting.stackcp.net";
    $userName = "locnet_dev_01-3633747e";
    $password = "h2207sak3p";
    $dbName = "locnet_dev_01-3633747e";

    $link = new mysqli($serverName, $userName, $password, $dbName);

 
    if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
    }
    echo "Connected successfully";

    ?>