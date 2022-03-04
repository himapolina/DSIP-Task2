<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <script src='scripts.js'></script>
    <link rel="stylesheet" href='styles.css'>
</head>
<body>
    <style>
        body{
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    </style>

    <div class="navbar">    
    <div class="logo">
        <img src= "Hima Writes-logos\Hima Writes-logos_transparent.png" style="width: 150px;" class="logo">
    </div>
    <div class="welcome-msg">
        <p id="welcome-msg">
        Welcome <span id="user"><?php $login_name = $_GET['login_name']; echo "$login_name";?></span>!
    </p>
    </div>
    <div class="logout">
    <a href="logout.php">Logout</a>
    </div>
    </div>

    <center>
    <h2 id="heading"> Blog Entries</h2>
    </center>
    <div class="blog-container">
        
    
    <?php require_once('config.php') ?>

    <?php
        $conn = mysqli_connect("localhost:3307", "root", "", "blogdb");
        $columns = ['entry_title', 'entry','entry_time'];
        $columnName = implode(", ", $columns);
        $query = "SELECT * FROM entries ORDER BY entry_id DESC";
        $result = $conn->query($query) or die($conn->error);
        while($row = $result->fetch_assoc()) {
        echo "<link rel='stylesheet' href='styles.css'>";
        echo "<div class='entry_boxes' ><div class='flex_box'><div class='title'>"  . $row["entry_title"] . 
        "</div><div class='date'>" . $row["entry_date"] . 
        "</div></div><div class='entry'>" . $row["entry"] .
        "</div></div>";
        
    }
        ?>
    
    </div>
    
    <footer>
        <div class="contact">
            <div>
                <p>Contact Author</p>
            </div>
            <div>
                <a href=""><img src="Hima Writes-logos\email logo.png"></a>
            </div>
            <div>
                <a href=""><img src = "Hima Writes-logos\linkedin logo black.png" style="width:20%;"></a>
            </div>
            </div>
    </footer>

</body>
</html>