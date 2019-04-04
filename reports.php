<div class="col-lg-offset-1 col-lg-10">
	<div class="content">
		
		<h1>Basic Queries</h1>
		<form id="bas1" method="post" class="reportbox">
			<input type="hidden" name="bas1" />
			<button type="submit">
				<h3>Warranties Sold by Siebrand</h3>
				<p>Report the number of warranties sold by a particular salesman (Siebrand).</p>
			</button>
		</form>
		<form id="bas2" method="post" class="reportbox">
			<input type="hidden" name="bas2" />
			<button type="submit">
				<h3>Average number of repairs</h3>
				<p>Report the average number of repairs on all Used Cars.</p>
			</button>
		</form>
		<form id="bas3" method="post" class="reportbox">
			<input type="hidden" name="bas3" />
			<button type="submit">
				<h3>Car count</h3>
				<p>Number of used cars and new cars currently at the dealership.</p>
			</button>
		</form>
		<form id="bas4" method="post" class="reportbox">
			<input type="hidden" name="bas4" />
			<button type="submit">
				<h3>MSRP or Book Value < $8,000</h3>
				<p>List of all cars with MSRP or Book Value less than $8,000.</p>
			</button>
		</form>
		<form id="bas5" method="post" class="reportbox">
			<input type="hidden" name="bas5" />
			<button type="submit">
				<h3>Report payment history of Tiller</h3>
				<p>Find and report the payment history from a specific customer (Tiller).</p>
			</button>
		</form>
		
		<h1>Advanced Queries</h1>
		<form id="adv1" method="post" class="reportbox">
			<input type="hidden" name="adv1" />
			<button type="submit">
				<h3>Salespersons who sold 3 cars with value greater than 10k</h3>
				<p>List all of the Salesperson(s) who have sold 3 cars with a MSRP/Book Value greater than $10,000 within a given month (March).</p>
			</button>
		</form>
		<form id="adv2" method="post" class="reportbox">
			<input type="hidden" name="adv2" />
			<button type="submit">
				<h3>Customers who have both used and new cars</h3>
				<p>Report the names of customers and model/edition of cars of the customers that have a used car and a new car.</p>
			</button>
		</form>
		<form id="adv3" method="post" class="reportbox">
			<input type="hidden" name="adv3" />
			<button type="submit">
				<h3>q5</h3>
				<p>Internalized compression</p>
			</button>
		</form>
		<form id="adv4" method="post" class="reportbox">
			<input type="hidden" name="adv4" />
			<button type="submit">
				<h3>Gray Cars</h3>
				<p>List of all cars with MSRP or Book Value less than $8,000.</p>
			</button>
		</form>
		<form id="adv5" method="post" class="reportbox">
			<input type="hidden" name="adv5" />
			<button type="submit">
				<h3>yup</h3>
				<p>yarp</p>
			</button>
		</form>
	</div>
</div>

<script>
	function report(e) {
		e.parentElement.submit();
	}
</script>

<div id="view" class="col-lg-offset-2 col-lg-8">

	<?php

	$sql = "";
	if (isset($_POST["bas1"])) {
		$sql = "SELECT COUNT(W.WID) as WarrantyCount
		FROM Warranty AS W, Salesperson AS Sp
		WHERE W.SID = Sp.SID AND Sp.FirstName = \"Siebrand\"";
	} else if (isset($_POST["bas2"])) {
		$sql = "SELECT UC.VIN, COUNT(R.RID) / COUNT(Uc.VIN) as averageRepairs
		FROM Repair AS R, UsedCar AS Uc
		WHERE R.VIN = Uc.VIN";
	} else if (isset($_POST["bas3"])) {
		$sql = "SELECT COUNT(Car.VIN) as CarCount
		FROM Car
		WHERE Sold = 1";
	} else if (isset($_POST["bas4"])) {
		$sql = "SELECT Car.Model, Car.Edition, Car.Year, Car.VIN
		FROM UsedCar, NewCar, Car
		WHERE (((UsedCar.BookPrice <= 8000) AND (Car.VIN = UsedCar.VIN)) OR
				((NewCar.MSRP <= 8000) AND (Car.VIN = NewCar.VIN))) AND
				(Car.Sold = 0)";
	} else if (isset($_POST["bas5"])) {
		$sql = "SELECT C.Firstname, C.Lastname, P.PaidDate, P.Amount
		FROM Payment AS P, Customer AS C
		WHERE P.CID = C.CID AND C.Firstname = \"Tiller\"
		ORDER BY PaidDate DESC";
	} else if (isset($_POST["adv1"])) {
		$sql = "SELECT Sp.SID, Sp.Firstname, Sp.Lastname
		FROM Salesperson AS Sp, Sale, Car, UsedCar, NewCar
		WHERE (Sp.SID = Sale.SID) AND
			(Sale.VIN = Car.VIN) AND
			(((UsedCar.BookPrice >= 10000) AND (UsedCar.VIN = Car.VIN)) OR ((NewCar.MSRP >= 10000) AND (NewCar.VIN = Car.VIN))) AND
			(SaleDate BETWEEN '2019-03-01' AND '2019-03-31')
		GROUP BY Sp.SID
		HAVING COUNT(Sale.VIN) >= 3";
	} else if (isset($_POST["adv2"])) {
		$sql = "SELECT C.Firstname, C.Lastname, Car.Model, Car.Edition
		FROM NewCar AS N, Customer AS C, Sale AS S, Car
		WHERE N.VIN = S.VIN AND C.CID = S.CID AND Car.VIN = N.VIN
		INTERSECT 
		SELECT C.Firstname, C.Lastname, Car.Model, Car.Edition
		FROM UsedCar AS Uc, Customer AS C, Sale AS S, Car
		WHERE Uc.VIN = S.VIN AND C.CID = S.CID AND Car.VIN = Uc.VIN";
	} else if (isset($_POST["adv3"])) {
		$sql = "";
	} else if (isset($_POST["adv4"])) {
		$sql = "SELECT C.Model, C.Edition, C.Year, C.ExteriorColour, C.VIN 
		FROM Car AS C 		
			Where NOT EXISTS (
					SELECT Car.ExteriorColour
					FROM Car
					WHERE Car.ExteriorColour = C.ExteriorColour and Car.VIN NOT IN
					(SELECT ca.VIN
					FROM Car as ca
					WHERE ca.ExteriorColour = \"Grey\")
				)";
	} else if (isset($_POST["adv5"])) {
		$sql = "";
	} 

	$result = ($sql != "") ? $conn->query($sql) : false;
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
	?>
</div>