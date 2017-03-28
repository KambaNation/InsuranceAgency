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

//db config
require 'includes/config.php';
require 'user_profile.php';


//functions
   require 'includes/functions.php';
//page name
$mainpage = 'customers';
   $page = 'add-customer';


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



              //posting to DB
              $sql ="INSERT INTO `sp_customers`(`id`, `first_name`,`middle_name`, `last_name`, `commencement_date`, `renewal_date`, `phone_no`, `email_add`, `type_of_policy`, `company`, `status`, `date_created`, `full_names`) VALUES (NULL,'$customer_title','$middle_name','$last_name','$customer_commence','$customer_expiry','$customer_number','$customer_email','$customer_policy','$customer_company','$customer_status',NOW(),'$full_names')";




              if(mysqli_query($connection, $sql) === TRUE) {
                  echo '<div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            New customer created successfully
                                        </div>';


              } else {
                  echo '<div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            Error while Adding New customer
                                        </div>';
              }
          }

          ?>


          <form role="form" method="post" action="" enctype="multipart/form-data">

              <div class="col-lg-4">
                  <div class="form-group">
                      <label for="Slide-title">First Name</label>
                      <input type="text" name="customer_name" class="form-control" id="exampleInputEmail1" placeholder="First Name">
                  </div>
              </div>
              <div class="col-lg-4">
                  <div class="form-group">
                      <label for="Slide-title">Middle Name (optional)</label>
                      <input type="text" name="middle_name" class="form-control" id="exampleInputEmail1" placeholder="Middle Name">
                  </div>
              </div>
              <div class="col-lg-4">
                  <div class="form-group">
                      <label for="Slide-title">Last Name</label>
                      <input type="text" name="last_name" class="form-control" id="exampleInputEmail1" placeholder="Last Name">
                  </div>
              </div>
              <div class="col-lg-4">
                  <div class="form-group">
                      <label for="Slide-title">Phone Number</label>
                      <input type="text" name="phone_number" class="form-control" id="exampleInputEmail1" placeholder="+254700000000">
                  </div>
              </div>
              <div class="col-lg-4">

                  <div class="form-group">
                      <label for="Slide-title">Email Address</label>

                          <input class="form-control" type="email" name="email_add" placeholder="email@domain.com"/>

                  </div>
              </div>
              <div class="col-lg-4">

                  <div class="form-group">
                      <label for="Slide-title">Commencement Date</label>

                      <input class="form-control" type="text" name="start_date" placeholder="date"/>

                  </div>
              </div>
              <div class="col-lg-4">

                  <div class="form-group">
                      <label for="Slide-title">Expiry Date</label>

                      <input class="form-control" type="text" name="expiry" placeholder="date"/>

                  </div>
              </div>
              <div class="col-lg-4">

                  <div class="form-group">
                      <label for="Slide-title">Type of Policy</label>

                      <input class="form-control" type="text" name="policy" placeholder="KCB 200E & KCH 800 D"/>

                  </div>
              </div>
              <div class="col-lg-4">

                  <div class="form-group">
                      <label for="Slide-title">Company</label>

                      <input class="form-control" type="text" name="company" placeholder="CIC"/>

                  </div>
              </div>
                 <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                      <label for="Slide-desc">Status</label>
                      <select name="status" class="form-control">

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

