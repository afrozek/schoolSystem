<?php


//connection
// $connect = mysql_connect('localhost','root','root');
// if($connect);
// else echo "no connection";

$dsn = 'mysql:dbname=is218;host=localhost;port=8889';
$username = 'root';
$password = 'root';
try {
    $db = new PDO($dsn, $username, $password); // also allows an extra parameter of configuration
} catch(PDOException $e) {
    die('Could not connect to the database:<br/>' . $e);
}



// if (($handle = fopen("test.csv", "r")) !== FALSE) {
//     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//         $sql = "INSERT INTO record ( first, last, month) VALUES ( '".mysql_escape_string($data[0])."','".mysql_escape_string($data[1])."','".mysql_escape_string($data[2])."')";
//         $query = mysql_query($sql);
//         if($query){
//             echo "row inserted\n";
//         }
//         else{
//             echo die(mysql_error());
//         }
//     }
//     fclose($handle);
// }

?>