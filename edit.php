<?php 

include "config.php";
$id = $_GET['id'];

if(isset($_POST['submit'])){
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    echo "$firstname $lastname $email $gender";

    
    $sql = "UPDATE userinfo SET firstname = '$firstname', lastname = '$lastname', email = '$email', gender = '$gender' WHERE id = '$id'";


    $result = $connection->query($sql);

    if($result){
        $msg = "The record updated successfully.";
        header("Location: index.php?msg=".$msg);
    }
    else{
        echo "Failed " . $connection->connect_error ;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Crud Application</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: cyan;">
   STUDENT MANAGEMENT SYSTEM</nav>
    <!-- Bootstrap -->

    <div class="container">
        <div class="text-center mb-4">
            <h3>Update student information</h3>
            <p class="text-muted">Click update after updating any information</p>
        </div>

        <?php 
        
         $sql = "SELECT * FROM userinfo WHERE id = '$id'";
         $result = $connection->query($sql);
         $row = $result->fetch_assoc();
        ?>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">First Name:</label>
                        <input type="text" class="form-control" name="first_name" value="<?php  echo $row['firstname']?>">
                    </div>
                    <div class="col">
                        <label class="form-label">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" value="<?php  echo $row['lastname']?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name:</label>
                        <input type="email" class="form-control" name="email" value="<?php  echo $row['email']?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="**********"  value="<?php  echo $row['password']?>">
                    </div>
                    <div class="form-group mb-3">
                        <label>Gender:</label> &nbsp;
                        <input type="radio" class="form-check-input" name="gender" id="male" value="male" <?php echo ($row['gender'] == 'Male')? "checked":"" ?> >
                        <label for="male" class="form-input-label">Male</label>
                        &nbsp;
                        <label>Gender:</label>
                        <input type="radio" class="form-check-input" name="gender" id="female" value="female" <?php echo ($row['gender']) == 'Female'? "checked":""?>>
                        <label for="female" class="form-input-label">Female</label>
                         
                    </div>
                    <div>
                        <button type="submit" class="btn btn-info" name="submit">Update</button>
                        <a href="index.php" class="btn btn-success">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>