<?php 
    $link = "login.php";
    include "conn.php";

    function disablespecialchara($username){ //filter username so it can only contains alphabet
        
        if(preg_match('/^[a-zA-Z0-9]+$/i', $username)){
            return true;
        }else{
            return false;
        }
    }

    if(isset($_POST['btnsignup'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $passwordhash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO `2` (username,password) VALUES('$username', '$passwordhash')";

        if (disablespecialchara($username)){
            if($conn->query($query) == true){
                header("Location: login.php");
                mysqli_close();
            }else{
                echo "something wrong". $conn->error;
            }

        }else{
            header("Location: signup.php?error=somethingwrong");
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
        <title>OpenDonation - Sign Up</title>
    </head>
    <body>
        <form action="#" method="post">
            <div id="header">
                <img src="/project/Login System/images/banner.png" alt="" class="image-banner" id="banner-one">
                <img src="/project/Login System/images/banner2.png" alt="" class="image-banner" id="banner-two">
                <h1>Sign Up</h1>
            </div>
            <?php if(isset($_GET['error'])){ ?>
                <p class="error-alert"> Sorry, username must contain only alphabet and number </p>
            <?php } ?>
            <div id="content">
                <input type="text" name="username" id="user" placeholder="Username" required>
                <input type="text" name="password" id="pass" placeholder="Password" required>
                <input type="submit" value="Sign Up" name="btnsignup">
            </div>
            <p class="sign">Already have an account?<a href="<?php echo $link; ?>" class="sign">Login here</a></p>
        </form>
    </body>
</html>