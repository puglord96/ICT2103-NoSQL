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

if(isset($_POST['postingUpdate'])){
  updatePosting();
}

if(isset($_POST['postingDelete'])){
  deletePosting();
}

if(isset($_POST['postingDisplay'])){
    viewresult();
}
$fname = $lname = $email = $pwd = $cpwd = $errorMsg = "";
    displayStudentInfo();
    
    
    
    
function showStudentPrevSelection(){
       
  $manager = new MongoDB\Driver\Manager('mongodb+srv://kinseong:sceptile101@cluster.dqjim.mongodb.net/ICT2103?retryWrites=true&w=majority');
  
  $command = new MongoDB\Driver\Command(['ping' => 1]);
  try {
      $cursor = $manager->executeCommand('admin', $command);
  } catch(MongoDB\Driver\Exception $e) {
      echo $e->getMessage(), "\n";
      exit;
  }
  
    global $findschool_idarray;
    //    ----------------------------------------------------------------Query for if the student has submitted before------------------------------------------------    
    $filter  = ['nric' => $_SESSION['nric'], 'posting_id' => ['$exists' => true]]; //search for nric and posting id if any matches
    $options = [];
    $postingID = [];
    $query1 = new \MongoDB\Driver\Query($filter, $options);
    $document = $manager->executeQuery('ICT2103.posting', $query1);

    foreach ($document as $doc) {
      $row = (array)$doc;
      array_push($postingID, $row['posting_id']);
      $findschool_idarray = $row['ranking'];
    }
//    
//    
//    if (count($postingID) > 0){//check if psoting already exists
////    ----------------------------------------------------------------------Query for student info------------------------------------------------
//  $query1 = new \MongoDB\Driver\Query($filter, $options);
//  $document = $manager->executeQuery('ICT2103.school', $query1);
//
//  foreach ($document as $doc) {
//    $row = (array)$doc;
//    array_push($studentInfo, $row['Name']);
//    array_push($studentInfo, $row['Previous_Primary_School']);
//    array_push($studentInfo, $row['Year_of_PSLE']);
//     array_push($studentInfo, $row["Nationality"]);
//    array_push($studentInfo, $row['PSLE_Aggregate_Score']);
//  }
  
//      global $findschool_idarray, $errorMsg, $success;
//    // Create connection
//    $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
//    //Check connection
//    if ($conn->connect_error)
//    {
//        $errorMsg = "Connection failed: " . $conn->connect_error;
//        $success = false;
//    }
//    else
//    {
//        $sqlfindschool_id = "SELECT  school_id 
//                            FROM school_posting sp, ranking r
//                            where sp.posting_id =r.posting_id 
//                            and student_NRIC = '".$_SESSION["student_nric"]."'";
//        $findschool_idresult = $conn->query($sqlfindschool_id);
//        while($row = mysqli_fetch_assoc($findschool_idresult)) {
//            $findschool_idarray[] = $row['school_id']; 
//        }
//        
//    }
//     $conn->close();
}

?>
     
        
     
     
     
    <body>    
    <div class="container">
    <form name="myForm" action="posting.php"  novalidate onsubmit="return validateForm()" method="post">
      
      
    <h2>Choices of Secondary Schools</h2>  
    <h4>Please Enter 4-Digit Option Code </h4>
    <div class="form-group">
    <label for="firstchoice">First Choice:</label>
    <input type="number" class="form-control" id="firstchoice" placeholder="<?php showStudentPrevSelection(); echo "Previously submitted for First Choice:". $findschool_idarray[0];?>" name="firstchoice">
    </div>
    
    <div class="form-group">
    <label for="secondchoice">Second Choice:</label>
    <input type="number" class="form-control" id="secondchoice" placeholder="<?php showStudentPrevSelection(); echo "Previously submitted for First Choice:". $findschool_idarray[1];?>" name="secondchoice">
    </div>
    
    <div class="form-group">
    <label for="thirdchoice">Third Choice:</label>
    <input type="number" class="form-control" id="thirdchoice" placeholder="<?php showStudentPrevSelection(); echo "Previously submitted for First Choice:". $findschool_idarray[2];?>" name="thirdchoice">
    </div>
    
    
    <div class="form-group">
    <label for="fourthchoice">Fourth Choice:</label>
    <input type="number" class="form-control" id="fourthchoice" placeholder="<?php showStudentPrevSelection(); echo "Previously submitted for First Choice:". $findschool_idarray[3];?>" name="fourthchoice">
    </div>
    
    
    <div class="form-group">
    <label for="fifthchoice">Fifth Choice:</label>
    <input type="number" class="form-control" id="fifthchoice" placeholder="<?php showStudentPrevSelection(); echo "Previously submitted for First Choice:". $findschool_idarray[4];?>" name="fifthchoice">
    </div>
    
    <div class="form-group">
    <label for="sixthchoice">Sixth Choice:</label>
    <input type="number" class="form-control" id="sixthchoice" placeholder="<?php showStudentPrevSelection(); echo "Previously submitted for First Choice:". $findschool_idarray[5];?>" name="sixthchoice">
    </div>
    
    
      
    <button type="submit" name="postingSubmit" value = "Submit" class="btn btn-default">Submit</button>
    <button type="submit" name="postingUpdate" value = "Update" class="btn btn-default">Update</button>
    <button type="submit" name="postingDelete" value = "Delete" class="btn btn-default">Delete</button>
    <button type="submit" name="postingDisplay" value = "View" class="btn btn-default">Check Submission</button>
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
        $choices = array($_POST["firstchoice"],$_POST["secondchoice"],$_POST["thirdchoice"],$_POST["fourthchoice"],$_POST["fifthchoice"],$_POST["sixthchoice"]);
  
      if(duplicatesCheck($choices)){
        echo "<script>alert('There is a duplicate in the choices, please check')window.location.href='http://localhost/2103project/posting.php;</script>";
      }
      else if(!validCheck($choices)){
        echo "<script>alert('There is choice that is not valid')window.location.href='http://localhost/2103project/posting.php;</script>";
      }else{
        
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
      $document = $manager->executeQuery('ICT2103.posting', $query1);

      foreach ($document as $doc) {
        $row = (array)$doc;
        
        array_push($postingID, $row['posting_id']);
      }
      
      
    //    ----------------------------------------------------------------Query for all the posting id to insert next highest------------------------------------------------
      $query2 = new \MongoDB\Driver\Query($filter2, $options);
      $document2 = $manager->executeQuery('ICT2103.posting', $query2);

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
          
              $manager->executeBulkWrite('ICT2103.posting', $bulk);
          }else{// if there have been postings in database then assign the next highest posting id for this entry
              $bulk = new MongoDB\Driver\BulkWrite;
              $bulk->insert([
              'posting_id' => 0,
              'student_Name' => $studentInfo[0],
              'nric'=>$_SESSION['nric'],
              'ranking'=>[$_POST["firstchoice"],$_POST["secondchoice"],$_POST["thirdchoice"],$_POST["fourthchoice"],$_POST["fifthchoice"],$_POST["sixthchoice"]],
              ]);
          
              $manager->executeBulkWrite('ICT2103.posting', $bulk);
          }

        }
      }

      }else{
              echo "<script>alert('please fill up all fields!');</script>";
      }
  }
    

function updatePosting(){
    
    $choices = array($_POST["firstchoice"],$_POST["secondchoice"],$_POST["thirdchoice"],$_POST["fourthchoice"],$_POST["fifthchoice"],$_POST["sixthchoice"]);

    if(empty($_POST["firstchoice"]) 
        || (empty($_POST["secondchoice"])) 
        || (empty($_POST["thirdchoice"]))
        || (empty($_POST["fourthchoice"]))
        || (empty($_POST["fifthchoice"]))
        || (empty($_POST["sixthchoice"]))){
        
        echo "<script>alert('please fill up all fields!')</script>";
    }
    else if(duplicatesCheck($choices)){
        echo "<script>alert('There is a duplicate in the choices, please check');</script>";
    }
    else if(!validCheck($choices)){
        echo "<script>alert('There is choice that is not valid');</script>";
    }
    else{
        
    
    $manager = new MongoDB\Driver\Manager('mongodb+srv://kinseong:sceptile101@cluster.dqjim.mongodb.net/ICT2103?retryWrites=true&w=majority');

    $command = new MongoDB\Driver\Command(['ping' => 1]);
    try {
        $cursor = $manager->executeCommand('admin', $command);
    } catch(MongoDB\Driver\Exception $e) {
        echo $e->getMessage(), "\n";
        exit;
    }
    
    

    //    ----------------------------------------------------------------Query for if the student has submitted before------------------------------------------------    
    $filter  = ['nric' => $_SESSION['nric'], 'posting_id' => ['$exists' => true]]; //search for nric and posting id if any matches
    $options = [];
    $postingID = $allPostingID = [];
    $query1 = new \MongoDB\Driver\Query($filter, $options);
    $document = $manager->executeQuery('ICT2103.posting', $query1);

    foreach ($document as $doc) {
      $row = (array)$doc;
      array_push($postingID, $row['posting_id']);
    }
    
    
    //    ----------------------------------------------------------------Query for if id is valid------------------------------------------------    
    $filter  = ['nric' => $_SESSION['nric'], 'posting_id' => ['$exists' => true]]; //search for nric and posting id if any matches
    $options = [];
    $postingID = $allPostingID = [];
    $query1 = new \MongoDB\Driver\Query($filter, $options);
    $document = $manager->executeQuery('ICT2103.posting', $query1);

    foreach ($document as $doc) {
      $row = (array)$doc;
      array_push($postingID, $row['posting_id']);
    }
    
    if (count($postingID) > 0){//check if psoting already exists
//      ----------------------------------------------------------update statement-----------------------------
        $ranking = ['ranking' => [$_POST["firstchoice"],$_POST["secondchoice"],$_POST["thirdchoice"],$_POST["fourthchoice"],$_POST["fifthchoice"],$_POST["sixthchoice"]]];
        echo "<script>alert('updated successfully');</script>";
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->update(
        ['nric' => 'S1111111A'],
        ['$set' => ['ranking' => $ranking]]
        );
        
        $manager->executeBulkWrite('ICT2103.posting', $bulk);
        
    }else{
        
        echo "<script>alert('you have not yet submitted a posting form!');</script>";
    }
    

    }
}



function deletePosting(){


    $manager = new MongoDB\Driver\Manager('mongodb+srv://kinseong:sceptile101@cluster.dqjim.mongodb.net/ICT2103?retryWrites=true&w=majority');

    $command = new MongoDB\Driver\Command(['ping' => 1]);
    try {
        $cursor = $manager->executeCommand('admin', $command);
    } catch(MongoDB\Driver\Exception $e) {
        echo $e->getMessage(), "\n";
        exit;
    }
    
    

    //    ----------------------------------------------------------------Query for if the student has submitted before------------------------------------------------    
    $filter  = ['nric' => $_SESSION['nric'], 'posting_id' => ['$exists' => true]]; //search for nric and posting id if any matches
    $options = [];
    $postingID = $allPostingID = [];
    $query1 = new \MongoDB\Driver\Query($filter, $options);
    $document = $manager->executeQuery('ICT2103.posting', $query1);

    foreach ($document as $doc) {
      $row = (array)$doc;
      array_push($postingID, $row['posting_id']);
    }
    
    
    
    if (count($postingID) > 0){//check if psoting already exists
//      ----------------------------------------------------------update statement-----------------------------
        $ranking = ['ranking' => [$_POST["firstchoice"],$_POST["secondchoice"],$_POST["thirdchoice"],$_POST["fourthchoice"],$_POST["fifthchoice"],$_POST["sixthchoice"]]];
        echo "<script>alert('Deleted successfully');</script>";
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->delete(
        ['nric' => 'S1111111A'],
        ['limit' => 1]
        );
        
        $manager->executeBulkWrite('ICT2103.posting', $bulk);
        
    }else{
        
        echo "<script>alert('you have not yet submitted a posting form!');</script>";
    }
    

   }
   
   
   

function viewresult(){
    global $feedbackbutton,$fbType,$feedback, $errorMsg, $success;
    $choiceNum = 1;
         

    $manager = new MongoDB\Driver\Manager('mongodb+srv://kinseong:sceptile101@cluster.dqjim.mongodb.net/ICT2103?retryWrites=true&w=majority');
  
    $command = new MongoDB\Driver\Command(['ping' => 1]);
    try {
        $cursor = $manager->executeCommand('admin', $command);
    } catch(MongoDB\Driver\Exception $e) {
        echo $e->getMessage(), "\n";
        exit;
    }
  
    $choices = [];
    //    ----------------------------------------------------------------Query for if the student has submitted before------------------------------------------------    
    $filter  = ['nric' => $_SESSION['nric'], 'posting_id' => ['$exists' => true]]; //search for nric and posting id if any matches
    $options = [];
    $postingID = [];
    $query1 = new \MongoDB\Driver\Query($filter, $options);
    $document = $manager->executeQuery('ICT2103.posting', $query1);

    foreach ($document as $doc) {
      $row = (array)$doc;
      $choices = $row['ranking'];
    }
    $filter2  = ['school_id' => ['$in' => [(int)$choices[0],(int)$choices[1],(int)$choices[2],(int)$choices[3],(int)$choices[4],(int)$choices[5]]] , 'school_name' => ['$exists' => true]];
    $query2 = new \MongoDB\Driver\Query($filter2, $options);
    $document2 = $manager->executeQuery('ICT2103.school', $query2);
    
    
//    $checkArray = $document->toArray();

//    if (sizeof($checkArray) == 0){
//        echo "<script type='text/javascript'>alert('Please fill up all 6 slots and submit a form in order to view submission!'); </script>";
//    }else{
        echo '<br><br><br>';
        echo '<h2><u>Your Selection for 6 chosen schools</u></H2>';
        echo '<table class= "table">';
        echo '<tr>';
        echo'<th>Choice</th>
            <th>School ID You Have Selected:</th>
            <th>School Name</th>';
        echo'</tr>';
        
        foreach ($document2 as $doc) {
            $row = (array)$doc;
            echo '  <tr>';
            echo '  <td><b>' . $choiceNum . '<b></td>';
            echo '  <td><b>' . $row["school_id"] . '<b></td>';
            echo '  <td><b>' . $row["school_name"] . '<b></td>';
            echo '  </tr> ';                
            $choiceNum++;

          }
          
        echo'</table>';
    
        
    
}

function duplicatesCheck($array) {

   return count($array) !== count(array_unique($array));
}

function validCheck($array){
    $manager = new MongoDB\Driver\Manager('mongodb+srv://kinseong:sceptile101@cluster.dqjim.mongodb.net/ICT2103?retryWrites=true&w=majority');

    $command = new MongoDB\Driver\Command(['ping' => 1]);
    try {
        $cursor = $manager->executeCommand('admin', $command);
    } catch(MongoDB\Driver\Exception $e) {
        echo $e->getMessage(), "\n";
        exit;
    }
    
    $options = [];

    foreach ($array as $choice) {
        $filter  = ['school_id' => (int)$choice]; //search for nric and posting id if any matches
        $query1 = new \MongoDB\Driver\Query($filter, $options);
        $document = $manager->executeQuery('ICT2103.school', $query1);
        $checkArray = [];
        $checkArray = $document->toArray();
        
//        echo "<script>alert('this is the document : ". sizeof($checkArray) ." ') window.location.href='http://localhost/2103project/posting.php;</script>";
        
//        return sizeof($checkArray);
        if (sizeof($checkArray) == 0){
            return false;
        }
    }
    return true;
}

?>

</html>