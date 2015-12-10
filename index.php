<!-- get connection -->
<?php require('config/connect.php') ?>

<!-- get header -->
<?php require('includes/head.html') ?>

<body>

<!-- get nav -->
<?php require('includes/nav.html') ?>

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

//query
$q = 'SELECT UNITID,INSTNM FROM colleges';
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

?>
</table>
</div>
</div>

<?php require('includes/footer.html') ?>

