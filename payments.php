<div class="col-lg-4"></div>
<div class="col-lg-4">
	<div class="panel panel-primary">
		<div class="panel-heading">Payments</div>
		<div class="panel-body">
			<form id="<?=$_GET['form']?>" class="form-horizontal" action="?page_id=<?=$_GET['page_id']?>" method="post">
				<div id="customer" class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Customer</div>
						<div class="panel-body">
							<?=Input(7, "text", "gender", "Gender:");?>
							<?=Input(7, "date", "dob", "Date of Birth:");?>
							<?=Input(7, "number", "num-late-pay", "Number of Late Payments:");?>
							<?=Input(7, "number", "avg-late-days", "Avergae Number of Days Late:");?>
						</div>
					</div>
				</div>
				<div id="payments" class="col-lg-12">
                    <?=Input(4, "date", "pmt-date", "Payment Date:");?>
                    <?=Input(4, "date", "due", "Due:");?>
                    <?=Input(4, "date", "paid-date", "Paid Date:");?>
                    <?=Input(4, "number", "amount", "Amount:");?>
                    <?=Input(4, "number", "bank-account", "Bank Account:");?>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-lg-3"></div>
