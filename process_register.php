
<?php

include "header.inc.php";



$fname = $dob = $nationality = $nric = $email = $gnric = $pwd = $cpwd = $mt = $pschool = $add1 = $add2 = $errorMsg = $gnric = $gname  = $relate = $gadd1 = $gadd2 = $occupy = $gnation= "";
$contact = $agg = $pyear = $gcontact = 0;
$success = true;

if (empty($_POST["gnric"]))
{
$errorMsg .= "Parent/Guardian NRIC is required.<br>";
$success = false;
}
else
{
$gnric = sanitize_input($_POST["gnric"]);

}


if (empty($_POST["gname"]))
{
$errorMsg .= "Parent/Guardian Name is required.<br>";
$success = false;
}
else
{
$gname = sanitize_input($_POST["gname"]);

}

if (empty($_POST["gcontact"]))
{
$errorMsg .= "Parent/Guardian Name is required.<br>";
$success = false;
}
else
{
$gcontact = sanitize_input($_POST["gcontact"]);

}


if (empty($_POST["relate"]))
{
$errorMsg .= "Parent/Guardian Name is required.<br>";
$success = false;
}
else
{
$relate = sanitize_input($_POST["relate"]);

}


if (empty($_POST["gadd1"]))
{
$errorMsg .= "Parent/Guardian Address is required.<br>";
$success = false;
}
else
{
$gadd1 = sanitize_input($_POST["gadd1"]);

}


if (empty($_POST["gadd2"]))
{
$errorMsg .= "Parent/Guardian Address is required.<br>";
$success = false;
}
else
{
$gadd1 = sanitize_input($_POST["gadd2"]);

}

if (empty($_POST["occupy"]))
{
$errorMsg .= "Parent/Guardian Occupation is required.<br>";
$success = false;
}
else
{
$occupy = sanitize_input($_POST["occupy"]);

}

if (empty($_POST["gnation"]))
{
$errorMsg .= "Parent/Guardian Nationality is required.<br>";
$success = false;
}
else
{
$gnation = sanitize_input($_POST["gnation"]);

}

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
$dob = date('Y-m-d',strtotime(sanitize_input($_POST["dob"])));
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
// Additional check to make sure e-mail address is well-formed.

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

if (empty($_POST["gnric"]))
{
$errorMsg .= "Your Parent's NRIC is required.<br>";
$success = false;
}
else
{
$gnric = sanitize_input($_POST["gnric"]);
// Additional check to make sure e-mail address is well-formed.

}

if (empty($_POST["agg"]))
{
$errorMsg .= "Your PSLE aggregate score is required.<br>";
$success = false;
}
else
{
$agg = sanitize_input($_POST["agg"]);
// Additional check to make sure e-mail address is well-formed.

}

if (empty($_POST["pyear"]))
{
$errorMsg .= "Please enter the year of completion for your PSLE.<br>";
$success = false;
}
else
{
$pyear = sanitize_input($_POST["pyear"]);
// Additional check to make sure e-mail address is well-formed.

}

if (empty($_POST["mt"]))
{
$errorMsg .= "Please enter the year of completion for your PSLE.<br>";
$success = false;
}
else
{
$mt = sanitize_input($_POST["mt"]);
// Additional check to make sure e-mail address is well-formed.

}

if (empty($_POST["pschool"]))
{
$errorMsg .= "Please enter the year of completion for your PSLE.<br>";
$success = false;
}
else
{
$pschool = sanitize_input($_POST["pschool"]);
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


checkICExists();


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

function checkICExists(){
        global $nric,$pwd,$errorMsg, $success,$recordCount;
    
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
           'NRIC' => strtoupper($nric),
           'Password' =>$pwd
        ];
$options = [];

$query = new \MongoDB\Driver\Query($filter, $options);
$rows   = $manager->executeQuery('ICT2103.school', $query);



foreach ($rows as $document) {
  //var_dump($document);
  $doc = (array)$document;
  $recordCount++;
  $name = $doc["Name"];
 
}


if($recordCount != 0){
    $errorMsg = "User Exists in Database";
    $success = false;
}
}


function saveMemberToDB(){
     global $fname, $dob, $nationality , $nric , $email , $pwd , $mt , $gnric, $pschool , $add1 , $add2 , $contact , $agg , $pyear, $errorMsg  , $gname  , $relate , $gadd1 , $gadd2, $occupy, $gcontact, $gnation;
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
    'NRIC' => strtoupper($nric),
    'Name' => $fname,
    'Password'=> $pwd,
    'Email' => $email,
    'Contact'=>$contact,
    'Nationality' =>$nationality,
    'PSLE_Aggregate_Score'=> $agg,
    'Date_of_Birth'=>$dob,
    'Year_of_PSLE'=>$pyear,
    'Mother_Tongue'=>$mt,
    'Previous_Primary_School'=>$pschool,
    'Address_Line_1'=>$add1,
    'Address_Line_2'=>$add2,
    'Parent_Guardian_NRIC' => strtoupper($gnric),
    'Parent_Guardian_Name' => $gname,
    'Parent_Guardian_Relationship' => $relate,
    'Parent_Guardian_Nationality' => $gnation,
    'Parent_Guardian_Address_Line_1' => $gadd1,
    'Parent_Guardian_Address_Line_2' => $gadd2,
    'Parent_Guardian_Occupation' => $occupy,
    'Parent_Guardian_Contact_Number' => $gcontact
    ]);

$manager->executeBulkWrite('ICT2103.school', $bulk);

$filter = [];
$options = [];

$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('ICT2103.school', $query);


 
}