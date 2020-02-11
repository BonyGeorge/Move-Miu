<?php
session_start();
include('../DataBase/Database.php');
$DB = new Database();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = filter_var($_POST["Username"], FILTER_SANITIZE_STRING);
    $sql="SELECT * FROM users where username= '".$username."' and password = '".sha1($_POST["password"])."';";
    $DB->query($sql);
    $DB->execute();
    if($DB->numRows()==0)
    {  
        $Message = "Opps...Wrong username or password. ";
        header("Location:login.php?Message={$Message}");
    }
    else {
        $x=$DB->getdata();
        $_SESSION['name']=$x[0]->name;
        $_SESSION['username']=$x[0]->username;
        $_SESSION['email']=$x[0]->email;
        $_SESSION['type']=$x[0]->type;
        $_SESSION['id']=$x[0]->id;
        $_SESSION['universityid']=$x[0]->universityid;
        
        if(!empty($_POST['remember'])){
            setcookie("username", $_POST['Username'], time()+(10 * 365 * 24 * 60 * 60));
            setcookie("password", $_POST['Password'], time()+(10 * 365 * 24 * 60 * 60));
        }else{
            if(ISSET($_COOKIE['username'])){
                setcookie("username", "");
            }

            if(ISSET($_COOKIE['password'])){
                setcookie("password", "");
            }
        }
        header('Location:../pages/index.php');   
    }
}
?>