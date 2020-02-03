<?php
include('../DataBase/Database.php');
$DB = new Database();

if(isset($_POST['id'])){
    $today=  date('M-D');
    $id=$_POST['id'];
    $filteredid = filter_var($_POST["id"], FILTER_SANITIZE_STRING);
    if($filteredid == $id && strlen($filteredid)>2){
        try{
            $sql="insert into attendance values( '".$filteredid."' , '$today');  ";
            $DB->query($sql);
            $DB->execute();
           echo " $id added successfully.";
        }catch (Exception $e) {

            echo "already added";
        }

    }
    else{
        echo"invalid QR";
    }

}

?>