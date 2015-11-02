<html>
<head>
	<title></title>
<style type="text/css">
	
</style>
	
	<!-- Latest compiled and minified CSS -->
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
		<p>--Afroze Khan</p>
	</div>
</div>
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Universities by name</div>
  <div class="panel-body">


<?php 

//connection
$connect = mysql_connect('localhost','root','root');
if($connect);
else echo "no connection";

mysql_select_db('is218');

$q = mysql_query("SELECT UNITID,INSTNM FROM sampleData");

echo "<table class='table table-hover'>";

while($row = mysql_fetch_array($q)){
	$id = $row[0];
	$school = $row[1];
	print( "<tr><td><a href='details.php?id=" . $id  ."'>". $school ."</a></td></tr>");

}



 ?>
</table>
 </div>
 </div>
 <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
</body>
</html>

