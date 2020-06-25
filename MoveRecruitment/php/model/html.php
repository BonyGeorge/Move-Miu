<?php

include_once 'database.php';
include_once 'crud.php';

class html extends database implements crud {

    //put your code here
    public function create(array $data) {
        
    }

    public function delete(array $data) {
        
    }

    public function read(array $data) {
        //userID
        $sql = "SELECT `page_id` FROM `user_type_page` WHERE `user_type_id`='$data[0]' ORDER BY `order` ASC";
        $result = $this->dataQuery($sql);
        if (!empty($result)) {
            $menu = array();
            foreach ($result as $value) {
                $pageID = $value['page_id'];
                $sqlPage = "SELECT `name`, `class_name` FROM `pages` WHERE `id`='$pageID' UNION SELECT `name`, `class_name` FROM `pages` WHERE `parent`='$pageID'";
                $items = $this->dataQuery($sqlPage);
                if (!empty($items)) {
                    $list = array();
                    foreach ($items as $value2) {
                        array_push($list, $value2['name']);
                        array_push($list, $value2['class_name']);
                        $icon_code = "";
                        $iconSQL = "SELECT `icon_code` FROM `icon` WHERE `page_id`='$pageID'";
                        $icon = $this->dataQuery($iconSQL);
                        if(!empty($icon)){
                            foreach ($icon as $valueIcon) {
                                array_push($list, $valueIcon['icon_code']);
                                break;
                            }
                        }
                        
                    }
                }
                array_push($menu, $list);
                unset($list);
            }
            return $menu;
        } else {
            return FALSE;
        }
    }

    public function update(array $data) {
        
    }
    public function read_page($pageClassName) {
        $sql = "SELECT `html` FROM `html` WHERE `page_id`= (SELECT `id` FROM `pages` WHERE `class_name`='$pageClassName')";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function update_aboutus(array $data) {
        $sql = "UPDATE `html` SET `html`='$data[0]' WHERE `page_id`= `29`";
        $result = $this->booleanQuery($sql);
        return $result;
    }

}
