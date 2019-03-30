<?php
function Input($width=4, $type, $id, $label, $placeholder="")
{
    $w = 12 - $width;
    return  <<<HTML
<div class="form-group">
    <label class="control-label col-lg-$width" for="$id">$label</label>
    <div class="col-lg-$w"><input type="$type" class="form-control" id="$id" placeholder="$placeholder" name="$id"></div>
</div>
HTML;

}
?>
<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">Car Sale</div>
        <div class="panel-body">
            <form class="form-horizontal" action="?page_id=<?=$_GET['page_id']?>" method="post">

                <div class="row">
                <div id="sale">
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-lg-12">
                                    <?=Input(5, "date", "date", "Date:");?>
                                    <?=Input(5, "text", "total-due", "Total Due:");?>
                                    <?=Input(5, "text", "down-payment", "Down Payment:");?>
                                    <?=Input(5, "text", "finance-amt", "Financed Amount:");?>
                                    <?=Input(5, "number", "interest-rate", "Interest:");?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="salesperson">
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-lg-12">
                                    <?=Input(5, "text", "lastname", "Last Name:");?>
                                    <?=Input(5, "text", "firstname", "First Name:");?>
                                    <?=Input(5, "number", "phone", "Phone:");?>
                                    <?=Input(5, "number", "commission", "Commission:");?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div id="customer">
                    <div class="row" >
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label col-lg-1" for="phone">Phone:</label>
                                <div class="col-lg-2"><input type="number" class="form-control" id="phone" placeholder="Enter Phone" name="phone"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-1" for="lastname">Last Name:</label>
                                <div class="col-lg-2"><input type="text" class="form-control" id="lastname" placeholder="Enter Last Name" name="lastname"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-1" for="firstname">First Name</label>
                                <div class="col-lg-2"><input type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="firstname"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-1" for="address">Address:</label>
                                <div class="col-lg-2"><input type="text" class="form-control" id="address" placeholder="Enter Address" name="address"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-1" for="city">City:</label>
                                <div class="col-lg-2"><input type="text" class="form-control" id="city" placeholder="Enter City" name="city"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-1" for="province">Province:</label>
                                <div class="col-lg-2"><input type="text" class="form-control" id="province" placeholder="Enter Province" name="province"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-1" for="zip">ZIP:</label>
                                <div class="col-lg-2"><input type="text" class="form-control" id="zip" placeholder="Enter ZIP" name="zip"></div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div id="vehicle_info">
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
