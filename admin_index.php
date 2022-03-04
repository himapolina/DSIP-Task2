<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='scripts.js'></script>
    <lin rel="stylesheet" href='styles.css'>
    <title>Admin Page</title>
</head>
<body>
    
    <div class="navbar">    
        <div class="logo">
            <img src= "Hima Writes-logos\Hima Writes-logos_transparent.png" style="width: 150px;" class="logo">
        </div>
        <div class="welcome-msg">
            <p id="welcome-msg">
            Welcome <span id="user">Admin</span>!
        </p>
        </div>
        <div class="logout">
        <a href="logout.php">Logout</a>
        </div>
    </div>
    <center>
    <div> 
        <h2 id="write-entry-heading">Write a new entry! </h2>
    </div>
    <form action="" method="POST" name="entryForm">
        <label for="title" id="title" class="title">Title</label>
        <input type="text" name="title" required><br><br>
        <textarea name="entry" id="entry" placeholder="Type your entry here..." rows="5" cols="30"></textarea><br>
        <br><button type="submit" class="submit-button">Submit</button>
    </form>
</center>
    
    <!-- displaying blogs-->
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
        "</div></div> ";
        
    }
    ?>
    
    </div>
    
    <!--php stuff -->
    <?php require_once('config.php') ?>
    <?php
        if (empty($_POST)){
            exit;
        }
        $servername = "localhost:3307";
        $username = "root";
        $password = "";
        $db = "blogdb";
        $conn = mysqli_connect($servername, $username, $password, $db);
        
        if (!$conn) {
            die("Connection failed: " . $conn->connect_error);
        }
        $entry = $_POST['entry'];
        $title = $_POST['title'];
        //$time = date("h:i:sa") + " " + date("d-m-Y");
        $sql = "INSERT INTO ENTRIES (entry_title, entry) VALUES ('$title', '$entry')";
        
        if($conn->query($sql)===TRUE){
            header("Location: admin_index.php");
            
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    ?>
    
</body>
</html>