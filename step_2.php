<?php
require 'config.php';

$tnr = $_GET['tnr'];
$i = 0;

$sql = "SELECT * FROM `members` WHERE tnr='$tnr'";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

while($row =mysqli_fetch_assoc($result))
{
    $i++;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Portal</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,200&family=League+Spartan:wght@300&family=Montserrat:ital,wght@1,300;1,400&family=Poppins:wght@300&family=Urbanist:wght@400;600;700&display=swap');
        body{
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }
        .bg{
            width: 100%;
            height: 100vh;
        }
        .main{            
        width: 100%;
        height: 100vh;
        background: #000000bd;
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        }
        .left{
            width: 40%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .logo{
            width: 250px;
        }
        .right{
            width: 60%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .box{
            width: 50%;
            background: white;
            padding: 15px;
            border-radius: 10px;
            display: block;
            text-align: center;
        }
        .title{
            font-family: 'Urbanist';
            font-size: 32px;
            font-weight: 800;
            margin-top: 15px;
    margin-bottom: 15px;
        }
        .steps{
            display: block;
    font-family: 'Urbanist';
    font-size: 15px;
    font-weight: 800;
    color: rgba(0, 0, 0, 0.45);
    text-align: left;
    padding-left: 40px;
        }
        .btns{
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            margin:15px 0;
        }
        .btn_1{
            padding: 5px 20px;
    background: #1a1a1a;
    color: white;
    border-radius: 100px;
    font-family: 'Urbanist';
    font-weight: 600;
        }
        .btn_2{
            padding: 5px 20px;
    background: #3c6ae2db;
    color: white;
    border-radius: 100px;
    font-family: 'Urbanist';
    font-weight: 600;
        }
        
        .mem{
            width: 320px;
    border-radius: 7px;
    background-color: #CBCBCB;
    color: rgba(28, 45, 60, 0.77);
    font-family: 'Urbanist';
    font-size: 15px;
    font-weight: 520;
    padding: 12px;
    margin: 15px auto;
    display: flex;
    justify-content: space-between;
        }
        .edit{
            width: 20px;
        }
        
        input[type=submit]{
            border: none;
    font-family: 'Urbanist';
    font-size: 15px;
    font-weight: 520;
    padding: 12px;
    border-radius: 100px;
    width: 250px;
    margin: 10px auto;
    background: #3c6ae2db;
    color: white;
        }
        .popup{
            position: fixed;
    top: 0;
    left: 0;
    z-index: 9;
    width: 100%;
    height: 100vh;
    background: #000000d1;
    justify-content: center;
    align-items: center;
    display: none;
        }
        .pop{
            width: 35%;
    background: white;
    padding: 15px;
    border-radius: 10px;
    display: block;
    text-align: center;
        }
        .title_2{
            font-family: 'Urbanist';
            font-size: 20px;
            font-weight: 800;
            margin-top: 15px;
    margin-bottom: 15px;
        }
        
        input, input::placeholder{
            display: block;
            width: 70%;
    border-radius: 7px;
    background-color: #CBCBCB;
    color: rgba(28, 45, 60, 0.77);
    border: none;
    font-family: 'Urbanist';
    font-size: 15px;
    font-weight: 520;
    padding: 12px;
    margin: 0px auto;
    margin-bottom: 15px;
        }
    </style>
</head>
<body>
<img class="bg" src="./images/college.png"/>
<div class="main">
    <div class="left">
        <img class="logo" src="./images/logo.svg"/>
    </div>
    <div class="right">
        <div class="box">
            <div class="title">Registration</div>
            <div class="steps">Step 2 of 3</div>
            <div class="btns">
                <div class="btn_1">Back</div>
                <?php
                if($i<=3){
                    echo '<div onclick=document.getElementById("add").style.display="flex" class="btn_2">Add Members</div>';
                }
                ?>
            </div>
            <form action="./step_3.html">
            <?php
                $sql = "SELECT * FROM `members` WHERE tnr='$tnr'";
                $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

                //create an array
                $emparray = array();
                while($row =mysqli_fetch_assoc($result))
                {
                   echo '<div class="mem">'.$row['name'].'<img onclick=document.getElementById("'.$row['id'].'").style.display="flex" class="edit" src="./images/Edit.svg"/></div>';
                }
                if($i>=3){
echo '<input type="submit" value="Continue">';
                }
            ?>
            </form>
        </div>
    </div>
</div>
<div id="add" class="popup">
    <div class="pop">
        <div class="title_2">Add Member</div>
        <form action="./add_member.php" method="get">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="email" placeholder="Email-Id">
        <input type="text" name="phone" placeholder="Phone Number">
        <input type="text" name="college" placeholder="college Name">
        <input type="text" name="year" placeholder="Current Year">
        <input type="hidden" name="tnr" value="<?php echo $tnr ?>">
       <div class="btns"><input type="submit" value="Save"></div> 
    </form>
    </div>
</div>



<?php
                $sql = "SELECT * FROM `members` WHERE tnr='$tnr'";
                $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

                
                while($row =mysqli_fetch_assoc($result))
                {
                   echo '<div id="'.$row['id'].'" class="popup">
                   <div class="pop">
                       <div class="title_2">Edit Member</div>
                       <form action="./edit_member.php">
                       <input type="text" placeholder="Name" name="name" value="'.$row['name'].'">
                       <input type="text" placeholder="Email-Id" name="email" value="'.$row['email'].'">
                       <input type="text" placeholder="Phone Number" name="phone" value="'.$row['phone'].'">
                       <input type="text" placeholder="college Name" name="college" value="'.$row['college'].'">
                       <input type="text" placeholder="Current Year" name="year" value="'.$row['year'].'">
                       <input type="hidden" name="id" value="'.$row['id'].'">
                       <input type="hidden" name="tnr" value="'.$row['tnr'].'">
                      <div class="btns"><input type="submit" name="btn" value="Delete"><input name="btn" type="submit" value="Save"></div> 
                   </form>
                   </div>
               </div>';
                }

                //close the db connection
                mysqli_close($conn);
            ?>

</body>
</html>
