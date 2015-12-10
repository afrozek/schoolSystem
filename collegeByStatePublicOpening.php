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
  <div class="panel-heading">States With Public Openings </div>
  <div class="panel-body">

<?php   

//query

	//call CollegeManager Object
	$cm->byStatePublicOpening($db);

?>

</div>
</div>

<?php require('includes/footer.html') ?>

