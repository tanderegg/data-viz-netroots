<?

	error_reporting(E_ALL);
	
	$hostname = "";   // eg. mysql.yourdomain.com (unique)
	$username = "";   // the username specified when setting-up the database
	$password = "";   // the password specified when setting-up the database
	$database = "";   // the database name chosen when setting-up the database (unique)

	$link = mysql_connect($hostname,$username,$password);
	mysql_select_db($database) or die("Unable to select database");


    $project_name = "Netroots Nation '13 Rockstars Poll";

    $json_string = '

    	[

    		["SCREEN1","REGISTERED",[[1,"YES"],[2,"NO"]]],
    		["GENDER","RESPONDENT GENDER",[[1,"MALE"],[2,"FEMALE"]]],
    		["AREA","REGION",[[1,"GEORGETOWN"],[2,"RURAL"],[3,"BAY AREA"]]],
    		["PHTYPE","PHONE TYPE",[["Wireless","WIRELESS"],["Landline","LANDLINE"],["VOIP","VOIP"]]],
    		["WILLVOTE","CHANCE VOTE",[[1,"ALMOST CERTAIN"],[2,"PROBABLY"],[3,"50-50"],[4,"DK/NR"]]],
    		["DIRECT","DIRECTION",[[1,"RIGHT DIRECTION"],[2,"WRONG TRACK"],[3,"DK/NR"]]],
    		["THERM2A","THERMS: MICK JAGGER",[["1||2","TOTAL FAV"],["3||4", "TOTAL UNFAV"], ["(1||2) -(3||4)", "TOTAL FAV - TOTAL UNFAV"],[1,"VERY FAVORABLE"],[2,"SOMEWHAT FAVORABLE"],[3,"SOMEWHAT UNFAVORABLE"],[4,"VERY UNFAVORABLE"],[5,"NO OPINION/NEUTRAL"],[6,"NEVER HEARD"],[7,"DK/NR"]]],
    		["THERM2B","THERMS: PETE TOWNSEND",[["1||2","TOTAL FAV"],["3||4", "TOTAL UNFAV"], ["(1||2) -(3||4)", "TOTAL FAV - TOTAL UNFAV"],[1,"VERY FAVORABLE"],[2,"SOMEWHAT FAVORABLE"],[3,"SOMEWHAT UNFAVORABLE"],[4,"VERY UNFAVORABLE"],[5,"NO OPINION/NEUTRAL"],[6,"NEVER HEARD"],[7,"DK/NR"]]],
    		["THERM2C","THERMS: BB KING",[["1||2","TOTAL FAV"],["3||4", "TOTAL UNFAV"], ["(1||2) - (3||4)", "TOTAL FAV - TOTAL UNFAV"],[1,"VERY FAVORABLE"],[2,"SOMEWHAT FAVORABLE"],[3,"SOMEWHAT UNFAVORABLE"],[4,"VERY UNFAVORABLE"],[5,"NO OPINION/NEUTRAL"],[6,"NEVER HEARD"],[7,"DK/NR"]]],
    		["THERM2D","THERMS: MANFRED MANN",[["1||2","TOTAL FAV"],["3||4", "TOTAL UNFAV"], ["(1||2) -(3||4)", "TOTAL FAV - TOTAL UNFAV"],[1,"VERY FAVORABLE"],[2,"SOMEWHAT FAVORABLE"],[3,"SOMEWHAT UNFAVORABLE"],[4,"VERY UNFAVORABLE"],[5,"NO OPINION/NEUTRAL"],[6,"NEVER HEARD"],[7,"DK/NR"]]],
    		["JOBA","JOB APPROVAL 13 GOVERNOR BB KING",[["1||2", "EXCELLENT/GOOD"], [1,"EXCELLENT"],[2,"GOOD"],[3,"JUST FAIR"], [4,"POOR"], [5,"DK/NR"]]],
    		["JOBB","JOB APPROVAL 14 STATE REP PETE TOWNSEND",[["1||2", "EXCELLENT/GOOD"], [1,"EXCELLENT"],[2,"GOOD"],[3,"JUST FAIR"], [4,"POOR"], [5,"DK/NR"]]],
    		["REELECT","RE-ELECT",[[1,"DESERVES RE-ELECTION"],[2,"SOMEONE NEW"],[3,"DK/NR"]]],
    		["IDEO1","IDEOLOGY",[[1,"LIBERAL"],[2,"MODERATE"],[3,"CONSERVATIVE"], [4,"DK/NR"]]],
    		["EDUC","EDUCATION",[[1,"1-11TH GRADE"], [2, "HIGH SCHOOL GRADUATE"], [3,"NON-COLLEGE POST H.S."], [4,"SOME COLLEGE"], [5,"COLLEGE GRADUATE"], [6,"POST-GRAD"], [7,"DK/NR"]]],
    		["OWN","HOME OWN",[[1,"YES"],[2,"NO"],[3,"DK/NR"]]],
    		["MANUFACT","HOME OWN (MANUFACTURED)",[[1,"YES"],[2,"NO"],[3,"DK/NR"]]],
    		["REGIS","PARTY REG FROM VOTER FILE", [[1,"DEMOCRAT"],[2,"INDEPENDENT"],[3,"REPUBLICAN"]]],
    		[["GC1","GC2"],"GENERIC STATE LEGISLATIVE VOTE",[["GC1==1","DEMOCRATIC CANDIDATE"],["GC2==1", "LEAN DEMOCRATIC"],["GC1==2","REPUBLICAN CANDIDATE"], ["GC2==2","LEAN REPUBLICAN"], ["GC1==3 && GC2==3", "UNDECIDED"], ["GC1==4 && GC2==4", "OTHER"], ["GC1==1 || GC2 ==1", "TOTAL DEM"], ["GC1==2 || GC2 ==2", "TOTAL REPUBLICAN"], ["(GC1==1 || GC2 ==1) - (GC1==2 || GC2 == 2)","TOTAL DEM - TOTAL REP"]]],
    		[["GOVVOTE, GOVLEAN"],"GOVERNOR RACE", [["GOVVOTE ==1","BB KING"], ["GOVLEAN == 1", "LEAN BB KING"], ["GOVVOTE == 2", "MANFRED MANN"], ["GOVLEAN == 2", "LEAN MANFRED MANN"], ["GOVVOTE == 3 && GOVLEAN == 3", "UNDECIDED"], ["GOVVOTE == 1 || GOVLEAN == 1", "TOTAL BB KING"], ["GOVVOTE == 2 || GOVLEAN == 2", "TOTAL MANFRED MANN"], ["(GOVVOTE == 1 || GOVLEAN == 1) - (GOVVOTE == 2 || GOVLEAN == 2)", "TOTAL BB KING - MANN"]]],
    		[["VOTE1,VOTE1B"], "INITIAL VOTE", [["VOTE1 == 1","MICK JAGGER"], ["VOTE1B == 1", "LEAN MICK JAGGER"], ["VOTE1 == 2", "PETE TOWNSEND"], ["VOTE1B == 2", "LEAN PETE TOWNSEND"], ["VOTE1 == 3 && VOTE1B == 3", "UNDECIDED"], ["VOTE1 == 1 || VOTE1B == 1", "TOTAL MICK JAGGER"], ["VOTE1 == 2 || VOTE1B == 3", "TOTAL PETE TOWNSEND"], ["(VOTE1 ==1 || VOTE1B == 1) - (VOTE1 == 2 || VOTE1B == 2)", "TOTAL JAGGER - TOWNSEND"]]],
    		[["VOTEBIO,VOTEBIO2"], "INFORMED BIO VOTE", [["VOTEBIO == 1","MICK JAGGER"], ["VOTEBIO2 == 1", "LEAN MICK JAGGER"], ["VOTEBIO == 2", "PETE TOWNSEND"], ["VOTEBIO2 == 2", "LEAN PETE TOWNSEND"], ["VOTEBIO == 3 && VOTEBIO2 == 3", "UNDECIDED"], ["VOTEBIO == 1 || VOTEBIO2 == 1", "TOTAL MICK JAGGER"], ["VOTEBIO == 2 || VOTEBIO2 == 3", "TOTAL PETE TOWNSEND"], ["(VOTEBIO ==1 || VOTEBIO2 == 1) - (VOTEBIO == 2 || VOTEBIO2 == 2)", "TOTAL JAGGER - TOWNSEND"]]],

    		[["PTYID1", "PTYID2", "PTYID3"], "PARTY IDENTIFICATION", 
    		            [
    		                ["PTYID1 == 1 && PTYID2 == 1", "STRONG DEMOCRAT"],
    		                ["PTYID1 == 1 && (PTYID2 == 2 || PTYID2 ==3)", "WEAK DEMOCRAT"],
    		                ["(PTYID1 == 2 || PTYID1 == 4 || PTYID1 == 5) && PTYID3 == 1", "INDEPENDENT LEAN DEMOCRAT"],
    		                ["(PTYID1 == 5 && PTYID3 == 3) || ((PTYID1 == 2 || PTYID1 == 4) && (PTYID3 == 3 || PTYID3 == 4))", "INDEPENDENT"],
    		                ["(PTYID1 == 2 || PTYID1 == 4 || PTYID1 = 5) && PTYID3 == 2", "INDEPENDENT LEAN REPUBLICAN"],
    		                ["PTYID1 == 3 && (PTYID2 == 2 || PTYID2 == 3)", "WEAK REPUBLICAN"],
    		                ["PTYID1 == 3 && PTYID2 ==1", "STRONG REPUBLICAN"],
    		                ["PTYID1 == 1", "2-3-2 DEMOCRAT"],
    		                ["((PTYID1 == 2 || PTYID1 == 4) && (PTYID3 <= 4)) || (PTYID1 ==5 && PTYID3 <= 3)", "2-3-2 INDEPENDENT"],
    		                ["PTYID1 == 3", "2-3-2 REPUBLICAN"],
    		                ["(PTYID1 == 1) - (PTYID1 == 3)", "DEMOCRAT - REPUBLICAN"],
    		                ["PTYID1 == 1 || PTYID3 == 1", "3-1-3 DEMOCRAT"],
    		                ["(PTYID1 == 5 && PTYID3 == 3) || ((PTYID1 == 2 || PTYID1 == 4) && (PTYID3 == 3 || PTYID3 == 4))", "3-1-3 INDEPENDENT"],
    		                ["PTYID1 == 3 || PTYID3 == 2", "3-1-3 REPUBLICAN"],
    		                ["(PTYID1 == 1 || PTYID3 == 1) - (PTYID1 == 3 || PTYID3 == 3)", "DEMOCRAT - REPUBLICAN"]]],

    		[["AGE",""], "AGE", 
    		[
    			["2012 - AGE >= 17 && 2012 - AGE <= 24", "18 - 24"], 
    			["2012 - AGE >= 25 && 2012 - AGE <= 29", "25 - 29"], 
    			["2012 - AGE >= 30 && 2012 - AGE <= 34", "30 - 34"], 
    			["2012 - AGE >= 35 && 2012 - AGE <= 39", "35 - 39"], 
    			["2012 - AGE >= 40 && 2012 - AGE <= 44", "40 - 44"], 
    			["2012 - AGE >= 45 && 2012 - AGE <= 49", "45 - 49"], 
    			["2012 - AGE >= 50 && 2012 - AGE <= 54", "50 - 54"], 
    			["2012 - AGE >= 55 && 2012 - AGE <= 59", "55 - 59"], 
    			["2012 - AGE >= 60 && 2012 - AGE <= 64", "60 - 64"], 
    			["2012 - AGE > 2000", "NO ANSWER"], 
    			["2012 - AGE >= 65 && 2012 - AGE < 1000", "OVER 64"], 
    			["2012 - AGE >= 17 && 2012 - AGE <= 49", "18 - 49"], 
    			["2012 - AGE >= 50 && 2012 - AGE < 1000", "50 AND OVER"]
    		]
    		]


    	]

    	';


    	$x = json_decode($json_string);
    	//	jamvar($x);

    	function jamvar($thisVar) {

    	echo "<pre>";
    	print_r($thisVar);
    	echo "</pre>";

    	}

    	function displayField($thisLabel, $thisField, $thisTotal) {

    	echo $thisLabel;

    	if (strlen($thisLabel) < 25) {

    		for ($i=0; $i<(25-strlen($thisLabel));$i++) {
    		echo " ";
    		}

    	}

    	if ($thisField == '0') {

    		echo "  -  \r\n";

    	} else {

    		for ($i=0; $i<(6-strlen($thisField));$i++) {
    		echo " ";
    		}

    	        echo "$thisField \r\n";
    	}

    	$thisPercent = round(($thisField / $thisTotal * 100), 1);

    	if (strstr($thisPercent, ".") == FALSE) {
    		$thisPercent .= ".0";
    	}

    	for ($i=0; $i<(30-strlen($thisPercent));$i++) {
    		echo " ";
    	}
    	echo $thisPercent."%\r\n";


    	echo "\r\n";	

    	}


    	echo "<pre>";

    	foreach ($x as $thisGroup) {


    	//first lines
    	echo "==== ".$project_name." TOP LINES === ".date("m/d")." ===\r\n";
    	echo $thisGroup[1]."\r\n";

    	//ref lines
    	echo "(ref:";
    	if (!is_array($thisGroup[0])) {
    		 echo $thisGroup[0];
    	} else {

    		foreach ($thisGroup[0] as $thisMultiColumn) {
    		echo $thisMultiColumn." ";
    		}

    	}
    	echo ")\r\n";


    	//queries

    	echo "                          Total\r\n";
    	echo "                         ======\r\n";

    	//echo "Total answering          ";
    	$totalSql = "SELECT count(*) from rockstars";
    	$totalResult = mysql_query($totalSql,$link) or die("Unable to select: ".mysql_error());
    	while($row = mysql_fetch_row($totalResult)) {
    	    foreach($row as $field) {		

    		$totalAnswering = $field;

    		displayField("Total answering", $field, $totalAnswering);
    		}
    	}


    	foreach($thisGroup[2] as $thisQuestion) {

    		$thisLabel = $thisQuestion[1];
    		$thisValue = $thisQuestion[0];
    		$thisColumn = $thisGroup[0];



    		if (!is_array($thisColumn)) {



    		//SIMPLE
    		if (stristr($thisValue, "||") == FALSE && stristr($thisValue, "&&") == FALSE) {

    			//simple query

    			//add single quotes around strings
    			if (!is_int($thisValue)) {
    				$thisValue = "'".$thisValue."'";
    			}

    			$sql = "SELECT count(*) from rockstars WHERE ".$thisColumn." = ".$thisValue;
    			$result = mysql_query($sql,$link) or die("Unable to select: ".mysql_error());

    			//echo $sql."\r\n";	

    			while($row = mysql_fetch_row($result)) {
    			    foreach($row as $field) {		

    				displayField($thisLabel, $field, $totalAnswering);
    			}
    			}		

    		} else {

    			//parse value

    			// 1||2 =>  thisColumn = 1 OR thisColumn = 2

    			// (1||2) - (3||4) =>  select( (SELECT COUNT(*) from rockstars where reelect = 1 or reelect = 2) - (SELECT COUNT(*) from rockstars where reelect = 3 or reelect = 4) )

    			$sql = "SELECT (";

    			$patterns = array('/([A-Za-z0-9=]*)(\|\|)([A-Za-z0-9=]*)/i', '/([A-Za-z0-9=]*)(&&)([A-Za-z0-9=]*)/i', );
    			$replacements = array(' select count(*) from rockstars where '.$thisColumn.' = $1 OR '.$thisColumn.' = $3',
    						' select count(*) from rockstars where '.$thisColumn.' = $1 AND '.$thisColumn.' = $3');
    			$thisValueOut = preg_replace($patterns, $replacements, $thisValue);

    			$sql .= $thisValueOut;		

    			$sql .= ") ";



    			//echo $sql."\r\n";


    			$result = mysql_query($sql,$link) or die("Unable to select: ".mysql_error());


    			while($row = mysql_fetch_row($result)) {
    			    foreach($row as $field) {		

    				displayField($thisLabel, $field, $totalAnswering);
    			}
    			}		




    		}



    		} else {

    		//COMPLEX


    		//echo $thisValue."        ";


    		$thisValue = str_replace('==', '=', $thisValue);


    		if(stristr($thisValue, ") - (") == FALSE && stristr($thisValue, ")-(") == FALSE){

    			//run it straight thru as a where clause

    			$sql = "select count(*) from rockstars where ".$thisValue;

    		} else {

    			$sql = "SELECT (";

    			$patterns = array('/\(([A-Za-z0-9=\s\|]*)\)\s*-\s*\(([A-Za-z0-9=\s\|]*)\)/i');
    			$replacements = array(' (select count(*) from rockstars where ($1)) - (select count(*) from rockstars where ($2)) ');
    			$thisValueOut = preg_replace($patterns, $replacements, $thisValue);

    			$sql .= $thisValueOut;		

    			$sql .= ") ";


    		}

    		//echo $sql."\r\n";

    		$result = mysql_query($sql,$link) or die("Unable to select: ".mysql_error());

    		while($row = mysql_fetch_row($result)) {
    		    foreach($row as $field) {		

    			displayField($thisLabel, $field, $totalAnswering);
    			}
    		}


    		}


    	}




    	echo "\r\n\r\n\r\n";
    	}

    	echo "</pre>";


    	mysql_close($link);

    ?>

    <pre>
    <?

    //	jamvar($x)

    ?>
    </pre>