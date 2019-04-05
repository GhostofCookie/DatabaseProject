<!DOCTYPE html>
<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);
$SQL = "";

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
else
{
    $conn->query("CREATE DATABASE dealership");
    if($conn->select_db("dealership"))
        if($conn->multi_query(file_get_contents("create_tables.sql")))
            echo "";

}
function Input($width=4, $type, $id, $label, $placeholder="", $required="required")
{
    $w = 12 - $width;
    switch($type)
    {
        case "textarea":
	        return <<<HTML
<div class="col-lg-12">
    <div class="form-group">
        <!--label class="control-label" for="problem">$label</label-->
        <textarea class="form-control" id="$id" placeholder="$placeholder" name="$id"></textarea>
    </div>
</div>
HTML;
	        break;
        default:
			return  <<<HTML
    <div class="form-group">
        <label class="control-label col-lg-$width" for="$id">$label</label>
        <div class="col-lg-$w"><input type="$type" class="form-control" id="$id" placeholder="$placeholder" name="$id" $required></div>
    </div>
HTML;
	}
}

$page_id = isset($_GET["page_id"]) ? $_GET["page_id"] : false;
$_GET['form'] = "dealership_form";

$curr_page = "";
switch($page_id)
{
    case 1:  $curr_page = "new_car.php";    break;
    case 2:  $curr_page = "used_car.php";   break;
    case 3:  $curr_page = "car_sale.php";   break;
    case 4:  $curr_page = "warranties.php"; break;
    case 5:  $curr_page = "payments.php";   break;
    case 6:  $curr_page = "reports.php";    break;
    default: $curr_page = "views.php";      break;
}
?>
<html>
<head>
    <title>Car Dealership</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- END BOOTSTRAP -->
    <link rel="stylesheet" href="css/view.css">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">McMaster Toyota</a>
            </div>
            <ul class="nav navbar-nav">
                <li <?= !$page_id     ? "class=\"active\"" : ""?>><a href="index.php">Home</a></li>
                <li <?= $page_id == 6 ? "class=\"active\"" : ""?>><a href="?page_id=6">Reports</a></li>
                <li <?= $page_id == 1 ? "class=\"active\"" : ""?>><a href="?page_id=1">New Car Purchase</a></li>
                <li <?= $page_id == 2 ? "class=\"active\"" : ""?>><a href="?page_id=2">Used Car Purchase</a></li>
                <li <?= $page_id == 3 ? "class=\"active\"" : ""?>><a href="?page_id=3">Car Sale</a></li>
                <li <?= $page_id == 4 ? "class=\"active\"" : ""?>><a href="?page_id=4">Warranties</a></li>
                <li <?= $page_id == 5 ? "class=\"active\"" : ""?>><a href="?page_id=5">Payments</a></li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <?php if($curr_page) include($curr_page); ?>
        </div>
        <div id="view">
            <?php
			if(isset($_POST['submit']) && $SQL != "")
			{
			    print $SQL;
				$result = $conn->multi_query($SQL);
                var_dump($result);
			}
            ?>
        </div>
    </div>
</body>
<script>
    $(document).on('submit',function(e){ 
		e.preventDefault(); 
		e.stopImmediatePropagation();
		});

    // weird names but they are from reports.php
    reports = "";
    for (var i = 0; i < 5; i++) reports += "#bas"+i+",";
    for (var i = 0; i < 5; i++) reports += "#adv"+i+",";
    $("#<?=$_GET['form']?>," + reports + "#carform,#saleform,#salepersonform,#warrantyform,#paymentform").on("submit", function(){
        var id = $(this).attr('id');
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serialize(),
            success: function (response) {
                $('#view').html($('#view > *', $(response)));
                if(id == "<?= $_GET['form']?>")
                {
                    //$('#<?= $_GET['form']?>').replaceWith($('#<?= $_GET['form']?>', $(response)));
                    /*setTimeout(function () {
                        location.reload();
                    }, 3000);*/
                }
            }
        });
    });

</script>
</html>
<?php
$conn->close();
?>