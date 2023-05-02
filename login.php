 <?php 

include "config.php";

if(isset($_POST['submit'])){
    $password_entered = md5($_POST['password']);
    $email_entered = $_POST['email'];
    $sql  = "SELECT * FROM userinfo where email = '$email_entered' and password = '$password_entered'";
    $result = $connection->query($sql);

    $row = $result->fetch_assoc();
    $email = $row['email'];
    $password = $row['password'];

    if($password == $password_entered && $email_entered == $email){
        $msg = "User logged in successfully";
        header("Location: index.php?msg=".$msg);
    } else{
        echo "Invalid credentials";
    }


    
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body class="bg-white">
    <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width:50vw; min-width:300px" class="bg-white mt-4 p-4">
            <div class="row mb-3">
                <h1 class="text-center text-primary">Login page</h1>
                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password:</label>
                    <input type="password" class="form-control" name="password" placeholder="**********">
                </div>
                <div>
                    <button type="submit" class="btn btn-info" name="submit">Login</button>
                </div>
            </div>
        </form>
</body>
</html>