<div class="col-lg-2"></div>
<div class="col-lg-8">
    <div class="panel panel-primary">
        <div class="panel-heading">Car Sale</div>
        <div class="panel-body">
            <form class="form-horizontal" action="?page_id=<?=$_GET['page_id']?>" method="post">
                <div class="row">
                    <div id="sale">
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Sale</div>
                                <div class="panel-body">
                                    <div class="col-lg-12">
                                        <?=Input(5, "date", "date", "Date:");?>
                                        <?=Input(5, "text", "total-due", "Total Due:", "Enter Total");?>
                                        <?=Input(5, "text", "down-payment", "Down Payment:", "Enter Payment");?>
                                        <?=Input(5, "text", "finance-amt", "Financed Amount:", "Enter Amount");?>
                                        <?=Input(5, "number", "interest-rate", "Interest:", "Enter Rate");?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="salesperson">
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Salesperson</div>
                                <div class="panel-body">
                                    <div class="col-lg-12">
                                        <?=Input(4, "text", "lastname-sp", "Last Name:");?>
                                        <?=Input(4, "text", "firstname-sp", "First Name:");?>
                                        <?=Input(4, "number", "phone-sp", "Phone:");?>
                                        <?=Input(4, "number", "commission", "Commission:");?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="customer">
                        <div class="col-lg-6">
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
                    </div>
                    <div id="employment">
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Employment History</div>
                                <div class="panel-body">
                                    <?=Input(3, "text", "employer", "Employer:");?>
                                    <?=Input(3, "text", "title", "Title:");?>
                                    <?=Input(3, "text", "super", "Super.:");?>
                                    <?=Input(3, "number", "phone-eh", "Phone:");?>
                                    <?=Input(3, "text", "address-eh", "Address:");?>
                                    <?=Input(3, "date", "start", "Start:");?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="vehicle_info">
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">Vehicle Info</div>
                                <div class="panel-body">
                                    <?= Input("3", "number", "vin", "VIN:", "");?>
                                    <?= Input("3", "text", "model", "Model:", "Enter Model");?>
                                    <?= Input("3", "text", "edition", "Edition:", "Enter Edition");?>
                                    <?= Input("3", "text", "year", "Year:", "Enter Year");?>
                                    <?= Input("3", "text", "miles", "Miles:", "Enter Miles");?>
                                    <?= Input("3", "text", "sale-price", "Sale Price:", "Enter Sale Price");?>
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
<div class="col-lg-2"></div>

