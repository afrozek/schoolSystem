
<html>
<head>
	<title></title>
<style type="text/css">
	
</style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<div class="container well margin-top">

<div class="jumbotron">
	<div class="container">
		<h1>College Statistics</h1>
		<p>A simple application to find information about colleges.</p>
		<a href="index.php"><h3>< Go Back Home</h3></a>
	</div>
</div>
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">University Details</div>
  <div class="panel-body" style="
    overflow: scroll;">	
<table class="table table-hover">
<tbody>
<tr class='header'>

<?php 
//connection
$connect = mysql_connect('localhost','root','root');
 mysql_select_db('is218');

		$x = mysql_query("SELECT * FROM headers ");
			while($row = mysql_fetch_array($x)){		
				echo "<td>" . $row[0] . "</td>";
		}

 echo"</tr>";
echo"<tr>";





if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(!empty($_GET)){
		//echo($_GET['id']);

		$id = $_GET['id'];


		$q = mysql_query("SELECT * FROM sampleData WHERE UNITID = $id ");
			while($row = mysql_fetch_array($q)){
			
	
				for ($i=0; $i < 66; $i++) { 
					echo "<td>" . $row[$i] . "</td>";
					# code...
				}
		}


	}
	else echo"no get data";
}

?>
</tr>
</tbody>
</table>

</div>
</div>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
</body>
</html>