<?php
require_once("../incs/conn.php");
require_once("../functions/authenticate.php");
if(isset($_POST["fname"])){
    
//set form variables
$fname = mysqli_real_escape_string($dbc,strip_tags($_POST['fname']));
$mname = mysqli_real_escape_string($dbc,strip_tags($_POST['mname']));
$lname = mysqli_real_escape_string($dbc,strip_tags($_POST['lname']));
$email = $_SESSION['email'];
$id    = mysqli_real_escape_string($dbc,strip_tags($_POST['idno']));
$phone = mysqli_real_escape_string($dbc,strip_tags($_POST['phone']));
$disability = mysqli_real_escape_string($dbc,strip_tags($_POST['disability']));
$constituency = mysqli_real_escape_string($dbc,strip_tags($_POST['constituency']));
$ward = mysqli_real_escape_string($dbc,strip_tags($_POST['ward']));
$town = mysqli_real_escape_string($dbc,strip_tags($_POST['town']));


//check for duplicate phone in database
$check = "SELECT phoneNumber FROM personal WHERE phoneNumber='".$phone."' && email!='".$_SESSION['email']."'";
if($query = mysqli_query($dbc,$check)){
    if($num = mysqli_num_rows($query) ==1){
        exit($error = "phoneExists");
    }
}
//start transaction
$begin = "BEGIN WORK";
$result = mysqli_query($dbc,$begin);
if(!$result)
{
    echo "an error occured";
}
else
{
    
$insert = "UPDATE personal SET firstName='".$fname."', middleName='".$mname."',lastName='".$lname."',email='".$email."',
           IDNumber='".$id."',phoneNumber='".$phone."', disability='".$disability."', constituency='".$constituency."',
           ward='".$ward."',town='".$town."'
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
  // $sql = "INSERT INTO education (email) VALUES ('".$email."')";
   $find = mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM education WHERE email='".$email."'"));
   if($find !=0)
   {
        $sql = "UPDATE education SET email='".$email."' WHERE email='".$email."'";
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
         $sql = "INSERT INTO education (email) VALUES ('".$email."')";
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