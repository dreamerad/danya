<?php
session_start();

require 'sys/db.php';
require 'head.php';

$sth = $dbh->prepare("SELECT * FROM `articles` WHERE id = :id");
$sth->execute([
    ':id' => $_GET['id']
]);
$post = $sth->fetch(PDO::FETCH_ASSOC);

$sth = $dbh->prepare("SELECT category FROM articles GROUP BY category");
$sth->execute();
$category = $sth->fetchAll(PDO::FETCH_ASSOC);

$sth = $dbh->prepare("SELECT * FROM `comments` WHERE `post` = :post");
$sth->execute([
    'post' => $_GET['id']
]);
$comment = $sth->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_POST['add'])) {
        $sth = $dbh->prepare("INSERT INTO `comments` SET `email` = :email, `text` = :text, `post` = :post");
        $sth->execute([
            'email' => $_SESSION['email'],
            'text' => $_POST['text'],
            'post' => $_GET['id'],
        ]);
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


    <section class="s-content s-content--narrow s-content--no-padding-bottom">

        <article class="row format-standard">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                <?php echo $post['name']; ?>
                </h1>
                <ul class="s-content__header-meta">
                    <li class="date" style="list-style-type: none;"><?php echo $post['date']; ?></li>
                </ul>
            </div> 
    
            <div class="s-content__media col-full">
                <div class="s-content__post-thumb">
                    <img style="margin-left: 20%;" src="images/<?php echo $post['img']; ?>" 
                         
                         sizes="(max-width: 2000px) 100vw, 2000px" alt="" >
                </div>
            </div> 

            

        </article>



        <div class="comments-wrap">

            <p style="width: 80%; margin-left: 20%;"><?php echo $post['description']; ?></p>

            </div>
        </div>
        <div class="com">
        <div class="block">
            <h1>Коментарии</h1>
            <?php
                if(empty($comment)) {
                    echo 'Ваш коментарий будет первым';
                } else {
                    foreach ($comment as $val) {
                        echo '
                        <div class="author"><b>' .$val['email']. '</b></div>
                        <div class="post">' .$val['text']. '</div>
                        <div class="post" style="margin-bottom: 20px; color: black;">' .$val['date']. '</div>
                        ';
                    }
                }

                if(isset($_SESSION['email'])) {
                    echo  '
                    <form method="POST">
                <textarea name="text" cols="50" rows="20" style="border: 1px black solid;"></textarea>
                <input type="submit" name="add" value="Опубликовать" style="margin-top:10px;">
            </form>
                    ';
                }
            ?>
            
            
        </div>
</div>
    </section>

    


  


    <footer class="s-footer">

        <div class="s-footer__main">
            <div class="row">
                
                <div class="col-two md-four mob-full s-footer__sitelinks">
                        
                  
               

              

            </div>
        </div>

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
        </div>

    </footer>


    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>