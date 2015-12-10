<?php 

class CollegeManager
{
    
    public function __construct()
    {
        // $this->vehicleMake = $make;
        // $this->vehicleModel = $model;
    }

    //get college details
    public function getDetails($id,$db)
    {	

    	// table headers
		$x = 'SELECT * FROM headers';
		//prepare
		$headerStatement = $db->prepare($x);
		//execute
		$headerStatement->execute();
		//fetch and store
		$data = $headerStatement->fetchAll();

		

		//id query
		$q = 'SELECT * FROM sampleData
          WHERE UNITID = :id';
			$statement = $db->prepare($q);
			$statement->bindValue(':id', $id);
			$statement->execute();

		//generate html from query
		foreach ($statement->fetchAll() as $row) {
			for ($i=0; $i < 66; $i++) { 
				echo "<tr>";
				echo "<td>" . $data[$i][0] . "</td>";
				echo "<td>" . $row[$i] . "</td>";
				echo "</tr>";
				# code...
			}
		}



		print '</table></tbody>' ;

    }//end byState



    //sorts colleges by state
    public function byState($state,$db)
    {

    	$q = "SELECT UNITID,INSTNM FROM sampleData WHERE STABBR = '$state' ";

		$statement = $db->prepare($q);
		$statement->execute();


		//table start
		print "<table class='table table-hover'>";

		//generate html from query
		foreach ($statement->fetchAll() as $row) {
			$id = $row[0];
			$school = $row[1];
			print( "<tr><td><a href='details.php?id=" . $id  ."'>". $school ."</a></td></tr>");
		} 

		print '</table>' ;

    }//end byState

    public function byLevel($level,$db)
    {

    	$q = "SELECT UNITID,INSTNM FROM sampleData WHERE ICLEVEL = '$level' ";


		$statement = $db->prepare($q);
		$statement->execute();

		//table start
		echo "<table class='table table-hover'>";

		//generate html from query
		foreach ($statement->fetchAll() as $row) {
			$id = $row[0];
			$school = $row[1];
			print( "<tr><td><a href='details.php?id=" . $id  ."'>". $school ."</a></td></tr>");
		}

		print '</table>' ;

    }//end byLevel

    public function byHospital($state,$db)
    {

    	$q = "SELECT UNITID,INSTNM,HOSPITAL FROM sampleData WHERE STABBR = '$state' AND HOSPITAL = 1 ";


		$statement = $db->prepare($q);
		$statement->execute();

		//table start
		echo "<table class='table table-hover'>";

		//generate html from query
		foreach ($statement->fetchAll() as $row) {
			$id = $row[0];
			$school = $row[1];
			$hospital = $row[2];

			switch ($hospital) {
				case '1':
					$hospital = "Has Hospital";
					break;

				case '2':
					$hospital = "No Hospital";
					break;

				case '-1':
					$hospital = "Not Reported";
					break;

				case '-2':
					$hospital = "Not Applicable";
					break;
				
				default:
					$hospital = "Not Reported";
					break;
			}

			print( "<tr><td><a href='details.php?id=" . $id  ."'>". $school . " HOSPITAL: " . $hospital . "</a></td></tr>");
		}

		print '</table>' ;

    }//end byHospital


    public function byHospitalNonDegree($db)
    {

    	$q = "SELECT UNITID,INSTNM,HOSPITAL FROM sampleData WHERE HOSPITAL = 1 AND MEDICAL = 2 OR MEDICAL = -2 OR MEDICAL = -1 ";

		$statement = $db->prepare($q);
		$statement->execute();

		//table start
		echo "<table class='table table-hover'>";

		//generate html from query
		foreach ($statement->fetchAll() as $row) {
			$id = $row[0];
			$school = $row[1];
			$hospital = $row[2];

			print( "<tr><td><a href='details.php?id=" . $id  ."'>". $school . " HOSPITAL: " . $hospital . "</a></td></tr>");
		}

		print '</table>' ;

    }//end byHospitalNonDegree


    public function byStatePublicOpening($db)
    {

    	$q = "SELECT STABBR,UNITID,INSTNM,OPENPUBL FROM sampleData WHERE OPENPUBL = 1 ";

		$statement = $db->prepare($q);
		$statement->execute();

		$states = array();
		$count = 0;


		//table start
		echo "<table class='table table-hover'>";

		//generate html from query
		foreach ($statement->fetchAll() as $row) {
			$state = $row[0];
			$id = $row[1];
			$school = $row[2];
			$public = $row[3];

			if($public == 1){

				$count++;

				if($states[$state]){
					$states[$state]++;
				}
				else{
					$states[$state] = 1;
				}
			}

			//print( "<tr><td><a href='details.php?id=" . $id  ."'>" . " STATE: " . $state . " " .  $school . " Public Opening: " . $public . "</a></td></tr>");
		}

		arsort($states);
		//print_r($states);

		foreach ($states as $state => $openings) {
			$q = "SELECT StateName, StateAbbrev FROM states WHERE StateAbbrev = '$state' ";
			$statement = $db->prepare($q);
			$statement->execute();

			foreach ($statement->fetchAll() as $row) {
			$state = $row[0];
			}

			# code...
			print("<tr><td>" . $state . " has ". $openings . " openings</td></tr>");
		}
		
		print '</table>' ;

    }//end byStatePublicOpening


	 public function byNearestLocation($db)
	    {
	    	$q = "SELECT UNITID,INSTNM, ( 3959 * acos( cos( radians(40) ) * cos( radians( LATITUDE ) ) * cos( radians( LONGITUD ) - radians(74) ) + sin( radians(40) ) * sin( radians( LATITUDE ) ) ) ) AS distance FROM sampleData ORDER BY distance LIMIT 0 , 20";

	    	//$q = "SELECT UNITID,INSTNM,HOSPITAL FROM sampleData WHERE HOSPITAL = 1 AND MEDICAL = 2 OR MEDICAL = -2 OR MEDICAL = -1 ";

			$statement = $db->prepare($q);
			$statement->execute();

			//table start
			echo "<table class='table table-hover'>";

			//generate html from query
			foreach ($statement->fetchAll() as $row) {
				$id = $row['UNITID'];
				$INSTNM = $row['INSTNM'];
				
				

				print( "<tr><td><a href='details.php?id=" . $id  ."'>". $INSTNM . " Miles </a></td><td>Distance : " .$row['distance']  . " Miles</td></tr>");
			}

			print '</table>' ;

	    }//end byNearestLocation







}//end class



$cm = new CollegeManager();



 ?>