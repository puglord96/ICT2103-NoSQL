

        <?php
        // put your code here
        include "header.inc.php";
        ?>
        
      
    <div class="container">
    <h2>Profile</h2>
    
    <?php 
    
    $profileArrForm = [];
    
   $nric = "";
    
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
           'Name' => $_SESSION["name"]
        ];
$options = [];

$query = new \MongoDB\Driver\Query($filter, $options);
$rows   = $manager->executeQuery('ICT2103.school', $query);



foreach ($rows as $document) {
  
$doc = (array)$document;

foreach ($doc as $key => $value) {
    if($key != "_id"){
        echo str_replace("_"," ",$key) . " : " . $value . "<br> ";
    }
}
//var_dump($doc);
//echo $doc[1];
//  $recordCount++;
//  $name = $doc["Name"];
//  $_SESSION["name"] = $name;
}
    
    
    
    ?>
    


    </div>
    </body>
    
            <?php
        // put your code here
        include "footer.inc.php";
        ?>   
</html>
