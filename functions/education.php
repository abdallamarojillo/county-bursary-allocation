<?php
require_once("../incs/conn.php");
require_once("../functions/authenticate.php");
if(isset($_POST["primary"])){
    
//set form variables
$primary = mysqli_real_escape_string($dbc,strip_tags($_POST['primary']));
$ptype = mysqli_real_escape_string($dbc,strip_tags($_POST['ptype']));
$high = mysqli_real_escape_string($dbc,strip_tags($_POST['high']));
$htype = mysqli_real_escape_string($dbc,strip_tags($_POST['htype']));
$college    = mysqli_real_escape_string($dbc,strip_tags($_POST['college']));
$ctype = mysqli_real_escape_string($dbc,strip_tags($_POST['ctype']));
$email = $_SESSION['email'];


//start transaction
$begin = "BEGIN WORK";
$result = mysqli_query($dbc,$begin);
if(!$result)
{
    echo "an error occured";
}
else
{
    
$insert = "UPDATE education SET primaryschool='".$primary."', ptype='".$ptype."',highschool='".$high."',
            htype='".$htype."', college='".$college."', ctype='".$ctype."'
           WHERE email='".$_SESSION['email']."'";
$result = mysqli_query($dbc,$insert);
if(!$result)
{
    echo "An error occured while saving";
    $sql = "ROLLBACK";
    $result = mysqli_query($dbc,$sql);
}
else
{
    $id = mysqli_insert_id($dbc);
    //$sql = "INSERT INTO profile (ProfileId,Email) VALUES ('".$id."','".$Email."')";
   $find = mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM perfomance WHERE email='".$email."'"));
   if($find !=0)
   {
   $sql = "UPDATE perfomance SET email='".$email."' WHERE email='".$email."'";
    $result = mysqli_query($dbc,$sql);
    if(!$result)
    {
       echo "2 :An error occured while saving";
       $sql = "ROLLBACK";
       $result = mysqli_query($dbc,$sql);
    }
    else
    {
        $sql = "COMMIT";
        $result = mysqli_query($dbc,$sql);
        echo "success";
    }
   }
   else
   {
     $sql = "INSERT INTO perfomance (email) VALUES ('".$email."')";
    $result = mysqli_query($dbc,$sql);
    if(!$result)
    {
       echo "2 :An error occured while saving";
       $sql = "ROLLBACK";
       $result = mysqli_query($dbc,$sql);
    }
    else
    {
        $sql = "COMMIT";
        $result = mysqli_query($dbc,$sql);
        echo "success";
    }
   }
}
}

}
else
{
    exit($error = "Button not set");
}


?>