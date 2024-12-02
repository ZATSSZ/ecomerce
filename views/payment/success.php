<?php
    session_start();
    require_once(__DIR__."/../../app/config/Directories.php");

    if(isset($_SESSION["success"])){
        $messSucc = $_SESSION["success"];
        unset($_SESSION["success"]);
    }
    require_once(ROOT_DIR."/includes/header.php");
?>
    <?php require_once(ROOT_DIR."includes/navbar.php"); ?>

    <?php
        if(!isset($_SESSION["username"])){
            header("Location: ".BASE_URL."login.php");
        }
    ?>

<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-success text-white">
                        <h4>Payment Success</h4>
                    </div>
                    <div class="card-body text-center">
                        <i class="fas fa-check-circle fa-5x text-success mb-3"></i>
                        <p class="lead">Your payment has been successfully processed. Thank you for your purchase!</p>
                        <a href="/" class="btn btn-success">Go to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
