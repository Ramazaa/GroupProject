<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        echo
        "<script> alert('Wrong Password'); </script>";
        if($password == $row['password']){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        }
        else{
            echo
            "<script> alert('Wrong Password'); </script>";
        }
    }
    else{
        echo
        "<script> alert('User Not Registered'); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopCar.kz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section style="background-image: url(img/3.jpg);
    overflow: hidden;">
        <input type="checkbox" id="check" style="display:none;">
        <header>
            <h2><a href="#" class=" logo">Logo</a></h2>
            <div class="navbar" style="margin-left:7%">
                <a href="home.php">Home</a>
                <a href="NewCars.html">New Cars</a>
                <a href="AutoNews.html">AutoNews</a>
                <a href="AutoCredit.html">Auto credit</a>
                <a href="SELL.html">Sell u car</a>
                <a href="registration.php">Register</a>
                <a href="login.php">Login</a>
            </div>
            <label for="check">
                <div class="container">
                    <img src="img/car.png" alt="car" style="height:70px;width:70px;border-radius:25%;" class="list">
                    <img src="img/close.png" alt="close" style="height:70px;width:70px;border-radius:25%;" class="=close">
                </div>
            </label>
        </header>
        <div class="form-holder">
            <h2>Login</h2>
            <form class="" action="" method="post" autocomplete="off">
            <label for="usernameemail">Username or Email : </label>
            <input type="text" name="usernameemail" id = "usernameemail" required value=""> <br>
            <label for="password">Password : </label>
            <input type="password" name="password" id = "password" required value=""> <br>
            <button type="submit" name="submit" class="submit-btn">Login</button>
            </form>
            <br>
            <button class="submit-btn"><a href="registration.php" style="color:white;margin-top:1px;">REGISTER</a></button>
        </div>
        <footer class="footer"> 
        <div class="containerr"> 
            <div class="row"> 
                <div class="footer-col"> 
                    <h4>About us</h4> 
                    <ul> 
                        <li><a href="">The history of IKEA</a></li> 
                        <li><a href="">The IKEA way of retail</a></li> 
                        <li><a href="">Year in review</a></li>  
                    </ul> 
                </div> 
                <div class="footer-col"> 
                    <h4>Life at home</h4> 
                    <ul> 
                        <li><a href="">Our curiosity box</a></li> 
                        <li><a href="">How we work</a></li> 
                        <li><a href="">Co-creation</a></li> 
                    </ul> 
                </div> 
                <div class="footer-col"> 
                    <h4>Behind the scenes</h4> 
                    <ul> 
                        <li><a href="">Products and design</a></li> 
                        <li><a href="">Innovation and technology</a></li> 
                        <li><a href="">Our commitments</a></li> 
                    </ul> 
                </div> 
                <div class="footer-col"> 
                    <h4>Sustainability</h4> 
                    <ul> 
                        <li><a href="">Healthy and sustainable living</a></li> 
                        <li><a href="">Recycled polyester</a></li> 
                        <li><a href="">Transforming into a circular business</a></li> 
                    </ul> 
                </div>  
            </div> 
        </div> 
    </footer>
    </body>
</html>