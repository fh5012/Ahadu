<?php
include_once("base.php");
// require_once('./Include/product.php');
$title = 'View Product';
include_once("Database/db.php");
include_once("header.php");
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM product WHERE id=:id";
$query = $DB_con->prepare($sql);
$query->execute(array(':id' => $id));

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
  $name = $row['name'];
  $img = $row['img'];
  $img1 = $row['img1'];
  $phone = $row['Phone'];
  $email = $row['Email'];
}
// var_dump($img1);
// var_dump($img);
?>
<ul class="nav nav-tabs nav-justified">
<a href ="user.php"><div class="p-3 mb-2 bg-dark text-white">Home</div></a>
</ul>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <!-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-black w-100" src="upload/img/<?php echo $img ?>" alt="<?php echo $name = $row['name']; ?>" style="height:auto;  width:auto;">
        </div>
        <div class="carousel-item">
          <img class="d-black w-100" src="upload/img/<?php echo $img1 ?>" alt="<?php echo $name = $row['name']; ?>" style="height:auto;  width:auto;">
        </div>
        <!-- <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div> -->

      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <i class="fas fa-envelope"> E-mail: <?php echo $email ?></i>
    </div>
    <div class="col-md-6">
      <i class="fas fa-mobile-alt"> Call: <?php echo $phone ?></i>
    </div>
  </div>
</div>