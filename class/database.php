<?php
class database{

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $DB = "website_bipin";

    private $connect;

    public function __construct(){
        $this->getConnection();
    }

    private function getConnection()
    {
        $this->connect = new mysqli($this->host, $this->user, $this->password, $this->DB);
        if ($this->connect->connect_error) {
            die("Error connecting to database: " . $this->connect->connect_error);
        }
    }

    public function insert($sql){
        $this->connect->query($sql);
    }

    public function select($sql){
        $data = [];
        $fetchedData = $this->connect->query($sql);

        if($fetchedData->num_rows > 0 ) {
            while ($row = $fetchedData->fetch_assoc())
                $data[] = $row;
        }else{
            return false;
        }

        return $data;
    }

    public function checkRow($sql){
        $resultSet = $this->connect->query($sql);
        $numRows = $resultSet->num_rows;
        if($numRows > 0){
            return $numRows;
        }else{
            return false;
        }
    }

}
