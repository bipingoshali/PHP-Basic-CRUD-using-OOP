<?php
include "class/customer.php";
$customer = new customer();
session_start();
if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    if($id=="admin"){
        header("location: admin.php");
    }else{
        header("location: dashboard.php");
    }
}
?>

<html>
<head>
    <title>Welcome</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">PHP CRUD</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="col-lg-6">
        <h1>Login</h1>
        <hr>
        <?php
        if(isset($_POST['login'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $customer->setEmail($email);
            $customer->setPassword($password);

            if($customer->login()=="fields-empty"){
                echo "<div class=\"alert alert-danger\" role=\"alert\">";
                echo "<strong>Sorry!</strong> Please fill up all the fields.";
                echo "</div>";
            }elseif($customer->login() == "password-doesn't-match"){
                echo "<div class=\"alert alert-danger\" role=\"alert\">";
                echo "<strong>Sorry!</strong> Password does not match.";
                echo "</div>";
            }elseif($customer->login()=="email-doesn't-exist"){
                echo "<div class=\"alert alert-danger\" role=\"alert\">";
                echo "<strong>Sorry!</strong> Email does not exist.";
                echo "</div>";
            }
            else{
                $customer->login();
            }
        }
        ?>
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword" placeholder="Password">
            </div>
            <button name="login" type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
    <div class="col-lg-6">
        <h1>Register</h1>
        <hr>
        <?php
        if(isset($_POST['register'])){

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $customer->setName($name);
            $customer->setEmail($email);
            $customer->setPassword($password);

            $customer->register();
        }
        ?>
        <form method="post">
            <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input name="name" type="text" class="form-control" id="exampleInputName1" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-success" name="register">Register</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
        </form>
    </div>
</div><!-- /.container -->

</body>
</html>