<?php
include_once("base.php");
// require_once('./Include/product.php');
$title = 'Edit Product';
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
    <a class="px-2" href="Include/logout.php" style=" background: grey;">Disconnect</a>
    </div>
<?php } ?>
<!-- ADD PRODUCT -->
<?php



?>
<?php

if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $name = $_POST['name'];
    $price = $_POST['price'];
    $color = strip_tags($_POST['color'], '<strong>');
    $storage = $_POST['storage'];
    $Admin_id = $_POST['Admin_id'];
    $Stages_id = $_POST['Stages_id'];
    $Category_id =$_POST['Category_id'];   
    $img = $_POST['img']; 
    $img1 = $_POST['img1']; 

// $name = null;
// $price = null;
// $color = null;
// $storage = null;
// $Admin_id = null;
// $img = null;
// $Stages_id = null;
// $Category_id = null;

if (!empty($_POST)) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $color = strip_tags($_POST['color'], '<strong>');
    $storage = $_POST['storage'];
    $Admin_id = $_POST['Admin_id'];
    $Stages_id = $_POST['Stages_id'];
    $Category_id =$_POST['Category_id'];
    $img = $_POST['img']; 
    $img1 = $_POST['img1']; 

    $folder = "upload/img/";

    $img = $_FILES['img']['name'];
    $img1 = $_FILES['img1']['name'];

    $path = $folder . $img;

    $target_file = $folder . basename($_FILES["img"]["name"]);
    $target_file = $folder . basename($_FILES["img1"]["name"]);


    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


    $allowed = array('jpeg', 'png', 'jpg');
    $filename = $_FILES['img']['name'];
    $filename = $_FILES['img1']['name'];

    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {

        echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
    } else {

        move_uploaded_file($_FILES['img']['tmp_name'], $path);
        move_uploaded_file($_FILES['img1']['tmp_name'], $path);



        $errors = [];
        if (empty($name)) {
            $errors['name'] = '\'not valid';
        }

        if (empty($price)) {
            $errors['price'] = '\'not valid';
        }

        if (empty($storage)) {
            $errors['storage'] = '\'not valid';
        }

        if (empty($Admin_id)) {
            $errors['Admin_id'] = '\'not valid';
        }

        if (empty($Category_id)) {
            $errors['Category_id'] = '\'not valid';
        }

        if (empty($img)) {
            $errors['img'] = '\'not valid';
        }

        if (empty($img)) {
            $errors['img1'] = '\'not valid';
        }
        if (empty($errors)) {
            $sql = "UPDATE product SET name=:name, price=:price, color=:color, storage=:storage, Admin_id=:Admin_id, img=:img,img1=:img1, Stages_id=:Stages_id, Category_id=:Category_id WHERE id=:id";
            $query = $DB_con->prepare($sql);
            $query->bindparam(':id', $id);
            $query->bindparam(':name', $name);
            $query->bindparam(':price', $price);
            $query->bindparam(':color', $color);
            $query->bindparam(':storage', $storage);
            $query->bindparam(':Admin_id', $Admin_id);
            $query->bindparam(':img', $img);
            $query->bindparam(':img1', $img1);
            $query->bindparam(':Stages_id', $Stages_id);
            $query->bindparam(':Category_id', $Category_id);
            if ($query->execute()) {
                echo '<div class="alert alert-success">Product Updated.</div>';
                ?>
                <script>window.location.href="admin.php";</script>
                <?php
            }
        }
        }
    }
}

?>
<div class="container my-5">
    <?php
    // S'il y a des erreurs
    if (!empty($errors)) {
        echo '<div class="alert alert-danger">';
        echo '<p>Errors</p>';
        echo '<ul>';
        foreach ($errors as $field => $error) {
            echo '<li>' . $field . ' : ' . $error . '</li>';
        }
        echo '</ul>';
        echo '</div>';
    }
    ?>
<?php 
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$sql = "SELECT * FROM product WHERE id=:id";
$query = $DB_con->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $name = $row['name'];
    $price = $row['price'];
    $color = $row['color'];
    $storage = $row['storage'];
    $Admin_id = $row['Admin_id'];
    $Stages_id = $row['Stages_id'];
    $Category_id =$row['Category_id'];
    $img = $row['img'];
    $img1 = $row['img1'];
}
?>
    <div class="container">
        <form action="#" method="POST" enctype="multipart/form-data" action="edit.php">
            <div class="form-group">
                <label for="formGroupExampleInput">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name;?>" placeholder="Name">
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput">Storage</label>
                <input type="text" class="form-control" id="storage" name="storage" value="<?php echo $storage;?>"placeholder="Storage">
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput">Color</label>
                <input type="text" class="form-control" id="color" name="color" value="<?php echo $color;?>"placeholder="Color">
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo $price;?>"placeholder="Price">
                
            </div>
            <?php
            $query = $DB_con->prepare('SELECT * FROM `admin`');
            $query->execute();
            $admins = $query->fetchAll();
            ?>

            <div class="form-group">
                <label for=",exampleFormControlSelect1">Admin_Id</label>
                <select class="form-control" name="Admin_id" id="exampleFormControlSelect1">
                    <?php
                    foreach ($admins as $admin) {
                        ?>
                        <option><?php echo $admin['id']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <?php
            $query = $DB_con->prepare('SELECT * FROM `stages` WHERE `id`');
            $query->execute();
            $stages = $query->fetchAll();
            ?>
          

            <div class="form-group">
                <label for=",exampleFormControlSelect1">Condition</label>
                <select class="form-control" name="Stages_id" value="<?php echo $Stage_id;?>" id="exampleFormControlSelect1">
                    <?php foreach ($stages as $stage) { ?>
                        <option><?php echo $stage['id']; ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <?php
            $query = $DB_con->prepare('SELECT * FROM `category`');
            $query->execute();
            $categorys = $query->fetchAll();
            ?>

            <div class="form-group">
                <label for=",exampleFormControlSelect1">Category</label>
                <select class="form-control" name="Category_id"  value="<?php echo $Category_id;?>" id="exampleFormControlSelect1">
                <?php foreach ($categorys as $category) { ?>
                        <option><?php echo $category['id']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Image</label>
                <input type="file" class="form-control-file" name="img" value="<?php echo $img;?>" id="exampleFormControlFile1">
                <input type="file" class="form-control-file" name="img1" value="<?php echo $img1;?>" id="exampleFormControlFile1">
            </div>
            <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
            <input type="submit" name="update" value="Update">

        </form>
    </div>
</div>