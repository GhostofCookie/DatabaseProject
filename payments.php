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
							<?=Input(3, "number", "phone-cust", "Phone:");?>
							<?=Input(3, "text", "lastname-cust", "Last Name:");?>
							<?=Input(3, "text", "firstname-cust", "First Name:");?>
							<?=Input(3, "text", "address-cust", "Address:");?>
							<?=Input(3, "text", "city", "City:");?>
							<?=Input(3, "text", "province", "Province:");?>
							<?=Input(3, "text", "zip", "ZIP:");?>
							</div>
						</div>
					</div>
			</form>
		</div>
	</div>
</div>
<div class="col-lg-3"></div>
