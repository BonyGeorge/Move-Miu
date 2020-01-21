<?php

require_once 'database.php';
require_once 'crud.php';

class account_settings extends database implements crud {

    private $id;
    private $name;
    private $bithdate;
    private $ismale;
    private $address_id;
    private $password;

    public function create(array $data) {
        
    }

    public function delete(array $data) {
        
    }

    public function read(array $data) {
        $sql = "SELECT user.name, email.email, telephone.telephone, user.bithdate, user.ismale FROM user INNER JOIN email ON email.user_id=user.id INNER JOIN telephone ON telephone.user_id=user.id WHERE user.id='$data[0]'";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function update(array $data) {
        $this->id = $data[0];
        $this->name = $data[1];
        $this->email = $data[2];
        $this->telephone = $data[3];
        $this->bithdate = $data[4];
        $this->ismale = $data[5];

        $sql = "UPDATE `user`, `telephone`, `email` SET user.name='$data[1]', email.email='$data[2]', telephone.telephone='$data[3]',user.bithdate='$data[4]', user.ismale='$data[5]' WHERE telephone.user_id=user.id AND email.user_id=user.id AND user.id='$data[0]'";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function update_security_info(array $data) {
        $this->id = $data[0];
        $this->password = $data[1];

        $sql = "UPDATE `user_login` SET `password`='$this->password' WHERE `userid`='$this->id'";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function read_security_info(array $data) {
        $sql = "SELECT `password` FROM `user_login` WHERE `userid`='$data[0]'";
        $result = $this->dataQuery($sql);
        return $result;
    }

}
