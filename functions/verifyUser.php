<?php
require_once("../incs/conn.php");
require_once("../functions/authenticate.php");
if(isset($_POST['status']))
{
   // $repairId= $_REQUEST['repairId'];
    $id = mysqli_real_escape_string($dbc,$_POST['id']);
    $status = mysqli_real_escape_string($dbc,$_POST['status']);
    $comment = mysqli_real_escape_string($dbc,$_POST['comment']);
    
    
    $amountUpdate = "UPDATE submission SET comment='".$comment."',
                    verification ='".$status."'
                     WHERE id='".$id."'";
                     
    if($queryUpdate = mysqli_query($dbc,$amountUpdate))
    {
        echo "Verification made";
    }
    else
    {
        echo "Failed to Update. Please try again";
    }
}
else
{
    echo "Please try again";
}
