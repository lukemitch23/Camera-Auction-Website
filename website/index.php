<html>
<head>
    <title>Build</title>
    <link rel="stylesheet" href="build.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
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
                <button type="button" class="btn btn-primary btn-lg px-4 me-md-2" onclick="location.href='login.php'">Login</button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4" onclick="location.href='register.php'">Register</button>
            </div>
            </div>
        </div>
        </div>
    </div>

    <div class="container-fluid mb-5">
    <div class="text-center mt-5">
        <h1>Our Services</h1>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="our-services settings">
                    <div class="icon"> <img src="https://i.imgur.com/6NKPrhO.png"> </div>
                    <h4>Simple listing searching</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box">
                <div class="our-services speedup">
                    <div class="icon"> <img src="https://i.imgur.com/KMbnpFF.png"> </div>
                    <h4>Easy listing creation</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box">
                <div class="our-services privacy">
                    <div class="icon"> <img src="https://i.imgur.com/AgyneKA.png"> </div>
                    <h4>Accurate price recommendation</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="our-services backups">
                    <div class="icon"> <img src="https://i.imgur.com/vdH9LKi.png"> </div>
                    <h4>Personal seller messaging</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box">
                <div class="our-services ssl">
                    <div class="icon"> <img src="https://i.imgur.com/v6OnUqu.png"> </div>
                    <h4>Camera information on every listing</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box">
                <div class="our-services database">
                    <div class="icon"> <img src="https://i.imgur.com/VzjZw9M.png"> </div>
                    <h4>Comming soon...</h4>
                    <p>This feature is currently being built and your find out more about it at another time...</p>
                </div>
            </div>
        </div>
    </div>
</div>
  <?php include 'footer.php'; ?>
</body>