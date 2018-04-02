<?php
$doDebug = true;		// set to true to print the request and response envelopes to the output
$maxArgs = 8;
$scriptsFolder = 'IDS_ScriptsA';
$myHost = 'http://localhost:18383';
$myWSDL = "$myHost/Service?wsdl";	// initialize host	// or, could be a file:  <IDS_SDK>/docs/references/IDSP.wsdl
$myScriptLanguage = 'javascript';
$monScriptFichier = '/Users/ariane/Sites/site/IDS_ScriptsA/SCRIPT_EF_Model.jsx';	


$client = new SoapClient("http://localhost:18383/service?wsdl"); 

$myValuess= array();


$myValuess= array();


if (isset($_POST['nameMag'])&& $_POST['nameMag'] != '') {
	$myValuess[0] = array('name' => $_POST['nameMag'], 'value' => $_POST['valueMag']);
}

if (isset($_POST['namelarge'])&& $_POST['namelarge'] != '') {
	$myValuess[1] = array('name' => $_POST['namelarge'], 'value' => $_POST['valuelarge']);
}
if (isset($_POST['namehaut'])&& $_POST['namehaut'] != '') {
	$myValuess[2] = array('name' => $_POST['namehaut'], 'value' => $_POST['valuehaut']);
}



$script_parameters = array( 'scriptFile' => $monScriptFichier, 
	'scriptArgs' => $myValuess, 
	'scriptLanguage' => 'javascript') ;





$clientcode = 'CharteDynamique.php';



if ($clientcode != '') {
	// Here is where the RunScript result page is loaded rather than loading the html form...
	// include $clientcode;

	// Initialize the script Args array from the form's values

	$myValuess= array();

		if (isset($_POST['nameMag'])&& $_POST['nameMag'] != '') {
	$myValuess[0] = array('name' => $_POST['nameMag'], 'value' => $_POST['valueMag']);
}

	if (isset($_POST['namelarge'])&& $_POST['namelarge'] != '') {
		$myValuess[1] = array('name' => $_POST['namelarge'], 'value' => $_POST['valuelarge']);
	}
	if (isset($_POST['namehaut'])&& $_POST['namehaut'] != '') {
		$myValuess[2] = array('name' => $_POST['namehaut'], 'value' => $_POST['valuehaut']);
	}



	// OUTPUT the RunScript call info

	// echo "<h3>sampleclient $clientcode</h3><pre>";
	// echo "host:  $myHost <br/>";
	// echo "wsdl:  $myWSDL <br/>";
	// // echo "script path:  $myScriptFile <br/>";
	// echo "script language:  $myScriptLanguage <br/>";
	// echo "script args: <br/>";
	
	// echo  "   " . $myValuess[0]['name'] . " = " . $myValuess[0]['value'] . '<br/>'; // 
	// echo  "   " . $myValuess[1]['name'] . " = " . $myValuess[1]['value'] . '<br/>'; // 
	
	


	// CALL RunScript


	$script_data = array("runScriptParameters" => $script_parameters); 
	$return_value = $client->RunScript($script_data); 



}

?>




<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>ANNONCE PRESSE DYNAMIQUE CLARINS</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link href="styleCharteDynamique.css" rel="stylesheet" type="text/css">
</head>

<header>
	<img src="Logo_GEGM.png" width="12%">
</header>

<body>

	<h2 class="text-center mt-5">ANNONCE PRESSE DYNAMIQUE <br> EXTRA FIRMING MODEL &amp; PACKS DUO </h2>







		<form method="post"  action="<?php echo $_SERVER['PHP_SELF'];?>">

			<div class=" row">
				<div class="col-6 text-right grisfonce ">
					<img  src="modelEF.jpg" height="50%">
				</div>

				<div class="col-6 text-left">
			
					<input class="wOborder" width="20%" type="text" name="nameMag"  value="Magazine :" readonly="readonly">
					<input type="text" name="valueMag"><br>
			
					<input class="wOborder" width="20%" type="text" name="namelarge"  value="Largeur :" readonly="readonly">
					<input type="text" name="valuelarge"><br>

					<input class="wOborder" width="20"type="text" name="namehaut" value="Hauteur :" readonly="readonly">
					<input type="text" name="valuehaut"><br>

					<div id="PDF" style="display: block" class="mt-3">
						<input  type="submit" name="Envoi" value="Générer un PDF BD"> <!-- onclick="execAppli('TextEdit') -->
					</div>
				</div>
			</div>

		</form>


		

	

	<?php




	if(isset($_POST['Envoi'])&& $_POST["valuelarge"] && $_POST["namehaut"] && $_POST['nameMag']!=''){
 		
 		
		
		$Magazine = $_POST["nameMag"];
		$VALUE_MAG = $_POST["valueMag"];
		echo '<p style="text-align: center;">Le nom du magazine est : '.$VALUE_MAG.'<br /> </p>';

		$Largeur = $_POST["namelarge"];
		$VALUE_LARGE = $_POST["valuelarge"];
		echo '<p style="text-align: center;">La largeur de l\'annonce est : '.$VALUE_LARGE.'<br /> </p>';

		$Hauteur = $_POST["namehaut"];
		$VALUE_HAUT = $_POST["valuehaut"];
			echo '<p style="text-align: center;">La hauteur de l\'annonce est : '.$VALUE_HAUT.'<br /> </p>';

	}
	function printSuccess($theResultData) 
{
	echo "Script success!<br/><br/>";
	echo "Script Results:  ";
	 
	
	if (!is_null($theResultData)) {
		echo "<br/>";
		printData($theResultData);
		echo "the result data <br/>";
	} else {
		echo "(NULL) <br/>";
	}
}
printSuccess(isset($result['scriptResult']) ? $result['scriptResult'] : NULL);


	?>
