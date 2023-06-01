
<?php
session_start();
$host = "localhost";
$username = "root";
$password = '';
$database = "book_store";

$con = mysqli_connect($host, $username, $password, $database);
if (!$con) {
    die("Failed to connect to the database: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/CSS/all.min.css">
    <link rel="stylesheet" href="assets/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="assets/CSS/style.css">
    <style>

h2 {
  font-size: 24px;
  font-weight: bold;
}

p {
  font-size: 18px;
}

.img-fluid {
  max-width: 100%;
  height: auto;
}
hr {
  border: none;
  border-top: 1px solid #ccc;
  margin-top: 10px;
  margin-bottom: 10px;
}
    </style>
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
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="cart.php">Cart</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="logout.php">logout</a>
                  </li>
                  
                </ul>
              </div>
            </div>
          </nav>
    </header>
<main>
    <div class="container">
  <div class="row">
             <?php
             if(isset($_GET['index'])){
              $id=$_GET['index']; 
              $query="SELECT title,image,short_description,full_description,price,id FROM book WHERE id=$id";
              $result = mysqli_query($con,$query);
              $row=mysqli_fetch_assoc($result);
               $img='admin/'.$row['image']; 
               ?>
      <div class="col-lg-4 py-5 mx-4" >
      <img src="<?php echo $img ?>" alt="Image" class="img-fluid">
     </div>
     <div class="col-lg-6 py-5">
      <h1><?php echo $row['title'] ;?></h1>
      <h5>price : <?php echo $row['price']; ?>$</h5>
      <hr>
      <p><?php echo $row['short_description']; ?></p>
      <a href='cart.php?indx=<?php echo $row['id']?>' class="btn btn-success w-50">
      <i class="fas fa-cart-plus"></i> Add To Cart</a>
     
      
    </div>
    </div>
    <h2 >Description</h2>
    <p><?php echo $row['full_description']; ?></p>
    <?php }?>
  </div>
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