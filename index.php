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
    include_once('connect/database.php')
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
    <!-- Slider -->
    <?php
        include 'include/slider.php';
    ?>
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

