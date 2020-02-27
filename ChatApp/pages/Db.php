<?php
try
{
    $pdo = new PDO('mysql:host=server116.web-hosting.com;dbname=movegvka_move','movegvka_admin','Admin2020');


    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e)
{
    echo 'Error : ' . $e->getMessage();
}
?>