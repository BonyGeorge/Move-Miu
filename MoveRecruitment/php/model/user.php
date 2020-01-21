<?php

include_once 'database.php';
include_once 'crud.php';
include_once 'address.php';

abstract class user extends database implements crud {

    public $id;
    public $name;
    public $birthdate;
    public $ismale;
    public $address_id;
    public $type_id;
    public $status;
    public $photoURL;
    public $real_id;

    public function create(array $data) {
        $this->name = $data[0];
        $this->birthdate = $data[1];
        $this->ismale = $data[2];
        $this->address_id = $data[3];
        $this->type_id = $data[4];
        $this->status = $data[5];
        $this->real_id = $data[6];
        $sql = "INSERT INTO user( `name`, `bithdate`, `ismale`, `address_id`, `type_id`, `status`, `real_id`) VALUES ('$this->name','$this->birthdate','$this->ismale','$this->address_id','$this->type_id','$this->status','$this->real_id')";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function delete(array $data) {
        $this->id = $data[0];
        $sql = "DELETE FROM `user` WHERE `id`='$this->id'";
//        $sql = "UPDATE `user` SET `status`='0' WHERE `id`='$this->id'";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function read(array $data) {
        //userID
        $sql = "SELECT * FROM `user`  INNER JOIN `user_type`on user.type_id = user_type.id AND user.id='$data[0]' AND user.status='1'";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function update(array $data) {
        $this->id = $data[0];
        $this->name = $data[1];
        $this->birthdate = $data[2];
        $this->ismale = $data[3];
        $this->address_id = $data[4];
        $this->type_id = $data[5];
        $this->status = $data[6];
        $this->real_id = $data[7];
        $sql = "UPDATE `user` SET `name`='$this->name',`bithdate`='$this->birthdate',`ismale`='$this->ismale',`address_id`='$this->address_id',`type_id`='$this->type_id',`status`='$this->status', `real_id`='$this->real_id'  WHERE `id`='$this->id'";
        $result = $this->booleanQuery($sql);
        return $result;
    }

}
