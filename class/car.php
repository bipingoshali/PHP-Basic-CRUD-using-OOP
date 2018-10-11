<?php
include "database.php";
class car{
    private $database;

    public function __construct()
    {
        $this->database = new database();
    }

    private $car_id;
    private $name;
    private $fuel_type;
    private $mileage;
    private $description;
    private $image;

    /**
     * @return mixed
     */
    public function getCarId()
    {
        return $this->car_id;
    }

    /**
     * @param mixed $car_id
     */
    public function setCarId($car_id)
    {
        $this->car_id = $car_id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFuelType()
    {
        return $this->fuel_type;
    }

    /**
     * @param mixed $fuel_type
     */
    public function setFuelType($fuel_type)
    {
        $this->fuel_type = $fuel_type;
    }

    /**
     * @return mixed
     */
    public function getMileage()
    {
        return $this->mileage;
    }

    /**
     * @param mixed $mileage
     */
    public function setMileage($mileage)
    {
        $this->mileage = $mileage;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    public function addCar(){

        $name = $this->getName();
        $fuel_type = $this->getFuelType();
        $mileage = $this->getMileage();
        $description = $this->getDescription();
        $image = $this->getImage();

        if($name=="" or $fuel_type=="" or $mileage=="" or $description=="" or $image==""){
            echo '<div class="alert alert-danger alert-dismissible">';
            echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
            echo "Please fill up all the fields.";
            echo '</div>';
            return false;
        }else{
            $add = "insert into car(car_name,fuel_type,mileage,description,image) values('$name','$fuel_type',$mileage,'$description','$image')";
            $this->database->insert($add);
            return true;
        }
    }

    public function selectCar(){
        $selectCar = "select * from car";
        return $this->database->select($selectCar);
    }

    public function selectCarById($car_id){
        $selectCarById = "select * from car where car_id=$car_id";
        return $this->database->select($selectCarById);
    }

    public function editCar($car_id){
        $car_name = $this->getName();
        $fuel = $this->getFuelType();
        $mileage = $this->getMileage();
        $description = $this->getDescription();

        $editCar = "update car
                    set car_name='$car_name',
                        fuel_type='$fuel',
                        mileage='$mileage',
                        description='$description'
                    where car_id = $car_id
                    ";
        $this->database->insert($editCar);
    }

    public function deleteCar($car_id){
        $deleteCar = "delete from car where car_id='$car_id'";
        $this->database->insert($deleteCar);
    }

}