<?php
require_once("../incs/conn.php");
require_once("../functions/authenticate.php");
if(isset($_POST["fname1"])){
    
    //set form variables
    $email = $_SESSION['email'];
    $fname = mysqli_real_escape_string($dbc,strip_tags($_POST['fname1']));
    $lname = mysqli_real_escape_string($dbc,strip_tags($_POST['lname1']));
    $idno = mysqli_real_escape_string($dbc,strip_tags($_POST['idno1']));
    $phone = mysqli_real_escape_string($dbc,strip_tags($_POST['phone1']));
    $employed1 = mysqli_real_escape_string($dbc,strip_tags($_POST['employed1']));
    $income    = mysqli_real_escape_string($dbc,strip_tags($_POST['income']));
    $fname2 = mysqli_real_escape_string($dbc,strip_tags($_POST['fname2']));
    $lname2 = mysqli_real_escape_string($dbc,strip_tags($_POST['lname2']));
    $idno2 = mysqli_real_escape_string($dbc,strip_tags($_POST['idno2']));
    $phone2 = mysqli_real_escape_string($dbc,strip_tags($_POST['phone2']));
    $employed2 = mysqli_real_escape_string($dbc,strip_tags($_POST['employed2']));
    $income2    = mysqli_real_escape_string($dbc,strip_tags($_POST['income2']));
    
    
    
    //start transaction
    $begin = "BEGIN WORK";
    $result = mysqli_query($dbc,$begin);
    if(!$result)
    {
        echo "error";
    }
    else
    {
        
    $insert = "UPDATE family SET parents='both', mothersFname='".$fname."', mothersLname='".$lname."',mothersID='".$idno."',
                motherPhone='".$phone."',mumEmployed='".$employed1."', mothersIncome='".$income."',
                fathersFname='".$fname2."', fathersLname='".$lname2."',fathersID='".$idno2."',
                fathersPhone='".$phone2."', dadEmployed='".$employed2."', fathersIncome='".$income2."'
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
        $find = mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM account WHERE email='".$email."'"));
       if($find !=0)
       {
       $sql = "UPDATE account SET email='".$email."' WHERE email='".$email."'";
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
            $sql = "INSERT INTO account (email) VALUES ('".$email."')";
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
elseif(isset($_POST["fname3"]))
{
            //set form variables
    $email = $_SESSION['email'];
    $fname3 = mysqli_real_escape_string($dbc,strip_tags($_POST['fname3']));
    $lname3 = mysqli_real_escape_string($dbc,strip_tags($_POST['lname3']));
    $idno3 = mysqli_real_escape_string($dbc,strip_tags($_POST['idno3']));
    $phone3 = mysqli_real_escape_string($dbc,strip_tags($_POST['phone3']));
    $employed3 = mysqli_real_escape_string($dbc,strip_tags($_POST['employed3']));
    $income3    = mysqli_real_escape_string($dbc,strip_tags($_POST['income3']));
    
    
    
    //start transaction
    $begin = "BEGIN WORK";
    $result = mysqli_query($dbc,$begin);
    if(!$result)
    {
        echo "error";
    }
    else
    {
        
    $insert = "UPDATE family SET parents='mother', mothersFname='".$fname3."', mothersLname='".$lname3."',mothersID='".$idno3."',
                motherPhone='".$phone3."',mumEmployed='".$income3."', mothersIncome='".$income3."'
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
        $find = mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM account WHERE email='".$email."'"));
       if($find !=0)
       {
       $sql = "UPDATE account SET email='".$email."'";
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
            $sql = "INSERT INTO account (email) VALUES ('".$email."')";
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
elseif(isset($_POST["fname4"]))
{
            //set form variables
    $email = $_SESSION['email'];
    $fname4 = mysqli_real_escape_string($dbc,strip_tags($_POST['fname4']));
    $lname4 = mysqli_real_escape_string($dbc,strip_tags($_POST['lname4']));
    $idno4 = mysqli_real_escape_string($dbc,strip_tags($_POST['idno4']));
    $phone4 = mysqli_real_escape_string($dbc,strip_tags($_POST['phone4']));
    $employed4 = mysqli_real_escape_string($dbc,strip_tags($_POST['employed4']));
    $income4    = mysqli_real_escape_string($dbc,strip_tags($_POST['income4']));
    
    
    
    //start transaction
    $begin = "BEGIN WORK";
    $result = mysqli_query($dbc,$begin);
    if(!$result)
    {
        echo "error";
    }
    else
    {
        
    $insert = "UPDATE family SET parents='father', fathersFname='".$fname4."', fathersLname='".$lname4."',fathersID='".$idno4."',
                fathersPhone='".$phone4."', dadEmployed='".$employed4."',fathersIncome='".$income4."'
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
        $find = mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM account WHERE email='".$email."'"));
       if($find !=0)
       {
       $sql = "UPDATE account SET email='".$email."'";
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
            $sql = "INSERT INTO account (email) VALUES ('".$email."')";
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
elseif(isset($_POST["fname5"]))
{
            //set form variables
    $email = $_SESSION['email'];
    $fname5 = mysqli_real_escape_string($dbc,strip_tags($_POST['fname5']));
    $lname5 = mysqli_real_escape_string($dbc,strip_tags($_POST['lname5']));
    $idno5 = mysqli_real_escape_string($dbc,strip_tags($_POST['idno5']));
    $phone5 = mysqli_real_escape_string($dbc,strip_tags($_POST['phone5']));
    $employed5 = mysqli_real_escape_string($dbc,strip_tags($_POST['employed5']));
    $income5    = mysqli_real_escape_string($dbc,strip_tags($_POST['income5']));
    
    
    
    //start transaction
    $begin = "BEGIN WORK";
    $result = mysqli_query($dbc,$begin);
    if(!$result)
    {
        echo "error";
    }
    else
    {
        
    $insert = "UPDATE family SET parents='guardian', guardiansFname='".$fname5."', guardiansLname='".$lname5."',guardiansID='".$idno5."',
                guardiansPhone='".$phone5."',guardianEmployed='".$employed5."', guardiansIncome='".$income5."'
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
        $find = mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM account WHERE email='".$email."'"));
       if($find !=0)
       {
       $sql = "UPDATE account SET email='".$email."'";
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
            $sql = "INSERT INTO account (email) VALUES ('".$email."')";
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