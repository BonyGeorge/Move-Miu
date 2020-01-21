<?php
require_once '../model/html.php';
require_once '../model/user_login.php';
require_once '../model/profile_photo.php';
require_once '../model/theme.php';
$u1 = new user_login();
$h1 = new html();
$p1 = new profile_photo();
$t1 = new theme();

session_start();
if (isset($_SESSION['user-id'])) {
    $userID = $_SESSION['user-id'];
} else {
    header("location:../viewer/login.php");
}
if ($userID == -1) {
    header("location:../viewer/login.php");
}


$data = array($userID);
$result = $u1->login($data);
foreach ($result as $value) {
    $name = $value['name'];
    $type = $value['type'];
    $type_id = $value['type_id'];
}
$photoURL = $p1->read($data);
if (!empty($photoURL)) {
    foreach ($photoURL as $value) {
        $url = $value['url'];
    }
}

$themeCode = $t1->readUserTheme($data);
if (!empty($themeCode)) {
    foreach ($themeCode as $value) {
        $linkCode = $value['link'];
    }
} else {
    $linkCode = "../../css/libraries/style.red.css~../../css/profile-red.css";
}

$data2 = array($type_id);
$menu = $h1->read($data2);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">

        <link rel="stylesheet" href="../../css/libraries/nifty.min.css">
        <link rel="stylesheet" href="../../css/designaccount.css">
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="../../css/libraries/bootstrap.min.css">

        <!-- Font Awesome CSS-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/libraries/font-awesome.min.css">
        <!-- Custom Font Icons CSS-->
        <link rel="stylesheet" href="../../css/libraries/font.css">
        <!--<link rel="stylesheet" href="../../css/libraries/multi-select.css">-->
        <!--<link rel="stylesheet" href="../../css/libraries/multi-select.dev.css">-->
        <link rel="stylesheet" href="../../css/libraries/multi-select.css">
        <!-- Google fonts - Muli-->
        <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">-->
    <div class="screen-theme">
        <!-- theme stylesheet-->
        <?php
        $theme = explode("~", $linkCode);
        echo "<link rel='stylesheet' href='$theme[0]' id='theme-stylesheet'>";
        echo "<link rel='stylesheet' href='$theme[1]' id='theme-stylesheet2'>";
        ?>

    </div>

    <link rel="stylesheet" href="../../css/default.css">
    <!--<link rel="stylesheet" href="../../css/libraries/sweetalert2.min.css">-->
    <!--<script src="../../js/libraries/sweetalert2.min.js"></script>-->
    <script src="../../js/libraries/sweetalert2.all.min.js"></script>
<!--    <script src="../../js/libraries/promise.min.js"></script>-->
</head>
<body>
    <script>
        var user_id = <?php echo json_encode($userID); ?>;
        var user_type_id = <?php echo json_encode($type_id); ?>;
    </script>
    <header class="header">   
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <div class="navbar-header"><a href="index.html" class="navbar-brand">
                        <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">MO</strong><strong>VE</strong></div>
                        <div class="brand-text brand-sm"><strong class="text-primary">N</strong><strong>V</strong></div></a>
                    <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
                </div>
                <ul class="right-menu list-inline no-margin-bottom"> 


                    <li class="list-inline-item logout">
                        <a id="logout" href="login.php" class="nav-link">Logout <i class="icon-logout"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!--<div class="d-flex align-items-stretch">-->
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="<?php echo $url; ?>" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
               <h1 class="h5"><?php echo $name; ?></h1>
                <p><?php echo $type; ?></p>
            </div>
        </div>
        <!-- Sidebar Navidation Menus-->
        <ul class="list-unstyled">
            <?php
            $pageName = "";
            $pageClassName = "";
            if (!empty($menu)) {
                foreach ($menu as $value) {
                    if (count($value) == 3) {
                        for ($i = 0; $i < count($value); $i++) {
                            if ($i == 0) {
                                $pageName = $value[$i];
                            } else if ($i == 1) {
                                $pageClassName = $value[$i];
                            } else {
                                $icon = $value[$i];
                            }
                        }
                        echo "<li id='$pageClassName-li'><a id='$pageClassName' class='link-page'> <i class='$icon'></i>$pageName</a></li>";
                    } else {
                        $counter = -1;
                        for ($i = 0; $i < count($value); $i++) {
                            if ($i == 0) {
                                $pageName = $value[$i];
                            } else if ($i == 1) {
                                $pageClassName = $value[$i];
                                $icon = $value[$i + 1];
                                //fa fa-user
                                echo "<li  class='$pageClassName'>
                                            <a href='#" . $pageClassName . "Dropdown' aria-expanded='false' data-toggle='collapse'> <i class='$icon'></i>$pageName</a>
                                            <ul id='" . $pageClassName . "Dropdown' class='collapse list-unstyled'>";
                            } else if ($i == 2) {
                                $counter = 0;
                            } else if ($counter == 0) {
                                $pageName = $value[$i];
                                $counter++;
                            } else if ($counter == 1) {
                                $pageClassName = $value[$i];
                                $counter++;
                                echo "<li id='$pageClassName-li'><a id='$pageClassName' class='link-page'>$pageName</a></li>";
                                if ($i == count($value) - 2) {
                                    echo "</ul>
                                            </li>";
                                }
                            } else if ($counter == 2) {
                                $counter = 0;
                            }
                        }
                    }
                }
            }
            ?>
        </ul>
    </nav>
    <div class="page-content">

        <div class="col-lg-12">
            <div class="block">
                <div class="title"><strong>TODO List</strong></div>
                <div class="todo">
                    <div id="myDIV" class="header">
                        <h2>.</h2>
                        <input type="text" id="myInput" placeholder="Title...">
                        <span id="todo-btn" class="addBtn">Add</span>
                    </div>

                    <ul id="myUL">

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--</div>-->

    <script src="../../js/libraries/jquery-3.2.1.min.js"></script>
    <script src="../../js/libraries/popper.js"></script>
    <script src="../../js/libraries/bootstrap.min.js"></script>
    <script src="../../js/libraries/front.js"></script>
    <script src="../../js/libraries/jquery.multi-select.js"></script>
    <script src="../../js/linker.js"></script>
    <script src="../../js/todo.js"></script>

</body>
</html>