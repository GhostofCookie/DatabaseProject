<div class="col-lg-3"></div>
<div class="col-lg-6">
	<div class="panel panel-primary">
		<div class="panel-heading">New Car Purchase</div>
		<div class="panel-body">
			<form id="<?=$_GET['form']?>" class="form-horizontal" action="?page_id=<?=$_GET['page_id']?>" method="post">
				<div id="customer" class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Customer</div>
						<div class="panel-body">
							<?=Input(4, "text", "gender", "Gender:");?>
							<?=Input(4, "date", "dob", "Date of Birth:");?>
							<?=Input(4, "number", "num-late-pay", "Number of Late Payments:");?>
							<?=Input(4, "number", "avg-late-days", "Avergae Number of Days Late:");?>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-lg-3"></div>
