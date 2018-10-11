<?php
include "includes/header_a.php";
include "class/car.php";
$car = new car();
$car_value = array(array(
    "car_id"=>"",
    "car_name"=>"",
    "fuel_type"=>"",
    "mileage"=>"",
    "description"=>""
    ));
$fetch_car = $car->selectCarById($_GET['car_id']);
if(isset($_POST['edit_car'])){
    $car->setName($_POST['name']);
    $car->setFuelType($_POST['fuel']);
    $car->setMileage($_POST['mileage']);
    $car->setDescription($_POST['description']);

    $car->editCar($_GET['car_id']);
    $fetch_car = $car->selectCarById($_GET['car_id']);

    echo '<div class="alert alert-success alert-dismissible">';
    echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
    echo "Successfully Edited.";
    echo '</div>';

}
?>
<h1 class="page-header">
    Edit Car
    <a href="car.php" class="pull-right btn btn-info btn-sm">Back</a>
</h1>

<form method="post">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Name" name="name"
                       value="<?php
                        echo $fetch_car[0]['car_name'];
                       ?>"
                >
            </div>
            <div class="form-group">
                <label>Fuel Type</label>
                <select class="form-control" name="fuel">
                    <option value="<?php echo $fetch_car[0]['fuel_type']?>"><?php echo $fetch_car[0]['fuel_type']?></option>
                    <option value="Petrol">Petrol</option>
                    <option value="Diesel">Diesel</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Mileage (KMPL)</label>
                <input type="number" class="form-control" placeholder="Mileage" name="mileage"
                    value="<?php
                        echo $fetch_car[0]['mileage'];
                    ?>"
                >
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" placeholder="Description" name="description"><?php
                        echo $fetch_car[0]['description'];
                    ?>
                </textarea>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success" name="edit_car">Edit</button>
</form>

<?php
include "includes/footer_a.php";
?>
