<?php
require_once("../incs/conn.php");
require_once("../functions/authenticate.php");
if($_SERVER['REQUEST_METHOD'] =='POST')
{
    $valid =  array('success' =>false,'messages' => array());
    $level = $_POST['level'];
    $year = $_POST['year'];
    $type = explode('.',$_FILES['fileName']['name']);
    $type = $type[count($type) -1];
    $url = '../uploads/' .uniqid(rand()) . '.' . $type;

    if(in_array($type,array('gif','jpg','jpeg','png','PNG','JGP','pdf')))
    {
           if(is_uploaded_file($_FILES['fileName']['tmp_name']))
           {
                      if(move_uploaded_file($_FILES['fileName']['tmp_name'],$url)){
                                 
                             //insert data to database
                             $begin = "BEGIN WORK";
                             $result = mysqli_query($dbc,$begin);
                             if(!$result){
                                exit('error');
                             }
                             else
                             {
                                
                             }
                             $insert = "UPDATE perfomance SET level='".$level."', year='".$year."',
                                        transcript='".$url."' WHERE email='".$_SESSION['email']."'"; 
                             $result = mysqli_query($dbc,$insert);
                             if(!$result)
                            {
                                exit('error');
                                $sql = "ROLLBACK";
                                $result = mysqli_query($dbc,$sql);
                            }
                            else
                            {
                                $id = mysqli_insert_id($dbc);
                                //$sql = "INSERT INTO profile (ProfileId,Email) VALUES ('".$id."','".$Email."')";
                                $find = mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM family WHERE email='".$_SESSION['email']."'"));
                                if($find !=0)
                                {
                                    $sql = "UPDATE family SET email='".$_SESSION['email']."' WHERE email='".$_SESSION['email']."'";
                                    $result = mysqli_query($dbc,$sql);
                                    if(!$result)
                                    {
                                       exit('error');
                                       $sql = "ROLLBACK";
                                       $result = mysqli_query($dbc,$sql);
                                    }
                                    else
                                    {
                                        $sql = "COMMIT";
                                        $result = mysqli_query($dbc,$sql);
                                        exit('success');
                                    }
                                }
                                else
                                {
                                    $sql = "INSERT INTO family (email) VALUES ('".$_SESSION['email']."')";
                                    $result = mysqli_query($dbc,$sql);
                                    if(!$result)
                                    {
                                       exit('error');
                                       $sql = "ROLLBACK";
                                       $result = mysqli_query($dbc,$sql);
                                    }
                                    else
                                    {
                                        $sql = "COMMIT";
                                        $result = mysqli_query($dbc,$sql);
                                        exit('success');
                                    } 
                                }
                            }
                           
                      }
           }
    }
    else
    {
        exit('extension');
    }
}

?>