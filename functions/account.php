<?php
require_once("../incs/conn.php");
require_once("../functions/authenticate.php");
if(isset($_POST["acName"])){
    
//set form variables
$admin = mysqli_real_escape_string($dbc,strip_tags($_POST['adminNo']));
$feeBalance = mysqli_real_escape_string($dbc,strip_tags($_POST['feeBalance']));
$acname = mysqli_real_escape_string($dbc,strip_tags($_POST['acName']));
$acnumber = mysqli_real_escape_string($dbc,strip_tags($_POST['acNumber']));
$amount = mysqli_real_escape_string($dbc,strip_tags($_POST['amount']));
$email = $_SESSION['email'];

$begin = "BEGIN WORK";
$result = mysqli_query($dbc,$begin);
if(!$result)
{
    echo "error";
}
else
{
    
$insert = "UPDATE account SET adminNo='".$admin."', feeBalance='".$feeBalance."', accountName='".$acname."', accountNumber='".$acnumber."',
            amount='".$amount."'
            WHERE email='".$email."'";
$result = mysqli_query($dbc,$insert);
if(!$result)
{
    echo "error";
    $sql = "ROLLBACK";
    $result = mysqli_query($dbc,$sql);
}
else
{
    $id = mysqli_insert_id($dbc);
    //$sql = "INSERT INTO profile (ProfileId,Email) VALUES ('".$id."','".$Email."')";
    $find = mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM submission WHERE email='".$email."'"));
   if($find !=0)
   {
    $sql = "UPDATE submission SET email='".$email."'";
     $result = mysqli_query($dbc,$sql);
     if(!$result)
     {
        echo "error";
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
        $sql = "INSERT INTO submission (email) VALUES ('".$email."')";
     $result = mysqli_query($dbc,$sql);
     if(!$result)
     {
        echo "error";
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