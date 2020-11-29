               <?php
include "header.inc.php";

//    if (empty($_SESSION["name"])) {
//    $message = "Unauthorized access, please login or create account";
//    echo "<script type='text/javascript'>alert('$message'); "
//            . "window.location.href='login.php';</script>";
//    }
//    else if (empty($_SESSION["nric"])) {
//        $message = "Unauthorized access, please login or create account";
//        echo "<script type='text/javascript'>alert('$message'); "
//            . "window.location.href='login.php';</script>";
//    }
  
            
            
            
            
    $manager = new MongoDB\Driver\Manager('mongodb+srv://kinseong:sceptile101@cluster.dqjim.mongodb.net/ICT2103?retryWrites=true&w=majority');
    
    $command = new MongoDB\Driver\Command(['ping' => 1]);

try {
    $cursor = $manager->executeCommand('admin', $command);
} catch(MongoDB\Driver\Exception $e) {
    //echo $e->getMessage(), "\n";
    exit;
}

////////////////////////////////////////////////////THIS IS THE CODE FOR linking FOREGIN KEY /////////////////////////////////////////////
/////////////////////////////////////////////////// LIMITED DUE TO FREE TIER AND CAN'T USE LOOKUP IN HERE //////////////////////////////////
//$command = new MongoDB\Driver\Command([
//    'aggregate' => 'COP_overall',
//    'pipeline' => [

//      [ '$lookup' => [ 'from' => '$school', 'localField' =>'school_id', 'foreignField' =>'school_id', 'as'=>"FK" ] ],
//    ],
//    'cursor' => new stdClass,
//]);
//
//$cursor2 = $manager->executeCommand('ICT2103', $command);
//foreach ($cursor2 as $document) {
//var_dump($document);
//}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





$response = $cursor->toArray()[0];
$filter=[];
$options = ['sort' => ['Express_2019' => -1],'limit' => 5 ];
$query = new \MongoDB\Driver\Query($filter, $options);

$rows   = $manager->executeQuery('ICT2103.COP_2019', $query);
$recordCount=0;
$dataPoints = array();
$datastoring = array();
$schoolidstoring = array();
foreach ($rows as $document) {
      $doc = (array)$document;
      $recordCount++;
  //var_dump($document);
// array_push($datastoring,$doc["Express_2019"]);
// array_push($schoolidstoring,$doc["school"]);
 array_push($dataPoints,array("label"=> $doc["school_name"], "y"=> $doc["Express_2019"],"index"=> $doc["Express_2019"])); 
}

$filter=[];
$options = ['sort' => ['Express_2020' => -1],'limit' => 5 ];
$query = new \MongoDB\Driver\Query($filter, $options);

$rows2020   = $manager->executeQuery('ICT2103.COP_2020', $query);
$recordCount=0;
$dataPoints2020 = array();
foreach ($rows2020 as $document2020) {
      $doc2020 = (array)$document2020;
      $recordCount++;
 array_push($dataPoints2020,array("label"=> $doc2020["school_name"], "y"=> $doc2020["Express_2020"],"index"=> $doc2020["Express_2020"])); 
}

$filter=[];
$options = ['sort' => ['school_id' => -1]];
$query = new \MongoDB\Driver\Query($filter, $options);
$rowssubtract   = $manager->executeQuery('ICT2103.COP_2019', $query);
$rowssubtract2   = $manager->executeQuery('ICT2103.COP_2020', $query);

$all2019school = array();
foreach ($rowssubtract as $documentsubtract) {
      $docsubtract = (array)$documentsubtract;
      $recordCount++;
 array_push($all2019school,array($docsubtract["school_name"] =>$docsubtract["Express_2019"]));
}

$counter= 0;
$all2020school = array();
$schools = array();
foreach ($rowssubtract2 as $documentsubtract2020) {
      $docsubtract2020 = (array)$documentsubtract2020;
      $recordCount++;
 array_push($all2020school,array($docsubtract2020["school_name"] =>$docsubtract2020["Express_2020"]));
array_push($schools,$docsubtract2020["school_name"]);
}


$mostimprovedschool = array();
foreach($schools as $school){
   $number = $all2020school[$counter][$school] - $all2019school[$counter][$school];
 $total[$school]=$number;
    $counter ++;   
}

arsort($total);
$improveddataPoints=array();
$counting=0;
foreach($total as $x=>$x_value)
   {
    array_push($improveddataPoints,array("label" => $x, "y" => $x_value,"index" => $x_value));
    if($counting == 4){
        break;
    }
    $counting++;

   }
//$manager = new MongoDB\Driver\Manager(/* URI */);

$command = new MongoDB\Driver\Command([
    'aggregate' => 'CCA',
    'pipeline' => [
        /* The $and operator was not necessary, since query criteria is
         * implicitly AND-ed and both field names differ and do not conflict. */
//        [ '$match' => [ 'company_id' => [ '$gte' => 0 ], 'upload_time' => 0 ] ],
//        /* Your original example was missing the "$" prefix for the $group
//         * operator, which I assume was a typo. */
      [ '$group' => [ '_id' => '$school_name', 'count' => [ '$sum' => 1 ] ] ],
        ['$sort' => ['count' =>-1]],
        ['$limit' =>11]
    ],
    /* The aggregate command's cursor option is a document with an optional
     * batchSize field. If batchSize is not specified, we need to pass an empty
     * document. A stdClass instance will always serialize as a BSON document,
     * while an empty PHP array would serialize as a BSON array, so we'll use
     * the former. */
    'cursor' => new stdClass,
]);

$cursor = $manager->executeCommand('ICT2103', $command);
        $MostNumberOfCCAarray = array();
       //$result = json_encode($cursor, true);
        
foreach ($cursor as $document) {
array_push($MostNumberOfCCAarray,array("label"=>  get_object_vars($document)["_id"], "y"=> get_object_vars($document)["count"],"index"=> get_object_vars($document)["count"]));  
}


$command = new MongoDB\Driver\Command([
    'aggregate' => 'school',
    'pipeline' => [
        /* The $and operator was not necessary, since query criteria is
         * implicitly AND-ed and both field names differ and do not conflict. */
//        [ '$match' => [ 'company_id' => [ '$gte' => 0 ], 'upload_time' => 0 ] ],
//        /* Your original example was missing the "$" prefix for the $group
//         * operator, which I assume was a typo. */
      [ '$group' => [ '_id' => '$zone_code', 'count' => [ '$sum' => 1 ] ] ],
        ['$sort' => ['count' =>-1]]
    ],
    /* The aggregate command's cursor option is a document with an optional
     * batchSize field. If batchSize is not specified, we need to pass an empty
     * document. A stdClass instance will always serialize as a BSON document,
     * while an empty PHP array would serialize as a BSON array, so we'll use
     * the former. */
    'cursor' => new stdClass,
]);

$cursor2 = $manager->executeCommand('ICT2103', $command);
        $SchoolinZoneArray = array();
       //$result = json_encode($cursor, true);
        
foreach ($cursor2 as $document) {
if(get_object_vars($document)["_id"] != null){
array_push($SchoolinZoneArray,array("label"=>  get_object_vars($document)["_id"], "y"=> get_object_vars($document)["count"],"index"=> get_object_vars($document)["count"]));  
}
}

$command = new MongoDB\Driver\Command([
    'aggregate' => 'school',
    'pipeline' => [
        /* The $and operator was not necessary, since query criteria is
         * implicitly AND-ed and both field names differ and do not conflict. */
//        [ '$match' => [ 'company_id' => [ '$gte' => 0 ], 'upload_time' => 0 ] ],
//        /* Your original example was missing the "$" prefix for the $group
//         * operator, which I assume was a typo. */
      [ '$group' => [ '_id' => '$dgp_code', 'count' => [ '$sum' => 1 ] ] ],
        ['$sort' => ['count' =>-1]],
          ['$limit' =>11]
    ],
    /* The aggregate command's cursor option is a document with an optional
     * batchSize field. If batchSize is not specified, we need to pass an empty
     * document. A stdClass instance will always serialize as a BSON document,
     * while an empty PHP array would serialize as a BSON array, so we'll use
     * the former. */
    'cursor' => new stdClass,
]);

$cursor3 = $manager->executeCommand('ICT2103', $command);
        $SchoolinAreaArray = array();
       //$result = json_encode($cursor, true);
        
foreach ($cursor3 as $document) {
if(get_object_vars($document)["_id"] != null){
array_push($SchoolinAreaArray,array("label"=>  get_object_vars($document)["_id"], "y"=> get_object_vars($document)["count"],"index"=> get_object_vars($document)["count"]));  
}
}

$command = new MongoDB\Driver\Command([
    'aggregate' => 'CCA',
    'pipeline' => [
        /* The $and operator was not necessary, since query criteria is
         * implicitly AND-ed and both field names differ and do not conflict. */
//        [ '$match' => [ 'company_id' => [ '$gte' => 0 ], 'upload_time' => 0 ] ],
//        /* Your original example was missing the "$" prefix for the $group
//         * operator, which I assume was a typo. */
      [ '$group' => [ '_id' => '$cca_grouping_desc', 'count' => [ '$sum' => 1 ] ] ],
        ['$sort' => ['count' =>-1]],
          ['$limit' =>11]
    ],
    /* The aggregate command's cursor option is a document with an optional
     * batchSize field. If batchSize is not specified, we need to pass an empty
     * document. A stdClass instance will always serialize as a BSON document,
     * while an empty PHP array would serialize as a BSON array, so we'll use
     * the former. */
    'cursor' => new stdClass,
]);

$cursor3 = $manager->executeCommand('ICT2103', $command);
        $CcagroupingArray = array();
       //$result = json_encode($cursor, true);
        
foreach ($cursor3 as $document) {
if(get_object_vars($document)["_id"] != null){
array_push($CcagroupingArray,array("label"=>  get_object_vars($document)["_id"], "y"=> get_object_vars($document)["count"],"index"=> get_object_vars($document)["count"]));  
}
}


   
 //{$nor:[{subject_desc:/^H1/},{subject_desc:/^H2/},{subject_desc:/^H3/}]}  
$filter=['$nor' => [['subject_desc'=>'/^H1/','subject_desc'=>'/^H2/','subject_desc'=>'/^H3/']]];
$options = ['sort' => ['school_name' => -1]];
$query = new \MongoDB\Driver\Query($filter, $options);
$rowssubject  = $manager->executeQuery('ICT2103.SUBJECT', $query);
$subject = array();
foreach ($rowssubject as $documentsubject) {
      $docssubject = (array)$documentsubject;
      $recordCount++;
 array_push($subject,$docssubject["school_name"]);
}
  

$subject=(array_count_values($subject));
arsort($subject);
$counting=0;
$mostsubjectdataPoints= array();
foreach($subject as $x=>$x_value)
   {
    array_push($mostsubjectdataPoints,array("label" => $x, "y" => $x_value,"index" => $x_value));
    if($counting == 4){
        break;
    }
    $counting++;

   }


?>


<html>

    <head>
        <meta charset="UTF-8">
    <script>
function COP_2019 () {
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Top 5 school in 2019"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

}

function COP_2020 () {
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Top 5 school in 2020"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",
		dataPoints: <?php echo json_encode($dataPoints2020, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

}

function Improved_COP () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Top 5 most improved cop school  from 2019 to 2020"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",
		dataPoints: <?php echo json_encode($improveddataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

}

function Most_Subject () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Top 5 amount of Subject offers"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",
		dataPoints: <?php echo json_encode($mostsubjectdataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
}


    function MOST_CCA () {

    var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light1", // "light1", "light2", "dark1", "dark2"
            title:{
                    text: "Top 10 school provide the most CCA in 2020"
            },
            axisY:{
                    includeZero: true
            },
            data: [{
                    type: "column", //change type to bar, line, area, pie, etc
                    indexLabel: "{y}", //Shows y value on all Data Points
                    indexLabelFontColor: "#5A5757",
                    indexLabelPlacement: "outside",
                    dataPoints: <?php echo json_encode($MostNumberOfCCAarray, JSON_NUMERIC_CHECK); ?>
            }]
    });
    chart.render();

    }



    function SchoolByZone () {
    var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light1", // "light1", "light2", "dark1", "dark2"
            title:{
                    text: "Total number of schools in each Zone"
            },
            axisY:{
                    includeZero: true
            },
            data: [{
                    type: "column", //change type to bar, line, area, pie, etc
                    indexLabel: "{y}", //Shows y value on all Data Points
                    indexLabelFontColor: "#5A5757",
                    indexLabelPlacement: "outside",
                    dataPoints: <?php echo json_encode($SchoolinZoneArray, JSON_NUMERIC_CHECK); ?>
            }]
    });
    chart.render();

    }
    
    
    function SchoolByArea() {
    var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light1", // "light1", "light2", "dark1", "dark2"
            title:{
                    text: "Total number of schools in each Area"
            },
            axisY:{
                    includeZero: true
            },
            data: [{
                    type: "column", //change type to bar, line, area, pie, etc
                    indexLabel: "{y}", //Shows y value on all Data Points
                    indexLabelFontColor: "#5A5757",
                    indexLabelPlacement: "outside",
                    dataPoints: <?php echo json_encode($SchoolinAreaArray, JSON_NUMERIC_CHECK); ?>
            }]
    });
    chart.render();

    }
    
      function ccagrouping() {
    var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light1", // "light1", "light2", "dark1", "dark2"
            title:{
                    text: "Total number of CCAs for each category"
            },
            axisY:{
                    includeZero: true
            },
            data: [{
                    type: "column", //change type to bar, line, area, pie, etc
                    indexLabel: "{y}", //Shows y value on all Data Points
                    indexLabelFontColor: "#5A5757",
                    indexLabelPlacement: "outside",
                    dataPoints: <?php echo json_encode($CcagroupingArray, JSON_NUMERIC_CHECK); ?>
            }]
    });
    chart.render();

    }
    

</script>
        <title></title>
    </head>

        <head>
        <title>Jackson</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel= "stylesheet" href ="js/2103.js" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script defer src="js/2103.js" type="text/javascript"></script>
    </head>
  <h1 style="margin-top:-10px;">*****</h1>
    <body>
        <?php
        // put your code here
        include "header.inc.php";
        ?>

        <div class="container">
        <h2>Data Analysis</h2>
        <button onclick="COP_2019()"> Top 10 School in 2019</button>
        <button onclick="COP_2020()"> Top 10 School in  2020 </button>
        <button onclick="Improved_COP()"> Top 5 most improved COP school from 2019-2020 </button>
        <button onclick="Most_Subject()"> Most subjects offering </button>
        <button onclick="MOST_CCA()"> Most CCA offering </button>
        <button onclick="SchoolByZone()"> Total No.Of.School by Zone </button>
        <button onclick="SchoolByArea()"> Total No.Of.School by Area </button>
        <button onclick="ccagrouping()"> Total No.Of.CCAs based on category </button>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    </body>

            <?php
        // put your code here
        include "footer.inc.php";
        ?>
</html>
