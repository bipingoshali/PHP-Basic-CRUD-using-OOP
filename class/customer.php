<?php
include "database.php";
class customer{

    private $id;
    private $name;
    private $email;
    private $password;

    private $database;

    public function __construct()
    {
        $this->database = new database();
    }


    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function register(){
        $customer_name = $this->getName();
        $email = $this->getEmail();
        $password = $this->getPassword();

        if($customer_name=="" or $email=="" or $password==""){
            echo "<div class=\"alert alert-danger\" role=\"alert\">";
            echo "<strong>Sorry!</strong> Please fill up all the fields.";
            echo "</div>";
        }else{
            $searchEmail = "select email from customer where email='$email'";
            if($this->database->checkRow($searchEmail)>0){
                echo "<div class=\"alert alert-danger\" role=\"alert\">";
                echo "<strong>Sorry!</strong> Email already taken.";
                echo "</div>";
                return;
            }else{
                $register = "insert into customer(customer_name,email,password) values('$customer_name','$email','$password')";
                $this->database->insert($register);
                echo "<div class=\"alert alert-success\" role=\"alert\">";
                echo "<strong>Congratulations!</strong> You have been registered now.";
                echo "</div>";
            }

        }


    }

    public function login(){
        $emailAddress = $this->getEmail();
        $password = $this->getPassword();

        if($emailAddress=="" or $password==""){
            return "fields-empty";
            return;
        }
        if($emailAddress=="admin@admin.com" and $password=="admin"){
            session_start();
            $_SESSION['id']="admin";
            header("location: admin.php");
            return;
        }

        $checkEmail = "select * from customer where email='$emailAddress'";

        if($data = $this->database->select($checkEmail)){
            foreach($data as $row){
                $fetchedPassword = $row['password'];
                if($password == $fetchedPassword){
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['customer_name'];
                    header("location: dashboard.php");
                }
                else{
                    return "password-doesn't-match";
                }
            }
        }else{
            return "email-doesn't-exist";
        }



    }

}
