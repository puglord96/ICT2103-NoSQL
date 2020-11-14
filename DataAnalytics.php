               <?php
            $success = true;
            $errorMsg = "";
            $email = "";
            
            $manager = new MongoDB\Driver\Manager('mongodb+srv://kinseong:sceptile101@cluster.dqjim.mongodb.net/ICT2103?retryWrites=true&w=majority');
    
    $command = new MongoDB\Driver\Command(['ping' => 1]);

try {
    $cursor = $manager->executeCommand('admin', $command);
} catch(MongoDB\Driver\Exception $e) {
    //echo $e->getMessage(), "\n";
    exit;
}

$response = $cursor->toArray()[0];
$filter=[];
$options = ['sort' => ['Express' => -1],'limit' => 5 ];
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
 array_push($dataPoints,array("label"=> $doc["School"], "y"=> $doc["Express"],"index"=> $doc["Express"])); 
}









$rows2020   = $manager->executeQuery('ICT2103.COP_2020', $query);
$recordCount=0;
$dataPoints2020 = array();
foreach ($rows2020 as $document2020) {
      $doc2020 = (array)$document2020;
      $recordCount++;
 array_push($dataPoints2020,array("label"=> $doc2020["School"], "y"=> $doc2020["Express"],"index"=> $doc2020["Express"])); 
}

$filter=[];
$options = ['sort' => ['School' => -1]];
$query = new \MongoDB\Driver\Query($filter, $options);
$rowssubtract   = $manager->executeQuery('ICT2103.COP_2019', $query);
$rowssubtract2   = $manager->executeQuery('ICT2103.COP_2020', $query);

$all2019school = array();
foreach ($rowssubtract as $documentsubtract) {
      $docsubtract = (array)$documentsubtract;
      $recordCount++;
 array_push($all2019school,array($docsubtract["School"] =>$docsubtract["Express"]));
}

$counter= 0;
$all2020school = array();
$schools = array();
foreach ($rowssubtract2 as $documentsubtract2020) {
      $docsubtract2020 = (array)$documentsubtract2020;
      $recordCount++;
 array_push($all2020school,array($docsubtract2020["School"] =>$docsubtract2020["Express"]));
array_push($schools,$docsubtract2020["School"]);
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

 // Command
 // TRYING OUT AGGRATE FUNCTIONS HERE 
//    $Command = new MongoDB\Driver\Command(["count" => "cca_name"]);
//
//    // Result
//    $Result = $manager->executeCommand("ICT2103", $Command);
//    var_dump($Result->toArray()[0]);
//for($k ; $k < $counter; $k++){
//    $all2020school[0]
//    
//    
//};

$filter=[];
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
                click: onClick,
		type: "column", //change type to bar, line, area, pie, etc
		indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",
		dataPoints: <?php echo json_encode($mostsubjectdataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
	function onClick(e) {
		alert(  e.dataSeries.type + ", dataPoint { x:" + e.dataPoint.x + ", y: "+ e.dataPoint.y + " }" );
	}
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
    <button onclick="COP_2019()"> Top 5 School in 2019</button>
    <button onclick="COP_2020()"> Top 5 School in  2020 </button>
        <button onclick="Improved_COP()"> Top 5 most improved COP school from 2019-2020 </button>
         <button onclick="Most_Subject()"> Most subjects offering </button>

 <div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    </body>

            <?php
        // put your code here
        include "footer.inc.php";
        ?>
</html>
