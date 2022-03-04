<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Sign Up</title>
</head>
<body>
    <center>
    <div class="start-head">
        <img src="Hima Writes-logos\Hima Writes-logos_transparent.png">
        <div id="msg"></div>
        <h1>Sign Up</h1>
    </div>
    <div class="signup-form">
    <form id="SignupForm" method="POST" action="">
        <div class="form-field"><label for="name">Name</label>
        <input type="text" required name="name"></div>
        <div class="form-field"><label for="email">Email Id</label>
        <input type="email" required name="email"></div>
        <div class="form-field"><label for="username">Username</label>
        <input type="text" name="username" required></div>
        <div class="form-field"><label for="password">Password</label>
        <input type="password" name="password" required></div>
        <button type="submit">Sign Up</button><br>
        <p>Already have an account? <a href="login.html">Login</a></p>
    </form>
</div>
    
    <?php
        if (empty($_POST)){
            exit;
        }
        $servername = "localhost:3307";
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
    </center>
</body>
</html>