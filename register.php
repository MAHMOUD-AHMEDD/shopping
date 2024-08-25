<?php
session_start();
include_once 'models/usersModel.php';
include_once 'guard/check_user_login.php';

// var_dump($_SESSION);
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // var_dump($_POST);
    $data_check = register($_POST['username'],$_POST['email'],$_POST['password']);
    // header('location:index.php');
    if (isset($data_check)){
        // var_dump($data_check);
    }
    
}




$title='Register';
?>
    <html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap"
            rel="stylesheet"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>
        <?php
        if(isset($title)){
            echo $title;
        }else{
            echo 'Document';
        }
        ?>
    </title>
    <style media="screen">
        *,
        *:before,
        *:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #080710;
        }
        .background {
            width: 430px;
            height: 520px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }
        .background .shape {
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }
        .shape:first-child {
            background: linear-gradient(#1845ad, #23a2f6);
            left: -80px;
            top: -80px;
        }
        .shape:last-child {
            background: linear-gradient(to right, #ff512f, #f09819);
            right: -30px;
            bottom: -80px;
        }
        form {
            height: 670px;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.13);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
        }
        form * {
            font-family: "Poppins", sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }
        form h3 {
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 500;
        }
        input {
            display: block;
            height: 50px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }
        ::placeholder {
            color: #e5e5e5;
        }
        button {
            margin-top: 50px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }
        .social {
            margin-top: 30px;
            text-align: center;
        }
        .social div {
            background: red;
            width: 150px;
            border-radius: 3px;
            padding: 5px 10px 10px 5px;
            background-color: rgba(255, 255, 255, 0.27);
            color: #eaf0fb;
            text-align: center;
        }
        .social div:hover {
            background-color: rgba(255, 255, 255, 0.47);
        }

    </style>
</head>
<!--



-->
<body>
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form method="POST">
    <h3>Register</h3>
    <?php
    if(isset($data_check)){
        if($data_check == false){
            echo '<div class="alert alert-danger text-center">User already exists</div>';
        }else{
            echo '<div class="alert alert-success text-center">User registered successfully</div>';
        }
    }
    ?>
    <label for="username">username</label>
    <input type="text" placeholder="username" name="username" required />

    <label for="email">Email</label>
    <input type="email" placeholder="Email" name="email" required />

    <label for="password">Password</label>
    <input type="password" placeholder="Password" name="password"  required/>

    <button>Create Account</button>
    <div class="social">
        <a class="go text-center" href="login.php">login</a>

    </div>
</form>
</body>
    </html>

