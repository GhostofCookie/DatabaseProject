<div class="col-lg-3"></div>
<div class="col-lg-6">
	<div class="panel panel-primary">
		<div class="panel-heading">Warranties</div>
		<div class="panel-body">
			<form id="<?=$_GET['form']?>" class="form-horizontal" action="?page_id=<?=$_GET['page_id']?>" method="post">
				<div id="vehicle_info" class="col-lg-6">
					<div class="panel panel-default">
						<div class="panel-heading">Vehicle Info</div>
						<div class="panel-body">
							<?= Input(3, "number", "vin", "VIN:", "");?>
							<?= Input(3, "text", "model", "Model:", "Enter Model");?>
							<?= Input(3, "text", "edition", "Edition:", "Enter Edition");?>
							<?= Input(3, "number", "year", "Year:", "Enter Year");?>
							<?= Input(3, "text", "miles", "Miles:", "Enter Miles");?>
							<?= Input(3, "text", "sale-price", "Sale Price:", "Enter Sale Price");?>
						</div>
					</div>
				</div>
				<div id="salesperson" class="col-lg-6">
					<div class="panel panel-default">
						<div class="panel-heading">Salesperson</div>
						<div class="panel-body">
							<div class="col-lg-12">
								<?=Input(4, "text", "lastname-sp", "Last Name:", "Enter First Name");?>
								<?=Input(4, "text", "firstname-sp", "First Name:", "Enter Last Name");?>
								<?=Input(4, "number", "phone-sp", "Phone:", "+14031234567");?>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-12"><button type="submit" class="btn btn-success">Submit</button></div>
			</form>
		</div>
	</div>
</div>
<div class="col-lg-3"></div>