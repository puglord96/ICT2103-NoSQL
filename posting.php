<!DOCTYPE html>
<html>
    
<head>
        <meta charset="UTF-8"><title>posting page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel="stylesheet" href ="js/posting.js"></link>-->
        <!--<script src="js/posting.js"></script>-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <!--<script defer src="js/posting.js" type="text/javascript"></script>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    </head>
<?php

include "header.inc.php";

if (!isset($_SESSION['nric'])) {
  header("Location: login.php");
  exit();
}else {
    
if(isset($_POST['postingSubmit']))
{
   submitposting();
} 


$fname = $lname = $email = $pwd = $cpwd = $errorMsg = "";
    displayStudentInfo();

?>
     
     
     
     
     
    <body>    
    <div class="container">
    <form name="myForm" action="posting.php"  novalidate onsubmit="return validateForm()" method="post">
      
      
    <h2>Choices of Secondary Schools</h2>  
    <h4>Please Enter 4-Digit Option Code </h4>
    <div class="form-group">
    <label for="firstchoice">First Choice:</label>
    <input type="text" class="form-control" id="firstchoice" placeholder="Enter First Choice" name="firstchoice">
    </div>
    
    <div class="form-group">
    <label for="secondchoice">Second Choice:</label>
    <input type="text" class="form-control" id="secondchoice" placeholder="Enter Second Choice" name="secondchoice">
    </div>
    
    <div class="form-group">
    <label for="thirdchoice">Third Choice:</label>
    <input type="text" class="form-control" id="thirdchoice" placeholder="Enter Third Choice" name="thirdchoice">
    </div>
    
    
    <div class="form-group">
    <label for="fourthchoice">Fourth Choice:</label>
    <input type="text" class="form-control" id="fourthchoice" placeholder="Enter Fourth Choice" name="fourthchoice">
    </div>
    
    
    <div class="form-group">
    <label for="fifthchoice">Fifth Choice:</label>
    <input type="text" class="form-control" id="fifthchoice" placeholder="Enter Fifth Choice" name="fifthchoice">
    </div>
    
    <div class="form-group">
    <label for="sixthchoice">Sixth Choice:</label>
    <input type="text" class="form-control" id="sixthchoice" placeholder="Enter Sixth Choice" name="sixthchoice">
    </div>
    
    
      
    <button type="submit" name="postingSubmit" value = "Submit now" class="btn btn-default">Submit</button>
  </form>
  
  
    </div>
    </body>
<?php
        include "footer.inc.php";
}




function displayStudentInfo(){
  global $errorMsg, $success;

  $studentInfo = [];
  $studentInfo = getStudentInfo($_SESSION['nric']);

      $photo = "moe.png";
      echo  '<img src="images/MOE.png" alt="moe" class = "center"> ';
      echo '<section class="container"><hr>';
      echo '<h1>S1 OPTION FORM </h1>';
      echo '<h2>Students Particulars </h2>';
      echo '<p>Name of students: '.$studentInfo[0].'</p>';
      echo '<p>Primary School:'.$studentInfo[1].'</p>';
      echo '<p>Year of PSLE: '.$studentInfo[2].'</p>';
  //    echo "<p>PSLE Index No: </p>";
      echo '<p>Citizenship: '.$studentInfo[3].'</p>';
      echo '<p>PSLE Aggregate: '.$studentInfo[4].'</p>';
      
      
 
}

function getStudentInfo($nric){
    
  $manager = new MongoDB\Driver\Manager('mongodb+srv://kinseong:sceptile101@cluster.dqjim.mongodb.net/ICT2103?retryWrites=true&w=majority');
  
  $command = new MongoDB\Driver\Command(['ping' => 1]);
  try {
      $cursor = $manager->executeCommand('admin', $command);
  } catch(MongoDB\Driver\Exception $e) {
      echo $e->getMessage(), "\n";
      exit;
  }
  $filter  = ['NRIC' => $nric]; //for student Nric change if necessary
  $options = ['limit' => 1];
  $sName = $name = ""; //for storing names
  $studentInfo = [];
  
//    ----------------------------------------------------------------------Query for student info------------------------------------------------
  $query1 = new \MongoDB\Driver\Query($filter, $options);
  $document = $manager->executeQuery('ICT2103.school', $query1);

  foreach ($document as $doc) {
    $row = (array)$doc;
    array_push($studentInfo, $row['Name']);
    array_push($studentInfo, $row['Previous_Primary_School']);
    array_push($studentInfo, $row['Year_of_PSLE']);
     array_push($studentInfo, $row["Nationality"]);
    array_push($studentInfo, $row['PSLE_Aggregate_Score']);
  }
  
  
  //if else to see if nric is student or guardian
 
  
  return $studentInfo;


}

  
    function submitposting(){
        
        
         if(!empty($_POST["firstchoice"]) 
            && (!empty($_POST["secondchoice"])) 
            && (!empty($_POST["thirdchoice"]))
            && (!empty($_POST["fourthchoice"]))
            && (!empty($_POST["fifthchoice"]))
            && (!empty($_POST["sixthchoice"])))
         
        {

        $manager = new MongoDB\Driver\Manager('mongodb+srv://kinseong:sceptile101@cluster.dqjim.mongodb.net/ICT2103?retryWrites=true&w=majority');

        $command = new MongoDB\Driver\Command(['ping' => 1]);
        try {
            $cursor = $manager->executeCommand('admin', $command);
        } catch(MongoDB\Driver\Exception $e) {
            echo $e->getMessage(), "\n";
            exit;
        }
        
        $filter  = ['nric' => $_SESSION['nric'], 'posting_id' => ['$exists' => true]]; //search for nric and posting id if any matches
        $filter2 = ['nric' => ['$exists' => true], 'posting_id' => ['$exists' => true]]; //get all the posting id for evaluating
        $options = [];
//        $name = ""; //for storing names
        $studentInfo = $postingID = $allPostingID = [];
        $studentInfo = getStudentInfo($_SESSION['nric']);
        $countPostingID = 0;
        $maxPostingID = 0;
        $newPostingID = 0;

      //    ----------------------------------------------------------------Query for if the student has submitted before------------------------------------------------
        $query1 = new \MongoDB\Driver\Query($filter, $options);
        $document = $manager->executeQuery('ICT2103.school', $query1);

        foreach ($document as $doc) {
          $row = (array)$doc;
          
          array_push($postingID, $row['posting_id']);
        }
        
        
      //    ----------------------------------------------------------------Query for all the posting id to insert next highest------------------------------------------------
        $query2 = new \MongoDB\Driver\Query($filter2, $options);
        $document2 = $manager->executeQuery('ICT2103.school', $query2);

        foreach ($document2 as $doc) {
          $row = (array)$doc;
          
          array_push($allPostingID, $row['posting_id']);
          $countPostingID++;
        }
        
        if($countPostingID > 0){ //only get the max if there is anything in the array
        $maxPostingID = max($allPostingID);
        }
        
        
        
//        ------------------------checking if posting form submitted already--------------------------------------------------
        if (count($postingID) > 0){
            echo "<script>alert('you have already submitted your posting form');</script>";
        }
        else{
//        --------------------------------create new posting for student if no posting submitted under this user before-------------------------
            if($countPostingID > 0){// if there have been postings in database then assign the next highest posting id for this entry
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->insert([
                'posting_id' => ($maxPostingID+1),
                'student_Name' => $studentInfo[0],
                'nric'=>$_SESSION['nric'],
                'ranking'=>[$_POST["firstchoice"],$_POST["secondchoice"],$_POST["thirdchoice"],$_POST["fourthchoice"],$_POST["fifthchoice"],$_POST["sixthchoice"]],
                ]);
            
                $manager->executeBulkWrite('ICT2103.school', $bulk);
            }else{// if there have been postings in database then assign the next highest posting id for this entry
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->insert([
                'posting_id' => 0,
                'student_Name' => $studentInfo[0],
                'nric'=>$_SESSION['nric'],
                'ranking'=>[$_POST["firstchoice"],$_POST["secondchoice"],$_POST["thirdchoice"],$_POST["fourthchoice"],$_POST["fifthchoice"],$_POST["sixthchoice"]],
                ]);
            
                $manager->executeBulkWrite('ICT2103.school', $bulk);
            }

        
        }

        }else{
                echo "<script>alert('please fill up all fields!');</script>";
        }
    }
    

?>

</html>