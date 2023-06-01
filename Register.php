
<?php
session_start();
$host = "localhost";
$username="root";
$password = '';
$database = "book_store";
 
$con = mysqli_connect($host,$username,$password,$database);
    if(!$con){
        die("failed" .mysqli_connect_error($con));
      } 

  if (isset($_POST['add'])) { 
    $name= $_POST['name'];
    $password = sha1($_POST['password']);
    $email = $_POST['email'];
    $age = $_POST['age'];
    $phoneNumber = $_POST['phoneNumber'];
    $country = $_POST['country'];
    $cofirm_password=sha1($_POST['cofirm_password']);
    $sqlCheckEmail = "select * from `user` where email='$email'";
    $email_query = mysqli_query($con, $sqlCheckEmail);
       
             if(mysqli_num_rows($email_query) > 0){
                 $resultMsg= "This Email is allready registered !!"; 
            }
              else if($cofirm_password != $password){
                $resultMsg ="the two passward are not equal !!";}
                
                else{
                  $query_add = "INSERT INTO   `user` (name, password, email, age, phoneNumber,country)
                 values('$name', '$password', '$email','$age','$phoneNumber','$country')";
                    if(mysqli_query($con,$query_add)){
                      $resultMsg =  "you have created an account successfully";
                      header("Location: login.php");
                    }
                    
                }

                }

?>
<!--******************* Html**************************** -->
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
                    <a class="nav-link " aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="login.php">login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="Register.php">register</a>
                  </li>
                  
                </ul>
              </div>
            </div>
          </nav>
    </header>
<main>
    <section class="form-login" style="padding:10px 0" >
     <div class="content">
      <?php  if(isset($resultMsg)) { ?>
      <div class="alert alert-success" >
       <?php echo $resultMsg; ?>
       </div>
      <?php } ?>
      <h1>Creat new account</h1>   
      <form method="post">
        <div class="input-form">
          <label> Name </label>
          <input type="text" placeholder="Name" name="name">
          <div class="input-form">
            <label> Email </label>
            <input type="email" placeholder="Email"name="email">
            </div>
          </div>
        <div class="input-form">
          <label> Url </label>
          <input type="url" placeholder="www.example.com">
          </div>
          <div class="input-form">
            <label> Age </label>
            <input type="number" placeholder="18" name="age">
            </div>
            <div class="input-form">
              <label> Phone number</label>
              <input type="number" placeholder="Phone number"name="phoneNumber">
              </div>
              <div class="input-form">
                <label> Country</label>
                <input type="text" placeholder="Country"name="country">
                </div>
              
              <div class="input-form">
                  <label> Password </label>
                  <input type="password" placeholder="Password" name="password">
              </div>
              <div class="input-form">
                <label>Confirm Password </label>
                <input type="password" placeholder="Confirm Password" name="cofirm_password">
                </div>
          <input type="submit" value="Register" name="add" class="submit-btn">             

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