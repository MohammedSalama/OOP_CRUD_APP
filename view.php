<?php 

session_start();

require_once ('config/dbconfig.php');

$db = new operations();
$result = $db->View_Record();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Operation in Php Using OOP</title>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="text-center text-dark"> Employees Record</h2>
                    </div>
                    <div class="card-body">
                        <?php 
                            $db->disply_message();
                            $db->disply_message();
                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <td style="width: 10%">Id</td>
                                <td style="width: 20%">First Name</td>
                                <td style="width: 20%">Last Name</td>
                                <td style="width: 20%">User Name</td>
                                <td style="width: 20%">E-mail</td>
                                <td style="width: 20%" colspan="2">Operations</td>
                            </tr>
                            <tr>
                                <?php 
                                    while($data = mysqli_fetch_assoc($result))
                                    {
                                        ?>
                                        <td><?= $data['id']; ?></td>
                                        <td><?= $data['FirstName']; ?></td>
                                        <td><?= $data['LastName']; ?></td>
                                        <td><?= $data['UserName']; ?></td>
                                        <td><?= $data['Email']; ?></td>
                                        <td> <a href="edit.php?U_ID=<?= $data['id'];?>" class="btn btn-success">Edit</a></td>
                                        <td> <a href="delete.php?D_ID=<?= $data['id'];?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
</body>
</html>