<?php

session_start();

if($_POST){
    $email = $_POST["email"];
    $password = $_POST["password"];


    $get_databes_file = file_get_contents('./database.json');
    $databes = json_decode(json: $get_databes_file, associative: true);


    foreach ($databes['users'] as $user){
        if($user['email'] === $email && $user['password'] === $password){
            $_SESSION['user'] = $user;
            header('Location: dashbord.php');
            exit;
        }
    }
}

echo "Invalid Email or Password";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css"/>
   <link rel="stylesheet" href="style.css"/>
  </head>
<body>
    <header>
    
    <img src="./premium.png" width="100" height="100" alt=""/>
    <nav>
       <ul>
            
        <li>
            <a href="./index.php">Home</a>
        </li>
        <?php
        if(isset($_SESSION["user"])){
            echo'
        <li>
            <a href="./dashboard.php">Dashboard</a>
        </li>
        
            
       <li>
            <a href="./transfar.php">Transfar</a>
            </li>';
        } else{
           echo' <li>
            <a href="./login.php">Login</a>
        </li>
        <li>
            <a href="./signup.php">Sign Up</a>
        </li>';
        }
        ?>
    </ul>
    </nav>
    </header>

    <main>
        <h1>Welcome to DCH Simple Bank</h1>
        <form method="post">
        <label>Email</label>
        <input type="email" name="email"/>
        <label>Password</label>
        <input type="password" name="password"/>
        <button>Submit</button>
        </form>
    </main>

    <footer>
        
    </footer>
</body>
   
</html>