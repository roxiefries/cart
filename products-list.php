<?php
require('app/Customer.php');
require('app/Product.php');
require('app/FileUtility.php');

$products_data = FileUtility::openCSV('products.csv');

$products = Product::convertArrayToProducts($products_data);

$customer = new Customer('John Doe', 'john@mail.com');
?>
<html>
<head>
    <title>My Cart</title>
</head>
<body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<section class="h-800 h-custom" style="background-color: #d2c9ff;">
  <div class="container py-5 h-200">
    <div class="row d-flex justify-content-center align-items-center h-200">
      <div class="col-12">
     <h1> <img
        src="https://i.pinimg.com/originals/ff/ce/bd/ffcebdc10bf44b0a22ab978738007b1a.jpg" height="120" width="120" 
        class="img-fluid rounded-3" alt="Shop Logo">
</h1>
      <hr class="my-4">
<h1>Welcome to Fruit Basket <?php echo $customer->getName() ?>!</h1>
<h2>Products</h2>
<h4>
    <a href="shopping-cart.php">Shopping Cart</a>
</h4>

<?php foreach ($products as $product): ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<form action="add-to-cart.php" method="POST">
    <input type="hidden" name="product_id" value="<?php echo $product->getId(); ?>" />
    <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img
                        src="<?php echo $product->getImage(); ?>" height="50px"
                        class="img-fluid rounded-3" alt="Product Picture">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <h6 class="text-muted"><?php echo $product->getName(); ?></h6>
                      <h6 class="text-black mb-0"><?php echo $product->getDescription(); ?></h6>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                      <button class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                        <i class="fas fa-minus"></i>
                      </button>

                      <input id="form1" min="0" name="quantity" value="1" type="number"
                        class="form-control form-control-sm" />

                      <button class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>

                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h6 class="mb-0">PHP <?php echo $product->getPrice(); ?></h6>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                    </div>
                  </div>
        <button type="submit">
            ADD TO CART
        </button>
    </p>
</form>
<hr class="my-4">
<?php endforeach; ?>
</div>
    </div>
  </div>
</section>
</body>
</html>