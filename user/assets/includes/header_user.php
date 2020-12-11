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

   <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
   <!-- CSS GLOBAL-->
   <link rel="stylesheet" href="../global/css/style.css">

   <!-- CSS USER-->
   <link rel="stylesheet" href="assets/css/style_user.css">
</head>
<body>
    <header>
        <a href="../index.php" class="header__logo header__logo-user"><?= $web_name ;?></a>

         <div class="menu__icon">
            <span class="menu__icon--one"></span>
            <span class="menu__icon--two"></span>
            <span class="menu__icon--three"></span>
        </div>

        <ul class="menu menu__user">
                <?php 
                    $class='link';
                    require 'menu_user.php';
                ?>
            </ul>

    </header>

<main>


