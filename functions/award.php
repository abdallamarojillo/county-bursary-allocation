<?php
require_once("../incs/conn.php");
require_once("../functions/authenticate.php");
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   
    $disburseAmount = mysqli_real_escape_string($dbc,strip_tags($_POST['disburseAmount']));
   //check submitted applications and verified accounts 
    $s = mysqli_query($dbc,"SELECT * FROM submission WHERE status='submitted' &&
            verification='verified'");
    while($row = mysqli_fetch_assoc($s))
    {
           $email = $row['email'];

            $amountUpdate = "UPDATE account SET amountReceived =amountReceived+".$disburseAmount.",
                              awardStatus='awarded' WHERE email='".$email."'";
                     
            if($queryUpdate = mysqli_query($dbc,$amountUpdate))
            {
                echo "Bursary Disbursed Successfully";
            }
            else
            {
                echo "Failed to Disburse. Please try again";
            }
    }
    

}
else
{
    echo "Please try again";
}
