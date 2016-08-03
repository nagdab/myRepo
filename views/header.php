<!DOCTYPE html>

<html>

    <head>
        <?php if (isset($title)): ?>
            <title>Foodport: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Foodport</title>
        <?php endif ?>

        <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    	<!-- Load css styles -->
    	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    	<link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
    	<link rel="stylesheet" type="text/css" href="css/style.css" />

    </head>

    <body>
        <div class="container">
                <div id="top">
                    
                    <!-- welcome user with personal message -->
                    <?php if (!empty($_SESSION["id"])): ?>
                    <p align = "right">
                        <?php 
                            print("Welcome, " . $_SESSION["username"] . ".");
                        ?>
                    </p>
                    <?php endif ?>
                    
                    <div class="jumbotron" id="header">
                		<div class="mask"></div>
                		<a href="order.php" class="logo">
                			<img src="img/goodlogo.png" alt="Foodport Logo">
                		</a>
                		
                        <?php if (!empty($_SESSION["id"])): ?>
                            <a href="" class="menu-toggle" id="nav-expander"><i class="fa fa-bars"></i></a>
                        		<!-- Offsite navigation -->
                            		<nav class="menu">
                            			<a href="#" class="close"><i class="fa fa-close"></i></a>
                            			<h3>Menu</h3>
                            			<ul class="nav">
                            				<li><a href="index.php">Home</a></li>
                            				<li><a href="order.php">Order Groceries</a></li>
                            				<li><a href="port.php">Deliver Groceries</a></li>
                            				<li><a href="history.php">History</a></li>
                            				<li><a href="logout.php">Log Out</a></li>
                            			</ul>
                            			<ul class="social-icons">
                            				<li><a href=""><i class="fa fa-facebook"></i></a></li>
                            				<li><a href=""><i class="fa fa-twitter"></i></a></li>
                            				<li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            				<li><a href=""><i class="fa fa-behance"></i></a></li>
                            				<li><a href=""><i class="fa fa-pinterest"></i></a></li>
                            			</ul>
                            		</nav>
                        <?php endif ?>
                    </div>
                </div>
            
            <!-- Load jQuery -->
        	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
        
        	<!-- Load Booststrap -->
        	<script type="text/javascript" src="js/bootstrap.js"></script>

        	<script type="text/javascript" src="js/smooth-scroll.js"></script>
        
        	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        
        	<!-- Load custom js for theme -->
        	<script type="text/javascript" src="js/app.js"></script>

            <div id="middle">
                
                
                
                

