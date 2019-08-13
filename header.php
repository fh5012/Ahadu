<?php
// $title = 'እንኳን ደህና መጣችሁ';
include_once("Database/db.php");
include_once("base.php");
?>

<body>
    <div class="header">
        <div class="logo">
            <?php
            if ($title !== 'Random') { ?>
                <a href="admin.php"><?php } ?><img src="https://i.pinimg.com/originals/3d/57/61/3d5761e18cec2a7a8ce99054b7770e1b.jpg"></a>
        </div>
        <div class="mx-auto text-center">
            <h1 class="" style="margin-top: -57px;"><?php echo $title; ?></h1>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
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
      <li class="nav-item">
        <a class="nav-link" href="categories.php?id">Category</a>
      </li>
    </ul>
  </div>
</nav>

<?php include_once('footer.php');?>