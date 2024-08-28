<?php
session_start();
include_once 'guard/check_user_login.php';
check_login();
$title='cart';
include_once 'models/ordersModel.php';
$obj=new ordersModel('orders');
if($_SESSION['type']==='client') {

    $orders = $obj->displaySpecificUserOrder($_SESSION['id']);
}
else{
    $orders = $obj->displaySpecificUserOrder($_GET['id']);
}
//var_dump($orders);
//var_dump($_SESSION);
$title='Cart';
?>
<html>
    <head>
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
        <link rel="stylesheet" href="css/cartStyle.css"/>
    </head>
    <body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<!--    --><?php
if(isset($orders)&&sizeof($orders)>0){


?>
    <div class="container">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-md-9">
                    <div class="ibox">
                        <div class="ibox-title">

                            <h5>Items in your cart</h5>
                        </div>
                        <?php
                        foreach ($orders as $orderr){
                       echo' <div class="ibox-content">';
                         echo '<div class="table-responsive">';
                             echo   '<table class="table shoping-cart-table">';
                                 echo    '<tbody>';
                                   echo' <tr>';
                                        echo'<td width="90">';
                                            echo'<div class="cart-product-imitation">';
                                            echo '<img src="'.$orderr['image_src'].'" style="width:100%;" />';
                                            echo'</div>';
                                        echo'</td>';
                                        echo'<td class="desc">';
                                            echo'<h3>';
                                                echo'<p class="text-navy">'.$orderr['name'].'</p>';

                                            echo'</h3>';
                                            echo'<p class="small">'.$orderr['description'].'</p>';

                                           echo' <div class="m-t-sm">';
                                                echo'<a href="removeOrder.php?product_id='.$orderr['product_id'].'" class="text-muted"><i class="fa fa-trash"></i> Remove item</a>';
                                            echo'</div>';
                                        echo'</td>';
                                        echo'<td>';
                                            echo'<h4>'.$orderr['price'].'$</h4>';

                                        echo'</td>';
                                    echo'</tr>';
                                    echo'</tbody>';
                                echo'</table>';
                            echo'</div>';

                        echo'</div>';
                        } ?><!---------->'
                        <?php
                        }
                        else{
                            echo '<p class="alert alert-danger">There is no product on your cart</p>';
                        }
                        ?>
                        <?php
                        if($_SESSION['type']==='client'){
                        ?>
                        <div class="ibox-content">
                            <a class="btn btn-white" href="products.php"><i class="fa fa-arrow-left"></i> Continue shopping</a>

                        </div>
                    </div>

                </div>
                <div class="col-md-3">


                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Support</h5>
                        </div>
                        <div class="ibox-content text-center">
                            <h3><i class="fa fa-phone"></i> +43 100 783 001</h3>
                            <span class="small">
                        Please contact with us if you have any questions. We are avalible 24h.
                    </span>
                        </div>
                    </div>


                </div>
                <?php
                        }


                        else{
                          ?>

                            <div class="ibox-content">
                                <a class="btn btn-white" href="index.php"><i class="fa fa-arrow-left"></i>Return to home</a>

                            </div>

                <?php
                        }


                ?>


            </div>
        </div>
    </div>






    </body>










</html>
