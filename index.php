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
<?php
    include 'include/header.php';
?>
<?php
    include 'include/head.php';
?>
<?php
    include 'include/nav.php';
?>
<!DOCTYPE html>
<html>
<body>
    <div class="slide-show">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block slide-pic" src="images/banner3.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 style="color:black">Nike</h1>
                        <h4 style="color:black">See how good they feel.</h4>
                        <a href="products.php">
                            <button type="button" class="btn btn-success custom-slide-btn"><label>Buy Now</label></button></a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block slide-pic" src="images/banner4.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 style="color:black">Adidas</h1>
                        <h4 style="color:black">For All Walks of Life.</h4>
                        <a href="products.php">
                            <button type="button" class="btn btn-success custom-slide-btn"><label>Buy Now</label></button></a>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
	<br>
	<br>
    <div class="container index-category">
        <div class="row">
            <div class="col-sm-6 col-md-6 column-in-center">
                <div class="cate-1">
                    <img src="images/banner2.jpg">
                    <br>
                    <br>
                    <div class="top-left">
                      
                        <h6 class="text-uppercase mb-4 font-weight-bold"><a href="products.php">  Nike</a></h6>

                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 column-in-center">
                <div class="cate-2">
                    <img src="images/banner1.jpg">
                    <div class="top-left">
                    <br>
                    <br>
                    <h6 class="text-uppercase mb-4 font-weight-bold"><a href="products.php">  Adidas</a></h6>

                    </div>
                </div>
            </div>
        </div>
        <div class="top_main">
		<h2>Hot products</h2>
		<a href="products.php">show all</a>
		<div class="clear"></div>
    </div>
	<div class="index-product">
	
	<div class="container">
						<div class="row">
	
    <meta charset="utf-8" />

	<?php
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
        <form action="index.php" method="post">
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
			
	
    
	

<!-- Footer -->
	<!-- footer -->
	<?php
        require("include/footer.php");
    ?>
	<!-- //footer -->


	
</body>
</html>

