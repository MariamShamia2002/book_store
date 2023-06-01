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
// if (!isset($_SESSION['user_id'])) {
//   header("Location: login.php");
//   exit;
// }


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
      <section class="hero">
        <div class="container ">
            <div class="content  " >
            <h1 class="mb-4">Search about any Book you need</h1>
            <form method ="">
                <input  class="form-control"type="text">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <div class="row text-center mt-4">
                <div class="col-md-4">

                    <div class="item">
                        <i class="fa-solid fa-book fa-2x"></i>
                        <h3>3</h3>
                        <p>Books</p>
                       
                    </div>
                </div>
                <div class="col-md-4">
                    
                    <div class="item">
                        <i class="fa-solid fa-users fa-2x"></i>
                        <h3>2</h3>
                        <p>Authors</p>
                       
                    </div>
                </div>
                <div class="col-md-4">
                    
                    <div class="item">
                        <i class="fa-solid fa-tags fa-2x"></i>
                        <h3>3</h3>
                        <p>categories</p>
                       
                    </div>
                </div>
            </div>
        </div></div>
      </section>
      <section class="about text-center py-5">
        <div class="container">
            <h2>Aboout Our Library</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                 Unde consequuntur facere iste voluptatem, exercitationem similique 
                 pariatur dolores nostrum facilis ducimus corrupti harum repudiandae
                  quia voluptatibus cum saepe explicabo, odit perspiciatis .
            </p>
        
        </div>
      </section>
      <section class="categories text-center bg-light py-5 ">
        <div class="container">
            <h2 class="mb-4">Explore our latest Categories</h2>
            <div class="row justify-content-center">
                  <?php  $query="SELECT * FROM `categories` ";
                  $result = mysqli_query($con,$query);
                  while($row=mysqli_fetch_assoc($result)){ ?>
                <div class="col-md-3">
                    <a  href="" class="item card p-5 text-decoration-none" ><?php echo $row['name'] ?></a>
                  </div>
                  <?php } ?>
               
            </div>
        </div>
      </section>
      <section class="books py-5">
        <div class="container">
            <h2 class="py-4 text-center">Explore our latest books</h2>
            <div class="row justify-content-center">
            <?php
             $query="SELECT title,image,short_description, id FROM book";
              $result = mysqli_query($con,$query);
              while(($row=mysqli_fetch_assoc($result))){ $img='admin/'.$row['image']; ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="<?php echo $img ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $row['title'] ;?></h5>
                          <p class="card-text"><?php echo $row['short_description']; ?></p>
                          <a href="bookDetails.php?index=<?php echo $row['id']?> "  name="read" class="btn btn-dark w-100">Read more</a>
                        </div>
                      </div>  
                </div>
                <?php } ?>
               </div>
            </div>
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