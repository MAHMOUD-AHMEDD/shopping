<?php

include_once './helpers/db_connection.php';


function get_users($where = ''){
    $conn = connectToDB();
    $data = $conn -> query("SELECT * FROM users ".$where);
    return $data -> fetchAll();
}

function get_specific_user($email,$password){
    $conn = connectToDB();
    $data = $conn ->query("SELECT * FROM users WHERE email='".$email."' and password='".$password."'");
    return $data -> fetch();
}

function register($username, $email, $password) {
    $conn = connectToDB();

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email OR username = :username");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        return false;
    } else {

        $sql = "INSERT INTO users (username, email, password, type) VALUES (:username, :email, :password, 'client')";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        return true;
    }
}

function search_username ($username)
{
    $conn = connectToDB();
        $users = $conn->query("SELECT * FROM users WHERE username LIKE '%" . $username . "%'");

        return $users->fetchAll();
}

function update_user($username,$email,$password,$type,$id){
    $conn = connectToDB();
    $sql = "UPDATE users SET username = :username, email=:email, password= :password, type= :type WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':id', $id);

//    $stmt->bindParam(':id', $id);
    $stmt->execute();

}
function delete_user($id){
    $conn = connectToDB();
    $data = $conn ->query("DELETE FROM users WHERE id =".$id."");
    return $data -> fetch();
}

