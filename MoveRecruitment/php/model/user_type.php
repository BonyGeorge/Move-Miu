<?php

require_once 'database.php';
require_once 'crud.php';

class user_type extends database implements crud {

    private $user_type_id;
    private $type;

    public function create(array $data) {
        $this->typename = $data[0];
        $sql = "INSERT INTO `user_type`(`type`) VALUES ('$this->typename')";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function delete(array $data) {
        $this->user_type_id = $data[0];
        $sql = "DELETE FROM `user_type` WHERE `id`='$this->user_type_id'";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function read(array $data) {
        $sql = "SELECT * FROM user_type WHERE `id` != '3'";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function update(array $data) {
        $this->id = $data[0];
        $this->type = $data[1];
        $sql = "UPDATE `user_type` SET `type`='$this->type' WHERE `id`='$this->id'";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function get_types_info(array $data) {
        $sql = "SELECT user_type.id, user.name, user_type.type FROM user INNER JOIN user_type ON user_type.id = user.type_id";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function search_type($searchBy, $value) {
        $sql = "SELECT user_type.id, user.name, user_type.type  FROM user INNER JOIN user_type ON user_type.id=user.type_id WHERE user_type.$searchBy LIKE '%$value%'";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function read_user_types() {
        $sql = "SELECT pages.id,pages.name FROM pages WHERE parent='0'";
        $result = $this->dataQuery($sql);
        $pages = "";
        if (!empty($result)) {
            foreach ($result as $value) {
                $id = $value['id'];
                $name = $value['name'];
                $pages .=$id;
                $pages .="~";
                $pages .=$name;
                $sqll = "SELECT pages.id,pages.name FROM pages WHERE parent='$id' AND parent !='0'";
                $resultt = $this->dataQuery($sqll);

                if (!empty($resultt)) {
                    foreach ($resultt as $valuee) {
                        $id2 = $valuee['id'];
                        $name2 = $valuee['name'];
                        $pages .="~" . $id2 . "~" . $name2;
                    }
                }
                $pages .="!^@";
            }
            return $pages;
        } else {
            return FALSE;
        }
    }

    public function create_user_access(array $data) {
        $this->typename = $data[0];
        $sql1 = "SELECT `id` FROM `user_type` WHERE `type`='$this->typename'";
        $result3 = $this->dataQuery($sql1);

        foreach ($result3 as $value) {

            $userTypeID = $value["id"];
            for ($i = 0; $i < count($data[1]); $i++) {

                $pageID = $data[1][$i];
                $sql = "SELECT `id`, `parent` FROM `pages` WHERE `parent` = (SELECT pages.parent FROM pages WHERE pages.id = '$pageID')";
                $result4 = $this->dataQuery($sql);
                if (!empty($result4)) {

                    $brothers = array();
                    $parent = "";
                    foreach ($result4 as $value4) {
                        array_push($brothers, $value4['id']);
                        $parent = $value4['parent'];
                    }
                    $allChildsExist = TRUE;
                    for ($j = 0; $j < count($brothers); $j++) {
                        if ($allChildsExist) {
                            $brother = $brothers[$j];
                            if ($brother != $pageID) {

                                for ($z = 0; $z < count($data[1]); $z++) {

                                    if ($data[1][$z] == $brother) {
                                        break;
                                    } else if ($z == count($data[1]) - 1 && $data[1][$z] != $brother) {
                                        $allChildsExist = FALSE;
                                        $sql = "INSERT INTO `user_type_page`(`user_type_id`,`page_id`,`order`) VALUES ('$userTypeID','$pageID','50')";
                                        $result5 = $this->booleanQuery($sql);
                                        if ($result5) {
                                            break;
                                        } else {
                                            return FALSE;
                                        }
                                    }
                                }
                            }
                        } else {
                            break;
                        }
                    }
                    if ($allChildsExist) {
                        $sql = "SELECT * FROM `user_type_page` WHERE `user_type_id` = '$userTypeID' AND `page_id` ='$parent'";
                        $result5 = $this->dataQuery($sql);
                        if (empty($result5)) {
                            $sql = "INSERT INTO `user_type_page`(`user_type_id`, `page_id`, `order`) VALUES ('$userTypeID','$parent','50')";
                            $result6 = $this->booleanQuery($sql);
                            if (!$result6) {
                                return FALSE;
                            }
                        }
                    }
                } else {
                    return FALSE;
                }
            }
//            $order = 50;
//            for ($i = 0; $i < count($data[1]); $i++) {
//                $id = $data[1][$i];
//                $sql = "INSERT INTO `user_type_page`(`user_type_id`,`page_id`,`order`) VALUES ('$userid','$id','$order')";
//                $result = $this->booleanQuery($sql);
//                $order++;
//            }
        }
        return TRUE;
    }

    public function delete_user_access(array $data) {
        $this->user_type_id = $data[0];
        $sql = "DELETE FROM `user_type_page` WHERE `user_type_id`='$this->user_type_id'";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function read_user_access(array $data) {
        $sql = "SELECT user_type.type, pages.name from pages INNER JOIN user_type_page INNER JOIN user_type ON user_type_page.user_type_id=user_type.id WHERE pages.id=user_type_page.page_id";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function read_user_specific_access(array $data) {
        $this->user_type_id = $data[0];
        $sql = "SELECT pages.id, pages.name from pages INNER JOIN user_type_page WHERE pages.id=user_type_page.page_id AND user_type_page.user_type_id='$this->user_type_id' ORDER BY user_type_page.order";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function update_user_access(array $data) {
        $this->typeid = $data[0];
        $order = 50;
        for ($i = 0; $i < count($data[2]); $i++) {
            $id = $data[2][$i];
            $sql = "INSERT INTO `user_type_page`(`user_type_id`,`page_id`,`order`) VALUES ('$this->typeid','$id','$order')";
            $result = $this->booleanQuery($sql);
            $order++;
        }
        return $result;
    }

}
