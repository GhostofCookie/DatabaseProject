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
				<div class="panel-heading">Cars View Submission</div>
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
				<div class="panel-heading">Sales View Submission</div>
				<div class="panel-body">
					<form id="saleform" class="form-horizontal" method="post">
						<div class="col-lg-5">
							<?= Input(3, "date", "date", "Date:", "", "") ?>
						</div>
						<div class="col-lg-7">
							<?= Input(3, "text", "saleperson", "Saleperson Firstname:", "George", "") ?>
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
				<div class="panel-heading">Saleperson View Submission</div>
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
				<div class="panel-heading">Warranties View Submission</div>
				<div class="panel-body">
					<form id="warrantyform>" class="form-horizontal" method="post">
						<div class="panel-heading">Vehicle Info</div>
						<div class="panel-body">
							<?= Input(5, "number", "vin", "VIN:", ""); ?>
							<? 
									?>
							<?php
									$sql = "SELECT CID, Lastname, Firstname FROM customer";
									$result = $conn->query($sql);
									$arr = array();
									if ($result->num_rows > 0) {
											while ($row = $result->fetch_assoc())
												array_push($arr, $row);
										}

									$w = 12 - 5;
									$return = <<<HTML
									<div class="form-group">
										<label class="control-label col-lg-5" for="customer">Customer:</label>
	HTML;

									$return .= "<div class='col-lg-$w'><select id='customer' name='customer' class=\"form-control\"><option selected>- Select Customer -</option>";
									foreach ($arr as $key => $val)
										$return .= "<option value=\"" . $val['CID'] . "\">" . $val['Lastname'] . ", " . $val['Firstname'] . "</option>";
									$return .= "</select></div>";
									$return .= <<<HTML
									</div>
	HTML;
									echo $return;
									?>
							<?= Input(5, "text", "co-signer", "Co-Signer:", "Enter Co-Signer"); ?>
							<?= Input(5, "date", "war-sale-date", "Warranty Sale Date:", ""); ?>
							<?= Input(5, "number", "total-cost", "Total Cost:", "Enter Total Cost"); ?>
							<?= Input(5, "number", "monthly-cost", "Monthly Cost:", "Enter Monthly Cost"); ?>
						</div>
				</div>
			</div>
			<div id="employee" class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">Employee (Salesperson)</div>
					<div class="panel-body">
						<?= Input(4, "text", "lastname-sp", "Last Name:", "Enter First Name"); ?>
						<?= Input(4, "text", "firstname-sp", "First Name:", "Enter Last Name"); ?>
						<?= Input(4, "number", "phone-sp", "Phone:", "+14031234567"); ?>
					</div>
				</div>
			</div>
			<div id="warranty" class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<?= Input(4, "text", "warranty", "Warranty:"); ?>
						<?= Input(4, "date", "start-date", "Start Date:"); ?>
						<?= Input(4, "number", "length", "Length:"); ?>
						<?= Input(4, "number", "cost", "Cost:"); ?>
						<?= Input(4, "number", "deductible", "Deductible:"); ?>
						<?= Input(4, "textarea", "items-covered", "Items Covered:",  "Enter Items..."); ?>
						<? 
									?>
					</div>
				</div>
			</div>
			<div class="col-lg-12"><button type="submit" class="btn btn-success">Submit</button></div>
			</form>
		</div>
	</div>
</div>

<div class="col-lg-offset-2 col-lg-8 viewsforms__form" id="paymentform">
	<div class="panel panel-primary">
		<div class="panel-heading">Payment View Submission</div>
		<div class="panel-body">
			<form id="paymentform" class="form-horizontal" method="post">
				<div class="col-lg-6">
					<?= Input(3, "date", "date", "Date:") ?>
				</div>
				<div class="col-lg-6">
					<?= Input(3, "number", "vin", "VIN:") ?>
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
				<input type="hidden" name="paymentsubmit" />
				<div class="col-lg-12"><button type="submit" class="btn btn-success">Submit</button></div>
			</form>
		</div>
	</div>
</div>

</div>

<div class="view" id="view">

	<?php
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
										$result = $conn->query($sql);

										print $sql;

										$arr = array();
										if ($result && $result->num_rows > 0) {

											while ($row = $result->fetch_assoc()) {
												array_push($arr, $row);
											}
										} else {
											// say there are no results.
										}
										echo "<pre>";
										print_r($arr);
										echo "</pre>";
									}

									if (isset($_POST["salesubmit"])) {
										$sql = "SELECT sale.* FROM sale NATURAL JOIN car";
										$where = "";
										$multiCond = "";
										if (isset($_POST["date"]) && $_POST["date"] != "") {
											$where = $where . "date='" . $_POST["date"] . "'";
											$multiCond = " AND ";
										}
										if (isset($_POST["saleperson"]) && $_POST["saleperson"] != "") {
											$where = $where . $multiCond . "saleperson=\"" . $_POST["saleperson"] . "\"";
											$multiCond = " AND ";
										}
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
										print $sql;
										$result = $conn->query($sql);


										$arr = array();
										if ($result && $result->num_rows > 0) {

											while ($row = $result->fetch_assoc()) {
												array_push($arr, $row);
											}
										} else {
											// say there are no results.
										}
										echo "<pre>";
										print_r($arr);
										echo "</pre>";
									}

									if (isset($_POST["salepersonsubmit"])) {
										$sql = "SELECT * FROM salesperson";
										$where = "";
										$multiCond = "";
										if (isset($_POST["firstname"]) && $_POST["firstname"] != "") {
											$where = $where . $multiCond . "firstname=\"" . $_POST["firstname"] . "\"";
											$multiCond = " AND ";
										}
										if (isset($_POST["lastname"]) && $_POST["lastname"] != "") {
											$where = $where . "lastname=\"" . $_POST["lastname"] . "\"";
											$multiCond = " AND ";
										}
										if (isset($_POST["phone"]) && $_POST["phone"] != "") {
											$where = $where . $multiCond . "phone=\"" . $_POST["phone"] . "\"";
											$multiCond = " AND ";
										}

										$sql .= $where != "" ?" WHERE " . $where : "";
										print $sql;
										$result = $conn->query($sql);


										$arr = array();
										if ($result && $result->num_rows > 0) {

											while ($row = $result->fetch_assoc()) {
												array_push($arr, $row);
											}
										} else {
											// say there are no results.
										}
										echo "<pre>";
										print_r($arr);
										echo "</pre>";
									}

									if (isset($_POST["warrantysubmit"])) {

										$sql = "SELECT warranty.* FROM warranty NATURAL JOIN customer";
										$from = "FROM WARRANTY";
										$where = "";
										$multiCond = "";
										if (isset($_POST["date"]) && $_POST["date"] != "") {
											$where = $where . "date='" . $_POST["date"] . "'";
											$multiCond = " AND ";
										}
										if (isset($_POST["saleperson"]) && $_POST["saleperson"] != "") {
											$where = $where . $multiCond . "saleperson=\"" . $_POST["saleperson"] . "\"";
											$multiCond = " AND ";
										}
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
										print $sql;
										$result = $conn->query($sql);


										$arr = array();
										if ($result && $result->num_rows > 0) {

											while ($row = $result->fetch_assoc()) {
												array_push($arr, $row);
											}
										} else {
											// say there are no results.
										}
										echo "<pre>";
										print_r($arr);
										echo "</pre>";
									}

									if (isset($_POST["salesubmit"])) {
										$sql = "SELECT * FROM sales";
										$where = "";
										$multiCond = "";
										if (isset($_POST["date"]) && $_POST["date"] != "") {
											$where = $where . "date='" . $_POST["date"] . "'";
											$multiCond = " AND ";
										}
										if (isset($_POST["saleperson"]) && $_POST["saleperson"] != "") {
											$where = $where . $multiCond . "saleperson=\"" . $_POST["saleperson"] . "\"";
											$multiCond = " AND ";
										}
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
										print $sql;
										$result = $conn->query($sql);


										$arr = array();
										if ($result && $result->num_rows > 0) {

											while ($row = $result->fetch_assoc()) {
												array_push($arr, $row);
											}
										} else {
											// say there are no results.
										}
										echo "<pre>";
										print_r($arr);
										echo "</pre>";
									}
									?>

</div>

</div>