<?php 
session_start();

require_once ('config/dbconfig.php');

$db = new operations();
$db->update();
$id = $_GET['U_ID'];
$result = $db->get_Record($id);
$data = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Operation in Php Using OOP</title>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2> Update Record </h2>
                    </div>
                        <?php 
                            $db->update();

                        ?>
                        <div class="card-body">
                            <form method="post">
                                <input type="hidden" name="id" value="<?= $data['id']?>">
                                <input type="text" name="First" placeholder=" First Name" class="form-control mb-2" required value="<?= $data['FirstName']?>">
                                <input type="text" name="Last" placeholder=" Last Name" class="form-control mb-2" required value="<?= $data['LastName']?>">
                                <input type="text" name="UserName" placeholder=" User Name" class="form-control mb-2" required value="<?= $data['UserName']?>">
                                <input type="Email" name="UserEmail" placeholder=" Email " class="form-control mb-2" required value="<?= $data['Email']?>">
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" name="btn_update"> Update </button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>