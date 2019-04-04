<?php
$date               = isset($_POST['date'])             ? "\"".$_POST['date']."\"" : "";
$vin                = isset($_POST['vin'])              ? "\"".$_POST['vin']."\"" : "";
$model              = isset($_POST['model'])            ? "\"".$_POST['model']."\"" : "";
$edition            = isset($_POST['edition'])          ? "\"".$_POST['edition']."\"" : "";
$year               = isset($_POST['year'])             ? $_POST['year'] : "";
$exterior_colour    = isset($_POST['exterior-colour'])  ? "\"".$_POST['exterior-colour']."\"" : "";
$interior_colour    = isset($_POST['interior-colour'])  ? "\"".$_POST['interior-colour']."\"" : "";
$exp_miles          = isset($_POST['exp-miles'])        ? "\"".$_POST['exp-miles']."\"" : "";
$msrp               = isset($_POST['msrp'])             ? $_POST['msrp'] * 1.05 : "";

$SQL = <<<SQL
INSERT INTO NewCar VALUES($vin, $exp_miles, $msrp, $interior_colour, 2000.0);
INSERT INTO Car VALUES($vin, $date, $model, $edition, $year, $exterior_colour, 0);
SQL;

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
                    <?=Input(3, "text", "vin", "VIN:")?>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
							<?php
							$sql = "SELECT DISTINCT model FROM car";
							$result = $conn->query($sql);
							$arr = array();
							if($result->num_rows > 0)
							{
								while($row = $result->fetch_assoc())
									array_push($arr, $row);
							}

							$w = 12 - 3;
							$return = <<<HTML
                                <div class="form-group">
                                    <label class="control-label col-lg-3" for="model">Model:</label>
HTML;
							$return .= "<div class='col-lg-$w'><select id='model' name='model' class=\"form-control\"><option selected>- Select Model -</option>";
							foreach ($arr as $key => $val)
								$return .= "<option>". $val['model'] . "</option>";
							$return .= "</select></div>";
							$return .= <<<HTML
                                </div>
HTML;
							echo $return;
							?>
							<?= Input(3, "text", "edition", "Edition:", "Enter Edition");?>
							<?= Input(3, "number", "year", "Year:", "Enter Year");?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
					<?= Input(4, "text", "exterior-colour", "Exterior Colour:", "Enter Exterior Colour");?>
					<?= Input(4, "text", "interior-colour", "Interior Colour:", "Enter Interior Colour");?>
					<?= Input(4, "number", "exp-miles", "Expected Miles:");?>
					<?= Input(4, "number", "msrp", "MSRP:");?>
                </div>
                <div class="col-lg-12">
                    <input type="hidden" name="submit">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-4"></div>