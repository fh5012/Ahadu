<?php
// $title = 'እንኳን ደህና መጣችሁ';
include_once("Database/db.php");
include_once("base.php");
?>

<body>
    <div class="header">
        <div class="logo">
            <?php
            if ($title == 'Admin'|| $title == 'Catagory' || $title == 'Random'|| $title == 'Add Product' || $title =='Edit Product') { ?>
                <a href="admin.php"><?php } ?><img src="https://i.pinimg.com/originals/3d/57/61/3d5761e18cec2a7a8ce99054b7770e1b.jpg"></a>
        </div>
        <div class="mx-auto text-center">
            <h1 class="" style="margin-top: -57px;"><?php echo $title; ?></h1>
        </div>
    </div>
    <?php  if ($title =='Admin'|| $title == 'Random'|| $title == 'Category' || $title == 'Edit Product'){?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
    <ul class="navbar-nav">
    <?php if ($title == 'Category'|| $title = 'Admin'){?>
      <li class="nav-item active">
      <a class="nav-link" href="admin.php" style="color: black;">Home</a>
      <a class="nav-link" href="categories.php?id" style="color: white;">Category</a>
      </li>
    <?php } ?>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li> -->
      <?php 
            // $query = $DB_con->prepare("SELECT * FROM `category` ORDER BY `name` ASC");
            // $query->execute();
            // $categories = $query->fetchAll();
?>
<?php if($title == 'Category'){?>
      <li class="nav-item">
        <a class="nav-link" href="categories.php?id">Home</a>
      </li>
<?php } ?>
    </ul>
  </div>
</nav>
    <?php } else {?>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
    <?php if ($title == 'User_Category'){?>
      <li class="nav-item active">
      <a class="nav-link" href="user.php" style="color: black;">Home</a>
      </li>
    <?php } ?>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li> -->
      <?php if($title == 'User'){?>
      <li class="nav-item">
      <a class="nav-link" href="user_categories.php?id" style="
    color: <hite;">User_Categories</a>
      </li>
      <?php } ?>
    </ul>
  </div>
</nav>
    <?php } ?>

<?php include_once('footer.php');?>