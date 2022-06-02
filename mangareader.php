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

        <button class="back-to-top hidden">
            <i class="fa-solid fa-arrow-up back-to-top-icon"></i>
        </button>
        <div class="progress-bar"></div>


        <div class="container-xl big-area ">
            <div>
                <div class="manga-title-area">
                    <?php
                        $chap_id = $_GET['varname'];
                        //access manga chapter db
                        $query2 = 'SELECT chap_id, chap_no, manga_id, chapter_title
                        FROM manga_chapter
                        WHERE chap_id='.$chap_id.'';
    
                        $result2 = mysqli_query($connect, $query2);
                        if (!$result2){
                            echo 'Error Message: ' . mysqli_error($connect) . '<br>';
                            exit;
                        }
                        $record2 = mysqli_fetch_assoc($result2);

                        // to access the manga db
                        $query3 = 'SELECT manga_id, title
                        FROM manga
                        WHERE manga_id='.$record2['manga_id'].'';
    
                        $result3 = mysqli_query($connect, $query3);
                        if (!$result3){
                            echo 'Error Message: ' . mysqli_error($connect) . '<br>';
                            exit;
                        }
                        $record3 = mysqli_fetch_assoc($result3);

                        //print headers
                        echo '<h2 class="manga-title">'.$record3['title'].'</h2>';
                        echo '<h4 class="manga-chapter">Chapter '.$record2['chap_no'].'<h4>';
                        echo '<h4 class="manga-chapter">'.$record2['chapter_title'].'</h4>';
                    ?>
                <div>
                <div class="manga-nav">
                    <?php
                        $query = 'SELECT id, name, file_dir, MCLink
                        FROM manga_chapter_pages
                        WHERE MCLink ='.$chap_id.'
                        ORDER BY id';
    
                        $result = mysqli_query($connect, $query);
    
                        if (!$result){
                            echo 'Error Message: ' . mysqli_error($connect) . '<br>';
                            exit;
                        }


                        $nextchapid = $record2['chap_id'] + 1;
                        $nextchapno = $record2['chap_no'] + 1;

                        $prevchapid = $record2['chap_id'] - 1;
                        $prevchapno = $record2['chap_no'] - 1;

                        echo '<div>';
                            if ($record2['chap_no'] > 1){
                                echo '<i class="fa-solid fa-caret-left icon-nav"></i>';
                                echo '<a href="mangareader.php?varname='.$prevchapid.'" class="text-manga-nav">Chapter '.$prevchapno.'</a>';
                            }
                        echo '</div>';



                        echo '<div>';
                            if ($record2['chap_no'] < 5){
                                echo '<a href="mangareader.php?varname='.$nextchapid.'" class="text-manga-nav">Chapter '.$nextchapno.'</a>';
                                echo '<i class="fa-solid fa-caret-right icon-nav"></i>';
                            }
                        echo '</div>';
                    ?>                           
                </div>
                <div class="manga-container container">
                    
                    <?php
                        echo '<p>The query found ' . mysqli_num_rows($result) . ' rows:</p>';
    
                        while ($record = mysqli_fetch_assoc($result)){
                            echo '<img class="manga-img" src="'.$record['file_dir'].'" alt="'.$record['name'].'">';
                        }
                    ?>
                </div>

                <div class="manga-nav">
                    <?php
                        echo '<div>';
                        if ($record2['chap_no'] > 1){
                            echo '<i class="fa-solid fa-caret-left icon-nav"></i>';
                            echo '<a href="mangareader.php?varname='.$prevchapid.'" class="text-manga-nav">Chapter '.$prevchapno.'</a>';
                        }
                        echo '</div>';
                        echo '<div>';
                            if ($record2['chap_no'] < 5){
                                echo '<a href="mangareader.php?varname='.$nextchapid.'" class="text-manga-nav">Chapter '.$nextchapno.'</a>';
                                echo '<i class="fa-solid fa-caret-right icon-nav"></i>';
                            }
                        echo '</div>';
                    ?>
                </div>
                <div class="footer">
                </div>
            </div>
        </div>

        <script src="main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>