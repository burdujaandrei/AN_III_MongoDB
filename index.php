
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Fotografy &mdash; Free Fully Responsive HTML5 Bootstrap Template by FREEHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  


	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">
	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,300,700' rel='stylesheet' type='text/css'>
	<!-- Animate -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Flexslider -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Icomoon -->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="stylesheet" href="css/style.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	
            <?php
            require_once 'connection.php';
            $query = new MongoDB\Driver\Query([]);
            $rows=$client->executeQuery("fotografii.photo",$query);
            $cookie_name = "user";
            $cookie_value = "Burduja Andrei";
            setcookie($cookie_name, $cookie_value, time() + (60), "/"); // 60 = 60 seconds = 1 minute
            ?>
	<div id="fh5co-header">
		<div class="container">
			<!-- Mobile Toggle Menu Button -->
			<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
			<div id="fh5co-logo">
                            <a href="index.php">fotografy<span>.</span></a>
			</div>
			<nav id="fh5co-main-nav">
				<ul>
					<li><a href="#" data-nav-section="home">Home</a></li>
					<li><a href="#" data-nav-section="portfolio">Portfolio</a></li>
				</ul>
			</nav>
		</div>
	</div>
	<div id="fh5co-main">
		<div class="fh5co-overlay-mobile"></div>
		<div id="fh5co-home" class="js-fullheight" data-section="home">

			<div class="flexslider">
				
				<div class="fh5co-overlay"></div>
				<div class="fh5co-text">
					<div class="container">
						<div class="row text-center">
							<h1 class="animate-box">We love to tell your story</h1>
							<div class="fh5co-go animate-box">
								<a href="#" class="js-fh5co-next">
									See Portfolio
									<span><i class="icon-arrow-down2"></i></span>
								</a>
								
							</div>
						</div>
					</div>
				</div>
			  	<ul class="slides">
			   	<li style="background-image: url(images/slide_2.jpg);" data-stellar-background-ratio="0.5"></li>
			   	<li style="background-image: url(images/slide_1.jpg);" data-stellar-background-ratio="0.5"></li>
			   	<li style="background-image: url(images/slide_3.jpg);" data-stellar-background-ratio="0.5"></li>
			  	</ul>

			</div>
		</div>

		<div id="fh5co-portfolio" data-section="portfolio">
			<div class="container">
				<div class="row r-pb">
					<div class="col-md-8 col-md-offset-2 text-center section-heading">
						<h2 class="fh5co-section-title animate-box">Portfolio</h2>
						<p class="fh5co-lead animate-box">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
					</div>
				</div>
				<div class="row">
                                    <!-- Cookie -->
<br><br>COOKIE<br><br>
<?php
if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
  echo "Cookie '" . $cookie_name . "' is set!<br>";
  echo "Proiect realizat de: " . $_COOKIE[$cookie_name];
}

?>

<p><strong>Note:</strong> You might have to reload the page to see the new value of the cookie.</p>
<!-- Cookie -->

                                    <?php
                                    
                                    foreach($rows as $row)
                                    { ?>
                                    
					<div class="col-md-4 col-sm-4 col-xs-6 col-xxs-12 animate-box">
						<div class="img-grid">
							<img src="<?php echo $row->image;?>" alt="Free HTML5 template by FREEHTML5.co" class="img-responsive">
                                                        <a href="view.php?id=<?php echo $row->_id;?>" class="transition">
								<div>
									<h2 class="fh5co-title"><?php echo $row->title;?></h2>
								</div>
							</a>
						</div>
                                            <?php
                                                echo "<a href=\"delete.php?id=".$row->_id."\" onclick=\"return confirm('Are you sure you want to delete this document?')\";>
                                                       Delete
                                                       </a>";
                                            ?>
					</div>
                        
                                    <?php
                                    }
                                    ?>
                                    
                                    
                                    

				</div>
                            
                            
			</div>
                    
                    <center>
                                    
                        <br><br>
                        <a href="insert.php">Add a new record</a>
                        <br><br>
                                        
                    </center>
                    
		</div>

		



		<div id="fh5co-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 animate-box">
						<div class="fh5co-footer-widget">
							<p>Designed by @Burduja Andrei</p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div> <!-- END fh5co-page -->

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>

	</body>
</html>

