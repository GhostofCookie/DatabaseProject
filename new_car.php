<?php
$date = isset($_POST['date']) ? $_POST['date'] : "";
$vin = isset($_POST['vin']) ? $_POST['vin'] : "";
$model = isset($_POST['model']) ? $_POST['model'] : "";
$edition = isset($_POST['edition']) ? $_POST['edition'] : "";
$year = isset($_POST['year']) ? $_POST['year'] : "";
$exterior_colour = isset($_POST['exterior-colour']) ? $_POST['exterior-colour'] : "";
$interior_colour = isset($_POST['interior-colour']) ? $_POST['interior-colour'] : "";
?>

<div class="col-lg-4"></div>
<div class="col-lg-4">
    <div class="panel panel-primary">
        <div class="panel-heading">New Car Purchase</div>
        <div class="panel-body">
            <form class="form-horizontal" action="?page_id=<?=$_GET['page_id']?>" method="post">
                <div class="row">
                    <div class="col-lg-7 form-group">
                        <label class="control-label col-lg-3" for="date">Date:</label>
                        <div class="col-lg-9">
                            <input type="date" class="form-control" id="date"  name="date">
                        </div>
                    </div>
                    <div class="col-lg-6 form-group">
                        <label class="control-label col-lg-2" for="vin">VIN:</label>
                        <div class="col-lg-10"><input type="number" class="form-control" id="vin" placeholder="Enter VIN" name="vin"></div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label col-lg-2" for="model">Model:</label>
                                <div class="col-lg-8"><input type="text" class="form-control" id="model" placeholder="Enter Model" name="model"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2" for="edition">Edition:</label>
                                <div class="col-lg-8"><input type="text" class="form-control" id="edition" placeholder="Enter Edition" name="edition"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2" for="year">Year:</label>
                                <div class="col-lg-8"><input type="number" class="form-control" id="year" placeholder="Enter Year" name="year"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="control-label col-lg-3" for="exterior-colour">Exterior Colour:</label>
                        <div class="col-lg-9"><input type="text" class="form-control" id="exterior-colour" placeholder="Enter Exterior Colour" name="exterior-colour"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3" for="interior-colour">Interior Colour:</label>
                        <div class="col-lg-9"><input type="text" class="form-control" id="interior-colour" placeholder="Enter Interior Colour" name="interior-colour"></div>
                    </div>
                </div>
                <div class="col-lg-12"><button type="submit" class="btn btn-success">Submit</button></div>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <?="Date:".$date."<br>"?>
    <?="VIN:".$vin."<br>"?>
    <?="Model:".$model."<br>"?>
    <?="Edition:".$edition."<br>"?>
    <?="Year:".$year."<br>"?>
    <?="Ext. Colour:".$exterior_colour."<br>"?>
    <?="Int. Colour:".$interior_colour."<br>"?>
</div>