<?php

function generatePassword($length = 6) 
{
  $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  $count = mb_strlen($chars);

  for ($i = 0, $result = ''; $i < $length; $i++) {
      $index = rand(0, $count - 1);
      $result .= mb_substr($chars, $index, 1);
  }

  return $result;
}

?>
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
$mail->setFrom('move20miu2020@gmail.com',' From Move'); 
$mail->CharSet = 'utf-8';
$mail->isHTML(true);

if (isset($_POST['submitCpw'])){
    $email = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);
    $sql = "SELECT * FROM users where email = '$email'";
    $newpass = generatePassword();
    $DB->query($sql);
    $DB->execute();
    $x=$DB->getdata();

    if($DB->numRows()>0)
    {
    $uname = $x[0]->username;
    $mailsubject = "Change Password";
    $mailcontent = "Your New password is".$newpass;
    $mail->Subject = $mailsubject;
    $email_vars = array(
     'name' => $uname,
     'content' => $mailcontent,
    );
    $body = file_get_contents('../Operations/htmlemail.html');
    if(isset($email_vars)){
      foreach($email_vars as $k=>$v){
        $body = str_replace('{'.strtoupper($k).'}', $v, $body);
      }
    }
    $mail->MsgHTML($body);
    $mail->addAddress("$email", "$uname");
    $mail->send();
    
    $sql = "UPDATE users SET password = '".sha1($newpass)."' WHERE email='$email';";
    $DB->query($sql);
    $DB->execute();
  }
  else
  { 
        $Message = "Opps...Wrong email. ";
        header("Location:login.php?Message={$Message}");
  }
}
header('location:../pages/index.php');
?>