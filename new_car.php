<?php
$date               = isset($_POST['date'])             ? "\"".$_POST['date']."\"" : "";
$vin                = isset($_POST['vin'])              ? $_POST['vin'] : "";
$model              = isset($_POST['model'])            ? $_POST['model'] : "";
$edition            = isset($_POST['edition'])          ? $_POST['edition'] : "";
$year               = isset($_POST['year'])             ? $_POST['year'] : "";
$exterior_colour    = isset($_POST['exterior-colour'])  ? $_POST['exterior-colour'] : "";
$interior_colour    = isset($_POST['interior-colour'])  ? $_POST['interior-colour'] : "";
?>

<div class="col-lg-4"></div>
<div class="col-lg-4">
    <div class="panel panel-primary">
        <div class="panel-heading">New Car Purchase</div>
        <div class="panel-body">
            <form id="<?=$_GET['form']?>" class="form-horizontal" action="?page_id=<?=$_GET['page_id']?>" method="post">
                <div class="col-lg-6">
                    <?=Input(3, "date", "date", "Date:")?>
                </div>
                <div class="col-lg-6">
                    <?=Input(3, "number", "vin", "VIN:")?>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
							<?= Input(3, "text", "model", "Model:", "Enter Model");?>
							<?= Input(3, "text", "edition", "Edition:", "Enter Edition");?>
							<?= Input(3, "number", "year", "Year:", "Enter Year");?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
					<?= Input(4, "text", "exterior-colour", "Exterior Colour:", "Enter Exterior Colour");?>
					<?= Input(4, "text", "interior-colour", "Interior Colour:", "Enter Interior Colour");?>
                </div>
                <div class="col-lg-12"><button type="submit" class="btn btn-success">Submit</button></div>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-4"></div>