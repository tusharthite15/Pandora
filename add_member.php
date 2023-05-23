<?php
require "config.php";

$name = $_GET["name"];
$email = $_GET["email"];
$phone = $_GET["phone"];
$college = $_GET["college"];
$year = $_GET["year"];
$tnr = $_GET["tnr"];
    

                $sql = "INSERT INTO `member`(`tnr`, `name`, `email`, `phone`, `college`, `year`) VALUES ('$tnr','$name','$email','$phone','$college','$year')";
            
                if (mysqli_query($conn, $sql))
                {   
                    header("Location: ./step_2.php?tnr=".$tnr."");
                    exit;
                }
                else
                {
                    exit(); 
                }

    mysqli_close($conn);

?>
