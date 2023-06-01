<?php
session_start();
$host = "localhost";
$username = "root";
$password = '';
$database = "book_store";

$con = mysqli_connect($host, $username, $password, $database);
if (!$con) {
    die("failed" . mysqli_connect_error($con));
}

// if (isset($_SESSION['user_id'])) {
//   if (isset($_SESSION['is_admin'])) {
//       header("Location: admin/index.php");
//       exit();
//   } else {
//       header("Location: index.php");
//       exit();
//   }
// }



if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $query = "SELECT * FROM user WHERE email = '$email' AND password='$password'";
    $result = mysqli_query($con, $query);
    $user = mysqli_fetch_assoc($result);
    if ($user) 
    { $_SESSION['user_id'] = $user['id'];
        if ($user['type'] == 'admin') {
            //$_SESSION['is_admin'] = true;
            header("Location: admin/index.php");
            exit();
            
        } else {
            header("Location: index.php");
            exit();
           
        }
    } 
    else {
        $msg = "Incorrect email or password";
    }
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <link rel="stylesheet" href="assets/CSS/all.min.css">
    <link rel="stylesheet" href="assets/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="assets/CSS/style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-dark"data-bs-theme="dark">
            <div class="container">
              <a class="navbar-brand" href="#">Books Store</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto" >
                  <li class="nav-item">
                    <a class="nav-link " href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active"aria-current="page" href="login.php">login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Register.php">register</a>
                  </li>
                  
                </ul>
              </div>
            </div>
          </nav>
    </header>
  <main> 
      <section class="form-login">
        <div class="content">
        <?php  if(isset($msg)) { ?>
         <div class="alert alert-danger" >
         <?php echo $msg; ?>
         </div>
        <?php } ?>
        <h1>Login to your account</h1>   
        <form method="POST">
         <div class="input-form">
         <label> Email </label>
        <input type="email" placeholder="Email" name="email">
         </div>
         <div class="input-form">
         <label> Password </label>
        <input type="password" placeholder="Password" name="password">
         </div>
         <input type="submit" value="Login" name="login" class="submit-btn">             
        </form>
      
     </div>
    </section>
</main>
<footer class="bg-light py-4">
     <div class="container">
      <div class="foot d-flex justify-content-between" >
        <p> ALL copyright reserved to <a href="#">Mohammed Naji Abu Alqumbuz </a><i class="fa-regular fa-copyright"></i> 2023
        </p>
        <div>
           <a href="#"><i class="fab fa-facebook-f"></i></a>
           <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
        
    </div>
    
    
    </footer>
<script src="assets/JS/script.Js"></script>  
<script src="assets/JS/bootstrap.bundle.min.js"></script>  
</body>
</html>  