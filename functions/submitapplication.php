<?php
require_once("../incs/conn.php");
require_once("../functions/authenticate.php");
if($_SERVER['REQUEST_METHOD'] =='POST'){
    
$update = mysqli_query($dbc, "UPDATE submission SET status='submitted' WHERE email='".$_SESSION['email']."'")
                       or die ("Failed to submit");
            
}
else
{
    exit($error = "Button not set");
}


?>