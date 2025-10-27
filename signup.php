<?php

session_start();


if($_POST){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $get_datasabes_file = file_get_contents('./database.json');
    $database = json_decode($get_datasabes_file,true);

   $account_number = rand(100000000000, 9999999999999);
   $new_user = [
    'email' => $email,
    'password' => $password,
    'account_number' => $account_number,
    'balance' => 1000000000.00
   ];

   $database['user'][] = $new_user;
   
   $encoded_database = json_encode($database);
   file_put_contents('./database.json', $encoded_database );
   $_SESSION['user'] = $new_user;
   header( 'Location: dashbord.php');
   exit;

}

?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup Page</title>
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
        <h1>Sign Up TO DCH Bank</h1>
        <form method="post">
            <label>Email</label>
        <input type="email" name="email"/>
        <label for="">Password</label>
        <input type="password" name="password"/>
        <button>Submit</button>
        </form>
    </main>

    <footer>
        
    </footer>
</body>
   
</html>