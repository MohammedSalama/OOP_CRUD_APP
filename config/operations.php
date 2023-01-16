<?php 

require_once ('./config/dbconfig.php');
$db = new dbConfig();

class operations extends dbConfig
{
    // Insert Record in the Database 
    public function Store_Record()
    {
        global $db;

        if (isset($_POST['btn_save']))
        {
            $FirstName = $db->check($_POST['First']);
            $LastName = $db->check($_POST['Last']);
            $UserName = $db->check($_POST['UserName']);
            $UserEmail = $db->check($_POST['UserEmail']);

            if ($this->Insert_Record($FirstName,$LastName,$UserName,$UserEmail))
            {
                echo '<div class="alert alert-success"> Your Record Has Been Saved :) </div>';
            }
            else 
            {
                echo '<div class="alert alert-danger"> Failed </div>';
            }
        }
    }

    // Insert Record in the Database Using Query
    function Insert_Record($a,$b,$c,$d) 
    {
        global $db;
        $query = "insert into employees (FirstName,LastName,UserName,Email) values ('$a','$b','$c','$d')";
        $result = mysqli_query($db->connection,$query);

        if ($result)
        {
            return true;
        }
        else 
        {
            return false;
        }
    }

    // View Database Record 
    public function View_Record()
    {
        global $db;
        $query = "select * from employees";
        $result = mysqli_query($this->connection,$query);
        return $result;
    }

    // Get Particular Record 
    public function get_Record($id)
    {
        global $db;
        $sql = "select * from employees where id = '$id' ";
        $data = mysqli_query($db->connection,$sql);
        return $data;
    }

    // Update Record 
    public function update()
    {
        global $db;

        if (isset($_POST['btn_update'])) 
        {
            $id = $_POST['id'];
            $FirstName = $db->check($_POST['First']);
            $LastName  = $db->check($_POST['Last']);
            $UserName  = $db->check($_POST['UserName']);
            $email     = $db->check($_POST['UserEmail']);

            if ($this->update_record($id,$FirstName,$LastName,$UserName,$email))
            {
                $this->set_message('<div class="alert alert-success"> Your Record Has Been Updated : </div>');
                header("location : view.php");
            }
            else
            {
                $this->set_message('<div class="alert alert-success"> Something Wrong :  </div>');
            }
        }
    }

    // Update Function 2
    public function update_record($id,$First,$Last,$User,$email)
    {
        global $db;

        $sql = "update employees set FirstName= '$First', LastName = '$Last' , UserName='$User' , Email='$email' where id = '$id' ";
        $result = mysqli_query($db->connection,$sql);

        if ($result)
        {
            return true;
        }
        else 
        {
            return false;
        }
    }

    // Set Session Message 
    public function set_message($msg)
    {
        if (! empty($msg))
        {
            $_SESSION['Message'] = $msg;
        }
        else 
        {
            $msg = "";
        }
    }   

    // Disply Session Message
    public function disply_message()
    {
        if (isset($_SESSION['Message']))
        {
            echo $_SESSION['Message'];
            unset($_SESSION['Message']);
        }    
    }

    // Delete Record 
    public function Delete_Record($id)
    {
        global $db;

        $query = "delete from employees where id = '$id' ";

        $result = mysqli_query($db->connection,$query);

        if ($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}