<?php
require 'sys/db.php';
require 'head.php';

$sth = $dbh->prepare("SELECT * FROM `articles` ORDER BY date");
$sth->execute();
$array = $sth->fetchAll(PDO::FETCH_ASSOC);

$sth = $dbh->prepare("SELECT * FROM `articles` ORDER BY rand() LIMIT 1");
$sth->execute();
$top = $sth->fetchAll(PDO::FETCH_ASSOC);

$sth = $dbh->prepare("SELECT * FROM `articles` ORDER BY rand() LIMIT 2");
$sth->execute();
$left = $sth->fetchAll(PDO::FETCH_ASSOC);

?>


<body id="top">

    <section class="s-pageheader s-pageheader--home">

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


        <div class="pageheader-content row">
            <div class="col-full">

                <div class="featured">
<?php
foreach ($top as $val) { 
echo '
                    <div class="featured__column featured__column--big">
                        <div class="entry" style="background-image:url(images/'.$val['img'].');">
                            
                            <div class="entry__content">
                                <span class="entry__category"><a href="/page.php?id=' .$val['id']. '">' .$val['category']. '</a></span>

                                <h1><a href="/page.php?id=' .$val['id']. '" title="">'.$val['name'].'</a></h1>

                                <div class="entry__info">
                                    <a href="/page.php?id=' .$val['id']. '" class="entry__profile-pic">
                                        <img class="avatar" src="images/avatars/user-03.jpg" alt="">
                                    </a>

                                    <ul class="entry__meta">
                                        <li>'.$val['date'].'</li>
                                    </ul>
                                </div>
                            </div> 
                            
                        </div> 
                    </div>
                    ';
}
                    ?>

                    <div class="featured__column featured__column--small">
<?php
foreach ($left as $val) { 
echo '
                        <div class="entry" style="background-image:url(images/'.$val['img'].');">
                            
                            <div class="entry__content">
                                <span class="entry__category"><a href="/page.php?id='.$val['id'].'">' .$val['category']. '</a></span>

                                <h1><a href="/page.php?id='.$val['id'].'" title="">'.$val['name'].'</a></h1>

                                <div class="entry__info">
                                    <a href="/page.php?id='.$val['id'].'" class="entry__profile-pic">
                                        <img class="avatar" src="images/avatars/user-03.jpg" alt="">
                                    </a>

                                    <ul class="entry__meta">
                                        <li>'.$val['date'].'</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        ';
}
?>


                    </div> 
                </div> 

            </div> 
        </div> 

    </section> 


    <section class="s-content">
        
        <div class="row masonry-wrap">
            <div class="masonry">

                <div class="grid-sizer"></div>
<?php
foreach ($array as $val) { 
echo '
                <article class="masonry__brick entry format-standard" data-aos="fade-up">
                        
                    <div class="entry__thumb">
                        <a href="/page.php?id='.$val['id'].'" class="entry__thumb-link">
                            <img src="images/'.$val['img'].'" 
                           alt="">
                        </a>
                    </div>
    
                    <div class="entry__text">
                        <div class="entry__header">
                            
                            <div class="entry__date">
                                <a href="/page.php?id='.$val['id'].'">' .$val['src']. '</a>
                            </div>
                            <h1 class="entry__title"><a href="/page.php?id='.$val['id'].'">' .$val['name']. '</a></h1>
                            
                        </div>
                        <div class="entry__excerpt">
                            <p>
                            ' .substr($val['description'], 0, 98). '...
                            </p>
                        </div>
                        <div class="entry__meta">
                            <span class="entry__meta-links">
                                <a href="/page.php?id='.$val['id'].'">Читать</a>
                            </span>
                        </div>
                    </div>
    
                </article>
                '; }
   ?>

        
 

                

               

               


              

            </div> <!-- end masonry -->
        </div> <!-- end masonry-wrap -->


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
                        <span>© Copyright by Danila Arefev</span> 
                    </div>

                    <div class="go-top">
                        <a class="smoothscroll" title="Back to Top" href="#top"></a>
                    </div>
                </div>
            </div>
        </div> <!-- end s-footer__bottom -->

    </footer> <!-- end s-footer -->

 

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>