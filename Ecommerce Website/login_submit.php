<?php
    require "./includes/common.php";
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    

    $query = "SELECT id , email FROM users WHERE email = '$email' AND password = '$password'";
    $query_result = mysqli_query($conn, $query);
    $num_rows=mysqli_num_rows($query_result);

    if($num_rows === 0){
        echo "User account does not exists.";
    }else{
        $row = mysqli_fetch_array($query_result);
        $_SESSION["email_id"] = $email;
        $_SESSION["id"] = $row["id"];

        // redirect to products page
        header("location: products.php");
    }
?>
