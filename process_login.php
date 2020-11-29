
<?php

include 'header.inc.php';


$name = $nric = $pwd = $email =  $errorMsg = "";
$recordCount =0;
$success = true;


if (empty($_POST["nric"]))
{
$errorMsg .= "NRIC is required.<br>";
$success = false;
}
else
{
$nric = sanitize_input($_POST["nric"]);


}



if (empty($_POST["pwd"]))
{
$errorMsg .= "Password is required.<br>";
$success = false;
}
else
{
$pwd = sanitize_input($_POST["pwd"]);

}

userlogin();


if ($success)   
{
    
    echo '<section class="container"><hr>';
    echo "<h1>Login successful!</h1>";
    
    echo "<p>Welcome back, " . $name ."</p>";
    echo ' <a href="index.php" class="btn btn-default" role="button">Return to Home</a></section><hr>';
}
else            
{
    echo '<section class="container"><hr>';
    echo '<h1>Oops!</h1>';
    echo '<h2>The following errors were detected:</h2>';
    echo '<p> Email not found or password doesnt match </p>';
    echo '<a onclick="history.go(-1)" class="btn btn-default" role="button">Return to Log In</a></section><hr>';
}



//Helper function that checks input for malicious or unwanted content.
function sanitize_input($data)
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}


function userlogin()
{
    global $nric,$pwd,$name ,$errorMsg, $success,$recordCount;
    
   $manager = new MongoDB\Driver\Manager(
    'mongodb+srv://kinseong:sceptile101@cluster.dqjim.mongodb.net/ICT2103?retryWrites=true&w=majority');
    
    $command = new MongoDB\Driver\Command(['ping' => 1]);

try {
    $cursor = $manager->executeCommand('admin', $command);
} catch(MongoDB\Driver\Exception $e) {
    echo $e->getMessage(), "\n";
    exit;
}

$filter = [
           'NRIC' => $nric,
           'Password' =>$pwd
        ];
$options = [];

$query = new \MongoDB\Driver\Query($filter, $options);
$rows   = $manager->executeQuery('ICT2103.user_info', $query);



foreach ($rows as $document) {
  //var_dump($document);
  $doc = (array)$document;
  $recordCount++;
  $name = $doc["Name"];
  $nric = $doc["NRIC"];
  $email = $doc["Email"];
  $_SESSION["name"] = $name;
  $_SESSION["nric"] = $nric; //store NRIC to session
  $_SESSION["email"] = $email;
}


if($recordCount == 0){
    $errorMsg = "Email not found or password doesn't match...!";
    $success = false;
}
//$response = $cursor->toArray()[0];

//var_dump($response);


}

include "footer.inc.php";
