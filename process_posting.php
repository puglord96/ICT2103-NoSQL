
        <?php
            include 'header.inc.php';

            $success = true;
            $errorMsg = "";
            $email = "";

            if (empty($_POST["email"]) || empty($_POST["name"]) || empty($_POST["feedback"])) {
                    $errorMsg .= "You have some fields left blank, please fill the empty fields.";
                    $success = false;
                } 
            else {
                $email = sanitize_input($_POST["email"]);
                $name = $_POST["name"];                
                $fbType = $_POST["fbType"];
                $fb = $_POST["feedback"];

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

                    savveFB($name, $email, $fbType, $fb);
                }
            }
            if ($success) {
                echo "<script>alert('feedback submitted successfully!');window.location.href='index.php';</script>";
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
function savveFB($name, $email, $fbType, $fb){
    
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
    'name' => $name,
    'email' => $email,
    'type_of_feedback'=> $fbType,
    'feedback_text'=>$fb
    ]);

    // $stmt = $conn->prepare("INSERT INTO feedback (name, email, type_of_feedback, feedback_text) VALUES (?, ?, ?, ?)");
$manager->executeBulkWrite('ICT2103.school', $bulk);

$filter = [];
$options = [];

$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('ICT2103.school', $query);
}


?>