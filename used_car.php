<?php
$date = isset($_POST['date']) ? $_POST['date'] : "";
$vin = isset($_POST['vin']) ? $_POST['vin'] : "";
$model = isset($_POST['model']) ? $_POST['model'] : "";
$edition = isset($_POST['edition']) ? $_POST['edition'] : "";
$year = isset($_POST['year']) ? $_POST['year'] : "";
$rid = isset($_POST['rid']) ? $_POST['rid'] : "";
$repair_cost = isset($_POST['cost-repair']) ? $_POST['cost-repair'] : "";
$actual_cost = isset($_POST['cost-actual']) ? $_POST['cost-actual'] : "";
$problem = isset($_POST['problem']) ? $_POST['problem'] : "";
$colour = isset($_POST['colour']) ? $_POST['colour'] : "";
$miles = isset($_POST['miles']) ? $_POST['miles'] : "";
$book_price = isset($_POST['book-price']) ? $_POST['book-price'] : "";
$paid_price = isset($_POST['paid-price']) ? $_POST['paid-price'] : "";
?>
<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">Used Car Purchase</div>
        <div class="panel-body">
            <form class="form-horizontal" action="?page_id=<?=$_GET['page_id']?>" method="post">
                <div class="row">
                    <div class="col-lg-3 form-group">
                        <label class="control-label col-lg-3" for="date">Date:</label>
                        <div class="col-lg-8">
                            <input type="date" class="form-control" id="date"  name="date">
                        </div>
                    </div>
                    <div class="col-lg-3 form-group">
                        <label class="control-label col-lg-4" for="vin">VIN:</label>
                        <div class="col-lg-8"><input type="number" class="form-control" id="vin" placeholder="Enter VIN" name="vin"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 form-group">
                        <label class="control-label col-lg-3" for="location">Location:</label>
                        <div class="col-lg-8"><input type="text" class="form-control" id="location" placeholder="Enter Location" name="location"></div>
                    </div>
                    <div class="col-lg-3 form-group">
                        <label class="control-label col-lg-4" for="location">Seller/Dealer:</label>
                        <div class="col-lg-8"><input type="text" class="form-control" id="location" placeholder="Enter Seller/Dealer" name="location"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="model">Model:</label>
                                    <div class="col-lg-8"><input type="text" class="form-control" id="model" placeholder="Enter Model" name="model"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="model">Edition:</label>
                                    <div class="col-lg-8"><input type="text" class="form-control" id="model" placeholder="Enter Edition" name="model"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="model">Year:</label>
                                    <div class="col-lg-8"><input type="number" class="form-control" id="model" placeholder="Enter Year" name="model"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-lg-6">
                                    <!-- THIS SHOULD BE HANDLED IN THE SQL (type = SERIAL)
                                    <div class="form-group">
                                        <label class="control-label col-lg-4" for="rid"># :</label>
                                        <div class="col-lg-8"><input type="text" class="form-control" id="rid" placeholder="Enter Repair ID" name="rid"></div>
                                    </div>
                                    -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-4" for="cost-repair">Est. Repair Cost:</label>
                                        <div class="col-lg-8"><input type="text" class="form-control" id="cost-repair" placeholder="Enter Est. Repair Cost" name="cost-repair"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-4" for="cost-actual">Actual Cost:</label>
                                        <div class="col-lg-8"><input type="text" class="form-control" id="cost-actual" placeholder="Enter Actual Cost" name="cost-actual"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <!--label class="control-label" for="problem">Problem:</label-->
                                        <textarea class="form-control" id="problem" placeholder="Problem..." name="problem"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="control-label col-lg-1" for="colour">Colour:</label>
                            <div class="col-lg-2"><input type="number" class="form-control" id="colour" placeholder="Enter Colour" name="colour"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-1" for="miles">Miles:</label>
                            <div class="col-lg-2"><input type="number" class="form-control" id="miles" placeholder="Enter Miles" name="miles"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-1" for="book-price">Book Price:</label>
                            <div class="col-lg-2"><input type="number" class="form-control" id="book-price" placeholder="Enter Book Price" name="book-price"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-1" for="paid-price">Paid Price:</label>
                            <div class="col-lg-2"><input type="number" class="form-control" id="paid-price" placeholder="Enter Paid Price" name="paid-price"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
