<?php
require_once __DIR__.'/../config/bootstrap.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="fair.fr : Le premier site equitable de ventes de données">
    <meta name="Keywords" content="fair, data, market, market place, données,">
    <meta name="author" content="Julien Quentier">
   <title><?= $web_name ;?> | <?=$page_title?></title>

   <!-- CSS -->
   <link rel="stylesheet" href="global/css/style.css">
</head>
<body>
    <header>
        <a href="#" class="header__logo"><?= $web_name ;?></a>

         <div class="menu__icon">
            <span class="menu__icon--one"></span>
            <span class="menu__icon--two"></span>
            <span class="menu__icon--three"></span>
        </div>

        <ul class="menu">
                <?php 
                    $class='nav-link';
                    require 'menu.php';
                ?>
            </ul>

    </header>
</body>
</html>