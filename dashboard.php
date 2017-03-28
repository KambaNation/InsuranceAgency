<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
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
$mainpage ='';
   $page = 'dashboard';


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
   
      <ul class="info-blocks">
				<li class="bg-primary">
					<div class="top-info">
						<a href="#">Add new post</a>
						<small>post management</small>
					</div>
					<a href="#"><i class="icon-pencil"></i></a>
					<span class="bottom-info bg-danger">12 drafts in progress</span>
				</li>
				<li class="bg-success">
					<div class="top-info">
						<a href="#">Site parameters</a>
						<small>layout settings</small>
					</div>
					<a href="#"><i class="icon-cogs"></i></a>
					<span class="bottom-info bg-primary">No updates</span>
				</li>
				<li class="bg-danger">
					<div class="top-info">
						<a href="#">Site statistics</a>
						<small>visits, users, orders stats</small>
					</div>
					<a href="#"><i class="icon-stats2"></i></a>
					<span class="bottom-info bg-primary">3 new updates</span>
				</li>
				<li class="bg-info">
					<div class="top-info">
						<a href="#">My messages</a>
						<small>messages history</small>
					</div>
					<a href="#"><i class="icon-bubbles3"></i></a>
					<span class="bottom-info bg-primary">24 new messages</span>
				</li>
				<li class="bg-warning">
					<div class="top-info">
						<a href="#">Orders history</a>
						<small>purchases statistics</small>
					</div>
					<a href="#"><i class="icon-cart2"></i></a>
					<span class="bottom-info bg-primary">17 new orders</span>
				</li>
				<li class="bg-primary">
					<div class="top-info">
						<a href="#">Invoices stats</a>
						<small>invoices archive</small>
					</div>
					<a href="#"><i class="icon-coin"></i></a>
					<span class="bottom-info bg-danger">9 new invoices</span>
				</li>
			</ul>
      
      
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

