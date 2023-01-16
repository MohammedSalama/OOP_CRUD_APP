<?php


require_once ('./Config/dbconfig.php');

$db = new operations();
if (isset($_GET['D_ID'])) 
{
    global $db;

    $id = $_GET['D_ID'];

    if($db->Delete_Record($id))
    {
        $db->set_message('<div class="alert alert-danger"> Your Record Has Been Deleted Successfully </div>');
        header("location:view.php");
    }
    else
    {
        $db->set_message('<div class="alert alert-danger"> Something Wrong To Delete The Record </div>');
    }
}


?>