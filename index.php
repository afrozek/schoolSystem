<html>
<head>
	<title></title>
<style type="text/css">
	
	body{
		font-family: helvetica,
	}

	/*TABLES*/
	/*TABLES*/
	/*TABLES*/

	.tables h3{
		display: block;
		background: brown;
		background: rgba(119, 20, 12, 0.4);
		text-align: center;
		padding: 10px;
		letter-spacing: 2px;
		/* border-radius: 5px; */
		border-top-left-radius: 10px;
		border-top-right-radius: 10px;
		color: white;
		/* border: 5px solid white; */
		margin-bottom: 0px;
	}

	table{
		border-radius: 10px;
		padding: 5px;
		margin: block;
		width: 100%;
		background: brown;
		background: rgba(119, 20, 12, 0.4);
		border: 5px solid whitesmoke;
		/*border: 5px solid rgba(245, 248, 250,.5);*/
		border-top-left-radius: 0;
		border-top-right-radius: 0;
		position: relative;
		!left: -140%;
	}
	tbody{
	    /* border-radius: 10px; */
	    margin: 0;
		
	    padding: 0;
	}

	tr{
	    border-radius: 10px;
	    width: 100%;

	}

	th{
	    /* border-radius: 10px; */
	    background: rgb(126, 10, 10);
	    color: white;
	    text-transform: uppercase;
	    padding: 10px;
	}

	td{
	    border-radius: 0px;
	    background: white;
	    background: rgb(245, 248, 250);
	    color: rgb(17, 102, 113);
	    width: 100%;
	    width: 190px;
	    padding: 5px;
	    text-align: center;
	}

	</style>
</head>
<body>



<?php 

//connection
$connect = mysql_connect('localhost','root','root');
if($connect) echo "connected YEA! <br>";
else echo "no connection";

mysql_select_db('is218');

$q = mysql_query("SELECT UNITID,INSTNM FROM sampleData");

echo "<table>";

while($row = mysql_fetch_array($q)){
	$id = $row[0];
	$school = $row[1];
	print( "<tr><td><a href='?id=" . $id  ."'>". $school ."</a></td></tr>");

}




//echo "</table>";

echo $num_columns;


 ?>

</body>
</html>

<?php 

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(!empty($_GET)){
		echo($_GET['id']);

		$id = $_GET['id'];

		$q = mysql_query("SELECT * FROM sampleData WHERE UNITID = $id ");
			while($row = mysql_fetch_array($q)){
				$id = $row[0];
				$school = $row[1];
				$a = $row[2];
				 echo $id . $school . $a;

		}




	}
	else echo"nothing";
}

?>