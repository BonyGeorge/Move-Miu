<?php
session_start();
include 'header.php';
include 'Database.php';
$DB = new Database();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
    select {
        background-color: Green;
        color: #3bde40;
        height: 5%;
        padding: 8px 16px;
        border: 1px solid transparent;
        border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
        cursor: pointer;
        user-select: none;
    }

    #mcontent,
    #msubject {
        width: 100%;

    }

    #tarea {
        position: relative;
        left: 25%;
        display: flex;
        width: 50%;
    }

    #tareaa {
        position: relative;
        left: 25%;
        display: flex;
        width:
            50%;

    }

    #mcontent {
        border: 1px solid Green;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        padding: 4px;
    }

    #msubject {
        border: 1px solid Green;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        padding: 4px;
    }
    </style>
</head>

<body>
    <br>
    <br>
    <h1 style=''>Send mail</h1>
    <label style='position : relative; left :33%'>User :</label>
    <select style='width :25%; position : relative; left :33%' class="massmsgdrpdwn" id="mailone">
        <?php try {
                    /* Creating the dropdown empty option */
                    echo ('<option value = "$i" disabled selected>'." ".'</option>');
                    /* SQL query to get the data from the DB */
                    $sql = "SELECT * FROM users";
                    $DB->query($sql); /* Using the query function made in DB/Database.php */
                    $DB->execute(); /* Using the excute function made in DB/Database.php */
                    $x=$DB->getdata(); /* creates an array of the output result */
                    for ($i=0; $i<$DB->numRows(); $i++) { /* iterating the results by the num of rows */
                        /* Creating the dropdown options from DB */
                        echo ('<option value = "' . $x[$i]->email . '">' . $x[$i]->id . " - " . $x[$i]->name . " - " . $x[$i]->email . '</option>');
                    }
                }
                catch(Exception $e)
                {
                    $_SESSION['error'] = 'error in sql';
                    error_log("error in massmsgs page");
                }?>
    </select>
    <form method='post'>
        <!-- The mail form, functions are in backend.js using ajax -->
        <!-- Getting the mail 'from' from the session -->
        <br>
        <legend style='text-align:center;'>From: <?php echo($_SESSION["name"] . ' from move');?></legend>
        <br>
        <legend style='text-align:center;'>Mail subject:</legend>
        <div id='tarea'>
            <input type="text" name="mailsubject" class="" id="msubject" required>
        </div>
        <br>
        <legend style='text-align:center;'>Mail content:</legend>
        <div id='tareaa'>
            <textarea name="mailcontent" rows="8" cols="50" class="" id="mcontent" required></textarea>
        </div>
        <br><br>
        <?php if(isset ($_SESSION['error'])) {if ($_SESSION['error'] == 'error in sql') { echo "<div class='alert alert-danger' style='text-align: center;'>ERROR! Please try again later</div>"; } }?>
        <input type="button" class="" id="" value="Send to selected user"
            <?php if(isset ($_SESSION['error'])) { if ($_SESSION['error'] == 'error in sql') { echo "style='display: none;'"; }} ?>>
        <input type="button" class="" id="" value="Send to all users"
            <?php if(isset ($_SESSION['error'])) { if ($_SESSION['error'] == 'error in sql') { echo "style='display: none;'"; }} ?>>
    </form>

</body>
<?php include 'header.php'; ?>

</html>