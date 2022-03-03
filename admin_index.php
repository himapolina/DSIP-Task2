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
    
    <div class="head">
    <div id="welcome-msg">
        Welcome to Admin Dashboard!
    </div>
    <div >
        <a href="logout.php">Logout</a>
    </div>
    </div>
    <div> 
        <h2>Write a new entry! </h2><br>
    </div>
    <form action="" method="POST" name="entryForm">
        <label for="title" id="title">Title</label>
        <input type="text" name="title" required><br>
        <textarea name="entry" id="entry" placeholder="Type your entry here..."></textarea><br>
        <button type="submit">Submit</button>
    </form>
    <div class="blog-container">
        <div class="blog-tile">
            <h2 class="title"></h2>
            <p class="time"></p>
            <p class="blog-start"></p>
        </div>
    </div>
    <!-- displaying blogs-->
    <h3 id="heading"> Blog Entries</h3>
    <div class="blog-container">
        
    
    <?php require_once('config.php') ?>

    <?php
        $conn = mysqli_connect("localhost:3307", "root", "", "blogdb");
        $columns = ['entry_title', 'entry','entry_time'];
        $columnName = implode(", ", $columns);
        $query = "SELECT * FROM entries ORDER BY entry_id DESC";
        $result = $conn->query($query) or die($conn->error);
        while($row = $result->fetch_assoc()) {
        //echo"<script src='scripts.js'></script>";
        echo "<link rel='stylesheet' href='styles.css'>";
        echo "<button class='entry_boxes' style='width: 90%; display: flexbox;'>"  . $row["entry_title"] . "&nbsp;" . "&nbsp;" . $row["entry_date"] . "<br>" . substr($row["entry"],0,10);
        echo "<div class ='box'><div class='entry-content'>
        <span class='close'>&times;</span>
        <p>" .$row["entry"] . "</p>
        </div></div></button><br><br>";
        
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
            echo"<script> alert('Entry Recorded Successfully!');</script>";
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    ?>
    
</body>
</html>