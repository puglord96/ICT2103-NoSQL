
        <?php
            include 'header.inc.php';

            $success = true;
            $errorMsg = "";
            $email = "";
            
           
            
 

            if (empty($_POST["email"]) || empty($_POST["nric"]) || empty($_POST["feedback"])) {
                    $errorMsg .= "You have some fields left blank, please fill the empty fields.";
                    if(empty($_POST["feedback"])){
                        $errorMsg .= "feedback field is missing.";
                    }
                    if(empty($_POST["nric"])){
                        $errorMsg .= "name field is missing.";
                    }
                    if(empty($_POST["email"])){
                        $errorMsg .= "email field is missing.";
                    }
                    
                    $success = false;
                } 
            else {
                $email = sanitize_input($_POST["email"]);
                $nric = sanitize_input($_POST["nric"]);
                $fbType = sanitize_input($_POST["fbType"]);
                $fb = sanitize_input($_POST["feedback"]);
                
                $name = "";

                $emailpattern = "/[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/";

                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $errorMsg .= "Invalid email format";
                    $success = false;
                }
                else if (preg_match($emailpattern, $email) == False) {
                    $errorMsg .= "Invalid email format";
                    $success = false;
                }
                else{

                    $name = nric_Chk($nric);
//                    echo "checking nric </br>";
                    if($name == "error"){
//                        echo "failed! </br>";
                        $success = false;
                        $errorMsg .= "no such NRIC!";
                    }else{
//                        echo "passed! saving to db now</br>";
                        saveFB($nric , $email, $fbType, $fb);
                    }
                }
            }
            if ($success) {
                echo "<script>alert('feedback submitted successfully ". $name ."!');window.location.href='index.php';</script>";
                echo "<a href='index.php'>Go to Main Page</a>";
            } else {
                echo "<h1>There was an issue!</h1>";
                echo "<h4>The following input errors were detected:</h4>";
                echo "<p>" . $errorMsg . "</p>";
                echo "<form action=\"feedback.php\" method=\"post\"><button type=\"submit\">Return to feedback</button></form>";
            }

        ?>
        
    </body>
    
</html>
<?php

//Helper function that checks input for malicious or unwanted content.
function sanitize_input($data)
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

function saveFB($nric, $email, $fbType, $fb){
    
    $manager = new MongoDB\Driver\Manager('mongodb+srv://kinseong:sceptile101@cluster.dqjim.mongodb.net/ICT2103?retryWrites=true&w=majority');
    
    $command = new MongoDB\Driver\Command(['ping' => 1]);
    try {
        $cursor = $manager->executeCommand('admin', $command);
    } catch(MongoDB\Driver\Exception $e) {
        echo $e->getMessage(), "\n";
        exit;
    }


    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->insert([
        'NRIC' => $nric,
        'email' => $email,
        'type_of_feedback'=> $fbType,
        'feedback_text'=>$fb
        ]);

    $manager->executeBulkWrite('ICT2103.school', $bulk);

}



function nric_Chk($nric){
    
    $manager = new MongoDB\Driver\Manager('mongodb+srv://kinseong:sceptile101@cluster.dqjim.mongodb.net/ICT2103?retryWrites=true&w=majority');
    
    $command = new MongoDB\Driver\Command(['ping' => 1]);
    try {
        $cursor = $manager->executeCommand('admin', $command);
    } catch(MongoDB\Driver\Exception $e) {
        echo $e->getMessage(), "\n";
        exit;
    }

    $filter  = ['NRIC' => $nric]; //for student Nric change if necessary
    $filter2 = ['guard_NRIC' => $nric]; //for guardian nric
    $options = [];
    $studentChk = $guardChk = 0; //to see if guardian or student
    $sName = $gName = $name = ""; //for storing names
    
//    ----------------------------------------------------------------------for student------------------------------------------------
    $query1 = new \MongoDB\Driver\Query($filter, $options);
    $document1 = $manager->executeQuery('ICT2103.school', $query1);

    foreach ($document1 as $doc) {
      $row = (array)$doc;
      $sName = $row["Name"];
      $studentChk+=1;
    }
    
    
//    ----------------------------------------------------------------------for guardian------------------------------------------------
    $query2 = new \MongoDB\Driver\Query($filter2, $options);
    $document2 = $manager->executeQuery('ICT2103.school', $query2);

     foreach ($document2 as $doc) {
      $row = (array)$doc;
      $gName = $row["Name"];
      $guardChk+=1;
    }
    
    //if else to see if nric is student or guardian
    
    if($studentChk>$guardChk){
        $name = $sName;
    }else if($guardChk>$studentChk){
        $name = $gName;
    }else{
        $name = "error";
    }
    
    return $name;


}

?>