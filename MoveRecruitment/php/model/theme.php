<?php

include_once 'database.php';
include_once 'crud.php';

class theme extends database implements crud {

    private $id;
    private $user_id;
    private $theme_links_id;

    public function create(array $data) {
        $sql = "INSERT INTO `theme`( `user_id`, `theme_links_id`) VALUES ($data[0],$data[1])";
        $result = $this->booleanQuery($sql);
        return $result;
    }

    public function delete(array $data) {
        
    }

    // To read selected theme
    public function read(array $data) {
        $sql = "SELECT `theme_links_id` FROM `theme` WHERE `user_id`='$data[0]'";
        $result = $this->dataQuery($sql);
        if (!empty($result)) {
            $result2 = $this->update($data);
        } else {
            $result2 = $this->create($data);
        }
        $code = $this->getThemeCode($data[1]);
        return $code;
    }

    public function readUserTheme(array $data) {
        $sql = "SELECT `theme_links_id` FROM `theme` WHERE `user_id`='$data[0]'";
        $result = $this->dataQuery($sql);
        if(!empty($result)){
            foreach ($result as $value) {
                $themeID = $value['theme_links_id'];
            }
        }else{
            $themeID = 1;
        }
        $code = $this->getThemeCode($themeID);
        return $code;
    }

    private function getThemeCode($themeID) {
        $sql = "SELECT `link` FROM `theme_links` WHERE `id`='$themeID'";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function getAllTheme() {
        $sql = "SELECT * FROM `theme_links`";
        $result = $this->dataQuery($sql);
        return $result;
    }

    public function update(array $data) {
        $sql = "UPDATE `theme` SET `theme_links_id`='$data[1]' WHERE `user_id`='$data[0]'";
        $result = $this->booleanQuery($sql);
        return $result;
    }

}
?>




