<?php
require_once("../incs/conn.php");
if(isset($_POST["email"])){
    
//set form variables
$email = mysqli_real_escape_string($dbc,strip_tags($_POST['email']));
$password= SHA1(mysqli_real_escape_string($dbc,strip_tags($_POST['password'])));
$password1 = SHA1(mysqli_real_escape_string($dbc,strip_tags($_POST['password1'])));


//check for duplicate email in database
$check = "SELECT email FROM users WHERE email='".$email."'";
if($query = mysqli_query($dbc,$check)){
    if($num = mysqli_num_rows($query) ==1){
        exit($error = "emailExists");
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
$insert = "INSERT INTO users (email,password) VALUES
            ('".$email."','".$password."')";
$result = mysqli_query($dbc,$insert);
if(!$result)
{
    echo "An error occured while registering";
    $sql = "ROLLBACK";
    $result = mysqli_query($dbc,$sql);
}
else
{
    $id = mysqli_insert_id($dbc);
    //$sql = "INSERT INTO profile (ProfileId,Email) VALUES ('".$id."','".$Email."')";
   $sql = "INSERT INTO personal (email) VALUES ('".$email."')";
    $result = mysqli_query($dbc,$sql);
    if(!$result)
    {
       echo "2 :An error occured while registering";
       $sql = "ROLLBACK";
       $result = mysqli_query($dbc,$sql);
    }
    else
    {
        $sql = "COMMIT";
        $result = mysqli_query($dbc,$sql);
        echo "Successfully registered";
    }
}
}
}
else
{
    exit($error = "Button not set");
}


?>