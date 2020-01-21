<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 4/29/18
 * Time: 6:37 PM
 */

include_once '../model/date.php';
$dateObj= new date();
if ($dateObj->getMaxID()){


    echo $dateObj->getMaxID();

}
