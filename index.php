<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Daily News</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="index.php">The Daily News</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Politics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Coronavirus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Tech</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Investigations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">World</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Sports</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success text-light" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="text-center">
        <h1>Welcome to The Daily News. Click here to post a news.</h1>
        <div class="btn btn-dark"><a href="postNews.php"><span class="post-news">Post News</span></a></div>
    </div>

    <?php
    include 'includes/db_connect.inc.php';
    $sql = "SELECT * from news";
    $query = mysqli_Query($conn, $sql);
    while ($info = mysqli_fetch_array($query)) {
    ?>

        <div class="cards-container">
            <div class="card float-style" style="width: 18rem;">
                <img src="images/<?php echo $info['image'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php
                        echo $info['title'];
                        ?>
                    </h5>
                    <p>
                        <?php
                        echo formatDate($info['date']);
                        ?>
                        <br>
                        <?php
                        echo formatDay($info['date']);
                        ?>
                        <br>
                        <?php
                        echo formatTime($info['date']);
                        ?>
                    </p>
                    <form action="newsDetails.php" method="POST">
                        <input type="text" name="id" value="<?php echo $info['id']; ?>" hidden>
                        <input class="btn btn-primary" id="details-news" type="submit" name="full-news" value="Read Full News">
                    </form>
                </div>
            </div>
        </div>


    <?php

    }
    ?>


</body>

</html>