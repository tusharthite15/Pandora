<?php
require "config.php";

$name = $_GET["name"];
$email = $_GET["email"];
$phone = $_GET["phone"];
$college = $_GET["college"];
$year = $_GET["year"];
$id = $_GET["id"];
$tnr = $_GET["tnr"];
$btn = $_GET["btn"];
    
if($btn=="Delete"){

    $sql = "DELETE FROM `members` WHERE `id`='$id'";
            
                if (mysqli_query($conn, $sql))
                {   
                    header("Location: ./step_2.php?tnr=".$tnr."");
                    exit;
                }
                else
                {
                    exit(); 
                }

}else{
    $sql = "UPDATE `members` SET `name`='$name',`email`='$email',`phone`='$phone',`college`='$college',`year`='$year' WHERE `id`='$id'";
            
                if (mysqli_query($conn, $sql))
                {   
                    header("Location: ./step_2.php?tnr=".$tnr."");
                    exit;
                }
                else
                {
                    exit(); 
                }
}

    mysqli_close($conn);

?>
