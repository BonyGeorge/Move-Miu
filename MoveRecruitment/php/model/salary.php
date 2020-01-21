<?php
class salary extends database implements crud {

    private $id;
    private $value;
    private $user_id;
    private $rebate;

    public function create(array $data) {
        $this->value = $data[0];
        $this->user_id = $data[1];
        $this->rebate = $data[2];


        $sql = "INSERT INTO `salary`(`value`, `userid`, `rebate`) VALUES ('$this->value','$this->user_id','$this->rebate')";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function delete(array $data) {
        $this->id = $data[0];
        $sql = "DELETE FROM `salary` WHERE `id`='$this->id'";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function read(array $data) {
        $this->id = $data[0];
        $sql = "SELECT * FROM `salary` WHERE `id`='$data[0]'";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function update(array $data) {
        $this->value = $data[0];
        $this->user_id = $data[1];
        $this->rebate = $data[2];
        $sql = "UPDATE `salary` SET `value`='$this->value',`rebate`='$this->rebate' WHERE `userid`='$this->user_id'";
        $result = $this->booleanQuery($sql);
        return $result;
    }
    
    

}
