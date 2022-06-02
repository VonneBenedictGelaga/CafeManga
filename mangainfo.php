<?php

$connect = mysqli_connect('localhost', 'root', '', 'manga');

if (!$connect) 
{
    echo 'Error Code: ' . mysqli_connect_errno() . '<br>';
    echo 'Error Message: ' . mysqli_connect_error() . '<br>';
    exit;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="stylesheet.css">
        <!-- Font  -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Crete+Round&display=swap" rel="stylesheet">
        <!-- icons -->
        <script src="https://kit.fontawesome.com/0cfc5249e3.js" crossorigin="anonymous"></script>
        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    </head>
    <body>
        <nav class="navbar navbar-expand-xl navbar-light ">
            <div class="container-fluid">
                <img alt="logo" src="logo.png" class="img-fluid img-logo" style="width: 2rem;">
                <a class="navbar-brand" href="Home.php">Café Manga</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarBasic" aria-controls="navbarBasic" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse show" id="navbarBasic">
                    <ul class="navbar-nav me-auto mb-2 mb-xl-0" >
                        <li class="nav-item nav-btn">
                            <a class="nav-link" href="#">Categories</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <div class="input-group">
                            <input type="search" class="form-control input-search" aria-label="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-search" type="button"><i class="glyphicon glyphicon-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <i class="fa-solid fa-circle-user user-logo"><a href="#" class="user-profile"></a></i>
                </div>
            </div>
        </nav>

        <div class="container-xl big-area">
            <div class="main-info container">
                <div class="row manga-info-area">
                    <div class="col-md-12 col-lg-5 manga-cover-area">
                        <?php
                            $manga_id = $_GET['varname'];
                            $query = 'SELECT manga_id, title, cover, description
                            FROM manga
                            WHERE manga_id='.$manga_id.''; 
        
                            $result = mysqli_query($connect, $query);
        
                            if (!$result){
                                echo 'Error Message: ' . mysqli_error($connect) . '<br>';
                                exit;
                            }
                            $record = mysqli_fetch_assoc($result);
                            echo '<img class="manga-cover" src="'.$record['cover'].'"alt="'.$record['title'].'-cover">';
                        ?>
                    </div>
                    <div class="col-md-12 col-lg-7 text-info">
                        <?php
                            echo '<h1 class="manga-title">'.$record['title'].'</h1>';
                            echo '<p class="manga-info-p">'.$record['description'].'</p>';
                        ?>
                    </div>
                </div>
            </div>
            <div class="chapter-list-area">
                    <h4 class="chapter-title">Chapter list:</h4>
                    <div class="list-area container">
                        <?php
                            $query2 = 'SELECT chap_id, chap_no, manga_id, chapter_title
                            FROM manga_chapter
                            WHERE manga_id='.$manga_id.'
                            ORDER BY chap_no'; 
        
                            $result2 = mysqli_query($connect, $query2);
                            while($record2 = mysqli_fetch_assoc($result2)){
                                echo '<div class="chapter-line">
                                        <a href="mangareader.php?varname='.$record2['chap_id'].'" class="chapter-num">
                                            <h5>Chapter '.$record2['chap_no'].' - '.$record2['chapter_title'].'</h5>
                                        </a>
                                      </div>';
                            }
                        ?>
                    </div>
            </div>
        </div>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>