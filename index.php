<?php   
    session_start(); 
    include "connection.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do App</title>
    <link rel="stylesheet" href="my-css/styles.css?v=759">
    <link rel="stylesheet" href="my-css/login.css?v=100">
    <script src="my-js/app.js" defer></script>
</head>

<!-- pre load -->
<body onload="myFunction()">
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">

<?php include "navheader.php"; ?>

    <!-- login-form -->
<?php
    if(isset($_POST['signin'])){  
        $email = $_POST['uemail'];
        $password = $_POST['psw'];

        $sql = "SELECT * FROM user WHERE user_email='$email' AND user_password='$password' ";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn, $sql));
        $rows = mysqli_fetch_assoc($result);
        if($rows){
            $_SESSION['id'] = $rows['user_id'];
            $_SESSION['email'] = $rows['user_email'];

            echo "<script language='javascript'>alert ('Sign In Success (≧∇≦)/') </script>";
            echo "<script language='javascript'>window.location='index.php'</script>";
            
            // header("Location: index.php");
        }
        else{
            echo "<script language='javascript'>alert ('Email or Password is incorrect') </script>";
            echo "<script>document.getElementById('id01').style.display='block';</script>";
        }
    }                  
?>



    <div id="id01" class="modal"> 
        <form class="modal-content-login animate" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="img/img_avatar2.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="uname"><b>Email</b></label>
                <input type="email" class="sign-form" placeholder="Enter Email" name="uemail" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" class="sign-form" placeholder="Enter Password" name="psw" required>
                    
                <button type="submit" name="signin" class="btn-login">Login</button>
                <p>Don't have an account? <a href="#" onclick="signUp()">Sign Up</a>.</p>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn btn-cancel">Cancel</button>
            </div>
        </form>
    </div>

    <!-- Sign Up-form -->
    
<?php

    if(isset($_POST['signup'])){    
        $email = $_POST['email-sign'];
        $password = $_POST['psw-sign'];
        $password_confirmation = $_POST['repeat-psw'];
        $check = "";
        $sql = "SELECT * FROM user WHERE user_email = '$email'";
        $result = mysqli_query($conn,$sql);
        foreach($result as $row){
            $check = $row['user_email'];
        }
            if($check!=""){
                echo "<script>alert('This Email has already Sign Up, Please enter other Email')</script>";
                echo "<script>document.getElementById('id02').style.display='block';</script>";
            }

            else if($password==$password_confirmation){

                $sql = "INSERT INTO `user`(`user_email`, `user_password`) 
                VALUES ('$email','$password')";
                $result = mysqli_query($conn, $sql);


                if($result) {
                    echo "<script language='javascript'>alert ('The Sign Up was Success.') </script>";
                    echo "<script>document.getElementById('id01').style.display='block';</script>";
                }
            }
            else{
                echo "<script>alert ('Password do not match!.') </script>";           
            }
    }
?>

    <div id="id02" class="modal"> 
        <form class="modal-content-signup animate" method="POST">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>

            <div class="container">
                <h1 class="register-h1">Sign Up</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>

                <label for="email"><b>Email</b></label>
                <input type="email" class="sign-form" placeholder="Enter Email" name="email-sign" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" class="sign-form" placeholder="Enter Password" name="psw-sign" required>

                <label for="psw"><b>Repeat Password</b></label>
                <input type="password" class="sign-form" placeholder="Repeat Password" name="repeat-psw" required>
                
                <hr>

                <button type="submit" name="signup" class="btn-login" style="margin-top: 8px;">Sign Up</button>

            </div>

            <div class="container signin">
                <p>Already have an account? <a href="#" onclick="signIn()">Sign in</a>.</p>
            </div>
        </form>
    </div>
    
    <!-- to do list -->

    <?php
        if(isset($_POST['submit'])){
            if(@$_SESSION['id']==""){
            echo "<script>alert ('Please Sign in!')</script>";
            echo "<script>document.getElementById('id01').style.display='block';</script>";
            }
            else{
                $user_id= $_SESSION['id'];
                $todo_list = $_POST['ihaveto'];
    
                $sql = "INSERT INTO `todo_list`( `todo_details`, `user_id`, `todo_date`) 
                        VALUES ('$todo_list','$user_id',NOW())";
                $result = mysqli_query($conn, $sql);
                
            }
        }
    ?>    
 
    <div class="container" id="container">
        <h1 class="todo-h1">To Do List : </h1>
            <div class="content">
                <form method="POST">
                <label for="inp">To Do : </label>
                    <input id="inp" type="text" name="ihaveto" placeholder="I have to ?" maxlength="20" required>
                    <input id="btn" type="submit" name="submit" value="Add">
                </form>
            </div>
            
            <div class="to-do">
                <?php if(@$_SESSION['id']!=""){
                        $user_id = $_SESSION['id'];
                        $sql = "SELECT * FROM todo_list WHERE user_id ='$user_id'";
                        $result = mysqli_query($conn, $sql);
                        foreach ($result as $row) {
                ?>
                <div>
                    <li><?=$row['todo_details']?><br><?=$row['todo_date']?></li>
                    <button><a href="delete_item.php?todo_id=<?=$row['todo_id']?>">Remove</a></button>
                </div>
                <?php
                            } 
                        }
                ?>
            </div>

    </div>
</div>
</body>
</html>