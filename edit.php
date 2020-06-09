<?php

require_once 'connection.php';

$bulk = new MongoDB\Driver\BulkWrite;

if(isset($_POST["submit"])){

   $target="";
			if(isset($_FILES['image']))
			{
				$target .="images/".md5(uniqid(time())).basename($_FILES['image']['name']);
				if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
				{
					header('Location:index.php');
				}
				else{
					$msg="Please try again!";
				}
			
			}

$data=[
    'title' => $_POST['title'],
    'content' => $_POST['content'],
    'image' => $target,
];

$id = new \MongoDB\BSON\ObjectId($_POST['id']);
$filter = ['_id'=>$id];

$update=['$set'=>$data];

$bulk->update($filter,$update);
$client -> executeBulkWrite('fotografii.photo',$bulk);

}
    
    $id = new \MongoDB\BSON\ObjectId($_GET['id']);
    $filter = ['_id'=>$id];
    $query = new MongoDB\Driver\Query($filter);
    $article = $client -> executeQuery("fotografii.photo",$query);
    $doc = current($article->toArray());
    

?>

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

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

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
	
            
	<div id="fh5co-header">
		<div class="container">
			<!-- Mobile Toggle Menu Button -->
			<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
			<div id="fh5co-logo">
				<a href="index.html" class="transition">fotografy<span>.</span></a>
			</div>
			<nav id="fh5co-main-nav">
				<ul>
					<li><a href="index.html" class="transition" data-nav-section="home">Home</a></li>
					<li><a href="index.html" class="transition" data-nav-section="portfolio">Portfolio</a></li>
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
							<h1 class="animate-box">Update a new image</h1>
							<div class="fh5co-go animate-box">
								<a href="#" class="js-fh5co-next">
									Update potofoliu
									<span><i class="icon-arrow-down2"></i></span>
								</a>
								
							</div>
						</div>
					</div>
				</div>
			  	<ul class="slides">
			   	<li style="background-image: url(images/slide_2.jpg);" data-stellar-background-ratio="0.5"></li>
			  	</ul>

			</div>
		</div>

		<div id="fh5co-content">
			<div class="container">
			
                            <form method="post" action="edit.php?id=<?php echo $doc->_id;?>" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $doc->_id;?>"
                                <label>Title:</label>
                                <input type="text" name="title" value="<?php echo $doc->title;?>"autofocus >
                                <br><br>
                                <label>Content:</label>    
                                <input type="text" name="content" value="<?php echo $doc->content;?>" autofocus>
                                <br><br>
                                <label>Image:</label>
                                <img src="<?php echo $doc->image;?>"  >
                                <input type="file" name="image" id="image" required>
                                
                                <br><br>
                                <input type="submit" value="Upload" name="submit">
                                
                            </form>
                            
			</div>
                    
                    <br><br>
                    <center>
                        
                        <a href="index.php">BACK</a>
                        
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