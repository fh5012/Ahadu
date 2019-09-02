<?php
include_once("base.php");
$title = 'Add Product';
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

$name = null;
$price = null;
$color = null;
$storage = null;
$Admin_id = null;
$img = null;
$img1 = null;
$Stages_id = null;
$Category_id = null;
$phone = null;
$email = null;

if (!empty($_POST)) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $color = strip_tags($_POST['color'], '<strong>');
    $storage = $_POST['storage'];
    $Admin_id = $_POST['Admin_id'];
    $Stages_id = $_POST['Stages_id'];
    $Category_id =$_POST['Category_id'];
    $phone = $_POST['Phone'];
    $email = $_POST['Email'];

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

        if (empty($img1)) {
            $errors['img1'] = '\'not valid';
        }
        if (empty($errors)) {
            $query = $DB_con->prepare('INSERT INTO product (name,price,color,storage,Admin_id,img,img1,phone,email,Stages_id,Category_id) VALUES (:name, :price, :color, :storage, :Admin_id, :phone, :email,:img, :img1, :Stages_id, :Category_id)');
            $query->bindParam(':name', $name);
            $query->bindParam(':price', $price);
            $query->bindParam(':color', $color);
            $query->bindParam(':storage', $storage);
            $query->bindParam(':Admin_id', $Admin_id);
            $query->bindParam(':phone', $phone );
            $query->bindParam(':email', $email );
            $query->bindParam(':img', $img);
            $query->bindParam(':img1', $img1);
            $query->bindParam(':Stages_id', $Stages_id);
            $query->bindParam(':Category_id', $Category_id);


            if ($query->execute()) {
                echo '<div class="alert alert-success">Product added.</div>';
                ?>
                <script>window.location.href="admin.php";</script>
                <?php
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

    <div class="container">
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="formGroupExampleInput">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput">Storage</label>
                <input type="text" class="form-control" id="storage" name="storage" placeholder="Storage">
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput">Color</label>
                <input type="text" class="form-control" id="color" name="color" placeholder="Color">
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Price">
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
                <select class="form-control" name="Stages_id" id="exampleFormControlSelect1">
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
                <select class="form-control" name="Category_id" id="exampleFormControlSelect1">
                <?php foreach ($categorys as $category) { ?>
                        <option><?php echo $category['id']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Image</label>
                <input type="file" class="form-control-file" name="img" id="exampleFormControlFile1">
                <input type="file" class="form-control-file" name="img1" id="exampleFormControlFile1">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Phone</label>
                <input type="text" class="form-control" id="phone" name="Phone" placeholder="Phone">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Email</label>
                <input type="text" class="form-control" id="email" name="Email" placeholder="Email">
            </div>
            <input type="submit" name="submit" value="Add Product" />

        </form>
    </div>
</div>