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


<?php 


// check if request is get request
if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(!empty($_GET)){

		//store school id
		$id = $_GET['id'];

		//call CollegeManager Object
		$cm->getDetails($id,$db);
	}
	//if no get data
	else echo"no GET data passed";
}

?>

</div>
</div>

<?php require('includes/footer.html') ?>
