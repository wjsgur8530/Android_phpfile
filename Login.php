<?php
    $con = mysqli_connect("localhost", "root", "jj9672@@", "hyuk");
    mysqli_query($con,'SET NAMES utf8');
 
    $UserPwd = $_POST["UserPwd"];
    $UserName = $_POST["UserName"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM usertest WHERE UserPwd = ? AND UserName = ?");
    mysqli_stmt_bind_param($statement, "ss", $UserName, $UserPwd);
    mysqli_stmt_execute($statement);
 
 
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $UserEmail, $UserPwd, $UserName);
 
    $response = array();
    $response["success"] = true;
 
    while(mysqli_stmt_fetch($statement)) {
        $response["success"] = true;
        $response["UserEmail"] = $UserEmail;
        $response["UserPwd"] = $UserPwd;
        $response["UserName"] = $UserName;      
    }
 
    echo json_encode($response);
?>