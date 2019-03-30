<!DOCTYPE html>
<?php
$page_id = isset($_GET["page_id"]) ? $_GET["page_id"] : false;
?>
<html>
<head>
    <title>Car Dealership</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- END BOOTSTRAP -->

    <style>
        textarea { resize: none; min-height:100%;}
    </style>

</head>
<body>
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">McMaster Toyota</a>
        </div>
        <ul class="nav navbar-nav">
            <li <?= !$page_id ? "class=\"active\"" : ""?> ><a href="index.php">Home</a></li>
            <li <?= $page_id == 1? "class=\"active\"" : ""?>><a href="?page_id=1">New Car Purchase</a></li>
            <li <?= $page_id == 2 ? "class=\"active\"" : ""?>><a href="?page_id=2">Used Car Purchase</a></li>
            <li <?= $page_id == 3 ? "class=\"active\"" : ""?>><a href="?page_id=3">Car Sale</a></li>
            <li <?= $page_id == 4 ? "class=\"active\"" : ""?>><a href="?page_id=4">Warranties and Payments</a></li>
            <li <?= $page_id == 5 ? "class=\"active\"" : ""?>><a href="?page_id=5">Payments</a></li>
        </ul>
    </div>
</nav>
<?php
    $curr_page = "";
    switch($page_id)
    {
        case 1:
            $curr_page = "new_car.php";
            break;
        case 2:
            $curr_page = "used_car.php";
            break;
        case 3:
            $curr_page = "car_sale.php";
            break;
        case 4:
            $curr_page = "";
            break;
        case 5:
            $curr_page = "";
            break;
        default:
            break;
    }
?>

<div class="container-fluid">
<?php
    if($curr_page) include($curr_page);
?>
</div>

</body>
</html>