<?php

include_once './helpers/db_connection.php';
include_once 'base.php';
class usersModel extends base
{
    /**
     * @var base
     */
    private $obj;

    public function get_users($where = ''){
    $this->obj=new base('users');
       return $this->obj->get_obj();
    }

    public  function get_specific_user($email,$password){
        $conn = connectToDB();
        $data = $conn ->query("SELECT * FROM users WHERE email='".$email."' and password='".$password."'");
        return $data -> fetch();
    }

    public function register($username, $email, $password) {
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

    public function search_username ($username)
    {
        $conn = connectToDB();
        $users = $conn->query("SELECT * FROM users WHERE username LIKE '%" . $username . "%'");

        return $users->fetchAll();
    }

    public function update_user($username,$email,$password,$type,$id){
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
    public function delete_user($id){
        $this->obj=new base($this->table_name);
        return $this->obj->delete($id,'id');
    }


}
