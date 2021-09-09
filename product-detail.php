<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Bootstrap-ecommerce by Vosidiy M.">

<title>Product Detail | Gazel</title>

<!-- jQuery -->
<script src="js/jquery-2.0.0.min.js" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>

<!-- Fonticons -->
<link href="fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">
<link href="fonts/feathericons/css/iconfont.css" rel="stylesheet" type="text/css" />
<link href="fonts/material-icons/css/materialdesignicons.css" rel="stylesheet" type="text/css" />

<!-- custom style -->
<link href="css/ui.css" rel="stylesheet" type="text/css"/>
<link href="css/responsive.css" rel="stylesheet" />


<link href="plugins/slickslider/slick.css" rel="stylesheet" type="text/css" />
<link href="plugins/slickslider/slick-theme.css" rel="stylesheet" type="text/css" />
<script src="plugins/slickslider/slick.min.js"></script>

<!-- plugin: owl carousel  -->
<link href="plugins/owlcarousel/assets/owl.carousel.css" rel="stylesheet">
<link href="plugins/owlcarousel/assets/owl.theme.default.css" rel="stylesheet">
<script src="plugins/owlcarousel/owl.carousel.min.js"></script>


<!-- ui javascript -->
<script src="js/script.js" type="text/javascript"></script>

<script type="text/javascript">
/// some script

// jquery ready start
$(document).ready(function() {
	// jQuery code

    /////////////////  items slider. /plugins/slickslider/
    if ($('.slider-banner-slick').length > 0) { // check if element exists
        $('.slider-banner-slick').slick({
              infinite: true,
              autoplay: true,
              slidesToShow: 1,
              dots: false,
              prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
           	  nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
        });
    } // end if

     /////////////////  items slider. /plugins/slickslider/
    if ($('.slider-custom-slick').length > 0) { // check if element exists
        $('.slider-custom-slick').slick({
              infinite: true,
              slidesToShow: 2,
              dots: true,
              prevArrow: $('.slick-prev-custom'),
              nextArrow: $('.slick-next-custom')
        });
    } // end if

  

    /////////////////  items slider. /plugins/slickslider/
    if ($('.slider-items-slick').length > 0) { // check if element exists
        $('.slider-items-slick').slick({
            infinite: true,
            swipeToSlide: true,
            slidesToShow: 4,
            dots: true,
            slidesToScroll: 2,
            prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
           	nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    } // end if

    

    /////////////////  items slider. /plugins/owlcarousel/
    if ($('.slider-banner-owl').length > 0) { // check if element exists
        $('.slider-banner-owl').owlCarousel({
            loop:true,
            margin:0,
            items: 1,
            dots: false,
            nav:true,
            navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        });
    } // end if 

    /////////////////  items slider. /plugins/owlslider/
    if ($('.slider-items-owl').length > 0) { // check if element exists
        $('.slider-items-owl').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
            responsive:{
                0:{
                    items:1
                },
                640:{
                    items:3
                },
                1024:{
                    items:4
                }
            }
        })
    } // end if

    /////////////////  items slider. /plugins/owlcarousel/
    if ($('.slider-custom-owl').length > 0) { // check if element exists
        var slider_custom_owl = $('.slider-custom-owl');
        slider_custom_owl.owlCarousel({
            loop: true,
            margin:15,
            items: 2,
            nav: false,
        });

        // for custom navigation
        $('.owl-prev-custom').click(function(){
            slider_custom_owl.trigger('prev.owl.carousel');
        });

        $('.owl-next-custom').click(function(){
           slider_custom_owl.trigger('next.owl.carousel');
        });

    } // end if 



}); 
// jquery end
</script>


</head>
<body>

<header class="section-header">
<section class="header-main border-bottom">
<div class="container">
	<a href="Index.php" class="brand-wrap"><img class="logo" src="images/logo.png"></a>
</div> <!-- container.// -->
</section>
</header> <!-- section-header.// -->


<!-- ============================ COMPONENT 1 ================================= -->
    
    
<!-- ========================= PHP DATABASE CONNECTION ========================= -->
<?php
include "PHP/connectDB.php";

//Getting the ID from GET
$itemID = (int)$_GET['itemID'];
    
//Converting the ID to a secured value
$secured_itemID = mysqli_real_escape_string($conn, $itemID);

    
//SQL SCRIPT (OLD VERSION ---- DEPRECATED)
    
/*

$sql_getItem = "SELECT items.item_name, items.item_price, items.item_desc, items_images.item_image1, items_images.item_image2, items_images.item_image3, items_images.item_image4, items_images.item_image5, items_attributes.attribute1, items_attributes.item_attribute1, items_attributes.attribute2, items_attributes.item_attribute2, items_attributes.attribute3, items_attributes.item_attribute3 FROM items, items_images, items_attributes WHERE items.id = $itemID AND items_images.id = $itemID AND items_attributes.id = $itemID";
    
$sql_getItem_res = mysqli_query($conn, $sql_getItem);

*/

$sql_getAllItem = "SELECT items.item_name, items.item_price, items.item_desc, items_images.item_image1, items_images.item_image2, items_images.item_image3, items_images.item_image4, items_images.item_image5, items_attributes.attribute1, items_attributes.item_attribute1, items_attributes.attribute2, items_attributes.item_attribute2, items_attributes.attribute3, items_attributes.item_attribute3 FROM items, items_images, items_attributes WHERE (items.id = ? AND items_images.id = ? AND items_attributes.id = ?)";
       
    
    //Executing the prepared statement
    $stmt = $conn->prepare($sql_getAllItem);
    $stmt->bind_param('iii', $secured_itemID, $secured_itemID, $secured_itemID);
    $stmt->execute();
    $result = $stmt->get_result();
    
if(mysqli_num_rows($result) < 1) 
{
   echo "Error";
 }
else
{
    //LOOP FOR EACH ITEM IN DATABASE
    while ($item = mysqli_fetch_assoc($result)) 
        {
            $item_name = $item["item_name"];
            $item_price = $item["item_price"];
            $item_desc = $item["item_desc"];
        
        
            //attributes
            $attribute1 = $item["attribute1"];
            $attribute2 = $item["attribute2"];
            $attribute3 = $item["attribute3"];
        
            $item_attribute1 = $item["item_attribute1"];
            $item_attribute2 = $item["item_attribute2"];
            $item_attribute3 = $item["item_attribute3"];
        
        
        
            //images
            $item_image1 = $item["item_image1"];
            $item_image2 = $item["item_image2"];
            $item_image3 = $item["item_image3"];
            $item_image4 = $item["item_image4"];
            $item_image5 = $item["item_image5"];
        
            
            //array of images
            $images = array($item_image1, $item_image2, $item_image3, $item_image4, $item_image5);
            $arrlength = count($images);
            
        
            //PRODUCT DETAIL PAGE
        
            echo "
                <div class='card'>
	               <div class='row no-gutters'>
		              <aside class='col-md-6'>
                        <article class='gallery-wrap'> 
	                       <div class='img-big-wrap' >
                                <div class='slider-banner-slick'>";
        
                                for($i = 0; $i < $arrlength; $i++) {
                                
                                    //check if images[i] is not null!
                                    if ($images[$i] != null)
                                    {
                                        echo"
                                        <div class='item-slide'>
                                        <img src='Images/$images[$i]'>
                                        </div>";
                                    }
                                }
                    
                   
	               echo "</div>
                        </article> 
		              </aside>
		              <main class='col-md-6 border-left'>
                        <article class='content-body'>
                            <h2 class='title'>$item_name</h2>
                            <div class='mb-3'> 
	                           <var class='price h4'>$$item_price</var> 
	                           <!--<span class='text-muted'>/per ft2</span>-->
                            </div> 
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <br>
                            <br>
                            <p><strong>Characteristics</strong></p>
                            <dl class='row'>
                              <dt class='col-sm-3'>$attribute1</dt>
                              <dd class='col-sm-9'>$item_attribute1</dd>

                              <dt class='col-sm-3'>$attribute2</dt>
                              <dd class='col-sm-9'>$item_attribute2</dd>
                              
                              <dt class='col-sm-3'>$attribute3</dt>
                              <dd class='col-sm-9'>$item_attribute3</dd>
                            </dl>
                            <hr>
                                <div style='margin-right: 60%; margin-bottom:10%'>
                                <img src='images/logos/marketplace.jpg' style='width: 35px; height: 35px;'></a>
                                <a href='https://www.facebook.com/marketplace/item/275066240868856/'> See on Facebook Marketplace &nbsp;  
                                </div>
                                <a href='Index.php' class='btn btn-light'> &laquo Go back</a>
                            </article>
                        </main>
                    </div> 
                </div>";
	          
        }
}
?>
<!-- ============================ COMPONENT 1 END .// ================================= -->

<!-- ========================= FOOTER ========================= -->
<footer class="section-footer border-top bg">
	<div class="container">
		<section class="footer-top  padding-y">
			<div class="row">
				<aside class="col-md col-6">
					<h6 class="title">Company</h6>
					<ul class="list-unstyled">
						<li> <a href="#">About us</a></li>
						<li> <a href="#">Retail points</a></li>
						<li> <a href="#">Rules and terms</a></li>
					</ul>
				</aside>
				<aside class="col-md col-6">
					<h6 class="title">Help</h6>
					<ul class="list-unstyled">
						<li> <a href="#">Contact us</a></li>
						<li> <a href="#">Refund</a></li>
                        <li> <a href="#">Exchange and Return</a></li>
					</ul>
				</aside>
				<aside class="col-md">
					<h6 class="title">Social</h6>
					<ul class="list-unstyled">
						<li><a href="#"> <i class="fab fa-facebook"></i> Facebook </a></li>
						<li><a href="#"> <i class="fab fa-twitter"></i> Twitter </a></li>
						<li><a href="#"> <i class="fab fa-instagram"></i> Instagram </a></li>
						<li><a href="#"> <i class="fab fa-youtube"></i> Youtube </a></li>
					</ul>
				</aside>
			</div> <!-- row.// -->
		</section>	<!-- footer-top.// -->

		<section class="footer-bottom row">
			<div class="col-md-2">
				<p class="text-muted"> &copy 2021 Stock4Sale </p>
			</div>
			<div class="col-md-8 text-md-center">
				<span  class="px-2">info@Stock4Sale.ca</span>
				<span  class="px-2">+5146024629</span>
				<span  class="px-2">Street name 123, Avenue abc</span>
			</div>
			<div class="col-md-2 text-md-right text-muted">
				<i class="fab fa-lg fa-cc-visa"></i>
				<i class="fab fa-lg fa-cc-paypal"></i>
				<i class="fab fa-lg fa-cc-mastercard"></i>
			</div>
		</section>
	</div><!-- //container -->
</footer>
<!-- ========================= FOOTER END // ========================= -->


</body>
</html>






</body>
</html>