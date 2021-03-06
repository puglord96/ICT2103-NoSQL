<?php
// put your code here
include "header.inc.php";
?>

<div class="container">
    <h1>Search for School Information</h1>
    <h3>Information such as School name | Cut Off Points | Academic Stream</h3>
    <form name="psleScoreform" action="index.php"  novalidate onsubmit="return validateForm()" method="post">
        <h3>Based PSLE Score Aggregate</h3>      
        <div class="form-group">      
            <label for="psleScore">Search by PSLE score:</label>
            <input type="number"  action="process_highest" class="form-control" id="psleScore" placeholder="Please Enter your PSLE Score" name="psleScore">
            <input type="submit" value = "Search for highest school within cut off point" name= "searchHighest" class="btn btn-default">
        </div>
    </form>



    <div id = "myDIV"> 

        <br>
        <h3>Based on School Name</h3>
        <form name="genderAreaform" action="index.php"  novalidate onsubmit="return validateForm()" method="post">
            <div class="form-group" >
                <label for="search">Search by School Name:</label>
                <input list ="search" name ="search" class="form-control" id="browsers" placeholder="Search for basic school details" >
                <datalist id="search">
                        <option value="ADMIRALTY SECONDARY SCHOOL">
                        <option value="AHMAD IBRAHIM SECONDARY SCHOOL">
                        <option value="ANDERSON SECONDARY SCHOOL">
                        <option value="ANG MO KIO SECONDARY SCHOOL">
                        <option value="ANGLICAN HIGH SCHOOL">
                        <option value="ANGLO-CHINESE SCHOOL (BARKER ROAD)">
                        <option value="ANGLO-CHINESE SCHOOL (INDEPENDENT) (Express)">
                        <option value="ANGLO-CHINESE SCHOOL (INDEPENDENT) (IP)">
                        <option value="ASSUMPTION ENGLISH SCHOOL">
                        <option value="ASSUMPTION PATHWAY SCHOOL">
                        <option value="BARTLEY SECONDARY SCHOOL">
                        <option value="BEATTY SECONDARY SCHOOL">
                        <option value="BEDOK GREEN SECONDARY SCHOOL">
                        <option value="BEDOK SOUTH SECONDARY SCHOOL">
                        <option value="BEDOK VIEW SECONDARY SCHOOL">
                        <option value="BENDEMEER SECONDARY SCHOOL">
                        <option value="BOON LAY SECONDARY SCHOOL">
                        <option value="BOWEN SECONDARY SCHOOL">
                        <option value="BROADRICK SECONDARY SCHOOL">
                        <option value="BUKIT BATOK SECONDARY SCHOOL">
                        <option value="BUKIT MERAH SECONDARY SCHOOL">
                        <option value="BUKIT PANJANG GOVT. HIGH SCHOOL">
                        <option value="BUKIT VIEW SECONDARY SCHOOL">
                        <option value="CANBERRA SECONDARY SCHOOL">
                        <option value="CATHOLIC HIGH SCHOOL (IP)">
                        <option value="CATHOLIC HIGH SCHOOL (Special)">
                        <option value="CEDAR GIRLS' SECONDARY SCHOOL (IP)">
                        <option value="CEDAR GIRLS' SECONDARY SCHOOL (Express)">
                        <option value="CHANGKAT CHANGI SECONDARY SCHOOL">
                        <option value="CHIJ KATONG CONVENT (Secondary)">
                        <option value="CHIJ SECONDARY (TOA PAYOH)">
                        <option value="CHIJ ST. JOSEPH'S CONVENT">
                        <option value="CHIJ ST. NICHOLAS GIRLS' SCHOOL (IP)">
                        <option value="CHIJ ST. NICHOLAS GIRLS' SCHOOL (Special)">
                        <option value="CHIJ ST. THERESA'S CONVENT">
                        <option value="CHRIST CHURCH SECONDARY SCHOOL">
                        <option value="CHUA CHU KANG SECONDARY SCHOOL">
                        <option value="CHUNG CHENG HIGH SCHOOL (MAIN)">
                        <option value="CHUNG CHENG HIGH SCHOOL (YISHUN)">
                        <option value="CLEMENTI TOWN SECONDARY SCHOOL">
                        <option value="COMMONWEALTH SECONDARY SCHOOL">
                        <option value="COMPASSVALE SECONDARY SCHOOL">
                        <option value="CRESCENT GIRLS' SCHOOL">
                        <option value="CREST SECONDARY SCHOOL">
                        <option value="DAMAI SECONDARY SCHOOL">
                        <option value="DEYI SECONDARY SCHOOL">
                        <option value="DUNEARN SECONDARY SCHOOL">
                        <option value="DUNMAN HIGH SCHOOL">
                        <option value="DUNMAN SECONDARY SCHOOL">
                        <option value="EAST SPRING SECONDARY SCHOOL">
                        <option value="EDGEFIELD SECONDARY SCHOOL">
                        <option value="EVERGREEN SECONDARY SCHOOL">
                        <option value="FAIRFIELD METHODIST SCHOOL (SECONDARY)">
                        <option value="FAJAR SECONDARY SCHOOL">
                        <option value="FUCHUN SECONDARY SCHOOL">
                        <option value="FUHUA SECONDARY SCHOOL">
                        <option value="GAN ENG SENG SCHOOL">
                        <option value="GEYLANG METHODIST SCHOOL (SECONDARY)">
                        <option value="GREENDALE SECONDARY SCHOOL">
                        <option value="GREENRIDGE SECONDARY SCHOOL">
                        <option value="GUANGYANG SECONDARY SCHOOL">
                        <option value="HAI SING CATHOLIC SCHOOL">
                        <option value="HILLGROVE SECONDARY SCHOOL">
                        <option value="HOLY INNOCENTS' HIGH SCHOOL">
                        <option value="HOUGANG SECONDARY SCHOOL">
                        <option value="HUA YI SECONDARY SCHOOL">
                        <option value="HWA CHONG INSTITUTION">
                        <option value="JUNYUAN SECONDARY SCHOOL">
                        <option value="JURONG SECONDARY SCHOOL">
                        <option value="JURONG WEST SECONDARY SCHOOL">
                        <option value="JURONGVILLE SECONDARY SCHOOL">
                        <option value="JUYING SECONDARY SCHOOL">
                        <option value="KENT RIDGE SECONDARY SCHOOL">
                        <option value="KRANJI SECONDARY SCHOOL">
                        <option value="KUO CHUAN PRESBYTERIAN SECONDARY SCHOOL">
                        <option value="LOYANG VIEW SECONDARY SCHOOL">
                        <option value="MANJUSRI SECONDARY SCHOOL">
                        <option value="MARIS STELLA HIGH SCHOOL">
                        <option value="MARSILING SECONDARY SCHOOL">
                        <option value="MAYFLOWER SECONDARY SCHOOL">
                        <option value="MERIDIAN SECONDARY SCHOOL">
                        <option value="METHODIST GIRLS' SCHOOL (SECONDARY) (Express)">
                        <option value="METHODIST GIRLS' SCHOOL (SECONDARY) (IP)">
                        <option value="MONTFORT SECONDARY SCHOOL">
                        <option value="NAN CHIAU HIGH SCHOOL">
                        <option value="NAN HUA HIGH SCHOOL">
                        <option value="NANYANG GIRLS' HIGH SCHOOL">
                        <option value="NATIONAL JUNIOR COLLEGE">
                        <option value="NAVAL BASE SECONDARY SCHOOL">
                        <option value="NEW TOWN SECONDARY SCHOOL">
                        <option value="NGEE ANN SECONDARY SCHOOL">
                        <option value="NORTH VISTA SECONDARY SCHOOL">
                        <option value="NORTHBROOKS SECONDARY SCHOOL">
                        <option value="NORTHLAND SECONDARY SCHOOL">
                        <option value="NUS HIGH SCHOOL OF MATHEMATICS AND SCIENCE">
                        <option value="ORCHID PARK SECONDARY SCHOOL">
                        <option value="OUTRAM SECONDARY SCHOOL">
                        <option value="PASIR RIS CREST SECONDARY SCHOOL">
                        <option value="PASIR RIS SECONDARY SCHOOL">
                        <option value="PAYA LEBAR METHODIST GIRLS' SCHOOL (SECONDARY)">
                        <option value="PEI HWA SECONDARY SCHOOL">
                        <option value="PEICAI SECONDARY SCHOOL">
                        <option value="PEIRCE SECONDARY SCHOOL">
                        <option value="PING YI SECONDARY SCHOOL">
                        <option value="PRESBYTERIAN HIGH SCHOOL">
                        <option value="PUNGGOL SECONDARY SCHOOL">
                        <option value="QUEENSTOWN SECONDARY SCHOOL">
                        <option value="QUEENSWAY SECONDARY SCHOOL">
                        <option value="RAFFLES GIRLS' SCHOOL (SECONDARY)">
                        <option value="RAFFLES INSTITUTION">
                        <option value="REGENT SECONDARY SCHOOL">
                        <option value="RIVER VALLEY HIGH SCHOOL">
                        <option value="RIVERSIDE SECONDARY SCHOOL">
                        <option value="SCHOOL OF SCIENCE AND TECHNOLOGY, SINGAPORE">
                        <option value="SCHOOL OF THE ARTS, SINGAPORE">
                        <option value="SEMBAWANG SECONDARY SCHOOL">
                        <option value="SENG KANG SECONDARY SCHOOL">
                        <option value="SERANGOON GARDEN SECONDARY SCHOOL">
                        <option value="SERANGOON SECONDARY SCHOOL">
                        <option value="SINGAPORE CHINESE GIRLS' SCHOOL (Express)">
                        <option value="SINGAPORE CHINESE GIRLS' SCHOOL (IP)">
                        <option value="SINGAPORE SPORTS SCHOOL">
                        <option value="SPECTRA SECONDARY SCHOOL">
                        <option value="SPRINGFIELD SECONDARY SCHOOL">
                        <option value="ST. ANDREW'S SECONDARY SCHOOL">
                        <option value="ST. ANTHONY'S CANOSSIAN SECONDARY SCHOOL">
                        <option value="ST. GABRIEL'S SECONDARY SCHOOL">
                        <option value="ST. HILDA'S SECONDARY SCHOOL">
                        <option value="ST. JOSEPH'S INSTITUTION (Express)">
                        <option value="ST. JOSEPH'S INSTITUTION (IP)">
                        <option value="ST. MARGARET'S SECONDARY SCHOOL">
                        <option value="ST. PATRICK'S SCHOOL">
                        <option value="SWISS COTTAGE SECONDARY SCHOOL">
                        <option value="TAMPINES SECONDARY SCHOOL">
                        <option value="TANGLIN SECONDARY SCHOOL">
                        <option value="TANJONG KATONG GIRLS' SCHOOL">
                        <option value="TANJONG KATONG SECONDARY SCHOOL">
                        <option value="TECK WHYE SECONDARY SCHOOL">
                        <option value="TEMASEK JUNIOR COLLEGE">
                        <option value="TEMASEK SECONDARY SCHOOL">
                        <option value="UNITY SECONDARY SCHOOL">
                        <option value="VICTORIA SCHOOL (Express)">
                        <option value="VICTORIA SCHOOL (IP)">
                        <option value="WEST SPRING SECONDARY SCHOOL">
                        <option value="WESTWOOD SECONDARY SCHOOL">
                        <option value="WHITLEY SECONDARY SCHOOL">
                        <option value="WOODGROVE SECONDARY SCHOOL">
                        <option value="WOODLANDS RING SECONDARY SCHOOL">
                        <option value="WOODLANDS SECONDARY SCHOOL">
                        <option value="XINMIN SECONDARY SCHOOL">
                        <option value="YIO CHU KANG SECONDARY SCHOOL">
                        <option value="YISHUN SECONDARY SCHOOL">
                        <option value="YISHUN TOWN SECONDARY SCHOOL">
                        <option value="YUAN CHING SECONDARY SCHOOL">
                        <option value="YUHUA SECONDARY SCHOOL">
                        <option value="YUSOF ISHAK SECONDARY SCHOOL">
                        <option value="YUYING SECONDARY SCHOOL">
                        <option value="ZHENGHUA SECONDARY SCHOOL">
                        <option value="ZHONGHUA SECONDARY SCHOOL">

                </datalist>
            </div>


            <h3>Based on Type of school & Area</h3>    
            <div class="form-group">
                <label for ="area" >Area:</label>
                <input type="checkbox" id="north" name="area[]" value="NORTH"><label for="north"> north</label>    
                <input type="checkbox" id="south" name="area[]" value="SOUTH"><label for="south"> south</label>
                <input type="checkbox" id="east" name="area[]" value="EAST"><label for="east"> east</label>
                <input type="checkbox" id="west" name="area[]" value="WEST"><label for="west"> west</label>

                </select>
            </div>



            <div class="form-group">
                <label for ="schoolgender" >Please select school gender type:</label>

                <input type="radio" id="boysch" name="schoolgender" value="BOYS' SCHOOL">
                <label for="boysch">boy school</label>

                <input type="radio" id="girlsch" name="schoolgender" value="GIRLS' SCHOOL">
                <label for="girlsch">girl school</label>

                <input type="radio" id="cosch" name="schoolgender" value="CO-ED SCHOOL">
                <label for="cosch">CO-ED school</label><br>
            </div>


            <div class="form-group">
                <label for="NoOfSchool">Choose number of schools:</label>
                <select name="NoOfSchool" id="NoOfSchool">
                    <option value="15">15</option>
                    <option value="30">30</option>
                    <option value="45">45</option>
                    <option value="60">60</option>
                    <option value="75">75</option>
                    <option value="90">90</option>

                </select>
            </div>

            <input type="submit" value = "Search based on School name or Type of School & Area" name= "indexbutton" class="btn btn-default">     
        </form>

        <br>
        <br>



        <div class="form-group">
            <h3>Based on Transport</h3>
            <label for="mrt">Search by MRT Station:</label>
            <form name="transportform" action="index.php"  novalidate onsubmit="return validateForm()" method="post">
                <input list="searchmrt"  type="text" name ="mrt" class="form-control" id="browsers" placeholder="Search school by MRT" >
                <datalist id="searchmrt">
                    <option value="ALJUNIED MRT"> 
                    <option value="ADMIRALTY MRT">
                    <option value="ANG MO KIO MRT">
                    <option value="BANGKIT LRT">    
                    <option value="BOTANIC GARDENS MRT">    
                    <option value="BUONA VISTA MRT">
                    <option value="BUKIT BATOK MRT">
                    <option value="BUKIT GOMBAK MRT"> 
                    <option value="BUKIT PANJANG MRT">
                    <option value="BUKIT PANJANG LRT">    
                    <option value="BISHAN MRT">
                    <option value="BARTLEY MRT">
                    <option value="BEDOK RESERVOIR MRT">
                    <option value="BEDOK MRT"
                    <option value="BRADDELL MRT">
                    <option value="BOON KENG MRT">
                    <option value="BOON LAY MRT">
                    <option value="BUANGKOK MRT">
                    <option value="CALDECOTT MRT">
                    <option value="CHINESE GARDEN MRT">
                    <option value="CHINATOWN MRT">
                    <option value="COVE LRT">   
                    <option value="COMMONWEALTH MRT">    
                    <option value="CLEMENTI MRT">    
                    <option value="CASHEW MRT">
                    <option value="CHOA CHU KANG MRT">   
                    <option value="COMPASSVALE LRT">    
                    <option value="DAKOTA MRT">
                    <option value="DHOBY GHAUT MRT">    
                    <option value="DOVER MRT">
                    <option value="FARRER ROAD MRT">    
                    <option value="HOUGANG MRT">
                    <option value="HARBOURFRONT MRT">
                    <option value="JELAPANG LRT">    
                    <option value="JURONG EAST MRT">
                    <option value="KANGKAR LRT">    
                    <option value="KEMBANGAN MRT">
                    <option value="KHATIB MRT">   
                    <option value="KING ALBERT PARK MRT">    
                    <option value="KOVAN MRT">   
                    <option value="LAKESIDE MRT">
                    <option value="LAYAR LRT">
                    <option value="MARYMOUNT MRT">    
                    <option value="MARSILING MRT"> 
                    <option value="MATTAR MRT">  
                    <option value="MERIDIAN LRT">      
                    <option value="MOUNTBATTEN MRT">
                    <option value="NEWTON MRT">    
                    <option value="ONE-NORTH MRT">
                    <option value="OUTRAM PARK MRT">     
                    <option value="PASIR RIS MRT">
                    <option value="PAYA LEBAR MRT">    
                    <option value="PETIR LRT">  
                    <option value="PHOENIX LRT">    
                    <option value="POTONG PASIR MRT">
                    <option value="PUNGGOL MRT">    
                    <option value="RANGGUNG LRT">
                    <option value="REDHILL MRT"> 
                    <option value="RENJONG LRT">                     
                    <option value="QUEENSTOWN MRT">
                    <option value="SEMBAWANG MRT">    
                    <option value="SENGKANG MRT">
                    <option value="SENJA LRT">    
                    <option value="SERANGOON MRT">
                    <option value="SIMEI MRT"> 
                    <option value="SIXTH AVENUE MRT">    
                    <option value="STEVENS MRT">                  
                    <option value="TAI SENG MRT">    
                    <option value="TAMPINES MRT">  
                    <option value="TAMPINES EAST MRT"> 
                    <option value="TAMPINES WEST MRT">    
                    <option value="TANAH MERAH MRT"> 
                    <option value="TAN KAH KEE MRT">             
                    <option value="TIONG BAHRU MRT">    
                    <option value="TOA PAYOH MRT">     
                    <option value="TONGKANG LRT">   
                    <option value="WOODLEIGH MRT">
                    <option value="WOODLANDS SOUTH MRT">
                    <option value="WOODLANDS MRT">     
                    <option value="YEW TEE MRT">
                    <option value="YIO CHU KANG MRT">
                    <option value="YISHUN MRT">    
                </datalist>        
                
                <div class="form-group">
                    <label for="bus">Search by Bus Numbers:</label>
                    <input type ="text" name ="bus" class="form-control" id="bus" placeholder="Search school by Bus" >
                </div>
                <input type="submit" value = "Search school by Transportation MRT or BUS" name= "transportbutton" class="btn btn-default">   
                <br>
            </form>
        </div>

        <br>


        <div class="form-group">
            <h3>Based on CCA</h3>
            <label for="schoolnamecca">Search by School Name:</label>
            <form name="schoolnamecca" action="index.php"  novalidate onsubmit="return validateForm()" method="post">
                <input list ="search" name ="schoolnamecca" class="form-control" id="browsers" placeholder="Search for basic school details" >
                

                <label for="typeofcca">Type of CCA:</label>
                <select name="typeofcca" id="typeofcca">
                    <option value="VISUAL AND PERFORMING ARTS">VISUAL AND PERFORMING ARTS</option>
                    <option value="UNIFORMED GROUPS">UNIFORMED GROUPS   </option>
                    <option value="PHYSICAL SPORTS">PHYSICAL SPORTS</option>
                    <option value="CLUBS AND SOCIETIES">CLUBS AND SOCIETIES</option>
                    <option value="OTHERS">OTHERS</option>

                </select>
                <br>
                <input type="submit" value = "Search school by CCA" name= "ccabutton" class="btn btn-default"> 
            </form>
        </div>





    </div> <!-- Div on the top -->



    <button onclick="myFunction()">Advanced Search</button>
    <br><br><br><br><br><br>


    <h2>Fast Search Based on Academic Stream COP</h2>
    <form name="fastsearchform" action="index.php"  novalidate onsubmit="return validateForm()" method="post">
        <div class="form-group">
            <p>Please select Stream:</p>

            <input type="radio" id="Express" name="stream" value="Express">
            <label for="Express">Express</label><br>

            <input type="radio" id="NA" name="stream" value="NA">
            <label for="NA">Normal Academic</label><br>

            <input type="radio" id="NT" name="stream" value="NT">
            <label for="NT">Normal Technical</label>
        </div>



        <div class="form-group">
            <label for="NoOfSchool_cop">Choose number of schools:</label>
            <select name="NoOfSchool_cop" id="NoOfSchool_cop">
                <option value="20">20</option>
                <option value="40">40</option>
                <option value="60">60</option>
                <option value="80">80</option>
                <option value="100">100</option>
                <option value="120">120</option>

            </select>
        </div>


        <div class="form-group">
            <p>Please select order:</p>

            <input type="radio" id="asc" name="order" value="asc">
            <label for="asc">Ascending Order Based on Latest COP</label><br>

            <input type="radio" id="desc" name="order" value="desc">
            <label for="desc">Descending Order Based on Latest COP</label><br>
        </div>
        <input type="submit" value = "Search for Stream" name= "streambutton" class="btn btn-default">
    </form>


    <div id="form-table"></div>
</body>


</html>

<?php
if (isset($_POST["indexbutton"]) && (isset($_POST["area"])) && (isset($_POST["schoolgender"])) && (isset($_POST["NoOfSchool"]))) {

    $area = $_POST["area"];
    $schoolgender = $_POST["schoolgender"];
    $NoOfSchool = $_POST["NoOfSchool"];
    foreach ($area as $areas) {
        echo "area selected: $areas<br>";
    }
    echo "school gender selected: $schoolgender<br>";
    echo "no.of.school selected: $NoOfSchool<br>";
    searchSchGenderbyArea();
} else if (isset($_POST["searchHighest"]) && isset($_POST["psleScore"])){
    $psleScore = $_POST["psleScore"];
    psleScoreSearch();
    
} else if (isset($_POST["indexbutton"]) && isset($_POST["search"]) && isset($_POST["NoOfSchool"])) {
    $search = $_POST["search"];
    $NoOfSchool = $_POST["NoOfSchool"];
    search();
} else if (isset($_POST["streambutton"]) && isset($_POST["stream"]) && isset($_POST["NoOfSchool_cop"]) && isset($_POST["order"])) {
    $streambutton = $_POST["streambutton"];
    $stream = $_POST["stream"];
    $NoOfSchool_cop = $_POST["NoOfSchool_cop"];
    $order = $_POST["order"];
    cop();
} else if (isset($_POST["transportbutton"]) && isset($_POST["mrt"]) && isset($_POST["bus"])) {
    $transportbutton = $_POST["transportbutton"];
    $mrt = $_POST["mrt"];
    $bus = $_POST["bus"];
    transport();
} else if (isset($_POST["ccabutton"]) && isset($_POST["schoolnamecca"]) && isset($_POST["typeofcca"])) {
    $ccabutton = $_POST["ccabutton"];
    $schoolnamecca = $_POST["schoolnamecca"];
    $typeofcca = $_POST["typeofcca"];

    cca();
} else {

    echo"Remember to choose an area";
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
                        echo'<th>School Name</th>
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
                        echo'<th>School Name</th>
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
                        echo'<th>School Name</th>
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


function searchSchGenderbyArea() {
    global $area, $schoolgender, $NoOfSchool, $url_address, $errorMsg, $success;
    $manager = new MongoDB\Driver\Manager('mongodb+srv://kinseong:sceptile101@cluster.dqjim.mongodb.net/ICT2103?retryWrites=true&w=majority');
    $command = new MongoDB\Driver\Command(['ping' => 1]);
    try {
        $cursor = $manager->executeCommand('admin', $command);
    } catch (MongoDB\Driver\Exception $e) {
        echo $e->getMessage(), "\n";
        exit;
    }
    if (isset($_POST["area"]) && (isset($_POST["schoolgender"])) && (isset($_POST["NoOfSchool"]))) {
        for ($i = 0; $i < sizeof($area); $i++) {
            $filter = [
                'zone_code' => $area[$i],
                'school_gender_code' => $schoolgender
            ];
            $options = [
                'limit' => $NoOfSchool
            ];

            // Execute the query
            $query = new \MongoDB\Driver\Query($filter, $options);
            $result = $manager->executeQuery('ICT2103.school', $query);
            $resultArray = $result->toArray();
           
            // output data of each row
            echo '<br><br><br>';
            echo '<h2><u>RESULT FROM SEARCH BY GENDER</u></H2>';
            echo '<h3>Area: ' . $area[$i] . '<br>Gender Selected: ' . "$schoolgender" . '<br>Filter by: ' . "$NoOfSchool" . '</h3>';

            echo '<br><br><br>';
            echo '<table class= "table">';
            echo '<tr>';
            echo'<th>School ID</th>
                        <th>School Name</th>
                        <th>School URL1</th>
                        <th>MRT</th>
                        <th>BUS</th>';
            echo'</tr>';

            foreach ($resultArray as $row) {
                echo '<tr>';
                echo '  <td><b>' . ($row->{'school_id'}) . '<b></td>';
                echo '  <td><b>' . ($row->{'school_name'}) . '<b></td>';
                echo '  <td><u>' . ($row->{'url_address'}) . '<u></td>';
                echo '  <td><b>' . ($row->{'mrt_desc'}) . '<b></td>';
                echo '  <td><b>' . ($row->{'bus_desc'}) . '<b></td>';
                echo '  </tr> ';
            }
            echo'</table>';
            //}
        }
    } else {
        $errorMsg = "Please select area, gender, and number of school";
        $success = false;
    }
//        $result->free_result();
}

function search() {
    global $search, $NoOfSchool, $errorMsg, $success;
    $manager = new MongoDB\Driver\Manager('mongodb+srv://kinseong:sceptile101@cluster.dqjim.mongodb.net/ICT2103?retryWrites=true&w=majority');
    $command = new MongoDB\Driver\Command(['ping' => 1]);
    try {
        $cursor = $manager->executeCommand('admin', $command);
    } catch (MongoDB\Driver\Exception $e) {
        echo $e->getMessage(), "\n";
        exit;
    }
    if ((isset($_POST["search"])) && (isset($_POST["NoOfSchool"])) && (!empty($_POST["search"]))) {
        $filter = [
            'school_name' => $search,
        ];
        $options = [
            'limit' => $NoOfSchool
        ];

        // Execute the query
        $query = new \MongoDB\Driver\Query($filter, $options);
        $result = $manager->executeQuery('ICT2103.school', $query);
        $resultArray = $result->toArray();
        // output data of each row
        echo '<table class = "table">';
        echo '<br><br><br><br>';
        echo '<h3><u>RESULT FROM SEARCH BY SCHOOL NAME</u></H3>';
        echo '<tr>';
        echo'<th>School ID</th>
                        <th>School Name</th>
                        <th>School URL2s</th>
                        <th>Address</th>
                        <th>Postal_code</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>MRT</th>
                        <th>Bus</th>';

        echo'<tr>';
        foreach ($resultArray as $row) {
            echo '<tr>';
            echo '  <td><b>' . ($row->{'school_id'}) . '<b></td>';
            echo '  <td><b>' . ($row->{'school_name'}) . '<b></td>';
            echo '  <td><u>' . ($row->{'url_address'}) . '<u></td>';
            echo '  <td><b>' . ($row->{'address'}) . '<b></td>';
            echo '  <td><b>' . ($row->{'postal_code'}) . '<b></td>';
            echo '  <td><b>' . ($row->{'telephone_no'}) . '<b></td>';
            echo '  <td><b>' . ($row->{'email_address'}) . '<b></td>';
            echo '  <td><b>' . ($row->{'mrt_desc'}) . '<b></td>';
            echo '  <td><b>' . ($row->{'bus_desc'}) . '<b></td>';
            echo '  </tr> ';
        }
        echo'</table>';
    } else {
        $errorMsg = "Please enter the name of the school you wish to find";
        $success = false;
    }
}

function cop() {
    global $streambutton, $stream, $NoOfSchool_cop, $school_cop_2019_, $school_cop_2020_, $difference, $order, $errorMsg, $success;
    
    $resultcount = 0;
    $manager = new MongoDB\Driver\Manager('mongodb+srv://kinseong:sceptile101@cluster.dqjim.mongodb.net/ICT2103?retryWrites=true&w=majority');
    $command = new MongoDB\Driver\Command(['ping' => 1]);
    try {
        $cursor = $manager->executeCommand('admin', $command);
    } catch (MongoDB\Driver\Exception $e) {
        echo $e->getMessage(), "\n";
        exit;
    }

    if (isset($_POST["streambutton"]) && isset($_POST["stream"]) && isset($_POST["NoOfSchool_cop"]) && isset($_POST["order"])) {

        $filter = [];


        if ($order == "asc") {
            $options = [
                'limit' => $NoOfSchool_cop,
                'sort' => ["Express_2020" => 1]
            ];
        } else if ($order == "desc") {
            $options = [
                'limit' => $NoOfSchool_cop,
                'sort' => ["Express_2020" => -1]
            ];
        }

        $query = new \MongoDB\Driver\Query($filter, $options);
        $rows = $manager->executeQuery('ICT2103.COP_overall', $query);
        echo '<br><br><br>';
        echo '<h2><u>RESULT FROM FAST SEARCH</u></H2>';
        echo '<br>';
        echo '<h3>You have selected:' . "$stream" . '</h3>';
        echo'<p>Showing ' . $NoOfSchool_cop . ' results</p>';
        echo '<table class="table table-bordered">';
        echo '<tr>';
        echo '<th>S/N</th>
              <th>School ID</th>
                        <th>School Name</th>
                        <th>COP-2020</th>
                        <th>COP-2019</th>
                        <th>COP Difference</th>
                        </tr>';
        foreach ($rows as $document) {
              $resultcount ++;
            $doc = (array) $document;
            //var_dump($doc);

            echo'<tr>';
            echo '  <td><b>' . $resultcount. '<b></td>';
             $mongoschID = $mongoschName = $mongosch2020 = $mongosch2019 = "";
            foreach ($doc as $key => $value) {

             



                if ($key != "_id") {

                    //echo $stream."_2020";
                    if ($key == "school_id") {
                        $mongoschID = $value;
                    } else if ($key == "school_name") {
                        $mongoschName = $value;
                    } else if ($key == $stream . "_2020") {
                        $mongosch2020 = $value;
                    } else if ($key == $stream . "_2019") {
                        $mongosch2019 = $value;
                    }
                }
                
                 $mongoFields = [$mongoschID, $mongoschName, $mongosch2020, $mongosch2019];

            
            }

           foreach ($mongoFields as $field) {
                echo '  <td><b>' . $field . '<b></td>';
            }

            echo '  <td><b>' . (int)($mongosch2020 - $mongosch2019) . '<b></td>';

            echo '  </tr> ';
        }
        echo'</table>';


    } else {
        $errorMsg = "Please select the stream and the number of school!";
        $success = false;
    }
//        $result->free_result();
}

function transport() {
    global $transportbutton, $mrt, $bus, $errorMsg, $success;
    $manager = new MongoDB\Driver\Manager('mongodb+srv://kinseong:sceptile101@cluster.dqjim.mongodb.net/ICT2103?retryWrites=true&w=majority');
    $command = new MongoDB\Driver\Command(['ping' => 1]);
    try {
        $cursor = $manager->executeCommand('admin', $command);
    } catch (MongoDB\Driver\Exception $e) {
        echo $e->getMessage(), "\n";
        exit;
    }
    if (isset($_POST["transportbutton"]) && (isset($_POST["mrt"])) && (isset($_POST["bus"])) && (!empty($_POST["mrt"])) || (!empty($_POST["bus"]))) {
        $bus = new MongoDB\BSON\Regex($bus);
        $mrt = new MongoDB\BSON\Regex($mrt);
        $filter = [
            'bus_desc' => $bus,
            'mrt_desc' => $mrt
        ];
        $options = [];
        // Execute the query
        $query = new \MongoDB\Driver\Query($filter, $options);
        $result = $manager->executeQuery('ICT2103.school', $query);
        $resultArray = $result->toArray();

        // output data of each row
        echo '<br><br><br>';
        echo '<h2><u>RESULT FROM MRT and BUS</u></H2>';
        echo '<h3>MRT Selected:' . $mrt . ' <br>Bus Selected: ' . $bus . '</h3>';

        echo '<br><br><br>';
        echo '<table class= "table">';
        echo '<tr>';
        echo'<th>School ID</th>
                        <th>School Name</th>
                        <th>School mrt</th>
                        <th>bus</th>';
        echo'</tr>';
        foreach ($resultArray as $row) {
            echo '<tr>';
            echo '  <td><b>' . ($row->{'school_id'}) . '<b></td>';
            echo '  <td><b>' . ($row->{'school_name'}) . '<b></td>';
            echo '  <td><b>' . ($row->{'mrt_desc'}) . '<b></td>';
            echo '  <td><b>' . ($row->{'bus_desc'}) . '<b></td>';
            echo '  </tr> ';
        }
        echo'</table>';
    } else {
        $errorMsg = "Please select area, gender, and number of school";
        $success = false;
    }
}

global $sentToList;



function cca(){
    
    
    global $ccabutton,$schoolnamecca,$typeofcca,$errorMsg, $success;
    $manager = new MongoDB\Driver\Manager('mongodb+srv://kinseong:sceptile101@cluster.dqjim.mongodb.net/ICT2103?retryWrites=true&w=majority');
    $command = new MongoDB\Driver\Command(['ping' => 1]);
    try {
            $cursor = $manager->executeCommand('admin', $command);
        } 
        catch(MongoDB\Driver\Exception $e) 
        {
            echo $e->getMessage(), "\n";
            exit;
        }
    if(isset($_POST["ccabutton"]) && (isset($_POST["schoolnamecca"])) && (isset($_POST["typeofcca"])) && (!empty($_POST["schoolnamecca"])))
    {
        
        $filter = [
            'school_name' => $schoolnamecca,
            'cca_grouping_desc' => $typeofcca  
                
        ];
        $options =[]; 
        $query = new \MongoDB\Driver\Query($filter, $options);
        $result   = $manager->executeQuery('ICT2103.CCA', $query);
        $resultArray = $result -> toArray();       
        if(isset($resultArray)){
        // output data of each row
                    echo '<br><br><br>';
                    echo '<h2><u>RESULT FROM CCA</u></H2>';
                    echo '<h3>School Selected:' .$schoolnamecca. ' <br>Type of CCA Selected: '. $typeofcca .'</h3>';

                    echo '<br><br><br>';
                    echo '<table class= "table">';
                    echo '<tr>';
                    echo'<th>CCA Available</th>';
                    echo'</tr>';
                    foreach($resultArray as $row)  {
                        echo '<tr>';
                        echo '  <td>' . ($row->{'cca_name'}) . '</td>';
                        echo '  </tr> ';                
                    }
                echo'</table>';
        }
        else {
            echo "<script type='text/javascript'>alert('CCA is not available');</script>";
        }
        
    }
    
        else
        {
            $errorMsg = "Please select area, gender, and number of school";
            $success = false;
        }
//        $result->free_result();    
}


?>

<?php
// put your code here
include "footer.inc.php";
?>  
