<html>
    <body>
        <form name="psleScoreform" action="process_schoolinfo.php"  novalidate onsubmit="return validateForm()" method="post">
            <h3>Based PSLE Score Aggregate</h3>      
            <div class="form-group">      
                <label for="psleScore">Search by PSLE score:</label>
                <input type="number"  action="process_highest" class="form-control" id="psleScore" placeholder="Please Enter your PSLE Score" name="psleScore">
                <input type="submit" value = "Search for highest school within cut off point" name= "searchHighest" class="btn btn-default">
        </div>
    </form>

    <?php
    
if (isset($_POST["searchHighest"]) && isset($_POST["psleScore"])){
    
    psleScoreSearch();   
}
    
 function psleScoreSearch() {   
    
    $success = true;
    $errorMsg = "";
    $minExpress = $minNa = "";
    $stream = "";
    $highestSchInfTbl = '';
    $schoolIDs = '';
    $schoolInfoSql = $schoolInfoRes =  '';
    $cop = array();
    $psleScore;
    if (empty($_POST["psleScore"])) {
            $errorMsg .= "you need to fill up PSLE Score";
            $success = false;
        } 
    else {
            $psleScore = $_POST["psleScore"];
            $psle = (int)$psleScore;
            

            $manager = new MongoDB\Driver\Manager('mongodb+srv://kinseong:sceptile101@cluster.dqjim.mongodb.net/ICT2103?retryWrites=true&w=majority');
            $command = new MongoDB\Driver\Command(['ping' => 1]);
            try {
                $cursor = $manager->executeCommand('admin', $command);
            } catch (MongoDB\Driver\Exception $e) {
                echo $e->getMessage(), "\n";
                exit;
            }
            $filter = [
                'Express_2019' => ['$lt' => $psle],  
            ];
            $options = [];
            // Execute the query
            $query = new \MongoDB\Driver\Query($filter, $options);
            $result = $manager->executeQuery('ICT2103.COP_2019', $query);
            $minExpressResult = $result->toArray();
            
            $filter = [
                'NA_2019' => ['$lt' => $psle],  
            ];
            $options = [];
            // Execute the query
            $query = new \MongoDB\Driver\Query($filter, $options);
            $result = $manager->executeQuery('ICT2103.COP_2019', $query);
            $minNaResult = $result->toArray();
            
            $filter = [
                'NT_2019' => ['$lt' => $psle],  
            ];
            $options = [];
            // Execute the query
            $query = new \MongoDB\Driver\Query($filter, $options);
            $result = $manager->executeQuery('ICT2103.COP_2019', $query);
            $minNtResult = $result->toArray();
            //-----------------------------------------------------------------------------------------------------------------------express            
            if($minExpressResult != null){
                
                echo '<h3>YOU ARE ELIGIBLE FOR: Express Stream</h3>';
                        $stream = "express";
                        echo "<br>";
                        echo '<table class = "table">';
                        echo '<br><br><br><br>';
                        echo '<h3><u>RESULT FOR SCHOOL Express Stream</u></H3>';
                        echo '<tr>';
                        echo'<th>School ID</th>
                                        <th>School Name</th>
                                        <th>Express COP </th>';

                        echo'<tr>';
                        foreach ($minExpressResult as $row) {
                            echo '<tr>';
                            echo '  <td><b>' . ($row->{'school_name'}) . '<b></td>';
                            echo '  <td><b>' . ($row->{'Express_2019'}) . '<b></td>';
                            echo '  </tr> ';
                        }
                        echo'</table>';
                        echo "<br>";
                        echo "<br>";
            }
            
           
            //-----------------------------------------------------------------------------------------------------------------------na
            if($minNaResult != null){
                echo '<h3>YOU ARE ELIGIBLE FOR: Normal Acadamic Stream</h3>';
                        $stream = "express";
                        echo "<br>";
                        echo '<table class = "table">';
                        echo '<br><br><br><br>';
                        echo '<h3><u>RESULT FOR SCHOOL Normal Acadamic Stream</u></H3>';
                        echo '<tr>';
                        echo'<th>School ID</th>
                                        <th>School Name</th>
                                        <th>Normal Acadamic COP </th>';

                        echo'<tr>';
                        foreach ($minExpressResult as $row) {
                            echo '<tr>';
                            echo '  <td><b>' . ($row->{'school_name'}) . '<b></td>';
                            echo '  <td><b>' . ($row->{'NA_2019'}) . '<b></td>';
                            echo '  </tr> ';
                        }
                        echo'</table>';
                        echo "<br>";
                        echo "<br>";
            }
            
            
    //-----------------------------------------------------------------------------------------------------------------------nt        
            if($minNtResult != null){
                echo '<h3>YOU ARE ELIGIBLE FOR: Normal Technical Stream</h3>';
                        $stream = "express";
                        echo "<br>";
                        echo '<table class = "table">';
                        echo '<br><br><br><br>';
                        echo '<h3><u>RESULT FOR SCHOOL Normal Technical Stream</u></H3>';
                        echo '<tr>';
                        echo'<th>School ID</th>
                                        <th>School Name</th>
                                        <th>Normal Technical COP </th>';

                        echo'<tr>';
                        foreach ($minNtResult as $row) {
                            echo '<tr>';
                            echo '  <td><b>' . ($row->{'school_name'}) . '<b></td>';
                            echo '  <td><b>' . ($row->{'NT_2019'}) . '<b></td>';
                            echo '  </tr> ';
                        }
                        echo'</table>';
            }
            
    }       
        
 }

?>
    </body>
</html>