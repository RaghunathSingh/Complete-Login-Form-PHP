<?php
$login=0;
$invalid=0;
// how to encrypt password while storing into a database
    if($_SERVER['REQUEST_METHOD']=='POST'){
        include 'connect.php';
        $username=$_POST['username'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        // $hash=password_hash($password,PASSWORD_DEFAULT);
 
        $sql="Select * from `registration` where username='$username' AND email='$email'";
        $result=mysqli_query($con,$sql);
        if($result){
            $num=mysqli_num_rows($result);
            if($num>0){
                while($row=mysqli_fetch_assoc($result)){
                    if(password_verify($password,$row['password'])){
                        $login=1;
                        session_start();
                        $_SESSION['username']=$username;
                        header('location:home.php');
                    }
                    else{
                        $invalid=1;
                    }
                }
            }
            else{
                $invalid=1;
            }
        }
        }
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
        *{
            margin:0;
            padding:0;
        }
        .con{
            display: flex;
            align-items:center;
            /* background-color:green;
            height:100vh;
            width:   100vw; */
        }
    h2{
        padding-top:1rem ;
        padding-bottom:1rem ;
        text-align: center;
    }
    .container{
        width:350px;
        display: block;
        margin:8px auto ;
        background-color:red;
        border-radius: 10px ;
        height: fit-content;
    }
    .box{
        margin-top:2.4rem;
        margin:2rem 18x;
        padding-left: 2.2rem;
        display: flex;
        flex-direction: column;
    }
    input{
        height:35px;
        border:none;
        border-bottom:2px solid black;
        width:80%;
    }
    a{
        text-decoration:none;
        color:black;
        display:block;
        margin:1rem 0px;
    }
    .in{
        margin-bottom:2rem;
    }
    p{
        display: inline;
    }
    .link{
        margin-left:8px ;
        display: inline;
        text-decoration:none;
    }
    .li{
        margin:10px 0px;
        margin-bottom:1rem;
        padding-bottom:1rem;
        text-align:center;
    }
    .bt{
        font-size:20px;
        padding: 4px;
        /* font-weight:bolder; */
        width: 80%;
        border-radius: 27px;
        border:none;
        color: white;
        display: block;
        background-color: blue;
        margin: 2px auto;
    }
    </style>
</head>
<body>
<?php
        if($login){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successfully Login </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        if($invalid){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Invalid Credentials</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }

    ?>
    <div class="con">.
    <div class="container">
            <h2>Log In</h2>
            <hr>
            <div class="box">
            <form action="login.php" method="post">
            <input type="text" name="email" id="" class="in" placeholder="Enter your Email">
            <input type="text" name="username" id="" class="in" placeholder="Username">
            <input type="password" name="password" id="" placeholder="Password">
            <a href="password-reset.php">Forgot Password?</a>
            </div>
            <button class="bt">LogIn</button>
            </form>
            
            <div class="li">         
                <p>Not a member?</p><a href="sign.php" class="link">SignIn</a>
            </div>
    </div>
    </div>
    <!-- Bootsrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>