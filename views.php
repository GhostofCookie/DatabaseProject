<?php
	$model = isset($_POST["model"]) ? $_POST["model"] : "test";
	
	if (isset($model))
	{
		$sql = "SELECT * FROM Cars WHERE model=$model";
		$result = $conn->query($sql);
		
		print $sql;
		
		$arr = array();
		if ($result && $result->num_rows > 0)
		{
			
			while ($row = $result->fetch_assoc())
			{
				array_push($arr, $row);
			}
		}
		else {
			// say there are no results.
		}
	}

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
            <p>Inquiries aobut salespersons and their work</p>
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
                    <form id="<?= $_GET['form'] ?>" class="form-horizontal" method="post">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <?= Input(3, "text", "model", "Model:", "Enter Model"); ?>
                                    <?= Input(3, "text", "edition", "Edition:", "Enter Edition"); ?>
                                    <?= Input(3, "number", "year", "Year:", "Enter Year"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <?= Input(4, "text", "exterior-colour", "Exterior Colour:", "Enter Exterior Colour"); ?>
                            <?= Input(4, "text", "interior-colour", "Interior Colour:", "Enter Interior Colour"); ?>
                        </div>
                        <div class="col-lg-12"><button type="submit" class="btn btn-success">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-offset-2 col-lg-8 viewsforms__form" id="salesform">
            <div class="panel panel-primary">
                <div class="panel-heading">Sales View Submission</div>
                <div class="panel-body">
                    <form id="<?= $_GET['form'] ?>" class="form-horizontal" method="post">
                        <div class="col-lg-6">
                            <?= Input(3, "date", "date", "Date:") ?>
                        </div>
                        <div class="col-lg-6">
                            <?= Input(3, "number", "vin", "VIN:") ?>
                        </div>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <?= Input(3, "text", "model", "Model:", "Enter Model"); ?>
                                    <?= Input(3, "text", "edition", "Edition:", "Enter Edition"); ?>
                                    <?= Input(3, "number", "year", "Year:", "Enter Year"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <?= Input(4, "text", "exterior-colour", "Exterior Colour:", "Enter Exterior Colour"); ?>
                            <?= Input(4, "text", "interior-colour", "Interior Colour:", "Enter Interior Colour"); ?>
                        </div>
                        <div class="col-lg-12"><button type="submit" class="btn btn-success">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-offset-2 col-lg-8 viewsforms__form" id="salespersonform">
            <div class="panel panel-primary">
                <div class="panel-heading">Saleperson View Submission</div>
                <div class="panel-body">
                    <form id="<?= $_GET['form'] ?>" class="form-horizontal" method="post">
                        <div class="col-lg-6">
                            <?= Input(3, "date", "date", "Date:") ?>
                        </div>
                        <div class="col-lg-6">
                            <?= Input(3, "number", "vin", "VIN:") ?>
                        </div>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <?= Input(3, "text", "model", "Model:", "Enter Model"); ?>
                                    <?= Input(3, "text", "edition", "Edition:", "Enter Edition"); ?>
                                    <?= Input(3, "number", "year", "Year:", "Enter Year"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <?= Input(4, "text", "exterior-colour", "Exterior Colour:", "Enter Exterior Colour"); ?>
                            <?= Input(4, "text", "interior-colour", "Interior Colour:", "Enter Interior Colour"); ?>
                        </div>
                        <div class="col-lg-12"><button type="submit" class="btn btn-success">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-offset-2 col-lg-8 viewsforms__form" id="warrantiesform">
            <div class="panel panel-primary">
                <div class="panel-heading">Warranties View Submission</div>
                <div class="panel-body">
                    <form id="<?= $_GET['form'] ?>" class="form-horizontal" method="post">
                        <div class="col-lg-6">
                            <?= Input(3, "date", "date", "Date:") ?>
                        </div>
                        <div class="col-lg-6">
                            <?= Input(3, "number", "vin", "VIN:") ?>
                        </div>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <?= Input(3, "text", "model", "Model:", "Enter Model"); ?>
                                    <?= Input(3, "text", "edition", "Edition:", "Enter Edition"); ?>
                                    <?= Input(3, "number", "year", "Year:", "Enter Year"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <?= Input(4, "text", "exterior-colour", "Exterior Colour:", "Enter Exterior Colour"); ?>
                            <?= Input(4, "text", "interior-colour", "Interior Colour:", "Enter Interior Colour"); ?>
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
                    <form id="<?= $_GET['form'] ?>" class="form-horizontal" method="post">
                        <div class="col-lg-6">
                            <?= Input(3, "date", "date", "Date:") ?>
                        </div>
                        <div class="col-lg-6">
                            <?= Input(3, "number", "vin", "VIN:") ?>
                        </div>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <?= Input(3, "text", "model", "Model:", "Enter Model"); ?>
                                    <?= Input(3, "text", "edition", "Edition:", "Enter Edition"); ?>
                                    <?= Input(3, "number", "year", "Year:", "Enter Year"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <?= Input(4, "text", "exterior-colour", "Exterior Colour:", "Enter Exterior Colour"); ?>
                            <?= Input(4, "text", "interior-colour", "Interior Colour:", "Enter Interior Colour"); ?>
                        </div>
                        <div class="col-lg-12"><button type="submit" class="btn btn-success">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="view" id="view">
	<?php print_r($arr); ?>
    </div>

</div> 