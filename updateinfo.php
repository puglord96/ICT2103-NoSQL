
<?php
        include "header.inc.php";
        ?>

   <body>
       <br><br><br>
    <h1 class="text-center">Update personal information</h1>
    <div class="container">
    <form name="myForm" action="updateinfo.php"  novalidate onsubmit="return validateForm()" method="post">
      


   <?php     
    echo "<h3>Student Information </h3>";
    echo "Student Name: ". $_SESSION["name"] . "<br>";
    echo "Student NRIC: ". $_SESSION["nric"] . "<br>";
    echo "Current email: ".$_SESSION["email"]."<br>"; 
    ?>
        
    <h3>Update your information here </h3>    
    <div class="form-group">
    <label for="updatemail">Update Email:</label>
    <input type="text" class="form-control" id="updatemail" 
           placeholder= "Please enter new email" name="updatemail">
    </div>
    
    <div class="form-group">
    <label for="updatepw">Update Password:</label>
    <input type="text" class="form-control" id="updatepw" 
           placeholder="Please enter new password"name="updatepw">
    </div>
            
    <button type="submit" name="updateinfobutton" class="btn btn-default">Update</button>
    </form>
    </body>
<?php
        include "footer.inc.php";
        ?>

</html>

<?php


        
if (isset($_POST["updatemail"]) && (isset($_POST["updatepw"])) && (isset($_POST["updateinfobutton"])) && ((!empty($_POST["updatemail"])) || (!empty($_POST["updatepw"]))) )
{

    $updatemail = $_POST["updatemail"];
    $updatepw = $_POST["updatepw"];
    $updateinfobutton = $_POST["updateinfobutton"];
    updateEmailPw();

    
    
}
elseif((empty($_POST["updatemail"])) || (empty($_POST["updatepw"]))){
    echo "please enter either email or password";
}
else
{
    
    echo"Remember to enter email or password in order to update";
}

    
function updateEmailPw(){
        
    global $updatemail,$updatepw,$updateinfobutton, $errorMsg, $success;
    
        $manager = new MongoDB\Driver\Manager(
    'mongodb+srv://kinseong:sceptile101@cluster.dqjim.mongodb.net/ICT2103?retryWrites=true&w=majority');
    
    $command = new MongoDB\Driver\Command(['ping' => 1]);

try {
    $cursor = $manager->executeCommand('admin', $command);
} catch(MongoDB\Driver\Exception $e) {
    echo $e->getMessage(), "\n";
    exit;
}

     // Check connection

        
     if (isset($_POST["updatemail"]) && (isset($_POST["updatepw"])))
    {
     unset($_SESSION['email']); 
     $_SESSION['email'] = $updatemail;
//    unset($_SESSION["student_email"]);
     
     $bulk = new MongoDB\Driver\BulkWrite;
$bulk->update(
    ['NRIC' => $_SESSION["nric"]],
    ['$set' => ['Email' => $updatemail , 'Password' =>$updatepw]],
    ['multi' => false, 'upsert' => false]
);

$manager->executeBulkWrite('ICT2103.user_info', $bulk);

    
   
   
    

    if ($manager) {
        
        
          //echo '<script> window.location.reload(); </script>';
        echo "Password and Email has been updated";

        
    }
//        }
    else{
        echo"Please try again";
    }

        
    }

}
    ?>