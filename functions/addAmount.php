<?php
require_once("../incs/conn.php");
require_once("../functions/authenticate.php");

if(isset($_POST['amountAdded']))
{
    $amount = mysqli_real_escape_string($dbc,strip_tags($_POST['amountAdded']));
    
    $update = mysqli_query($dbc, "UPDATE bursaries SET amount = amount+".$amount." WHERE id=1") or die("Failed to add amount");
    if($update)
    {
        echo "Amount Added";
    }
}

?>