<?php
session_start();

require 'sys/db.php';
require 'head.php';

if(!isset($_SESSION['email'])){
    header('Location: /index.php');
}
$sth = $dbh->prepare("SELECT * FROM articles WHERE status = 0");
$sth->execute([]);
$info = $sth->fetchAll(PDO::FETCH_ASSOC);

$sth = $dbh->prepare("SELECT category FROM articles GROUP BY category");
$sth->execute();
$category = $sth->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $dbh->exec("DELETE FROM `articles` WHERE `id` = $id");
}

if(isset($_GET['ok'])) {
    $sth = $dbh->prepare("UPDATE `articles` SET `status` = :status WHERE id = :id");
        $sth->execute([
            ':status' => 1,
            ':id' => $_GET['ok'],
        ]);
    header('Location: /admin.php');
}

if(isset($_GET['no'])) {
    $sth = $dbh->prepare("UPDATE `articles` SET `status` = :status WHERE id = :id");
        $sth->execute([
            ':status' => 2,
            ':id' => $_GET['no'],
        ]);
        header('Location: /admin.php');
}
?>


<body id="top">

    <div class="s-pageheader">

        <header class="header">
            <div class="header__content row">

                <div class="header__logo">
                    <a class="logo" href="index.php">
                        <img src="images/logo.svg" alt="Homepage">
                    </a>
                </div>



                <?php
                require 'nav.php';
                ?>

            </div> 
        </header> 

    </div> 


   
    <section class="s-content">

        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                <h1>Модерация</h1>
            </div>
        </div>

        <div class="row masonry-wrap">
            <div class="masonry">

                <div class="grid-sizer"></div>
              
<?php
foreach ($info as $val) {
echo '
                <article class="masonry__brick entry format-standard" data-aos="fade-up">

                    <div class="entry__thumb">
                        <a href="single-standard.html" class="entry__thumb-link">
                            <img src="images/thumbs/masonry/sydney-400.jpg" 
                                 srcset="images/thumbs/masonry/sydney-400.jpg 1x, images/thumbs/masonry/sydney-800.jpg 2x" alt="">
                        </a>
                    </div>

                    <div class="entry__text">
                        <div class="entry__header">
                            
                            <div class="entry__date">
                                <a href="#">'.$val['date'].'</a>
                            </div>
                            <h1 class="entry__title"><a href="/page.php?id='.$val['id'].'">'.$val['name'].'</a></h1>
                            
                        </div>
                        <div class="entry__excerpt">
                            <p>
                            '.substr($val['description'], 0 ,100).'
                             </p>
                        </div>
                        <div class="entry__meta">
                            <span class="entry__meta-links">
                                <a href="/update.php?id='.$val['id'].'">Редактировать</a>
                                <a href="/publications.php?delete='.$val['id'].'">Удалить</a><br>
                            </span>
                            <a href="/admin.php?ok='.$val['id'].'" style="color: green;">Принять</a>
                            <a href="/admin.php?no='.$val['id'].'" style="color: red;">Отказать</a>
                            </div>
                    </div>

                </article>';
}
?>
            </div>
        </div>
<!-- 
        <div class="row">
            <div class="col-full">
                <nav class="pgn">
                    <ul>
                        <li><a class="pgn__prev" href="#0">Prev</a></li>
                        <li><a class="pgn__num" href="#0">1</a></li>
                        <li><span class="pgn__num current">2</span></li>
                        <li><a class="pgn__num" href="#0">3</a></li>
                        <li><a class="pgn__num" href="#0">4</a></li>
                        <li><a class="pgn__num" href="#0">5</a></li>
                        <li><span class="pgn__num dots">…</span></li>
                        <li><a class="pgn__num" href="#0">8</a></li>
                        <li><a class="pgn__next" href="#0">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div> -->

    </section> <!-- s-content -->
    

    <footer class="s-footer">

<div class="s-footer__main">
    <div class="row">
        
        <div class="col-two md-four mob-full s-footer__sitelinks">
                
          
    
      

    </div>
</div> <!-- end s-footer__main -->

<div class="s-footer__bottom">
    <div class="row">
        <div class="col-full">
            <div class="s-footer__copyright">
                <span>© Copyright by Danila Aref'ev</span> 
            </div>

            <div class="go-top">
                <a class="smoothscroll" title="Back to Top" href="#top"></a>
            </div>
        </div>
    </div>
</div> <!-- end s-footer__bottom -->

</footer>
    <div id="preloader">
        <div id="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>


    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>