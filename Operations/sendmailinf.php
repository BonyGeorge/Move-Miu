<?php
session_start();
include '../DataBase/Database.php';
$DB = new Database();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception; 

require '../composer/vendor/autoload.php'; 

date_default_timezone_set('Etc/UTC'); 

$mail = new PHPMailer(TRUE);
$mail->SMTPOptions = array('ssl'=>array('verify_peer'=>false, 'verify_peer_name'=>false, 'allow_self_signed'=>true));
$mail->isSMTP(); 
$mail->Host = 'smtp.gmail.com'; 
$mail->Port = 587; 
$mail->SMTPAuth = true; 
$mail->SMTPSecure = 'tls'; 
$mail->Username = 'move20miu2020@gmail.com'; 
$mail->Password = 'rywuqlxruswomhuj'; 
$mail->setFrom('move20miu2020@gmail.com', $_SESSION['name']. ' from Move'); 
$mail->CharSet = 'utf-8';
$mail->isHTML(true);

if (isset($_POST['send1'])){
    $rid = $_POST['selection'];
    $sql = "SELECT * FROM users where id = '$rid'";
    $DB->query($sql);
    $DB->execute();
    $x=$DB->getdata();
    $uname = $x[0]->username;
    $email = $x[0]->email;
    $mailsubject = $_POST['mailsubject'];
    $mailcontent = $_POST['mailcontent'];
    $mail->Subject = $mailsubject;
    $email_vars = array(
     'name' => $uname,
     'content' => $mailcontent,
    );
    $body = file_get_contents('htmlemail.html');
    if(isset($email_vars)){
      foreach($email_vars as $k=>$v){
        $body = str_replace('{'.strtoupper($k).'}', $v, $body);
      }
    }
    $mail->MsgHTML($body);
    $mail->addAddress("$email", "$uname");
    $mail->send();   
}
if (isset($_POST['send0'])){
    $sql = "SELECT * FROM users where id <> '".$_SESSION['id']."'";
    $DB->query($sql);
    $DB->execute();
    $x=$DB->getdata();
    for ($i=0 ; $i<$DB->numRows(); $i++){
        $uname = $x[$i]->username;
        $email = $x[$i]->email;
        $mailsubject = filter_var($_POST['mailsubject'], FILTER_SANITIZE_STRING);
        $mailcontent = filter_var($_POST['mailcontent'], FILTER_SANITIZE_STRING);
        $mail->Subject = $mailsubject;
        $email_vars = array(
         'name' => $uname,
         'content' => $mailcontent,
        );
        $body = file_get_contents('htmlemail.html');
        if(isset($email_vars)){
          foreach($email_vars as $k=>$v){
            $body = str_replace('{'.strtoupper($k).'}', $v, $body);
          }
        }
        $mail->MsgHTML($body);
        $mail->addAddress("$email", "$uname");
        $mail->send();

    }
}
header('location:sendmail.php');
?>