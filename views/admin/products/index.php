<?php 
session_start();
require_once($_SERVER["DOCUMENT_ROOT"]."/app/config/Directories.php");
require_once(ROOT_DIR."includes/header.php");

if (isset($_SESSION["error"])) {
    $messErr = $_SESSION["error"];
    unset($_SESSION["error"]);
}
if (isset($_SESSION["success"])) {
    $messSucc = $_SESSION["success"];
    unset($_SESSION["success"]);
}

include(ROOT_DIR."app/product/get_products.php");
?>

<!-- Navbar -->
<?php require_once(ROOT_DIR."includes/navbar.php") ?>

<!-- Page Header -->
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Product List</h2>

        <a href="<?php echo BASE_URL; ?>views/admin/products/add.php" class="btn btn-success">Add New Product</a>
    </div>
    <p class="text-center">Manage all products in the catalog</p>
    <hr>
</div>

<!-- Display messages -->
<?php if(isset($messSucc)){ ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?php echo $messSucc; ?></strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>

<?php if(isset($messErr)){ ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><?php echo $messErr ?></strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>

<!-- Product Cards Container -->
<div class="container content mt-3">
    <div class="row">
        <?php foreach($productList as $product) { ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo BASE_URL . $product['image_url']; ?>" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($product['product_name']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($product['product_description']); ?></p>
                        <p><strong>Category:</strong> <?php echo htmlspecialchars($product['category_id']); ?></p>
                        <p><strong>Price:</strong> <?php echo htmlspecialchars($product['unit_price']); ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Footer -->
<?php require_once(ROOT_DIR."includes/footer.php") ?>
