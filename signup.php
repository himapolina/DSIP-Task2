<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <form id="SignupForm" method="POST" action="">
        <label for="name">Name</label>
        <input type="text" required name="name"><br>
        <label for="email">Email Id</label>
        <input type="email" required name="email"><br>
        <label for="username">Username</label>
        <input type="text" name="username" required><br>
        <label for="password">Password</label>
        <input type="password" name="password" required><br>
        <button type="submit">Sign Up</button><br>
        <div name="msg" id="msg" class="msg"></div>
        <p>Already have an account? <a href="login.html">Login</a></p>
    </form>
    <?php
        if (empty($_POST)){
            exit;
        }
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "blogdb";
        $conn = new mysqli($servername, $username, $password, $db);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        else{
            $name = $_POST["name"];
            $email = $_POST["email"];
            $username = $_POST["username"];
            $pass = $_POST["password"];
            $sql = "INSERT INTO USERINFO VALUES ('$name', '$email', '$username', '".md5($pass)."')";
            if($conn->query($sql)===TRUE){
                echo '<script type="text/javascript">
                function formSubmit(){
                document.getElementById("msg").innerHTML = "Account Created Successfully! <br>"; 
                }
                formSubmit();
                </script>';
                
            }else{
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        $conn->close();
?>
</body>
</html>