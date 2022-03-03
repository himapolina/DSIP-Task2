<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
</head>
<body>
    
    <div id="welcome-msg">
        Welcome <span id="user"><?php $login_name = $_GET['login_name']; echo "$login_name";?>!</span>
    </div>
    <div>
        <a href="login.html">Logout</a>
    </div>
    <div class="blog-container">
        <table class="table">
            <thead><tr>
                <th>Title</th>
                <th>Entry</th>
                <th>Time</th>
            </thead>
        <tbody>
    
    <?php require_once('config.php') ?>

    <?php
        $conn = mysqli_connect("localhost:3307", "root", "", "blogdb");
        $columns = ['entry_title', 'entry','entry_time'];
        $columnName = implode(", ", $columns);
        $query = "SELECT * FROM entries ORDER BY entry_id DESC";
        $result = $conn->query($query) or die($conn->error);
        while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["entry_title"]. "</td><td>" . substr($row["entry"],0,10 ). "</td><td>" . $row["entry_date"] . "</td></tr>";
        }
        echo "</table>";
        ?>
        </tbody>
        </table>
        <div class="blog-tile">
            <h2 class="title"></h2>
            <p class="time"></p>
            <p class="blog-start"></p>
        </div>
    </div>
    
</body>
</html>