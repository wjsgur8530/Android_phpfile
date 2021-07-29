<?php
    $con = mysqli_connect('localhost', 'root', 'jj9672@@', 'hyuk');
    mysqli_query($con, 'SET NAMES utf8'); 

    $UserEmail = $_POST["UserEmail"];

    $statement = mysqli_prepare($con, "SELECT UserEmail FROM usertest WHERE UserEmail = ?");

    mysqli_stmt_bind_param($statement, "s", $UserEmail);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $UserEmail);

    $response = array();
    $response["success"] = true;

    while(mysqli_stmt_fetch($statement)){
      $response["success"] = false;
      $response["UserEmail"] = $UserEmail;
    }

    echo json_encode($response);
?>
