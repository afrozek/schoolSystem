<!-- get connection -->
<?php require('connect.php') ?>

<!-- get header -->
<?php require('head.html') ?>

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

// table headers
$x = 'SELECT * FROM headers';
	$statement = $db->prepare($x);
	$statement->execute();

//generate html from query
foreach ($statement->fetchAll() as $row) {
	echo "<td>" . $row[0] . "</td>";
}

echo"</tr>";
echo"<tr>";




// check if request is get request
if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(!empty($_GET)){

		//store school id
		$id = $_GET['id'];

		//form the query
		$q = 'SELECT * FROM sampleData
          WHERE UNITID = :id';
			$statement = $db->prepare($q);
			$statement->bindValue(':id', $id);
			$statement->execute();

			//generate html from query
			foreach ($statement->fetchAll() as $row) {
				for ($i=0; $i < 66; $i++) { 
					echo "<td>" . $row[$i] . "</td>";
					# code...
				}
			}

	}
	//if no get data
	else echo"no GET data passed";
}

?>
</tr>
</tbody>
</table>
</div>
</div>

<?php require('footer.html') ?>