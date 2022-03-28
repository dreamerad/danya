<?php
require 'sys/db.php';
require 'head.php';


$sth = $dbh->prepare("SELECT * FROM articles WHERE category = :category");
$sth->execute([
    ':category' => $_GET['category']
]);
$info = $sth->fetchAll(PDO::FETCH_ASSOC);

$sth = $dbh->prepare("SELECT category FROM articles GROUP BY category");
$sth->execute();
$category = $sth->fetchAll(PDO::FETCH_ASSOC);
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


  
    <section class="s-content s-content--narrow">

        <div class="row">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                    О нас
                </h1>
            </div> 

            <div class="s-content__media col-full">
                <div class="s-content__post-thumb">
                    <img src="images/thumbs/about/about-1000.jpg" 
                         srcset="images/thumbs/about/about-2000.jpg 2000w, 
                                 images/thumbs/about/about-1000.jpg 1000w, 
                                 images/thumbs/about/about-500.jpg 500w" 
                         sizes="(max-width: 2000px) 100vw, 2000px" alt="" >
                </div>
            </div> 

            <div class="col-full s-content__main">

                <p class="lead">На нашем сайте вы сможете найти новости о музыкальной индустрии, литературе ,технологиях и о новых студиях которые создают новые программы и/или игры.</p>
               
                <div class="row block-1-2 block-tab-full">
                    <div class="col-block">
                        <h3 class="quarter-top-margin">Who We Are.</h3>
                        <p>Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui sit ex occaecat et eu mollit nisi pariatur fugiat deserunt dolor veniam reprehenderit aliquip magna nisi consequat aliqua veniam in aute ullamco Duis laborum ad non pariatur sit.</p>
                    </div>

                    <div class="col-block">
                        <h3 class="quarter-top-margin">Our Mission.</h3>
                        <p>Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui sit ex occaecat et eu mollit nisi pariatur fugiat deserunt dolor veniam reprehenderit aliquip magna nisi consequat aliqua veniam in aute ullamco Duis laborum ad non pariatur sit.</p>
                    </div>

                    <div class="col-block">
                        <h3 class="quarter-top-margin">Our Vision.</h3>
                        <p>Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui sit ex occaecat et eu mollit nisi pariatur fugiat deserunt dolor veniam reprehenderit aliquip magna nisi consequat aliqua veniam in aute ullamco Duis laborum ad non pariatur sit.</p>
                    </div>

                    <div class="col-block">
                        <h3 class="quarter-top-margin">Our Values.</h3>
                        <p>Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui sit ex occaecat et eu mollit nisi pariatur fugiat deserunt dolor veniam reprehenderit aliquip magna nisi consequat aliqua veniam in aute ullamco Duis laborum ad non pariatur sit.</p>
                    </div>

                </div>


            </div> <!-- end s-content__main -->

        </div> <!-- end row -->

    </section> <!-- s-content -->


    <!-- s-extra
    ================================================== -->
   
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

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

</body>

</html>