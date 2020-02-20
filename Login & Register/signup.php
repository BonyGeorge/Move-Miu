<?php
session_start();
include('../DataBase/Database.php');
$DB = new Database();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = filter_var($_POST["fullname"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["Email"], FILTER_SANITIZE_EMAIL);
    $username= filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $id= filter_var($_POST["id"], FILTER_VALIDATE_INT);
    $password= filter_var($_POST["password"], FILTER_SANITIZE_STRING);

    try{
        $sql="select * from active_members where uni_id = '$id' ";
        $DB->query($sql);
        $DB->execute();
        if($DB->numRows()==0)
        {
            $Message = "you are not a move member. ";
            header("Location:login.php?Message={$Message}");
        }

        else {
                  $x=$DB->getdata();
                  $team=$x[0]->team;
                  $faculty=$x[0]->faculty;

            try{

                $sql="insert into users(name,email,universityid,username,password,type,team,faculty)
                  values('".$name."' ,  '".$email."' ,  '".$id."' , '".$username."' , '".sha1($_POST["password"])."','user','".$team."','".$faculty."' )";
                $DB->query($sql);
                $DB->execute();
                header('Location:login.php?Message=signup complete');
            }

            catch (PDOException $e) {
                header('Location:login.php?Message=account already exists.');
            }


        }

    }
    catch (PDOException $e) {
        header('Location:login.php?Message=something gone wrong');
    }




}
else
{
    echo "error";
}
?>
