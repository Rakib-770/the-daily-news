<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail News</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
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
    <?php
    include 'includes/db_connect.inc.php';

    $id = $_POST['id'];
    $sql = "SELECT * from news where id = '$id'";
    $query = mysqli_query($conn, $sql);
    while ($info = mysqli_fetch_array($query)){
        ?>

        <div class="view-full-news">
            <h3><?php echo $info['title']?></h3>
            <p><?php echo $info['date']?></p>
            <img src="images/<?php echo $info['image']?>" alt=""> <br> <br>
            <p><?php echo $info['news']?></p>
        </div>
        <div style=text-align:center>
            <a class="btn btn-primary" href="index.php">Go to Home</a>
        </div>
        
        <?php

    }
    

    ?>
    
    

  

</body>
</html>