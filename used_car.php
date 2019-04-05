<?php
$date           = isset($_POST['date'])         ? "\"".$_POST['date']."\"" : "";
$vin            = isset($_POST['vin'])          ? "\"".$_POST['vin']."\"" : "";
$model          = isset($_POST['model'])        ? "\"".$_POST['model']."\"" : "";
$edition        = isset($_POST['edition'])      ? "\"".$_POST['edition']."\"" : "";
$year           = isset($_POST['year'])         ? $_POST['year'] : "";
//$rid            = isset($_POST['rid'])          ? $_POST['rid'] : "";
$repair_cost    = isset($_POST['cost-repair'])  ? $_POST['cost-repair'] : "";
$actual_cost    = isset($_POST['cost-actual'])  ? $_POST['cost-actual'] * 1.05: "";
$problem        = isset($_POST['problem'])      ? "\"".$_POST['problem']."\"" : "";
$colour         = isset($_POST['colour'])       ? "\"".$_POST['colour']."\"" : "";
$miles          = isset($_POST['miles'])        ? $_POST['miles'] : "";
$book_price     = isset($_POST['book-price'])   ? $_POST['book-price'] : "";
$paid_price     = isset($_POST['paid-price'])   ? $_POST['paid-price'] * 1.05 : "";
$street         = isset($_POST['street'])       ? "\"".$_POST['street']."\"" : "";
$street_no      = isset($_POST['street-no'])    ? $_POST['street-no'] : "";
$city           = isset($_POST['city'])         ? "\"".$_POST['city']."\"" : "";
$province       = isset($_POST['province'])     ? "\"".$_POST['province']."\"" : "";
$zip            = isset($_POST['zip'])          ? "\"".$_POST['zip']."\"" : "";
$seller         = isset($_POST['seller'])       ? "\"".$_POST['seller']."\"" : "";


$rid = "";
$sql = "SELECT MAX(RID) FROM Repair";
if($result = $conn->query($sql))
	while($row = $result->fetch_row())
		$rid = max($row[0] + 1, $rid);

$SQL = <<<SQL
INSERT INTO Car VALUES($vin, $date, $model, $edition, $year, $colour, 0);
INSERT INTO UsedCar VALUES($vin, $seller, $miles, $book_price, $paid_price, $street_no,$street, $city, $province, $zip);
INSERT INTO Repair VALUES($rid, $vin, $problem, $repair_cost, $actual_cost);
SQL;

?>
<div class="col-lg-3"></div>
<div class="col-lg-6">
    <div class="panel panel-primary">
        <div class="panel-heading">Used Car Purchase</div>
        <div class="panel-body">
            <form id="<?=$_GET['form']?>" class="form-horizontal" action="?page_id=<?=$_GET['page_id']?>" method="post">
                <div class="row">
                    <div class="col-lg-6 form-group">
						<?=Input(5, "date", "date", "Date:")?>
                    </div>
                    <div class="col-lg-6 form-group">
						<?=Input(5, "text", "vin", "VIN:")?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 form-group">
						<?=Input(5, "text", "street", "Street:")?>
						<?=Input(5, "number", "street-no", "Street No.:")?>
						<?=Input(5, "text", "city", "City:")?>
						<?=Input(5, "text", "province", "Province:")?>
						<?=Input(5, "text", "zip", "ZIP:")?>
                    </div>
                    <div class="col-lg-6 form-group">
						<?=Input(5, "text", "seller", "Seller/Dealer:")?>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Vehicle Info</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
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
                            <div class="col-lg-6">
								<?= Input(4, "text", "colour", "Colour:", "Enter Colour");?>
								<?= Input(4, "number", "miles", "Miles:", "Enter Miles");?>
								<?= Input(4, "number", "book-price", "Book Price:", "Enter Book Price");?>
								<?= Input(4, "number", "paid-price", "Paid Price:", "Enter Paid Price");?>
                            </div>
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="col-lg-9">
                                            <?= Input(4, "text", "cost-repair", "Est. Repair Cost:", "Enter Est. Repair Cost");?>
                                            <?= Input(4, "text", "cost-actual", "Actual Cost:", "Enter Actual Cost");?>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <!--label class="control-label" for="problem">Problem:</label-->
                                                <textarea class="form-control" id="problem" placeholder="Problem..." name="problem"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <input type="hidden" name="submit">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-3"></div>

