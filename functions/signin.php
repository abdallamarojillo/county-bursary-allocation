<?php
require_once("../incs/conn.php");
date_default_timezone_set('Africa/Nairobi');//set the time zone according to the time zone you re in

if(isset($_POST['uemail'])){
$Email = mysqli_real_escape_string($dbc,strip_tags($_POST['uemail']));
$Password = SHA1(mysqli_real_escape_string($dbc,strip_tags($_POST['upassword'])));

//select matching records from  database
$select = mysqli_query($dbc,"SELECT * FROM users WHERE email='".$Email."' && password='".$Password."'") or die ("Failed");

if(mysqli_num_rows($select) > 0)
{
    session_start();
    while($row = mysqli_fetch_array($select))
    {
       $_SESSION['email'] = $row['email'];
       $_SESSION['level'] = 'null';
    }
    exit("success");
}
else
{
    exit($login_error = "Wrong Email and Password Combination <i class='material-icons'>error</i>");
}

}




?>