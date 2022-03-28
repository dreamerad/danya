<?php
session_start();

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

    if(isset($_POST['save'])) {
        $errors = [];
        if(empty($_POST['email']) OR empty($_POST['password']) OR empty($_POST['confirm_password'])) {
            $errors = 1;
            echo '<script>alert("Все поля обязательны для заполнения");</script>';
        }
        else if ($_POST['password'] != $_POST['confirm_password']) {
            $errors = 1;
            echo '<script>alert("Пароли не совпадают");</script>';
        }
        else if (empty($errros)) {
            $sth = $dbh->prepare("INSERT INTO `users` SET `email` = :email, `password` = :password");
            $sth->execute([
                'email' => $_POST['email'],
                'password' => $_POST['password']
        ]);
        $_SESSION['email'] = $_POST['email'];
        header("Location: /index.php");
        }
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


  
    <section class="s-content s-content--narrow">

        <div class="row">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                    Регистрация
                </h1>
            </div> 

          
            <form method="POST" style="margin-left: 40%;">
                <input type="text" placeholder="Email" name="email">
                <input type="text" placeholder="Пароль" name="password">
                <input type="text" placeholder="Подтвердите пароль" name="confirm_password">

                <input type="submit" value="Регистрация" name="save">
            </form>

           

        </div> <!-- end row -->

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

<!-- <div id="preloader">
<div id="loader">
    <div class="line-scale">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
</div> -->

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

</body>

</html>