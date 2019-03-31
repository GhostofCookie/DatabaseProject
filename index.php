<!DOCTYPE html>
<?php

$servername = "localhost:3306";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
    $conn->query("CREATE DATABASE dealership");
    if($conn->select_db("dealership"))
        if($conn->multi_query(file_get_contents("create_tables.sql")))
            echo "";
}

function Input($width=4, $type, $id, $label, $placeholder="")
{
    $w = 12 - $width;
    return  <<<HTML
<div class="form-group">
    <label class="control-label col-lg-$width" for="$id">$label</label>
    <div class="col-lg-$w"><input type="$type" class="form-control" id="$id" placeholder="$placeholder" name="$id"></div>
</div>
HTML;

}

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
            $curr_page = "views.php";
            break;
        default:
            break;
    }
?>

<div class="container-fluid">
<?php
    if($curr_page) include($curr_page);
?>
    <form id="t" method="post">
        <input name="test" type="text" name="test">
        <button >submit</button>
    </form>
    <div id="view">
        <?=isset($_POST['test']) ? $_POST['test'] : "asd"; ?>
    </div>
</div>

</body>
<script>
    $(document).on('submit',function(e){
        e.preventDefault();
    });

    var submit;
    $(document).on('click',':submit',function(){
        submit = $(this);
    });

    $('#t').on("submit", function() {
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serialize() + "&" + escape($(submit).attr("name")) + "=" + escape($(submit).val()),
            success: function (response) {
                console.log("hello");
                $('#view').replaceWith($('#view', $(response)));
            }
        });
    });
</script>
</html>
<?php
$conn->close();
?>