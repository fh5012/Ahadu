<?php
include_once("base.php");
require_once('./Include/product.php');
$title = 'Admin';
include_once("Database/db.php");
include_once("header.php");
?>
<?php

$t = date("H");
if ($title !== 'እንኳን ደህና መጣችሁ') {
    if ($t < "20") {
        echo ' <div class="welcome">
<p class="px-2">መልካም ቀን,';
    } else {
        echo ' <div class="welcome">
<p class="px-2">እንደምን ዋላችሁ,';
    }
    ?>
    <span><?php echo $_SESSION['firstname']; ?></span></p>
    <a href="add.product.php"><button type="button" class="btn btn-light">Add Product</button></a>
    <a class="px-2" href="Include/logout.php" style=" background: grey;">Disconnect</a>
    </div>
<?php } ?>

<!-- --------------- CARD ----------------------- -->
<?php 
    $query = $DB_con->prepare("SELECT * from product");
    $query->execute();
    $products = $query->fetchAll();
?>

<div class="container card">
    <div class="row">
    <?php foreach ($products as $product){?>
        <div class="col-sm">
            <img class="card-img-top" src="upload/img/<?php echo $product['img']; ?>" alt="<?= $product['name']; ?>">
            <h5 class="card-title"><?php echo $product['name'];?></h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">intersted
                <span class="badge badge-primary badge-pill">14</span>
                </li>
                <li class="list-group-item"><?php echo $product['storage'];?></li>
                <li class="font-weight-bold list-group-item"><?php echo $product['color'];?></li>
                <li class="d-block p-2 bg-dark text-white"><?php echo $product['Stages_id'];
                            if ($product['Stages_id']==='1'){
                                echo "<li class='d-block p-2 bg-dark text-white'>NEW</li>";
                            }
                            elseif ($product['Stages_id']==='2'){
                                echo "<li class='d-block p-2 bg-dark text-white'>USED</li>";
                            }    
                            
                            ?>
            </li>
                <li class="p-3 mb-2 bg-danger text-white"><?php echo $product['price'];?></li>
            </ul>
            <div class="card-body">
                <a href="#" class="card-link">Edit</a>
                <a href="#" class="card-link">Delete</a>
            </div>
        </div>
      <?php } ?>
    </div>
</div>
        <hr>

        