<?php
class User
{
    public $UserId;
    public $UserName;
    public $UserMail;
    public $UserPass;


    public function InsertUser($name,$mail,$pass)
    {
        include('Db.php');
        $sql = "INSERT INTO users(name,email,password) VALUES('$name','$mail','$pass')";
        $pdo->query($sql);
        

        header('location:../index.php');
    }
    public function UserLogin($mail,$pass)
    {
        include('Db.php');
        $sql = "SELECT * FROM users WHERE email='$mail' AND password='$pass'";
        $result = $pdo->query($sql);
        if($result->rowCount() > 0)
        {
            header('location:../Home.php');
            session_start();
            while($row = $result->fetch(PDO::FETCH_ASSOC))
            {
                $this->UserId = $row['id'];
                $this->UserName = $row['name'];
                $this->UserMail = $row['email'];

                $_SESSION['id'] = $row['id'];
                $_SESSION['user'] = $row['name'];
            }
        }else
        {
            echo 'error login';
            header('location:../');
        }
    }
}


class Chat
{
    public $UserId;
    public $ChatText;

    public function InsertChat($id,$chattext)
    {
        include('Db.php');
        $sql = "INSERT INTO chat(user_id,chattext) VALUES('$id','$chattext')";
        $pdo->query($sql);
    }

    public function DisplayChat()
    {
        include('Db.php');
        $sql = "SELECT users.name,users.username,chat.chatText,users.id,chat.user_id FROM chat INNER JOIN users on chat.user_id=users.id order by chat.id";
        $result = $pdo->query($sql);
        session_start();
        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
             
if($row['user_id'] == $_SESSION['id']){
            echo "<h4 style='margin-left:150px; padding:8px;background-color: #3ed45e;width: 50%;border-radius: 15px; font-family: monospace;
    font-size: 15px;'>You : {$row['chatText']}</h4>";
}else{
    echo "<h4 style='padding:8px;background-color: #b2d5ba;width: 50%;border-radius: 15px; font-family: monospace;
    font-size: 15px;'>{$row['username']} : {$row['chatText']}</h4>";
}
        }
    }
}
?>