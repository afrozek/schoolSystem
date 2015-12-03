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

<div class="form-group">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
		<select class="form-control" name="level">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
		</select>
		<button type="submit" class="btn btn-default btn-block">Submit</button>
	</form>
</div>

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Universities by name</div>
  <div class="panel-body">

<?php   

//query

if(empty($_GET['level'])){
	$q = 'SELECT UNITID,INSTNM FROM sampleData';
}
else{
	$level = $_GET['level'];
	$cm->byLevel($level,$db);

}

?>

</div>
</div>

<?php require('includes/footer.html') ?>

