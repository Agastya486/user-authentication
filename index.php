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
?>
<html>
    <head>
        <link rel="stylesheet" href="style2.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Just+Another+Hand&family=Poppins:wght@700&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="" method="post">
            <div class="content">
                <p id="hei-user">Hello, welcome <?php echo $_SESSION['username'] ?>!</p>
                <button name="btnlogout">Log Out</button>
            </div>
        </form>
    </body>
</html>