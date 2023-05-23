<?php
require "config.php";

$email = $_GET["email"];
$theme = $_GET["theme"];
$name = $_GET["name"];
date_default_timezone_set('Asia/Kolkata');
$date = date("Y/m/d h:i:sa");
    
    $sql_1 = "SELECT * FROM team WHERE email='$email'";
    $result = mysqli_query($conn, $sql_1);

    // check email is equal to one record
    if (mysqli_num_rows($result) == 1)
    {
        while ($row = $result->fetch_assoc())
        {
            header("Location: ./step_2.php?tnr=".$row['tnr']."");   
            exit;
        }
    }
    else
    {
                $sql_2 = "INSERT INTO `team` (`name`, `theme`, `email`, `date`) VALUES ('$name','$theme,'$email','$date')";
                if (mysqli_query($conn, $sql_2))
                {   
                    header("Location: ./step_2.php?tnr=".$conn->insert_id."");
                    exit;
                }
                else
                {
                    exit(); 
                }
    }

    mysqli_close($conn);

?>
