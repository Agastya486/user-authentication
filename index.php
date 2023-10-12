<?php 
session_start();
include "conn.php";

//checking if users already login
if(!isset($_SESSION['id'])){
    header("location: login.php");
    exit;
}

if(isset($_POST['btnlogout'])){
    header("location: login.php");
    session_destroy();
}

if(isset($_POST['btn-delete-yes'])){
    $id = $_SESSION['id'];
    $query = "DELETE FROM `2` WHERE id = $id";

    if(mysqli_query($conn, $query)){
        header("location: login.php");
    }else{
        echo "something wrong";
    }
}
?>
<html>
    <head>
        <link rel="stylesheet" href="style2.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Just+Another+Hand&family=Poppins:wght@700&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="index.js"></script>
    </head>
    <body>
        <form action="" method="post">
            <div class="content">
                <p id="hei-user">Hello, welcome <?php echo $_SESSION['username'] ?>!</p>
                <button name="btnlogout">Log Out</button>
                <button name="btndeleteacc" onclick="showDelete()">Delete Account</button>
            </div>

            <div id="container" class="hide">
                <h1 id="warning"> Are you sure want to delete this account? <br><span>Warning: You CAN'T restore your account once it's removed</span></h1>
                <button name="btn-delete-yes" class="btn-confirmation">Yes</button>
                <button name="btn-delete-no" class="btn-confirmation" onclick="hideDelete()">No</button>
            </div>
        </form>
    </body>
</html>