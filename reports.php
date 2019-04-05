<div class="col-lg-offset-1 col-lg-10">
	<div class="content">

		<h1>Basic Queries</h1>
		<form id="bas1" method="post" class="reportbox">
			<input type="hidden" name="bas1" />
			<h3>Warranties Sold by a salesperson</h3>
			<p>Report the number of warranties sold by a particular salesperson.</p>
			<?php
			$sql = "SELECT distinct SID, Lastname, Firstname FROM salesperson NATURAL JOIN warranty";
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

			<button type="submit">Submit</button>
		</form>
		<form id="bas2" method="post" class="reportbox">
			<input type="hidden" name="bas2" />
			<h3>Average number of repairs</h3>
			<p>Report the average number of repairs on all Used Cars.</p>
			<button type="submit">Submit</button>
		</form>
		<form id="bas3" method="post" class="reportbox">
			<input type="hidden" name="bas3" />
			<h3>Car count</h3>
			<p>Number of used cars and new cars currently at the dealership.</p>
			<button type="submit">Submit</button>
		</form>
		<form id="bas4" method="post" class="reportbox">
			<input type="hidden" name="bas4" />
			<h3>MSRP or Book Value less than some value</h3>
			<p>List of all cars with MSRP or Book Value less than $xxxx.</p>
			<div class="col-lg-12">
				<?= Input(2, "number", "amount", "Amount:", "5000") ?>
			</div>
			<button type="submit">Submit</button>
		</form>
		<form id="bas5" method="post" class="reportbox">
			<input type="hidden" name="bas5" />
			<h3>Report payment history of a customer</h3>
			<p>Find and report the payment history from a specific customer.</p>
			<?php
			$sql = "SELECT CID, Lastname, Firstname FROM customer NATURAL JOIN payment";
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
			<button type="submit">Submit</button>
		</form>

		<h1 style="margin-top: 45px;">Advanced Queries</h1>
		<form id="adv1" method="post" class="reportbox">
			<input type="hidden" name="adv1" />
			<h3>Salespersons who sold 3 cars with value greater than 10k</h3>
			<p>List all of the Salesperson(s) who have sold 3 cars with a MSRP/Book Value greater than $10,000 within a given month (March).</p>
			<?= Input(3, "date", "date", "Date:", "") ?>
			<button type="submit">Submit</button>
		</form>
		<form id="adv2" method="post" class="reportbox">
			<input type="hidden" name="adv2" />
			<h3>Customers who have both used and new cars</h3>
			<p>Report the names of customers that have both a used car and a new car.</p>
			<button type="submit">Submit</button>
		</form>
		<form id="adv3" method="post" class="reportbox">
			<input type="hidden" name="adv3" />
			<h3>List of customers who own at least 2 warranties for any car.</h3>
			<button type="submit">Submit</button>
		</form>
		<form id="adv4" method="post" class="reportbox">
			<input type="hidden" name="adv4" />
			<h3>Find unsold cars of certain colour</h3>
			<p>Find all grey cars at the dealership that have not been marked sold.</p>
			<?= Input(3, "text", "colour", "Colour", "") ?>
			<button type="submit">Submit</button>
		</form>
		<form id="adv5" method="post" class="reportbox">
			<input type="hidden" name="adv5" />
			<h3>All customers who purchased a car >5 years ago</h3>
			<p>Find all customers who have purchased a used car more than five years ago and only owns one car from the dealership.</p>
			<button type="submit">Submit</button>
		</form>
	</div>
</div>

<div id="view" class="col-lg-offset-2 col-lg-8">

	<?php

			$sql = "";
			if (isset($_POST["bas1"])) {
				if (isset($_POST["salesperson"]) && $_POST["salesperson"] != "- Select Salesperson -")
					$sql = "SELECT COUNT(W.WID) as WarrantyCount
FROM Warranty AS W, Salesperson AS Sp
WHERE W.SID = Sp.SID AND Sp.SID=" . $_POST["salesperson"] . "
GROUP BY Sp.SID";
			} else if (isset($_POST["bas2"])) {
				$sql = "SELECT Uc.VIN, COUNT(R.RID) / COUNT(Uc.VIN) AS AvgRepair
FROM Repair AS R, UsedCar AS Uc
WHERE R.VIN = Uc.VIN
GROUP BY R.VIN";
			} else if (isset($_POST["bas3"])) {
				$sql = "SELECT COUNT(Car.VIN) as CarCount
FROM Car
WHERE Sold = 0";
			} else if (isset($_POST["bas4"])) {
				if (isset($_POST["amount"]) && is_numeric($_POST["amount"]))		
					$sql = "SELECT Car.Model, Car.Edition, Car.Year, Car.VIN, NewCar.MSRP
FROM NewCar, Car
WHERE Sold = 0 AND Car.VIN = NewCar.VIN AND MSRP <= " . $_POST['amount'] . "
UNION
SELECT Car.Model, Car.Edition, Car.Year, Car.VIN, UsedCar.BookPrice
FROM UsedCar, Car
WHERE Sold = 0 AND Car.VIN = UsedCar.VIN AND BookPrice <= " . $_POST['amount'];
			} else if (isset($_POST["bas5"])) {
				if (isset($_POST["customer"]) && $_POST["customer"] != "- Select Customer -")
					$sql = "SELECT C.Firstname, C.Lastname, P.PaidDate, P.Amount
FROM Payment AS P, Customer AS C
WHERE P.CID = C.CID AND C.CID =" . $_POST["customer"] . "
ORDER BY PaidDate DESC";
			} else if (isset($_POST["adv1"])) {
				if (isset($_POST["date"]) && $_POST["date"] != "") {	
					$month = date_format(date_create($_POST["date"]), "Y-m");							
					$sql = "SELECT Sp.SID, Sp.Firstname, Sp.Lastname
FROM Salesperson AS Sp, Sale, Car
WHERE (Sp.SID = Sale.SID) AND
	(Sale.VIN = Car.VIN) AND
	(Car.VIN IN (SELECT UsedCar.VIN
		FROM UsedCar, Sale
		WHERE UsedCar.BookPrice >= 10000 AND UsedCar.VIN = Sale.VIN) 
	OR
	(Car.VIN IN (SELECT NewCar.VIN
		FROM NewCar, Sale
		WHERE NewCar.MSRP >= 10000 AND NewCar.VIN = Sale.VIN))) AND
	(SaleDate BETWEEN '$month-01' AND '$month-03-31')
GROUP BY Sp.SID
HAVING COUNT(Sale.SaleNo) >= 3";
				}
			} else if (isset($_POST["adv2"])) {
				$sql = "SELECT C.Firstname, C.Lastname
FROM NewCar AS N, Customer AS C, Sale AS S, Car
WHERE N.VIN = S.VIN AND C.CID = S.CID AND Car.VIN = N.VIN
AND C.CID IN (
SELECT C.CID
FROM UsedCar AS Uc, Customer AS C, Sale AS S, Car
WHERE Uc.VIN = S.VIN AND C.CID = S.CID AND Car.VIN = Uc.VIN)";
			} else if (isset($_POST["adv3"])) {
				$sql = "SELECT C.Firstname, C.Lastname
FROM Customer AS C
WHERE EXISTS (SELECT VIN
	FROM Warranty AS W
	WHERE C.CID = W.CID
	GROUP BY VIN
	HAVING COUNT(WID) >= 2)";
			} else if (isset($_POST["adv4"])) {
				if (isset($_POST["colour"]) && $_POST["colour"] != "")
					$sql = "SELECT C.Model, C.Edition, C.Year, C.ExteriorColour, C.VIN 
FROM Car AS C
WHERE Sold = 0 AND NOT EXISTS (
	SELECT Car.ExteriorColour
	FROM Car
	WHERE Car.ExteriorColour = C.ExteriorColour AND Car.VIN 
	NOT IN(SELECT Car.VIN
			FROM Car
			WHERE Car.ExteriorColour = \"" . $_POST["colour"] . "\"))";
			} else if (isset($_POST["adv5"])) {
				$sql = "SELECT C.Firstname, C.Lastname, C.CID
FROM Customer AS C, UsedCar, Sale
WHERE Sale.VIN = UsedCar.VIN AND C.CID = Sale.CID AND Sale.SaleDate <= '2014-04-04' AND
	C.CID NOT IN (SELECT Sale.CID
	FROM Customer, Sale, NewCar
	WHERE Sale.CID = Customer.CID AND NewCar.VIN = Sale.VIN)
GROUP BY C.CID
HAVING COUNT(C.CID) = 1";
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
				echo "<table  class='table-bordered table-striped col-lg-12'>";
				echo $head;
				echo $tuples;
				echo "</table>";
				
			} 
			?>
</div>