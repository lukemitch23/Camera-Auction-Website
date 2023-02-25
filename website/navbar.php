<html>
<head>
    <title>Build</title>
    <link rel="stylesheet" href="build.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
    <a class="navbar-brand" href="home.php">
        <img src="images/favicon.ico" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
        Camera Auction Website
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
       <div class="collapse navbar-collapse" id="navbarNav">      
         <ul class="navbar-nav mr-auto mt-2 mt-lg-0">      
            <li class="nav-item active">      
              <a class="nav-link" href="home.php">Home<span class="sr-only">(current)</span></a>      
            </li>
            <li class="nav-item">
              <a class="nav-link" href="create-listing.php">Create a listing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="price-recommendation.php">Price recommendation</a>
            </li>
       <li class="nav-item">
              <a class="nav-link" href="messages.php">Messages</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0" action="search.php" method="post" enctype="multipart/form-data">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchbar" >
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
</body>
</html>