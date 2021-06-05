<!------ Include the above in your HEAD tag ---------->
<?php 
    session_start();
    $connect = mysqli_connect("localhost", "root", "", "testing");
        
    function add(){					
        $connect = mysqli_connect("localhost", "root", "", "testing");
        $sql = "INSERT INTO cart(id,name,image,price,quantity)
                values('{$_POST['hidden_id']}','{$_POST['hidden_name']}','{$_POST['hidden_img']}','{$_POST['hidden_price']}',1)";
                                
        if ($connect->query($sql) === TRUE) {
            echo "";
        } else {
            echo "";
        }
                                
    }

    if(array_key_exists('add',$_POST)){
        add();	
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
        crossorigin="anonymous">
        <link href="css/style123.css" rel="stylesheet" type="text/css" media="all" />
        <!-- //custom-theme -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/shop.css" type="text/css" media="screen" property="" />
	<link href="css/style7.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome-icons -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome-icons -->
	<link href="//fonts.googleapis.com/css?family=Montserrat:100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>



<body>
<!--Header-->
<?php
                require("include/header.php");
            ?>
<!--Header-->   
<!--Navigation-->   
<div class="top_bg">
        <div class="navigation">
            <?php
                require("include/nav.php");
            ?>
        </div>
    </div>
</div>
<!--Navigation--> 
    <div class="products">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                    aria-controls="pills-home" aria-selected="true">Tất cả sản phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                    aria-controls="pills-profile" aria-selected="false">Adidas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                    aria-controls="pills-contact" aria-selected="false">Nike</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
			<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <?php
                if(isset($_POST['add'])){						
                    $connect = mysqli_connect("localhost", "root", "", "testing");
                    $sql = "INSERT INTO cart(id,name,image,price,quantity)
                            values('{$_POST['hidden_id']}','{$_POST['hidden_name']}','{$_POST['hidden_img']}','{$_POST['hidden_price']}',1)";
                    if ($connect->query($sql) === TRUE) {
                        echo "";
                    } else {
                        echo "";
                    }	
                }
            ?>
         	
		<br>		
		<br>
            <div class="index-product">
                <div class="container">
                    <div class="row">
                        <?php
                            $connect = mysqli_connect("localhost", "root", "", "testing");
                            $query = "SELECT * FROM products ORDER BY id ASC";
                            $result = mysqli_query($connect, $query);
                            if(mysqli_num_rows($result) > 0)
                            {
                                while($row = mysqli_fetch_array($result))
                                {
                        ?>						
                        <div class="col-sm-4 col-md-4 prod">
                            <form method="post" name="form-submit" action="product-detail.php?action=&id=<?php echo $row["id"]; ?>">
                            <?php	echo '<img src='.$row['image'].' />';?>
                                <div class="product-index-info">
                                    <h3><?php echo $row["name"]; ?></h3>
                                        <p><?php echo $row["price"]; ?> &#x20AB;</p>
                                </div>
                                <input type="hidden" name="hidden_img" value="<?php echo $row["image"]; ?>"/>
                                <input type="hidden" name="hidden_id" value="<?php echo $row["id"]; ?>"/>
                                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                                <input type="hidden" name="hidden_des" value="<?php echo $row["description"]; ?>" />
                                <div class="button">
                                    <button class="btn btn-success" type="submit">Detail</button>
                                </div>
                            </form>	
                            <form action="products.php" method="post">
                                <input type="hidden" name="hidden_img" value="<?php echo $row["image"]; ?>"/>
                                <input type="hidden" name="hidden_id" value="<?php echo $row["id"]; ?>"/>
                                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                                <div class="button">
                                    <button id="addpro" name="add" onclick="AddPro()" class="btn btn-danger">Add to cart</button>
                                </div>
                            </form>
                
		<br>		
		<br>
                        </div>

                        <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
					
        <br>		
		<br>
             
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="index-product">
                    <div class="container">
                        <div class="row">
    <?php			
        $connect = mysqli_connect("localhost", "root", "", "testing");
        $query = "SELECT * FROM products WHERE product_brand='adidas'";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {		
    ?>
        <div class="col-sm-4 col-md-4 prod">
            <form method="post" name="form-submit" action="product-detail.php?action=&id=<?php echo $row["id"]; ?>">
			<?php	echo '<img src='.$row['image'].' />';?>
                <div class="product-index-info">
                    <h3><?php echo $row["name"]; ?></h3>
                    <p><?php echo $row["price"]; ?> &#x20AB;</p>
                </div>
                <input type="hidden" name="hidden_img" value="<?php echo $row["image"]; ?>"/>
                <input type="hidden" name="hidden_id" value="<?php echo $row["id"]; ?>"/>
                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                <input type="hidden" name="hidden_des" value="<?php echo $row["description"]; ?>" />
                <div class="button">
                    <button class="btn btn-success" type="submit">Xem chi tiết</button>
                </div>
            </form>	
            <form action="products.php" method="post">
                <input type="hidden" name="hidden_img" value="<?php echo $row["image"]; ?>"/>
                <input type="hidden" name="hidden_id" value="<?php echo $row["id"]; ?>"/>
                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                <div class="button">
                    <button id="addpro" name="add" onclick="AddPro()" class="btn btn-danger">Add to cart</button>
                </div>
            </form>
            <br>		
		<br>
             
        </div>
    <?php
            }
        }
    ?>
                        </div>
                    </div>
                </div>
            </div>

			
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="index-product">
                    <div class="container">
                        <div class="row">

                   
		<br>		
		<br>
    <?php			
        $connect = mysqli_connect("localhost", "root", "", "testing");
        $query = "SELECT * FROM products WHERE product_brand='nike'";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
    ?>
        <div class="col-sm-4 col-md-4 prod">
            <form method="post" name="form-submit" action="product-detail.php?action=&id=<?php echo $row["id"]; ?>">
			<?php	echo '<img src='.$row['image'].' />';?>
                <div class="product-index-info">
                    <h3><?php echo $row["name"]; ?></h3>
                    <p><?php echo $row["price"]; ?> &#x20AB;</p>
                </div>
                <input type="hidden" name="hidden_img" value="<?php echo $row["image"]; ?>"/>
                <input type="hidden" name="hidden_id" value="<?php echo $row["id"]; ?>"/>
                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                <input type="hidden" name="hidden_des" value="<?php echo $row["description"]; ?>" />
                <div class="button">
                    <button class="btn btn-success" type="submit">Detail</button>
                </div>
            </form>	
            <form action="products.php" method="post">
                <input type="hidden" name="hidden_img" value="<?php echo $row["image"]; ?>"/>
                <input type="hidden" name="hidden_id" value="<?php echo $row["id"]; ?>"/>
                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                <div class="button">
                    <button id="addpro" name="add" onclick="AddPro()" class="btn btn-danger">Add to cart</button>
                </div>
            </form>
          	
		<br>		
		<br>
        </div>
    <?php 
            }
        }
                
    ?>

                        </div>
                    </div>
                </div>
	        </div>			
        </div>
    </div>

   <!-- Footer -->
	<?php
        require("include/footer.php");
    ?>
	<!-- //footer -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
<script>
    var countPro = 0;
	
    function AddPro() {
        window.scrollTo(0, 0)
        countPro = countPro + 1;
        document.getElementById("lblCartCount").innerHTML = countPro;
		
	};
</script>
	<!-- //footer -->
    <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- //js -->
	<!-- /nav -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="js/classie.js"></script>
	<script src="js/demo1.js"></script>
	<!-- //nav -->
	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
		shoe.render();

		shoe.cart.on('shoe_checkout', function (evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {}
			}
		});
	</script>
	<!-- //cart-js -->
	<!--search-bar-->
	<script src="js/search.js"></script>
	<!--//search-bar-->
	<script src="js/responsiveslides.min.js"></script>
	<script>
		$(function () {
			$("#slider4").responsiveSlides({
				auto: true,
				pager: true,
				nav: true,
				speed: 1000,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});
		});
	</script>
	<!-- js for portfolio lightbox -->
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smoth-scrolling -->

	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>	
	
</body>
</html>



<!------ Include the above in your HEAD tag ---------->