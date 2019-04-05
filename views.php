<?php


?>

<div class="col-lg-offset-2 col-lg-8">
	<div class="content">
		<div id="carsbtn" class="formbox">
			<h2>Cars</h2>
			<p>View cars available at the dealership</p>
		</div>
		<div id="salesbtn" class="formbox">
			<h2>Sales</h2>
			<p>Track sales that have been made</p>
		</div>
		<div id="salespersonbtn" class="formbox">
			<h2>Salesperson</h2>
			<p>Inquiries about salespersons and their work</p>
		</div>
		<div id="warrantiesbtn" class="formbox">
			<h2>Warranties</h2>
			<p>Check customer warranties</p>
		</div>
		<div id="paymentsbtn" class="formbox">
			<h2>Payments</h2>
			<p>Find payments</p>
		</div>
	</div>

	<div class="viewsforms">

		<div class="col-lg-offset-2 col-lg-8 viewsforms__form" id="carsform">
			<div class="panel panel-primary">
				<div class="panel-heading">Cars View Output</div>
				<div class="panel-body">
					<form id="carform" class="form-horizontal" method="post">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<?= Input(3, "text", "model", "Model:", "Enter Model", ""); ?>
									<?= Input(3, "text", "edition", "Edition:", "Enter Edition", ""); ?>
									<?= Input(3, "number", "year", "Year:", "Enter Year", ""); ?>
								</div>
							</div>
						</div>
						<input type="hidden" name="carsubmit" />
						<div class="col-lg-12"><button type="submit" class="btn btn-success">Submit</button></div>
					</form>
				</div>
			</div>
		</div>

		<div class="col-lg-offset-2 col-lg-8 viewsforms__form" id="salesform">
			<div class="panel panel-primary">
				<div class="panel-heading">Sales View Output</div>
				<div class="panel-body">
					<form id="saleform" class="form-horizontal" method="post">
						<div class="col-lg-5">
							<?= Input(3, "date", "date", "Date:", "", "") ?>
						</div>
						<div class="col-lg-7">			
						<?php	
							$sql = "SELECT DISTINCT Sale.SID, Lastname, Firstname FROM Sale NATURAL JOIN Salesperson";
							$result = $conn->query($sql);
							$arr = array();
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc())
									array_push($arr, $row);
							}

							$w = 12 - 5;
							$return = <<<HTML
							<div class="form-group">
							<label class="control-label col-lg-5" for="salesperson">Salesperson:</label>
HTML;

							$return .= "<div class='col-lg-$w'><select id='salesperson' name='salesperson' class=\"form-control\"><option selected>- Select Salesperson -</option>";
							foreach ($arr as $key => $val)
								$return .= "<option value=\"" . $val['SID'] . "\">" . $val['Lastname'] . ", " . $val['Firstname'] . "</option>";
							$return .= "</select></div>";
							$return .= <<<HTML
									</div>
HTML;
							echo $return;
			?>
						</div>
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<?= Input(3, "text", "model", "Model:", "Enter Model", ""); ?>
									<?= Input(3, "text", "edition", "Edition:", "Enter Edition", ""); ?>
									<?= Input(3, "number", "year", "Year:", "Enter Year", ""); ?>
								</div>
							</div>
						</div>
						<input type="hidden" name="salesubmit" />
						<div class="col-lg-12"><button type="submit" class="btn btn-success">Submit</button></div>
					</form>
				</div>
			</div>
		</div>

		<div class="col-lg-offset-2 col-lg-8 viewsforms__form" id="salespersonform">
			<div class="panel panel-primary">
				<div class="panel-heading">Saleperson View Output</div>
				<div class="panel-body">
					<form id="salepersonform" class="form-horizontal" method="post">
						<div class="col-lg-6">
							<?= Input(3, "text", "firstname", "Firstname:", "George", "") ?>
						</div>
						<div class="col-lg-6">
							<?= Input(3, "text", "lastname", "Lastname:", "Orwell", "") ?>
						</div>
						<div class="col-lg-12">
							<?= Input(1, "number", "phone", "Phone", "4035552222", "") ?>
						</div>
						<input type="hidden" name="salepersonsubmit" />
						<div class="col-lg-12"><button type="submit" class="btn btn-success">Submit</button></div>
					</form>
				</div>
			</div>
		</div>

		<div class="col-lg-offset-2 col-lg-8 viewsforms__form" id="warrantiesform">
			<div class="panel panel-primary">
				<div class="panel-heading">Warranties View Output</div>
				<div class="panel-body">
					<form id="warrantyform" class="form-horizontal" method="post">
					<div id="vehicle_info" class="col-lg-6">
					<div class="panel panel-default">
						<div class="panel-heading">Vehicle Info</div>
						<div class="panel-body">
                            <?php
							$sql = "SELECT DISTINCT CID, Lastname, Firstname FROM customer NATURAL JOIN warranty";
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
						</div>
					</div>
				</div>
				<div id="employee" class="col-lg-6">
					<div class="panel panel-default">
						<div class="panel-heading">Employee (Salesperson)</div>
						<div class="panel-body">
                            <?=Input(4, "text", "lastname-sp", "Last Name:", "Enter First Name", "");?>
                            <?=Input(4, "text", "firstname-sp", "First Name:", "Enter Last Name", "");?>
                            <?=Input(4, "number", "phone-sp", "Phone:", "+14031234567", "");?>
						</div>
					</div>
				</div>
                <div id="warranty" class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
							<?=Input(4, "date", "start-date", "Start Date:", "", "");?>
							<?=Input(4, "number", "duration", "Duration (in months):", "3", "");?>
                        </div>
                    </div>
                </div>
				<input type="hidden" name="warrantysubmit" />
				<div class="col-lg-12"><button type="submit" class="btn btn-success">Submit</button></div>
			</form>
		</div>
	</div>
</div>

<div class="col-lg-offset-2 col-lg-8 viewsforms__form" id="paymentsform">
	<div class="panel panel-primary">
		<div class="panel-heading">Payment View Outpout</div>
		<div class="panel-body">
			<form id="paymentform" class="form-horizontal" method="post">			
				<div class="col-lg-6">
				<?php
				
					$sql = "SELECT DISTINCT CID, Lastname, Firstname FROM customer NATURAL JOIN payment";
					$result = $conn->query($sql);
					$arr = array();
					if($result->num_rows > 0)
					{
						while($row = $result->fetch_assoc())
							array_push($arr, $row);
					}

					$w = 9;
					$return = <<<HTML
						<div class="form-group">
							<label class="control-label col-lg-3" for="customer">Customer:</label>
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
				</div>
				<div class="col-lg-6">
				<?= Input(3, "date", "paymentdate", "Payment Date:", "", "") ?>
				</div>
				<div class="col-lg-6">
					<?= Input(3, "date", "paiddate", "Paid Date:", "", "") ?>
				</div>
				<div class="col-lg-6">
					<?= Input(3, "date", "due", "Due:", "", "") ?>
				</div>
				<div class="col-lg-12">
					<?= Input(1, "number", "amount", "Amount:", "5000", "") ?>
				</div>
				<input type="hidden" name="paymentsubmit" />
				<div class="col-lg-12"><button type="submit" class="btn btn-success">Submit</button></div>
			</form>
		</div>
	</div>
</div>

</div>

<div class="view col-lg-12" id="view">

	<?php
	$sql = "";
	if (isset($_POST["carsubmit"])) {
		$sql = "SELECT * FROM car";

		$where = "";
		$multiCond = "";
		if (isset($_POST["model"]) && $_POST["model"] != "") {
			$where = $where . "model=\"" . $_POST["model"] . "\"";
			$multiCond = " AND ";
		}
		if (isset($_POST["edition"]) && $_POST["edition"] != "") {
			$where = $where . $multiCond . "edition=\"" . $_POST["edition"] . "\"";
			$multiCond = " AND ";
		}
		if (isset($_POST["year"]) && is_numeric($_POST["year"])) {
			$where = $where . $multiCond . "year=" . $_POST["year"];
			$multiCond = " AND ";
		}

		$sql .= $where != "" ?" WHERE " . $where : "";
	}

	if (isset($_POST["salesubmit"])) {
		$sql = "SELECT sale.* FROM sale, salesperson, car WHERE sale.VIN = car.VIN AND sale.SID = salesperson.SID ";
		$where = "";
		$multiCond = " AND ";
		if (isset($_POST["date"]) && $_POST["date"] != "") {
			$where = $where . $multiCond . "date='" . $_POST["date"] . "'";
		}
		if (isset($_POST["salesperson"]) && is_numeric($_POST["salesperson"])) {
			$where = $where . $multiCond . "sale.SID=" . $_POST["salesperson"];
		}
		if (isset($_POST["model"]) && $_POST["model"] != "") {
			$where = $where . $multiCond . "model=\"" . $_POST["model"] . "\"";
		}
		if (isset($_POST["edition"]) && $_POST["edition"] != "") {
			$where = $where . $multiCond . "edition=\"" . $_POST["edition"] . "\"";
		}
		if (isset($_POST["year"]) && is_numeric($_POST["year"])) {
			$where = $where . $multiCond . "year=" . $_POST["year"];
		}

		$sql .= $where;
	}

	if (isset($_POST["salepersonsubmit"])) {
		$sql = "SELECT * FROM salesperson";
		$where = "";
		$multiCond = " AND ";
		if (isset($_POST["firstname"]) && $_POST["firstname"] != "") {
			$where = $where . "firstname=\"" . $_POST["firstname"] . "\"";
		}
		if (isset($_POST["lastname"]) && $_POST["lastname"] != "") {
			$where = $where . $multiCond . "lastname=\"" . $_POST["lastname"] . "\"";
		}
		if (isset($_POST["phone"]) && $_POST["phone"] != "") {
			$where = $where . $multiCond . "phoneno=\"" . $_POST["phone"] . "\"";
		}

		$sql .= $where != "" ?" WHERE " . $where : "";
	}

	if (isset($_POST["warrantysubmit"])) {

		$sql = "SELECT warranty.* FROM warranty, customer, salesperson WHERE warranty.CID = customer.CID AND warranty.SID = salesperson.SID ";
		$where = "";
		$multiCond = " AND ";
		if (isset($_POST["customer"]) && $_POST["customer"] != "- Select Customer -") {
			$where = $where . $multiCond . "warranty.CID=" . $_POST["customer"];
		}
		if (isset($_POST["lastname-sp"]) && $_POST["lastname-sp"] != "") {
			$where = $where . $multiCond . "salesperson.lastname=\"" . $_POST["lastname-sp"] . "\"";
		}
		if (isset($_POST["firstname-sp"]) && $_POST["firstname-sp"] != "") {
			$where = $where . $multiCond .  "salesperson.firstname=\"" . $_POST["firstname-sp"] . "\"";
		}
		if (isset($_POST["phone-sp"]) && $_POST["phone-sp"] != "") {
			$where = $where . $multiCond . "salesperson.phoneno=\"" . $_POST["phone-sp"] . "\"";
		}
		if (isset($_POST["start-date"]) && $_POST["start-date"] != ""){
			$where = $where . $multiCond . "startdate='" . $_POST["start-date"] . "'";
		}

		$sql .= $where;
	}

	if (isset($_POST["paymentsubmit"])) {

		$sql = "SELECT payment.* FROM payment, customer WHERE payment.CID = customer.CID ";
		$where = "";
		$multiCond = " AND ";
		if (isset($_POST["customer"]) && $_POST["customer"] != "- Select Customer -") {
			$where = $where . $multiCond . "payment.CID=" . $_POST["customer"];
		}
		if (isset($_POST["paymentdate"]) && $_POST["paymentdate"] != "") {
			$where = $where . $multiCond . "paymentdate='" . $_POST["paymentdate"] . "'";
		}
		if (isset($_POST["paiddate"]) && $_POST["paiddate"] != "") {
			$where = $where . $multiCond . "paiddate='" . $_POST["paiddate"] . "'";
		}
		if (isset($_POST["due"]) && $_POST["due"] != "") {
			$where = $where . $multiCond .  "due='" . $_POST["due"] . "'";
		}
		if (isset($_POST["amount"]) && $_POST["amount"] != "") {
			$where = $where . $multiCond . "amount=" . $_POST["amount"];
		}

		$sql .= $where;
	}

	echo "<h2>Query</h2>";
	echo "<pre>";
	echo $sql;
	echo "</pre>";
	$result = ($sql != "") ?$conn->query($sql) : false;
	$arr = array();
	if ($result && $result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {
			array_push($arr, $row);
		}
		
		$made = false;
		$head = "<tr>";
		$tuples = "";
		foreach ($arr as $row)
		{
			$tuples .= "<tr>";
			foreach ($row as $key => $value)
			{
				if ($made == false)
					$head .= "<th style=\"font-size: 20px;\">$key</th>";
					
				$tuples .= "<td style=\"font-size: 16px;\">$value</td>";
			}
			$tuples .= "</tr>";
			$made = true;
		}
		$head .= "</tr>";
		
		echo "<h2>Result</h2>";
		echo "<table style=\"padding: 10px 0;\" class=\"table-striped table-bordered col-lg-12\">";
		echo $head;
		echo $tuples;
		echo "</table>";
	} 	
	?>

</div>
<script src="js/view.js"></script>

</div>