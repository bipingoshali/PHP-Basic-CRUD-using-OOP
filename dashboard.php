<?php
session_start();
if(isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    if($id=="admin"){
        header("location: admin.php");
    }
}else{
    header("location: index.php");
}
include "class/car.php";
$car = new car();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Welcome </title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/carousel.css" rel="stylesheet">
</head>

<!-- NAVBAR
================================================== -->
<body>
<div class="navbar-wrapper">
    <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="dashboard.php">PHP CRUD</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav pull-right">
                        <li class="active"><a  href="#">Hy <?php echo $_SESSION['name'] ?></a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

    </div>
</div>


<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="assets/images/Lexus_2016_LC_500_1.jpg" alt="First slide">
        </div>
        <div class="item">
            <img class="second-slide" src="assets/images/Lexus_2018_LC_500_2.jpg" alt="Second slide">
        </div>
        <div class="item">
            <img class="third-slide" src="assets/images/Lexus_2018_LS_500_3.jpg" alt="Third slide">
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
        <?php
            if(!$car->selectCar()){
                echo '<div class="alert alert-danger">
                                There is no car added till now.
                      </div>';
            }else{
                $cars = $car->selectCar();
                foreach ($cars as $carRow){
                    echo '<div class="col-lg-4">';
                    echo '<img class="img-thumbnail" src="assets/images/'.$carRow["image"].'" alt="Generic placeholder image" width="140" height="140">';
                    echo '<h2>'.$carRow["car_name"].'</h2>';
                    echo '<h5>Mileage (KMPL) : '.$carRow["mileage"].'</h5>';
                    echo '<h5>Fuel Type : '.$carRow["fuel_type"].'</h5>';
                    echo '<p>'.$carRow["description"].'</p>';
                    echo '</div>';
                }
            }
        ?>
    </div><!-- /.row -->

    <hr class="featurette-divider">

    <!-- FOOTER -->
    <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2016 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </footer>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>


