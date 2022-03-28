<?php
session_start();

require 'sys/db.php';
require 'head.php';

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
                    Контакты
                </h1>
            </div> 
    

            <div class="col-full s-content__main">

                <div class="row">
                    <div class="col-six tab-full">
                        <h3>Контакты</h3>

                        <p>
                        +79514125322<br>
                        danya.arefev.2016@mail.ru<br>
                        </p>

                    </div>

                    <div class="col-six tab-full">
                        <h3>Соц. сети</h3>

                        <p>https://vk.com/id320701952<br>
                        
                        </p>

                    </div>
                </div> 

                


            </div> 

        </div> 

    </section> 


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