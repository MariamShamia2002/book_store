
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
      
      if (isset($_GET['indx'])) {  
        $book_id=$_GET['indx'];
        $sql= "INSERT INTO `cart` (id_book) values($book_id)";
       if(mysqli_query($con,$sql)){
        header("Location: cart.php");

        }}

        if (isset($_GET['del'])) {  
          $id=$_GET['del'];
          $sql="DELETE FROM `cart` WHERE id = $id";
           if(mysqli_query($con,$sql)){
           header("Location: cart.php");
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
                    <a class="nav-link active" href="cart.php">Cart</a>
                    
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
    <div class="container ">
            <div class="content  " >
            <h1 class="mb-4 text-center py-5 pb-5">Your Cart</h1> 
    <table class="table table-borderd table-hover table-striped">
          <tr class="table-dark">
            <th>ID</th>
            <th>image</th>
            <th>Book</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Delete</th>
          </tr>
          <?php
    $query="SELECT cart.id,price,image, title, SUM(price) AS total,COUNT(cart.id_book) AS quintity FROM cart
     JOIN book ON cart.id_book = book.id GROUP BY cart.id_book" ;
    $result = mysqli_query($con,$query);
  
    $val = 0;
    while(($row=mysqli_fetch_assoc($result))){ $img='admin/'.$row['image'];
      $val += $row['quintity'] * $row['total'];
      ?>
      
           <tr>
            <td><?php echo $row['id'] ?></td>
             <td><img src="<?php echo $img ; ?>" alt="Book Image" width="100" height="100"></td>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $row['price'] ?></td>
            <td><?php echo $row['quintity']; ?></td>
            <td><?php echo $row['total']; ?></td>

            <td>
            <a href='cart.php?del=<?php echo $row['id']?>' class="btn btn-danger btn-sm"> <i class='fas fa-trash'></i></a>
            </td>
          </tr> 
          <?php } ?>  
          <tr class="table-dark">
          <th colspan="5">Total</th>
          <th colspan="2"><?php echo $val ?></th>
         </tr>
         
        </table>
    
        </div>
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