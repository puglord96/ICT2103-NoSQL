<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>School Information Website</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top" id="nav">

       
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="posting.php">Posting</a></li>
                <li><a href="feedback.php">Feedback</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
             
                    <?php 
                    if(isset($_SESSION["name"])){
                        echo "<span class='navbar-text'>Welcome Back, ".$_SESSION["name"]."</span> <li><a href='logout.php'>Log Out</a></li>'";
                       
                            
               
                            
                            
                        
                    }
                    else{
                        echo"'<li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle'  id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                          <span class='glyphicon glyphicon-pencil'></span> Sign-up
                        </a>
                        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
 
                          <a class='dropdown-item' href='register_student.php'>Student Sign Up</a>
                          <div class='dropdown-divider'></div>
                          <a class='dropdown-item' href='register_guard.php'>Parent/Guardian Sign-Up</a>
                        </div>
                      </li>
      
               
                <li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                        
                   
                     
                }
                ?>
            </ul>
           
       
        </nav>