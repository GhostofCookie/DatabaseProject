<?php
$cid            = isset($_POST['customer'])         ? $_POST['customer'] : "";
$vin            = isset($_POST['vin'])          ? "\"".$_POST['vin']."\"" : "";
$co_signer      = isset($_POST['co-signer'])        ? "\"".$_POST['co-signer']."\"" : "";
$war_sale_date  = isset($_POST['war-sale-date'])    ? "\"".$_POST['war-sale-date']."\"" : "";
$monthly_cost   = isset($_POST['monthly-cost'])     ? $_POST['monthly-cost'] : "";
$lastname_sp    = isset($_POST['lastname-sp'])      ? "\"".$_POST['lastname-sp']."\"" : "";
$firstname_sp   = isset($_POST['firstname-sp'])     ? "\"".$_POST['firstname-sp']."\"" : "";
$phone_sp       = isset($_POST['phone-sp'])         ? $_POST['phone-sp'] : "";
$start_date     = isset($_POST['start-date'])       ? "\"".$_POST['start-date']."\"" : "";
$length         = isset($_POST['length'])           ? $_POST['length'] : "";
$total_cost     = isset($_POST['total-cost'])       ? $_POST['total-cost'] : "";
$cost           = isset($_POST['cost'])             ? $_POST['cost'] : "";
$deductible     = isset($_POST['deductible'])       ? $_POST['deductible'] : "";
$items          = isset($_POST['items-covered'])    ? "\"".$_POST['items-covered']."\"" : "";


$sid = "";
$sql = "SELECT SID FROM Salesperson WHERE Firstname=$firstname_sp AND Lastname=$lastname_sp AND PhoneNo=$phone_sp";
if($result = $conn->query($sql))
	while($row = $result->fetch_row())
		$sid = $row[0];

$wid = "";
$sql = "SELECT DISTINCT WID FROM Warranty WHERE VIN=$vin AND SID=$sid AND CID=$cid AND StartDate=$start_date AND WarrantySalesDate=$war_sale_date";
if($result = $conn->query($sql))
	while($row = $result->fetch_row())
		$wid = $row[0];

print $wid;

if(!$wid) {
	$sql = "SELECT MAX(WID) FROM Warranty";
	if ($result = $conn->query($sql))
		while ($row = $result->fetch_row())
			$wid = max($row[0] + 1, $wid);

	$SQL = <<<SQL
INSERT INTO Warranty VALUES($wid, $vin, $sid, $cid, $items, $deductible, $monthly_cost, $total_cost, $length, $co_signer, $start_date, $war_sale_date);
SQL;
}
else $SQL = "";
?>
<div class="col-lg-2"></div>
<div class="col-lg-8">
	<div class="panel panel-primary">
		<div class="panel-heading">Warranties</div>
		<div class="panel-body">
			<form id="<?=$_GET['form']?>" class="form-horizontal" action="?page_id=<?=$_GET['page_id']?>" method="post">
				<div id="vehicle_info" class="col-lg-6">
					<div class="panel panel-default">
						<div class="panel-heading">Vehicle Info</div>
						<div class="panel-body">
							<?= Input(5, "text", "vin", "VIN:", "");?>
                            <?php
							$sql = "SELECT CID, Lastname, Firstname FROM customer";
							$result = $conn->query($sql);
							$arr = array();
							if($result->num_rows > 0)
							{
								while($row = $result->fetch_assoc())
									array_push($arr, $row);
							}

							$w = 12 - 5;
							$return = <<<HTML
                                <div class="form-group">
                                    <label class="control-label col-lg-5" for="customer">Customer:</label>
HTML;

							$return .= "<div class='col-lg-$w'><select id='customer' name='customer' class=\"form-control\"><option selected>- Select Customer -</option>";
							foreach ($arr as $key => $val)
								$return .= "<option value=\"".$val['CID']."\">". $val['Lastname'] . ", " . $val['Firstname'] . "</option>";
							$return .= "</select></div>";
							$return .= <<<HTML
                                </div>
HTML;
							echo $return;
                            ?>
							<?= Input(5, "text", "co-signer", "Co-Signer:", "Enter Co-Signer");?>
							<?= Input(5, "date", "war-sale-date", "Warranty Sale Date:", "");?>
							<?= Input(5, "number", "total-cost", "Total Cost:", "Enter Total Cost");?>
							<?= Input(5, "number", "monthly-cost", "Monthly Cost:", "Enter Monthly Cost");?>
						</div>
					</div>
				</div>
				<div id="employee" class="col-lg-6">
					<div class="panel panel-default">
						<div class="panel-heading">Employee (Salesperson)</div>
						<div class="panel-body">
                            <?=Input(4, "text", "lastname-sp", "Last Name:", "Enter First Name");?>
                            <?=Input(4, "text", "firstname-sp", "First Name:", "Enter Last Name");?>
                            <?=Input(4, "number", "phone-sp", "Phone:", "+14031234567");?>
						</div>
					</div>
				</div>
                <div id="warranty" class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
							<?=Input(4, "date", "start-date", "Start Date:");?>
							<?=Input(4, "number", "length", "Length:");?>
							<?=Input(4, "number", "cost", "Cost:");?>
							<?=Input(4, "number", "deductible", "Deductible:");?>
							<?=Input(4, "textarea", "items-covered", "Items Covered:",  "Enter Items...");?>
                            <? // Add more entries ?>
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
<div class="col-lg-2"></div>