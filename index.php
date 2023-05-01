<?php 
include "config.php";

$sql = "SELECT * FROM userinfo";
$result = $connection->query($sql);

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
    <nav class="navbar navbar-light justify-content-center fs-4 mb-5" style="background-color: cyan;">
    Student_Management_System</nav>
    
    <?php
      $msg = $_GET['msg'];

      echo '<div class="alert alert-info alert-dismissible fade show mx-4" role="alert">';
      echo '<strong>Success operation!</strong> ' . $msg;
      echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
      echo '</div>';
      ?>





      
      
    <div class="container">


        <a href="create.php" class="btn btn-info mb-4 ">Add a new student</a>

        <form action="export-pdf.php" method="post" class="mb-4">
          <input type="submit" name="submit" class="btn btn-success" value="Export to PDF">
        </form>

        <table class="table table-hover text-center">
          <thead class="table-success">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">FirstName</th>
                <th scope="col">LastName</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Action</th>
                

              </tr>
            </thead>
            <tbody>
            <?php 
              include "config.php";

              $sql = "SELECT * FROM userinfo";
              $result = $connection->query($sql);

              while($row = $result->fetch_assoc()){
                ?>
               <tr>
                <th><?php echo $row['id'] ?></th>
                <td><?php echo $row['firstname'] ?></td>
                <td><?php echo $row['lastname'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['gender'] ?></td>
                <td>
                  <a href="edit.php?id=<?php echo $row['id']?>" class="link-info"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                  <a href="delete.php?id=<?php echo $row['id']?>" class="link-info"><i class="fa-solid fa-trash fs-5 "></i></a>
                </td>
              </tr>
                <?php
              }
            ?>
              
              
            </tbody>
          </table>
    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>