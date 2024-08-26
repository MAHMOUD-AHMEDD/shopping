<?php
session_start();
//include_once 'guard/check_user_login.php';
include_once 'types/client.php';
include_once 'types/admin.php';


if (!(isset($_SESSION['id']))) {
     $obj=new client();
     $obj->type_logic();
    }
else{
    if ($_SESSION['type']==='client'){
        $obj=new admin();
        $obj->type_logic();
    }
}



//var_dump($_SESSION);



include_once 'models/usersModel.php';
$data = get_users();
$employee_access = ['username','email','password','type'];

//if($_SERVER['REQUEST_METHOD']=='POST'){
//    if($_POST['type']==='all'){
//        $data=get_users();
//    }
//    else {
//        $data = get_users('WHERE type="' . $_POST['type'] . '"');
//    }
//}


if($_SERVER['REQUEST_METHOD']=='POST'){
    $data=search_username($_POST['name']);
}



$title = 'Home';
include_once 'template/header.php';
?>
    <div class="container">
        <form method="POST" class="m-auto pt-5">
            <div class="row justify-content-center">
               <input type="text" name="name" style="height: fit-content;width: fit-content;">
                <button type="submit" class="btn btn-sm btn-outline-success mb-3 col-3" style="width: fit-content;">
                    Search User
                </button>
            </div>
        </form>
        <br>
        <?php //include_once 'layout/form.php' ?>
        <br>
        <?php if(isset($data) && sizeof($data) > 0) { ?>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <td>Username</td>
                <td>Email</td>
                <td>Password</td>
                <td>Type</td>
                <td>Control</td>
            </thead>
            <tbody>
                <?php
                foreach($data as $user){
                    echo '<tr>';
                    foreach($employee_access as $access){
                        echo '<td>'.$user[$access].'</td>';
                    }
//                    $_SESSION['password']
                    echo '<td><a class="btn btn-primary" href="update_user.php?email='.$user['email'].'&password='.$user['password'].'&username='.$user['username'].'&type='.$user['type'].'&id='.$user['id'].'">update</a><a class="btn btn-danger" href="deleteUser.php?id='.$user['id'].'">delete</a><a class="btn btn-info" href="cart.php?id='.$user['id'].'">cart</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <?php } else {
            echo '<p class="alert alert-danger text-center m-3">There is no data</p>';
            }?> 
    </div>

<?php
include_once 'template/footer.php';
?>