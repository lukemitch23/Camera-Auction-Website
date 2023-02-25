<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="build.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="homehero">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="images/hero1.jpeg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="800" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3"><b>Welcome to the camera auction website!</b></h1>
            <p class="lead">This is the one-stop-shop for buying and selling camera gear! Have a search for your next item or create a listing and start shifting that old gear.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <div class="hero-buttons">
                <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Search</button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4">Create a listing</button>
            </div>
            </div>
        </div>
        </div>
    </div>

    
  <?php include 'footer.php'; ?>
</body>
</html>