<?php
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $db = "blogdb";
    $conn = mysqli_connect($servername, $username, $password, $db);
    
    if (!$conn) {
        die("Connection failed: " . $conn->connect_error);
    }
    $username = $_POST["username"];
    $pass = $_POST["password"];
    $sql = "SELECT login_name FROM userinfo WHERE username = '$username' and pass ='".md5($pass)."'";
    $result = mysqli_query($conn, $sql);
    $loginname = mysqli_fetch_array($result)['login_name'];
    if($loginname!="admin"){
        echo "<script> alert('Login Successful!'); </script>";
        header('Location: user_index.php?login_name='.$loginname);
    }
    else if($loginname=="admin"){
        echo "<script> alert('Login Successful!'); </script>";
        header('Location: admin_index.php');
    }else{
        echo "<script> alert('You have not signed up!'); </script>";
        header('Location: signup.php');
    }
    
    $conn->close();
?>