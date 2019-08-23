<?php
include_once("base.php");
// require_once('./Include/product.php');
$title = 'User_Category';
include_once("Database/db.php");
include_once("header.php");
?>
<?php
  $query = $DB_con->query('SELECT * FROM category');
  $categories = $query->fetchAll();
  ?>
<div class="p-3 mb-2 bg-info text-white">Categories</div>
<div class="list-group">
    <?php foreach ($categories as $category) if($title == 'User_Category'){ ?>
    <a href="user_categories.php?id=<?php echo $category['id']; ?>"
        class="list-group-item"><?php echo $category['name']; ?></a>
    <style>
        a:nth-of-type(odd) {
            background-color:#f3f3f3;
        }
    </style>
    <?php } ?>
</div>
<?php
             //Récupérer les prouduct d'une catégorie
            $idCategory = intval($_GET['id']);
            $query =  $DB_con->prepare('SELECT * FROM product WHERE Category_id = :Category_id');
            $query->bindValue(':Category_id',$idCategory);
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
                <!-- <li class="list-group-item">intersted
                    <span class="badge badge-primary badge-pill">14</span>
                </li> -->
                <li class="list-group-item"><?php echo $product['storage'];?></li>
                <li class="font-weight-bold list-group-item"><?php echo $product['color'];?></li>
                <li class="d-block p-2 bg-dark text-white"><?php echo $product['Stages_id'];
                            if ($product['Stages_id']==='1'){
                                echo "<li class='d-block p-2 bg-dark text-white'>NEW</li>";
                            }
                            if ($product['Stages_id']==='2'){
                                echo "<li class='d-block p-2 bg-dark text-white'>USED</li>";
                            }    
                            
                            ?>
                </li>
                <li class="p-3 mb-2 bg-danger text-white"><?php echo $product['price'];?></li>
            </ul>
            <!-- <div class="card-body">
                <a href="#" class="card-link">Edit</a>
                <a href="#" class="card-link">Delete</a>
            </div> -->
        </div>
        <?php } ?>
    </div>
</div>