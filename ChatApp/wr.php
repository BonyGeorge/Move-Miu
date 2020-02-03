<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

    <form action="pages/Login.php" method='post'>
        <input type="text" placeholder='Mail' name='mail'>
        <input type="text" placeholder='Password' name='pass'>
        <input type="submit" name='login'>
    </form>

    <br>
    <br>
    <br>

    <form action="pages/AddUser.php" method='post'>
        <input type="text" placeholder='UserName' name='username'>
        <input type="text" placeholder='Mail' name='email'>
        <input type="text" placeholder='Password' name='password'>
        <input type="submit" name='reg'>
    </form>


</body>
</html>