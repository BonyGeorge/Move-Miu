<?php

include_once 'database.php';
include_once 'crud.php';

class address extends database implements crud {

    public $id;
    public $country;
    public $state;
    public $city;
    public $street;
    public $buildingNumber;
    public $cityID;
    public $parent;

    

    public function create(array $data) {
        //cityID, StreetName, BuildingNumber, cityName, stateID
        $this->address = $data[1];
        if ($data[0] == "new") {
            $this->cityID = $this->newCity($data[3], $data[4]);
        } else {
            $this->cityID = $data[0];
        }
        $sql = "INSERT INTO `address`(`address`, `city_id`, `parent`) VALUES ('$this->address','$this->cityID','0')";
        $result = $this->booleanQuery($sql);
        if ($result == 1) {
            $this->parent = $this->getMaxID();
            $this->address = $data[2];
            $sql = "INSERT INTO `address`(`address`, `city_id`, `parent`) VALUES ('$this->address','0','$this->parent')";
            $result = $this->booleanQuery($sql);
            if ($result == 1) {
                $result = $this->getMaxID();
                return $result;
            }
        }
        return FALSE;
    }

    private function newCity($cityName, $countryID) {
        $sql = "INSERT INTO `cities`(`name`, `state_id`) VALUES ('$cityName','$countryID')";
        $result = $this->booleanQuery($sql);
        if ($result == 1) {
            $sql = "SELECT max(`id`) FROM `cities`";
            $result = $this->dataQuery($sql);
            foreach ($result as $value) {
                return $value['max(`id`)'];
            }
        }
        return FALSE;
    }

    private function getMaxID() {
        $sql = "SELECT max(`id`) FROM `address`";
        $result = $this->dataQuery($sql);
        foreach ($result as $value) {
            return $value['max(`id`)'];
        }
    }

    public function read2(array $data) {
        $sql = "SELECT id, address, parent FROM address WHERE 1";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function update(array $data) {
        $this->id = $data[0];
        $this->address = $data[1];
        $this->parent = $data[2];
        $sql = "UPDATE `address` SET `address`='$this->address',`parent`='$this->parent' WHERE `id`='$this->id'";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function delete(array $data) {
        $this->id = $data[0];
        $sql = "DELETE FROM `address` WHERE `id`='$this->id'";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function read(array $data) {
        $userID = $data[0];
        $address = array();
        $sql = "SELECT * FROM `address` INNER JOIN `user` ON user.id='$userID' AND address.id = user.address_id";
        $result = $this->dataQuery($sql);
        foreach ($result as $value) {
            $parentID = $value['parent'];
            array_push($address, $value['address']);
        }
        $sqlParent = "SELECT * FROM `address` WHERE `id` = '$parentID'";
        $result = $this->dataQuery($sqlParent);
        foreach ($result as $value) {
            $cityID = $value['city_id'];
            array_push($address, $value['address']);
            array_push($address, $cityID);
        }
        $sqlCity = "SELECT * FROM `cities` WHERE `id` = '$cityID'";
        $result = $this->dataQuery($sqlCity);
        foreach ($result as $value) {
            $stateID = $value['state_id'];
            array_push($address, $stateID);
        }
        $sqlState = "SELECT * FROM `states` WHERE `id` = '$stateID'";
        $result = $this->dataQuery($sqlState);
        foreach ($result as $value) {
            $countryID = $value['country_id'];
            array_push($address, $countryID);
        }
        return $address;
    }

    public function readFullAddress($userID) {
        $sql = "SELECT address.parent, address.address FROM `address` INNER JOIN `user` ON user.id='$userID' AND address.id = user.address_id";
        $result = $this->dataQuery($sql);
        foreach ($result as $value) {
            $parentID = $value['parent'];
            $this->buildingNumber = $value['address'];
        }
        $sqlParent = "SELECT address.address, cities.name, cities.id FROM `address` INNER JOIN cities ON address.city_id = cities.id and address.id ='$parentID'";
        $result = $this->dataQuery($sqlParent);
        foreach ($result as $value) {
            $cityID = $value['id'];
            $this->street = $value['address'];
            $this->city = $value['name'];
        }
        $sqlCity = "SELECT cities.state_id FROM `cities` WHERE `id` = '$cityID'";
        $result = $this->dataQuery($sqlCity);
        foreach ($result as $value) {
            $stateID = $value['state_id'];
        }
        $sqlState = "SELECT states.name AS stateName, countries.name AS countryName FROM `states` INNER JOIN countries ON states.country_id = countries.id AND states.id='$stateID'";
        $result = $this->dataQuery($sqlState);
        foreach ($result as $value) {
            // $countryID = ['country_id'];
            $this->state = $value['stateName'];
            $this->country = $value['countryName'];
        }
        return $this;
    }

    public function getallcountry() {
        $sql = "SELECT * FROM address WHERE `parent`='0'";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function getCityOfCountry($countryid) {
        $sql = "SELECT * FROM address WHERE `parent`='$countryid'";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function readCountries() {
        $sql = "SELECT * FROM `countries` ORDER BY `name` ASC";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function readstates($countryID) {
        $sql = "SELECT * FROM `states` WHERE `country_id`='$countryID' ORDER BY `name` ASC";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function readCities($stateID) {
        $sql = "SELECT * FROM `cities` WHERE `state_id`='$stateID' ORDER BY `name` ASC";
        $result = $this->dataQuery($sql);
        return $result;
    }

}
