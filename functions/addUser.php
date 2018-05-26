<?php
require_once("../incs/conn.php");
require_once("../functions/authenticate.php");
if(isset($_POST["email"])){
    
//set form variables
$email = mysqli_real_escape_string($dbc,strip_tags($_POST['email']));
$level = mysqli_real_escape_string($dbc,strip_tags($_POST['userlevel']));
$password = SHA1(mysqli_real_escape_string($dbc,strip_tags($_POST['password'])));
$cpassword = SHA1(mysqli_real_escape_string($dbc,strip_tags($_POST['cpassword'])));


//check for duplicate email in database
$check = "SELECT email FROM staff WHERE email='".$email."'";
if($query = mysqli_query($dbc,$check)){
    if($num = mysqli_num_rows($query) ==1){
        exit($error = "The user $email is already in use in this system");
    }
}
$sql = "INSERT into staff (email,password,level) VALUES ('".$email."','".$password."','".$level."')";
if(mysqli_query($dbc,$sql))
{
    $added = "<h3 class='green-text center'>User Added
                    <br/>
                    <i class='material-icons'>done</i>
                    </h3>";
        echo $added;
}
else
{
    echo "User failed to Insert";
}

}
else
{
    echo "Not Posted";
}


?>