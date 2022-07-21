<?php
error_reporting(0);
/**
 * Database mysql
 */
$db_host = "127.0.0.1";
$db_user = "root";
$db_pass = "root";
$db_name = "sqli";
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die("connect error: " . mysqli_connect_error());
}
if (isset($_GET["id"])) {
    $id     = $_GET['id'];
    $sql    = "select * from news where id=$id";
    $result = mysqli_query($conn, $sql);
    $res    = mysqli_fetch_array($result);
} else {
    $res = [];
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CTFHub 技能学习 | MySQL结构</title>
    <link rel="stylesheet" href="static/bootstrap.min.css">
    <script src="static/jquery.min.js"></script>
    <script src="static/popper.min.js"></script>
    <script src="static/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>MySQL结构</h1>
            <form action="" method="GET">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">ID</span>
                    </div>
                    <input type="text" class="form-control" placeholder="输个1试试？" id="id" name="id">
                    <div class="input-group-append">
                        <input type="submit" value="Search" class="btn btn-success">
                    </div>
                </div>
            </form>
            <?php
            if(isset($_GET["id"])){
                echo "<code>".$sql.'</code></br>';
            }
            if($res) {
                echo "ID: ". $res["id"]. "</br>";
                echo "Data: ". $res["data"];
            }
            ?>
        </div>
    </div>
</body>
</html>
