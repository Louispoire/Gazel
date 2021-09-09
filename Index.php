<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Welcome - Gazel</title>

<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">

<!-- jQuery -->
<script src="js/jquery-2.0.0.min.js" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>

<!-- Font awesome 5 -->
<link href="fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

<!-- custom style -->
<link href="css/ui.css" rel="stylesheet" type="text/css"/>
<link href="css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />

<!-- custom javascript -->
<script src="js/script.js" type="text/javascript"></script>

<script type="text/javascript">
/// some script

// jquery ready start
$(document).ready(function() {
	// jQuery code

}); 
// jquery end
</script>

</head>
<body>


<!-- ========================= HEADER ========================= -->
<?php
    include ("HTML_assets/header.html");
?>
<!-- ========================= HEADER END ========================= -->


<nav class="navbar navbar-main navbar-expand-lg navbar-light border-bottom">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="main_nav">
      <ul class="navbar-nav">
      	<li class="nav-item dropdown">
          <a class="nav-link pl-0" data-toggle="dropdown" href="#"><strong> <i class="fa fa-bars"></i> &nbsp  Toutes les catégories</strong></a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="store.php?category=4">Matériaux</a>
            <!-- <div class="dropdown-divider"></div>-->
            <a class="dropdown-item" href="store.php?category=1">Lumières</a>
            <a class="dropdown-item" href="store.php?category=3">Plomberie</a>
            <a class="dropdown-item" href="store.php?category=2">Électroménagers</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="store.php?category=4">Matériaux</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="store.php?category=1">Lumières</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="store.php?category=3">Plomberie</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="store.php?category=2">Électroménagers</a>
        </li>
      </ul>
    </div> <!-- collapse .// -->
  </div> <!-- container .// -->
</nav>




<!-- ========================= SECTION INTRO ========================= -->
<section class="section-intro padding-y-sm">
<div class="container">

<div class="intro-banner-wrap">
	<img src="images/banners/1.jpg" class="img-fluid rounded">
</div>

</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->


<!-- ========================= SECTION FEATURE ========================= -->
<section class="section-content padding-y-sm">
<div class="container">
<article class="card card-body">


<div class="row">
	<div class="col-md-4">	
		<figure class="item-feature">
			<span class="text-primary"><img src="Images/MoneyAffordable.png" height="35px" width="35px"></span>
			<figcaption class="pt-3">
				<h5 class="title">Abordable</h5>
				<p>Nos bas prix son imbattable! Plus bas prix guarantit!</p>
			</figcaption>
		</figure> <!-- iconbox // -->
	</div><!-- col // -->
	<div class="col-md-4">
		<figure  class="item-feature">
			<span class="text-primary"><i class="fa fa-2x fa-landmark"></i></span>	
			<figcaption class="pt-3">
				<h5 class="title">Reliable</h5>
				<p>We have use more than 10 000 product in our Real Estate Project. Each of them has been tested thorougly during the process
				 </p>
			</figcaption>
		</figure> <!-- iconbox // -->
	</div><!-- col // -->
    <div class="col-md-4">
		<figure  class="item-feature">
			<span class="text-primary"><i class="fa fa-2x fa-lock"></i></span>
			<figcaption class="pt-3">
				<h5 class="title">High Quality</h5>
				<p>Each of our product are made using high quality material and production method
				 </p>
			</figcaption>
		</figure> <!-- iconbox // -->
	</div> <!-- col // -->
</div>
</article>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION FEATURE END// ========================= -->


<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content">
<div class="container">

<header class="section-heading">
    <a href="store.php?category=all" class="btn btn-outline-primary float-right">See all</a>
    <h3 class="section-title">Some of our products</h3>
</header><!-- sect-heading -->
    

<div class="row">
    
<?php
    
    include "PHP/connectDB.php";
    $count = 0;
    
    
    $sql_getAllItem = "SELECT * FROM items ORDER BY id";
    $sql_getAllItem_res = mysqli_query($conn, $sql_getAllItem);                                                                                                    

    if(mysqli_num_rows($sql_getAllItem_res) < 1) {
       echo "Error";
    }
    else
    {
        while ($item = mysqli_fetch_assoc($sql_getAllItem_res)) 
        {
                if ($count < 4)
                {
                    $item_id = $item["id"];
                    $item_name = $item["item_name"];
                    $item_price = $item["item_price"];
                    $item_image = $item["main_image"];
                    $count++;


                    echo "
                    <div class='col-md-3'>
                      <div href='product-detail.php?itemID=$item_id' class='card card-product-grid'>
                         <a href='product-detail.php?itemID=$item_id' class='img-wrap'><img src='Images/$item_image'></a>
                         <figcaption class='info-wrap'>
                            <a href='product-detail.php?itemID=$item_id' class='title'>$item_name</a>
                            <div class='price mt-1'>$$item_price</div>
                         </figcaption>
                      </div>
                   </div>";
                }
            
            
        }
    }
    
?>
    
    <!--
	<div class="col-md-3">
		<div href="#" class="card card-product-grid">
			<a href="#" class="img-wrap"> <img src="images/items/CeramicTile/Ceramic_2_demo.jpg"> </a>
			<figcaption class="info-wrap">
				<a href="#" class="title">White Ceramic Tile</a>
				<div class="rating-wrap">
					<ul class="rating-stars">
						<li style="width:80%" class="stars-active"> 
							<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
						</li>
						<li>
							<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 
						</li>
					</ul>
					<span class="label-rating text-muted"> 34 reviws</span>
				</div>
            
				<div class="price mt-1">$3.00</div> 
			</figcaption>
		</div>
	</div> -->
    
</div> 

</div> 
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->






<!-- ========================= SECTION  ========================= -->
<section class="section-name padding-y">
<div class="container">

<h3 class="mb-3">Download our app! (Work in Progress)</h3>

<a href="#"><img src="images/misc/appstore.png" height="40"></a>
<a href="#"><img src="images/misc/playmarket.png" height="40"></a>

</div><!-- container // -->
</section>
<!-- ========================= SECTION  END// ======================= -->




<!-- ========================= FOOTER ========================= -->
<?php
    include ("HTML_assets/footer.html");
?>
<!-- ========================= FOOTER END ========================= -->


</body>
</html>