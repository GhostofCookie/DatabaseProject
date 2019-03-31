<?php
$date           = isset($_POST['date'])             ? "\"".$_POST['date']."\"" : "";
$vin            = isset($_POST['vin'])              ? $_POST['vin'] : "";
$model          = isset($_POST['model'])            ? $_POST['model'] : "";
$edition        = isset($_POST['edition'])          ? $_POST['edition'] : "";
$year           = isset($_POST['year'])             ? $_POST['year'] : "";
$miles          = isset($_POST['miles'])            ? $_POST['miles'] : "";
$sale_price     = isset($_POST['sale-price'])       ? $_POST['sale-price'] : "";
$total_due      = isset($_POST['total-due'])        ? $_POST['total-due'] : "";
$down_pay       = isset($_POST['down-payment'])     ? $_POST['down-payment'] : "";
$finance_amt    = isset($_POST['finance-amt'])      ? $_POST['finance-amt'] : "";
$interest       = isset($_POST['interest'])         ? $_POST['interest'] : "";
$lastname_sp    = isset($_POST['lastname-sp'])      ? $_POST['lastname-sp'] : "";
$firstname_sp   = isset($_POST['firstname-sp'])     ? $_POST['firstname-sp'] : "";
$commission     = isset($_POST['commission'])       ? $_POST['commission'] : "";
$phone_sp       = isset($_POST['phone-sp'])         ? $_POST['phone-sp'] : "";
$phone_cust     = isset($_POST['phone-cust'])       ? $_POST['phone-cust'] : "";
$lastname_cust  = isset($_POST['lastname-cust'])    ? $_POST['lastname-cust'] : "";
$firstname_cust = isset($_POST['firstname-cust'])   ? $_POST['firstname-cust'] : "";
$address_cust   = isset($_POST['address-cust'])     ? $_POST['address-cust'] : "";
$city           = isset($_POST['city'])             ? $_POST['city'] : "";
$province       = isset($_POST['province'])         ? $_POST['province'] : "";
$zip            = isset($_POST['zip'])              ? $_POST['zip'] : "";
$employer       = isset($_POST['employer'])         ? $_POST['employer'] : "";
$title          = isset($_POST['title'])            ? $_POST['title'] : "";
$super          = isset($_POST['super'])            ? $_POST['super'] : "";
$phone_eh       = isset($_POST['phone-eh'])         ? $_POST['phone-eh'] : "";
$address_eh     = isset($_POST['address-eh'])       ? $_POST['address-eh'] : "";
$start          = isset($_POST['start'])            ? "\"".$_POST['start']."\"" : "";
?>
<div class="col-lg-2"></div>
<div class="col-lg-8">
    <div class="panel panel-primary">
        <div class="panel-heading">Car Sale</div>
        <div class="panel-body">
            <form id="<?=$_GET['form']?>" class="form-horizontal" action="?page_id=<?=$_GET['page_id']?>" method="post">
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
                                        <?=Input(5, "number", "interest", "Interest:", "Enter Rate");?>
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
                                        <?=Input(4, "text", "lastname-sp", "Last Name:", "Enter First Name");?>
                                        <?=Input(4, "text", "firstname-sp", "First Name:", "Enter Last Name");?>
                                        <?=Input(4, "number", "phone-sp", "Phone:", "+14031234567");?>
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
                                    <?= Input(3, "number", "vin", "VIN:", "");?>
                                    <?= Input(3, "text", "model", "Model:", "Enter Model");?>
                                    <?= Input(3, "text", "edition", "Edition:", "Enter Edition");?>
                                    <?= Input(3, "number", "year", "Year:", "Enter Year");?>
                                    <?= Input(3, "text", "miles", "Miles:", "Enter Miles");?>
                                    <?= Input(3, "text", "sale-price", "Sale Price:", "Enter Sale Price");?>
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

