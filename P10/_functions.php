<?php

  function dbconn($db_server, $db_username, $db_password, $db_database) {
    $connect = mysqli_connect($db_server, $db_username, $db_password, $db_database);
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      die();
    }

    return $connect;
  }

?>