<?php
session_start();

require 'sys/db.php';
require 'head.php';

if(!isset($_SESSION['email'])) {
    header('Location: /index.php');
}

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
        if (empty($_POST['name']) OR empty($_POST['description']) OR empty($_POST['category'])) {
            $errors[] = 1;
        }
        if(empty($errors)) {
        if ($_FILES && $_FILES["image"]["error"]== UPLOAD_ERR_OK)
        {
            $name = "images/" . $_FILES["filename"]["name"];
            move_uploaded_file($_FILES["filename"]["tmp_name"], $name);
        }
        $sth = $dbh->prepare("INSERT INTO `articles` SET `name` = :name,  `description` = :description,
            `category` = :category, `img` = :img, `user_email` = :user_email");
        $sth->execute([
            ':name' => $_POST['name'],
            ':description' => trim($_POST['description']),
            ':category' => trim($_POST['category']),
            ':img' => $_FILES['image']['name'],
            ':user_email' => $_SESSION['email'],
        ]);
            header('Location: /publications.php');
    } else {
        echo '<script>alert("Все поля обязательны для заполнения");</script>';
    }
    }
    ?>
    
    

<body id="top">

  
    <div class="s-pageheader">

        <header class="header">
            <div class="header__content row">

                <div class="header__logo">
                    <a class="logo" href="index.html">
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
                    Добавить публикацию
                </h1>
            </div> 

          
            <form method="POST" enctype="multipart/form-data" style="margin-left: 40%;">
                <input type="text" placeholder="Категория" name="category" style="width: 100%; margin-left: -25%;">
                <input type="text" placeholder="Название публикации" name="name" style="width: 100%; margin-left: -25%;">
                <textarea name="description" placeholder="Содержание статьи" style="width: 100%; margin-left: -25%;"></textarea>
                <div id="file-upload">
                    <label style="margin-left: -25%;">
                        <input type="file" name="image" id="uploade-file">
                            <span>Выберите файл</span>
                        </label>
                    </div>
                <input type="submit" value="Добавить" name="save">
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
                <span>© Copyright by Danila Aref'ev</span> 
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