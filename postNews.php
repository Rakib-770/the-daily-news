<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post News</title>
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

    <div class="form-container">
        <form class="" action="postNews.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">News Title</label> <br>
                <textarea name="title" id="" cols="100" rows="1" required></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Enter News Description</label> <br>
                <textarea name="news" id="" cols="100" rows="20" required></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
        </form>

        <?php

        include 'includes/db_connect.inc.php';
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $news = $_POST['news'];
            $image = $_FILES['image']['name'];
            $image_type = $_FILES['image']['type'];
            $image_size = $_FILES['image']['size'];
            $image_tem_loc = $_FILES['image']['tmp_name'];
            $image_store="images/".$image;

            move_uploaded_file($image_tem_loc, $image_store);
            $sql="INSERT INTO news(title,news,image) values('$title','$news', '$image')";
            $query = mysqli_Query($conn, $sql);

        }
        ?>
    </div>



</body>

</html>