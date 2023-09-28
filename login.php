<?php // ;) ?>
<?php
    include 'conn.php';
    
    if(isset($_POST['btnlogin'])){
        //line 7-8 : collecting the username and password entered by the user
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        //line 11-12 : connecting to the database and requesting
        $query = "SELECT * FROM `2` WHERE username='$username'";
        $res = mysqli_query($conn, $query);
    
        if(mysqli_num_rows($res) == 1){ //if system find 1 value that user is inputting
            $row = mysqli_fetch_assoc($res); //take and store the value that mysqli_num_rows found
            $_SESSION['id'] = $row['id']; //create id session

            if(password_verify($password, $row['password'])){ //comparing the password user input and the password on database
                header("location: index.php");
            } else{
                header("location: login.php?error=Password is incorrect");
            }
        } else{
            header("location: login.php?error=Username is incorrect");
        }    
        
    }
?>
<html>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Just+Another+Hand&family=Poppins:wght@700&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>OpenDonation - Login</title>
    </head>
    <body>
        <form action="#" method="post">
            <div id="header">
                <img src="banner.png" alt="" class="image-banner" id="banner-one">
                <img src="banner2.png" alt="" class="image-banner" id="banner-two">
                <h1>LOG IN</h1>
            </div>
            <?php if(isset($_GET['error'])){ ?><?php //if the error from line 21 and 24 is triggered, it will shown the error message ?>
                <p class='error-alert' id='error-message'><?php echo $_GET['error']?></p>
            <?php } ?>
            <div id="content">
                <input type="text" name="username" id="user" placeholder="Username" required>
                <input type="text" name="password" id="pass" placeholder="Password" required>
                <input type="submit" value="LOGIN" name="btnlogin">
            </div>
        </form>
    </body>
</html>