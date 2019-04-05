<?php
$cid        = isset($_POST['cid'])              ? $_POST['cid'] : "";
$gender     = isset($_POST['gender'])           ? "\"".$_POST['gender']."\"" : "";
$dob        = isset($_POST['dob'])              ? "\"".$_POST['dob']."\"" : "";
$num_late   = isset($_POST['num-late-days'])    ? $_POST['num-late-days'] : "";
$avg_late   = isset($_POST['avg-late-days'])    ? $_POST['avg-late-days'] : "";
$pmt_date   = isset($_POST['pmt-date'])         ? "\"".$_POST['pmt-date']."\"" : "";
$due        = isset($_POST['due'])              ? "\"".$_POST['due']."\"" : "";
$paid_date  = isset($_POST['paid-date'])        ? "\"".$_POST['paid-date']."\"" : "";
$amount     = isset($_POST['amount'])           ? $_POST['amount'] : "";
$bank_acc   = isset($_POST['bank-account'])     ? "\"".$_POST['bank-account']."\"" : "";

$pay_no = "";
$sql = "SELECT DISTINCT PaymentNo FROM Payment WHERE PaymentDate=$pmt_date AND Due=$due AND PaidDate=$paid_date";
if($result = $conn->query($sql))
	while($row = $result->fetch_row())
		$pay_no = $row[0];
if($pay_no == "")
{
	$sql = "SELECT MAX(PaymentNo) FROM Payment";

	if ($result = $conn->query($sql))
		while ($row = $result->fetch_row())
			$pay_no = $row[0] + 1 ;

	$SQL = <<<SQL
INSERT INTO Payment VALUES($pay_no, $cid, $bank_acc, $pmt_date, $paid_date, $due, $amount);
SQL;
}

?>
<div class="col-lg-4"></div>
<div class="col-lg-4">
	<div class="panel panel-primary">
		<div class="panel-heading">Payments</div>
		<div class="panel-body">
			<form id="<?=$_GET['form']?>" class="form-horizontal" action="?page_id=<?=$_GET['page_id']?>" method="post">
				<div id="customer" class="col-lg-12">
					<!--div class="panel panel-default">
						<div class="panel-heading">Customer</div>
						<div class="panel-body"-->
							<?php
							$sql = "SELECT CID, Lastname, Firstname FROM Customer";
							$result = $conn->query($sql);
							$arr = array();
							if($result->num_rows > 0)
							{
								while($row = $result->fetch_assoc())
									array_push($arr, $row);
							}

							$w = 12 - 4;
							$return = <<<HTML
                                <div class="form-group">
                                    <label class="control-label col-lg-4" for="customer">Customer:</label>
HTML;

							$return .= "<div class='col-lg-$w'><select id='cid' name='cid' class=\"form-control\"><option selected>- Select Customer -</option>";
							foreach ($arr as $key => $val)
								$return .= "<option value=\"".$val['CID']."\">". $val['Lastname'] . ", " . $val['Firstname'] . "</option>";
							$return .= "</select></div>";
							$return .= <<<HTML
                                </div>
HTML;
							echo $return;
							?>
							<!--<?=Input(7, "text", "gender", "Gender:");?>
							<?=Input(7, "date", "dob", "Date of Birth:");?>
							<?=Input(7, "number", "num-late-pay", "Number of Late Payments:");?>
							<?=Input(7, "number", "avg-late-days", "Avergae Number of Days Late:");?>-->
						<!--/div>
					</div-->
				</div>
				<div id="payments" class="col-lg-12">
                    <?=Input(4, "date", "pmt-date", "Payment Date:");?>
                    <?=Input(4, "date", "due", "Due:");?>
                    <?=Input(4, "date", "paid-date", "Paid Date:");?>
                    <?=Input(4, "number", "amount", "Amount:");?>
                    <?=Input(4, "text", "bank-account", "Bank Account:");?>
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
