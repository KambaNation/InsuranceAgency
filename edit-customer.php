<?php

/*
 * To change this license header, choose License Headers in customerect Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//session
session_start();
if(!isset($_SESSION['login_user']))
{
    header("Location: index");
}
$login_session=$_SESSION['login_user'];
$user_id = $_SESSION['id'];

//client ID

$client_id = $_GET['id'];

//db config
require 'includes/config.php';
require 'user_profile.php';


//functions
require 'includes/functions.php';
//page name
$mainpage = 'customers';
$page = 'add-customer';
//clients Table

//brand
$view_result = mysqli_query($connection,"SELECT * FROM sp_customers WHERE id ='$client_id'");

// display records if there are records to display

$view_row=mysqli_fetch_array($view_result);

$client_fname = $view_row['first_name'];
$client_mname = $view_row['middle_name'];
$client_lname = $view_row['last_name'];
$client_fullname = $view_row['full_names'];
$client_commence = $view_row['commencement_date'];
$client_expiry = $view_row['renewal_date'];
$client_policy = $view_row['type_of_policy'];
$client_company = $view_row['company'];
$client_email = $view_row['email_add'];
$client_phone = $view_row['phone_no'];
$client_status = $view_row['status'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    //header
    require 'includes/header.php';
    //css
    require 'includes/css.php';

    ?>
</head>
<body class="sidebar-wide">
<!--navigation-->
<?php
//top navigation
require 'includes/top-menu.php';

?>
<!-- Page container -->
<div class="page-container">
    <!-- side bar-->
    <?php require 'includes/side-menu.php'; ?>
    <!--ennd of side bar-->
    <!-- Page content -->
    <div class="page-content">
        <!-- Page header -->
        <?php require 'includes/breadcrumb.php'; ?>
        <!-- end Page header-->
        <!-- Default panel -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h6 class="panel-title">Add Customer</h6>
            </div>
            <div class="panel-body">
                <!--content here -->
                <?php
                //script to save
                if (isset($_POST['save'])) {
                    // get the form data

                    $customer_title = htmlentities($_POST['customer_name'], ENT_QUOTES);
                    $middle_name = htmlentities($_POST['middle_name'], ENT_QUOTES);
                    $last_name = htmlentities($_POST['last_name'], ENT_QUOTES);
                    $full_names = htmlentities($customer_title." ".$middle_name." ".$last_name, ENT_QUOTES);
                    $customer_number = htmlentities($_POST['phone_number'], ENT_QUOTES);
                    $customer_email = htmlentities($_POST['email_add'], ENT_QUOTES);
                    $customer_commence = htmlentities($_POST['start_date'], ENT_QUOTES);
                    $customer_expiry = htmlentities($_POST['expiry'], ENT_QUOTES);
                    $customer_status = htmlentities($_POST['status'], ENT_QUOTES);
                    $customer_policy = htmlentities($_POST['policy'], ENT_QUOTES);
                    $customer_company = htmlentities($_POST['company'], ENT_QUOTES);
                    $customer_fullnames= htmlentities($_POST['full-names'], ENT_QUOTES);
// use 1 if 2 is empty
                    /*
                    if(empty($customer_title) || empty($middle_name) || empty($last_name) ){
                        echo $customer_fullnames;
                    }else{
                        echo $full_names;
                    }
                    */



                    //posting to DB

                $sql ="UPDATE `sp_customers` SET `first_name`='$customer_title',`middle_name`='$middle_name',`last_name`='$last_name',`commencement_date`='$customer_commence',`renewal_date`='$customer_expiry',`phone_no`='$customer_number',`email_add`='$customer_email',`type_of_policy`='$customer_policy',`company`='$customer_company',`status`='$customer_status',`date_created`=NOW(),`full_names`='$customer_fullnames' WHERE id='$client_id'";


                    if(mysqli_query($connection, $sql) === TRUE) {
                        echo '<div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            Updated successfully
                                        </div>';


                    } else {
                        echo '<div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            Error while Updating
                                        </div>';
                    }
                }

                ?>


                <form role="form" method="post" action="" enctype="multipart/form-data">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Slide-title">Full Name</label>
                            <input type="text" name="full-names" class="form-control" id="exampleInputEmail1" value="<?php echo $client_fullname?>">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Slide-title">First Name</label>
                            <input type="text" name="customer_name" class="form-control" id="exampleInputEmail1" value="<?php echo $client_fname?>">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Slide-title">Middle Name (optional)</label>
                            <input type="text" name="middle_name" class="form-control" id="exampleInputEmail1" value="<?php echo $client_mname?>">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Slide-title">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="exampleInputEmail1" value="<?php echo $client_lname?>">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Slide-title">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" id="exampleInputEmail1" value="<?php echo $client_phone?>">
                        </div>
                    </div>
                    <div class="col-lg-4">

                        <div class="form-group">
                            <label for="Slide-title">Email Address</label>

                            <input class="form-control" type="email" name="email_add" value="<?php echo $client_email?>"/>

                        </div>
                    </div>
                    <div class="col-lg-4">

                        <div class="form-group">
                            <label for="Slide-title">Commencement Date</label>

                            <input class="form-control" type="text" name="start_date" value="<?php echo $client_commence?>"/>

                        </div>
                    </div>
                    <div class="col-lg-4">

                        <div class="form-group">
                            <label for="Slide-title">Expiry Date</label>

                            <input class="form-control" type="text" name="expiry" value="<?php echo $client_expiry?>"/>

                        </div>
                    </div>
                    <div class="col-lg-4">

                        <div class="form-group">
                            <label for="Slide-title">Type of Policy</label>

                            <input class="form-control" type="text" name="policy" value="<?php echo $client_policy?>"/>

                        </div>
                    </div>
                    <div class="col-lg-4">

                        <div class="form-group">
                            <label for="Slide-title">Company</label>

                            <input class="form-control" type="text" name="company" value="<?php echo $client_company?>"/>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="Slide-desc">Status</label>
                            <select name="status" class="form-control">
                                <option selected value="<?php echo $client_status?>">
                                    <?php
                                    if($client_status==1){
                                        echo"Active";

                                    }else{
                                        echo"Inactive";

                                    }
                                    ?>
                                </option>

                                <option value="1">Active</option>
                                <option value="0">Inactive</option>

                            </select>
                        </div>
                    </div>




                    <div class="col-lg-12">
                        <button type="submit" name="save" class="btn btn-primary  btn-square pull-right">Submit</button>
                    </div>
                </form>




            </div>
        </div>
        <!-- /default panel -->

        <!--footer-->
        <?php require 'includes/footer.php'; ?>
    </div>
</div>

<!-- end Page container -->
<!--JS-->
<?php require 'includes/js.php';?>
</body>
</html>

