<?php
include "includes/header_a.php";
?>

<h1 class="page-header">Car</h1>
<?php
    include "class/car.php";
    $car = new car();

    if(isset($_POST['add_car'])){

        $image_name = $_FILES['image']['name']; //image name
        $image_type = pathinfo($image_name,PATHINFO_EXTENSION); //image type

        $car->setName($_POST['name']);
        $car->setFuelType($_POST['fuel']);
        $car->setMileage($_POST['mileage']);
        $car->setDescription($_POST['description']);
        $car->setImage($image_name);

        if($car->addCar()){
            if($image_type=="jpg" || $image_type=="png" || $image_type=="gif"){
                move_uploaded_file($_FILES['image']['tmp_name'],'assets/images/'.$image_name);
            }
            echo '<div class="alert alert-success alert-dismissible">';
            echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
            echo "Successfully Inserted.";
            echo '</div>';
        }


    }
?>

<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Add Car
</a>
<div class="collapse" id="collapseExample" style="margin-top: 15px;">
    <div class="well">
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name">
                    </div>
                    <div class="form-group">
                        <label>Fuel Type</label>
                        <select class="form-control" name="fuel">
                            <option value="Petrol">Petrol</option>
                            <option value="Diesel">Diesel</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Mileage (KMPL)</label>
                        <input type="number" class="form-control" placeholder="Mileage" name="mileage">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" placeholder="Description" name="description"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-success" name="add_car">Add</button>
            <button type="reset" class="btn btn-warning">Reset</button>
            <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Cancel
            </button>
        </form>
    </div>
</div>

<h3 class="sub-header">Car List</h3>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Fuel Type</th>
                <th>Mileage (KMPL)</th>
                <th>Description</th>
                <th>Image</th>
                <th style="width: 90px;">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
		$count=0;
        $delete_message = "'Are you sure to Delete?'";
        if(!$car->selectCar()){
            echo '<div class="alert alert-danger">
                                There is no car added till now.
                            </div>';
        }else{
            $cars = $car->selectCar();
            foreach ($cars as $carsRow){
                echo '<tr>';
					$count=$count+1;
                    //echo '<td>'.$carsRow["car_id"].'</td>';
                    echo '<td>'.$count.'</td>';
                    echo '<td>'.$carsRow["car_name"].'</td>';
                    echo '<td>'.$carsRow["fuel_type"].'</td>';
                    echo '<td>'.$carsRow["mileage"].'</td>';
                    echo '<td>'.$carsRow["description"].'</td>';
                    echo '<td><img style="max-width: 150px;max-height: 150px;overflow: hidden;" src="assets/images/'.$carsRow["image"].'"></td>';
                    echo '<td>
                            <a href="edit_car.php?car_id='.$carsRow["car_id"].'" class="btn btn-warning btn-sm"  title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
                            <a onclick="return confirm('.$delete_message.')" href="delete_car.php?car_id='.$carsRow["car_id"].'" class="btn btn-danger btn-sm"  title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
                          </td>';
                echo '</tr>';
            }
        }
        ?>
        </tbody>
    </table>
</div>

<?php
include "includes/footer_a.php";
?>
