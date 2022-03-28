<?php
session_start();
require 'sys/db.php';

$sth = $dbh->prepare("SELECT category FROM articles GROUP BY category");
$sth->execute();
$category = $sth->fetchAll(PDO::FETCH_ASSOC);

?>
<nav class="header__nav-wrap">


<ul class="header__nav">
    <li class="current"><a href="index.php" title="">Главная</a></li>
    <li class="has-children">
        <a href="#0" title="">Категории</a>
        <ul class="sub-menu">
        <?php
            foreach ($category as $val) {
                echo '
        <li><a href="/category.php?category='.$val['category'].'">'.$val['category'].'</a></li>
        ';
            }
            ?>

        </ul>
    </li>
   
    <li><a href="about.php" title="">О нас</a></li>
    <li><a href="contact.php" title="">Контакты</a></li>
<?php
        if (!isset($_SESSION['email'])) {
echo '
<li><a href="/login.php" style="margin-right:20px;">Авторизация</a></li>
<li><a href="/reg.php">Регистрация</a></li>
                        </ul> 

';
        } else {
            echo '
            <li><a href="/publications.php" style="margin-right:20px;">Мои публикации</a></li>
            <li><a href="/out.php">Выход</a></li>
                                    </ul> 

            ';
        }
?>

</nav>
