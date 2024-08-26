<?php
session_start();
include_once 'guard/check_user_login.php';
check_login();
$title='products';
include_once 'models/productsModel.php';
include_once 'models/usersModel.php';
$products=get_products();
$user=get_specific_user($_SESSION['email'],$_SESSION['password']);
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        if(isset($title)){
            echo $title;
        }else{
            echo 'Document';
        }
        ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        :root {
            --background-color: #ffffff;
            --default-color: #444444;
            --heading-color: #012970;
            --accent-color: #4154f1;
            --surface-color: #ffffff;
            --contrast-color: #ffffff;
        }
        body{
            margin-top: 50px;
        }
        .container{
            display: flex;
            justify-content: space-between;
        }
        .container >a{
            text-decoration: none;
            font-size: 20px;
        }
        .container .card{

        }
        .container .cart{
            text-decoration: none;
        }
        .container .cart .cont{
            display: flex;
            align-items: center;
            font-size: 20px;
        }
        .container .cart .cont i{

        }
        .container .cart .cont p{
            /*text-decoration: none;*/
            margin-right: 5px;
            margin-bottom: 6px;
        }
        .card{
            background-color: var(--surface-color);
            color: var(--default-color);
            padding: 30px;
            box-shadow: 0px 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
            transition: 0.3s;
            height: 100%;
            border: 0;
            width: 30%;
            height: auto;
            /*cursor: pointer;*/
            /*transition: 0.5s;*/
        }
        .card img{
            transition: 0.5s;
        }
        .card:hover img{
            transform: scale(0.9);
        }
        .col-md-8{
            color: var(--bs-primary);
        }
        .text-muted{
            color: var(--bs-success) !important;
            font-size: xx-large;
        }
        body{
            /*background-color:#212529 !important ;*/
        }
    </style>
</head>
<body>
<div class="container">
        <a class="cart badge bg-primary" href="cart.php?id=<?php echo $_SESSION['id'] ?>"'.$prod.'>
            <div class="cont">
            <p>My Cart</p><i class="bi bi-cart"></i>
            </div>
        </a>
    <?php

   echo '<a class="badge bg-secondary" href="update_user.php?email='.$user['email'].'&password='.$user['password'].'&username='.$user['username'].'&id='.$user['id'].'">Update Profile</a>';
    ?>
</div>
<?php if(isset($products) && sizeof($products) > 0) {
    echo '<div class="container d-flex flex-wrap justify-content-around mt-5">';
    foreach($products as $product){
  echo  '<div class="card mb-3" style="width: 45%;">';
  echo'<div class="row g-0" style="align-items: center;">';
    echo '<div class="col-md-4">';


     echo '<img src="'.$product['image_src'].'" class="img-fluid rounded-start" alt="...">';

   echo'</div>';
        echo'<div class="col-md-8">';
        echo' <div class="card-body">';
      echo  '<h5 class="card-title">'.$product['name'].'</h5>';
        echo'<p class="card-text">'.$product['description'].'</p>';
      echo  '<p class="card-text"><small class="text-muted">'.$product['price'].'$</small></p>';
     echo' </div>';
        echo '<td><a href="addToCart.php?product_id='.$product['id'].'" class="btn btn-primary me-2">add to cart</a>';
        echo'</div>';
        echo'</div>';
echo'</div>';

    }
    echo '</div>';


} else {
    echo '<p class="alert alert-danger text-center m-3">There is no data</p>';
}?>
</div>




</body>
</html>