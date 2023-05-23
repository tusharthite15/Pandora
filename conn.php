<?php
//connecting with database
$servername="localhost";
$username="root";
$password="";
$database="pandora";

//create a connection
$conn=mysqli_connect($servername,$username,$password,$database);
//check for the table creation
if(!$conn){
   die("failed to connect".mysqli_connect_error());
}
else{
    echo"connect successfully";
    echo"<br>";
}

//sql query to be executed
$mysql="INSERT INTO `qr_scanner` (`trn.no`, `team name`, `team members`) VALUES ('111', 'phpt', '4')";

 $result=mysqli_query($conn,$mysql);

if(isset($_POST["trn.no"])){
    $trn= $_POST["trn.no"];
    echo"The record was inserted successfully!";
    echo"<br>";
}
else{
    echo "The record was not inserted successfully because of ".mysqli_error($conn);
    echo"<br>";
}

?>