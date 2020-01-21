<?php

require_once '../model/administrator.php';
$admin = new administrator();
$type = $_POST['account'];
$id = $_POST['id'];
$name = $_POST['name'];
$mail = "unkown";
$mobile = $_POST['mobile'];
$cityID = 48321;
$cityName = "Unkown";
$buildingNumber = 1;
$streetName = "Unkown";
$stateID = 1048;
$address = array($cityID, $streetName, $buildingNumber, $cityName, $stateID);
$DOB = "2010-01-01";
$gender = $_POST['gender'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$salary = 0;
$workDurations = $_POST['workDurations'];

if (empty($id) || empty($type) || empty($name) || empty($mail) || empty($mobile) || empty($cityID) || empty($buildingNumber) || empty($streetName) || empty($stateID) || empty($DOB) || empty($password)) {
    echo "Please fill all fields!";
} else if (preg_match('/[0-9]/', $name)) {
    echo "Name should not contain any numeric value!";
} else if ($confirmPassword != $password) {
    echo "Password re-entered wrong!";
} else {
    $validateDuration = TRUE;
    $first = explode("^@", $workDurations);

    for ($i = 0; $i < count($first); $i++) {
        if ($validateDuration == TRUE) {
            $second = explode("~", $first[$i]);
            for ($y = 0; $y < count($second); $y++) {
                if ($validateDuration == TRUE) {
                    switch ($y) {
                        case 0:
                            if (!is_numeric($second[$y])) {
                                echo"Day should be a numeric value! .. Refresh the page!";
                                $validateDuration = FALSE;
                            }
                            break;
                        case 1:
                            if (empty($second[$y])) {
                                $durationNumber = $i + 1;
                                echo "Please, fill out the 'from' input in Duration" . $durationNumber . " section!";
                                $validateDuration = FALSE;
                            }
                            break;
                        case 2:
                            if (empty($second[$y])) {
                                $durationNumber = $i + 1;
                                echo "Please, fill out the 'to' input in Duration" . $durationNumber . " section!";
                                $validateDuration = FALSE;
                            }
                            break;
                        default:
                            break;
                    }
                } else {
                    break;
                }
            }
        } else {
            break;
        }
    }
    if ($validateDuration == TRUE) {
        if (!empty($_FILES["img"]["type"])) {
            $fileName = time() . '_' . $_FILES['img']['name'];
            $valid_extensions = array("jpeg", "jpg", "png");
            $temporary = explode(".", $_FILES["img"]["name"]);
            $file_extension = end($temporary);
            if ((($_FILES["img"]["type"] == "image/png") || ($_FILES["img"]["type"] == "image/jpg") || ($_FILES["img"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)) {
                $sourcePath = $_FILES['img']['tmp_name'];
                $targetPath = "../../images/uploaded/" . $fileName;
                if (move_uploaded_file($sourcePath, $targetPath)) {
                    $data = array($type, $name, $mail, $address, $mobile, $DOB, $gender, $salary, $password, $targetPath, $workDurations, $id);
                    $result = $admin->addEmployee($data);
                    echo $result;
                } else {
                    echo "failedImg";
                }
            } else {
                echo 'error1';
            }
        } else {
            $path = "../../images/default.jpg";
            $data = array($type, $name, $mail, $address, $mobile, $DOB, $gender, $salary, $password, $path, $workDurations, $id);
            $result = $admin->addEmployee($data);
            echo $result;
        }
    }
}