
<?php

include "header.inc.php";



$fname = $dob = $nationality = $nric = $email = $pwd = $cpwd = $cname = $cnric = $relate = $occupy = $add1 = $add2 = $errorMsg = "";
$contact = 0;
$success = true;

if (empty($_POST["fname"]))
{
$errorMsg .= "First name is required.<br>";
$success = false;
}
else
{
$fname = sanitize_input($_POST["fname"]);

}

if (empty($_POST["dob"]))
{
$errorMsg .= "Date of Birth is required.<br>";
$success = false;
}
else
{
$dob = sanitize_input($_POST["dob"]);
// Additional check to make sure e-mail address is well-formed.

}


if (empty($_POST["nationality"]))
{
$errorMsg .= "Nationality is required.<br>";
$success = false;
}
else
{
$nationality = sanitize_input($_POST["nationality"]);
// Additional check to make sure e-mail address is well-formed.

}

if (empty($_POST["nric"]))
{
$errorMsg .= "Your NRIC is required.<br>";
$success = false;
}
else
{
$nric = sanitize_input($_POST["nric"]);
// Additional check to make sure e-mail address is well-formed.

}


if (empty($_POST["email"]))
{
$errorMsg .= "Email is required.<br>";
$success = false;
}
else
{
$email = sanitize_input($_POST["email"]);
// Additional check to make sure e-mail address is well-formed.
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
$errorMsg .= "Invalid email format.";
$success = false;
}
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



if (empty($_POST["cpwd"]))
{
$errorMsg .= "Password is required.<br>";
$success = false;
}
else
{
$cpwd = sanitize_input($_POST["cpwd"]);
// Additional check to make sure e-mail address is well-formed.
if ($cpwd != $pwd)
{
$errorMsg .= "Password Mismatch";
$success = false;
}
}

if (empty($_POST["contact"]))
{
$errorMsg .= "Your contact number is required.<br>";
$success = false;
}
else
{
$contact = sanitize_input($_POST["contact"]);
// Additional check to make sure e-mail address is well-formed.

}

if (empty($_POST["cname"]))
{
$errorMsg .= "Your PSLE aggregate score is required.<br>";
$success = false;
}
else
{
$cname = sanitize_input($_POST["cname"]);
// Additional check to make sure e-mail address is well-formed.

}

if (empty($_POST["cnric"]))
{
$errorMsg .= "Please enter the year of completion for your PSLE.<br>";
$success = false;
}
else
{
$cnric = sanitize_input($_POST["cnric"]);
// Additional check to make sure e-mail address is well-formed.

}

if (empty($_POST["relate"]))
{
$errorMsg .= "Please enter the year of completion for your PSLE.<br>";
$success = false;
}
else
{
$relate = sanitize_input($_POST["relate"]);
// Additional check to make sure e-mail address is well-formed.

}

if (empty($_POST["occupy"]))
{
$errorMsg .= "Please enter the year of completion for your PSLE.<br>";
$success = false;
}
else
{
$occupy = sanitize_input($_POST["occupy"]);
// Additional check to make sure e-mail address is well-formed.

}

if (empty($_POST["add1"]))
{
$errorMsg .= "Please enter the year of completion for your PSLE.<br>";
$success = false;
}
else
{
$add1 = sanitize_input($_POST["add1"]);
// Additional check to make sure e-mail address is well-formed.

}

if (empty($_POST["add2"]))
{
$errorMsg .= "Please enter the year of completion for your PSLE.<br>";
$success = false;
}
else
{
$add2 = sanitize_input($_POST["add2"]);
// Additional check to make sure e-mail address is well-formed.

}





if ($success)   
{
    echo '<section class="container"><hr>';
    echo "<h1>Your registration is successful!</h1>";
    echo "<p>Thank you for signing up.</p>";
    echo '<a href="login.php" class="btn btn-default" role="button">Login</a>  <a href="login.php" class="btn btn-default" role="button">Return to Home</a></section><hr>';
    saveMemberToDB();
}
else            
{

    echo '<section class="container"><hr>';
    echo '<h1>Oops!</h1>';
    echo '<h2>The following errors were detected:</h2>';
    echo '<p>' . $errorMsg . '</p>';
    echo '<a onclick="history.go(-1)" class="btn btn-default" role="button">Return to Sign Up</a></section><hr>';
}



//Helper function that checks input for malicious or unwanted content.
function sanitize_input($data)
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

include "footer.inc.php";


function saveMemberToDB(){
    
    

    global $fname, $dob, $nationality , $nric , $email , $pwd , $cpwd , $cname , $cnric , $add1 , $add2 , $contact , $relate , $occupy, $errorMsg;
    // Create connection
    $manager = new MongoDB\Driver\Manager(
    'mongodb+srv://kinseong:sceptile101@cluster.dqjim.mongodb.net/ICT2103?retryWrites=true&w=majority');
    
    $command = new MongoDB\Driver\Command(['ping' => 1]);

try {
    $cursor = $manager->executeCommand('admin', $command);
} catch(MongoDB\Driver\Exception $e) {
    //echo $e->getMessage(), "\n";
    exit;
}

/* The ping command returns a single result document, so we need to access the
 * first result in the cursor. */
$response = $cursor->toArray()[0];

//var_dump($response);

$bulk = new MongoDB\Driver\BulkWrite;
$bulk->insert([
    'NRIC' => $nric,
    'Name' => $fname,
    'Password'=> $pwd,
    'Contact'=>$contact,
    'Student_name'=> $cname,
    'Student_relationship'=>$relate,
    "NRIC_of_Child"=>$cnric,
    'Occupation'=>$occupy,
    'Address_Line_1'=>$add1,
    'Address_Line_2'=>$add2
    ]);

$manager->executeBulkWrite('ICT2103.school', $bulk);

$filter = [];
$options = [];

$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('ICT2103.school', $query);


 
}