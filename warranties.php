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
							<?= Input(5, "number", "vin", "VIN:", "");?>
							<? // REPLACE THIS WITH A SELECT ?>
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
							<?=Input(4, "text", "warranty", "Warranty:");?>
							<?=Input(4, "date", "start-date", "Start Date:");?>
							<?=Input(4, "number", "length", "Length:");?>
							<?=Input(4, "number", "cost", "Cost:");?>
							<?=Input(4, "number", "deductible", "Deductible:");?>
							<?=Input(4, "textarea", "items-covered", "Items Covered:",  "Enter Items...");?>
                            <? // Add more entries ?>
                        </div>
                    </div>
                </div>
				<div class="col-lg-12"><button type="submit" class="btn btn-success">Submit</button></div>
			</form>
		</div>
	</div>
</div>
<div class="col-lg-2"></div>